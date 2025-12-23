@extends('template')

@section('content')
<div class="dashboard-wrapper">
    <!-- Sidebar -->
    <aside class="dashboard-sidebar">
        <div class="sidebar-header">
            <div class="company-logo">
                @if($employer->logo_url)
                    <img src="{{ asset('image/' . $employer->logo_url) }}" alt="{{ $employer->name }}">
                @else
                    <i class="fas fa-building"></i>
                @endif
            </div>
            <h3>{{ $employer->name }}</h3>
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('recruiter.dashboard') }}" class="nav-link"><i class="fas fa-th-large"></i> Dashboard</a>
            <a href="{{ route('recruiter.jobs') }}" class="nav-link active"><i class="fas fa-briefcase"></i> Manage Jobs</a>
            <a href="{{ route('recruiter.post_job') }}" class="nav-link"><i class="fas fa-plus-circle"></i> Post New Job</a>
            <a href="{{ route('recruiter.applications') }}" class="nav-link"><i class="fas fa-users"></i> Applications</a>
            <a href="{{ route('recruiter.candidates') }}" class="nav-link"><i class="fas fa-file-alt"></i> Browse Resumes</a>
            <hr class="nav-divider">
            <a href="{{ route('recruiter.profile') }}" class="nav-link"><i class="fas fa-building"></i> Company Profile</a>
            <a href="{{ route('logout') }}" class="nav-link text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="dashboard-main">
        <div class="page-header">
            <div>
                <h1>Edit Job Posting</h1>
                <p>Update job details and requirements</p>
            </div>
        </div>

        @if($errors->any())
            <div class="alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-card">
            <form action="{{ route('recruiter.job.update', $job->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-section">
                    <h3>Job Details</h3>
                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label>Job Title <span class="required">*</span></label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $job->title) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Job Category <span class="required">*</span></label>
                            <select name="job_category" class="form-select" required>
                                <option value="">Select Category</option>
                                @foreach(['IT & Software', 'Marketing', 'Sales', 'Design', 'Finance', 'HR', 'Customer Support', 'Other'] as $cat)
                                    <option value="{{ $cat }}" {{ old('job_category', $job->job_category) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Job Type <span class="required">*</span></label>
                            <select name="job_type" class="form-select" required>
                                @foreach(['Full Time', 'Part Time', 'Contract', 'Remote', 'Internship'] as $type)
                                    <option value="{{ $type }}" {{ old('job_type', $job->job_type) == $type ? 'selected' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3>Location & Salary</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label>City <span class="required">*</span></label>
                            <input type="text" name="city" class="form-control" value="{{ old('city', $job->city) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Country <span class="required">*</span></label>
                            <input type="text" name="country" class="form-control" value="{{ old('country', $job->country) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Min Salary (DH) <span class="required">*</span></label>
                            <input type="number" name="minimum_salary" class="form-control" value="{{ old('minimum_salary', $job->minimum_salary) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Max Salary (DH) <span class="required">*</span></label>
                            <input type="number" name="maximum_salary" class="form-control" value="{{ old('maximum_salary', $job->maximum_salary) }}" required>
                        </div>
                        
                        <div class="form-group full-width">
                            <label>Experience Needed</label>
                            <input type="text" name="experience" class="form-control" value="{{ old('experience', $job->experience) }}">
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3>Description & Requirements</h3>
                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label>Job Description <span class="required">*</span></label>
                            <textarea name="description" class="form-control" rows="6" required>{{ old('description', $job->description) }}</textarea>
                        </div>

                        <div class="form-group full-width">
                            <label>Key Responsibilities</label>
                            <textarea name="job_responsabilities" class="form-control" rows="4">{{ old('job_responsabilities', $job->job_responsabilities) }}</textarea>
                        </div>

                        <div class="form-group full-width">
                            <label>Requirements <span class="required">*</span></label>
                            <textarea name="requirements" class="form-control" rows="4" required>{{ old('requirements', $job->requirements) }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary-dash">Update Job</button>
                    <a href="{{ route('recruiter.jobs') }}" class="btn-secondary-dash">Cancel</a>
                </div>
            </form>
        </div>
    </main>
</div>

<style>
    .dashboard-wrapper { display: flex; min-height: calc(100vh - 80px); background: var(--gray-50); padding-top: 80px; }
    
    .dashboard-sidebar {
        width: 280px; background: white; border-right: 1px solid var(--gray-100);
        padding: 2rem; position: sticky; top: 80px; height: calc(100vh - 80px); overflow-y: auto;
    }
    
    .sidebar-header { text-align: center; padding-bottom: 1.5rem; border-bottom: 1px solid var(--gray-100); margin-bottom: 1.5rem; }
    
    .company-logo {
        width: 80px; height: 80px; border-radius: 1rem;
        background: var(--gray-100); display: flex; align-items: center; justify-content: center;
        margin: 0 auto 1rem; font-size: 2rem; color: var(--gray-400); overflow: hidden;
    }
    .company-logo img { width: 100%; height: 100%; object-fit: contain; padding: 0.5rem; }
    .sidebar-header h3 { font-size: 1rem; font-weight: 700; color: var(--gray-900); }
    
    .sidebar-nav { display: flex; flex-direction: column; gap: 0.375rem; }
    
    .nav-link {
        display: flex; align-items: center; gap: 0.75rem;
        padding: 0.75rem 1rem; color: var(--gray-600);
        text-decoration: none; border-radius: 0.625rem; font-weight: 500; transition: all 0.2s;
    }
    
    .nav-link:hover { background: var(--gray-50); color: var(--gray-900); }
    .nav-link.active { background: var(--primary); color: white; }
    .nav-link.text-danger { color: var(--danger); }
    .nav-divider { margin: 1rem 0; border-color: var(--gray-100); }
    
    .dashboard-main { flex: 1; padding: 2rem; max-width: 1000px; margin: 0 auto; }
    
    .page-header { margin-bottom: 2rem; }
    .page-header h1 { font-size: 1.75rem; font-weight: 700; color: var(--gray-900); margin-bottom: 0.25rem; }
    .page-header p { color: var(--gray-500); }
    
    .alert-danger {
        background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2);
        color: var(--danger); padding: 1rem; border-radius: 0.75rem; margin-bottom: 1.5rem;
    }
    .alert-danger ul { margin: 0; padding-left: 1.5rem; }
    
    .form-card {
        background: white; border-radius: 1rem; border: 1px solid var(--gray-100);
        padding: 2rem;
    }
    
    .form-section { margin-bottom: 2rem; padding-bottom: 2rem; border-bottom: 1px solid var(--gray-50); }
    .form-section:last-child { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }
    
    .form-section h3 {
        font-size: 1.125rem; font-weight: 600; color: var(--gray-900);
        margin-bottom: 1.5rem;
    }
    
    .form-grid {
        display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;
    }
    
    .form-group.full-width { grid-column: 1 / -1; }
    
    .form-group label {
        display: block; font-size: 0.875rem; font-weight: 500;
        color: var(--gray-700); margin-bottom: 0.5rem;
    }
    
    .required { color: var(--danger); }
    
    .form-control, .form-select {
        width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--gray-200);
        border-radius: 0.5rem; font-family: inherit; font-size: 0.9375rem;
        transition: all 0.2s;
    }
    
    .form-control:focus, .form-select:focus {
        outline: none; border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }
    
    .form-actions {
        display: flex; gap: 1rem; margin-top: 2rem; padding-top: 2rem;
        border-top: 1px solid var(--gray-100);
    }
    
    .btn-primary-dash {
        padding: 0.75rem 2rem; background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white; border: none; border-radius: 0.625rem; font-weight: 600;
        cursor: pointer; transition: all 0.2s;
    }
    .btn-primary-dash:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3); }
    
    .btn-secondary-dash {
        padding: 0.75rem 2rem; background: var(--gray-100);
        color: var(--gray-700); border: none; border-radius: 0.625rem;
        font-weight: 600; cursor: pointer; text-decoration: none;
        transition: all 0.2s; display: inline-flex; align-items: center; justify-content: center;
    }
    .btn-secondary-dash:hover { background: var(--gray-200); }

    @media (max-width: 768px) {
        .dashboard-sidebar { display: none; }
        .form-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection
