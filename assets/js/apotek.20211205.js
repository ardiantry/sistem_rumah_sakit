async function fetchObat(notEqualId, selectedId) {
    let url = BASE_URL + 'Apotek/getObat/';
    const res = await fetch(url + notEqualId);
    const data = await res.json();
    const $comboObat = $('#formObatKonversi');

    $comboObat
        .find('option')
        .remove()
        .end()
        .append('<option value="">--Tidak Ada Konversi--</option>')
        .val('');

    $.each(data.data, function(_key, obat) {
        $comboObat.append(`<option value="${obat.id}" data-satuan="${obat.nama_satuan}">${obat.nama_obat}</option>`);
    });

    $comboObat.on('change', () => {
        const id = $($comboObat).children("option:selected").val();
        const satuan = $($comboObat).children("option:selected").data("satuan");
        $('#formSatuanKonversi').val(satuan);
        if (id == '')
            $('#formJumlahKonversi').val(0);
    });

    $($comboObat).val(selectedId).trigger('change');
}

(function($) {
    ObatBinding($);
    MasterDataBinding($);
    ObatRacikanBinding($);
})(jQuery);

function MasterDataBinding($) {
    $.getJSON(BASE_URL + 'Apotek/getDataMaster', function(data) {
        bindCombo({
            $combo: $('#formSpesifikasi'),
            dataSource: data.spesifikasi,
            dataTextField: 'text',
            dataValueField: 'value'
        });
        bindCombo({
            $combo: $('#formSatuan'),
            dataSource: data.satuan,
            dataTextField: 'text',
            dataValueField: 'value'
        });
        bindCombo({
            $combo: $('#formJenisObat'),
            dataSource: data.jenis_obat,
            dataTextField: 'text',
            dataValueField: 'value'
        });
        bindCombo({
            $combo: $('#formJenisRacikan'),
            dataSource: data.jenis_racikan,
            dataTextField: 'text',
            dataValueField: 'value'
        });

    });
}

function ObatBinding($) {
    var visibleColumnObat = [0, -2, -3, -4, -5, -6, -7, -8, -9, -10, -11, -12, -14];
    privilege = $("#modulePrivilege").val()
    if (privilege != 2)
        visibleColumnObat.push(-1);

    let $form = $("#FormObat").validate();

    var $ObatDT = $("#tableObat").DataTable({
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
        },
        autoWidth: false,
        processing: true,
        serverSide: true,
        pageLength: 10,
        order: [
            [0, "asc"]
        ],
        "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": [0, -1]
            },
            {
                targets: -1,
                data: null,
                defaultContent: `<button class="btn btn-info btn-sm btn-edit"><i class="fas fa-pencil-alt"></i> Edit</button>
        <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i> Delete</button>`,
                className: "actions text-right"
            },
            {
                targets: visibleColumnObat,
                visible: false
            }
        ],
        ajax: {
            url: BASE_URL + 'Apotek/getObatDatatable',
            type: "POST"
        },
        "columns": [
            { "data": "id" },
            { "data": "nama_obat" },
            { "data": "nama_satuan" },
            { "data": "nama_jenis_obat" },
            { "data": "stok" },
            {
                "data": null,
                "className": "text-right",
                "render": {
                    "_": "harga_jual",
                    "filter": "harga_jual",
                    "display": "harga_jual_display"
                }
            },
            { "data": "harga_beli" },
            { "data": "harga_jual" },
            { "data": "harga_paket" },
            { "data": "stok_min" },
            { "data": "stok_max" },
            { "data": "keterangan" },
            { "data": "id_spesifikasi" },
            { "data": "id_satuan" },
            { "data": "id_jenis_obat" },
            { "data": "id_obat_konversi" },
            { "data": "jumlah_obat_konversi" },
            { "data": "order_paket" },
            { "data": null }
        ]
    });

    $("#tableObat tbody").on('click', 'button.btn-edit', function() {
        let data = $ObatDT.row($(this).parents('tr')).data();
        $("#formIdObat").val(data['id']);
        $("#formNamaObat").val(data['nama_obat']);
        $("#formHargaBeli").val(data['harga_beli']);
        $("#formHargaJual").val(data['harga_jual']);
        $("#formHargaPaket").val(data['harga_paket']);
        $("#formStokMin").val(data['stok_min']);
        $("#formStokMax").val(data['stok_max']);
        $("#formKeterangan").val(data['keterangan']);
        $("#formSpesifikasi").val(data['id_spesifikasi']);
        $("#formSatuan").val(data['id_satuan']);
        $("#formJenisObat").val(data['id_jenis_obat']);

        fetchObat(data['id'], data['id_obat_konversi']);

        $("#formJumlahKonversi").val(data['jumlah_obat_konversi']);
        $("#formJumlahOrderPaket").val(data['order_paket']);

        $('#modal-formObat').modal('toggle');
    });

    $("#tableObat tbody").on('click', 'button.btn-delete', function() {
        let data = $ObatDT.row($(this).parents('tr')).data();
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
                        url: BASE_URL + "Apotek/deleteObat",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            $("#tableObat").DataTable()
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

    $("#btnAddObat").on('click', function() {
        $("#FormObat").trigger("reset");
        $("#FormObat").validate().resetForm();
        $('#FormObat').find('.is-invalid').removeClass('is-invalid');
        $("#formIdObat").val(0);
        $('#modal-formObat').modal('toggle');
    });

    $("#btnSaveObat").on('click', function() {
        if (!$('#FormObat').valid())
            return false;

        let id = $("#formIdObat").val();
        let nama_obat = $("#formNamaObat").val();
        let spesifikasi = $("#formSpesifikasi").val();
        let satuan = $("#formSatuan").val();
        let jenis_obat = $("#formJenisObat").val();
        let harga_beli = $("#formHargaBeli").val();
        let harga_jual = $("#formHargaJual").val();
        let harga_paket = $("#formHargaPaket").val();
        let stok_min = $("#formStokMin").val();
        let stok_max = $("#formStokMax").val();
        let keterangan = $("#formKeterangan").val();
        let id_obat_konversi = $("#formObatKonversi").val();
        let jumlah_obat_konversi = $("#formJumlahKonversi").val();
        let order_paket = $("#formJumlahOrderPaket").val();

        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "Apotek/saveObat",
            data: JSON.stringify({ id: id, nama_obat: nama_obat, spesifikasi: spesifikasi, satuan: satuan, jenis_obat: jenis_obat, harga_beli: harga_beli, harga_jual: harga_jual, harga_paket: harga_paket, stok_min: stok_min, stok_max: stok_max, keterangan: keterangan, id_obat_konversi: id_obat_konversi, jumlah_obat_konversi: jumlah_obat_konversi, order_paket: order_paket }),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aSave).done(function(response) {
            if (response.status) {
                $("#tableObat").DataTable()
                    .ajax.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan'
                });
            } else
                console.log(response.message);
        });

        $('#modal-formObat').modal('toggle');
        return false;
    });
}

