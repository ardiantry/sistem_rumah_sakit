(function($) {
    RekamMedikBinding($);
    RekamMedikDetailBinding($);

    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
            alwaysShowClose: true
        });
    });

    $('.btn-print').on('click', function(event) {
        let id = $('#idPasien').val();
        event.preventDefault();
        window.open(BASE_URL + "Pasien/print/" + id, "_blank");
    });

    $('.btn-delete').on('click', function(event) {
        let id = $('#idPasien').val();
        event.preventDefault();
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
                        url: BASE_URL + "Pasien/delete",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil dihapus'
                            });
                            window.location.replace(BASE_URL + "Pasien/rekam_medik");
                        } else
                            console.log(response.message);
                    });
                }
            }
        });
    });
})(jQuery);

function RekamMedikBinding($) {
    var $tablePasienDT = $("#tablePasien").DataTable({
        responsive: {
            details: {
                type: 'column',
                target: -1
            }
        },
        autoWidth: false,
        processing: true,
        serverSide: true,
        pageLength: 10,
        order: [
            [1, "asc"]
        ],
        ajax: {
            url: BASE_URL + 'Pasien/getDataTable',
            type: "POST"
        },
        "columns": [
            { "data": null },
            { "data": 'no_rm' },
            { "data": "nama_pasien" },
            { "data": "tempat_lahir" },
            { "data": "tanggal_lahir" },
            { "data": "no_telp" },
            { "data": "agama" },
            { "data": "golongan_darah" },
            { "data": "jenis_kelamin_display" },
            { "data": "pekerjaan_display" },
            {
                data: "alamat",
                render: function(data, type, row) {
                    return (typeof data === 'string') ?
                        (data.length > 20) ?
                        data.substr(0, 20) + '...' :
                        data :
                        data;
                }
            },
            {
                data: "keterangan",
                render: function(data, type, row) {
                    return (typeof data === 'string') ?
                        (data.length > 20) ?
                        data.substr(0, 20) + '...' :
                        data :
                        data;
                }
            },
            { "data": "jenis_kelamin" },
            { "data": "pekerjaan" },
            { "data": "id" },
            { "data": null }
        ],
        columnDefs: [{
                targets: [1, 2],
                orderable: true
            },
            {
                targets: [-2, -3, -4],
                visible: false
            },
            {
                targets: '_all',
                orderable: false
            },
            {
                className: 'control',
                orderable: false,
                targets: -1,
                data: null,
                defaultContent: ''
            },
            {
                targets: 0,
                data: null,
                defaultContent: '<button class="btn btn-info btn-sm mr-0 btn-pilih">Pilih</button>'
            }
        ],
    });

    $("#tablePasien tbody").on('click', 'button.btn-pilih', function() {
        let data = $tablePasienDT.row($(this).parents('tr')).data();
        window.location.href = BASE_URL + 'Pasien/rekam_medik_detail/' + data['id'];
    });
}

