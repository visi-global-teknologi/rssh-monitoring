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
            { data: "file_name", name: "file_name" },
            { data: "log", name: "log" },
            { data: "is_error", name: "is_error" },
            { data: "rssh_connection.server_port", name: "rssh_connection.server_port" },
            { data: "device.name", name: "device.name" },
            { data: "device.unique_code", name: "device.unique_code" },
            { data: "client.name", name: "client.name" },
            { data: "created_at_human_readable_formatted", name: "created_at_human_readable_formatted" }
        ],
    });
});
