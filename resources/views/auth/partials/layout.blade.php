<!DOCTYPE HTML>
<html dir="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="auth/assets/vendor/aos/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="auth/css/main.css">
    <link rel="icon" type="image/png" href="auth/images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="auth/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="theme/blue_pad/css/default.css?version=679" id="theme" />

    <style>
        .MyStyle {
            font-family: 'B Nazanin';
            font-size: 40px;
            color: black;
            text-align: center;
            padding-top: 50px;
        }
    </style>

    <title>
        {{ $pagetitle }}
    </title>
</head>

<body style="background-color: #EEE">
    <div class="limiter" style="background-image: url('auth/images/img-01.jpg');">
        <div class="container-login100">
            @include('auth.partials.header')

            @yield('content')

            @include('auth.partials.footer')
        </div>
    </div>

    <script src="auth/assets/vendor/jquery/jquery.min.js"></script>
    <script src="auth/assets/vendor/counterup/counterup.min.js"></script>
    <script src="auth/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="auth/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="auth/assets/vendor/aos/aos.js"></script>
    <script src="auth/assets/js/main.js"></script>
</body>

</html>
