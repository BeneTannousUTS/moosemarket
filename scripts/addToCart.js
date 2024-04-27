document.addEventListener("DOMContentLoaded", function() {
    const addToCartButtons = document.querySelectorAll('.productButton');
    
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = button.dataset.productId;
            const inStock = button.dataset.inStock;

            if (inStock > 0) {
                addToCart(productId);
            } else {
                console.log("Product is out of stock.");
            }
        });
    });
});

function addToCart(productId) {
    fetch('addToCart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'productId=' + encodeURIComponent(productId)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Failed to add product to cart.');
        }
        return response.text();
    })
    .then(message => {
        console.log(message); // Output success message to console
    })
    .catch(error => {
        console.error('Error adding product to cart:', error);
        alert(error.message); // Alert the user if there's an error
    });
}
