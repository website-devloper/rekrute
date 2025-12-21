@extends('template')

@section('content')
    <!-- About Hero -->
    <section class="about-hero" style="background: var(--gradient-hero); padding: 5rem 0; color: white; text-align: center;">
        <div class="container">
            <h1 class="hero-title" style="font-size: 3.5rem; margin-bottom: 1.5rem;">Empowering Careers,<br>Connecting Futures.</h1>
            <p class="hero-subtitle" style="font-size: 1.25rem; opacity: 0.9; max-width: 600px; margin: 0 auto;">
                We are on a mission to revolutionize the recruitment industry by using advanced AI to match the perfect talent with the perfect opportunity.
            </p>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="mission-section" style="padding: 5rem 0; background: white;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="section-title" style="color: var(--gray-900); font-size: 2.5rem; font-weight: 800; margin-bottom: 1.5rem;">Our Story</h2>
                    <p style="color: var(--gray-600); font-size: 1.125rem; line-height: 1.8; margin-bottom: 2rem;">
                        Founded in 2023, Rekrute started with a simple idea: job hunting shouldn't be painful. 
                        We saw a broken system filled with ghosting, irrelevant matches, and poor user experiences.
                        <br><br>
                        Today, we help thousands of companies build their dream teams and millions of professionals find their calling.
                    </p>
                    <div class="stats-grid" style="display: flex; gap: 2rem;">
                        <div>
                            <h3 style="color: var(--primary-600); font-size: 2.5rem; font-weight: 700;">10k+</h3>
                            <p style="color: var(--gray-500);">Success Stories</p>
                        </div>
                        <div>
                            <h3 style="color: var(--primary-600); font-size: 2.5rem; font-weight: 700;">50+</h3>
                            <p style="color: var(--gray-500);">Countries</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div style="background: var(--gray-100); border-radius: 1.5rem; height: 400px; width: 100%; display: flex; align-items: center; justify-content: center;">
                         <!-- Placeholder for Team Image -->
                         <span style="color: var(--gray-400); font-weight: 600;">Office Team Image</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values-section" style="padding: 5rem 0; background: var(--gray-50);">
        <div class="container">
            <div class="text-center" style="margin-bottom: 3rem;">
                <h2 class="section-title" style="font-size: 2.5rem; font-weight: 800;">Our Core Values</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="value-card" style="background: white; padding: 2rem; border-radius: 1rem; text-align: center; box-shadow: var(--shadow-sm);">
                        <div style="width: 60px; height: 60px; background: var(--primary-100); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; color: var(--primary-600);">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 24px; height: 24px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 0.5rem;">Innovation</h3>
                        <p style="color: var(--gray-600);">We constantly push the boundaries of what's possible in recruitment tech.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-card" style="background: white; padding: 2rem; border-radius: 1rem; text-align: center; box-shadow: var(--shadow-sm);">
                        <div style="width: 60px; height: 60px; background: var(--purple-100); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; color: var(--purple-600);">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 24px; height: 24px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                        <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 0.5rem;">Inclusivity</h3>
                        <p style="color: var(--gray-600);">We believe talent is universal, but opportunity is not. We're here to fix that.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-card" style="background: white; padding: 2rem; border-radius: 1rem; text-align: center; box-shadow: var(--shadow-sm);">
                        <div style="width: 60px; height: 60px; background: var(--green-100); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; color: var(--green-600);">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 24px; height: 24px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 0.5rem;">Integrity</h3>
                        <p style="color: var(--gray-600);">Transparency and trust are at the heart of every interaction.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
