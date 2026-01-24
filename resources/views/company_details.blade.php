@extends('template')

@section('content')
    <!-- Company Hero -->
    <section class="company-hero" style="background: linear-gradient(135deg, #0f172a, #1e293b); padding: 12rem 0 6rem; position: relative; overflow: hidden; margin-top: -6rem;">
        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: radial-gradient(circle at top right, rgba(59, 130, 246, 0.15), transparent 60%); pointer-events: none;"></div>
        <div class="container" style="position: relative; z-index: 1;">
            <div style="background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 2rem; padding: 3rem; display: flex; align-items: center; gap: 3rem;" data-aos="fade-up">
                <div style="flex-shrink: 0; width: 140px; height: 140px; background: white; border-radius: 1.5rem; display: flex; align-items: center; justify-content: center; padding: 1.5rem; filter: drop-shadow(0 20px 40px rgba(0,0,0,0.2));">
                    <img src="{{ $company->logo_url ? asset('image/' . $company->logo_url) : asset('image/logo1.png') }}" alt="{{ $company->name }}" style="width: 100%; height: 100%; object-fit: contain;">
                </div>
                <div style="color: white; flex: 1;">
                    <div style="display: flex; gap: 1rem; align-items: center; margin-bottom: 1rem;">
                        <span style="background: rgba(59, 130, 246, 0.2); color: #60a5fa; padding: 0.4rem 1rem; border-radius: 50px; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;"><i class="fas fa-industry"></i> {{ $company->service }}</span>
                        <span style="color: #94a3b8; font-size: 0.95rem;"><i class="fas fa-map-marker-alt" style="margin-right: 0.5rem;"></i> {{ $company->city }}, {{ $company->country }}</span>
                    </div>
                    <h1 style="font-size: 3.5rem; font-weight: 800; line-height: 1.1; margin-bottom: 1rem; letter-spacing: -0.02em;">{{ $company->name }}</h1>
                    <p style="color: #cbd5e1; font-size: 1.15rem; max-width: 700px; line-height: 1.6;">We are building the future of recruitment. Join our team and make an impact.</p>
                </div>
                <div style="text-align: right; display: flex; flex-direction: column; gap: 1rem;">
                    <div style="text-align: center; background: rgba(255,255,255,0.05); padding: 1.5rem 2rem; border-radius: 1rem; border: 1px solid rgba(255,255,255,0.1);">
                        <span style="display: block; font-size: 2.5rem; font-weight: 800; color: white;">{{ $company->jobs_count ?? 0 }}</span>
                        <span style="color: #94a3b8; font-size: 0.9rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;">Open Positions</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section style="padding: 6rem 0;">
        <div class="container">
            <div class="row">
                <!-- Left Sidebar -->
                <div class="col-lg-4">
                    <div style="background: white; border-radius: 1.5rem; padding: 2.5rem; border: 1px solid #f1f5f9; position: sticky; top: 2rem; box-shadow: 0 10px 40px -10px rgba(0,0,0,0.05);" data-aos="fade-right">
                        <h4 style="font-size: 1.25rem; font-weight: 800; color: #0f172a; margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 1px solid #f1f5f9;">Company Overview</h4>
                        
                        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                            <div style="display: flex; align-items: start; gap: 1rem;">
                                <div style="width: 40px; height: 40px; background: #f8fafc; border-radius: 0.75rem; display: flex; align-items: center; justify-content: center; color: #64748b;"><i class="fas fa-globe"></i></div>
                                <div>
                                    <span style="display: block; font-size: 0.85rem; color: #94a3b8; font-weight: 600; margin-bottom: 0.25rem;">Website</span>
                                    <a href="#" style="color: #6366f1; font-weight: 600; text-decoration: none;">Visit Website <i class="fas fa-external-link-alt" style="font-size: 0.75rem; margin-left: 5px;"></i></a>
                                </div>
                            </div>

                            <div style="display: flex; align-items: start; gap: 1rem;">
                                <div style="width: 40px; height: 40px; background: #f8fafc; border-radius: 0.75rem; display: flex; align-items: center; justify-content: center; color: #64748b;"><i class="fas fa-users"></i></div>
                                <div>
                                    <span style="display: block; font-size: 0.85rem; color: #94a3b8; font-weight: 600; margin-bottom: 0.25rem;">Company Size</span>
                                    <span style="color: #0f172a; font-weight: 600;">50-200 Employees</span>
                                </div>
                            </div>

                            <div style="display: flex; align-items: start; gap: 1rem;">
                                <div style="width: 40px; height: 40px; background: #f8fafc; border-radius: 0.75rem; display: flex; align-items: center; justify-content: center; color: #64748b;"><i class="fas fa-map"></i></div>
                                <div>
                                    <span style="display: block; font-size: 0.85rem; color: #94a3b8; font-weight: 600; margin-bottom: 0.25rem;">Headquarters</span>
                                    <span style="color: #0f172a; font-weight: 600;">{{ $company->city }}, {{ $company->country }}</span>
                                </div>
                            </div>

                            <div style="display: flex; align-items: start; gap: 1rem;">
                                <div style="width: 40px; height: 40px; background: #f8fafc; border-radius: 0.75rem; display: flex; align-items: center; justify-content: center; color: #64748b;"><i class="fas fa-calendar-alt"></i></div>
                                <div>
                                    <span style="display: block; font-size: 0.85rem; color: #94a3b8; font-weight: 600; margin-bottom: 0.25rem;">Founded</span>
                                    <span style="color: #0f172a; font-weight: 600;">2015</span>
                                </div>
                            </div>
                        </div>

                        <div style="margin-top: 2.5rem; padding-top: 2rem; border-top: 1px solid #f1f5f9;">
                            <h5 style="font-size: 1rem; font-weight: 700; color: #0f172a; margin-bottom: 1rem;">Social Media</h5>
                            <div style="display: flex; gap: 0.75rem;">
                                <a href="#" style="width: 40px; height: 40px; background: #6366f1; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; transition: transform 0.2s;"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" style="width: 40px; height: 40px; background: #1da1f2; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; transition: transform 0.2s;"><i class="fab fa-twitter"></i></a>
                                <a href="#" style="width: 40px; height: 40px; background: #e1306c; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; transition: transform 0.2s;"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Content -->
                <div class="col-lg-8">
                    <!-- About Section -->
                    <div style="background: white; border-radius: 1.5rem; padding: 2.5rem; border: 1px solid #f1f5f9; margin-bottom: 2rem;" data-aos="fade-up">
                        <h2 style="font-size: 1.75rem; font-weight: 800; color: #0f172a; margin-bottom: 1.5rem;">About {{ $company->name }}</h2>
                        <div style="color: #64748b; line-height: 1.8; font-size: 1.05rem;">
                            <!-- Placeholder description if none exists in DB -->
                            <p>We are a leading innovator in {{ $company->service }}, dedicated to creating solutions that matter. Our mission is to transform the industry through technology and human-centric design.</p>
                            <p>At {{ $company->name }}, we value creativity, collaboration, and continuous learning. We are looking for passionate individuals to join our growing team.</p>
                        </div>
                    </div>

                    <!-- Active Jobs -->
                    <div style="margin-top: 4rem;">
                        <h2 style="font-size: 1.75rem; font-weight: 800; color: #0f172a; margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: center;">
                            Existing Opportunities
                            <span style="font-size: 0.9rem; font-weight: 600; color: white; background: #6366f1; padding: 0.25rem 0.75rem; border-radius: 50px;">{{ $company->jobs->count() }} active</span>
                        </h2>

                        @if($company->jobs->count() > 0)
                            <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                                @foreach($company->jobs as $job)
                                <div class="job-card-row" style="background: white; border-radius: 1.25rem; border: 1px solid #f1f5f9; padding: 1.75rem; display: flex; align-items: center; transition: all 0.2s; position: relative;" data-aos="fade-up">
                                    <div style="flex: 1;">
                                        <div style="margin-bottom: 0.5rem; display: flex; gap: 0.75rem; align-items: center;">
                                            <span style="font-size: 0.75rem; font-weight: 700; color: #10b981; background: #ecfdf5; padding: 0.25rem 0.6rem; border-radius: 6px; text-transform: uppercase;">{{ $job->job_type }}</span>
                                            <span style="font-size: 0.85rem; color: #94a3b8;"><i class="far fa-clock"></i> {{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}</span>
                                        </div>
                                        <h3 style="margin: 0 0 0.5rem; font-size: 1.25rem; font-weight: 700; color: #1e293b;">
                                            <a href="{{ route('job-details', $job->id) }}" style="color: inherit; text-decoration: none;">{{ $job->title }}</a>
                                        </h3>
                                        <div style="display: flex; gap: 1.5rem; color: #64748b; font-size: 0.95rem;">
                                            <span><i class="fas fa-map-marker-alt"></i> {{ $job->city }}</span>
                                            <span><i class="fas fa-money-bill-wave"></i> {{ $job->minimum_salary }} - {{ $job->maximum_salary }} DH</span>
                                        </div>
                                    </div>
                                    <div style="flex-shrink: 0;">
                                        <a href="{{ route('job-details', $job->id) }}" style="display: inline-flex; align-items: center; gap: 0.5rem; background: #eff6ff; color: #6366f1; font-weight: 700; padding: 0.75rem 1.5rem; border-radius: 0.75rem; text-decoration: none; transition: all 0.2s;">
                                            Apply Now <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div style="text-align: center; padding: 4rem; background: white; border-radius: 1.5rem; border: 1px dashed #cbd5e1;">
                                <div style="font-size: 3rem; color: #e2e8f0; margin-bottom: 1rem;"><i class="fas fa-search"></i></div>
                                <h4 style="color: #64748b; font-weight: 600;">No active job openings at the moment.</h4>
                                <p style="color: #94a3b8;">Check back later or explore other companies.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .channel-social a:hover { transform: translateY(-3px); }
        .job-card-row:hover { border-color: #6366f1; box-shadow: 0 10px 30px -10px rgba(59, 130, 246, 0.15); transform: translateY(-2px); }
        .job-card-row:hover a { background: #6366f1; color: white; }
    </style>
@endsection
