<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>New Password</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
    @vite(['resources/css/style-forgot.css', 'resources/css/style-login.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="forgot-password.php" method="POST" autocomplete="">
                    <h2>Your password changed !</h2>
                    <p class="text-center" style="text-align: center;">Now you can Login with your New Password</p>
                    <div class="form-group">
                        <a href="/sign_in" style="text-decoration: none; border: none;"> <input class="form-control button" type="button"
                                name="back-to-login" value="Login now"></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>