document.addEventListener("DOMContentLoaded", function () {
   

    loadItems();
});


let debounceTimer; // Store the timer

function fetchItemDetails(event) {
    let inputField = event.target; 
    let barcode = inputField.value; 

    // Clear the previous timer to reset the debounce delay
    clearTimeout(debounceTimer);

    // Set a new timer to wait for 500ms after the user stops typing
    debounceTimer = setTimeout(() => {
        if (barcode.trim() !== "") {  // Ensure barcode is not empty
            fetch(`/get-item-by-barcode/${barcode}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        let row = inputField.closest("tr");
                        console.log(row);
                        
                        row.querySelector(".item-name").value = data.item.name;
                        row.querySelector(".item-code").value = data.item.item_code;
                        row.querySelector(".pack-size").value = data.item.pack_size;
                        row.querySelector(".purchase-price").value = data.item.purchase_price;
                        row.querySelector(".wholesale-price").value = data.item.wholesale_price;
                        row.querySelector(".retail-price").value = data.item.retail_price;
                        row.querySelector(".qty").focus();
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

