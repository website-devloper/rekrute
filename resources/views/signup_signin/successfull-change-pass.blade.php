<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>New Password</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/style forgot.css">
    <link rel="stylesheet" href="assets/style login.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/js/bootstrap.min.js">
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