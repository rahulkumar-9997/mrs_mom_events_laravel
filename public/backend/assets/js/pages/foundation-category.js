$(document).ready(function () {
    $(document).on('click', 'a[ data-foundation-category-popup="true"]', function () {
        var title = $(this).data('title');
        var size = ($(this).data('size') == '') ? 'md' : $(this).data('size');
        var url = $(this).data('url');
        var data = {
            _token: $('meta[name="csrf-token"]').attr('content'),
            size: size,
            url: url
        };
        $("#commonModal .modal-title").html(title);
        $.ajax({
            url: url,
            type: 'get',
            data: data,
            success: function (data) {
                $('#commonModal .render-data').html(data.form);
                $("#commonModal").modal('show');
            },
            error: function (data) {
                data = data.responseJSON;
            }
        });
    });
    $(document).off('submit', '#foundationCategoryStore').on('submit', '#foundationCategoryStore', function (event) {
        event.preventDefault();
        var form = $(this);
        var submitButton = form.find('button[type="submit"]');
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').remove();
        submitButton.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...');
        var formData = new FormData(this);
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                submitButton.prop('disabled', false);
                submitButton.html('Save changes');
                if (response.status === 'success') {
                    form[0].reset();
                    $('#commonModal').modal('hide');
                    $('.foundation-category-content').html(response.foundationCategoryContent);
                    showSuccess(response.message);
                }
            },
            error: function(xhr, status, error) {
                submitButton.prop('disabled', false);
                submitButton.html('Save changes');
                var errors = xhr.responseJSON.errors;
                if (errors) {
                    $.each(errors, function(key, value) {
                        var errorElement = $('#' + key + '_error');
                        if (errorElement.length) {
                            errorElement.text(value[0]);
                        }
                        var inputField = $('#' + key);
                        inputField.addClass('is-invalid');
                        inputField.after('<div class="invalid-feedback">' + value[0] + '</div>'); 
                    });
                }
            }
        });
    });
    
    /**Edit group modal js */
    $(document).on('click', 'a[data-editfoundationcategory-popup="true"]', function () {
        var title = $(this).data('title');
        var size = ($(this).data('size') == '') ? 'md' : $(this).data('size');
        var url = $(this).data('url');
        var fcid = $(this).data('fcid');
        var data = {
            _token: $('meta[name="csrf-token"]').attr('content'),
            size: size,
            url: url,
            group_category_id: fcid,
        };
        $("#commonModal .modal-title").html(title);
        //$("#commonModal .modal-dialog").addClass('modal-' + size);
        
        $.ajax({
            url: url,
            type: 'get',
            data: data,
            success: function (data) {
                $('#commonModal .render-data').html(data.form);
                $("#commonModal").modal('show');
            },
            error: function (data) {
                data = data.responseJSON;
            }
        });
    });
    /**Edit group modal js */
    $(document).off('submit', '#foundationCategoryUpdate').on('submit', '#foundationCategoryUpdate', function (event) {
        event.preventDefault();
        var form = $(this);
        var submitButton = form.find('button[type="submit"]');
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').remove();
        submitButton.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...');
        var formData = new FormData(this);
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                submitButton.prop('disabled', false);
                submitButton.html('Save changes');
                if (response.status === 'success') {
                    form[0].reset();
                    $('#commonModal').modal('hide');
                    $('.foundation-category-content').html(response.foundationCategoryContent);
                    showSuccess(response.message);
                }
            },
            error: function(xhr, status, error) {
                submitButton.prop('disabled', false);
                submitButton.html('Save changes');
                var errors = xhr.responseJSON.errors;
                if (errors) {
                    $.each(errors, function(key, value) {
                        var errorElement = $('#' + key + '_error');
                        if (errorElement.length) {
                            errorElement.text(value[0]);
                        }
                        var inputField = $('#' + key);
                        inputField.addClass('is-invalid');
                        inputField.after('<div class="invalid-feedback">' + value[0] + '</div>'); 
                    });
                }
            }
        });
    });
    /*Delete foundation category */
    $(document).ready(function() {
        $('.show_confirm').click(function(event) {
           var form = $(this).closest("form");
           var name = $(this).data("name");
           event.preventDefault();
  
           Swal.fire({
                 title: `Are you sure you want to delete this ${name}?`,
                 text: "If you delete this, it will be gone forever.",
                 icon: "warning",
                 showCancelButton: true,
                 confirmButtonText: "Yes, delete it!",
                 cancelButtonText: "Cancel",
                 dangerMode: true,
           }).then((result) => {
                 if (result.isConfirmed) {
                    form.submit();
                 }
           });
        });
     });
    /*Delete foundation category */
});