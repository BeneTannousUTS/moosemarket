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
    $productName = $_POST['productName'];
    $price = $_POST['price'];
    $quantity = 1; // Default quantity
    
    // Check if product already exists in order_details table
    $check_sql = "SELECT * FROM order_details WHERE product_id = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("i", $productId);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();
    
    if ($check_result->num_rows > 0) {
        // Product already exists, update quantity
        $update_sql = "UPDATE order_details SET quantity = quantity + 1 WHERE product_id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("i", $productId);
        
        if ($update_stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to update quantity']);
        }
        
        $update_stmt->close();
    } else {
        // Product does not exist, insert new row
        $insert_sql = "INSERT INTO order_details (product_id, product_name, quantity, price) 
                       VALUES (?, ?, ?, ?)";
        
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("issd", $productId, $productName, $quantity, $price);
        
        if ($insert_stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to add product to cart']);
        }
        
        $insert_stmt->close();
    }
    
    $check_stmt->close();
    $conn->close();
}
?>
