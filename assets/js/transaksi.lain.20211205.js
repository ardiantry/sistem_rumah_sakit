(function($) {
    //PEKERJAAN
    TransaksiBinding($);
    MasterBinding($);
    getSegment($);
})(jQuery);

function MasterBinding($) {
    $.getJSON(BASE_URL + 'TransaksiLain/getDataMasterAjax', function(data) {
        bindCombo({
            $combo: $('#master_akun'),
            dataSource: data.akun,
            dataTextField: 'akun_display',
            dataValueField: 'id'
        });
    })
}
function getSegment()
{
    
    if(id_af_pas!='')
    {
     $.getJSON(BASE_URL + 'Afiliasi/getpasienafiliasi?id='+id_af_pas, function(data) {
        console.log(data.data);
        $('#nama_transaksi').val(`${no_reg}. Pembayaran Afiliasi ${data.data.nama_afiliasi} (${data.data.nama_pasien}. Ket : ${data.data.note})`);
        $('#nilai').val(data.data.harga);
         $('#modal-formTransaksi').modal({ backdrop:'static',keyboard:false});
     })
       
    }
}
function save_transaksi() {
    let id = $('#id_transaksi').val();
    let tanggal = $('#tanggal_transaksi').val();
    let nama = $('#nama_transaksi').val();
    let $table = $('#tableRincianTransaksi');
    let jTransaksi = fnTableToObject($table);
    console.log(jTransaksi);

    let aDebit = jTransaksi.filter(element => element["arus"] == "Debit");
    let aKredit = jTransaksi.filter(element => element["arus"] == "Kredit");

    let totalDebit = aDebit.reduce((totalDebit, currentValue) => totalDebit + clearRupiah(currentValue["nilai"]), 0);
    let totalKredit = aKredit.reduce((totalKredit, currentValue) => totalKredit + clearRupiah(currentValue["nilai"]), 0);

    if (totalDebit !== totalKredit) {
        bootbox.alert({
            centerVertical: true,
            message: "Jumlah Kredit dan Debit tidak sama !",
            size: 'small'
        });
        return false;
    };

    let data = {
        id: id,
        tanggal: tanggal,
        nama: nama,
        transaksi: jTransaksi
    };

    let aSave = $.ajax({
        type: "POST",
        url: BASE_URL + "TransaksiLain/save",
        data: JSON.stringify(data),
        dataType: 'json',
        contentType: 'application/json; charset=utf-8'
    });
    $.when(aSave).done(function(response) {
        if (response.status) {
            $("#tableTransaksi").DataTable()
                .ajax.reload();
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil disimpan'
            });
            console.log(response.status);
        } else
            console.log(response.message);
    });

    $('#modal-formTransaksi').modal('toggle');
}

function TransaksiBinding($) {
    $("#FormTransaksi").validate();

    $("#FormTransaksi").submit(function(event) {
        event.preventDefault();

        if ($("#FormTransaksi").valid()) {
            save_transaksi();
        }

    });

    var $tableTransaksiDT = $("#tableTransaksi").DataTable({
        autoWidth: false,
        processing: true,
        serverSide: true,
        pageLength: 10,
        orderMulti: false,
        columnDefs: [{
                targets: [6],
                visible: false,
            },
            {
                targets: '_all',
                orderable: false
            },
            {
                targets: -1,
                data: null,
                defaultContent: `<button class="btn btn-info btn-sm btn-edit"><i class="fas fa-pencil-alt"></i> Ubah</button>`,
                className: "actions text-right"
            }
        ],
        ajax: {
            url: BASE_URL + 'TransaksiLain/getDatatable',
            type: "POST"
        },
        "columns": [
            { "data": "tanggal", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { "data": "nama" },
            { "data": "kode_akun" },
            { "data": "nama_akun" },
            { "data": "debit_display", "className": "text-right" },
            { "data": "kredit_display", "className": "text-right" },
            { "data": "id_transaksi_header" },
            { "data": null }
        ]
    });

    $("#tableTransaksi tbody").on('click', 'button.btn-edit', function() {
        let data = $tableTransaksiDT.row($(this).parents('tr')).data();
        $('#id_transaksi').val(data['id_transaksi_header']);
        $('#tanggal_transaksi').val(moment(data['tanggal']).format('DD/MM/YYYY'));
        $('#nama_transaksi').val(data['nama']);
        $("#btnDeleteTransaksi").removeClass("d-none");

        $('#tableRincianTransaksi').find('tbody').empty();
        $.each(data.transaksi, function(key, value) {
            $('#tableRincianTransaksi').find('tbody').append(
                `<tr>
                <td class="d-none" data-label="id">${value.id_akun}</td>            
                <td class="text-left align-middle" data-label="master_akun">${value.akun_display}</td>
                <td class="text-left align-middle" data-label="arus">${value.arus}</td>
                <td class="text-right align-middle" data-label="nilai">${rupiah(value.nilai)}</td>
                <td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`
            );
        });
        $('#modal-formTransaksi').modal('toggle');
    });

    $('#btnTambahan').on('click', function() {
        let akunid = $('#master_akun').val();
        var akunSelected = $("#master_akun option:selected").html();
        let arus = $('#arus').val();
        let nilai = $('#nilai').val();

        if ($('#tableRincianTransaksi').find('tbody tr td[data-label="empty_row"]').length > 0)
            $('#tableRincianTransaksi').find('tbody').empty();

        $('#tableRincianTransaksi').find('tbody').append(
            `<tr>
            <td class="d-none" data-label="id">${akunid}</td>            
            <td class="text-left align-middle" data-label="master_akun">${akunSelected}</td>
            <td class="text-left align-middle" data-label="arus">${arus}</td>
            <td class="text-right align-middle" data-label="nilai">${rupiah(nilai)}</td>
            <td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`);
    });

    $('#tableRincianTransaksi').find('tbody').on("click", "td .btn-delete", function() {
        $(this).closest('tr').remove();
        if ($('#tableRincianTransaksi').find('tbody tr').length == 0) {
            let colspan = $('#tableRincianTransaksi').find('thead tr th').length;
            $('#tableRincianTransaksi').find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
        }
    });

    $("#btnAddTransaksi").on('click', function() {
        $("#id_transaksi").val(0);
        $("#nama_transaksi").val('').focus();
        $('#tanggal_transaksi').val(moment(new Date()).format('DD/MM/YYYY'));
        $('#tableRincianTransaksi').find('tbody').empty();
        $("#btnDeleteTransaksi").addClass("d-none");

        $('#modal-formTransaksi').modal('toggle');
    });

    $("#btnDeleteTransaksi").on('click', function() {
        let id = $('#id_transaksi').val();
        $('#modal-formTransaksi').modal('toggle');

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
                        url: BASE_URL + "TransaksiLain/delete",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });
                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            $("#tableTransaksi").DataTable()
                                .ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil disimpan'
                            });
                            console.log(response.status);
                        } else
                            console.log(response.message);
                    });
                } else {
                    $('#modal-formTransaksi').modal('toggle');
                }
            }
        });
    });

}