<?php
session_start();
if ( empty($_SESSION["username"]) ) {  
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        
        .container {
            width: 600px;
            margin-top: 40px;
            margin-left: auto;
            margin-right: auto;
            padding: 20px;
            text-align: center;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        h4 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
            background-color: #ff6b6b;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        
        .btn:hover {
            background-color: #e24c4c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h4>Order placed successfully! We will contact you <br>in 1-2 working days! Thanks for your purchase.</h4>
        <a href="phonesmain.php" class="btn btn-danger">Back to Phones List</a>
    </div>
</body>
</html>
