<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\candidate;
use App\Models\application;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function candidateProfile(Request $request)
    {
        $FindCand=candidate::findOrFail($request->session()->get('id'));
        return view('candidate.candidate_profile',compact('FindCand'));
    }

    public function UpdatecandidateProfile(Request $request)
    {
        $CforUpdate = candidate::findOrFail($request->session()->get('id'));
        $CforUpdate->first_name = $request->firstName;
        $CforUpdate->last_name = $request->LastName;
        $CforUpdate->email = $request->Email;
        $CforUpdate->job_title = $request->jobtitle;
        $CforUpdate->price_wish = $request->salaryWish;
        $CforUpdate->gender = $request->Gender;
        $CforUpdate->city = $request->city;
        $CforUpdate->street = $request->street;
        $CforUpdate->zip_code = $request->zip;
        $CforUpdate->country = $request->country;
        $CforUpdate->phone = $request->phone;
        $CforUpdate->about = $request->about;



    // if ($request->hasFile('resume')) {
    //     $request->file('resume')->store('resume');
    //     $CforUpdate->resume=$request->file('resume');
    // }

    if ($request->hasFile('resume')) {
        $file_resume = $request->file('resume');
        $file_name_resume = time() . '.' . $file_resume->getClientOriginalExtension();
        $path = 'resume';
        $file_resume->move($path, $file_name_resume);
        $CforUpdate->resume = $file_name_resume;
    }
    
    $CforUpdate->save();
    

    if ($request->hasFile('logo')) {
        $file_extension_image = $request->file('logo')->getClientOriginalExtension();
        sleep(0.1);
        $file_name_image = time() . '.' . $file_extension_image;
        $path = 'CandidateImage';
        $request->file('logo')->move($path, $file_name_image);
        $CforUpdate->img_url= $file_name_image;
    }

        $CforUpdate->save();
        return redirect()->route('candidateProfile', ['message' => 'the profile is updated successfully!', 'CforUpdate' => $CforUpdate]);
    }
    //-----------------------------------------------

    public function AppliedJob(Request $request)
    {
        $FindCand=candidate::findOrFail($request->session()->get('id'));
        return view('candidate.applied_job',compact('FindCand'));

    }
    //-----------------------------------------------

    public function jobAlert(Request $request)
    {
        $FindCand=candidate::findOrFail($request->session()->get('id'));
        return view('candidate.job_alert',compact('FindCand'));
    }
    //-----------------------------------------------

    public function cvManager(Request $request)
    {
        $FindCand=candidate::findOrFail($request->session()->get('id'));
        return view('candidate.cv_manager',compact('FindCand'));

    }
    //-----------------------------------------------


    public function changePasswordC(Request $request)
    {
        $FindCand=candidate::findOrFail($request->session()->get('id'));
        return view('candidate.change-password',compact('FindCand'));
    }

   //-----------------------------------------------------------------------

    public function ChangePasswordCRequest(Request $request){

        $FindEmp=candidate::findOrFail($request->session()->get('id'));
        $hashOldPass=hash('sha256',$request->input('oldPassC'));
        $hashNewPass=hash('sha256',$request->input('NewPassC'));

        if($hashOldPass== $FindEmp->password && $request->NewPassC==$request->confirmationC){
            $FindEmp->password=$hashNewPass;
            $FindEmp->save();
            return redirect()->route('change-passwordC',['success'=>'the password is changed successfully']);
        }
        return redirect()->route('change-passwordC');
    }

    //-----------------------------------------------------------------

    //------------------------------------------------



    public function logOutC(Request $request)
    {
        $request->session()->pull('id');
        $request->session()->pull('name');
        $request->session()->pull('email');
        
        return redirect('/');
    }


}