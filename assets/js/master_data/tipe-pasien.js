$(function () {
    TipePasienBinding();    
});

function TipePasienBinding() {
    $("#FormTipePasien").validate();

    var $tableTipePasienDT = $("#tableTipePasien").DataTable({
        autoWidth: false,
        processing: true,
        pageLength: 10,
        order: [
            [2, "asc"]
        ],
        ajax: function(data, callback, settings) {
            $.get(BASE_URL + 'MasterData/getTipePasienDatatable', function(result) {
                callback(result);
            }, "json");
        },
        columns: [
            { "data": null },
            { "data": "tipe_pasien" },
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

    $('#btnAddTipePasien').on('click', function() {
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