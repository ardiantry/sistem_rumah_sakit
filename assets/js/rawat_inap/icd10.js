class Icd10 {
    constructor({ id, icd10_code, icd10_subcode, icd10_name, icd10_name_eng, jumlah = 1 }) {
        this.id = id;
        this.icd10_code = icd10_code;
        this.icd10_subcode = icd10_subcode; 
        this.icd10_name = icd10_name;                
        this.icd10_name_eng = icd10_name_eng;                        
        this.jumlah = parseInt(jumlah);
    }
}

$(function () {
    $('.btn-cari-icd10').on('click', function() {
        $('#modal-icd10').modal('toggle');
    });
    handleIcd10();    
    Icd10DTBinding();    
});

function handleIcd10() {
    let template = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td data-label="nama" class="text-left align-middle">{{icd10_name}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');
    const $control = $('#inputIcd10');
    const $target = $('#tableIcd10');
    const autoCompleteSearch = {
        $control: $control,
        field: {
            value: 'id',
            text: 'icd10_name'
        },
        url: `${BASE_URL}RawatInap/getIcd10Ajax`,
    }
    
    $control.autoComplete({
        preventEnter: true,
        resolver: 'custom',
        events: {
            search: (search, callback) => searchListener(search, callback, autoCompleteSearch, {})
        }
    });    
    $control.on('autocomplete.select', (event, item) => selectListner(event, item, {
        $control: $control, $target: $target, obj: encounter.icd10, objectType: Icd10, key: 'id', template: template
    }));    
    $target.find('tbody').on("click", "td .btn-delete", (event) => deleteListener(event, {$target:$target, arr: encounter.icd10}));
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
        ajax: function (data, callback, settings) {
            if (initialLoadIcd10) {
                initialLoadIcd10 = false;
                callback({data: []}); // don't fire ajax, just return empty set
                return;
            }
		
            $.post(BASE_URL + 'RawatInap/getIcd10Datatable', data, function(result) {
                callback(result);                
              }, "json");            
        }, 			
        "columns": [
            { "data": null },
            { "data": 'icd10_code' },
            { "data": 'icd10_subcode' },            
            { "data": 'icd10_name' },
            { "data": 'icd10_name_eng' },            
            { "data": 'id' },
        ],
        columnDefs: [{
                targets: [1, 2],
                orderable: true
            },
            {
                targets: [-1, -2],
                visible: false
            },
            disableOrder, buttonChoose
        ],
    });

    $("#tableIcd10Modal tbody").on('click', 'button', function() {
        let $table = $('#tableIcd10');
        let data = $tableIcd10ModalDT.row($(this).parents('tr')).data();
        console.log(data);

        const icd10 = new Icd10(data);
        var template = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td data-label="jumlah" class="text-center align-middle d-none"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1"></td><td data-label="nama" class="text-left align-middle">{{icd10_name}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');

        if (encounter.icd10.length === 0) {
            $table.find('tbody').empty();
        }
        let index = indexItemInArray(encounter.icd10, icd10, 'id');
        if (index == -1) {
            encounter.icd10.push(icd10);
            $table.find('tbody').append(template(icd10));
        } else {
            encounter.icd10[index].jumlah = encounter.icd10[index].jumlah + 1;
            let input = $table.find('tbody tr').eq(index).find('.input-jumlah');
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
    });
}