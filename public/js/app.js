document.addEventListener('DOMContentLoaded', function () {
    // Auto-submit filters
    const filterForm = document.getElementById('filter-form');
    if (filterForm) {
        const autoSubmitFields = filterForm.querySelectorAll('[data-auto-submit]');
        autoSubmitFields.forEach(field => {
            field.addEventListener('change', () => filterForm.submit());
        });
    }

    // Delete confirmations
    const deleteButtons = document.querySelectorAll('[data-confirm]');
    deleteButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            if (!confirm(button.dataset.confirm)) {
                e.preventDefault();
            }
        });
    });

    // Image preview
    const imageInputs = document.querySelectorAll('[data-preview]');
    imageInputs.forEach(input => {
        input.addEventListener('change', function () {
            const preview = document.getElementById(this.dataset.preview);
            if (preview && this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = e => preview.src = e.target.result;
                reader.readAsDataURL(this.files[0]);
            }
        });
    });

    // Dismiss alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            const closeButton = alert.querySelector('.btn-close');
            if (closeButton) closeButton.click();
        }, 5000);
    });
}); 