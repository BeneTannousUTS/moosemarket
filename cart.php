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

    <!-- Header -->
    <div class="header">
        <div class="logo">
            <a href="index.php">
                <img src="icons/MooseMarket.png" alt="Moose Market Logo">
            </a>
        </div>

        <div class="search-bar">
            <input type="text" placeholder="Search for products...">
            <button id="searchButton">Search</button>
        </div>

        <div class="cart-button">
            <a href="cart.php" style="position: relative;">
                <img class="cart-image-button" src="icons/cart.png" alt="Cart" id="addToCartButton">
                <span class="cart-badge">0</span>
            </a>
        </div>
    </div>

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
