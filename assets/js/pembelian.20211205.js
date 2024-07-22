(function($) {
    DataMasterBinding($);
    PoBinding($);
    PrBinding($);
    ObatBinding($);
    initWizard($);
    actionWizard($);
})(jQuery);

function ObatBinding($) {
    var $tableObatPrModalDT = $("#tableObatPrModal").DataTable({
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
            url: BASE_URL + 'RawatJalan/getObatDatatable',
            type: "POST"
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
            { "data": 'id' },
            { "data": null }
        ],
        columnDefs: [{
                targets: [1, 2],
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
                defaultContent: '<button class="btn btn-info btn-sm mr-0 btn-pilih">Pilih</button>'
            }
        ],
    });

    $("#tableObatPrModal tbody").on('click', 'button', function() {
        let $table = $('#tableObatPr');
        let data = $tableObatPrModalDT.row($(this).parents('tr')).data();
        let arr = {
            id: data['id'],
            nama: data['nama_obat'],
            jumlah: 1,
            harga: data['harga_beli'],
            exp_date: moment(new Date()).format('DD/MM/YYYY')
        };
        let row_template = `<tr>
        <td class="d-none" data-label="id">${arr.id}</td>
        <td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="${arr.jumlah}" step="1"></td>
        <td data-label="nama" class="text-left align-middle">${arr.nama}</td>
        <td data-label="harga" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-right input-harga" value="${arr.harga}" step="1"></td>
        <td data-label="total" class="text-right align-middle">${rupiah(arr.harga * arr.jumlah)}</td>
        <td data-label="exp_date" class="text-center align-middle">
            <div class="input-group date datepicker input-expired-date" data-target-input="nearest" data-bind="exp_date" id="datetimepicker-${arr.id}">
            <input type="text" class="form-control form-control-sm datetimepicker-input" required value="${arr.exp_date}" data-target="#datetimepicker-${arr.id}" />
                <div class="input-group-append" data-toggle="datetimepicker" data-target="#datetimepicker-${arr.id}">
                    <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                </div>
            </div>     
        </td>
        <td data-label="batch-number" class="text-center align-middle d-none"><input type="number" class="form-control form-control-sm text-center input-expired-date" value="" step="1"></td>
        <td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td>
        </tr>`;
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
            $(input).keyup();
        }

        $('#modal-obatPr').modal('toggle');
    });

    var $tableObatModalDT = $("#tableObatModal").DataTable({
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
            url: BASE_URL + 'RawatJalan/getObatDatatable',
            type: "POST"
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
            { "data": 'id' },
            { "data": null }
        ],
        columnDefs: [{
                targets: [1, 2],
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
                defaultContent: '<button class="btn btn-info btn-sm mr-0 btn-pilih">Pilih</button>'
            }
        ],
    });

    $("#tableObatModal tbody").on('click', 'button', function() {
        let $table = $('#tableObatPo');
        let data = $tableObatModalDT.row($(this).parents('tr')).data();
        let arr = {
            id: data['id'],
            nama: data['nama_obat'],
            harga: data['harga_jual'],
            exp_date: moment(new Date()).format('YYYY-MM-DD')
        };
        let row_template = `<tr>
        <td class="d-none" data-label="id">${arr.id}</td>
        <td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1"></td>
        <td data-label="nama" class="text-left align-middle">${arr.nama}</td>
        <td class="d-none" data-label="harga">${arr.harga}</td>
        <td data-label="exp_date" class="d-none">${arr.exp_date}</td>        
        <td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;

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
            $(input).keyup();
        }

        $('#modal-obat').modal('toggle');
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
}

function initWizard($) {
    //Initialize wizard			
    var $active = $(".wizard").find('li.active');
    $active.removeClass('active');
    let $step = $('.wizard .nav-tabs li');
    $step.eq(WIZARD_INDEX).addClass('active').removeClass('disabled');

    $step.each(function(i, item) {
        if (i < WIZARD_INDEX)
            $(item).addClass('done').removeClass('disabled');
    });

    $step.eq(WIZARD_INDEX).find('a[data-toggle="tab"]').click();
}

function actionWizard($) {
    $('.nav-tabs > li a[title]').tooltip();
    $("#FormPelanggan").submit(function(event) {
        event.preventDefault();
        insert_pelanggan();
    });
    $("#FormPelanggan").validate();
    $("#WizardForm").validate();


    //Action Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        var $target = $(e.target);
        if ($target.parent().hasClass('disabled')) {
            return false;
        } else {
            $target.parent()
                .addClass('active')
                .siblings()
                .removeClass('active');
        }
    });

    $(".next-step").click(function(e) {
        var $wizard = $('#wizardForm');
        $wizard.validate().settings.ignore = ":disabled,:hidden";
        if (!$wizard.valid()) return false;

        var $active = $(".wizard").find('li.active');
        let click_index = $('.wizard .nav-tabs li').index($active);
        switch (click_index) {
            case 0:
                if ($('#tableObatPo').find('td[data-label="empty_row"]').length > 0) {
                    bootbox.alert({
                        centerVertical: true,
                        message: "Tidak ada data obat!",
                        size: 'small'
                    });
                    return false;
                }
                save_pemesanan();
                $('#inputNoPoPr').val($('#inputNoPo').val());
                $('#inputNamaSupplier').val($('#inputSupplier option:selected').text());
                let jObat = fnTableToObject($('#tableObatPo'));
                fillTableObatPr(jObat);
                break;
            case 1:
                $('#NoPo').html($('#inputNoPo').val());
                $('#NoFaktur').html($('#inputNoFaktur').val());
                $('#TanggalPembayaran').html(TODAY);
                $('#NamaSupplier').html($('#inputNamaSupplier').val());

                save_penerimaan();
                let jPenerimaanObat = fnTableToObject($('#tableObatPr'));
                fillTableInvoiceObat(jPenerimaanObat);
                calculate();
                break;
        }

        $active
            .removeClass('active')
            .addClass('done')
            .next()
            .removeClass('disabled')
            .addClass('active').find('a[data-toggle="tab"]').click();
    });

    $(".prev-step").click(function(e) {
        var $active = $(".wizard").find('li.active');
        $active
            .removeClass('active')
            .prev().addClass('active').find('a[data-toggle="tab"]').click();
    });

    $('#tableInvoiceObat').find('tbody').on('keyup', 'td[data-label="harga"] input', function() {
        let harga = $(this).val();
        let jumlah = $(this).closest('tr').find('td[data-label="jumlah"]').html();
        let total = parseInt(jumlah) * parseInt(harga);
        $(this).closest('tr').find('td[data-label="total"]').html(total);
        calculate();
    });

    $('#tableObatPr').find('tbody').on('keyup', 'td[data-label="harga"] input', function() {
        let harga = $(this).val();
        let jumlah = $(this).closest('tr').find('td[data-label="jumlah"] input').val();
        let total = parseInt(jumlah) * parseInt(harga);
        $(this).closest('tr').find('td[data-label="total"]').html(rupiah(total));
        //calculate();
    });

    $('#tableObatPr').find('tbody').on('keyup', 'td[data-label="jumlah"] input', function() {
        let jumlah = $(this).val();
        let harga = $(this).closest('tr').find('td[data-label="harga"] input').val();
        let total = parseFloat(jumlah) * parseFloat(harga);
        $(this).closest('tr').find('td[data-label="total"]').html(rupiah(total));
        //calculate();
    });

    $('#inputDiskon').on('keyup', function() {
        calculate();
    });

    $('#inputPajak').on('keyup', function() {
        calculate();
    });

    $('#inputJumlahBayar').on('keyup', function() {
        var tot = 0; // variable to sore sum
        $('#tableCaraBayar').find('tbody input').each(function() { // iterate over inputs
            tot += parseInt($(this).val()) || 0; // parse and add value, if NaN then add 0
        });
        let jumlahBayar = $(this).val();
        let totalTagihan = clearRupiah($('#spanTotalTagihan').html());
        $('#spanTotalBayar').html(rupiah((tot + parseInt(jumlahBayar))));
        $('#spanKembalian').html(rupiah((tot + parseInt(jumlahBayar)) - parseInt(totalTagihan)));
    });


    $('#btnCaraBayar').on('click', function() {
        let id = $('#inputCaraBayar').val();
        let caraBayar = $("#inputCaraBayar option:selected").text();
        let akun = $('#inputCaraBayar').children("option:selected").data("akun");
        let jumlahBayar = $('#inputJumlahBayar').val();

        if (!id) {
            bootbox.alert({
                centerVertical: true,
                message: "Pilih cara bayar!",
                size: 'small'
            });
            return false;
        }

        if (!jumlahBayar) {
            bootbox.alert({
                centerVertical: true,
                message: "Isi jumlah bayar!",
                size: 'small'
            });
            return false;
        }

        $('#inputJumlahBayar').val('');
        let index_exist = -1;
        $('#tableCaraBayar').find('tbody tr').each(function(index, el) {
            let exist_id = $(el).find('td[data-label="id"]').html();
            if (id == exist_id) {
                index_exist = index;
                // break the loop once found
                return false;
            }
        });
        if (index_exist == -1) {
            if ($('#tableCaraBayar').find('tbody tr td[data-label="empty_row"]').length > 0)
                $('#tableCaraBayar').find('tbody').empty();

            $('#tableCaraBayar').find('tbody').append(`<tr><td class="text-left align-middle d-none" data-label="id">${id}</td><td class="text-left align-middle" data-label="nama">${caraBayar}</td><td class="text-right align-middle" data-label="harga"><input type="number" class="input-jumlah form-control form-control-sm text-right" value="${parseInt(jumlahBayar)}" step="1"></td><td class="d-none" data-label="akun">${akun}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`);
        } else {
            let input = $('#tableCaraBayar').find('tbody tr').eq(index_exist).find('.input-jumlah');
            $(input).val(parseInt($(input).val()) + parseInt(jumlahBayar));
            $(input).blur();
        }

        calculate();
    });

    $('#tableCaraBayar').find('tbody').on("click", "td .btn-delete", function() {
        $(this).closest('tr').remove();
        if ($('#tableCaraBayar').find('tbody tr').length == 0) {
            let colspan = $('#tableCaraBayar').find('thead tr th').length;
            $('#tableCaraBayar').find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
        }
        calculate();
    });

    $('#tableCaraBayar').find('tbody').on('keyup', 'td[data-label="harga"] input', function() {
        let harga = $(this).val();
        calculate();
    });

    $('#btnPembayaran').on('click', function() {
        var $btn = $(this);
        var id = $('#inputIdPr').val();
        if ((!id) || (id !== '0')) {
            let totalTagihan = clearRupiah($('#spanTotalTagihan').html());
            let $tableCaraBayar = $('#tableCaraBayar');
            let jBayar = fnTableToObject($tableCaraBayar);
            console.log(jBayar);
            let totalBayar = jBayar.map(jBayar => parseInt(jBayar.harga)).reduce((harga, jBayar) => parseInt(jBayar) + parseInt(harga), 0);
            if (isNaN(totalBayar)) {
                totalBayar = 0;
            }

            if (totalBayar < totalTagihan) {
                bootbox.alert({
                    centerVertical: true,
                    message: "Faktur kurang bayar!",
                    size: 'small'
                });
            } else {
                let kembalian = totalBayar - totalTagihan;
                let inTunai = -1;

                $.each(jBayar, function(_key, v) {
                    if (v['akun'] === '111') {
                        inTunai = _key;
                        return false;
                    }
                });

                if ((totalBayar > totalTagihan) && (inTunai === -1)) {
                    bootbox.alert({
                        centerVertical: true,
                        message: "Selain pembayaran tunai tidak boleh ada kembalian !",
                        size: 'small'
                    });
                } else if ((totalBayar > totalTagihan) && (jBayar[inTunai]['harga'] < kembalian)) {
                    bootbox.alert({
                        centerVertical: true,
                        message: "Kembalian tidak boleh lebih besar dari pembayaran tunai !",
                        size: 'small'
                    });
                } else {
                    bootbox.confirm({
                        title: "Konfirmasi Pembayaran",
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
                            //console.log('This was logged in the callback: ' + result);
                            if (result === true) {
                                $btn.prop('disabled', true);
                                bayar(id);
                            }
                        }
                    });
                }
            }
        } else {
            bootbox.alert({
                centerVertical: true,
                message: "Tidak ada data pembayaran!",
                size: 'small'
            });
        }
    });

    $('.btn-cari-obat').on('click', function() {
        $('#modal-obat').modal('toggle');
    });

    $('.btn-cari-obatPr').on('click', function() {
        $('#modal-obatPr').modal('toggle');
    });

    $('.btn-print').on('click', function(event) {
        event.preventDefault();
        var id = $('#inputIdPr').val();
        if ((!id) || (id !== '0')) {
            window.open(BASE_URL + "Pembelian/print/" + id, "_blank");
        } else {
            bootbox.alert({
                centerVertical: true,
                message: "Tidak ada data pembayaran!",
                size: 'small'
            });
        }
    });
}

function bayar(id) {
    let $tableObat = $('#tableObatPr');
    let $tableCaraBayar = $('#tableCaraBayar');
    let keterangan = $('#inputKeteranganPembayaran').val();
    let noFaktur = $('#NoFaktur').html();
    let jObat = fnTableToObject($tableObat);
    let jBayar = fnTableToObject($tableCaraBayar);
    let subtotal = clearRupiah($('#spanSubtotal').html());
    let diskon = clearRupiah($('#inputDiskon').val());
    let totalDiskon = clearRupiah($('#spanDiskon').html());
    let pajak = clearRupiah($('#inputPajak').val())
    let totalPajak = clearRupiah($('#spanPajak').html());
    let totalTagihan = clearRupiah($('#spanTotalTagihan').html());
    let totalBayar = clearRupiah($('#spanTotalBayar').html());
    let kembalian = clearRupiah($('#spanKembalian').html());

    let data = {
        id: id,
        noFaktur: noFaktur,
        invoiceObat: jObat,
        invoiceBayar: jBayar,
        subTotal: subtotal,
        diskon: diskon,
        totalDiskon: totalDiskon,
        pajak: pajak,
        totalPajak: totalPajak,
        totalTagihan: totalTagihan,
        totalBayar: totalBayar,
        kembalian: kembalian,
        keterangan: keterangan
    };

    let aSave = $.ajax({
        type: "POST",
        url: BASE_URL + "Pembelian/savePembayaran",
        data: JSON.stringify(data),
        dataType: 'json',
        contentType: 'application/json; charset=utf-8'
    });
    $.when(aSave).done(function(response) {
        if (response.status) {
            window.open(BASE_URL + "Pembelian/print/" + id, "_blank");
            ToastEnd.fire({
                icon: 'success',
                title: 'Data berhasil disimpan'
            })
        } else
            console.log(response.message);
    });

}

function DataMasterBinding($) {
    $.getJSON(BASE_URL + 'Pembelian/getDataMasterAjax', function(data) {
        bindCombo({
            $combo: $('#inputSupplier'),
            dataSource: data.supplier,
            dataTextField: 'nama_supplier',
            dataValueField: 'id'
        });
        var $comboCaraBayar = $('#inputCaraBayar');
        $.each(data.cara_bayar, function(_key, cara_bayar) {
            $comboCaraBayar.append(`<option value="${cara_bayar.id}" data-akun="${cara_bayar.id_akun}">${cara_bayar.cara_bayar}</option>`);
        });
    });

    let templateObat = template `<tr>
    <td class="d-none" data-label="id">${'id'}</td>
    <td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1"></td>
    <td data-label="nama" class="text-left align-middle">${'text'}</td>
    <td class="d-none" data-label="harga">${'harga_obat'}</td>
    <td data-label="exp_date" class="d-none">
        <div class="input-group date datepicker input-expired-date" data-target-input="nearest" data-bind="exp_date" id="datetimepicker-${'id'}">
        <input type="text" class="form-control form-control-sm datetimepicker-input" required value="${'exp_date'}" data-target="#datetimepicker-${'id'}" />
            <div class="input-group-append" data-toggle="datetimepicker" data-target="#datetimepicker-${'id'}">
                <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
            </div>
        </div>     
    </td>
    <td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;
    let autoCompleteObat = {
        $source: $('#inputObatPo'),
        $target: $('#tableObatPo'),
        appendTarget: templateObat,
        param: {},
        url: BASE_URL + 'Pembelian/getObatAjax'
    };
    bindAutoComplete(autoCompleteObat);

    let templateObatPr = template `<tr>
    <td class="d-none" data-label="id">${'id'}</td>
    <td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1"></td>
    <td data-label="nama" class="text-left align-middle">${'text'}</td>
    <td data-label="harga" class="text-right align-middle"><input type="number" class="form-control form-control-sm text-right input-harga" value="${'harga_obat'}" step="1"></td>
    <td data-label="total" class="text-right align-middle">${'total'}</td>
    <td data-label="exp_date" class="text-center align-middle">
        <div class="input-group date datepicker input-expired-date" data-target-input="nearest" data-bind="exp_date" id="datetimepicker-${'id'}">
        <input type="text" class="form-control form-control-sm datetimepicker-input" required value="${'exp_date'}" data-target="#datetimepicker-${'id'}" />
            <div class="input-group-append" data-toggle="datetimepicker" data-target="#datetimepicker-${'id'}">
                <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
            </div>
        </div>     
    </td>
    <td data-label="batch-number" class="text-center align-middle d-none"><input type="number" class="form-control form-control-sm text-center input-expired-date" value="" step="1"></td>    
    <td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;
    let autoCompleteObatPr = {
        $source: $('#inputObatPr'),
        $target: $('#tableObatPr'),
        appendTarget: templateObatPr,
        param: {},
        url: BASE_URL + 'Pembelian/getObatAjax'
    };
    bindAutoComplete(autoCompleteObatPr);
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
        item.exp_date = moment(item.exp_date).format('DD/MM/YYYY');
        item.total = rupiah(item.harga_obat);

        let temp = appendTarget(item);
        autoCompleteOnSelected({ $table: $target, item: item, html: temp });
        autoCompleteClear($source);
    });
    $target.find('tbody').on("click", "td .btn-delete", function() {
        $(this).closest('tr').remove();
        if ($target.find('tbody tr').length == 0) {
            let colspan = $target.find('thead tr th').length;
            $target.find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
        }
    });
}

function autoCompleteOnSelected({ $table, item, html }) {
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
        $(input).keyup();
    }
}

function autoCompleteClear($e) {
    $e.val('').focus();
    $e.parent().find('.dropdown-menu .dropdown-item.active').removeClass('active');
}

function fillTableObatPr(data) {
    let $tableObat = $('#tableObatPr');
    $tableObat.find('tbody').empty();
    if (data.length === 0) {
        let colspan = $tableObat.find('thead tr th').length;
        $tableObat.find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
    }
    $.each(data, function(key, value) {
        let row_template = `<tr>
        <td class="d-none" data-label="id">${value.id}</td>
        <td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="${value.jumlah}" step="1"></td>
        <td data-label="nama" class="text-left align-middle">${value.nama}</td>
        <td data-label="harga" class="text-right align-middle"><input type="number" class="form-control form-control-sm text-right input-harga" value="${value.harga}" step="1"></td>
        <td data-label="total" class="text-right align-middle">${rupiah(value.harga * value.jumlah)}</td>
        <td data-label="exp_date" class="text-center align-middle">

        <div class="input-group date datepicker input-expired-date" data-target-input="nearest" data-bind="exp_date" id="datetimepicker-${value.id}">
        <input type="text" class="form-control form-control-sm datetimepicker-input" required value="${moment(value.exp_date).format('DD/MM/YYYY')}" data-target="#datetimepicker-${value.id}" />
            <div class="input-group-append" data-toggle="datetimepicker" data-target="#datetimepicker-${value.id}">
                <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
            </div>
        </div> 

        </td>
        <td data-label="batch-number" class="text-center align-middle d-none"><input type="number" class="form-control form-control-sm text-center input-expired-date" value="" step="1"></td>
        <td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td>
        </tr>`;
        $tableObat.find('tbody').append(row_template);
    });
}

function save_pemesanan() {
    let po = {
        id: $('#inputIdPo').val(),
        no_po: $('#inputNoPo').val(),
        tanggal_po: $('#inputTanggalPesan').val(),
        keterangan: $('#inputKeteranganPO').val(),
        id_supplier: $('#inputSupplier').val()
    };

    let dataObat = fnTableToObject($('#tableObatPo'));
    po.dataObat = dataObat;

    let aSave = $.ajax({
        type: "POST",
        url: BASE_URL + "Pembelian/savePemesanan",
        data: JSON.stringify(po),
        dataType: 'json',
        contentType: 'application/json; charset=utf-8'
    });
    $.when(aSave).done(function(response) {
        if (response.status) {
            $('#inputIdPo').val(response.data.id),
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan'
                })
        } else
            console.log(response.message);
    });
}

function save_penerimaan() {
    let pr = {
        id: $('#inputIdPr').val(),
        id_po: $('#inputIdPo').val(),
        no_faktur: $('#inputNoFaktur').val(),
        tanggal_faktur: $('#inputTanggalFaktur').val(),
        lokasi: $('#inputLokasi').val(),
        keterangan: $('#inputKeteranganPr').val(),
        id_supplier: $('#inputSupplier').val()
    };

    let dataObat = fnTableToObject($('#tableObatPr'));
    pr.dataObat = dataObat;

    let aSave = $.ajax({
        type: "POST",
        url: BASE_URL + "Pembelian/savePenerimaan",
        data: JSON.stringify(pr),
        dataType: 'json',
        contentType: 'application/json; charset=utf-8'
    });
    $.when(aSave).done(function(response) {
        if (response.status) {
            $('#inputIdPr').val(response.data.id),
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan'
                })
        } else
            console.log(response.message);
    });

}

function PoBinding($) {
    var $tablePemesananObatDT = $("#tablePemesananObat").DataTable({
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
            url: BASE_URL + 'Pembelian/getPemesananDatatable',
            type: "POST"
        },
        "columns": [
            { "data": null },
            { "data": 'no_po' },
            { "data": "tanggal_po", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { "data": 'nama_supplier' },
            { "data": "keterangan" },
            { "data": "id" },
            { "data": "id_supplier" },
            { "data": null }
        ],
        columnDefs: [{
                targets: [1, 2, 3],
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
                defaultContent: '<button class="btn btn-info btn-sm mr-0 btn-pilih">Pilih</button>'
            }
        ],
    });

    $("#tablePemesananObat tbody").on('click', 'button', function() {
        let data = $tablePemesananObatDT.row($(this).parents('tr')).data();
        $('#inputIdPo').val(data.id);
        $('#inputNoPo').val(data.no_po);
        $('#inputNoPoPr').val(data.no_po);
        $('#inputNamaSupplier').val(data.nama_supplier);
        $('#inputTanggalPesan').val(moment(data.tanggal_po).format('DD/MM/YYYY'));
        $('#inputKeteranganPO').val(data.keterangan);
        $('#inputSupplier').val(data.id_supplier);

        fillTableObatPo(data.dataObat);
        fillTableObatPr(data.dataObat);
        $('#modal-Po').modal('toggle');
    });

    // When modal window is shown
    $('#modal-Po').on('shown.bs.modal', function() {
        // Adjust column width and re-initialize Responsive extension
        requestAnimationFrame(() =>
            $("#tablePemesananObat").DataTable()
            .ajax.reload(null, false)
            .columns.adjust()
            .responsive.recalc()
        );
    });
}

function PrBinding($) {
    var $tablePenerimaanObatDT = $("#tablePenerimaanObat").DataTable({
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
            url: BASE_URL + 'Pembelian/getPenerimaanDatatable',
            type: "POST"
        },
        "columns": [
            { "data": null },
            { "data": 'no_faktur' },
            { "data": 'no_po' },
            { "data": "tanggal_faktur", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { "data": 'nama_supplier' },
            { "data": "keterangan" },
            { "data": "keterangan_po" },
            { "data": "id" },
            { "data": "id_supplier" },
            { "data": null }
        ],
        columnDefs: [{
                targets: [1, 2, 3],
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
                defaultContent: '<button class="btn btn-info btn-sm mr-0 btn-pilih">Pilih</button>'
            }
        ],
    });

    $("#tablePenerimaanObat tbody").on('click', 'button', function() {
        let data = $tablePenerimaanObatDT.row($(this).parents('tr')).data();
        $('#inputIdPr').val(data.id);
        $('#inputIdPo').val(data.id_po);
        $('#inputNoPo').val(data.no_po);
        $('#inputNoPoPr').val(data.no_po);
        $('#inputNoFaktur').val(data.no_faktur);
        $('#inputNamaSupplier').val(data.nama_supplier);
        $('#inputLokasi').val(data.lokasi);
        $('#inputTanggalPesan').val(moment(data.tanggal_po).format('DD/MM/YYYY'));
        $('#inputTanggalFaktur').val(moment(data.tanggal_faktur).format('DD/MM/YYYY'));
        $('#inputKeteranganPO').val(data.keterangan_po);
        $('#inputKeteranganPr').val(data.keterangan);
        $('#inputSupplier').val(data.id_supplier);

        $('#NoPo').html(data.no_po);
        $('#NoFaktur').html(data.no_faktur);
        $('#TanggalPembayaran').html(TODAY);
        $('#NamaSupplier').html(data.nama_supplier);

        fillTableObatPo(data.dataObat);
        fillTableObatPr(data.dataObat);
        fillTableInvoiceObat(data.dataObat);
        calculate();
        $('#modal-Pr').modal('toggle');
    });

    // When modal window is shown
    $('#modal-Pr').on('shown.bs.modal', function() {
        // Adjust column width and re-initialize Responsive extension
        requestAnimationFrame(() =>
            $("#tablePenerimaanObat").DataTable()
            .ajax.reload(null, false)
            .columns.adjust()
            .responsive.recalc()
        );
    });
}

function fillTableObatPo(data) {
    let $tableObat = $('#tableObatPo');
    $tableObat.find('tbody').empty();
    if (data.length === 0) {
        let colspan = $tableObat.find('thead tr th').length;
        $tableObat.find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
    }
    $.each(data, function(key, value) {
        let row_template = `<tr>
        <td class="d-none" data-label="id">${value.id}</td>
        <td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="${value.jumlah}" step="1"></td>
        <td data-label="nama" class="text-left align-middle">${value.nama}</td>
        <td class="d-none" data-label="harga">${value.harga}</td>
        <td class="d-none" data-label="exp_date"><input type="date" class="form-control form-control-sm text-center input-date" value="${value.exp_date}"></td></td>                    
        <td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td>
        </tr>`;
        $tableObat.find('tbody').append(row_template);
    });
}

function fillTableInvoiceObat(data) {
    let $tableObat = $('#tableInvoiceObat');
    $tableObat.find('tbody').empty();
    if (data.length === 0) {
        let colspan = $tableObat.find('thead tr th').length;
        $tableObat.find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
    }
    $.each(data, function(key, value) {
        let row_template = `<tr>
        <td class="d-none" data-label="id">${value.id}</td>
        <td data-label="jumlah" class="text-center align-middle">${value.jumlah}</td>
        <td data-label="nama" class="text-left align-middle">${value.nama}</td>
        <td data-label="harga" class="text-right align-middle">${rupiah(value.harga)}</td>
        <td data-label="total" class="text-right align-middle">${rupiah(value.harga * value.jumlah)}</td>
        <td data-label="exp_date" class="text-right align-middle">${moment(value.exp_date).format('DD/MM/YYYY')}</td>
        </tr>`;
        $tableObat.find('tbody').append(row_template);
    });
}

function calculate() {

    let $tableObat = $('#tableInvoiceObat');
    let $tableCaraBayar = $('#tableCaraBayar');


    let jObat = fnTableToObject($tableObat);
    let jBayar = fnTableToObject($tableCaraBayar);

    //let totalObat = jObat.map(jObat => parseInt(clearRupiah(jObat.total))).reduce((total, jObat) => parseInt(jObat) + parseInt(total), 0);
    let totalObat = jObat.reduce((totalObat, currentValue) => totalObat + clearRupiah(currentValue["total"]), 0);
    if (isNaN(totalObat)) {
        totalObat = 0;
    }

    let totalBayar = jBayar.map(jBayar => parseInt(jBayar.harga)).reduce((harga, jBayar) => parseInt(jBayar) + parseInt(harga), 0);
    if (isNaN(totalBayar)) {
        totalBayar = 0;
    }


    let subTotal = totalObat;

    let $spanSubtotal = $('#spanSubtotal');
    $spanSubtotal.html(rupiah(subTotal));

    let $inputDiskon = $('#inputDiskon');
    let diskon
    if ($inputDiskon.val().indexOf('%') > -1) {
        diskon = parseInt(parseFloat(($inputDiskon.val()).replace('%', '')) * subTotal / 100);
    } else {
        diskon = $inputDiskon.val();
    }

    let $spanDiskon = $('#spanDiskon');

    $spanDiskon.html(rupiah(diskon));

    let $inputPajak = $('#inputPajak');
    let $spanPajak = $('#spanPajak');
    //let pajak = Math.round(($inputPajak.val() * subTotal) / 100);
    let pajak = Math.round(($inputPajak.val() * (subTotal - diskon)) / 100);
    $spanPajak.html(rupiah(pajak));

    let $spanTotalTagihan = $('#spanTotalTagihan');
    let total = subTotal - diskon + pajak;
    $spanTotalTagihan.html(rupiah(total));

    let $spanTotalBayar = $('#spanTotalBayar');
    $spanTotalBayar.html(rupiah(totalBayar));

    let $spanKembalian = $('#spanKembalian');
    $spanKembalian.html(rupiah(totalBayar - total));

}