(function($) {
    //PEKERJAAN
    PekerjaanBinding($);
    //TipePasienBinding($);
    CaraBayarBinding($);
    UnitLayananBinding($);
    UnitLayananDetailBinding($);
    //DokterBinding($);
    LayananBinding($);
    JenisObatBinding($);
    SatuanBinding($);
    SpesifikasiBinding($);
    JenisRacikanBinding($);
    SupplierBinding($);
})(jQuery);

function PekerjaanBinding($) {
    $("#FormPekerjaan").validate();

    var $tablePekerjaanDT = $("#tablePekerjaan").DataTable({
        autoWidth: false,
        "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": [0, -1]
            },
            {
                targets: -1,
                data: null,
                defaultContent: `<button class="btn btn-info btn-sm btn-edit"><i class="fas fa-pencil-alt"></i>Ubah</button>
        <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i>Hapus</button>`,
                className: "actions text-right"
            },
            {
                targets: [1],
                visible: false
            }
        ],
        ajax: {
            url: BASE_URL + 'MasterData/getPekerjaanDatatable',
            cache: false
        },
        "columns": [
            { "data": null },
            { "data": "id" },
            { "data": "pekerjaan" },
            { "data": null }
        ]
    });

    $tablePekerjaanDT.on('order.dt search.dt', function() {
        $tablePekerjaanDT.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    $("#tablePekerjaan tbody").on('click', 'button.btn-edit', function() {
        let data = $tablePekerjaanDT.row($(this).parents('tr')).data();
        $("#formIdPekerjaan").val(data['id']);
        $("#formPekerjaan").val(data['pekerjaan']);
        $('#modal-formPekerjaan').modal('toggle');
    });

    $("#tablePekerjaan tbody").on('click', 'button.btn-delete', function() {
        let data = $tablePekerjaanDT.row($(this).parents('tr')).data();
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
                    let aDelete = $.ajax({
                        type: "POST",
                        url: BASE_URL + "MasterData/deletePekerjaan",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            $("#tablePekerjaan").DataTable()
                                .ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil dihapus'
                            });
                        } else
                            console.log(response.message);
                    });
                }
            }
        });
    });

    $("#btnAddPekerjaan").on('click', function() {
        $("#formIdPekerjaan").val(0);
        $("#formPekerjaan").val('').focus();
        $('#modal-formPekerjaan').modal('toggle');
    });

    $("#btnSavePekerjaan").on('click', function() {
        if (!$('#FormPekerjaan').valid())
            return false;

        let id = $("#formIdPekerjaan").val();
        let pekerjaan = $("#formPekerjaan").val();

        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "MasterData/savePekerjaan",
            data: JSON.stringify({ id: id, pekerjaan: pekerjaan }),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aSave).done(function(response) {
            if (response.status) {
                $("#tablePekerjaan").DataTable()
                    .ajax.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan'
                });
            } else
                console.log(response.message);
        });

        $('#modal-formPekerjaan').modal('toggle');
        return false;
    });
}

function TipePasienBinding($) {
    $("#FormTipePasien").validate();

    var $tableTipePasienDT = $("#tableTipePasien").DataTable({
        autoWidth: false,
        "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": [0, -1]
            },
            {
                targets: -1,
                data: null,
                defaultContent: `<button class="btn btn-info btn-sm btn-edit"><i class="fas fa-pencil-alt"></i>Ubah</button>
        <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i>Hapus</button>`,
                className: "actions text-right"
            },
            {
                targets: [1],
                visible: false
            }
        ],
        "ajax": BASE_URL + 'MasterData/getTipePasienDatatable',
        "columns": [
            { "data": null },
            { "data": "id" },
            { "data": "tipe_pasien" },
            { "data": null }
        ]
    });

    $tableTipePasienDT.on('order.dt search.dt', function() {
        $tableTipePasienDT.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    $("#tableTipePasien tbody").on('click', 'button.btn-edit', function() {
        let data = $tableTipePasienDT.row($(this).parents('tr')).data();
        $("#formIdTipePasien").val(data['id']);
        $("#formTipePasien").val(data['tipe_pasien']);
        $('#modal-formTipePasien').modal('toggle');
    });

    $("#tableTipePasien tbody").on('click', 'button.btn-delete', function() {
        let data = $tableTipePasienDT.row($(this).parents('tr')).data();
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
                    let aDelete = $.ajax({
                        type: "POST",
                        url: BASE_URL + "MasterData/deleteTipePasien",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            $("#tableTipePasien").DataTable()
                                .ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil dihapus'
                            });
                        } else
                            console.log(response.message);
                    });
                }
            }
        });
    });

    $("#btnAddTipePasien").on('click', function() {
        $("#formIdTipePasien").val(0);
        $("#formTipePasien").val('').focus();
        $('#modal-formTipePasien').modal('toggle');
    });

    $("#btnSaveTipePasien").on('click', function() {
        //event.preventDefault();
        if (!$('#FormTipePasien').valid())
            return false;

        let id = $("#formIdTipePasien").val();
        let tipePasien = $("#formTipePasien").val();

        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "MasterData/saveTipePasien",
            data: JSON.stringify({ id: id, tipe_pasien: tipePasien }),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aSave).done(function(response) {
            if (response.status) {
                $("#tableTipePasien").DataTable()
                    .ajax.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan'
                });
            } else
                console.log(response.message);
        });

        $('#modal-formTipePasien').modal('toggle');
        return false;
    });
}

