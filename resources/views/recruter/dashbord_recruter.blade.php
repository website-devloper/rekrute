<div class="container">
    <link rel="stylesheet" href="/assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="/assets/bootstrap-5.0.2-dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <div class="shadow-C">
        <div class="logo-company">
            <img src="{{ asset('/images/'.$FindEmp->logo_url) }}" alt="" width="60%" height="60%" class="rounded-circle shadow" />
        </div>
        <h4 class="company-name">Company Name</h4>
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
    <li class="link-company @if($routeName === 'profile') active @endif">
        <a href="{{ route('profile') }}">
            <span><img src="/image/avatar.png" class="colorize"  alt="avatar" width="15px"></span>&nbsp; Company Profile
        </a>
    </li>
    <li class="link-company @if($routeName === 'post-job') active @endif">
        <a href="{{ route('post-job') }}">
            <span><img src="/image/post.png" class="colorize" alt="post" width="15px"></span>&nbsp; Post A Job
        </a>
    </li>
    <li class="link-company @if($routeName === 'manage-jobs') active @endif">
        <a href="{{ route('manage-jobs') }}">
            <span><img src="/image/brief3.png" class="colorize" alt="brief" width="15px"></span>&nbsp; Manage jobs
        </a>
    </li>
    <li class="link-company @if($routeName === 'resume') active @endif">
        <a href="{{ route('resume') }}">
            <span><img src="/image/cv.png" class="colorize" alt="cv" width="15px"></span>&nbsp; Resume
        </a>
    </li>
    <li class="link-company @if($routeName === 'change-password') active @endif">
        <a href="{{ route('change-password') }}">
            <span><img src="/image/key.png" class="colorize" alt="key" width="15px"></span>&nbsp; Change Password
        </a>
    </li>
    <li class="link-company @if($routeName === 'logOut') active @endif">
        <a href="{{ route('logOut') }}">
            <span><img src="/image/sign-out-option.png" class="colorize" alt="logout" width="15px"></span>&nbsp; Log Out
        </a>
    </li>
</ul>

        </nav>
    </div>
</div>
