<!DOCTYPE html>
<html>
<head>
    <base href="/">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="keywords"
        content="hotel booking, travel, tourism, resorts, vacation packages, luxury stay, budget hotels, holiday destinations, tour planning, travel deals, best resorts, family vacation, honeymoon packages, tourist spots">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708184/kazan/favicons/laepautcwo6zr4mrweeh.png">
    <link rel="apple-touch-icon" sizes="60x60"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708157/kazan/favicons/pzqttccpxtk0nwhrtn5u.png">
    <link rel="apple-touch-icon" sizes="72x72"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708139/kazan/favicons/tjwrgqc6xfjsy4rdgk2l.png">
    <link rel="apple-touch-icon" sizes="76x76"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708122/kazan/favicons/txv1uxqopn4uqlzfodam.png">
    <link rel="apple-touch-icon" sizes="114x114"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708103/kazan/favicons/t3fbk2tt1yuoadr7bw9t.png">
    <link rel="apple-touch-icon" sizes="120x120"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708080/kazan/favicons/wewaapqko1aqqwpkgcnq.png">
    <link rel="apple-touch-icon" sizes="144x144"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708058/kazan/favicons/igu1bzvlrwav6t3ljjqv.png">
    <link rel="apple-touch-icon" sizes="152x152"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708022/kazan/favicons/xcs2zm4wii7u5gf9zh8w.png">
    <link rel="apple-touch-icon" sizes="180x180"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748707991/kazan/favicons/xovcoyygfaplruizxwn0.png">
    <link rel="icon" type="image/png" sizes="144x144"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708465/kazan/favicons/d7rsbzadwpoiesvvb1kj.png">
    <link rel="icon" type="image/png" sizes="96x96"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708492/kazan/favicons/v7goga3pyssas34xkqm4.png">
    <link rel="icon" type="image/png" sizes="72x72"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708520/kazan/favicons/nlubuculkb7uxblc3ijb.png">
    <link rel="icon" type="image/png" sizes="48x48"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708547/kazan/favicons/doe0gorls2kfdhuilvrl.png">
    <link rel="icon" type="image/png" sizes="36x36"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708545/kazan/favicons/ub29uu3raxv4v8vneudu.png">
    <link rel="icon" type="image/png" sizes="192x192"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708397/kazan/favicons/x99pu1lgc8hcdpvqtqlq.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708314/kazan/favicons/x38a3cutfg4te1cczj3k.png">
    <link rel="icon" type="image/png" sizes="96x96"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708316/kazan/favicons/mmfenujy0ygvazdk1m4y.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708313/kazan/favicons/jbmsdiqtjlnbrmmaxwia.png">
    <link rel="manifest"
        href="https://res.cloudinary.com/dmbgfw4bu/image/upload/v1748708184/kazan/favicons/laepautcwo6zr4mrweeh.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('web/assets/styles/responsive.css')}}"> --}}
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    @livewireStyles
    @stack('css')
    @yield('css')
</head>
<body>
    <!-- Spinner Start -->
    {{-- <div id="spinner"
        class="show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center bg-white">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> --}}
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid top-news d-none d-lg-block px-5">
        <div class="row gx-0 text-white">
            <marquee width="60%" direction="left" height="30px">Book now and get 20% off</marquee>
        </div>
    </div>
    <!-- Topbar End -->
    @include('web.layouts.include.header')
    <div class="container-fluid position-relative p-0">
        {{ $slot }}

        @include('web.layouts.include.footer')

        <!-- Copyright Start -->
        <div class="container-fluid copyright text-body py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-md-end mb-md-0 text-center">
                        <i class="fas fa-copyright me-2"></i><a class="text-white" href="#">Kazan
                            Lifestyle</a>, All right reserved.
                    </div>
                    <div class="col-md-6 text-md-start text-center">Designed By <a class="text-white"
                            href="#">Edusetech</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Z251PF798S"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-Z251PF798S');
    </script>
    @stack('js')
    @yield('js')
    @livewireScripts
</body>
</html>
