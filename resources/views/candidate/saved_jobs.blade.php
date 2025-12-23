@extends('template')

@section('content')
<div class="dashboard-wrapper">
    <!-- Sidebar -->
    <aside class="dashboard-sidebar">
        <div class="sidebar-header">
            <div class="user-avatar">
                @if(auth('candidate')->user()->img_url)
                    <img src="{{ asset('storage/' . auth('candidate')->user()->img_url) }}" alt="">
                @else
                    <span>{{ substr(auth('candidate')->user()->first_name, 0, 1) }}</span>
                @endif
            </div>
            <h3>{{ auth('candidate')->user()->first_name }} {{ auth('candidate')->user()->last_name }}</h3>
            <p>{{ auth('candidate')->user()->job_title ?? 'Job Seeker' }}</p>
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('candidate.dashboard') }}" class="nav-link"><i class="fas fa-th-large"></i> Dashboard</a>
            <a href="{{ route('candidate.profile') }}" class="nav-link"><i class="fas fa-user"></i> My Profile</a>
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
                <h1>Saved Jobs</h1>
                <p>Jobs you've bookmarked for later</p>
            </div>
            <a href="{{ route('jobs') }}" class="btn-primary-dash">
                <i class="fas fa-search"></i> Browse Jobs
            </a>
        </div>

        @if(session('success'))
            <div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
        @endif

        <!-- Saved Jobs List -->
        <div class="saved-jobs-list">
            @forelse($savedJobs as $job)
            <!-- If backend implemented, this would iterate over jobs -->
            <div class="job-card" data-aos="fade-up">
               <!-- Job content -->
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-bookmark"></i>
                <h3>No saved jobs yet</h3>
                <p>Bookmark jobs you're interested in while browsing.</p>
                <a href="{{ route('jobs') }}" class="btn-primary-dash">Find Jobs to Save</a>
            </div>
            @endforelse
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

    .dashboard-main { flex: 1; padding: 2rem; max-width: 1000px; }

    .page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; }
    .page-header h1 { font-size: 1.75rem; font-weight: 700; color: var(--gray-900); margin-bottom: 0.25rem; }
    .page-header p { color: var(--gray-500); }

    .btn-primary-dash {
        display: inline-flex; align-items: center; gap: 0.5rem;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white; padding: 0.75rem 1.5rem; border-radius: 0.625rem;
        text-decoration: none; font-weight: 600; transition: all 0.2s;
    }
    .btn-primary-dash:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3); }

    .alert-success {
        background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.2);
        color: var(--success); padding: 1rem; border-radius: 0.75rem; margin-bottom: 1.5rem;
    }

    .empty-state {
        text-align: center; padding: 4rem 2rem;
        background: white; border-radius: 1rem; border: 1px solid var(--gray-100);
    }
    .empty-state i { font-size: 3rem; color: var(--gray-300); margin-bottom: 1rem; }
    .empty-state h3 { font-size: 1.25rem; color: var(--gray-700); margin-bottom: 0.5rem; }
    .empty-state p { color: var(--gray-500); margin-bottom: 1.5rem; }

    @media (max-width: 768px) {
        .dashboard-sidebar { display: none; }
        .page-header { flex-direction: column; gap: 1rem; text-align: center; }
    }
</style>
@endsection
