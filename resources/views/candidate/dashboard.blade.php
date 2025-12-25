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
                    <span>{{ substr($candidate->first_name, 0, 1) }}</span>
                @endif
            </div>
            <h3>{{ $candidate->first_name }} {{ $candidate->last_name }}</h3>
            <p>{{ $candidate->job_title ?? 'Job Seeker' }}</p>
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('candidate.dashboard') }}" class="nav-link active"><i class="fas fa-th-large"></i> Dashboard</a>
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
        <div class="welcome-section">
            <div>
                <h1>Welcome back, {{ $candidate->first_name }}!</h1>
                <p>Track your applications and find new opportunities.</p>
            </div>
            <a href="{{ route('jobs') }}" class="btn-primary-dash">
                <i class="fas fa-search"></i> Find Jobs
            </a>
        </div>

        <!-- Profile Completion Alert -->
        @if($profileCompletion < 100)
        <div class="profile-alert">
            <div class="alert-content">
                <div class="progress-circle p{{ $profileCompletion }}">
                    <span>{{ $profileCompletion }}%</span>
                </div>
                <div>
                    <h4>Complete your profile</h4>
                    <p>Drivers with complete profiles get 3x more views.</p>
                </div>
            </div>
            <a href="{{ route('candidate.profile') }}" class="btn-sm-primary">Edit Profile</a>
        </div>
        @endif

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <span class="stat-label">Total Applications</span>
                <h3 class="text-blue">{{ $totalApplications }}</h3>
            </div>
            <div class="stat-card">
                <span class="stat-label">Pending</span>
                <h3 class="text-orange">{{ $pendingApplications }}</h3>
            </div>
            <div class="stat-card">
                <span class="stat-label">Accepted</span>
                <h3 class="text-green">{{ $acceptedApplications }}</h3>
            </div>
            <div class="stat-card">
                <span class="stat-label">Rejected</span>
                <h3 class="text-red">{{ $rejectedApplications }}</h3>
            </div>
        </div>

        <div class="content-grid">
            <!-- Recent Applications -->
            <div class="section-card">
                <div class="card-header">
                    <h2>Recent Applications</h2>
                    <a href="{{ route('candidate.applied_jobs') }}">View All</a>
                </div>
                <div class="applications-list">
                    @forelse($recentApplications as $app)
                    <div class="app-item">
                        <div class="company-icon">
                            @if($app->job && $app->job->employer && $app->job->employer->logo_url)
                                <img src="{{ asset('image/' . $app->job->employer->logo_url) }}" alt="">
                            @else
                                <i class="fas fa-briefcase"></i>
                            @endif
                        </div>
                        <div class="app-info">
                            <h4>{{ $app->job->title ?? 'Job Deleted' }}</h4>
                            <p>{{ $app->job->employer->name ?? 'Unknown Company' }}</p>
                        </div>
                        <div class="app-status">
                            <span class="status-badge {{ $app->status }}">{{ ucfirst($app->status) }}</span>
                            <span class="date">{{ $app->created_at->format('M d') }}</span>
                        </div>
                    </div>
                    @empty
                    <div class="empty-state">
                        <p>No applications yet.</p>
                        <a href="{{ route('jobs') }}">Browse Jobs</a>
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Recommended Jobs -->
            <div class="section-card">
                <div class="card-header">
                    <h2>Recommended for you</h2>
                </div>
                <div class="jobs-list">
                    @forelse($recommendedJobs as $job)
                    <div class="job-item">
                        <div class="job-header">
                            <h4>{{ $job->title }}</h4>
                            <span class="tag">{{ $job->job_type }}</span>
                        </div>
                        <p class="company">{{ $job->employer->name }} • {{ $job->city }}</p>
                        <a href="{{ route('job-details', $job->id) }}" class="btn-link">View Details</a>
                    </div>
                    @empty
                    <div class="empty-state">No recommendations yet.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </main>
</div>