function CaraBayarBinding($) {
    $.getJSON(BASE_URL + 'MasterData/getCaraBayarAjax', function(data) {
        bindCombo({
            $combo: $('#master_akun'),
            dataSource: data.akun,
            dataTextField: 'akun_display',
            dataValueField: 'id'
        });
    })

    $("#FormCaraBayar").validate();

    var $tableCaraBayarDT = $("#tableCaraBayar").DataTable({
        autoWidth: false,
        "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": [0, -1]
            },
            {
                targets: -1,
                data: null,
                defaultContent: `<button class="btn btn-info btn-sm btn-edit"><i class="fas fa-pencil-alt"></i>Ubah</button>
        <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i>Hapus</button>`,
                className: "actions text-right"
            },
            {
                targets: [1, 4],
                visible: false
            }
        ],
        "ajax": BASE_URL + 'MasterData/getCaraBayarDatatable',
        "columns": [
            { "data": null },
            { "data": "id" },
            { "data": "cara_bayar" },
            { "data": "nama_akun" },
            { "data": "id_akun" },
            { "data": null }
        ]
    });

    $tableCaraBayarDT.on('order.dt search.dt', function() {
        $tableCaraBayarDT.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    $("#tableCaraBayar tbody").on('click', 'button.btn-edit', function() {
        let data = $tableCaraBayarDT.row($(this).parents('tr')).data();
        $("#formIdCaraBayar").val(data['id']);
        $("#formCaraBayar").val(data['cara_bayar']);
        $("#master_akun").val(data['id_akun']);
        $('#modal-formCaraBayar').modal('toggle');
    });

    $("#tableCaraBayar tbody").on('click', 'button.btn-delete', function() {
        let data = $tableCaraBayarDT.row($(this).parents('tr')).data();
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
                    let aDelete = $.ajax({
                        type: "POST",
                        url: BASE_URL + "MasterData/deleteCaraBayar",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            $("#tableCaraBayar").DataTable()
                                .ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil dihapus'
                            });
                        } else
                            console.log(response.message);
                    });
                }
            }
        });
    });

    $("#btnAddCaraBayar").on('click', function() {
        $("#formIdCaraBayar").val(0);
        $("#formCaraBayar").val('').focus();
        $("#master_akun").val('');
        $('#modal-formCaraBayar').modal('toggle');
    });

    $("#btnSaveCaraBayar").on('click', function() {
        //event.preventDefault();
        if (!$('#FormCaraBayar').valid())
            return false;

        let id = $("#formIdCaraBayar").val();
        let cara_bayar = $("#formCaraBayar").val();
        let id_akun = $('#master_akun').val();

        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "MasterData/saveCaraBayar",
            data: JSON.stringify({ id: id, cara_bayar: cara_bayar, id_akun: id_akun }),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aSave).done(function(response) {
            if (response.status) {
                $("#tableCaraBayar").DataTable()
                    .ajax.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan'
                });
            } else
                console.log(response.message);
        });

        $('#modal-formCaraBayar').modal('toggle');
        return false;
    });
}

