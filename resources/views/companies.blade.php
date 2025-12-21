@extends('template')

@section('content')
    <!-- Companies Hero -->
    <section class="companies-hero" style="background: var(--gray-50); padding: 5rem 0; text-align: center;">
        <div class="container">
            <h1 class="hero-title" style="font-size: 3rem; color: var(--gray-900); margin-bottom: 1rem;">Top Companies Hiring Now</h1>
            <p class="hero-subtitle" style="font-size: 1.25rem; color: var(--gray-600); max-width: 700px; margin: 0 auto;">
                Discover the best places to work. Read reviews, compare salaries, and find your dream job at a company that matches your values.
            </p>
        </div>
    </section>

    <!-- Companies Grid -->
    <section class="companies-list" style="padding: 5rem 0; background: white;">
        <div class="container">
            <!-- Filter Bar -->
            <div class="filter-bar" style="margin-bottom: 3rem; display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="{{ route('companies') }}" class="tag" style="border: none; cursor: pointer; text-decoration: none; color: inherit;  background: {{ !request('industry') ? 'var(--gray-900)' : 'white' }}; color: {{ !request('industry') ? 'white' : 'var(--gray-900)' }}">All Industries</a>
                @foreach($industries as $industry)
                    <a href="{{ route('companies', ['industry' => $industry]) }}" class="tag" style="border: none; cursor: pointer; text-decoration: none; color: inherit; background: {{ request('industry') == $industry ? 'var(--gray-900)' : 'white' }}; color: {{ request('industry') == $industry ? 'white' : 'var(--gray-900)' }}; border: 1px solid var(--gray-200);">{{ $industry }}</a>
                @endforeach
            </div>

            <div class="companies-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2rem;">
                
                @foreach($companies as $company)
                <!-- Company Card -->
                <div class="company-card" style="border: 1px solid var(--gray-200); border-radius: 1rem; padding: 2rem; text-align: center; transition: all 0.3s ease;">
                    <img src="/image/{{ $company->logo_url ?? 'logo1.png' }}" alt="{{ $company->name }}" style="width: 80px; height: 80px; object-fit: contain; margin-bottom: 1.5rem;">
                    <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--gray-900); margin-bottom: 0.5rem;">{{ $company->name }}</h3>
                    <div style="color: var(--gray-600); font-size: 0.9rem; margin-bottom: 1.5rem;">
                        <span style="display: block; margin-bottom: 0.25rem;">{{ $company->service }}</span>
                        <span>{{ $company->city }}, {{ $company->country }}</span>
                    </div>
                    <a href="#" class="btn-secondary" style="display: inline-block; padding: 0.5rem 1.5rem; border-radius: 0.5rem; text-decoration: none; background: var(--gray-100); color: var(--gray-900); font-weight: 600;">View {{ $company->jobs_count }} Jobs</a>
                </div>
                @endforeach

            </div>

             <div class="pagination-wrapper" style="margin-top: 3rem; display: flex; justify-content: center;">
                {{ $companies->appends(request()->input())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>
@endsection
