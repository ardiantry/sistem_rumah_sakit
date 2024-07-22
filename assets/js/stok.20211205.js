(function($) {
    StokRingkasanBinding($);
    StokBinding($);
    WarningBinding($);
    ExpiredBinding($);
})(jQuery);

function StokRingkasanBinding($) {
    var $tableStokDT = $("#tableRingkasanStok").DataTable({
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
        order: [],
        ajax: {
            url: BASE_URL + 'Stok/getRingkasanDatatable',
            type: "POST"
        },
        "columns": [
            { "data": "nama_obat" },
            { "data": "stok_opname", "className": "text-right" },
            { "data": "stok_gudang", "className": "text-right" },
            { "data": "stok_order", "className": "text-right" },
            { "data": "stok_bebas", "className": "text-right" },
            { "data": null }
        ],
        columnDefs: [{
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
        ],
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv',
            {
                extend: 'excelHtml5',
                exportOptions: { orthogonal: 'export' },
                exportOptions: {
                    modifier: {
                        page: 'all'
                    }
                },
                customize: function(xlsx) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                    $('c[r=A1] t', sheet).text('Ringkasan Obat');
                    $('row:first c', sheet).attr('s', '0'); // first row is bold
                    // first row is bold
                }
            }
        ],
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Semua']
        ],
    });
}