function UnitLayananBinding($) {
    $("#FormUnitLayanan").validate();

    var $tableUnitLayananDT = $("#tableUnitLayanan").DataTable({
        autoWidth: false,
        "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": [0, -1]
            },
            {
                targets: -1,
                data: null,
                defaultContent: `<button class="btn btn-primary btn-sm btn-view" ><i class="fas fa-folder"></i>
            Detail
            </button>
            <button class="btn btn-info btn-sm btn-edit"><i class="fas fa-pencil-alt"></i>
            Ubah
            </button>
            <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i>
            Hapus
            </button>`,
                className: "actions text-right"
            },
            {
                targets: [1],
                visible: false
            }
        ],
        "ajax": BASE_URL + 'MasterData/getUnitLayananDataTable',
        "columns": [
            { "data": null },
            { "data": "id" },
            { "data": "nama_unit_layanan" },
            { "data": null }
        ]
    });

    $tableUnitLayananDT.on('order.dt search.dt', function() {
        $tableUnitLayananDT.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();


    $("#tableUnitLayanan tbody").on('click', 'button.btn-view', function() {
        let data = $tableUnitLayananDT.row($(this).parents('tr')).data();
        window.location.href = BASE_URL + 'MasterData/unit_layanan_detail/' + data['id'];
    });

    $("#tableUnitLayanan tbody").on('click', 'button.btn-edit', function() {
        let data = $tableUnitLayananDT.row($(this).parents('tr')).data();
        $("#formIdUnitLayanan").val(data['id']);
        $("#formUnitLayanan").val(data['nama_unit_layanan']);
        $('#modal-formUnitLayanan').modal('toggle');
    });

    $("#tableUnitLayanan tbody").on('click', 'button.btn-delete', function() {
        let data = $tableUnitLayananDT.row($(this).parents('tr')).data();
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
                    let aDelete = $.ajax({
                        type: "POST",
                        url: BASE_URL + "MasterData/deleteUnitLayanan",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            $("#tableUnitLayanan").DataTable()
                                .ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil dihapus'
                            });
                        } else
                            console.log(response.message);
                    });
                }
            }
        });
    });

    $("#btnAddUnitLayanan").on('click', function() {
        $("#formIdUnitLayanan").val(0);
        $("#formUnitLayanan").val('').focus();
        $('#modal-formUnitLayanan').modal('toggle');
    });

    $("#btnSaveUnitLayanan").on('click', function() {
        //event.preventDefault();
        if (!$('#FormUnitLayanan').valid())
            return false;

        let id = $("#formIdUnitLayanan").val();
        let unitLayanan = $("#formUnitLayanan").val();

        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "MasterData/saveUnitLayanan",
            data: JSON.stringify({ id: id, nama_unit_layanan: unitLayanan }),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aSave).done(function(response) {
            if (response.status) {
                $("#tableUnitLayanan").DataTable()
                    .ajax.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan'
                });
            } else
                console.log(response.message);
        });

        $('#modal-formUnitLayanan').modal('toggle');
        return false;
    });
}

function LayananBinding($) {
    $("#FormLayanan").validate();

    var $tableLayananDT = $("#tableLayanan").DataTable({
        autoWidth: false,
        "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": [0, -1]
            },
            {
                targets: -1,
                data: null,
                defaultContent: `<button class="btn btn-info btn-sm btn-edit"><i class="fas fa-pencil-alt"></i>Ubah</button>
        <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i>Hapus</button>`,
                className: "actions text-right"
            },
            {
                targets: [1],
                visible: false
            }
        ],
        "ajax": BASE_URL + 'MasterData/getLayananDataTable',
        "columns": [
            { "data": null },
            { "data": "id" },
            { "data": "nama_layanan" },
            { "data": "harga_layanan" },
            { "data": null }
        ]
    });

    $tableLayananDT.on('order.dt search.dt', function() {
        $tableLayananDT.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    $("#tableLayanan tbody").on('click', 'button.btn-edit', function() {
        let data = $tableLayananDT.row($(this).parents('tr')).data();
        $("#formIdLayanan").val(data['id']);
        $("#formNamaLayanan").val(data['nama_layanan']);
        $("#formHargaLayanan").val(data['harga_layanan']);
        $('#modal-formLayanan').modal('toggle');
    });

    $("#tableLayanan tbody").on('click', 'button.btn-delete', function() {
        let data = $tableLayananDT.row($(this).parents('tr')).data();
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
                    let aDelete = $.ajax({
                        type: "POST",
                        url: BASE_URL + "MasterData/deleteLayanan",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            $("#tableLayanan").DataTable()
                                .ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil dihapus'
                            });
                        } else
                            console.log(response.message);
                    });
                }
            }
        });
    });

    $("#btnAddLayanan").on('click', function() {
        $("#formIdLayanan").val(0);
        $("#formNamaLayanan").val('').focus();
        $("#formHargaLayanan").val(0);
        $('#modal-formLayanan').modal('toggle');
    });

    $("#btnSaveLayanan").on('click', function() {
        //event.preventDefault();
        if (!$('#FormLayanan').valid())
            return false;

        let id = $("#formIdLayanan").val();
        let namaLayanan = $("#formNamaLayanan").val();
        let hargaLayanan = $("#formHargaLayanan").val();

        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "MasterData/saveLayanan",
            data: JSON.stringify({ id: id, nama_layanan: namaLayanan, harga_layanan: hargaLayanan }),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aSave).done(function(response) {
            if (response.status) {
                $("#tableLayanan").DataTable()
                    .ajax.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan'
                });
            } else
                console.log(response.message);
        });

        $('#modal-formLayanan').modal('toggle');
        return false;
    });
}

