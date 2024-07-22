var pasienObj;
var pendaftaranObj;

(function($) {
    //PASIEN
    PasienBinding($);
    //PENDAFTARAN
    RegistrasiBinding($);

    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
            alwaysShowClose: true
        });
    });

})(jQuery);

function GetStateIndex() {
    var $active = $(".wizard").find('li.active');
    const click_index = $('.wizard .nav-tabs li').index($active);
    return click_index - 2;
}

function RegistrasiBinding($) {
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
            data.id_pasien = $('#inputIdPasien').val();
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
            // var $active = $(".wizard").find('li.active');
            // let click_index = $('.wizard .nav-tabs li').index($active);
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
            { data: "jenis_pemeriksaan" },
            { data: "tanggal_kunjungan_selanjutnya", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { data: "tujuan_kunjungan_selanjutnya" },
            { data: "jumlah_paket" },
            { data: "id_paket" },
            { data: "paket_sisa" },
            { data: "total_stok_opname" },
            { data: "diagnosa" },
            { data: "keterangan2" },
            { data: "tanggal_penyerahan_resep", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { data: "keterangan3" },
            { data: "id" },
            { data: "id_unit_layanan" },
            { data: "id_dokter" },
            { data: "id_tipe_pasien" },
            { data: "id_pasien" },
            { data: "id_reference" },
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
        ajax: function(data, callback, settings) {
            if (initialLoadRegPaket) {
                initialLoadRegPaket = false;
                callback({ data: [] }); // don't fire ajax, just return empty set
                return;
            }
            // var $active = $(".wizard").find('li.active');
            // let click_index = $('.wizard .nav-tabs li').index($active);
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
            { data: "jenis_pemeriksaan" },
            { data: "tanggal_kunjungan_selanjutnya", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { data: "tujuan_kunjungan_selanjutnya" },
            { data: "jumlah_paket" },
            { data: "id_paket" },
            { data: "paket_sisa" },
            { data: "total_stok_opname" },
            { data: "diagnosa" },
            { data: "keterangan2" },
            { data: "tanggal_penyerahan_resep", "render": $.fn.dataTable.render.moment('DD/MM/YYYY') },
            { data: "keterangan3" },
            { data: "id" },
            { data: "id_unit_layanan" },
            { data: "id_dokter" },
            { data: "id_tipe_pasien" },
            { data: "id_pasien" },
            { data: "id_reference" },
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
                    $.when(fetchNoRMBooking()).done(function(response) {
                        pasienObj = new Pasien({
                            id: id_pasien,
                            no_rm: response,
                            nama_pasien: rowPendaftaranBookingDT.name,
                            tempat_lahir: rowPendaftaranBookingDT.tempat_lahir,
                            tanggal_lahir: rowPendaftaranBookingDT.tanggal_lahir,
                            no_telp: rowPendaftaranBookingDT.no_hp,
                            agama: rowPendaftaranBookingDT.agama,
                            golongan_darah: rowPendaftaranBookingDT.golongan_darah,
                            jenis_kelamin: (rowPendaftaranBookingDT.jenis_kelamin == "Perempuan") ? "P" : "L",
                            jenis_kelamin_display: rowPendaftaranBookingDT.jenis_kelamin,
                            pekerjaan: rowPendaftaranBookingDT.id_pekerjaan,
                            alamat: rowPendaftaranBookingDT.alamat,
                            keterangan: null
                        });

                        $.when(pasienObj.save()).done(function(response) {
                            if (response.status) {
                                pasienObj.updateValue(response.data.id, response.data.no_rm);
                                pasienObj.render();

                                setPasienToAppointment({ id: id, id_pasien: pasienObj.id })
                                    .then(data => {
                                        console.log(data); // JSON data parsed by `data.json()` call
                                    });

                                pendaftaranObj = new Pendaftaran({
                                    id: null,
                                    no_registrasi: $('#inputNoReg').val(),
                                    tanggal_periksa: moment(rowPendaftaranBookingDT.tanggal_periksa).format('DD/MM/YYYY'),
                                    id_unit_layanan: rowPendaftaranBookingDT.id_unit_layanan,
                                    id_dokter: rowPendaftaranBookingDT.id_dokter,
                                    id_tipe_pasien: rowPendaftaranBookingDT.id_tipe_pasien,
                                    keterangan1: $('#inputKeterangan1').val(),
                                    tanggal_pemeriksaan: $('#inputTanggalPemeriksaan').val(),
                                    diagnosa: $('#inputDiagnosa').val(),
                                    keterangan2: $('#inputKeterangan2').val(),
                                    tanggal_penyerahan_resep: $('#inputTanggalPenyerahanResep').val(),
                                    keterangan3: $('#inputKeterangan3').val(),
                                    state_index: 0,
                                    jenis_pemeriksaan: $('#inputJenisPemeriksaan').val(),
                                    tanggal_kunjungan_selanjutnya: $('#inputTanggalKunjunganSelanjutnya').val(),
                                    tujuan_kunjungan_selanjutnya: $('#inputTujuanKunjunganSelanjutnya').val(),
                                    jumlah_paket: $('#inputJumlahPaket').val(),
                                    id_paket: $('#inputJenisPaket').val(),
                                    sisa_paket: $('#inputSisaPaket').val(),
                                    id_reference: $('#inputIdReference').val(),
                                });

                                pendaftaranObj.pasien = pasienObj;
                                pendaftaranObj.render();
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
        const rowPendaftaranDT = $tablePendaftaranUmumDT.row($(this).parents('tr')).data();
        const id = rowPendaftaranDT.id;
        const id_pasien = rowPendaftaranDT.id_pasien;

        const PendaftaranArr = {
            id: id,
            no_registrasi: rowPendaftaranDT.no_registrasi,
            tanggal_periksa: moment(rowPendaftaranDT.tanggal_periksa).format('DD/MM/YYYY'),
            id_unit_layanan: rowPendaftaranDT.id_unit_layanan,
            id_dokter: rowPendaftaranDT.id_dokter,
            id_tipe_pasien: rowPendaftaranDT.id_tipe_pasien,
            keterangan1: rowPendaftaranDT.keterangan1,
            tanggal_pemeriksaan: moment(rowPendaftaranDT.tanggal_pemeriksaan).format('DD/MM/YYYY'),
            diagnosa: rowPendaftaranDT.diagnosa,
            keterangan2: rowPendaftaranDT.keterangan2,
            tanggal_penyerahan_resep: moment(rowPendaftaranDT.tanggal_penyerahan_resep).format('DD/MM/YYYY'),
            keterangan3: rowPendaftaranDT.keterangan3,
            state_index: GetStateIndex(),
            jenis_pemeriksaan: rowPendaftaranDT.jenis_pemeriksaan,
            tanggal_kunjungan_selanjutnya: moment(rowPendaftaranDT.tanggal_kunjungan_selanjutnya).format('DD/MM/YYYY'),
            tujuan_kunjungan_selanjutnya: rowPendaftaranDT.tujuan_kunjungan_selanjutnya,
            jumlah_paket: rowPendaftaranDT.jumlah_paket,
            id_paket: rowPendaftaranDT.id_paket,
            sisa_paket: rowPendaftaranDT.paket_sisa,
            total_stok_opname: rowPendaftaranDT.total_stok_opname,
            id_reference: rowPendaftaranDT.id_reference
        }

        pendaftaranObj = new Pendaftaran(PendaftaranArr);
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
        $.when(pendaftaranObj.pemeriksaanFisikDataBind()).done(function(response) {
            pendaftaranObj.dataPemeriksaanFisik = response.data;
            fillTablePemeriksaanFisik(response.data)
        });
        $('#modal-registrasi').modal('toggle');
    });

    $("#tableRegisterPasienPaket tbody").on('click', 'button.btn-pilih', function() {
        const rowPendaftaranDT = $tablePendaftaranPaketDT.row($(this).parents('tr')).data();
        const id = rowPendaftaranDT.id;
        const id_pasien = rowPendaftaranDT.id_pasien;
        let no_reg = rowPendaftaranDT.no_registrasi;
        if (rowPendaftaranDT.tanggal_pemeriksaan !== TODAY_ISO)
            no_reg = getNoReg();

        const PendaftaranArr = {
            id: id,
            no_registrasi: no_reg,
            tanggal_periksa: moment(rowPendaftaranDT.tanggal_periksa).format('DD/MM/YYYY'),
            id_unit_layanan: rowPendaftaranDT.id_unit_layanan,
            id_dokter: rowPendaftaranDT.id_dokter,
            id_tipe_pasien: rowPendaftaranDT.id_tipe_pasien,
            keterangan1: rowPendaftaranDT.keterangan1,
            tanggal_pemeriksaan: moment(rowPendaftaranDT.tanggal_pemeriksaan).format('DD/MM/YYYY'),
            diagnosa: rowPendaftaranDT.diagnosa,
            keterangan2: rowPendaftaranDT.keterangan2,
            tanggal_penyerahan_resep: moment(rowPendaftaranDT.tanggal_penyerahan_resep).format('DD/MM/YYYY'),
            keterangan3: rowPendaftaranDT.keterangan3,
            state_index: GetStateIndex(),
            jenis_pemeriksaan: rowPendaftaranDT.jenis_pemeriksaan,
            tanggal_kunjungan_selanjutnya: moment(rowPendaftaranDT.tanggal_kunjungan_selanjutnya).format('DD/MM/YYYY'),
            tujuan_kunjungan_selanjutnya: rowPendaftaranDT.tujuan_kunjungan_selanjutnya,
            jumlah_paket: rowPendaftaranDT.jumlah_paket,
            id_paket: rowPendaftaranDT.id_paket,
            sisa_paket: rowPendaftaranDT.paket_sisa,
            total_stok_opname: rowPendaftaranDT.total_stok_opname,
            id_reference: rowPendaftaranDT.id_reference
        }
        pendaftaranObj = new Pendaftaran(PendaftaranArr);
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
        $.when(pendaftaranObj.pemeriksaanFisikDataBind()).done(function(response) {
            pendaftaranObj.dataPemeriksaanFisik = response.data;
            fillTablePemeriksaanFisik(response.data)
        });
        $('#modal-registrasi').modal('toggle');
    });

    // When modal window is shown
    $('#modal-booking').on('shown.bs.modal', function() {
        // Adjust column width and re-initialize Responsive extension
        requestAnimationFrame(() =>
            $("#tableRegisterPasienBooking").DataTable()
            .ajax.reload(null, false)
        );
    });

    // When modal window is shown
    $('#modal-registrasi').on('shown.bs.modal', function() {
        $("#tableRegisterPasienUmum, #tableRegisterPasienPaket").DataTable()
            .ajax.reload(null, false)
        $('#custom-tabs-one-home-tab').tab('show');
    });

    // When modal window is shown
    $('#modal-riwayat').on('shown.bs.modal', function() {
        $("#tableRiwayatPasien").DataTable()
            .ajax.reload(null, false);
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
        let data = $tablePasienAppointmentDT.row($(this).parents('tr')).data();
        let appointmentId = $('#appointmentId').text();

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

        setPasienToAppointment({ id: appointmentId, id_pasien: pasienObj.id })
            .then(data => {
                console.log(data);
            });

        pendaftaranObj = new Pendaftaran({
            id: null,
            no_registrasi: $('#inputNoReg').val(),
            tanggal_periksa: moment($('#appointmentTgl').text()).format('DD/MM/YYYY'),
            id_unit_layanan: $('#appointmentUnitLayanan').text(),
            id_dokter: $('#appointmentDokter').text(),
            id_tipe_pasien: $('#appointmentTipePasien').text(),
            keterangan1: $('#inputKeterangan1').val(),
            tanggal_pemeriksaan: $('#inputTanggalPemeriksaan').val(),
            diagnosa: $('#inputDiagnosa').val(),
            keterangan2: $('#inputKeterangan2').val(),
            tanggal_penyerahan_resep: $('#inputTanggalPenyerahanResep').val(),
            keterangan3: $('#inputKeterangan3').val(),
            state_index: 0,
            jenis_pemeriksaan: $('#inputJenisPemeriksaan').val(),
            tanggal_kunjungan_selanjutnya: $('#inputTanggalKunjunganSelanjutnya').val(),
            tujuan_kunjungan_selanjutnya: $('#inputTujuanKunjunganSelanjutnya').val(),
            jumlah_paket: $('#inputJumlahPaket').val(),
            id_paket: $('#inputJenisPaket').val(),
            sisa_paket: $('#inputSisaPaket').val(),
            id_reference: $('#inputIdReference').val(),
        });

        pendaftaranObj.pasien = pasienObj;
        pendaftaranObj.render();

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


    $("#tablePasien tbody").on('click', 'button', function() {
        const rowPasienDT = $tablePasienDT.row($(this).parents('tr')).data();
        //console.log(rowPasienDT.ktp);
        let ihs_id = rowPasienDT.ihs_id;

        const pasienArr = {
            id: rowPasienDT.id,
            no_rm: rowPasienDT.no_rm,
            nama_pasien: rowPasienDT.nama_pasien,
            tempat_lahir: rowPasienDT.tempat_lahir,
            tanggal_lahir: rowPasienDT.tanggal_lahir,
            no_telp: rowPasienDT.no_telp,
            agama: rowPasienDT.agama,
            golongan_darah: rowPasienDT.golongan_darah,
            jenis_kelamin: rowPasienDT.jenis_kelamin,
            pekerjaan: rowPasienDT.pekerjaan,
            alamat: rowPasienDT.alamat,
            keterangan: rowPasienDT.keterangan,
            jenis_kelamin_display: rowPasienDT.jenis_kelamin_display,
            pekerjaan_display: rowPasienDT.pekerjaan_display,
            ktp: rowPasienDT.ktp,
            ihs_id: ihs_id
        };
        pasienObj = new Pasien(pasienArr);
        pasienObj.render();

        if (!ihs_id) {
            console.log("if");
            $.when(fetchIhsPasien(rowPasienDT.ktp)).done(function(response) {
                pasienObj.updateIHS(response.data.id);
            });
            console.log("end if");
        }
        $('#modal-pasien').modal('toggle');
    });

    // When modal window is shown
    $('#modal-pasien-appointment').on('shown.bs.modal', function() {
        // Adjust column width and re-initialize Responsive extension
        requestAnimationFrame(() =>
            $("#tablePasienAppointment").DataTable()
            .ajax.reload(null, false)
        );
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
        //alert("test");
        fetchNoRM();
    });
}

function save_pasien() {
    OverlayOn();
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
        } else {
            console.log(response.message);
        }
        OverlayOff();
    });
}

function insert_pasien() {
    OverlayOn();
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
            console.log('done');
            $('#formIdPasien').val(0);
            $('#modal-formPasien').modal('toggle');
            $("#FormPasien")[0].reset();
        } else {
            console.log(response.message);
        }
        OverlayOff();
    });

}

function save_pendaftaran(stateIndex) {
    OverlayOn();
    const id = $('#inputIdRegistrasi').val();
    if (id == 0) {
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
    }

    pendaftaranObj.stateIndex = stateIndex;
    pendaftaranObj.tanggalPenyerahanResep = $('#inputTanggalPenyerahanResep').val();
    pendaftaranObj.keterangan3 = $('#inputKeterangan3').val();

    //let dataLayanan = fnTableToObject($('#tableLayanan'));
    let dataIcd9 = fnTableToObject($('#tableIcd9'));
    let dataIcd10 = fnTableToObject($('#tableIcd10'));
    let dataRencanaKontrol = fnTableToObject($('#tableRencanaKontrol'));
    let dataPemeriksaanFisik = fnTableToObject($('#tablePemeriksaanFisik'));
    //pendaftaranObj.dataLayanan = dataLayanan;
    pendaftaranObj.dataIcd9 = dataIcd9;
    pendaftaranObj.dataIcd10 = dataIcd10;
    pendaftaranObj.dataRencanaKontrol = dataRencanaKontrol;
    pendaftaranObj.dataPemeriksaanFisik = dataPemeriksaanFisik;

    let dataObat = fnTableToObject($('#tableObat'));
    let dataObatTambahan = fnTableToObject($('#tableObatTambahan'));
    pendaftaranObj.dataObat = dataObat;
    pendaftaranObj.dataObatTambahan = dataObatTambahan;

    debugger;

    $.when(pendaftaranObj.save()).done(function(response) {
        if (response.status) {
            pendaftaranObj.updateValue(response.data.id, response.data.no_registrasi);
            pendaftaranObj.render();
            if (stateIndex == 2) {
                calculate();
            }
            console.log('done');
        } else {
            console.log(response);

            // if (response.error_code == -1) {
            //     ToastEnd.fire({
            //         icon: 'info',
            //         title: response.message,
            //         timer: 3000
            //     });
            // } else if (response.error_code == -2) {
            //     ToastEnd.fire({
            //         icon: 'warning',
            //         title: response.message
            //     });
            // } else {
            //     ToastEnd.fire({
            //         icon: 'error',
            //         title: response.message
            //     });
            // }
        }
        OverlayOff();
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

function OverlayOn() {
    $(".overlay").show();
}

function OverlayOff() {
    $(".overlay").hide();
}

function SpinnerOn() {
    console.log("spinner on");
    $(".spinner-input").show();
}

function SpinnerOff() {
    $(".spinner-input").hide();
}



async function fetchNoRMBooking() {
    let url = BASE_URL + 'Pasien/getNoRM';
    const res = await fetch(url);
    const data = await res.text();
    return data;
}

async function fetchIhsPasien(ktp) {
    const ajaxSave = $.ajax({
        type: "GET",
        async: true,
        url: BASE_URL + "satusehat/pasien/" + ktp,
        dataType: 'json',
        contentType: 'application/json; charset=utf-8'
    });
    return ajaxSave;
}

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
                // 'Content-Type': 'application/x-www-form-urlencoded',
        },
        redirect: 'follow', // manual, *follow, error
        referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
        body: JSON.stringify(data) // body data type must match "Content-Type" header
    });
    return response.json(); // parses JSON response into native JavaScript objects
}