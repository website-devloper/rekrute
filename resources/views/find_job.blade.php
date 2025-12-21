@extends('template')

@section('content')
    <!-- Search Header -->
    <section class="find-job-header reveal">
        <div class="container">
            <div class="header-content">
                <h1 class="page-title">Find Your <span class="gradient-text">Dream Job</span></h1>
                <p class="page-subtitle">Browse thousands of job openings from top companies</p>
                
                <!-- Search Form -->
                <div class="job-search-box">
                    <form action="#" class="search-form">
                        <div class="input-group">
                            <span class="input-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </span>
                            <input type="text" placeholder="Job title, keywords, or company">
                        </div>
                        <div class="input-divider"></div>
                        <div class="input-group">
                            <span class="input-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </span>
                            <input type="text" placeholder="City, state, or zip code">
                        </div>
                        <button type="submit" class="btn-search">Search Jobs</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Job Listings -->
    <section class="jobs-listing-section reveal reveal-delay-200">
        <div class="container">
            <div class="listing-header">
                <h2 class="results-count">Showing 200+ Jobs</h2>
                <div class="sort-wrapper">
                    <label>Sort by:</label>
                    <select class="sort-select">
                        <option>Most Relevant</option>
                        <option>Newest</option>
                        <option>Salary (High to Low)</option>
                    </select>
                </div>
            </div>

            <div class="jobs-grid">
                <!-- Job Card 1 -->
                <div class="modern-job-card">
                    <div class="job-card-header">
                        <img src="/image/logo1.png" alt="Company Logo" class="company-logo">
                        <span class="job-type-badge">Full Time</span>
                    </div>
                    <div class="job-card-body">
                        <h3 class="job-title">Senior UX Designer</h3>
                        <p class="company-name">TechCorp Inc.</p>
                        <div class="job-meta">
                            <span class="meta-item">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                New York, NY
                            </span>
                            <span class="meta-item">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                $120k - $150k
                            </span>
                        </div>
                    </div>
                    <div class="job-card-footer">
                        <div class="tags">
                            <span class="tag-sm">Figma</span>
                            <span class="tag-sm">Prototyping</span>
                        </div>
                        <a href="#" class="btn-apply">Apply Now</a>
                    </div>
                </div>

                <!-- Job Card 2 -->
                <div class="modern-job-card">
                    <div class="job-card-header">
                        <div class="company-logo" style="background: #f0f0f0; display: flex; align-items: center; justify-content: center; font-weight: bold; color: #666;">G</div>
                        <span class="job-type-badge">Remote</span>
                    </div>
                    <div class="job-card-body">
                        <h3 class="job-title">Frontend Developer</h3>
                        <p class="company-name">Google</p>
                        <div class="job-meta">
                            <span class="meta-item">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                Remote
                            </span>
                            <span class="meta-item">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                $140k - $180k
                            </span>
                        </div>
                    </div>
                    <div class="job-card-footer">
                        <div class="tags">
                            <span class="tag-sm">React</span>
                            <span class="tag-sm">TypeScript</span>
                        </div>
                        <a href="#" class="btn-apply">Apply Now</a>
                    </div>
                </div>

                <!-- Job Card 3 -->
                <div class="modern-job-card">
                    <div class="job-card-header">
                        <div class="company-logo" style="background: #000; display: flex; align-items: center; justify-content: center; font-weight: bold; color: #fff;">N</div>
                        <span class="job-type-badge">Full Time</span>
                    </div>
                    <div class="job-card-body">
                        <h3 class="job-title">Product Manager</h3>
                        <p class="company-name">Netflix</p>
                        <div class="job-meta">
                            <span class="meta-item">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                Los Gatos, CA
                            </span>
                            <span class="meta-item">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                $200k+
                            </span>
                        </div>
                    </div>
                    <div class="job-card-footer">
                        <div class="tags">
                            <span class="tag-sm">Product</span>
                            <span class="tag-sm">Strategy</span>
                        </div>
                        <a href="#" class="btn-apply">Apply Now</a>
                    </div>
                </div>
                 <!-- Job Card 4 -->
                 <div class="modern-job-card">
                    <div class="job-card-header">
                        <div class="company-logo" style="background: #E1306C; display: flex; align-items: center; justify-content: center; font-weight: bold; color: #fff;">I</div>
                        <span class="job-type-badge">Contract</span>
                    </div>
                    <div class="job-card-body">
                        <h3 class="job-title">Social Media Manager</h3>
                        <p class="company-name">Instagram</p>
                        <div class="job-meta">
                            <span class="meta-item">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                Remote
                            </span>
                            <span class="meta-item">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                $80k - $100k
                            </span>
                        </div>
                    </div>
                    <div class="job-card-footer">
                        <div class="tags">
                            <span class="tag-sm">Marketing</span>
                            <span class="tag-sm">Social</span>
                        </div>
                        <a href="#" class="btn-apply">Apply Now</a>
                    </div>
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