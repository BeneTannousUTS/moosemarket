<?php
include 'config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get search query from URL parameter
$searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

// Query products based on the search query
$stmt = $conn->prepare("SELECT * FROM products WHERE prod_name LIKE ?");
$searchParam = "%" . $searchQuery . "%";
$stmt->bind_param("s", $searchParam);
$stmt->execute();
$result = $stmt->get_result();

// Close connection
$conn->close();
?>

<?php
if ($result->num_rows > 0) {
    echo '<div class="product-container">';
    while($row = $result->fetch_assoc()) {
        echo '<div class="product">';
        echo '<img src="productImgs/' . $row['prod_ID'] . '.png" alt="' . $row['prod_name'] . '">';
        echo '<h3>' . $row['prod_name'] . '</h3>';
        echo '<h3 id="price">$' . $row['unit_price'] . '</h3>';
        echo '<button class="productButton" data-product-id="' . $row['prod_ID'] . '" data-in-stock="' . $row['in_stock'] . '">Add to Cart</button>';
        echo '</div>';
    }
    echo '</div>'; // Close product-container
} else {
    echo '<p>No products found with the specified keywords.</p>';
}
?>
