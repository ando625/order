@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/cart.css')}}">
@endsection

@section('content')

<div class="cart-container">
    <h1 class="cart-title">カート</h1>
    <hr class="cart-divider">

    <div class="cart-content">
        <!-- カート商品 -->
        <div class="cart-items-area">
            <div id="cartItemsList">
                <!-- JavaScriptで動的に表示 -->
            </div>

            <!-- からのカート表示 -->
            <div id="emptyCart" class="empty-cart" style="display: none;">
                <p>🛒</p>
                <p>カートに商品がありません</p>
                <a href="{{route('menus.index')}}" class="btn-back-menu">メニューに戻る</a>
            </div>
        </div>

        <!-- 会計 -->
        <aside class="cart-summary">
            <h2 class="summary-title">お会計</h2>

            <div class="summary-details">
                <div class="summary-row">
                    <span>小計</span>
                    <span id="subtotal">¥0</span>
                </div>
                <div class="summary-row">
                    <span>消費税(10%)</span>
                    <span id="tax">¥0</span>
                </div>
                <hr class="summary-divider">
                <div class="summary-row total">
                    <span>合計</span>
                    <span id="total">¥0</span>
                </div>
            </div>

            <button id="checkoutBtn" class="btn-checkout">お会計に進む</button>
            <a href="{{route('menus.index')}}" class="btn-continue-shopping">買い物を続ける</a>
        </aside>
    </div>
</div>


<!-- 削除確認モーダル -->
<div id="deleteModal" class="modal">
    <div class="modal-content small">
        <h3>商品を削除</h3>
        <p>この商品をカートから削除しますか？</p>
        <div class="modal-actions">
            <button id="cancelDelete" class="btn-cancel">キャンセル</button>
            <button id="confirmDelete">削除する</button>
        </div>
    </div>
</div>

<!-- 会計確認モーダル -->
<div id="checkoutModal" class="modal">
    <div class="modal-content">
        <span class="modal-close">&times;</span>
        <h2>お会計内容の確認</h2>
        <div class="checkout-summary">
            <div id="checkoutItemsList"></div>
            <hr>
            <div class="checkout-total">
                <span>お支払い金額</span>
                <span id="checkoutTotal" class="price-large">¥0</span>
            </div>
        </div>
        <div class="modal-actions">
            <button id="confirmCheckout" class="btn-confirm-checkout">注文を確定する</button>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('js/cart.js') }}" defer></script>
@endsection