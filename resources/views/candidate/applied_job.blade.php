@extends('template')
@section('content')

<div>


    @include('candidate.dashbord_candidate')
    <link rel="stylesheet" href="/assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/bootstrap-5.0.2-dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="/assets/find_job.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <div class="container company-profile shadow p-3 mb-5 bg-body rounded">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div>
                    <h4 class="form-label">APPLIED JOBS</h4>
                </div>

            </div>

            <hr>
            <table class="table costum-table align-middle mb-0 " border="2" width="60%">
                <thead>
                    <tr>
                        <th class="">Job Name</th>
                        <th class="">Recruter</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appliedJobs as $appliedJob)
                    <tr>

                        <td>
                            <h5 class="form-label">{{$appliedJob->title}}</h5>
                            <ul class="list-inline">
                                <li class="list-inline-item"><img src="/image/pin.png" alt="pin" width="14px"
                                        style="margin: 0 2px 6px 4px;">{{$job->city}}, {{$job->country}}</li>
                                <li class="list-inline-item"><img src="/image/saved.png" alt="saved" width="14px"
                                        style="margin: 0 2px 6px 4px;"></i>{{$job->job_type}}</li>
                            </ul>

                        </td>
                        </td>
                        </td>

                        <td><button class="btn btn-primary btn1"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-danger btn2"><i class="bi bi-trash3"></i></button>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</div>
@endsection