<?php
include 'config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get category from URL parameter
if (isset($_GET['category'])) {
    $selectedCategory = $_GET['category'];
} else {
    // Redirect to homepage if category is not specified
    header('Location: index.php');
    exit;
}

// Query products based on the selected category
$stmt = $conn->prepare("SELECT * FROM products WHERE category = ?");
$stmt->bind_param("s", $selectedCategory);
$stmt->execute();
$result = $stmt->get_result();

// Close connection
$conn->close();
?>

<?php
if ($result->num_rows > 0) {
    echo '<div class="product-list">';
    while($row = $result->fetch_assoc()) {
        echo '<div class="product">';
        echo '<img src="productImgs/' . $row['prod_ID'] . '.png" alt="' . $row['prod_name'] . '">';
        echo '<h3>' . $row['prod_name'] . '</h3>';
        echo '<p id="price">$' . $row['unit_price'] . '</p>';
        echo '<button class="productButton" data-product-id="' . $row['prod_ID'] . '" data-in-stock="' . $row['in_stock'] . '">Add to Cart</button>';
        echo '</div>';
    }
    echo '</div>'; // Close product-list
} else {
    echo '<p>No products found in this category.</p>';
}
?>
