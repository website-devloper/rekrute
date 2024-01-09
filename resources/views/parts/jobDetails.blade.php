
 <div class="class-princi">
    <section class="job-detail border rounded" style="margin-bottom:20px ;">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&family=Lato&family=Libre+Franklin:wght@100&family=Open+Sans:wght@300;400&display=swap');
        </style>
        <div class="head">
            <div style="float: right ;text-align:right; padding-right: 20px;"><span><img src="image/cross.png"
                        alt="cross" width="10px"></span></div>
            <h4 style="padding-top: 20px;" class="card-title">{{$jobDetails->title}}</h4>
            <p id="card-text">{{$jobDetails->city}}</p>
<!-- ---------------------------------- -->
            <form action="{{route('applyJob')}}" method="POST">
                @csrf
                <input type="text" value="{{$jobDetails->id}}" name="JobId" hidden>
                <input type="submit" id="Apply" id="card-text" value='Apply This Job'>
            </form>
<!-- ---------------------------------- -->
        </div>
        <div class="scroll container" style="overflow:auto; height:400px">
            <div class="padding">
                <h5><b>Job details</b> </h5>
                <h6 style="font-size: 14px"><span><img src="image/brief3.png" alt="brief3" width="30px"
                            style="padding: 5px;"></span><b> job type</b></h6>
                <p class="btn btn-light" id="card-text" style="text-align: bottom; margin:0; color: rgb(77, 77, 77);">
                    <b>{{$jobDetails->job_type}}</b>
                </p>
                <hr>
                <h5> <b>Full job Description</b></h5>
                <ul id="card-text" style="font-size: 13px;">
                    <li>{{$jobDetails->city}}</li>
                    <!-- <li>Published on: 23 Dec-12:51</li> -->
                    <li>announcement N: {{$jobDetails->id}}</li>
                </ul>
                <div style="width:50%">
                    <p id="card-text" style="font-size: 13px;">{{$jobDetails->description}}</p>
                    <h6><b>Job Requirements:</b> </h6>
                    <ul id="card-text" style="font-size: 13px;">
                        <p>{{$jobDetails->requirements}}</p>
                    </ul>
                </div>

                <ul id="card-text" style="font-size: 13px;">
                    <li>Salaire : {{$jobDetails->minimum_salary}} - {{$jobDetails->maximum_salary}}DH</li>
                </ul>
                <p id="card-text" style="font-size: 13px;">annonceur :</p>
                <p id="card-text" style="font-size: 13px;">{{$recruter}}</p>
                <hr>
                <h5><b>Hiring insights</b> </h5>
                <h6 style="font-size: 14px;"><b>Job activity</b> </h6>
                <ul id="card-text" style="font-size: 13px;">
                    <li>Posted {{$jobDetails->timeAgo}}</li>
                </ul>
            </div>
        </div>
</div>

