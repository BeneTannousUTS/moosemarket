<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Moose Market</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">

    <?php include 'header.php'; ?>
    
    <!-- Heading -->
    <div class="heading">
        <h1>Your Shopping Cart</h1>
    </div>

    <!-- Include cart items -->
    <?php include 'cartProducts.php'; ?>

   <!-- Total price calculation and display -->
   <div class="total-price">
        <?php
        // Fetch the prices of individual items from the order_details table
        $sql = "SELECT SUM(quantity * price) AS total_price FROM order_details";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $totalPrice = $row['total_price'];
            echo "<p><strong>Total Price: $" . number_format($totalPrice, 2) . "</strong></p>";

            // Get the count of items in the cart
            $itemCountQuery = "SELECT COUNT(*) AS itemCount FROM order_details";
            $itemCountResult = $conn->query($itemCountQuery);
            $itemCountRow = $itemCountResult->fetch_assoc();
            $itemCount = $itemCountRow['itemCount'];
        } else {
            echo "<p><strong>Total Price: $0.00</strong></p>";
            $itemCount = 0; // If no items found, set count to 0
        }
        ?>
        
        <!-- Checkout form if there are items in the cart -->
        <?php if ($itemCount > 0) : ?>
            <form action="checkout.php" method="get">
                <input type="hidden" name="items" value='<?php echo serialize($_SESSION["shopping_cart"]); ?>'>
                <input type="hidden" name="totalPrice" value="<?php echo $totalPrice; ?>">
                
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" required>
                
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" required>
                
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Mobile Phone Number:</label>
                <input type="phone" id="phone" name="phone" required>
                
                <label for="address">Shipping Address:</label>
                <textarea id="address" name="address" rows="4" cols="50" required></textarea>
                
                <br>
                
                <input id="checkoutButton" type="submit" value="Check Out">
            </form>
            
        <!-- Display an error message if no items were found in the cart -->
        <?php else : ?>
            <p>No Items Found! Please add some products to your shopping cart.</p>
        <?php endif; ?>
    </div>
</div>
<script src="scripts/cartBadge.js"></script>
<script src="scripts/validateDetails.js"></script>
</body>
</html>