function RekamMedikDetailBinding($) {
    var id_pasien = $("#idPasien").val();
    var $tableRegistrasiDT = $("#tableRegistrasi").DataTable({
        destroy: true,
        scrollX: true,
        processing: true,
        serverSide: true,
        pageLength: 10,
        autoWidth: false,
        fixedColumns: true,
        order: [
            [0, "asc"]
        ],
        ajax: function (data, callback, settings) {
			data.id_pasien = id_pasien;		
            $.post(BASE_URL + 'Pasien/getRiwayatDatatable', data, function(result) {
                callback(result);                
              }, "json");                     
        }, 		
        columns: [
            { data: "tanggal_pemeriksaan", "render": $.fn.dataTable.render.moment('DD/MM/YYYY'), width: "110px" },            
            { data: "dokter", width: "110px" },            
            { data: "diagnosa", width: "110px" },
            { data: "icd9", width: "110px" },            
            { data: "icd10", width: "110px" },                        
            { data: "layanan", width: "110px" },
            { data: "keterangan2", width: "110px" },            
            { data: "obat", width: "110px" },            
            { data: "keterangan3", width: "110px" },                        
            { data: "rencana_kontrol", width: "110px" },                                    
            {
                render: function (data, type) {
                    let col = '';
                    const arr = [
                        {
                          "foto": "21641_1669127249_0.png",
                          "nama": "kuku",
                          "keterangan": "1. ok\n2.ok"
                        },
                        {
                          "foto": "21641_1669127249_0.png",
                          "nama": "Pemeriksaan kaki",
                          "keterangan": "1. Vulnus laceratum 3x3x3cm"
                        },
                        {
                          "foto": "21641_1669127249_0.png",
                          "nama": "PEMERIKSAAN TANGAN",
                          "keterangan": "1. Jari telunjuk inveksi\n2. jari kecil inveksi"
                        }
                      ];
                    arr.forEach(element => {
                        col += `<div class="row"><div class="col-3"><a href="${BASE_URL}assets/pemeriksaan_fisik/${element.foto}" data-toggle="lightbox" data-gallery="gallery"><img class="img-fluid" src="${BASE_URL}assets/pemeriksaan_fisik/${element.foto}"></img></a></div><div class="col-9"> ${element.nama} </br> ${element.keterangan} </div></div>`
                    });
                    return col;
                },
                width: "110px"
            },            
            { data: "id" },
        ],
        columnDefs: [{
                targets: [0],
                orderable: true
            },
            {
                targets: [-1],
                visible: false
            },
            {
                targets: '_all',
                orderable: false
            }
        ],
    });   

    // Add event listener for opening and closing details
    $('#tableRegistrasi tbody').on('click', 'td.details-control', function() {
        var tr = $(this).closest('tr');
        var row = $tableRegistrasiDT.row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            $.getJSON(BASE_URL + 'Registrasi/getRegisterDetail', { id: row.data().id })
                .done(function(json) {
                    row.child(format(json.data)).show();
                    tr.addClass('shown');
                });
        }
    });

    function format(d) {
        var tableLayanan = '<td colspan="4" class="text-center" data-label="empty_row">Tidak ada data</td>';
        var tableObat = '<td colspan="4" class="text-center" data-label="empty_row">Tidak ada data</td>';
        if (d.data_layanan.length > 0) {
            tableLayanan = '';
            $.each(d.data_layanan, function(index, row) {
                tableLayanan += `<tr>
                                    <td class="text-center align-middle" style="width:10%;">${row.jumlah}</d>
                                    <td class="text-left align-middle">${row.nama}</d>
                                    <td class="text-right align-middle">${row.harga}</d>
                                    <td class="text-right align-middle">${row.jumlah * row.harga}</d>
                                </tr>`
            });
        }
        if (d.data_obat.length > 0) {
            tableObat = '';
            $.each(d.data_obat, function(index, row) {
                tableObat += `<tr>
                                    <td class="text-center align-middle" style="width:10%;">${row.jumlah}</d>
                                    <td class="text-left align-middle">${row.nama}</d>
                                    <td class="text-right align-middle">${row.harga}</d>
                                    <td class="text-right align-middle">${row.jumlah * row.harga}</d>
                                </tr>`
            });
        }
        // `d` is the original data object for the row
        return `<div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <label for="tableInvoiceLayanan">Rincian Layanan</label>
                <div class="table-responsive-sm">
                    <table class="table table-hover table-sm" id="tableInvoiceLayanan">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center align-middle" style="width:10%;">Jumlah</th>
                                <th class="text-left align-middle">Nama Layanan</th>
                                <th class="text-right align-middle" style="width:20%;">Harga</th>
                                <th class="text-right align-middle" style="width:10%;">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                ${tableLayanan}
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <label for="tableInvoiceObat">Rincian Obat</label>
                <div class="table-responsive-sm">
                    <table class="table table-hover table-sm" id="tableInvoiceObat">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center align-middle" style="width:10%;">Jumlah</th>
                                <th class="text-left align-middle">Nama Obat</th>
                                <th class="text-right align-middle" style="width:20%;">Harga</th>
                                <th class="text-right align-middle" style="width:10%;">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                ${tableObat}
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>`;
    }
}