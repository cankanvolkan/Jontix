function clearCart() {
    localStorage.removeItem('cartItems');
    displayCartItems(); // Sepeti temizledikten sonra güncel sepeti göster
}
function clearCart() {
    // Sepet içeriğini temizle
    var cartItemsContainer = document.getElementById("cart_items-container");
    cartItemsContainer.innerHTML = "";

    // Toplam tutarı sıfırla
    var cartTotalElement = document.querySelector(".cart_total");
    cartTotalElement.textContent = "$0.00";

    // Eklenen ürünleri gösteren bölümü temizle
    var addedProductsContainer = document.getElementById("addedProducts");
    addedProductsContainer.innerHTML = "";
}