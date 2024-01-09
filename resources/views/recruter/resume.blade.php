@extends('template')
@section('content')

<div>
    @include('recruter.dashbord_recruter')


    <link rel="stylesheet" href="/assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/bootstrap-5.0.2-dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="/assets/find_job.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <div class="container company-profile shadow p-3 mb-5 bg-body rounded">
        <div class="container">

            <h4 class="form-label">RESUME</h4>
            <hr>
            @foreach($candidates as $candidate)
<div class="row">
    <div class="resumeDis col-md-6 col-sm-12 mb-4 mr-md-4">
        <div>
            <div class="d-flex justify-content-between">
                <div>
                    <h5 class="form-label">{{$candidate->first_name}} {{$candidate->last_name}}</h5>
                    <p style="color:#4540DB">{{$candidate->job_title}} </p>
                </div>
                <div>
                    <span><button onclick="downloadFile('{{ asset('resume/'.$candidate->resume) }}', '{{$candidate->resume}}')" class="btn btn1"><i
                                class="bi bi-box-arrow-down"></i></button></span>
                </div>
            </div>
            <div>
                <ul class="list-inline">
                    <li class="list-inline-item" style="color:#4540DB"><img src="/image/pin.png" alt="pin"
                            width="14px" style="margin: 0 2px 6px 4px;">{{$candidate->city}}, {{$candidate->country}}
                    </li>
                    <li class="list-inline-item" style="color:#4540DB"><i class="bi bi-cash"></i> {{$candidate->price_wish}}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endforeach

        </div>
    </div>


</div>


<script>
    function downloadFile(fileUrl, fileName) {
        var link = document.createElement("a");
        link.href = fileUrl;
        link.download = fileName;
        link.click();
    }
</script>



</div>
@endsection