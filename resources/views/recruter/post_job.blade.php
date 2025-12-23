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
            <a href="{{ route('recruiter.jobs') }}" class="nav-link"><i class="fas fa-briefcase"></i> Manage Jobs</a>
            <a href="{{ route('recruiter.post_job') }}" class="nav-link active"><i class="fas fa-plus-circle"></i> Post New Job</a>
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
                <h1>Post a New Job</h1>
                <p>Create a compelling job listing to attract the best talent</p>
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
            <form action="{{ route('recruiter.jobs.store') }}" method="POST">
                @csrf
                
                <div class="form-section">
                    <h3>Job Details</h3>
                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label>Job Title <span class="required">*</span></label>
                            <input type="text" name="title" class="form-control" placeholder="e.g. Senior Full Stack Developer" value="{{ old('title') }}" required>
                        </div>

                        <div class="form-group">
                            <label>Job Category <span class="required">*</span></label>
                            <select name="job_category" class="form-select" required>
                                <option value="">Select Category</option>
                                <option value="IT & Software" {{ old('job_category') == 'IT & Software' ? 'selected' : '' }}>IT & Software</option>
                                <option value="Marketing" {{ old('job_category') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                                <option value="Sales" {{ old('job_category') == 'Sales' ? 'selected' : '' }}>Sales</option>
                                <option value="Design" {{ old('job_category') == 'Design' ? 'selected' : '' }}>Design</option>
                                <option value="Finance" {{ old('job_category') == 'Finance' ? 'selected' : '' }}>Finance</option>
                                <option value="HR" {{ old('job_category') == 'HR' ? 'selected' : '' }}>HR</option>
                                <option value="Customer Support" {{ old('job_category') == 'Customer Support' ? 'selected' : '' }}>Customer Support</option>
                                <option value="Other" {{ old('job_category') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Job Type <span class="required">*</span></label>
                            <select name="job_type" class="form-select" required>
                                <option value="Full Time" {{ old('job_type') == 'Full Time' ? 'selected' : '' }}>Full Time</option>
                                <option value="Part Time" {{ old('job_type') == 'Part Time' ? 'selected' : '' }}>Part Time</option>
                                <option value="Contract" {{ old('job_type') == 'Contract' ? 'selected' : '' }}>Contract</option>
                                <option value="Remote" {{ old('job_type') == 'Remote' ? 'selected' : '' }}>Remote</option>
                                <option value="Internship" {{ old('job_type') == 'Internship' ? 'selected' : '' }}>Internship</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3>Location & Salary</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label>City <span class="required">*</span></label>
                            <input type="text" name="city" class="form-control" placeholder="e.g. Casablanca" value="{{ old('city') }}" required>
                        </div>

                        <div class="form-group">
                            <label>Country <span class="required">*</span></label>
                            <input type="text" name="country" class="form-control" placeholder="e.g. Morocco" value="{{ old('country') }}" required>
                        </div>

                        <div class="form-group">
                            <label>Min Salary (DH) <span class="required">*</span></label>
                            <input type="number" name="minimum_salary" class="form-control" placeholder="e.g. 5000" value="{{ old('minimum_salary') }}" required>
                        </div>

                        <div class="form-group">
                            <label>Max Salary (DH) <span class="required">*</span></label>
                            <input type="number" name="maximum_salary" class="form-control" placeholder="e.g. 8000" value="{{ old('maximum_salary') }}" required>
                        </div>
                        
                        <div class="form-group full-width">
                            <label>Experience Needed</label>
                            <input type="text" name="experience" class="form-control" placeholder="e.g. 3-5 years" value="{{ old('experience') }}">
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3>Description & Requirements</h3>
                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label>Job Description <span class="required">*</span></label>
                            <textarea name="description" class="form-control" rows="6" placeholder="Describe the role, the team, and what the candidate will be doing..." required>{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group full-width">
                            <label>Key Responsibilities</label>
                            <textarea name="job_responsabilities" class="form-control" rows="4" placeholder="List the main responsibilities...">{{ old('job_responsabilities') }}</textarea>
                        </div>

                        <div class="form-group full-width">
                            <label>Requirements <span class="required">*</span></label>
                            <textarea name="requirements" class="form-control" rows="4" placeholder="List the required skills, education, and experience..." required>{{ old('requirements') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary-dash">Post Job</button>
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
        margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;
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