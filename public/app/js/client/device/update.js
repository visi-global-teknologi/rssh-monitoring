$(document).ready(function (e) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $("#form-client-device-update").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
                $('.spinner-border').show();
                $('#btn-submit-form-client-device-update').hide();
            },
            success: function(response) {
                $('.spinner-border').hide();
                $('#btn-submit-form-client-device-update').show();
                Swal.fire('Yeay!', response.success_message, "success");
            },
            error: function (xhr, error, code) {
                $('.spinner-border').hide();
                $('#btn-submit-form-client-device-update').show();
                var err = eval("(" + xhr.responseText + ")");
                Swal.fire({
                    html: "<strong>Oops!</strong> " + err.error_message,
                });
            },
        });
    });
});
