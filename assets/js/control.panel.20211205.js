(function($) {
    OwnerBinding($);
    KlinikBinding($);
    UploadLogo($);
})(jQuery);

function UploadLogo() {
    var $uploadCrop;

    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.form-upload').addClass('ready');
                $uploadCrop.croppie('bind', {
                    url: e.target.result
                }).then(function() {
                    console.log('jQuery bind complete');
                });

            }

            reader.readAsDataURL(input.files[0]);
        } else {
            swal("Sorry - you're browser doesn't support the FileReader API");
        }
    }

    $uploadCrop = $('#upload-demo').croppie({
        viewport: {
            width: 200,
            height: 258
        },
        boundary: {
            width: 300,
            height: 300
        },
        enableExif: true
    });

    $('#upload').on('change', function() {
        readFile(this);
    });

    $('#modal-image').on('shown.bs.modal', function() {

    });

    $('#modal-image').on('hidden.bs.modal', function() {
        $('.form-upload').removeClass('ready');
        $('#upload').val('');
    });


    $('#btn-save-logo').on('click', function(ev) {
        //ev.preventDefault();
        let id = $('#id_klinik').val();
        console.log(id);
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(resp) {
            $.ajax({
                url: BASE_URL + 'ControlPanel/postLogo',
                type: "POST",
                data: { "image": resp, "id": id },
                success: function(data) {
                    console.log(data);
                    //html = '<img src="' + resp + '" alt="Logo" class="brand-image-xl single d-block" style="width: 200px; margin:0 auto; padding-top:20px;" />';
                    //$("#upload-demo-i").html(html);
                    $('#logo_img').attr('src', resp);
                    $('#logo_filename').val(data);
                    $('#modal-image').modal('toggle');
                }
            });
        });
    });
}

function KlinikBinding($) {
    $("#btnAddKlinik").click(function() {
        window.location.href = BASE_URL + 'ControlPanel/klinik_detail/0';
    });

    $(".btn-active").click(function() {
        bootbox.confirm({
            title: "Konfirmasi",
            message: "Apakah Anda Yakin ?",
            centerVertical: true,
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Tidak',
                    className: 'btn-danger'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Ya',
                    className: 'btn-success'
                }
            },
            callback: function(result) {
                if (result === true) {
                    window.location.href = BASE_URL + 'ControlPanel/klinik_active/' + $("#id_klinik").val();
                    console.log(result);
                }
            }
        });
    });

    $(".btn-nonactive").click(function() {
        bootbox.confirm({
            title: "Konfirmasi",
            message: "Apakah Anda Yakin ?",
            centerVertical: true,
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Tidak',
                    className: 'btn-danger'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Ya',
                    className: 'btn-success'
                }
            },
            callback: function(result) {
                if (result === true) {
                    window.location.href = BASE_URL + 'ControlPanel/klinik_nonactive/' + $("#id_klinik").val();
                    console.log(result);
                }
            }
        });
    });

    var $tableKlinikDT = $("#tableKlinik").DataTable({
        autoWidth: false,
        processing: true,
        serverSide: true,
        pageLength: 10,
        order: [
            [1, "asc"]
        ],
        ajax: {
            url: BASE_URL + 'ControlPanel/getKlinikDatatable',
            type: "POST"
        },
        "columns": [
            { "data": "id" },
            { "data": "nama_klinik" },
            { "data": "nama_owner" },
            {
                "data": "status",
                "render": function(data, type, row) {
                    if (data === '1') {
                        return 'Aktif';
                    } else {
                        return 'Tidak Aktif';
                    }
                }
            },
            { "data": "aktif_sampai", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { "data": null }
        ],
        columnDefs: [{
                targets: [2, 3],
                orderable: true
            },
            {
                targets: [0],
                visible: false
            },
            {
                targets: '_all',
                orderable: false
            },
            {
                targets: -1,
                data: null,
                defaultContent: `<button class="btn btn-info btn-sm btn-edit"><i class="fas fa-pencil-alt"></i> Ubah</button>
            <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i> Hapus</button>`,
                className: "actions text-right"
            },
        ],
    });

    $("#tableKlinik tbody").on('click', 'button.btn-edit', function() {
        let data = $tableKlinikDT.row($(this).parents('tr')).data();
        window.location.href = BASE_URL + 'ControlPanel/klinik_detail/' + data['id'];
    });
    $("#tableKlinik tbody").on('click', 'button.btn-delete', function() {
        let data = $tableKlinikDT.row($(this).parents('tr')).data();
        let id = data['id'];

        bootbox.confirm({
            title: "Konfirmasi",
            message: "Apakah Anda Yakin ?",
            centerVertical: true,
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Tidak',
                    className: 'btn-danger'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Ya',
                    className: 'btn-success'
                }
            },
            callback: function(result) {
                if (result === true) {
                    window.location.href = BASE_URL + 'ControlPanel/klinik_delete/' + data['id'];
                    console.log(result);
                }
            }
        });
    });

}

function OwnerBinding($) {

    $("#btnAddOwner").click(function() {
        window.location.href = BASE_URL + 'ControlPanel/owner_detail/0';
    });

    var $tableOwnerDT = $("#tableOwner").DataTable({
        autoWidth: false,
        processing: true,
        serverSide: true,
        pageLength: 10,
        order: [
            [1, "asc"]
        ],
        ajax: {
            url: BASE_URL + 'ControlPanel/getOwnerDatatable',
            type: "POST"
        },
        "columns": [
            { "data": "id" },
            { "data": "nama_depan" },
            { "data": "nama_belakang" },
            { "data": "nama_perusahaan" },
            { "data": null }
        ],
        columnDefs: [{
                targets: [2, 3],
                orderable: true
            },
            {
                targets: [0],
                visible: false
            },
            {
                targets: '_all',
                orderable: false
            },
            {
                targets: -1,
                data: null,
                defaultContent: `<button class="btn btn-info btn-sm btn-edit"><i class="fas fa-pencil-alt"></i> Ubah</button>
            <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i> Hapus</button>`,
                className: "actions text-right"
            },
        ],
    });

    $("#tableOwner tbody").on('click', 'button.btn-edit', function() {
        let data = $tableOwnerDT.row($(this).parents('tr')).data();
        window.location.href = BASE_URL + 'ControlPanel/owner_detail/' + data['id'];
    });
    $("#tableOwner tbody").on('click', 'button.btn-delete', function() {
        let data = $tableOwnerDT.row($(this).parents('tr')).data();
        let id = data['id'];

        bootbox.confirm({
            title: "Konfirmasi",
            message: "Apakah Anda Yakin ?",
            centerVertical: true,
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Tidak',
                    className: 'btn-danger'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Ya',
                    className: 'btn-success'
                }
            },
            callback: function(result) {
                if (result === true) {
                    window.location.href = BASE_URL + 'ControlPanel/owner_delete/' + data['id'];
                    console.log(result);
                }
            }
        });
    });
}