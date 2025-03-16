function readBarcode(event){
    console.log(event);
    
}



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
