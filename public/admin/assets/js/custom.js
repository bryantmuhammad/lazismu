/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";
const csrftoken = $('meta[name="_token"]').attr("content");

jQuery.extend(jQuery.validator.messages, {
    required: "Field tidak boleh kosong.",
    remote: "Please fix this field.",
    email: "Please enter a valid email address.",
    url: "Please enter a valid URL.",
    date: "Please enter a valid date.",
    dateISO: "Please enter a valid date (ISO).",
    number: "Field hanya boleh diisi dengan angka.",
    digits: "Hanya boleh angka.",
    creditcard: "Please enter a valid credit card number.",
    equalTo: "Please enter the same value again.",
    accept: "Please enter a value with a valid extension.",
    maxlength: jQuery.validator.format(
        "Please enter no more than {0} characters."
    ),
    minlength: jQuery.validator.format("Mohon masukan {0} angka."),
    rangelength: jQuery.validator.format(
        "Please enter a value between {0} and {1} characters long."
    ),
    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
    max: jQuery.validator.format("Angka harus lebih kecil dari {0}."),
    min: jQuery.validator.format("Angka harus lebih besar dari {0}."),
});

jQuery.validator.addMethod(
    "lettersonly",
    function (value, element) {
        return this.optional(element) || /^[A-Z a-z /S]+$/g.test(value);
    },
    "Tidak boleh angka"
);

$(function () {
    $(".button-delete").on("click", function (e) {
        e.preventDefault();
        let id = $(this).data("id");
        Swal.fire({
            title: "Apakah anda yakin ingin menghapus data?",
            text: "Data akan dihapus selamanya!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus Data!",
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).parent().submit();
            }
        });
    });

    $("#formadmin").validate({
        rules: {
            name: {
                required: true,
                lettersonly: true,
            },
        },

        highlight: (element, errorClass, validClass) => {
            $(element).addClass("is-invalid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass("is-invalid").addClass("is-valid");
        },
    });

    $("#mytable").DataTable();
});

function editAdmin(idadmin) {
    $.ajax({
        method: "GET",
        url: `/admin/user/${idadmin}`,
        dataType: "JSON",
        success: (res) => {
            $("#name").val(res.name);
            $("#email").val(res.email);
            $("#role").val(res.role);
            $("#formadmin").attr("action", `/admin/user/${idadmin}`);
        },
    });
}

function editProgram(idprogram) {
    $.ajax({
        method: "GET",
        url: `/admin/program/${idprogram}}`,
        dataType: "JSON",
        success: (res) => {
            const trix = document.querySelector("trix-editor");

            $("#nama_program").val(res.nama_program);
            $("#id_kategori").val(res.id_kategori);
            trix.innerHTML = res.keterangan;
            $(".img-preview").attr("src", `/storage/${res.foto}`);
            $("#formadmin").attr("action", `/admin/program/${idprogram}`);
        },
    });
}

function editKategori(idkategori) {
    $.ajax({
        method: "GET",
        url: `/admin/kategori/${idkategori}}`,
        dataType: "JSON",
        success: (res) => {
            $("#nama_kategori").val(res.nama_kategori);
            $("#formadmin").attr("action", `/admin/kategori/${idkategori}`);
        },
    });
}

function previewImage() {
    const image = document.getElementById("image");
    const imgPreview = document.querySelector(".img-preview");

    imgPreview.style.display = "block";
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function (oFREvent) {
        imgPreview.src = oFREvent.target.result;
    };
}
