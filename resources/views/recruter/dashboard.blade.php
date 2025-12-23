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
            <p>{{ $employer->service ?? 'Company' }}</p>
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('recruiter.dashboard') }}" class="nav-link {{ request()->routeIs('recruiter.dashboard') ? 'active' : '' }}">
                <i class="fas fa-th-large"></i> Dashboard
            </a>
            <a href="{{ route('recruiter.jobs') }}" class="nav-link {{ request()->routeIs('recruiter.jobs') ? 'active' : '' }}">
                <i class="fas fa-briefcase"></i> Manage Jobs
            </a>
            <a href="{{ route('recruiter.post_job') }}" class="nav-link {{ request()->routeIs('recruiter.post_job') ? 'active' : '' }}">
                <i class="fas fa-plus-circle"></i> Post New Job
            </a>
            <a href="{{ route('recruiter.applications') }}" class="nav-link {{ request()->routeIs('recruiter.applications') ? 'active' : '' }}">
                <i class="fas fa-users"></i> Applications
            </a>
            <a href="{{ route('recruiter.candidates') }}" class="nav-link {{ request()->routeIs('recruiter.candidates') ? 'active' : '' }}">
                <i class="fas fa-file-alt"></i> Browse Resumes
            </a>
            <hr class="nav-divider">
            <a href="{{ route('recruiter.profile') }}" class="nav-link {{ request()->routeIs('recruiter.profile') ? 'active' : '' }}">
                <i class="fas fa-building"></i> Company Profile
            </a>
            <a href="{{ route('recruiter.change_password') }}" class="nav-link {{ request()->routeIs('recruiter.change_password') ? 'active' : '' }}">
                <i class="fas fa-lock"></i> Change Password
            </a>
            <hr class="nav-divider">
            <a href="{{ route('logout') }}" class="nav-link text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="dashboard-main">
        <div class="dashboard-header">
            <div>
                <h1>Welcome back, {{ $employer->name }}! 🚀</h1>
                <p>Here's your recruitment overview</p>
            </div>
            <a href="{{ route('recruiter.post_job') }}" class="btn-primary-dash">
                <i class="fas fa-plus"></i> Post New Job
            </a>
        </div>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card gradient-blue" data-aos="fade-up">
                <div class="stat-icon"><i class="fas fa-briefcase"></i></div>
                <div class="stat-info">
                    <span class="stat-number">{{ $totalJobs }}</span>
                    <span class="stat-label">Total Jobs Posted</span>
                </div>
            </div>
            <div class="stat-card gradient-green" data-aos="fade-up" data-aos-delay="50">
                <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
                <div class="stat-info">
                    <span class="stat-number">{{ $activeJobs }}</span>
                    <span class="stat-label">Active Jobs</span>
                </div>
            </div>
            <div class="stat-card gradient-purple" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-icon"><i class="fas fa-users"></i></div>
                <div class="stat-info">
                    <span class="stat-number">{{ $totalApplications }}</span>
                    <span class="stat-label">Total Applications</span>
                </div>
            </div>
            <div class="stat-card gradient-orange" data-aos="fade-up" data-aos-delay="150">
                <div class="stat-icon"><i class="fas fa-clock"></i></div>
                <div class="stat-info">
                    <span class="stat-number">{{ $pendingApplications }}</span>
                    <span class="stat-label">Pending Review</span>
                </div>
            </div>
        </div>

        <!-- Application Status Strip -->
        <div class="status-strip" data-aos="fade-up">
            <div class="status-item">
                <span class="status-dot pending"></span>
                <span class="status-count">{{ $pendingApplications }}</span>
                <span class="status-label">Pending</span>
            </div>
            <div class="status-item">
                <span class="status-dot accepted"></span>
                <span class="status-count">{{ $acceptedApplications }}</span>
                <span class="status-label">Accepted</span>
            </div>
            <div class="status-item">
                <span class="status-dot rejected"></span>
                <span class="status-count">{{ $rejectedApplications }}</span>
                <span class="status-label">Rejected</span>
            </div>
        </div>

        <div class="dashboard-grid">
            <!-- Recent Applications -->
            <div class="dashboard-card" data-aos="fade-up">
                <div class="card-header">
                    <h3><i class="fas fa-user-clock"></i> Recent Applications</h3>
                    <a href="{{ route('recruiter.applications') }}" class="view-all">View All <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="card-body">
                    @forelse($recentApplications as $application)
                    <div class="applicant-item">
                        <div class="applicant-avatar">
                            @if($application->candidate && $application->candidate->img_url)
                                <img src="{{ asset('storage/' . $application->candidate->img_url) }}" alt="">
                            @else
                                <span>{{ $application->candidate ? substr($application->candidate->first_name, 0, 1) : '?' }}</span>
                            @endif
                        </div>
                        <div class="applicant-info">
                            <h4>{{ $application->candidate->first_name ?? 'Unknown' }} {{ $application->candidate->last_name ?? '' }}</h4>
                            <p>Applied for: {{ $application->job->title ?? 'Unknown Job' }}</p>
                            <span class="applied-time">{{ $application->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="applicant-actions">
                            <form action="{{ route('recruiter.application.status', $application->id) }}" method="POST" class="status-form">
                                @csrf
                                <select name="status" class="status-select" onchange="this.form.submit()">
                                    <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="reviewed" {{ $application->status == 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                                    <option value="shortlisted" {{ $application->status == 'shortlisted' ? 'selected' : '' }}>Shortlisted</option>
                                    <option value="accepted" {{ $application->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                    <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                </select>
                            </form>
                        </div>
                    </div>
                    @empty
                    <div class="empty-state">
                        <i class="fas fa-inbox"></i>
                        <p>No applications yet</p>
                        <a href="{{ route('recruiter.post_job') }}">Post a job to start receiving applications</a>
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Top Performing Jobs -->
            <div class="dashboard-card" data-aos="fade-up" data-aos-delay="100">
                <div class="card-header">
                    <h3><i class="fas fa-chart-bar"></i> Top Performing Jobs</h3>
                    <a href="{{ route('recruiter.jobs') }}" class="view-all">View All <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="card-body">
                    @forelse($topJobs as $job)
                    <div class="job-performance-item">
                        <div class="job-perf-info">
                            <h4>{{ $job->title }}</h4>
                            <p>{{ $job->city }}, {{ $job->country }}</p>
                        </div>
                        <div class="job-perf-stats">
                            <span class="perf-count">{{ $job->applications_count }}</span>
                            <span class="perf-label">applicants</span>
                        </div>
                    </div>
                    @empty
                    <div class="empty-state">
                        <i class="fas fa-briefcase"></i>
                        <p>No jobs posted yet</p>
                        <a href="{{ route('recruiter.post_job') }}">Post your first job</a>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions" data-aos="fade-up">
            <h3>Quick Actions</h3>
            <div class="actions-grid">
                <a href="{{ route('recruiter.post_job') }}" class="action-card">
                    <div class="action-icon blue"><i class="fas fa-plus-circle"></i></div>
                    <span>Post New Job</span>
                </a>
                <a href="{{ route('recruiter.applications') }}" class="action-card">
                    <div class="action-icon purple"><i class="fas fa-users"></i></div>
                    <span>Review Applications</span>
                </a>
                <a href="{{ route('recruiter.candidates') }}" class="action-card">
                    <div class="action-icon green"><i class="fas fa-search"></i></div>
                    <span>Search Candidates</span>
                </a>
                <a href="{{ route('recruiter.profile') }}" class="action-card">
                    <div class="action-icon orange"><i class="fas fa-building"></i></div>
                    <span>Update Profile</span>
                </a>
            </div>
        </div>
    </main>
</div>

<style>
    .dashboard-wrapper {
        display: flex;
        min-height: calc(100vh - 80px);
        background: var(--gray-50);
        padding-top: 80px;
    }

    /* Sidebar */
    .dashboard-sidebar {
        width: 280px;
        background: white;
        border-right: 1px solid var(--gray-100);
        padding: 2rem;
        position: sticky;
        top: 80px;
        height: calc(100vh - 80px);
        overflow-y: auto;
    }

    .sidebar-header {
        text-align: center;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid var(--gray-100);
        margin-bottom: 1.5rem;
    }

    .company-logo {
        width: 80px;
        height: 80px;
        border-radius: 1rem;
        background: var(--gray-100);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 2rem;
        color: var(--gray-400);
        overflow: hidden;
    }

    .company-logo img { width: 100%; height: 100%; object-fit: contain; padding: 0.5rem; }

    .sidebar-header h3 { font-size: 1.125rem; font-weight: 700; color: var(--gray-900); margin-bottom: 0.25rem; }
    .sidebar-header p { font-size: 0.875rem; color: var(--gray-500); }

    .sidebar-nav { display: flex; flex-direction: column; gap: 0.375rem; }

    .nav-link {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem 1rem;
        color: var(--gray-600);
        text-decoration: none;
        border-radius: 0.625rem;
        font-weight: 500;
        transition: all 0.2s;
    }

    .nav-link:hover { background: var(--gray-50); color: var(--gray-900); }
    .nav-link.active { background: var(--primary); color: white; }
    .nav-link.text-danger { color: var(--danger); }
    .nav-link.text-danger:hover { background: rgba(239, 68, 68, 0.1); }
    .nav-divider { margin: 1rem 0; border-color: var(--gray-100); }

    /* Main Content */
    .dashboard-main { flex: 1; padding: 2rem; max-width: 1200px; }

    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .dashboard-header h1 { font-size: 1.75rem; font-weight: 700; color: var(--gray-900); margin-bottom: 0.25rem; }
    .dashboard-header p { color: var(--gray-500); }

    .btn-primary-dash {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 0.625rem;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.2s;
    }

    .btn-primary-dash:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3); }

    /* Stats Grid - Gradient Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.25rem;
        margin-bottom: 1.5rem;
    }

    .stat-card {
        border-radius: 1rem;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -30%;
        width: 100%;
        height: 200%;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }

    .gradient-blue { background: linear-gradient(135deg, #6366f1, #4f46e5); }
    .gradient-green { background: linear-gradient(135deg, #10b981, #059669); }
    .gradient-purple { background: linear-gradient(135deg, #8b5cf6, #7c3aed); }
    .gradient-orange { background: linear-gradient(135deg, #f59e0b, #d97706); }

    .stat-card .stat-icon {
        width: 56px;
        height: 56px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 0.875rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .stat-card .stat-number { display: block; font-size: 2rem; font-weight: 800; }
    .stat-card .stat-label { font-size: 0.875rem; opacity: 0.9; }

    /* Status Strip */
    .status-strip {
        display: flex;
        gap: 2rem;
        background: white;
        padding: 1rem 1.5rem;
        border-radius: 1rem;
        margin-bottom: 2rem;
        border: 1px solid var(--gray-100);
    }

    .status-item { display: flex; align-items: center; gap: 0.625rem; }
    .status-dot { width: 10px; height: 10px; border-radius: 50%; }
    .status-dot.pending { background: #f59e0b; }
    .status-dot.accepted { background: #10b981; }
    .status-dot.rejected { background: #ef4444; }
    .status-count { font-weight: 700; font-size: 1.125rem; color: var(--gray-900); }
    .status-label { color: var(--gray-500); font-size: 0.875rem; }

    /* Dashboard Grid */
    .dashboard-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 2rem; }

    .dashboard-card {
        background: white;
        border-radius: 1rem;
        border: 1px solid var(--gray-100);
        overflow: hidden;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid var(--gray-100);
    }

    .card-header h3 {
        font-size: 1.0625rem;
        font-weight: 600;
        color: var(--gray-900);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .card-header h3 i { color: var(--primary); }

    .view-all {
        font-size: 0.875rem;
        color: var(--primary);
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.375rem;
    }

    .card-body { padding: 1rem 1.5rem; }

    /* Applicant Item */
    .applicant-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem 0;
        border-bottom: 1px solid var(--gray-50);
    }

    .applicant-item:last-child { border-bottom: none; }

    .applicant-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        overflow: hidden;
    }

    .applicant-avatar img { width: 100%; height: 100%; object-fit: cover; }

    .applicant-info { flex: 1; }
    .applicant-info h4 { font-size: 0.9375rem; font-weight: 600; color: var(--gray-900); margin-bottom: 0.125rem; }
    .applicant-info p { font-size: 0.8125rem; color: var(--gray-500); margin-bottom: 0.25rem; }
    .applied-time { font-size: 0.75rem; color: var(--gray-400); }

    .status-select {
        padding: 0.5rem 0.75rem;
        border: 1px solid var(--gray-200);
        border-radius: 0.5rem;
        font-size: 0.8125rem;
        color: var(--gray-700);
        cursor: pointer;
    }

    /* Job Performance Item */
    .job-performance-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 0;
        border-bottom: 1px solid var(--gray-50);
    }

    .job-performance-item:last-child { border-bottom: none; }
    .job-perf-info h4 { font-size: 0.9375rem; font-weight: 600; color: var(--gray-900); margin-bottom: 0.125rem; }
    .job-perf-info p { font-size: 0.8125rem; color: var(--gray-500); }
    .job-perf-stats { text-align: right; }
    .perf-count { display: block; font-size: 1.5rem; font-weight: 800; color: var(--primary); }
    .perf-label { font-size: 0.75rem; color: var(--gray-500); }

    /* Empty State */
    .empty-state { text-align: center; padding: 2rem; color: var(--gray-400); }
    .empty-state i { font-size: 2.5rem; margin-bottom: 0.75rem; }
    .empty-state a { color: var(--primary); text-decoration: none; }

    /* Quick Actions */
    .quick-actions h3 { font-size: 1.125rem; font-weight: 600; color: var(--gray-900); margin-bottom: 1rem; }

    .actions-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1rem; }

    .action-card {
        background: white;
        border: 1px solid var(--gray-100);
        border-radius: 1rem;
        padding: 1.5rem;
        text-align: center;
        text-decoration: none;
        color: var(--gray-700);
        transition: all 0.2s;
    }

    .action-card:hover { transform: translateY(-3px); box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08); border-color: var(--primary); }

    .action-icon {
        width: 56px;
        height: 56px;
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 0.75rem;
        font-size: 1.5rem;
    }

    .action-icon.blue { background: rgba(99, 102, 241, 0.1); color: var(--primary); }
    .action-icon.purple { background: rgba(139, 92, 246, 0.1); color: #8b5cf6; }
    .action-icon.green { background: rgba(16, 185, 129, 0.1); color: var(--success); }
    .action-icon.orange { background: rgba(245, 158, 11, 0.1); color: #f59e0b; }

    .action-card span { font-weight: 600; font-size: 0.9375rem; }

    /* Responsive */
    @media (max-width: 1024px) {
        .stats-grid { grid-template-columns: repeat(2, 1fr); }
        .dashboard-grid { grid-template-columns: 1fr; }
        .actions-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 768px) {
        .dashboard-sidebar { display: none; }
        .dashboard-main { padding: 1.5rem; }
        .dashboard-header { flex-direction: column; gap: 1rem; text-align: center; }
        .status-strip { flex-wrap: wrap; gap: 1rem; }
    }
</style>
@endsection