function StokBinding($) {
    $.getJSON(BASE_URL + 'Stok/getCaraBayarAjax', function(data) {
        bindCombo({
            $combo: $('#master_akun'),
            dataSource: data.akun,
            dataTextField: 'akun_display',
            dataValueField: 'id'
        });
    })
    $("#FormKoreksi").validate();
    $("#FormMutasi").validate();
    $("#FormRetur").validate();
    $("#FormKonversi").validate();
    var $tableStokDT = $("#tableStok").DataTable({
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
        order: [],
        rowGroup: {
            startRender: null,
            endRender: function(rows, group) {
                var total_stok_opname = rows
                    .data()
                    .pluck("stok_opname")
                    .reduce(function(a, b) {
                        return a + b * 1;
                    }, 0);

                var total_stok_gudang = rows
                    .data()
                    .pluck("stok_gudang")
                    .reduce(function(a, b) {
                        return a + b * 1;
                    }, 0);

                return $('<tr/>')
                    .append('<td colspan="4">Total ' + group + '</td>')
                    .append('<td/>')
                    .append('<td class="text-right">' + total_stok_opname + '</td>')
                    .append('<td class="text-right">' + total_stok_gudang + '</td>');
            },
            dataSrc: "nama_obat"
        },
        ajax: {
            url: BASE_URL + 'Stok/getDataTable',
            type: "POST"
        },
        "columns": [
            { "data": null },
            { "data": "nama_obat" },
            { "data": "expired_date", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { "data": "no_faktur" },
            { "data": "tanggal_faktur", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { "data": "stok_opname", "className": "text-right" },
            { "data": "stok_gudang", "className": "text-right" },
            { "data": "nama_satuan" },
            { "data": "nama_satuan_konversi" },
            { "data": "jumlah_obat_konversi" },
            { "data": "harga_beli" },
            { "data": "id_obat_konversi" },
            { "data": "id_obat" },
            { "data": "id_faktur" },
            { "data": "id" },
            { "data": null }
        ],
        columnDefs: [{
                targets: [-2, -3, -4, -5, -6, -7, -8, -9],
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
                defaultContent: `<div class="btn-group">
            <button type="button" class="btn btn-default btn-sm btn-koreksi">Koreksi</button>
            <button type="button" class="btn btn-default btn-sm btn-mutasi">Mutasi</button>
            <button type="button" class="btn btn-default btn-sm btn-retur">Retur</button>
            <button type="button" class="btn btn-default btn-sm btn-konversi">Konversi</button>            
          </div>`
            }
        ],
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv',
            {
                extend: 'excelHtml5',
                exportOptions: { orthogonal: 'export' },
                exportOptions: {
                    columns: [1, 2, 3, 4, 5, 6],
                    modifier: {
                        page: 'all'
                    }
                },
                customize: function(xlsx) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                    $('c[r=A1] t', sheet).text('Rincian Obat');
                    $('row:first c', sheet).attr('s', '0'); // first row is bold
                    // first row is bold
                }
            }
        ],
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Semua']
        ],
    });

    $("#tableStok tbody").on('click', 'button.btn-koreksi', function() {
        let data = $tableStokDT.row($(this).parents('tr')).data();
        $("#id_stok_koreksi").val(data['id']);
        $("input[name='nama_obat']").val(data['nama_obat']);
        $("input[name='no_faktur']").val(data['no_faktur']);
        $("#tanggal_koreksi").val(TODAY);
        $("#current_stok_opname").val(data['stok_opname']);
        $("#current_stok_gudang").val(data['stok_gudang']);
        $("#new_stok_opname").val(0);
        $("#new_stok_gudang").val(0);
        $("#alasan_koreksi").val('');
        $('#modal-koreksi').modal('toggle');
    });
    $("#tableStok tbody").on('click', 'button.btn-mutasi', function() {
        let data = $tableStokDT.row($(this).parents('tr')).data();
        $("#id_stok_mutasi").val(data['id']);
        $("input[name='nama_obat']").val(data['nama_obat']);
        $("input[name='no_faktur']").val(data['no_faktur']);
        $("#stok_opname").val(data['stok_opname']);
        $("#stok_gudang").val(data['stok_gudang']);
        $("#tanggal_mutasi").val(TODAY);
        $("#lokasi").val('');
        $("#jumlah").val(0);
        $("#alasan_mutasi").val('');
        $('#modal-mutasi').modal('toggle');
    });

    $("#tableStok tbody").on('click', 'button.btn-retur', function() {
        let data = $tableStokDT.row($(this).parents('tr')).data();
        $("#id_stok_retur").val(data['id']);
        $("input[name='nama_obat']").val(data['nama_obat']);
        $("input[name='no_faktur']").val(data['no_faktur']);
        $("#stok_opname_retur").val(data['stok_opname']);
        $("#stok_gudang_retur").val(data['stok_gudang']);
        $("#tanggal_retur").val(TODAY);
        $("#lokasi_retur").val('');
        $("#jumlah_retur").val(0);
        $("#master_akun").val('');
        $("#alasan_retur").val('');
        $('#modal-retur').modal('toggle');
    });

    $("#tableStok tbody").on('click', 'button.btn-konversi', function() {
        let data = $tableStokDT.row($(this).parents('tr')).data();
        $("#jumlah_obat_konversi").val(data['jumlah_obat_konversi']);
        let jumlah_konversi = $("#jumlah_konversi").val();
        $("#id_stok_konversi").val(data['id']);
        $("#id_obat_konversi").val(data['id_obat_konversi']);
        $("#id_faktur").val(data['id_faktur']);
        $("#harga_beli").val(data['harga_beli']);
        $("input[name='nama_obat_konversi']").val(data['nama_obat']);
        $("input[name='no_faktur_konversi']").val(data['no_faktur']);
        $("input[name='tanggal_kadaluarsa']").val(moment(data['expired_date']).format('DD/MM/YYYY'));
        $("#stok_opname_konversi").val(data['stok_opname']);
        $("#stok_gudang_konversi").val(data['stok_gudang']);
        $("#tanggal_konversi").val(TODAY);
        $("input[name='satuan_awal']").val(data['nama_satuan']);
        $("input[name='satuan_akhir']").val(data['nama_satuan_konversi']);
        $("#jumlah_konversi_akhir").val(data['jumlah_obat_konversi'] * jumlah_konversi);
        $("#lokasi_konversi").val('opname');
        $("#jumlah_konversi").val(1);
        $("#hari_kadaluarsa").val(0);
        //$("#master_akun").val('');
        //$("#alasan_retur").val('');
        $('#modal-konversi').modal('toggle');
    });

    $("#FormKoreksi").submit(function(event) {
        event.preventDefault();
        save_koreksi();
    });


    $("#FormMutasi").submit(function(event) {
        event.preventDefault();
        save_mutasi();
    });

    $("#FormRetur").submit(function(event) {
        event.preventDefault();
        save_retur();
    });

    $("#FormKonversi").submit(function(event) {
        event.preventDefault();
        save_konversi();
    });

    $('#jumlah_konversi').on('keyup', function() {
        let jumlah = $(this).val();
        let jumlah_konversi = $("#jumlah_obat_konversi").val();
        $("#jumlah_konversi_akhir").val(jumlah * jumlah_konversi);
        console.log(jumlah);
    });
}

