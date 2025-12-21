<?php

namespace App\Http\Controllers;
use App\Models\candidate;
use App\Models\employer;
use App\Models\Job;
use App\Models\application;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function Home()
    {
        $jobs = Job::with('employer')->latest()->limit(6)->get();
    
        foreach ($jobs as $job) {
            $createdAt = Carbon::parse($job->created_at);
            $timeAgo = $createdAt->diffForHumans();
            $job->timeAgo = $timeAgo; 
        }

        $categories = Job::select('job_category')->distinct()->limit(8)->get();
        // Fallback or specific icons could be mapped, but let's just use the names for now
    
        return view('home', compact('jobs', 'categories'));
    }

    public function About()
    {
        return view('about');
    }

    public function Contact()
    {
        return view('contact');
    }

    public function Jobs(Request $request)
    {
        $query = Job::query()->with('employer');

        if ($request->has('query') && $request->filled('query')) {
            $search = $request->input('query');
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhereHas('employer', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
            });
        }

        if ($request->has('location') && $request->filled('location')) {
            $location = $request->input('location');
            $query->where('city', 'like', "%{$location}%");
        }

        if ($request->has('category') && $request->filled('category')) {
            $query->where('job_category', $request->category);
        }

        if ($request->has('type') && $request->filled('type')) {
            $query->where('job_type', $request->type);
        }

        $jobs = $query->latest()->paginate(12);

        foreach ($jobs as $job) {
            $createdAt = Carbon::parse($job->created_at);
            $timeAgo = $createdAt->diffForHumans();
            $job->timeAgo = $timeAgo; 
        }

        $categories = Job::select('job_category')->distinct()->pluck('job_category');
        $jobTypes = Job::select('job_type')->distinct()->pluck('job_type');

        return view('find_job', compact('jobs', 'categories', 'jobTypes'));
    }

    public function Companies()
    {
        $companies = employer::withCount('jobs')->paginate(12);
        // Assuming we have categories, or we can just use industry distinct values
        $industries = employer::select('service')->distinct()->limit(8)->pluck('service'); // 'service' seems to be industry in the factory
        return view('companies', compact('companies', 'industries'));
    }
    
    public function JobDetails(Request $request, $jobId)
    {
        $jobDetails=Job::findOrFail($jobId);

        $createdAt = Carbon::parse($jobDetails->created_at);
        $timeAgo = $createdAt->diffForHumans();
        $jobDetails->timeAgo = $timeAgo; 

        $recruter=employer::findOrFail($jobDetails->employer_id)->name;
        return view('job_details',compact('jobDetails','recruter'));
    }


    public function ApplyJob(Request $request)
    {
       $job_id= $request->input('JobId');
       $resume=candidate::findOrFail($request->session()->get('id'))->resume;
       $applyJob=new application;
       $applyJob->candidate_id=$request->session()->get('id');
       $applyJob->job_id=$job_id;
       $applyJob->resume=$resume;
       $applyJob->status="pending";
       $applyJob->save();
       return redirect("/")->with('success',"the job is applied successfully!!");
    }
    

   //----------------------------------------------------------------------------
    public function SignInview()
    {
       return view('signup_signin.sign_in');
    }
    //---------------------------------------------------------------------------

    public function SignUpview()
    {
        return view('signup_signin.sign_up');
    }
    //---------------------------------------------------------------------------

    
    public function SignUpStore(Request $request)
    {
        if($request->has('sign_up_candidate')){
            if($request->password !== $request->confirm_pass){
                return response()->json(['error' => 'not matched password']);
            }
            candidate::create([
                'first_name' => $request->name,
                'email' => $request->email,
                'password' => hash('sha256', $request->password),
            ]);
            return redirect()->route('sign_in');
        };
        
        if($request->has('sign_up_recruter')){
            if($request->passwordR !== $request->confirm_passR){
                return response()->json(['error' => 'not matched password']);
            }
            employer::create([
                'name' => $request->nameR,
                'email_adress' => $request->emailR,
                'password' => hash('sha256', $request->passwordR),
            ]);
            return redirect()->route('sign_in');
        };
    }
    // --------------------------------------------------------


    public function signInStore(Request $request)
    {
        $candidate = candidate::where('email', $request->input('email'))->first();
        $employer = employer::where('email_adress', $request->input('email'))->first();
        
        $password = hash('sha256',$request->input('password'));
        
        if ($candidate && $password==$candidate->password ) {
            $request->session()->put('id', $candidate->id);
            $request->session()->put('name', $candidate->first_name);
            $request->session()->put('email', $candidate->email);
            return redirect()->route('candidateProfile');
        } 
        
        if ($employer && $password==$employer->password) {
            $request->session()->put('id', $employer->id);
            $request->session()->put('name', $employer->name);
            $request->session()->put('email', $employer->email_adress);
            return redirect()->route('profile');
        }
        
        return redirect()->route('sign_in',['error' => 'Email or password is incorrect.']);
    }
    //---------------------------------------------------------------------------


   

    //-------------------------------------------------------------------------


    //-------------------------------------------------------------------------

    public function ForgotPassword()
    {
        return view('signup_signin.forgot_password');
    }

    public function CodeVerification()
    {
        return view('signup_signin.code_verification');
    }
    
    public function NewPass()
    {
        return view('signup_signin.new-pass');
    }

    public function SuccessfullChangePass(){
        return view('signup_signin.successfull-change-pass');
    }
    

}