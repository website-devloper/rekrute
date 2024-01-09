@extends('template')
@section('content')

<div>
    <link rel="stylesheet" href="/assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/bootstrap-5.0.2-dist/js/bootstrap.min.js">
    @include('candidate.dashbord_candidate')

    <link rel="stylesheet" href="/assets/find_job.css">

    <div class="container company-profile shadow p-3 mb-5 bg-body rounded">
        <di class="container">
            <h4 class="form-label">BASIC INFORMATION</h4>
            <h6 class="form-label">Your last loged-in:12-04-2023 07:04 PM </h6>
            <hr>
            <form action="{{route('UpdatecandidateProfile')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">
                    <div class="col">
                        <label for="firstName" class="form-label">First Name</label>
                        <br>
                        <input type="text" id="firstName" name="firstName" value="{{$FindCand->first_name}}" class="Input-companyP form-control">
                    </div>
                    <br><br>
                    <div class="col">
                        <label for="LastName" class="form-label">Last Name</label>
                         <br>
                        <input type="text" id="LastName" name="LastName" value="{{$FindCand->last_name}}" class="Input-companyP form-control">
                    </div>

                    <br><br>
                </div>
                <div class="row g-3">
                    <div class="col">
                        <label for="Email" class="form-label">Email</label>
                        <br>
                        <input type="email" id="Email" name="Email" value="{{$FindCand->email}}" class="Input-companyP form-control">
                    </div>
                    <div class="col">
                        <label for="jobtitle" class="form-label">Job Title</label>
                        <br>
                        <input type="text" id="jobtitle" name="jobtitle" value="{{$FindCand->job_title}}" class="Input-companyP form-control">
                    </div>

                </div>
                <div class="row g-3">
                    <div class="col">
                        <label for="salaryWish" class="form-label">Salary Wish</label>
                        <br>
                        <input type="text" id="salaryWish" name="salaryWish" value="{{$FindCand->price_wish}}" class="Input-companyP form-control">
                    </div>
                    <div class="col">
                        <label for="Gender" class="form-label">Gender</label>
                        <br>
                        <select name="Gender" id="Gender" value="{{$FindCand->gender}}" class="Input-companyP form-select">
                            <option value="">select...</option>
                            <option value="female">female</option>
                            <option value="man">man</option>
                        </select>
                    </div>

                </div>
                <div class="row g-3">
                    <div class="col">
                        <label for="city" class="form-label">City</label>
                        <br>
                        <input type="text" id="city" name="city" value="{{$FindCand->city}}" class="Input-companyP form-control">
                    </div>
                    <div class="col">
                        <label for="street" class="form-label">Street</label>
                        <br>
                        <input type="text" id="street" name="street" value="{{$FindCand->street}}" class="Input-companyP form-control">
                    </div>

                </div>
                <div class="row g-3">
                    <div class="col">
                        <label for="zip" class="form-label">Zip Code</label>
                        <br>
                        <input type="text" id="zip" name="zip" value="{{$FindCand->zip_code}}" class="Input-companyP form-control">
                    </div>
                    <div class="col">
                        <label for="country" class="form-label">Country</label>
                        <br>
                        <input type="text" id="country" name="country" value="{{$FindCand->country}}" class="Input-companyP form-control">
                    </div>
                </div>
                <label for="phone" class="form-label">Phone Number</label>
                <br>
                <input type="text" id="phone" name="phone" value="{{$FindCand->phone}}" class="Input-companyP form-control">
                <label for="about" class="form-label">About Me</label>
                <br>
                <textarea name="about" id="about" cols="90" rows="9" class="Input-companyP form-control">{{$FindCand->about}}</textarea>

               
                <br>
                <div class="logofile">
                <input type="file" id="resume" name="resume">
                <label for="resume"><span><img src="image/upload.png" alt="uploadresume" width="18px"></span>
                    &nbsp;Upload Resume</label>
                </div>
               
                <br><br>

                <input type="submit" value="SAVE"  class="button-C">
                <input type="reset" value="CANCEL" class="button-C">
                <br><br>

                <p class="form-label">Company Logo</p>
                <div class="logofile">
                <input type="file" id="logo" name="logo">
                <label for="logo"><span class="form-label"><img src="image/upload.png" alt="uploadlogo" width="18px"></span> &nbsp;Upload
                    Logo</label>
                </div>
                
                <br><br>
                <input type="submit"  class="button-C" value="UPDATE">
    </div>

    @endsection