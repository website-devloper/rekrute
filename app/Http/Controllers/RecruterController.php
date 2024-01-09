<?php

namespace App\Http\Controllers;
use App\Models\employer;
use App\Models\candidate;

use App\Models\job;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class RecruterController extends Controller
{


    public function EditEmployerIndex (Request $request)
    {
        $FindEmp=employer::findOrFail($request->session()->get('id'));
        return view('recruter.company_profile',compact('FindEmp'));
    }
    // -------------------------------------------------------------
    public function UpdateCompanyProfile(Request $request)
    {
    
        $EforUpdate = employer::findOrFail($request->id);
        $EforUpdate->name = $request->name;
        $EforUpdate->Established_In = $request->Established;
        $EforUpdate->type = $request->Type;
        $EforUpdate->website_url = $request->Website;
        $EforUpdate->city = $request->City;
        $EforUpdate->street = $request->Street;
        $EforUpdate->zip_code = $request->Zip;
        $EforUpdate->country = $request->Country;
        $EforUpdate->phone = $request->Phone;
        $EforUpdate->email_adress = $request->Email;
        $EforUpdate->company_bg = $request->Background;
        $EforUpdate->service = $request->Services;
        $EforUpdate->Expertise = $request->Expertise;

       if ($request->hasFile('filename')) {
        $file_extension_image = $request->file('filename')->getClientOriginalExtension();
        sleep(0.1);
        $file_name_image = time() . '.' . $file_extension_image;
        $path = 'images';
        $request->file('filename')->move($path, $file_name_image);
        $EforUpdate->logo_url= $file_name_image;
    }

        $EforUpdate->save();
        return redirect()->route('profile', ['message' => 'the profile is updated successfully!', 'EforUpdate' => $EforUpdate]);
    }

    //-----------------------------------------------------------------

    public function PostJob(Request $request){
        $FindEmp=employer::findOrFail($request->session()->get('id'));
        return view('recruter.post_job',compact('FindEmp'));
    }
    //-----------------------------------------------------------------

    public function PostJobRequest(Request $request){

           $empId=$request->session()->get('id');
           $job=new job();
           $job-> title=$request->jobTitle;
           $job-> job_type=$request->jobType;
           $job-> job_category=$request->jobCat;
           $job-> experience=$request->Experience;
           $job-> minimum_salary=$request->MinSalary;
           $job-> maximum_salary=$request->MaxSalary;
           $job-> city=$request->city;
           $job-> country=$request->country;
           $job-> description=$request->jobDes;
           $job->job_responsabilities=$request->jobRes;
           $job-> requirements=$request->Requirement;
           $job-> employer_id=$empId;
           $job->save();
        return redirect()->route('profile', ['success' => 'the job is created successfully!']);

    }
    //-----------------------------------------------------------------

    
    public function ManageJobs(Request $request){

        $FindEmp=employer::findOrFail($request->session()->get('id'));
        $jobs=DB::table('jobs')->get();
        return view('recruter.Manage jobs',compact('FindEmp','jobs'));
    }
    
    //----------------------------------------------------------------

    public function resumeDisplayed(Request $request){
        $candidates=candidate::all();
        $FindEmp=employer::findOrFail($request->session()->get('id'));
        return view('recruter.resume',compact('candidates','FindEmp'));
    }

    //-----------------------------------------------------------------

    public function ChangePasswordShow(Request $request){

        $FindEmp=employer::findOrFail($request->session()->get('id'));
        return view('recruter.change_password',compact('FindEmp'));
    }

   //-----------------------------------------------------------------------

    public function ChangePasswordRequest(Request $request){

        $FindEmp=employer::findOrFail($request->session()->get('id'));
        $hashOldPass=hash('sha256',$request->input('oldPass'));
        $hashNewPass=hash('sha256',$request->input('NewPass'));

        if($hashOldPass== $FindEmp->password && $request->NewPass==$request->confirmation){
            $FindEmp->password=$hashNewPass;
            $FindEmp->save();
        }
        return redirect()->route('change-password',['success'=>'the password is changed successfully']);
    }

    //-----------------------------------------------------------------

    public function logOut(Request $request){

        $request->session()->pull('id');
        $request->session()->pull('name');
        $request->session()->pull('email');
        
        return redirect('/');
    }
}
