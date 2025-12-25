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
            <a href="{{ route('candidate.applied_jobs') }}" class="nav-link active"><i class="fas fa-briefcase"></i> Applied Jobs</a>
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
                <h1>Applied Jobs</h1>
                <p>Track the status of your job applications</p>
            </div>
            <a href="{{ route('jobs') }}" class="btn-primary-dash">Find More Jobs</a>
        </div>

        @if(session('success'))
            <div class="alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <!-- Status Tabs -->
        <div class="status-tabs-wrapper">
            <div class="filter-tabs">
                <a href="{{ route('candidate.applied_jobs', ['status' => 'all']) }}" class="tab-link {{ request('status', 'all') == 'all' ? 'active' : '' }}">
                    All <span class="badge">{{ $statusCounts['all'] }}</span>
                </a>
                <a href="{{ route('candidate.applied_jobs', ['status' => 'pending']) }}" class="tab-link {{ request('status') == 'pending' ? 'active' : '' }}">
                    Pending <span class="badge">{{ $statusCounts['pending'] }}</span>
                </a>
                <a href="{{ route('candidate.applied_jobs', ['status' => 'accepted']) }}" class="tab-link {{ request('status') == 'accepted' ? 'active' : '' }}">
                    Accepted <span class="badge">{{ $statusCounts['accepted'] }}</span>
                </a>
                <a href="{{ route('candidate.applied_jobs', ['status' => 'rejected']) }}" class="tab-link {{ request('status') == 'rejected' ? 'active' : '' }}">
                    Rejected <span class="badge">{{ $statusCounts['rejected'] }}</span>
                </a>
            </div>
        </div>

        <!-- Applications List -->
        <div class="applications-container">
            @forelse($applications as $application)
            <div class="application-card">
                <div class="card-left">
                    <div class="company-logo">
                        @if($application->job && $application->job->employer && $application->job->employer->logo_url)
                            <img src="{{ asset('image/' . $application->job->employer->logo_url) }}" alt="">
                        @else
                            <i class="fas fa-building"></i>
                        @endif
                    </div>
                    <div class="job-info">
                        <h3>{{ $application->job->title ?? 'Job Title Unavailable' }}</h3>
                        <p class="company">{{ $application->job->employer->name ?? 'Unknown Company' }}</p>
                        <div class="meta">
                            <span><i class="fas fa-map-marker-alt"></i> {{ $application->job->city ?? 'Location N/A' }}</span>
                            <span><i class="fas fa-calendar-alt"></i> Applied {{ $application->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>

                <div class="card-right">
                    <div class="status-indicator {{ $application->status }}">
                        <i class="fas {{ $application->status == 'accepted' ? 'fa-check-circle' : ($application->status == 'rejected' ? 'fa-times-circle' : 'fa-clock') }}"></i>
                        <span>{{ ucfirst($application->status) }}</span>
                    </div>

                    <div class="actions">
                        <a href="{{ route('job-details', $application->job_id) }}" class="btn-outline">View Job</a>
                        @if($application->status == 'pending')
                        <form action="{{ route('candidate.application.withdraw', $application->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to withdraw this application?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-text-danger">Withdraw</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <div class="empty-icon"><i class="fas fa-inbox"></i></div>
                <h3>No applications found</h3>
                <p>You haven't applied to any jobs in this category yet.</p>
                <a href="{{ route('jobs') }}" class="btn-primary-dash">Browse Jobs</a>
            </div>
            @endforelse
        </div>

        <div class="pagination-wrapper">
            {{ $applications->appends(request()->input())->links('pagination::bootstrap-4') }}
        </div>
    </main>
</div>

<style>
    .dashboard-wrapper { display: flex; min-height: calc(100vh - 80px); background: white; padding-top: 80px; }
    
    .dashboard-sidebar {
        width: 260px; background: white; border-right: 1px solid var(--gray-200);
        padding: 2rem 1.5rem; position: sticky; top: 80px; height: calc(100vh - 80px); overflow-y: auto;
    }
    .sidebar-header { text-align: center; margin-bottom: 2rem; }
    .user-avatar {
        width: 72px; height: 72px; border-radius: 50%;
        background: var(--primary); display: flex; align-items: center; justify-content: center;
        margin: 0 auto 1rem; color: white; font-size: 1.75rem; overflow: hidden; font-weight: 600;
    }
    .user-avatar img { width: 100%; height: 100%; object-fit: cover; }
    .sidebar-header h3 { font-size: 1.125rem; font-weight: 600; color: var(--gray-900); margin-bottom: 0.25rem; }
    .sidebar-header p { font-size: 0.875rem; color: var(--gray-500); }

    .sidebar-nav { display: flex; flex-direction: column; gap: 0.5rem; }
    .nav-link {
        display: flex; align-items: center; gap: 0.75rem; padding: 0.75rem 1rem; color: var(--gray-600);
        border-radius: 0.5rem; font-weight: 500; transition: all 0.2s;
    }
    .nav-link:hover, .nav-link.active { background: #eff6ff; color: var(--primary); }
    .nav-link.active { font-weight: 600; }
    .nav-link.text-danger:hover { background: #fef2f2; color: var(--danger); }
    .nav-divider { margin: 1rem 0; border: 0; border-top: 1px solid var(--gray-200); }

    .dashboard-main { flex: 1; padding: 2rem 3rem; background: var(--gray-50); }

    .page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; }
    .page-header h1 { font-size: 1.5rem; font-weight: 700; color: var(--gray-900); }
    .page-header p { color: var(--gray-500); }

    .btn-primary-dash {
        background: var(--primary); color: white; padding: 0.625rem 1.25rem;
        border-radius: 0.5rem; font-weight: 500; text-decoration: none; transition: background 0.2s;
    }
    .btn-primary-dash:hover { background: var(--primary-dark); }

    .alert-success {
        background: #ecfdf5; border: 1px solid #a7f3d0; color: #047857;
        padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem;
    }

    .status-tabs-wrapper { border-bottom: 1px solid var(--gray-200); margin-bottom: 2rem; }
    .filter-tabs { display: flex; gap: 2rem; }
    .tab-link {
        font-size: 0.9375rem; color: var(--gray-500); text-decoration: none; font-weight: 500;
        padding: 0.75rem 0; border-bottom: 2px solid transparent; display: flex; align-items: center; gap: 0.5rem;
        transition: all 0.2s;
    }
    .tab-link:hover { color: var(--gray-900); }
    .tab-link.active { color: var(--primary); border-bottom-color: var(--primary); }
    .badge {
        background: var(--gray-100); color: var(--gray-600); font-size: 0.75rem; padding: 2px 8px; border-radius: 12px;
    }
    .tab-link.active .badge { background: #eff6ff; color: var(--primary); }

    .applications-container { display: flex; flex-direction: column; gap: 1rem; }

    .application-card {
        background: white; border: 1px solid var(--gray-200); border-radius: 0.75rem;
        padding: 1.5rem; display: flex; justify-content: space-between; align-items: center;
        transition: box-shadow 0.2s;
    }
    .application-card:hover { box-shadow: 0 4px 6px rgba(0,0,0,0.02); }

    .card-left { display: flex; align-items: center; gap: 1rem; }
    .company-logo {
        width: 56px; height: 56px; border-radius: 10px; background: var(--gray-100);
        display: flex; align-items: center; justify-content: center; color: var(--gray-400); font-size: 1.5rem;
    }
    .company-logo img { width: 100%; height: 100%; object-fit: contain; padding: 4px; }
    
    .job-info h3 { font-size: 1.125rem; font-weight: 600; color: var(--gray-900); margin-bottom: 0.25rem; }
    .job-info .company { color: var(--gray-600); font-weight: 500; margin-bottom: 0.25rem; }
    .meta { display: flex; gap: 1rem; font-size: 0.8125rem; color: var(--gray-500); }
    .meta i { width: 16px; margin-right: 0.25rem; }

    .card-right { display: flex; align-items: center; gap: 2rem; }
    
    .status-indicator {
        display: flex; align-items: center; gap: 0.5rem; font-weight: 600; font-size: 0.9375rem;
    }
    .status-indicator.pending { color: var(--accent); }
    .status-indicator.accepted { color: var(--success); }
    .status-indicator.rejected { color: var(--danger); }
    
    .actions { display: flex; align-items: center; gap: 1rem; }
    .btn-outline {
        padding: 0.5rem 1rem; border: 1px solid var(--gray-300); border-radius: 0.5rem;
        color: var(--gray-700); text-decoration: none; font-size: 0.875rem; font-weight: 500;
        transition: all 0.2s;
    }
    .btn-outline:hover { background: var(--gray-50); border-color: var(--gray-400); }
    
    .btn-text-danger {
        background: none; border: none; color: var(--gray-500); font-size: 0.875rem;
        cursor: pointer; padding: 0.5rem; transition: color 0.2s;
    }
    .btn-text-danger:hover { color: var(--danger); text-decoration: underline; }

    .empty-state { text-align: center; padding: 4rem 2rem; background: white; border: 1px solid var(--gray-200); border-radius: 0.75rem; }
    .empty-icon { font-size: 3rem; color: var(--gray-300); margin-bottom: 1rem; }
    .empty-state h3 { font-size: 1.25rem; color: var(--gray-900); margin-bottom: 0.5rem; }
    .empty-state p { color: var(--gray-500); margin-bottom: 1.5rem; }

    .pagination-wrapper { margin-top: 2rem; display: flex; justify-content: center; }

    @media (max-width: 900px) {
        .dashboard-sidebar { display: none; }
        .dashboard-main { padding: 2rem 1rem; }
        .application-card { flex-direction: column; align-items: flex-start; gap: 1.5rem; }
        .card-right { width: 100%; justify-content: space-between; }
        .status-tabs-wrapper { overflow-x: auto; }
        .filter-tabs { min-width: max-content; }
    }
</style>
@endsection
