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
            <a href="{{ route('recruiter.dashboard') }}" class="nav-link">
                <i class="fas fa-th-large"></i> Dashboard
            </a>
            <a href="{{ route('recruiter.jobs') }}" class="nav-link active">
                <i class="fas fa-briefcase"></i> Manage Jobs
            </a>
            <a href="{{ route('recruiter.post_job') }}" class="nav-link">
                <i class="fas fa-plus-circle"></i> Post New Job
            </a>
            <a href="{{ route('recruiter.applications') }}" class="nav-link">
                <i class="fas fa-users"></i> Applications
            </a>
            <a href="{{ route('recruiter.candidates') }}" class="nav-link">
                <i class="fas fa-file-alt"></i> Browse Resumes
            </a>
            <hr class="nav-divider">
            <a href="{{ route('recruiter.profile') }}" class="nav-link">
                <i class="fas fa-building"></i> Company Profile
            </a>
            <a href="{{ route('logout') }}" class="nav-link text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="dashboard-main">
        <div class="page-header">
            <div>
                <h1>Manage Jobs</h1>
                <p>View and manage all your job postings</p>
            </div>
            <a href="{{ route('recruiter.post_job') }}" class="btn-primary-dash">
                <i class="fas fa-plus"></i> Post New Job
            </a>
        </div>

        @if(session('success'))
            <div class="alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <!-- Filter Bar -->
        <div class="filter-bar">
            <form action="{{ route('recruiter.jobs') }}" method="GET" class="filter-form">
                <div class="filter-group">
                    <label>Status</label>
                    <select name="status" onchange="this.form.submit()">
                        <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>All Jobs</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="paused" {{ request('status') == 'paused' ? 'selected' : '' }}>Paused</option>
                    </select>
                </div>
            </form>
            <div class="filter-info">
                Showing <strong>{{ $jobs->count() }}</strong> of <strong>{{ $jobs->total() }}</strong> jobs
            </div>
        </div>

        <!-- Jobs Table -->
        <div class="jobs-table-wrapper">
            <table class="jobs-table">
                <thead>
                    <tr>
                        <th>Job Title</th>
                        <th>Location</th>
                        <th>Type</th>
                        <th>Applications</th>
                        <th>Status</th>
                        <th>Posted</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jobs as $job)
                    <tr>
                        <td>
                            <div class="job-title-cell">
                                <h4>{{ $job->title }}</h4>
                                <span>{{ $job->minimum_salary }}-{{ $job->maximum_salary }} DH</span>
                            </div>
                        </td>
                        <td>{{ $job->city }}, {{ $job->country }}</td>
                        <td><span class="job-type-badge">{{ $job->job_type }}</span></td>
                        <td>
                            <a href="{{ route('recruiter.job.applications', $job->id) }}" class="applications-link">
                                <span class="app-count">{{ $job->applications_count }}</span>
                                <span>applicants</span>
                            </a>
                        </td>
                        <td>
                            <span class="status-badge {{ $job->status ?? 'active' }}">
                                {{ ucfirst($job->status ?? 'active') }}
                            </span>
                        </td>
                        <td>{{ $job->created_at->format('M d, Y') }}</td>
                        <td>
                            <div class="actions-dropdown">
                                <button class="actions-btn"><i class="fas fa-ellipsis-v"></i></button>
                                <div class="dropdown-menu">
                                    <a href="{{ route('recruiter.job.applications', $job->id) }}">
                                        <i class="fas fa-users"></i> View Applications
                                    </a>
                                    <a href="{{ route('recruiter.job.edit', $job->id) }}">
                                        <i class="fas fa-edit"></i> Edit Job
                                    </a>
                                    <form action="{{ route('recruiter.job.toggle', $job->id) }}" method="POST">
                                        @csrf
                                        <button type="submit">
                                            <i class="fas fa-{{ ($job->status ?? 'active') == 'active' ? 'pause' : 'play' }}"></i>
                                            {{ ($job->status ?? 'active') == 'active' ? 'Pause' : 'Activate' }}
                                        </button>
                                    </form>
                                    <hr>
                                    <form action="{{ route('recruiter.job.delete', $job->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-danger">
                                            <i class="fas fa-trash"></i> Delete Job
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">
                            <div class="empty-table">
                                <i class="fas fa-briefcase"></i>
                                <h4>No jobs posted yet</h4>
                                <p>Start by posting your first job</p>
                                <a href="{{ route('recruiter.post_job') }}" class="btn-empty">
                                    <i class="fas fa-plus"></i> Post a Job
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="pagination-wrapper">
            {{ $jobs->appends(request()->input())->links('pagination::bootstrap-4') }}
        </div>
    </main>
