class Patient {
    constructor({ id, nama_pasien, no_rm }) {
        this.id = parseInt(id);
        this.nama_pasien = nama_pasien;
        this.no_rm = no_rm;
        this.tempat_lahir = null;
        this.tanggal_lahir = null;
        this.no_telp = null;
        this.agama = null;
        this.golongan_darah = null;
        this.jenis_kelamin = null;
        this.pekerjaan = null;
        this.alamat = null;
        this.keterangan = null;
        this.jenis_kelamin_display = null;
        this.pekerjaan_display = null;
        this.ktp = null;
        this.ihs_id = null;
        this.no_bpjs = null;
        this.updateIHS = function(ihs_id) {
            this.ihs_id = ihs_id;
            $('#inputIHS_ID').val(this.ihs_id);
            $('#inputStatusIHS').val((this.ihs_id == null) ? 'Tidak Terdaftar' : 'Terdaftar');
        };
        this.updateBPJS = function(bpjs) {
            $('#inputStatusBPJS').val(bpjs.ketAktif);
            //$('#inputNamaPasien').val(bpjs.nama);
            //$('#dateTanggalLahir').datetimepicker('date', moment(bpjs.tglLahir, 'DD-MM-YYYY') );                                 
        };        
        this.render = function() {
            let noRmNama = `${this.no_rm}-${this.nama_pasien}`;
            $('#inputNoRM').val(this.no_rm);
            $('#inputNamaPasien').val(this.nama_pasien);
            $('#inputNoRMNama').val(noRmNama);
            $('#inputTempatLahir').val(this.tempat_lahir);
            //$('#inputTanggalLahir').val(moment(this.tanggal_lahir).format('DD/MM/YYYY'));
            $('#dateTanggalLahir').datetimepicker('date', moment(this.tanggal_lahir, 'YYYY-MM-DD') );                     
            $('#inputNoTelp').val(this.no_telp);
            $('#inputAgama').val(this.agama);
            $('#inputGolonganDarah').val(this.golongan_darah);
            $('#inputJenisKelamin').val(this.jenis_kelamin);
            $('#inputPekerjaan').val(this.pekerjaan);
            $('#inputAlamat').val(this.alamat);
            $('#inputKeterangan').val(this.keterangan);
            $('#inputKTP').val(this.ktp);
            $('#inputIdPasien').val(this.id);
            $('#inputIHS_ID').val(this.ihs_id);
            $('#inputStatusIHS').val("-");
            $('#inputNoBPJS').val(this.no_bpjs);            
            $('#inputStatusBPJS').val("-");

            if (this.ktp) {
                $.when(fetchIhsPasien(this.ktp)).done(function(response) {
                    if(response.data)
                        patient.updateIHS(response.data.id);
                });
            }
            if (this.no_bpjs) {   
                $.when(fetchBPJS(this.no_bpjs)).done(function(response) {
                    if(response.response)
                        patient.updateBPJS(response.response);
                });
            }               
        };
        this.getStep1 = function() {
            this.no_rm = $('#inputNoRM').val();
            this.nama_pasien = $('#inputNamaPasien').val();
            this.tempat_lahir = $('#inputTempatLahir').val();
            //this.tanggal_lahir = moment($('#inputTanggalLahir').datetimepicker('viewDate')).format('YYYY-MM-DD');    
            this.tanggal_lahir = moment($('#dateTanggalLahir').datetimepicker('viewDate')).format('YYYY-MM-DD');                    
            this.no_telp = $('#inputNoTelp').val();
            this.agama = $('#inputAgama').val();
            this.golongan_darah = $('#inputGolonganDarah').val();
            this.jenis_kelamin = $('#inputJenisKelamin').val();
            this.pekerjaan = $('#inputPekerjaan').val();
            this.alamat = $('#inputAlamat').val();
            this.keterangan = $('#inputKeterangan').val();
            this.ktp = $('#inputKTP').val();
            this.id = $('#inputIdPasien').val();
            this.ihs_id = $('#inputIHS_ID').val();
            this.no_bpjs = $('#inputNoBPJS').val(); 
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
    }
}

window.patient = new Patient({ id: 0, nama_pasien: null, no_rm: null });

$(function () {
    handleStep1();
});

function handleStep1() {
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

    $("#FormPasien").submit(function(event) {
        event.preventDefault();
        if ($("#FormPasien").valid()) {
            //insert_pasien();
            const pasienArr = {
                id: $('#formIdPasien').val(),
                nama_pasien: $('#formNamaPasien').val(),
                no_rm: $('#formNoRM').val(),
            };
            patient = new Patient(pasienArr);
            patient.tempat_lahir = $('#formTempatLahir').val();
            patient.tanggal_lahir = moment($('#formTanggalLahir').datetimepicker('viewDate')).format('YYYY-MM-DD');
            patient.no_telp = $('#formNoTelp').val();
            patient.agama = $('#formAgama').val();
            patient.golongan_darah = $('#formGolonganDarah').val();
            patient.jenis_kelamin = $('#formJenisKelamin').val();
            patient.pekerjaan = $('#formPekerjaan').val();
            patient.alamat = $('#formAlamat').val();
            patient.keterangan = $('#formKeterangan').val();
            patient.jenis_kelamin_display = $("#formJenisKelamin option:selected").text();
            patient.pekerjaan_display = $("#formPekerjaan option:selected").text();
            patient.ktp = $('#formKTP').val();
            patient.ihs_id = $('#formIHS_ID').val();
            patient.no_bpjs = $('#formNoBPJS').val();
            patient.render();

            $('#formIdPasien').val(0);
            $('#modal-formPasien').modal('toggle');
            $("#FormPasien")[0].reset();
        }
    });

    // When modal window is shown
    $('#modal-pasien').on('shown.bs.modal', function() {
        // Adjust column width and re-initialize Responsive extension
        requestAnimationFrame(() =>
            $("#tablePasien").DataTable()
            .ajax.reload(null, false)
        );
    });

    $('#modal-formPasien').on('shown.bs.modal', function() {
        console.log("test");        
        SpinnerOn();        
        $.when(fetchNoRM()).done(function(response) {
            console.log(response);
            $('#formNoRM').val(response);
            SpinnerOff();
        });
    });

    var initialLoad = true;
    var $tablePasienDT = $("#tablePasien").DataTable({
        scrollX: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        pageLength: 10,
        order: [
            [1, "asc"]
        ],
        ajax: function(data, callback, settings) {
            if (initialLoad) {
                initialLoad = false;
                callback({ data: [] }); // don't fire ajax, just return empty set
                return;
            }
            $.post(BASE_URL + 'Pasien/getDataTable', data, function(result) {
                callback(result);
            }, "json");
        },
        columns: [
            { data: null },
            { data: "nama_pasien" },
            { data: 'no_rm' },
            { data: "tempat_lahir" },
            { data: "tanggal_lahir", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { data: "no_telp" },
            { data: "agama" },
            { data: "golongan_darah" },
            { data: "jenis_kelamin_display" },
            { data: "pekerjaan_display" },
            { data: "alamat" },
            { data: "keterangan" },
            { data: "ktp" },
            { data: "no_bpjs" },                        
            { data: "jenis_kelamin" },
            { data: "pekerjaan" },
            { data: "ihs_id" },
            { data: "id" },
        ],
        columnDefs: [{
                targets: [1, 2],
                orderable: true
            },
            {
                targets: [-1, -2, -3, -4, -5, -6],
                visible: false
            },
            disableOrder, buttonChoose
        ],
    });

    $("#tablePasien tbody").on('click', 'button', function() {
        const rowPasienDT = $tablePasienDT.row($(this).parents('tr')).data();
        let ihs_id = rowPasienDT.ihs_id;
        let no_bpjs = rowPasienDT.no_bpjs;
        const pasienArr = {
            id: rowPasienDT.id,
            nama_pasien: rowPasienDT.nama_pasien,
            no_rm: rowPasienDT.no_rm,
        };

        patient = new Patient(pasienArr);
        patient.tempat_lahir = rowPasienDT.tempat_lahir;
        patient.tanggal_lahir = rowPasienDT.tanggal_lahir;
        patient.no_telp = rowPasienDT.no_telp;
        patient.agama = rowPasienDT.agama;
        patient.golongan_darah = rowPasienDT.golongan_darah;
        patient.jenis_kelamin = rowPasienDT.jenis_kelamin;
        patient.pekerjaan = rowPasienDT.pekerjaan;
        patient.alamat = rowPasienDT.alamat;
        patient.keterangan = rowPasienDT.keterangan;
        patient.jenis_kelamin_display = rowPasienDT.jenis_kelamin_display;
        patient.pekerjaan_display = rowPasienDT.pekerjaan_display;
        patient.ktp = rowPasienDT.ktp;
        patient.ihs_id = ihs_id;
        patient.no_bpjs = no_bpjs;
        patient.render();
        $('#modal-pasien').modal('toggle');
    });

    $('#formKTP').on('blur', function() {
        if(!$(this).val()){
            $('#formIHS_ID').val('');
            $('#formStatusIHS').val('Tidak Terdaftar');                
            return false
        }        
        SpinnerOn();
        $.when(fetchIhsPasien($(this).val())).done(function(response) {
            $('#formNamaPasien').val(response.data.name);
            $('#formJenisKelamin').val((response.data.gender == 'male' ? 'L' : 'P'));
            $('#formIHS_ID').val(response.data.id);
            $('#formStatusIHS').val((response.data.id) ? 'Terdaftar' : 'Tidak Terdaftar');
            SpinnerOff();
        });
    });
}

async function fetchIhsPasien(ktp) {
    const ajaxFetch = $.ajax({
        type: "GET",
        async: true,
        url: BASE_URL + "satusehat/pasien/" + ktp,
        dataType: 'json',
        contentType: 'application/json; charset=utf-8'
    });
    return ajaxFetch;
}

async function fetchBPJS(no_bpjs) {
    const ajaxFetch = $.ajax({
        type: "GET",
        async: true,
        url: BASE_URL + "pcare/peserta/" + no_bpjs,
        dataType: 'json',
        contentType: 'application/json; charset=utf-8'
    });
    return ajaxFetch;
}

async function fetchNoRM() {
    const ajaxFetch = $.ajax({
        type: "GET",
        async: true,
        url: BASE_URL + 'Pasien/getNoRM',
        dataType: 'json',
        contentType: 'application/json; charset=utf-8'
    });
    return ajaxFetch;
}