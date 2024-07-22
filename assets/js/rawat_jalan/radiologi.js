class Radiologi {
    constructor({ tanggal, jenis_rad_id, jenis_rad, harga, status='Menunggu', id=0 }) {
        this.tanggal = tanggal;
        this.jenis_rad_id = jenis_rad_id;
        this.jenis_rad = jenis_rad;
        this.harga = parseInt(harga);
        this.status = status;
        this.id = id;		
    }
}

$(function () {
    let template = Handlebars.compile('<tr><td class="text-left align-middle" data-label="tanggal_rad">{{format-date tanggal}}</td><td class="text-left align-middle" data-label="jam_rad">{{format-time tanggal}}</td><td class="text-left align-middle" data-label="jenis_rad">{{jenis_rad}}</td><td class="text-left align-middle" data-label="status">{{status}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');    
    const $tanggal = $('#dateTanggalRad');
    const $jenis_rad = $('#inputJenisRad');
    const $target = $('#tableRad');

    $('#btnAddRad').on('click', function() {		
        let tanggal = moment($tanggal.datetimepicker('viewDate')).format('YYYY-MM-DD HH:mm');        
        const select_rad = $jenis_rad.find(':selected').data('item');

            if(typeof select_rad==='undefined')
            {
                alert('Jenis lab wajib di pilih');
                    return false;
            }   
        const arr = {tanggal: tanggal, jenis_rad_id: select_rad.id, jenis_rad:select_rad.radiology_type_desc, harga: select_rad.price}		
        if (!tanggal) {
            bootbox.alert({
                centerVertical: true,
                message: "Pilih tanggal!",
                size: 'small'
            });
            return false;
        }

        if (!select_rad.id) {
            bootbox.alert({
                centerVertical: true,
                message: "pilih jenis radiologi!",
                size: 'small'
            });
            return false;
        }
        const radiologi = new Radiologi(arr);
        console.log(radiologi);
        $('#inputJenisRad').val('');
        if (encounter.radiologi.length === 0)
            $target.find('tbody').empty();

        encounter.radiologi.push(radiologi);
        $target.find('tbody').append(template(radiologi));
    });

    $target.find('tbody').on("click", "td .btn-delete", (event) => deleteListener(event, {$target:$target, arr: encounter.radiologi}));    
});