function ExpiredBinding($) {
    var $tableExpiredDT = $("#tableExpired").DataTable({
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
            url: BASE_URL + 'Stok/getExpiredDataTable',
            type: "POST"
        },
        "columns": [
            { "data": null },
            { "data": "nama_obat" },
            { "data": "expired_date", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { "data": "no_faktur" },
            { "data": "tanggal_faktur", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { "data": "stok_opname", "className": "text-right" },
            { "data": "stok_gudang", "className": "text-right" },
            { "data": "id_obat" },
            { "data": "id" },
            { "data": null }
        ],
        columnDefs: [{
                targets: [1, 2],
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
                className: 'control',
                orderable: false,
                targets: -1,
                data: null,
                defaultContent: ''
            },
            {
                targets: 0,
                data: null,
                defaultContent: `<div class="btn-group">
            <button type="button" class="btn btn-default btn-sm btn-koreksi">Koreksi</button>
            <button type="button" class="btn btn-danger btn-sm btn-delete">Hapus</button>
          </div>`
            }
        ],
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv',
            {
                extend: 'excelHtml5',
                exportOptions: { orthogonal: 'export' },
                exportOptions: {
                    columns: [1, 2, 3, 4, 5, 6],
                    modifier: {
                        page: 'all'
                    }
                },
                customize: function(xlsx) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                    $('c[r=A1] t', sheet).text('Obat Kadaluarsa');
                    $('row:first c', sheet).attr('s', '0'); // first row is bold
                    // first row is bold
                }
            }
        ],
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Semua']
        ],
    });

    $("#tableExpired tbody").on('click', 'button.btn-koreksi', function() {
        let data = $tableExpiredDT.row($(this).parents('tr')).data();
        $("#id_stok_koreksi").val(data['id']);
        $("input[name='nama_obat']").val(data['nama_obat']);
        $("input[name='no_faktur']").val(data['no_faktur']);
        $("#tanggal_koreksi").val(TODAY);
        $("#current_stok_opname").val(data['stok_opname']);
        $("#current_stok_gudang").val(data['stok_gudang']);
        $('#modal-koreksi').modal('toggle');
    });

    $("#tableExpired tbody").on('click', 'button.btn-delete', function() {
        let data = $tableExpiredDT.row($(this).parents('tr')).data();
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
                        url: BASE_URL + "Stok/delete",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            $("#tableStok, #tableExpired, #tableWarning, #tableRingkasanStok").DataTable()
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

function WarningBinding($) {
    var $tableWarningDT = $("#tableWarning").DataTable({
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
            url: BASE_URL + 'Stok/getWarningDataTable',
            type: "POST"
        },
        "columns": [
            { "data": null },
            { "data": "nama_obat" },
            { "data": "expired_date", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { "data": "no_faktur" },
            { "data": "tanggal_faktur", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { "data": "stok_opname", "className": "text-right" },
            { "data": "stok_gudang", "className": "text-right" },
            { "data": "id_obat" },
            { "data": "id" },
            { "data": null }
        ],
        columnDefs: [{
                targets: [1, 2],
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
                className: 'control',
                orderable: false,
                targets: -1,
                data: null,
                defaultContent: ''
            },
            {
                targets: 0,
                data: null,
                defaultContent: `<div class="btn-group">
            <button type="button" class="btn btn-default btn-sm btn-koreksi">Koreksi</button>
            <button type="button" class="btn btn-danger btn-sm btn-delete">Hapus</button>
          </div>`
            }
        ],
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv',
            {
                extend: 'excelHtml5',
                exportOptions: { orthogonal: 'export' },
                exportOptions: {
                    columns: [1, 2, 3, 4, 5, 6],
                    modifier: {
                        page: 'all'
                    }
                },
                customize: function(xlsx) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                    $('c[r=A1] t', sheet).text('Obat Akan Kadaluarsa');
                    $('row:first c', sheet).attr('s', '0'); // first row is bold
                    // first row is bold
                }
            }
        ],
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Semua']
        ],
    });

    $("#tableWarning tbody").on('click', 'button.btn-koreksi', function() {
        let data = $tableWarningDT.row($(this).parents('tr')).data();
        $("#id_stok_koreksi").val(data['id']);
        $("input[name='nama_obat']").val(data['nama_obat']);
        $("input[name='no_faktur']").val(data['no_faktur']);
        $("#tanggal_koreksi").val(TODAY);
        $("#current_stok_opname").val(data['stok_opname']);
        $("#current_stok_gudang").val(data['stok_gudang']);
        $('#modal-koreksi').modal('toggle');
    });

    $("#tableWarning tbody").on('click', 'button.btn-delete', function() {
        let data = $tableWarningDT.row($(this).parents('tr')).data();
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
                        url: BASE_URL + "Stok/delete",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            $("#tableStok, #tableExpired, #tableWarning, #tableRingkasanStok").DataTable()
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

function save_mutasi() {
    if (!$("#FormMutasi").valid()) return false;

    let lokasi = $("#lokasi").val();
    let stok_opname = $("#stok_opname").val();
    let stok_gudang = $("#stok_gudang").val();
    let jumlah = $("#jumlah").val();
    console.log(stok_opname);
    console.log(stok_gudang);
    console.log(jumlah);

    if ((lokasi == 'opname') && (parseInt(jumlah) > parseInt(stok_gudang))) {
        bootbox.alert({
            centerVertical: true,
            message: "Jumlah maksimum mutasi = " + stok_gudang,
            size: 'small'
        });
        return false;
    } else if ((lokasi == 'gudang') && (parseInt(jumlah) > parseInt(stok_opname))) {
        bootbox.alert({
            centerVertical: true,
            message: "Jumlah maksimum mutasi = " + stok_opname,
            size: 'small'
        });
        return false;
    }


    //$("#FormKoreksi").validate();            
    let data = {
        id: $("#id_stok_mutasi").val(),
        tanggal_mutasi: $("#tanggal_mutasi").val(),
        stok_opname: $("#stok_opname").val(),
        stok_gudang: $("#stok_gudang").val(),
        jumlah: $("#jumlah").val(),
        lokasi: $("#lokasi").val(),
        alasan: $("#alasan_mutasi").val(),
    };
    let aSave = $.ajax({
        type: "POST",
        url: BASE_URL + "Stok/saveMutasi",
        data: JSON.stringify(data),
        dataType: 'json',
        contentType: 'application/json; charset=utf-8'
    });

    $.when(aSave).done(function(response) {
        if (response.status) {
            $("#tableStok, #tableExpired, #tableWarning, #tableRingkasanStok").DataTable()
                .ajax.reload();
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil disimpan'
            });
        } else
            console.log(response.message);
    });

    $('#modal-mutasi').modal('toggle');
}

function save_koreksi() {
    if (!$("#FormKoreksi").valid()) return false;
    let data = {
        id: $("#id_stok_koreksi").val(),
        tanggal_koreksi: $("#tanggal_koreksi").val(),
        stok_opname: $("#new_stok_opname").val(),
        stok_gudang: $("#new_stok_gudang").val(),
        alasan: $("#alasan_koreksi").val(),
    };
    let aSave = $.ajax({
        type: "POST",
        url: BASE_URL + "Stok/saveKoreksi",
        data: JSON.stringify(data),
        dataType: 'json',
        contentType: 'application/json; charset=utf-8'
    });

    $.when(aSave).done(function(response) {
        if (response.status) {
            $("#tableStok, #tableExpired, #tableWarning, #tableRingkasanStok").DataTable()
                .ajax.reload();
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil disimpan'
            });
        } else
            console.log(response.message);
    });
    $('#modal-koreksi').modal('toggle');
}

