
<!DOCTYPE html>
<html class=" ">
<head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>Webadmin :Reset Password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <link rel="shortcut icon" href="{{asset('backend/assets/shilpi-img/cropped-cropped-invest-logo-07-32x32.png')}}" type="image/x-icon" />  
        <link href="{{asset('backend/assets/plugins/pace/pace-theme-flash.css')}}" rel="stylesheet" type="text/css" media="screen"/>
        <link href="{{asset('backend/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('backend/assets/plugins/bootstrap/css/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('backend/assets/fonts/font-awesome/css/font-awesome.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('backend/assets/css/animate.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css"/>
       
        <link href="{{asset('backend/assets/plugins/icheck/skins/square/orange.css')}}" rel="stylesheet" type="text/css" media="screen"/>      
        <link href="{{asset('backend/assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('backend/assets/css/responsive.css')}}" rel="stylesheet" type="text/css"/>
    </head>
    <body class=" login_page">
    <div class="overlay mobile-overlay"></div>
        <div class="login-wrapper">
            <div id="login" class="login loginpage col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-0 col-xs-12">
                <h1><a href="{{ route('login')}}" title="Login Page" tabindex="-1">Admin</a></h1>
                @if($errors->any())
                <br><div class="alert alert-danger">
                    <p><strong>Opps Something went wrong</strong></p>
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
                @if(session()->has('error'))
                <br><div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
                @endif
                <form action="{{ route('reset.password.post') }}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <p>
                        <label for="user_login">Enter Email id<br />
                            <input type="email" name="email" placeholder="Enter registered email" class="input"/></label>
                    </p>
                    <p>
                        <label for="user_login">Enter Password<br />
                            <input type="password" name="password" placeholder="Enter password" class="input"/></label>
                    </p>
                    
                    <p>
                        <label for="user_login">Enter Confirm Password <br />
                            <input type="password" name="password_confirmation" placeholder="Enter confirm password" class="input"/></label>
                    </p>
                    
                    
                    <p class="submit">
                        <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-orange btn-block" value="Submit" />
                    </p>
                </form>

                <p id="nav">
                    <a class="pull-right" href="{{ route('login') }}" title="Go to Login">Go to Login</a>
                </p>


            </div>
        </div>





        <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->


        <!-- CORE JS FRAMEWORK - START --> 
        <script src="assets/js/jquery-1.11.2.min.js" type="text/javascript"></script> 
        <script src="assets/js/jquery.easing.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
        <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>  
        <!-- CORE JS FRAMEWORK - END --> 


        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script src="assets/plugins/icheck/icheck.min.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE TEMPLATE JS - START --> 
        <script src="assets/js/scripts.js" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 

        <!-- Sidebar Graph - START --> 
        <script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="assets/js/chart-sparkline.js" type="text/javascript"></script>
        <!-- Sidebar Graph - END --> 













        
    </body>


</html>



