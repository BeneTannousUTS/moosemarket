function validateForm() {
    // Get form fields
    var firstName = document.getElementById("firstName").value;
    var lastName = document.getElementById("lastName").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var streetAddress = document.getElementById("streetAddress").value;
    var postcode = document.getElementById("postcode").value;
    var suburb = document.getElementById("suburb").value;
    var state = document.getElementById("state").value;

    // Perform validation
    if (
        firstName !== "" &&
        lastName !== "" &&
        email !== "" &&
        phone !== "" &&
        streetAddress !== "" &&
        postcode !== "" &&
        suburb !== "" &&
        state !== ""
    ) {
        // Enable the button if all fields are filled
        document.getElementById("checkoutButton").disabled = false;
    } else {
        // Disable the button if any field is empty
        document.getElementById("checkoutButton").disabled = true;
    }
}