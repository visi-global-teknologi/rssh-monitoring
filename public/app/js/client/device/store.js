$(document).ready(function (e) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $("#form-client-device-store").on('submit', function(e){
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
                $('#btn-submit-form-client-device-store').hide();
            },
            success: function(response) {
                $('.spinner-border').hide();
                $('#btn-submit-form-client-device-store').show();
                Swal.fire('Yeay!', response.success_message, "success");
            },
            error: function (xhr, error, code) {
                $('.spinner-border').hide();
                $('#btn-submit-form-client-device-store').show();
                var err = eval("(" + xhr.responseText + ")");
                Swal.fire({
                    html: "<strong>Oops!</strong> " + err.error_message,
                });
            },
        });
    });
});
