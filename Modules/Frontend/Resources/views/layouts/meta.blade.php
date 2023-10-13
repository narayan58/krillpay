<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | KrillPay</title>
    <meta name="description" content="@yield('description')" />
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="author" content="KrillPay" />
    <meta name="copyright" content="KrillPay" />
    <meta name="rating" content="general" />
    <meta name="robots" content="index,follow" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/fab-icon.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugin/nice-select.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugin/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugin/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/arafat-font.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugin/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css')}}">
     <link rel="stylesheet" href="{{ asset('frontend/assets/css/lunar.css')}}">
    <script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script>
    @yield('top')
</head>
    <input type="hidden" value="{{ url('/') }}" id="baseurl" name="">
