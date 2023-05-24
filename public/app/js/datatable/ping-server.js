$(document).ready(function (e) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#ping-server-datatable").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: $("input[name=route_api_private_datatable_ping_server]").val(),
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
                name: "client_name"
            },
            {
                data: "updated_at_human_readable_formatted",
                name: "updated_at_human_readable_formatted"
            }
        ],
    });
});
