$(function () {
    LocationBinding();    
});

function LocationBinding() {
    $('#btn-cari-ihs-lokasi').on('click', function() {
        $('#modal-IHSLokasi').modal('toggle');
    });
    $('#btn-clear-ihs-lokasi').on('click', function() {
        let id = $("#inputIdUnitLayanan").val();
        let ihs_location = null;
        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "MasterData/updateUnitLayananIHS",
            data: JSON.stringify({ id: id, ihs_location: ihs_location }),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aSave).done(function(response) {
            if (response.status) {
                $('#inputIHSLocation').val(null);
            } else
                console.log(response.message);
        });        
    });        
    var $tableLocation = $("#tableLocation").DataTable({
        autoWidth: false,
        processing: true,
        pageLength: 10,
        order: [
            [1, "asc"]
        ],
        ajax: function(data, callback, settings) {
            $.get(BASE_URL + 'satusehat/location/get_part_of', function(result) {
                callback(result);
            }, "json");
        },
        "columns": [
            { "data": null },            
            { "data": "id" },
            { "data": "name" },
            { "data": "type_display" },
            { "data": "type_code" },
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
            },
        ],
    });

    $("#tableLocation tbody").on('click', 'button', function() {
        let data = $tableLocation.row($(this).parents('tr')).data();
        console.log(data);
        let id = $("#inputIdUnitLayanan").val();
        let ihs_location = data.id;

        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "MasterData/updateUnitLayananIHS",
            data: JSON.stringify({ id: id, ihs_location: ihs_location }),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aSave).done(function(response) {
            if (response.status) {
                $('#inputIHSLocation').val(data.id);
            } else
                console.log(response.message);
        });

        $('#modal-IHSLokasi').modal('toggle');
    });    

    $('#modal-IHSLokasi').on('shown.bs.modal', function() {
        // Adjust column width and re-initialize Responsive extension
        requestAnimationFrame(() =>
            $("#tableLocation").DataTable()
            .ajax.reload()
        );            
    });    
}