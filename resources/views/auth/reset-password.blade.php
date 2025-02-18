    {{-- <x-guest-layout>
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Reset Password') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout> --}}


    <!DOCTYPE html>
    <html>
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Palompon Institute of Technology - Reset Password</title>
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
        </style>
    </head>
    
    <body class="bg-silver-300">
        <div class="content">
            <div class="brand"></div>
            <form id="register-form" method="POST" action="{{ route('password.store') }}">
                @csrf
    
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
    
                <div class="admin-img">
                    <img src="{{ asset('./assets/img/pit.png') }}" width="80px" />
                    <p class="text-muted" style="font-size: 15px !important;"><b>Palompon Institute of Technology</b></p>
                    <p class="sign" style="font-size: 20px !important;"> <b>Reset your password</b> </p>
                </div>
    
                <!-- Email Address -->
                <div class="form-group">
                    <x-input-label for="email" :value="__('Email')" />
                    <div class="input-group-icon right">
                        <div class="input-icon"><i class="fa fa-envelope"></i></div>
                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 help-block text-danger" />
                </div>
    
                <!-- Password -->
                <div class="form-group mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <div class="input-group-icon right">
                        <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                        <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 help-block text-danger" />
                </div>
    
                <!-- Confirm Password -->
                <div class="form-group mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <div class="input-group-icon right">
                        <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                        <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 help-block text-danger" />
                </div>
    
                <div class="form-group mt-4">
                    <button class="btn btn-info btn-block" type="submit">{{ __('Reset Password') }}</button>
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
        {{-- <script type="text/javascript">
            $(function() {
                $('#register-form').validate({
                    errorClass: "help-block",
                    rules: {
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
        </script> --}}
    </body>
    
    </html>
    