<?php
include 'config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get productId and quantity from POST data
$productId = $_POST['productId'];
$quantity = $_POST['quantity'];

// Update product quantity in order_details
$stmt = $conn->prepare("UPDATE order_details SET quantity = quantity + ? WHERE prod_ID = ?");
$stmt->bind_param("ii", $quantity, $productId);

$data = [];

if ($stmt->execute()) {
    $data['success'] = true;
} else {
    $data['success'] = false;
    $data['error'] = "Failed to update product quantity";
}

echo json_encode($data);

$stmt->close();
$conn->close();
?>