function UnitLayananDetailBinding($) {
    var $tableRegisterDokterDT = $("#tableRegisterDokter").DataTable({
        autoWidth: false,
        paging: false,
        ordering: false,
        info: false,
        searching: false,
        "columnDefs": [{
                targets: -1,
                data: null,
                defaultContent: `<div class="btn-group btn-group-sm"><button class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button></div>`,
                className: "text-right py-0 align-middle"
            },
            {
                targets: [0, -2, -3],
                visible: false
            }
        ],
        ajax: {
            url: BASE_URL + 'MasterData/getRegisterDokterDatatable',
            type: "POST",
            data: { id: $("#inputIdUnitLayanan").val() },
            async: true,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        },
        "columns": [
            { "data": "id" },
            { "data": "nama_dokter" },
            { "data": "sip" },
            { "data": "id_unit_layanan" },
            { "data": "id_dokter" },
            { "data": null }
        ]
    });

    var $tableRegisterLayananDT = $("#tableRegisterLayanan").DataTable({
        autoWidth: false,
        paging: false,
        ordering: false,
        info: false,
        searching: false,
        "columnDefs": [{
                targets: -1,
                data: null,
                defaultContent: `<div class="btn-group btn-group-sm"><button class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button></div>`,
                className: "text-right py-0 align-middle"
            },
            {
                targets: [0, -2, -3],
                visible: false
            }
        ],
        ajax: {
            url: BASE_URL + 'MasterData/getRegisterLayananDatatable',
            type: "POST",
            data: { id: $("#inputIdUnitLayanan").val() },
            async: true,
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        },
        "columns": [
            { "data": "id" },
            { "data": "nama_layanan" },
            { "data": "harga_layanan" },
            { "data": "id_unit_layanan" },
            { "data": "id_layanan" },
            { "data": null }
        ]
    });

    $("#btnAddRegisterDokter").on('click', function() {
        $('#modal-RegisterDokter').modal('toggle');
    });

    var $tableModalRegisterDokterDT = $("#tableModalRegisterDokter").DataTable({
        autoWidth: false,
        processing: true,
        serverSide: true,
        pageLength: 10,
        order: [
            [1, "asc"]
        ],
        ajax: {
            url: BASE_URL + 'MasterData/getIntersecRegisterDokterDatatable',
            type: "POST",
            data: function(d) {
                d.id_unit_layanan = $("#inputIdUnitLayanan").val();
            }
        },
        "columns": [
            { "data": 'id' },
            { "data": 'id' },
            { "data": "nama_dokter" },
            { "data": "sip" }
        ],
        columnDefs: [{
                targets: 0,
                checkboxes: {
                    selectRow: true
                }
            },
            {
                targets: 1,
                visible: false
            }
        ],
        select: {
            style: 'multi',
            selector: 'td:first-child'
        }
    });

    // When modal window is shown
    $('#modal-RegisterDokter').on('shown.bs.modal', function() {
        // Adjust column width and re-initialize Responsive extension
        $("#tableModalRegisterDokter").DataTable().columns().checkboxes.deselect(true)
            .ajax.reload();
    });

    // Handle form submission event
    $("#btnSaveRegisterDokter").on('click', function() {

        let rows_selected = $tableModalRegisterDokterDT.column(0).checkboxes.selected();
        let data = [];
        let id_unit_layanan = $("#inputIdUnitLayanan").val();

        $.each(rows_selected, function(index, rowId) {
            data.push({ id_dokter: rowId, id_unit_layanan: id_unit_layanan });
        });

        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "MasterData/saveRegisterDokter",
            data: JSON.stringify(data),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aSave).done(function(response) {
            if (response.status) {
                $("#tableRegisterDokter").DataTable()
                    .ajax.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan'
                });
            } else
                console.log(response.message);
        });

        $('#modal-RegisterDokter').modal('toggle');
        return false;
    });

    $("#tableRegisterDokter tbody").on('click', 'button.btn-delete', function() {
        let data = $tableRegisterDokterDT.row($(this).parents('tr')).data();
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
                    let aDelete = $.ajax({
                        type: "POST",
                        url: BASE_URL + "MasterData/deleteRegisterDokter",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            $("#tableRegisterDokter").DataTable()
                                .ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil dihapus'
                            });
                        } else
                            console.log(response.message);
                    });
                }
            }
        });
    });

    $("#btnAddRegisterLayanan").on('click', function() {
        $('#modal-RegisterLayanan').modal('toggle');
    });

    var $tableModalRegisterLayananDT = $("#tableModalRegisterLayanan").DataTable({
        autoWidth: false,
        processing: true,
        serverSide: true,
        pageLength: 10,
        order: [
            [1, "asc"]
        ],
        ajax: {
            url: BASE_URL + 'MasterData/getIntersecRegisterLayananDatatable',
            type: "POST",
            data: function(d) {
                d.id_unit_layanan = $("#inputIdUnitLayanan").val();
            }
        },
        "columns": [
            { "data": 'id' },
            { "data": 'id' },
            { "data": "nama_layanan" },
            { "data": "harga_layanan" }
        ],
        columnDefs: [{
                targets: 0,
                checkboxes: {
                    selectRow: true
                }
            },
            {
                targets: 1,
                visible: false
            }
        ],
        select: {
            style: 'multi',
            selector: 'td:first-child'
        }
    });

    // When modal window is shown
    $('#modal-RegisterLayanan').on('shown.bs.modal', function() {
        // Adjust column width and re-initialize Responsive extension
        $("#tableModalRegisterLayanan").DataTable().columns().checkboxes.deselect(true)
            .ajax.reload();
    });

    // Handle form submission event
    $("#btnSaveRegisterLayanan").on('click', function() {

        let rows_selected = $tableModalRegisterLayananDT.column(0).checkboxes.selected();
        let data = [];
        let id_unit_layanan = $("#inputIdUnitLayanan").val();

        $.each(rows_selected, function(index, rowId) {
            data.push({ id_layanan: rowId, id_unit_layanan: id_unit_layanan });
        });

        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "MasterData/saveRegisterLayanan",
            data: JSON.stringify(data),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aSave).done(function(response) {
            if (response.status) {
                $("#tableRegisterLayanan").DataTable()
                    .ajax.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan'
                });
            } else
                console.log(response.message);
        });

        $('#modal-RegisterLayanan').modal('toggle');
        return false;
    });

    $("#tableRegisterLayanan tbody").on('click', 'button.btn-delete', function() {
        let data = $tableRegisterLayananDT.row($(this).parents('tr')).data();
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
                    let aDelete = $.ajax({
                        type: "POST",
                        url: BASE_URL + "MasterData/deleteRegisterLayanan",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            $("#tableRegisterLayanan").DataTable()
                                .ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil dihapus'
                            });
                        } else
                            console.log(response.message);
                    });
                }
            }
        });
    });
}

