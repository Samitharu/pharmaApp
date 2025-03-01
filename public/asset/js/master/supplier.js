    // Initialize DataTable
    const table = document.querySelector('#supplierListTable');
    if (table) {
        new DataTable(table, {
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            lengthMenu: [5, 10, 25, 50]
        });
    }
