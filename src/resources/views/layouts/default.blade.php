<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>管理者ログイン</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/dreampulse/computer-modern-web-font@master/fonts.css">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default.css') }}">
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header-container">
            <a href="/login" class="site-title">🛎️DINE AWAY GOLD</a>
        </div>
    </header>
    
    <div class="container">
        <main class="main-content">
            @yield('content')
        </main>
    </div>
   @yield('js')
</body>
</html>