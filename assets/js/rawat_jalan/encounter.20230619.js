class UnitLayanan {
    constructor({ id, harga, jumlah = 1 }) {
        this.nama = nama;
        this.harga = parseInt(harga);        
        this.jumlah = parseInt(jumlah);
    }
}

class Tambahan {
    constructor({ nama, harga, jumlah = 1 }) {
        this.nama = nama;
        this.harga = parseInt(harga);        
        this.jumlah = parseInt(jumlah);
    }
}

class CaraBayar {
    constructor({ id, nama, harga, akun }) {
        this.id = id;
        this.nama = nama;
        this.harga = parseInt(harga);        
        this.akun = akun;
    }
}

class Encounter {
    constructor({ id, no_registrasi }) {
        this.id = parseInt(id);
        this.no_registrasi = no_registrasi;
        this.tanggal_periksa = null;
        this.unit_layanan = null;
        this.dokter = null;
        this.tipe_pasien = null
        this.keterangan1 = null;
        this.tanggal_pemeriksaan = null;
        this.jenis_pemeriksaan = null;
        this.diagnosa = null;
        this.keterangan2 = null;
        this.id_paket = null;
        this.nama_paket = null;                  
        this.harga_paket = null;
        this.jumlah_paket = null;
        this.sisa_paket = null;
        this.id_reference = null;
        this.stok_opname = null;
        this.tanggal_kunjungan_selanjutnya = null;
        this.tujuan_kunjungan_selanjutnya = null;  
        this.tanggal_penyerahan_resep = null;        
        this.keterangan3 = null;
        
        this.pasien = {};
        this.icd9 = [];
        this.icd10 = [];
        this.layanan = [];        
        this.rencana_kontrol = [];        
        this.laboratorium = [];        
        this.radiologi = [];        
        this.exam = [];        
        this.obat = [];                
        this.obat_paket = [];                
        this.obat_tambahan = [];                
        this.tambahan = [];                
        this.cara_bayar = [];       
        this.state_index = 0;

        //BPJS
        this.tacc = "-1";
        this.keluhan = "-";
        this.kesadaran = "01";
        this.sistol = 0;
        this.diastole = 0;
        this.berat_badan = 0;    
        this.tinggi_badan = 0;    
        this.resp_rate = 0;    
        this.heart_rate = 0;    
        this.rujuk = function (){
            return $.ajax({
                type: "POST",
                url: BASE_URL + "Registrasi/rujuk",
                data: JSON.stringify({ id: this.id }),                
                dataType: 'json',
                async: true,                
                contentType: 'application/json; charset=utf-8'
            });     
        }
        this.save = function () {
            console.log(this);
            let param = {};

            if(this.state_index==1){                        
                param = {
                    id: this.id,
                    noRegistrasi: this.no_registrasi,
                    tanggalPeriksa: this.tanggal_periksa,
                    idUnitLayanan: this.unit_layanan.id,
                    idDokter: this.dokter.id_dokter,
                    idTipePasien: this.tipe_pasien,
                    stateIndex: this.state_index,              
                    pasien: this.pasien,               
                    keterangan1: this.keterangan1,  
                    keterangan2: this.keterangan2,
                    keterangan3: this.keterangan3,
                    jenisPemeriksaan: this.jenis_pemeriksaan,                    
                    tacc: this.tacc,
                    keluhan: this.keluhan,
                    kesadaran: this.kesadaran,
                    sistol: this.sistol,
                    diastole: this.diastole,
                    beratBadan: this.berat_badan,
                    tinggiBadan: this.tinggi_badan,
                    respRate: this.resp_rate,
                    heartRate: this.heart_rate
                } 
            }
            else if(this.state_index==2){
                let pemeriksaan_fisiks = [];
                for (var i = 0; i < this.exam.length; i++) {
                    let pemeriksaan_fisik = this.exam[i]; 
                    pemeriksaan_fisik.image = pemeriksaan_fisik.image.replace(/^data:image\/(png|jpg|jpeg);base64,/, '');
                    pemeriksaan_fisiks.push(pemeriksaan_fisik)
                }
                param = {
                    id: this.id,
                    tanggalPemeriksaan: this.tanggal_pemeriksaan,
                    diagnosa: this.diagnosa,
                    keterangan2: this.keterangan2,
                    stateIndex: this.state_index,              
                    jenisPemeriksaan: this.jenis_pemeriksaan,
                    tanggalKunjunganSelanjutnya: this.tanggal_kunjungan_selanjutnya,
                    tujuanKunjunganSelanjutnya: this.tujuan_kunjungan_selanjutnya,
                    idReference: this.id_reference,
                    dataLayanan: this.layanan,
                    dataIcd9: this.icd9,
                    dataIcd10: this.icd10,
                    dataRencanaKontrol: this.rencana_kontrol,
                    dataPemeriksaanFisik: pemeriksaan_fisiks,
                    dataLaboratory: this.laboratorium,
                    dataRadiology: this.radiologi                    
                }                  
            }
            else if(this.state_index==3){
                param = {
                    id: this.id,
                    stateIndex: this.state_index,                
                    tanggalPenyerahanResep: this.tanggal_penyerahan_resep,
                    keterangan3: this.keterangan3,
                    jenisPemeriksaan: this.jenis_pemeriksaan,                    
                    jumlahPaket: this.jumlah_paket,
                    idPaket: this.id_paket,
                    sisaPaket: this.sisa_paket,
                    totalStokOpname: this.stok_opname,                    
                    dataObat: this.obat,
                    dataObatTambahan: this.obat_tambahan
                }
            }              
            return $.ajax({
                type: "POST",
                url: BASE_URL + "Registrasi/save",
                data: JSON.stringify(param),
                dataType: 'json',
                async: true,                
                contentType: 'application/json; charset=utf-8'
            });            
        };
        this.updateValue = function (id, no_registrasi) {
            this.id = id;
            this.no_registrasi = no_registrasi;
            let noRegistrasiDisplay = `${this.no_registrasi}-${this.pasien.nama_pasien}(${this.pasien.no_rm})`;
            $('#inputNoReg1').val(noRegistrasiDisplay);
            $('#inputNoReg2').val(noRegistrasiDisplay);            
        };
        this.renderPayment = function() {
            const $tableInvoicePaket = $('#tableInvoicePaket'); 
            const $tableInvoiceObat = $('#tableInvoiceObat'); 
            const $tableInvoiceObatTambahan = $('#tableInvoiceObatTambahan'); 
            const $tableInvoiceLayanan = $('#tableInvoiceLayanan'); 
            const $tableInvoiceLab = $('#tableInvoiceLab'); 
            const $tableInvoiceRad = $('#tableInvoiceRad'); 

            let templateInvoiceObatPaket = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td class="text-center align-middle" data-label="jumlah">{{jumlah}}</td><td data-label="nama" class="text-left align-middle">{{nama}}</td><td class="text-right align-middle" data-label="harga_tampil"><input type="number" class="form-control form-control-sm text-right" value="0" step="1" disabled></td><td class="text-right align-middle" data-label="total_tampil">{{rupiah 0}}</td></tr>');            
            let templateInvoiceObat = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td class="text-center align-middle" data-label="jumlah">{{jumlah}}</td><td data-label="nama" class="text-left align-middle">{{nama}}</td><td class="text-right align-middle" data-label="harga"><input type="number" class="form-control form-control-sm text-right" value="{{harga}}" step="1"></td><td class="text-right align-middle" data-label="total">{{total-rupiah jumlah harga}}</td></tr>');            
            let templateInvoiceLayanan = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td class="text-center align-middle" data-label="jumlah">{{jumlah}}</td><td data-label="nama" class="text-left align-middle">{{nama}}</td><td class="text-right align-middle" data-label="harga"><input type="number" class="form-control form-control-sm text-right" value="{{harga}}" step="1"></td><td class="text-right align-middle" data-label="total">{{total-rupiah jumlah harga}}</td></tr>');            
            let templateInvoiceLab = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td class="text-left align-middle" data-label="tanggal_lab">{{format-datetime tanggal}}</td><td data-label="nama" class="text-left align-middle">{{jenis_lab}}</td><td class="text-right align-middle" data-label="harga"><input type="number" class="form-control form-control-sm text-right" value="{{harga}}" step="1"></td><td class="text-right align-middle" data-label="total">{{rupiah harga}}</td></tr>');            
            let templateInvoiceRad = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td class="text-left align-middle" data-label="tanggal_rad">{{format-datetime tanggal}}</td><td data-label="nama" class="text-left align-middle">{{jenis_rad}}</td><td class="text-right align-middle" data-label="harga"><input type="number" class="form-control form-control-sm text-right" value="{{harga}}" step="1"></td><td class="text-right align-middle" data-label="total">{{rupiah harga}}</td></tr>');            

            if (this.jenis_pemeriksaan === 'Paket Layanan') {
                if (this.id_reference) {
                    fillTable($('#tableInvoiceObat'), this.obat, templateInvoiceObatPaket);                                                                    
                }else{
                    fillTable($('#tableInvoiceObat'), this.obat, templateInvoiceObat);                                                                                            
                }                        
                let op = Object.assign(new Obat({}), this.obat[0]);
                op.jumlah = this.jumlah_paket;
                this.obat_paket.push(op);
                fillTable($tableInvoicePaket, [op], templateInvoiceObat); 
            
            }else{
                fillTable($tableInvoiceObat, this.obat, templateInvoiceObat);                        
            }
            fillTable($tableInvoiceObatTambahan, this.obat_tambahan, templateInvoiceObat);
            fillTable($tableInvoiceLayanan, this.layanan, templateInvoiceLayanan);       
            fillTable($tableInvoiceLab, this.laboratorium, templateInvoiceLab);       
            fillTable($tableInvoiceRad, this.radiologi, templateInvoiceRad);       

            calculate();                  
        };
        this.render = function() {
            var self = this;
            if(this.pasien !== {})
                $('#btn-riwayat-pasien').show();     

            this.pasien.render();
            let noRegistrasiDisplay = `${this.no_registrasi}-${this.pasien.nama_pasien}(${this.pasien.no_rm})`;
            $('#inputNoReg1').val(noRegistrasiDisplay);
            $('#inputNoReg2').val(noRegistrasiDisplay);
            //$('#inputTanggalPeriksa').val(moment(this.tanggal_periksa).format('DD/MM/YYYY'));
            $('#dateTanggalPeriksa').datetimepicker('date', moment(this.tanggal_periksa, 'YYYY-MM-DD') );         
            $('#inputUnitLayanan').val(this.unit_layanan.id);
            $('#inputUnitLayanan').trigger('change');
            $('#inputTipePasien').val(this.tipe_pasien);
            $('#inputKeterangan1').val(this.keterangan1);

             $('#inputTacc').val(this.tacc);
             $('#inputKeluhan').val(this.keluhan);
             $('#inputKesadaran').val(this.kesadaran);
             $('#inputSistol').val(this.sistol);
             $('#inputDiastole').val(this.diastole);
             $('#inputBeratBadan').val(this.berat_badan);
             $('#inputTinggiBadan').val(this.tinggi_badan);
             $('#inputRespRate').val(this.resp_rate);    
             $('#inputHeartRate').val(this.heart_rate);  

            //$('#inputTanggalPemeriksaan').val(moment(this.tanggal_pemeriksaan).format('DD/MM/YYYY'));
            $('#dateTanggalPemeriksaan').datetimepicker('date', moment(this.tanggal_pemeriksaan, 'YYYY-MM-DD') );            
            $('#inputJenisPemeriksaan').val(this.jenis_pemeriksaan);
            $('#inputJenisPemeriksaan').trigger('change');
            $('#inputDiagnosa').val(this.diagnosa);
            $('#inputKeterangan2').val(this.keterangan2);
            //$('#inputTanggalKunjunganSelanjutnya').val(moment(this.tanggal_kunjungan_selanjutnya).format('DD/MM/YYYY'));
            $('#dateTanggalKunjunganSelanjutnya').datetimepicker('date', moment(this.tanggal_kunjungan_selanjutnya, 'YYYY-MM-DD') );            
            $('#inputTujuanKunjunganSelanjutnya').val(this.tujuan_kunjungan_selanjutnya);
            $('#inputJumlahPaket').val(this.jumlah_paket);
            $('#inputJenisPaket').val(this.id_paket);
            $('#inputSisaPaket').val(this.sisa_paket);
            $('#inputIdReference').val(this.id_reference);
            $('#dateTanggalPenyerahanResep').datetimepicker('date', moment(this.tanggal_penyerahan_resep, 'YYYY-MM-DD') );            
            $('#inputKeterangan3').val(this.keterangan3);        
            $('#NoReg').html(this.no_registrasi);
            $('#TglNota').html(TODAY);
            $('#NoRM').html(this.pasien.no_rm);
            $('#NamaPasien').html(this.pasien.nama_pasien);
            $('#NoTelp').html(this.pasien.no_telp);

            if (this.jenis_pemeriksaan === 'Paket Layanan') {
                toggleInputPaket(true, this.sisa_paket, this.id_reference)
            }
            else{
                toggleInputPaket(false, null, null)
            }       
            if (this.jenis_pemeriksaan === 'Paket Layanan' && (!this.id_reference)) {
                $("#rincian_obat").removeAttr("style").hide();
                $("#rincian_paket").removeAttr("style").show();
            } else {
                $("#rincian_obat").removeAttr("style").show();
                $("#rincian_paket").removeAttr("style").hide();
            }
            const $targetIcd10 = $('#tableIcd10');
            const $targetIcd9 = $('#tableIcd9');
            const $targetLayanan = $('#tableLayanan');
            const $targetRencanaKontrol = $('#tableRencanaKontrol');
            const $targetLab = $('#tableLab');
            const $targetRad = $('#tableRad');

            const $targetObat = $('#tableObat');            
            const $targetObatTambahan = $('#tableObatTambahan');            
            const $caraBayar = $('#tableCaraBayar');
            const $tableInvoiceTambahan = $('#tableInvoiceTambahan');            
            fillTable($caraBayar, [], null);
            fillTable($tableInvoiceTambahan, [], null);            

            let templateIcd10 = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td data-label="jumlah" class="text-center align-middle d-none"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="{{jumlah}}" step="1"></td><td data-label="nama" class="text-left align-middle">{{icd10_name}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');
            let templateIcd = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td data-label="jumlah" class="text-center align-middle d-none"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="{{jumlah}}" step="1"></td><td data-label="nama" class="text-left align-middle">{{nama}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');
            let templateLayanan = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="{{jumlah}}" step="1"></td><td data-label="nama" class="text-left align-middle">{{nama}}</td><td class="" data-label="harga">{{rupiah harga}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');
            let templateRencanaKontrol = Handlebars.compile('<tr><td class="text-left align-middle" data-label="tanggal_kontrol">{{format-date tanggal}}</td><td class="text-left align-middle" data-label="alasan_kontrol">{{alasan}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');
            //let templateLab = Handlebars.compile('<tr><td class="text-left align-middle" data-label="tanggal_lab">{{format-date tanggal}}</td><td class="text-left align-middle" data-label="jam_lab">{{format-time tanggal}}</td><td class="text-left align-middle" data-label="jenis_lab">{{jenis_lab}}</td><td class="text-left align-middle" data-label="status">{{status}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');
            //let templateRad = Handlebars.compile('<tr><td class="text-left align-middle" data-label="tanggal_rad">{{format-date tanggal}}</td><td class="text-left align-middle" data-label="jam_rad">{{format-time tanggal}}</td><td class="text-left align-middle" data-label="jenis_rad">{{jenis_rad}}</td><td class="text-left align-middle" data-label="status">{{status}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');    
            let templateLab = Handlebars.compile('<tr><td class="text-left align-middle" data-label="tanggal_lab">{{format-date tanggal}}</td><td class="text-left align-middle" data-label="jam_lab">{{format-time tanggal}}</td><td class="text-left align-middle" data-label="jenis_lab">{{jenis_lab}}</td><td class="text-left align-middle" data-label="status">{{status}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm">{{button-status status}}</div></td></tr>');
            let templateRad = Handlebars.compile('<tr><td class="text-left align-middle" data-label="tanggal_rad">{{format-date tanggal}}</td><td class="text-left align-middle" data-label="jam_rad">{{format-time tanggal}}</td><td class="text-left align-middle" data-label="jenis_rad">{{jenis_rad}}</td><td class="text-left align-middle" data-label="status">{{status}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm">{{button-status status}}</div></td></tr>');    
            let templateObat = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="{{jumlah}}" step="1" max="{{stok}}"></td><td data-label="nama" class="text-left align-middle">{{nama}}</td><td class="" data-label="harga">{{rupiah harga}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');

            //let templateInvoiceLayanan = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td class="text-center align-middle" data-label="jumlah">{{jumlah}}</td><td data-label="nama" class="text-left align-middle">{{nama}}</td><td class="text-right align-middle" data-label="harga"><input type="number" class="form-control form-control-sm text-right" value="{{harga}}" step="1"></td><td class="text-right align-middle" data-label="total">{{total-rupiah jumlah harga}}</td></tr>');            
            //let templateInvoiceObatPaket = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td class="text-center align-middle" data-label="jumlah">{{jumlah}}</td><td data-label="nama" class="text-left align-middle">{{nama}}</td><td class="text-right align-middle" data-label="harga_tampil"><input type="number" class="form-control form-control-sm text-right" value="0" step="1" disabled></td><td class="text-right align-middle" data-label="total_tampil">{{rupiah 0}}</td></tr>');            
            //let templateInvoiceObat = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td class="text-center align-middle" data-label="jumlah">{{jumlah}}</td><td data-label="nama" class="text-left align-middle">{{nama}}</td><td class="text-right align-middle" data-label="harga"><input type="number" class="form-control form-control-sm text-right" value="{{harga}}" step="1"></td><td class="text-right align-middle" data-label="total">{{total-rupiah jumlah harga}}</td></tr>');            
            
            $.when(this.icd9DataBind()).done(function(response) {
                $.map(response.data, function(item) {
                    const icd = new Icd9(item);
                    self.icd9.push(icd);
                })
                fillTable($targetIcd9, self.icd9, templateIcd);
            });

            $.when(this.icd10DataBind()).done(function(response) {
                $.map(response.data, function(item) {
                    console.log(item);
                    const icd = new Icd10(item);
                    self.icd10.push(icd);
                })
                fillTable($targetIcd10, self.icd10, templateIcd10);
            });

            $.when(this.rencanaKontrolDataBind()).done(function(response) {
                $.map(response.data, function(item) {
                    console.log(item);
                    const rencanaControl = new RencanaControl(item);
                    self.rencana_kontrol.push(rencanaControl);
                })
                fillTable($targetRencanaKontrol, self.rencana_kontrol, templateRencanaKontrol);
            });          
            
            $.when(this.laboratoryDataBind()).done(function(response) {
                $.map(response.data, function(item) {
                    console.log(item);
                    const lab = new Laboratorium(item);
                    self.laboratorium.push(lab);
                })
                fillTable($targetLab, self.laboratorium, templateLab);
            });             

            $.when(this.radiologyDataBind()).done(function(response) {
                $.map(response.data, function(item) {
                    console.log(item);
                    const rad = new Radiologi(item);
                    self.radiologi.push(rad);
                })
                fillTable($targetRad, self.radiologi, templateRad);
            });               

            $.when(this.pemeriksaanFisikDataBind()).done(function(response) {
                fillTablePemeriksaanFisik(response.data)
            });            

            // $.when(this.layananDataBind()).done(function(response) {
            //     $.map(response.data, function(item) {
            //         const layanan = new Layanan(item);
            //         console.log(layanan);
            //         self.layanan.push(layanan);
            //     })
            //     fillTable($targetLayanan, self.layanan, templateLayanan);
            //     fillTable($('#tableInvoiceLayanan'), self.layanan, templateInvoiceLayanan);                            
            // });

            // $.when(this.obatDataBind()).done(function(response) {
            //     $.map(response.data, function(item) {
            //         let stok = (self.jenis_pemeriksaan === "Umum") ? item.stok : self.sisa_paket;
            //         const obat = new Obat({id: item.id, nama: item.nama, harga: item.harga, stok: stok, jumlah: item.jumlah});
            //         self.obat.push(obat);
            //     })
            //     fillTable($targetObat, self.obat, templateObat);
            //     if (self.jenis_pemeriksaan === 'Paket Layanan') {
            //         if (self.id_reference) {
            //             fillTable($('#tableInvoiceObat'), self.obat, templateInvoiceObatPaket);                                                                    
            //         }else{
            //             fillTable($('#tableInvoiceObat'), self.obat, templateInvoiceObat);                                                                                            
            //         }
            //     }else{
            //         fillTable($('#tableInvoiceObat'), self.obat, templateInvoiceObat);                        
            //     }    
            //     fillTable($('#tableInvoicePaket'), self.obat, templateInvoiceObat);                                
            // });             

            // $.when(this.obatDataTambahanBind()).done(function(response) {
            //     if (self.jenis_pemeriksaan === 'Umum') 
            //         return false;
            //     $.map(response.data, function(item) {
            //         const obat = new Obat({id: item.id, nama: item.nama, harga: item.harga, stok: item.stok, jumlah: item.jumlah});
            //         self.obat_tambahan.push(obat);
            //     })
            //     fillTable($targetObatTambahan, self.obat_tambahan, templateObat);
            //     fillTable($('#tableInvoiceObatTambahan'), self.obat_tambahan, templateInvoiceObat);                                            
            // });                 
                        
            $.when(this.obatDataBind(), this.obatDataTambahanBind(), this.layananDataBind()).done(function(responseObat, responseObatTambahan, responseLayanan) {
                if (responseObat.status) {
                    $.map(responseObat.data, function(item) {
                        let stok = (self.jenis_pemeriksaan === "Umum") ? item.stok : self.sisa_paket;
                        const obat = new Obat({id: item.id, nama: item.nama, harga: item.harga, stok: stok, jumlah: item.jumlah});
                        self.obat.push(obat);
                    })
                    fillTable($targetObat, self.obat, templateObat);
                }
                if (responseObatTambahan.status && self.jenis_pemeriksaan !== 'Umum') {
                    $.map(responseObatTambahan.data, function(item) {
                        const obat = new Obat({id: item.id, nama: item.nama, harga: item.harga, stok: item.stok, jumlah: item.jumlah});
                        self.obat_tambahan.push(obat);
                    })
                    fillTable($targetObatTambahan, self.obat_tambahan, templateObat);
                }                
                if (responseLayanan.status) {
                    $.map(responseLayanan.data, function(item) {
                        const layanan = new Layanan(item);
                        self.layanan.push(layanan);
                    })
                    fillTable($targetLayanan, self.layanan, templateLayanan);
                }       
                //debugger;
                //console.log(GetStateIndex());   
                if(GetStateIndex() == 2){
                    self.renderPayment();
                }
            });
        };
        this.icd9DataBind = async function() {
            return $.ajax({
                url: BASE_URL + 'Registrasi/getRegisterIcd9',
                type: "POST",
                data: JSON.stringify({ id: this.id }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        };
        this.icd10DataBind = async function() {
            return $.ajax({
                url: BASE_URL + 'Registrasi/getRegisterIcd10',
                type: "POST",
                data: JSON.stringify({ id: this.id }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        };
        this.layananDataBind = async function () {
            return $.ajax({
                url: BASE_URL + 'Registrasi/getRegisterLayanan',
                type: "POST",
                data: JSON.stringify({ id: this.id }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        };     
        this.pemeriksaanFisikDataBind = async function () {
            return $.ajax({
                url: BASE_URL + 'Registrasi/getRegisterPemeriksaanFisik',
                type: "POST",
                data: JSON.stringify({ id: this.id }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        };    
        this.laboratoryDataBind = async function () {
            return $.ajax({
                url: BASE_URL + 'Registrasi/getRegisterLaboratory',
                type: "POST",
                data: JSON.stringify({ id: this.id }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        };  
        this.radiologyDataBind = async function () {
            return $.ajax({
                url: BASE_URL + 'Registrasi/getRegisterRadiology',
                type: "POST",
                data: JSON.stringify({ id: this.id }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        };                    
        this.obatDataBind = async function () {
            return $.ajax({
                url: BASE_URL + 'Registrasi/getRegisterObat',
                type: "POST",
                data: JSON.stringify({ id: this.id, jenis_pemeriksaan: this.jenis_pemeriksaan }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        };         
        this.obatDataTambahanBind = async function () {
            return $.ajax({
                url: BASE_URL + 'Registrasi/getRegisterObat',
                type: "POST",
                data: JSON.stringify({ id: this.id, jenis_pemeriksaan: "Umum" }),
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
        this.getStep2 = function() {
            //this.id = $('#inputIdRegistrasi').val();
            //this.no_registrasi = $('#inputNoReg').val();
            this.tanggal_periksa = moment($('#dateTanggalPeriksa').datetimepicker('viewDate')).format('YYYY-MM-DD');
            let unit_layanan = $('#inputUnitLayanan').find("option:selected").data('item');                        
            this.unit_layanan = unit_layanan;
            //this.unit_layanan = $('#inputUnitLayanan').val();
            let dokter = $('#inputDokterUnitLayanan').find("option:selected").data('item'); 
            this.dokter = dokter;            

            this.tipe_pasien = $('#inputTipePasien').val();
            this.keterangan1 = $('#inputKeterangan1').val();
            this.keterangan2 = $('#inputKeterangan2').val();            
            this.keterangan3 = $('#inputKeterangan3').val();   
            this.jenis_pemeriksaan = $('#inputJenisPemeriksaan').val();                                 

            this.tacc = $('#inputTacc').val();
            this.keluhan = $('#inputKeluhan').val();
            this.kesadaran = $('#inputKesadaran').val();
            this.sistol = $('#inputSistol').val();
            this.diastole = $('#inputDiastole').val();
            this.berat_badan = $('#inputBeratBadan').val();
            this.tinggi_badan = $('#inputTinggiBadan').val();
            this.resp_rate = $('#inputRespRate').val();    
            this.heart_rate = $('#inputHeartRate').val();  

            this.pasien = patient
        };
        this.getStep3 = function() {
            const $targetObat = $('#tableObat');            
            let templateObat = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="{{jumlah}}" step="1" max="{{stok}}"></td><td data-label="nama" class="text-left align-middle">{{nama}}</td><td class="" data-label="harga">{{rupiah harga}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');
            this.tanggal_pemeriksaan = moment($('#dateTanggalPemeriksaan').datetimepicker('viewDate')).format('YYYY-MM-DD');
            this.jenis_pemeriksaan = $('#inputJenisPemeriksaan').val();
            this.diagnosa = $('#inputDiagnosa').val();
            this.keterangan2 = $('#inputKeterangan2').val();

            if(this.jenis_pemeriksaan !== 'Umum'){
                this.id_paket = $('#inputJenisPaket').val();
                this.harga_paket = $('#inputJenisPaket').find(':selected').data('harga');
                this.stok_opname = $('#inputJenisPaket').find(':selected').data('stok');
                this.nama_paket = $('#inputJenisPaket').find(':selected').text();         
                this.jumlah_paket = $('#inputJumlahPaket').val();                         
                this.tanggal_kunjungan_selanjutnya = moment($('#dateTanggalKunjunganSelanjutnya').datetimepicker('viewDate')).format('YYYY-MM-DD');
                this.tujuan_kunjungan_selanjutnya = $('#inputTujuanKunjunganSelanjutnya').val();
                //this.sisa_paket = $('#inputSisaPaket').val();
                //this.id_reference = $('#inputIdReference').val();
                const obat = new Obat({id: this.id_paket, nama: this.nama_paket, harga: this.harga_paket, stok: this.sisa_paket, jumlah: 1});                
                this.obat = [];
                this.obat.push(obat);                
                fillTable($targetObat, this.obat, templateObat);                
                toggleInputPaket(true, parseInt(this.sisa_paket), null)                
            } 
            else{
                this.id_paket = null;
                this.harga_paket = null;
                this.stok_opname = null;
                this.nama_paket = null;
                this.tanggal_kunjungan_selanjutnya = null;
                this.tujuan_kunjungan_selanjutnya = null;
                //this.obat = [];
                fillTable($targetObat, this.obat, templateObat);                
                toggleInputPaket(false, null, null)                          
                $('#inputJenisPaket').val('');
                $('#inputTujuanKunjunganSelanjutnya').val('');
                $('#inputJumlahPaket').val('');                  
            }
        };
        this.getStep4 = function() {
            this.tanggal_penyerahan_resep = moment($('#dateTanggalPenyerahanResep').datetimepicker('viewDate')).format('YYYY-MM-DD');
            this.keterangan3 = $('#inputKeterangan3').val();
            this.renderPayment();            
        };
    }
}

//var patient;
//var encounter;

// Expose this obj as a global for debugging
window.encounter = new Encounter({ id: 0, no_registrasi: null });

(function($) {
    'use strict'
    //encounter.pasien = patient;
    //encounter.render();
    //handleStep1();
    handleStep2();
    handleStep3();
    handleStep5();
    //handleIcd10();
    //handleIcd9();
    //handleLayanan();  
})(jQuery);

function handleStep5(){
    $('#tableInvoiceLayanan').find('tbody').on('blur', 'td[data-label="harga"] input', function() {
        const index_exist = $(this).closest('td').parent()[0].sectionRowIndex;
        const harga = parseInt($(this).val());
        encounter.layanan[index_exist].harga = harga;        
        const jumlah = encounter.layanan[index_exist].jumlah;
        const total = jumlah * harga;
        $(this).closest('tr').find('td[data-label="total"]').html(rupiah(total));
        calculate();
    });

    $('#tableInvoiceObat').find('tbody').on('blur', 'td[data-label="harga"] input', function() {
        const index_exist = $(this).closest('td').parent()[0].sectionRowIndex;        
        const harga = parseInt($(this).val());
        console.log(harga);
        console.log(encounter.obat[index_exist]);
        encounter.obat[index_exist].harga = harga;                   
        const jumlah = encounter.obat[index_exist].jumlah;
        const total = jumlah * harga;
        $(this).closest('tr').find('td[data-label="total"]').html(rupiah(total));
        calculate();
    });

    $('#tableInvoiceObatTambahan').find('tbody').on('blur', 'td[data-label="harga"] input', function() {
        const index_exist = $(this).closest('td').parent()[0].sectionRowIndex;        
        const harga = parseInt($(this).val());
        encounter.obat_tambahan[index_exist].harga = harga;           
        const jumlah = encounter.obat_tambahan[index_exist].jumlah;
        const total = jumlah * harga;
        $(this).closest('tr').find('td[data-label="total"]').html(rupiah(total));
        calculate();
    });    

    $('#tableInvoiceLab').find('tbody').on('blur', 'td[data-label="harga"] input', function() {
        const index_exist = $(this).closest('td').parent()[0].sectionRowIndex;
        const harga = parseInt($(this).val());
        encounter.laboratorium[index_exist].harga = harga;        
        const total = harga;
        $(this).closest('tr').find('td[data-label="total"]').html(rupiah(total));
        calculate();
    });

    $('#tableInvoiceRad').find('tbody').on('blur', 'td[data-label="harga"] input', function() {
        const index_exist = $(this).closest('td').parent()[0].sectionRowIndex;
        const harga = parseInt($(this).val());
        encounter.radiologi[index_exist].harga = harga;        
        const total = harga;
        $(this).closest('tr').find('td[data-label="total"]').html(rupiah(total));
        calculate();
    });

    $('#btnTambahan').on('click', function() {
        const jumlah = $('#inputJumlahTambahan').val();
        const nama = $('#inputNamaTambahan').val();
        const harga = $('#inputHargaTambahan').val();

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
        const tambahan = new Tambahan({nama: nama, harga: harga, jumlah: jumlah});
        encounter.tambahan.push(tambahan);

        $('#inputJumlahTambahan').val(1);
        $('#inputJumlahTambahan').focus();
        $('#inputNamaTambahan').val('');
        $('#inputHargaTambahan').val('');
        if ($('#tableInvoiceTambahan').find('tbody tr td[data-label="empty_row"]').length > 0)
            $('#tableInvoiceTambahan').find('tbody').empty();

        $('#tableInvoiceTambahan').find('tbody').append(`<tr><td class="text-center align-middle" data-label="jumlah"><input type="number" class="form-control form-control-sm text-center" value="${jumlah}" step="1" min="1"></td><td class="text-left align-middle" data-label="nama">${nama}</td><td class="text-right align-middle" data-label="harga"><input type="number" class="form-control form-control-sm text-right" value="${parseInt(harga)}" step="1" min="0"></td><td class="text-right align-middle" data-label="total">${rupiah(parseInt(harga) * parseInt(jumlah))}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`);
        calculate();
    });    

    $('#tableInvoiceTambahan').find('tbody').on("click", "td .btn-delete", function() {
        $(this).closest('tr').remove();
        const index_exist = $(this).closest('td').parent()[0].sectionRowIndex;   
        encounter.tambahan.splice(index_exist, 1);

        if ($('#tableInvoiceTambahan').find('tbody tr').length == 0) {
            let colspan = $('#tableInvoiceTambahan').find('thead tr th').length;
            $('#tableInvoiceTambahan').find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
        }
        calculate();
    });


    $('#tableInvoiceTambahan').find('tbody').on('blur', 'td[data-label="jumlah"] input', function() {
        const index_exist = $(this).closest('td').parent()[0].sectionRowIndex;           
        let jumlah = $(this).val();
        if (jumlah === '') {
            $(this).val(1);
            jumlah = 1;
        }
        encounter.tambahan[index_exist].jumlah = parseInt(jumlah);           
        const harga = encounter.tambahan[index_exist].harga;
        const total = parseInt(jumlah) * parseInt(harga);
        $(this).closest('tr').find('td[data-label="total"]').html(rupiah(total));
        calculate();
    });


    $('#tableInvoiceTambahan').find('tbody').on('blur', 'td[data-label="harga"] input', function() {
        const index_exist = $(this).closest('td').parent()[0].sectionRowIndex;                   
        let harga = $(this).val();
        if (harga === '') {
            $(this).val(0);
            harga = 0;
        }
        encounter.tambahan[index_exist].harga = parseInt(harga);                   
        const jumlah = encounter.tambahan[index_exist].jumlah;
        const total = parseInt(jumlah) * parseInt(harga);
        $(this).closest('tr').find('td[data-label="total"]').html(rupiah(total));
        calculate();
    });    

    $('#inputDiskon').on('blur', function() {
        calculate();
    });

    $('#inputPajak').on('blur', function() {
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
        
        const cara_bayar = new CaraBayar({id: id, nama: caraBayar, harga: jumlahBayar, akun: akun});
        encounter.cara_bayar.push(cara_bayar);

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
        $('#inputCaraBayar').val("");
    });

    $('#tableCaraBayar').find('tbody').on("click", "td .btn-delete", function() {
        $(this).closest('tr').remove();
        const index_exist = $(this).closest('td').parent()[0].sectionRowIndex;   
        encounter.cara_bayar.splice(index_exist, 1);

        if ($('#tableCaraBayar').find('tbody tr').length == 0) {
            let colspan = $('#tableCaraBayar').find('thead tr th').length;
            $('#tableCaraBayar').find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
        }
        calculate();
    });

    $('#tableCaraBayar').find('tbody').on('blur', 'td[data-label="harga"] input', function() {
        const index_exist = $(this).closest('td').parent()[0].sectionRowIndex;           
        let harga = $(this).val();
        encounter.cara_bayar[index_exist].harga = parseInt(harga);           
        calculate();
    });    

    $('#btnPembayaran').on('click', function() {
        var $btn = $(this);
        var id = $('#inputIdRegistrasi').val();
        if ((!encounter.id) || (encounter.id !== 0)) {
            let totalTagihan = clearRupiah($('#spanTotalTagihan').html());
            let $tableCaraBayar = $('#tableCaraBayar');
            //let jBayar = fnTableToObject($tableCaraBayar);
            //let totalBayar = jBayar.map(jBayar => parseInt(jBayar.harga)).reduce((harga, jBayar) => parseInt(jBayar) + parseInt(harga), 0);
            let totalBayar = encounter.cara_bayar.map(jBayar => jBayar.harga).reduce((harga, jBayar) => jBayar + harga, 0);
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

                $.each(encounter.cara_bayar, function(_key, v) {
                    if (v.akun === 111) {
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
                } else if ((totalBayar > totalTagihan) && (encounter.cara_bayar[inTunai].harga < kembalian)) {
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
                                bayar(encounter.id);
                                //console.log("bayar");
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
}
function handleStep3() {
    let togglePaket = function() {
        if (this.value === 'Umum') {
            $("#card-paket").removeAttr("style").hide();
        } else {
            $("#card-paket").removeAttr("style").show();
        }
    };
    $('#inputJenisPemeriksaan').on('change', togglePaket);

    $('#modal-registrasi').on('shown.bs.modal', function() {
        requestAnimationFrame(() =>
            $("#tableRegisterPasienUmum, #tableRegisterPasienPaket").DataTable()
            .ajax.reload(null, false)
        );
        $('#custom-tabs-one-home-tab').tab('show');
    });

    $('#custom-tabs-one-home-tab, #custom-tabs-one-profile-tab').on('shown.bs.tab', function(e) {
        requestAnimationFrame(() =>
            $("#tableRegisterPasienUmum, #tableRegisterPasienPaket").DataTable()
            .columns.adjust()
        );
    });

    $('#modal-riwayat').on('shown.bs.modal', function() {
        $("#tableRiwayatPasien").DataTable()
            .ajax.reload(null, false);
    });  

    var initialRiwayatPasien = true;
    var $tableRiwayatPasienDT = $("#tableRiwayatPasien").DataTable({
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
        ajax: function(data, callback, settings) {
            if (initialRiwayatPasien) {
                initialRiwayatPasien = false;
                callback({ data: [] }); // don't fire ajax, just return empty set
                return;
            }
            data.id_pasien = encounter.pasien.id;
            $.post(BASE_URL + 'Pasien/getRiwayatDatatable', data, function(result) {
                callback(result);
            }, "json");
        },
        columns: [
            { data: "tanggal_pemeriksaan", "render": $.fn.dataTable.render.moment('DD/MM/YYYY'), width: "110px" },
            { data: "dokter", width: "110px" },
            { data: "diagnosa", width: "110px" },
            { data: "layanan", width: "110px" },
            { data: "keterangan2", width: "110px" },
            { data: "obat", width: "110px" },
            { data: "keterangan3", width: "110px" },
            { data: "rencana_kontrol", width: "110px" },
            {
                data: "fisik",
                render: function(data, type) {
                    let col = '';
                    if (!data) {
                        return col;
                    }
                    JSON.parse(data).forEach(element => {
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
        ajax: function(data, callback, settings) {
            if (initialLoadRegUmum) {
                initialLoadRegUmum = false;
                callback({ data: [] }); // don't fire ajax, just return empty set
                return;
            }
            data.state_index = GetStateIndex();
            $.post(BASE_URL + 'Registrasi/getDatatableUmum', data, function(result) {
                callback(result);
            }, "json");
        },
        columns: [
            { data: null },
            { data: 'no_registrasi' },
            { data: "no_rm" },
            { data: "nama_pasien" },
            { data: "tanggal_periksa", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { data: "nama_unit_layanan" },
            { data: "nama_dokter" },
            { data: "tipe_pasien" },
            { data: "keterangan1" },
            { data: "tanggal_pemeriksaan", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { data: "diagnosa" },            
            { data: "jenis_pemeriksaan" },
            { data: "tanggal_kunjungan_selanjutnya", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { data: "tujuan_kunjungan_selanjutnya" },
            { data: "jumlah_paket" },
            { data: "id_paket" },
            { data: "paket_sisa" },
            { data: "total_stok_opname" },
            { data: "keterangan2" },
            { data: "tanggal_penyerahan_resep", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { data: "keterangan3" },
            { data: "tempat_lahir"},
            { data: "tanggal_lahir"},
            { data: "ktp"},
            { data: "no_telp"},
            { data: "agama"},
            { data: "golongan_darah"},
            { data: "alamat"},
            { data: "keterangan"},
            { data: "jenis_kelamin"},
            { data: "pekerjaan"},            
            { data: "id" },
            { data: "id_unit_layanan" },
            { data: "ihs_location_id" },            
            { data: "id_dokter" },
            { data: "practitioner_ihs_id" },            
            { data: "id_tipe_pasien" },
            { data: "id_pasien" },
            { data: "patient_ihs_id" },                        
            { data: "no_bpjs" },                                                
            { data: "id_reference" },
            { data: "tacc" },
            { data: "keluhan" },
            { data: "kd_sadar" },
            { data: "sistol" },
            { data: "diastole" },
            { data: "berat_badan" },
            { data: "tinggi_badan" },
            { data: "resp_rate" },
            { data: "heart_rate" },
        ],
        columnDefs: [{
                targets: [1, 2, 3],
                orderable: true
            },
            {
                targets: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
                visible: true
            },
            {
                targets: '_all',
                visible: false
            },            
            disableOrder,
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
        ajax: function(data, callback, settings) {
            if (initialLoadRegPaket) {
                initialLoadRegPaket = false;
                callback({ data: [] }); // don't fire ajax, just return empty set
                return;
            }
            data.state_index = GetStateIndex();
            $.post(BASE_URL + 'Registrasi/getDatatablePaket', data, function(result) {
                callback(result);
            }, "json");
        },
        columns: [
            { data: null },
            { data: 'no_registrasi' },
            { data: "no_rm" },
            { data: "nama_pasien" },
            { data: "tanggal_periksa", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { data: "nama_unit_layanan" },
            { data: "nama_dokter" },
            { data: "tipe_pasien" },
            { data: "keterangan1" },
            { data: "tanggal_pemeriksaan", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { data: "diagnosa" },            
            { data: "jenis_pemeriksaan" },
            { data: "tanggal_kunjungan_selanjutnya", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { data: "tujuan_kunjungan_selanjutnya" },
            { data: "jumlah_paket" },
            { data: "id_paket" },
            { data: "paket_sisa" },
            { data: "total_stok_opname" },
            { data: "keterangan2" },
            { data: "tanggal_penyerahan_resep", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { data: "keterangan3" },
            { data: "tempat_lahir"},
            { data: "tanggal_lahir"},
            { data: "ktp"},
            { data: "no_telp"},
            { data: "agama"},
            { data: "golongan_darah"},
            { data: "alamat"},
            { data: "keterangan"},
            { data: "jenis_kelamin"},
            { data: "pekerjaan"},            
            { data: "id" },
            { data: "id_unit_layanan" },
            { data: "ihs_location_id" },            
            { data: "id_dokter" },
            { data: "practitioner_ihs_id" },            
            { data: "id_tipe_pasien" },
            { data: "id_pasien" },
            { data: "patient_ihs_id" },
            { data: "no_bpjs" },                                    
            { data: "id_reference" },
            { data: "tacc" },
            { data: "keluhan" },
            { data: "kd_sadar" },
            { data: "sistol" },
            { data: "diastole" },
            { data: "berat_badan" },
            { data: "tinggi_badan" },
            { data: "resp_rate" },
            { data: "heart_rate" },            
        ],
        columnDefs: [{
                targets: [1, 2, 3],
                orderable: true
            },
            {
                targets: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
                visible: true
            },
            {
                targets: '_all',
                visible: false
            },            
            disableOrder,
            {
                targets: 0,
                data: null,
                defaultContent: '<div class="btn-group"><button class="btn btn-info btn-sm mr-0 btn-pilih">Pilih</button><button class="btn btn-danger btn-sm mr-0 btn-cancel">Batal</button></div>'
            }
        ],
    });

    $("#tableRegisterPasienUmum tbody").on('click', 'button.btn-pilih', function() {
        const rowPendaftaranDT = $tablePendaftaranUmumDT.row($(this).parents('tr')).data();
        console.log(rowPendaftaranDT);
        const id = rowPendaftaranDT.id;
        const no_registrasi = rowPendaftaranDT.no_registrasi;
        const id_pasien = rowPendaftaranDT.id_pasien;
        const nama_pasien = rowPendaftaranDT.nama_pasien;
        const no_rm = rowPendaftaranDT.no_rm;
        const unit_layanan = {
            id: rowPendaftaranDT.id_unit_layanan, nama_unit_layanan: rowPendaftaranDT.nama_unit_layanan, ihs_location_id: rowPendaftaranDT.ihs_location_id
        }
        const dokter = {
            id_dokter: rowPendaftaranDT.id_dokter, nama_dokter: rowPendaftaranDT.nama_dokter, practitioner_ihs_id: rowPendaftaranDT.practitioner_ihs_id
        }        

        patient = new Patient({ id: id_pasien, nama_pasien: nama_pasien, no_rm: no_rm });
        patient.tempat_lahir = rowPendaftaranDT.tempat_lahir;        
        patient.tanggal_lahir = rowPendaftaranDT.tanggal_lahir;
        patient.no_telp = rowPendaftaranDT.no_telp;
        patient.agama = rowPendaftaranDT.agama;
        patient.golongan_darah = rowPendaftaranDT.golongan_darah;
        patient.jenis_kelamin = rowPendaftaranDT.jenis_kelamin;
        patient.pekerjaan = rowPendaftaranDT.pekerjaan;
        patient.alamat = rowPendaftaranDT.alamat;
        patient.keterangan = rowPendaftaranDT.keterangan;
        patient.jenis_kelamin_display = rowPendaftaranDT.jenis_kelamin_display;
        patient.pekerjaan_display = rowPendaftaranDT.pekerjaan_display;
        patient.ktp = rowPendaftaranDT.ktp;
        patient.ihs_id = rowPendaftaranDT.patient_ihs_id;
        patient.no_bpjs = rowPendaftaranDT.no_bpjs;
        console.log(patient);

        //patient.tempat_lahir = rowPasienDT.tempat_lahir;
        //patient.tanggal_lahir = rowPasienDT.tanggal_lahir;
        //patient.ktp = rowPasienDT.ktp;
        //patient.ihs_id = ihs_id;
        //patient.render();

        encounter = new Encounter({ id: id, no_registrasi: no_registrasi });
        encounter.pasien = patient;
        encounter.tanggal_periksa = rowPendaftaranDT.tanggal_periksa;
        encounter.unit_layanan = unit_layanan;
        encounter.dokter = dokter;
        encounter.tipe_pasien = rowPendaftaranDT.id_tipe_pasien
        encounter.keterangan1 = rowPendaftaranDT.keterangan1;
        encounter.tanggal_pemeriksaan = rowPendaftaranDT.tanggal_pemeriksaan;
        encounter.jenis_pemeriksaan = rowPendaftaranDT.jenis_pemeriksaan;
        encounter.diagnosa = rowPendaftaranDT.diagnosa;
        encounter.keterangan2 = rowPendaftaranDT.keterangan2;
        encounter.tanggal_kunjungan_selanjutnya = null;
        encounter.tanggal_penyerahan_resep = rowPendaftaranDT.tanggal_penyerahan_resep;      
        encounter.keterangan3 = rowPendaftaranDT.keterangan3;         

        encounter.tacc = rowPendaftaranDT.tacc;         
        encounter.keluhan = rowPendaftaranDT.keluhan;         
        encounter.kd_sadar = rowPendaftaranDT.kd_sadar;         
        encounter.sistol = rowPendaftaranDT.sistol;         
        encounter.diastole = rowPendaftaranDT.diastole;         
        encounter.berat_badan = rowPendaftaranDT.berat_badan;         
        encounter.tinggi_badan = rowPendaftaranDT.tinggi_badan;         
        encounter.resp_rate = rowPendaftaranDT.resp_rate;         
        encounter.heart_rate = rowPendaftaranDT.heart_rate;         

        console.log(encounter);

        encounter.render();
        $('#modal-registrasi').modal('toggle');
    });

    $("#tableRegisterPasienPaket tbody").on('click', 'button.btn-pilih', function() {
        const rowPendaftaranDT = $tablePendaftaranPaketDT.row($(this).parents('tr')).data();
        console.log(rowPendaftaranDT);

        const id = rowPendaftaranDT.id;
        const no_registrasi = rowPendaftaranDT.no_registrasi;
        const id_pasien = rowPendaftaranDT.id_pasien;
        const nama_pasien = rowPendaftaranDT.nama_pasien;
        const no_rm = rowPendaftaranDT.no_rm;
        const unit_layanan = {
            id: rowPendaftaranDT.id_unit_layanan, nama_unit_layanan: rowPendaftaranDT.nama_unit_layanan, ihs_location_id: rowPendaftaranDT.ihs_location_id
        }
        const dokter = {
            id_dokter: rowPendaftaranDT.id_dokter, nama_dokter: rowPendaftaranDT.nama_dokter, practitioner_ihs_id: rowPendaftaranDT.practitioner_ihs_id
        }    

        patient = new Patient({ id: id_pasien, nama_pasien: nama_pasien, no_rm: no_rm });
        patient.tempat_lahir = rowPendaftaranDT.tempat_lahir;        
        patient.tanggal_lahir = rowPendaftaranDT.tanggal_lahir;
        patient.no_telp = rowPendaftaranDT.no_telp;
        patient.agama = rowPendaftaranDT.agama;
        patient.golongan_darah = rowPendaftaranDT.golongan_darah;
        patient.jenis_kelamin = rowPendaftaranDT.jenis_kelamin;
        patient.pekerjaan = rowPendaftaranDT.pekerjaan;
        patient.alamat = rowPendaftaranDT.alamat;
        patient.keterangan = rowPendaftaranDT.keterangan;
        patient.jenis_kelamin_display = rowPendaftaranDT.jenis_kelamin_display;
        patient.pekerjaan_display = rowPendaftaranDT.pekerjaan_display;
        patient.ktp = rowPendaftaranDT.ktp;
        patient.ihs_id = rowPendaftaranDT.patient_ihs_id;
        patient.no_bpjs = rowPendaftaranDT.no_bpjs;

        encounter = new Encounter({ id: id, no_registrasi: no_registrasi });
        encounter.pasien = patient;
        encounter.tanggal_periksa = rowPendaftaranDT.tanggal_periksa;
        encounter.unit_layanan = unit_layanan;
        encounter.dokter = dokter;
        encounter.tipe_pasien = rowPendaftaranDT.id_tipe_pasien
        encounter.keterangan1 = rowPendaftaranDT.keterangan1;
        encounter.tanggal_pemeriksaan = rowPendaftaranDT.tanggal_pemeriksaan;
        encounter.jenis_pemeriksaan = rowPendaftaranDT.jenis_pemeriksaan;
        encounter.diagnosa = rowPendaftaranDT.diagnosa;
        encounter.keterangan2 = rowPendaftaranDT.keterangan2;
        encounter.jenis_pemeriksaan = rowPendaftaranDT.jenis_pemeriksaan;
        encounter.tanggal_kunjungan_selanjutnya = rowPendaftaranDT.tanggal_kunjungan_selanjutnya;
        encounter.tujuan_kunjungan_selanjutnya = rowPendaftaranDT.tujuan_kunjungan_selanjutnya;
        encounter.jumlah_paket = parseInt(rowPendaftaranDT.jumlah_paket);
        encounter.id_paket = rowPendaftaranDT.id_paket;
        encounter.sisa_paket = parseInt(rowPendaftaranDT.paket_sisa);
        encounter.total_stok_opname = rowPendaftaranDT.total_stok_opname;
        encounter.id_reference = rowPendaftaranDT.id_reference;     
    
        encounter.tanggal_penyerahan_resep = rowPendaftaranDT.tanggal_penyerahan_resep;      
        encounter.keterangan3 = rowPendaftaranDT.keterangan3;  

        encounter.tacc = rowPendaftaranDT.tacc;         
        encounter.keluhan = rowPendaftaranDT.keluhan;         
        encounter.kd_sadar = rowPendaftaranDT.kd_sadar;         
        encounter.sistol = rowPendaftaranDT.sistol;         
        encounter.diastole = rowPendaftaranDT.diastole;         
        encounter.berat_badan = rowPendaftaranDT.berat_badan;         
        encounter.tinggi_badan = rowPendaftaranDT.tinggi_badan;         
        encounter.resp_rate = rowPendaftaranDT.resp_rate;         
        encounter.heart_rate = rowPendaftaranDT.heart_rate;     

        encounter.render();
        $('#modal-registrasi').modal('toggle');
    });

    $("#tableRegisterPasienUmum tbody").on('click', 'button.btn-cancel', function() {
        $('#modal-registrasi').modal('toggle');
        let data = $tablePendaftaranUmumDT.row($(this).parents('tr')).data();
        let id = data.id;

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
                    const aDelete = $.ajax({
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

                            if (encounter.id === id) {
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
        const rowPendaftaranDT = $tablePendaftaranPaketDT.row($(this).parents('tr')).data();
        const id = rowPendaftaranDT.id;
        const id_reference = rowPendaftaranDT.id_reference;
        const paket_sisa = rowPendaftaranDT.paket_sisa;

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
                    const aDelete = $.ajax({
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

                            if (encounter.id === id) {
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
}

function handleStep2() {
    let onSelectedIndexChanged = function() {
        var ajaxURL = BASE_URL + 'RawatJalan/getDokterUnitLayananAjax';
        var id = $(this).val();
        $.ajax({
            url: ajaxURL,
            method: "GET",
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
                if (encounter.dokter) {
                    if ($("#inputDokterUnitLayanan option[value='" + encounter.dokter.id_dokter + "']").length > 0) {
                        $('#inputDokterUnitLayanan').val(encounter.dokter.id_dokter);
                    }
                }
            }
        });
    }
    $('#inputUnitLayanan').on('change', onSelectedIndexChanged);

    // $.getJSON(BASE_URL + 'pcare/kesadaran', function(data) {
    //     let $comboKesadaran = $('#inputKesadaran');
    //     let comboKesadaran = {
    //         $combo: $comboKesadaran,
    //         dataSource: data.response.list,
    //         dataTextField: 'nmSadar',
    //         dataValueField: 'kdSadar'
    //     };        
    //     bindCombo(comboKesadaran);    
    // })    
}

function toggleInputPaket(active, sisa_paket, id_reference){
	if(active){
        if(id_reference){
            $('#inputJenisPemeriksaan').prop('disabled', true);
            $('#inputJumlahPaket').prop('disabled', true);
            $('#inputJenisPaket').prop('disabled', true);
            $("#inputCaraBayar").attr('disabled', false);            
        }
        $("#spanRincianObatPaket").removeAttr("style").show();
        $("#spanRincianObatUmum").removeAttr("style").hide();        
        $("#inputRincianObat").removeAttr("style").hide();
        $("#tableObat tbody tr td .btn-delete").removeAttr("style").hide();        
        $("#form-group-obat-tambahan").removeAttr("style").show();        
        $("#inputCaraBayar").attr('disabled', false);
        $("#inputCaraBayar option[data-akun='211']").attr('selected', false);
        $("#spanRincianObatPaket").removeAttr("style").show();
        $("#spanRincianObatUmum").removeAttr("style").hide();
        $("#span-invoice-obat").removeAttr("style").show();
        $("#rincian_obat_tambahan").removeAttr("style").show();        
	}
	else{
		$('#inputJenisPemeriksaan').prop('disabled', false);
		$('#inputJumlahPaket').prop('disabled', false);
		$('#inputJenisPaket').prop('disabled', false);
		$("#inputCaraBayar").attr('disabled', false); 
        $("#inputCaraBayar option[data-akun='211']").attr('selected', false);
        $("#spanRincianObatPaket").removeAttr("style").hide();
        $("#spanRincianObatUmum").removeAttr("style").show();
        $("#span-invoice-obat").removeAttr("style").hide();
        $("#rincian_obat_tambahan").removeAttr("style").hide();

        $("#inputRincianObat").removeAttr("style").show();
        $("#tableObat tbody tr td .btn-delete").removeAttr("style").show();        		
        $("#form-group-obat-tambahan").removeAttr("style").hide();        
	}
	toggleInputKunjunganSelanjutnya(sisa_paket)
}

function toggleInputKunjunganSelanjutnya(sisa_paket){
	if(sisa_paket === 1){
		$("#form-group-tanggal-kunjungan-selanjutnya").removeAttr("style").hide();
		$("#form-group-tujuan-kunjungan-selanjutnya").removeAttr("style").hide();		
	}
	else{
		$("#form-group-tanggal-kunjungan-selanjutnya").removeAttr("style").show();
		$("#form-group-tujuan-kunjungan-selanjutnya").removeAttr("style").show();		        		
	}
}

function calculate() {
    const jLayanan = encounter.layanan;
    const jObat = encounter.obat;
    const jPaket = encounter.obat;
    const jObatTambahan = encounter.obat_tambahan;
    const jLab = encounter.laboratorium;    
    const jRad = encounter.radiologi;        
    const jTambahan = encounter.tambahan;
    const jBayar = encounter.cara_bayar;

    let totalLayanan = jLayanan.map(jLayanan => parseInt(jLayanan.harga) * parseInt(jLayanan.jumlah)).reduce((total, jLayanan) => parseInt(jLayanan) + parseInt(total), 0);
    if (isNaN(totalLayanan)) {
        totalLayanan = 0;
    }

    let totalObat = jObat.map(jObat => parseInt(jObat.harga) * parseInt(jObat.jumlah)).reduce((total, jObat) => parseInt(jObat) + parseInt(total), 0);
    if (isNaN(totalObat)) {
        totalObat = 0;
    }

    let totalObatTambahan = jObatTambahan.map(jObatTambahan => parseInt(jObatTambahan.harga) * parseInt(jObatTambahan.jumlah)).reduce((total, jObatTambahan) => parseInt(jObatTambahan) + parseInt(total), 0);
    if (isNaN(totalObatTambahan)) {
        totalObatTambahan = 0;
    }

    let totalPaket = jPaket.map(jObat => parseInt(jObat.harga) * parseInt(encounter.jumlah_paket)).reduce((total, jObat) => parseInt(jObat) + parseInt(total), 0);
    //let totalPaket = encounter.harga_paket * encounter.jumlah_paket;
    if (isNaN(totalPaket)) {
        totalPaket = 0;
    }

    let totalTambahan = jTambahan.map(jTambahan => parseInt(jTambahan.harga) * parseInt(jTambahan.jumlah)).reduce((total, jTambahan) => parseInt(jTambahan) + parseInt(total), 0);
    if (isNaN(totalTambahan)) {
        totalTambahan = 0;
    }

    let totalLab = jLab.map(jLab => parseInt(jLab.harga)).reduce((total, jLab) => parseInt(jLab) + parseInt(total), 0);
    if (isNaN(totalLab)) {
        totalLab = 0;
    }    

    let totalRad = jRad.map(jRad => parseInt(jRad.harga)).reduce((total, jRad) => parseInt(jRad) + parseInt(total), 0);
    if (isNaN(totalRad)) {
        totalRad = 0;
    }

    let totalBayar = jBayar.map(jBayar => parseInt(jBayar.harga)).reduce((harga, jBayar) => parseInt(jBayar) + parseInt(harga), 0);
    if (isNaN(totalBayar)) {
        totalBayar = 0;
    }

    let subTotal = 0;

    if (encounter.jenis_pemeriksaan === 'Paket Layanan' && (!encounter.id_reference))
        subTotal = totalLayanan + totalPaket + totalObatTambahan + totalLab + totalRad + totalTambahan;
    else if (encounter.id_reference)
        subTotal = totalLayanan + 0 + totalObatTambahan +  + totalLab + totalRad + totalTambahan;
    else
        subTotal = totalLayanan + totalObat + totalObatTambahan  + totalLab + totalRad + totalTambahan;

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

function bayar(id) {
/*
    let $tableInvoiceLayanan = $('#tableInvoiceLayanan');
    let $tableObat = $('#tableInvoiceObat');
    let $tablePaket = $('#tableInvoicePaket');
    let $tableObatTambahan = $('#tableInvoiceObatTambahan');
    let $tableTambahan = $('#tableInvoiceTambahan');
    let $tableCaraBayar = $('#tableCaraBayar');
*/
    let keterangan = $('#inputKeterangan4').val();
    //let noRegistrasi = $('#NoReg').html();

    let jLayanan = encounter.layanan;
    let jObat = encounter.obat;
    let jPaket = encounter.obat_paket;
    let jObatTambahan = encounter.obat_tambahan;
    let jTambahan = encounter.tambahan;
    let jLab = encounter.laboratorium;
    let jRad = encounter.radiologi;
    let jBayar = encounter.cara_bayar;

    console.log(encounter);
/*
    let jLayanan = fnTableToObject($tableInvoiceLayanan);
    let jObat = fnTableToObject($tableObat);
    let jPaket = fnTableToObject($tablePaket);
    let jObatTambahan = fnTableToObject($tableObatTambahan);
    let jTambahan = fnTableToObject($tableTambahan);
    let jBayar = fnTableToObject($tableCaraBayar);
*/
    let subtotal = clearRupiah($('#spanSubtotal').html());
    let diskon = clearRupiah($('#inputDiskon').val());
    let totalDiskon = clearRupiah($('#spanDiskon').html());
    let pajak = clearRupiah($('#inputPajak').val());
    let totalPajak = clearRupiah($('#spanPajak').html());
    let totalTagihan = clearRupiah($('#spanTotalTagihan').html());
    let totalBayar = clearRupiah($('#spanTotalBayar').html());
    let kembalian = clearRupiah($('#spanKembalian').html());
    let condition_code = "";

    let data = {
        id: id,
        patient: {ihs_id:encounter.pasien.ihs_id, display: encounter.pasien.nama_pasien},
        participant: {ihs_id:encounter.dokter.practitioner_ihs_id, display: encounter.dokter.nama_dokter},        
        location: {ihs_id:encounter.unit_layanan.ihs_location_id, display: encounter.unit_layanan.nama_unit_layanan},                
        condition: {code: condition_code.concat(encounter.icd10[0].icd10_code, ".", encounter.icd10[0].icd10_subcode), display: encounter.icd10[0].icd10_name_eng},
        noRegistrasi: encounter.no_registrasi,
        invoiceLayanan: jLayanan,
        invoiceObat: jObat,
        invoicePaket: jPaket,
        invoiceObatTambahan: jObatTambahan,
        invoiceTambahan: jTambahan,
        invoiceLab: jLab,
        invoiceRad: jRad,
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
    console.log(data);

    let aSave = $.ajax({
        type: "POST",
        url: BASE_URL + "Registrasi/savePembayaran",
        data: JSON.stringify(data),
        dataType: 'json',
        contentType: 'application/json; charset=utf-8'
    });

    let ihsSave = $.ajax({
        type: "POST",
        url: BASE_URL + "SatuSehat/post_rawat_jalan",
        data: JSON.stringify(data),
        dataType: 'json',
        contentType: 'application/json; charset=utf-8'
    });    

    $.when(aSave, ihsSave).done(function(responseRJ, responseIHS) {
        console.log(responseRJ);
        console.log(responseIHS);
        debugger;
        if (responseRJ[0].status) {
            console.log(responseRJ);
            console.log(responseIHS);
            
            window.open(BASE_URL + "RawatJalan/print/" + id, "_blank");
            ToastEnd.fire({
                icon: 'success',
                title: 'Data berhasil disimpan'
            });
        } else {
            if (responseRJ[0].error_code == -1) {
                ToastEnd.fire({
                    icon: 'info',
                    title: responseRJ[0].message,
                    timer: 3000
                });
            } else if (responseRJ[0].error_code == -2) {
                ToastEnd.fire({
                    icon: 'warning',
                    title: responseRJ[0].message
                });
            } else {
                ToastEnd.fire({
                    icon: 'error',
                    title: responseRJ[0].message
                });
            }
        }
    });
}