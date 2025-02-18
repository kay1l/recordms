<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Palompon Institute of Technology</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link rel="icon" href="{{ asset('./assets/img/pit.png') }}" type="image/x-icon">
    <link href="{{ asset('./assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('./assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('./assets/vendors/themify-icons/css/themify-icons.css') }}" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="{{ asset('./assets/css/pages/auth-light.css') }}" rel="stylesheet" />
    <style>
        .admin-img {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 10px;
        }

        .admin-img img {
            margin-bottom: 10px;
        }

        .content {
            margin-top: 100px;
            box-shadow: 0 0 15px 5px rgba(0, 0, 0, 0.1);

            
        }

        .extension-services {
            font-size: 18px;
            /* Adjust font size as needed */
            font-weight: bold;
            /* Makes the text bold */
            margin-top: 10px;
            /* Space between the sign-in text and extension services */
            color: #007bff;
            /* Change color as needed */
            font-family: 'Lobster', cursive; 
            /* You can change this to your preferred font */
            text-align: center;
            /* Center the text */
        }
    </style>
</head>
<style>
    .reset-link {
        margin-left: 5px;
    }
</style>

<body class="bg-silver-300">
    <div class="content">
        <div class="brand"></div>
        <form class="login-form" id="login-form" action="{{ route('index.login') }}" method="get">
            @csrf
            <div class="admin-img">
                <img src="{{ asset('./assets/img/pit.png') }}" width="80px" />
                <p class="text-muted" style="font-size: 15px !important;"> <b>Palompon Institute of Technology</b> </p>
                <p class="extension-services" style="font-size: 20px; font-weight: bold;">Extension Services</p>
                <p class="sign" style="font-size: 20px !important;"> <b>Sign in to your account</b> </p>
            </div>

            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    <input class="form-control" type="email" name="email" placeholder="Email" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
            </div>
            <div class="form-group d-flex justify-content-center">
                Forgot your password?
                <a class="reset-link" href="{{ route('password.request') }}">Reset Password</a>
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Login</button>
              
            </div>
            <div class="social-auth-hr">

            </div>

            <div class="text-center">Don't have an account?
                <a class="color-blue" href="{{ route('index.register') }}">Create an account</a>
            </div>
        </form>
    </div>
    <!-- BEGIN PAGE BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGE BACKDROPS-->
    <!-- CORE PLUGINS -->
    <script src="{{ asset('./assets/vendors/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('./assets/vendors/popper.js/dist/umd/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('./assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS -->
    <script src="{{ asset('./assets/vendors/jquery-validation/dist/jquery.validate.min.js') }}" type="text/javascript">
    </script>
    <!-- CORE SCRIPTS-->
    <script src="{{ asset('assets/js/app.js') }}" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
</body>

</html>
