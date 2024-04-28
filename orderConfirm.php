<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - Moose Market</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">

    <?php include 'header.php'; ?>

    <header>
        <h1>Order Confirmation</h1>
    </header>

    <section class="order-confirmation">
        <h2>Your order has been confirmed!</h2>
        <p>Thank you for shopping with Moose Market. Your order has been successfully placed.</p>
        <p>An email confirmation has been sent to your email address.</p>
    </section>

</div>

</body>
</html>

<?php
// Update the in_stock quantity for each product in the order
$stmt = $conn->prepare("UPDATE products p JOIN order_details od ON p.prod_ID = od.prod_ID SET p.in_stock = p.in_stock - od.quantity");
$stmt->execute();
$stmt->close();

// Clear all rows in the order_details table
$clearOrderDetailsStmt = $conn->prepare("DELETE FROM order_details");
$clearOrderDetailsStmt->execute();
$clearOrderDetailsStmt->close();

// Close connection
$conn->close();
?>
