@extends('template')

@section('content')
    <!-- Search Header -->
    <section class="find-job-header reveal" style="background: var(--gradient-hero); padding: 4rem 0 6rem; color: white;">
        <div class="container">
            <div class="header-content text-center">
                <h1 class="page-title" style="font-size: 3rem; font-weight: 800; margin-bottom: 1rem;">Find Your <span style="background: white; -webkit-background-clip: text; color: transparent; background-image: linear-gradient(45deg, #fff, #e0e0e0);">Dream Job</span></h1>
                <p class="page-subtitle" style="font-size: 1.25rem; opacity: 0.9; margin-bottom: 3rem;">Browse thousands of job openings from top companies</p>
                
                <!-- Search Form -->
                <div class="job-search-box" style="background: white; padding: 1rem; border-radius: 1rem; box-shadow: var(--shadow-xl); max-width: 900px; margin: 0 auto;">
                    <form action="{{ route('jobs') }}" method="GET" style="display: flex; gap: 1rem; flex-wrap: wrap;">
                        <div style="flex: 1; min-width: 250px; position: relative;">
                            <input type="text" name="query" placeholder="Job title, keywords, or company" value="{{ request('query') }}" style="width: 100%; padding: 1rem 1rem 1rem 3rem; border: 1px solid var(--gray-200); border-radius: 0.75rem; font-size: 1rem;">
                            <svg style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); width: 20px; color: var(--gray-400);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <div style="flex: 1; min-width: 200px; position: relative;">
                            <input type="text" name="location" placeholder="City or remote" value="{{ request('location') }}" style="width: 100%; padding: 1rem 1rem 1rem 3rem; border: 1px solid var(--gray-200); border-radius: 0.75rem; font-size: 1rem;">
                            <svg style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); width: 20px; color: var(--gray-400);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <button type="submit" style="background: var(--primary-600); color: white; border: none; padding: 1rem 2rem; border-radius: 0.75rem; font-weight: 600; cursor: pointer; transition: background 0.2s;">Search Jobs</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Area -->
    <section class="jobs-listing-section" style="padding: 4rem 0; background: #f9fafb;">
        <div class="container">
            <div class="row">
                <!-- Sidebar Filters -->
                <div class="col-lg-3 mb-4">
                    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100" style="position: sticky; top: 2rem;">
                        <h4 class="font-weight-bold mb-4" style="font-size: 1.1rem; color: var(--gray-900);">Filters</h4>
                        
                        <form action="{{ route('jobs') }}" method="GET">
                            <!-- Hidden inputs to preserve search/location -->
                            <input type="hidden" name="query" value="{{ request('query') }}">
                            <input type="hidden" name="location" value="{{ request('location') }}">

                            <div class="mb-4 pb-4 border-bottom">
                                <h5 class="small font-weight-bold text-uppercase text-muted mb-3">Job Category</h5>
                                @foreach($categories as $cat)
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="category" value="{{ $cat }}" id="cat-{{ $loop->index }}" {{ request('category') == $cat ? 'checked' : '' }} onchange="this.form.submit()">
                                    <label class="form-check-label small" for="cat-{{ $loop->index }}">{{ $cat }}</label>
                                </div>
                                @endforeach
                            </div>

                            <div class="mb-4 pb-4 border-bottom">
                                <h5 class="small font-weight-bold text-uppercase text-muted mb-3">Job Type</h5>
                                @foreach($jobTypes as $type)
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="type" value="{{ $type }}" id="type-{{ $loop->index }}" {{ request('type') == $type ? 'checked' : '' }} onchange="this.form.submit()">
                                    <label class="form-check-label small" for="type-{{ $loop->index }}">{{ $type }}</label>
                                </div>
                                @endforeach
                            </div>

                            <a href="{{ route('jobs') }}" class="btn btn-link btn-sm text-danger p-0">Clear All Filters</a>
                        </form>
                    </div>
                </div>

                <!-- Job Listings -->
                <div class="col-lg-9">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="font-weight-bold" style="font-size: 1.5rem; color: var(--gray-900);">{{ $jobs->total() }} Jobs Found</h2>
                        <div class="d-flex gap-2">
                            <span class="small text-muted">Sort by:</span>
                            <select class="form-select form-select-sm border-0 bg-transparent font-weight-bold p-0" style="width: auto;">
                                <option>Newest</option>
                                <option>Salary High-Low</option>
                            </select>
                        </div>
                    </div>

                    <div class="jobs-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 1.5rem;">
                        @foreach($jobs as $job)
                        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 hover-shadow transition-all" style="position: relative; overflow: hidden;">
                            <div class="d-flex justify-content-between mb-3">
                                <div style="width: 50px; height: 50px; background: #f3f4f6; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                    @if($job->employer && $job->employer->logo_url)
                                        <img src="{{ Str::startsWith($job->employer->logo_url, 'http') ? $job->employer->logo_url : asset('storage/' . $job->employer->logo_url) }}" style="width: 32px; height: 32px; object-fit: contain;">
                                    @else
                                        <svg style="width: 24px; color: var(--gray-400);" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                    @endif
                                </div>
                                <span class="badge bg-primary-100 text-primary-700 px-3 py-2 rounded-pill small font-weight-bold">{{ $job->job_type }}</span>
                            </div>
                            
                            <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 0.5rem; color: var(--gray-900);">
                                <a href="{{ route('job-details', $job->id) }}" class="text-decoration-none text-dark hover-text-primary">{{ $job->title }}</a>
                            </h3>
                            <p class="text-muted small mb-3">{{ $job->employer->name ?? 'Unknown Company' }}</p>

                            <div class="d-flex flex-wrap gap-3 mb-4">
                                <div class="small d-flex align-items-center gap-1 text-muted">
                                    <svg style="width: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    {{ $job->city }}
                                </div>
                                <div class="small d-flex align-items-center gap-1 text-muted">
                                    <svg style="width: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    {{ $job->minimum_salary }} - {{ $job->maximum_salary }} DH
                                </div>
                                <div class="small d-flex align-items-center gap-1 text-muted">
                                    <svg style="width: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    {{ $job->timeAgo }}
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                <span class="badge bg-light text-muted fw-normal px-3 py-2 rounded-lg">{{ $job->job_category }}</span>
                                <a href="{{ route('job-details', $job->id) }}" class="btn btn-sm btn-dark px-4 rounded-pill font-weight-bold">Apply Now</a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="mt-5 d-flex justify-content-center">
                        {{ $jobs->appends(request()->query())->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .rounded-xl { border-radius: 1rem; }
        .hover-shadow:hover { 
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
        }
        .text-primary-700 { color: var(--primary-700); }
        .bg-primary-100 { background-color: var(--primary-100); }
        .hover-text-primary:hover { color: var(--primary-600) !important; }
    </style>
@endsection