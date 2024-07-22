(function($) {
    //ORGANIZATION
    OrganizationBinding();
    LocationBinding();
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
            alwaysShowClose: true
        });
    });
})(jQuery);

function OrganizationBinding() {
    var $tableOrganization = $("#tableOrganization").DataTable({
        pageLength: 10,
        order: [
            [1, "asc"]
        ],
        ajax: function(data, callback, settings) {
            $.get(BASE_URL + 'satusehat/organization/get_part_of', function(result) {
                console.log(result);
                callback(result);
            }, "json");
        },
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "type_display" },
            { "data": "type_code" },
            { "data": null },
        ],
        columnDefs: [{
                targets: [0, 1],
                orderable: true
            },
            {
                targets: [-1, -2],
                visible: false
            },
            {
                targets: '_all',
                orderable: false
            },
            {
                targets: -1,
                data: null,
                defaultContent: `<button class="btn btn-info btn-sm btn-edit"><i class="fas fa-pencil-alt"></i> Ubah</button>
            <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i> Hapus</button>`,
                className: "actions text-right"
            },
        ],
    });
}

function LocationBinding() {
    var $tableLocationDT = $("#tableLocation").DataTable({
        pageLength: 10,
        order: [
            [1, "asc"]
        ],
        ajax: function(data, callback, settings) {
            $.get(BASE_URL + 'satusehat/location/get_part_of', function(result) {
                //console.log(result);
                callback(result);
            }, "json");
        },
        "columns": [
            { "data": "id" },
            { "data": "code" },                        
            { "data": "name" },
            { "data": "description" },            
            { "data": "status" },            
            { "data": "type_display" },
            { "data": "type_code" },
            { "data": null },
        ],
        columnDefs: [{
                targets: [0, 1],
                orderable: true
            },
            {
                targets: [-2, -3],
                visible: false
            },
            {
                targets: '_all',
                orderable: false
            },
            {
                targets: -1,
                data: null,
                defaultContent: `<button class="btn btn-info btn-sm btn-edit"><i class="fas fa-pencil-alt"></i> Ubah</button>
            <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i> Hapus</button>`,
                className: "actions text-right"
            },
        ],
    });
    $("#btnAddLokasi").on('click', function() {
        $("#formIdLokasi").val(0);
        $("#formKodeLokasi").val('').focus();
        $("#formNamaLokasi").val('');
        $("#formDeskripsiLokasi").val('');
        $('#modal-formLokasi').modal('toggle');        
    });    

    $("#tableLocation tbody").on('click', 'button.btn-edit', function() {
        let data = $tableLocationDT.row($(this).parents('tr')).data();
        $("#formIdLokasi").val(data['id']);
        $("#formKodeLokasi").val(data['code']);
        $("#formNamaLokasi").val(data['name']);
        $("#formDeskripsiLokasi").val(data['description']);
        $('#modal-formLokasi').modal('toggle');
    });    

    $("#btnSaveLokasi").on('click', function() {
        if (!$('#FormLokasi').valid())
            return false;

        let id = $("#formIdLokasi").val();
        let location_code = $("#formKodeLokasi").val();
        let location_name = $("#formNamaLokasi").val();
        let location_description = $("#formDeskripsiLokasi").val();

        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "SatuSehat/saveLocation",
            data: JSON.stringify({ id: id, location_code: location_code, location_name: location_name, location_description: location_description }),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aSave).done(function(response) {
            if (response.status) {
                $("#tableLocation").DataTable()
                    .ajax.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan'
                });
            } else
                console.log(response.message);
        });

        $('#modal-formLokasi').modal('toggle');
        return false;
    });    

    $("#tableLocation tbody").on('click', 'button.btn-delete', function() {
        let data = $tableLocationDT.row($(this).parents('tr')).data();
        let id = data['id'];

        bootbox.confirm({
            title: "Konfirmasi",
            message: "Apakah Anda Yakin ?",
            centerVertical: true,
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Tidak',
                    className: 'btn-danger'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Ya',
                    className: 'btn-success'
                }
            },
            callback: function(result) {
                if (result === true) {
                    let aDelete = $.ajax({
                        type: "POST",
                        url: BASE_URL + "SatuSehat/deleteLocation",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            $("#tableLocation").DataTable()
                                .ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil dihapus'
                            });
                        } else
                            console.log(response.message);
                    });
                }
            }
        });
    });    
}