function JenisObatBinding($) {
    $("#FormJenisObat").validate();

    var $tableJenisObatDT = $("#tableJenisObat").DataTable({
        autoWidth: false,
        "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": [0, -1]
            },
            {
                targets: -1,
                data: null,
                defaultContent: `<button class="btn btn-info btn-sm btn-edit"><i class="fas fa-pencil-alt"></i>Ubah</button>
        <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i>Hapus</button>`,
                className: "actions text-right"
            },
            {
                targets: [1, -1],
                visible: false
            }
        ],
        "ajax": BASE_URL + 'MasterData/getJenisObatDatatable',
        "columns": [
            { "data": null },
            { "data": "id" },
            { "data": "nama_jenis_obat" },
            { "data": null }
        ]
    });

    $tableJenisObatDT.on('order.dt search.dt', function() {
        $tableJenisObatDT.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    $("#tableJenisObat tbody").on('click', 'button.btn-edit', function() {
        let data = $tableJenisObatDT.row($(this).parents('tr')).data();
        $("#formIdJenisObat").val(data['id']);
        $("#formJenisObat").val(data['nama_jenis_obat']);
        $('#modal-formJenisObat').modal('toggle');
    });

    $("#tableJenisObat tbody").on('click', 'button.btn-delete', function() {
        let data = $tableJenisObatDT.row($(this).parents('tr')).data();
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
                    let aDelete = $.ajax({
                        type: "POST",
                        url: BASE_URL + "MasterData/deleteJenisObat",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            $("#tableJenisObat").DataTable()
                                .ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil dihapus'
                            });
                        } else
                            console.log(response.message);
                    });
                }
            }
        });
    });

    $("#btnAddJenisObat").on('click', function() {
        $("#formIdJenisObat").val(0);
        $("#formJenisObat").val('').focus();
        $('#modal-formJenisObat').modal('toggle');
    });

    $("#btnSaveJenisObat").on('click', function() {
        //event.preventDefault();
        if (!$('#FormJenisObat').valid())
            return false;

        let id = $("#formIdJenisObat").val();
        let jenis_obat = $("#formJenisObat").val();

        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "MasterData/saveJenisObat",
            data: JSON.stringify({ id: id, jenis_obat: jenis_obat }),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aSave).done(function(response) {
            if (response.status) {
                $("#tableJenisObat").DataTable()
                    .ajax.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan'
                });
            } else
                console.log(response.message);
        });

        $('#modal-formJenisObat').modal('toggle');
        return false;
    });
}

