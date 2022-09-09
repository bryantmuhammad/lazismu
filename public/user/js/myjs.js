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

    let test = {
        va_numbers: [
            {
                va_number: "123456789123456789",
                bank: "bri",
            },
        ],
        transaction_time: "2021-06-23 11:53:34",
        transaction_status: "settlement",
        transaction_id: "9aed5972-5b6a-401e-894b-a32c91ed1a3a",
        status_message: "midtrans payment notification",
        status_code: "200",
        signature_key:
            "fe5f725ea770c451017e9d6300af72b830a668d2f7d5da9b778ec2c4f9177efe5127d492d9ddfbcf6806ea5cd7dc1a7337c674d6139026b28f49ad0ea1ce5107",
        settlement_time: "2021-06-23 11:53:34",
        payment_type: "bank_transfer",
        payment_amounts: [],
        order_id: "bri-va-01",
        merchant_id: "G141532850",
        gross_amount: "300000.00",
        fraud_status: "accept",
        currency: "IDR",
    };
    form.append("payment", JSON.stringify(test));
    pembayaran(form);
    // $.ajax({
    //     method: "POST",
    //     url: "/donasi/pembayaran",
    //     data: form,
    //     cache: false,
    //     processData: false,
    //     contentType: false,
    //     dataType: "JSON",
    //     success: (res) => {
    //         if (res.status == 200) {
    //             snap.pay(res.token, {
    //                 onPending: function (result) {
    //                     let test = {
    //                         va_numbers: [
    //                             {
    //                                 va_number: "123456789123456789",
    //                                 bank: "bri",
    //                             },
    //                         ],
    //                         transaction_time: "2021-06-23 11:53:34",
    //                         transaction_status: "settlement",
    //                         transaction_id:
    //                             "9aed5972-5b6a-401e-894b-a32c91ed1a3a",
    //                         status_message: "midtrans payment notification",
    //                         status_code: "200",
    //                         signature_key:
    //                             "fe5f725ea770c451017e9d6300af72b830a668d2f7d5da9b778ec2c4f9177efe5127d492d9ddfbcf6806ea5cd7dc1a7337c674d6139026b28f49ad0ea1ce5107",
    //                         settlement_time: "2021-06-23 11:53:34",
    //                         payment_type: "bank_transfer",
    //                         payment_amounts: [],
    //                         order_id: "bri-va-01",
    //                         merchant_id: "G141532850",
    //                         gross_amount: "300000.00",
    //                         fraud_status: "accept",
    //                         currency: "IDR",
    //                     };
    //                     // form.append("payment", JSON.stringify(result));
    //                     form.append("payment", JSON.stringify(test));
    //                     pembayaran(form);
    //                 },
    //             });
    //         }
    //     },
    //     statusCode: {
    //         422: function (data) {
    //             let ul = document.createElement("ul");
    //             $.each(data.responseJSON.errors, function (key, value) {
    //                 // Set errors on inputs
    //                 var li = document.createElement("li");
    //                 li.appendChild(document.createTextNode(value[0]));
    //                 ul.appendChild(li);
    //             });

    //             Swal.fire({
    //                 icon: "info",
    //                 showConfirmButton: true,
    //                 title: "Pembayaran Gagal",
    //                 html: ul,
    //                 confirmButtonText: "Oke",
    //             });
    //         },
    //         404: function (data) {
    //             Swal.fire({
    //                 icon: "error",
    //                 showConfirmButton: true,
    //                 title: "Pembayaran Gagal Dilakukan",
    //                 confirmButtonText: "Oke",
    //             });
    //         },
    //     },
    // });
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
            404: function (data) {
                Swal.fire({
                    icon: "error",
                    showConfirmButton: true,
                    title: "Pembayaran Gagal Dilakukan",
                    confirmButtonText: "Oke",
                });
            },
            200: function (response) {
                console.log(response);
            },
        },
    });
}
