<!DOCTYPE html>
<html class="no-js">
    <head>
        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="icon" href="favicon.ico">
        <title>Content Management System</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
        <!-- Template CSS Files
        ================================================== -->
        <!-- Twitter Bootstrs CSS -->
        <link rel="stylesheet" href="{{ asset('user/plugins/bootstrap/bootstrap.min.css')}}">
        <!-- Ionicons Fonts Css -->
        <link rel="stylesheet" href="{{ asset('user/plugins/ionicons/ionicons.min.css')}}">
        <!-- animate css -->
        <link rel="stylesheet" href="{{ asset('user/plugins/animate-css/animate.css')}}">
        <!-- Hero area slider css-->
        <link rel="stylesheet" href="{{ asset('user/plugins/slider/slider.css')}}">
        <!-- owl craousel css -->
        <link rel="stylesheet" href="{{ asset('user/plugins/owl-carousel/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{ asset('user/plugins/owl-carousel/owl.theme.css')}}">
        <!-- Fancybox -->
        <link rel="stylesheet" href="{{ asset('user/plugins/facncybox/jquery.fancybox.css')}}">
        <!-- template main css file -->
        <link rel="stylesheet" href="{{ asset('user/css/style.css')}}">
    </head>
    <body>


        <!--
        ==================================================
        Header Section Start
        ================================================== -->
        <header id="top-bar" class="navbar-fixed-top animated-header">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <!-- /responsive nav button -->
                    
                    <!-- logo -->
                    <div class="navbar-brand">
                        <a href="/" >
                            <img src="{{asset('images/laravel-logo.jpg')}}" style="height: 50px; width: 120px; " alt="">
                        </a>
                    </div>
                    <!-- /logo -->
                </div>
                <!-- main menu -->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <div class="main-menu">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="{{url('/')}}" >Home</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- /main nav -->
            </div>
        </header>
        

<section>

    @yield('content')

</section>
            <!--
            ==================================================
            Footer Section Start
            ================================================== -->
            <footer id="footer">
                <div class="container">
                    <div class="col-md-8">
                        <p class="copyright">Copyright: <span><script>document.write(new Date().getFullYear())</script></span> Design and Developed by <a href="http://www.Themefisher.com" target="_blank">Themefisher</a>. <br> 
                            Get More 
                            <a href="https://themefisher.com/free-bootstrap-templates/" target="_blank">
                                Free Bootstrap Templates
                            </a>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <!-- Social Media -->
                        <ul class="social">
                            <li>
                                <a href="http://wwww.fb.com/themefisher" class="Facebook">
                                    <i class="ion-social-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="http://wwww.twitter.com/themefisher" class="Twitter">
                                    <i class="ion-social-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="Linkedin">
                                    <i class="ion-social-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="http://wwww.fb.com/themefisher" class="Google Plus">
                                    <i class="ion-social-googleplus"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer> <!-- /#footer -->

	<!-- Template Javascript Files
	================================================== -->
	<!-- jquery -->
	<script src="{{ asset('user/plugins/jQurey/jquery.min.js')}}"></script>
	<!-- Form Validation -->
    <script src="{{ asset('user/plugins/form-validation/jquery.form.js')}}"></script> 
    <script src="{{ asset('user/plugins/form-validation/jquery.validate.min.js')}}"></script>
	<!-- owl carouserl js -->
	<script src="{{ asset('user/plugins/owl-carousel/owl.carousel.min.js')}}"></script>
	<!-- bootstrap js -->
	<script src="{{ asset('user/plugins/bootstrap/bootstrap.min.js')}}"></script>
	<!-- wow js -->
	<script src="{{ asset('user/plugins/wow-js/wow.min.js')}}"></script>
	<!-- slider js -->
	<script src="{{ asset('user/plugins/slider/slider.js')}}"></script>
	<!-- Fancybox -->
	<script src="{{ asset('user/plugins/facncybox/jquery.fancybox.js')}}"></script>
	<!-- template main js -->
    <script src="{{ asset('user/js/main.js')}}"></script>
    <script>
        function balasKomentar(id, title) {
            $('#formReplyComment').show();
            $('#parent_id').val(id)
            $('#replyComment').val(title)
        }
    </script>
 	</body>
</html>