function SatuanBinding($) {
    $("#FormSatuan").validate();

    var $tableSatuantDT = $("#tableSatuan").DataTable({
        autoWidth: false,
        "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": [0, -1]
            },
            {
                targets: -1,
                data: null,
                defaultContent: `<button class="btn btn-info btn-sm btn-edit"><i class="fas fa-pencil-alt"></i>Ubah</button>
        <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i>Hapus</button>`,
                className: "actions text-right"
            },
            {
                targets: [1, -1],
                visible: false
            }
        ],
        "ajax": BASE_URL + 'MasterData/getSatuanDatatable',
        "columns": [
            { "data": null },
            { "data": "id" },
            { "data": "nama_satuan" },
            { "data": "kode_satuan" },
            { "data": null }
        ]
    });

    $tableSatuantDT.on('order.dt search.dt', function() {
        $tableSatuantDT.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    $("#tableSatuan tbody").on('click', 'button.btn-edit', function() {
        let data = $tableSatuantDT.row($(this).parents('tr')).data();
        $("#formIdSatuan").val(data['id']);
        $("#formSatuan").val(data['nama_satuan']);
        $('#modal-formSatuan').modal('toggle');
    });

    $("#tableSatuan tbody").on('click', 'button.btn-delete', function() {
        let data = $tableSatuantDT.row($(this).parents('tr')).data();
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
                    let aDelete = $.ajax({
                        type: "POST",
                        url: BASE_URL + "MasterData/deleteSatuans",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            $("#tableSatuan").DataTable()
                                .ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil dihapus'
                            });
                        } else
                            console.log(response.message);
                    });
                }
            }
        });
    });

    $("#btnAddSatuan").on('click', function() {
        $("#formIdSatuan").val(0);
        $("#formSatuan").val('').focus();
        $('#modal-formSatuan').modal('toggle');
    });

    $("#btnSaveSatuan").on('click', function() {
        //event.preventDefault();
        if (!$('#FormJenisObat').valid())
            return false;

        let id = $("#formIdSatuan").val();
        let jenis_obat = $("#formSatuans").val();

        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "MasterData/saveSatuan",
            data: JSON.stringify({ id: id, jenis_obat: jenis_obat }),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aSave).done(function(response) {
            if (response.status) {
                $("#tableSatuan").DataTable()
                    .ajax.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan'
                });
            } else
                console.log(response.message);
        });

        $('#modal-formSatuan').modal('toggle');
        return false;
    });
}

function JenisObatBinding($) {
    $("#FormJenisObat").validate();

    var $tableJenisObatDT = $("#tableJenisObat").DataTable({
        autoWidth: false,
        "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": [0, -1]
            },
            {
                targets: -1,
                data: null,
                defaultContent: `<button class="btn btn-info btn-sm btn-edit"><i class="fas fa-pencil-alt"></i>Ubah</button>
        <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i>Hapus</button>`,
                className: "actions text-right"
            },
            {
                targets: [1, -1],
                visible: false
            }
        ],
        "ajax": BASE_URL + 'MasterData/getJenisObatDatatable',
        "columns": [
            { "data": null },
            { "data": "id" },
            { "data": "nama_jenis_obat" },
            { "data": null }
        ]
    });

    $tableJenisObatDT.on('order.dt search.dt', function() {
        $tableJenisObatDT.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    $("#tableJenisObat tbody").on('click', 'button.btn-edit', function() {
        let data = $tableJenisObatDT.row($(this).parents('tr')).data();
        $("#formIdJenisObat").val(data['id']);
        $("#formJenisObat").val(data['nama_jenis_obat']);
        $('#modal-formJenisObat').modal('toggle');
    });

    $("#tableJenisObat tbody").on('click', 'button.btn-delete', function() {
        let data = $tableJenisObatDT.row($(this).parents('tr')).data();
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
                    let aDelete = $.ajax({
                        type: "POST",
                        url: BASE_URL + "MasterData/deleteJenisObat",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            $("#tableJenisObat").DataTable()
                                .ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil dihapus'
                            });
                        } else
                            console.log(response.message);
                    });
                }
            }
        });
    });

    $("#btnAddJenisObat").on('click', function() {
        $("#formIdJenisObat").val(0);
        $("#formJenisObat").val('').focus();
        $('#modal-formJenisObat').modal('toggle');
    });

    $("#btnSaveJenisObat").on('click', function() {
        //event.preventDefault();
        if (!$('#FormJenisObat').valid())
            return false;

        let id = $("#formIdJenisObat").val();
        let jenis_obat = $("#formJenisObat").val();

        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "MasterData/saveJenisObat",
            data: JSON.stringify({ id: id, jenis_obat: jenis_obat }),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aSave).done(function(response) {
            if (response.status) {
                $("#tableJenisObat").DataTable()
                    .ajax.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan'
                });
            } else
                console.log(response.message);
        });

        $('#modal-formJenisObat').modal('toggle');
        return false;
    });
}

