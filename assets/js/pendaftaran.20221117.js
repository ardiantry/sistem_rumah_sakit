class Pendaftaran {
    constructor({
        id, no_registrasi, tanggal_periksa, id_unit_layanan, id_dokter, id_tipe_pasien, keterangan1, tanggal_pemeriksaan, diagnosa, keterangan2, tanggal_penyerahan_resep, keterangan3, state_index, jenis_pemeriksaan, tanggal_kunjungan_selanjutnya, tujuan_kunjungan_selanjutnya, jumlah_paket, id_paket, sisa_paket, total_stok_opname, id_reference
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
        this.dataPemeriksaanFisik = {};        
        this.updateValue = function (id, no_registrasi) {
            this.id = id;
            this.noRegistrasi = no_registrasi;
        };
        this.render = function () {
            if(this.pasien !== {})
                $('#btn-riwayat-pasien').show();            
            let noRegistrasiDisplay = `${this.noRegistrasi}-${this.pasien.namaPasien}(${this.pasien.noRm})`;
            let jumlah_paket = this.jumlahPaket;
            let jenis_pemeriksaan = this.jenisPemeriksaan;
            let id_reference = this.idReference;
            $('#inputIdRegistrasi').val(this.id);
            $('#inputNoReg').val(this.noRegistrasi);
            $('#inputTanggalPeriksa').val(this.tanggalPeriksa);
            $('#inputUnitLayanan').val(this.idUnitLayanan);
            $('#inputUnitLayanan').trigger('change');
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
            $.each(this.dataLayanan, function (key, value) {
                $('#tableInvoiceLayanan').find('tbody').append(`<tr><td class="d-none" data-label="id">${value.id}</td><td class="text-center align-middle" data-label="jumlah">${value.jumlah}</td><td data-label="nama" class="text-left align-middle">${value.nama}</td><td class="text-right align-middle" data-label="harga"><input type="number" class="form-control form-control-sm text-right" value="${parseInt(value.harga)}" step="1"></td><td class="text-right align-middle" data-label="total">${rupiah(value.jumlah * parseInt(value.harga))}</td></tr>`);
            });

            $('#tableInvoiceObat').find('tbody').empty();
            $('#tableInvoicePaket').find('tbody').empty();

            if (this.dataObat.length === 0) {
                let colspan = $('#tableInvoiceObat').find('thead tr th').length;
                $('#tableInvoiceObat').find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
                $('#tableInvoicePaket').find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
            }

            $.each(this.dataObat, function (key, value) {
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
            $.each(this.dataObatTambahan, function (key, value) {
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
        this.save = function () {
            console.log(this);
            let param = {};
            if(this.stateIndex==0){
                param = {
                    id: this.id,
                    noRegistrasi: this.noRegistrasi,
                    tanggalPeriksa: this.tanggalPeriksa,
                    idUnitLayanan: this.idUnitLayanan,
                    idDokter: this.idDokter,
                    idTipePasien: this.idTipePasien,
                    stateIndex: this.stateIndex,              
                    pasien: this.pasien,               
                    keterangan1: this.keterangan1                               
                }
            }            
            else if(this.stateIndex==1){
                param = {
                    id: this.id,
                    tanggalPemeriksaan: this.tanggalPemeriksaan,
                    diagnosa: this.diagnosa,
                    keterangan2: this.keterangan2,
                    stateIndex: this.stateIndex,
                    jenisPemeriksaan: this.jenisPemeriksaan,
                    tanggalKunjunganSelanjutnya: this.tanggalKunjunganSelanjutnya,
                    tujuanKunjunganSelanjutnya: this.tujuanKunjunganSelanjutnya,
                    idReference: this.idReference,
                    dataLayanan: this.dataLayanan,
                    dataIcd9: this.dataIcd9,
                    dataIcd10: this.dataIcd10,
                    dataRencanaKontrol: this.dataRencanaKontrol,
                    dataPemeriksaanFisik: this.dataPemeriksaanFisik
                }
            }
            else if(this.stateIndex==2){
                param = {
                    id: this.id,
                    stateIndex: this.stateIndex,                    
                    tanggalPenyerahanResep: this.tanggalPenyerahanResep,
                    keterangan3: this.keterangan3,
                    jenisPemeriksaan: this.jenisPemeriksaan,                    
                    jumlahPaket: this.jumlahPaket,
                    idPaket: this.idPaket,
                    sisaPaket: this.sisaPaket,
                    totalStokOpname: this.totalStokOpname,                    
                    dataObat: this.dataObat,
                    dataObatTambahan: this.dataObatTambahan
                }
            }            
            return $.ajax({
                type: "POST",
                url: BASE_URL + "Registrasi/save",
                data: JSON.stringify(param),
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        };
        this.layananDataBind = function () {
            return $.ajax({
                url: BASE_URL + 'Registrasi/getRegisterLayanan',
                type: "POST",
                data: JSON.stringify({ id: this.id }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        };
        this.obatDataBind = function () {
            return $.ajax({
                url: BASE_URL + 'Registrasi/getRegisterObat',
                type: "POST",
                data: JSON.stringify({ id: this.id, jenis_pemeriksaan: this.jenisPemeriksaan }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        };
        this.obatDataTambahanBind = function () {
            return $.ajax({
                url: BASE_URL + 'Registrasi/getRegisterObat',
                type: "POST",
                data: JSON.stringify({ id: this.id, jenis_pemeriksaan: "Umum" }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        };
        this.icd9DataBind = function () {
            return $.ajax({
                url: BASE_URL + 'Registrasi/getRegisterIcd9',
                type: "POST",
                data: JSON.stringify({ id: this.id }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        };
        this.icd10DataBind = function () {
            return $.ajax({
                url: BASE_URL + 'Registrasi/getRegisterIcd10',
                type: "POST",
                data: JSON.stringify({ id: this.id }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        };
        this.rencanaKontrolDataBind = function () {
            return $.ajax({
                url: BASE_URL + 'Registrasi/getRegisterRencanaKontrol',
                type: "POST",
                data: JSON.stringify({ id: this.id }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        };
        this.pemeriksaanFisikDataBind = function () {
            return $.ajax({
                url: BASE_URL + 'Registrasi/getRegisterPemeriksaanFisik',
                type: "POST",
                data: JSON.stringify({ id: this.id }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        };        
    }
}
