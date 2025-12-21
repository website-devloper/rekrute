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
        ]);

        Job::create([
            'title' => $request->title,
            'employer_id' => Auth::guard('employer')->id(),
            'description' => $request->description,
            'city' => $request->city ?? 'Remote',
            'job_type' => $request->job_type,
            'minimum_salary' => $request->min_salary ?? 0,
            'maximum_salary' => $request->max_salary ?? 0,
            'job_category' => 'General',
            'experience' => 'Entry Level',
            'country' => 'Unknown',
            'job_responsabilities' => 'TBD',
            'requirements' => 'TBD',
        ]);

        return redirect()->route('dashboard.recruiter')->with('success', 'Job Posted Successfully');
    }

    public function viewApplications($jobId)
    {
        $job = Job::where('employer_id', Auth::guard('employer')->id())->findOrFail($jobId);
        $applications = application::where('job_id', $jobId)->with('candidate')->get();
        
        return view('recruter.applications', compact('job', 'applications'));
    }

    public function updateApplicationStatus(Request $request, $applicationId)
    {
        $application = application::whereHas('job', function($query) {
            $query->where('employer_id', Auth::guard('employer')->id());
        })->findOrFail($applicationId);

        $request->validate([
            'status' => 'required|in:pending,accepted,rejected'
        ]);

        $application->update(['status' => $request->status]);

        return back()->with('success', 'Application status updated to ' . $request->status);
    }

    public function editProfile()
    {
        $employer = Auth::guard('employer')->user();
        return view('recruter.profile', compact('employer'));
    }

    public function updateProfile(Request $request)
    {
        $employer = Auth::guard('employer')->user();
        $data = $request->all();

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $data['logo_url'] = $path;
        }

        $employer->update($data);
        return back()->with('success', 'Profile updated successfully');
    }
}
