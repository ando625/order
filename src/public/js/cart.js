//カートデータ取得
let cart = JSON.parse(sessionStorage.getItem('cart')) || [];
let deleteTarget = null;
let csrfToken = null;

//ページ読み込み時にカート表示
document.addEventListener('DOMContentLoaded', function () {
    csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute('content');

    displayCart();
    updateSummary();
});




// カートを表示
function displayCart() {
    const cartItemsList = document.getElementById('cartItemsList');
    const emptyCart = document.getElementById('emptyCart');
    const checkoutBtn = document.getElementById('checkoutBtn');

    if (cart.length === 0) {
        cartItemsList.innerHTML = '';  //一覧を消す
        emptyCart.style.display = 'block';  //空メッセージ表示
        checkoutBtn.disabled = true;  //会計ボタン無効
        return; //処理終了
    }

    emptyCart.style.display = 'none';
    checkoutBtn.disabled = false;

    cartItemsList.innerHTML = cart.map(item => `
        <div class="cart-item" data-item-id="${item.id}">
            <div class="cart-item-image">
                <img src="${item.image}" alt="${item.name}"></img>
            </div>
            <div class="cart-item-info">
                <h3 class="cart-item-name">
                    ${item.name}
                    ${item.option ? `<span class="cart-item-option">（${item.option}）</span>` : ''}
                </h3>
                <p class="cart-item-price">¥${item.price.toLocaleString()}</p>
                <div class="cart-item-actions">
                    <div class="quantity-control">
                        <label>数量：</label>
                        <button class="qty-btn" onclick="decreaseQuantity('${item.id}')">-</button>
                        <input type="number" class="qty-input" value="${item.quantity}" readonly>
                        <button class="qty-btn" onclick="increaseQuantity('${item.id}')">+</button>
                    </div>
                    <span class="item-subtotal">¥${(item.price * item.quantity).toLocaleString()}</span>
                    <button class="btn-remove" onclick="showDeleteModal('${item.id}')">削除</button>
                </div>
            </div>
        </div>
    `).join('');
}

// 数量を減らす
function decreaseQuantity(itemId) {
    const item = cart.find(i => i.id === itemId);
    if (item && item.quantity > 1) {
        item.quantity--;
        saveCart();
        displayCart();
        updateSummary();
    }
}

//cart.find(item => item.id === itemId);
// cart.find(menu => menu.id === itemId);
// cart.find(x => x.id === itemId);
// 数量を増やす
function increaseQuantity(itemId) {
    const item = cart.find(i => i.id === itemId);
    if (item && item.quantity < 50) {
        item.quantity++;
        saveCart();
        displayCart();
        updateSummary();
    }
}

// カートを保存
function saveCart() {
    sessionStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount();
}

// 削除モーダルを表示
function showDeleteModal(itemId) {
    deleteTarget = itemId;
    const modal = document.getElementById('deleteModal');
    modal.classList.add('show');
}

// 削除をキャンセル
document.getElementById('cancelDelete').addEventListener('click', function () {
    const modal = document.getElementById('deleteModal');
    modal.classList.remove('show');
    deleteTarget = null;
});

// 削除モーダル閉じる
document.getElementById('deleteModal').addEventListener('click', function (e) {
    if (e.target === this) {
        this.classList.remove('show');
        deleteTarget = null;
    }
});

// 削除を確定
document.getElementById('confirmDelete').addEventListener('click', function () {
    if (deleteTarget) {
        cart = cart.filter(item => item.id !== deleteTarget);
        saveCart();
        displayCart();
        updateSummary();

        const modal = document.getElementById('deleteModal');
        modal.classList.remove('show');
        deleteTarget = null;

        showNotification('商品を削除しました');
    }
});

//サマリーを更新
function updateSummary() {
    const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    const tax = Math.floor(subtotal * 0.1);
    const total = subtotal + tax;

    document.getElementById('subtotal').textContent = `¥${subtotal.toLocaleString()}`;
    document.getElementById('tax').textContent = `¥${tax.toLocaleString()}`;
    document.getElementById('total').textContent = `¥${total.toLocaleString()}`;
}

// カート数を更新
function updateCartCount() {
    const cartCountElement = document.getElementById('cartCount');
    if (cartCountElement) {
        const totalItems = cart.reduce((sum, item,) => sum + item.quantity, 0);
        cartCountElement.textContent = totalItems;
    }
}

//お会計ボタン
document.getElementById('checkoutBtn').addEventListener('click', function () {
    if (cart.length === 0) return;
    const modal = document.getElementById('checkoutModal');
    const checkoutItemsList = document.getElementById('checkoutItemsList');

    //チェックアウト内容を表示
    checkoutItemsList.innerHTML = cart.map(item => `
        <div class="checkout-item">
            <span class="checkout-item-name">${item.name}</span>
            <span class="checkout-item-qty">×${item.quantity}</span>
            <span class="checkout-item-price">¥${(item.price * item.quantity).toLocaleString()}</span>
        </div>
        `).join('');

    const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    const tax = Math.floor(subtotal * 0.1);
    const total = subtotal + tax;

    document.getElementById('checkoutTotal').textContent = `¥${total.toLocaleString()}`;

    modal.classList.add('show');

});

//モーダルを閉じる
document.querySelector('#checkoutModal .modal-close').addEventListener('click', function () {
    document.getElementById('checkoutModal').classList.remove('show');
});


// モーダル外クリックで閉じる
document.getElementById('checkoutModal').addEventListener('click', function (e) {
    if (!e.target.closest('.modal-content')) {
        this.classList.remove('show');
    }
});


// 注文確定
document.getElementById('confirmCheckout').addEventListener('click', function () {
    fetch('/orders', {
        method: 'post',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },

        body: JSON.stringify({
            cart: cart
        })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification('ご注文ありがとうございます！');
                cart = [];
                saveCart();

                document.getElementById('checkoutModal').classList.remove('show');

                setTimeout(() => {
                    window.location.href = '/';
                }, 2000);
            }
        });
});

//通知メッセージを表示
function showNotification(message) {
    const existingNotif = document.querySelector('.cart-notification');
    if (existingNotif) {
        existingNotif.remove();
    }

    const notification = document.createElement('div');
    notification.className = 'cart-notification';
    notification.textContent = message;
    document.body.appendChild(notification);

    notification.style.cssText = `
        position: fixed;
        bottom: 30px;
        right: 30px;
        background-color: #28a745;
        color: white;
        padding: 15px 25px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        z-index: 10000;
        animation: slideInRight 0.3s ease;
        font-size: 0.95rem;
    `;

    setTimeout(() => {
        notification.style.animation = 'slideOutRight 0.3s ease';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// アニメーション
const style = document.createElement('style');
style.textContent = `
    @keyframes slideInRight {
        from {
            transform: translateX(400px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOutRight {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(400px);
            opacity: 0;
        }
    }
`;

document.head.appendChild(style);

