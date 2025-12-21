<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
    @vite(['resources/css/style-forgot.css', 'resources/css/style-login.css', 'resources/js/app.js'])
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 form">
            <form action="forgot-password.php" method="POST" autocomplete="">
                <h2>Forgot Password</h2>
                <div class="text-center">
                    <p>Enter your email address</p>
                </div>
                <div>
                    <label>
                        <span>Email Address</span>
                        <input  type="email" name="email" >
                    </label>
                </div>
                <div class="form-group">
                    <a href="/code_verification" style="text-decoration: none; border: none;" >
                        <input class="form-control button" type="button" name="check-email" value="Continue" >
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


</body>
</html>