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
            <a href="{{ route('recruiter.applications') }}" class="nav-link"><i class="fas fa-users"></i> Applications</a>
            <a href="{{ route('recruiter.candidates') }}" class="nav-link active"><i class="fas fa-file-alt"></i> Browse Resumes</a>
            <hr class="nav-divider">
            <a href="{{ route('recruiter.profile') }}" class="nav-link"><i class="fas fa-building"></i> Company Profile</a>
            <a href="{{ route('logout') }}" class="nav-link text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="dashboard-main">
        <div class="page-header">
            <div>
                <h1>Browse Candidates</h1>
                <p>Search and discover talent for your open positions</p>
            </div>
        </div>

        <!-- Search Bar -->
        <div class="search-bar-wrapper">
            <form action="{{ route('recruiter.candidates') }}" method="GET" class="search-form">
                <div class="search-input-group">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" name="search" class="search-input" placeholder="Search by name, job title, or skill..." value="{{ request('search') }}">
                </div>
                <button type="submit" class="btn-primary-dash">Search</button>
            </form>
        </div>

        <!-- Candidates Grid -->
        <div class="candidates-grid">
            @forelse($candidates as $candidate)
            <div class="candidate-card" data-aos="fade-up">
                <div class="candidate-header">
                    <div class="candidate-avatar">
                        @if($candidate->img_url)
                            <img src="{{ asset('storage/' . $candidate->img_url) }}" alt="{{ $candidate->first_name }}">
                        @else
                            <span>{{ substr($candidate->first_name, 0, 1) }}</span>
                        @endif
                    </div>
                </div>
                
                <div class="candidate-body">
                    <h3>{{ $candidate->first_name }} {{ $candidate->last_name }}</h3>
                    <p class="candidate-title">{{ $candidate->job_title ?? 'Job Seeker' }}</p>
                    
                    <div class="candidate-meta">
                        @if($candidate->city)
                        <span><i class="fas fa-map-marker-alt"></i> {{ $candidate->city }}</span>
                        @endif
                        <span><i class="fas fa-envelope"></i> {{ $candidate->email }}</span>
                    </div>

                    <p class="candidate-bio">
                        {{ Str::limit($candidate->about ?? 'No bio provided.', 80) }}
                    </p>
                </div>

                <div class="candidate-footer">
                    @if($candidate->resume)
                    <a href="{{ asset('storage/' . $candidate->resume) }}" target="_blank" class="btn-resume">
                        <i class="fas fa-file-download"></i> Download CV
                    </a>
                    @endif
                    <a href="{{ route('recruiter.candidate.view', $candidate->id) }}" class="btn-profile">View Profile</a>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-users-slash"></i>
                <h3>No candidates found</h3>
                <p>Try adjusting your search terms.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="pagination-wrapper">
            {{ $candidates->appends(request()->input())->links('pagination::bootstrap-4') }}
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
        width: 80px; height: 80px; border-radius: 1rem;
        background: var(--gray-100); display: flex; align-items: center; justify-content: center;
        margin: 0 auto 1rem; font-size: 2rem; color: var(--gray-400); overflow: hidden;
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

    .search-bar-wrapper {
        background: white; padding: 1rem; border-radius: 1rem; border: 1px solid var(--gray-100);
        margin-bottom: 2rem;
    }

    .search-form { display: flex; gap: 1rem; }
    
    .search-input-group {
        flex: 1; position: relative; display: flex; align-items: center;
    }

    .search-icon { position: absolute; left: 1rem; color: var(--gray-400); }

    .search-input {
        width: 100%; padding: 0.75rem 1rem 0.75rem 2.5rem; border: 1px solid var(--gray-200);
        border-radius: 0.625rem; font-size: 0.9375rem; transition: all 0.2s;
    }
    .search-input:focus { outline: none; border-color: var(--primary); box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1); }

    .btn-primary-dash {
        padding: 0.75rem 1.5rem; background: var(--primary); color: white;
        border: none; border-radius: 0.625rem; font-weight: 600; cursor: pointer;
        transition: all 0.2s;
    }
    .btn-primary-dash:hover { background: var(--primary-dark); }

    .candidates-grid {
        display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.5rem;
    }

    .candidate-card {
        background: white; border-radius: 1rem; border: 1px solid var(--gray-100);
        overflow: hidden; transition: all 0.3s ease; display: flex; flex-direction: column;
    }

    .candidate-card:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08); }

    .candidate-header {
        height: 100px; background: linear-gradient(135deg, var(--primary-light), var(--glass-border));
        position: relative; margin-bottom: 3rem;
    }

    .candidate-avatar {
        width: 80px; height: 80px; border-radius: 50%;
        background: white; border: 4px solid white;
        position: absolute; bottom: -40px; left: 50%; transform: translateX(-50%);
        display: flex; align-items: center; justify-content: center;
        font-size: 2rem; color: var(--primary); font-weight: 700; overflow: hidden;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .candidate-avatar img { width: 100%; height: 100%; object-fit: cover; }

    .candidate-body { padding: 0 1.5rem 1.5rem; text-align: center; flex: 1; }
    
    .candidate-body h3 { font-size: 1.125rem; font-weight: 700; color: var(--gray-900); margin-bottom: 0.25rem; }
    .candidate-title { color: var(--primary); font-weight: 600; font-size: 0.875rem; margin-bottom: 1rem; }

    .candidate-meta {
        display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap; margin-bottom: 1rem;
    }
    .candidate-meta span { font-size: 0.8125rem; color: var(--gray-500); display: flex; align-items: center; gap: 0.375rem; }
    .candidate-meta i { color: var(--gray-400); }

    .candidate-bio { font-size: 0.875rem; color: var(--gray-600); line-height: 1.5; }

    .candidate-footer {
        padding: 1rem 1.5rem; background: var(--gray-50); border-top: 1px solid var(--gray-100);
        display: flex; padding: 1rem; gap: 0.75rem;
    }

    .btn-resume {
        flex: 1; display: flex; align-items: center; justify-content: center; gap: 0.5rem;
        padding: 0.625rem; border-radius: 0.5rem; border: 1px solid var(--gray-300);
        color: var(--gray-700); text-decoration: none; font-size: 0.875rem; font-weight: 600;
        transition: all 0.2s;
    }
    .btn-resume:hover { background: var(--gray-100); color: var(--gray-900); }

    .btn-profile {
        flex: 1; display: flex; align-items: center; justify-content: center;
        padding: 0.625rem; border-radius: 0.5rem; background: var(--primary);
        color: white; text-decoration: none; font-size: 0.875rem; font-weight: 600;
        transition: all 0.2s;
    }
    .btn-profile:hover { background: var(--primary-dark); }

    .empty-state {
        grid-column: 1 / -1; text-align: center; padding: 4rem 2rem;
        background: white; border-radius: 1rem; border: 1px solid var(--gray-100);
    }
    .empty-state i { font-size: 3rem; color: var(--gray-300); margin-bottom: 1rem; }
    .empty-state h3 { font-size: 1.25rem; color: var(--gray-700); margin-bottom: 0.5rem; }

    .pagination-wrapper { display: flex; justify-content: center; margin-top: 2rem; }

    @media (max-width: 768px) {
        .dashboard-sidebar { display: none; }
        .candidates-grid { grid-template-columns: 1fr; }
        .search-form { flex-direction: column; }
    }
</style>
@endsection