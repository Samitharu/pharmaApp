document.addEventListener("DOMContentLoaded", function () {
    const table = document.getElementById("transactionsTable");

    table.addEventListener("keydown", function (event) {
        // Check if "Enter" key is pressed & exclude remove button
        if (event.key === "Enter" && !event.target.closest(".remove-item")) {
            event.preventDefault(); // Prevent form submission

            let currentRow = event.target.closest("tr");
            if (currentRow) {
                // Clone row and reset values
                let newRow = currentRow.cloneNode(true);
                newRow.querySelectorAll("input").forEach(input => input.value = "");

                // Append new row
                table.querySelector("tbody").appendChild(newRow);
            }
        }
    });

    // Remove row when clicking "Remove" button
    table.addEventListener("click", function (event) {
        if (event.target.classList.contains("remove-item")) {
            const rows = table.querySelectorAll("tbody tr");
            if (rows.length > 1) { // Prevent removing the last row
                event.target.closest("tr").remove();
            }
        }
    });

    loadItems();
});


function fetchItemDetails(barcode, inputField) {
    fetch(`/get-item-by-barcode/${barcode}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                let row = inputField.closest("tr");
                row.querySelector(".item-name").value = data.item.name;
                row.querySelector(".item-code").value = data.item.item_code;
                row.querySelector(".pack-size").value = data.item.pack_size;
                row.querySelector(".purchase-price").value = data.item.purchase_price;
                row.querySelector(".wholesale-price").value = data.item.wholesale_price;
                row.querySelector(".retail-price").value = data.item.retail_price;
                row.querySelector(".qty").focus();
            } else {
                alert("Item not found!");
            }
        })
        .catch(error => console.error("Error fetching item:", error));
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
                    <td>${item.retail_price }</td>
                    <td>
                        <button class="btn btn-primary btn-sm select-btn" data-id="${item.product_id}">Select</button>
                    </td>
                </tr>`;
                tableBody.innerHTML += row;
            });

            // Handle select button clicks
            document.querySelectorAll(".select-btn").forEach(button => {
                button.addEventListener("click", function () {
                    let productId = this.getAttribute("data-id");
                    alert("Selected Product ID: " + productId);
                });
            });
        } else {
            console.error("Failed to load data.");
        }
    })
    .catch(error => console.error("Error fetching items:", error));
}

