<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assignment_1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT SUM(quantity) AS totalQuantity FROM order_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalQuantity = $row['totalQuantity'];
    echo json_encode(['success' => true, 'totalQuantity' => $totalQuantity]);
} else {
    echo json_encode(['success' => false, 'error' => 'No items in cart']);
}

$conn->close();
?>
