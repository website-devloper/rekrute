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
                <button class="tag" style="border: none; cursor: pointer;">All Industries</button>
                <button class="tag" style="border: none; cursor: pointer; background: white; border: 1px solid var(--gray-200);">Technology</button>
                <button class="tag" style="border: none; cursor: pointer; background: white; border: 1px solid var(--gray-200);">Finance</button>
                <button class="tag" style="border: none; cursor: pointer; background: white; border: 1px solid var(--gray-200);">Healthcare</button>
            </div>

            <div class="companies-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2rem;">
                
                <!-- Company Card 1 -->
                <div class="company-card" style="border: 1px solid var(--gray-200); border-radius: 1rem; padding: 2rem; text-align: center; transition: all 0.3s ease;">
                    <img src="/image/logo1.png" alt="Company" style="width: 80px; height: 80px; object-fit: contain; margin-bottom: 1.5rem;">
                    <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--gray-900); margin-bottom: 0.5rem;">TechCorp Inc.</h3>
                    <div style="color: var(--gray-600); font-size: 0.9rem; margin-bottom: 1.5rem;">
                        <span style="display: block; margin-bottom: 0.25rem;">Technology</span>
                        <span>⭐ 4.8 (120 Reviews)</span>
                    </div>
                    <a href="#" class="btn-secondary" style="display: inline-block; padding: 0.5rem 1.5rem; border-radius: 0.5rem; text-decoration: none;">View 12 Jobs</a>
                </div>

                <!-- Company Card 2 -->
                <div class="company-card" style="border: 1px solid var(--gray-200); border-radius: 1rem; padding: 2rem; text-align: center; transition: all 0.3s ease;">
                     <div style="width: 80px; height: 80px; background: #000; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 1.5rem; margin: 0 auto 1.5rem;">N</div>
                    <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--gray-900); margin-bottom: 0.5rem;">Netflix</h3>
                    <div style="color: var(--gray-600); font-size: 0.9rem; margin-bottom: 1.5rem;">
                        <span style="display: block; margin-bottom: 0.25rem;">Entertainment</span>
                        <span>⭐ 4.9 (500 Reviews)</span>
                    </div>
                    <a href="#" class="btn-secondary" style="display: inline-block; padding: 0.5rem 1.5rem; border-radius: 0.5rem; text-decoration: none;">View 8 Jobs</a>
                </div>

                <!-- Company Card 3 -->
                <div class="company-card" style="border: 1px solid var(--gray-200); border-radius: 1rem; padding: 2rem; text-align: center; transition: all 0.3s ease;">
                    <div style="width: 80px; height: 80px; background: #4285F4; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 1.5rem; margin: 0 auto 1.5rem;">G</div>
                    <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--gray-900); margin-bottom: 0.5rem;">Google</h3>
                    <div style="color: var(--gray-600); font-size: 0.9rem; margin-bottom: 1.5rem;">
                        <span style="display: block; margin-bottom: 0.25rem;">Technology</span>
                        <span>⭐ 4.7 (2k+ Reviews)</span>
                    </div>
                    <a href="#" class="btn-secondary" style="display: inline-block; padding: 0.5rem 1.5rem; border-radius: 0.5rem; text-decoration: none;">View 25 Jobs</a>
                </div>

                 <!-- Company Card 4 -->
                 <div class="company-card" style="border: 1px solid var(--gray-200); border-radius: 1rem; padding: 2rem; text-align: center; transition: all 0.3s ease;">
                    <div style="width: 80px; height: 80px; background: #FF9900; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 1.5rem; margin: 0 auto 1.5rem;">A</div>
                    <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--gray-900); margin-bottom: 0.5rem;">Amazon</h3>
                    <div style="color: var(--gray-600); font-size: 0.9rem; margin-bottom: 1.5rem;">
                        <span style="display: block; margin-bottom: 0.25rem;">E-Commerce</span>
                        <span>⭐ 4.5 (5k+ Reviews)</span>
                    </div>
                    <a href="#" class="btn-secondary" style="display: inline-block; padding: 0.5rem 1.5rem; border-radius: 0.5rem; text-decoration: none;">View 40 Jobs</a>
                </div>

            </div>
        </div>
    </section>
@endsection
