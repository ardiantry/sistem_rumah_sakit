$(function () {
    BookingDTBinding();    
});

function BookingDTBinding() {
    // When modal window is shown
    $('#modal-booking').on('shown.bs.modal', function() {
        // Adjust column width and re-initialize Responsive extension
        requestAnimationFrame(() =>
            $("#tableRegisterPasienBooking").DataTable()
            .ajax.reload(null, false)
        );
    });

    // When modal window is shown
    $('#modal-pasien-appointment').on('shown.bs.modal', function() {
        // Adjust column width and re-initialize Responsive extension
        requestAnimationFrame(() =>
            $("#tablePasienAppointment").DataTable()
            .ajax.reload(null, false)
        );
    });

    var initialPendaftaranBooking = true;
    var $tablePendaftaranBookingDT = $("#tableRegisterPasienBooking").DataTable({
        destroy: true,
        scrollX: true,
        processing: true,
        serverSide: true,
        pageLength: 10,
        order: [
            [1, "asc"]
        ],
        ajax: function(data, callback, settings) {
            if (initialPendaftaranBooking) {
                initialPendaftaranBooking = false;
                callback({ data: [] }); // don't fire ajax, just return empty set
                return;
            }
            $.post(BASE_URL + 'Registrasi/getDatatableBooking', data, function(result) {
                callback(result);
            }, "json");
        },
        "columns": [
            { "data": null },
            { "data": "tanggal_periksa", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { "data": "no_rm" },
            { "data": "name" },
            { "data": "tempat_lahir" },
            { "data": "tanggal_lahir", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { "data": "jenis_kelamin" },
            { "data": "no_hp" },
            { "data": "golongan_darah" },
            { "data": "agama" },
            { "data": "pekerjaan" },
            { "data": "alamat" },
            { "data": "email" },
            { "data": "nama_klinik" },
            { "data": "nama_unit_layanan" },
            { "data": "nama_dokter" },
            { "data": "tipe_pasien" },
            { "data": "id_klinik" },
            { "data": "id_unit_layanan" },
            { "data": "id_dokter" },
            { "data": "id_tipe_pasien" },
            { "data": "id_pasien" },
            { "data": "id" },
            { "data": "id_pekerjaan" },
            { "data": "is_deleted" },
            { "data": "state_index" },
        ],
        columnDefs: [{
                targets: [1, 2, 3],
                orderable: true
            },
            {
                targets: [-1, -2, -3, -4, -5, -6, -7, -8, -9],
                visible: false
            },
            {
                targets: '_all',
                orderable: false
            },
            {
                targets: 0,
                data: null,
                defaultContent: '<div class="btn-group"><button class="btn btn-primary btn-sm mr-0 btn-new">Baru</button><button class="btn btn-info btn-sm mr-0 btn-pilih">Cari</button><button class="btn btn-danger btn-sm mr-0 btn-cancel">Batal</button></div>'
            }
        ],
    });

    $("#tableRegisterPasienBooking tbody").on('click', 'button.btn-pilih', function() {
        const rowPendaftaranBookingDT = $tablePendaftaranBookingDT.row($(this).parents('tr')).data();
        $('#appointmentId').html(rowPendaftaranBookingDT.id);
        $('#appointmentUnitLayanan').html(rowPendaftaranBookingDT.id_unit_layanan);
        $('#appointmentDokter').html(rowPendaftaranBookingDT.id_dokter);
        $('#appointmentTipePasien').html(rowPendaftaranBookingDT.id_tipe_pasien);
        $('#appointmentTgl').html(rowPendaftaranBookingDT.tanggal_periksa);
        $('#appointmentName').html(rowPendaftaranBookingDT.name);
        $('#appointmentTglLahir').html(moment(rowPendaftaranBookingDT.tanggal_lahir).format('DD/MM/YYYY'));
        $('#appointmentHp').html(rowPendaftaranBookingDT.no_hp);

        $('#modal-booking').modal('toggle');
        $('#modal-pasien-appointment').modal('toggle');
    });

    //new
    $("#tableRegisterPasienBooking tbody").on('click', 'button.btn-new', function() {
        const rowPendaftaranBookingDT = $tablePendaftaranBookingDT.row($(this).parents('tr')).data();
        const id = rowPendaftaranBookingDT.id;
        const id_pasien = 0;
        bootbox.confirm({
            title: "Konfirmasi",
            message: "Apakah Anda Yakin ?",
            centerVertical: true,
            size: "small",
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
                    $.when(fetchNoRM()).done(function(response) {
                        let no_rm = response;
                        const pasienArr = {
                            id: id_pasien,
                            nama_pasien: rowPendaftaranBookingDT.name,
                            no_rm: no_rm
                        };

                        patient = new Patient(pasienArr);
                        patient.tempat_lahir = rowPendaftaranBookingDT.tempat_lahir;
                        patient.tanggal_lahir = rowPendaftaranBookingDT.tanggal_lahir;
                        patient.no_telp = rowPendaftaranBookingDT.no_hp;
                        patient.agama = rowPendaftaranBookingDT.agama;
                        patient.golongan_darah = rowPendaftaranBookingDT.golongan_darah;
                        patient.jenis_kelamin = (rowPendaftaranBookingDT.jenis_kelamin == "Perempuan") ? "P" : "L";
                        patient.pekerjaan = rowPendaftaranBookingDT.id_pekerjaan;
                        patient.alamat = rowPendaftaranBookingDT.alamat;
                        patient.keterangan = null
                        patient.jenis_kelamin_display = rowPendaftaranBookingDT.jenis_kelamin;
                        patient.render();
                        patient.getStep1();
                        $.when(patient.save()).done(function(response) {
                            if (response.status) {
                                patient.updateID(response.data.id);
                                setPasienToAppointment({ id: id, id_pasien: patient.id })
                                .then(data => {
                                    console.log(data); // JSON data parsed by `data.json()` call
                                }); 
                                
                                encounter = new Encounter({ id: 0, no_registrasi: $('#inputNoReg').val() });
                                let tanggal_periksa = rowPendaftaranBookingDT.tanggal_periksa;
                                const unit_layanan = {
                                    id: rowPendaftaranBookingDT.id_unit_layanan, nama_unit_layanan: null, ihs_location_id: null
                                }
                                const dokter = {
                                    id_dokter: rowPendaftaranBookingDT.id_dokter, nama_dokter: null, practitioner_ihs_id: null
                                }          
                                let id_tipe_pasien = rowPendaftaranBookingDT.id_tipe_pasien;                        
                                encounter.pasien = patient;
                                encounter.tanggal_periksa = tanggal_periksa;
                                encounter.unit_layanan = unit_layanan;
                                encounter.dokter = dokter;
                                encounter.tipe_pasien = id_tipe_pasien;           
                                encounter.keterangan1 = $('#inputKeterangan1').val();
                                encounter.keterangan2 = $('#inputKeterangan2').val();            
                                encounter.keterangan3 = $('#inputKeterangan3').val();   
                                encounter.jenis_pemeriksaan = $('#inputJenisPemeriksaan').val();                                                              
                                encounter.render();           
                                console.log(encounter);                                                                                             
                            } else {
                                console.log(response.message);
                            }
    
                            $('#modal-booking').modal('toggle');                                    
                        });                    
                    });
                }
            }
        });
    });

    $("#tableRegisterPasienBooking tbody").on('click', 'button.btn-cancel', function() {
        $('#modal-booking').modal('toggle');
        let data = $tablePendaftaranBookingDT.row($(this).parents('tr')).data();
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
                        url: BASE_URL + "Registrasi/cancelAppointment",
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

                            $('#modal-booking').modal('toggle');

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
                    $('#modal-booking').modal('toggle');
                }
            }
        });
    });
    
    var $tablePasienAppointmentDT = $("#tablePasienAppointment").DataTable({
        scrollX: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        pageLength: 5,
        order: [
            [1, "asc"]
        ],
        ajax: {
            url: BASE_URL + 'Pasien/getDataTable',
            type: "POST"
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
            { "data": "ktp" },
            { "data": "jenis_kelamin" },
            { "data": "pekerjaan" },
            { "data": "ihs_id" },
            { "data": "id" },
        ],
        columnDefs: [{
                targets: [1, 2],
                orderable: true
            },
            {
                targets: [-1, -2, -3, -4],
                visible: false
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
    
    $("#tablePasienAppointment tbody").on('click', 'button', function() {
        let rowPasienDT = $tablePasienAppointmentDT.row($(this).parents('tr')).data();
        let appointmentId = $('#appointmentId').text();

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
        patient.render();

        setPasienToAppointment({ id: appointmentId, id_pasien: patient.id })
            .then(data => {
                console.log(data);
            });
            
        encounter = new Encounter({ id: 0, no_registrasi: $('#inputNoReg').val() });
        let tanggal_periksa = moment($('#appointmentTgl').text()).format('DD/MM/YYYY');
        const unit_layanan = {
            id: $('#appointmentUnitLayanan').text(), nama_unit_layanan: null, ihs_location_id: null
        }
        const dokter = {
            id_dokter: $('#appointmentDokter').text(), nama_dokter: null, practitioner_ihs_id: null
        }          
        let id_tipe_pasien = $('#appointmentTipePasien').text();
        console.log(id_tipe_pasien);

        encounter.pasien = patient;
        encounter.tanggal_periksa = tanggal_periksa;
        encounter.unit_layanan = unit_layanan;
        encounter.dokter = dokter;
        encounter.tipe_pasien = id_tipe_pasien;        
        encounter.keterangan1 = $('#inputKeterangan1').val();
        encounter.keterangan2 = $('#inputKeterangan2').val();            
        encounter.keterangan3 = $('#inputKeterangan3').val();   
        encounter.jenis_pemeriksaan = $('#inputJenisPemeriksaan').val();      
        encounter.render();

        $('#appointmentId').html('');
        $('#appointmentUnitLayanan').html('');
        $('#appointmentDokter').html('');
        $('#appointmentTipePasien').html('');
        $('#appointmentTgl').html('');
        $('#appointmentName').html('');
        $('#appointmentTglLahir').html('');
        $('#appointmentHp').html('');

        $('#modal-pasien-appointment').modal('toggle');
    });    

    async function setPasienToAppointment(data = {}) {
        let url = BASE_URL + 'Pasien/setToAppointment';    
        // Default options are marked with *
        const response = await fetch(url, {
          method: 'POST', // *GET, POST, PUT, DELETE, etc.
          mode: 'cors', // no-cors, *cors, same-origin
          cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
          credentials: 'same-origin', // include, *same-origin, omit
          headers: {
            'Content-Type': 'application/json'
          },
          redirect: 'follow', // manual, *follow, error
          referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
          body: JSON.stringify(data) // body data type must match "Content-Type" header
        });
        return response.json(); // parses JSON response into native JavaScript objects
      }	    
}