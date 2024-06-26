<?php
include 'config.php';

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Try selecting the database
try {
    mysqli_select_db($conn, $dbname);
} catch (Exception $e) {
    // Redirect to homepage if database doesn't exist
    header('Location: index.php');
    exit;
}

$searchQuery = isset($_GET['q']) ? $_GET['q'] : '';
$categoryQuery = isset($_GET['category']) ? $_GET['category'] : '';

if (!empty($categoryQuery)) {
    // Query products based on the category
    $stmt = $conn->prepare("SELECT * FROM products WHERE category = ?");
    $stmt->bind_param("s", $categoryQuery);
} else {
    // Query products based on the search query
    $stmt = $conn->prepare("SELECT * FROM products WHERE prod_name LIKE ?");
    $searchParam = "%" . $searchQuery . "%";
    $stmt->bind_param("s", $searchParam);
}

$stmt->execute();
$result = $stmt->get_result();

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php 
        if (!empty($categoryQuery)) {
            echo ucwords($categoryQuery) . " - ";
        }
        ?>Moose Market</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">

    <!-- Logo and Search Bar -->
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

    <!-- Search Results or Category Title -->
    <div class="heading">
        <?php
        if (!empty($categoryQuery)) {
            echo '<h1>Browse ' . ucwords($categoryQuery) . ' items</h1>';
        } else {
            echo '<h1>Search Results for "' . htmlspecialchars($searchQuery) . '"</h1>';
        }
        ?>
    </div>

    <!-- Product List -->
    <div class="product-list">
        <?php 
        if (!empty($categoryQuery)) {
            include 'categoryProducts.php';
        } else {
            include 'searchedProducts.php';
        }
        ?>
    </div>

</div>

<script src="scripts/cartBadge.js"></script>
<script src="scripts/addToCart.js"></script>
<script src="scripts/checkInStock.js"></script>
</body>
</html>