function SpesifikasiBinding($) {
    $("#FormSpesifikasi").validate();

    var $tableSpesifikasiDT = $("#tableSpesifikasi").DataTable({
        autoWidth: false,
        "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": [0, -1]
            },
            {
                targets: -1,
                data: null,
                defaultContent: `<button class="btn btn-info btn-sm btn-edit"><i class="fas fa-pencil-alt"></i>Ubah</button>
        <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i>Hapus</button>`,
                className: "actions text-right"
            },
            {
                targets: [1, -1],
                visible: false
            }
        ],
        "ajax": BASE_URL + 'MasterData/getSpesifikasiDatatable',
        "columns": [
            { "data": null },
            { "data": "id" },
            { "data": "nama_spesifikasi" },
            { "data": null }
        ]
    });

    $tableSpesifikasiDT.on('order.dt search.dt', function() {
        $tableSpesifikasiDT.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    $("#tableSpesifikasi tbody").on('click', 'button.btn-edit', function() {
        let data = $tableSpesifikasiDT.row($(this).parents('tr')).data();
        $("#formIdSpesifikasi").val(data['id']);
        $("#FormSpesifikasi").val(data['nama_satuan']);
        $('#modal-formSpesifikasi').modal('toggle');
    });

    $("#tableSpesifikasi tbody").on('click', 'button.btn-delete', function() {
        let data = $tableSpesifikasiDT.row($(this).parents('tr')).data();
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
                    let aDelete = $.ajax({
                        type: "POST",
                        url: BASE_URL + "MasterData/deleteSpesifikasis",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            $("#tableSatuan").DataTable()
                                .ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil dihapus'
                            });
                        } else
                            console.log(response.message);
                    });
                }
            }
        });
    });

    $("#btnAddSpesifikasi").on('click', function() {
        $("#formIdSpesifikasi").val(0);
        $("#formSpesifikasi").val('').focus();
        $('#modal-formSpesifikasi').modal('toggle');
    });

    $("#btnSaveSpesifikasi").on('click', function() {
        //event.preventDefault();
        if (!$('#FormSpesifikasi').valid())
            return false;

        let id = $("#formIdSpesifikasi").val();
        let jenis_obat = $("#formSpesifikasi").val();

        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "MasterData/saveSpesifikasi",
            data: JSON.stringify({ id: id, jenis_obat: jenis_obat }),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aSave).done(function(response) {
            if (response.status) {
                $("#tableSpesifikasi").DataTable()
                    .ajax.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan'
                });
            } else
                console.log(response.message);
        });

        $('#modal-formSpesifikasi').modal('toggle');
        return false;
    });
}

function JenisRacikanBinding($) {
    $("#FormJenisRacikan").validate();

    var $tableJenisRacikanDT = $("#tableJenisRacikan").DataTable({
        autoWidth: false,
        "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": [0, -1]
            },
            {
                targets: -1,
                data: null,
                defaultContent: `<button class="btn btn-info btn-sm btn-edit"><i class="fas fa-pencil-alt"></i>Ubah</button>
        <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i>Hapus</button>`,
                className: "actions text-right"
            },
            {
                targets: [1, -1],
                visible: false
            }
        ],
        "ajax": BASE_URL + 'MasterData/getJenisRacikanDatatable',
        "columns": [
            { "data": null },
            { "data": "id" },
            { "data": "nama_jenis_racikan" },
            { "data": null }
        ]
    });

    $tableJenisRacikanDT.on('order.dt search.dt', function() {
        $tableJenisRacikanDT.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    $("#tableJenisRacikan tbody").on('click', 'button.btn-edit', function() {
        let data = $tableJenisRacikanDT.row($(this).parents('tr')).data();
        $("#formIdJenisRacikan").val(data['id']);
        $("#formJenisRacikan").val(data['nama_jenis_racikan']);
        $('#modal-formJenisRacikan').modal('toggle');
    });

    $("#tableJenisRacikan tbody").on('click', 'button.btn-delete', function() {
        let data = $tableJenisRacikanDT.row($(this).parents('tr')).data();
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
                    let aDelete = $.ajax({
                        type: "POST",
                        url: BASE_URL + "MasterData/deleteJenisRacikan",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            $("#tableJenisRacikan").DataTable()
                                .ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil dihapus'
                            });
                        } else
                            console.log(response.message);
                    });
                }
            }
        });
    });

    $("#btnAddJenisRacikan").on('click', function() {
        $("#formIdJenisRacikan").val(0);
        $("#formJenisRacikan").val('').focus();
        $('#modal-formJenisRacikan').modal('toggle');
    });

    $("#btnSaveJenisRacikan").on('click', function() {
        //event.preventDefault();
        if (!$('#FormJenisRacikan').valid())
            return false;

        let id = $("#formIdJenisRacikan").val();
        let jenis_racikan = $("#formJenisRacikan").val();

        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "MasterData/saveJenisRacikan",
            data: JSON.stringify({ id: id, jenis_racikan: jenis_racikan }),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aSave).done(function(response) {
            if (response.status) {
                $("#tableJenisRacikan").DataTable()
                    .ajax.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan'
                });
            } else
                console.log(response.message);
        });

        $('#modal-formJenisRacikan').modal('toggle');
        return false;
    });
}

