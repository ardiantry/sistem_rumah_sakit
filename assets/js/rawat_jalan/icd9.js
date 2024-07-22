class Icd9 {
    constructor({ id, nama, jumlah = 1 }) {
        this.id = id;
        this.nama = nama;
        this.jumlah = jumlah;
    }
}

$(function () {
    $('.btn-cari-icd9').on('click', function() {
        $('#modal-icd9').modal('toggle');
    });
    handleIcd9();
    Icd9DTBinding();    
});

function handleIcd9() {
    let template = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td data-label="nama" class="text-left align-middle">{{nama}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');
    const $control = $('#inputIcd9');
    const $target = $('#tableIcd9');
    const autoCompleteSearch = {
        $control: $control,
        field: {
            value: 'id',
            text: 'nama'
        },
        url: `${BASE_URL}RawatJalan/getIcd9Ajax`,
        extra: {},
    }
    $control.autoComplete({
        preventEnter: true,
        resolver: 'custom',
        events: {
            search: (search, callback) => searchListener(search, callback, autoCompleteSearch, {})
        }
    });    
    $control.on('autocomplete.select', (event, item) => selectListner(event, item, {
        $control: $control, $target: $target, obj: encounter.icd9, objectType: Icd9, key: 'id', template: template
    }));    
    $target.find('tbody').on("click", "td .btn-delete", (event) => deleteListener(event, {$target:$target, arr: encounter.icd9}));
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
            disableOrder, buttonChoose
        ],
    });

    $("#tableIcd9Modal tbody").on('click', 'button', function() {
        let $table = $('#tableIcd9');
        let data = $tableIcd9ModalDT.row($(this).parents('tr')).data();
        const icd9 = new Icd9({ id: data.id, nama: data.icd9_name });
        var template = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td data-label="jumlah" class="text-center align-middle d-none"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1"></td><td data-label="nama" class="text-left align-middle">{{nama}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');

        if (encounter.icd9.length === 0) {
            $table.find('tbody').empty();
        }
        let index = indexItemInArray(encounter.icd9, icd9, 'id');
        if (index == -1) {
            encounter.icd9.push(icd9);
            $table.find('tbody').append(template(icd9));
        } else {
            encounter.icd9[index].jumlah = encounter.icd9[index].jumlah + 1;
            let input = $table.find('tbody tr').eq(index).find('.input-jumlah');
            $(input).val(parseInt($(input).val()) + 1);
            $(input).blur();
        }

        $('#modal-icd9').modal('toggle');
    });

    // When modal window is shown
    $('#modal-icd9').on('shown.bs.modal', function() {
        // Adjust column width and re-initialize Responsive extension
        $("#tableIcd9Modal").DataTable()
            .ajax.reload();
    });
}