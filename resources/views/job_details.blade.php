@extends('template')

@section('content')
    <!-- Job Hero Section -->
    <section class="job-hero" style="background: linear-gradient(135deg, var(--gray-900), #1e1b4b); padding: 10rem 0 6rem; position: relative; overflow: hidden;">
        <div style="position: absolute; top: -50%; right: -20%; width: 800px; height: 800px; background: radial-gradient(circle, rgba(99, 102, 241, 0.2) 0%, transparent 60%); pointer-events: none;"></div>
        <div class="container" style="position: relative; z-index: 1;">
            <div data-aos="fade-up">
                <span style="display: inline-flex; align-items: center; gap: 0.5rem; background: rgba(99, 102, 241, 0.15); color: var(--primary-light); padding: 0.5rem 1rem; border-radius: 50px; font-size: 0.875rem; font-weight: 600; margin-bottom: 1.25rem; border: 1px solid rgba(99, 102, 241, 0.2);"><i class="fas fa-briefcase"></i> {{ $jobDetails->job_type }}</span>
                <h1 style="font-size: clamp(2rem, 5vw, 3rem); font-weight: 800; color: white; margin-bottom: 1.25rem;">{{ $jobDetails->title }}</h1>
                <div style="display: flex; gap: 2rem; flex-wrap: wrap; font-size: 1rem; color: rgba(255,255,255,0.8);">
                    <span style="display: flex; align-items: center; gap: 0.5rem;"><i class="fas fa-map-marker-alt"></i> {{ $jobDetails->city }}, {{ $jobDetails->country }}</span>
                    <span style="display: flex; align-items: center; gap: 0.5rem;"><i class="fas fa-money-bill-wave"></i> {{ $jobDetails->minimum_salary }} - {{ $jobDetails->maximum_salary }} DH</span>
                    <span style="display: flex; align-items: center; gap: 0.5rem;"><i class="fas fa-clock"></i> Posted {{ $jobDetails->timeAgo }}</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section style="margin-top: -4rem; padding-bottom: 5rem;">
        <div class="container">
            <div class="row">
                <!-- Left Column -->
                <div class="col-lg-8" style="padding-right: 2rem;">
                    <div style="background: white; border-radius: 1.5rem; padding: 2.5rem; box-shadow: 0 20px 50px rgba(0,0,0,0.1); margin-bottom: 2rem;" data-aos="fade-up">
                        <h2 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 1.25rem; color: var(--gray-900); display: flex; align-items: center; gap: 0.75rem;"><i class="fas fa-file-alt" style="color: var(--primary);"></i> Job Description</h2>
                        <div style="color: var(--gray-600); line-height: 1.8; font-size: 1rem; margin-bottom: 2rem;">{{ $jobDetails->description }}</div>
                        
                        <h2 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 1.25rem; color: var(--gray-900); display: flex; align-items: center; gap: 0.75rem;"><i class="fas fa-list-check" style="color: var(--primary);"></i> Requirements</h2>
                        <div style="color: var(--gray-600); line-height: 1.8; font-size: 1rem;">{{ $jobDetails->requirements }}</div>
                    </div>

                    <!-- Company Info Card -->
                    <div style="background: var(--gray-50); border-radius: 1.25rem; padding: 2rem; border: 1px solid var(--gray-100);" data-aos="fade-up">
                        <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 1rem; color: var(--gray-900);">About the Company</h3>
                        <p style="color: var(--gray-600); line-height: 1.7;">This is a great opportunity to join a dynamic and growing company. Apply now to learn more about the role and the team.</p>
                    </div>
                </div>

                <!-- Right Column (Sidebar) -->
                <div class="col-lg-4">
                    <div style="background: white; border-radius: 1.5rem; padding: 2rem; box-shadow: 0 10px 40px rgba(0,0,0,0.08); border: 1px solid var(--gray-100); position: sticky; top: 6rem;" data-aos="fade-left">
                        <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 1.5rem; color: var(--gray-900);">Interested in this job?</h3>
                        
                        @auth('candidate')
                        <form action="{{route('applyJob')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$jobDetails->id}}" name="JobId">
                            <button type="submit" style="width: 100%; background: linear-gradient(135deg, var(--primary), var(--primary-dark)); color: white; border: none; padding: 1rem; border-radius: 0.75rem; font-weight: 600; font-size: 1rem; cursor: pointer; transition: all 0.3s; display: flex; align-items: center; justify-content: center; gap: 0.5rem; box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(99, 102, 241, 0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(99, 102, 241, 0.3)';">
                                <i class="fas fa-paper-plane"></i> Apply Now
                            </button>
                        </form>
                        @elseauth('employer')
                            <div style="background: rgba(59, 130, 246, 0.1); color: var(--info); padding: 1rem; border-radius: 0.75rem; text-align: center; font-weight: 500;"><i class="fas fa-info-circle"></i> Recruiters cannot apply to jobs.</div>
                        @else
                            <a href="{{ route('sign_in') }}" style="display: flex; align-items: center; justify-content: center; gap: 0.5rem; width: 100%; background: linear-gradient(135deg, var(--primary), var(--primary-dark)); color: white; padding: 1rem; border-radius: 0.75rem; font-weight: 600; font-size: 1rem; text-decoration: none; box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);"><i class="fas fa-sign-in-alt"></i> Login to Apply</a>
                        @endauth

                        <!-- Job Quick Info -->
                        <div style="margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid var(--gray-200);">
                            <div style="display: grid; gap: 1rem;">
                                <div style="display: flex; align-items: center; gap: 0.75rem;"><div style="width: 40px; height: 40px; background: rgba(99,102,241,0.1); border-radius: 0.625rem; display: flex; align-items: center; justify-content: center;"><i class="fas fa-briefcase" style="color: var(--primary);"></i></div><div><span style="font-size: 0.8125rem; color: var(--gray-500);">Job Type</span><p style="margin: 0; font-weight: 600; color: var(--gray-900);">{{ $jobDetails->job_type }}</p></div></div>
                                <div style="display: flex; align-items: center; gap: 0.75rem;"><div style="width: 40px; height: 40px; background: rgba(16,185,129,0.1); border-radius: 0.625rem; display: flex; align-items: center; justify-content: center;"><i class="fas fa-dollar-sign" style="color: var(--success);"></i></div><div><span style="font-size: 0.8125rem; color: var(--gray-500);">Salary Range</span><p style="margin: 0; font-weight: 600; color: var(--gray-900);">{{ $jobDetails->minimum_salary }} - {{ $jobDetails->maximum_salary }} DH</p></div></div>
                                <div style="display: flex; align-items: center; gap: 0.75rem;"><div style="width: 40px; height: 40px; background: rgba(139,92,246,0.1); border-radius: 0.625rem; display: flex; align-items: center; justify-content: center;"><i class="fas fa-map-marker-alt" style="color: #8b5cf6;"></i></div><div><span style="font-size: 0.8125rem; color: var(--gray-500);">Location</span><p style="margin: 0; font-weight: 600; color: var(--gray-900);">{{ $jobDetails->city }}, {{ $jobDetails->country }}</p></div></div>
                            </div>
                        </div>

                        <!-- Posted By -->
                        <div style="margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid var(--gray-200);">
                            <p style="font-size: 0.8125rem; color: var(--gray-500); margin-bottom: 0.75rem;">Posted by</p>
                            <div style="display: flex; align-items: center; gap: 0.875rem;">
                                <div style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--primary), var(--primary-dark)); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; color: white; font-size: 1.125rem;">{{ substr($recruter, 0, 1) }}</div>
                                <div><h4 style="font-size: 1rem; font-weight: 700; margin: 0 0 0.125rem; color: var(--gray-900);">{{ $recruter }}</h4><a href="#" style="color: var(--primary); font-size: 0.875rem; text-decoration: none;">View Profile</a></div>
                            </div>
                        </div>

                        <!-- Share -->
                        <div style="margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid var(--gray-200);">
                            <p style="font-size: 0.8125rem; color: var(--gray-500); margin-bottom: 0.75rem;">Share this job</p>
                            <div style="display: flex; gap: 0.5rem;">
                                <a href="#" style="width: 40px; height: 40px; background: var(--gray-100); border-radius: 0.625rem; display: flex; align-items: center; justify-content: center; color: var(--gray-500); transition: all 0.2s;" onmouseover="this.style.background='var(--primary)'; this.style.color='white';" onmouseout="this.style.background='var(--gray-100)'; this.style.color='var(--gray-500)';"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" style="width: 40px; height: 40px; background: var(--gray-100); border-radius: 0.625rem; display: flex; align-items: center; justify-content: center; color: var(--gray-500); transition: all 0.2s;" onmouseover="this.style.background='var(--primary)'; this.style.color='white';" onmouseout="this.style.background='var(--gray-100)'; this.style.color='var(--gray-500)';"><i class="fab fa-twitter"></i></a>
                                <a href="#" style="width: 40px; height: 40px; background: var(--gray-100); border-radius: 0.625rem; display: flex; align-items: center; justify-content: center; color: var(--gray-500); transition: all 0.2s;" onmouseover="this.style.background='var(--primary)'; this.style.color='white';" onmouseout="this.style.background='var(--gray-100)'; this.style.color='var(--gray-500)';"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" style="width: 40px; height: 40px; background: var(--gray-100); border-radius: 0.625rem; display: flex; align-items: center; justify-content: center; color: var(--gray-500); transition: all 0.2s;" onmouseover="this.style.background='var(--primary)'; this.style.color='white';" onmouseout="this.style.background='var(--gray-100)'; this.style.color='var(--gray-500)';"><i class="fas fa-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
