document.addEventListener("DOMContentLoaded", function () {
    const table = document.getElementById("transactionsTable");

    // Function to update the row count
    function updateRowCount() {
        const rowCount = table.querySelectorAll("tbody tr").length;
        const rowCountDisplay = document.getElementById("rowCount");
        if (rowCountDisplay) {
            rowCountDisplay.textContent = rowCount; // Update the row count in the green span
        }
    }

    // Add new row when "Enter" is pressed
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

                // Update row count after adding
                updateRowCount();
            }
        }
        const searchInput = document.getElementById("tableSearchInput");
        if (searchInput && table) {
            searchInput.addEventListener("keyup", function () {
                const filter = searchInput.value.toLowerCase();
                const rows = table.querySelectorAll("tbody tr");

                rows.forEach(row => {
                    let matchFound = false;

                    // Check each input field inside the row
                    row.querySelectorAll("input").forEach(input => {
                        if (input.value.toLowerCase().includes(filter)) {
                            matchFound = true;
                        }
                    });

                    // Show row if a match is found, otherwise hide it
                    row.style.display = matchFound ? "" : "none";
                });
            });
        }

    });

    // Remove row when clicking "Remove" button
    table.addEventListener("click", function (event) {
        if (event.target.classList.contains("remove-item")) {
            const rows = table.querySelectorAll("tbody tr");
            if (rows.length > 1) { // Prevent removing the last row
                event.target.closest("tr").remove();

                // Update row count after removing
                updateRowCount();
            }
        }
    });

    // Initial row count update
    updateRowCount();

    let summaryBox = document.getElementById("summaryBox");
    let toggleButton = document.createElement("button"); // Create toggle button
    let isHidden = false;

    // Create toggle button styles
    toggleButton.innerHTML = "👁";
    toggleButton.style.position = "fixed";
    toggleButton.style.bottom = "20px";
    toggleButton.style.right = "20px";
    toggleButton.style.padding = "10px 15px";
    toggleButton.style.background = "#007bff";
    toggleButton.style.color = "#fff";
    toggleButton.style.border = "none";
    toggleButton.style.borderRadius = "8px";
    toggleButton.style.cursor = "pointer";
    toggleButton.style.boxShadow = "0 4px 6px rgba(0, 0, 0, 0.2)";
    toggleButton.style.transition = "all 0.3s ease";
    toggleButton.style.display = "none"; // Initially hidden
    document.body.appendChild(toggleButton); // Append button to body

    // Store original styles
    let originalStyles = {
        position: summaryBox.style.position,
        width: summaryBox.style.width,
        top: summaryBox.style.top,
        right: summaryBox.style.right,
        padding: summaryBox.style.padding,
        fontSize: summaryBox.style.fontSize,
        boxShadow: summaryBox.style.boxShadow,
        background: summaryBox.style.background,
        transform: summaryBox.style.transform,
        opacity: summaryBox.style.opacity,
        backdropFilter: summaryBox.style.backdropFilter
    };

    // Apply smooth transition effects
    summaryBox.style.transition = "all 0.5s ease-in-out";

    window.addEventListener("scroll", function () {
        if (window.scrollY > 150) {
            // Show toggle button
            toggleButton.style.display = "block";

            // Move summaryBox to fixed position only if it's not hidden
            if (!isHidden) {
                summaryBox.style.position = "fixed";
                summaryBox.style.top = "15px";
                summaryBox.style.right = "15px"; // Reset right position
                summaryBox.style.width = "280px";
                summaryBox.style.padding = "15px";
                summaryBox.style.fontSize = "1rem";
                summaryBox.style.zIndex = "1000";
                summaryBox.style.background = "linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(240, 240, 240, 0.8))";
                summaryBox.style.backdropFilter = "blur(12px)";
                summaryBox.style.boxShadow = "0 10px 20px rgba(0, 0, 0, 0.25)";
                summaryBox.style.borderRadius = "12px";
                summaryBox.style.transform = "scale(1.08) translateY(-5px)";
                summaryBox.style.opacity = "1";
            }
        } else {
            // Hide toggle button when scrolled back to top
            toggleButton.style.display = "none";
            toggleButton.innerHTML = "👁";
            isHidden = false; // Reset hide status when reaching top

            // Reset summaryBox to its original position and style
            summaryBox.style.position = originalStyles.position;
            summaryBox.style.width = originalStyles.width;
            summaryBox.style.top = originalStyles.top;
            summaryBox.style.right = originalStyles.right;
            summaryBox.style.padding = originalStyles.padding;
            summaryBox.style.fontSize = originalStyles.fontSize;
            summaryBox.style.boxShadow = originalStyles.boxShadow;
            summaryBox.style.background = originalStyles.background;
            summaryBox.style.transform = "scale(1) translateY(0)";
            summaryBox.style.opacity = "0.85";
            summaryBox.style.backdropFilter = originalStyles.backdropFilter;
        }
    });

    // Toggle Button Click Event
    toggleButton.addEventListener("click", function () {
        if (isHidden) {
            summaryBox.style.right = "15px"; // Reset right position
            summaryBox.style.opacity = "1";
            toggleButton.innerHTML = "👁";
        } else {
            summaryBox.style.right = "-320px"; // Move off-screen
            summaryBox.style.opacity = "0";
            toggleButton.innerHTML = "👁";
        }
        isHidden = !isHidden;
    });
});



//show item search modal
let clickedRowObject = null;
function showItemSearchModal(modalId,object) {
   console.log(object);
   
    
    const itemModal = document.getElementById(modalId);

    if (itemModal) {
        const modal = new bootstrap.Modal(itemModal);
        modal.show();
    } else {
        console.error("Modal not found with ID:", modalId);
    }
    clickedRowObject = object.closest("tr");;
}

window.searchTable = function(event) {
    const searchInput = event.target;
    const dataId = searchInput.getAttribute("data-id");
    console.log("Data ID:", dataId);
    const filter = searchInput.value.toLowerCase();
    const popupTable = document.getElementById(dataId);
    const rows = popupTable.querySelectorAll("tbody tr");

    rows.forEach(row => {
        let matchFound = false;

        // Check each input field inside the row
        row.querySelectorAll("td").forEach(td => {
            if (td.textContent.toLowerCase().includes(filter)) {
            matchFound = true;
            }
        });

        // Show row if a match is found, otherwise hide it
        row.style.display = matchFound ? "" : "none";
    });
}