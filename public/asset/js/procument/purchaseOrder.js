document.addEventListener("DOMContentLoaded", function () {


    loadItems();
});


let debounceTimer; // Store the timer
//load items using barcode to transaction table
function fetchItemDetails(event) {
    let inputField = event.target;
    let barcode = inputField.value;
    clickedRowObject = inputField.closest("tr");
    // Clear the previous timer to reset the debounce delay
    clearTimeout(debounceTimer);

    // Set a new timer to wait for 500ms after the user stops typing
    debounceTimer = setTimeout(() => {
        if (barcode.trim() !== "") {  // Ensure barcode is not empty
            fetch(`/get-item-by-barcode/${barcode}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        let isDuplicate = Array.from(document.querySelectorAll(".item-code"))
                            .some(input => input !== clickedRowObject.querySelector(".item-code") && input.value.trim() === data.item.item_code);
                        console.log(isDuplicate);

                        if (!isDuplicate) {
                            let row = inputField.closest("tr");

                            row.querySelector(".item-name").value = data.item.name;
                            row.querySelector(".item-code").value = data.item.item_code;
                            row.querySelector(".pack-size").value = data.item.pack_size;
                            row.querySelector(".purchase-price").value = data.item.purchase_price;
                            row.querySelector(".wholesale-price").value = data.item.wholesale_price;
                            row.querySelector(".retail-price").value = data.item.retail_price;
                            row.querySelector(".qty").focus();
                        }else{
                            alertify.error('Product can not be duplicated');
                        }
                    }
                })
                .catch(error => console.error("Error fetching item:", error));
        }
    }, 500);  // 500ms delay after the user stops typing
}


//load items to the popup search
function loadItems() {
    fetch(`/get-item-to-popup-search`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const tableBody = document.getElementById("productTable");
                tableBody.innerHTML = ""; // Clear existing rows

                data.items.forEach((item, index) => {
                    let row = `<tr>
                    <td>${item.product_code}</td>
                    <td>${item.product_name}</td>
                    <td>${item.pack_size}</td>
                    <td>0</td>
                    <td>${item.retail_price}</td>
                    <td>
                        <button class="btn btn-primary btn-sm select-btn" data-id="${item.product_id}" onClick="loadItemDetails(this)">Select</button>
                    </td>
                </tr>`;
                    tableBody.innerHTML += row;
                });


            } else {
                console.error("Failed to load data.");
            }
        })
        .catch(error => console.error("Error fetching items:", error));
}

//Load item using pop up search to transaction table
function loadItemDetails(event) {

    const transTable = document.getElementById("transactionTable");
    let productId = event.getAttribute("data-id");



    fetch(`/get-item-by-item-id/${productId}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                let isDuplicate = Array.from(document.querySelectorAll(".item-code"))
                    .some(input => input !== clickedRowObject.querySelector(".item-code") && input.value.trim() === data.item.product_code);

                if (!isDuplicate) {
                    let row = clickedRowObject;
                    row.querySelector(".item-name").value = data.item.product_name;
                    row.querySelector(".item-code").value = data.item.product_code;
                    row.querySelector(".pack-size").value = data.item.pack_size;
                    row.querySelector(".purchase-price").value = data.item.purchase_price;
                    row.querySelector(".wholesale-price").value = data.item.wholesale_price;
                    row.querySelector(".retail-price").value = data.item.retail_price;
                    row.querySelector(".qty").focus();
                } else {
                    alertify.error('Product can not be duplicated');
                }

            }
        })
        .catch(error => console.error("Error fetching item:", error));

}

//Calculate value / Gross /Net Totals
function calculateValue() {
    let transactionTable = document.getElementById('transactionsTable');
    const rows = transactionTable.querySelectorAll("tbody tr");
    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(() => {
        rows.forEach(row => {

            let itemCodeInput = row.querySelector(".item-code");
            if (itemCodeInput.value.length > 0) {
                let itemQty = row.querySelector(".qty").value;
                console.log(itemQty);

            }

        })
    }, 1000);
}