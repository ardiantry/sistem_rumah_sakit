class RencanaControl {
    constructor({ tanggal, alasan }) {
        this.tanggal = tanggal;
        this.alasan = alasan;
    }
}

$(function () {
    let template = Handlebars.compile('<tr><td class="text-left align-middle" data-label="tanggal_kontrol">{{format-date tanggal}}</td><td class="text-left align-middle" data-label="alasan_kontrol">{{alasan}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');    
    const $target = $('#tableRencanaKontrol');

    $('#btnRencanaKontrol').on('click', function() {
        let tanggal = moment($('#dateTanggalRencanaKontrol').datetimepicker('viewDate')).format('YYYY-MM-DD');        
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
        const rencana_kontrol = new RencanaControl({tanggal: tanggal, alasan: alasan})

        $('#inputAlasanRencanaKontrol').val('');
        if (encounter.rencana_kontrol.length === 0)
            $target.find('tbody').empty();

        encounter.rencana_kontrol.push(rencana_kontrol);
        $target.find('tbody').append(template(rencana_kontrol));
    });

    $target.find('tbody').on("click", "td .btn-delete", (event) => deleteListener(event, {$target:$target, arr: encounter.rencana_kontrol}));    
});