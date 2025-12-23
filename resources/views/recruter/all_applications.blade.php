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
            <a href="{{ route('recruiter.applications') }}" class="nav-link active"><i class="fas fa-users"></i> Applications</a>
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
                <h1>All Applications</h1>
                <p>Review and manage candidate applications</p>
            </div>
        </div>

        @if(session('success'))
            <div class="alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <!-- Filter Bar -->
        <div class="filter-bar">
            <form action="{{ route('recruiter.applications') }}" method="GET" class="filter-form">
                <div class="filter-group">
                    <label>Status:</label>
                    <select name="status" onchange="this.form.submit()">
                        <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>All Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="reviewed" {{ request('status') == 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                        <option value="shortlisted" {{ request('status') == 'shortlisted' ? 'selected' : '' }}>Shortlisted</option>
                        <option value="accepted" {{ request('status') == 'accepted' ? 'selected' : '' }}>Accepted</option>
                        <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Job:</label>
                    <select name="job_id" onchange="this.form.submit()">
                        <option value="all">All Jobs</option>
                        @foreach($jobs as $job)
                            <option value="{{ $job->id }}" {{ request('job_id') == $job->id ? 'selected' : '' }}>{{ $job->title }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
            <div class="filter-info">
                <strong>{{ $applications->total() }}</strong> applications found
            </div>
        </div>

        <!-- Applications Grid -->
        <div class="applications-grid">
            @forelse($applications as $application)
            <div class="application-card" data-aos="fade-up">
                <div class="card-header">
                    <div class="applicant-avatar">
                        @if($application->candidate && $application->candidate->img_url)
                            <img src="{{ asset('storage/' . $application->candidate->img_url) }}" alt="">
                        @else
                            <span>{{ $application->candidate ? substr($application->candidate->first_name, 0, 1) : '?' }}</span>
                        @endif
                    </div>
                    <span class="status-badge {{ $application->status }}">{{ ucfirst($application->status) }}</span>
                </div>

                <div class="card-body">
                    <h3>{{ $application->candidate->first_name ?? 'Unknown' }} {{ $application->candidate->last_name ?? '' }}</h3>
                    <p class="job-title">{{ $application->candidate->job_title ?? 'No title' }}</p>
                    
                    <div class="meta-info">
                        <span><i class="fas fa-briefcase"></i> Applied for: <strong>{{ $application->job->title ?? 'Unknown' }}</strong></span>
                        <span><i class="fas fa-clock"></i> {{ $application->created_at->diffForHumans() }}</span>
                    </div>

                    @if($application->candidate)
                    <div class="contact-info">
                        <span><i class="fas fa-envelope"></i> {{ $application->candidate->email }}</span>
                        @if($application->candidate->phone)
                        <span><i class="fas fa-phone"></i> {{ $application->candidate->phone }}</span>
                        @endif
                    </div>
                    @endif
                </div>

                <div class="card-footer">
                    <form action="{{ route('recruiter.application.status', $application->id) }}" method="POST" class="status-form">
                        @csrf
                        <select name="status" class="status-select" onchange="this.form.submit()">
                            <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                            <option value="reviewed" {{ $application->status == 'reviewed' ? 'selected' : '' }}>👁️ Reviewed</option>
                            <option value="shortlisted" {{ $application->status == 'shortlisted' ? 'selected' : '' }}>⭐ Shortlisted</option>
                            <option value="accepted" {{ $application->status == 'accepted' ? 'selected' : '' }}>✅ Accepted</option>
                            <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>❌ Rejected</option>
                        </select>
                    </form>
                    
                    <div class="card-actions">
                        @if($application->resume || ($application->candidate && $application->candidate->resume))
                            <a href="{{ asset('storage/' . ($application->resume ?? $application->candidate->resume)) }}" target="_blank" class="btn-action" title="View Resume">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                        @endif
                        <a href="{{ route('recruiter.candidate.view', $application->candidate_id) }}" class="btn-action" title="View Profile">
                            <i class="fas fa-user"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-inbox"></i>
                <h3>No applications found</h3>
                <p>Try adjusting your filters or post a new job to attract candidates.</p>
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

    .company-logo {
        width: 70px; height: 70px; border-radius: 1rem;
        background: var(--gray-100); display: flex; align-items: center; justify-content: center;
        margin: 0 auto 1rem; font-size: 1.5rem; color: var(--gray-400); overflow: hidden;
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

    .dashboard-main { flex: 1; padding: 2rem; }

    .page-header { margin-bottom: 2rem; }
    .page-header h1 { font-size: 1.75rem; font-weight: 700; color: var(--gray-900); margin-bottom: 0.25rem; }
    .page-header p { color: var(--gray-500); }

    .alert-success {
        display: flex; align-items: center; gap: 0.75rem;
        background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.2);
        color: var(--success); padding: 1rem 1.25rem; border-radius: 0.75rem; margin-bottom: 1.5rem;
    }

    .filter-bar {
        display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;
        background: white; padding: 1rem 1.5rem; border-radius: 1rem;
        margin-bottom: 1.5rem; border: 1px solid var(--gray-100);
    }

    .filter-form { display: flex; gap: 1.5rem; flex-wrap: wrap; }
    .filter-group { display: flex; align-items: center; gap: 0.5rem; }
    .filter-group label { font-size: 0.875rem; color: var(--gray-500); }

    .filter-group select {
        padding: 0.5rem 1rem; border: 1px solid var(--gray-200);
        border-radius: 0.5rem; font-size: 0.875rem; cursor: pointer;
    }

    .filter-info { font-size: 0.875rem; color: var(--gray-500); }

    .applications-grid {
        display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 1.5rem;
    }

    .application-card {
        background: white; border-radius: 1rem; border: 1px solid var(--gray-100);
        overflow: hidden; transition: all 0.3s ease;
    }

    .application-card:hover { transform: translateY(-3px); box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08); }

    .application-card .card-header {
        display: flex; justify-content: space-between; align-items: flex-start;
        padding: 1.25rem 1.5rem; border-bottom: 1px solid var(--gray-100);
    }

    .applicant-avatar {
        width: 56px; height: 56px; border-radius: 50%;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        display: flex; align-items: center; justify-content: center;
        color: white; font-size: 1.25rem; font-weight: 600; overflow: hidden;
    }

    .applicant-avatar img { width: 100%; height: 100%; object-fit: cover; }

    .status-badge {
        padding: 0.375rem 0.875rem; border-radius: 50px;
        font-size: 0.75rem; font-weight: 600; text-transform: capitalize;
    }

    .status-badge.pending { background: rgba(245, 158, 11, 0.1); color: #d97706; }
    .status-badge.reviewed { background: rgba(59, 130, 246, 0.1); color: #3b82f6; }
    .status-badge.shortlisted { background: rgba(139, 92, 246, 0.1); color: #8b5cf6; }
    .status-badge.accepted { background: rgba(16, 185, 129, 0.1); color: var(--success); }
    .status-badge.rejected { background: rgba(239, 68, 68, 0.1); color: var(--danger); }

    .application-card .card-body { padding: 1.25rem 1.5rem; }

    .application-card h3 { font-size: 1.125rem; font-weight: 700; color: var(--gray-900); margin-bottom: 0.25rem; }
    .job-title { color: var(--primary); font-weight: 600; font-size: 0.875rem; margin-bottom: 1rem; }

    .meta-info { display: flex; flex-direction: column; gap: 0.375rem; margin-bottom: 1rem; }
    .meta-info span { font-size: 0.8125rem; color: var(--gray-500); }
    .meta-info i { width: 16px; margin-right: 0.375rem; color: var(--gray-400); }

    .contact-info { display: flex; flex-direction: column; gap: 0.25rem; }
    .contact-info span { font-size: 0.8125rem; color: var(--gray-600); }
    .contact-info i { width: 16px; margin-right: 0.375rem; color: var(--primary); }

    .application-card .card-footer {
        display: flex; justify-content: space-between; align-items: center;
        padding: 1rem 1.5rem; background: var(--gray-50); border-top: 1px solid var(--gray-100);
    }

    .status-select {
        padding: 0.5rem 0.75rem; border: 1px solid var(--gray-200);
        border-radius: 0.5rem; font-size: 0.8125rem; cursor: pointer; background: white;
    }

    .card-actions { display: flex; gap: 0.5rem; }

    .btn-action {
        width: 36px; height: 36px; border-radius: 0.5rem;
        background: white; border: 1px solid var(--gray-200);
        display: flex; align-items: center; justify-content: center;
        color: var(--gray-500); text-decoration: none; transition: all 0.2s;
    }

    .btn-action:hover { background: var(--primary); color: white; border-color: var(--primary); }

    .empty-state {
        grid-column: 1 / -1; text-align: center; padding: 4rem 2rem;
        background: white; border-radius: 1rem; border: 1px solid var(--gray-100);
    }

    .empty-state i { font-size: 3rem; color: var(--gray-300); margin-bottom: 1rem; }
    .empty-state h3 { font-size: 1.25rem; color: var(--gray-700); margin-bottom: 0.5rem; }
    .empty-state p { color: var(--gray-500); }

    .pagination-wrapper { display: flex; justify-content: center; margin-top: 2rem; }

    @media (max-width: 768px) {
        .dashboard-sidebar { display: none; }
        .applications-grid { grid-template-columns: 1fr; }
        .filter-bar { flex-direction: column; text-align: center; }
    }
</style>
@endsection
