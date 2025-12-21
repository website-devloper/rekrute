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
                    <form action="{{ route('jobs') }}" method="GET" class="search-form">
                        <div class="input-group">
                            <span class="input-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </span>
                            <input type="text" name="query" placeholder="Job title, keywords, or company" value="{{ request('query') }}">
                        </div>
                        <div class="input-divider"></div>
                        <div class="input-group">
                            <span class="input-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </span>
                            <input type="text" name="location" placeholder="City, state, or zip code" value="{{ request('location') }}">
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
                @foreach($jobs as $job)
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