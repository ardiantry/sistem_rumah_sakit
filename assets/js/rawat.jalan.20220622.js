class Pasien {
    constructor({
        id,
        no_rm,
        nama_pasien,
        tempat_lahir,
        tanggal_lahir,
        no_telp,
        agama,
        golongan_darah,
        jenis_kelamin,
        pekerjaan,
        alamat,
        keterangan,
        jenis_kelamin_display,
        pekerjaan_display
    }) {
        this.id = id;
        this.noRm = no_rm;
        this.namaPasien = nama_pasien;
        this.tempatLahir = tempat_lahir;
        this.tanggalLahir = tanggal_lahir;
        this.noTelp = no_telp;
        this.agama = agama;
        this.golonganDarah = golongan_darah;
        this.jenisKelamin = jenis_kelamin;
        this.pekerjaan = pekerjaan;
        this.alamat = alamat;
        this.keterangan = keterangan;
        this.jenisKelaminDisplay = jenis_kelamin_display;
        this.pekerjaanDisplay = pekerjaan_display;

        this.updateValue = function(id, no_rm) {
            this.id = id;
            this.noRm = no_rm
        };
        this.render = function() {
            let noRmNama = `${this.noRm}-${this.namaPasien}`;
            $('#inputNoRM').val(this.noRm);
            $('#inputNamaPasien').val(this.namaPasien);
            $('#inputNoRMNama').val(noRmNama);
            $('#inputTempatLahir').val(this.tempatLahir);
            $('#inputTanggalLahir').val(moment(this.tanggalLahir).format('DD/MM/YYYY'));
            $('#inputNoTelp').val(this.noTelp);
            $('#inputAgama').val(this.agama);
            $('#inputGolonganDarah').val(this.golonganDarah);
            $('#inputJenisKelamin').val(this.jenisKelamin);
            $('#inputPekerjaan').val(this.pekerjaan);
            $('#inputAlamat').val(this.alamat);
            $('#inputKeterangan').val(this.keterangan);
            $('#inputIdPasien').val(this.id);
        };
        this.save = function() {
            return $.ajax({
                type: "POST",
                url: BASE_URL + "Pasien/save",
                data: JSON.stringify(this),
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        }
        this.dataBind = function() {
            return $.ajax({
                type: "POST",
                url: BASE_URL + 'Pasien/getById',
                data: JSON.stringify({ id: this.id }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        }
    }
}


class Pendaftaran {
    constructor({
        id,
        no_registrasi,
        tanggal_periksa,
        id_unit_layanan,
        id_dokter,
        id_tipe_pasien,
        keterangan1,
        tanggal_pemeriksaan,
        diagnosa,
        keterangan2,
        tanggal_penyerahan_resep,
        keterangan3,
        state_index,
        jenis_pemeriksaan,
        tanggal_kunjungan_selanjutnya,
        tujuan_kunjungan_selanjutnya,
        jumlah_paket,
        id_paket,
        sisa_paket,
        total_stok_opname,
        id_reference
    } = {}) {
        this.id = id;
        this.noRegistrasi = no_registrasi;
        this.tanggalPeriksa = tanggal_periksa;
        this.idUnitLayanan = id_unit_layanan;
        this.idDokter = id_dokter;
        this.idTipePasien = id_tipe_pasien;
        this.keterangan1 = keterangan1;
        this.tanggalPemeriksaan = tanggal_pemeriksaan;
        this.diagnosa = diagnosa;
        this.keterangan2 = keterangan2;
        this.tanggalPenyerahanResep = tanggal_penyerahan_resep;
        this.keterangan3 = keterangan3;
        this.stateIndex = state_index;
        this.jenisPemeriksaan = jenis_pemeriksaan;
        this.tanggalKunjunganSelanjutnya = tanggal_kunjungan_selanjutnya;
        this.tujuanKunjunganSelanjutnya = tujuan_kunjungan_selanjutnya;
        this.jumlahPaket = jumlah_paket;
        this.idPaket = id_paket;
        this.sisaPaket = sisa_paket;
        this.totalStokOpname = total_stok_opname;
        this.idReference = id_reference;
        this.pasien = {};
        this.dataLayanan = {};
        this.dataIcd9 = {};
        this.dataIcd10 = {};
        this.dataObat = {};
        this.dataObatTambahan = {};
        this.dataRencanaKontrol = {};
        this.updateValue = function(id, no_registrasi) {
            this.id = id;
            this.noRegistrasi = no_registrasi
        };
        this.render = function() {
            let id_dokter = this.idDokter;
            let noRegistrasiDisplay = `${this.noRegistrasi}-${this.pasien.namaPasien}(${this.pasien.noRm})`;
            let jumlah_paket = this.jumlahPaket;
            let jenis_pemeriksaan = this.jenisPemeriksaan;
            let id_reference = this.idReference;
            $('#inputIdRegistrasi').val(this.id);
            $('#inputNoReg').val(this.noRegistrasi);
            $('#inputTanggalPeriksa').val(this.tanggalPeriksa);
            $('#inputUnitLayanan').val(this.idUnitLayanan);
            $('#inputUnitLayanan').trigger('change');
            /*
                        $.when($('#inputUnitLayanan').trigger('change')).done(function() {
                            console.log(id_dokter);
                            $('#inputDokterUnitLayanan').val(id_dokter);
                        });
            */
            $('#inputTipePasien').val(this.idTipePasien);
            $('#inputKeterangan1').val(this.keterangan1);
            $('#inputJenisPemeriksaan').val(this.jenisPemeriksaan);
            $('#inputJenisPemeriksaan').trigger('change');
            $('#inputTanggalKunjunganSelanjutnya').val(this.tanggalKunjunganSelanjutnya);
            $('#inputTujuanKunjunganSelanjutnya').val(this.tujuanKunjunganSelanjutnya);
            $('#inputJumlahPaket').val(this.jumlahPaket);
            $('#inputJenisPaket').val(this.idPaket);
            $('#inputSisaPaket').val(this.sisaPaket);
            $('#inputIdReference').val(this.idReference);
            $('#inputDiagnosa').val(this.diagnosa);
            $('#inputKeterangan2').val(this.keterangan2);
            $('#inputTanggalPenyerahanResep').val(this.tanggalPenyerahanResep);
            $('#inputKeterangan3').val(this.keterangan3);
            $('#inputNoReg1').val(noRegistrasiDisplay);
            $('#inputNoReg2').val(noRegistrasiDisplay);

            $('#NoReg').html(this.noRegistrasi);
            $('#TglNota').html(TODAY);
            $('#NoRM').html(this.pasien.noRm);
            $('#NamaPasien').html(this.pasien.namaPasien);
            $('#NoTelp').html(this.pasien.noTelp);

            $('#tableInvoiceLayanan').find('tbody').empty();
            if (this.dataLayanan.length === 0) {
                let colspan = $('#tableInvoiceLayanan').find('thead tr th').length;
                $('#tableInvoiceLayanan').find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
            }
            $.each(this.dataLayanan, function(key, value) {
                $('#tableInvoiceLayanan').find('tbody').append(`<tr><td class="d-none" data-label="id">${value.id}</td><td class="text-center align-middle" data-label="jumlah">${value.jumlah}</td><td data-label="nama" class="text-left align-middle">${value.nama}</td><td class="text-right align-middle" data-label="harga"><input type="number" class="form-control form-control-sm text-right" value="${parseInt(value.harga)}" step="1"></td><td class="text-right align-middle" data-label="total">${rupiah(value.jumlah * parseInt(value.harga))}</td></tr>`);
            });

            $('#tableInvoiceObat').find('tbody').empty();
            $('#tableInvoicePaket').find('tbody').empty();

            if (this.dataObat.length === 0) {
                let colspan = $('#tableInvoiceObat').find('thead tr th').length;
                $('#tableInvoiceObat').find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
                $('#tableInvoicePaket').find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
            }

            $.each(this.dataObat, function(key, value) {

                if (jenis_pemeriksaan === 'Paket Layanan') {
                    if (id_reference) {
                        //$('#tableInvoiceObat').find('tbody').append(`<tr><td class="d-none" data-label="id">${value.id}</td><td class="text-center align-middle" data-label="jumlah">${value.jumlah}</td><td data-label="nama" class="text-left align-middle">${value.nama}</td><td class="text-right align-middle" data-label="harga"><input type="number" class="form-control form-control-sm text-right" value="0" step="1" disabled></td><td class="text-right align-middle" data-label="total">${rupiah(0)}</td></tr>`);
                        $('#tableInvoiceObat').find('tbody').append(`
                        <tr>
                            <td class="d-none" data-label="id">${value.id}</td>
                            <td class="text-center align-middle" data-label="jumlah">${value.jumlah}</td>
                            <td data-label="nama" class="text-left align-middle">${value.nama}</td>
                            <td class="text-right align-middle" data-label="harga_tampil"><input type="number" class="form-control form-control-sm text-right" value="0" step="1" disabled></td>                            
                            <td class="text-right align-middle d-none" data-label="harga"><input type="number" class="form-control form-control-sm text-right" value="${parseInt(value.harga)}" step="1"></td>
                            <td class="text-right align-middle" data-label="total_tampil">${rupiah(0)}</td>
                            <td class="text-right align-middle d-none" data-label="total">${rupiah(value.jumlah * parseInt(value.harga))}</td>                            
                        </tr>`);
                    } else {
                        $('#tableInvoiceObat').find('tbody').append(`<tr><td class="d-none" data-label="id">${value.id}</td><td class="text-center align-middle" data-label="jumlah">${value.jumlah}</td><td data-label="nama" class="text-left align-middle">${value.nama}</td><td class="text-right align-middle" data-label="harga"><input type="number" class="form-control form-control-sm text-right" value="${parseInt(value.harga)}" step="1"></td><td class="text-right align-middle" data-label="total">${rupiah(value.jumlah * parseInt(value.harga))}</td></tr>`);
                    }
                } else {
                    $('#tableInvoiceObat').find('tbody').append(`<tr><td class="d-none" data-label="id">${value.id}</td><td class="text-center align-middle" data-label="jumlah">${value.jumlah}</td><td data-label="nama" class="text-left align-middle">${value.nama}</td><td class="text-right align-middle" data-label="harga"><input type="number" class="form-control form-control-sm text-right" value="${parseInt(value.harga)}" step="1"></td><td class="text-right align-middle" data-label="total">${rupiah(value.jumlah * parseInt(value.harga))}</td></tr>`);
                }
                $('#tableInvoicePaket').find('tbody').append(`<tr><td class="d-none" data-label="id">${value.id}</td><td class="text-center align-middle" data-label="jumlah">${jumlah_paket}</td><td data-label="nama" class="text-left align-middle">${value.nama}</td><td class="text-right align-middle" data-label="harga"><input type="number" class="form-control form-control-sm text-right" value="${parseInt(value.harga)}" step="1"></td><td class="text-right align-middle" data-label="total">${rupiah(jumlah_paket * parseInt(value.harga))}</td></tr>`);
            });

            $('#tableInvoiceObatTambahan').find('tbody').empty();
            if (this.dataObatTambahan.length === 0) {
                let colspan = $('#tableInvoiceObatTambahan').find('thead tr th').length;
                $('#tableInvoiceObatTambahan').find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
            }
            $.each(this.dataObatTambahan, function(key, value) {
                $('#tableInvoiceObatTambahan').find('tbody').append(`<tr><td class="d-none" data-label="id">${value.id}</td><td class="text-center align-middle" data-label="jumlah">${value.jumlah}</td><td data-label="nama" class="text-left align-middle">${value.nama}</td><td class="text-right align-middle" data-label="harga"><input type="number" class="form-control form-control-sm text-right" value="${parseInt(value.harga)}" step="1"></td><td class="text-right align-middle" data-label="total">${rupiah(value.jumlah * parseInt(value.harga))}</td></tr>`);
            });

            //console.log(this.idReference);

            if (this.jenisPemeriksaan === 'Umum') {
                $("#form-group-tanggal-kunjungan-selanjutnya").removeAttr("style").hide();
                $("#form-group-tujuan-kunjungan-selanjutnya").removeAttr("style").hide();
                $("#form-group-jumlah-paket").removeAttr("style").hide();
                $("#form-group-jenis-paket").removeAttr("style").hide();
                $("#form-group-obat-tambahan").removeAttr("style").hide();

                $("#inputRincianObat").removeAttr("style").show();
                $("#tableObat tbody tr td .btn-delete").removeAttr("style").show();                
                $('#inputJenisPemeriksaan').prop('disabled', false);
                $('#inputJumlahPaket').prop('disabled', false);
                $('#inputJenisPaket').prop('disabled', false);
                $("#inputCaraBayar").attr('disabled', false);
                $("#inputCaraBayar option[data-akun='211']").attr('selected', false);
                $("#spanRincianObatPaket").removeAttr("style").hide();
                $("#spanRincianObatUmum").removeAttr("style").show();
                $("#span-invoice-obat").removeAttr("style").hide();
                $("#rincian_obat_tambahan").removeAttr("style").hide();
            } else {
                $("#form-group-tanggal-kunjungan-selanjutnya").removeAttr("style").show();
                $("#form-group-tujuan-kunjungan-selanjutnya").removeAttr("style").show();
                $("#form-group-jumlah-paket").removeAttr("style").show();
                $("#form-group-jenis-paket").removeAttr("style").show();
                $("#form-group-obat-tambahan").removeAttr("style").show();

                $("#inputRincianObat").removeAttr("style").hide();
                $("#tableObat tbody tr td .btn-delete").removeAttr("style").hide();

                $('#inputJenisPemeriksaan').prop('disabled', false);
                $('#inputJumlahPaket').prop('disabled', false);
                $('#inputJenisPaket').prop('disabled', false);
                $("#inputCaraBayar").attr('disabled', false);
                $("#inputCaraBayar option[data-akun='211']").attr('selected', false);
                $("#spanRincianObatPaket").removeAttr("style").show();
                $("#spanRincianObatUmum").removeAttr("style").hide();
                $("#span-invoice-obat").removeAttr("style").show();
                $("#rincian_obat_tambahan").removeAttr("style").show();


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

                $("#inputRincianObat").removeAttr("style").hide();
                $("#tableObat tbody tr td .btn-delete").removeAttr("style").hide();
                if (this.idReference) {
                    if (this.sisaPaket == 1) {
                        $("#form-group-tanggal-kunjungan-selanjutnya").removeAttr("style").hide();
                        $("#form-group-tujuan-kunjungan-selanjutnya").removeAttr("style").hide();
                        //$("#form-group-jumlah-paket").removeAttr("style").hide();
                    }

                    $('#inputJenisPemeriksaan').prop('disabled', true);
                    $('#inputJumlahPaket').prop('disabled', true);
                    $('#inputJenisPaket').prop('disabled', true);


                    //$("#inputCaraBayar option[data-akun='211']").attr('selected', true);
                    //let id_cara_bayar = $('#inputCaraBayar').val();
                    //let caraBayar = $("#inputCaraBayar option:selected").text();
                    //let akun = $('#inputCaraBayar').children("option:selected").data("akun");
                    //let jumlahBayar = $('#inputJumlahBayar').val();
                    //let $tableObat = $('#tableInvoiceObat');
                    //let jObat = fnTableToObject($tableObat);
                    //let totalObat = jObat.map(jObat => parseInt(jObat.harga) * parseInt(jObat.jumlah)).reduce((total, jObat) => parseInt(jObat) + parseInt(total), 0);
                    //if (isNaN(totalObat)) {
                    //totalObat = 0;
                    //}
                    //let jumlahBayar = totalObat;

                    $("#inputCaraBayar").attr('disabled', false);
                    //$('#tableCaraBayar').find('tbody').empty();
                    //$('#tableCaraBayar').find('tbody').append(`<tr><td class="text-left align-middle d-none" data-label="id">${id_cara_bayar}</td><td class="text-left align-middle" data-label="nama">${caraBayar}</td><td class="text-right align-middle" data-label="harga"><input type="number" class="input-jumlah form-control form-control-sm text-right" value="${parseInt(jumlahBayar)}" step="1" disabled></td><td class="d-none" data-label="akun">${akun}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm d-none"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`);
                }
            }

            if (this.jenisPemeriksaan === 'Paket Layanan' && (!this.idReference)) {
                $("#rincian_obat").removeAttr("style").hide();
                $("#rincian_paket").removeAttr("style").show();
            } else {
                $("#rincian_obat").removeAttr("style").show();
                $("#rincian_paket").removeAttr("style").hide();
            }


        };
        this.save = function() {
            return $.ajax({
                type: "POST",
                url: BASE_URL + "Registrasi/save",
                data: JSON.stringify(this),
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        }
        this.layananDataBind = function() {
            return $.ajax({
                url: BASE_URL + 'Registrasi/getRegisterLayanan',
                type: "POST",
                data: JSON.stringify({ id: this.id }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        }
        this.obatDataBind = function() {
            return $.ajax({
                url: BASE_URL + 'Registrasi/getRegisterObat',
                type: "POST",
                data: JSON.stringify({ id: this.id, jenis_pemeriksaan: this.jenisPemeriksaan }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        }
        this.obatDataTambahanBind = function() {
            return $.ajax({
                url: BASE_URL + 'Registrasi/getRegisterObat',
                type: "POST",
                data: JSON.stringify({ id: this.id, jenis_pemeriksaan: "Umum" }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        }
        this.icd9DataBind = function() {
            return $.ajax({
                url: BASE_URL + 'Registrasi/getRegisterIcd9',
                type: "POST",
                data: JSON.stringify({ id: this.id }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        }
        this.icd10DataBind = function() {
            return $.ajax({
                url: BASE_URL + 'Registrasi/getRegisterIcd10',
                type: "POST",
                data: JSON.stringify({ id: this.id }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        }
        this.rencanaKontrolDataBind = function() {
            return $.ajax({
                url: BASE_URL + 'Registrasi/getRegisterRencanaKontrol',
                type: "POST",
                data: JSON.stringify({ id: this.id }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        }
    }
}

var pasienObj;
var pendaftaranObj = new Pendaftaran();

(function($) {
    //PASIEN
    PasienBinding($);
    //PENDAFTARAN
    RegistrasiBinding($);
})(jQuery);

function RegistrasiBinding($) {
    var initialLoadRegUmum = true;	
    var $tablePendaftaranUmumDT = $("#tableRegisterPasienUmum").DataTable({
        destroy: true,
        scrollX: true,
        processing: true,
        serverSide: true,
        pageLength: 10,
        order: [
            [1, "asc"]
        ],
        ajax: function (data, callback, settings) {
            if (initialLoadRegUmum) {
                initialLoadRegUmum = false;
                callback({data: []}); // don't fire ajax, just return empty set
                return;
            }
			var $active = $(".wizard").find('li.active');
			let click_index = $('.wizard .nav-tabs li').index($active);
			data.state_index = click_index - 2;			

            $.post(BASE_URL + 'Registrasi/getDatatableUmum', data, function(result) {
                callback(result);                
              }, "json");            
        }, 		
        "columns": [
            { "data": null },
            { "data": 'no_registrasi' },
            { "data": "no_rm" },
            { "data": "nama_pasien" },
            { "data": "tanggal_periksa", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { "data": "nama_unit_layanan" },
            { "data": "nama_dokter" },
            { "data": "tipe_pasien" },
            { "data": "keterangan1" },
            { "data": "tanggal_pemeriksaan", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { "data": "jenis_pemeriksaan" },
            { "data": "tanggal_kunjungan_selanjutnya", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { "data": "tujuan_kunjungan_selanjutnya" },
            { "data": "jumlah_paket" },
            { "data": "id_paket" },
            { "data": "paket_sisa" },
            { "data": "total_stok_opname" },
            { "data": "diagnosa" },
            { "data": "keterangan2" },
            { "data": "tanggal_penyerahan_resep", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { "data": "keterangan3" },
            { "data": "id" },
            { "data": "id_unit_layanan" },
            { "data": "id_dokter" },
            { "data": "id_tipe_pasien" },
            { "data": "id_pasien" },
            { "data": "id_reference" },
        ],
        columnDefs: [{
                targets: [1, 2, 3],
                orderable: true
            },
            {
                targets: [-1, -2, -3, -4, -5, -6, -7, -8, -9, -10, -11, -12, -13, -14, -15, -16],
                visible: false
            },
            {
                targets: '_all',
                orderable: false
            },
            {
                targets: 0,
                data: null,
                defaultContent: '<div class="btn-group"><button class="btn btn-info btn-sm mr-0 btn-pilih">Pilih</button><button class="btn btn-danger btn-sm mr-0 btn-cancel">Batal</button></div>'
            }
        ],
    });
    var initialLoadRegPaket = true;	
    var $tablePendaftaranPaketDT = $("#tableRegisterPasienPaket").DataTable({
        destroy: true,
        scrollX: true,
        processing: true,
        serverSide: true,
        pageLength: 10,
        order: [
            [1, "asc"]
        ],
        ajax: function (data, callback, settings) {
            if (initialLoadRegPaket) {
                initialLoadRegPaket = false;
                callback({data: []}); // don't fire ajax, just return empty set
                return;
            }
			var $active = $(".wizard").find('li.active');
			let click_index = $('.wizard .nav-tabs li').index($active);
			data.state_index = click_index - 2;			

            $.post(BASE_URL + 'Registrasi/getDatatablePaket', data, function(result) {
                callback(result);                
              }, "json");            
        }, 			
        "columns": [
            { "data": null },
            { "data": 'no_registrasi' },
            { "data": "no_rm" },
            { "data": "nama_pasien" },
            { "data": "tanggal_periksa", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { "data": "nama_unit_layanan" },
            { "data": "nama_dokter" },
            { "data": "tipe_pasien" },
            { "data": "keterangan1" },
            { "data": "tanggal_pemeriksaan", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { "data": "jenis_pemeriksaan" },
            { "data": "tanggal_kunjungan_selanjutnya", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { "data": "tujuan_kunjungan_selanjutnya" },
            { "data": "jumlah_paket" },
            { "data": "id_paket" },
            { "data": "paket_sisa" },
            { "data": "total_stok_opname" },
            { "data": "diagnosa" },
            { "data": "keterangan2" },
            { "data": "tanggal_penyerahan_resep", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { "data": "keterangan3" },
            { "data": "id" },
            { "data": "id_unit_layanan" },
            { "data": "id_dokter" },
            { "data": "id_tipe_pasien" },
            { "data": "id_pasien" },
            { "data": "id_reference" },
        ],
        columnDefs: [{
                targets: [1, 2, 3],
                orderable: true
            },
            {
                targets: [-1, -2, -3, -4, -5, -6, -7, -8, -9, -10, -11, -12, -13, -14, -15, -16],
                visible: false
            },
            {
                targets: '_all',
                orderable: false
            },
            {
                targets: 0,
                data: null,
                defaultContent: '<div class="btn-group"><button class="btn btn-info btn-sm mr-0 btn-pilih">Pilih</button><button class="btn btn-danger btn-sm mr-0 btn-cancel">Batal</button></div>'
            }
        ],
    });

    $("#tableRegisterPasienUmum tbody").on('click', 'button.btn-cancel', function() {
        $('#modal-registrasi').modal('toggle');
        let data = $tablePendaftaranUmumDT.row($(this).parents('tr')).data();
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
                        url: BASE_URL + "Registrasi/delete",
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

                            if (pendaftaranObj.id === id) {
                                $("#wizardForm")[0].reset();
                            }
                            $('#modal-registrasi').modal('toggle');
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
                } else {
                    $('#modal-registrasi').modal('toggle');
                }
            }
        });
    });

    $("#tableRegisterPasienPaket tbody").on('click', 'button.btn-cancel', function() {
        $('#modal-registrasi').modal('toggle');
        let data = $tablePendaftaranPaketDT.row($(this).parents('tr')).data();
        let id = data['id'];
        let id_reference = data['id_reference'];
        let paket_sisa = data['paket_sisa'];

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
                        url: BASE_URL + "Registrasi/cancelPaket",
                        data: JSON.stringify({ id: id, id_reference: id_reference, paket_sisa: paket_sisa }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil dihapus'
                            });

                            if (pendaftaranObj.id === id) {
                                $("#wizardForm")[0].reset();
                            }

                            $('#modal-registrasi').modal('toggle');

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
                } else {
                    $('#modal-registrasi').modal('toggle');
                }
            }
        });
    });

    $("#tableRegisterPasienUmum tbody").on('click', 'button.btn-pilih', function() {
        var $active = $(".wizard").find('li.active');
        let click_index = $('.wizard .nav-tabs li').index($active);
        let data = $tablePendaftaranUmumDT.row($(this).parents('tr')).data();
        let id = data['id'];
        let id_pasien = data['id_pasien'];

        let arr = {
            id: id,
            no_registrasi: data['no_registrasi'],
            tanggal_periksa: moment(data['tanggal_periksa']).format('DD/MM/YYYY'),
            id_unit_layanan: data['id_unit_layanan'],
            id_dokter: data['id_dokter'],
            id_tipe_pasien: data['id_tipe_pasien'],
            keterangan1: data['keterangan1'],
            tanggal_pemeriksaan: moment(data['tanggal_pemeriksaan']).format('DD/MM/YYYY'),
            diagnosa: data['diagnosa'],
            keterangan2: data['keterangan2'],
            tanggal_penyerahan_resep: moment(data['tanggal_penyerahan_resep']).format('DD/MM/YYYY'),
            keterangan3: data['keterangan3'],
            state_index: click_index - 2,
            jenis_pemeriksaan: data['jenis_pemeriksaan'],
            tanggal_kunjungan_selanjutnya: moment(data['tanggal_kunjungan_selanjutnya']).format('DD/MM/YYYY'),
            tujuan_kunjungan_selanjutnya: data['tujuan_kunjungan_selanjutnya'],
            jumlah_paket: data['jumlah_paket'],
            id_paket: data['id_paket'],
            sisa_paket: data['paket_sisa'],
            total_stok_opname: data['total_stok_opname'],
            id_reference: data['id_reference']
        }
        pendaftaranObj = new Pendaftaran(arr);
        pasienObj = new Pasien({ id: id_pasien });

        $.when(pasienObj.dataBind(), pendaftaranObj.obatDataBind(), pendaftaranObj.layananDataBind()).done(function(responsePasien, responseObat, responseLayanan) {
            pasienObj = new Pasien(responsePasien[0].data);
            pasienObj.render();
            pendaftaranObj.pasien = pasienObj;

            if (responseObat[0].status) {
                pendaftaranObj.dataObat = responseObat[0].data;
                fillTableObat(responseObat[0].data);
            }
            if (responseLayanan[0].status) {
                pendaftaranObj.dataLayanan = responseLayanan[0].data;
                fillTableLayanan(responseLayanan[0].data);
            }
            pendaftaranObj.render();
            if (pendaftaranObj.stateIndex == 2) {
                calculate();
            }
        });
        $.when(pendaftaranObj.icd9DataBind()).done(function(response) {
            pendaftaranObj.dataIcd9 = response.data;
            fillTableIcd9(response.data)
        });
        $.when(pendaftaranObj.icd10DataBind()).done(function(response) {
            pendaftaranObj.dataIcd10 = response.data;
            fillTableIcd10(response.data)
        });
        $.when(pendaftaranObj.rencanaKontrolDataBind()).done(function(response) {
            pendaftaranObj.dataRencanaKontrol = response.data;
            fillTableRencanaKontrol(response.data)
        });
        $('#modal-registrasi').modal('toggle');
    });

    $("#tableRegisterPasienPaket tbody").on('click', 'button.btn-pilih', function() {
        var $active = $(".wizard").find('li.active');
        let click_index = $('.wizard .nav-tabs li').index($active);
        let data = $tablePendaftaranPaketDT.row($(this).parents('tr')).data();
        let id = data['id'];
        let id_pasien = data['id_pasien'];
        let no_reg = data['no_registrasi'];
        if (data['tanggal_pemeriksaan'] !== TODAY_ISO)
            no_reg = getNoReg();

        let arr = {
            id: id,
            no_registrasi: no_reg,
            tanggal_periksa: moment(data['tanggal_periksa']).format('DD/MM/YYYY'),
            id_unit_layanan: data['id_unit_layanan'],
            id_dokter: data['id_dokter'],
            id_tipe_pasien: data['id_tipe_pasien'],
            keterangan1: data['keterangan1'],
            tanggal_pemeriksaan: moment(data['tanggal_pemeriksaan']).format('DD/MM/YYYY'),
            diagnosa: data['diagnosa'],
            keterangan2: data['keterangan2'],
            tanggal_penyerahan_resep: moment(data['tanggal_penyerahan_resep']).format('DD/MM/YYYY'),
            keterangan3: data['keterangan3'],
            state_index: click_index - 2,
            jenis_pemeriksaan: data['jenis_pemeriksaan'],
            tanggal_kunjungan_selanjutnya: moment(data['tanggal_kunjungan_selanjutnya']).format('DD/MM/YYYY'),
            tujuan_kunjungan_selanjutnya: data['tujuan_kunjungan_selanjutnya'],
            jumlah_paket: data['jumlah_paket'],
            id_paket: data['id_paket'],
            sisa_paket: data['paket_sisa'],
            total_stok_opname: data['total_stok_opname'],
            id_reference: data['id_reference']
        }
        pendaftaranObj = new Pendaftaran(arr);
        pasienObj = new Pasien({ id: id_pasien });

        $.when(pasienObj.dataBind(), pendaftaranObj.obatDataBind(), pendaftaranObj.obatDataTambahanBind(), pendaftaranObj.layananDataBind()).done(function(responsePasien, responseObat, responseObatTambahan, responseLayanan) {
            pasienObj = new Pasien(responsePasien[0].data);
            pasienObj.render();
            pendaftaranObj.pasien = pasienObj;

            if (responseObat[0].status) {
                pendaftaranObj.dataObat = responseObat[0].data;
                fillTableObat(responseObat[0].data);
            }
            if (responseObatTambahan[0].status) {
                pendaftaranObj.dataObatTambahan = responseObatTambahan[0].data;
                fillTableObatTambahan(responseObatTambahan[0].data);
            }
            if (responseLayanan[0].status) {
                pendaftaranObj.dataLayanan = responseLayanan[0].data;
                fillTableLayanan(responseLayanan[0].data);
            }
            pendaftaranObj.render();
            if (pendaftaranObj.stateIndex == 2) {
                calculate();
            }
        });
        $.when(pendaftaranObj.icd9DataBind()).done(function(response) {
            pendaftaranObj.dataIcd9 = response.data;
            fillTableIcd9(response.data)
        });
        $.when(pendaftaranObj.icd10DataBind()).done(function(response) {
            pendaftaranObj.dataIcd10 = response.data;
            fillTableIcd10(response.data)
        });
        $.when(pendaftaranObj.rencanaKontrolDataBind()).done(function(response) {
            pendaftaranObj.dataRencanaKontrol = response.data;
            fillTableRencanaKontrol(response.data)
        });
        $('#modal-registrasi').modal('toggle');
    });

    // When modal window is shown
    $('#modal-registrasi').on('shown.bs.modal', function() {
        $("#tableRegisterPasienUmum, #tableRegisterPasienPaket").DataTable()
            .ajax.reload(null, false)
        $('#custom-tabs-one-home-tab').tab('show');
    });

    $('#modal-registrasi').on('hidden.bs.modal', function() {
        //$('#custom-tabs-one-home-tab').tab('dispose');
        //$('#custom-tabs-one-profile-tab').tab('dispose');
    });

    $('#custom-tabs-one-home-tab, #custom-tabs-one-profile-tab').on('shown.bs.tab', function(e) {
        // Adjust column width and re-initialize Responsive extension
        requestAnimationFrame(() =>
            $("#tableRegisterPasienUmum, #tableRegisterPasienPaket").DataTable()
            .columns.adjust()
        );
    });

    $('#inputJenisPemeriksaan').on('change', function() {
        if (this.value === 'Umum') {
            $("#form-group-tanggal-kunjungan-selanjutnya").removeAttr("style").hide();
            $("#form-group-tujuan-kunjungan-selanjutnya").removeAttr("style").hide();
            $("#form-group-jumlah-paket").removeAttr("style").hide();
            $("#form-group-jenis-paket").removeAttr("style").hide();
        } else {
            $("#form-group-tanggal-kunjungan-selanjutnya").removeAttr("style").show();
            $("#form-group-tujuan-kunjungan-selanjutnya").removeAttr("style").show();
            $("#form-group-jumlah-paket").removeAttr("style").show();
            $("#form-group-jenis-paket").removeAttr("style").show();
        }
    });
}

function PasienBinding($) {
    var initialLoad = true;	
    var $tablePasienDT = $("#tablePasien").DataTable({
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
        ajax: function (data, callback, settings) {
            if (initialLoad) {
                initialLoad = false;
                callback({data: []}); // don't fire ajax, just return empty set
                return;
            }
            $.post(BASE_URL + 'Pasien/getDataTable', data, function(result) {
                callback(result);                
              }, "json");            
        }, 
        "columns": [
            { "data": null },
            { "data": "nama_pasien" },
            { "data": 'no_rm' },
            { "data": "tempat_lahir" },
            { "data": "tanggal_lahir", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { "data": "no_telp" },
            { "data": "agama" },
            { "data": "golongan_darah" },
            { "data": "jenis_kelamin_display" },
            { "data": "pekerjaan_display" },
            { "data": "alamat" },
            { "data": "keterangan" },
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

    $("#tablePasien tbody").on('click', 'button', function() {
        let data = $tablePasienDT.row($(this).parents('tr')).data();
        let arr = {
            id: data['id'],
            no_rm: data['no_rm'],
            nama_pasien: data['nama_pasien'],
            tempat_lahir: data['tempat_lahir'],
            tanggal_lahir: data['tanggal_lahir'],
            no_telp: data['no_telp'],
            agama: data['agama'],
            golongan_darah: data['golongan_darah'],
            jenis_kelamin: data['jenis_kelamin'],
            pekerjaan: data['pekerjaan'],
            alamat: data['alamat'],
            keterangan: data['keterangan'],
            jenis_kelamin_display: data['jenis_kelamin_display'],
            pekerjaan_display: data['pekerjaan_display']
        };
        pasienObj = new Pasien(arr);
        pasienObj.render();
        $('#modal-pasien').modal('toggle');
    });

    // When modal window is shown
    $('#modal-pasien').on('shown.bs.modal', function() {
        // Adjust column width and re-initialize Responsive extension
        requestAnimationFrame(() =>
            $("#tablePasien").DataTable()
            .ajax.reload(null, false)
            .columns.adjust()
            .responsive.recalc()
        );
    });

    $('#modal-formPasien').on('shown.bs.modal', function() {
        //alert("test");
        fetchNoRM();
    });
}

function save_pasien() {
    pasienObj.namaPasien = $('#inputNamaPasien').val();
    pasienObj.tempatLahir = $('#inputTempatLahir').val();
    pasienObj.tanggalLahir = moment($('#inputTanggalLahir').datetimepicker('viewDate')).format('YYYY-MM-DD');
    pasienObj.noTelp = $('#inputNoTelp').val();
    pasienObj.agama = $('#inputAgama').val();
    pasienObj.jenisKelamin = $('#inputJenisKelamin').val();
    pasienObj.golonganDarah = $('#inputGolonganDarah').val();
    pasienObj.pekerjaan = $('#inputPekerjaan').val();
    pasienObj.alamat = $('#inputAlamat').val();
    pasienObj.keterangan = $('#inputKeterangan').val();

    $.when(pasienObj.save()).done(function(response) {
        if (response.status) {
            console.log('done');
        } else
            console.log(response.message);
    });
}

function insert_pasien() {
    pasienObj = new Pasien({
        id: $('#formIdPasien').val(),
        no_rm: $('#formNoRM').val(),
        nama_pasien: $('#formNamaPasien').val(),
        tempat_lahir: $('#formTempatLahir').val(),
        tanggal_lahir: moment($('#formTanggalLahir').datetimepicker('viewDate')).format('YYYY-MM-DD'),
        no_telp: $('#formNoTelp').val(),
        agama: $('#formAgama').val(),
        golongan_darah: $('#formGolonganDarah').val(),
        jenis_kelamin: $('#formJenisKelamin').val(),
        pekerjaan: $('#formPekerjaan').val(),
        alamat: $('#formAlamat').val(),
        keterangan: $('#formKeterangan').val()
    });

    $.when(pasienObj.save()).done(function(response) {
        if (response.status) {
            pasienObj.updateValue(response.data.id, response.data.no_rm);
            pasienObj.render();
            $('#formIdPasien').val(0);
            $('#modal-formPasien').modal('toggle');
            $("#FormPasien")[0].reset();
        } else
            console.log(response.message);
    });

}

function save_pendaftaran(stateIndex) {
    pendaftaranObj = new Pendaftaran({
        id: $('#inputIdRegistrasi').val(),
        no_registrasi: $('#inputNoReg').val(),
        tanggal_periksa: $('#inputTanggalPeriksa').val(),
        id_unit_layanan: $('#inputUnitLayanan').val(),
        id_dokter: $('#inputDokterUnitLayanan').val(),
        id_tipe_pasien: $('#inputTipePasien').val(),
        keterangan1: $('#inputKeterangan1').val(),
        tanggal_pemeriksaan: $('#inputTanggalPemeriksaan').val(),
        diagnosa: $('#inputDiagnosa').val(),
        keterangan2: $('#inputKeterangan2').val(),
        tanggal_penyerahan_resep: $('#inputTanggalPenyerahanResep').val(),
        keterangan3: $('#inputKeterangan3').val(),
        state_index: stateIndex,
        jenis_pemeriksaan: $('#inputJenisPemeriksaan').val(),
        tanggal_kunjungan_selanjutnya: $('#inputTanggalKunjunganSelanjutnya').val(),
        tujuan_kunjungan_selanjutnya: $('#inputTujuanKunjunganSelanjutnya').val(),
        jumlah_paket: $('#inputJumlahPaket').val(),
        id_paket: $('#inputJenisPaket').val(),
        sisa_paket: $('#inputSisaPaket').val(),
        id_reference: $('#inputIdReference').val(),
    });

    pendaftaranObj.pasien = pasienObj;
    let dataLayanan = fnTableToObject($('#tableLayanan'));
    let dataIcd9 = fnTableToObject($('#tableIcd9'));
    let dataIcd10 = fnTableToObject($('#tableIcd10'));
    let dataObat = fnTableToObject($('#tableObat'));
    let dataObatTambahan = fnTableToObject($('#tableObatTambahan'));
    let dataRencanaKontrol = fnTableToObject($('#tableRencanaKontrol'));

    pendaftaranObj.dataLayanan = dataLayanan;
    pendaftaranObj.dataIcd9 = dataIcd9;
    pendaftaranObj.dataIcd10 = dataIcd10;
    pendaftaranObj.dataObat = dataObat;
    pendaftaranObj.dataObatTambahan = dataObatTambahan;
    pendaftaranObj.dataRencanaKontrol = dataRencanaKontrol;

    $.when(pendaftaranObj.save()).done(function(response) {
        if (response.status) {
            pendaftaranObj.updateValue(response.data.id, response.data.no_registrasi);
            pendaftaranObj.render();
            if (stateIndex == 2) {
                calculate();
            }
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

function fillTableLayanan(data) {
    let $tableLayanan = $('#tableLayanan');
    $tableLayanan.find('tbody').empty();
    if (data.length === 0) {
        let colspan = $tableLayanan.find('thead tr th').length;
        $tableLayanan.find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
    }
    $.each(data, function(key, value) {
        let row_template = `<tr><td class="d-none" data-label="id">${value.id}</td><td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="${value.jumlah}" step="1"></td><td data-label="nama" class="text-left align-middle">${value.nama}</td><td class="d-none" data-label="harga">${value.harga}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;
        $tableLayanan.find('tbody').append(row_template);
    });
}

function fillTableIcd9(data) {
    let $tableIcd9 = $('#tableIcd9');
    $tableIcd9.find('tbody').empty();
    if (data.length === 0) {
        let colspan = $tableIcd9.find('thead tr th').length;
        $tableIcd9.find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
    }
    $.each(data, function(key, value) {
        let row_template = `<tr><td class="d-none" data-label="id">${value.id}</td><td data-label="jumlah" class="text-center align-middle d-none"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="${value.jumlah}" step="1"></td><td data-label="nama" class="text-left align-middle">${value.nama}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;
        $tableIcd9.find('tbody').append(row_template);
    });
}

function fillTableIcd10(data) {
    let $tableIcd10 = $('#tableIcd10');
    $tableIcd10.find('tbody').empty();
    if (data.length === 0) {
        let colspan = $tableIcd10.find('thead tr th').length;
        $tableIcd10.find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
    }
    $.each(data, function(key, value) {
        let row_template = `<tr><td class="d-none" data-label="id">${value.id}</td><td data-label="jumlah" class="text-center align-middle d-none"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="${value.jumlah}" step="1"></td><td data-label="nama" class="text-left align-middle">${value.nama}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;
        $tableIcd10.find('tbody').append(row_template);
    });
}

function fillTableRencanaKontrol(data) {
    let $tableRencanaKontrol = $('#tableRencanaKontrol');
    $tableRencanaKontrol.find('tbody').empty();
    if (data.length === 0) {
        let colspan = $tableRencanaKontrol.find('thead tr th').length;
        $tableRencanaKontrol.find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
    }
    $.each(data, function(key, value) {
        let tanggal_kontrol = moment(value.tanggal_kontrol).format('DD/MM/YYYY');
        let row_template = `<tr><td class="text-left align-middle" data-label="tanggal_kontrol">${tanggal_kontrol}</td><td class="text-left align-middle" data-label="alasan_kontrol">${value.alasan_kontrol}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;
        $tableRencanaKontrol.find('tbody').append(row_template);
    });
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

function fillTableObatTambahan(data) {
    let $tableObat = $('#tableObatTambahan');
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

async function fetchNoRM() {
    let url = BASE_URL + 'Pasien/getNoRM';
    const res = await fetch(url);
    const data = await res.text();
    $('#formNoRM').val(data);
}