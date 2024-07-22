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
        pekerjaan_display,
        ktp,
        ihs_id = null
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
        this.ktp = ktp;
        this.ihs_id = ihs_id

        this.updateValue = function(id, no_rm) {
            this.id = id;
            this.noRm = no_rm;
        };

        this.updateIHS = function(ihs_id) {
            this.ihs_id = ihs_id;
            $('#inputIHS_ID').val((this.ihs_id == null) ? 'Tidak Terdaftar' : 'Terdaftar');
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
            $('#inputKTP').val(this.ktp);
            $('#inputIdPasien').val(this.id);
            $('#inputIHS_ID').val((this.ihs_id == null) ? 'Tidak Terdaftar' : 'Terdaftar');
        };
        this.save = function() {
            const ajaxSave = $.ajax({
                type: "POST",
                url: BASE_URL + "Pasien/save",
                data: JSON.stringify(this),
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
            return ajaxSave;
        };
        this.dataBind = function() {
            const ajaxBind = $.ajax({
                type: "POST",
                url: BASE_URL + 'Pasien/getById',
                data: JSON.stringify({ id: this.id }),
                async: true,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            });
            return ajaxBind;
        };
    }
}