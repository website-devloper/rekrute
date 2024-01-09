
<nav class="navbar navbar-expand-lg navbar-light ">
        <div class="topnav container-fluid">
            <a href="/" class="logo"><img src="/image/logo1.png" alt="logo" width="150px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/" class="anchor" aria-current="page">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="/FindJobs" class="anchor" aria-current="page">Find Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a href="/FIndCandidates" class="anchor" aria-current="page">Find Candidates</a>
                    </li>
                </ul>
            </div>
            <a href="{{route('sign_in')}}" class="split">Login</a>
            <a href="{{route('sign_in')}}" class="split" id="Active">Register Now</a>
        </div>
    </nav>