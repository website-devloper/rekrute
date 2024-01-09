@extends('template')
@section('content')

<div>
    @include('recruter.dashbord_recruter')
    <link rel="stylesheet" href="/assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/bootstrap-5.0.2-dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="/assets/find_job.css">


    <div class="container company-profile shadow p-3 mb-5 bg-body rounded">
        <div class="container">
            <h4 class="form-label">POST A JOB</h4>
            <hr>
            <form action="{{route('PostJobRequest')}}" method="POST">
                @csrf

                <div class="row g-3">

                    <div class="col">
                        <label for="jobTitle" class="form-label">Job Title</label>
                        <br>
                        <input type="text" id="jobTitle" name="jobTitle" class="Input-companyP form-control" placeholder="Enter job title">
                    </div>

                    <br><br>

                    <div class="col">

                        <label for="city" class="form-label">City</label>
                        <br>
                        <input type="text" id="city" name="city" class="Input-companyP form-control"  placeholder="Enter city">
                    </div>

                    <br><br>
                </div>



                <div class="row g-3">

                    <div class="col">
                        <label for="country" class="form-label">Country</label>
                        <br>
                        <input type="text" id="country" name="country" class="Input-companyP form-control"  placeholder="Enter country">
                    </div>

                    <br><br>

                    <div class="col">

                        <label for="jobCat" class="form-label">Job Category</label>
                        <br>
                        <select name="jobCat" id="jobCat" class="Input-companyP form-select">
                            <option value="">choose...</option>
                            <option value="Software Engineer">Software Engineer</option>
                        </select>
                    </div>

                    <br><br>
                </div>




                <div class="row g-3">

                    <div class="col">
                        <label for="jobType" class="form-label">Job Type</label>
                        <br>
                        <select name="jobType" id="jobType" class="Input-companyP form-select">
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                            <option value="Internship">Internship</option>
                            <option value="freelance">freelance</option>
                        </select>
                    </div>

                    <br><br>

                    <div class="col">

                        <label for="Experience" class="form-label">Experience</label>
                        <br>
                        <select name="Experience" id="Experience" class="Input-companyP form-select">
                            <option value="Expert">Expert</option>
                            <option value="2 Years">2 Years</option>
                            <option value="3 Years">3 Years</option>
                            <option value="4 Years">4 Years</option>
                            <option value="5 Years">5 Years</option>
                        </select>
                    </div>

                    <br><br>
                </div>


                <div class="row g-3">

                    <div class="col">
                        <label for="MinSalary" class="form-label">Minimum Salary(MAD)</label>
                        <br>
                        <input type="text" id="MinSalary" name="MinSalary" class="Input-companyP form-control"  placeholder="e.g 1000">
                    </div>

                    <br><br>

                    <div class="col">
                        <label for="MaxSalary" class="form-label">Maximum Salary(MAD)</label>
                        <br>
                        <input type="text" id="MaxSalary" name="MaxSalary" class="Input-companyP form-control"  placeholder="e.g 4000">
                    </div>

                    <br><br>
                </div>

               <br>
                <label for="jobDes" class="form-label"> Job Description</label>
                <br>
                <textarea name="jobDes" id="jobDes" cols="120" rows="5" class="Input-companyP form-control"></textarea>
               <br>
                <label for="jobRes" class="form-label">Job Responsibilies</label>
                <br>
                <textarea name="jobRes" id="jobRes" cols="120" rows="5" class="Input-companyP form-control"></textarea>
                <br>


                <label for="Requirement" class="form-label">Requirements</label>
                <br>
                <textarea name="Requirement" id="Requirement" cols="120" rows="5"
                    class="Input-companyP form-control"></textarea>


                <input type="submit" class="button-C" value="POST YOUR JOB">
        </div>

        </form>
    </div>

</div>

</div>
</div>

@endsection