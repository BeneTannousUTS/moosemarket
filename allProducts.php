<?php
include 'config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query all products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="product-list">';
    while($row = $result->fetch_assoc()) {
        echo '<div class="product">';
        echo '<img src="productImgs/' . $row['prod_ID'] . '.png" alt="' . $row['prod_name'] . '">';
        echo '<h3>' . $row['prod_name'] . '</h3>';
        if($row['unit_promo_price']  != null) {
            echo '<p><del>$' . $row['unit_price'] . '</del></p>';
            echo '<p id="promo-price"><strong style="font-size: 24px;">$' . number_format($row['unit_promo_price'], 2) . '</strong></p>';
        } else {
            echo '<p id="price">$' . number_format($row['unit_price'], 2) . '</p>';
        }
        
        // Check if product is in stock
        if ($row['in_stock'] > 0) {
            // In stock, display add to cart button
            echo '<button class="productButton" data-product-id="' . $row['prod_ID'] . '" data-in-stock="' . $row['in_stock'] . '">Add to Cart</button>';
        } else {
            // Out of stock, display disabled button
            echo '<button class="productButton" data-product-id="' . $row['prod_ID'] . '" data-in-stock="0" disabled>Out of Stock</button>';
        }
        
        echo '</div>';
    }
    echo '</div>'; // Close product-list
} else {
    echo '<p>No products found.</p>';
}

// Close connection
$conn->close();
?>