</div>

<style>
    .dashboard-wrapper { display: flex; min-height: calc(100vh - 80px); background: var(--gray-50); padding-top: 80px; }

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

    .sidebar-header { text-align: center; padding-bottom: 1.5rem; border-bottom: 1px solid var(--gray-100); margin-bottom: 1.5rem; }

    .company-logo {
        width: 80px; height: 80px; border-radius: 1rem;
        background: var(--gray-100);
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 1rem; font-size: 2rem; color: var(--gray-400); overflow: hidden;
    }

    .company-logo img { width: 100%; height: 100%; object-fit: contain; padding: 0.5rem; }
    .sidebar-header h3 { font-size: 1.125rem; font-weight: 700; color: var(--gray-900); margin-bottom: 0.25rem; }
    .sidebar-header p { font-size: 0.875rem; color: var(--gray-500); }

    .sidebar-nav { display: flex; flex-direction: column; gap: 0.375rem; }

    .nav-link {
        display: flex; align-items: center; gap: 0.75rem;
        padding: 0.75rem 1rem; color: var(--gray-600);
        text-decoration: none; border-radius: 0.625rem;
        font-weight: 500; transition: all 0.2s;
    }

    .nav-link:hover { background: var(--gray-50); color: var(--gray-900); }
    .nav-link.active { background: var(--primary); color: white; }
    .nav-link.text-danger { color: var(--danger); }
    .nav-divider { margin: 1rem 0; border-color: var(--gray-100); }

    .dashboard-main { flex: 1; padding: 2rem; }

    .page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; }
    .page-header h1 { font-size: 1.75rem; font-weight: 700; color: var(--gray-900); margin-bottom: 0.25rem; }
    .page-header p { color: var(--gray-500); }

    .btn-primary-dash {
        display: inline-flex; align-items: center; gap: 0.5rem;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white; padding: 0.75rem 1.5rem; border-radius: 0.625rem;
        text-decoration: none; font-weight: 600; transition: all 0.2s;
    }

    .alert-success {
        display: flex; align-items: center; gap: 0.75rem;
        background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.2);
        color: var(--success); padding: 1rem 1.25rem; border-radius: 0.75rem; margin-bottom: 1.5rem;
    }

    .filter-bar {
        display: flex; justify-content: space-between; align-items: center;
        background: white; padding: 1rem 1.5rem; border-radius: 1rem;
        margin-bottom: 1.5rem; border: 1px solid var(--gray-100);
    }

    .filter-group label { font-size: 0.8125rem; color: var(--gray-500); margin-right: 0.5rem; }

    .filter-group select {
        padding: 0.5rem 1rem; border: 1px solid var(--gray-200);
        border-radius: 0.5rem; font-size: 0.875rem; cursor: pointer;
    }

    .filter-info { font-size: 0.875rem; color: var(--gray-500); }

    .jobs-table-wrapper {
        background: white; border-radius: 1rem;
        border: 1px solid var(--gray-100); overflow: hidden;
    }

    .jobs-table { width: 100%; border-collapse: collapse; }

    .jobs-table th {
        text-align: left; padding: 1rem 1.5rem;
        background: var(--gray-50); font-size: 0.8125rem;
        font-weight: 600; color: var(--gray-500);
        text-transform: uppercase; letter-spacing: 0.05em;
    }

    .jobs-table td { padding: 1.25rem 1.5rem; border-top: 1px solid var(--gray-100); }

    .job-title-cell h4 { font-size: 0.9375rem; font-weight: 600; color: var(--gray-900); margin-bottom: 0.125rem; }
    .job-title-cell span { font-size: 0.8125rem; color: var(--gray-500); }

    .job-type-badge {
        display: inline-block; padding: 0.375rem 0.875rem;
        background: rgba(99, 102, 241, 0.1); color: var(--primary);
        border-radius: 50px; font-size: 0.75rem; font-weight: 600;
    }

    .applications-link {
        display: flex; flex-direction: column;
        text-decoration: none; color: var(--gray-700);
    }

    .app-count { font-size: 1.25rem; font-weight: 700; color: var(--primary); }
    .applications-link span:last-child { font-size: 0.75rem; color: var(--gray-500); }

    .status-badge {
        display: inline-block; padding: 0.375rem 0.875rem;
        border-radius: 50px; font-size: 0.75rem; font-weight: 600;
    }

    .status-badge.active { background: rgba(16, 185, 129, 0.1); color: var(--success); }
    .status-badge.paused { background: rgba(245, 158, 11, 0.1); color: #d97706; }

    .actions-dropdown { position: relative; }

    .actions-btn {
        background: var(--gray-100); border: none;
        width: 36px; height: 36px; border-radius: 0.5rem;
        cursor: pointer; transition: all 0.2s;
    }

    .actions-btn:hover { background: var(--gray-200); }

    .actions-dropdown .dropdown-menu {
        position: absolute; right: 0; top: 100%;
        background: white; border-radius: 0.75rem;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        min-width: 180px; padding: 0.5rem;
        opacity: 0; visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.2s; z-index: 100;
    }

    .actions-dropdown:hover .dropdown-menu {
        opacity: 1; visibility: visible; transform: translateY(0);
    }

    .actions-dropdown .dropdown-menu a,
    .actions-dropdown .dropdown-menu button {
        display: flex; align-items: center; gap: 0.625rem;
        padding: 0.625rem 1rem; color: var(--gray-700);
        text-decoration: none; border-radius: 0.5rem;
        font-size: 0.875rem; width: 100%;
        background: none; border: none; cursor: pointer;
        text-align: left;
    }

    .actions-dropdown .dropdown-menu a:hover,
    .actions-dropdown .dropdown-menu button:hover { background: var(--gray-50); }

    .actions-dropdown .dropdown-menu .text-danger { color: var(--danger); }
    .actions-dropdown .dropdown-menu hr { margin: 0.5rem 0; border-color: var(--gray-100); }

    .empty-table {
        text-align: center; padding: 4rem 2rem; color: var(--gray-400);
    }

    .empty-table i { font-size: 3rem; margin-bottom: 1rem; }
    .empty-table h4 { font-size: 1.25rem; color: var(--gray-700); margin-bottom: 0.5rem; }

    .btn-empty {
        display: inline-flex; align-items: center; gap: 0.5rem;
        background: var(--primary); color: white;
        padding: 0.75rem 1.5rem; border-radius: 0.625rem;
        text-decoration: none; font-weight: 600; margin-top: 1rem;
    }

    .pagination-wrapper { display: flex; justify-content: center; margin-top: 1.5rem; }

    @media (max-width: 1024px) {
        .jobs-table { display: block; overflow-x: auto; }
    }

    @media (max-width: 768px) {
        .dashboard-sidebar { display: none; }
        .page-header { flex-direction: column; gap: 1rem; text-align: center; }
    }
</style>

<script>
    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.actions-dropdown')) {
            document.querySelectorAll('.actions-dropdown .dropdown-menu').forEach(menu => {
                menu.style.opacity = '0';
                menu.style.visibility = 'hidden';
            });
        }
    });
</script>
@endsection
