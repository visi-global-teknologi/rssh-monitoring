$(document).ready(function (e) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#rssh-connection-datatable").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: $("input[name=route_api_private_datatable_rssh_connection]").val(),
            error: function (xhr, error, code) {
                var err = eval("(" + xhr.responseText + ")");
                Swal.fire({
                    html: "<strong>Oops!</strong> " + err.header.success_message,
                });
            },
        },
        columns: [
            {
                data: "server_port",
                name: "server_port"
            },
            {
                data: "connection_status_name",
                name: "connection_status_name",
                orderable: false
            },
            {
                data: "device_name",
                name: "device_name"
            },
            {
                data: "device_unique_code",
                name: "device_unique_code",
                orderable: false
            },
            {
                data: "client_name",
                name: "client_name",
                orderable: false
            },
            {
                data: "updated_at_human_readable_formatted",
                name: "updated_at_human_readable_formatted"
            }
        ],
    });
});
