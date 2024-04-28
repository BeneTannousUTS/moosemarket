function checkQuantity(input) {
    if (parseInt(input.value) > parseInt(input.getAttribute('max'))) {
        input.value = input.getAttribute('max');
    } else if (parseInt(input.value) < 0) {
        input.value = 0;
    }
}