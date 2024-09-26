document.addEventListener('DOMContentLoaded', function () {
    // Example: Toggle visibility of services and contacts sections
    const servicesSection = document.getElementById('services-section');
    const contactsSection = document.getElementById('contacts-section');

    const toggleServicesButton = document.getElementById('toggle-services');
    const toggleContactsButton = document.getElementById('toggle-contacts');

    if (toggleServicesButton) {
        toggleServicesButton.addEventListener('click', function () {
            if (servicesSection.style.display === "none" || servicesSection.style.display === "") {
                servicesSection.style.display = "block";
                toggleServicesButton.innerText = "Hide Services";
            } else {
                servicesSection.style.display = "none";
                toggleServicesButton.innerText = "Show Services";
            }
        });
    }

    if (toggleContactsButton) {
        toggleContactsButton.addEventListener('click', function () {
            if (contactsSection.style.display === "none" || contactsSection.style.display === "") {
                contactsSection.style.display = "block";
                toggleContactsButton.innerText = "Hide Contacts";
            } else {
                contactsSection.style.display = "none";
                toggleContactsButton.innerText = "Show Contacts";
            }
        });
    }
});
