class Layanan {
    constructor({ id, nama, harga, jumlah = 1 }) {
        this.id = id;
        this.nama = nama;
        this.harga = parseFloat(harga);
        this.jumlah = parseInt(jumlah);
    }
}

$(function () {
    $('.btn-cari-layanan').on('click', function() {
        $('#modal-layanan').modal('toggle');
    });
    handleLayanan();    
    LayananDTBinding();
});

function handleLayanan() {
    let template = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1"></td><td data-label="nama" class="text-left align-middle">{{nama}}</td><td class="" data-label="harga">{{rupiah harga}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');
    const $control = $('#inputLayanan');
    const $target = $('#tableLayanan');
    let autoComplete = {
        $control: $control,
        field: {
            value: 'id',
            text: 'nama'
        },
        url: `${BASE_URL}RawatJalan/getRegisterLayananAjax`,
    }
    $control.autoComplete({
        preventEnter: true,
        resolver: 'custom',
        events: {
            search: (search, callback) => searchListener(search, callback, autoComplete, {id: encounter.unit_layanan.id})
        }
    });    
    $control.on('autocomplete.select', (event, item) => selectListner(event, item, {$control: $control, $target: $target, obj: encounter.layanan, objectType: Layanan, key: 'id', template: template}));    
    $target.find('tbody').on("click", "td .btn-delete", (event) => deleteListener(event, {$target:$target, arr: encounter.layanan}));
}

function LayananDTBinding() {
	var initialLoadLayanan = true;	
    var $tableLayananDT = $("#tableLayananModal").DataTable({
        autoWidth: false,
        processing: true,
        serverSide: true,
        pageLength: 10,
        order: [
            [1, "asc"]
        ],
        ajax: function (data, callback, settings) {
            if (initialLoadLayanan) {
                initialLoadLayanan = false;
                callback({data: []}); // don't fire ajax, just return empty set
                return;
            }
			data.id_unit_layanan = encounter.unit_layanan.id;
            $.post(BASE_URL + 'RawatJalan/getLayananDatatable', data, function(result) {
                callback(result);                
              }, "json");            
        }, 		
        "columns": [
            { "data": null },
            { "data": 'nama_layanan' },
            {
                "data": null,
                "className": "text-right",
                "render": {
                    "_": "harga_layanan",
                    "filter": "harga_layanan",
                    "display": "harga_layanan_display"
                }
            },
            { "data": "id_layanan" },
        ],
        columnDefs: [{
                targets: [1, 2],
                orderable: true
            },
            {
                targets: [-1],
                visible: false
            },
            disableOrder, buttonChoose
        ],
    });

    $("#tableLayananModal tbody").on('click', 'button', function() {
        const $table = $('#tableLayanan');
        const data = $tableLayananDT.row($(this).parents('tr')).data();
        const layanan = new Layanan({ id: data.id_layanan, nama: data.nama_layanan, harga: data.harga_layanan });
        var template = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1"></td><td data-label="nama" class="text-left align-middle">{{nama}}</td><td class="" data-label="harga">{{rupiah harga}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');

        if (encounter.layanan.length === 0) {
            $table.find('tbody').empty();
        }
        let index = indexItemInArray(encounter.layanan, layanan, 'id');
        if (index == -1) {
            encounter.layanan.push(layanan);
            $table.find('tbody').append(template(layanan));
        } else {
            encounter.layanan[index].jumlah = encounter.layanan[index].jumlah + 1;
            let input = $table.find('tbody tr').eq(index).find('.input-jumlah');
            $(input).val(parseInt($(input).val()) + 1);
            $(input).blur();
        }

        $('#modal-layanan').modal('toggle');
    });    

    $("#tableLayanan").on('blur', '.input-jumlah', function() {
        const index_exist = $(this).closest('td').parent()[0].sectionRowIndex;
        const jumlah = parseInt($(this).val());
        encounter.layanan[index_exist].jumlah = jumlah;
    });    


    // When modal window is shown
    $('#modal-layanan').on('shown.bs.modal', function() {
        // Adjust column width and re-initialize Responsive extension
        $("#tableLayananModal").DataTable()
            .ajax.reload()
    });    
}