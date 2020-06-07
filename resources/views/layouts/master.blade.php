<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Smart Hospital</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.png')}}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/gijgo.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div class="header-top_area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 ">
                            <div class="social_media_links">
                                <a href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="float-right">
                                @guest
                                    <ul>
                                        <li>
                                            <a class="genric-btn info radius small" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            @if (Route::has('register'))
                                            <a class="genric-btn info-border radius small" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        @endif
                                        </li>

                                    </ul>
                                    @else
                                    <div class="short_contact_list">
                                        <ul>
                                            <li><a href="#"> <i class="fa fa-envelope"></i>{{ Auth::user()->email }} </a></li>
                                            <li>
                                                <a class="genric-btn info-border radius small" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                    </form>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="/">
                                    <img src="img/logo.jpg" alt=""> Smart Hospital
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="/">Home</a></li>
                                        <li><a href="/periksa">Periksa</a></li>
                                        <li><a href="/room">Rawat Inap</a></li>
                                        <li><a href="#">Resep Obat</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                        @guest
                            <div class="Appointment">
                                <div class="book_btn d-none d-lg-block">
                                    <a  href="{{ url('/login') }}">Registrasi Priksa</a>
                                </div>
                            </div>
                        @else
                            <div class="Appointment">
                                <div class="book_btn d-none d-lg-block">
                                    <a class="popup-with-form" href="#test-form">Registrasi Priksa</a>
                                </div>
                            </div>
                        @endguest
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    @yield('content')

    <form id="test-form"action="periksa" method="post" class="white-popup-block mfp-hide">
        <div class="popup_box ">
            <div class="popup_inner">
                <h3>Make an Appointment</h3>

                    <div class="row">
                        <div class="col-xl-6">
                            <input id="datepicker" name="tanggal" placeholder="Pilih Hari">
                        </div>
                        <div class="col-xl-6">
                            <select class="form-select wide" name="lokasi" id="default-select" class="">
                                <option data-display="Pilih Rumah Sakit">Rumah sakit</option>
                                <option value="1">Rumah sakit A</option>
                                <option value="2">Rumah sakit B</option>
                                <option value="3">Rumah sakit C</option>
                            </select>
                        </div>
                        <div class="col-xl-6">
                            <input type="text" name="nama" placeholder="Name">
                        </div>
                        <div class="col-xl-6">
                            <input type="text" name="telp" placeholder="Phone no.">
                        </div>
                        <div class="col-xl-12">
                            @guest
                            @else
                            <input type="email" name="email" value="{{Auth::user()->email}}">
                            @endguest

                        </div>
                        <div class="col-xl-12">
                            <button type="submit" name="submit" class="boxed-btn3" value="create">Confirm</button>
                            {{-- <input type="hidden" name="_method" value="POST"> --}}
                            {{ csrf_field() }}
                        </div>
                    </div>
            </div>
        </div>
    </form>

    <div class="Emergency_contact">
        <div class="conatiner-fluid p-0">
            <div class="row no-gutters">
                <div class="col-xl-6">
                    <div class="single_emergency d-flex align-items-center justify-content-center emergency_bg_1 overlay_skyblue">
                        <div class="info">
                            <h3>Kontak Darurat</h3>
                            <p>harap gunakan hanya dalam Keadaan darurat</p>
                        </div>
                        <div class="info_button">
                            <a href="#" class="boxed-btn3-white">+62 378 4673 467</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="single_emergency d-flex align-items-center justify-content-center emergency_bg_2 overlay_skyblue">
                        <div class="info">
                            <h3>registrasi periksa online sekarang</h3>
                            <p>kemudahan dalam pengecekan kondisi kesehatan anda .</p>
                        </div>
                        <div class="info_button">
                            <a href="#" class="boxed-btn3-white">Make an Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Emergency_contact end -->

    <!-- footer start -->
    <footer class="footer">
            <div class="footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-lg-4">
                            <div class="footer_widget">
                                <div class="footer_logo">
                                    <a href="#">
                                        <img src="img/logo.jpg" alt="">
                                    </a>
                                </div>
                                <p>
                                        Firmament morning sixth subdue darkness
                                        creeping gathered divide.
                                </p>
                                <div class="socail_links">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="ti-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="ti-twitter-alt"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-2 offset-xl-1 col-md-6 col-lg-3">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                        Departments
                                </h3>
                                <ul>
                                    <li><a href="#">Mata</a></li>
                                    <li><a href="#">Kulit</a></li>
                                    <li><a href="#">Pathology</a></li>
                                    <li><a href="#">Obat</a></li>
                                    <li><a href="#">Gigi</a></li>
                                </ul>

                            </div>
                        </div>
                        <div class="col-xl-2 col-md-6 col-lg-2">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                        Useful Links
                                </h3>
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Periksa</a></li>
                                    <li><a href="#">Rawat Inap</a></li>
                                    <li><a href="#"> Resep Obat</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-3">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                        Address
                                </h3>
                                <p>
                                    +62 367 467 8934 <br>
                                    Smart_hospital@contac.com
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    <!-- form itself end -->

    <!-- JS here -->
    @yield('script')
    <script src="{{asset('js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{asset('js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('js/ajax-form.js')}}"></script>
    <script src="{{asset('js/waypoints.min.js')}}"></script>
    <script src="{{asset('js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('js/scrollIt.js')}}"></script>
    <script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script src="{{asset('js/nice-select.min.js')}}"></script>
    <script src="{{asset('js/jquery.slicknav.min.js')}}"></script>
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="{{asset('js/gijgo.min.js')}}"></script>
    <!--contact js-->
    <script src="{{asset('js/contact.js')}}"></script>
    <script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('js/jquery.form.js')}}"></script>
    <script src="{{asset('js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/mail-script.js')}}"></script>

    <script src="{{asset('js/main.js')}}"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }

        });
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
    </script>
</body>

</html>
