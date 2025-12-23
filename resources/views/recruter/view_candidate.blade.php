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
                <a href="{{ url()->previous() }}" class="back-link"><i class="fas fa-arrow-left"></i> Back</a>
                <h1>Candidate Profile</h1>
            </div>
            @if($candidate->resume)
            <a href="{{ asset('storage/' . $candidate->resume) }}" target="_blank" class="btn-primary-dash">
                <i class="fas fa-file-download"></i> Download Resume
            </a>
            @endif
        </div>

        <div class="profile-layout">
            <!-- Left Info Card -->
            <div class="info-card">
                <div class="profile-header">
                    <div class="profile-avatar">
                        @if($candidate->img_url)
                            <img src="{{ asset('storage/' . $candidate->img_url) }}" alt="{{ $candidate->first_name }}">
                        @else
                            <span>{{ substr($candidate->first_name, 0, 1) }}</span>
                        @endif
                    </div>
                    <h2>{{ $candidate->first_name }} {{ $candidate->last_name }}</h2>
                    <p class="role">{{ $candidate->job_title ?? 'Job Seeker' }}</p>
                </div>

                <div class="contact-list">
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <span class="label">Email</span>
                            <span class="value">{{ $candidate->email }}</span>
                        </div>
                    </div>
                    @if($candidate->phone)
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <span class="label">Phone</span>
                            <span class="value">{{ $candidate->phone }}</span>
                        </div>
                    </div>
                    @endif
                    @if($candidate->city)
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <span class="label">Location</span>
                            <span class="value">{{ $candidate->city }}</span>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Right Content -->
            <div class="content-card">
                <section class="profile-section">
                    <h3><i class="fas fa-user"></i> About Candidate</h3>
                    <div class="section-content">
                        @if($candidate->about)
                            <p>{{ $candidate->about }}</p>
                        @else
                            <p class="text-muted">No additional information provided.</p>
                        @endif
                    </div>
                </section>

                <section class="profile-section">
                    <h3><i class="fas fa-briefcase"></i> Experience & Skills</h3>
                    <div class="section-content">
                        @if(isset($candidate->experience) && $candidate->experience)
                             <p>{{ $candidate->experience }}</p>
                        @else
                             <!-- Placeholder for now as the model might not have structured experience yet -->
                             <p class="text-muted">Experience details not listed.</p>
                        @endif
                    </div>
                </section>

                <div class="action-footer">
                    <button class="btn-contact" onclick="window.location.href='mailto:{{ $candidate->email }}'">
                        <i class="fas fa-paper-plane"></i> Contact Candidate
                    </button>
                </div>
            </div>
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

    .page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; }
    .page-header h1 { font-size: 1.75rem; font-weight: 700; color: var(--gray-900); }
    .back-link { display: inline-flex; align-items: center; gap: 0.5rem; color: var(--gray-500); text-decoration: none; font-weight: 500; margin-bottom: 0.5rem; }
    .back-link:hover { color: var(--primary); }

    .btn-primary-dash {
        display: inline-flex; align-items: center; gap: 0.5rem;
        background: var(--primary); color: white; padding: 0.75rem 1.5rem;
        border-radius: 0.625rem; text-decoration: none; font-weight: 600; transition: all 0.2s;
    }
    .btn-primary-dash:hover { background: var(--primary-dark); transform: translateY(-2px); box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3); }

    .profile-layout {
        display: grid; grid-template-columns: 350px 1fr; gap: 2rem;
    }

    .info-card {
        background: white; border-radius: 1rem; box-shadow: 0 4px 6px rgba(0,0,0,0.02);
        padding: 2rem; border: 1px solid var(--gray-100); height: fit-content;
    }

    .profile-header { text-align: center; margin-bottom: 2rem; padding-bottom: 2rem; border-bottom: 1px solid var(--gray-100); }

    .profile-avatar {
        width: 120px; height: 120px; border-radius: 50%;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 1.5rem; font-size: 3rem; color: white; font-weight: 700; overflow: hidden;
    }
    .profile-avatar img { width: 100%; height: 100%; object-fit: cover; }

    .profile-header h2 { font-size: 1.5rem; font-weight: 700; color: var(--gray-900); margin-bottom: 0.5rem; }
    .role { color: var(--primary); font-weight: 600; font-size: 1rem; }

    .contact-list { display: flex; flex-direction: column; gap: 1.25rem; }

    .contact-item { display: flex; gap: 1rem; align-items: flex-start; }
    .contact-item i { width: 40px; height: 40px; border-radius: 0.5rem; background: var(--gray-50); color: var(--primary); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .contact-item .label { display: block; font-size: 0.75rem; color: var(--gray-500); margin-bottom: 0.125rem; }
    .contact-item .value { font-size: 0.9375rem; font-weight: 500; color: var(--gray-900); word-break: break-all; }

    .content-card {
        background: white; border-radius: 1rem; box-shadow: 0 4px 6px rgba(0,0,0,0.02);
        padding: 2.5rem; border: 1px solid var(--gray-100);
    }

    .profile-section { margin-bottom: 2.5rem; }
    .profile-section:last-child { margin-bottom: 0; }
    
    .profile-section h3 {
        font-size: 1.25rem; font-weight: 700; color: var(--gray-900); margin-bottom: 1.25rem;
        display: flex; align-items: center; gap: 0.75rem;
    }
    .profile-section h3 i { color: var(--primary); }

    .section-content { color: var(--gray-700); line-height: 1.7; font-size: 1rem; }
    .text-muted { color: var(--gray-500); font-style: italic; }

    .action-footer {
        margin-top: 3rem; padding-top: 2rem; border-top: 1px solid var(--gray-100);
        display: flex; gap: 1rem;
    }

    .btn-contact {
        padding: 0.75rem 2rem; background: var(--gray-900); color: white;
        border: none; border-radius: 0.625rem; font-weight: 600; cursor: pointer;
        display: inline-flex; align-items: center; gap: 0.75rem; transition: all 0.2s;
    }
    .btn-contact:hover { background: black; transform: translateY(-2px); }

    @media (max-width: 900px) {
        .profile-layout { grid-template-columns: 1fr; }
        .dashboard-sidebar { display: none; }
    }
</style>
@endsection
