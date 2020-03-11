<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Yiro's Fitness Studio @yield('title')</title>

    <meta name="author" content="iThemesLab">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons -->
    <link rel="shortcut icon" href="images/logo/yirosNB.png">

    <!--All Css Here-->

    <!--Bootstrap Css-->
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap.min.css')}}">
    <!--revolution slider-->
    <link rel="stylesheet" href="{{asset('css/vendor/rev_slider/settings.css')}}">
    <link rel="stylesheet" href="{{asset('css/vendor/rev_slider/navigation.css')}}">
    <!--Font-Awesome Css-->
    <link rel="stylesheet" href="{{asset('css/vendor/font-awesome.min.css')}}">
    <!--flat-icon-->
    <link rel="stylesheet" href="{{asset('css/vendor/flaticon.css')}}">
    <!--Owl-Carousel Css-->
    <link rel="stylesheet" href="{{asset('css/vendor/owl.carousel.css')}}">
    <!--Animate Css-->
    <link rel="stylesheet" href="{{asset('css/vendor/animate.css')}}">
    <!--Animate Css-->
    <link rel="stylesheet" href="{{asset('css/vendor/magnific-popup.css')}}">
    <!--Jquery Ui Css-->
    <link rel="stylesheet" href="{{asset('css/vendor/jquery-ui.min.css')}}">
    <!--Style Css-->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!--Responsive Css-->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <link href="assets/css/yiros-style.css" rel="stylesheet" type="text/css" />
    <!--Modernizr Css-->
    <!--Modernizr Css-->
    <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>


    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>



    <!--preloader-->

    <!--preloader-->
    <!-- /.header start -->
        @include('template.navbar')
    <!--header end-->
        @yield('content')

    <!--main-container-->
    <footer>
        <section class="footer-area bg3 parallax overlay pt90">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                      <div class="news-info ftr-algn">
                          <div class="logoFooterPosition">
                              <img class="logoFooter" src="images/logo/yirosNB.png" style="display: block;max-height: 200px;" alt="BEFIT logo">
                          </div>
                          <div class="add-info" style="position: absolute; left: 80px; top: 90px;">
                              <p><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a>Bosques de Asia # 46-B, Colonia Bósques de Arágon</p>
                              <p><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>yiros-team@yirosfitness-studio.com</p>
                              <p class="mb-0"><a href="#"><i class="fa fa-mobile" aria-hidden="true"></i></a>+52-5565074337</p>
                          </div>
                      </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-12">
                        <div class="news-info ftr-algn">
                            <div class="footer-title footer-content">
                                <h3>keep pushing</h3>
                            </div>
                            <p> En Yiro's Fitness Studio estaremos a tu lado apoyándote y trabajando hombro con hombro, para que alcances tus objetivos.</p>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-12">
                        <div class="news-info open-hrs ftr-algn">
                            <div class="footer-title footer-content">
                                <h3>Horarios</h3>
                            </div>
                            <ul>
                                <li>Lunes <span>08:00 - 21:00</span></li>
                                <li>Martes <span>08:00 - 21:00</span></li>
                                <li>miércoles <span>08:00 - 21:00</span></li>
                                <li>jueves <span>08:00 - 21:00</span></li>
                                <li>viernes <span>08:00 - 21:00</span></li>
                                <li>sabado <span>08:00 - 11:00</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-12">
                        <div class="news-info ftr-algn">
                            <div class="footer-title footer-content">
                                <h3>mapa del sitio</h3>
                            </div>
                            <div >
                                <ul >
                                  <li><a href="{{route('/')}}" style="color:white;">Inicio</a></li>
                                  <li><a href="{{route('about')}}" style="color:white;">Acerca de</a></li>
                                  <li><a href="{{route('class')}}" style="color:white;">Clases</a></li>
                                  <li><a href="{{route('membership')}}" style="color:white;">Membresías</a></li>
                                  <li><a href="{{route('schedule')}}" style="color:white;">Horarios</a></li>
                                  <!--<li><a href="{{route('diet')}}" style="color:white;">Dietas</a></li>
                                  <li><a href="{{route('store')}}" style="color:white;">Tiendas</a></li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <!--<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="instra pad60">
                            <h4><span>instragram</span></h4>
                        </div>
                    </div>
                    <!-- /.col -->
                <!--</div>-->
                <!-- /.row -->
            </div>
            <!--/.container-->
        </section>
        <!--footer-gallery start-->
        <!--<div class="footer-gallery owl-carousel">
            <div class="item active"><a href="images/instagram/big1.jpg">
                <img src="images/instagram/1.jpg"  alt="Instragram img"><i class="fa fa-search"></i></a>
            </div>
            <div class="item "><a href="images/instagram/big2.jpg">
                <img src="images/instagram/2.jpg"  alt="Instragram img"><i class="fa fa-search"></i></a>
            </div>
            <div class="item"> <a href="images/instagram/big3.jpg">
                <img src="images/instagram/3.jpg"  alt="Instragram img"><i class="fa fa-search"></i></a>
            </div>
            <div class="item"> <a href="images/instagram/big4.jpg">
                <img src="images/instagram/4.jpg"  alt="Instragram img"><i class="fa fa-search"></i></a>
            </div>
            <div class="item"> <a href="images/instagram/big5.jpg">
                <img src="images/instagram/5.jpg"  alt="Instragram img"><i class="fa fa-search"></i></a>
            </div>
            <div class="item"> <a href="images/instagram/big6.jpg">
                <img src="images/instagram/6.jpg"  alt="Instragram img"><i class="fa fa-search"></i></a>
            </div>
            <div class="item"> <a href="images/instagram/big4.jpg">
                <img src="images/instagram/4.jpg"  alt="Instragram img"><i class="fa fa-search"></i></a>
            </div>
            <div class="item"> <a href="images/instagram/big5.jpg">
                <img src="images/instagram/5.jpg"  alt="Instragram img"><i class="fa fa-search"></i></a>
            </div>
            <div class="item"> <a href="images/instagram/big6.jpg">
                <img src="images/instagram/6.jpg"  alt="Instragram img"><i class="fa fa-search"></i></a>
            </div>
        </div>-->
        <!--footer-gallery end-->
        <div class="copyright pad30">
            <h4>Copyright © <span>Yiro's Fitness Studio.</span> Todos los derechos reservados</h4>
        </div>
    </footer>



    <!--All Js Here-->
    <!-- jquery latest version -->
    <script src="{{asset('js/vendor/jquery-3.2.1.min.js')}}"></script>
    <!--Migrate Js-->
    <script src="{{asset('js/vendor/jquery-migrate.js')}}"></script>
    <!--Popper Js-->
    <script src="{{asset('js/vendor/popper-1.12.3.min.js')}}"></script>
    <!--Bootstrap Js-->
    <script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>
    <!--Owl-Carousel Js-->
    <script src="{{asset('js/vendor/owl.carousel.min.js')}}"></script>
    <!--counter Js-->
    <script src="{{asset('js/vendor/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('js/vendor/waypoints-jquery.js')}}"></script>
    <!--Isotop Js-->
    <script src="{{asset('js/vendor/isotope.pkgd.min.js')}}"></script>
    <!-- revolution slider js files start -->
    <script src="{{asset('js/vendor/rev_slider/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('js/vendor/rev_slider/jquery.themepunch.revolution.min.js')}}"></script>

    <script src="{{asset('js/vendor/rev_slider/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{asset('js/vendor/rev_slider/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script src="{{asset('js/vendor/rev_slider/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{asset('js/vendor/rev_slider/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{asset('js/vendor/rev_slider/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{asset('js/vendor/rev_slider/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{asset('js/vendor/rev_slider/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script src="{{asset('js/vendor/rev_slider/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{asset('js/vendor/rev_slider/extensions/revolution.extension.video.min.js')}}"></script>

    <script type="text/javascript">
        function setREVStartSize(e) {
            try {
                var i = jQuery(window).width(),
                    t = 9999,
                    r = 0,
                    n = 0,
                    l = 0,
                    f = 0,
                    s = 0,
                    h = 0;
                if (e.responsiveLevels && (jQuery.each(e.responsiveLevels, function(e, f) {
                        f > i && (t = r = f, l = e), i > f && f > r && (r = f, n = e)
                    }), t > r && (l = n)), f = e.gridheight[l] || e.gridheight[0] || e.gridheight, s = e.gridwidth[l] || e.gridwidth[0] || e.gridwidth, h = i / s, h = h > 1 ? 1 : h, f = Math.round(h * f), "fullscreen" == e.sliderLayout) {
                    var u = (e.c.width(), jQuery(window).height());
                    if (void 0 != e.fullScreenOffsetContainer) {
                        var c = e.fullScreenOffsetContainer.split(",");
                        if (c) jQuery.each(c, function(e, i) {
                            u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u
                        }), e.fullScreenOffset.split("%").length > 1 && void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 ? u -= jQuery(window).height() * parseInt(e.fullScreenOffset, 0) / 100 : void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 && (u -= parseInt(e.fullScreenOffset, 0))
                    }
                    f = u
                } else void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
                e.c.closest(".rev_slider_wrapper").css({
                    height: f
                })
            } catch (d) {
                console.log("Failure at Presize of Slider:" + d)
            }
        };

    </script>

    <!--magnific popup Js-->
    <script src="{{asset('js/vendor/jquery.magnific-popup.min.js')}}"></script>
    <!--scrollUp js-->
    <script src="{{asset('js/vendor/jquery.scrollUp.js')}}"></script>
    <!--Jquery Ui Js-->
    <script src="{{asset('js/vendor/jquery-ui.min.js')}}"></script>
    <!--Wow Js-->
    <script src="{{asset('js/vendor/wow.min.js')}}"></script>

    <!-- template main js file -->
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>
