document.addEventListener('DOMContentLoaded', function() {
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

    //supplier save button
    const supplierSaveBtn = document.getElementById('btnSaveSupplier');
    supplierSaveBtn.addEventListener('click',()=>{
        saveSupplier();
    });
});

    //Save Supplier
    function saveSupplier(){
        const formData = new FormData();
        formData.append("supplier_code", document.getElementById("txtSupplierCode").value);
        formData.append("supplier_name", document.getElementById("txtSupplierName").value);
        formData.append("supplier_address",  document.getElementById("txtSupplierAddress").value);
        formData.append("supplier_contact_no", document.getElementById("txtSupplierContact").value);
        
        // Send data to Laravel backend
        fetch("/master-data/save-supplier", {
            method: "POST",
            body: formData,
            headers: {
                "X-CSRF-TOKEN": document.querySelector("meta[name='csrf-token']").getAttribute("content")
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status){
                alertify.success('Supplier saved successfully');
               
            } else {
                alertify.error('Unable to save');
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alertify.error('Unable to save');
        });
    }
    