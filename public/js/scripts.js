document.addEventListener('DOMContentLoaded', function () {
    let serviceCount = 1; // Counter for services
    let contactCount = 1; // Counter for contacts

    document.getElementById('addService').addEventListener('click', function () {
        const servicesDiv = document.getElementById('services');
        const newService = `
            <div class="service">
                <div class="form-group">
                    <label for="service_name">Service Name</label>
                    <input type="text" name="services[${serviceCount}][service_name]" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="service_name_ar">Service Name (Arabic)</label>
                    <input type="text" name="services[${serviceCount}][service_name_ar]" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="services[${serviceCount}][description]" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="description_ar">Description (Arabic)</label>
                    <textarea name="services[${serviceCount}][description_ar]" class="form-control"></textarea>
                </div>
            </div>
        `;
        servicesDiv.insertAdjacentHTML('beforeend', newService);
        serviceCount++;
    });

    document.getElementById('addContact').addEventListener('click', function () {
        const contactsDiv = document.getElementById('contacts');
        const newContact = `
            <div class="contact">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="contacts[${contactCount}][email]" class="form-control">
                </div>
                <div class="form-group">
                    <label for="whatsapp">WhatsApp</label>
                    <input type="text" name="contacts[${contactCount}][whatsapp]" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phones">Phone Numbers</label>
                    <input type="text" name="contacts[${contactCount}][phones][0][phone_number]" class="form-control" required>
                </div>
            </div>
        `;
        contactsDiv.insertAdjacentHTML('beforeend', newContact);
        contactCount++;
    });
});
