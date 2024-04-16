<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql_create_db = "CREATE DATABASE IF NOT EXISTS assignment_1";
if ($conn->query($sql_create_db) === TRUE) {
    echo "<script>console.log('Database created successfully.');</script>";
} else {
    echo "<script>console.error('Error creating database: " . $conn->error . "');</script>";
    exit();
}

// Select database
$conn->select_db("assignment_1");

// Read SQL file for products table creation
$sql_file_products = file_get_contents('sql/products.sql');
$queries_products = explode(';', $sql_file_products);

foreach ($queries_products as $query) {
    if (trim($query) !== '') {
        if ($conn->query($query) === FALSE) {
            echo "<script>console.error('Error creating products table: " . $conn->error . "');</script>";
            exit();
        }
    }
}

echo "<script>console.log('Products table created successfully.');</script>";

// Read SQL file for order_details table creation
$sql_file_order_details = file_get_contents('sql/order.sql');
$queries_order_details = explode(';', $sql_file_order_details);

foreach ($queries_order_details as $query) {
    if (trim($query) !== '') {
        if ($conn->query($query) === FALSE) {
            echo "<script>console.error('Error creating order_details table: " . $conn->error . "');</script>";
            exit();
        }
    }
}

echo "<script>console.log('Order_details table created successfully.');</script>";

// Close connection
$conn->close();
?>
