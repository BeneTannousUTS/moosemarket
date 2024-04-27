<?php
include 'config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch order details from the database
$query = "SELECT * FROM order_details";
$result = mysqli_query($conn, $query);

if (!$result) {
    // Error handling if query fails
    $response = array("error" => "Failed to fetch order details from the database.");
} else {
    // Convert the result set into an associative array
    $orderDetails = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $orderDetails[] = $row;
    }
    
    // Output the response as JSON
    header('Content-Type: application/json');
    echo json_encode($orderDetails);
}

// Close connection
$conn->close();
?>
