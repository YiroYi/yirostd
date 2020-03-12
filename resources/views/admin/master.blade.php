<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="SmartUniversity" />
    <title>Yiro's | iFitness</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
	<!--bootstrap -->
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/summernote/summernote.css" rel="stylesheet">
    <!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="assets/plugins/material/material.min.css">
	<link rel="stylesheet" href="assets/css/material_style.css">
	<!-- animation -->
	  <link href="assets/css/pages/animate_page.css" rel="stylesheet">
	<!-- inbox style -->
    <link href="assets/css/pages/inbox.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/yiros-style.css" rel="stylesheet" type="text/css" />
	<!-- Theme Styles -->

    <link href="assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/theme-color.css" rel="stylesheet" type="text/css" />
	<!-- favicon -->
    <link rel="shortcut icon" href="images/logo/yirosNB.png">
 </head>
 <!-- END HEAD -->
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-sidebar-color logo-dark">
  <div id="app">
    <div class="page-wrapper">
        <!-- start header -->
        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <!-- logo start -->
                <div class="page-logo">
                    <a href="index.html">

                    <span class="logo-default" >iFitness</span> </a>
                </div>
                <!-- logo end -->
      				<ul class="nav navbar-nav navbar-left in">
      					<li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
      				</ul>

                <!-- start mobile menu -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
               <!-- end mobile menu -->
                <!-- start header menu -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                    	<!-- start language menu -->

                        <!-- end language menu -->
 						<!-- start manage user dropdown -->
             						   <li class="dropdown dropdown-user">
                                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                            <span class="username username-hide-on-mobile"> {{ Auth::user()->name}} </span>
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-default animated jello">
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form'.submit();)">
                                                <i class="icon-logout"></i> Log Out </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                                                  @csrf
                                                </form>
                                            </li>
                                        </ul>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
          <!-- end header -->
          <!-- start color quick setting -->
          <div class="quick-setting-main">
      			<button class="control-sidebar-btn btn" data-toggle="control-sidebar"><i class="fa fa-cog fa-spin"></i></button>
        			<div class="quick-setting display-none">
        				<ul id="themecolors" >
                				<li><p class="selector-title">Sidebar Color</p></li>
                				<li class="complete">
                          <div class="theme-color sidebar-theme">
                      				<a href="#" data-theme="white"><span class="head"></span><span class="cont"></span></a>
                      				<a href="#" data-theme="dark"><span class="head"></span><span class="cont"></span></a>
                      				<a href="#" data-theme="blue"><span class="head"></span><span class="cont"></span></a>
                      				<a href="#" data-theme="indigo"><span class="head"></span><span class="cont"></span></a>
                      				<a href="#" data-theme="cyan"><span class="head"></span><span class="cont"></span></a>
                      				<a href="#" data-theme="green"><span class="head"></span><span class="cont"></span></a>
                      				<a href="#" data-theme="red"><span class="head"></span><span class="cont"></span></a>
                				   </div>
                      </li>
                     	<li><p class="selector-title">Header Brand color</p></li>
                     	<li class="theme-option">
                        <div class="theme-color logo-theme">
                     	    <a href="#" data-theme="logo-white"><span class="head"></span><span class="cont"></span></a>
                  				<a href="#" data-theme="logo-dark"><span class="head"></span><span class="cont"></span></a>
                  				<a href="#" data-theme="logo-blue"><span class="head"></span><span class="cont"></span></a>
                  				<a href="#" data-theme="logo-indigo"><span class="head"></span><span class="cont"></span></a>
                  				<a href="#" data-theme="logo-cyan"><span class="head"></span><span class="cont"></span></a>
                  				<a href="#" data-theme="logo-green"><span class="head"></span><span class="cont"></span></a>
                  				<a href="#" data-theme="logo-red"><span class="head"></span><span class="cont"></span></a>
                     	</div>
                    </li>
                     	<li><p class="selector-title">Header color</p></li>
                       	<li class="theme-option">
                          <div class="theme-color header-theme">
                           	<a href="#" data-theme="header-white"><span class="head"></span><span class="cont"></span></a>
                           	<a href="#" data-theme="header-dark"><span class="head"></span><span class="cont"></span></a>
                           	<a href="#" data-theme="header-blue"><span class="head"></span><span class="cont"></span></a>
                           	<a href="#" data-theme="header-indigo"><span class="head"></span><span class="cont"></span></a>
                           	<a href="#" data-theme="header-cyan"><span class="head"></span><span class="cont"></span></a>
                           	<a href="#" data-theme="header-green"><span class="head"></span><span class="cont"></span></a>
                           	<a href="#" data-theme="header-red"><span class="head"></span><span class="cont"></span></a>
                       	</div>
                      </li>
        			       </ul>
        			    </div>
    		    </div>
    		    <!-- end color quick setting -->
            <!-- start page container -->
            <div class="page-container">
     			      <!-- start sidebar menu -->

                @if(Auth::check())
                  @if(Auth::user()->idrol == 1)
                    @include('template.adminSidebar')
                  @elseif(Auth::user()->idrol == 2)
                    @include('template.opsManagerSidebar')
                  @endif
                @endif

                <!-- end sidebar menu -->

    			         @yield('content')
              
            </div>
          </div>
        </div>
        <!-- start footer -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2020 &copy; iFitness By
            <a href="#" target="_top" class="makerCss">网艺龙软件公司</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- end footer -->

    <!-- start js include path -->
    <script src="{{asset('js/app.js')}}"></script>
    <script src="assets/plugins/jquery/jquery.min.js" ></script>
    <script src="assets/plugins/popper/popper.min.js" ></script>
    <script src="assets/plugins/jquery-blockui/jquery.blockui.min.js" ></script>
	  <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- bootstrap -->
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" ></script>
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js" ></script>
	  <script src="assets/js/pages/sparkline/sparkline-data.js" ></script>
    <!-- Common js-->
  	<script src="assets/js/app.js" ></script>
    <script src="assets/js/sweetalert2.all.js" ></script>
    <script src="assets/js/layout.js" ></script>
    <script src="assets/js/theme-color.js" ></script>
    <!-- material -->
    <script src="assets/plugins/material/material.min.js"></script>
    <!-- animation -->
    <script src="assets/js/pages/ui/animations.js" ></script>

    <script src="assets/plugins/summernote/summernote.min.js" ></script>
    <script src="assets/js/pages/summernote/summernote-data.js" ></script>
    <!-- end js include path -->
  </body>
</html>
