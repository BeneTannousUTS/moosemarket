<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <div class="logo">
        <img src="/images/Moose Market.png" alt="Online Shop Logo">
    </div>

    <div class="heading">
        <h1>Welcome to Our Online Shop</h1>
        <p>Find the best deals on your favorite products!</p>
    </div>

    <div class="search-bar">
        <input type="text" placeholder="Search for products...">
        <button id="searchButton">Search</button>
    </div>

    <div class="featured-products">

        <h2>Featured Products</h2>
        <?php include 'featuredProducts.php'; ?>
    </div>

    <div class="Browse by Category">
        <h2>Categories</h2>
        <div class="category">
            <button id="categoryButton">Produce</button>
            
        </div>
    </div>
</div>

</body>
</html>
