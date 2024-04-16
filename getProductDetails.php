<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assignment_1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'error' => 'Connection failed: ' . $conn->connect_error]));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST['productId'];

    $sql = "SELECT * FROM products WHERE prod_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();
        echo json_encode(['success' => true, 'product' => $product]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to fetch product details']);
    }

    $stmt->close();
    $conn->close();
}
?>
