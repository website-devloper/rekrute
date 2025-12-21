@extends('template')

@section('content')
<div style="background-color: #f3f4f6; min-height: 100vh; padding: 2rem 0;">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3 mb-4">
                <div class="bg-white rounded-lg shadow-sm p-4 sticky-top" style="top: 2rem;">
                    <div class="text-center mb-4">
                        <div class="bg-success-100 text-success-600 rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 64px; height: 64px; font-size: 1.5rem; font-weight: bold;">
                            {{ substr(Auth::guard('candidate')->user()->first_name, 0, 1) }}
                        </div>
                        <h5 class="font-weight-bold mb-1">{{ Auth::guard('candidate')->user()->first_name }}</h5>
                        <p class="text-muted small">Candidate Account</p>
                    </div>

                    <nav class="nav flex-column gap-2">
                        <a href="{{ route('candidateProfile') }}" class="nav-link active d-flex align-items-center gap-2 text-dark font-weight-medium bg-light rounded p-2">
                            <svg width="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            My Profile
                        </a>
                        <a href="{{ route('AppliedJob') }}" class="nav-link d-flex align-items-center gap-2 text-muted p-2 hover-bg-light rounded">
                            <svg width="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                            Applied Jobs
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
                <!-- Profile Edit Form -->
                <div class="bg-white rounded-lg shadow-sm p-4">
                    <h4 class="font-weight-bold mb-4">My Information</h4>

                    <form action="{{ route('candidate.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label font-weight-bold">First Name</label>
                                <input type="text" name="first_name" class="form-control" value="{{ $candidate->first_name }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label font-weight-bold">Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="{{ $candidate->last_name }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label font-weight-bold">Email Address</label>
                                <input type="email" name="email" class="form-control" value="{{ $candidate->email }}" readonly style="background-color: #f9fafb;">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label font-weight-bold">Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ $candidate->phone }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label font-weight-bold">Job Title</label>
                                <input type="text" name="job_title" class="form-control" placeholder="e.g. Software Engineer" value="{{ $candidate->job_title }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label font-weight-bold">City</label>
                                <input type="text" name="city" class="form-control" value="{{ $candidate->city }}">
                            </div>

                            <div class="col-12">
                                <label class="form-label font-weight-bold">Resume (PDF, DOCX)</label>
                                <div class="d-flex align-items-center gap-3">
                                    <input type="file" name="resume" class="form-control">
                                    @if($candidate->resume && $candidate->resume != 'resume.pdf')
                                        <a href="{{ asset('storage/' . $candidate->resume) }}" target="_blank" class="btn btn-sm btn-outline-primary">View Current</a>
                                    @endif
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label font-weight-bold">About Me</label>
                                <textarea name="about" class="form-control" rows="4">{{ $candidate->about }}</textarea>
                            </div>

                            <div class="col-12 mt-4 text-end">
                                <button type="submit" class="btn btn-success px-4 rounded-pill font-weight-bold">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Stats -->
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="bg-white rounded-lg shadow-sm p-4 d-flex align-items-center gap-3">
                            <div class="bg-primary-100 text-primary p-3 rounded-circle">
                                <svg width="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <h3 class="font-weight-bold mb-0">12</h3>
                                <p class="text-muted small mb-0">Applications Sent</p>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="bg-white rounded-lg shadow-sm p-4 d-flex align-items-center gap-3">
                            <div class="bg-warning-100 text-warning p-3 rounded-circle">
                                <svg width="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </div>
                            <div>
                                <h3 class="font-weight-bold mb-0">5</h3>
                                <p class="text-muted small mb-0">Profile Views</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
