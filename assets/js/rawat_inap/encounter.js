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
class Kelas {
    constructor({ id, nama}) {
        this.id = id;
        this.nama = nama;
    }
}
class Ruangan {
    constructor({ id, nama}) {
        this.id = id;
        this.nama = nama;
    }
}
class Bed {
    constructor({ id, nama, tarif }) {
        this.id = id;
        this.nama = nama;
        this.tarif = parseInt(tarif);
        this.duration = function () {
            let now = moment(new Date()); //todays date
            let end = moment(encounter.tanggal_masuk); // another date
            let duration = moment.duration(now.diff(end));
            let days = duration.asDays();
            return Math.round(days);
        }
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
        this.kelas = null;
        this.ruangan = null;
        this.bed = {};
        this.tanggal_rujukan = null;
        this.tanggal_masuk = null;
        this.tanggal_keluar = null;

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
        this.observasi = [];        
        this.laboratorium = [];        
        this.radiologi = [];        
        this.exam = [];        
        this.obat = [];                
        this.obat_keluar = [];                

        this.tambahan = [];                
        this.cara_bayar = [];       
        this.state_index = 0;

        this.is_release = 0;

        this.save = function () {
            let param = {};

            if(this.state_index==1){                        
                param = {
                    id: this.id,
                    noRegistrasi: this.no_registrasi,
                    tanggalPeriksa: this.tanggal_periksa,
                    idUnitLayanan: this.unit_layanan.id,
                    idDokter: this.dokter.id_dokter,
                    idTipePasien: this.tipe_pasien,
                    bed: this.bed,
                    tanggalMasuk: this.tanggal_masuk,
                    stateIndex: this.state_index,              
                    pasien: this.pasien,              
                    keterangan1: this.keterangan1,  
                    keterangan2: this.keterangan2,
                    keterangan3: this.keterangan3
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
                    dataObservasi: this.observasi,
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
                    isRelease: this.is_release
                }
            }              
            return $.ajax({
                type: "POST",
                url: BASE_URL + "RawatInap/save",
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
        this.renderPayment = function () {
            var self = this;
            const $tableInvoiceObat = $('#tableInvoiceObat'); 
            const $tableInvoiceLayanan = $('#tableInvoiceLayanan'); 
            const $tableInvoiceLab = $('#tableInvoiceLab'); 
            const $tableInvoiceRad = $('#tableInvoiceRad'); 
            const $tableInvoiceKamar = $('#tableInvoiceKamar'); 

            let templateInvoiceObat = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td class="text-center align-middle" data-label="jumlah">{{jumlah}}</td><td data-label="nama" class="text-left align-middle">{{nama}}</td><td class="text-right align-middle" data-label="harga"><input type="number" class="form-control form-control-sm text-right" value="{{harga}}" step="1"></td><td class="text-right align-middle" data-label="total">{{total-rupiah jumlah harga}}</td></tr>');            
            let templateInvoiceLayanan = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td class="text-center align-middle" data-label="jumlah">{{jumlah}}</td><td data-label="nama" class="text-left align-middle">{{nama}}</td><td class="text-right align-middle" data-label="harga"><input type="number" class="form-control form-control-sm text-right" value="{{harga}}" step="1"></td><td class="text-right align-middle" data-label="total">{{total-rupiah jumlah harga}}</td></tr>');            
            let templateInvoiceLab = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td class="text-left align-middle" data-label="tanggal_lab">{{format-datetime tanggal}}</td><td data-label="nama" class="text-left align-middle">{{jenis_lab}}</td><td class="text-right align-middle" data-label="harga"><input type="number" class="form-control form-control-sm text-right" value="{{harga}}" step="1"></td><td class="text-right align-middle" data-label="total">{{rupiah harga}}</td></tr>');            
            let templateInvoiceRad = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td class="text-left align-middle" data-label="tanggal_rad">{{format-datetime tanggal}}</td><td data-label="nama" class="text-left align-middle">{{jenis_rad}}</td><td class="text-right align-middle" data-label="harga"><input type="number" class="form-control form-control-sm text-right" value="{{harga}}" step="1"></td><td class="text-right align-middle" data-label="total">{{rupiah harga}}</td></tr>');            
            let templateInvoiceKamar = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td class="text-center align-middle" data-label="jumlah">{{jumlah}}</td><td data-label="nama" class="text-left align-middle">{{nama}}</td><td class="text-right align-middle" data-label="harga"><input type="number" class="form-control form-control-sm text-right" value="{{harga}}" step="1"></td><td class="text-right align-middle" data-label="total">{{total-rupiah jumlah harga}}</td></tr>');            

            $.when(this.obatSumDataBind()).done(function (response) {
                self.obat = [];
                $.map(response.data, function (item) {
                    let obat = new Obat({ id: item.id, nama: item.nama, harga: item.harga, stok: item.stok, jumlah: item.jumlah });
                    obat.is_release = item.is_release;
                    self.obat.push(obat);
                })
                fillTable($tableInvoiceObat, self.obat, templateInvoiceObat);   
                calculate();
            });  

            fillTable($tableInvoiceLayanan, this.layanan, templateInvoiceLayanan);       
            fillTable($tableInvoiceLab, this.laboratorium, templateInvoiceLab);       
            fillTable($tableInvoiceRad, this.radiologi, templateInvoiceRad);       

            const bed = [{
                id: this.bed.id, jumlah: this.bed.duration(), nama: this.bed.nama, harga: this.bed.tarif
            }];

            fillTable($tableInvoiceKamar, bed, templateInvoiceKamar);       

            $('#TglMasuk').html(moment(this.tanggal_masuk).format("DD/MM/YYYY HH:mm"));
            $('#TglKeluar').html(moment(new Date()).format("DD/MM/YYYY HH:mm"));
                              
        };
        this.render = function() {
            var self = this;
            if(this.pasien !== {})
                $('#btn-riwayat-pasien').show();   

            this.pasien.render();
            let noRegistrasiDisplay = `${this.no_registrasi}-${this.pasien.nama_pasien}(${this.pasien.no_rm})`;
            $('#inputNoReg1').val(noRegistrasiDisplay);
            $('#inputNoReg2').val(noRegistrasiDisplay);
            $('#dateTanggalRujukan').datetimepicker('date', moment(this.tanggal_rujukan, 'YYYY-MM-DD HH:mm') );         
            $('#dateTanggalMasuk').datetimepicker('date', moment(this.tanggal_masuk, 'YYYY-MM-DD HH:mm'));        
            $('#inputKelas').val(this.kelas.id_kelas);
            $('#inputKelas').trigger('change');
            
            $('#inputUnitLayanan').val(this.unit_layanan.id);
            $('#inputUnitLayanan').trigger('change');
            $('#inputTipePasien').val(this.tipe_pasien);
            $('#inputKeterangan1').val(this.keterangan1);
			
            $('#dateTanggalPemeriksaan').datetimepicker('date', moment(this.tanggal_pemeriksaan, 'YYYY-MM-DD') );            
            $('#inputDiagnosa').val(this.diagnosa);
            $('#inputKeterangan2').val(this.keterangan2);
            $('#inputIdReference').val(this.id_reference);
            $('#dateTanggalPenyerahanResep').datetimepicker('date', moment(this.tanggal_penyerahan_resep, 'YYYY-MM-DD') );            
            $('#inputKeterangan3').val(this.keterangan3);        
            $('#NoReg').html(this.no_registrasi);
            $('#TglNota').html(TODAY);
            $('#NoRM').html(this.pasien.no_rm);
            $('#NamaPasien').html(this.pasien.nama_pasien);
            $('#NoTelp').html(this.pasien.no_telp);

            const $targetIcd10 = $('#tableIcd10');
            const $targetIcd9 = $('#tableIcd9');
            const $targetLayanan = $('#tableLayanan');
            const $targetRencanaKontrol = $('#tableRencanaKontrol');
            const $targetObservasi = $('#tableObservasi');
            const $targetLab = $('#tableLab');
            const $targetRad = $('#tableRad');

            const $targetObat = $('#tableObat');          
            const $tableObatKeluar = $('#tableObatKeluar');                      
            const $caraBayar = $('#tableCaraBayar');
            const $tableInvoiceTambahan = $('#tableInvoiceTambahan');            
            fillTable($caraBayar, [], null);
            fillTable($tableInvoiceTambahan, [], null);            

            let templateIcd10 = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td data-label="jumlah" class="text-center align-middle d-none"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="{{jumlah}}" step="1"></td><td data-label="nama" class="text-left align-middle">{{icd10_name}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button></div></td></tr>');
            let templateIcd = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td data-label="jumlah" class="text-center align-middle d-none"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="{{jumlah}}" step="1"></td><td data-label="nama" class="text-left align-middle">{{nama}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button></div></td></tr>');
            let templateLayanan = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="{{jumlah}}" step="1"></td><td data-label="nama" class="text-left align-middle">{{nama}}</td><td class="" data-label="harga">{{rupiah harga}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button></div></td></tr>');
            let templateRencanaKontrol = Handlebars.compile('<tr><td class="text-left align-middle" data-label="tanggal_kontrol">{{format-date tanggal}}</td><td class="text-left align-middle" data-label="alasan_kontrol">{{alasan}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');
            let templateObservasi = Handlebars.compile('<tr><td class="text-left align-middle" data-label="tanggal_observasi">{{format-date tanggal}}</td><td class="text-left align-middle" data-label="jam_observasi">{{format-time tanggal}}</td><td class="text-left align-middle" data-label="keterangan">{{keterangan}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');
            let templateLab = Handlebars.compile('<tr><td class="text-left align-middle" data-label="tanggal_lab">{{format-date tanggal}}</td><td class="text-left align-middle" data-label="jam_lab">{{format-time tanggal}}</td><td class="text-left align-middle" data-label="jenis_lab">{{jenis_lab}}</td><td class="text-left align-middle" data-label="status">{{status}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm">{{button-status status}}</div></td></tr>');                
            let templateRad = Handlebars.compile('<tr><td class="text-left align-middle" data-label="tanggal_rad">{{format-date tanggal}}</td><td class="text-left align-middle" data-label="jam_rad">{{format-time tanggal}}</td><td class="text-left align-middle" data-label="jenis_rad">{{jenis_rad}}</td><td class="text-left align-middle" data-label="status">{{status}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm">{{button-status status}}</div></td></tr>');    

            let templateObat = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="{{jumlah}}" step="1" max="{{stok}}" {{disable-content is_release}}></td><td data-label="nama" class="text-left align-middle">{{nama}}</td><td class="" data-label="harga">{{rupiah harga}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete {{hide-content is_release}}"><i class="fas fa-trash"></i></button><button type="button" class="btn btn-success btn-release {{show-content is_release}}" disabled><i class="fas fa-check"></i></button></div></td></tr>');
            let templateObatKeluar = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td class="text-left align-middle">{{tanggal}}</td><td data-label="jumlah" class="text-center align-middle">{{jumlah}}</td><td data-label="nama" class="text-left align-middle">{{nama}}</td><td class="" data-label="harga">{{rupiah harga}}</td></tr>');            
            $.when(this.icd9DataBind()).done(function(response) {
                $.map(response.data, function(item) {
                    const icd = new Icd9(item);
                    self.icd9.push(icd);
                })
                fillTable($targetIcd9, self.icd9, templateIcd);
            });

            $.when(this.icd10DataBind()).done(function(response) {
                $.map(response.data, function(item) {
                    const icd = new Icd10(item);
                    self.icd10.push(icd);
                })
                fillTable($targetIcd10, self.icd10, templateIcd10);
            });

            $.when(this.rencanaKontrolDataBind()).done(function(response) {
                $.map(response.data, function(item) {
                    const rencanaControl = new RencanaControl(item);
                    self.rencana_kontrol.push(rencanaControl);
                })
                fillTable($targetRencanaKontrol, self.rencana_kontrol, templateRencanaKontrol);
            });          

            $.when(this.observasiDataBind()).done(function (response) {
                $.map(response.data, function (item) {
                    const observasi = new Observasi(item);
                    self.observasi.push(observasi);
                })
                fillTable($targetObservasi, self.observasi, templateObservasi);
            }); 
            
            $.when(this.laboratoryDataBind()).done(function(response) {
                $.map(response.data, function(item) {
                    const lab = new Laboratorium(item);
                    self.laboratorium.push(lab);
                })
                fillTable($targetLab, self.laboratorium, templateLab);
            });             

            $.when(this.radiologyDataBind()).done(function(response) {
                $.map(response.data, function(item) {
                    const rad = new Radiologi(item);
                    self.radiologi.push(rad);
                })
                fillTable($targetRad, self.radiologi, templateRad);
            });               

            $.when(this.pemeriksaanFisikDataBind()).done(function(response) {
                fillTablePemeriksaanFisik(response.data)
            });            
                                     
            $.when(this.obatDataBind(), this.obatKeluarDataBind(), this.layananDataBind()).done(function (responseObat, responseObatKeluar, responseLayanan) {
                if (responseObat.status) {
                    $.map(responseObat.data, function(item) {
                        let stok = (self.jenis_pemeriksaan === "Umum") ? item.stok : self.sisa_paket;
                        let obat = new Obat({ id: item.id, nama: item.nama, harga: item.harga, stok: stok, jumlah: item.jumlah });
                        obat.is_release = item.is_release;
                        self.obat.push(obat);
                    })
                    fillTable($targetObat, self.obat, templateObat);
                }
                if (responseObatKeluar.status) {
                    $.map(responseObatKeluar.data, function (item) {
                        let obat = new Obat({ id: item.id, nama: item.nama, harga: item.harga, stok: item.stok, jumlah: item.jumlah });
                        obat.tanggal = item.tanggal;
                        self.obat_keluar.push(obat);
                    })
                    fillTable($tableObatKeluar, self.obat_keluar, templateObatKeluar);
                }
                if (responseLayanan.status) {
                    $.map(responseLayanan.data, function(item) {
                        const layanan = new Layanan(item);
                        self.layanan.push(layanan);
                    })
                    fillTable($targetLayanan, self.layanan, templateLayanan);
                }       

                if(GetStateIndex() == 3){
                    self.renderPayment();
                }
            });
        };
        this.icd9DataBind = async function() {
            return $.ajax({
                url: BASE_URL + 'RawatInap/getRegisterIcd9',
                type: "POST",
                data: JSON.stringify({ id: this.id }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        };
        this.icd10DataBind = async function() {
            return $.ajax({
                url: BASE_URL + 'RawatInap/getRegisterIcd10',
                type: "POST",
                data: JSON.stringify({ id: this.id }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        };
        this.layananDataBind = async function () {
            return $.ajax({
                url: BASE_URL + 'RawatInap/getRegisterLayanan',
                type: "POST",
                data: JSON.stringify({ id: this.id }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        };     
        this.pemeriksaanFisikDataBind = async function () {
            return $.ajax({
                url: BASE_URL + 'RawatInap/getRegisterPemeriksaanFisik',
                type: "POST",
                data: JSON.stringify({ id: this.id }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        };    
        this.laboratoryDataBind = async function () {
            return $.ajax({
                url: BASE_URL + 'RawatInap/getRegisterLaboratory',
                type: "POST",
                data: JSON.stringify({ id: this.id }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        };  
        this.radiologyDataBind = async function () {
            return $.ajax({
                url: BASE_URL + 'RawatInap/getRegisterRadiology',
                type: "POST",
                data: JSON.stringify({ id: this.id }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        };                    
        this.obatDataBind = async function () {
            return $.ajax({
                url: BASE_URL + 'RawatInap/getRegisterObat',
                type: "POST",
                data: JSON.stringify({ id: this.id}),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        };  
        this.obatKeluarDataBind = async function () {
            return $.ajax({
                url: BASE_URL + 'RawatInap/getObatKeluar',
                type: "POST",
                data: JSON.stringify({ id: this.id }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        };          
        this.rencanaKontrolDataBind = function () {
            return $.ajax({
                url: BASE_URL + 'RawatInap/getRegisterRencanaKontrol',
                type: "POST",
                data: JSON.stringify({ id: this.id }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        };          
        this.observasiDataBind = function () {
            return $.ajax({
                url: BASE_URL + 'RawatInap/getObservasi',
                type: "POST",
                data: JSON.stringify({ id: this.id }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        };  
        this.obatSumDataBind = async function () {
            return $.ajax({
                url: BASE_URL + 'RawatInap/getSumRegisterObat',
                type: "POST",
                data: JSON.stringify({ id: this.id }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
        };  
        this.getStep2 = function() {
            this.tanggal_periksa = moment($('#dateTanggalPeriksa').datetimepicker('viewDate')).format('YYYY-MM-DD');
            let unit_layanan = $('#inputUnitLayanan').find("option:selected").data('item');                        
            this.unit_layanan = unit_layanan;
            let dokter = $('#inputDokterUnitLayanan').find("option:selected").data('item'); 
            this.dokter = dokter;            
            this.kelas = $('#inputKelas').val();
            this.ruangan = $('#inputRuangan').val();
            const bed_item = $('#inputBed').find("option:selected").data('item'); 
            this.bed = new Bed({ id: bed_item.id, nama: bed_item.nama_bed, tarif: parseInt(bed_item.tarif) });
            this.tipe_pasien = $('#inputTipePasien').val();
            this.keterangan1 = $('#inputKeterangan1').val();
            this.keterangan2 = $('#inputKeterangan2').val();            
            this.keterangan3 = $('#inputKeterangan3').val();   
            this.tanggal_masuk = moment($('#dateTanggalMasuk').datetimepicker('viewDate')).format('YYYY-MM-DD HH:mm:ss');
            this.pasien = patient
        };
        this.getStep3 = function() {
            this.tanggal_pemeriksaan = moment($('#dateTanggalPemeriksaan').datetimepicker('viewDate')).format('YYYY-MM-DD');
            this.diagnosa = $('#inputDiagnosa').val();
            this.keterangan2 = $('#inputKeterangan2').val();
        };
        this.getStep4 = function() {
            this.tanggal_penyerahan_resep = moment($('#dateTanggalPenyerahanResep').datetimepicker('viewDate')).format('YYYY-MM-DD');
            this.keterangan3 = $('#inputKeterangan3').val();                       
        };
    }
}

// Expose this obj as a global for debugging
window.encounter = new Encounter({ id: 0, no_registrasi: null });

(function($) {
    'use strict'
    handleStep2();
    handleStep3();
    handleStep5();
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
        encounter.obat[index_exist].harga = harga;                   
        const jumlah = encounter.obat[index_exist].jumlah;
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

    $('#tableInvoiceKamar').find('tbody').on('blur', 'td[data-label="harga"] input', function () {
        const harga = parseInt($(this).val());
        const jumlah = encounter.bed.duration();
        encounter.bed.tarif = harga;
        const total = harga * parseInt(jumlah);
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
    $('#modal-registrasi').on('shown.bs.modal', function() {
        requestAnimationFrame(() =>
            $("#tableRegisterPasienUmum").DataTable()
            .ajax.reload(null, false)
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
            $.post(BASE_URL + 'RawatInap/getDatatableUmum', data, function(result) {
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
            { data: "keterangan2" },
            { data: "tanggal_penyerahan_resep", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { data: "keterangan3" },
            { data: "tanggal_rujukan", "render": $.fn.dataTable.render.moment('DD/MM/YYYY HH:mm') },
            { data: "tanggal_masuk", "render": $.fn.dataTable.render.moment('DD/MM/YYYY HH:mm') },
            { data: "id_bed" },
            { data: "nama_bed" },
            { data: "tarif" },
            { data: "id_ruangan" },
            { data: "nama_ruangan" },
            { data: "id_kelas" },
            { data: "nama_kelas" },
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
        encounter.diagnosa = rowPendaftaranDT.diagnosa;
        encounter.keterangan2 = rowPendaftaranDT.keterangan2;
        encounter.tanggal_kunjungan_selanjutnya = null;
        encounter.tanggal_penyerahan_resep = rowPendaftaranDT.tanggal_penyerahan_resep;      
        encounter.keterangan3 = rowPendaftaranDT.keterangan3;         
        encounter.tanggal_rujukan = rowPendaftaranDT.tanggal_rujukan;         
        encounter.tanggal_masuk = rowPendaftaranDT.tanggal_masuk; 
        encounter.tanggal_masuk = rowPendaftaranDT.tanggal_masuk; 
        const kelas = {
            id_kelas: rowPendaftaranDT.id_kelas, nama_kelas: rowPendaftaranDT.nama_kelas
        } 
        const ruangan = {
            id_ruangan: rowPendaftaranDT.id_ruangan, nama_ruangan: rowPendaftaranDT.nama_ruangan
        } 
        const bed = new Bed({ id: rowPendaftaranDT.id_bed, nama: rowPendaftaranDT.nama_bed, tarif: parseInt(rowPendaftaranDT.tarif) });
        encounter.kelas = kelas;
        encounter.ruangan = ruangan; 
        encounter.bed = bed; 
		
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
                        url: BASE_URL + "RawatInap/delete",
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

    let onKelasSelectedIndexChanged = function () {
        var ajaxURL = BASE_URL + 'RawatInap/getRuangan';
        var id = $(this).val();
        $.ajax({
            url: ajaxURL,
            method: "GET",
            data: {
                id: id
            },
            async: true,
            dataType: 'json',
            success: function (data) {
                let $comboChild = $('#inputRuangan');
                $comboChild.empty();
                $comboChild.append('<option selected disabled>--pilih ruangan--</option>');
                let comboRuangan = {
                    $combo: $comboChild,
                    dataSource: data.data,
                    dataTextField: 'nama_ruangan',
                    dataValueField: 'id'
                };

                bindCombo(comboRuangan);
                if (encounter.ruangan) {
                    if ($("#inputRuangan option[value='" + encounter.ruangan.id_ruangan + "']").length > 0) {
                        $('#inputRuangan').val(encounter.ruangan.id_ruangan);
                    }
                }
                $('#inputRuangan').trigger('change');
            }
        });
    } 
    $('#inputKelas').on('change', onKelasSelectedIndexChanged);

    let onRuanganSelectedIndexChanged = function () {
        var ajaxURL = BASE_URL + 'RawatInap/getBed';
        var id = $(this).val();
        $.ajax({
            url: ajaxURL,
            method: "GET",
            data: {
                id: id
            },
            async: true,
            dataType: 'json',
            success: function (data) {
                let $comboChild = $('#inputBed');
                $comboChild.empty();
                $comboChild.append('<option selected disabled>--pilih bed--</option>');
                let comboBed= {
                    $combo: $comboChild,
                    dataSource: data.data,
                    dataTextField: 'nama_bed',
                    dataValueField: 'id'
                };

                bindCombo(comboBed);
                if (encounter.bed) {
                    if ($("#inputBed option[value='" + encounter.bed.id + "']").length > 0) {
                        $('#inputBed').val(encounter.bed.id);
                    }
                }
            }
        });
    }
    $('#inputRuangan').on('change', onRuanganSelectedIndexChanged);
}

function calculate() {
    const jLayanan = encounter.layanan;
    const jObat = encounter.obat;
    const jLab = encounter.laboratorium;    
    const jRad = encounter.radiologi;        
    const jTambahan = encounter.tambahan;
    const jBayar = encounter.cara_bayar;

    const bed = {
        id: encounter.bed.id, jumlah: encounter.bed.duration(), nama: encounter.bed.nama, harga: encounter.bed.tarif
    };

    let totalKamar = bed.jumlah * bed.harga;
    if (isNaN(totalKamar)) {
        totalKamar = 0;
    }

    let totalLayanan = jLayanan.map(jLayanan => parseInt(jLayanan.harga) * parseInt(jLayanan.jumlah)).reduce((total, jLayanan) => parseInt(jLayanan) + parseInt(total), 0);
    if (isNaN(totalLayanan)) {
        totalLayanan = 0;
    }

    let totalObat = jObat.map(jObat => parseInt(jObat.harga) * parseInt(jObat.jumlah)).reduce((total, jObat) => parseInt(jObat) + parseInt(total), 0);
    if (isNaN(totalObat)) {
        totalObat = 0;
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
    subTotal = totalLayanan + totalObat + totalLab + totalRad + totalTambahan + totalKamar;

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
    let keterangan = $('#inputKeterangan4').val();
	
    let jLayanan = encounter.layanan;
    let jObat = encounter.obat;
    let jTambahan = encounter.tambahan;
    let jLab = encounter.laboratorium;
    let jRad = encounter.radiologi;
    let jBayar = encounter.cara_bayar;

    const jKamar = {
        id: encounter.bed.id, jumlah: encounter.bed.duration(), nama: encounter.bed.nama, harga: encounter.bed.tarif
    };
	
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
        invoiceTambahan: jTambahan,
        invoiceLab: jLab,
        invoiceRad: jRad,
        invoiceKamar: jKamar,
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
        url: BASE_URL + "RawatInap/savePembayaran",
        data: JSON.stringify(data),
        dataType: 'json',
        contentType: 'application/json; charset=utf-8'
    });

    let ihsSave = $.ajax({
        type: "POST",
        url: BASE_URL + "SatuSehat/post_rawat_inap",
        data: JSON.stringify(data),
        dataType: 'json',
        contentType: 'application/json; charset=utf-8'
    });    

    $.when(aSave, ihsSave).done(function(responseRJ, responseIHS) {
        if (responseRJ[0].status) {            
            window.open(BASE_URL + "RawatInap/print/" + id, "_blank");
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
            $btn.prop('disabled', false);
        }
    });
}