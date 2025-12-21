<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\candidate;
use App\Models\application;

class CandidateController extends Controller
{
    public function profile()
    {
        $candidate = Auth::guard('candidate')->user();
        return view('candidate.profile', compact('candidate'));
    }

    public function updateProfile(Request $request)
    {
        $candidate = Auth::guard('candidate')->user();
        $candidate->update($request->all());
        return back()->with('success', 'Profile Updated');
    }

    public function applyJob(Request $request)
    {
        $request->validate([
            'JobId' => 'required|exists:jobs,id',
        ]);

        $candidateId = Auth::guard('candidate')->id();
        $jobId = $request->JobId;

        // Check if already applied
        $exists = application::where('candidate_id', $candidateId)->where('job_id', $jobId)->exists();
        if ($exists) {
            return back()->with('error', 'You have already applied to this job.');
        }

        application::create([
            'candidate_id' => $candidateId,
            'job_id' => $jobId,
            'resume' => Auth::guard('candidate')->user()->resume ?? 'default_resume.pdf', // Fallback or handle upload separately
            'status' => 'pending'
        ]);

        return back()->with('success', 'Application submitted successfully!');
    }

    public function appliedJobs()
    {
        $candidateId = Auth::guard('candidate')->id();
        $applications = application::where('candidate_id', $candidateId)->with('job')->get(); // Assumes relationship exists
        return view('candidate.applied_jobs', compact('applications'));
    }
}