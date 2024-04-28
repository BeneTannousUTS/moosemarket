function confirmClearCart() {
    if (confirm('Are you sure you want to clear your cart?')) {
        // If user confirms, submit the form
        document.getElementById('clearCartForm').submit();
    }
}