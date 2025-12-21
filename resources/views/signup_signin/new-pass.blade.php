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
                    <h2>New Password</h2>
                    <p class="text-center">Please create a New Password that you d'ont ue on any other site</p>
                    <div>
                        <label>
                            <span>Create new password </span>
                            <input type="password" name="password">
                        </label>
                        <label>
                            <span>confirm your password</span>
                            <input type="password" name="password">
                        </label>
                    </div>
                    <div class="form-group">
                        <a href="/successfull-change-pass" style="text-decoration: none; border: none;"> <input class="form-control button" type="button"
                                name="change-password" value="Change"></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>