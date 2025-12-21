<!DOCTYPE html>
<html>

<head>
    <title>Sign In</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/style-login.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="cont">
        <div class="form sign-in">
            <form action="{{route('sign_in_store')}}" method="POST">
              @csrf
                <h2>Sign In</h2>
                @if($errors->any())
                    <div style="color: #dc3545; background: #f8d7da; padding: 0.75rem; border-radius: 0.5rem; margin-bottom: 1rem; font-size: 0.9rem;">
                        <ul style="margin: 0; padding-left: 1.25rem;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <label>
                    <span>Email Address</span>
                    <input type="email" name="email">
                </label>
                <label>
                    <span>Password</span>
                    <input type="password" name="password">
                </label>
                <button class="submit" type="submit">Sign In</button>

                <a href="{{ route('forgot_password') }}" class="link_forget_pass">
                    <p class="forgot-pass">Forgot Password ?</p>
                </a>
        </div>
        </form>


        <div class="sub-cont">
            <div class="img">
                <div class="img-text m-up">
                    <h2>New here?</h2>
                    <p>Sign up and discover great amount of new opportunities!</p>
                </div>
                <div class="img-text m-in">
                    <h2>One of us?</h2>
                    <p>If you already has an account, just sign in. We've missed you!</p>
                </div>
                <div class="img-btn">
                    <span class="m-up">Sign Up</span>

                </div>
            </div>
            <div class="form sign-up">
                <h2>Sign Up</h2>
                <label>
                    <span>Name</span>
                    <input type="text">
                </label>
                <label>
                    <span>Email</span>
                    <input type="email">
                </label>
                <label>
                    <span>Password</span>
                    <input type="password">
                </label>
                <label>
                    <span>Confirm Password</span>
                    <input type="password">
                </label>
                <button type="button" class="submit">Sign Up Now</button>
            </div>
        </div>
    </div>
    <script>
        document.querySelector('.img-btn').addEventListener('click', function () {
            window.location = "/sign_up";
        }
        );
    </script>
</body>

</html>