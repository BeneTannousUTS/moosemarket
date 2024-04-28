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

    <?php include 'header.php'; ?>

    <!-- Category Buttons -->
    <div class="category-buttons">
        <?php
            $sql = "SELECT DISTINCT category FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $category = $row['category'];
                    echo '<a href="search.php?category=' . urlencode($category) . '" class="category-link"><button class="category-button">' . $category . '</button></a>';
                }
            }
        ?>
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

    <!-- All Products -->
    <div class="all-products">
        <h2>All Products</h2>
        <?php include 'allProducts.php'; ?>
    </div>

</div>

<script src="scripts/cartBadge.js"></script>
<script src="scripts/addToCart.js"></script>
<script src="scripts/checkInStock.js"></script>
</body>
</html>
