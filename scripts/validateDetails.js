document.addEventListener("DOMContentLoaded", function() {
    const firstNameInput = document.getElementById("firstName");
    const lastNameInput = document.getElementById("lastName");
    const emailInput = document.getElementById("email");
    const phoneInput = document.getElementById("phone");
    const addressInput = document.getElementById("address");
    const checkoutButton = document.getElementById("checkoutButton");

    // Function to check if all required fields are filled
    function checkFormValidity() {
        const firstNameValid = firstNameInput.value.trim() !== "";
        const lastNameValid = lastNameInput.value.trim() !== "";
        const emailValid = emailInput.value.trim() !== "";
        const phoneValid = phoneInput.value.trim() !== "";
        const addressValid = addressInput.value.trim() !== "";

        // Enable checkout button if all fields are filled, otherwise disable it
        if (firstNameValid && lastNameValid && emailValid && phoneValid && addressValid) {
            checkoutButton.disabled = false;
        } else {
            checkoutButton.disabled = true;
        }
    }

    // Add event listeners to input fields to check validity on input change
    firstNameInput.addEventListener("input", checkFormValidity);
    lastNameInput.addEventListener("input", checkFormValidity);
    emailInput.addEventListener("input", checkFormValidity);
    phoneInput.addEventListener("input", checkFormValidity);
    addressInput.addEventListener("input", checkFormValidity);

    // Check form validity initially
    checkFormValidity();
});
