<?php 
include 'initDatabase.php';
include 'initTables.php';
?>

<!-- Logo and Search Bar -->
<div class="header">
    <div class="logo">
        <a href="index.php">
            <img src="icons/MooseMarket.png" alt="Moose Market Logo">
        </a>
    </div>

    <div class="search-bar">
        <form action="search.php" method="get">
            <input type="text" name="q" placeholder="Search for products...">
            <button type="submit" id="searchButton">Search</button>
        </form>
    </div>

    <div class="cart-button">
        <a href="cart.php">
            <img class="cart-image-button" src="icons/cart.png" alt="Cart" id="addToCartButton">
            <span class="cart-badge">
                <?php echo isset($_SESSION['cartCount']) ? $_SESSION['cartCount'] : 0; ?>
            </span>
        </a>
    </div>
</div>