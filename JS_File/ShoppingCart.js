// Sepet içeriğini yerel depolamada saklamak için anahtar
const CART_STORAGE_KEY = 'shopping_cart';

// Sepet içeriğini temsil eden dizi
var cartItems = getCartFromStorage();

// Sayfa yüklendiğinde sepeti göster
window.addEventListener('load', function () {
    // Sepeti göster
    displayCartItems();
});

// Yerel depolamadaki sepet verilerini al
function getCartFromStorage() {
    const cartData = localStorage.getItem(CART_STORAGE_KEY);
    return cartData ? JSON.parse(cartData) : [];
}

// Yerel depolamaya sepet verilerini kaydet
function saveCartToStorage() {
    localStorage.setItem(CART_STORAGE_KEY, JSON.stringify(cartItems));
}

// Shop cart'ı açıp kapatmak için fonksiyon
function toggleCart() {
    var cartSidebar = document.querySelector('.sidebar-cart');
    if (cartSidebar.style.right === '0px') {
        // Eğer cart açıksa, kapat
        closeCart();
    } else {
        // Eğer cart kapalıysa, aç
        openCart();
    }
}

// Shop cart'ı açan fonksiyon
function openCart() {
    document.querySelector('.sidebar-cart').style.right = '0';
    displayCartItems();
}

// Shop cart'ı kapatan fonksiyon
function closeCart() {
    document.querySelector('.sidebar-cart').style.right = '-400px';
}

// Ürün stoklarını dinamik olarak belirlemek için bir nesne
var productStock = {
    "Black pants": 10,
    
    // Diğer ürünler
};

function addToCart(name, price, image) {
    // Eğer ürün sepette varsa, adetini artır
    var index = getItemIndex(name);
    if (index !== -1) {
        cartItems[index].quantity++;
    } else {
        // Eğer ürün sepette yoksa, yeni bir öğe olarak ekle
        var newItem = {
            name: name,
            price: price,
            quantity: 1,
            image: image
        };
        cartItems.push(newItem);
    }

    // Sepeti göster
    displayCartItems();
    // Sepet verilerini yerel depolamada güncelle
    saveCartToStorage();
}

// Sepetten ürün çıkaran fonksiyon
function removeFromCart(productName) {
    var index = getItemIndex(productName);
    if (index !== -1) {
        if (cartItems[index].quantity > 1) {
            // Eğer üründen birden fazla varsa, adetini azalt
            cartItems[index].quantity--;
        } else {
            // Eğer üründen bir tane varsa, ürünü tamamen çıkar
            cartItems.splice(index, 1);
        }

        // Sepeti göster
        displayCartItems();
        // Sepet verilerini yerel depolamada güncelle
        saveCartToStorage();
    }
}

// Ürünün sepette olup olmadığını kontrol et ve dizideki indeksi döndür
function getItemIndex(productName) {
    for (var i = 0; i < cartItems.length; i++) {
        if (cartItems[i].name === productName) {
            return i;
        }
    }
    return -1;
}

// Sepeti gösteren fonksiyon
function displayCartItems() {
    var cartContent = document.querySelector('.cart-content');
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

// Dil dosyası örneği
var languageMessages = {
    'tr': 'Sepetinizde ürün bulunmamaktadır.',
    'en': 'Your cart is empty.',
    'fr': 'Votre panier est vide.',
    'es': 'Tu carrito está vacío.',
    'de':'Es befinden sich keine Produkte in Ihrem Warenkorb.',
};
function checkout() {
    // Kullanıcının tarayıcı dilini al
    var userLanguage = (navigator.language || navigator.userLanguage).split('-')[0];

    // Eğer sepette ürün varsa, checkout işlemini başlat
    if (cartItems.length > 0) {
        // Sepet verilerini yerel depolamada güncelle
        saveCartToStorage();
    } else {
        // Sepette ürün yoksa, kullanıcının diline göre mesajı belirle
        var defaultLanguage = 'en'; // Varsayılan dil
        var message = languageMessages[userLanguage] || languageMessages[defaultLanguage];

        // SweetAlert ile bildirim göster
        Swal.fire({
            icon: 'info',
            title: message,
            showConfirmButton: true,
            timer: 2000, // Otomatik kapanma süresi (ms cinsinden)
        });
    }
}
    
// Eklenen ürünleri göstermek için bir HTML içeriği oluşturan yardımcı bir fonksiyon
function generateAddedProductsHTML() {
    var addedProductsHTML = '';
    for (var i = 0; i < cartItems.length; i++) {
        addedProductsHTML += '<p>' + cartItems[i].name + ' - $' + (cartItems[i].price * cartItems[i].quantity).toFixed(2) + '</p>';
    }
    return addedProductsHTML;
}
    // Sayfa yüklendiğinde eklenen ürünleri göstermek için bir alanı güncelleme
document.addEventListener('DOMContentLoaded', function () {
    var addedProductsContainer = document.getElementById('addedProducts');
    addedProductsContainer.innerHTML = generateAddedProductsHTML();
});

    
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
        //cartContent.appendChild(cartItemElement);
    }
    paypal.Buttons({
        createOrder: function(data, actions) {
            // Sepetin toplam tutarını al
            var totalAmount = calculateTotalAmount();

            // PayPal'a toplam tutarı gönder
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: totalAmount.toFixed(2),
                        currency: 'USD'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            // Ödeme onaylandığında yapılacak işlemleri buraya ekleyebilirsiniz
            alert('Ödeme onaylandı. Teşekkür ederiz!');
        }
    }).render('#paypal-button-container');

    // Toplam tutarı hesaplamak için bir fonksiyon ekleyin
    function calculateTotalAmount() {
        // Sepet içeriğini kullanarak toplam tutarı hesapla
        var total = cartItems.reduce(function (acc, item) {
            return acc + item.price * item.quantity;
        }, 0);

        return total;
    }
    // PayPal ödeme butonuna tıklanınca ödeme ekranını açan fonksiyon
    function openPaypalPayment() {
        // PayPal ödeme ekranını açmak için gerekli işlemleri burada gerçekleştirin
        alert('Ödeme ekranı burada açılacak.');
        // Örneğin, PayPal SDK'sını kullanarak ödeme ekranını çağırabilirsiniz.
    }
    function clearCart() {
        // Sepetin içini boşalt
        cartItems = [];
    
        // Sepet verilerini yerel depolamada güncelle
        saveCartToStorage();
    
        // İlgili diğer işlemleri burada ekleyebilirsiniz
    
        // Sepeti güncelledikten sonra sayfayı yeniden yükleme veya başka bir işlem yapabilirsiniz
        location.reload(); // Örnek: Sayfayı yeniden yükleme
    }