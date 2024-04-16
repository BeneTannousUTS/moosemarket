<?php include 'initDatabase.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moose Market</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">

    <!-- Logo and Search Bar -->
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
        <h1>Welcome to Moose Market!</h1>
        <p>Find the best deals on your favorite products!</p>
    </div>

    <!-- Featured Products -->
    <div class="featured-products">
        <h2>Featured Products</h2>
        <?php include 'featuredProducts.php'; ?>
    </div>

    <!-- Browse by Category -->
    <div class="Browse by Category">
        <h2>Categories</h2>
        <div class="category">
            <button id="categoryButton">Produce</button>
        </div>
    </div>

</div>

<script src="scripts/cart.js"></script>

</body>
</html>
