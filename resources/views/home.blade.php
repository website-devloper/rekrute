@extends('template')
@section('content')

    <div class="container">
        <h1 class="text-center header">The Easiest Way to Get <br>Your <span style="color: #4540DB;">New Job</span></h1>
        <p class="text-center parag">100 jobs & 70 candidates are registered</p>
        <div class="cont">
            <div class="search">
                <div class="row">
                    <div class="col-md-6">
                        <div class="search-1"> <img src="image\search.png" alt="search"> <input type="text"
                                placeholder="Search Title or Keyword">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <div class="search-2"> <img src="image\location.png" alt="Location"> <input type="text"
                                    placeholder="Search Location"> <button>Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="create-acc">
        <div class="container1">
            <h1 class="cra">Make a Difference with Your Online Resume! </h1>
            <p class="cra1 container"> Your resume in minutes with JobBoard resume assistant is ready!</p>
            <div class="img-btn">
                <span class="m-up">Create an Account</span>
            </div>
        </div>
    </div>
    <div id="container">
        <h2 id="font">Recent Jobs</h2>
        <p class="font-weight-light" id="small">20+ Recently Added Jobs</p>
    </div>

            <!-- #################################################################################################################-->
            @include('parts.JobsListing')

    <!-- ################################################################################################################ -->

    <div class="container resume">
        <div class="conttR">
            <div class="row">
                <div class="img-cv col">
                    <img src="image\cv7.png" alt="resume" width="100%">
                </div>
                <div class="right col">
                    <h3 class="hd-txt">Get Matched The Most Valuable Jobs, Just Drop Your CV at Staffing Solutions
                    </h3>
                    <p class="p-txt">In the subject line of email, write your name, the description of the position
                        you want
                        to apply</p>
                    <input type="file" id="myFile" name="filename">
                    <label for="myFile"><span><img src="image/upload.png" alt="upload" width="18px"></span> &nbsp;
                        Upload
                        Your CV</label>
                </div>
            </div>

        </div>
    </div>

    <!--###############################################################################################################-->
    <div class="container subscribe">
            <div class="flex-s">
                <h3 id="sub-text">Never Want to Miss <br> Any<span style="color:#4540DB"> Job News?</span></h3>
            </div>
            <div class="flex-s">
                <div class="search-c">
                    <div class="row">
                        <div>
                            <div class="search1"><input type="text">
                                <button>Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    @include('Scripts.script1')
    @endsection
</body>

</html>