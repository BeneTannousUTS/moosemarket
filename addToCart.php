<?php
include 'config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if productId is set in the POST data
if (isset($_POST['productId'])) {
    $productId = $_POST['productId'];

    // Check if the product exists and has sufficient stock
    $stmt = $conn->prepare("SELECT in_stock, unit_price, unit_promo_price FROM products WHERE prod_ID = ?");
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $inStock = $row['in_stock'];
        $unitPrice = $row['unit_price'];
        $promoPrice = $row['unit_promo_price'];

        if ($inStock > 0) {
            // Check if the product already exists in the order_details table
            $stmt = $conn->prepare("SELECT * FROM order_details WHERE prod_ID = ?");
            $stmt->bind_param("i", $productId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // If the product exists in the cart, check if adding more exceeds stock
                $row = $result->fetch_assoc();
                $currentQuantity = $row['quantity'];

                if ($currentQuantity < $inStock) {
                    // Increment the quantity if it's within stock limit
                    $quantity = $currentQuantity + 1;

                    $updateStmt = $conn->prepare("UPDATE order_details SET quantity = ? WHERE prod_ID = ?");
                    $updateStmt->bind_param("ii", $quantity, $productId);
                    $updateStmt->execute();

                    if ($updateStmt->affected_rows > 0) {
                        echo "Quantity updated successfully.";
                    } else {
                        echo "Failed to update quantity";
                    }

                    $updateStmt->close();
                } else {
                    echo "Cannot add more, already at maximum stock limit.";
                }
            } else {
                // Determine the price to use based on whether there's a promo price
                $price = $promoPrice !== null ? $promoPrice : $unitPrice;

                // If the product doesn't exist in the cart, add a new row
                $addStmt = $conn->prepare("INSERT INTO order_details (prod_ID, prod_name, quantity, price) SELECT prod_ID, prod_name, 1, ? FROM products WHERE prod_ID = ?");
                $addStmt->bind_param("di", $price, $productId);
                $addStmt->execute();

                if ($addStmt->affected_rows > 0) {
                    echo "Product added to cart successfully.";
                } else {
                    echo "Failed to add product to cart.";
                }

                $addStmt->close();
            }
        } else {
            echo "This product is out of stock.";
        }
    } else {
        echo "Product not found.";
    }

    $stmt->close();
} else {
    echo "Product ID is not set.";
}

// Close connection
$conn->close();
?>
