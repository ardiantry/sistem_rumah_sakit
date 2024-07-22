$(function () {
    KelasBinding();    
    RuanganBinding();    
    BedBinding();    
});

function KelasBinding() {
    $("#FormKelas").validate();

    var $tableTipePasienDT = $("#tableKelas").DataTable({
        autoWidth: false,
        processing: true,
        pageLength: 10,
        order: [
            [2, "asc"]
        ],
        ajax: function(data, callback, settings) {
            $.get(BASE_URL + 'MasterData/getKelasDatatable', function(result) {
                callback(result);
            }, "json");
        },
        columns: [
            { "data": null },
            { "data": "nama_kelas" },
            { "data": "id" },            
            { "data": "id_klinik" },            
            { "data": null }
        ],
        columnDefs: [{
                targets: [2],
                orderable: true
            },
            {
                targets: [-2, -3],
                visible: false
            },
            {
                targets: '_all',
                orderable: false
            },
            {
                targets: -1,
                data: null,
                className: "actions text-right",
                render: function(data, type, row) {
                    if (row.id_klinik === null) {
                        return null;
                    } else {
                        return `<button class="btn btn-info btn-sm btn-edit"><i class="fas fa-pencil-alt"></i>Ubah</button>
                        <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i>Hapus</button>`;
                    }
                }                
            }
        ],
    });

    $tableTipePasienDT.on('order.dt search.dt', function() {
        $tableTipePasienDT.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();    

    $("#tableKelas tbody").on('click', 'button.btn-edit', function() {
        let data = $tableTipePasienDT.row($(this).parents('tr')).data();
        $("#formIdKelas").val(data['id']);
        $("#formNamaKelas").val(data['nama_kelas']);
        $('#modal-formKelas').modal('toggle');
    });

    $("#tableKelas tbody").on('click', 'button.btn-delete', function() {
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
                        url: BASE_URL + "MasterData/deleteKelas",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            $("#tableKelas").DataTable()
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

    $('#btnAddKelas').on('click', function() {
        $("#formIdKelas").val(0);
        $("#formNamaKelas").val('').focus();
        $('#modal-formKelas').modal('toggle');
    });    

    $("#btnSaveKelas").on('click', function() {
        //event.preventDefault();
        if (!$('#FormKelas').valid())
            return false;

        let id = $("#formIdKelas").val();
        let kelas = $("#formNamaKelas").val();

        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "MasterData/saveKelas",
            data: JSON.stringify({ id: id, nama_kelas: kelas }),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aSave).done(function(response) {
            if (response.status) {
                $("#tableKelas").DataTable()
                    .ajax.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan'
                });
            } else
                console.log(response.message);
        });

        $('#modal-formKelas').modal('toggle');
        return false;
    });    
 
}

function RuanganBinding() {
    $("#FormRuangan").validate();

    var $tableTipePasienDT = $("#tableRuangan").DataTable({
        autoWidth: false,
        processing: true,
        pageLength: 10,
        order: [
            [1, "asc"]
        ],
        ajax: function (data, callback, settings) {
            $.get(BASE_URL + 'MasterData/getRuanganDatatable', function (result) {
                callback(result);
            }, "json");
        },
        columns: [
            { "data": null },
            { "data": "nama_ruangan" },
            { "data": "nama_kelas" },
            { "data": "id" },
            { "data": "id_kelas" },
            { "data": null }
        ],
        columnDefs: [{
            targets: [1],
            orderable: true
        },
        {
            targets: [-2, -3],
            visible: false
        },
        {
            targets: '_all',
            orderable: false
        },
        {
            targets: -1,
            data: null,
            className: "actions text-right",
            render: function (data, type, row) {
                if (row.id_klinik === null) {
                    return null;
                } else {
                    return `<button class="btn btn-info btn-sm btn-edit"><i class="fas fa-pencil-alt"></i>Ubah</button>
                        <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i>Hapus</button>`;
                }
            }
        }
        ],
    });

    $tableTipePasienDT.on('order.dt search.dt', function () {
        $tableTipePasienDT.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    $("#tableRuangan tbody").on('click', 'button.btn-edit', function () {
        let data = $tableTipePasienDT.row($(this).parents('tr')).data();
        $("#formIdRuangan").val(data['id']);
        $("#formNamaRuangan").val(data['nama_ruangan']);
        $("#inputKelas").val(data['id_kelas']);
        $('#modal-formRuangan').modal('toggle');
    });

    $("#tableRuangan tbody").on('click', 'button.btn-delete', function () {
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
            callback: function (result) {
                if (result === true) {
                    let aDelete = $.ajax({
                        type: "POST",
                        url: BASE_URL + "MasterData/deleteRuangan",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function (response) {
                        if (response.status) {
                            $("#tableRuangan").DataTable()
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

    $('#btnAddRuangan').on('click', function () {
        $("#formIdRuangan").val(0);
        $("#formNamaRuangan").val('').focus();
        $("#inputKelas").val(null);
        $('#modal-formRuangan').modal('toggle');
    });

    $("#btnSaveRuangan").on('click', function () {
        //event.preventDefault();
        if (!$('#FormRuangan').valid())
            return false;

        let id = $("#formIdRuangan").val();
        let ruangan = $("#formNamaRuangan").val();
        let kelas = $("#inputKelas").val();

        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "MasterData/saveRuangan",
            data: JSON.stringify({ id: id, nama_ruangan: ruangan, id_kelas: kelas }),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aSave).done(function (response) {
            if (response.status) {
                $("#tableRuangan").DataTable()
                    .ajax.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan'
                });
            } else
                console.log(response.message);
        });

        $('#modal-formRuangan').modal('toggle');
        return false;
    });
}

function BedBinding() {
    $("#FormBed").validate();

    var $tableTipePasienDT = $("#tableBed").DataTable({
        autoWidth: false,
        processing: true,
        pageLength: 10,
        order: [
            [1, "asc"]
        ],
        ajax: function (data, callback, settings) {
            $.get(BASE_URL + 'MasterData/getBedDatatable', function (result) {
                callback(result);
            }, "json");
        },
        columns: [
            { "data": null },
            { "data": "nama_bed" },
            { "data": "tarif" },
            { "data": "nama_ruangan" },
            { "data": "nama_kelas" },
            { "data": "id" },
            { "data": "id_ruangan" },
            { "data": "id_kelas" },
            { "data": null }
        ],
        columnDefs: [{
            targets: [1],
            orderable: true
        },
        {
            targets: [-2, -3, -4],
            visible: false
        },
        {
            targets: '_all',
            orderable: false
        },
        {
            targets: -1,
            data: null,
            className: "actions text-right",
            render: function (data, type, row) {
                if (row.id_klinik === null) {
                    return null;
                } else {
                    return `<button class="btn btn-info btn-sm btn-edit"><i class="fas fa-pencil-alt"></i>Ubah</button>
                        <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i>Hapus</button>`;
                }
            }
        }
        ],
    });

    $tableTipePasienDT.on('order.dt search.dt', function () {
        $tableTipePasienDT.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    $("#tableBed tbody").on('click', 'button.btn-edit', function () {
        let data = $tableTipePasienDT.row($(this).parents('tr')).data();
        $("#formIdBed").val(data['id']);
        $("#formNamaBed").val(data['nama_bed']);
        $("#formTarif").val(data['tarif']);
        $("#inputKelas").val(data['id_kelas']);
        $("#inputRuangan").val(data['id_ruangan']);
        $('#modal-formBed').modal('toggle');
    });

    $("#tableBed tbody").on('click', 'button.btn-delete', function () {
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
            callback: function (result) {
                if (result === true) {
                    let aDelete = $.ajax({
                        type: "POST",
                        url: BASE_URL + "MasterData/deleteBed",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function (response) {
                        if (response.status) {
                            $("#tableBed").DataTable()
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

    $('#btnAddBed').on('click', function () {
        $("#formIdBed").val(0);
        $("#formNamaBed").val('').focus();
        $("#formTarif").val(0);
        $("#inputKelas").val(null);
        $("#inputRuangan").val(null);
        $('#modal-formBed').modal('toggle');
    });

    $("#btnSaveBed").on('click', function () {
        //event.preventDefault();
        if (!$('#FormBed').valid())
            return false;

        let id = $("#formIdBed").val();
        let bed = $("#formNamaBed").val();
        let tarif = $("#formTarif").val();
        let kelas = $("#inputKelas").val();
        let ruangan = $("#inputRuangan").val();

        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "MasterData/saveBed",
            data: JSON.stringify({ id: id, nama_bed: bed, tarif: tarif, id_ruangan: ruangan }),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aSave).done(function (response) {
            if (response.status) {
                $("#tableBed").DataTable()
                    .ajax.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan'
                });
            } else
                console.log(response.message);
        });

        $('#modal-formBed').modal('toggle');
        return false;
    });

    let onSelectedIndexChanged = function() {
        var ajaxURL = BASE_URL + 'MasterData/getRuanganByKelas';
        var id = $(this).val();
        $.ajax({
            url: ajaxURL,
            method: "GET",
            data: {
                id: id
            },
            async: true,
            dataType: 'json',
            success: function(data) {
                let $comboChild = $('#inputRuangan');
                $comboChild.empty();
                $comboChild.append('<option selected disabled>--pilih ruangan--</option>');
                let comboRuangan = {
                    $combo: $comboChild,
                    dataSource: data.data,
                    dataTextField: 'nama_ruangan',
                    dataValueField: 'id'
                };

                bindCombo(comboRuangan);
                // if (encounter.dokter) {
                //     if ($("#inputRuangan option[value='" + encounter.dokter.id_dokter + "']").length > 0) {
                //         $('#inputRuangan').val(encounter.dokter.id_dokter);
                //     }
                // }
            }
        });
    }
    $('#inputKelas').on('change', onSelectedIndexChanged);    
}