function save_retur() {
    if (!$("#FormRetur").valid()) return false;

    let lokasi = $("#lokasi_retur").val();
    let stok_opname = $("#stok_opname_retur").val();
    let stok_gudang = $("#stok_gudang_retur").val();
    let jumlah = $("#jumlah_retur").val();
    if ((lokasi == 'gudang') && (parseInt(jumlah) > parseInt(stok_gudang))) {
        bootbox.alert({
            centerVertical: true,
            message: "Jumlah maksimum retur = " + stok_gudang,
            size: 'small'
        });
        return false;
    } else if ((lokasi == 'opname') && (parseInt(jumlah) > parseInt(stok_opname))) {
        bootbox.alert({
            centerVertical: true,
            message: "Jumlah maksimum retur = " + stok_opname,
            size: 'small'
        });
        return false;
    }

    let data = {
        id: $("#id_stok_retur").val(),
        tanggal: $("#tanggal_retur").val(),
        stok_opname: $("#stok_opname_retur").val(),
        stok_gudang: $("#stok_gudang_retur").val(),
        jumlah: $("#jumlah_retur").val(),
        lokasi: $("#lokasi_retur").val(),
        akun: $("#master_akun").val(),
        alasan: $("#alasan_retur").val(),
    };
    let aSave = $.ajax({
        type: "POST",
        url: BASE_URL + "Stok/saveRetur",
        data: JSON.stringify(data),
        dataType: 'json',
        contentType: 'application/json; charset=utf-8'
    });

    $.when(aSave).done(function(response) {
        if (response.status) {
            $("#tableStok, #tableExpired, #tableWarning, #tableRingkasanStok").DataTable()
                .ajax.reload();
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil disimpan'
            });
        } else
            console.log(response.message);
    });

    $('#modal-retur').modal('toggle');
}

