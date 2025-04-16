<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="{{ asset('css/utilities.css') }}">
    {{ $style }}


    <link rel="shortcut icon" href="{{ asset('img/logo_pickleball.svg') }}" />
    <title>HighPicks Sport</title>

    <script src="{{ asset('js/utilities.js') }}" defer></script>
    {{ $js ?? '' }}
</head>

<body class="m-0">
@include('components.header')

<main>
    {{ $slot }}
</main>

<footer>
    <div class="site-info">
        <a class="logo-link d-b" href="#">
            <img class="d-b" src="{{ asset('img/logo_pickleball.svg') }}" alt="logo">
        </a>
        <p>Mọi chi tiết liên hệ</p>
        <p>Điện thoại: 0966076520</p>
        <p>Facebook: <a href="https://www.facebook.com/garaphukien68" style="color: red">HighPicks Sport</a></p>
    </div>
</footer>
</body>


</html>
