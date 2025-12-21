@extends('template')

@section('content')
    <!-- Job Header/Hero -->
    <section class="job-details-hero" style="background: var(--gradient-hero); padding: 4rem 0 6rem; color: white;">
        <div class="container">
            <div style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 0.5rem 1rem; border-radius: 50px; display: inline-block; margin-bottom: 1rem; border: 1px solid rgba(255,255,255,0.2);">
                <span style="font-weight: 600;">{{ $jobDetails->job_type }}</span>
            </div>
            <h1 style="font-size: 3rem; font-weight: 800; margin-bottom: 1rem;">{{ $jobDetails->title }}</h1>
            <div style="display: flex; gap: 2rem; font-size: 1.1rem; opacity: 0.9;">
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <svg style="width: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    {{ $jobDetails->city }}, {{ $jobDetails->country }}
                </div>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <svg style="width: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ $jobDetails->minimum_salary }} - {{ $jobDetails->maximum_salary }} DH
                </div>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <svg style="width: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Posted {{ $jobDetails->timeAgo }}
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="job-content" style="margin-top: -4rem; padding-bottom: 5rem;">
        <div class="container">
            <div class="row">
                <!-- Left Column: Description -->
                <div class="col-lg-8" style="padding-right: 2rem;">
                    <div style="background: white; border-radius: 1.5rem; padding: 2.5rem; box-shadow: var(--shadow-xl); margin-bottom: 2rem;">
                        <h2 style="font-size: 1.75rem; font-weight: 700; margin-bottom: 1.5rem; color: var(--gray-900);">Job Description</h2>
                        <div style="color: var(--gray-600); line-height: 1.8; font-size: 1.05rem; margin-bottom: 2rem;">
                            {{ $jobDetails->description }}
                        </div>

                        <h2 style="font-size: 1.75rem; font-weight: 700; margin-bottom: 1.5rem; color: var(--gray-900);">Requirements</h2>
                        <div style="color: var(--gray-600); line-height: 1.8; font-size: 1.05rem;">
                            {{ $jobDetails->requirements }}
                        </div>
                    </div>
                </div>

                <!-- Right Column: Sidebar -->
                <div class="col-lg-4">
                    <!-- Apply Card -->
                    <div style="background: white; border-radius: 1.5rem; padding: 2rem; box-shadow: var(--shadow-lg); border: 1px solid var(--gray-200); position: sticky; top: 2rem;">
                        <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 1.5rem;">Interested in this job?</h3>
                        
                        <form action="{{route('applyJob')}}" method="POST">
                            @csrf
                            <input type="text" value="{{$jobDetails->id}}" name="JobId" hidden>
                            <button type="submit" style="width: 100%; background: var(--gradient-cta); color: white; border: none; padding: 1rem; border-radius: 0.75rem; font-weight: 600; font-size: 1.1rem; cursor: pointer; transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'">
                                Apply Now
                            </button>
                        </form>

                        <div style="margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid var(--gray-200);">
                            <p style="font-size: 0.9rem; color: var(--gray-500); margin-bottom: 0.5rem;">Posted by</p>
                            <div style="display: flex; align-items: center; gap: 1rem;">
                                <div style="width: 48px; height: 48px; background: var(--gray-100); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; color: var(--primary-600);">
                                    {{ substr($recruter, 0, 1) }}
                                </div>
                                <div>
                                    <h4 style="font-size: 1.1rem; font-weight: 700; margin: 0;">{{ $recruter }}</h4>
                                    <a href="#" style="color: var(--primary-600); font-size: 0.9rem; text-decoration: none;">View Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
