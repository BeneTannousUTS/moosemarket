function disableSelectStateOption(selectElement) {
    var selectedIndex = selectElement.selectedIndex;
    var options = selectElement.options;

    // Check if "Select State" option is selected and disable it
    if (selectedIndex === 0) {
        options[0].disabled = true;
    }
}
