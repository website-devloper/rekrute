@extends('template')

@section('content')
<div class="home-wrapper">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text" data-aos="fade-up">
                    <h1>Find your <span class="text-primary">dream job</span> <br> with confidence.</h1>
                    <p>Connect with top employers and discover opportunities that match your skills and aspirations.</p>
                    
                    <form action="{{ route('jobs') }}" method="GET" class="hero-search-form">
                        <div class="input-group">
                            <i class="fas fa-search"></i>
                            <input type="text" name="query" placeholder="Job title, keywords, or company">
                        </div>
                        <div class="input-divider"></div>
                        <div class="input-group location-group">
                            <i class="fas fa-map-marker-alt"></i>
                            <input type="text" name="location" placeholder="City or zip code">
                        </div>
                        <button type="submit" class="btn-search">Search Jobs</button>
                    </form>
                    
                    <div class="hero-stats">
                        <div class="stat-item">
                            <strong>10k+</strong> <span>Active Jobs</span>
                        </div>
                        <div class="stat-item">
                            <strong>500+</strong> <span>Companies</span>
                        </div>
                        <div class="stat-item">
                            <strong>1M+</strong> <span>Candidates</span>
                        </div>
                    </div>
                </div>
                <div class="hero-image" data-aos="fade-left">
                    <div class="illustration-placeholder">
                        <i class="fas fa-rocket"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trusted Companies -->
    <section class="logos-section">
        <div class="container">
            <p class="section-label">Trusted by leading companies</p>
            <div class="company-logos">
                <div class="logo-item"><i class="fab fa-google"></i> Google</div>
                <div class="logo-item"><i class="fab fa-microsoft"></i> Microsoft</div>
                <div class="logo-item"><i class="fab fa-amazon"></i> Amazon</div>
                <div class="logo-item"><i class="fab fa-spotify"></i> Spotify</div>
                <div class="logo-item"><i class="fab fa-slack"></i> Slack</div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="why-section bg-light">
        <div class="container">
            <div class="section-header text-center">
                <h2>Why search with Rekrute?</h2>
                <p>We make job hunting easy and efficient.</p>
            </div>
            <div class="features-grid">
                <div class="feature-card" data-aos="fade-up" data-aos-delay="0">
                    <div class="icon-box bg-blue-light"><i class="fas fa-check-circle"></i></div>
                    <h3>Verified Jobs</h3>
                    <p>Every job posting is verified to ensure legitimacy and quality.</p>
                </div>
                <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon-box bg-purple-light"><i class="fas fa-bolt"></i></div>
                    <h3>Fast Application</h3>
                    <p>Apply to multiple jobs with one click using your saved profile.</p>
                </div>
                <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box bg-green-light"><i class="fas fa-comments"></i></div>
                    <h3>Direct Communication</h3>
                    <p>Chat directly with recruiters and get feedback on your applications.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Jobs -->
    <section class="jobs-section">
        <div class="container">
            <div class="section-header">
                <div>
                    <h2>Featured Jobs</h2>
                    <p>Latest opportunities from top employers</p>
                </div>
                <a href="{{ route('jobs') }}" class="btn-link">View All Jobs <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="jobs-grid">
                @foreach($jobs as $job)
                <div class="job-card-clean" data-aos="fade-up">
                    <div class="card-top">
                        <div class="employer-logo">
                            @if($job->employer && $job->employer->logo_url)
                                <img src="{{ asset('image/' . $job->employer->logo_url) }}" alt="{{ $job->employer->name }}">
                            @else
                                <span class="logo-char">{{ substr($job->employer->name ?? 'C', 0, 1) }}</span>
                            @endif
                        </div>
                        <div class="job-meta-top">
                            <span class="badge {{ $job->job_type == 'Full Time' ? 'badge-primary' : 'badge-light' }}">{{ $job->job_type }}</span>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3><a href="{{ route('job-details', $job->id) }}">{{ $job->title }}</a></h3>
                        <p class="company-name">{{ $job->employer->name }}</p>
                        <div class="job-details">
                            <span><i class="fas fa-map-marker-alt"></i> {{ $job->city }}</span>
                            <span><i class="fas fa-money-bill-wave"></i> {{ $job->minimum_salary > 0 ? '$'.number_format($job->minimum_salary/1000).'k - $'.number_format($job->maximum_salary/1000).'k' : 'Competitive' }}</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <span class="time-ago">{{ $job->timeAgo }}</span>
                        <a href="{{ route('job-details', $job->id) }}" class="btn-apply-sm">Apply</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Popular Categories -->
    <section class="categories-section bg-light">
        <div class="container">
            <div class="section-header text-center">
                <h2>Popular Categories</h2>
                <p>Explore jobs by industry</p>
            </div>
            <div class="categories-grid">
                @foreach($categories as $cat)
                <a href="{{ route('jobs', ['category' => $cat->job_category]) }}" class="category-pill" data-aos="zoom-in">
                    <i class="fas fa-tag"></i> {{ $cat->job_category }}
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- How it Works -->
    <section class="steps-section">
        <div class="container">
            <div class="section-header text-center">
                <h2>How it works</h2>
                <p>Get hired in 3 simple steps</p>
            </div>
            <div class="steps-row">
                <div class="step-item">
                    <div class="step-number">1</div>
                    <h3>Create Account</h3>
                    <p>Register and complete your professional profile.</p>
                </div>
                <div class="step-line"></div>
                <div class="step-item">
                    <div class="step-number">2</div>
                    <h3>Find Jobs</h3>
                    <p>Browse thousands of jobs that match your skills.</p>
                </div>
                <div class="step-line"></div>
                <div class="step-item">
                    <div class="step-number">3</div>
                    <h3>Apply & Win</h3>
                    <p>Apply with one click and get your dream job.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Top Employers -->
    <section class="employers-section bg-light">
        <div class="container">
            <div class="section-header">
                <h2>Top Employers</h2>
                <a href="{{ route('companies') }}" class="btn-link">View All <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="employers-grid">
                @foreach($featuredCompanies as $company)
                <a href="#" class="employer-card" data-aos="fade-up">
                    <div class="emp-logo">
                        @if($company->logo_url)
                            <img src="{{ asset('image/' . $company->logo_url) }}" alt="{{ $company->name }}">
                        @else
                            <i class="fas fa-building"></i>
                        @endif
                    </div>
                    <h4>{{ $company->name }}</h4>
                    <span class="open-jobs">{{ $company->jobs_count }} Open Jobs</span>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials-section">
        <div class="container">
            <div class="section-header text-center">
                <h2>What our users say</h2>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                    <p>"I found my dream job within a week of signing up. The process was incredibly smooth and the direct chat feature helped me connect with recruiters instantly."</p>
                    <div class="user-info">
                        <div class="avatar-sm">S</div>
                        <div>
                            <h5>Sarah Jenkins</h5>
                            <span>Software Engineer</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                    <p>"As a recruiter, this is the best platform I've used. The candidate quality is top-notch and the dashboard makes managing applications a breeze."</p>
                    <div class="user-info">
                        <div class="avatar-sm bg-primary">M</div>
                        <div>
                            <h5>Mike Ross</h5>
                            <span>HR Manager @ TechCorp</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter-section">
        <div class="container">
            <div class="newsletter-box">
                <div class="newsletter-content">
                    <h2>Subscribe to our newsletter</h2>
                    <p>Get the latest job alerts and career advice delivered to your inbox.</p>
                </div>
                <form class="newsletter-form" onsubmit="event.preventDefault(); alert('Subscribed!');">
                    <input type="email" placeholder="Enter your email address">
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section bg-dark">
        <div class="container text-center">
            <h2>Ready to take the next step?</h2>
            <p>Join millions of professionals and companies growing together.</p>
            <div class="cta-buttons-center">
                <a href="{{ route('sign_up') }}" class="btn-primary-lg">Get Started Now</a>
                <a href="{{ route('contact') }}" class="btn-outline-lg">Contact Sales</a>
            </div>
        </div>
    </section>
