export class Form {
    
    clearForm() {
        const formElements = document.querySelectorAll<HTMLInputElement | HTMLTextAreaElement | HTMLSelectElement>('input, textarea, select');

        formElements.forEach(element => {
            if (element instanceof HTMLInputElement) {
                if (element.type === 'file') {
                    element.value = ''; // Clear file input
                } else if (element.type === 'checkbox' || element.type === 'radio') {
                    element.checked = false; // Uncheck checkboxes and radio buttons
                } else {
                    element.value = ''; // Clear text, email, number, etc.
                }
            } else if (element instanceof HTMLTextAreaElement || element instanceof HTMLSelectElement) {
                element.value = ''; // Clear textareas and selects
            }
        });
    }
}