function ObatRacikanBinding($) {
    let $form = $("#FormObatRacikan").validate();
    var visibleColumnObatRacikan = [0, -2, -3, -4, -5, -6, -7];
    privilege = $("#modulePrivilege").val()
    if (privilege != 2)
        visibleColumnObatRacikan.push(-1);
    var $ObaRacikantDT = $("#tableObatRacikan").DataTable({
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
        },
        autoWidth: false,
        processing: true,
        serverSide: true,
        pageLength: 10,
        order: [
            [0, "asc"]
        ],
        "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": [0, -1]
            },
            {
                targets: -1,
                data: null,
                defaultContent: `<button class="btn btn-info btn-sm btn-edit"><i class="fas fa-pencil-alt"></i> Edit</button>
        <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i> Delete</button>`,
                className: "actions text-right"
            },
            {
                targets: visibleColumnObatRacikan,
                visible: false
            }
        ],
        ajax: {
            url: BASE_URL + 'Apotek/getObatRacikanDatatable',
            type: "POST"
        },
        "columns": [
            { "data": "id" },
            { "data": "nama_obat" },
            { "data": "nama_satuan" },
            { "data": "nama_jenis_racikan" },
            {
                "data": null,
                "className": "text-right",
                "render": {
                    "_": "harga_jual",
                    "filter": "harga_jual",
                    "display": "harga_jual_display"
                }
            },
            { "data": "harga_beli" },
            { "data": "harga_jual" },
            { "data": "keterangan" },
            { "data": "id_spesifikasi" },
            { "data": "id_satuan" },
            { "data": "id_jenis_racikan" },
            { "data": null }
        ]
    });

    $("#tableObatRacikan tbody").on('click', 'button.btn-edit', function() {
        let data = $ObaRacikantDT.row($(this).parents('tr')).data();
        let id_obat = data['id'];
        $("#formIdObat").val(data['id']);
        $("#formNamaObat").val(data['nama_obat']);
        $("#formHargaBeli").val(data['harga_beli']);
        $("#formHargaJual").val(data['harga_jual']);
        $("#formKeterangan").val(data['keterangan']);
        $("#formSpesifikasi").val(data['id_spesifikasi']);
        $("#formSatuan").val(data['id_satuan']);
        $("#formJenisRacikan").val(data['id_jenis_racikan']);
        $("#tableBahanRacikan tbody").empty();
        let aBahanRacikan = $.ajax({
            type: "POST",
            url: BASE_URL + "Apotek/getBahanRacikan",
            data: JSON.stringify({ id_racikan: id_obat }),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aBahanRacikan).done(function(response) {
            if (response.status) {
                $.each(response.data, function(_key, row) {
                    let row_template = `<tr><td class="d-none" data-label="id">${row.id_obat}</td><td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="${row.jumlah}" step="1"></td><td data-label="nama" class="text-left align-middle">${row.nama_obat}</td><td class="text-right align-middle" data-label="harga">${row.harga_jual_display}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;
                    $("#tableBahanRacikan tbody").append(row_template);
                });
            } else
                console.log(response.message);
        });

        $('#modal-formObatRacikan').modal('toggle');
    });

    $("#tableObatRacikan tbody").on('click', 'button.btn-delete', function() {
        let data = $ObaRacikantDT.row($(this).parents('tr')).data();
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
                        url: BASE_URL + "Apotek/deleteObat",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            $("#tableObatRacikan").DataTable()
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

    $("#btnAddObatRacikan").on('click', function() {
        $("#FormObatRacikan").trigger("reset");
        $("#FormObatRacikan").validate().resetForm();
        $('#FormObatRacikan').find('.is-invalid').removeClass('is-invalid');
        $("#tableBahanRacikan tbody").empty();
        $("#formIdObat").val(0);
        $('#modal-formObatRacikan').modal('toggle');
    });

    $("#btnSaveObatRacikan").on('click', function() {
        if (!$('#FormObatRacikan').valid())
            return false;

        let id = $("#formIdObat").val();
        let nama_obat = $("#formNamaObat").val();
        let spesifikasi = $("#formSpesifikasi").val();
        let satuan = $("#formSatuan").val();
        let jenis_racikan = $("#formJenisRacikan").val();
        let harga_beli = $("#formHargaBeli").val();
        let harga_jual = $("#formHargaJual").val();
        let keterangan = $("#formKeterangan").val();

        let bahan_racikan = fnTableToObject($('#tableBahanRacikan'));

        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "Apotek/saveObatRacikan",
            data: JSON.stringify({ id: id, nama_obat: nama_obat, spesifikasi: spesifikasi, satuan: satuan, jenis_racikan: jenis_racikan, harga_beli: harga_beli, harga_jual: harga_jual, keterangan: keterangan, bahan_racikan: bahan_racikan }),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aSave).done(function(response) {
            if (response.status) {
                $("#tableObatRacikan").DataTable()
                    .ajax.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan'
                });
            } else
                console.log(response.message);
        });

        $('#modal-formObatRacikan').modal('toggle');
        return false;
    });

    $('#tableBahanRacikan tbody').on("click", "td .btn-delete", function() {
        $(this).closest('tr').remove();
        if ($('#tableBahanRacikan tbody tr').length == 0) {
            let colspan = $('#tableBahanRacikan thead tr th').length;
            $('#tableBahanRacikan tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
        }
    });

    $("#btnAddBahan").on('click', function() {
        $('#modal-formObatRacikan').modal('toggle');
        $('#modal-Bahan').modal('toggle');
    });

    var $tableModalBahanRacikanDT = $("#tableModalBahanRacikan").DataTable({
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
        },
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
            url: BASE_URL + 'Apotek/getObatDatatable',
            type: "POST"
        },
        "columns": [
            { "data": null },
            { "data": 'id' },
            { "data": "nama_obat" },
            { "data": "nama_satuan" },
            {
                "data": null,
                "className": "text-right",
                "render": {
                    "_": "harga_jual",
                    "filter": "harga_jual",
                    "display": "harga_jual_display"
                }
            },
            { "data": null }
        ],
        columnDefs: [{
                targets: [2, 3],
                orderable: true
            },
            {
                targets: [1],
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
                data: null
            },
            {
                targets: 0,
                data: null,
                defaultContent: '<button class="btn btn-info btn-sm mr-0 btn-pilih">Pilih</button>'
            }
        ],
    });

    // When modal window is shown
    $('#modal-Bahan').on('shown.bs.modal', function() {
        // Adjust column width and re-initialize Responsive extension
        $("#tableModalBahanRacikan").DataTable()
            .ajax.reload()
            .columns.adjust()
            .responsive.recalc();
    });

    $("#tableModalBahanRacikan tbody").on('click', 'button', function() {
        let data = $tableModalBahanRacikanDT.row($(this).parents('tr')).data();
        //console.log(data);
        // if(data['stok']<=data['stok_min'])
        // {
        //     alert(`stok mencapai batas minimum stok saat ini (${data['stok']})`);
        //     return false;
        // }
        let row = {
            id: data['id'],
            nama_obat: data['nama_obat'],
            nama_satuan: data['nama_satuan'],
            harga_jual: data['harga_jual'],
            harga_jual_display: data['harga_jual_display'],
            jumlah: 1
        };
        let index_exist = -1;
        let row_template = `<tr><td class="d-none" data-label="id">${row.id}</td><td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="${row.jumlah}" step="1"></td><td data-label="nama" class="text-left align-middle">${row.nama_obat}</td><td class="text-right align-middle" data-label="harga">${row.harga_jual_display}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;
        $("#tableBahanRacikan tbody tr").each(function(index, el) {
            let id = $(el).find('td[data-label="id"]').html();
            if (id == row.id) {
                index_exist = index;
                // break the loop once found
                return false;
            }
        });

        if (index_exist == -1) {
            $("#tableBahanRacikan tbody").append(row_template);
        } else {
            let input = $("#tableBahanRacikan tbody tr").eq(index_exist).find('.input-jumlah');
            $(input).val(parseInt($(input).val()) + 1);
        }
        $('#modal-Bahan').modal('hide');
        return false;
    });

    $('#modal-Bahan').on('hidden.bs.modal', function() {
        $('#modal-formObatRacikan').modal('toggle');
    })
}