<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
</head>
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .header {
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 80px;
            background-color: black;
            color: #fff;
        }
        .header h1:hover {
            transform: scale(1.1);
            transition: transform 0.5s ease;
        }
        .Home, .Admin, .Orders, .Products {
            text-decoration: none;
            color: white;
            cursor: pointer;
            font-size: 18px;
            transition: color 0.3s ease;
        }
        .Products:hover, .Admin:hover, .Orders:hover, .Home:hover {
            color: #ff6600;
        }
        a:link {
            text-decoration: none;
        }
        .styled-table {
            width: 80%;
            margin: 25px auto;
            border-collapse: collapse;
            font-size: 18px;
            text-align: left;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .styled-table th, .styled-table td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }
        .styled-table th {
            background-color: black;
            color: #fff;
        }
        .styled-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .styled-table tbody tr:hover {
            background-color: #d9d9d9;
        }
        .update-status-btn {
            background-color: #4285f4;
            color: #fff;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .update-status-btn:hover {
            background-color: #3367d6;
        }
        .update-status-input {
            padding: 8px;
            margin-right: 8px;
        }
    </style>
<body>
<div class="header">
        <a href="Home.php"><h1 class="Home">Home</h1></a>
        <a href="admin.php"><h1 class="Admin">Admin</h1></a>
        <a href="Orders.php"><h1 class="Orders">Orders</h1></a>        
        <a href="Products.php"><h1 class="Products">Products</h1></a>
    </div>
    <?php
     $pdo = new PDO("mysql:host=localhost;dbname=jontix", "root", "1226");
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
     // Verileri çekme işlemi
     $sql = "SELECT * FROM orders";
     $stmt = $pdo->prepare($sql);
     $stmt->execute();
     $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
     
     // Tablo oluşturma
     echo "<table class='styled-table'>
     <thead>
         <tr>
             <th>Card Type</th>
             <th>Card Number</th>
             <th>Expiry Date</th>
             <th>CVV</th>
             <th>Name</th>
             <th>Zip Code</th>
             <th>Address</th>
             <th>Product</th>
             <th>Total</th>
             <th>Status</th>
         </tr>
     </thead>
     <tbody>";

// Verileri tabloya ekleme
foreach ($orders as $order) {
 echo "<tr>
         <td>{$order['card_type']}</td>
         <td>{$order['card_number']}</td>
         <td>{$order['expiry_date']}</td>
         <td>{$order['cvv_']}</td>
         <td>{$order['name']}</td>
         <td>{$order['zip_code']}</td>
         <td>{$order['address']}</td>
         <td>{$order['product']}</td>
         <td>{$order['total']}</td>
         <td>{$order['status']}</td>
       </tr>";
}
echo "</tbody></table>";
     ?>
</body>
</html>