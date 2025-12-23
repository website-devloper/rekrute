<?php

namespace App\Http\Controllers;

use App\Models\employer;
use App\Models\candidate;
use App\Models\Job;
use App\Models\application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class RecruiterController extends Controller
{
    /**
     * Display recruiter dashboard with statistics
     */
    public function dashboard()
    {
        $employer = Auth::guard('employer')->user();
        $employerId = $employer->id;
        
        // Get job statistics
        $totalJobs = Job::where('employer_id', $employerId)->count();
        $activeJobs = Job::where('employer_id', $employerId)->where('status', 'active')->count();
        
        // Get application statistics
        $jobIds = Job::where('employer_id', $employerId)->pluck('id');
        $totalApplications = application::whereIn('job_id', $jobIds)->count();
        $pendingApplications = application::whereIn('job_id', $jobIds)->where('status', 'pending')->count();
        $acceptedApplications = application::whereIn('job_id', $jobIds)->where('status', 'accepted')->count();
        $rejectedApplications = application::whereIn('job_id', $jobIds)->where('status', 'rejected')->count();
        
        // Recent applications
        $recentApplications = application::whereIn('job_id', $jobIds)
            ->with(['candidate', 'job'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        // Jobs with most applications
        $topJobs = Job::where('employer_id', $employerId)
            ->withCount('applications')
            ->orderBy('applications_count', 'desc')
            ->limit(5)
            ->get();
        
        // Application trend (last 7 days)
        $applicationTrend = application::whereIn('job_id', $jobIds)
            ->where('created_at', '>=', now()->subDays(7))
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        
        return view('recruter.dashboard', compact(
            'employer',
            'totalJobs',
            'activeJobs',
            'totalApplications',
            'pendingApplications',
            'acceptedApplications',
            'rejectedApplications',
            'recentApplications',
            'topJobs',
            'applicationTrend'
        ));
    }

    /**
     * Display company profile edit form
     */
    public function editProfile()
    {
        $employer = Auth::guard('employer')->user();
        return view('recruter.company_profile', compact('employer'));
    }

    /**
     * Update company profile
     */
    public function updateProfile(Request $request)
    {
        $employer = Auth::guard('employer')->user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email_adress' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'website_url' => 'nullable|url|max:255',
            'service' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:100',
            'company_bg' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
        
        $data = $request->except(['logo']);
        
        // Handle logo upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('image'), $filename);
            $data['logo_url'] = $filename;
        }
        
        $employer->update($data);
        
        return back()->with('success', 'Company profile updated successfully!');
    }

    /**
     * Display post job form
     */
    public function postJob()
    {
        $employer = Auth::guard('employer')->user();
        return view('recruter.post_job', compact('employer'));
    }

    /**
     * Store a new job
     */
    public function storeJob(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'job_type' => 'required|string',
            'job_category' => 'required|string',
            'minimum_salary' => 'required|numeric|min:0',
            'maximum_salary' => 'required|numeric|gte:minimum_salary',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'description' => 'required|string',
            'requirements' => 'required|string',
        ]);
        
        $employer = Auth::guard('employer')->user();
        
        Job::create([
            'title' => $request->title,
            'job_type' => $request->job_type,
            'job_category' => $request->job_category,
            'experience' => $request->experience ?? 'Not specified',
            'minimum_salary' => $request->minimum_salary,
            'maximum_salary' => $request->maximum_salary,
            'city' => $request->city,
            'country' => $request->country,
            'description' => $request->description,
            'job_responsabilities' => $request->job_responsabilities ?? '',
            'requirements' => $request->requirements,
            'employer_id' => $employer->id,
            'status' => 'active'
        ]);
        
        return redirect()->route('recruiter.jobs')->with('success', 'Job posted successfully!');
    }

    /**
     * Display all jobs by this employer
     */
    public function manageJobs(Request $request)
    {
        $employer = Auth::guard('employer')->user();
        
        $query = Job::where('employer_id', $employer->id)->withCount('applications');
        
        // Filter by status
        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }
        
        $jobs = $query->orderBy('created_at', 'desc')->paginate(10);
        
        return view('recruter.manage_jobs', compact('employer', 'jobs'));
    }

    /**
     * Edit a job
     */
    public function editJob($jobId)
    {
        $employer = Auth::guard('employer')->user();
        $job = Job::where('id', $jobId)->where('employer_id', $employer->id)->firstOrFail();
        
        return view('recruter.edit_job', compact('employer', 'job'));
    }

    /**
     * Update a job
     */
    public function updateJob(Request $request, $jobId)
    {
        $employer = Auth::guard('employer')->user();
        $job = Job::where('id', $jobId)->where('employer_id', $employer->id)->firstOrFail();
        
        $request->validate([
            'title' => 'required|string|max:255',
            'job_type' => 'required|string',
            'minimum_salary' => 'required|numeric|min:0',
            'maximum_salary' => 'required|numeric|gte:minimum_salary',
            'description' => 'required|string',
        ]);
        
        $job->update($request->all());
        
        return back()->with('success', 'Job updated successfully!');
    }

    /**
     * Delete a job
     */
    public function deleteJob($jobId)
    {
        $employer = Auth::guard('employer')->user();
        $job = Job::where('id', $jobId)->where('employer_id', $employer->id)->firstOrFail();
        
        // Delete related applications first
        application::where('job_id', $jobId)->delete();
        $job->delete();
        
        return back()->with('success', 'Job deleted successfully.');
    }

    /**
     * Toggle job status (active/paused)
     */
    public function toggleJobStatus($jobId)
    {
        $employer = Auth::guard('employer')->user();
        $job = Job::where('id', $jobId)->where('employer_id', $employer->id)->firstOrFail();
        
        $job->status = $job->status === 'active' ? 'paused' : 'active';
        $job->save();
        
        return back()->with('success', 'Job status updated.');
    }

    /**
     * View applications for a specific job
     */
    public function viewApplications($jobId)
    {
        $employer = Auth::guard('employer')->user();
        $job = Job::where('id', $jobId)->where('employer_id', $employer->id)->firstOrFail();
        
        $applications = application::where('job_id', $jobId)
            ->with('candidate')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        
        return view('recruter.applications', compact('employer', 'job', 'applications'));
    }

    /**
     * View all applications across all jobs
     */
    public function allApplications(Request $request)
    {
        $employer = Auth::guard('employer')->user();
        $jobIds = Job::where('employer_id', $employer->id)->pluck('id');
        
        $query = application::whereIn('job_id', $jobIds)->with(['candidate', 'job']);
        
        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }
        
        if ($request->has('job_id') && $request->job_id != 'all') {
            $query->where('job_id', $request->job_id);
        }
        
        $applications = $query->orderBy('created_at', 'desc')->paginate(15);
        $jobs = Job::where('employer_id', $employer->id)->get();
        
        return view('recruter.all_applications', compact('employer', 'applications', 'jobs'));
    }

    /**
     * Update application status
     */
    public function updateApplicationStatus(Request $request, $applicationId)
    {
        $request->validate([
            'status' => 'required|in:pending,reviewed,shortlisted,accepted,rejected'
        ]);
        
        $employer = Auth::guard('employer')->user();
        $jobIds = Job::where('employer_id', $employer->id)->pluck('id');
        
        $application = application::where('id', $applicationId)
            ->whereIn('job_id', $jobIds)
            ->firstOrFail();
        
        $application->status = $request->status;
        $application->save();
        
        return back()->with('success', 'Application status updated.');
    }

    /**
     * View candidate profile/resume
     */
    public function viewCandidate($candidateId)
    {
        $employer = Auth::guard('employer')->user();
        $candidate = candidate::findOrFail($candidateId);
        
        return view('recruter.view_candidate', compact('employer', 'candidate'));
    }

    /**
     * Browse all candidates (resume database)
     */
    public function browseResumes(Request $request)
    {
        $employer = Auth::guard('employer')->user();
        
        $query = candidate::whereNotNull('resume');
        
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('job_title', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%");
            });
        }
        
        $candidates = $query->orderBy('created_at', 'desc')->paginate(12);
        
        return view('recruter.resume', compact('employer', 'candidates'));
    }

    /**
     * Change password form
     */
    public function changePasswordForm()
    {
        $employer = Auth::guard('employer')->user();
        return view('recruter.change_password', compact('employer'));
    }

    /**
     * Update password
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);
        
        $employer = Auth::guard('employer')->user();
        
        if (hash('sha256', $request->current_password) !== $employer->password) {
            return back()->with('error', 'Current password is incorrect.');
        }
        
        $employer->password = hash('sha256', $request->new_password);
        $employer->save();
        
        return back()->with('success', 'Password changed successfully!');
    }
}
