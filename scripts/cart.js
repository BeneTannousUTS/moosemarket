document.addEventListener('DOMContentLoaded', () => {
    const cartBadge = document.querySelector('.cart-badge');
    let cartCount = 0; // Move cartCount to the outer scope

    const updateCartBadge = () => {
        fetch('getCartTotal.php')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    cartCount = data.totalQuantity; // Update cartCount here
                    cartBadge.textContent = cartCount;
                    cartBadge.style.display = cartCount > 0 ? 'inline-block' : 'none';
                } else {
                    console.error('Error fetching cart total:', data.error);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    };

    // Call updateCartBadge once initially
    updateCartBadge();

    setInterval(updateCartBadge, 100);

    const addToCart = (productId, inStockQuantity) => {
        if (cartCount < inStockQuantity) {
            // Check if the product is already in the cart
            fetch('checkProductInCart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `productId=${productId}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success && data.exists) {
                    // Increment the quantity in the cart
                    updateProductQuantity(productId, 1);
                } else if (data.success && !data.exists) {
                    // Add new product to the cart
                    addNewProductToCart(productId);
                } else {
                    console.error('Error checking product in cart:', data.error);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        } else {
            alert('Cannot add more than available in stock!');
        }
    };

    const addNewProductToCart = (productId) => {
        fetchProductDetails(productId)
        .then(product => {
            sendToCart(product);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    };

    const updateProductQuantity = (productId, quantity) => {
        fetch('updateProductQuantity.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `productId=${productId}&quantity=${quantity}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Product quantity updated successfully.');
                updateCartBadge();
            } else {
                console.error('Error updating product quantity:', data.error);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    };

    const fetchProductDetails = (productId) => {
        return fetch('getProductDetails.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `productId=${productId}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                return data.product;
            } else {
                throw new Error(data.error);
            }
        });
    };

    const sendToCart = (product) => {
        fetch('addToCart.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `productId=${product.prod_ID}&productName=${product.prod_name}&price=${product.unit_promo_price}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Product added to cart successfully.');
                updateCartBadge();
            } else {
                console.error('Error adding product to cart:', data.error);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    };

    const buttons = document.querySelectorAll('.productButton');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const productId = button.getAttribute('data-product-id');
            const inStockQuantity = parseInt(button.getAttribute('data-in-stock'), 10);
            addToCart(productId, inStockQuantity);
        });
    });
});
