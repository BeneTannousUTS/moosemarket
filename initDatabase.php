<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assignment_1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS assignment_1";
if ($conn->query($sql) === TRUE) {
    echo "<script>console.log('Database created successfully.');</script>";
} else {
    echo "<script>console.error('Error creating database: " . $conn->error . "');</script>";
}

// Select database
$conn->select_db("assignment_1");

// Check if products table exists
$tableExists = false;
$result = $conn->query("SHOW TABLES LIKE 'products'");
if ($result->num_rows > 0) {
    $prodTableExists = true;
}

// If products table does not exist, create it
if (!$prodTableExists) {
    // Read SQL file
    $sql_file = file_get_contents('sql/products.sql');

    // Execute multi-query
    if ($conn->multi_query($sql_file)) {
        do {
            // Store first result set
            if ($result = $conn->store_result()) {
                $result->free();
            }
        } while ($conn->next_result());
        
        echo "<script>console.log('Database and table created successfully.');</script>";
    } else {
        echo "<script>console.error('Error creating tables: " . $conn->error . "');</script>";
    }
} else {
    echo "<script>console.log('Products table already exists.');</script>";
}

// Check if order_details table exists, if not create it
$sql_check_table = "SHOW TABLES LIKE 'order_details'";
$result = $conn->query($sql_check_table);

if ($result->num_rows == 0) {
    // Table does not exist, create it
    $sql_create_table = "
    CREATE TABLE order_details (
        id INT AUTO_INCREMENT PRIMARY KEY,
        product_id INT(10) NOT NULL,
        product_name VARCHAR(255) NOT NULL,
        quantity INT NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    if ($conn->query($sql_create_table) === TRUE) {
        echo "<script>console.log('Table order_details created successfully.');</script>";
    } else {
        echo "<script>console.error('Error creating table: " . $conn->error. "');</script>";
    }
}

// Do not close connection here
// $conn->close();
?>
