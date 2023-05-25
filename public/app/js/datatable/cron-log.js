$(document).ready(function (e) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#cron-log-datatable").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: $("input[name=route_api_private_datatable_cron_log]").val(),
            error: function (xhr, error, code) {
                var err = eval("(" + xhr.responseText + ")");
                Swal.fire({
                    html: "<strong>Oops!</strong> " + err.header.success_message,
                });
            },
        },
        columns: [
            {
                data: "file_name",
                name: "file_name",
                orderable: false
            },
            {
                data: "log",
                name: "log",
                orderable: false
            },
            {
                data: "is_error_html",
                name: "is_error"
            },
            {
            data: "rssh_connection_server_port",
            name: "rssh_connection_server_port"
            },
            {
                data: "device_name",
                name: "device_name",
                orderable: false
            },
            {
                data: "device_unique_code",
                name: "device_unique_code",
                orderable: false
            },
            {
                data: "client_name",
                name: "client_name",
            },
            {
                data: "created_at_human_readable_formatted",
                name: "created_at_human_readable_formatted"
            }
        ],
    });
});
