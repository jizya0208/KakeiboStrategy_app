<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js" defer></script>
</head>
<body>
    <header>
      @include('header')
    </header>
    <br>
    <div class="container">
      @yield('content')
    </div>
    <footer class="footer bg-dark  fixed-bottom">
      @include('footer')
    </footer>
</body>
</html>