const csrftoken = $('meta[name="_token"]').attr("content");

let hiddenName = $("#diff-acc");
if (hiddenName.length) {
    hiddenName.change(function (e) {
        if ($(this).is(":checked")) {
            $("#nama_donatur").attr("disabled", true);
        } else {
            $("#nama_donatur").attr("disabled", false);
        }
    });
}

$("#submitdonasi").click(function (e) {
    e.preventDefault();
    let formdonasi = document.getElementById("formdonasi");
    let form = new FormData(formdonasi);

    $.ajax({
        method: "POST",
        url: "/donasi/pembayaran",
        data: form,
        cache: false,
        processData: false,
        contentType: false,
        dataType: "JSON",
        success: (res) => {
            if (res.status == 200) {
                snap.pay(res.token, {
                    onPending: function (result) {
                        form.append("payment", JSON.stringify(result));
                        pembayaran(form);
                    },
                });
            }
        },
        statusCode: {
            422: function (data) {
                let ul = document.createElement("ul");
                $.each(data.responseJSON.errors, function (key, value) {
                    // Set errors on inputs
                    var li = document.createElement("li");
                    li.appendChild(document.createTextNode(value[0]));
                    ul.appendChild(li);
                });

                Swal.fire({
                    icon: "info",
                    showConfirmButton: true,
                    title: "Pembayaran Gagal",
                    html: ul,
                    confirmButtonText: "Oke",
                });
            },
            404: function (data) {
                Swal.fire({
                    icon: "error",
                    showConfirmButton: true,
                    title: "Pembayaran Gagal Dilakukan",
                    confirmButtonText: "Oke",
                });
            },
        },
    });
});

function pembayaran(form) {
    $.ajax({
        method: "POST",
        url: "/donasi/pembayaran/simpan",
        data: form,
        cache: false,
        processData: false,
        contentType: false,
        dataType: "JSON",
        statusCode: {
            424: function (data) {
                Swal.fire({
                    icon: "error",
                    showConfirmButton: true,
                    title: data.pesan,
                    confirmButtonText: "Oke",
                });
            },
            200: function (response) {
                Swal.fire({
                    icon: "success",
                    showConfirmButton: false,
                    title: response.pesan,
                    timer: 800,
                }).then(function (e) {
                    document.location.href =
                        "/donasi/caramembayar/" + response.id_pemasukan;
                });
            },
        },
    });
}
