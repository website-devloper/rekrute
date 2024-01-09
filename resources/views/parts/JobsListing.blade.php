<div class="container all" style="display: flex; align-items: center; justify-content: center;">
    <div class="all" style="display: flex">
        <div class="list-job">
            @foreach($jobs as $job)

            <div class="card" data-job-id="{{$job->id}}">
                <div class="card-body">
                    <div class="hhhh">
                        <img src="image/brief2.png" width="60px" height="60px" alt="user">
                        <div class="flex-container">
                            <div class="flex container">
                                <h5 class="card-title ">{{$job->title}}</h5>
                                <div class="text-elm">
                                    <style>
                                        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&family=Lato&family=Libre+Franklin:wght@100&family=Open+Sans:wght@300;400&display=swap');
                                    </style>
                                    <span><img src="image/pin.png" alt="pin" width="18px"
                                            style="margin: 0 2px 6px 4px;"></span>
                                    <p id="card-text"> {{$job->city}}, {{$job->country}}</p>
                                    <span><img src="image/saved.png" alt="saved" width="18px"
                                            style="margin: 0 2px 6px 4px;"></span>
                                    <p id="card-text">{{$job->job_type}}</p>
                                    <span><img src="image/clock.png" alt="clock" width="18px"
                                            style="margin: 0 2px 6px 4px;">
                                    </span>
                                    <p id="card-text">Published {{$job->timeAgo}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="btn btn-light" id="card-text" style="text-align: bottom; margin:0;"> <span><img
                                    src="image/brief3.png" alt="brief3" width="30px" style="padding: 5px;"></span>
                            {{$job->job_type}}</p>
                    </div>
                    <h4 style="text-align: right; padding: 0; margin: 0; font-weight: 400 ;" id="card-text">
                        {{$job->minimum_salary}} DH
                        -
                        {{$job->maximum_salary}}
                        DH</h4>
                </div>
            </div>
            @endforeach
        </div>

        <!-- #################################################################################################################-->
        <div class="class-princi">
            <section class="job-detail border rounded" style="margin-bottom:20px ;">
                <style>
                    @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&family=Lato&family=Libre+Franklin:wght@100&family=Open+Sans:wght@300;400&display=swap');
                </style>
                <div class="head">
                    <div style="float: right ;text-align:right; padding-right: 20px;"><span><img src="image/cross.png"
                                alt="cross" width="10px"></span></div>
                    <h4 style="padding-top: 20px;" class="card-title">Digital Marketing Executive</h4>
                    <p id="card-text">Casablanca</p>
                    <input type="button" value="Apply This Job" id="Apply" id="card-text">
                </div>
                <div class="scroll" style="overflow:auto; height:400px">
                    <div class="padding">
                        <h5><b>Job details</b> </h5>
                        <h6 style="font-size: 14px"><span><img src="image/brief3.png" alt="brief3" width="30px"
                                    style="padding: 5px;"></span><b> job type</b></h6>
                        <p class="btn btn-light" id="card-text"
                            style="text-align: bottom; margin:0; color: rgb(77, 77, 77);"> <b>Full Time</b> </p>
                        <p class="btn btn-light" id="card-text"
                            style="text-align: bottom; margin:0; color: rgb(77, 77, 77);"><b>Permanent</b> </p>
                        <hr>
                        <h5> <b>Full job Description</b></h5>
                        <ul id="card-text" style="font-size: 13px;">
                            <li>Casablanca</li>
                            <li>Published on: 23 Dec-12:51</li>
                            <li>announcement N: 933463</li>
                        </ul>
                        <p id="card-text" style="font-size: 13px;">As an early member of the team, you'll play a
                            huge role in
                            shaping our culture, our process, and the future of YouStickOut. Every day, you'll
                            collaborate
                            learn more about the content creation space, and watch your work make an impact (on the
                            company
                            and their community!).
                            We want this to be the best work experience
                            of your life, so we'll pay you well, offer great benefits, invest deeply in your growth,
                            and welcome you with our branded swag.</p>
                        <h6><b>Job Requirements:</b> </h6>
                        <ul id="card-text" style="font-size: 13px;">
                            <li>Formation supérieure minimum de bac +2 en développement web;</li>
                            <li>programming in Java</li>
                            <li>Developement Web (JavaEE, JS, Angular)</li>
                            <li>Bonne connaissance en systemes d'information et bases des donnees (SQL,HQL)</li>
                        </ul>
                        <ul id="card-text" style="font-size: 13px;">
                            <li>Domaine : Informatique / Multimédia / Internet</li>
                            <li>Fonction : Informatique - Webdesign/Infographie</li>
                            <li>Contrat : Stage</li>
                            <li>Entreprise : UMD</li>
                            <li>Salaire : 3000 - 4000 DH</li>
                        </ul>
                        <p id="card-text" style="font-size: 13px;">annonceur :</p>
                        <p id="card-text" style="font-size: 13px;">Fatima zahra</p>
                        <hr>
                        <h5><b>Hiring insights</b> </h5>
                        <h6 style="font-size: 14px;"><b>Job activity</b> </h6>
                        <ul id="card-text" style="font-size: 13px;">
                            <li>Posted 18 days ago</li>
                        </ul>
                    </div>


                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
                        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
                        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                    <script>
                        $(document).ready(function () {
                            // Handle click event on job card
                            $('.card').on('click', function () {
                                var jobId = $(this).data('job-id'); // Get the job ID from the clicked card

                                // Make AJAX request to fetch job details
                                $.ajax({
                                    url: '/job-details/' + jobId, // Include the jobId in the URL
                                    method: 'GET',
                                    success: function (response) {
                                        // Handle the response and display the job details
                                        // Update the job detail section with the fetched data
                                        $('.job-detail').html(response);
                                    },
                                    error: function (xhr, status, error) {
                                        // Handle the error if the request fails
                                        console.log(error);
                                    }
                                });

                            });
                        });
                    </script>

                </div>
            </section>
        </div>

    </div>

</div>