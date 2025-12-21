@extends('template')

@section('content')
<div style="background-color: #f3f4f6; min-height: 100vh; padding: 2rem 0;">
    <div class="container">
        <div class="row">
            <!-- Sidebar (Same as Profile) -->
            <div class="col-lg-3 mb-4">
               <div class="bg-white rounded-lg shadow-sm p-4 sticky-top" style="top: 2rem;">
                    <nav class="nav flex-column gap-2">
                         <a href="{{ route('candidateProfile') }}" class="nav-link d-flex align-items-center gap-2 text-muted p-2 hover-bg-light rounded">
                            <svg width="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            My Profile
                        </a>
                        <a href="{{ route('AppliedJob') }}" class="nav-link active d-flex align-items-center gap-2 text-dark font-weight-medium bg-light rounded p-2">
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
                <div class="bg-white rounded-lg shadow-sm p-4">
                    <h4 class="font-weight-bold mb-4">Applied Jobs</h4>

                    @if($applications->count() > 0)
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="border-0 rounded-start pl-3 py-3">Job Title</th>
                                        <th class="border-0 py-3">Applied Date</th>
                                        <th class="border-0 py-3">Status</th>
                                        <th class="border-0 rounded-end py-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($applications as $app)
                                    <tr>
                                        <td class="pl-3">
                                            <div class="font-weight-bold">{{ $app->job->title ?? 'Unknown Job' }}</div>
                                            <div class="small text-muted">{{ $app->job->company_name ?? 'Company' }}</div>
                                        </td>
                                        <td class="small text-muted">
                                            {{ $app->created_at->format('M d, Y') }}
                                        </td>
                                        <td>
                                            @if($app->status == 'pending')
                                                <span class="badge bg-warning-subtle text-warning">Pending</span>
                                            @elseif($app->status == 'accepted')
                                                <span class="badge bg-success-subtle text-success">Accepted</span>
                                            @else
                                                <span class="badge bg-danger-subtle text-danger">Rejected</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('job-details', $app->job_id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">View Job</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                         <div class="text-center py-5">
                            <div class="bg-light rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 64px; height: 64px; color: #9ca3af;">
                                <svg width="32" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                            <h5 class="text-muted">You haven't applied to any jobs yet</h5>
                            <a href="{{ route('jobs') }}" class="btn btn-primary mt-2">Find Jobs</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
