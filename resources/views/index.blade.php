<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Melody</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="nebra/img/music.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="nebra/css/bootstrap.min.css">
    <link rel="stylesheet" href="nebra/css/owl.carousel.min.css">
    <link rel="stylesheet" href="nebra/css/magnific-popup.css">
    <link rel="stylesheet" href="nebra/css/font-awesome.min.css">
    <link rel="stylesheet" href="nebra/css/themify-icons.css">
    <link rel="stylesheet" href="nebra/css/nice-select.css">
    <link rel="stylesheet" href="nebra/css/audioplayer.css">
    <link rel="stylesheet" href="nebra/css/flaticon.css">
    <link rel="stylesheet" href="nebra/css/gijgo.css">
    <link rel="stylesheet" href="nebra/css/animate.css">
    <link rel="stylesheet" href="nebra/css/slick.css">
    <link rel="stylesheet" href="nebra/css/slicknav.css">
    <link rel="stylesheet" href="nebra/css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">

                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a class="active" href="{{ url('index') }}">Početna</a></li>
                                            <li><a href="{{ url('about') }}">O nama</a></li>
                                            <li><a href="{{ url('contact') }}">Kontakt</a></li>
                                            <li><a href="doc/Vizija.pdf" target="_blank">Vizija</a></li>

                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="social_icon text-right">
                                    <ul>
                                        <li><a href="https://github.com/Nebra98/Melody.git" target="_blank"> <i class="fa fa-github"></i> </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1 overlay2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider_text text-center ">
                            <h3>Melody </h3>
                            @guest
                            <a class="btn btn-danger" href="{{ route('login') }}" role="button">Prijavi se</a>
                            <a class="btn btn-danger" href="{{ route('register') }}" role="button">Registriraj se</a>
                            @endguest
                            @auth
                            <li style="color:white; font-size: 20px;" class="nav-item dropdown">
                                Prijavljeni ste kao <a id="navbarDropdown" style="color:white; font-size: 20px;" class="brane" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                     {{ Auth::user()->name }}<span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Odjavite se') }}
                                    </a>

                                    @can('manage-users')
                                        <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                                            Upravljajte korisnicima
                                        </a>


                                    @endcan

                                    @can('for-users')

                                        <a class="dropdown-item" href="{{ route('management.show',Auth::user()) }}">
                                            Upravljajte albumima
                                        </a>

                                        <a class="dropdown-item" href="{{ route('home') }}">
                                            Popis albuma
                                        </a>

                                        <a class="dropdown-item" href="{{ route('profile.show',Auth::user()) }}">
                                            Profil
                                        </a>

                                    @endcan

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                                @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->



    <!-- music_area  -->
    <div class="music_area music_gallery">
        <div class="container">
                <div class="row">
                        <div class="col-xl-12">
                            <div class="section_title text-center mb-65">
                                <h3>Objave korisnika</h3>
                            </div>
                        </div>
                    </div>

            @php($count=0)
            @foreach($photos as $photo)
            <div class="row align-items-center justify-content-center mb-20">
                <div class="col-xl-10">
                    <div class="row align-items-center">
                                <div class="col-xl-9 col-md-9">
                                    <div class="music_field">
                                            <div class="thumb">
                                                    <img src="/uploads/songs_and_cover_images/{{ $photo->coverImage }}" width="200" height="150" alt="">
                                                </div>
                                                <div class="audio_name">
                                                    <div class="name">
                                                        <h5>{{++$count}}. {{$photo->artistName}} - {{$photo->songName}}</h5>


                                                    </div>
                                                    <audio preload="auto" controls>
                                                        <source src="/uploads/songs_and_cover_images/{{ $photo->songFile }}">
                                                    </audio>
                                                </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-3">
                                    <div class="music_btn">
                                            <a href="{{ route('index.show', $photo->album_id)}}" class="btn btn-outline-danger">Pogledaj album</a>
                                    </div>
                                </div>
                    </div>
                </div>

            </div>
            @endforeach



        </div>
    </div>
    <!-- music_area end  -->





    <!-- footer start -->
    <footer class="footer">

        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-7 col-md-6">
                        <p class="copy_right">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
 &copy;<script>document.write(new Date().getFullYear());</script> Sva prava pridržana |  <i class="fa fa-heart-o" aria-hidden="true"></i>  <a href="{{ url('index') }}" target="_blank">Melody</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                    <div class="col-xl-5 col-md-6">
                        <div class="footer_links">
                            <ul>
                                <li><a href="{{ url('index') }}">Početna</a></li>
                                <li><a href="{{ url('about') }}">O nama</a></li>
                                <li><a href="{{ url('contact') }}">Kontakt</a></li>
                                <li><a href="doc/Vizija.pdf" target="_blank">Vizija</a></li>
                                <li><a href="https://github.com/Nebra98/Melody.git" target="_blank"> <i class="fa fa-github"></i> </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ footer end  -->

    <!-- link that opens popup -->

    <!-- JS here -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous">
    </script>
    <script src="nebra/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="nebra/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="nebra/js/popper.min.js"></script>
    <script src="nebra/js/bootstrap.min.js"></script>
    <script src="nebra/js/owl.carousel.min.js"></script>
    <script src="nebra/js/isotope.pkgd.min.js"></script>
    <script src="nebra/js/ajax-form.js"></script>
    <script src="nebra/js/waypoints.min.js"></script>
    <script src="nebra/js/jquery.counterup.min.js"></script>
    <script src="nebra/js/imagesloaded.pkgd.min.js"></script>
    <script src="nebra/js/audioplayer.js"></script>
    <script src="nebra/js/scrollIt.js"></script>
    <script src="nebra/js/jquery.scrollUp.min.js"></script>
    <script src="nebra/js/wow.min.js"></script>
    <script src="nebra/js/nice-select.min.js"></script>
    <script src="nebra/js/jquery.slicknav.min.js"></script>
    <script src="nebra/js/jquery.magnific-popup.min.js"></script>
    <script src="nebra/js/plugins.js"></script>
    <script src="nebra/js/gijgo.min.js"></script>
    <script src="nebra/js/slick.min.js"></script>
    <!--contact js-->
    <script src="nebra/js/contact.js"></script>
    <script src="nebra/js/jquery.ajaxchimp.min.js"></script>
    <script src="nebra/js/jquery.form.js"></script>
    <script src="nebra/js/jquery.validate.min.js"></script>
    <script src="nebra/js/mail-script.js"></script>

    <script src="js/main.js"></script>

		<script>
                $(function() {
                    $('audio').audioPlayer({

                    });
                });
            </script>
</body>

</html>
