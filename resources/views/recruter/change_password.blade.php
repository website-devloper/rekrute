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
                <h1>Change Password</h1>
                <p>Update your account security credentials</p>
            </div>
        </div>

        @if(session('success'))
            <div class="alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
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
            <form action="{{ route('recruiter.change_password.update') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label>Current Password <span class="required">*</span></label>
                    <input type="password" name="current_password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>New Password <span class="required">*</span></label>
                    <input type="password" name="new_password" class="form-control" required>
                    <small class="hint">Must be at least 8 characters long</small>
                </div>

                <div class="form-group">
                    <label>Confirm New Password <span class="required">*</span></label>
                    <input type="password" name="new_password_confirmation" class="form-control" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary-dash">Update Password</button>
                    <a href="{{ route('recruiter.dashboard') }}" class="btn-secondary-dash">Cancel</a>
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

    .dashboard-main { flex: 1; padding: 2rem; max-width: 600px; margin: 0 auto; }

    .page-header { margin-bottom: 2rem; text-align: center; }
    .page-header h1 { font-size: 1.75rem; font-weight: 700; color: var(--gray-900); margin-bottom: 0.25rem; }
    .page-header p { color: var(--gray-500); }

    .alert-success {
        display: flex; align-items: center; gap: 0.75rem;
        background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.2);
        color: var(--success); padding: 1rem 1.25rem; border-radius: 0.75rem; margin-bottom: 1.5rem;
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

    .form-group { margin-bottom: 1.5rem; }
    
    .form-group label {
        display: block; font-size: 0.875rem; font-weight: 500;
        color: var(--gray-700); margin-bottom: 0.5rem;
    }

    .required { color: var(--danger); }
    .hint { color: var(--gray-400); font-size: 0.75rem; display: block; margin-top: 0.25rem; }

    .form-control {
        width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--gray-200);
        border-radius: 0.5rem; font-family: inherit; font-size: 0.9375rem;
        transition: all 0.2s;
    }

    .form-control:focus {
        outline: none; border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }

    .form-actions {
        display: flex; gap: 1rem; margin-top: 2rem;
    }

    .btn-primary-dash {
        padding: 0.75rem 2rem; background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white; border: none; border-radius: 0.625rem; font-weight: 600;
        cursor: pointer; transition: all 0.2s; flex: 1;
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
    }
</style>
@endsection
