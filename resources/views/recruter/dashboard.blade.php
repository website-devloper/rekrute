@extends('template')

@section('content')
<div style="background-color: #f3f4f6; min-height: 100vh; padding: 2rem 0;">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3 mb-4">
                <div class="bg-white rounded-lg shadow-sm p-4 sticky-top" style="top: 2rem;">
                    <div class="text-center mb-4">
                        <div class="bg-primary-100 text-primary-600 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 64px; height: 64px; font-size: 1.5rem; font-weight: bold;">
                            {{ substr(Auth::guard('employer')->user()->name, 0, 1) }}
                        </div>
                        <h5 class="font-weight-bold mb-1">{{ Auth::guard('employer')->user()->name }}</h5>
                        <p class="text-muted small">Recruiter Account</p>
                    </div>

                    <nav class="nav flex-column gap-2">
                        <a href="{{ route('dashboard.recruiter') }}" class="nav-link active d-flex align-items-center gap-2 text-dark font-weight-medium bg-light rounded p-2">
                            <svg width="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                            Dashboard
                        </a>
                        <a href="{{ route('post_job') }}" class="nav-link d-flex align-items-center gap-2 text-muted p-2 hover-bg-light rounded">
                            <svg width="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Post a Job
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="mt-3 pt-3 border-top">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link text-danger d-flex align-items-center gap-2 p-0 w-100 text-decoration-none">
                                <svg width="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                Logout
                            </button>
                        </form>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-9">
                <!-- Stats Overview -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="bg-white rounded-lg shadow-sm p-4">
                            <p class="text-muted small text-uppercase mb-1 font-weight-bold">Active Jobs</p>
                            <h2 class="text-primary mb-0">{{ $jobs->count() }}</h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-white rounded-lg shadow-sm p-4">
                            <p class="text-muted small text-uppercase mb-1 font-weight-bold">Total Applications</p>
                            <h2 class="text-success mb-0">{{ $applicationsCount ?? 0 }}</h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-white rounded-lg shadow-sm p-4">
                            <p class="text-muted small text-uppercase mb-1 font-weight-bold">Profile Views</p>
                            <h2 class="text-warning mb-0">1,240</h2>
                        </div>
                    </div>
                </div>

                <!-- Recent Jobs -->
                <div class="bg-white rounded-lg shadow-sm p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="font-weight-bold mb-0">Your Jobs</h4>
                        <a href="{{ route('post_job') }}" class="btn btn-primary btn-sm rounded-pill px-4">+ Post New Job</a>
                    </div>

                    @if($jobs->count() > 0)
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="border-0 rounded-start pl-3 py-3">Job Title</th>
                                        <th class="border-0 py-3">Type</th>
                                        <th class="border-0 py-3">Posted</th>
                                        <th class="border-0 py-3">Status</th>
                                        <th class="border-0 rounded-end py-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jobs as $job)
                                    <tr>
                                        <td class="pl-3">
                                            <div class="font-weight-bold">{{ $job->title }}</div>
                                            <div class="small text-muted">{{ $job->city }}</div>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark border">{{ $job->job_type }}</span>
                                        </td>
                                        <td class="small text-muted">
                                            {{ $job->created_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            <span class="badge bg-success-subtle text-success">Active</span>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill px-3">Manage</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 64px; height: 64px; color: #9ca3af;">
                                <svg width="32" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            </div>
                            <h5 class="text-muted">No jobs posted yet</h5>
                            <a href="{{ route('post_job') }}" class="btn btn-link">Post your first job</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