</div>

<style>
    /* Global Helpers */
    .home-wrapper { overflow-x: hidden; }
    .container { max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; }
    .text-primary { color: var(--primary); }
    .text-center { text-align: center; }
    .bg-light { background: var(--gray-50); }
    .bg-dark { background: var(--gray-900); color: white; }
    
    .section-header { margin-bottom: 2.5rem; }
    .section-header h2 { font-size: 2rem; font-weight: 700; margin-bottom: 0.5rem; color: var(--gray-900); }
    .section-header p { color: var(--gray-500); font-size: 1.125rem; }
    .section-header { display: flex; justify-content: space-between; align-items: flex-end; }
    .section-header.text-center { display: block; }

    /* Hero */
    .hero-section { padding: 5rem 0; background: white; }
    .hero-content { display: flex; align-items: center; gap: 4rem; }
    .hero-text { flex: 1.2; }
    .hero-text h1 { font-size: 3.25rem; line-height: 1.1; margin-bottom: 1.5rem; color: var(--gray-900); }
    .hero-text p { font-size: 1.125rem; color: var(--gray-500); margin-bottom: 2.5rem; max-width: 500px; }
    
    .hero-search-form {
        display: flex; background: white; border: 1px solid var(--gray-200); padding: 0.5rem;
        border-radius: 0.75rem; box-shadow: 0 4px 20px rgba(0,0,0,0.05); margin-bottom: 3rem;
    }
    .input-group { flex: 1; display: flex; align-items: center; padding: 0.5rem 1rem; }
    .input-group i { color: var(--gray-400); margin-right: 0.75rem; }
    .input-group input { border: none; width: 100%; outline: none; font-size: 1rem; color: var(--gray-800); }
    .input-divider { width: 1px; background: var(--gray-200); margin: 0.5rem 0; }
    .btn-search {
        background: var(--primary); color: white; border: none; padding: 0.75rem 2rem;
        border-radius: 0.5rem; font-weight: 600; cursor: pointer; transition: background 0.2s;
    }
    .btn-search:hover { background: var(--primary-dark); }
    
    .hero-stats { display: flex; gap: 3rem; }
    .stat-item strong { display: block; font-size: 1.5rem; color: var(--gray-900); }
    .stat-item span { font-size: 0.875rem; color: var(--gray-500); }
    
    .hero-image { flex: 0.8; }
    .illustration-placeholder {
        width: 100%; height: 400px; background: var(--gray-50); border-radius: 2rem;
        display: flex; align-items: center; justify-content: center; font-size: 5rem; color: var(--gray-300);
    }

    /* Trusted Logos */
    .logos-section { padding: 3rem 0; border-bottom: 1px solid var(--gray-50); text-align: center; }
    .section-label { font-size: 0.875rem; text-transform: uppercase; letter-spacing: 1px; color: var(--gray-400); margin-bottom: 2rem; font-weight: 600; }
    .company-logos { display: flex; justify-content: center; gap: 4rem; flex-wrap: wrap; opacity: 0.6; }
    .logo-item { font-size: 1.5rem; font-weight: 600; color: var(--gray-500); display: flex; align-items: center; gap: 0.5rem; }

    /* Why Section */
    .why-section { padding: 5rem 0; }
    .features-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem; }
    .feature-card { background: white; padding: 2rem; border-radius: 1rem; border: 1px solid var(--gray-200); text-align: center; transition: transform 0.2s; }
    .feature-card:hover { transform: translateY(-5px); }
    .icon-box {
        width: 60px; height: 60px; border-radius: 12px; margin: 0 auto 1.5rem; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;
    }
    .bg-blue-light { background: #eff6ff; color: var(--primary); }
    .bg-purple-light { background: #f5f3ff; color: #8b5cf6; }
    .bg-green-light { background: #f0fdf4; color: var(--success); }
    .feature-card h3 { font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem; }
    .feature-card p { color: var(--gray-500); }

    /* Featured Jobs */
    .jobs-section { padding: 5rem 0; }
    .jobs-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; }
    .job-card-clean {
        background: white; border: 1px solid var(--gray-200); border-radius: 1rem; padding: 1.5rem;
        display: flex; flex-direction: column; transition: all 0.2s;
    }
    .job-card-clean:hover { border-color: var(--primary); box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
    .card-top { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem; }
    .employer-logo {
        width: 48px; height: 48px; border-radius: 10px; background: var(--gray-50);
        display: flex; align-items: center; justify-content: center; overflow: hidden;
    }
    .employer-logo img { width: 100%; height: 100%; object-fit: contain; padding: 4px; }
    .logo-char { font-size: 1.25rem; font-weight: 700; color: var(--gray-400); }
    .badge { padding: 4px 10px; border-radius: 20px; font-size: 0.75rem; font-weight: 500; }
    .badge-primary { background: #eff6ff; color: var(--primary); }
    .badge-light { background: var(--gray-100); color: var(--gray-600); }
    .card-content h3 { font-size: 1.125rem; margin-bottom: 0.25rem; }
    .card-content h3 a { text-decoration: none; color: var(--gray-900); }
    .card-content .company-name { font-size: 0.875rem; color: var(--gray-500); margin-bottom: 1rem; }
    .job-details { display: flex; gap: 1rem; font-size: 0.875rem; color: var(--gray-500); margin-bottom: 1.5rem; }
    .card-footer { margin-top: auto; display: flex; justify-content: space-between; align-items: center; padding-top: 1rem; border-top: 1px solid var(--gray-100); }
    .time-ago { font-size: 0.75rem; color: var(--gray-400); }
    .btn-apply-sm {
        background: var(--primary); color: white; padding: 0.5rem 1rem; border-radius: 0.5rem;
        text-decoration: none; font-size: 0.875rem; font-weight: 500; transition: background 0.2s;
    }
    .btn-apply-sm:hover { background: var(--primary-dark); }
    .btn-link { color: var(--primary); text-decoration: none; font-weight: 500; }

    /* Categories */
    .categories-section { padding: 5rem 0; }
    .categories-grid { display: flex; flex-wrap: wrap; justify-content: center; gap: 1rem; }
    .category-pill {
        background: white; border: 1px solid var(--gray-200); padding: 0.75rem 1.5rem;
        border-radius: 50px; text-decoration: none; color: var(--gray-600); font-weight: 500;
        transition: all 0.2s; display: flex; align-items: center; gap: 0.5rem;
    }
    .category-pill:hover { border-color: var(--primary); color: var(--primary); transform: translateY(-2px); }

    /* Steps */
    .steps-section { padding: 5rem 0; }
    .steps-row { display: flex; justify-content: space-between; align-items: flex-start; margin-top: 3rem; position: relative; }
    .step-item { flex: 1; text-align: center; position: relative; z-index: 2; }
    .step-number {
        width: 50px; height: 50px; background: var(--primary); color: white; border-radius: 50%;
        display: flex; align-items: center; justify-content: center; font-size: 1.25rem; font-weight: 700; margin: 0 auto 1.5rem;
        box-shadow: 0 0 0 8px white;
    }
    .step-line { flex: 1; height: 2px; background: var(--gray-200); margin-top: 25px; }
    .step-item h3 { font-size: 1.25rem; margin-bottom: 0.5rem; }
    .step-item p { color: var(--gray-500); max-width: 200px; margin: 0 auto; }

    /* Employers */
    .employers-section { padding: 5rem 0; }
    .employers-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; }
    .employer-card {
        background: white; border: 1px solid var(--gray-200); border-radius: 1rem; padding: 2rem;
        text-align: center; text-decoration: none; color: inherit; transition: all 0.2s;
    }
    .employer-card:hover { border-color: var(--primary); transform: translateY(-5px); }
    .emp-logo {
        width: 64px; height: 64px; border-radius: 12px; background: var(--gray-50);
        margin: 0 auto 1.5rem; display: flex; align-items: center; justify-content: center; color: var(--gray-400); font-size: 1.5rem;
    }
    .emp-logo img { width: 100%; height: 100%; object-fit: contain; padding: 4px; }
    .employer-card h4 { font-size: 1.125rem; margin-bottom: 0.5rem; color: var(--gray-900); }
    .open-jobs { font-size: 0.875rem; color: var(--primary); font-weight: 500; }

    /* Testimonials */
    .testimonials-section { padding: 5rem 0; }
    .testimonials-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 2rem; max-width: 900px; margin: 0 auto; }
    .testimonial-card {
        background: white; padding: 2.5rem; border-radius: 1rem; border: 1px solid var(--gray-200);
        position: relative;
    }
    .stars { color: var(--accent); margin-bottom: 1rem; font-size: 0.875rem; }
    .testimonial-card p { font-size: 1.125rem; color: var(--gray-700); font-style: italic; margin-bottom: 2rem; line-height: 1.6; }
    .user-info { display: flex; align-items: center; gap: 1rem; }
    .avatar-sm { width: 40px; height: 40px; background: var(--gray-200); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; color: var(--gray-600); }
    .user-info h5 { font-size: 0.9375rem; margin: 0; color: var(--gray-900); }
    .user-info span { font-size: 0.75rem; color: var(--gray-500); }

    /* Newsletter */
    .newsletter-section { padding: 5rem 0; background: white; border-top: 1px solid var(--gray-50); }
    .newsletter-box {
        background: var(--gray-50); border-radius: 2rem; padding: 3rem;
        display: flex; justify-content: space-between; align-items: center; gap: 2rem;
    }
    .newsletter-content h2 { font-size: 1.75rem; margin-bottom: 0.5rem; }
    .newsletter-content p { color: var(--gray-500); }
    .newsletter-form { display: flex; gap: 1rem; flex: 1; justify-content: flex-end; }
    .newsletter-form input {
        padding: 0.75rem 1.5rem; border: 1px solid var(--gray-200); border-radius: 0.5rem;
        width: 100%; max-width: 300px; outline: none;
    }
    .newsletter-form button {
        background: var(--dark); color: white; border: none; padding: 0.75rem 2rem;
        border-radius: 0.5rem; font-weight: 600; cursor: pointer;
    }

    /* CTA */
    .cta-section { padding: 6rem 0; }
    .bg-dark h2 { margin-bottom: 1rem; }
    .bg-dark p { color: var(--gray-400); margin-bottom: 3rem; font-size: 1.25rem; }
    .cta-buttons-center { display: flex; justify-content: center; gap: 1rem; }
    .btn-primary-lg {
        background: var(--primary); color: white; padding: 1rem 2.5rem; border-radius: 0.5rem;
        font-weight: 600; text-decoration: none; font-size: 1.125rem; transition: background 0.2s;
    }
    .btn-primary-lg:hover { background: var(--primary-dark); }
    .btn-outline-lg {
        border: 2px solid var(--gray-700); color: white; padding: 1rem 2.5rem; border-radius: 0.5rem;
        font-weight: 600; text-decoration: none; font-size: 1.125rem; transition: all 0.2s;
    }
    .btn-outline-lg:hover { border-color: white; background: transparent; }

    @media (max-width: 900px) {
        .hero-content { flex-direction: column; text-align: center; }
        .hero-search-form { flex-direction: column; }
        .input-divider { display: none; }
        .hero-stats { justify-content: center; flex-wrap: wrap; }
        
        .features-grid, .jobs-grid, .employers-grid { grid-template-columns: 1fr; }
        .steps-row { flex-direction: column; align-items: center; gap: 2rem; margin-top: 0; }
        .step-line { display: none; }
        
        .newsletter-box { flex-direction: column; text-align: center; }
        .newsletter-form { flex-direction: column; width: 100%; }
        .newsletter-form input { max-width: 100%; }
        
        .testimonials-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection