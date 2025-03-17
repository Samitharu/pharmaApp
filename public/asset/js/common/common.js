document.addEventListener("DOMContentLoaded", function () {
    let summaryBox = document.getElementById("summaryBox");
    let toggleButton = document.createElement("button"); // Create toggle button
    let isHidden = false;

    // Create toggle button styles
    toggleButton.innerHTML = "👁 Show Summary";
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
        if (!isHidden && window.scrollY > 150) {
            summaryBox.style.position = "fixed";
            summaryBox.style.top = "15px";
            summaryBox.style.right = "15px";
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
        } else if (!isHidden) {
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
            summaryBox.style.right = "15px";
            summaryBox.style.opacity = "1";
            toggleButton.innerHTML = "👁 Hide Summary";
        } else {
            summaryBox.style.right = "-320px"; // Move off-screen
            summaryBox.style.opacity = "0";
            toggleButton.innerHTML = "👁 Show Summary";
        }
        isHidden = !isHidden;
    });
});


//show item search modal
function showItemSearchModal(modalId) {
    const itemModal = document.getElementById(modalId);

    if (itemModal) {
        const modal = new bootstrap.Modal(itemModal);
        modal.show();
    } else {
        console.error("Modal not found with ID:", modalId);
    }
}
