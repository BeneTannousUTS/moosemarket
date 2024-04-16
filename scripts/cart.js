document.addEventListener('DOMContentLoaded', () => {
    const cartBadge = document.querySelector('.cart-badge');

    let cartCount = 0;

    const updateCartBadge = () => {
        cartBadge.textContent = cartCount;
        cartBadge.style.display = cartCount > 0 ? 'inline-block' : 'none';
    };

    const addToCart = (productId, inStockQuantity) => {
        if (cartCount < inStockQuantity) {
            cartCount++;
            updateCartBadge();
            fetchProductDetails(productId);
        } else {
            alert('Cannot add more than available in stock!');
        }
    };

    const fetchProductDetails = (productId) => {
        fetch('getProductDetails.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `productId=${productId}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                sendToCart(data.product);
            } else {
                console.error('Error fetching product details:', data.error);
            }
        })
        .catch(error => {
            console.error('Error:', error);
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
