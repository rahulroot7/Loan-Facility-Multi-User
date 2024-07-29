<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/xeam-favicon.png') }}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/icons.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{asset('assets/colors/color1.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css') }}">
</head>

<body>
    <div class="login-img">
        <!-- GLOABAL LOADER -->
        <div id="global-loader" style="display: none;">
            <img src="{{ asset('img/loader.svg') }}" class="loader-img" alt="Loader">
        </div> <!-- /GLOABAL LOADER -->
        <!-- PAGE -->
        <div class="page">
            <div class="">
                <div class="container-login100">
                    <div class="wrap-login100 p-0">
                        <div class="card-header justify-content-center">
                            <div class="d-inline-block">
                                <img src="{{asset('assets/images/brand/loan_logo.png')}}" class="header-brand-img m-0" alt="Logo">
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @elseif(session()->has('error_attempt'))
                            <div class="alert alert-info alert-dismissible">
                                {{ session()->get('error_attempt') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <form method="POST" action="{{ route('auth.loginUser') }}" class="login100-form validate-form">
                                @csrf
                                <span class="login100-form-title"> Login </span>
                                <div class="wrap-input100 validate-input" data-bs-validate="Valid Employee Code is required">
                                    <input class="input100" type="email" name="email" placeholder="username/email">
                                    <span class="focus-input100"></span>
                                    <span class="symbol-input100"> <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="wrap-input100 validate-input" data-bs-validate="Password is required">
                                    <input class="input100" type="password" name="password" id="password" placeholder="Password"> <span class="focus-input100"></span> <span class="symbol-input100"> <i class="zmdi zmdi-lock" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="mb-0"><a href="{{ route('auth.forgetPassword') }}" class="text-primary ms-1">Forgot
                                            Password?</a></p>
                                </div>
                                <div class="container-login100-form-btn">
                                    <button type="submit" class="login100-form-btn btn-primary">
                                        Login
                                    </button>
                                </div>
                                {{-- <div class="text-center pt-3">
                                    <p class="text-dark mb-0">Not a member?<a href="register.html"
                                            class="text-primary ms-1">Create an Account</a></p>
                                </div> --}}
                            </form>
                        </div>

                    </div>
                </div> <!-- CONTAINER CLOSED -->
            </div>
        </div> <!-- End PAGE -->
    </div>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>