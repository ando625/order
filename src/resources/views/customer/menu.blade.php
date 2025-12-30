@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/menu.css') }}">
@endsection

@section('content')

<div class="menu-container">
    <h1 class="menu-title">メニュー　一覧</h1>
    <div class="cart-box">
        <a href="/cart">
        🛒<span id="cartCount">0</span>
        </a>
    </div>
    <hr class="menu-divider">

    <div class="menu-content">
        <!--カテゴリ-->
        <aside class="category-sidebar">
            <h2 class="category-title">カテゴリー</h2>
            <ul class="category-list">
                <li class="category-item {{ !request()->filled('category') ? 'active' : '' }}">
                    <a href="{{route('menus.index')}}">すべて</a>
                </li>

                @foreach($categories as $category)
                <li class="category-item {{request('category') == $category->id ? 'active' : ''}}">
                    <a href="{{ route('menus.index', ['category' => $category->id]) }}">
                        {{ $category->name }}
                    </a>
                </li>
                @endforeach
            </ul>
        </aside>

        <!--商品カード-->
        <main class="menu-area">
            @foreach($menus as $menu)
            <div class="menu-card"
                data-menu-id="{{ $menu->id }}"
                data-menu-name="{{ $menu->name }}"
                data-menu-price="{{ $menu->price }}"
                data-menu-description="{{ $menu->description }}"
                data-menu-image="{{ asset($menu->image_path) }}">
                <div class="menu-image">
                    <img src="{{ asset($menu->image_path) }}" alt="{{ $menu->name }}">
                </div>
                <div class="menu-info">
                    <h3 class="menu-name">{{ $menu->name }}</h3>
                    <!-- <p class="menu-description">
                        {{ \Illuminate\Support\Str::Limit($menu->description, 100) }}
                    </p> -->
                </div>
            </div>
            @endforeach
        </main>
    </div>
</div>

<!-- ポップアップモーダル -->
<div id="menuModal" class="modal">
    <div class="modal-content">
        <span class="modal-close">&times;</span>
        <div class="modal-body">
            <div class="modal-image">
                <img id="modalMenuImage" src="" alt="">
            </div>
            <div class="modal-info">
                <h2 id="modalMenuName"></h2>
                <p id="modalMenuDescription"></p>
                <div class="modal-price">
                    <span id="modalMenuPrice"></span>
                </div>
                <div class="quantity-selector">
                    <label>数量:</label>
                    <button class="quantity-btn" id="decreaseQty">-</button>
                    <input type="number" id="menuQuantity" value="1" min="1" max="50" readonly>
                    <button class="quantity-btn" id="increaseQty">+</button>
                </div>
                <div class="modal-actions">
                    <button id="addToCartFromModal" class="btn-add-cart">カートに追加</button>
                </div>
            </div>
        </div>
    </div>
</div>


<hr class="footer-divider">
<footer class="site-footer">
    <p>
        このサイトで使用している画像素材は
        <a href="https://jp.freepik.com/" target="_blank" rel="noopener">
            Freepik
        </a>
        提供のものです。<br>
        Images used in this site are from
        <a href="https://jp.freepik.com/" target="_blank" rel="noopener">
            Freepik
        </a>.
    </p>
</footer>

<script src="{{asset('js/menu.js')}}"></script>

@endsection
