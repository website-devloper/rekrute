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
            <a href="{{ route('candidate.dashboard') }}" class="nav-link {{ request()->routeIs('candidate.dashboard') ? 'active' : '' }}">
                <i class="fas fa-th-large"></i> Dashboard
            </a>
            <a href="{{ route('candidate.profile') }}" class="nav-link {{ request()->routeIs('candidate.profile') ? 'active' : '' }}">
                <i class="fas fa-user"></i> My Profile
            </a>
            <a href="{{ route('candidate.applied_jobs') }}" class="nav-link {{ request()->routeIs('candidate.applied_jobs') ? 'active' : '' }}">
                <i class="fas fa-briefcase"></i> Applied Jobs
            </a>
            <a href="{{ route('jobs') }}" class="nav-link">
                <i class="fas fa-search"></i> Find Jobs
            </a>
            <a href="{{ route('candidate.change_password') }}" class="nav-link {{ request()->routeIs('candidate.change_password') ? 'active' : '' }}">
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
                <h1>Welcome back, {{ $candidate->first_name }}! 👋</h1>
                <p>Here's what's happening with your job search</p>
            </div>
            <a href="{{ route('jobs') }}" class="btn-primary-dash">
                <i class="fas fa-search"></i> Browse Jobs
            </a>
        </div>

        <!-- Profile Completion Alert -->
        @if($profileCompletion < 80)
        <div class="alert-card warning">
            <div class="alert-icon"><i class="fas fa-exclamation-triangle"></i></div>
            <div class="alert-content">
                <h4>Complete your profile</h4>
                <p>Your profile is {{ $profileCompletion }}% complete. A complete profile increases your chances of getting hired.</p>
            </div>
            <a href="{{ route('candidate.profile') }}" class="btn-alert">Complete Profile</a>
        </div>
        @endif

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card" data-aos="fade-up">
                <div class="stat-icon blue"><i class="fas fa-paper-plane"></i></div>
                <div class="stat-info">
                    <span class="stat-number">{{ $totalApplications }}</span>
                    <span class="stat-label">Total Applications</span>
                </div>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="50">
                <div class="stat-icon yellow"><i class="fas fa-clock"></i></div>
                <div class="stat-info">
                    <span class="stat-number">{{ $pendingApplications }}</span>
                    <span class="stat-label">Pending</span>
                </div>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-icon green"><i class="fas fa-check-circle"></i></div>
                <div class="stat-info">
                    <span class="stat-number">{{ $acceptedApplications }}</span>
                    <span class="stat-label">Accepted</span>
                </div>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="150">
                <div class="stat-icon red"><i class="fas fa-times-circle"></i></div>
                <div class="stat-info">
                    <span class="stat-number">{{ $rejectedApplications }}</span>
                    <span class="stat-label">Rejected</span>
                </div>
            </div>
        </div>

        <div class="dashboard-grid">
            <!-- Recent Applications -->
            <div class="dashboard-card" data-aos="fade-up">
                <div class="card-header">
                    <h3><i class="fas fa-history"></i> Recent Applications</h3>
                    <a href="{{ route('candidate.applied_jobs') }}" class="view-all">View All <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="card-body">
                    @forelse($recentApplications as $application)
                    <div class="application-item">
                        <div class="app-logo">
                            @if($application->job && $application->job->employer && $application->job->employer->logo_url)
                                <img src="{{ asset('image/' . $application->job->employer->logo_url) }}" alt="Company">
                            @else
                                <i class="fas fa-building"></i>
                            @endif
                        </div>
                        <div class="app-info">
                            <h4>{{ $application->job->title ?? 'Job Deleted' }}</h4>
                            <p>{{ $application->job->employer->name ?? 'Unknown Company' }}</p>
                        </div>
                        <span class="app-status status-{{ $application->status }}">
                            {{ ucfirst($application->status) }}
                        </span>
                    </div>
                    @empty
                    <div class="empty-state">
                        <i class="fas fa-inbox"></i>
                        <p>No applications yet</p>
                        <a href="{{ route('jobs') }}">Start applying</a>
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Recommended Jobs -->
            <div class="dashboard-card" data-aos="fade-up" data-aos-delay="100">
                <div class="card-header">
                    <h3><i class="fas fa-star"></i> Recommended for You</h3>
                    <a href="{{ route('jobs') }}" class="view-all">View All <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="card-body">
                    @forelse($recommendedJobs->take(4) as $job)
                    <div class="job-item">
                        <div class="job-info">
                            <h4>{{ $job->title }}</h4>
                            <p>{{ $job->employer->name ?? 'Company' }} • {{ $job->city }}</p>
                        </div>
                        <span class="job-salary">{{ $job->minimum_salary }}-{{ $job->maximum_salary }} DH</span>
                    </div>
                    @empty
                    <div class="empty-state">
                        <p>No recommendations available</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Profile Completion Progress -->
        <div class="dashboard-card full-width" data-aos="fade-up">
            <div class="card-header">
                <h3><i class="fas fa-user-check"></i> Profile Strength</h3>
            </div>
            <div class="card-body">
                <div class="progress-wrapper">
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: {{ $profileCompletion }}%"></div>
                    </div>
                    <span class="progress-text">{{ $profileCompletion }}% Complete</span>
                </div>
                <div class="profile-tips">
                    @if(!$candidate->resume)
                    <span class="tip"><i class="fas fa-file-pdf"></i> Upload your resume</span>
                    @endif
                    @if(!$candidate->about)
                    <span class="tip"><i class="fas fa-info-circle"></i> Add a bio</span>
                    @endif
                    @if(!$candidate->img_url)
                    <span class="tip"><i class="fas fa-camera"></i> Add a profile photo</span>
                    @endif
                </div>
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

    .user-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.5rem;
        font-weight: 700;
        color: white;
        overflow: hidden;
    }

    .user-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .sidebar-header h3 {
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--gray-900);
        margin-bottom: 0.25rem;
    }

    .sidebar-header p {
        font-size: 0.875rem;
        color: var(--gray-500);
    }

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
    .dashboard-main {
        flex: 1;
        padding: 2rem;
        max-width: 1200px;
    }

    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .dashboard-header h1 {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--gray-900);
        margin-bottom: 0.25rem;
    }

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

    /* Alert Card */
    .alert-card {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.25rem;
        border-radius: 1rem;
        margin-bottom: 1.5rem;
    }

    .alert-card.warning {
        background: rgba(245, 158, 11, 0.1);
        border: 1px solid rgba(245, 158, 11, 0.2);
    }

    .alert-icon {
        width: 48px;
        height: 48px;
        background: #f59e0b;
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
    }

    .alert-content { flex: 1; }
    .alert-content h4 { font-weight: 600; color: var(--gray-900); margin-bottom: 0.25rem; }
    .alert-content p { font-size: 0.875rem; color: var(--gray-600); }

    .btn-alert {
        background: #f59e0b;
        color: white;
        padding: 0.625rem 1.25rem;
        border-radius: 0.5rem;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.875rem;
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.25rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        border: 1px solid var(--gray-100);
    }

    .stat-icon {
        width: 56px;
        height: 56px;
        border-radius: 0.875rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
    }

    .stat-icon.blue { background: rgba(99, 102, 241, 0.1); color: var(--primary); }
    .stat-icon.yellow { background: rgba(245, 158, 11, 0.1); color: #f59e0b; }
    .stat-icon.green { background: rgba(16, 185, 129, 0.1); color: var(--success); }
    .stat-icon.red { background: rgba(239, 68, 68, 0.1); color: var(--danger); }

    .stat-number {
        display: block;
        font-size: 1.75rem;
        font-weight: 800;
        color: var(--gray-900);
    }

    .stat-label { font-size: 0.875rem; color: var(--gray-500); }

    /* Dashboard Grid */
    .dashboard-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .dashboard-card {
        background: white;
        border-radius: 1rem;
        border: 1px solid var(--gray-100);
        overflow: hidden;
    }

    .dashboard-card.full-width { grid-column: 1 / -1; }

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

    .card-body { padding: 1.25rem 1.5rem; }

    /* Application Item */
    .application-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 0.875rem 0;
        border-bottom: 1px solid var(--gray-50);
    }

    .application-item:last-child { border-bottom: none; }

    .app-logo {
        width: 44px;
        height: 44px;
        background: var(--gray-100);
        border-radius: 0.625rem;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--gray-400);
        overflow: hidden;
    }

    .app-logo img { width: 100%; height: 100%; object-fit: contain; padding: 0.5rem; }

    .app-info { flex: 1; }
    .app-info h4 { font-size: 0.9375rem; font-weight: 600; color: var(--gray-900); margin-bottom: 0.125rem; }
    .app-info p { font-size: 0.8125rem; color: var(--gray-500); }

    .app-status {
        padding: 0.375rem 0.75rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: capitalize;
    }

    .status-pending { background: rgba(245, 158, 11, 0.1); color: #d97706; }
    .status-accepted { background: rgba(16, 185, 129, 0.1); color: var(--success); }
    .status-rejected { background: rgba(239, 68, 68, 0.1); color: var(--danger); }
    .status-reviewed { background: rgba(59, 130, 246, 0.1); color: #3b82f6; }

    /* Job Item */
    .job-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.875rem 0;
        border-bottom: 1px solid var(--gray-50);
    }

    .job-item:last-child { border-bottom: none; }
    .job-info h4 { font-size: 0.9375rem; font-weight: 600; color: var(--gray-900); margin-bottom: 0.125rem; }
    .job-info p { font-size: 0.8125rem; color: var(--gray-500); }
    .job-salary { font-weight: 600; color: var(--primary); font-size: 0.875rem; }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 2rem;
        color: var(--gray-400);
    }

    .empty-state i { font-size: 2.5rem; margin-bottom: 0.75rem; }
    .empty-state a { color: var(--primary); text-decoration: none; }

    /* Progress */
    .progress-wrapper {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .progress-bar {
        flex: 1;
        height: 10px;
        background: var(--gray-100);
        border-radius: 10px;
        overflow: hidden;
    }

    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, var(--primary), var(--primary-light));
        border-radius: 10px;
        transition: width 0.5s ease;
    }

    .progress-text { font-weight: 600; color: var(--gray-700); white-space: nowrap; }

    .profile-tips { display: flex; gap: 1rem; flex-wrap: wrap; }
    .tip {
        display: flex;
        align-items: center;
        gap: 0.375rem;
        font-size: 0.8125rem;
        color: var(--gray-500);
        background: var(--gray-50);
        padding: 0.5rem 0.875rem;
        border-radius: 50px;
    }

    .tip i { color: var(--primary); }

    /* Responsive */
    @media (max-width: 1024px) {
        .stats-grid { grid-template-columns: repeat(2, 1fr); }
        .dashboard-grid { grid-template-columns: 1fr; }
    }

    @media (max-width: 768px) {
        .dashboard-sidebar { display: none; }
        .dashboard-main { padding: 1.5rem; }
        .dashboard-header { flex-direction: column; gap: 1rem; text-align: center; }
        .stats-grid { grid-template-columns: 1fr 1fr; }
        .alert-card { flex-direction: column; text-align: center; }
    }
</style>
@endsection
