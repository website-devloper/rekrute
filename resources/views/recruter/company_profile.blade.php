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
            <a href="{{ route('recruiter.candidates') }}" class="nav-link"><i class="fas fa-file-alt"></i> Browse Resumes</a>
            <hr class="nav-divider">
            <a href="{{ route('recruiter.profile') }}" class="nav-link active"><i class="fas fa-building"></i> Company Profile</a>
            <a href="{{ route('logout') }}" class="nav-link text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="dashboard-main">
        <div class="page-header">
            <div>
                <h1>Company Profile</h1>
                <p>Manage your company information and brand</p>
            </div>
        </div>

        @if(session('success'))
            <div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-card">
            <form action="{{ route('recruiter.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-section">
                    <h3>Basic Information</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Company Name <span class="required">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{ $employer->name }}" required>
                        </div>

                        <div class="form-group">
                            <label>Established In</label>
                            <input type="text" name="Established" class="form-control" value="{{ $employer->Established_In }}" placeholder="e.g. 2010">
                        </div>

                        <div class="form-group">
                            <label>Company Type</label>
                            <select name="type" class="form-select">
                                <option value="Private" {{ $employer->type == 'Private' ? 'selected' : '' }}>Private</option>
                                <option value="Public" {{ $employer->type == 'Public' ? 'selected' : '' }}>Public</option>
                                <option value="Non-Profit" {{ $employer->type == 'Non-Profit' ? 'selected' : '' }}>Non-Profit</option>
                                <option value="Government" {{ $employer->type == 'Government' ? 'selected' : '' }}>Government</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Website URL</label>
                            <input type="text" name="website_url" class="form-control" value="{{ $employer->website_url }}" placeholder="https://example.com">
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3>Contact Details</h3>
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Email Address <span class="required">*</span></label>
                            <input type="email" name="email_adress" class="form-control" value="{{ $employer->email_adress }}" required>
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phone" class="form-control" value="{{ $employer->phone }}" placeholder="+212 6...">
                        </div>

                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" class="form-control" value="{{ $employer->city }}">
                        </div>

                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" name="country" class="form-control" value="{{ $employer->country }}">
                        </div>
                        
                        <div class="form-group full-width">
                            <label>Address/Street</label>
                            <input type="text" name="street" class="form-control" value="{{ $employer->street }}">
                        </div>

                        <div class="form-group">
                            <label>Zip Code</label>
                            <input type="text" name="zip_code" class="form-control" value="{{ $employer->zip_code }}">
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3>About Company</h3>
                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label>Company Background</label>
                            <textarea name="company_bg" class="form-control" rows="4">{{ $employer->company_bg }}</textarea>
                        </div>

                        <div class="form-group full-width">
                            <label>Services</label>
                            <textarea name="service" class="form-control" rows="3">{{ $employer->service }}</textarea>
                        </div>

                        <div class="form-group full-width">
                            <label>Expertise</label>
                            <textarea name="Expertise" class="form-control" rows="3">{{ $employer->Expertise }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3>Branding</h3>
                    <div class="form-group">
                        <label>Company Logo</label>
                        <div class="logo-upload-wrapper">
                            @if($employer->logo_url)
                                <img src="{{ asset('image/' . $employer->logo_url) }}" class="current-logo" alt="Current Logo">
                            @endif
                            <div class="file-input-container">
                                <input type="file" name="logo" id="logo" class="file-input" accept="image/*">
                                <label for="logo" class="file-label">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <span>Choose a file</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary-dash">Save Changes</button>
                    <a href="{{ route('recruiter.dashboard') }}" class="btn-secondary-dash">Cancel</a>
                </div>
            </form>
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

    .dashboard-main { flex: 1; padding: 2rem; max-width: 1000px; margin: 0 auto; }

    .page-header { margin-bottom: 2rem; }
    .page-header h1 { font-size: 1.75rem; font-weight: 700; color: var(--gray-900); margin-bottom: 0.25rem; }
    .page-header p { color: var(--gray-500); }

    .alert-success {
        background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.2);
        color: var(--success); padding: 1rem; border-radius: 0.75rem; margin-bottom: 1.5rem;
    }

    .alert-danger {
        background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2);
        color: var(--danger); padding: 1rem; border-radius: 0.75rem; margin-bottom: 1.5rem;
    }
    .alert-danger ul { margin: 0; padding-left: 1.5rem; }

    .form-card {
        background: white; border-radius: 1rem; border: 1px solid var(--gray-100);
        padding: 2rem;
    }

    .form-section { margin-bottom: 2rem; padding-bottom: 2rem; border-bottom: 1px solid var(--gray-50); }
    .form-section:last-child { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }
    
    .form-section h3 {
        font-size: 1.125rem; font-weight: 600; color: var(--gray-900);
        margin-bottom: 1.5rem;
    }

    .form-grid {
        display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;
    }

    .form-group.full-width { grid-column: 1 / -1; }

    .form-group label {
        display: block; font-size: 0.875rem; font-weight: 500;
        color: var(--gray-700); margin-bottom: 0.5rem;
    }

    .required { color: var(--danger); }

    .form-control, .form-select {
        width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--gray-200);
        border-radius: 0.5rem; font-family: inherit; font-size: 0.9375rem;
        transition: all 0.2s;
    }

    .form-control:focus, .form-select:focus {
        outline: none; border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }

    .logo-upload-wrapper {
        display: flex; align-items: center; gap: 1.5rem;
    }

    .current-logo {
        width: 64px; height: 64px; object-fit: contain;
        border: 1px solid var(--gray-200); border-radius: 0.5rem; padding: 0.25rem;
    }

    .file-input { display: none; }
    .file-label {
        display: inline-flex; align-items: center; gap: 0.5rem;
        padding: 0.5rem 1rem; border: 1px solid var(--gray-200);
        border-radius: 0.5rem; cursor: pointer; color: var(--gray-600);
        font-weight: 500; transition: all 0.2s;
    }

    .file-label:hover { background: var(--gray-50); color: var(--primary); border-color: var(--primary); }

    .form-actions {
        display: flex; gap: 1rem; margin-top: 2rem; padding-top: 2rem;
        border-top: 1px solid var(--gray-100);
    }

    .btn-primary-dash {
        padding: 0.75rem 2rem; background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white; border: none; border-radius: 0.625rem; font-weight: 600;
        cursor: pointer; transition: all 0.2s;
    }

    .btn-primary-dash:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3); }

    .btn-secondary-dash {
        padding: 0.75rem 2rem; background: var(--gray-100);
        color: var(--gray-700); border: none; border-radius: 0.625rem;
        font-weight: 600; cursor: pointer; text-decoration: none;
        transition: all 0.2s; display: inline-flex; align-items: center; justify-content: center;
    }

    .btn-secondary-dash:hover { background: var(--gray-200); }

    @media (max-width: 768px) {
        .dashboard-sidebar { display: none; }
        .form-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection