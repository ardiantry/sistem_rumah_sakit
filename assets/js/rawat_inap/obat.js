class Obat {
    constructor({ id, nama, harga, stok, jumlah = 1 }) {
        this.id = id;
        this.nama = nama;
        this.harga = parseFloat(harga);
        this.stok = parseInt(stok);
        this.jumlah = parseInt(jumlah);        
        this.is_release = 0;
    }
}

$(function () {
    $('.btn-cari-obat').on('click', function() {
        $('#modal-obat').modal('toggle');
    });

    $('.btn-cari-obat-tambahan').on('click', function() {
        $('#modal-obat-tambahan').modal('toggle');
    });

    handleObat();    
    ObatDTBinding();
});

function handleObat() {
    let template = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1" max="{{stok}}"></td><td data-label="nama" class="text-left align-middle">{{nama}}</td><td class="" data-label="harga">{{rupiah harga}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');
    const $control = $('#inputObat');
    const $target = $('#tableObat');
    let autoComplete = {
        $control: $control,
        field: {
            value: 'id',
            text: 'nama'
        },
        url: `${BASE_URL}RawatInap/getObatAjax`,
    }
    $control.autoComplete({
        preventEnter: true,
        resolver: 'custom',
        events: {
            search: (search, callback) => searchListener(search, callback, autoComplete, {jenis_pemeriksaan: encounter.jenis_pemeriksaan})
        }
    });    
    $control.on('autocomplete.select', (event, item) => selectListner(event, item, {$control: $control, $target: $target, obj: encounter.obat, objectType: Obat, key: 'id', template: template}));    
    $target.find('tbody').on("click", "td .btn-delete", (event) => deleteListener(event, {$target:$target, arr: encounter.obat}));

    const $controlTambahan = $('#inputObatTambahan');
    const $targetTambahan = $('#tableObatTambahan');    
    $controlTambahan.autoComplete({
        preventEnter: true,
        resolver: 'custom',
        events: {
            search: (search, callback) => searchListener(search, callback, autoComplete, {jenis_pemeriksaan: 'Umum'})
        }
    });      
    $controlTambahan.on('autocomplete.select', (event, item) => selectListner(event, item, {$control: $controlTambahan, $target: $targetTambahan, obj: encounter.obat_tambahan, objectType: Obat, key: 'id', template: template}));    
    $targetTambahan.find('tbody').on("click", "td .btn-delete", (event) => deleteListener(event, {$target:$targetTambahan, arr: encounter.obat_tambahan}));    
}

