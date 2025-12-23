@extends('template')

@section('content')
    <!-- Premium Hero Section -->
    <section class="jobs-hero">
        <div class="hero-bg-effects">
            <div class="hero-gradient"></div>
            <div class="hero-grid-pattern"></div>
            <div class="floating-shapes">
                <div class="shape shape-1"></div>
                <div class="shape shape-2"></div>
                <div class="shape shape-3"></div>
            </div>
        </div>
        
        <div class="container">
            <div class="hero-content" data-aos="fade-up">
                <span class="hero-badge">
                    <i class="fas fa-fire"></i>
                    {{ $jobs->total() }} Opportunities Available
                </span>
                <h1 class="hero-title">
                    Find Your <span class="text-gradient">Dream Job</span>
                </h1>
                <p class="hero-subtitle">
                    Browse thousands of job openings from the world's leading companies
                </p>
                
                <!-- Premium Search Form -->
                <div class="search-form-wrapper" data-aos="fade-up" data-aos-delay="100">
                    <form action="{{ route('jobs') }}" method="GET" class="premium-search-form">
                        <div class="search-field">
                            <div class="field-icon">
                                <i class="fas fa-search"></i>
                            </div>
                            <input type="text" name="query" placeholder="Job title, keywords, or company" value="{{ request('query') }}">
                        </div>
                        <div class="search-divider"></div>
                        <div class="search-field">
                            <div class="field-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <input type="text" name="location" placeholder="City or remote" value="{{ request('location') }}">
                        </div>
                        <button type="submit" class="search-submit">
                            <span>Search Jobs</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </form>
                </div>

                <!-- Quick Stats -->
                <div class="hero-quick-stats" data-aos="fade-up" data-aos-delay="200">
                    <div class="quick-stat">
                        <i class="fas fa-briefcase"></i>
                        <span>12k+ Jobs</span>
                    </div>
                    <div class="quick-stat">
                        <i class="fas fa-building"></i>
                        <span>8k+ Companies</span>
                    </div>
                    <div class="quick-stat">
                        <i class="fas fa-user-check"></i>
                        <span>50k+ Hires</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Area -->
    <section class="jobs-listing-section">
        <div class="container">
            <div class="jobs-layout">
                <!-- Sidebar Filters -->
                <aside class="filters-sidebar" data-aos="fade-right">
                    <div class="sidebar-card">
                        <div class="sidebar-header">
                            <h4><i class="fas fa-sliders-h"></i> Filters</h4>
                            <a href="{{ route('jobs') }}" class="clear-filters">Clear All</a>
                        </div>
                        
                        <form action="{{ route('jobs') }}" method="GET" id="filterForm">
                            <input type="hidden" name="query" value="{{ request('query') }}">
                            <input type="hidden" name="location" value="{{ request('location') }}">

                            <div class="filter-section">
                                <h5 class="filter-title">
                                    <i class="fas fa-folder-open"></i>
                                    Job Category
                                </h5>
                                <div class="filter-options">
                                    @foreach($categories as $cat)
                                    <label class="filter-option {{ request('category') == $cat ? 'active' : '' }}">
                                        <input type="radio" name="category" value="{{ $cat }}" {{ request('category') == $cat ? 'checked' : '' }} onchange="this.form.submit()">
                                        <span class="option-checkbox"></span>
                                        <span class="option-label">{{ $cat }}</span>
                                    </label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="filter-section">
                                <h5 class="filter-title">
                                    <i class="fas fa-clock"></i>
                                    Job Type
                                </h5>
                                <div class="filter-options">
                                    @foreach($jobTypes as $type)
                                    <label class="filter-option {{ request('type') == $type ? 'active' : '' }}">
                                        <input type="radio" name="type" value="{{ $type }}" {{ request('type') == $type ? 'checked' : '' }} onchange="this.form.submit()">
                                        <span class="option-checkbox"></span>
                                        <span class="option-label">{{ $type }}</span>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                        </form>
                    </div>
                </aside>

                <!-- Job Listings -->
                <div class="jobs-content">
                    <div class="jobs-header" data-aos="fade-up">
                        <div class="results-info">
                            <h2>{{ $jobs->total() }} Jobs Found</h2>
                            <p>Showing {{ $jobs->firstItem() ?? 0 }} - {{ $jobs->lastItem() ?? 0 }} results</p>
                        </div>
                        <div class="sort-options">
                            <span class="sort-label">Sort by:</span>
                            <select class="sort-select" id="sortSelect">
                                <option value="newest">Newest First</option>
                                <option value="salary-high">Highest Salary</option>
                                <option value="salary-low">Lowest Salary</option>
                            </select>
                        </div>
                    </div>

                    <div class="jobs-grid">
                        @forelse($jobs as $job)
                        <div class="premium-job-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                            <div class="job-card-header">
                                <div class="company-logo">
                                    @if($job->employer && $job->employer->logo_url)
                                        <img src="{{ Str::startsWith($job->employer->logo_url, 'http') ? $job->employer->logo_url : asset('storage/' . $job->employer->logo_url) }}" alt="{{ $job->employer->name }}">
                                    @else
                                        <div class="logo-placeholder">
                                            <i class="fas fa-building"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="job-badges">
                                    <span class="badge-type">{{ $job->job_type }}</span>
                                    @if($job->is_featured ?? false)
                                        <span class="badge-featured"><i class="fas fa-star"></i></span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="job-card-body">
                                <h3 class="job-title">
                                    <a href="{{ route('job-details', $job->id) }}">{{ $job->title }}</a>
                                </h3>
                                <p class="company-name">{{ $job->employer->name ?? 'Unknown Company' }}</p>
                                
                                <div class="job-meta">
                                    <span class="meta-item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{ $job->city }}, {{ $job->country }}
                                    </span>
                                    <span class="meta-item">
                                        <i class="fas fa-money-bill-wave"></i>
                                        {{ $job->minimum_salary }} - {{ $job->maximum_salary }} DH
                                    </span>
                                    <span class="meta-item">
                                        <i class="fas fa-clock"></i>
                                        {{ $job->timeAgo }}
                                    </span>
                                </div>
                            </div>

                            <div class="job-card-footer">
                                <span class="job-category">{{ $job->job_category }}</span>
                                <a href="{{ route('job-details', $job->id) }}" class="btn-apply-sm">
                                    Apply Now
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        @empty
                        <div class="no-results">
                            <div class="no-results-icon">
                                <i class="fas fa-search"></i>
                            </div>
                            <h3>No Jobs Found</h3>
                            <p>Try adjusting your search criteria or browse all available jobs.</p>
                            <a href="{{ route('jobs') }}" class="btn-browse-all">Browse All Jobs</a>
                        </div>
                        @endforelse
                    </div>

                    <div class="pagination-wrapper" data-aos="fade-up">
                        {{ $jobs->appends(request()->query())->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Hero Section */
        .jobs-hero {
            background: var(--gray-900);
            padding: 10rem 0 6rem;
            position: relative;
            overflow: hidden;
        }

        .hero-bg-effects {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        .hero-gradient {
            position: absolute;
            top: -50%;
            right: -20%;
            width: 100%;
            height: 150%;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.2) 0%, transparent 60%);
        }

        .hero-grid-pattern {
            position: absolute;
            inset: 0;
            background-image: 
                linear-gradient(rgba(99, 102, 241, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(99, 102, 241, 0.03) 1px, transparent 1px);
            background-size: 60px 60px;
        }

        .floating-shapes .shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            opacity: 0.4;
        }

        .shape-1 {
            width: 300px;
            height: 300px;
            background: var(--primary);
            top: 10%;
            left: 10%;
            animation: float 8s ease-in-out infinite;
        }

        .shape-2 {
            width: 200px;
            height: 200px;
            background: #ec4899;
            bottom: 20%;
            right: 20%;
            animation: float 10s ease-in-out infinite reverse;
        }

        .shape-3 {
            width: 150px;
            height: 150px;
            background: #06b6d4;
            top: 50%;
            right: 10%;
            animation: float 12s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(5deg); }
        }

        .hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
            max-width: 900px;
            margin: 0 auto;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(99, 102, 241, 0.15);
            color: var(--primary-light);
            padding: 0.625rem 1.25rem;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(99, 102, 241, 0.2);
        }

        .hero-title {
            font-size: clamp(2.5rem, 6vw, 4rem);
            font-weight: 800;
            color: white;
            margin-bottom: 1.25rem;
            letter-spacing: -0.02em;
        }

        .text-gradient {
            background: linear-gradient(135deg, var(--primary-light), #c084fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: var(--gray-400);
            margin-bottom: 2.5rem;
        }

        /* Search Form */
        .search-form-wrapper {
            max-width: 800px;
            margin: 0 auto 2.5rem;
        }

        .premium-search-form {
            background: white;
            padding: 0.75rem;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.3);
        }

        .search-field {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
        }

        .field-icon {
            color: var(--primary);
            font-size: 1rem;
        }

        .search-field input {
            border: none;
            outline: none;
            background: transparent;
            font-size: 1rem;
            width: 100%;
            color: var(--gray-900);
        }

        .search-field input::placeholder {
            color: var(--gray-400);
        }

        .search-divider {
            width: 1px;
            height: 30px;
            background: var(--gray-200);
        }

        .search-submit {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--primary);
            color: white;
            border: none;
            padding: 1rem 1.75rem;
            border-radius: 0.75rem;
            font-weight: 600;
            font-size: 0.9375rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-submit:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.3);
        }

        .search-submit i {
            font-size: 0.75rem;
            transition: transform 0.3s ease;
        }

        .search-submit:hover i {
            transform: translateX(3px);
        }

        /* Quick Stats */
        .hero-quick-stats {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .quick-stat {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--gray-400);
            font-size: 0.9375rem;
        }

        .quick-stat i {
            color: var(--primary-light);
        }

        /* Jobs Listing Section */
        .jobs-listing-section {
            padding: 4rem 0;
            background: var(--gray-50);
        }

        .jobs-layout {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 2rem;
        }

        /* Sidebar */
        .filters-sidebar {
            position: sticky;
            top: 6rem;
            height: fit-content;
        }

        .sidebar-card {
            background: white;
            border-radius: 1.25rem;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            border: 1px solid var(--gray-100);
        }

        .sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--gray-100);
        }

        .sidebar-header h4 {
            font-size: 1rem;
            font-weight: 700;
            color: var(--gray-900);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .sidebar-header h4 i {
            color: var(--primary);
        }

        .clear-filters {
            font-size: 0.8125rem;
            color: var(--danger);
            text-decoration: none;
            font-weight: 500;
        }

        .clear-filters:hover {
            text-decoration: underline;
        }

        .filter-section {
            margin-bottom: 1.5rem;
        }

        .filter-title {
            font-size: 0.8125rem;
            font-weight: 600;
            color: var(--gray-600);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .filter-title i {
            color: var(--gray-400);
            font-size: 0.75rem;
        }

        .filter-options {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .filter-option {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.625rem 0.875rem;
            border-radius: 0.625rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .filter-option:hover {
            background: var(--gray-50);
        }

        .filter-option.active {
            background: rgba(99, 102, 241, 0.08);
        }

        .filter-option input {
            display: none;
        }

        .option-checkbox {
            width: 18px;
            height: 18px;
            border: 2px solid var(--gray-300);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        .filter-option.active .option-checkbox,
        .filter-option input:checked + .option-checkbox {
            border-color: var(--primary);
            background: var(--primary);
        }

        .filter-option.active .option-checkbox::after,
        .filter-option input:checked + .option-checkbox::after {
            content: '';
            width: 6px;
            height: 6px;
            background: white;
            border-radius: 50%;
        }

        .option-label {
            font-size: 0.9375rem;
            color: var(--gray-700);
        }

        /* Jobs Content */
        .jobs-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .results-info h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 0.25rem;
        }

        .results-info p {
            font-size: 0.875rem;
            color: var(--gray-500);
            margin: 0;
        }

        .sort-options {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .sort-label {
            font-size: 0.875rem;
            color: var(--gray-500);
        }

        .sort-select {
            padding: 0.5rem 1rem;
            border: 1px solid var(--gray-200);
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--gray-700);
            background: white;
            cursor: pointer;
        }

        /* Job Cards */
        .jobs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .premium-job-card {
            background: white;
            border-radius: 1.25rem;
            padding: 1.5rem;
            border: 1px solid var(--gray-100);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
            transition: all 0.3s ease;
            position: relative;
        }

        .premium-job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border-color: var(--primary-100);
        }

        .job-card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.25rem;
        }

        .company-logo {
            width: 56px;
            height: 56px;
            background: var(--gray-100);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .company-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 8px;
        }

        .logo-placeholder {
            color: var(--gray-400);
            font-size: 1.25rem;
        }

        .job-badges {
            display: flex;
            gap: 0.5rem;
        }

        .badge-type {
            background: var(--primary-100);
            color: var(--primary-700);
            padding: 0.375rem 0.875rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-featured {
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            color: white;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.625rem;
        }

        .job-card-body {
            margin-bottom: 1.25rem;
        }

        .job-title {
            font-size: 1.125rem;
            font-weight: 700;
            margin-bottom: 0.375rem;
        }

        .job-title a {
            color: var(--gray-900);
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .job-title a:hover {
            color: var(--primary);
        }

        .company-name {
            font-size: 0.9375rem;
            color: var(--gray-500);
            margin-bottom: 1rem;
        }

        .job-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.375rem;
            font-size: 0.8125rem;
            color: var(--gray-500);
        }

        .meta-item i {
            color: var(--gray-400);
            font-size: 0.75rem;
        }

        .job-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1.25rem;
            border-top: 1px solid var(--gray-100);
        }

        .job-category {
            font-size: 0.8125rem;
            color: var(--gray-500);
            background: var(--gray-100);
            padding: 0.375rem 0.875rem;
            border-radius: 0.5rem;
        }

        .btn-apply-sm {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--gray-900);
            color: white;
            padding: 0.625rem 1.25rem;
            border-radius: 50px;
            font-size: 0.8125rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-apply-sm:hover {
            background: var(--primary);
            transform: translateX(3px);
        }

        .btn-apply-sm i {
            font-size: 0.625rem;
            transition: transform 0.3s ease;
        }

        .btn-apply-sm:hover i {
            transform: translateX(3px);
        }

        /* No Results */
        .no-results {
            grid-column: 1 / -1;
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: 1.25rem;
            border: 1px solid var(--gray-100);
        }

        .no-results-icon {
            width: 80px;
            height: 80px;
            background: var(--gray-100);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }

        .no-results-icon i {
            font-size: 2rem;
            color: var(--gray-400);
        }

        .no-results h3 {
            font-size: 1.5rem;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
        }

        .no-results p {
            color: var(--gray-500);
            margin-bottom: 1.5rem;
        }

        .btn-browse-all {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--primary);
            color: white;
            padding: 0.875rem 1.75rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-browse-all:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        /* Pagination */
        .pagination-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .jobs-layout {
                grid-template-columns: 1fr;
            }

            .filters-sidebar {
                position: static;
            }
        }

        @media (max-width: 768px) {
            .jobs-hero {
                padding: 8rem 0 4rem;
            }

            .premium-search-form {
                flex-direction: column;
                gap: 0;
            }

            .search-field {
                width: 100%;
                border-bottom: 1px solid var(--gray-100);
            }

            .search-divider {
                display: none;
            }

            .search-submit {
                width: 100%;
                justify-content: center;
                margin-top: 0.5rem;
            }

            .hero-quick-stats {
                gap: 1rem;
            }

            .jobs-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection