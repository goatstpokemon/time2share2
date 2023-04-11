<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/grid.css') }}">
<link rel="stylesheet" href="{{ asset('css/flex.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.2.0/css/fork-awesome.min.css" integrity="sha256-XoaMnoYC5TH6/+ihMEnospgm0J1PM/nioxbOUdnM8HY=" crossorigin="anonymous">
@yield('assets')
 
    <title>Time2Share</title>
</head>
<body>
    <section class="mb-nav">
    <span class="logo-mob logo"><a href="/" ><span class="blue" >Time</span>2Share</a></span>
    <nav class="mobile-nav">
    <button class="hamburger">
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
    </button>
    <ul class="mobile-nav-menu">
        <li><a href="/products">Alle</a></li>
        <li><a href="/products/borrowed">Uitgeleend</a></li>
        <li><a href="/products/borrowing">Aan het lenen</a></li>
        <li>
         <form action="/logout" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </li>
    </ul>
</nav>
</section>
    <section class="desktop">
    <x-sidebar/>
    @yield('content')

    
    
</section>

@yield('scripts')
<script  src="{{ asset('js/nav.js') }}"></script>
</body>
</html>