function SupplierBinding($) {
    $("#FormSupplier").validate();

    var $tableSupplierDT = $("#tableSupplier").DataTable({
        autoWidth: false,
        "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": [0, -1]
            },
            {
                targets: -1,
                data: null,
                defaultContent: `<button class="btn btn-info btn-sm btn-edit"><i class="fas fa-pencil-alt"></i>Ubah</button>
        <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i>Hapus</button>`,
                className: "actions text-right"
            },
            {
                targets: [1],
                visible: false
            }
        ],
        "ajax": BASE_URL + 'MasterData/getSupplierDatatable',
        "columns": [
            { "data": null },
            { "data": "id" },
            { "data": "nama_supplier" },
            { "data": "kode_supplier" },
            { "data": "alamat" },
            { "data": "kota" },
            { "data": "contact_person" },
            { "data": "no_telp" },
            { "data": "no_fax" },
            { "data": "no_hp" },
            { "data": null }
        ]
    });

    $tableSupplierDT.on('order.dt search.dt', function() {
        $tableSupplierDT.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    $("#tableSupplier tbody").on('click', 'button.btn-edit', function() {
        let data = $tableSupplierDT.row($(this).parents('tr')).data();
        $("#formIdSupplier").val(data['id']);
        $("#formNamaSupplier").val(data['nama_supplier']);
        $("#formKodeSupplier").val(data['kode_supplier']);
        $("#formAlamat").val(data['alamat']);
        $("#formKota").val(data['kota']);
        $("#formKontak").val(data['contact_person']);
        $("#formNoTelp").val(data['no_telp']);
        $("#formNoFax").val(data['no_fax']);
        $("#formNoHp").val(data['no_hp']);
        $('#modal-formSupplier').modal('toggle');
    });

    $("#tableSupplier tbody").on('click', 'button.btn-delete', function() {
        let data = $tableSupplierDT.row($(this).parents('tr')).data();
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
                    let aDelete = $.ajax({
                        type: "POST",
                        url: BASE_URL + "MasterData/deleteSupplier",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            $("#tableSupplier").DataTable()
                                .ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil dihapus'
                            });
                        } else
                            console.log(response.message);
                    });
                }
            }
        });
    });

    $("#btnAddSupplier").on('click', function() {
        $('#FormSupplier')[0].reset()
        $("#formIdSupplier").val(0);
        $("#formNamaSupplier").val('').focus();
        $('#modal-formSupplier').modal('toggle');
    });

    $("#btnSaveSupplier").on('click', function() {
        //event.preventDefault();
        if (!$('#FormSupplier').valid())
            return false;

        let id = $("#formIdSupplier").val();
        let nama_supplier = $("#formNamaSupplier").val();
        let kode_supplier = $("#formKodeSupplier").val();
        let alamat = $("#formAlamat").val();
        let kota = $("#formKota").val();
        let kontak = $("#formKontak").val();
        let no_telp = $("#formNoTelp").val();
        let no_fax = $("#formNoFax").val();
        let no_hp = $("#formNoHp").val();

        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "MasterData/saveSupplier",
            data: JSON.stringify({ id: id, nama_supplier: nama_supplier, kode_supplier: kode_supplier, alamat: alamat, kota: kota, contact_person: kontak, no_telp: no_telp, no_fax: no_fax, no_hp: no_hp }),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aSave).done(function(response) {
            if (response.status) {
                $("#tableSupplier").DataTable()
                    .ajax.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan'
                });
            } else
                console.log(response.message);
        });

        $('#modal-formSupplier').modal('toggle');
        return false;
    });
}