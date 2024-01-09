<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/assets/style sign up.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>


</head>

<body>
    <div class="cont">
        <div class="form sign-in">
            <h2>Candidate Registration</h2>
            <form action="{{route('sign_up_store')}}" method="POST">
                @csrf
                <label>
                    <span>Name</span>
                    <input type="text" name="name">
                </label>
                <label>
                    <span>Email Address</span>
                    <input type="email" name="email">
                </label>
                <label>
                    <span>password</span>
                    <input type="password" name="password">
                </label>
                <label>
                    <span>confirm password</span>
                    <input type="password" name="confirm_pass">
                </label>
                <button class="submit" type="submit" name="sign_up_candidate">Sign Up now</button>
            </form>
        </div>

        <div class="sub-cont">
            <div class="img">
                <div class="img-text m-up">
                    <h2>new Recruter ?</h2>
                    <p>If you want to Sign up as a Recruter, Just click the Arrow bellow!</p>
                </div>
                <div class="img-text m-in">
                    <h2>New candidate?</h2>
                    <p>If you want to Sign up as a Candidate, Just click the Arrow bellow!</p>
                </div>
                <div class="img-btn">
                    <span class="m-up"><img src="img\left.png" alt="Arrow" width="50px"></span>
                    <span class="m-in"><img src="img\right.png" alt="Arrow" width="50px"></span>
                </div>
            </div>
            <div class="form sign-up">
                <h2>Recruter Registration</h2>
                <form action="{{route('sign_up_store')}}" method="POST">
                    @csrf
                    <label>
                        <span>Name</span>
                        <input type="text" name="nameR">
                    </label>
                    <label>
                        <span>Email</span>
                        <input type="email" name="emailR">
                    </label>
                    <label>
                        <span>Password</span>
                        <input type="password" name="passwordR">
                    </label>
                    <label>
                        <span>Confirm Password</span>
                        <input type="password" name="confirm_passR">
                    </label>
                    <button type="submit" class="submit" name="sign_up_recruter">Sign Up Now</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.querySelector('.img-btn').addEventListener('click', function () {
            document.querySelector('.cont').classList.toggle('s-signup')
        }
        );

    </script>
</body>

</html>