@extends('template')

@section('content')
<div style="background-color: #f3f4f6; min-height: 100vh; padding: 2rem 0;">
    <div class="container">
        <div class="mb-4">
            <a href="{{ route('dashboard.recruiter') }}" class="btn btn-link text-muted p-0 mb-2">
                <svg width="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Dashboard
            </a>
            <h2 class="font-weight-bold">Applications for: {{ $job->title }}</h2>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-4">
            @if($applications->count() > 0)
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0 rounded-start pl-3 py-3">Candidate</th>
                                <th class="border-0 py-3">Applied Date</th>
                                <th class="border-0 py-3">Resume</th>
                                <th class="border-0 py-3">Status</th>
                                <th class="border-0 rounded-end py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($applications as $app)
                            <tr>
                                <td class="pl-3">
                                    <div class="font-weight-bold">{{ $app->candidate->first_name }} {{ $app->candidate->last_name }}</div>
                                    <div class="small text-muted">{{ $app->candidate->email }}</div>
                                </td>
                                <td class="small text-muted">
                                    {{ $app->created_at->format('M d, Y') }}
                                </td>
                                <td>
                                    @if($app->resume)
                                        <a href="{{ asset('storage/' . $app->resume) }}" target="_blank" class="btn btn-sm btn-outline-info rounded-pill">View CV</a>
                                    @else
                                        <span class="text-muted small">No CV</span>
                                    @endif
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
                                    <div class="d-flex gap-2">
                                        <form action="{{ route('applications.updateStatus', $app->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="accepted">
                                            <button type="submit" class="btn btn-sm btn-success rounded-pill px-3" {{ $app->status == 'accepted' ? 'disabled' : '' }}>Accept</button>
                                        </form>
                                        <form action="{{ route('applications.updateStatus', $app->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="rejected">
                                            <button type="submit" class="btn btn-sm btn-danger rounded-pill px-3" {{ $app->status == 'rejected' ? 'disabled' : '' }}>Reject</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <p class="text-muted">No applications received yet for this job.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
