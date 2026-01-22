//カートデータを管理(セッションストレージ使用）
let cart = JSON.parse(sessionStorage.getItem('cart')) || [];

document.addEventListener('DOMContentLoaded', function () {
    attachMenuCardEvents();
    updateCartCount();
});

//モーダル要素の取得
const modal = document.getElementById('menuModal');
const modalClose = document.querySelector('.modal-close');
const modalMenuImage = document.getElementById('modalMenuImage');
const modalMenuName = document.getElementById('modalMenuName');
const modalMenuDescription = document.getElementById('modalMenuDescription');
const modalMenuPrice = document.getElementById('modalMenuPrice');
const menuQuantity = document.getElementById('menuQuantity');
const decreaseBtn = document.getElementById('decreaseQty');
const increaseBtn = document.getElementById('increaseQty');
const addToCartFromModal = document.getElementById('addToCartFromModal');
const menuOptionsMap = {
    'エレメント・ソーダ': ['メロン', 'オレンジ', 'グレープ', 'ベリー'],
    'クラウド・シェイク': ['ストロベリー', 'バニラ', 'マンゴー'],
};
const optionSelector = document.querySelector('.option-selector');
const menuOptionSelect = document.getElementById('menuOption');


//現在選択中のメニューデータ(今どの商品を選んでいるか一時的に覚えておく箱)
let currentMenu = null;

//メニューカードクリックイベント
document.addEventListener('DOMContentLoaded', function () {
document.querySelectorAll('.menu-card').forEach(card => {
    card.addEventListener('click', function (e) {

        //メニューデータを取得
        currentMenu = {
            id: this.dataset.menuId,
            name: this.dataset.menuName,
            price: parseFloat(this.dataset.menuPrice),
            description: this.dataset.menuDescription,
            image: this.dataset.menuImage
        };

        //ドリンクの選択タブ追加
        const options = menuOptionsMap[currentMenu.name];

        if (options) {
            optionSelector.style.display = 'block';
            menuOptionSelect.innerHTML = '';

            options.forEach(option => {
                const opt = document.createElement('option');
                opt.value = option;
                opt.textContent = option;
                menuOptionSelect.appendChild(opt);
            });
        } else {
            optionSelector.style.display = 'none';
        }

        //モダールに情報を表示
        modalMenuImage.src = currentMenu.image;
        modalMenuImage.alt = currentMenu.name;
        modalMenuName.textContent = currentMenu.name;
        modalMenuDescription.textContent = currentMenu.description;
        modalMenuPrice.textContent = `¥${currentMenu.price.toLocaleString()}`;

        //カートに同じ商品があるか探してあればそれ、なければ１
        const existingItem = cart.find(item => item.id === currentMenu.id);
        menuQuantity.value = existingItem ? existingItem.quantity : 1;

        //モーダル表示
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
    });
    });

    // 初期カート数表示
    updateCartCount();

});

//モーダルを閉じる
function closeModal() {
    modal.classList.remove('show');
    document.body.style.overflow = 'auto';
    currentMenu = null;
}

//閉じるボタン（×ボタンで閉じる）
modalClose.addEventListener('click', closeModal);

//モーダル外をクリックで閉じる(背景クリックで閉じる)
modal.addEventListener('click', function (e) {
    if (e.target === modal) {
        closeModal();
    }
});

//escキーで閉じる
document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && modal.classList.contains('show')) {
        closeModal();
    }
});

//数量増減
decreaseBtn.addEventListener('click', function () {
    let qty = parseInt(menuQuantity.value);
    if (qty > 1) {
        menuQuantity.value = qty - 1;
    }
});

increaseBtn.addEventListener('click', function () {
    let qty = parseInt(menuQuantity.value);
    if (qty < 50) {
        menuQuantity.value = qty + 1;
    }
});

//モーダルからカートに追加
addToCartFromModal.addEventListener('click', function () {
    if (!currentMenu) return;

    const quantity = parseInt(menuQuantity.value);
    addToCart(currentMenu, quantity);
    closeModal();
});

//カートに商品を追加
function addToCart(menu, quantity) {
    const selectedOption = menuOptionSelect.value || null;

    const existingItem = cart.find(item =>
        item.id === menu.id &&
        item.option === selectedOption
    );

    if (existingItem) {
        existingItem.quantity += quantity;
    } else {
        cart.push({
            id: menu.id,
            name: menu.name,
            option: selectedOption,
            price: menu.price,
            quantity: quantity,
            image: menu.image
        });
    }

    //セッションストレージに保存
    sessionStorage.setItem('cart', JSON.stringify(cart));

    //追加成功メッセージを表示
    showNotification(`${menu.name}をカートに追加しました（数量：${quantity})`);

    //カート数を更新（ヘッダーにカートアイコンがある場合)
    updateCartCount();
}

// 通知メッセージを表示
function showNotification(message) {
    //既存の通知があれば削除
    const existingNotif = document.querySelector('.cart-notification');
    if (existingNotif) {
        existingNotif.remove();
    }

    // 通知要素を作成
    const notification = document.createElement('div');
    notification.className = 'cart-notification';
    notification.textContent = message;
    document.body.appendChild(notification);

    // スタイルを追加
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

    //3秒後に削除
    setTimeout(() => {
        notification.style.animation = 'slideOutRight 0.3s ease';
        setTimeout(() => notification.remove(), 300);
    }, 3000);

}

//カート数を更新
function updateCartCount() {
    const cartCountElement = document.getElementById('cartCount');
    if (cartCountElement) {
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        cartCountElement.textContent = totalItems;
    }
}

// アニメーションCSSを追加
const style = document.createElement('style');
style.textContent = `
    @keyframes slideInRight{
        from {
            transform:translateX(400px);
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
;`
document.head.appendChild(style);

//ページ読み込み時にカート数を更新
document.addEventListener('DOMContentLoaded', function () {
    updateCartCount();
});

