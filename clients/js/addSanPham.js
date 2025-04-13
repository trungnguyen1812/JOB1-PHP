
document.addEventListener('DOMContentLoaded', function () {
    // Get all forms with class 'add-to-cart-form'
    const forms = document.querySelectorAll('.add-to-cart-form');

    // Add event listener to each form
    forms.forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent normal form submission

            // Get form data
            const formData = new FormData(form);

            // Show loading indicator or disable button if needed
            const submitButton = form.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            submitButton.textContent = 'Đang xử lý...';
            submitButton.disabled = true;

            // Send AJAX request
            fetch('../../controller/add_to_cart_ajax.php', {
                method: 'POST',
                body: formData
            })
                .then(response => {
                    return response.text();
                })
                .then(text => {
                    try {
                        // Try to parse as JSON
                        const data = JSON.parse(text);

                        // Show message
                        alert(data.message);

                        // Reload the page after showing the message
                        if (data.success) {
                            window.location.reload();
                        }
                    } catch (e) {
                        console.error("Response is not valid JSON:", text);
                        alert('Có lỗi xảy ra khi xử lý yêu cầu');

                        // Reset button
                        submitButton.textContent = originalText;
                        submitButton.disabled = false;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Có lỗi xảy ra khi thêm vào giỏ hàng');

                    // Reset button
                    submitButton.textContent = originalText;
                    submitButton.disabled = false;
                });
        });
    });
});
