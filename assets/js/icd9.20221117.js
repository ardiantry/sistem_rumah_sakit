$(function () {
    $('.btn-cari-icd9').on('click', function() {
        $('#modal-icd9').modal('toggle');
    });
    Icd9MDBinding();    
    Icd9DTBinding();    
});

function Icd9MDBinding() {
    let templateIcd9 = template `<tr><td class="d-none" data-label="id">${'id'}</td><td data-label="jumlah" class="text-center align-middle d-none"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1"></td><td data-label="nama" class="text-left align-middle">${'text'}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;
    let autoCompleteIcd9 = {
        $source: $('#inputIcd9'),
        $target: $('#tableIcd9'),
        appendTarget: templateIcd9,
        param: {},
        url: BASE_URL + 'RawatJalan/getIcd9Ajax'
    };
    bindAutoComplete(autoCompleteIcd9);
}

function fillTableIcd9(data) {
    let $tableIcd9 = $('#tableIcd9');
    $tableIcd9.find('tbody').empty();
    if (data.length === 0) {
        let colspan = $tableIcd9.find('thead tr th').length;
        $tableIcd9.find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
    }
    $.each(data, function(key, value) {
        let row_template = `<tr><td class="d-none" data-label="id">${value.id}</td><td data-label="jumlah" class="text-center align-middle d-none"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="${value.jumlah}" step="1"></td><td data-label="nama" class="text-left align-middle">${value.nama}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;
        $tableIcd9.find('tbody').append(row_template);
    });
}

function Icd9DTBinding() {
    var initialLoadIcd9 = true;		
    var $tableIcd9ModalDT = $("#tableIcd9Modal").DataTable({
        autoWidth: false,
        processing: true,
        serverSide: true,
        pageLength: 10,
        order: [
            [1, "asc"]
        ],
        ajax: function (data, callback, settings) {
            if (initialLoadIcd9) {
                initialLoadIcd9 = false;
                callback({data: []}); // don't fire ajax, just return empty set
                return;
            }		

            $.post(BASE_URL + 'RawatJalan/getIcd9Datatable', data, function(result) {
                callback(result);                
              }, "json");            
        }, 		
        "columns": [
            { "data": null },
            { "data": 'icd9_code' },
            { "data": 'icd9_name' },
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

    $("#tableIcd9Modal tbody").on('click', 'button', function() {
        let $table = $('#tableIcd9');
        let data = $tableIcd9ModalDT.row($(this).parents('tr')).data();
        let arr = {
            id: data['id'],
            kode: data['icd9_code'],
            nama: data['icd9_name']
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

        $('#modal-icd9').modal('toggle');
    });

    // When modal window is shown
    $('#modal-icd9').on('shown.bs.modal', function() {
        // Adjust column width and re-initialize Responsive extension
        $("#tableIcd9Modal").DataTable()
            .ajax.reload()
            .columns.adjust()
            .responsive.recalc();
    });
}