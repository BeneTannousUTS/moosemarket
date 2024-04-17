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

        <!-- Category Buttons -->
        <div class="category-buttons">
            <?php
            $sql = "SELECT DISTINCT category FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<button class="category-button">' . $row['category'] . '</button>';
                }
            }
            ?>
        </div>
    </div>

    <!-- Heading -->
    <div class="heading">
        <h1>Welcome to Moose Market!</h1>
    </div>

    <!-- Featured Products -->
    <div class="featured-products">
        <h2>Check out our best deals!</h2>
        <?php include 'featuredProducts.php'; ?>
    </div>

</div>

<script src="scripts/cart.js"></script>

</body>
</html>
