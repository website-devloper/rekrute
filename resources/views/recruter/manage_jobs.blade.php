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
            <a href="{{ route('recruiter.jobs') }}" class="nav-link active"><i class="fas fa-briefcase"></i> Manage Jobs</a>
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
                <h1>Manage Jobs</h1>
                <p>Edit, track, and manage your open positions.</p>
            </div>
            <a href="{{ route('recruiter.post_job') }}" class="btn-primary-dash">
                <i class="fas fa-plus"></i> Post Job
            </a>
        </div>

        @if(session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
        @endif

        <div class="content-card">
            <!-- Filter Bar -->
            <div class="filter-bar">
                <form action="{{ route('recruiter.jobs') }}" method="GET" class="search-form">
                    <div class="search-input-wrapper">
                        <i class="fas fa-search"></i>
                        <input type="text" name="search" placeholder="Search jobs..." value="{{ request('search') }}">
                    </div>
                </form>
                <div class="filter-tabs">
                    <a href="{{ route('recruiter.jobs', ['status' => 'active']) }}" class="tab-link {{ request('status', 'active') == 'active' ? 'active' : '' }}">Active</a>
                    <a href="{{ route('recruiter.jobs', ['status' => 'paused']) }}" class="tab-link {{ request('status') == 'paused' ? 'active' : '' }}">Paused</a>
                    <a href="{{ route('recruiter.jobs', ['status' => 'closed']) }}" class="tab-link {{ request('status') == 'closed' ? 'active' : '' }}">Closed</a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="clean-table">
                    <thead>
                        <tr>
                            <th width="30%">Job Title</th>
                            <th>Applications</th>
                            <th>Date Posted</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jobs as $job)
                        <tr>
                            <td>
                                <div class="job-cell">
                                    <span class="job-title">{{ $job->title }}</span>
                                    <span class="job-meta">{{ $job->job_type }} • {{ $job->city }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="app-count">
                                    <span class="count">{{ $job->applications_count }}</span>
                                    @if($job->applications_count > 0)
                                    <a href="{{ route('recruiter.job.applications', $job->id) }}" class="view-link">View</a>
                                    @endif
                                </div>
                            </td>
                            <td class="text-muted">{{ $job->created_at->format('M d, Y') }}</td>
                            <td>
                                <span class="status-badge {{ $job->status }}">{{ ucfirst($job->status) }}</span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('recruiter.job.edit', $job->id) }}" class="btn-icon" title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    
                                    <form action="{{ route('recruiter.job.status', $job->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="{{ $job->status == 'active' ? 'paused' : 'active' }}">
                                        <button type="submit" class="btn-icon" title="{{ $job->status == 'active' ? 'Pause' : 'Activate' }}">
                                            <i class="fas {{ $job->status == 'active' ? 'fa-pause' : 'fa-play' }}"></i>
                                        </button>
                                    </form>

                                    <form action="{{ route('recruiter.job.delete', $job->id) }}" method="POST" onsubmit="return confirm('Delete this job?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-icon text-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="empty-state">
                                No jobs found. <a href="{{ route('recruiter.post_job') }}">Post a new job</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pagination-wrapper">
                {{ $jobs->appends(request()->input())->links('pagination::bootstrap-4') }}
            </div>
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
    .company-logo {
        width: 64px; height: 64px; border-radius: 12px;
        background: var(--gray-100); display: flex; align-items: center; justify-content: center;
        margin: 0 auto 1rem; color: var(--gray-400); font-size: 1.5rem; overflow: hidden;
    }
    .company-logo img { width: 100%; height: 100%; object-fit: contain; padding: 4px; }
    .sidebar-header h3 { font-size: 1rem; font-weight: 600; color: var(--gray-900); }
    
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
    .page-header h1 { font-size: 1.5rem; font-weight: 700; color: var(--gray-900); margin-bottom: 0.25rem; }
    .page-header p { color: var(--gray-500); font-size: 0.9375rem; }

    .btn-primary-dash {
        background: var(--primary); color: white; padding: 0.625rem 1.25rem;
        border-radius: 0.5rem; font-weight: 500; text-decoration: none;
        display: inline-flex; align-items: center; gap: 0.5rem; transition: background 0.2s;
    }
    .btn-primary-dash:hover { background: var(--primary-dark); }

    .alert-success {
        background: #ecfdf5; border: 1px solid #a7f3d0; color: #047857;
        padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem;
    }

    .content-card {
        background: white; border-radius: 0.75rem; border: 1px solid var(--gray-200);
        box-shadow: 0 1px 2px rgba(0,0,0,0.05); overflow: hidden;
    }

    .filter-bar {
        padding: 1rem 1.5rem; border-bottom: 1px solid var(--gray-200);
        display: flex; justify-content: space-between; align-items: center;
    }
    .search-input-wrapper {
        position: relative; width: 300px;
    }
    .search-input-wrapper i { position: absolute; left: 0.75rem; top: 50%; transform: translateY(-50%); color: var(--gray-400); }
    .search-input-wrapper input {
        width: 100%; padding: 0.5rem 1rem 0.5rem 2.25rem; border: 1px solid var(--gray-200);
        border-radius: 0.375rem; font-size: 0.875rem;
    }
    .search-input-wrapper input:focus { outline: none; border-color: var(--primary); box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.1); }

    .filter-tabs { display: flex; gap: 1rem; }
    .tab-link {
        font-size: 0.875rem; color: var(--gray-500); text-decoration: none; font-weight: 500;
        padding: 0.25rem 0; border-bottom: 2px solid transparent; transition: all 0.2s;
    }
    .tab-link:hover { color: var(--gray-900); }
    .tab-link.active { color: var(--primary); border-bottom-color: var(--primary); }

    .clean-table { width: 100%; border-collapse: collapse; }
    .clean-table th {
        text-align: left; padding: 1rem 1.5rem; font-size: 0.75rem; color: var(--gray-500);
        text-transform: uppercase; font-weight: 600; border-bottom: 1px solid var(--gray-200); background: var(--gray-50);
    }
    .clean-table td { padding: 1rem 1.5rem; font-size: 0.875rem; color: var(--gray-700); border-bottom: 1px solid var(--gray-100); vertical-align: middle; }
    .clean-table tr:last-child td { border-bottom: none; }

    .job-cell { display: flex; flex-direction: column; }
    .job-title { font-weight: 600; color: var(--gray-900); margin-bottom: 0.25rem; }
    .job-meta { font-size: 0.75rem; color: var(--gray-500); }

    .app-count { display: flex; align-items: center; gap: 0.75rem; }
    .count { font-weight: 600; color: var(--gray-900); }
    .view-link { font-size: 0.75rem; color: var(--primary); text-decoration: none; font-weight: 500; }
    .view-link:hover { text-decoration: underline; }

    .status-badge { padding: 0.25rem 0.625rem; border-radius: 20px; font-size: 0.75rem; font-weight: 500; }
    .status-badge.active { background: #f0fdf4; color: #15803d; }
    .status-badge.paused { background: #fff7ed; color: #c2410c; }
    .status-badge.closed { background: #f1f5f9; color: #64748b; }

    .action-buttons { display: flex; gap: 0.5rem; }
    .btn-icon {
        width: 32px; height: 32px; border: 1px solid var(--gray-200); border-radius: 0.375rem;
        background: white; color: var(--gray-600); display: flex; align-items: center; justify-content: center;
        text-decoration: none; cursor: pointer; transition: all 0.2s;
    }
    .btn-icon:hover { background: var(--gray-50); border-color: var(--gray-300); color: var(--gray-900); }
    .btn-icon.text-danger:hover { background: #fef2f2; border-color: #fca5a5; color: #dc2626; }

    .empty-state { text-align: center; color: var(--gray-500); padding: 3rem !important; }
    .empty-state a { color: var(--primary); text-decoration: none; }

    .pagination-wrapper { padding: 1rem; display: flex; justify-content: center; border-top: 1px solid var(--gray-200); }

    @media (max-width: 900px) {
        .dashboard-sidebar { display: none; }
        .dashboard-main { padding: 2rem 1rem; }
        .filter-bar { flex-direction: column; gap: 1rem; align-items: flex-start; }
        .search-input-wrapper { width: 100%; }
        .action-buttons { flex-wrap: wrap; }
    }
</style>
@endsection
