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
                data: "is_error",
                name: "is_error"
            },
            {
                data: "rssh_connection.server_port",
                name: "rssh_connection.server_port"
            },
            {
                data: "rssh_connection.device.name",
                name: "rssh_connection.device.name",
                orderable: false
            },
            {
                data: "rssh_connection.device.unique_code",
                name: "rssh_connection.device.unique_code",
                orderable: false
            },
            {
                data: "rssh_connection.device.client.name",
                name: "rssh_connection.device.client.name",
            },
            {
                data: "created_at_human_readable_formatted",
                name: "created_at_human_readable_formatted"
            }
        ],
    });
});
