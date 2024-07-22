class Pelanggan {
    constructor({
        id,
        no_pelanggan,
        nama_pelanggan,
        tanggal_lahir,
        umur,
        jenis_kelamin,
        alamat,
        keterangan,
        no_telp
    }) {
        this.id = id;
        this.noPelanggan = no_pelanggan;
        this.namaPelanggan = nama_pelanggan;
        this.tanggalLahir = tanggal_lahir;
        this.umur = umur;
        this.jenisKelamin = jenis_kelamin;
        this.alamat = alamat;
        this.keterangan = keterangan;
        this.noTelp = no_telp;

        this.updateValue = function(id) {
            this.id = id;
        };

        this.render = function() {
            let noRmNama = null;
            let tanggal_lahir = null;

            if (id !== null) {
                noRmNama = `${this.noPelanggan}-${this.namaPelanggan}`;
                tanggal_lahir = moment(this.tanggalLahir).format('DD/MM/YYYY');
            }

            $('#inputNoRM').val(this.noPelanggan);
            $('#inputNamaPasien').val(this.namaPelanggan);
            $('#inputNoRMNama').val(noRmNama);
            $('#inputTanggalLahir').val(tanggal_lahir);
            $('#inputUmur').val(this.umur);
            $('#inputJenisKelamin').val(this.jenisKelamin);
            $('#inputAlamat').val(this.alamat);
            $('#inputKeteranganPelanggan').val(this.keterangan);
            $('#inputNoTelp').val(this.noTelp);
            $('#inputIdPelanggan').val(this.id);
        };
        this.save = function() {
            return $.ajax({
                type: "POST",
                url: BASE_URL + "Pelanggan/save",
                data: JSON.stringify(this),
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        }
    }
}

class Transaksi {
    constructor({
        id,
        no_transaksi,
        tanggal_penyerahan_resep,
        keterangan,
        state_index
    }) {
        this.id = id;
        this.noTransaksi = no_transaksi;
        this.tanggalPenyerahanResep = tanggal_penyerahan_resep;
        this.keterangan = keterangan;
        this.stateIndex = state_index;
        this.pelanggan = {};
        this.dataObat = {};
        this.updateValue = function(id, no_transaksi) {
            this.id = id;
            this.noTransaksi = no_transaksi
        };
        this.render = function() {
            $('#inputId').val(this.id);
            $('#inputNoTransaksi').val(this.noTransaksi);
            $('#inputTanggalPenyerahanResep').val(moment(this.tanggalPenyerahanResep).format('DD/MM/YYYY'));
            $('#inputKeterangan').val(this.keterangan);

            $('#NoReg').html(this.noTransaksi);
            $('#TglNota').html(TODAY);

            let namaPelanggan = null;
            let tanggal_lahir = null;
            let alamat = null;

            if (this.pelanggan.id !== null) {
                namaPelanggan = this.pelanggan.namaPelanggan;
                tanggal_lahir = moment(this.pelanggan.tanggalLahir).format('DD/MM/YYYY') + '(' + this.pelanggan.umur + ')';
                alamat = this.pelanggan.alamat;
            }

            $('#NamaPelanggan').html(namaPelanggan);
            $('#AlamatPelanggan').html(alamat);
            $('#TanggalLahirUmur').html(tanggal_lahir);

            //$('#NoTelp').html(this.pasien.noTelp);


            $('#tableInvoiceObat').find('tbody').empty();
            if (this.dataObat.length === 0) {
                let colspan = $('#tableInvoiceObat').find('thead tr th').length;
                $('#tableInvoiceObat').find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
            }
            $.each(this.dataObat, function(key, value) {
                $('#tableInvoiceObat').find('tbody').append(`<tr><td class="d-none" data-label="id">${value.id}</td><td class="text-center align-middle" data-label="jumlah">${value.jumlah}</td><td data-label="nama" class="text-left align-middle">${value.nama}</td><td class="text-right align-middle" data-label="harga"><input type="number" class="form-control form-control-sm text-right" value="${parseInt(value.harga)}" step="1"></td><td class="text-right align-middle" data-label="total">${rupiah(value.jumlah * parseInt(value.harga))}</td></tr>`);
            });

        };
        this.save = function() {
            return $.ajax({
                type: "POST",
                url: BASE_URL + "TransaksiObat/save",
                data: JSON.stringify(this),
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        }
    }
}

var pelangganObj = new Pelanggan({
    id: null,
    no_pelanggan: null,
    nama_pelanggan: null,
    tanggal_lahir: null,
    umur: null,
    jenis_kelamin: null,
    alamat: null,
    keterangan: null,
    no_telp: null
});

var transaksiObj;

(function($) {
    DataMasterBinding($);
    PelangganBinding($);
    TransaksiBinding($);
    ObatBinding($);
    ResepBinding($);
    initWizard($);
    actionWizard($);
})(jQuery);

function ObatBinding($) {
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
        let row_template = `<tr><td class="d-none" data-label="id">${arr.id}</td><td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1" max="${arr.stok}"></td><td data-label="nama" class="text-left align-middle">${arr.nama}</td><td class="d-none" data-label="harga">${arr.harga}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;

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

    $("#FormPelanggan").validate();
    $("#WizardForm").validate();

    $("#FormPelanggan").submit(function(event) {
        event.preventDefault();

        if ($("#FormPelanggan").valid()) {
            insert_pelanggan();
        }

    });

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
                if ($('#tableObat').find('td[data-label="empty_row"]').length > 0) {
                    bootbox.alert({
                        centerVertical: true,
                        message: "Tidak ada data obat!",
                        size: 'small'
                    });
                    return false;
                } else {
                    console.log('valid');
                    $active
                        .removeClass('active')
                        .addClass('done')
                        .next()
                        .removeClass('disabled')
                        .addClass('active').find('a[data-toggle="tab"]').click();
                }
                break;
            case 1:
                if (pelangganObj.id !== null) {
                    save_transaksi(0);
                    console.log('save');
                    $active
                        .removeClass('active')
                        .addClass('done')
                        .next()
                        .removeClass('disabled')
                        .addClass('active').find('a[data-toggle="tab"]').click();
                } else {
                    bootbox.confirm({
                        title: "Konfirmasi Pelanggan",
                        message: "Anda Yakin ?",
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
                                save_transaksi(0);
                                console.log('save');
                                $active
                                    .removeClass('active')
                                    .addClass('done')
                                    .next()
                                    .removeClass('disabled')
                                    .addClass('active').find('a[data-toggle="tab"]').click();
                            }
                        }
                    });
                }
                break;
        }

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
        $(this).closest('tr').find('td[data-label="total"]').html(rupiah(total));
        calculate();
    });

    $('#inputDiskon').on('keyup', function() {
        console.log($(this).val());
        calculate();
    });

    $('#inputPajak').on('keyup', function() {
        calculate();
    });

    $('#tableInvoiceTambahan').find('tbody').on("click", "td .btn-delete", function() {
        $(this).closest('tr').remove();
        if ($('#tableInvoiceTambahan').find('tbody tr').length == 0) {
            let colspan = $('#tableInvoiceTambahan').find('thead tr th').length;
            $('#tableInvoiceTambahan').find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
        }
        calculate();
    });


    $('#tableInvoiceTambahan').find('tbody').on('keyup', 'td[data-label="jumlah"] input', function() {
        let jumlah = $(this).val();
        if (jumlah === '') {
            $(this).val(1);
            jumlah = 1;
        }
        let harga = $(this).closest('tr').find('td[data-label="harga"] input').val();
        let total = parseInt(jumlah) * parseInt(harga);
        $(this).closest('tr').find('td[data-label="total"]').html(rupiah(total));
        calculate();
    });


    $('#tableInvoiceTambahan').find('tbody').on('keyup', 'td[data-label="harga"] input', function() {
        let harga = $(this).val();
        if (harga === '') {
            $(this).val(0);
            harga = 0;
        }
        let jumlah = $(this).closest('tr').find('td[data-label="jumlah"] input').val();
        let total = parseInt(jumlah) * parseInt(harga);
        $(this).closest('tr').find('td[data-label="total"]').html(rupiah(total));
        calculate();
    });


    $('#btnTambahan').on('click', function() {
        let jumlah = $('#inputJumlahTambahan').val();
        let nama = $('#inputNamaTambahan').val();
        let harga = $('#inputHargaTambahan').val();

        if (!nama) {
            bootbox.alert({
                centerVertical: true,
                message: "Isi nama tambahan!",
                size: 'small'
            });
            return false;
        }

        if (!harga) {
            bootbox.alert({
                centerVertical: true,
                message: "Isi harga tambahan!",
                size: 'small'
            });
            return false;
        }

        $('#inputJumlahTambahan').val(1);
        $('#inputJumlahTambahan').focus();
        $('#inputNamaTambahan').val('');
        $('#inputHargaTambahan').val('');
        if ($('#tableInvoiceTambahan').find('tbody tr td[data-label="empty_row"]').length > 0)
            $('#tableInvoiceTambahan').find('tbody').empty();

        $('#tableInvoiceTambahan').find('tbody').append(`<tr><td class="text-center align-middle" data-label="jumlah"><input type="number" class="form-control form-control-sm text-center" value="${jumlah}" step="1"></td><td class="text-left align-middle" data-label="nama">${nama}</td><td class="text-right align-middle" data-label="harga"><input type="number" class="form-control form-control-sm text-right" value="${parseInt(harga)}" step="1"></td><td class="text-right align-middle" data-label="total">${rupiah(parseInt(harga) * parseInt(jumlah))}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`);
        calculate();
    });

    $('#inputJumlahBayar').on('keyup', function() {
        var tot = 0; // variable to sore sum
        $('#tableCaraBayar').find('tbody input').each(function() { // iterate over inputs
            tot += parseInt($(this).val()) || 0; // parse and add value, if NaN then add 0
        });
        let jumlahBayar = $(this).val();
        let spanTotalTagihan = $('#spanTotalTagihan').html();
        var totalTagihan = clearRupiah(spanTotalTagihan);
        console.log(totalTagihan);
        $('#spanTotalBayar').html((rupiah(tot + parseInt(jumlahBayar))));
        $('#spanKembalian').html(rupiah((tot + parseInt(jumlahBayar)) - Number(totalTagihan)));
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
        var id = $('#inputId').val();
        if ((!id) || (id !== '0')) {
            let totalTagihan = clearRupiah($('#spanTotalTagihan').html());
            let $tableCaraBayar = $('#tableCaraBayar');
            let jBayar = fnTableToObject($tableCaraBayar);
            let totalBayar = jBayar.map(jBayar => parseInt(jBayar.harga)).reduce((harga, jBayar) => parseInt(jBayar) + parseInt(harga), 0);
            if (isNaN(totalBayar)) {
                totalBayar = 0;
            }

            if (totalBayar < totalTagihan) {
                bootbox.alert({
                    centerVertical: true,
                    message: "Pasien kurang bayar!",
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

    $('.btn-print').on('click', function(event) {
        event.preventDefault();
        var id = $('#inputId').val();
        if ((!id) || (id !== '0')) {
            window.open(BASE_URL + "ResepLuar/print/" + id, "_blank");
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
    let $tableTambahan = $('#tableInvoiceTambahan');
    let $tableCaraBayar = $('#tableCaraBayar');
    let keterangan = $('#inputKeterangan2').val();

    let noRegistrasi = $('#NoReg').html();
    let jObat = fnTableToObject($tableObat);
    let jTambahan = fnTableToObject($tableTambahan);
    let jBayar = fnTableToObject($tableCaraBayar);
    let subtotal = clearRupiah($('#spanSubtotal').html());
    let diskon = $('#inputDiskon').val();
    let totalDiskon = clearRupiah($('#spanDiskon').html());
    let pajak = $('#inputPajak').val();
    let totalPajak = clearRupiah($('#spanPajak').html());
    let totalTagihan = clearRupiah($('#spanTotalTagihan').html());
    let totalBayar = clearRupiah($('#spanTotalBayar').html());
    let kembalian = clearRupiah($('#spanKembalian').html());

    let data = {
        id: id,
        noRegistrasi: noRegistrasi,
        invoiceObat: jObat,
        invoiceTambahan: jTambahan,
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
        url: BASE_URL + "TransaksiObat/savePembayaran",
        data: JSON.stringify(data),
        dataType: 'json',
        contentType: 'application/json; charset=utf-8'
    });
    $.when(aSave).done(function(response) {
        console.log(response);

        if (response.status) {
            window.open(BASE_URL + "ResepLuar/print/" + id, "_blank");
            ToastEnd.fire({
                icon: 'success',
                title: 'Data berhasil disimpan'
            })
        } else
            console.log(response.message);

    });
}

function DataMasterBinding($) {
    $.getJSON(BASE_URL + 'RawatJalan/getDataMasterAjax', function(data) {
        bindCombo({
            $combo: $('#inputJenisKelamin'),
            dataSource: data.jenis_kelamin,
            dataTextField: 'text',
            dataValueField: 'value'
        });

        bindCombo({
            $combo: $('#formJenisKelamin'),
            dataSource: data.jenis_kelamin,
            dataTextField: 'text',
            dataValueField: 'value'
        });

        var $comboCaraBayar = $('#inputCaraBayar');
        $.each(data.cara_bayar, function(_key, cara_bayar) {
            $comboCaraBayar.append(`<option value="${cara_bayar.id}" data-akun="${cara_bayar.id_akun}">${cara_bayar.cara_bayar}</option>`);
        });
    });

    let templateObat = template `<tr><td class="d-none" data-label="id">${'id'}</td><td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1" max="${'stok'}"></td><td data-label="nama" class="text-left align-middle">${'nama'}</td><td class="d-none" data-label="harga">${'harga'}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;
    let autoCompleteObat = {
        $source: $('#inputObat'),
        $target: $('#tableObat'),
        appendTarget: templateObat,
        param: {},
        url: BASE_URL + 'RawatJalan/getObatAjax'
    };
    bindAutoComplete(autoCompleteObat);
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
                data.search = qry;

                $.ajax({
                    url: url,
                    method: "GET",
                    data: data,
                    async: true,
                    dataType: 'json'
                }).done(function(response) {
                    //console.log(response);
                    //callback(res);
                    callback($.map(response, function(item) {
                        const auto = { value: item["id"], text: item["nama"] }
                        const data = { data: item }
                        const result = {
                            ...auto,
                            ...data,
                        };
                        return result;
                    }))                    
                });
            }
        }
    });
    $source.on('autocomplete.select', function(evt, item) {
        evt.preventDefault();
        let temp = appendTarget(item.data);
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

function PelangganBinding($) {
    var $tablePelangganDT = $("#tablePelanggan").DataTable({
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
            url: BASE_URL + 'Pelanggan/getDataTable',
            type: "POST"
        },
        "columns": [
            { "data": null },
            { "data": 'no_pelanggan' },
            { "data": "nama_pelanggan" },
            { "data": "tanggal_lahir", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { "data": "umur" },
            { "data": "no_telp" },
            { "data": "jenis_kelamin_display" },
            { "data": "alamat" },
            { "data": "keterangan" },
            { "data": "jenis_kelamin" },
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
                defaultContent: '<button class="btn btn-info btn-sm mr-0 btn-pilih">Pilih</button>'
            }
        ],
    });

    $("#tablePelanggan tbody").on('click', 'button', function() {
        let data = $tablePelangganDT.row($(this).parents('tr')).data();
        let arr = {
            id: data['id'],
            no_pelanggan: data['no_pelanggan'],
            nama_pelanggan: data['nama_pelanggan'],
            tanggal_lahir: data['tanggal_lahir'],
            umur: data['umur'],
            jenis_kelamin: data['jenis_kelamin'],
            pekerjaan: data['pekerjaan'],
            alamat: data['alamat'],
            keterangan: data['keterangan'],
            no_telp: data['no_telp']
        };
        console.log(arr);
        pelangganObj = new Pelanggan(arr);
        pelangganObj.render();
        $('#modal-Pelanggan').modal('toggle');
    });

    // When modal window is shown
    $('#modal-Pelanggan').on('shown.bs.modal', function() {
        // Adjust column width and re-initialize Responsive extension
        requestAnimationFrame(() =>
            $("#tablePelanggan").DataTable()
            .ajax.reload(null, false)
            .columns.adjust()
            .responsive.recalc()
        );
    });
}

function ResepBinding($) {
    var $tableResepDT = $("#tableResepObat").DataTable({
        "responsive": {
            "details": {
                "renderer": function(api, rowIdx, columns) {
                    // Show hidden columns in row details
                    var data = $.map(columns, function(col, i) {
                        return col.hidden ?
                            '<tr><td>' + col.title + ':</td> ' +
                            '<td>' + col.data + '</td></tr>' :
                            '';
                    }).join('');

                    // Extra: Show "Name" in row details
                    //data += '<tr><td>Name:</td><td>' + api.cell(rowIdx, 0).data().nama_pelanggan + '</td></tr>';
                    // Generate a table
                    data = $('<table width="100%"/>').append(data).prop('outerHTML');

                    // Extra: Show custom content
                    data += `<div class="content-custom">${format(api.cell(rowIdx, 0).data())}</div>`;

                    return data;
                },
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
            url: BASE_URL + 'TransaksiObat/getResepDataTable',
            type: "POST"
        },
        "columns": [
            { "data": null },
            { "data": "nama_pelanggan" },
            { "data": 'no_pelanggan' },
            { "data": 'no_transaksi' },
            { "data": "tanggal_penyerahan_resep", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { "data": "keterangan" },
            { "data": "id" },
            { "data": "id_pelanggan" },
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
                className: 'control',
                orderable: false,
                targets: -1,
                data: null,
                defaultContent: ''
            },
            {
                targets: '_all',
                orderable: false
            },
            {
                targets: 0,
                data: null,
                defaultContent: '<button class="btn btn-info btn-sm mr-0 btn-pilih">Pilih</button>'
            }
        ],
    });

    $("#tableResepObat tbody").on('click', 'button', function() {
        let data = $tableResepDT.row($(this).parents('tr')).data();
        pelangganObj = new Pelanggan(data.pelanggan);
        pelangganObj.render();
        fillTableObat(data.dataObat);
        $('#modal-Resep').modal('toggle');
    });

    // When modal window is shown
    $('#modal-Resep').on('shown.bs.modal', function() {
        // Adjust column width and re-initialize Responsive extension
        requestAnimationFrame(() =>
            $("#tableResepObat").DataTable()
            .ajax.reload(null, false)
            .columns.adjust()
            .responsive.recalc()
        );
    });
}

function TransaksiBinding($) {
    var $tableTransaksiDT = $("#tableTransaksiObat").DataTable({
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
            url: BASE_URL + 'TransaksiObat/getDataTable',
            type: "POST"
        },
        "columns": [
            { "data": null },
            { "data": 'no_transaksi' },
            { "data": 'no_pelanggan' },
            { "data": "nama_pelanggan" },
            { "data": "tanggal_penyerahan_resep", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { "data": "keterangan" },
            { "data": "id" },
            { "data": "id_pelanggan" },
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
                defaultContent: '<button class="btn btn-info btn-sm mr-0 btn-pilih">Pilih</button>'
            }
        ],
    });

    $("#tableTransaksiObat tbody").on('click', 'button', function() {
        let data = $tableTransaksiDT.row($(this).parents('tr')).data();
        if (data.pelanggan !== null) {
            pelangganObj = new Pelanggan(data.pelanggan);
        } else {
            pelangganObj = new Pelanggan({
                id: null,
                no_pelanggan: null,
                nama_pelanggan: null,
                tanggal_lahir: null,
                umur: null,
                jenis_kelamin: null,
                alamat: null,
                keterangan: null,
                no_telp: null
            });
        }
        pelangganObj.render();
        transaksiObj = new Transaksi(data);
        transaksiObj.pelanggan = pelangganObj;
        transaksiObj.dataObat = data.dataObat;
        transaksiObj.render();
        console.log(data.dataObat);
        fillTableObat(data.dataObat);
        calculate();
        $('#modal-Transaksi').modal('toggle');
    });

    // When modal window is shown
    $('#modal-Transaksi').on('shown.bs.modal', function() {
        // Adjust column width and re-initialize Responsive extension
        requestAnimationFrame(() =>
            $("#tableTransaksiObat").DataTable()
            .ajax.reload(null, false)
            .columns.adjust()
            .responsive.recalc()
        );
    });
}

function insert_pelanggan() {
    pelangganObj = new Pelanggan({
        id: $('#formIdPelanggan').val(),
        no_pelanggan: '',
        nama_pelanggan: $('#formNamaPelanggan').val(),
        tanggal_lahir: $('#formTanggalLahir').val(),
        umur: $('#formUmur').val(),
        jenis_kelamin: $('#formJenisKelamin').val(),
        alamat: $('#formAlamat').val(),
        keterangan: $('#formKeterangan').val(),
        no_telp: $('#formNoTelp').val()
    });

    $.when(pelangganObj.save()).done(function(response) {
        if (response.status) {
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil disimpan'
            })
            pelangganObj = new Pelanggan(response.data);
            pelangganObj.render();
            $('#formIdPelanggan').val(0);
            $('#modal-formPelanggan').modal('toggle');
            $("#FormPelanggan")[0].reset();
        } else
            console.log(response.message);
    });
}

