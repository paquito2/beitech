<?php
    session_start();
    if(!isset($_SESSION['cont'])){
        $_SESSION['cont'] = 0;
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/order.js"></script>
    <link rel="stylesheet" href="css/style.css">    
</head>
<body>
    <div id="contenedor">
        <header>
            <h1>Products</h1>            
        </header>
        <section>
        <div id='contain_car_order'>
            <div id="car_order">            
            </div>
        </div>
        <a href='php/destroy.php'><button>Cancel</button></a>
        <form id="createOrder" method="POST" action="confirm.php">
            <button>Confirm Order</button>
        </form>