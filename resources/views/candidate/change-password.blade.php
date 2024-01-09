@extends('template')
@section('content')

<div>
@include('candidate.dashbord_candidate')
    <link rel="stylesheet" href="/assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/bootstrap-5.0.2-dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="/assets/find_job.css">
    <div class="container company-profile shadow p-3 mb-5 bg-body rounded">
        <div class="container">
            <h4 class="form-label">CHANGE PASSWORD</h4>
            <hr>
            <form action="{{route('ChangePasswordRequestC')}}" method="POST">
                @csrf
                <label for="oldPass" class="form-label">Old Password</label>
                <input type="password" id="oldPass" name="oldPassC" class="Input-companyP form-control"placeholder="Enter Old Password">


                <div class="row g-3">

                    <div class="col">
                        <label for="NewPass" class="form-label">New Password</label>
                        <br>
                        <input type="password" id="NewPass" name="NewPassC" class="Input-companyP form-control" placeholder="Enter New Password">
                    </div>

                    <br><br>

                    <div class="col">

                        <label for="confirmation" class="form-label">Confirm Password</label>
                        <input type="password" id="confirmation" name="confirmationC" class="Input-companyP form-control" placeholder="Enter New Password">
                    </div>


                </div>

                    <br>

                <input type="submit" value="Update Password" class="button-C">

            </form>
        </div>

    </div>
</div>

@endsection