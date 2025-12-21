@extends('template')

@section('content')
<div style="background-color: #f3f4f6; min-height: 100vh; padding: 2rem 0;">
    <div class="container">
        <div class="row">
            <!-- Sidebar (Consistent with Dashboard) -->
            <div class="col-lg-3 mb-4">
                <div class="bg-white rounded-lg shadow-sm p-4 sticky-top" style="top: 2rem;">
                    <nav class="nav flex-column gap-2">
                        <a href="{{ route('dashboard.recruiter') }}" class="nav-link d-flex align-items-center gap-2 text-muted p-2 hover-bg-light rounded">
                            <svg width="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                            Dashboard
                        </a>
                        <a href="{{ route('recruiter.profile') }}" class="nav-link active d-flex align-items-center gap-2 text-dark font-weight-medium bg-light rounded p-2">
                             <svg width="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            Company Profile
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
                <div class="bg-white rounded-lg shadow-sm p-4">
                    <h4 class="font-weight-bold mb-4">Company Details</h4>

                    <form action="{{ route('recruiter.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label font-weight-bold">Company Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $employer->name }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label font-weight-bold">Industry / Service</label>
                                <input type="text" name="service" class="form-control" value="{{ $employer->service }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label font-weight-bold">Email Address</label>
                                <input type="email" class="form-control" value="{{ $employer->email_adress }}" readonly style="background-color: #f9fafb;">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label font-weight-bold">Website URL</label>
                                <input type="url" name="website_url" class="form-control" value="{{ $employer->website_url }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label font-weight-bold">Company Type</label>
                                <select name="type" class="form-select">
                                    <option value="Private" {{ $employer->type == 'Private' ? 'selected' : '' }}>Private</option>
                                    <option value="Public" {{ $employer->type == 'Public' ? 'selected' : '' }}>Public</option>
                                    <option value="Startup" {{ $employer->type == 'Startup' ? 'selected' : '' }}>Startup</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label font-weight-bold">Country</label>
                                <input type="text" name="country" class="form-control" value="{{ $employer->country }}">
                            </div>

                            <div class="col-12">
                                <label class="form-label font-weight-bold">Company Logo</label>
                                <div class="d-flex align-items-center gap-3">
                                    @if($employer->logo_url)
                                        <img src="{{ Str::startsWith($employer->logo_url, 'http') ? $employer->logo_url : asset('storage/' . $employer->logo_url) }}" alt="Logo" style="width: 64px; height: 64px; object-fit: contain; border-radius: 8px; border: 1px solid var(--gray-200);">
                                    @endif
                                    <input type="file" name="logo" class="form-control">
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label font-weight-bold">Expertise</label>
                                <textarea name="Expertise" class="form-control" rows="4">{{ $employer->Expertise }}</textarea>
                            </div>

                            <div class="col-12 mt-4 text-end">
                                <button type="submit" class="btn btn-primary px-4 rounded-pill font-weight-bold">Save Company Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
