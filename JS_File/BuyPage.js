// Sepeti gösteren fonksiyon

function displayCartItems() {
    var cartContent = document.getElementById('cart_items-container');
    var totalElement = document.querySelector('.cart_total');

    // Sepet içeriğini temizle

    cartContent.innerHTML = '';

    // Sepet içeriğini güncelle

    for (var i = 0; i < cartItems.length; i++) {
        var cartItem = cartItems[i];
        var cartItemElement = document.createElement('div');
        cartItemElement.className = 'cart_item';
        cartItemElement.innerHTML = `
            <img src="${cartItem.image}" alt="${cartItem.name}">
            <div class="cart_item_details">
                <p>${cartItem.name} x ${cartItem.quantity}</p>
                <span>$${(cartItem.price * cartItem.quantity).toFixed(2)}</span>
            </div>
            <button onclick="removeFromCart('${cartItem.name}')">Remove</button>
        `;

        // Sepet içeriğine yeni ürünü ekle

        cartContent.appendChild(cartItemElement);
    }

    // Toplam tutarı güncelle

    var total = cartItems.reduce(function (acc, item) {
        return acc + item.price * item.quantity;
    }, 0);

    totalElement.innerText = `$${total.toFixed(2)}`;
}

// PayPal SDK entegrasyonu

paypal.Buttons({
    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: calculateTotal()
                }
            }]
        });
    },
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
            alert('Transaction completed by ' + details.payer.name.given_name);
        });
    }
}).render('#paypal-button-container');
window.addEventListener('load', function () {
    displayCartItems();
});