function save_transaksi(stateIndex) {
    transaksiObj = new Transaksi({
        id: $('#inputId').val(),
        no_transaksi: $('#inputNoTransaksi').val(),
        tanggal_penyerahan_resep: $('#inputTanggalPenyerahanResep').val(),
        keterangan: $('#inputKeterangan').val(),
        state_index: stateIndex
    });
    transaksiObj.pelanggan = pelangganObj;
    let dataObat = fnTableToObject($('#tableObat'));
    transaksiObj.dataObat = dataObat;

    $.when(transaksiObj.save()).done(function(response) {
        if (response.status) {
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil disimpan'
            })
            transaksiObj = new Transaksi(response.data);
            transaksiObj.pelanggan = pelangganObj;
            transaksiObj.dataObat = dataObat;
            //console.log(transaksiObj);       
            //transaksiObj.updateValue(response.data.id);           
            transaksiObj.render();
            calculate();
        } else
            console.log(response.message);

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

function calculate() {

    let $tableObat = $('#tableInvoiceObat');
    let $tableTambahan = $('#tableInvoiceTambahan');
    let $tableCaraBayar = $('#tableCaraBayar');


    let jObat = fnTableToObject($tableObat);
    let jTambahan = fnTableToObject($tableTambahan);
    let jBayar = fnTableToObject($tableCaraBayar);


    let totalObat = jObat.map(jObat => parseInt(jObat.jumlah) * parseInt(jObat.harga)).reduce((total, jObat) => parseInt(jObat) + parseInt(total), 0);
    if (isNaN(totalObat)) {
        totalObat = 0;
    }

    let totalTambahan = jTambahan.map(jTambahan => parseInt(jTambahan.harga) * parseInt(jTambahan.jumlah)).reduce((total, jTambahan) => parseInt(jTambahan) + parseInt(total), 0);
    if (isNaN(totalTambahan)) {
        totalTambahan = 0;
    }

    let totalBayar = jBayar.map(jBayar => parseInt(jBayar.harga)).reduce((harga, jBayar) => parseInt(jBayar) + parseInt(harga), 0);
    if (isNaN(totalBayar)) {
        totalBayar = 0;
    }


    let subTotal = totalObat + totalTambahan;

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
    let pajak = Math.round(($inputPajak.val() * subTotal) / 100);
    $spanPajak.html(rupiah(pajak));

    let $spanTotalTagihan = $('#spanTotalTagihan');
    let total = subTotal - diskon + pajak;
    $spanTotalTagihan.html(rupiah(total));

    let $spanTotalBayar = $('#spanTotalBayar');
    $spanTotalBayar.html(rupiah(totalBayar));

    let $spanKembalian = $('#spanKembalian');
    $spanKembalian.html(rupiah(totalBayar - total));

}

function fillTableObat(data) {
    let $tableObat = $('#tableObat');
    $tableObat.find('tbody').empty();
    if (data.length === 0) {
        let colspan = $tableObat.find('thead tr th').length;
        $tableObat.find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
    }
    $.each(data, function(key, value) {
        let row_template = `<tr><td class="d-none" data-label="id">${value.id}</td><td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="${value.jumlah}" step="1"></td><td data-label="nama" class="text-left align-middle">${value.nama}</td><td class="d-none" data-label="harga">${value.harga}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;
        $tableObat.find('tbody').append(row_template);
    });
}

function format(d) {
    var tableObat = '<td colspan="4" class="text-center" data-label="empty_row">Tidak ada data</td>';
    if (d.dataObat.length > 0) {
        tableObat = '';
        $.each(d.dataObat, function(index, row) {
            tableObat += `<tr class="table-light">
                                <td class="text-center align-middle" style="width:10%;">${row.jumlah}</d>
                                <td class="text-left align-middle">${row.nama}</d>
                                <td class="text-right align-middle">${rupiah(row.harga)}</d>
                                <td class="text-right align-middle">${rupiah(row.jumlah * row.harga)}</d>
                            </tr>`
        });
    }
    // `d` is the original data object for the row
    return `<div class="row">
        <div class="col-sm-12">
            <label for="tableInvoiceObat">Rincian Obat</label>
            <div class="table-responsive-sm">
                <table class="table table-sm">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center align-middle" style="width:10%;">Jumlah</th>
                            <th class="text-left align-middle">Nama Obat</th>
                            <th class="text-right align-middle" style="width:20%;">Harga</th>
                            <th class="text-right align-middle" style="width:20%;">Total</th>
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