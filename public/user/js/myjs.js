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
                    // Optional
                    onSuccess: function (result) {
                        /* You may add your own js here, this is just example */
                        console.log("success");
                    },
                    // Optional
                    onPending: function (result) {
                        /* You may add your own js here, this is just example */
                        console.log("pending");
                    },
                    // Optional
                    onError: function (result) {
                        /* You may add your own js here, this is just example */
                        console.log("error");
                    },
                });
            }
        },
        statusCode: {
            422: function (data) {
                // console.log(data.responseJSON.errors);
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
        },
    });
});
