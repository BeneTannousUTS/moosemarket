<?php include 'initDatabase.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Moose Market</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">

    <?php include 'header.php'; ?>
    
    <!-- Heading -->
    <div class="heading">
        <h1>Your Shopping Cart</h1>
    </div>

    <!-- Cart Items -->
    <div class="cart-items">
        <!-- Placeholder for Cart Items -->
        <p>Your cart is empty.</p>
    </div>

</div>

<script src="scripts/cart.js"></script>

</body>
</html>