function ObatDTBinding() {
    var initialLoadObat = true;	
    var $tableObatModalDT = $("#tableObatModal").DataTable({
        destroy: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        pageLength: 10,
        order: [
            [1, "asc"]
        ],
        ajax: function (data, callback, settings) {
            if (initialLoadObat) {
                initialLoadObat = false;
                callback({data: []}); // don't fire ajax, just return empty set
                return;
            }
			data.jenis_pemeriksaan = $('#inputJenisPemeriksaan').val();

            $.post(BASE_URL + 'RawatInap/getObatDatatable', data, function(result) {
                callback(result);                
              }, "json");            
        }, 			
        "columns": [
            { "data": null },
            { "data": 'nama_obat' },
            {
                "data": null,
                "className": "text-right",
                "render": {
                    "_": "harga_jual",
                    "filter": "harga_jual",
                    "display": "harga_jual_display"
                }
            },
            {
                data: 'stok',
                className: "text-right",
                render: function(data, type, row) {
                    return (data > 0) ? data : `<span style="color:red">${data}</span>`;
                }
            },
            { "data": 'id' },
        ],
        columnDefs: [{
                targets: [1, 2, 3],
                orderable: true
            },
            {
                targets: [-1],
                visible: false
            },
            disableOrder,
            {
                targets: 0,
                data: null,
                defaultContent: '<button class="btn btn-info btn-sm mr-0 btn-pilih">Pilih</button>',
                render: function(data, type, row) {
                    if (row.stok <= 0)
                        return '<span style="color:red">stok kosong</span>';
                }
            }
        ],
    });

    var initialLoadObatTambah = true;	
    var $tableObatTambahanModalDT = $("#tableObatTambahanModal").DataTable({
        destroy: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        pageLength: 10,
        order: [
            [1, "asc"]
        ],
        ajax: function (data, callback, settings) {
            if (initialLoadObatTambah) {
                initialLoadObatTambah = false;
                callback({data: []}); // don't fire ajax, just return empty set
                return;
            }
			data.jenis_pemeriksaan = 'Umum';

            $.post(BASE_URL + 'RawatJalan/getObatDatatable', data, function(result) {
                callback(result);                
              }, "json");            
        }, 			
        "columns": [
            { "data": null },
            { "data": 'nama_obat' },
            {
                "data": null,
                "className": "text-right",
                "render": {
                    "_": "harga_jual",
                    "filter": "harga_jual",
                    "display": "harga_jual_display"
                }
            },
            {
                data: 'stok',
                className: "text-right",
                render: function(data, type, row) {
                    return (data > 0) ? data : `<span style="color:red">${data}</span>`;
                }
            },
            { "data": 'id' },
        ],
        columnDefs: [{
                targets: [1, 2, 3],
                orderable: true
            },
            {
                targets: [-1],
                visible: false
            },
            disableOrder,
            {
                targets: 0,
                data: null,
                defaultContent: '<button class="btn btn-info btn-sm mr-0 btn-pilih">Pilih</button>',
                render: function(data, type, row) {
                    if (row.stok <= 0)
                        return '<span style="color:red">stok kosong</span>';
                }
            }
        ],
    });    

    $("#tableObatTambahanModal tbody").on('click', 'button', function() {
        let $table = $('#tableObatTambahan');
        let data = $tableObatTambahanModalDT.row($(this).parents('tr')).data();
        const obat = new Obat({ id: data.id, nama: data.nama_obat, harga: data.harga_jual, stok: data.stok });
        let template = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1" max="{{stok}}"></td><td data-label="nama" class="text-left align-middle">{{nama}}</td><td class="" data-label="harga">{{rupiah harga}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');
        
        if (encounter.obat_tambahan.length === 0) {
            $table.find('tbody').empty();
        }
        let index = indexItemInArray(encounter.obat_tambahan, obat, 'id');
        if (index == -1) {
            encounter.obat_tambahan.push(obat);
            $table.find('tbody').append(template(obat));
        } else {
            encounter.obat_tambahan[index].jumlah = encounter.obat_tambahan[index].jumlah + 1;
            let input = $table.find('tbody tr').eq(index).find('.input-jumlah');
            $(input).val(parseInt($(input).val()) + 1);
            $(input).blur();
        }

        $('#modal-obat-tambahan').modal('toggle');
    });

    $("#tableObatModal tbody").on('click', 'button', function() {
        let $table = $('#tableObat');
        let data = $tableObatModalDT.row($(this).parents('tr')).data();
        const obat = new Obat({ id: data.id, nama: data.nama_obat, harga: data.harga_jual, stok: data.stok });
        let template = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1" max="{{stok}}"></td><td data-label="nama" class="text-left align-middle">{{nama}}</td><td class="" data-label="harga">{{rupiah harga}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');
        
        if (encounter.obat.length === 0) {
            $table.find('tbody').empty();
        }
        let index = indexItemInArray(encounter.obat, obat, 'id');
        if (index == -1) {
            encounter.obat.push(obat);
            $table.find('tbody').append(template(obat));
        } else {
            encounter.obat[index].jumlah = encounter.obat[index].jumlah + 1;
            let input = $table.find('tbody tr').eq(index).find('.input-jumlah');
            $(input).val(parseInt($(input).val()) + 1);
            $(input).blur();
        }

        $('#modal-obat').modal('toggle');
    });    

    $("#tableObat").on('blur', '.input-jumlah', function() {
        const index_exist = $(this).closest('td').parent()[0].sectionRowIndex;
        const jumlah = parseInt($(this).val());
        encounter.obat[index_exist].jumlah = jumlah;
    });    

    $("#tableObatTambahan").on('blur', '.input-jumlah', function() {
        const index_exist = $(this).closest('td').parent()[0].sectionRowIndex;
        const jumlah = parseInt($(this).val());
        encounter.obat_tambahan[index_exist].jumlah = jumlah;
    }); 

    // When modal window is shown
    $('#modal-obat').on('shown.bs.modal', function() {
        // Adjust column width and re-initialize Responsive extension
        requestAnimationFrame(() =>
            $("#tableObatModal").DataTable()
            .ajax.reload(null, false)
        );
    });  

    $('#modal-obat-tambahan').on('shown.bs.modal', function() {
        // Adjust column width and re-initialize Responsive extension
        requestAnimationFrame(() =>
            $("#tableObatTambahanModal").DataTable()
            .ajax.reload(null, false)
        );
    });    
}