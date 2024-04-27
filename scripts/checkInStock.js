function addToCart(productId) {
    // Make an AJAX request to addToCart.php
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'addToCart.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Check the response from the PHP file and display the appropriate alert
                if (xhr.responseText === "Cannot add more, already at maximum stock limit.") {
                    alert("Cannot add more, already at maximum stock limit.");
                } else {
                    console.log(xhr.responseText);
                }
            } else {
                alert('An error occurred while processing your request.');
            }
        }
    };
    xhr.send('productId=' + encodeURIComponent(productId));
}