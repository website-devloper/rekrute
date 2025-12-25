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
            <a href="{{ route('recruiter.dashboard') }}" class="nav-link active"><i class="fas fa-th-large"></i> Dashboard</a>
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
        <div class="welcome-section">
            <div>
                <h1>Hello, {{ $employer->name }}!</h1>
                <p>Here's what's happening with your job postings today.</p>
            </div>
            <a href="{{ route('recruiter.post_job') }}" class="btn-primary-dash">
                <i class="fas fa-plus"></i> Post Job
            </a>
        </div>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon bg-blue">
                    <i class="fas fa-briefcase"></i>
                </div>
                <div>
                    <h3>{{ $totalJobs }}</h3>
                    <p>Total Jobs</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon bg-green">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div>
                    <h3>{{ $activeJobs }}</h3>
                    <p>Active Jobs</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon bg-purple">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <h3>{{ $totalApplications }}</h3>
                    <p>Total Applications</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon bg-orange">
                    <i class="fas fa-clock"></i>
                </div>
                <div>
                    <h3>{{ $pendingApplications }}</h3>
                    <p>Pending Review</p>
                </div>
            </div>
        </div>

        <div class="content-grid">
            <!-- Recent Applications -->
            <div class="section-card">
                <div class="card-header">
                    <h2>Recent Applications</h2>
                    <a href="{{ route('recruiter.applications') }}">View All</a>
                </div>
                <div class="table-responsive">
                    <table class="clean-table">
                        <thead>
                            <tr>
                                <th>Candidate</th>
                                <th>Applied For</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentApplications as $app)
                            <tr>
                                <td>
                                    <div class="candidate-info">
                                        <div class="avatar-sm">
                                            @if($app->candidate && $app->candidate->img_url)
                                                <img src="{{ asset('storage/' . $app->candidate->img_url) }}" alt="">
                                            @else
                                                <span>{{ $app->candidate ? substr($app->candidate->first_name, 0, 1) : '?' }}</span>
                                            @endif
                                        </div>
                                        <div>
                                            <span class="name">{{ $app->candidate->first_name ?? 'Unknown' }} {{ $app->candidate->last_name ?? '' }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $app->job->title ?? 'Deleted Job' }}</td>
                                <td class="text-muted">{{ $app->created_at->diffForHumans() }}</td>
                                <td>
                                    <span class="status-badge {{ $app->status }}">{{ ucfirst($app->status) }}</span>
                                </td>
                                <td>
                                    <div class="action-dropdown">
                                        <form action="{{ route('recruiter.application.status', $app->id) }}" method="POST">
                                            @csrf
                                            <select name="status" onchange="this.form.submit()" class="status-select-sm">
                                                <option value="pending" {{ $app->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="reviewed" {{ $app->status == 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                                                <option value="shortlisted" {{ $app->status == 'shortlisted' ? 'selected' : '' }}>Shortlisted</option>
                                                <option value="accepted" {{ $app->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                                <option value="rejected" {{ $app->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                            </select>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">No applications yet</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Top Jobs -->
            <div class="section-card">
                <div class="card-header">
                    <h2>Top Performing Jobs</h2>
                    <a href="{{ route('recruiter.jobs') }}">Manage Jobs</a>
                </div>
                <div class="jobs-list">
                    @forelse($topJobs as $job)
                    <div class="job-item">
                        <div class="job-info">
                            <h4>{{ $job->title }}</h4>
                            <p>{{ $job->job_type }} • {{ $job->city }}</p>
                        </div>
                        <div class="job-stats">
                            <span class="count">{{ $job->applications_count }}</span>
                            <span class="label">Applicants</span>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-4 text-muted">No jobs posted yet</div>
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
    .company-logo {
        width: 64px; height: 64px; border-radius: 12px;
        background: var(--gray-100); display: flex; align-items: center; justify-content: center;
        margin: 0 auto 1rem; color: var(--gray-400); font-size: 1.5rem; overflow: hidden;
    }
    .company-logo img { width: 100%; height: 100%; object-fit: contain; padding: 4px; }
    .sidebar-header h3 { font-size: 1rem; font-weight: 600; color: var(--gray-900); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }

    .sidebar-nav { display: flex; flex-direction: column; gap: 0.5rem; }
    .nav-link {
        display: flex; align-items: center; gap: 0.75rem;
        padding: 0.75rem 1rem; color: var(--gray-600);
        border-radius: 0.5rem; font-weight: 500; transition: all 0.2s;
    }
    .nav-link:hover, .nav-link.active { background: var(--gray-50); color: var(--primary); }
    .nav-link.active { background: #eff6ff; color: var(--primary-dark); font-weight: 600; }
    .nav-link.text-danger:hover { background: #fef2f2; color: var(--danger); }
    
    .nav-divider { margin: 1rem 0; border: 0; border-top: 1px solid var(--gray-200); }

    .dashboard-main { flex: 1; padding: 2rem 3rem; background: var(--gray-50); }

    .welcome-section { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 2rem; }
    .welcome-section h1 { font-size: 1.875rem; color: var(--gray-900); margin-bottom: 0.25rem; }
    .welcome-section p { color: var(--gray-500); font-size: 1rem; }

    .btn-primary-dash {
        background: var(--primary); color: white; padding: 0.625rem 1.25rem;
        border-radius: 0.5rem; font-weight: 500; display: inline-flex; align-items: center; gap: 0.5rem;
        transition: background 0.2s;
    }
    .btn-primary-dash:hover { background: var(--primary-dark); }

    /* Clean Stats Grid */
    .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.5rem; margin-bottom: 2rem; }
    .stat-card {
        background: white; padding: 1.5rem; border-radius: 0.75rem;
        border: 1px solid var(--gray-200); display: flex; align-items: center; gap: 1rem;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    }
    .stat-icon {
        width: 48px; height: 48px; border-radius: 10px; display: flex; align-items: center; justify-content: center;
        font-size: 1.25rem; color: white;
    }
    .bg-blue { background: var(--primary); }
    .bg-green { background: var(--success); }
    .bg-purple { background: #8b5cf6; }
    .bg-orange { background: var(--accent); }
    
    .stat-card h3 { font-size: 1.5rem; font-weight: 700; color: var(--gray-900); line-height: 1; margin-bottom: 0.25rem; }
    .stat-card p { font-size: 0.875rem; color: var(--gray-500); }

    .content-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; }
    
    .section-card {
        background: white; border-radius: 0.75rem; border: 1px solid var(--gray-200);
        padding: 1.5rem; box-shadow: 0 1px 2px rgba(0,0,0,0.05); overflow: hidden;
    }
    
    .card-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; }
    .card-header h2 { font-size: 1.125rem; font-weight: 600; color: var(--gray-900); }
    .card-header a { font-size: 0.875rem; color: var(--primary); font-weight: 500; }
    .card-header a:hover { text-decoration: underline; }

    /* Clean Table */
    .clean-table { width: 100%; border-collapse: collapse; }
    .clean-table th { text-align: left; padding: 0.75rem 1rem; font-size: 0.75rem; color: var(--gray-500); text-transform: uppercase; font-weight: 600; border-bottom: 1px solid var(--gray-100); }
    .clean-table td { padding: 1rem; font-size: 0.875rem; color: var(--gray-700); border-bottom: 1px solid var(--gray-50); }
    .clean-table tr:last-child td { border-bottom: none; }
    
    .candidate-info { display: flex; align-items: center; gap: 0.75rem; }
    .avatar-sm { width: 32px; height: 32px; border-radius: 50%; background: var(--gray-100); display: flex; align-items: center; justify-content: center; font-size: 0.875rem; font-weight: 600; color: var(--gray-600); overflow: hidden; }
    .avatar-sm img { width: 100%; height: 100%; object-fit: cover; }
    
    .status-badge { padding: 0.25rem 0.625rem; border-radius: 20px; font-size: 0.75rem; font-weight: 500; }
    .status-badge.pending { background: #fff7ed; color: #c2410c; }
    .status-badge.reviewed { background: #eff6ff; color: #1d4ed8; }
    .status-badge.shortlisted { background: #f5f3ff; color: #7c3aed; }
    .status-badge.accepted { background: #f0fdf4; color: #15803d; }
    .status-badge.rejected { background: #fef2f2; color: #b91c1c; }

    .status-select-sm { padding: 0.25rem 0.5rem; font-size: 0.75rem; border: 1px solid var(--gray-200); border-radius: 0.375rem; cursor: pointer; }

    .job-item { display: flex; justify-content: space-between; align-items: center; padding: 1rem 0; border-bottom: 1px solid var(--gray-50); }
    .job-item:last-child { border-bottom: none; }
    .job-info h4 { font-size: 0.9375rem; font-weight: 600; margin-bottom: 0.25rem; color: var(--gray-900); }
    .job-info p { font-size: 0.75rem; color: var(--gray-500); }
    .job-stats { text-align: right; }
    .job-stats .count { display: block; font-size: 1.125rem; font-weight: 600; color: var(--primary); }
    .job-stats .label { font-size: 0.75rem; color: var(--gray-500); }

    @media (max-width: 900px) {
        .dashboard-sidebar { display: none; }
        .dashboard-main { padding: 2rem 1rem; }
        .content-grid { grid-template-columns: 1fr; }
        .welcome-section { flex-direction: column; align-items: flex-start; gap: 1rem; }
    }
</style>
@endsection