<style>
    .dashboard-wrapper { display: flex; min-height: calc(100vh - 80px); background: white; padding-top: 80px; }

    /* Clean Sidebar */
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
        display: flex; align-items: center; gap: 0.75rem;
        padding: 0.75rem 1rem; color: var(--gray-600);
        border-radius: 0.5rem; font-weight: 500; transition: all 0.2s;
    }
    .nav-link:hover, .nav-link.active { background: #eff6ff; color: var(--primary); }
    .nav-link.active { font-weight: 600; }
    .nav-link.text-danger:hover { background: #fef2f2; color: var(--danger); }
    
    .nav-divider { margin: 1rem 0; border: 0; border-top: 1px solid var(--gray-200); }

    /* Main Content */
    .dashboard-main { flex: 1; padding: 2rem 3rem; background: var(--gray-50); }

    .welcome-section { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2rem; }
    .welcome-section h1 { font-size: 1.875rem; color: var(--gray-900); margin-bottom: 0.25rem; }
    .welcome-section p { color: var(--gray-500); font-size: 1rem; }

    .btn-primary-dash {
        background: var(--primary); color: white; padding: 0.625rem 1.25rem;
        border-radius: 0.5rem; font-weight: 500; text-decoration: none;
        transition: background 0.2s; display: inline-flex; align-items: center; gap: 0.5rem;
    }
    .btn-primary-dash:hover { background: var(--primary-dark); }

    /* Profile Alert */
    .profile-alert {
        background: white; border: 1px solid var(--gray-200); border-radius: 0.75rem;
        padding: 1.25rem; display: flex; justify-content: space-between; align-items: center;
        margin-bottom: 2rem; box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    }
    .alert-content { display: flex; align-items: center; gap: 1rem; }
    .progress-circle {
        width: 48px; height: 48px; border-radius: 50%; border: 3px solid var(--gray-100);
        border-top-color: var(--primary); display: flex; align-items: center; justify-content: center;
        font-size: 0.75rem; font-weight: 700; color: var(--primary);
    }
    .profile-alert h4 { font-size: 1rem; font-weight: 600; margin-bottom: 0.25rem; }
    .profile-alert p { font-size: 0.875rem; color: var(--gray-500); margin: 0; }
    .btn-sm-primary {
        padding: 0.5rem 1rem; border: 1px solid var(--primary); color: var(--primary);
        border-radius: 0.5rem; font-size: 0.875rem; font-weight: 600; text-decoration: none;
        transition: all 0.2s;
    }
    .btn-sm-primary:hover { background: var(--primary); color: white; }

    /* Stats Grid */
    .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; margin-bottom: 2rem; }
    .stat-card {
        background: white; padding: 1.5rem; border-radius: 0.75rem;
        border: 1px solid var(--gray-200); text-align: center;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    }
    .stat-label { display: block; font-size: 0.875rem; color: var(--gray-500); margin-bottom: 0.5rem; }
    .text-blue { color: var(--primary); font-size: 2rem; font-weight: 700; line-height: 1; }
    .text-orange { color: var(--accent); font-size: 2rem; font-weight: 700; line-height: 1; }
    .text-green { color: var(--success); font-size: 2rem; font-weight: 700; line-height: 1; }
    .text-red { color: var(--danger); font-size: 2rem; font-weight: 700; line-height: 1; }

    /* Content Grid */
    .content-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; }
    
    .section-card {
        background: white; border-radius: 0.75rem; border: 1px solid var(--gray-200);
        padding: 1.5rem; box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    }
    .card-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; }
    .card-header h2 { font-size: 1.125rem; font-weight: 600; color: var(--gray-900); }
    .card-header a { font-size: 0.875rem; color: var(--primary); font-weight: 500; }

    .app-item {
        display: flex; align-items: center; gap: 1rem; padding: 1rem 0;
        border-bottom: 1px solid var(--gray-50);
    }
    .app-item:last-child { border-bottom: none; }
    .company-icon {
        width: 40px; height: 40px; border-radius: 0.5rem; background: var(--gray-100);
        display: flex; align-items: center; justify-content: center; color: var(--gray-500);
        flex-shrink: 0;
    }
    .company-icon img { width: 100%; height: 100%; object-fit: contain; padding: 4px; }
    
    .app-info { flex: 1; }
    .app-info h4 { font-size: 0.9375rem; font-weight: 600; margin-bottom: 0.25rem; color: var(--gray-900); }
    .app-info p { font-size: 0.75rem; color: var(--gray-500); }
    
    .app-status { text-align: right; }
    .status-badge { padding: 0.25rem 0.625rem; border-radius: 20px; font-size: 0.75rem; font-weight: 500; display: block; margin-bottom: 0.25rem; }
    .status-badge.pending { background: #fff7ed; color: #c2410c; }
    .status-badge.accepted { background: #f0fdf4; color: #15803d; }
    .status-badge.rejected { background: #fef2f2; color: #b91c1c; }
    .date { font-size: 0.75rem; color: var(--gray-400); }

    .job-item { padding: 1rem 0; border-bottom: 1px solid var(--gray-50); }
    .job-item:last-child { border-bottom: none; }
    .job-header { display: flex; justify-content: space-between; margin-bottom: 0.25rem; }
    .job-header h4 { font-size: 0.9375rem; font-weight: 600; color: var(--gray-900); }
    .tag { font-size: 0.6875rem; background: var(--gray-100); padding: 2px 6px; border-radius: 4px; color: var(--gray-600); }
    .job-item .company { font-size: 0.75rem; color: var(--gray-500); margin-bottom: 0.5rem; }
    .btn-link { font-size: 0.8125rem; color: var(--primary); text-decoration: none; font-weight: 500; }
    .btn-link:hover { text-decoration: underline; }

    .empty-state { text-align: center; color: var(--gray-500); font-size: 0.875rem; padding: 1rem; }

    @media (max-width: 900px) {
        .dashboard-sidebar { display: none; }
        .dashboard-main { padding: 2rem 1rem; }
        .stats-grid { grid-template-columns: repeat(2, 1fr); }
        .content-grid { grid-template-columns: 1fr; }
        .welcome-section { flex-direction: column; align-items: flex-start; gap: 1rem; }
        .profile-alert { flex-direction: column; text-align: center; gap: 1rem; }
    }
</style>
@endsection
