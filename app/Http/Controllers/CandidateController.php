<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\candidate;
use App\Models\application;
use App\Models\Job;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    /**
     * Display the candidate dashboard with statistics
     */
    public function dashboard()
    {
        $candidate = Auth::guard('candidate')->user();
        $candidateId = $candidate->id;
        
        // Get statistics
        $totalApplications = application::where('candidate_id', $candidateId)->count();
        $pendingApplications = application::where('candidate_id', $candidateId)->where('status', 'pending')->count();
        $acceptedApplications = application::where('candidate_id', $candidateId)->where('status', 'accepted')->count();
        $rejectedApplications = application::where('candidate_id', $candidateId)->where('status', 'rejected')->count();
        
        // Recent applications
        $recentApplications = application::where('candidate_id', $candidateId)
            ->with('job.employer')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        // Recommended jobs (based on candidate's job title or random for now)
        $recommendedJobs = Job::with('employer')
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
        
        // Profile completion percentage
        $profileCompletion = $this->calculateProfileCompletion($candidate);
        
        return view('candidate.dashboard', compact(
            'candidate',
            'totalApplications',
            'pendingApplications',
            'acceptedApplications',
            'rejectedApplications',
            'recentApplications',
            'recommendedJobs',
            'profileCompletion'
        ));
    }

    /**
     * Calculate profile completion percentage
     */
    private function calculateProfileCompletion($candidate)
    {
        $fields = [
            'first_name', 'last_name', 'email', 'phone', 'city', 
            'country', 'job_title', 'about', 'resume', 'img_url'
        ];
        
        $filled = 0;
        foreach ($fields as $field) {
            if (!empty($candidate->$field)) {
                $filled++;
            }
        }
        
        return round(($filled / count($fields)) * 100);
    }

    /**
     * Display the candidate profile edit form
     */
    public function profile()
    {
        $candidate = Auth::guard('candidate')->user();
        return view('candidate.profile', compact('candidate'));
    }

    /**
     * Update candidate profile
     */
    public function updateProfile(Request $request)
    {
        $candidate = Auth::guard('candidate')->user();
        
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'job_title' => 'nullable|string|max:255',
            'about' => 'nullable|string',
            'resume' => 'nullable|mimes:pdf,doc,docx|max:5120',
            'img_url' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        $data = $request->except(['resume', 'img_url']);

        // Handle resume upload
        if ($request->hasFile('resume')) {
            // Delete old resume if exists
            if ($candidate->resume && Storage::disk('public')->exists($candidate->resume)) {
                Storage::disk('public')->delete($candidate->resume);
            }
            $path = $request->file('resume')->store('resumes', 'public');
            $data['resume'] = $path;
        }
        
        // Handle profile image upload
        if ($request->hasFile('img_url')) {
            if ($candidate->img_url && Storage::disk('public')->exists($candidate->img_url)) {
                Storage::disk('public')->delete($candidate->img_url);
            }
            $imagePath = $request->file('img_url')->store('avatars', 'public');
            $data['img_url'] = $imagePath;
        }

        $candidate->update($data);
        return back()->with('success', 'Profile updated successfully!');
    }

    /**
     * Apply for a job
     */
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

        $candidate = Auth::guard('candidate')->user();
        
        application::create([
            'candidate_id' => $candidateId,
            'job_id' => $jobId,
            'resume' => $candidate->resume ?? null,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Application submitted successfully!');
    }

    /**
     * Display all applied jobs with filtering
     */
    public function appliedJobs(Request $request)
    {
        $candidateId = Auth::guard('candidate')->id();
        
        $query = application::where('candidate_id', $candidateId)->with('job.employer');
        
        // Filter by status
        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }
        
        $applications = $query->orderBy('created_at', 'desc')->paginate(10);
        
        // Get counts for each status
        $statusCounts = [
            'all' => application::where('candidate_id', $candidateId)->count(),
            'pending' => application::where('candidate_id', $candidateId)->where('status', 'pending')->count(),
            'accepted' => application::where('candidate_id', $candidateId)->where('status', 'accepted')->count(),
            'rejected' => application::where('candidate_id', $candidateId)->where('status', 'rejected')->count(),
        ];
        
        return view('candidate.applied_jobs', compact('applications', 'statusCounts'));
    }

    /**
     * Withdraw an application
     */
    public function withdrawApplication($applicationId)
    {
        $candidateId = Auth::guard('candidate')->id();
        
        $application = application::where('id', $applicationId)
            ->where('candidate_id', $candidateId)
            ->where('status', 'pending')
            ->firstOrFail();
        
        $application->delete();
        
        return back()->with('success', 'Application withdrawn successfully.');
    }

    /**
     * Display saved jobs
     */
    public function savedJobs()
    {
        $candidate = Auth::guard('candidate')->user();
        // This would require a saved_jobs pivot table - for now return empty
        return view('candidate.saved_jobs', ['savedJobs' => collect([])]);
    }

    /**
     * Change password
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $candidate = Auth::guard('candidate')->user();
        
        // Verify current password
        if (hash('sha256', $request->current_password) !== $candidate->password) {
            return back()->with('error', 'Current password is incorrect.');
        }
        
        $candidate->password = hash('sha256', $request->new_password);
        $candidate->save();
        
        return back()->with('success', 'Password changed successfully!');
    }
}