<?php
include 'config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get productId from POST data
$productId = $_POST['productId'];

// Check if product exists in order_details
$stmt = $conn->prepare("SELECT * FROM order_details WHERE prod_ID = ?");
$stmt->bind_param("i", $productId);
$stmt->execute();
$result = $stmt->get_result();

$data = [];

if ($result->num_rows > 0) {
    $data['success'] = true;
    $data['exists'] = true;
} else {
    $data['success'] = true;
    $data['exists'] = false;
}

echo json_encode($data);

$stmt->close();
$conn->close();
?>
