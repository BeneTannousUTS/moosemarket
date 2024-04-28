<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary - Moose Market</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">

    <?php include 'header.php'; ?>

    <header>
        <h1>Order Summary</h1>
    </header>

    <section class="order-details">
        <h2>Order Details</h2>
        <!-- Display order details here -->
        <?php
        // Retrieve form data from $_POST array
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $streetAddress = $_POST['streetAddress'];
        $postcode = $_POST['postcode'];
        $suburb = $_POST['suburb'];
        $state = $_POST['state'];
        $totalPrice = $_POST['totalPrice'];

        // Generate order number (you may implement your own logic here)
        $orderNumber = '#' . rand(100000, 999999);

        // Display order details
        echo "<p><strong>Order Number:</strong> $orderNumber</p>";
        echo "<p><strong>Date:</strong> " . date("F j, Y") . "</p>";
        ?>
    </section>

    <section class="customer-details">
        <h2>Customer Information</h2>
        <!-- Display customer information here -->
        <p><strong>Name:</strong> <?php echo "$firstName $lastName"; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Phone:</strong> <?php echo $phone; ?></p>
        <p><strong>Shipping Address:</strong> <?php echo "$streetAddress, $suburb, $state $postcode"; ?></p>
    </section>

    <section class="cart-contents">
        <h2>Cart Contents</h2>
        <!-- Retrieve cart items and display them here -->
        <?php
        include 'config.php';

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query cart items
        $stmt = $conn->prepare("SELECT od.*, p.in_stock, p.unit_price, p.prod_name FROM order_details od JOIN products p ON od.prod_ID = p.prod_ID");
        $stmt->execute();
        $result = $stmt->get_result();

        // Display cart items
        if ($result->num_rows > 0) {
            echo '<ul>';
            while ($row = $result->fetch_assoc()) {
                echo '<li>';
                echo '<strong>' . $row['prod_name'] . '</strong> - ';
                echo 'Quantity: ' . $row['quantity'] . ', ';
                echo 'Price: $' . number_format($row['price'] * $row['quantity'], 2);
                echo '</li>';
            }
            echo '</ul>';
        }
        echo "<p><strong>Total Price:</strong> $" . number_format($totalPrice, 2) . "</p>";

        // Close connection
        $conn->close();
        ?>
    </section>

    <!-- Confirmation button -->
    <button id='confirm-order' onclick="window.location.href = 'orderConfirm.php';">Confirm Order</button>

</div>
</body>
</html>
