<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <style>
       body {
            font-family: 'Roboto', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(45deg, #333, #555);
            color: #fff;
        }
        .success-container {
            background-color: #fff;
            color: #333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
            text-align: center;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.5s ease-out forwards;
        }
        h1 {
            color: #4CAF50;
        }
        p {
            color: #555;
            font-size: 18px;
            margin-bottom: 20px;
        }
        .icon {
            font-size: 60px;
            color: #4CAF50;
            margin-bottom: 10px;
            
        }
        .icon:hover {
            transform: rotate(360deg) scale(1.2);
            transition: transform 0.3s ease-in-out;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    <div class="success-container">
        <div class="icon">✅</div>
        <h1>Payment Successful.</h1>
        <p>We thank you. Your order has been received and will be processed. Your cargo will reach you within a week.</p>
    </div>
</body>
</html>