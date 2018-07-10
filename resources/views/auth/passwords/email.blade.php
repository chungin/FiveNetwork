<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1">
    <meta name="description"  content="Family Investment Exchange" />
    <meta name="author" content="DAO">
    <meta name="keywords"  content="Family Investment Exchange" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Family Investment Exchange | Reset Password</title>

    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon.png')}}">

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/dashboard/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('assets/dashboard/member/css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('assets/dashboard/member/css/colors/blue-dark.css')}}" id="theme" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/member/css/custom.css')}}">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<style type="text/css">

    @media (max-width: 767px){
        .login-register {
            position: relative;
            overflow: hidden;
        }
    }

    img.background {
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0px;
        top: 0px;
        /*z-index: -1;*/
        /*-webkit-filter: blur(5px);  Safari 6.0 - 9.0 
        filter: blur(5px);*/
        -webkit-filter: sepia(0.7);    
        filter: sepia(0.7);
    }

    .login-register{
        /*background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        height: 100%;
        width: 100%;
        padding: 5% 0;
        z-index: 100;
        position: fixed;*/
        /*background-image: url({{asset('assets/landing/img/background.jpg')}}) ;
        -webkit-filter: sepia(0.7);    
        filter: sepia(0.7);*/
        /*position: relative;*/
    }

    #particles-js{
        /*background-color: #2164fb;
        height: 100vh;
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100%;*/
    }

    .login-box{
        /*position: absolute;
        top: 60%;
        left: 50%;
        transform: translate(-50%,-60%);*/
    }

    #logo-box{
        /*top: 20%;
        position: absolute;
        left: 50%;
        transform: translate(-50%,-20%);*/
        margin: 0 auto;
        z-index: 1;
    }
</style>
<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register">
            <div>
                <img src="{{asset('assets/landing/img/background.jpg')}}" class="background">
            </div>

            <div class="row text-center">
                <a href="{{url('/')}}"  id="logo-box"><img src="{{asset('logo.png')}}" width="250" height="200"></a>
            </div>
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal"  action="{{ route('password.email') }}"  aria-label="{{ __('Reset Password') }}" method="POST">
                        @csrf
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>{{ __('Reset Password') }}</h3>
                                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <br><br>
                                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                @endif
                            
                            </div>
                        </div>
                        <br>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light">
                                    {{ __('Send Reset Link') }}
                                </button>
                            </div>
                            <br><br>
                            <div class="col-xs-12">
                                <a class="btn btn-inverse waves-effect waves-light" href="{{url('/login')}}">
                                    {{ __('Go Back To Login ') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- <div id="particles-js" style="background-color: #2164fb;height: 100vh;"></div> -->
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/dashboard/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('assets/dashboard/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('assets/dashboard/admin/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('assets/dashboard/admin/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('assets/dashboard/admin/js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{asset('assets/dashboard/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('assets/dashboard/admin/js/custom.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/dashboard/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
    <!-- <script src="{{asset('assets/dashboard/member/js/particles.js')}}"></script> -->
    <script type="text/javascript">
        // particlesJS.load('particles-js', "{{asset('assets/dashboard/member/particles.json')}}", function() {});
    </script>
</body>

</html>

