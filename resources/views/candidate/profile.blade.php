@extends('template')

@section('content')
<div class="dashboard-wrapper">
    <!-- Sidebar -->
    <aside class="dashboard-sidebar">
        <div class="sidebar-header">
            <div class="user-avatar">
                @if($candidate->img_url)
                    <img src="{{ asset('storage/' . $candidate->img_url) }}" alt="{{ $candidate->first_name }}">
                @else
                    <span>{{ substr($candidate->first_name, 0, 1) }}{{ substr($candidate->last_name, 0, 1) }}</span>
                @endif
            </div>
            <h3>{{ $candidate->first_name }} {{ $candidate->last_name }}</h3>
            <p>{{ $candidate->job_title ?? 'Job Seeker' }}</p>
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('candidate.dashboard') }}" class="nav-link"><i class="fas fa-th-large"></i> Dashboard</a>
            <a href="{{ route('candidate.profile') }}" class="nav-link active"><i class="fas fa-user"></i> My Profile</a>
            <a href="{{ route('candidate.applied_jobs') }}" class="nav-link"><i class="fas fa-briefcase"></i> Applied Jobs</a>
            <a href="{{ route('jobs') }}" class="nav-link"><i class="fas fa-search"></i> Find Jobs</a>
            <a href="{{ route('candidate.change_password') }}" class="nav-link"><i class="fas fa-lock"></i> Change Password</a>
            <hr class="nav-divider">
            <a href="{{ route('logout') }}" class="nav-link text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="dashboard-main">
        <div class="page-header">
            <div>
                <h1>My Profile</h1>
                <p>Manage your personal information and resume</p>
            </div>
        </div>

        @if(session('success'))
            <div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
        @endif

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
            <form action="{{ route('candidate.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-section">
                    <h3>Personal Information</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label>First Name <span class="required">*</span></label>
                            <input type="text" name="first_name" class="form-control" value="{{ $candidate->first_name }}" required>
                        </div>
                        <div class="form-group">
                            <label>Last Name <span class="required">*</span></label>
                            <input type="text" name="last_name" class="form-control" value="{{ $candidate->last_name }}" required>
                        </div>

                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" value="{{ $candidate->email }}" readonly style="background-color: #f9fafb;">
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phone" class="form-control" value="{{ $candidate->phone }}">
                        </div>

                        <div class="form-group">
                            <label>Job Title</label>
                            <input type="text" name="job_title" class="form-control" value="{{ $candidate->job_title }}" placeholder="e.g. Software Engineer">
                        </div>

                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" class="form-control" value="{{ $candidate->city }}">
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3>Professional Summary</h3>
                    <div class="form-group full-width">
                        <label>About Me</label>
                        <textarea name="about" class="form-control" rows="5" placeholder="Tell us about your experience and skills...">{{ $candidate->about }}</textarea>
                    </div>
                </div>

                <div class="form-section">
                    <h3>Documents & Avatar</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Profile Picture</label>
                            <div class="file-input-wrapper">
                                <input type="file" name="img_url" class="form-control" accept="image/*">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Resume (PDF, DOCX)</label>
                            <div class="file-input-wrapper">
                                <input type="file" name="resume" class="form-control" accept=".pdf,.doc,.docx">
                                @if($candidate->resume)
                                    <div class="current-file">
                                        <i class="fas fa-file-pdf"></i>
                                        <a href="{{ asset('storage/' . $candidate->resume) }}" target="_blank">View Current Resume</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary-dash">Save Changes</button>
                    <a href="{{ route('candidate.dashboard') }}" class="btn-secondary-dash">Cancel</a>
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

    .user-avatar {
        width: 80px; height: 80px; border-radius: 50%;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 1rem; font-size: 1.5rem; font-weight: 700; color: white; overflow: hidden;
    }

    .user-avatar img { width: 100%; height: 100%; object-fit: cover; }

    .sidebar-header h3 { font-size: 1.125rem; font-weight: 700; color: var(--gray-900); margin-bottom: 0.25rem; }
    .sidebar-header p { font-size: 0.875rem; color: var(--gray-500); }

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

    .alert-success {
        background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.2);
        color: var(--success); padding: 1rem; border-radius: 0.75rem; margin-bottom: 1.5rem;
    }

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

    .form-control {
        width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--gray-200);
        border-radius: 0.5rem; font-family: inherit; font-size: 0.9375rem;
        transition: all 0.2s;
    }

    .form-control:focus {
        outline: none; border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }

    .current-file {
        margin-top: 0.5rem; font-size: 0.875rem;
        display: flex; align-items: center; gap: 0.5rem; color: var(--primary);
    }
    .current-file a { color: var(--primary); text-decoration: none; font-weight: 500; }

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
