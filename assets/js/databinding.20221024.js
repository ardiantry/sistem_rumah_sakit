(function($) {
    bindDataMaster($);
    ObatBinding($);
})(jQuery);

function bindDataMaster($) {
    $.getJSON(BASE_URL + 'RawatJalan/getDataMasterAjax', function(data) {
        bindCombo({
            $combo: $('#inputPekerjaan'),
            dataSource: data.pekerjaan,
            dataTextField: 'text',
            dataValueField: 'value'
        });

        bindCombo({
            $combo: $('#formPekerjaan'),
            dataSource: data.pekerjaan,
            dataTextField: 'text',
            dataValueField: 'value'
        });

        bindCombo({
            $combo: $('#inputTipePasien'),
            dataSource: data.tipe_pasien,
            dataTextField: 'tipe_pasien',
            dataValueField: 'id'
        });
        var $comboCaraBayar = $('#inputCaraBayar');
        $.each(data.cara_bayar, function(_key, cara_bayar) {
            $comboCaraBayar.append(`<option value="${cara_bayar.id}" data-akun="${cara_bayar.id_akun}">${cara_bayar.cara_bayar}</option>`);
        });

        var $comboJenisPaket = $('#inputJenisPaket');
        $.each(data.obat_paket, function(_key, obat_paket) {
            $comboJenisPaket.append(`<option value="${obat_paket.id}" data-harga="${obat_paket.harga_paket}" data-stok="${obat_paket.stok}">${obat_paket.nama_obat}</option>`);
        });

        let comboUnitLayanan = {
            $combo: $('#inputUnitLayanan'),
            dataSource: data.unit_layanan,
            dataTextField: 'nama_unit_layanan',
            dataValueField: 'id',
            onSelectedIndexChanged: function() {
                var ajaxURL = BASE_URL + 'RawatJalan/getDokterUnitLayananAjax';
                var id = $(this).val();
                $.ajax({
                    url: ajaxURL,
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        let $comboChild = $('#inputDokterUnitLayanan');
                        $comboChild.empty();
                        $comboChild.append('<option selected disabled>--pilih dokter--</option>');
                        let comboDokterUnitLayanan = {
                            $combo: $comboChild,
                            dataSource: data,
                            dataTextField: 'nama_dokter',
                            dataValueField: 'id_dokter'
                        };

                        bindCombo(comboDokterUnitLayanan);
                        if (pendaftaranObj?.idDokter) {
                            if($("#inputDokterUnitLayanan option[value='"+pendaftaranObj.idDokter+"']").length > 0){
                                $('#inputDokterUnitLayanan').val(pendaftaranObj.idDokter);
                            }                            
                        }
                    }
                });
            }
        }
        bindCombo(comboUnitLayanan);
    });

    let templateObat = template `<tr><td class="d-none" data-label="id">${'id'}</td><td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1" max="${'stok'}"></td><td data-label="nama" class="text-left align-middle">${'text'}</td><td class="d-none" data-label="harga">${'harga_obat'}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;
    let autoCompleteObat = {
        $source: $('#inputObat'),
        $target: $('#tableObat'),
        appendTarget: templateObat,
        param: {
            jenis_pemeriksaan: $('#inputJenisPemeriksaan')
        },
        url: BASE_URL + 'RawatJalan/getObatAjax'
    };
    let templateObatTambahan = template `<tr><td class="d-none" data-label="id">${'id'}</td><td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1" max="${'stok'}"></td><td data-label="nama" class="text-left align-middle">${'text'}</td><td class="d-none" data-label="harga">${'harga_obat'}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;
    let autoCompleteObatTamabahan = {
        $source: $('#inputObatTambahan'),
        $target: $('#tableObatTambahan'),
        appendTarget: templateObatTambahan,
        param: {
            jenis_pemeriksaan: 'Umum'
        },
        url: BASE_URL + 'RawatJalan/getObatAjax'
    };

    //console.log(autoCompleteUnitLayanan);
    bindAutoComplete(autoCompleteObat);
    bindAutoComplete(autoCompleteObatTamabahan);
}

