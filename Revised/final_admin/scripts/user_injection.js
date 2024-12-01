$(document).ready(function() {
    $('#form-register').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Gather form data
        var formData = $(this).serialize(); // Serializes the form's elements.

        // Send data to the server using AJAX
        $.ajax({
            type: 'POST',
            url: 'cyberbizwatch_admin_staff_reg.php', // The URL should point to the PHP script that processes the form
            data: formData,
            dataType: 'json',
            success: function(response) {
                console.log(response); // Check what the response contains
                if (response.success) {
                    $('#responsiveMessage').html('<p class="success">' + response.success + '</p>');
                } else if (response.error) {
                    $('#responsiveMessage').html('<p class="error">' + response.error + '</p>');
                }
            },
            error: function() {
                // Handle AJAX errors
                $('#responsiveMessage').html('<p class="error">An error occurred while submitting the data.</p>');
            }
        });
    });
});

