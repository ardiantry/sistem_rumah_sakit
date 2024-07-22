function fillTableRencanaKontrol(data) {
    let $tableRencanaKontrol = $('#tableRencanaKontrol');
    $tableRencanaKontrol.find('tbody').empty();
    if (data.length === 0) {
        let colspan = $tableRencanaKontrol.find('thead tr th').length;
        $tableRencanaKontrol.find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
    }
    $.each(data, function(key, value) {
        let tanggal_kontrol = moment(value.tanggal_kontrol).format('DD/MM/YYYY');
        let row_template = `<tr><td class="text-left align-middle" data-label="tanggal_kontrol">${tanggal_kontrol}</td><td class="text-left align-middle" data-label="alasan_kontrol">${value.alasan_kontrol}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;
        $tableRencanaKontrol.find('tbody').append(row_template);
    });
}

$(function () {
    $('#btnRencanaKontrol').on('click', function() {
        let tanggal = $('#inputTanggalRencanaKontrol').val();
        let alasan = $('#inputAlasanRencanaKontrol').val();

        if (!tanggal) {
            bootbox.alert({
                centerVertical: true,
                message: "Pilih tanggal!",
                size: 'small'
            });
            return false;
        }

        if (!alasan) {
            bootbox.alert({
                centerVertical: true,
                message: "Isi alasan kontrol!",
                size: 'small'
            });
            return false;
        }

        $('#inputTanggalRencanaKontrol').val('');
        $('#inputAlasanRencanaKontrol').val('');

        if ($('#tableRencanaKontrol').find('tbody tr td[data-label="empty_row"]').length > 0)
            $('#tableRencanaKontrol').find('tbody').empty();

        $('#tableRencanaKontrol').find('tbody').append(`<tr><td class="text-left align-middle" data-label="tanggal_kontrol">${tanggal}</td><td class="text-left align-middle" data-label="alasan_kontrol">${alasan}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`);

    });

    $('#tableRencanaKontrol').find('tbody').on("click", "td .btn-delete", function() {
        let $target = $('#tableRencanaKontrol');
        let $tr = $(this).closest('tr');
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
                    $tr.remove();
                    if ($target.find('tbody tr').length == 0) {
                        let colspan = $target.find('thead tr th').length;
                        $target.find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
                    }
                }
            }        
         });
    });
});