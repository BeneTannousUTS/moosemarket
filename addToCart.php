<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assignment_1";

// Check if productId is set
if (isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $price = $_POST['price'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert into order_details
    $sql = "INSERT INTO order_details (product_id, product_name, quantity, price) 
            VALUES ('$productId', '$productName', 1, '$price')
            ON DUPLICATE KEY UPDATE quantity = quantity + 1";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }

    $conn->close();

    // Update cart count in session
    if (!isset($_SESSION['cartCount'])) {
        $_SESSION['cartCount'] = 0;
    }
    $_SESSION['cartCount']++;
}
?>
