<?php
include 'config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to calculate the sum of all quantities in the order_details table
$sql = "SELECT SUM(quantity) AS total_quantity FROM order_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalQuantity = $row['total_quantity'];
    echo $totalQuantity;
} else {
    echo 0;
}

// Close connection
$conn->close();
?>
