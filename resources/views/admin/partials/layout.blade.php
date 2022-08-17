<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="/auth/css/main.css">

    <style>
        a,
        body,
        button,
        li {
            direction: rtl;
            font-size: 20px !important;
            font-family: B Nazanin !important;
        }
    </style>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>@yield('pagetitle')</title>
</head>

<body>
    <div class="limiter" style="background-image: url('/auth/images/img-01.jpg');">
        <div class="container-login100">
            @include('admin.partials.header')

            @yield('content')

            @include('admin.partials.footer')
        </div>
    </div>
</body>

</html>
