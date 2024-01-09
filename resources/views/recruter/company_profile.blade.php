@extends('template')
@section('content')

<div>

    <link rel="stylesheet" href="/assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/bootstrap-5.0.2-dist/js/bootstrap.min.js">
    @include('recruter.dashbord_recruter')

    <link rel="stylesheet" href="/assets/find_job.css">

</div>

<div class="container company-profile shadow p-3 mb-5 bg-body rounded">
<div class="container">
<h4 class="form-label">COMPANY PROFILE</h4>
    <h6 class="form-label">Your last loged-in:12-04-2023 07:04 PM </h6>
    <hr>
    <form action="{{route('updateEmployer')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-3">

            <div class="col">
                <label for="name" class="form-label">Company Name</label>
                <br>
                <input type="text" id="name" name="name" value="{{$FindEmp->name}}" class="Input-companyP form-control">
            </div>

            <br><br>

            <div class="col">

                <label for="Established"  class="form-label">Established In</label>
                <br>
                <input type="text" id="Established" name="Established" value="{{$FindEmp->Established_In}}"
                    class="Input-companyP form-control ">
            </div>

            <br><br>
        </div>
        <div class="row g-3">
            
            <div class="col">
               
                <label for="Type"  class="form-label">Type</label>
                <br>
                <input type="text" id="Type" name="Type" value="{{$FindEmp->type}}" class="Input-companyP form-control">
            </div>

            <br><br>

            <div class="col">

                <label for="Website"  class="form-label">Website</label>
                <br>
                <input type="text" id="Website" name="Website" value="{{$FindEmp->website_url}}" class="Input-companyP form-control">
            </div>

            <br><br>
        </div>



        <div class="row g-3">
            
            <div class="col">
               
                <label for="City"  class="form-label">City</label>
                <br>
                <input type="text" id="City" name="City" value="{{$FindEmp->city}}" class="Input-companyP form-control">
            </div>

            <br><br>

            <div class="col">

                <label for="Street"  class="form-label">Street</label>
                <br>
                <input type="text" id="Street" name="Street" value="{{$FindEmp->street}}" class="Input-companyP form-control">
            </div>

            <br><br>
        </div>


        <div class="row g-3">
            
            <div class="col">
               
                <label for="Street" class="form-label">Street</label>
                <br>
                <input type="text" id="Street" name="Street" value="{{$FindEmp->street}}" class="Input-companyP form-control">
            </div>

            <br><br>

            <div class="col">

                <label for="Zip" class="form-label">Zip Code</label>
                <br>
                <input type="text" id="Zip" name="Zip" value="{{$FindEmp->zip_code}}" class="Input-companyP form-control">
            </div>

            <br><br>
        </div>


        <div class="row g-3">
            
            <div class="col">
               
                <label for="Country" class="form-label">Country</label>
                <br>
                <input type="text" id="Country" name="Country" value="{{$FindEmp->country}}" class="Input-companyP form-control ">
            </div>

            <br><br>

            <div class="col">

                <label for="Phone" class="form-label">Phone Number</label>
                <br>
                <input type="text" id="Phone" name="Phone" value="{{$FindEmp->phone}}" class="Input-companyP form-control">
            </div>

            <br><br>
        </div>


        <label for="Email" class="form-label">Email Address</label>
        <input type="text" id="Email" name="Email" value="{{$FindEmp->email_adress}}" class="Input-companyP form-control">


        <input type="text" name="id" value="{{session('id')}}" hidden>

        <label for="Background" class="form-label">Company Background</label>
        <textarea name="Background" id="Background" cols="90" rows="5"
            class="Input-companyP form-control">{{$FindEmp->company_bg}}</textarea>


        <label for="Services" class="form-label">Services</label>
        <textarea name="Services" id="Services" cols="90" rows="5"
            class="Input-companyP form-control">{{$FindEmp->service}}</textarea>



        <label for="Expertise" class="form-label">Expertise</label>
        <textarea name="Expertise" id="Expertise" cols="90" rows="5"
            class="Input-companyP form-control">{{$FindEmp->Expertise}}</textarea>


        <input type="submit" value="SAVE" class="button-C">
        <input type="reset" value="CANCEL" class="button-C">


        <p  class="form-label">Company Logo</p>
        <div class="logofile">
            <input type="file" id="myFile" name="filename">
            <label for="myFile" class="form-label"><span><img src="/image/upload.png" alt="upload" width="18px"></span> &nbsp;Upload
                Logo</label>
        </div>

        <br><br>

        <input type="submit" class="button-C" value="UPDATE">

    </form>
</div>
   


</div>
</div>

@endsection