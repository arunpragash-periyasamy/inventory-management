
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <meta name="description" content="Belgaum Plumbers" />
    <meta name="author" content="Arunpragash Annanperiasamy" />
    <title>Sign In</title>
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.png" />
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/fontawesome.min.css" />
    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="/assets/css/style.css" />
</head>

<body class="account-page">
    <form action="/" method="post">
        <div class="main-wrapper">
            <div class="account-content">
                <div class="login-wrapper">
                    <div class="login-content">
                        <div class="login-userset">
                            <div class="login-logo">
                                <img src="/assets/img/belgaum_plumbers/logo.png" alt="img" />
                            </div>
                            <div class="login-userheading">
                                <h3>Sign In</h3>
                                <h4>Please login to your account</h4>
                            </div>
                            <div class="form-login">
                                <label>Username</label>
                                <div class="form-addons">
                                    <input type="text" placeholder="Enter your username" name="user_name" />
                                    <img src="/assets/img/icons/mail.svg" alt="img" />
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" class="pass-input" placeholder="Enter your password"
                                        name="password" />
                                    <input type="password" class="pass-input" name="authenticate" value="user" hidden>
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                            <div class="form-login">
                                <div class="alreadyuser">
                                    <h4>
                                        <a href="forgetpassword.html" class="hover-a">Forgot Password?</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="form-login">
                                <button type="submit" class="btn btn-login">Sign in</button>
                            </div>
                        </div>
                    </div>
                    <div class="login-img">
                        <img src="/assets/img/login.jpg" alt="img" />
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="/assets/js/jquery-3.6.0.min.js"></script>

    <script src="/assets/js/feather.min.js"></script>

    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <script src="/assets/js/script.js"></script>
</body>

</html>