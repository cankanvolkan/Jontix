<?php
include'Config/db_connect.php';

// Stok güncelleme işlemi
if (isset($_POST['updateStock'])) {
    $productId = $_POST['productId'];
    $newStock = $_POST['newStock'];

    $updateSql = "UPDATE products SET stock = $newStock WHERE id = $productId";
    if ($conn->query($updateSql) === TRUE) {
        echo "";
    } else {
        echo "Error updating stock: " . $conn->error;
    }
}

if (isset($_POST['updatePrice'])) {
    $productId = $_POST['productId'];
    $newPrice = $_POST['newPrice'];

    $updateSql = "UPDATE products SET price = $newPrice WHERE id = $productId";
    if ($conn->query($updateSql) === TRUE) {
        echo "";
    } else {
        echo "Error updating price: " . $conn->error;
    }
}

// Arama işlemi
if (isset($_POST['search'])) {
    $searchTerm = $_POST['searchTerm'];
    $sql = "SELECT * FROM products WHERE title LIKE '%$searchTerm%'";
    $result = $conn->query($sql);
} else {
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
}

// Veritabanından verileri çekme
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Admin Page</title>
    <style> 
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            margin-right: 10px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }  
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 12px;
        }
        td img {
            max-width: 100px;
            max-height: 100px;
            width: auto;
            height: auto;
            display: block;
            margin: auto;
        }
        .price-container {
            display: flex;
            align-items: center;
        }
        .current-price {
            margin-right: 10px;
            font-weight: bold;
        }
        .update-form {
            display: flex;
            align-items: center;
        }
        input[type="number"] {
            width: 80px;
            padding: 8px;
            margin-right: 10px;
            box-sizing: border-box;
        }
        button {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #ff6600;
        }
        button:hover {
            background-color: black;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .highlight {
            animation: highlight 1s;
        }
        @keyframes highlight {
            from { background-color: #FFFF00; }
            to { background-color: #f5f5f5; }
        }
        .header {
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 80px;
            background-color: black;
        }
        .header h1:hover {
        transform: scale(1.1); /* 1.1 kat büyütme */
        transition: transform 0.5s ease; /* 0.3 saniyede geçiş, yumuşak geçiş efekti (ease) */
        }
        .Home, .Admin, .Orders, .Products {
            text-decoration: none;
            color: white;
            cursor: pointer;
            font-size: 18px;
        }
        .Products:hover, .Admin:hover, .Orders:hover, .Home:hover {
            color: #ff6600;
        }
        a:link {
        text-decoration:none;
        }
    </style>
</head>
<body>
<div class="header">
        <a href="Home.php"><h1 class="Home">Home</h1></a>
        <a href="admin.php"><h1 class="Admin">Admin</h1></a>
        <a href="Orders.php"><h1 class="Orders">Orders</h1></a>        
        <a href="Products.php"><h1 class="Products">Products</h1></a>
    </div>
    <h2>Product List</h2>
    <?php
    if ($result->num_rows > 0) {
        // Veritabanından çekilen veriyi tablo olarak görüntüleme
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Product Price</th>                  
                    <th>Stock Count</th>
                    <th>Change Stocks</th>
                </tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["title"] . "</td>
                            <td>
                                <div class='price-container'>
                                    <span class='current-price'>" . $row["price"] . "</span>
                                    <form method='post' class='update-form'>
                                        <input type='hidden' name='productId' value='" . $row["id"] . "'>
                                        <input type='number' name='newPrice' step='0.01' placeholder='New Price' required>
                                        <button type='submit' name='updatePrice'>Update Price</button>
                                    </form>
                                </div>
                            </td>                 
                            <td>" . $row["stock"] . "</td>
                            <td>
                                <form method='post' class='update-form'>
                                    <input type='hidden' name='productId' value='" . $row["id"] . "'>
                                    <input type='number' name='newStock' placeholder='New Stock' required>
                                    <button type='submit' name='updateStock'>Update Stock</button>
                                </form>
                            </td>
                          </tr>";                       
                }
        echo "</table>";
    } else {
        echo "No products found.";
    }
    // Veritabanı bağlantısını kapat
    $conn->close();
    ?>
</body>
</html>