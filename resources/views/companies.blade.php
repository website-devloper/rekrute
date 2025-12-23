@extends('template')

@section('content')
    <section class="companies-hero" style="background: var(--gray-50); padding: 10rem 0 4rem; text-align: center; position: relative;">
        <div class="container">
            <span class="hero-badge" style="display: inline-flex; align-items: center; gap: 0.5rem; background: white; color: var(--primary); padding: 0.625rem 1.25rem; border-radius: 50px; font-size: 0.875rem; font-weight: 600; margin-bottom: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
                <i class="fas fa-building"></i> {{ $companies->total() }} Companies Hiring
            </span>
            <h1 style="font-size: clamp(2rem, 5vw, 3rem); font-weight: 800; color: var(--gray-900); margin-bottom: 1rem;">Top Companies <span style="background: linear-gradient(135deg, var(--primary), #8b5cf6); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Hiring Now</span></h1>
            <p style="font-size: 1.125rem; color: var(--gray-600); max-width: 600px; margin: 0 auto;">Discover the best places to work and find your dream job at a company that matches your values.</p>
        </div>
    </section>

    <section class="companies-list" style="padding: 3rem 0 5rem; background: white;">
        <div class="container">
            <div class="filter-bar" style="margin-bottom: 2rem; display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap; padding: 1rem; background: var(--gray-50); border-radius: 1rem;">
                <a href="{{ route('companies') }}" class="filter-tag" style="padding: 0.5rem 1.25rem; border-radius: 50px; text-decoration: none; font-weight: 500; font-size: 0.875rem; transition: all 0.2s; {{ !request('industry') ? 'background: var(--gray-900); color: white;' : 'background: white; color: var(--gray-700); border: 1px solid var(--gray-200);' }}">All Industries</a>
                @foreach($industries as $industry)
                    <a href="{{ route('companies', ['industry' => $industry]) }}" class="filter-tag" style="padding: 0.5rem 1.25rem; border-radius: 50px; text-decoration: none; font-weight: 500; font-size: 0.875rem; transition: all 0.2s; {{ request('industry') == $industry ? 'background: var(--gray-900); color: white;' : 'background: white; color: var(--gray-700); border: 1px solid var(--gray-200);' }}">{{ $industry }}</a>
                @endforeach
            </div>

            <div class="companies-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.5rem;">
                @foreach($companies as $company)
                <div class="company-card" style="background: white; border: 1px solid var(--gray-200); border-radius: 1.25rem; padding: 2rem; text-align: center; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.1)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                    <div style="width: 80px; height: 80px; background: var(--gray-100); border-radius: 1rem; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; padding: 1rem;">
                        <img src="/image/{{ $company->logo_url ?? 'logo1.png' }}" alt="{{ $company->name }}" style="width: 100%; height: 100%; object-fit: contain;">
                    </div>
                    <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--gray-900); margin-bottom: 0.5rem;">{{ $company->name }}</h3>
                    <div style="color: var(--gray-500); font-size: 0.9rem; margin-bottom: 1.5rem;">
                        <span style="display: flex; align-items: center; justify-content: center; gap: 0.5rem; margin-bottom: 0.25rem;"><i class="fas fa-briefcase" style="color: var(--gray-400);"></i> {{ $company->service }}</span>
                        <span style="display: flex; align-items: center; justify-content: center; gap: 0.5rem;"><i class="fas fa-map-marker-alt" style="color: var(--gray-400);"></i> {{ $company->city }}, {{ $company->country }}</span>
                    </div>
                    <a href="#" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.75rem 1.5rem; border-radius: 50px; text-decoration: none; background: var(--gray-900); color: white; font-weight: 600; font-size: 0.875rem; transition: all 0.2s;" onmouseover="this.style.background='var(--primary)';" onmouseout="this.style.background='var(--gray-900)';">View {{ $company->jobs_count }} Jobs <i class="fas fa-arrow-right" style="font-size: 0.75rem;"></i></a>
                </div>
                @endforeach
            </div>

            <div style="margin-top: 3rem; display: flex; justify-content: center;">
                {{ $companies->appends(request()->input())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>
@endsection