function save_konversi() {
    if (!$("#FormKonversi").valid()) return false;

    let lokasi = $("#lokasi_konversi").val();
    let stok_opname = $("#stok_opname_konversi").val();
    let stok_gudang = $("#stok_gudang_konversi").val();
    let jumlah = $("#jumlah_konversi").val();

    if ((lokasi == 'gudang') && (parseInt(jumlah) > parseInt(stok_gudang))) {
        bootbox.alert({
            centerVertical: true,
            message: "Jumlah maksimum konversi = " + stok_gudang,
            size: 'small'
        });
        return false;
    } else if ((lokasi == 'opname') && (parseInt(jumlah) > parseInt(stok_opname))) {
        bootbox.alert({
            centerVertical: true,
            message: "Jumlah maksimum konversi = " + stok_opname,
            size: 'small'
        });
        return false;
    }

    let data = {
        id: $("#id_stok_konversi").val(),
        id_obat_konversi: $("#id_obat_konversi").val(),
        id_faktur: $("#id_faktur").val(),
        harga_beli: $("#harga_beli").val(),
        tanggal: $("#tanggal_konversi").val(),
        stok_opname: $("#stok_opname_konversi").val(),
        stok_gudang: $("#stok_gudang_konversi").val(),
        jumlah: $("#jumlah_konversi").val(),
        jumlah_obat_konversi: $("#jumlah_obat_konversi").val(),
        jumlah_konversi_akhir: $("#jumlah_konversi_akhir").val(),
        lokasi: $("#lokasi_konversi").val(),
        hari_kadaluarsa: $("#hari_kadaluarsa").val()
    };
    //console.log(data);

    let aSave = $.ajax({
        type: "POST",
        url: BASE_URL + "Stok/saveKonversi",
        data: JSON.stringify(data),
        dataType: 'json',
        contentType: 'application/json; charset=utf-8'
    });

    $.when(aSave).done(function(response) {
        if (response.status) {
            $("#tableStok, #tableExpired, #tableWarning, #tableRingkasanStok").DataTable()
                .ajax.reload();
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil disimpan'
            });
        } else
            console.log(response.message);
    });

    $('#modal-konversi').modal('toggle');
}