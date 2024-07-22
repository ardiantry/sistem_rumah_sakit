(function($) {
    DataMasterBinding($);

    PrBinding($);
    initWizard($);
    actionWizard($);
})(jQuery);

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

    $('#btnPembayaran').on('click', function() {
        var $wizard = $('#wizardForm');
        $wizard.validate().settings.ignore = ":disabled,:hidden";
        if (!$wizard.valid()) return false;

        var id = $('#inputIdPr').val();
        if ((!id) || (id !== '0')) {
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
                    console.log('This was logged in the callback: ' + result);
                    if (result === true) {
                        bayar(id);
                    }
                }
            });
        } else {
            bootbox.alert({
                centerVertical: true,
                message: "Tidak ada data pembayaran!",
                size: 'small'
            });
        }
    });

    $('.btn-print').on('click', function(event) {
        event.preventDefault();
        var id = $('#inputIdPr').val();
        if ((!id) || (id !== '0')) {
            window.open(BASE_URL + "Hutang/print/" + id, "_blank");
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
    let $tableObat = $('#tableInvoiceObat');
    let $tableCaraBayar = $('#tableCaraBayar');
    let NoFaktur = $('#NoFaktur').html();
    let keterangan = $('#inputKeteranganPembayaran').val();
    let jObat = fnTableToObject($tableObat);
    let jBayar = fnTableToObject($tableCaraBayar);
    let subtotal = $('#spanSubtotal').html();
    let diskon = $('#inputDiskon').val();
    let totalDiskon = $('#spanDiskon').html();
    let pajak = $('#inputPajak').val();
    let totalPajak = $('#spanPajak').html();
    let totalTagihan = clearRupiah($('#spanTotalTagihan').html());
    let totalBayar = $('#spanTotalBayar').html();
    let kembalian = $('#spanKembalian').html();
    let idCaraBayar = $('#inputCaraBayar').val();

    let data = {
        id: id,
        noFaktur: NoFaktur,
        totalTagihan: totalTagihan,
        idCaraBayar: idCaraBayar,
        keterangan: keterangan
    };

    let aSave = $.ajax({
        type: "POST",
        url: BASE_URL + "Hutang/savePembayaran",
        data: JSON.stringify(data),
        dataType: 'json',
        contentType: 'application/json; charset=utf-8'
    });
    $.when(aSave).done(function(response) {
        if (response.status) {
            window.open(BASE_URL + "Hutang/print/" + id, "_blank");
            ToastEnd.fire({
                icon: 'success',
                title: 'Data berhasil disimpan'
            })
        } else
            console.log(response.message);
    });
}

function DataMasterBinding($) {
    $.getJSON(BASE_URL + 'Hutang/getDataMasterAjax', function(data) {
        bindCombo({
            $combo: $('#inputSupplier'),
            dataSource: data.supplier,
            dataTextField: 'nama_supplier',
            dataValueField: 'id'
        });
        bindCombo({
            $combo: $('#inputCaraBayar'),
            dataSource: data.cara_bayar,
            dataTextField: 'cara_bayar',
            dataValueField: 'id'
        });
    });

    let templateObat = template `<tr>
    <td class="d-none" data-label="id">${'id'}</td>
    <td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1"></td>
    <td data-label="nama" class="text-left align-middle">${'text'}</td>
    <td class="d-none" data-label="harga">${'harga_obat'}</td>
    <td class="d-none" data-label="exp_date"><input type="date" class="form-control form-control-sm text-center input-date" value="${'exp_date'}"></td></td>    
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
    <td data-label="harga" class="text-center align-middle">${'harga_obat'}</td>
    <td data-label="total" class="text-center align-middle">${'harga_obat'}</td>
    <td data-label="exp_date" class="text-center align-middle">${'exp_date'}</td>
    <td data-label="batch-number" class="text-center align-middle d-none"><input type="number" class="form-control form-control-sm text-center input-expired-date" value="" step="1"></td>    
    <td class="text-right align-middle d-none" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;
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
        }
        // break the loop once found
        return false;
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
        <td data-label="jumlah" class="text-center align-middle">${value.jumlah}</td>
        <td data-label="nama" class="text-left align-middle">${value.nama}</td>
        <td data-label="harga" class="text-right align-middle">${rupiah(value.harga)}</td>
        <td data-label="total" class="text-right align-middle">${rupiah(value.harga * value.jumlah)}</td>
        <td data-label="exp_date" class="text-center align-middle">${moment(value.exp_date).format('DD/MM/YYYY')}</td>
        <td data-label="batch-number" class="text-center align-middle d-none"><input type="number" class="form-control form-control-sm text-center input-expired-date" value="" step="1"></td>
        <td class="text-right align-middle d-none" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td>
        </tr>`;
        $tableObat.find('tbody').append(row_template);
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
    console.log(pr);


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
            url: BASE_URL + 'Hutang/getHutangDatatable',
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
            { "data": "jumlah" },
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
        let $spanTotalTagihan = $('#spanTotalTagihan');
        $spanTotalTagihan.html(rupiah(data.jumlah));
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
    console.log(typeof data);
    let $tableObat = $('#tableObatPo');
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
        <td class="d-none" data-label="harga">${value.harga}</td>
        <td class="d-none" data-label="exp_date"><input type="date" class="form-control form-control-sm text-center input-date" value="${value.exp_date}"></td></td>                    
        <td class="text-right align-middle d-none" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td>
        </tr>`;
        $tableObat.find('tbody').append(row_template);
    });
}

function fillTableInvoiceObat(data) {
    console.log(typeof data);
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