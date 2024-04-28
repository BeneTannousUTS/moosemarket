document.addEventListener("DOMContentLoaded", function() {
    var buttons = document.querySelectorAll(".productButton");
    buttons.forEach(function(button) {
        button.addEventListener("click", function() {
            var inStock = parseInt(button.dataset.inStock);
            if (inStock <= 0) {
                alert("This item is currently out of stock.");
            }
        });
    });
});
