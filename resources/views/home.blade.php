@extends('template')
@section('content')

    <!-- Hero Section with Enhanced Design -->
    <section class="job-portal-hero">
        <div class="hero-overlay"></div>
        <div class="container hero-container">
            <div class="hero-content-wrapper">
                <div class="hero-text-content reveal">
                    <span class="hero-badge">🚀 #1 Job Portal Platform</span>
                    <h1 class="hero-title">
                        Find Your <span class="gradient-text">Dream Career</span><br>
                        with Top Companies
                    </h1>
                    <p class="hero-subtitle">
                        Connect with over 10,000+ employers and discover opportunities that match your skills and ambitions
                    </p>
                    
                    <!-- Advanced Search Bar -->
                    <div class="advanced-search-box">
                        <form action="{{ route('jobs') }}" method="GET" class="search-input-group">
                            <div class="input-wrapper">
                                <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <input type="text" name="query" placeholder="Job title, skill, or company" class="search-input">
                            </div>
                            <div class="input-divider"></div>
                            <div class="input-wrapper">
                                <svg class="input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <input type="text" name="location" placeholder="Location or remote" class="search-input">
                            </div>
                            <button type="submit" class="search-btn-primary">
                                <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Find Jobs
                            </button>
                        </form>
                        <div class="popular-searches">
                            <span class="popular-label">Popular:</span>
                            <a href="#" class="tag">UI/UX Designer</a>
                            <a href="#" class="tag">Software Engineer</a>
                            <a href="#" class="tag">Product Manager</a>
                            <a href="#" class="tag">Data Analyst</a>
                        </div>
                    </div>
                </div>
                
                <!-- Hero Stats -->
                <div class="hero-stats-grid reveal reveal-delay-200">
                    <div class="stat-card">
                        <div class="stat-icon blue">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="stat-number">12,500+</h3>
                        <p class="stat-label">Live Jobs</p>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon purple">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <h3 class="stat-number">8,200+</h3>
                        <p class="stat-label">Companies</p>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon green">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="stat-number">50,000+</h3>
                        <p class="stat-label">Candidates</p>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon orange">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="stat-number">2,400+</h3>
                        <p class="stat-label">New Hires</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trusted Companies Section -->
    <section class="trusted-companies reveal">
        <div class="container">
            <p class="section-note">Trusted by leading companies worldwide</p>
            <div class="companies-marquee">
                <div class="company-logo-item">Google</div>
                <div class="company-logo-item">Microsoft</div>
                <div class="company-logo-item">Amazon</div>
                <div class="company-logo-item">Meta</div>
                <div class="company-logo-item">Apple</div>
                <div class="company-logo-item">Netflix</div>
                <div class="company-logo-item">Tesla</div>
                <div class="company-logo-item">Adobe</div>
            </div>
        </div>
    </section>

    <!-- Job Categories Section -->
    <section class="job-categories-section reveal">
        <div class="container">
            <div class="section-header-center">
                <h2 class="section-title">Explore by Category</h2>
                <p class="section-description">Find the perfect job opportunity in your field of expertise</p>
            </div>
            
            <div class="categories-grid">
                <a href="#" class="category-card">
                    <div class="category-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="category-title">Technology & IT</h3>
                    <p class="category-count">2,340 jobs available</p>
                </a>
                
                <a href="#" class="category-card">
                    <div class="category-icon" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                        </svg>
                    </div>
                    <h3 class="category-title">Design & Creative</h3>
                    <p class="category-count">1,850 jobs available</p>
                </a>
                
                <a href="#" class="category-card">
                    <div class="category-icon" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="category-title">Marketing & Sales</h3>
                    <p class="category-count">1,560 jobs available</p>
                </a>
                
                <a href="#" class="category-card">
                    <div class="category-icon" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="category-title">Finance & Banking</h3>
                    <p class="category-count">980 jobs available</p>
                </a>
                
                <a href="#" class="category-card">
                    <div class="category-icon" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                        </svg>
                    </div>
                    <h3 class="category-title">Healthcare</h3>
                    <p class="category-count">1,240 jobs available</p>
                </a>
                
                <a href="#" class="category-card">
                    <div class="category-icon" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="category-title">Education</h3>
                    <p class="category-count">890 jobs available</p>
                </a>
                
                <a href="#" class="category-card">
                    <div class="category-icon" style="background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="category-title">Real Estate</h3>
                    <p class="category-count">670 jobs available</p>
                </a>
                
                <a href="#" class="category-card">
                    <div class="category-icon" style="background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                        </svg>
                    </div>
                    <h3 class="category-title">Engineering</h3>
                    <p class="category-count">1,420 jobs available</p>
                </a>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works reveal">
        <div class="container">
            <div class="section-header-center">
                <h2 class="section-title">How It Works</h2>
                <p class="section-description">Get hired in 4 quick and easy steps</p>
            </div>
            
            <div class="steps-grid">
                <div class="step-card">
                    <div class="step-number">01</div>
                    <div class="step-icon-wrapper">
                        <svg class="step-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="step-title">Create Account</h3>
                    <p class="step-description">Sign up for free and create your professional profile in minutes</p>
                </div>
                
                <div class="step-card">
                    <div class="step-number">02</div>
                    <div class="step-icon-wrapper">
                        <svg class="step-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="step-title">Upload CV/Resume</h3>
                    <p class="step-description">Upload your resume and let employers find you</p>
                </div>
                
                <div class="step-card">
                    <div class="step-number">03</div>
                    <div class="step-icon-wrapper">
                        <svg class="step-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h3 class="step-title">Find Suitable Job</h3>
                    <p class="step-description">Search and explore thousands of jobs that match your skills</p>
                </div>
                
                <div class="step-card">
                    <div class="step-number">04</div>
                    <div class="step-icon-wrapper">
                        <svg class="step-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="step-title">Apply & Get Hired</h3>
                    <p class="step-description">Apply with one click and get hired by your dream company</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Jobs Section -->
    <section class="featured-jobs-section reveal">
        <div class="container">
            <div class="section-header-flex">
                <div>
                    <h2 class="section-title">Featured Jobs</h2>
                    <p class="section-description">Hand-picked opportunities from top companies</p>
                </div>
                <a href="#" class="view-all-link">
                    View All Jobs
                    <svg class="link-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Jobs Listing -->
    <div class="container" style="padding-bottom: 5rem;">
        <div class="jobs-grid">
            @foreach($jobs->take(4) as $job)
            <!-- Dynamic Job Card -->
            <div class="modern-job-card">
                <div class="job-card-header">
                    <img src="/image/logo1.png" alt="Company Logo" class="company-logo">
                    <span class="job-type-badge">{{ $job->job_type }}</span>
                </div>
                <div class="job-card-body">
                    <h3 class="job-title">{{ $job->title }}</h3>
                    <p class="company-name">{{ $job->company_name ?? 'Tech Company' }}</p>
                    <div class="job-meta">
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            {{ $job->city }}, {{ $job->country }}
                        </span>
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ $job->minimum_salary }} - {{ $job->maximum_salary }} DH
                        </span>
                        <span class="meta-item">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ $job->timeAgo }}
                        </span>
                    </div>
                </div>
                <div class="job-card-footer">
                    <div class="tags">
                        <span class="tag-sm">{{ $job->category ?? 'General' }}</span>
                    </div>
                    <a href="{{ route('job-details', $job->id) }}" class="btn-apply">Apply Now</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- CTA Section - Upload Resume -->
    <section class="cta-upload-section reveal">
        <div class="container">
            <div class="cta-card">
                <div class="cta-content">
                    <span class="cta-badge">✨ Stand Out</span>
                    <h2 class="cta-title">Get Discovered by Top Employers</h2>
                    <p class="cta-description">Upload your resume and let opportunities come to you. Our intelligent matching connects you with roles that perfectly fit your profile.</p>
                    <div class="cta-features">
                        <div class="cta-feature">
                            <svg class="check-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>AI-powered job matching</span>
                        </div>
                        <div class="cta-feature">
                            <svg class="check-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Instant alerts for new opportunities</span>
                        </div>
                        <div class="cta-feature">
                            <svg class="check-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Private & secure profile</span>
                        </div>
                    </div>
                    <div class="cta-actions">
                        <input type="file" id="resumeFile" accept=".pdf,.doc,.docx" hidden>
                        <label for="resumeFile" class="btn-upload">
                            <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            Upload Your Resume
                        </label>
                        <span class="file-note">PDF, DOC, DOCX (Max 5MB)</span>
                    </div>
                </div>
                <div class="cta-illustration">
                    <div class="illustration-circle"></div>
                    <svg class="illustration-svg" viewBox="0 0 400 400" fill="none">
                        <rect x="80" y="100" width="240" height="280" rx="20" fill="white" opacity="0.9"/>
                        <rect x="110" y="140" width="80" height="80" rx="40" fill="#667eea" opacity="0.2"/>
                        <rect x="110" y="240" width="180" height="10" rx="5" fill="#e2e8f0"/>
                        <rect x="110" y="260" width="140" height="10" rx="5" fill="#e2e8f0"/>
                        <rect x="110" y="280" width="160" height="10" rx="5" fill="#e2e8f0"/>
                        <rect x="110" y="310" width="180" height="10" rx="5" fill="#e2e8f0"/>
                        <rect x="110" y="330" width="120" height="10" rx="5" fill="#e2e8f0"/>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-section reveal">
        <div class="container">
            <div class="section-header-center">
                <h2 class="section-title">Why Choose JobPortal?</h2>
                <p class="section-description">The smartest way to find your next opportunity</p>
            </div>
            
            <div class="benefits-grid">
                <div class="benefit-card">
                    <div class="benefit-icon-wrapper purple">
                        <svg class="benefit-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="benefit-title">Lightning Fast</h3>
                    <p class="benefit-description">Apply to jobs in seconds with our one-click application system. No more repetitive forms.</p>
                </div>

                <div class="benefit-card">
                    <div class="benefit-icon-wrapper blue">
                        <svg class="benefit-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="benefit-title">Verified Companies</h3>
                    <p class="benefit-description">All companies are verified. Apply with confidence knowing you're dealing with legitimate employers.</p>
                </div>

                <div class="benefit-card">
                    <div class="benefit-icon-wrapper green">
                        <svg class="benefit-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="benefit-title">Real-Time Updates</h3>
                    <p class="benefit-description">Get instant notifications when companies view your profile or new matching jobs are posted.</p>
                </div>

                <div class="benefit-card">
                    <div class="benefit-icon-wrapper orange">
                        <svg class="benefit-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="benefit-title">Smart Matching</h3>
                    <p class="benefit-description">Our AI analyzes your skills and preferences to connect you with the most relevant opportunities.</p>
                </div>

                <div class="benefit-card">
                    <div class="benefit-icon-wrapper pink">
                        <svg class="benefit-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h3 class="benefit-title">Expert Support</h3>
                    <p class="benefit-description">Access career coaches, resume reviews, and interview tips from industry professionals.</p>
                </div>

                <div class="benefit-card">
                    <div class="benefit-icon-wrapper teal">
                        <svg class="benefit-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                        </svg>
                    </div>
                    <h3 class="benefit-title">100% Free</h3>
                    <p class="benefit-description">No hidden fees, no subscription costs. Create your profile and apply to unlimited jobs completely free.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section reveal">
        <div class="container">
            <div class="section-header-center">
                <h2 class="section-title">Success Stories</h2>
                <p class="section-description">Hear from professionals who found their dream jobs</p>
            </div>

            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <svg class="star-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="star-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="star-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="star-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="star-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </div>
                    <p class="testimonial-text">
                        "JobPortal made my job search incredibly easy. I found my dream role as a Senior Product Designer within two weeks. The platform's AI matching is spot-on!"
                    </p>
                    <div class="testimonial-author">
                        <div class="author-avatar" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                            <span>SM</span>
                        </div>
                        <div class="author-info">
                            <h4 class="author-name">Sarah Mitchell</h4>
                            <p class="author-role">Product Designer at Google</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <svg class="star-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="star-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="star-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="star-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="star-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </div>
                    <p class="testimonial-text">
                        "The best job platform I've used. Got multiple interview requests within days of uploading my resume. Now I'm a Software Engineer at Microsoft!"
                    </p>
                    <div class="testimonial-author">
                        <div class="author-avatar" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                            <span>JC</span>
                        </div>
                        <div class="author-info">
                            <h4 class="author-name">James Chen</h4>
                            <p class="author-role">Software Engineer at Microsoft</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <svg class="star-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="star-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="star-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="star-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <svg class="star-icon" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </div>
                    <p class="testimonial-text">
                        "As a recruiter, I've hired amazing talent through JobPortal. The candidate quality is exceptional and the platform is incredibly user-friendly."
                    </p>
                    <div class="testimonial-author">
                        <div class="author-avatar" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                            <span>EP</span>
                        </div>
                        <div class="author-info">
                            <h4 class="author-name">Emily Parker</h4>
                            <p class="author-role">HR Manager at Amazon</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section reveal">
        <div class="container">
            <div class="newsletter-card">
                <div class="newsletter-content">
                    <h2 class="newsletter-title">Never Miss a Job Opportunity</h2>
                    <p class="newsletter-description">Subscribe to get weekly job alerts, career tips, and exclusive hiring events</p>
                </div>
                <div class="newsletter-form">
                    <div class="email-input-wrapper">
                        <svg class="email-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <input type="email" placeholder="Enter your email address" class="newsletter-input">
                        <button class="newsletter-btn">Subscribe Now</button>
                    </div>
                    <p class="privacy-note">🔒 We respect your privacy. Unsubscribe anytime.</p>
                </div>
            </div>
        </div>
    </section>



    <!-- Scroll to Top Button -->
    <button id="scrollToTop" class="scroll-to-top">
        <svg class="scroll-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Scroll Animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.reveal').forEach(el => {
                observer.observe(el);
            });

            // Scroll to Top
            const scrollToTopBtn = document.getElementById('scrollToTop');
            
            window.addEventListener('scroll', () => {
                if (window.pageYOffset > 300) {
                    scrollToTopBtn.classList.add('visible');
                } else {
                    scrollToTopBtn.classList.remove('visible');
                }
            });

            scrollToTopBtn.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>
@endsection