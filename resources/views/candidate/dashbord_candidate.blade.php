<div class="container">
    <link rel="stylesheet" href="/assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/bootstrap-5.0.2-dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <div class="shadow-C">
        <div class="logo-company">
            <img src="{{asset('/CandidateImage/'.$FindCand->img_url)}}" alt="logo" width="60%" height="60%"
                class="rounded-circle shadow" />
        </div>
        <h4 class="company-name"> Name</h4>
        <h4 class="company-name">job title</h4>
    </div>
    @php
    $route = \Illuminate\Support\Facades\Route::current();

    $routeName = $route->getName();
    @endphp

    {{-- Example usage --}}
    @if ($routeName === 'profile')
    {{-- Do something if the current route is named 'profile' --}}
    @endif

    <div class="background-link">
        <nav class="dashboard">
            <ul class="ul-company">
                <li class="link-company @if($routeName === 'candidateProfile') active @endif">
                    <a href="{{route('candidateProfile')}}">
                        <span><img src="/image/avatar.png" class="colorize" alt="avatar" width="15px"></span>&nbsp;
                        Profile
                    </a>
                </li>

                <li class="link-company @if($routeName === 'AppliedJob') active @endif">
                    <a href="{{route('AppliedJob')}}">
                        <span><img src="/image/brief3.png" class="colorize" alt="brief" width="15px"></span>&nbsp; Applied Jobs</a>
                </li>

                <li class="link-company @if($routeName === 'jobAlert') active @endif">
                    <a href="{{route('jobAlert')}}">
                        <span><img src="/image/bell.png" class="colorize" alt="bell" width="15px"></span>&nbsp;Job Alerts
                    </a>

                </li>

                <li class="link-company @if($routeName === 'cvManager') active @endif">
                    <a href="{{route('cvManager')}}"> <span><img src="/image/cv.png" class="colorize" alt="bell"
                                width="15px"></span>&nbsp;CV Manager</a>
                </li>

                <li class="link-company @if($routeName === 'change-passwordC') active @endif">
                    <a href="{{route('change-passwordC')}}"> <span><img src="/image/key.png" class="colorize" alt="bell"
                                width="15px"></span>&nbsp; Change Password</a>
                </li>

                <li class="link-company @if($routeName === 'logOutC') active @endif">
                    <a href="{{route('logOutC')}}"> <span><img src="/image/sign-out-option.png" class="colorize"
                                alt="bell" width="15px"></span>&nbsp;Log Out</a>
                </li>

            </ul>
        </nav>
    </div>
</div>
</div>