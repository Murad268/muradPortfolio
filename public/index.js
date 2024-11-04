function checkUrl() {
    let currentUrl = window.location.href;

    if (currentUrl.includes('/nova/resources/about-uses') && !currentUrl.includes('edit')) {
        window.location.href = '/nova/resources/about-uses/1/edit';
    }

    if (currentUrl.includes('/nova/resources/about-uses/1/edit')) {

        let updateButton = document.querySelector('[dusk="update-button"]');
        let cancelButton = document.querySelector('[dusk="cancel-update-button"]');

        if (updateButton) {
            updateButton.style.display = "none";
        }

        if (cancelButton) {
            cancelButton.style.display = "none";
        }
    }
}

window.onload = function() {
    checkUrl();
    setInterval(checkUrl, 500);
};
