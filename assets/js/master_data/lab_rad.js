$(function () {
    LabBinding();    
    RadBinding();    
});

function LabBinding() {
    $("#FormLab").validate();

    var $tableTipePasienDT = $("#tableLab").DataTable({
        autoWidth: false,
        processing: true,
        pageLength: 10,
        order: [
            [2, "asc"]
        ],
        ajax: function(data, callback, settings) {
            $.get(BASE_URL + 'MasterData/getLabDatatable', function(result) {
                callback(result);
            }, "json");
        },
        columns: [
            { "data": null },
            { "data": "laboratory_type_code" },
            { "data": "laboratory_type_desc" },
            { "data": "price" },
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

    $("#tableLab tbody").on('click', 'button.btn-edit', function() {
        let data = $tableTipePasienDT.row($(this).parents('tr')).data();
        $("#formIdLab").val(data['id']);
        $("#formKodeLab").val(data['laboratory_type_code']);
        $("#formNamaLab").val(data['laboratory_type_desc']);
        $("#formTarif").val(data['price']);
        $('#modal-formLab').modal('toggle');
    });

    $("#tableLab tbody").on('click', 'button.btn-delete', function() {
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
                        url: BASE_URL + "MasterData/deleteLab",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            $("#tableLab").DataTable()
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

    $('#btnAddLab').on('click', function() {
        $("#formIdLab").val(0);
        $("#formKodeLab").val('').focus();
        $("#formNamaLab").val('');
        $("#formTarif").val(0);
        $('#modal-formLab').modal('toggle');
    });    

    $("#btnSaveLab").on('click', function() {
        //event.preventDefault();
        if (!$('#FormLab').valid())
            return false;

        let id = $("#formIdLab").val();
        let kode_lab = $("#formKodeLab").val();
        let nama_lab = $("#formNamaLab").val();
        let tarif = $("#formTarif").val();

        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "MasterData/saveLab",
            data: JSON.stringify({ id: id, kode_lab: kode_lab, nama_lab: nama_lab, tarif: tarif }),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aSave).done(function(response) {
            if (response.status) {
                $("#tableLab").DataTable()
                    .ajax.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan'
                });
            } else
                console.log(response.message);
        });

        $('#modal-formLab').modal('toggle');
        return false;
    });    
 
}

function RadBinding() {
    $("#FormRad").validate();

    var $tableTipePasienDT = $("#tableRad").DataTable({
        autoWidth: false,
        processing: true,
        pageLength: 10,
        order: [
            [2, "asc"]
        ],
        ajax: function(data, callback, settings) {
            $.get(BASE_URL + 'MasterData/getRadDatatable', function(result) {
                callback(result);
            }, "json");
        },
        columns: [
            { "data": null },
            { "data": "radiology_type_code" },
            { "data": "radiology_type_desc" },
            { "data": "price" },
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

    $("#tableRad tbody").on('click', 'button.btn-edit', function() {
        let data = $tableTipePasienDT.row($(this).parents('tr')).data();
        $("#formIdRad").val(data['id']);
        $("#formKodeRad").val(data['radiology_type_code']);
        $("#formNamaRad").val(data['radiology_type_desc']);
        $("#formTarif").val(data['price']);
        $('#modal-formRad').modal('toggle');
    });

    $("#tableRad tbody").on('click', 'button.btn-delete', function() {
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
                        url: BASE_URL + "MasterData/deleteRad",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            $("#tableRad").DataTable()
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

    $('#btnAddRad').on('click', function() {
        $("#formIdRad").val(0);
        $("#formKodeRad").val('').focus();
        $("#formNamaRad").val('');
        $("#formTarif").val(0);
        $('#modal-formRad').modal('toggle');
    });    

    $("#btnSaveRad").on('click', function() {
        //event.preventDefault();
        if (!$('#FormRad').valid())
            return false;

        let id = $("#formIdRad").val();
        let kode_rad = $("#formKodeRad").val();
        let nama_rad = $("#formNamaRad").val();
        let tarif = $("#formTarif").val();

        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "MasterData/saveRad",
            data: JSON.stringify({ id: id, kode_rad: kode_rad, nama_rad: nama_rad, tarif: tarif }),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aSave).done(function(response) {
            if (response.status) {
                $("#tableRad").DataTable()
                    .ajax.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan'
                });
            } else
                console.log(response.message);
        });

        $('#modal-formRad').modal('toggle');
        return false;
    });    
 
}