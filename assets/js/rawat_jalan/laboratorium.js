class Laboratorium {
    constructor({ tanggal, jenis_lab_id, jenis_lab, harga, status='Menunggu', id=0 }) {
        this.tanggal = tanggal;
        this.jenis_lab_id = jenis_lab_id;                
        this.jenis_lab = jenis_lab;
        this.harga = parseInt(harga);
        this.status = status;
        this.id = id
    }
}

$(function () {
    let template = Handlebars.compile('<tr><td class="text-left align-middle" data-label="tanggal_lab">{{format-date tanggal}}</td><td class="text-left align-middle" data-label="jam_lab">{{format-time tanggal}}</td><td class="text-left align-middle" data-label="jenis_lab">{{jenis_lab}}</td><td class="text-left align-middle" data-label="status">{{status}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');    
    const $tanggal = $('#dateTanggalLab');
    const $jenis_lab = $('#inputJenisLab');
    const $target = $('#tableLab');

    $('#btnAddLab').on('click', function() {
        let tanggal = moment($tanggal.datetimepicker('viewDate')).format('YYYY-MM-DD HH:mm');        
        const select_lab = $jenis_lab.find(':selected').data('item');
        console.log(select_lab);
        const arr = {tanggal: tanggal, jenis_lab_id: select_lab.id, jenis_lab:select_lab.laboratory_type_desc, harga: select_lab.price}
        if (!tanggal) {
            bootbox.alert({
                centerVertical: true,
                message: "Pilih tanggal!",
                size: 'small'
            });
            return false;
        }

        if (!select_lab.id) {
            bootbox.alert({
                centerVertical: true,
                message: "pilih jenis lab!",
                size: 'small'
            });
            return false;
        }
        const laboratorium = new Laboratorium(arr);
        $('#inputJenisLab').val('');
        if (encounter.laboratorium.length === 0)
            $target.find('tbody').empty();

        encounter.laboratorium.push(laboratorium);
        $target.find('tbody').append(template(laboratorium));
    });

    $target.find('tbody').on("click", "td .btn-delete", (event) => deleteListener(event, {$target:$target, arr: encounter.laboratorium}));    
});