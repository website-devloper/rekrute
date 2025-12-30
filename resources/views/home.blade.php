@extends('template')

@section('content')
<div class="home-wrapper">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-bg-elements">
            <div class="glow-spot primary-glow"></div>
            <div class="glow-spot secondary-glow"></div>
        </div>
        <div class="container">
            <div class="hero-content">
                <div class="hero-text" data-aos="fade-right">
                    <span class="hero-tagline">🚀 The Future of Recruitment</span>
                    <h1>Find your <span class="gradient-text">dream job</span> <br> with confidence.</h1>
                    <p>Connect with top employers and discover opportunities that match your skills and aspirations. Verified listings and AI-powered matches.</p>
                    
                    <form action="{{ route('jobs') }}" method="GET" class="hero-search-form">
                        <div class="search-input-wrapper">
                            <div class="input-group">
                                <i class="fas fa-search"></i>
                                <input type="text" name="query" placeholder="Job title or keywords">
                            </div>
                            <div class="input-divider"></div>
                            <div class="input-group location-group">
                                <i class="fas fa-map-marker-alt"></i>
                                <input type="text" name="location" placeholder="City or zip code">
                            </div>
                        </div>
                        <button type="submit" class="btn-search">
                            <span>Search Jobs</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </form>
                    
                    <div class="hero-stats">
                        <div class="stat-item">
                            <div class="stat-icon"><i class="fas fa-briefcase"></i></div>
                            <div class="stat-info">
                                <strong>10k+</strong> <span>Active Jobs</span>
                            </div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-icon"><i class="fas fa-building"></i></div>
                            <div class="stat-info">
                                <strong>500+</strong> <span>Companies</span>
                            </div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-icon"><i class="fas fa-users"></i></div>
                            <div class="stat-info">
                                <strong>1M+</strong> <span>Candidates</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-image-wrapper" data-aos="fade-left">
                    <div class="floating-image">
                        <img src="{{ asset('image/hero-illustration.png') }}" alt="Job Search Illustration">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trusted Companies -->
    <section class="logos-section">
        <div class="container">
            <p class="section-label">Trusted by industry leaders</p>
            <div class="logo-carousel-track">
                <div class="company-logos">
                    <div class="logo-item"><i class="fab fa-google"></i><span>Google</span></div>
                    <div class="logo-item"><i class="fab fa-microsoft"></i><span>Microsoft</span></div>
                    <div class="logo-item"><i class="fab fa-amazon"></i><span>Amazon</span></div>
                    <div class="logo-item"><i class="fab fa-spotify"></i><span>Spotify</span></div>
                    <div class="logo-item"><i class="fab fa-slack"></i><span>Slack</span></div>
                    <div class="logo-item"><i class="fab fa-apple"></i><span>Apple</span></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="why-section">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="sub-header">Why Rekrify</span>
                <h2>Revolutionizing the Job Search</h2>
                <p>We combine advanced technology with human-centric design to make job hunting effortless.</p>
            </div>
            <div class="features-grid">
                <div class="feature-card" data-aos="fade-up" data-aos-delay="0">
                    <div class="icon-box-wrapper">
                        <div class="icon-box bg-blue-glow"><i class="fas fa-shield-alt"></i></div>
                    </div>
                    <h3>Verified Postings</h3>
                    <p>Every single job listing undergoes a rigorous manual verification process to ensure legitimacy and protect you from scams.</p>
                    <div class="card-footer-link">Learn More <i class="fas fa-arrow-right"></i></div>
                </div>
                <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon-box-wrapper">
                        <div class="icon-box bg-purple-glow"><i class="fas fa-bolt"></i></div>
                    </div>
                    <h3>Smart Applications</h3>
                    <p>Apply to multiple positions in seconds with our optimized application flow and unified professional profile system.</p>
                    <div class="card-footer-link">Learn More <i class="fas fa-arrow-right"></i></div>
                </div>
                <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box-wrapper">
                        <div class="icon-box bg-green-glow"><i class="fas fa-comments"></i></div>
                    </div>
                    <h3>Real-time Feedback</h3>
                    <p>No more guessing. Get direct feedback from recruiters and track your application status every step of the way.</p>
                    <div class="card-footer-link">Learn More <i class="fas fa-arrow-right"></i></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Jobs -->
    <section class="jobs-section bg-soft">
        <div class="container">
            <div class="section-header">
                <div>
                    <span class="sub-header">Latest Openings</span>
                    <h2>Featured Opportunities</h2>
                    <p>Explore high-quality jobs curated just for you</p>
                </div>
                <a href="{{ route('jobs') }}" class="btn-primary-outline">
                    View All Jobs <i class="fas fa-external-link-alt"></i>
                </a>
            </div>
            <div class="jobs-grid">
                @foreach($jobs->take(6) as $job)
                <div class="job-card-premium" data-aos="fade-up">
                    <div class="card-top">
                        <div class="employer-branding">
                            <div class="employer-logo">
                                @if($job->employer && $job->employer->logo_url)
                                    <img src="{{ asset('image/' . $job->employer->logo_url) }}" alt="{{ $job->employer->name }}">
                                @else
                                    <div class="logo-placeholder">{{ substr($job->employer->name ?? 'C', 0, 1) }}</div>
                                @endif
                            </div>
                            <div class="employer-name-wrap">
                                <span class="company-name">{{ $job->employer->name }}</span>
                                <span class="verify-badge"><i class="fas fa-check-circle"></i> Verified</span>
                            </div>
                        </div>
                        <div class="job-type-tag {{ strtolower(str_replace(' ', '-', $job->job_type)) }}">
                            {{ $job->job_type }}
                        </div>
                    </div>
                    <div class="card-body">
                        <h3><a href="{{ route('job-details', $job->id) }}">{{ $job->title }}</a></h3>
                        <div class="job-tags">
                            <span><i class="fas fa-map-marker-alt"></i> {{ $job->city }}</span>
                            <span><i class="fas fa-wallet"></i> {{ $job->minimum_salary > 0 ? '$'.number_format($job->minimum_salary/1000).'k - $'.number_format($job->maximum_salary/1000).'k' : 'Competitive' }}</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <span class="posted-time">{{ $job->timeAgo }}</span>
                        <a href="{{ route('job-details', $job->id) }}" class="btn-apply-main">View Details</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Popular Categories -->
    <section class="categories-section">
        <div class="container">
            <div class="section-header text-center">
                <span class="sub-header">Browse by Interest</span>
                <h2>Explore Categories</h2>
                <p>Find specialized roles across various industries and domains</p>
            </div>
            <div class="categories-cloud">
                @foreach($categories as $cat)
                <a href="{{ route('jobs', ['category' => $cat->job_category]) }}" class="category-item-modern" data-aos="zoom-in">
                    <div class="cat-icon"><i class="fas fa-hashtag"></i></div>
                    <span class="cat-name">{{ $cat->job_category }}</span>
                    <span class="cat-count">+{{ rand(10, 100) }}</span>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- How it Works -->
    <section class="how-it-works-section bg-dark-modern">
        <div class="container">
            <div class="section-header text-center text-white" data-aos="fade-up">
                <span class="sub-header text-primary">Process</span>
                <h2 class="text-white">How it Works</h2>
                <p class="text-gray-400">Your journey to a new career in three simple steps</p>
            </div>
            <div class="steps-container">
                <div class="step-card" data-aos="fade-up" data-aos-delay="0">
                    <div class="step-num-wrap">
                        <div class="step-num">01</div>
                        <div class="step-line"></div>
                    </div>
                    <div class="step-content">
                        <h3>Build Profile</h3>
                        <p>Create a stunning digital CV that highlights your skills and experience.</p>
                    </div>
                </div>
                <div class="step-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="step-num-wrap">
                        <div class="step-num">02</div>
                        <div class="step-line"></div>
                    </div>
                    <div class="step-content">
                        <h3>Match Jobs</h3>
                        <p>Our AI analyzes your profile to suggest the most relevant opportunities.</p>
                    </div>
                </div>
                <div class="step-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="step-num-wrap">
                        <div class="step-num">03</div>
                    </div>
                    <div class="step-content">
                        <h3>Get Hired</h3>
                        <p>Apply directly and communicate with recruiters instantly via our chat.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Top Employers -->
    <section class="employers-section">
        <div class="container">
            <div class="section-header">
                <div>
                    <span class="sub-header">Collaborations</span>
                    <h2>Top Hiring Companies</h2>
                    <p>Work with the innovators leading their respective industries</p>
                </div>
                <a href="{{ route('companies') }}" class="btn-link-premium">Discover More <i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="employers-grid-modern">
                @foreach($featuredCompanies->take(8) as $company)
                <a href="#" class="employer-box" data-aos="fade-up">
                    <div class="box-logo">
                        @if($company->logo_url)
                            <img src="{{ asset('image/' . $company->logo_url) }}" alt="{{ $company->name }}">
                        @else
                            <i class="fas fa-building"></i>
                        @endif
                    </div>
                    <div class="box-info">
                        <h4>{{ $company->name }}</h4>
                        <span class="jobs-count">{{ $company->jobs_count ?? rand(5, 20) }} Open Positions</span>
                    </div>
                    <div class="box-arrow">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials-section bg-soft">
        <div class="container">
            <div class="section-header text-center">
                <span class="sub-header">Success Stories</span>
                <h2>What our community says</h2>
            </div>
            <div class="testimonials-slider-view">
                <div class="testimonial-premium" data-aos="fade-right">
                    <div class="quote-mark"><i class="fas fa-quote-left"></i></div>
                    <p>"Rekrify simplified my job search beyond my expectations. The AI matches were actually relevant, and the direct chat feature is a game changer. I secured a role at a top tech firm within two weeks."</p>
                    <div class="testimonial-profile">
                        <div class="profile-avatar bg-blue-100">SJ</div>
                        <div class="profile-details">
                            <h5>Sarah Jenkins</h5>
                            <span>Senior Frontend Architect</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-premium" data-aos="fade-left">
                    <div class="quote-mark"><i class="fas fa-quote-left"></i></div>
                    <p>"The quality of candidates we receive through Rekrify is significantly higher than other platforms. The verification system saves us hours of screening time. Highly recommended for growth teams."</p>
                    <div class="testimonial-profile">
                        <div class="profile-avatar bg-purple-100">MR</div>
                        <div class="profile-details">
                            <h5>Mike Ross</h5>
                            <span>Head of Talent @ TechCorp</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter + CTA -->
    <section class="final-cta-section">
        <div class="container">
            <div class="cta-newsletter-card">
                <div class="cta-image-deco">
                    <img src="{{ asset('image/hero-illustration.png') }}" alt="Decoration" class="floating-mini">
                </div>
                <div class="cta-content-main">
                    <h2>Stay ahead of the curve</h2>
                    <p>Get exclusive job alerts and career growth tips delivered weekly. Join 50,000+ professionals already growing with us.</p>
                    <form class="newsletter-inline" onsubmit="event.preventDefault();">
                        <div class="inline-input">
                            <i class="far fa-envelope"></i>
                            <input type="email" placeholder="Enter your email address">
                        </div>
                        <button type="submit" class="btn-subscribe-modern">Join Now</button>
                    </form>
                </div>
            </div>
            
            <div class="bottom-cta-box" data-aos="fade-up">
                <h3>Ready to accelerate your career?</h3>
                <div class="cta-actions">
                    <a href="{{ route('sign_up') }}" class="btn-gradient-primary">Get Started Free</a>
                    <a href="{{ route('contact') }}" class="btn-glass">Speak with Sales</a>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    /* Design Tokens */
    :root {
        --primary-gradient: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        --text-gradient: linear-gradient(90deg, #1e293b 0%, #3b82f6 100%);
        --glass-bg: rgba(255, 255, 255, 0.8);
        --glass-border: rgba(255, 255, 255, 0.2);
        --shadow-premium: 0 20px 40px -15px rgba(0, 0, 0, 0.1);
    }

    /* Layout Helpers */
    .home-wrapper { overflow-x: hidden; position: relative; }
    .container { max-width: 1280px; margin: 0 auto; padding: 0 2rem; }
    .bg-soft { background-color: #f8fafc; }
    .bg-dark-modern { background-color: #0f172a; }
    .text-primary { color: #3b82f6; }
    .text-gray-400 { color: #94a3b8; }
    .text-center { text-align: center; }
    .gradient-text { 
        background: var(--primary-gradient); 
        -webkit-background-clip: text; 
        -webkit-text-fill-color: transparent; 
    }
    .sub-header { 
        display: block; 
        font-weight: 700; 
        text-transform: uppercase; 
        letter-spacing: 0.1em; 
        font-size: 0.8rem; 
        color: #3b82f6; 
        margin-bottom: 0.75rem; 
    }

    /* Section Headers */
    .section-header { margin-bottom: 4rem; }
    .section-header h2 { font-size: 2.75rem; font-weight: 800; line-height: 1.2; margin-bottom: 1rem; color: #0f172a; }
    .section-header p { font-size: 1.15rem; color: #64748b; max-width: 600px; }
    .section-header.text-center p { margin: 0 auto; }
    .section-header { display: flex; justify-content: space-between; align-items: flex-end; gap: 2rem; }
    .section-header.text-center { display: block; }

    /* Hero Section */
    .hero-section { padding: 8rem 0 6rem; position: relative; background: #ffffff; }
    .hero-bg-elements { position: absolute; inset: 0; overflow: hidden; pointer-events: none; }
    .glow-spot { position: absolute; width: 40vw; height: 40vw; border-radius: 50%; filter: blur(100px); opacity: 0.1; }
    .primary-glow { background: #3b82f6; top: -10%; right: -5%; }
    .secondary-glow { background: #8b5cf6; bottom: 0%; left: -5%; }

    .hero-content { display: flex; align-items: center; gap: 5rem; position: relative; z-index: 2; }
    .hero-text { flex: 1.4; }
    .hero-tagline { 
        display: inline-block; padding: 0.5rem 1rem; background: #eff6ff; color: #1e61d8; 
        border-radius: 2rem; font-weight: 600; font-size: 0.9rem; margin-bottom: 2rem; 
    }
    .hero-text h1 { font-size: 4rem; font-weight: 800; letter-spacing: -0.04em; line-height: 1.05; margin-bottom: 1.5rem; }
    .hero-text p { font-size: 1.25rem; line-height: 1.6; color: #475569; margin-bottom: 3rem; max-width: 580px; }

    .hero-search-form {
        background: white; padding: 0.6rem; border-radius: 1.25rem; 
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08); 
        display: flex; gap: 0.5rem; border: 1px solid #f1f5f9; margin-bottom: 4rem;
    }
    .search-input-wrapper { display: flex; flex: 1; align-items: center; }
    .hero-search-form .input-group { flex: 1; display: flex; align-items: center; padding: 0 1.25rem; }
    .hero-search-form .input-group i { color: #94a3b8; font-size: 1.1rem; }
    .hero-search-form .input-group input { 
        border: none; padding: 1rem 0.75rem; width: 100%; outline: none; 
        font-size: 1rem; font-weight: 500; color: #1e293b; 
    }
    .input-divider { width: 1px; height: 30px; background: #e2e8f0; }
    .btn-search {
        background: #3b82f6; color: white; border: none; padding: 0 2.5rem; 
        border-radius: 1rem; font-weight: 700; cursor: pointer; transition: transform 0.2s, background 0.2s;
        display: flex; align-items: center; gap: 0.75rem;
    }
    .btn-search:hover { background: #2563eb; transform: translateY(-2px); }

    .hero-stats { display: flex; gap: 3.5rem; border-top: 1px solid #f1f5f9; padding-top: 3rem; }
    .stat-item { display: flex; align-items: center; gap: 1rem; }
    .stat-icon { 
        width: 48px; height: 48px; background: #f8fafc; border-radius: 0.75rem; 
        display: flex; align-items: center; justify-content: center; color: #3b82f6; font-size: 1.2rem;
    }
    .stat-info strong { display: block; font-size: 1.5rem; font-weight: 800; color: #0f172a; line-height: 1; }
    .stat-info span { font-size: 0.85rem; color: #64748b; font-weight: 500; }

    .hero-image-wrapper { flex: 1; }
    .floating-image { animation: float 6s ease-in-out infinite; }
    .floating-image img { width: 100%; height: auto; border-radius: 2rem; }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }

    /* Logo Section */
    .logos-section { padding: 4rem 0; border-top: 1px solid #f1f5f9; }
    .section-label { text-align: center; color: #94a3b8; font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em; font-size: 0.75rem; margin-bottom: 2.5rem; }
    .company-logos { display: flex; justify-content: center; align-items: center; gap: 5rem; flex-wrap: wrap; }
    .logo-item { 
        display: flex; align-items: center; gap: 0.75rem; color: #94a3b8; font-size: 1.5rem; 
        font-weight: 700; transition: color 0.3s; opacity: 0.7;
    }
    .logo-item:hover { color: #475569; opacity: 1; }
    .logo-item span { font-size: 1.1rem; }

    /* Why Section */
    .why-section { padding: 8rem 0; }
    .features-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 2.5rem; }
    .feature-card { 
        background: white; padding: 3rem 2.5rem; border-radius: 1.5rem; 
        border: 1px solid #f1f5f9; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative; overflow: hidden;
    }
    .feature-card::before {
        content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px; 
        background: var(--primary-gradient); transform: scaleX(0); transition: transform 0.4s ease;
    }
    .feature-card:hover { transform: translateY(-10px); box-shadow: var(--shadow-premium); }
    .feature-card:hover::before { transform: scaleX(1); }
    
    .icon-box-wrapper { margin-bottom: 2rem; }
    .icon-box { 
        width: 64px; height: 64px; border-radius: 1.25rem; display: flex; 
        align-items: center; justify-content: center; font-size: 1.75rem; 
    }
    .bg-blue-glow { background: #eff6ff; color: #3b82f6; box-shadow: 0 10px 20px -5px rgba(59, 130, 246, 0.2); }
    .bg-purple-glow { background: #f5f3ff; color: #8b5cf6; box-shadow: 0 10px 20px -5px rgba(139, 92, 246, 0.2); }
    .bg-green-glow { background: #f0fdf4; color: #10b981; box-shadow: 0 10px 20px -5px rgba(16, 185, 129, 0.2); }
    
    .feature-card h3 { font-size: 1.5rem; font-weight: 700; margin-bottom: 1rem; color: #1e2937; }
    .feature-card p { color: #64748b; line-height: 1.7; margin-bottom: 2rem; }
    .card-footer-link { font-weight: 700; color: #3b82f6; display: flex; align-items: center; gap: 0.5rem; font-size: 0.95rem; cursor: pointer; transition: gap 0.2s; }
    .feature-card:hover .card-footer-link { gap: 0.75rem; }

    /* Jobs Section */
    .jobs-section { padding: 8rem 0; }
    .jobs-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem; }
    .job-card-premium {
        background: white; border-radius: 1.25rem; border: 1px solid #f1f5f9; padding: 2rem;
        display: flex; flex-direction: column; transition: all 0.3s;
    }
    .job-card-premium:hover { border-color: #3b82f6; transform: translateY(-5px); box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.05); }
    
    .card-top { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1.5rem; }
    .employer-branding { display: flex; align-items: center; gap: 1rem; }
    .employer-logo { 
        width: 52px; height: 52px; border-radius: 0.75rem; background: #f8fafc; 
        display: flex; align-items: center; justify-content: center; overflow: hidden;
    }
    .employer-logo img { width: 100%; height: 100%; object-fit: contain; }
    .logo-placeholder { font-weight: 800; color: #94a3b8; font-size: 1.25rem; }
    
    .employer-name-wrap { display: flex; flex-direction: column; }
    .company-name { font-weight: 700; color: #475569; font-size: 0.95rem; }
    .verify-badge { font-size: 0.7rem; font-weight: 600; color: #10b981; display: flex; align-items: center; gap: 0.25rem; }
    
    .job-type-tag { 
        padding: 0.35rem 0.75rem; border-radius: 2rem; font-size: 0.7rem; font-weight: 700; 
        text-transform: uppercase; letter-spacing: 0.05em; 
    }
    .job-type-tag.full-time { background: #ecfdf5; color: #047857; }
    .job-type-tag.part-time { background: #fff7ed; color: #c2410c; }
    .job-type-tag.contract { background: #eff6ff; color: #1d4ed8; }
    .job-type-tag.remote { background: #f5f3ff; color: #6d28d9; }

    .card-body h3 { font-size: 1.25rem; line-height: 1.4; margin-bottom: 1rem; }
    .card-body h3 a { color: #1e293b; transition: color 0.2s; }
    .card-body h3 a:hover { color: #3b82f6; }
    .job-tags { display: flex; flex-wrap: wrap; gap: 1rem; color: #64748b; font-size: 0.85rem; font-weight: 500; }
    .job-tags span { display: flex; align-items: center; gap: 0.5rem; }

    .card-footer { margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center; }
    .posted-time { font-size: 0.8rem; color: #94a3b8; font-weight: 500; }
    .btn-apply-main { 
        color: #3b82f6; font-weight: 700; font-size: 0.9rem; text-decoration: none; 
        padding: 0.6rem 1.2rem; border-radius: 0.75rem; background: #eff6ff; transition: all 0.2s;
    }
    .btn-apply-main:hover { background: #3b82f6; color: white; }
    .btn-primary-outline { 
        padding: 0.75rem 1.5rem; border: 2px solid #e2e8f0; border-radius: 0.75rem; 
        font-weight: 700; color: #475569; display: flex; align-items: center; gap: 0.75rem;
    }
    .btn-primary-outline:hover { border-color: #3b82f6; color: #3b82f6; }

    /* Categories modern */
    .categories-section { padding: 8rem 0; }
    .categories-cloud { display: flex; flex-wrap: wrap; justify-content: center; gap: 1rem; }
    .category-item-modern {
        background: #ffffff; border: 1px solid #f1f5f9; padding: 1rem 1.5rem; border-radius: 1rem;
        display: flex; align-items: center; gap: 1rem; color: #475569; font-weight: 600;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .category-item-modern:hover { 
        background: #3b82f6; color: white; border-color: #3b82f6; transform: scale(1.05); 
        box-shadow: 0 10px 20px -5px rgba(59, 130, 246, 0.3);
    }
    .category-item-modern .cat-icon { font-size: 0.9rem; opacity: 0.6; }
    .category-item-modern:hover .cat-icon { opacity: 1; }
    .cat-count { font-size: 0.75rem; background: #f1f5f9; color: #64748b; padding: 0.2rem 0.5rem; border-radius: 0.5rem; }
    .category-item-modern:hover .cat-count { background: rgba(255,255,255,0.2); color: white; }

    /* How It Works Modern */
    .how-it-works-section { padding: 10rem 0; }
    .steps-container { display: flex; gap: 4rem; margin-top: 5rem; }
    .step-card { flex: 1; position: relative; }
    .step-num-wrap { display: flex; align-items: center; gap: 1.5rem; margin-bottom: 2rem; }
    .step-num { 
        width: 60px; height: 60px; border-radius: 50%; border: 2px solid #3b82f6; 
        display: flex; align-items: center; justify-content: center; 
        color: #3b82f6; font-weight: 800; font-size: 1.25rem; background: transparent;
    }
    .step-line { flex: 1; height: 2px; background: rgba(255,255,255,0.1); }
    .step-content h3 { color: white; font-size: 1.5rem; margin-bottom: 1rem; }
    .step-content p { color: #94a3b8; font-size: 1.1rem; line-height: 1.6; }

    /* Employers Modern */
    .employers-section { padding: 8rem 0; }
    .employers-grid-modern { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; }
    .employer-box { 
        background: white; border: 1px solid #f1f5f9; border-radius: 1.25rem; padding: 2rem;
        display: flex; flex-direction: column; align-items: center; text-align: center;
        transition: all 0.3s;
    }
    .employer-box:hover { border-color: #3b82f6; box-shadow: var(--shadow-premium); }
    .box-logo { width: 70px; height: 70px; background: #f8fafc; border-radius: 1rem; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem; font-size: 1.75rem; color: #94a3b8; }
    .box-logo img { width: 100%; height: 100%; object-fit: contain; padding: 10px; }
    .box-info h4 { margin-bottom: 0.5rem; font-size: 1.15rem; }
    .jobs-count { color: #3b82f6; font-weight: 600; font-size: 0.85rem; }
    .box-arrow { margin-top: 1.5rem; color: #cbd5e1; transition: color 0.3s, transform 0.3s; }
    .employer-box:hover .box-arrow { color: #3b82f6; transform: translateX(5px); }
    .btn-link-premium { color: #3b82f6; font-weight: 700; display: flex; align-items: center; gap: 0.5rem; text-decoration: none; }

    /* Testimonials Premium */
    .testimonials-section { padding: 8rem 0; }
    .testimonials-slider-view { display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; max-width: 1000px; margin: 4rem auto 0; }
    .testimonial-premium { 
        background: white; padding: 4rem 3rem; border-radius: 2rem; position: relative;
        box-shadow: 0 10px 30px -10px rgba(0,0,0,0.05);
    }
    .quote-mark { 
        position: absolute; top: -20px; left: 40px; width: 50px; height: 50px; 
        background: #3b82f6; color: white; border-radius: 50%; display: flex; 
        align-items: center; justify-content: center; font-size: 1.25rem;
    }
    .testimonial-premium p { font-size: 1.2rem; line-height: 1.8; color: #1e293b; font-weight: 500; font-style: italic; margin-bottom: 2.5rem; }
    .testimonial-profile { display: flex; align-items: center; gap: 1.25rem; }
    .profile-avatar { 
        width: 54px; height: 54px; border-radius: 50%; display: flex; 
        align-items: center; justify-content: center; font-weight: 800; color: #3b82f6; 
    }
    .bg-blue-100 { background: #dbeafe; }
    .bg-purple-100 { background: #f3e8ff; }
    .profile-details h5 { margin: 0; font-size: 1rem; color: #0f172a; }
    .profile-details span { font-size: 0.85rem; color: #64748b; font-weight: 500; }

    /* Final CTA & Newsletter */
    .final-cta-section { padding: 6rem 0 10rem; background-image: radial-gradient(circle at top right, #f8fafc, #ffffff); }
    .cta-newsletter-card { 
        background: #1e293b; border-radius: 2.5rem; padding: 5rem; display: flex; 
        align-items: center; gap: 6rem; position: relative; overflow: hidden; margin-bottom: 4rem;
    }
    .cta-newsletter-card::after {
        content: ''; position: absolute; width: 300px; height: 300px; background: #3b82f6;
        border-radius: 50%; top: -150px; right: -150px; filter: blur(100px); opacity: 0.2;
    }
    .cta-image-deco { flex: 0.8; display: flex; justify-content: center; position: relative; z-index: 1; }
    .floating-mini { width: 100%; max-width: 400px; filter: drop-shadow(0 20px 40px rgba(0,0,0,0.3)); animation: float 5s ease-in-out infinite alternate; }
    
    .cta-content-main { flex: 1.2; position: relative; z-index: 2; }
    .cta-content-main h2 { color: white; font-size: 3rem; font-weight: 800; margin-bottom: 1.5rem; }
    .cta-content-main p { color: #94a3b8; font-size: 1.15rem; line-height: 1.6; margin-bottom: 3rem; }
    
    .newsletter-inline { display: flex; gap: 1rem; background: rgba(255,255,255,0.05); padding: 0.5rem; border-radius: 1.25rem; border: 1px solid rgba(255,255,255,0.1); }
    .inline-input { flex: 1; display: flex; align-items: center; padding-left: 1.5rem; gap: 1rem; }
    .inline-input i { color: #64748b; }
    .inline-input input { background: transparent; border: none; padding: 1rem 0; color: white; outline: none; width: 100%; font-size: 1rem; }
    .btn-subscribe-modern { 
        background: #3b82f6; color: white; border: none; padding: 0 2.5rem; 
        border-radius: 1rem; font-weight: 700; cursor: pointer; transition: all 0.3s;
    }
    .btn-subscribe-modern:hover { background: #2563eb; transform: scale(1.02); }

    .bottom-cta-box { border-radius: 2.5rem; background: #3b82f6; padding: 4rem; display: flex; justify-content: space-between; align-items: center; }
    .bottom-cta-box h3 { color: white; font-size: 2.25rem; margin: 0; }
    .cta-actions { display: flex; gap: 1.5rem; }
    .btn-gradient-primary { 
        background: white; color: #3b82f6; padding: 1.2rem 2.5rem; border-radius: 1.25rem; 
        font-weight: 800; text-decoration: none; font-size: 1.1rem; box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        transition: transform 0.2s;
    }
    .btn-gradient-primary:hover { transform: translateY(-3px); }
    .btn-glass { 
        background: rgba(255,255,255,0.1); border: 2px solid rgba(255,255,255,0.3); color: white;
        padding: 1.2rem 2.5rem; border-radius: 1.25rem; font-weight: 800; text-decoration: none; font-size: 1.1rem;
        backdrop-filter: blur(10px); transition: all 0.3s;
    }
    .btn-glass:hover { background: rgba(255,255,255,0.2); border-color: white; }

    /* Responsive */
    @media (max-width: 1100px) {
        .hero-content { flex-direction: column; text-align: center; }
        .hero-text p { margin-left: auto; margin-right: auto; }
        .hero-stats { justify-content: center; }
        .hero-search-form { flex-direction: column; }
        .search-input-wrapper { flex-direction: column; }
        .input-divider { display: none; }
        .hero-search-form .input-group { width: 100%; border-bottom: 1px solid #f1f5f9; }
        .btn-search { width: 100%; padding: 1.25rem; justify-content: center; }
        
        .cta-newsletter-card { flex-direction: column; gap: 4rem; text-align: center; padding: 3rem; }
        .bottom-cta-box { flex-direction: column; gap: 2.5rem; text-align: center; }
        .steps-container { flex-direction: column; }
        .step-line { display: none; }
    }

    @media (max-width: 768px) {
        .hero-text h1 { font-size: 2.75rem; }
        .section-header { flex-direction: column; align-items: center; text-align: center; }
        .features-grid, .jobs-grid, .employers-grid-modern, .testimonials-slider-view { grid-template-columns: 1fr; }
        .hero-stats { flex-wrap: wrap; justify-content: center; gap: 2rem; }
        .logo-item { font-size: 1.1rem; gap: 0.5rem; }
    }
</style>
@endsection