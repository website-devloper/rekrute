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
                <h1>My Applications</h1>
                <p>Track your job applications and their status</p>
            </div>
            <a href="{{ route('jobs') }}" class="btn-primary-dash">
                <i class="fas fa-search"></i> Find More Jobs
            </a>
        </div>

        @if(session('success'))
            <div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
        @endif

        <!-- Status Tabs -->
        <div class="status-tabs">
            <a href="{{ route('candidate.applied_jobs', ['status' => 'all']) }}" class="tab {{ request('status', 'all') == 'all' ? 'active' : '' }}">
                All <span class="count">{{ $statusCounts['all'] }}</span>
            </a>
            <a href="{{ route('candidate.applied_jobs', ['status' => 'pending']) }}" class="tab {{ request('status') == 'pending' ? 'active' : '' }}">
                Pending <span class="count">{{ $statusCounts['pending'] }}</span>
            </a>
            <a href="{{ route('candidate.applied_jobs', ['status' => 'accepted']) }}" class="tab {{ request('status') == 'accepted' ? 'active' : '' }}">
                Accepted <span class="count success">{{ $statusCounts['accepted'] }}</span>
            </a>
            <a href="{{ route('candidate.applied_jobs', ['status' => 'rejected']) }}" class="tab {{ request('status') == 'rejected' ? 'active' : '' }}">
                Rejected <span class="count danger">{{ $statusCounts['rejected'] }}</span>
            </a>
        </div>

        <!-- Applications List -->
        <div class="applications-list">
            @forelse($applications as $application)
            <div class="application-card" data-aos="fade-up">
                <div class="company-logo">
                    @if($application->job && $application->job->employer && $application->job->employer->logo_url)
                        <img src="{{ asset('image/' . $application->job->employer->logo_url) }}" alt="">
                    @else
                        <i class="fas fa-building"></i>
                    @endif
                </div>

                <div class="application-info">
                    <div class="job-details">
                        <h3>{{ $application->job->title ?? 'Job Deleted' }}</h3>
                        <p class="company-name">{{ $application->job->employer->name ?? 'Unknown Company' }}</p>
                        <div class="job-meta">
                            <span><i class="fas fa-map-marker-alt"></i> {{ $application->job->city ?? 'N/A' }}, {{ $application->job->country ?? '' }}</span>
                            <span><i class="fas fa-money-bill-wave"></i> {{ $application->job->minimum_salary ?? '0' }} - {{ $application->job->maximum_salary ?? '0' }} DH</span>
                            <span><i class="fas fa-clock"></i> Applied {{ $application->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>

                <div class="application-status">
                    <span class="status-badge {{ $application->status }}">
                        <i class="fas {{ $application->status == 'pending' ? 'fa-clock' : ($application->status == 'accepted' ? 'fa-check-circle' : 'fa-times-circle') }}"></i>
                        {{ ucfirst($application->status) }}
                    </span>
                    
                    <div class="card-actions">
                        @if($application->job)
                        <a href="{{ route('job-details', $application->job->id) }}" class="btn-view">View Job</a>
                        @endif
                        
                        @if($application->status == 'pending')
                        <form action="{{ route('candidate.application.withdraw', $application->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to withdraw this application?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-withdraw">Withdraw</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-inbox"></i>
                <h3>No applications found</h3>
                <p>You haven't applied to any jobs yet. Start exploring opportunities!</p>
                <a href="{{ route('jobs') }}" class="btn-primary-dash">Browse Jobs</a>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="pagination-wrapper">
            {{ $applications->appends(request()->input())->links('pagination::bootstrap-4') }}
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
        display: flex; align-items: center; gap: 0.75rem;
        background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.2);
        color: var(--success); padding: 1rem 1.25rem; border-radius: 0.75rem; margin-bottom: 1.5rem;
    }

    /* Status Tabs */
    .status-tabs {
        display: flex; gap: 0.5rem; margin-bottom: 1.5rem;
        background: white; padding: 0.5rem; border-radius: 1rem; border: 1px solid var(--gray-100);
    }

    .tab {
        display: flex; align-items: center; gap: 0.5rem;
        padding: 0.75rem 1.25rem; border-radius: 0.625rem;
        text-decoration: none; font-weight: 500; font-size: 0.9375rem;
        color: var(--gray-600); transition: all 0.2s;
    }

    .tab:hover { background: var(--gray-50); color: var(--gray-900); }
    .tab.active { background: var(--primary); color: white; }

    .count {
        padding: 0.125rem 0.5rem; border-radius: 50px;
        font-size: 0.75rem; font-weight: 600; background: rgba(0,0,0,0.1);
    }

    .tab.active .count { background: rgba(255, 255, 255, 0.2); }
    .count.success { background: rgba(16, 185, 129, 0.2); color: var(--success); }
    .count.danger { background: rgba(239, 68, 68, 0.2); color: var(--danger); }

    /* Applications List */
    .applications-list { display: flex; flex-direction: column; gap: 1rem; }

    .application-card {
        display: flex; align-items: center; gap: 1.5rem;
        background: white; border-radius: 1rem; padding: 1.5rem;
        border: 1px solid var(--gray-100); transition: all 0.3s ease;
    }

    .application-card:hover { box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06); border-color: var(--primary-100); }

    .company-logo {
        width: 64px; height: 64px; border-radius: 1rem;
        background: var(--gray-100); display: flex; align-items: center; justify-content: center;
        font-size: 1.5rem; color: var(--gray-400); overflow: hidden; flex-shrink: 0;
    }

    .company-logo img { width: 100%; height: 100%; object-fit: contain; padding: 0.5rem; }

    .application-info { flex: 1; }
    .job-details h3 { font-size: 1.125rem; font-weight: 700; color: var(--gray-900); margin-bottom: 0.25rem; }
    .company-name { color: var(--primary); font-weight: 600; font-size: 0.9375rem; margin-bottom: 0.5rem; }

    .job-meta { display: flex; gap: 1.5rem; flex-wrap: wrap; }
    .job-meta span { font-size: 0.8125rem; color: var(--gray-500); display: flex; align-items: center; gap: 0.375rem; }
    .job-meta i { color: var(--gray-400); font-size: 0.75rem; }

    .application-status { text-align: right; }

    .status-badge {
        display: inline-flex; align-items: center; gap: 0.375rem;
        padding: 0.5rem 1rem; border-radius: 50px;
        font-size: 0.8125rem; font-weight: 600; margin-bottom: 0.75rem;
    }

    .status-badge.pending { background: rgba(245, 158, 11, 0.1); color: #d97706; }
    .status-badge.accepted { background: rgba(16, 185, 129, 0.1); color: var(--success); }
    .status-badge.rejected { background: rgba(239, 68, 68, 0.1); color: var(--danger); }
    .status-badge.reviewed { background: rgba(59, 130, 246, 0.1); color: #3b82f6; }
    .status-badge.shortlisted { background: rgba(139, 92, 246, 0.1); color: #8b5cf6; }

    .card-actions { display: flex; gap: 0.5rem; justify-content: flex-end; }

    .btn-view {
        padding: 0.5rem 1rem; border-radius: 0.5rem;
        background: var(--gray-100); color: var(--gray-700);
        text-decoration: none; font-size: 0.8125rem; font-weight: 500; transition: all 0.2s;
    }

    .btn-view:hover { background: var(--primary); color: white; }

    .btn-withdraw {
        padding: 0.5rem 1rem; border-radius: 0.5rem;
        background: transparent; color: var(--danger);
        border: 1px solid var(--danger); font-size: 0.8125rem;
        font-weight: 500; cursor: pointer; transition: all 0.2s;
    }

    .btn-withdraw:hover { background: var(--danger); color: white; }

    .empty-state {
        text-align: center; padding: 4rem 2rem;
        background: white; border-radius: 1rem; border: 1px solid var(--gray-100);
    }

    .empty-state i { font-size: 3rem; color: var(--gray-300); margin-bottom: 1rem; }
    .empty-state h3 { font-size: 1.25rem; color: var(--gray-700); margin-bottom: 0.5rem; }
    .empty-state p { color: var(--gray-500); margin-bottom: 1.5rem; }

    .pagination-wrapper { display: flex; justify-content: center; margin-top: 2rem; }

    @media (max-width: 768px) {
        .dashboard-sidebar { display: none; }
        .page-header { flex-direction: column; gap: 1rem; text-align: center; }
        .status-tabs { overflow-x: auto; }
        .application-card { flex-direction: column; text-align: center; }
        .application-status { text-align: center; width: 100%; }
        .job-meta { justify-content: center; }
        .card-actions { justify-content: center; }
    }
</style>
@endsection
