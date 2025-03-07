document.addEventListener('DOMContentLoaded', function () {


    // Initialize DataTable
    const Itemtable = document.querySelector('#productListTable');
    if (Itemtable) {
        new DataTable(Itemtable, {
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
        imageUpload.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                }
                reader.readAsDataURL(file);
            }
        });
    }
    //Save button click event
    const saveButton = document.getElementById('btnSaveProduct');
    saveButton.addEventListener('click', () => {
        saveProduct();
    });

    /*Page loading functions calling secotions*/
    loadAllProducts();

    /**End of the page loading functions calling section */
});

//Item saving
function saveProduct() {
    const formData = new FormData();
    formData.append("product_code", document.querySelector("input[placeholder='Enter product code']").value);
    formData.append("product_name", document.querySelector("input[placeholder='Enter product name']").value);
    formData.append("supplier_id", /* document.getElementById("cmbSupplier").value */1)
    formData.append("pack_size", document.getElementById("txtPackSize").value);
    formData.append("generic_name", document.getElementById("txtGenericName").value);
    formData.append("description", document.querySelector("textarea").value);
    formData.append("status", document.querySelector("#settings select").value);
    formData.append("barcode", document.getElementById("txtBarcode").value);
    formData.append("free_offer_allowed", document.getElementById("chkFreeOfferAllowed").checked ? 1 : 0);
    formData.append("discount_allowed", document.getElementById("chkDiscountAllowed").checked ? 1 : 0);
    formData.append("manage_batch", document.getElementById("chkManageBatch").checked ? 1 : 0);
    formData.append("purchase_price", document.getElementById("txtPurchasePrice").value);
    formData.append("whole_sale_price", document.getElementById("txtwholeSale").value);
    formData.append("retail_price", document.getElementById("txtRetail").value);

    // Handle Image Upload
    const imageUpload = document.getElementById("imageUpload").files[0];
    if (imageUpload) {
        formData.append("thumbnail", imageUpload);
    }

    // Send data to Laravel backend
    fetch("/master-data/save-product", {
        method: "POST",
        body: formData,
        headers: {
            "X-CSRF-TOKEN": document.querySelector("meta[name='csrf-token']").getAttribute("content")
        }
    })
        .then(response => response.json())
        .then(data => {
            if (data.status) {
                alertify.success('Product saved successfully');
                //window.location.reload();
                loadAllProducts();
            } else {
                alertify.error('Unable to save');
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alertify.error('Unable to save');
        });
}

//load product to the table
function loadAllProducts() {
    fetch("/master-data/get-products")
        .then(response => response.json())
        .then(response => {
            if (!response.status) {
                console.error("Error: Invalid API response", response);
                alertify.error("Failed to load products");
                return;
            }

            const products = response.data; // Access the 'data' key
            if (!Array.isArray(products)) {
                console.error("Expected an array but got:", products);
                return;
            }

            const tableElement = document.querySelector("#productListTable");
            const dataTable = new DataTable(tableElement);

            dataTable.clear(); // Clear old data

            products.forEach(product => {
                dataTable.row.add([
                    product.product_code,
                    product.product_name,
                    "Still Not Applicable", // Need to change - 07/03/2025
                    product.purchase_price,
                    product.whole_sale_price,
                    product.retail_price,
                    `<div style="display: flex; gap: 5px;">
                        <button class="btn btn-warning btn-sm" onclick="editProduct('${product.product_id}')">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteProduct('${product.product_id}')">Delete</button>
                    </div>`



                ]);
            });

            dataTable.draw();
        })
        .catch(error => {
            console.error("Error loading products:", error);
            alertify.error("Failed to load products");
        });
}

