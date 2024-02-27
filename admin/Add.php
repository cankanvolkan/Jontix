<?php
include'Config/db_connect.php';
/*
$servername = "localhost";
$username = "root";
$password = "1226";
$dbname = "jontix";

$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantı kontrolü yapılır
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ürünlerin listesi
$products = array(
    array("Black Coat Natural", 29.99, 10),
    array("Black Coat", 19.99, 10),
    array("Black And White Jacket", 19.99, 10),
    array("Black Pants", 29.99, 10),
    array("Striped Shirt", 99.99, 10),
    array("Black Jacket", 9.99, 10),
    array("Black Sports Tracksuit", 59.99, 10),
    array("Yellow Striped Trousers", 29.99, 10),
    array("Blue jeans", 9.99, 10),
    array("Black Jacket Soft", 9.99, 10),
    array("Black Sporty Combination", 49.99,  10),
    array("White Sporty Combination", 29.99,  10),
    array("Black Waterproof Jacket", 49.99,  10),
    array("Patterned Trousers", 9.99, 10),
    array("Black Sweater", 49.99, 10),
    array("White Sweater", 49.99,  10),

    // Diğer ürünler buraya eklenebilir
);

foreach ($products as $product) {
    $productName = $product[0];
    $productPrice = $product[1];
    $stock = $product[2];

    // SQL sorgusu oluşturulur
    $sql = "INSERT INTO products (title, price, stock) VALUES ('$productName', $productPrice, $stock)";

    // Sorguyu çalıştır ve sonucu kontrol et
    if ($conn->query($sql) === TRUE) {
        echo "Product '$productName' added successfully<br>";
    } else {
        echo "Error adding product '$productName': " . $conn->error . "<br>";
    }
}

// Veritabanı bağlantısını kapat
$conn->close();
*/