<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
</head>
<style>
      body {
            font-family: sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            
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
        .welcome-message {
            margin-top: 50px;
            text-align: center;
            font-size: 24px;
        }
        a:link {
        text-decoration:none;
        }
</style>
<body> 
    <div class="header">
        <a href="Home.php"><h1 class="Home">Home</h1></a>
        <a href="admin.php"><h1 class="Admin">Admin</h1></a>
        <a href="Orders.php"><h1 class="Orders">Orders</h1></a>        
        <a href="Products.php"><h1 class="Products">Products</h1></a>
    </div>
    <div class="welcome-message">
        <p>Welcome Sir.<p>
    </div>
</body>
</html>