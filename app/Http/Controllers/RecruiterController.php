<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Models\application;

class RecruiterController extends Controller
{
    public function dashboard()
    {
        $employerId = Auth::guard('employer')->id();
        $jobs = Job::where('employer_id', $employerId)->withCount('applications')->get();
        $applicationsCount = $jobs->sum('applications_count');
        
        return view('recruter.dashboard', compact('jobs', 'applicationsCount'));
    }

    public function postJob()
    {
        return view('recruter.post_job');
    }

    public function storeJob(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'job_type' => 'required',
            // Add other validations
        ]);

        Job::create([
            'title' => $request->title,
            'employer_id' => Auth::guard('employer')->id(),
            // Map other fields
            'description' => $request->description,
            'city' => $request->city ?? 'Remote',
            'job_type' => $request->job_type,
            'minimum_salary' => $request->min_salary ?? 0,
            'maximum_salary' => $request->max_salary ?? 0,
            'job_category' => 'General', // Default for now
            'experience' => 'Entry Level', // Default for now
            'country' => 'Unknown',
            'job_responsabilities' => 'TBD',
            'requirements' => 'TBD',
        ]);

        return redirect()->route('dashboard.recruiter')->with('success', 'Job Posted Successfully');
    }
}
