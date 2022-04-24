<!DOCTYPE html>
<html lang="en">

<head>

    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Apni Ads</title>

    <!-- FAVICON -->
    <link href="{{ asset('images/Apni.svg') }}" rel="shortcut icon">
    <!-- css/plugins CSS STYLE -->
    <!-- <link href="css/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap/css/bootstrap-slider.css') }}">
    <!-- Font Awesome -->
    <link href="{{ asset('css/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="{{ asset('css/plugins/slick-carousel/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/slick-carousel/slick/slick-theme.css') }}" rel="stylesheet">
    <!-- Fancy Box -->
    <link href="{{ asset('css/plugins/fancybox/jquery.fancybox.pack.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
    <!-- CUSTOM CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body class="body-wrapper">



    <livewire:navbar />

    @yield('content')

    <livewire:footer />

    <!-- JAVASCRIPTS -->
    <script src="{{ asset('css/plugins/jQuery/jquery.min.js') }}"></script>
    <script src="{{ asset('css/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('css/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('css/plugins/bootstrap/js/bootstrap-slider.js') }}"></script>
    <!-- tether js -->
    <script src="{{ asset('css/plugins/tether/js/tether.min.js') }}"></script>
    <script src="{{ asset('css/plugins/raty/jquery.raty-fa.js') }}"></script>
    <script src="{{ asset('css/plugins/slick-carousel/slick/slick.min.js') }}"></script>
    <script src="{{ asset('css/plugins/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('css/plugins/fancybox/jquery.fancybox.pack.js') }}"></script>
    <script src="{{ asset('css/plugins/smoothscroll/SmoothScroll.min.js') }}"></script>
    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places">
    </script>
    <script src="{{ asset('css/plugins/google-map/gmap.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
