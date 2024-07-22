(function($) {
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

    $("#FormPasien").validate({
        rules: {
            no_rm: {
                remote: {
                    url: 'Pasien/checkNoRM',
                    type: "post",
                    async: false
                }
            },
        },
        messages: {
            no_rm: { remote: "No RM sudah terdaftar" },
        },
        onkeyup: false,
        onfocusout: function(element) {
            // "eager" validation
            this.element(element);
        },

        errorElement: 'span',
        errorPlacement: function(error, element) {
            //if(element.is($('#formEmail')) && (error.text() === "Email sudah terdaftar")){
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
            //}
        }
    });
    $("#WizardForm").validate();

    $('#formKTP').on('blur', function() {
        console.log($(this).val());
        SpinnerOn();
        $.when(fetchIhsPasien($(this).val())).done(function(response) {

            console.log(response.data);
            $('#formNamaPasien').val(response.data.name);
            $('#formJenisKelamin').val((response.data.gender == 'male' ? 'L' : 'P'));
            $('#formIHS_ID').val(response.data.id);
            SpinnerOff();
        });
    });

    $("#FormPasien").submit(function(event) {
        event.preventDefault();

        if ($("#FormPasien").valid()) {
            insert_pasien();
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
        let jenis_pemeriksaan;
        switch (click_index) {
            case 0:
                save_pasien();
                if ($('#inputTanggalPeriksa').val() == '') $('#inputTanggalPeriksa').val(TODAY);
                break;
            case 1:
                if ($('#inputTanggalPemeriksaan').val() == '') $('#inputTanggalPemeriksaan').val(TODAY);
                if ($('#inputTanggalKunjunganSelanjutnya').val() == '') $('#inputTanggalKunjunganSelanjutnya').val(TODAY);
                save_pendaftaran(0);
                break;
            case 2:
                if ($('#inputTanggalPenyerahanResep').val() == '') $('#inputTanggalPenyerahanResep').val(TODAY);
                save_pendaftaran(1);
                jenis_pemeriksaan = $('#inputJenisPemeriksaan').val();

                if (jenis_pemeriksaan === 'Paket Layanan') {
                    let id_paket = $('#inputJenisPaket').val();
                    let harga_paket = $('#inputJenisPaket').find(':selected').data('harga');
                    let stok_opname = $('#inputJenisPaket').find(':selected').data('stok');
                    let nama_paket = $('#inputJenisPaket').find(':selected').text();

                    let row_template = `<tr>
                    <td class="d-none" data-label="id">${id_paket}</td>
                    <td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1" max="${stok_opname}"></td>
                    <td data-label="nama" class="text-left align-middle">${nama_paket}</td>
                    <td data-label="harga" class="d-none">${harga_paket}</td>        
                    <td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td>
                    </tr>`;

                    let $table = $('#tableObat');
                    $table.find('tbody').empty();
                    $table.find('tbody').append(row_template);
                    $("#span-invoice-obat").removeAttr("style").show();
                    $("#form-group-obat-tambahan").removeAttr("style").show();
                    $("#rincian_obat_tambahan").removeAttr("style").show();
                }
                break;
            case 3:

                //let $tableObat = $('#tableObat tbody tr:first-child .input-jumlah');
                //console.log($tableObat.val());
                //console.log($tableObat.attr('max'));

                let jumlah_paket = $('#inputJumlahPaket').val();
                let sisa_paket = $('#inputSisaPaket').val();
                jenis_pemeriksaan = $('#inputJenisPemeriksaan').val();
                let id_reference = $('#inputIdReference').val();

                if (sisa_paket === '')
                    sisa_paket = jumlah_paket;

                console.log(sisa_paket);

                if (jenis_pemeriksaan === 'Paket Layanan') {
                    let jumlah_terpakai = $('#tableObat tbody tr:first-child .input-jumlah').val();
                    let stok_opname = $('#tableObat tbody tr:first-child .input-jumlah').attr('max');

                    if (jumlah_terpakai > sisa_paket) {
                        bootbox.alert({
                            centerVertical: true,
                            message: `Jumlah order tidak boleh lebih dari paket! Sisa paket ${sisa_paket}`,
                            size: 'small'
                        });
                        return false;
                    }

                    if (jumlah_terpakai < 1) {
                        bootbox.alert({
                            centerVertical: true,
                            message: 'Jumlah order minimal 1',
                            size: 'small'
                        });
                        return false;
                    }
                    if (stok_opname < jumlah_terpakai) {
                        bootbox.alert({
                            centerVertical: true,
                            message: 'Stok Opname kurang !',
                            size: 'small'
                        });
                        return false;
                    }

                    if (jenis_pemeriksaan === 'Paket Layanan' && id_reference === '') {
                        console.log('true');
                        $("#rincian_obat").removeAttr("style").hide();
                        $("#rincian_paket").removeAttr("style").show();
                    } else {
                        $("#rincian_obat").removeAttr("style").show();
                        $("#rincian_paket").removeAttr("style").hide();
                    }

                    if (id_reference !== '') {
                        //$("#inputCaraBayar option[data-akun='211']").attr('selected', true);
                        //$("#inputCaraBayar").attr('disabled', false);
                    }
                }

                save_pendaftaran(2);
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

    $('#tableInvoiceLayanan').find('tbody').on('blur', 'td[data-label="harga"] input', function() {
        let harga = $(this).val();
        let jumlah = $(this).closest('tr').find('td[data-label="jumlah"]').html();
        let total = parseInt(jumlah) * parseInt(harga);
        $(this).closest('tr').find('td[data-label="total"]').html(rupiah(total));
        calculate();
    });

    $('#tableInvoiceObat').find('tbody').on('blur', 'td[data-label="harga"] input', function() {
        let harga = $(this).val();
        let jumlah = $(this).closest('tr').find('td[data-label="jumlah"]').html();
        let total = parseInt(jumlah) * parseInt(harga);
        $(this).closest('tr').find('td[data-label="total"]').html(rupiah(total));
        calculate();
    });

    $('#tableInvoiceObatTambahan').find('tbody').on('blur', 'td[data-label="harga"] input', function() {
        console.log("test");
        let harga = $(this).val();
        let jumlah = $(this).closest('tr').find('td[data-label="jumlah"]').html();
        let total = parseInt(jumlah) * parseInt(harga);
        $(this).closest('tr').find('td[data-label="total"]').html(rupiah(total));
        calculate();
    });

    $('#inputDiskon').on('blur', function() {
        console.log($(this).val());
        calculate();
    });

    $('#inputPajak').on('blur', function() {
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


    $('#tableInvoiceTambahan').find('tbody').on('blur', 'td[data-label="jumlah"] input', function() {
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


    $('#tableInvoiceTambahan').find('tbody').on('blur', 'td[data-label="harga"] input', function() {
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

        $('#tableInvoiceTambahan').find('tbody').append(`<tr><td class="text-center align-middle" data-label="jumlah"><input type="number" class="form-control form-control-sm text-center" value="${jumlah}" step="1" min="1"></td><td class="text-left align-middle" data-label="nama">${nama}</td><td class="text-right align-middle" data-label="harga"><input type="number" class="form-control form-control-sm text-right" value="${parseInt(harga)}" step="1" min="0"></td><td class="text-right align-middle" data-label="total">${rupiah(parseInt(harga) * parseInt(jumlah))}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`);
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

    $('#tableCaraBayar').find('tbody').on('blur', 'td[data-label="harga"] input', function() {
        let harga = $(this).val();
        calculate();
    });

    $('#btnPembayaran').on('click', function() {
        var $btn = $(this);
        var id = $('#inputIdRegistrasi').val();
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

    $('.btn-cari-obat-tambahan').on('click', function() {
        $('#modal-obat-tambahan').modal('toggle');
    });

    $('.btn-print').on('click', function(event) {
        event.preventDefault();
        var id = $('#inputIdRegistrasi').val();
        if ((!id) || (id !== '0')) {
            window.open(BASE_URL + "RawatJalan/print/" + id, "_blank");
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
    let $tableInvoiceLayanan = $('#tableInvoiceLayanan');
    let $tableObat = $('#tableInvoiceObat');
    let $tablePaket = $('#tableInvoicePaket');
    let $tableObatTambahan = $('#tableInvoiceObatTambahan');
    let $tableTambahan = $('#tableInvoiceTambahan');
    let $tableCaraBayar = $('#tableCaraBayar');
    let keterangan = $('#inputKeterangan4').val();
    let noRegistrasi = $('#NoReg').html();
    let jLayanan = fnTableToObject($tableInvoiceLayanan);
    let jObat = fnTableToObject($tableObat);
    let jPaket = fnTableToObject($tablePaket);
    let jObatTambahan = fnTableToObject($tableObatTambahan);
    let jTambahan = fnTableToObject($tableTambahan);
    let jBayar = fnTableToObject($tableCaraBayar);
    let subtotal = clearRupiah($('#spanSubtotal').html());
    let diskon = clearRupiah($('#inputDiskon').val());
    let totalDiskon = clearRupiah($('#spanDiskon').html());
    let pajak = clearRupiah($('#inputPajak').val());
    let totalPajak = clearRupiah($('#spanPajak').html());
    let totalTagihan = clearRupiah($('#spanTotalTagihan').html());
    let totalBayar = clearRupiah($('#spanTotalBayar').html());
    let kembalian = clearRupiah($('#spanKembalian').html());

    let data = {
        id: id,
        noRegistrasi: noRegistrasi,
        invoiceLayanan: jLayanan,
        invoiceObat: jObat,
        invoicePaket: jPaket,
        invoiceObatTambahan: jObatTambahan,
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
        url: BASE_URL + "Registrasi/savePembayaran",
        data: JSON.stringify(data),
        dataType: 'json',
        contentType: 'application/json; charset=utf-8'
    });

    $.when(aSave).done(function(response) {
        if (response.status) {
            console.log(response);

            window.open(BASE_URL + "RawatJalan/print/" + id, "_blank");
            ToastEnd.fire({
                icon: 'success',
                title: 'Data berhasil disimpan'
            });
        } else {
            if (response.error_code == -1) {
                ToastEnd.fire({
                    icon: 'info',
                    title: response.message,
                    timer: 3000
                });
            } else if (response.error_code == -2) {
                ToastEnd.fire({
                    icon: 'warning',
                    title: response.message
                });
            } else {
                ToastEnd.fire({
                    icon: 'error',
                    title: response.message
                });
            }
        }
    });
}

function calculate() {
    //let id_reference = $('#inputIdReference').val();
    //let jenis_pemeriksaan = $('#inputJenisPemeriksaan').val();

    console.log({ 'id_reference': pendaftaranObj.idReference, 'jenis_pemeriksaan': pendaftaranObj.jenisPemeriksaan });

    //let $tableInvoiceLayanan = $('#tableInvoiceLayanan');
    let $tableObat = $('#tableInvoiceObat');
    let $tablePaket = $('#tableInvoicePaket');
    let $tableObatTambahan = $('#tableInvoiceObatTambahan');

    let $tableTambahan = $('#tableInvoiceTambahan');
    let $tableCaraBayar = $('#tableCaraBayar');


    //let jLayanan = fnTableToObject($tableInvoiceLayanan);
    const jLayanan = pendaftaranObj.dataLayanan;

    let jObat = fnTableToObject($tableObat);
    let jObatTambahan = fnTableToObject($tableObatTambahan);
    let jPaket = fnTableToObject($tablePaket);

    let jTambahan = fnTableToObject($tableTambahan);
    let jBayar = fnTableToObject($tableCaraBayar);

    let totalLayanan = jLayanan.map(jLayanan => parseInt(jLayanan.harga) * parseInt(jLayanan.jumlah)).reduce((total, jLayanan) => parseInt(jLayanan) + parseInt(total), 0);
    if (isNaN(totalLayanan)) {
        totalLayanan = 0;
    }
    debugger;

    let totalObat = jObat.map(jObat => parseInt(jObat.harga) * parseInt(jObat.jumlah)).reduce((total, jObat) => parseInt(jObat) + parseInt(total), 0);
    if (isNaN(totalObat)) {
        totalObat = 0;
    }

    let totalObatTambahan = jObatTambahan.map(jObatTambahan => parseInt(jObatTambahan.harga) * parseInt(jObatTambahan.jumlah)).reduce((total, jObatTambahan) => parseInt(jObatTambahan) + parseInt(total), 0);
    if (isNaN(totalObatTambahan)) {
        totalObatTambahan = 0;
    }

    let totalPaket = jPaket.map(jPaket => parseInt(jPaket.harga) * parseInt(jPaket.jumlah)).reduce((total, jPaket) => parseInt(jPaket) + parseInt(total), 0);
    if (isNaN(totalPaket)) {
        totalPaket = 0;
    }

    //console.log(totalPaket);

    let totalTambahan = jTambahan.map(jTambahan => parseInt(jTambahan.harga) * parseInt(jTambahan.jumlah)).reduce((total, jTambahan) => parseInt(jTambahan) + parseInt(total), 0);
    if (isNaN(totalTambahan)) {
        totalTambahan = 0;
    }

    let totalBayar = jBayar.map(jBayar => parseInt(jBayar.harga)).reduce((harga, jBayar) => parseInt(jBayar) + parseInt(harga), 0);
    if (isNaN(totalBayar)) {
        totalBayar = 0;
    }


    let subTotal = 0;

    if (pendaftaranObj.jenisPemeriksaan === 'Paket Layanan' && pendaftaranObj.idReference === '')
        subTotal = totalLayanan + totalPaket + totalObatTambahan + totalTambahan;
    else if (pendaftaranObj.idReference)
        subTotal = totalLayanan + 0 + totalObatTambahan + totalTambahan;
    else
        subTotal = totalLayanan + totalObat + totalObatTambahan + totalTambahan;

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