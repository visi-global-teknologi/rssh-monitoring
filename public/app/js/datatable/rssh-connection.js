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
            },
            {
                data: "column_action",
                orderable: false
            }
        ],
    });
});

$("#rssh-connection-datatable").on("click", ".btn-danger", function () {
    var url = $(this).data('url');
    terminatePort(url)
});

function terminatePort(url) {
    Swal.fire({
        title: 'Apakah anda yakin',
        text: 'Untuk memutus koneksi port tersebut ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal',
        reverseButtons: true,
        customClass: {
            cancelButton: 'btn btn-light waves-effect',
            confirmButton: 'btn btn-primary waves-effect waves-light'
        },
        preConfirm: (e) => {
            return new Promise((resolve) => {
                setTimeout(() => {
                    resolve();
                }, 50);
            });
        }
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'PUT',
                url: url,
                success: function (response) {
                    Swal.fire("Berhasil!", response.success_message, "success");
                    setTimeout(function(){
                        location.reload();
                    }, 2000);
                },
                error: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    Swal.fire({
                        html: "<strong>Oops!</strong> " + err.error_message,
                    });
                }
            })
        }
    })
}
