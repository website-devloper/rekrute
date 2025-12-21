@extends('template')

@section('content')
<div style="background-color: #f3f4f6; min-height: 100vh; padding: 2rem 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="bg-white rounded-lg shadow-sm p-4">
                    <div class="mb-4 pb-3 border-bottom">
                        <h2 class="font-weight-bold">Post a New Job</h2>
                        <p class="text-muted">Find the perfect candidate for your company</p>
                    </div>

                    <form action="{{ route('jobs.store') }}" method="POST">
                        @csrf
                        
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label font-weight-bold">Job Title</label>
                                <input type="text" name="title" class="form-control" placeholder="e.g. Senior Software Engineer" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label font-weight-bold">Job Type</label>
                                <select name="job_type" class="form-select" required>
                                    <option value="Full Time">Full Time</option>
                                    <option value="Part Time">Part Time</option>
                                    <option value="Contract">Contract</option>
                                    <option value="Freelance">Freelance</option>
                                    <option value="Remote">Remote</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label font-weight-bold">Location (City)</label>
                                <input type="text" name="city" class="form-control" placeholder="e.g. Casablanca">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label font-weight-bold">Minimum Salary (DH)</label>
                                <input type="number" name="min_salary" class="form-control" placeholder="e.g. 5000">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label font-weight-bold">Maximum Salary (DH)</label>
                                <input type="number" name="max_salary" class="form-control" placeholder="e.g. 8000">
                            </div>

                            <div class="col-12">
                                <label class="form-label font-weight-bold">Job Description</label>
                                <textarea name="description" class="form-control" rows="6" placeholder="Describe the role, responsibilities, and requirements..." required></textarea>
                            </div>

                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill font-weight-bold">Post Job Offer</button>
                                <a href="{{ route('dashboard.recruiter') }}" class="btn btn-link text-muted ms-3">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection