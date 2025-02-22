document.addEventListener('DOMContentLoaded', function() {
    // Initialize DataTable
    const table = document.querySelector('#example');
    if (table) {
        new DataTable(table, {
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            lengthMenu: [5, 10, 25, 50]
        });
    }

    // Image Preview
    const imageUpload = document.querySelector('#imageUpload');
    const preview = document.querySelector('#preview');

    if (imageUpload) {
        imageUpload.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                }
                reader.readAsDataURL(file);
            }
        });
    }
});
