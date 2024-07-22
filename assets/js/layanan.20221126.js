$(function () {
    $('.btn-cari-layanan').on('click', function() {
        $('#modal-layanan').modal('toggle');
    });
    LayananMDBinding();    
    LayananDTBinding();    
});

function LayananMDBinding() {
    let templateLayanan = template `<tr><td class="d-none" data-label="id">${'id'}</td><td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1"></td><td data-label="nama" class="text-left align-middle">${'text'}</td><td class="d-none" data-label="harga">${'harga_layanan'}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;
    let autoCompleteLayanan = {
        $source: $('#inputLayanan'),
        $target: $('#tableLayanan'),
        appendTarget: templateLayanan,
        param: {
            id: $('#inputUnitLayanan')
        },
        url: BASE_URL + 'RawatJalan/getRegisterLayananAjax'
    };
    bindAutoComplete(autoCompleteLayanan);
}

function fillTableLayanan(data) {
    let $tableLayanan = $('#tableLayanan');
    $tableLayanan.find('tbody').empty();
    if (data.length === 0) {
        let colspan = $tableLayanan.find('thead tr th').length;
        $tableLayanan.find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
    }
    $.each(data, function(key, value) {
        let row_template = `<tr><td class="d-none" data-label="id">${value.id}</td><td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="${value.jumlah}" step="1"></td><td data-label="nama" class="text-left align-middle">${value.nama}</td><td class="d-none" data-label="harga">${value.harga}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;
        $tableLayanan.find('tbody').append(row_template);
    });
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
			data.id_unit_layanan = $("#inputUnitLayanan").val();
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
            {
                targets: '_all',
                orderable: false
            },
            {
                targets: 0,
                data: null,
                defaultContent: '<button class="btn btn-info btn-sm mr-0 btn-pilih">Pilih</button>'
            }
        ],
    });

    $("#tableLayananModal tbody").on('click', 'button', function() {
        const $table = $('#tableLayanan');
        const data = $tableLayananDT.row($(this).parents('tr')).data();
        const arr = {
            id: data.id_layanan,
            nama: data.nama_layanan,
            jumlah:1,
            harga: data.harga_layanan
        };
        console.log(arr);
        const row_template = `<tr><td class="d-none" data-label="id">${arr.id}</td><td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1"></td><td data-label="nama" class="text-left align-middle">${arr.nama}</td><td class="d-none" data-label="harga">${arr.harga}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;

        let index_exist = -1;
        $table.find('tbody tr').each(function(index, el) {
            let id = $(el).find('td[data-label="id"]').html();
            if (id == arr.id) {
                index_exist = index;
                // break the loop once found
                return false;
            }
        });

        if (index_exist == -1) {
            if ($table.find('td[data-label="empty_row"]').length > 0)
                $table.find('tbody').empty();

            pendaftaranObj.dataLayanan.push(arr);            
            $table.find('tbody').append(row_template);
            console.log(pendaftaranObj.dataLayanan);
        } else {
            let input = $table.find('tbody tr').eq(index_exist).find('.input-jumlah');
            $(input).val(parseInt($(input).val()) + 1);
            $(input).blur();
        }

        $('#modal-layanan').modal('toggle');
    });

    $("#tableLayanan").on('blur', '.input-jumlah', function() {
        const index_exist = $(this).closest('td').parent()[0].sectionRowIndex;
        const jumlah = $(this).val();
        console.log(pendaftaranObj.dataLayanan[index_exist]);      
        pendaftaranObj.dataLayanan[index_exist].jumlah = jumlah;
        console.log(pendaftaranObj.dataLayanan);            
    });    

    // When modal window is shown
    $('#modal-layanan').on('shown.bs.modal', function() {
        // Adjust column width and re-initialize Responsive extension
        $("#tableLayananModal").DataTable()
            .ajax.reload()
    });
}