<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palompon Institute of Technology - Register</title>
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

<body class="bg-silver-300">
    <div class="content">
        <div class="brand"></div>
        <form  id="register-form" action="{{ route('register.new') }}" method="post">
            @csrf
            <div class="admin-img">
                <img src="{{ asset('./assets/img/pit.png') }}" width="80px" />
                <p class="text-muted" style="font-size: 15px !important;"><b>Palompon Institute of Technology</b></p>
                <p class="extension-services" style="font-size: 20px; font-weight: bold;">Extension Services</p>
                <p class="sign" style="font-size: 20px !important;"> <b>Create a personal account</b> </p>
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                    <input class="form-control" type="text" name="name" placeholder="Name" autocomplete="off" value="{{ old('name') }}">
                </div>
                @if ($errors->has('name'))
                    <span class="help-block text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    <input class="form-control" type="email" name="email" placeholder="Email" autocomplete="off" value="{{ old('email') }}">
                </div>
                @if ($errors->has('email'))
                    <span class="help-block text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
                @if ($errors->has('password'))
                    <span class="help-block text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
                </div>
                @if ($errors->has('password_confirmation'))
                    <span class="help-block text-danger">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-university"></i></div>
                    <select class="form-control" name="college">
                        <option value="" selected>Select College (Optional)</option>
                        @foreach($colleges as $college)
                            <option value="{{ $college->collegeCode }}" {{ old('college') == $college->collegeCode ? 'selected' : '' }}>
                                {{ $college->collegeName }}
                            </option>
                        @endforeach
                    </select>                   
                </div>
                @if ($errors->has('college'))
                    <span class="help-block text-danger">{{ $errors->first('college') }}</span>
                @endif
            </div>
            
            
            <div class="form-group d-flex justify-content-center align-items-center text-center">
                <p class="mb-3">
                    By signing up, you agree to our
                    <a target="_blank" href="" class="font-weight-bold text-primary-500">Terms of Service</a>
                    and
                    <a target="_blank" href="" class="font-weight-bold text-primary-500">Privacy Policy</a>.
                    </p>
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit">Register</button>
            </div>
            <div class="text-center">Already a member?
                <a class="color-blue" href="{{ route('login') }}">Login</a>
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
    <script src="{{ asset('./assets/vendors/jquery-validation/dist/jquery.validate.min.js') }}" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{ asset('assets/js/app.js') }}" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function () {
            $('#register-form').validate({
                errorClass: "help-block",
                rules: {
                    name: {
                        required: true,
                        minlength: 3
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: "[name='password']"
                    },
                    college: {
                        // Add this rule
                        required: false, // Not required, allows null or empty string
                    }
                },
                highlight: function (e) {
                    $(e).closest(".form-group").addClass("has-error");
                },
                unhighlight: function (e) {
                    $(e).closest(".form-group").removeClass("has-error");
                },
            });
        });
    </script>
    
</body>

</html>




