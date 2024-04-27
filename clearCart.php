<?php
include 'config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to delete all rows from the order_details table
$sql = "DELETE FROM order_details";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
            exit;
} else {
    echo "Error clearing cart: " . $conn->error;
}

// Close connection
$conn->close();
?>