function ObatBinding($) {
    var objPendaftaran;
    //console.log(objPendaftaran);

    try {
        objPendaftaran = pendaftaranObj;
    } catch (e) {
        if (e instanceof ReferenceError) {
            // Handle error as necessary
            objPendaftaran = null;
        }
    }
    var initialLoadObat = true;	
    var $tableObatModalDT = $("#tableObatModal").DataTable({
        responsive: {
            details: {
                type: 'column',
                target: -1
            }
        },
        destroy: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        pageLength: 10,
        order: [
            [1, "asc"]
        ],
        ajax: function (data, callback, settings) {
            if (initialLoadObat) {
                initialLoadObat = false;
                callback({data: []}); // don't fire ajax, just return empty set
                return;
            }
			data.jenis_pemeriksaan = $('#inputJenisPemeriksaan').val();

            $.post(BASE_URL + 'RawatJalan/getObatDatatable', data, function(result) {
                callback(result);                
              }, "json");            
        }, 			
        "columns": [
            { "data": null },
            { "data": 'nama_obat' },
            {
                "data": null,
                "className": "text-right",
                "render": {
                    "_": "harga_jual",
                    "filter": "harga_jual",
                    "display": "harga_jual_display"
                }
            },
            {
                data: 'stok',
                className: "text-right",
                render: function(data, type, row) {
                    return (data > 0) ? data : `<span style="color:red">${data}</span>`;
                }
            },
            { "data": 'id' },
            { "data": null }
        ],
        columnDefs: [{
                targets: [1, 2, 3],
                orderable: true
            },
            {
                targets: [-2],
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
                defaultContent: '<button class="btn btn-info btn-sm mr-0 btn-pilih">Pilih</button>',
                render: function(data, type, row) {
                    if (row.stok <= 0)
                        return '<span style="color:red">stok kosong</span>';
                }
            }
        ],
    });

    var initialLoadObatTambah = true;	
    var $tableObatTambahanModalDT = $("#tableObatTambahanModal").DataTable({
        responsive: {
            details: {
                type: 'column',
                target: -1
            }
        },
        destroy: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        pageLength: 10,
        order: [
            [1, "asc"]
        ],
        ajax: function (data, callback, settings) {
            if (initialLoadObatTambah) {
                initialLoadObatTambah = false;
                callback({data: []}); // don't fire ajax, just return empty set
                return;
            }
			data.jenis_pemeriksaan = 'Umum';

            $.post(BASE_URL + 'RawatJalan/getObatDatatable', data, function(result) {
                callback(result);                
              }, "json");            
        }, 			
        "columns": [
            { "data": null },
            { "data": 'nama_obat' },
            {
                "data": null,
                "className": "text-right",
                "render": {
                    "_": "harga_jual",
                    "filter": "harga_jual",
                    "display": "harga_jual_display"
                }
            },
            {
                data: 'stok',
                className: "text-right",
                render: function(data, type, row) {
                    return (data > 0) ? data : `<span style="color:red">${data}</span>`;
                }
            },
            { "data": 'id' },
            { "data": null }
        ],
        columnDefs: [{
                targets: [1, 2, 3],
                orderable: true
            },
            {
                targets: [-2],
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
                defaultContent: '<button class="btn btn-info btn-sm mr-0 btn-pilih">Pilih</button>',
                render: function(data, type, row) {
                    if (row.stok <= 0)
                        return '<span style="color:red">stok kosong</span>';
                }
            }
        ],
    });

    $("#tableObatModal tbody").on('click', 'button', function() {
        let $table = $('#tableObat');
        let data = $tableObatModalDT.row($(this).parents('tr')).data();
        let arr = {
            id: data['id'],
            nama: data['nama_obat'],
            harga: data['harga_jual'],
            stok: data['stok']
        };
        console.log(arr.id);
        let row_template = `<tr>
        <td class="d-none" data-label="id">${arr.id}</td>
        <td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1" max="${arr.stok}"></td>
        <td data-label="nama" class="text-left align-middle">${arr.nama}</td>
        <td data-label="harga" class="d-none">${arr.harga}</td>        
        <td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td>
        </tr>`;

        let index_exist = -1;
        $table.find('tbody tr').each(function(index, el) {
            let id = $(el).find('td[data-label="id"]').html();
            console.log(id);
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

        $('#modal-obat').modal('toggle');

    });

    $("#tableObatTambahanModal tbody").on('click', 'button', function() {
        let $table = $('#tableObatTambahan');
        let data = $tableObatTambahanModalDT.row($(this).parents('tr')).data();
        let arr = {
            id: data['id'],
            nama: data['nama_obat'],
            harga: data['harga_jual'],
            stok: data['stok']
        };
        console.log(arr.id);
        let row_template = `<tr>
        <td class="d-none" data-label="id">${arr.id}</td>
        <td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1" max="${arr.stok}"></td>
        <td data-label="nama" class="text-left align-middle">${arr.nama}</td>
        <td data-label="harga" class="d-none">${arr.harga}</td>        
        <td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td>
        </tr>`;

        let index_exist = -1;
        $table.find('tbody tr').each(function(index, el) {
            let id = $(el).find('td[data-label="id"]').html();
            console.log(id);
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

        $('#modal-obat-tambahan').modal('toggle');

    });

    $("#tableObat tbody").on('blur', '.input-jumlah', function() {
        let jumlah = $(this).val();
        let max = $(this).attr('max');
        if (parseInt(jumlah) > parseInt(max)) {
            bootbox.alert({
                centerVertical: true,
                message: `Jumlah maximum pembelian = ${max}`,
                size: 'small'
            });
            $(this).val(max);
        } else if ((parseInt(jumlah) <= 0) || (jumlah === '')) {
            bootbox.alert({
                centerVertical: true,
                message: `Jumlah minimum pembelian = 1`,
                size: 'small'
            });
            $(this).val(1);
        }
        console.log(`${jumlah} -- ${max}`);
    });

    $("#tableObatTambahan tbody").on('blur', '.input-jumlah', function() {
        let jumlah = $(this).val();
        let max = $(this).attr('max');
        if (parseInt(jumlah) > parseInt(max)) {
            bootbox.alert({
                centerVertical: true,
                message: `Jumlah maximum pembelian = ${max}`,
                size: 'small'
            });
            $(this).val(max);
        } else if ((parseInt(jumlah) <= 0) || (jumlah === '')) {
            bootbox.alert({
                centerVertical: true,
                message: `Jumlah minimum pembelian = 1`,
                size: 'small'
            });
            $(this).val(1);
        }
        console.log(`${jumlah} -- ${max}`);
    });

    // When modal window is shown
    $('#modal-obat').on('shown.bs.modal', function() {
        // Adjust column width and re-initialize Responsive extension
        requestAnimationFrame(() =>
            $("#tableObatModal").DataTable()
            .ajax.reload(null, false)
            .columns.adjust()
            .responsive.recalc()
        );
    });

    $('#modal-obat-tambahan').on('shown.bs.modal', function() {
        // Adjust column width and re-initialize Responsive extension
        requestAnimationFrame(() =>
            $("#tableObatTambahanModal").DataTable()
            .ajax.reload(null, false)
            .columns.adjust()
            .responsive.recalc()
        );
    });
}

function bindAutoComplete({ $source, $target, appendTarget, param, url }) {
    $source.autoComplete({
        preventEnter: true,
        resolver: 'custom',
        events: {
            search: function(qry, callback) {
                // let's do a custom ajax call
                let data = Object.fromEntries(
                    // convert to array, map, and then fromEntries gives back the object
                    Object.entries(param).map(([key, value]) => [key, value.val()])
                );
                data.qry = qry;

                $.ajax({
                    url: url,
                    method: "POST",
                    data: data,
                    async: true,
                    dataType: 'json'
                }).done(function(res) {
                    callback(res.results)
                });
            }
        }
    });
    $source.on('autocomplete.select', function(evt, item) {
        evt.preventDefault();
        let temp = appendTarget(item);
        autoCompleteOnSelected({ $table: $target, item: item, html: temp });
        autoCompleteClear($source);
    });
    $target.find('tbody').on("click", "td .btn-delete", function() {
        $tr = $(this).closest('tr');
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
                    $tr.remove();
                    if ($target.find('tbody tr').length == 0) {
                        let colspan = $target.find('thead tr th').length;
                        $target.find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
                    }
                }
            }
        });
    });
}

function autoCompleteOnSelected({ $table, item, html }) {
    console.log(item);
    if ($table.find('td[data-label="empty_row"]').length > 0)
        $table.find('tbody').empty();

    let index_exist = -1;
    $table.find('tbody tr').each(function(index, el) {
        let id = $(el).find('td[data-label="id"]').html();
        if (id == item.id) {
            index_exist = index;
            // break the loop once found
            return false;
        }
    });

    if (index_exist == -1) {
        $table.find('tbody').append(html);
    } else {
        let input = $table.find('tbody tr').eq(index_exist).find('.input-jumlah');
        $(input).val(parseInt($(input).val()) + 1);
        $(input).blur();
    }
}

function autoCompleteClear($e) {
    $e.val('').focus();
    $e.parent().find('.dropdown-menu .dropdown-item.active').removeClass('active');
}