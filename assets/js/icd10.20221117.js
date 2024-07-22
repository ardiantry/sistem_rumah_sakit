$(function () {
    $('.btn-cari-icd10').on('click', function() {
        $('#modal-icd10').modal('toggle');
    });
    Icd10TXBinding();    
    Icd10DTBinding();    
});

function Icd10TXBinding() {
    let templateIcd10 = template `<tr><td class="d-none" data-label="id">${'id'}</td><td data-label="jumlah" class="text-center align-middle d-none"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1"></td><td data-label="nama" class="text-left align-middle">${'text'}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;
    let autoCompleteIcd10 = {
        $source: $('#inputIcd10'),
        $target: $('#tableIcd10'),
        appendTarget: templateIcd10,
        param: {},
        url: BASE_URL + 'RawatJalan/getIcd10Ajax'
    };
    bindAutoComplete(autoCompleteIcd10);    
}

function fillTableIcd10(data) {
    let $tableIcd10 = $('#tableIcd10');
    $tableIcd10.find('tbody').empty();
    if (data.length === 0) {
        let colspan = $tableIcd10.find('thead tr th').length;
        $tableIcd10.find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
    }
    $.each(data, function(key, value) {
        let row_template = `<tr><td class="d-none" data-label="id">${value.id}</td><td data-label="jumlah" class="text-center align-middle d-none"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="${value.jumlah}" step="1"></td><td data-label="nama" class="text-left align-middle">${value.nama}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;
        $tableIcd10.find('tbody').append(row_template);
    });
}

function Icd10DTBinding() {
    var initialLoadIcd10 = true;	
    var $tableIcd10ModalDT = $("#tableIcd10Modal").DataTable({
        autoWidth: false,
        processing: true,
        serverSide: true,
        pageLength: 10,
        order: [
            [1, "asc"]
        ],
        ajax: {
            url: BASE_URL + 'RawatJalan/getIcd10Datatable',
            type: "POST"
        },
        ajax: function (data, callback, settings) {
            if (initialLoadIcd10) {
                initialLoadIcd10 = false;
                callback({data: []}); // don't fire ajax, just return empty set
                return;
            }
		
            $.post(BASE_URL + 'RawatJalan/getIcd10Datatable', data, function(result) {
                callback(result);                
              }, "json");            
        }, 			
        "columns": [
            { "data": null },
            { "data": 'icd10_code' },
            { "data": 'icd10_name' },
            { "data": 'id' },
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

    $("#tableIcd10Modal tbody").on('click', 'button', function() {
        let $table = $('#tableIcd10');
        let data = $tableIcd10ModalDT.row($(this).parents('tr')).data();
        let arr = {
            id: data['id'],
            kode: data['icd10_code'],
            nama: data['icd10_name']
        };

        let row_template = `<tr><td class="d-none" data-label="id">${arr.id}</td><td data-label="jumlah" class="text-center align-middle d-none"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1"></td><td data-label="nama" class="text-left align-middle">${arr.nama}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;

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

            $table.find('tbody').append(row_template);
        } else {
            let input = $table.find('tbody tr').eq(index_exist).find('.input-jumlah');
            $(input).val(parseInt($(input).val()) + 1);
            $(input).blur();
        }

        $('#modal-icd10').modal('toggle');
    });

    // When modal window is shown
    $('#modal-icd10').on('shown.bs.modal', function() {
        // Adjust column width and re-initialize Responsive extension
        $("#tableIcd10Modal").DataTable()
            .ajax.reload()
            .columns.adjust()
            .responsive.recalc();
    });
}