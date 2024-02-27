
<?php
session_start(); // Session'ları başlat
try {
    // POST verilerini al
    $card_type = $_POST['cardType'];
    $card_number = $_POST['cardNumber'];
    $expiry_date = $_POST['expiryDate'];
    $cvv_ = $_POST['cvv'];
    $name = $_POST['cardHolderName'];
    $zip_code = $_POST['zipcode'];
    $address = $_POST['billingAddress'];

    // Veritabanına bağlanma
    $pdo = new PDO("mysql:host=localhost;dbname=jontix", "root", "1226");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Veritabanına ekleme işlemi
    $sql = "INSERT INTO orders (card_type, card_number, expiry_date, cvv_, name, zip_code, address) 
            VALUES (:cardType, :cardNumber, :expiryDate, :cvv, :cardHolderName, :zipcode, :billingAddress)";

    $stmt = $pdo->prepare($sql);

    // Parametreleri bağlama
    $stmt->bindParam(':cardType', $card_type);
    $stmt->bindParam(':cardNumber', $card_number);
    $stmt->bindParam(':expiryDate', $expiry_date);
    $stmt->bindParam(':cvv', $cvv_);
    $stmt->bindParam(':cardHolderName', $name);
    $stmt->bindParam(':zipcode', $zip_code);
    $stmt->bindParam(':billingAddress', $address);

    // SQL sorgusunu çalıştırma
    $stmt->execute();

    // Form verilerini session'a kaydet
    $_SESSION['form_data'] = $_POST;

    // Başarı sayfasına yönlendir
    header("Location: success.php");
    exit();
    
} catch (PDOException $e) {
    echo "Veritabanı hatası: " . $e->getMessage();
}