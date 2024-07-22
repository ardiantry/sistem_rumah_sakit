class Petugas {
    constructor({ id, nama_petugas }) {
        this.id = parseInt(id);
        this.nama_petugas = nama_petugas;
        this.ktp  = null;
        this.alamat = null;
        this.no_telp = null;
        this.email = null;

        this.render = function() {
			var self = this;
            $('#formIdPetugas').val(this.id);
            $('#formNamaPetugas').val(this.nama_petugas);
            $('#formKTP').val(this.ktp);
            $('#formAlamat').val(this.alamat);
            $('#formNoTelp').val(this.no_telp);
            $('#formEmail').val(this.email);
        };
    }
}
window.petugas = new Petugas({ id: 0, nama_petugas: null });

$(function () {  
    PetugasBinding();
});

function PetugasBinding() {
    $("#FormPetugas").validate();

    var $tablePetugasDT = $("#tablePetugas").DataTable({
        autoWidth: false,
        processing: true,
        pageLength: 10,
        order: [
            [2, "asc"]
        ],
        ajax: function(data, callback, settings) {
            $.get(BASE_URL + 'MasterData/getPetugasDataTable', function(result) {
                callback(result);
            }, "json");
        },        
        columns: [
            { "data": null },
            { "data": "nama_petugas" },
            { "data": "alamat" },
            { "data": "no_telp" },
            { "data": "email" },
            { "data": "ktp" },
            { "data": "id" },            
            { "data": null }
        ],		
        columnDefs: [
			{
                searchable: false,
                orderable: false,
                targets: [0, -1]
            },
            {
                targets: -1,
                data: null,
                defaultContent: `<button class="btn btn-info btn-sm btn-edit"><i class="fas fa-pencil-alt"></i>Ubah</button>
        <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i>Hapus</button>`,
                className: "actions text-right"
            },
            {
                targets: [-2],
                visible: false
            }
        ]
    });

    $tablePetugasDT.on('order.dt search.dt', function() {
        $tablePetugasDT.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    $("#tablePetugas tbody").on('click', 'button.btn-edit', function() {
        let data = $tablePetugasDT.row($(this).parents('tr')).data();
		const practitionerArr = {
			id: data.id,
            nama_petugas: data.nama_petugas,
		};

        petugas = new Petugas(practitionerArr);
		petugas.ktp = data.ktp;
		petugas.alamat = data.alamat;
		petugas.no_telp = data.no_telp;
		petugas.email = data.email;		
        petugas.render();			
        $('#modal-formPetugas').modal('toggle');
    });

    $("#tablePetugas tbody").on('click', 'button.btn-delete', function() {
        let data = $tablePetugasDT.row($(this).parents('tr')).data();
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
                        url: BASE_URL + "MasterData/deletePetugas",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            $("#tablePetugas").DataTable()
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

    $("#btnAddPetugas").on('click', function () {
        petugas = new Petugas({ id: 0, nama_petugas: null });
        $("#formIdPetugas").val(0);
        $("#formNamaPetugas").val('').focus();
        $("#formAlamat").val('');
        $("#formNoTelp").val('');
        $("#formEmail").val('');
        $('#formKTP').val('');
        $('#modal-formPetugas').modal('toggle');
    });

    $("#btnSavePetugas").on('click', function() {
        if (!$('#FormPetugas').valid())
            return false;

        petugas.nama_petugas = $("#formNamaPetugas").val();
        petugas.ktp = $("#formKTP").val();
        petugas.alamat = $("#formAlamat").val();
        petugas.no_telp = $("#formNoTelp").val();
        petugas.email = $("#formEmail").val();

        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "MasterData/savePetugas",
            data: JSON.stringify(petugas),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aSave).done(function(response) {
            if (response.status) {
                $("#tablePetugas").DataTable()
                    .ajax.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan'
                });
            } else
                console.log(response.message);
        });

        $('#modal-formPetugas').modal('toggle');
        return false;
    });
}