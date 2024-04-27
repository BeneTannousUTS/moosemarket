document.addEventListener("DOMContentLoaded", function() {
    // Get the cart badge element
    const cartBadge = document.querySelector('.cart-badge');

    // Function to update the cart badge
    function updateCartBadge() {
        // Make an AJAX request to retrieve the total quantity from the server
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'getCartCount.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    const cartCount = parseInt(xhr.responseText);
                    if (!isNaN(cartCount) && cartCount > 0) {
                        cartBadge.textContent = cartCount;
                        cartBadge.style.display = 'block';
                    } else {
                        cartBadge.style.display = 'none';
                    }
                } else {
                    console.error('Failed to retrieve cart count: ' + xhr.status);
                }
            }
        };
        xhr.send();
    }

    // Update the cart badge initially
    updateCartBadge();

    // Update the cart badge every second
    setInterval(updateCartBadge, 200);
});
