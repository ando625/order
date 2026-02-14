<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>管理者</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/dreampulse/computer-modern-web-font@master/fonts.css">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminApp.css') }}">
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header-container">
            <a href="{{route('admin.index')}}" class="site-title">🛎️DINE AWAY GOLD</a>

            <nav class="header-nav">
                <ul class="nav-list">
                    <li><a href="{{route('admin.index')}}" class="nav-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">注文状況</a></li>
                    <li><a href="{{ route('admin.orders.history')}}" class="nav-item {{ request()->routeIs('admin.orders.history') ? 'active' : '' }}">月日別注文履歴</a></li>
                    <li><a href="{{route('admin.statistics')}}" class="nav-item {{ request()->routeIs('admin.statistics') ? 'active' : '' }}">売上統計</a></li>
                    <li><a href="{{route('admin.kitchen.index')}}" class="nav-item {{ request()->routeIs('admin.kitchen.index') ? 'active' : '' }}">キッチン</a></li>
                    <li>
                        <form action="/logout" method="post" class="nav-item logout-button">
                            @csrf
                            <button type="submit" class="nav-item logout-button">ログアウト</button>
                        </form>
                    </li>
                </ul>
            </nav>
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