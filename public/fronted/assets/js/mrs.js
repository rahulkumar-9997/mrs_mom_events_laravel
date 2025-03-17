$(document).off('submit', '#enquiryForm').on('submit', '#enquiryForm', function (event) {
    event.preventDefault();
    var form = $(this);
    var submitButton = form.find('button[type="submit"]');
    $('.form-control').removeClass('is-invalid');
    $('.invalid-feedback').remove();
    submitButton.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Submitting...');

    var formData = new FormData(this);

    $.ajax({
        url: form.attr('action'),
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            submitButton.prop('disabled', false).html('Submit');
            if (response.status === 'success') {
                showToast('success', response.message);
                form[0].reset();
            }
           
        },
        error: function(xhr) {
            submitButton.prop('disabled', false).html('Submit');
            var errors = xhr.responseJSON?.errors;
            if (errors) {
                $.each(errors, function(key, value) {
                    var inputField = $('#' + key);
                    inputField.addClass('is-invalid');
                    inputField.after('<div class="invalid-feedback">' + value[0] + '</div>');
                });
            }
            else if (xhr.responseJSON?.message) {
                showToast('danger', xhr.responseJSON.message);
            } else {
                showToast('danger', "An error occurred! Please try again.");
            }
        }
    });
});

function showToast(type, message) {
    var toastClass = '';
    var toastTitle = '';
    if (type === 'success') {
        toastClass = 'bg-success';
        toastTitle = 'Success';
    } else if (type === 'danger') {
        toastClass = 'bg-danger';
        toastTitle = 'Error';
    }

    var toastHTML = `
        <div class="toast ${toastClass} text-white" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">${toastTitle}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                ${message}
            </div>
        </div>
    `;
    $('#toastContainer').append(toastHTML);
    var toastElement = $('#toastContainer .toast').last()[0];
    var toast = new bootstrap.Toast(toastElement);
    toast.show();
    setTimeout(function() {
        $(toastElement).remove();
    }, 30000); 
}
