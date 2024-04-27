<?php
include 'config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query products from order table with in_stock information
$stmt = $conn->prepare("SELECT od.*, p.in_stock FROM order_details od JOIN products p ON od.prod_ID = p.prod_ID");
$stmt->execute();
$result = $stmt->get_result();
?>

<?php
if ($result->num_rows > 0) {
    echo '<div class="cart-list">';
    while ($row = $result->fetch_assoc()) {
        echo '<div class="cart-product">';
        echo '<img src="productImgs/' . $row['prod_ID'] . '.png" alt="' . $row['prod_name'] . '">';
        echo '<h3>' . $row['prod_name'] . '</h3>';
        echo '<p id="cartItemPrice">$' . number_format($row['price'], 2) . '</p>';
        echo '<form id="updateForm_' . $row['prod_ID'] . '" action="updateQuantity.php" method="post">'; // Form for updating quantity
        echo '<input type="hidden" name="productId" value="' . $row['prod_ID'] . '">'; // Hidden input for product ID
        echo '<input id="quantity_' . $row['prod_ID'] . '" type="number" name="quantity" value="' . $row['quantity'] . '" min="0" max="' 
            . $row['in_stock'] . '" onchange="submitForm(' . $row['prod_ID'] . ')">'; // Input field for quantity with maximum set to in_stock value
        echo '</form>';
        echo '</div>';
    }
    echo '</div>'; // close cart-product-list
}
?>

<script>
    function submitForm(productId) {
        document.getElementById('updateForm_' + productId).submit();
    }
</script>
