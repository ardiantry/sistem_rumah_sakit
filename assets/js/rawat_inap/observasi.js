class Observasi {
    constructor({ tanggal, keterangan }) {
        this.tanggal = tanggal;
        this.keterangan = keterangan;
    }
}

$(function () {
    let template = Handlebars.compile('<tr><td class="text-left align-middle" data-label="tanggal_observasi">{{format-date tanggal}}</td><td class="text-left align-middle" data-label="jam_obs">{{format-time tanggal}}</td><td class="text-left align-middle" data-label="keterangan_observasi">{{keterangan}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');    
    const $target = $('#tableObservasi');

    $('#btnAddObservasi').on('click', function() {
        let tanggal = moment($('#dateTanggalObservasi').datetimepicker('viewDate')).format('YYYY-MM-DD HH:mm');        
        let keterangan = $('#inputKeteranganObservasi').val();

        if (!tanggal) {
            bootbox.alert({
                centerVertical: true,
                message: "Pilih tanggal!",
                size: 'small'
            });
            return false;
        }

        if (!keterangan) {
            bootbox.alert({
                centerVertical: true,
                message: "Isi keterangan!",
                size: 'small'
            });
            return false;
        }
        const observasi = new Observasi({ tanggal: tanggal, keterangan: keterangan })

        $('#inputKeteranganObservasi').val('');
        if (encounter.observasi.length === 0)
            $target.find('tbody').empty();

        encounter.observasi.push(observasi);
        $target.find('tbody').append(template(observasi));
    });

    $target.find('tbody').on("click", "td .btn-delete", (event) => deleteListener(event, { $target: $target, arr: encounter.observasi }));    
});