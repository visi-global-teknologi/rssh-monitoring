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
                data: "device_name",
                name: "device_name"
            },
            {
                data: "device_unique_code",
                name: "device_unique_code"
            },
            {
                data: "active_status_html",
                name: "device_active_status",
                orderable: false
            },
            {
                data: "device_description",
                name: "device_description"
            },
            {
                data: "column_action",
                orderable: false
            }
        ],
    });
});
