<?php
include 'config.php';

// Check if productId and quantity are set in the POST data
if (isset($_POST['productId']) && isset($_POST['quantity'])) {
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // If the quantity is zero, delete the row from order_details table
    if ($quantity == 0) {
        $deleteStmt = $conn->prepare("DELETE FROM order_details WHERE prod_ID = ?");
        $deleteStmt->bind_param("i", $productId);
        $deleteStmt->execute();

        if ($deleteStmt->affected_rows > 0) {
            header("Location: cart.php");
            exit;
        }

        $deleteStmt->close();
    } else {
        // Update the quantity in order_details table
        $updateStmt = $conn->prepare("UPDATE order_details SET quantity = ? WHERE prod_ID = ?");
        $updateStmt->bind_param("ii", $quantity, $productId);
        $updateStmt->execute();

        if ($updateStmt->affected_rows > 0) {
            header("Location: cart.php");
            exit;
        }

        $updateStmt->close();
    }

    // Close connection
    $conn->close();
} else {
    header("Location: cart.php");
    exit;
}
?>
