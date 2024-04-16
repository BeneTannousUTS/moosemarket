<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assignment_1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch featured products with a non-null unit_promo_price
$sql = "SELECT * FROM products WHERE unit_promo_price IS NOT NULL";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<div class="product">';
        echo '<img src="productImgs/' . $row['prod_ID'] . '.png" alt="' . $row['prod_name'] . '">';
        echo '<h3>' . $row['prod_name'] . '</h3>';
        
        // Display unit_price with strikethrough font
        echo '<p><del>$' . $row['unit_price'] . '</del> </p> ';
        echo '<p><strong style="font-size: 24px;">$' . $row['unit_promo_price'] . '</strong></p>';
        echo '<p style="font-size: 10px;">' . $row['in_stock'] . ' in stock.</p>';
        
        // Add unique ID to button
        echo '<button class="productButton" data-product-id="' . $row['prod_ID'] . '" data-in-stock="' . $row['in_stock'] . '">Add to Cart</button>';
        echo '</div>';
    }
} else {
    echo '<p>No featured products available.</p>';
}

// Close connection
$conn->close();
?>
