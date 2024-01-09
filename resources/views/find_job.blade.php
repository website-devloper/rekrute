<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./find_job.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300&family=Lato&family=League+Spartan:wght@200&family=Roboto:wght@100&family=Rubik:wght@500&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bootstrap-5.0.2-dist/js/bootstrap.min.js">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="topnav container-fluid">
            <a href="../index.html" class="logo"><img src="../image/logo1.png" alt="logo" width="150px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="../index.html" class="anchor" aria-current="page">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="../index.html" class="anchor" aria-current="page">Find Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a href="../index.html" class="anchor" aria-current="page">Find Candidates</a>
                    </li>
                </ul>
            </div>
            <a href="../signup_signin/sign_in.html" class="split">Login</a>
            <a href="../signup_signin/sign_up.html" class="split" id="Active">Register Now</a>
        </div>
    </nav>
    <div class="container">
        <h1 class="text-center header">Get The <span style="color: #4540DB;">Right Job </span><br>You Deserve</h1>
        <div class="cont">
            <div class="search">
                <div class="row">
                    <div class="col-md-6">
                        <div class="search-1"> <img src="../image/search.png" alt="search"> <input type="text"
                                placeholder="Search Title or Keyword">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <div class="search-2"> <img src="../image/location.png" alt="Location"> <input type="text"
                                    placeholder="Search Location"> <button>Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
<hr>
<div id="container">
    <h2 id="font">200 Jobs found</h2>
    <div>
       <p>Sort by freshness</p> 
       <select name="sortbyfresh">
        <option value="L2Mo">Last 2 Months</option>
        <option value="LMo">Last Months</option>
        <option value="LWe">Last Week</option>
        <option value="L3D">Last 3 days</option>
       </select>
    </div>
</div>
</body>

</html>