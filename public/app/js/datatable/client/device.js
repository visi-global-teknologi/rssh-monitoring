$(document).ready(function (e) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#client-device-datatable").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: $("input[name=route_api_private_datatable_client_device]").val(),
            error: function (xhr, error, code) {
                var err = eval("(" + xhr.responseText + ")");
                Swal.fire({
                    html: "<strong>Oops!</strong> " + err.header.success_message,
                });
            },
        },
        columns: [
            {
                data: "name",
                name: "name"
            },
            {
                data: "unique_code",
                name: "unique_code"
            },
            {
                data: "active_status_html",
                name: "active_status",
                orderable: false
            },
            {
                data: "description",
                name: "description"
            },
            {
                data: "column_action",
                orderable: false
            }
        ],
    });
});
