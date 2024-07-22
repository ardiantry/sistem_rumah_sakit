(function($) {
//PASIEN
var $tablePasienDT = $("#tablePasien").DataTable({
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
        url: BASE_URL + 'Pasien/getDatatable',
        type: "POST"
    },
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
            targets: -1
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
    let pasien = {
        id: data[13],
        no_rm: data[1],
        nama_pasien: data[2],
        tempat_lahir: data[3],
        tanggal_lahir: data[4],
        no_telp: data[5],
        agama: data[6],
        golongan_darah: data[7],
        jenis_kelamin: data[12],
        pekerjaan: data[9],
        alamat: data[10],
        keterangan: data[11]
    }
    fillPasien(pasien);
    $('#modal-pasien').modal('toggle');    
});

// When modal window is shown
$('#modal-pasien').on('shown.bs.modal', function () {
    // Adjust column width and re-initialize Responsive extension
    $("#tablePasien").DataTable()
        .ajax.reload()
        .columns.adjust()
        .responsive.recalc();
});

//PENDAFTARAN
var $tablePendaftaranDT = $("#tableRegisterPasien").DataTable({
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
        url: BASE_URL + 'RawatJalan/getRegisterPasienDatatable',
        type: "POST"
    },
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
            targets: -1
        },
        {
            targets: 0,
            data: null,
            defaultContent: '<button class="btn btn-info btn-sm mr-0 btn-pilih">Pilih</button>'
        }
    ],
});


$("#tableRegisterPasien tbody").on('click', 'button', function() {
    let data = $tablePendaftaranDT.row($(this).parents('tr')).data();
    let id = data[14]; 
    let id_pasien = data[18];
    let pendaftaran = {
        id: id,
        no_registrasi: data[1],
        no_rm_nama: data[2] + '-' + data[3],
        no_reg_display: data[1] + '-' + data[3] + '(' + data[2] + ')',
        tanggal_periksa: data[4],
        id_unit_layanan: data[15],
        id_dokter: data[16],
        id_tipe_pasien: data[17],
        keterangan1: data[8],
        tanggal_pemeriksaan:data[9],
        diagnosa:data[10],        
        keterangan2:data[11],
        tanggal_penyerahan_resep:data[12],
        keterangan3:data[13]                
    }
    fillPendaftaran(pendaftaran);
    //bindDataPasien(id_pasien);
    //bindDataLayanan(id);    
    //bindDataIcd9(id);
    //bindDataIcd10(id);
    //bindDataObat(id); 

    var a1 = $.ajax({
        url: BASE_URL + 'RawatJalan/getDataPasienAjax',
        method: "POST",
        data: {
            id: id_pasien
        },
        async: true,
        dataType: 'json'
    });

    var a2 = $.ajax({
        url: BASE_URL + 'RawatJalan/getRegisterPasienLayananAjax',
        method: "POST",
        data: {
            id: id
        },
        async: true,
        dataType: 'json'
    });

    var a3 = $.ajax({
        url: BASE_URL + 'RawatJalan/getRegisterPasienIcd9Ajax',
        method: "POST",
        data: {
            id: id
        },
        async: true,
        dataType: 'json'
    });

    var a4 = $.ajax({
        url: BASE_URL + 'RawatJalan/getRegisterPasienIcd10Ajax',
        method: "POST",
        data: {
            id: id
        },
        async: true,
        dataType: 'json'
    });

    var a5 = $.ajax({
        url: BASE_URL + 'RawatJalan/getRegisterPasienObatAjax',
        method: "POST",
        data: {
            id: id
        },
        async: true,
        dataType: 'json'
    });

    $.when(
        a1, a2, a3, a4, a5
    ).done(
        function (dataPasien, dataLayanan, dataIcd9, dataIcd10, dataObat) {   
            if (dataPasien[0] != null) {
                let pasien = {
                    id: dataPasien[0]['id'],
                    no_rm: dataPasien[0]['no_rm'],
                    nama_pasien: dataPasien[0]['nama_pasien'],
                    tempat_lahir: dataPasien[0]['tempat_lahir'],
                    tanggal_lahir: dbDateFormat(dataPasien[0]['tanggal_lahir']),
                    no_telp: dataPasien[0]['no_telp'],
                    agama: dataPasien[0]['agama'],
                    golongan_darah: dataPasien[0]['golongan_darah'],
                    jenis_kelamin: dataPasien[0]['jenis_kelamin'],
                    pekerjaan: dataPasien[0]['pekerjaan'],
                    alamat: dataPasien[0]['alamat'],
                    keterangan: dataPasien[0]['keterangan']
                };
                fillPasien(pasien);
            }
            if (dataLayanan[0].results != null) {  
                fillTableLayanan(dataLayanan[0].results);  
            }
            if (dataIcd9[0].results != null) {  
                fillTableIcd9(dataIcd9[0].results);  
            }
            if (dataIcd10[0].results != null) {  
                fillTableIcd10(dataIcd10[0].results);  
            }
            if (dataObat[0].results != null) {  
                fillTableObat(dataObat[0].results);  
            }                                                           
            bindInvoice();
            calculate();
            console.log('all done');            
        });				    

    $('#modal-registrasi').modal('toggle');    
});

// When modal window is shown
$('#modal-registrasi').on('shown.bs.modal', function () {
    // Adjust column width and re-initialize Responsive extension
    $("#tableRegisterPasien").DataTable()
        .ajax.reload()
        .columns.adjust()
        .responsive.recalc();
});

//PASIEN
function bindDataPasien(id_pasien) {
    $.ajax({
        url: BASE_URL + 'RawatJalan/getDataPasienAjax',
        method: "POST",
        data: {
            id: id_pasien
        },
        async: true,
        dataType: 'json',
        success: function(data) {
            if (data != null) {
                let pasien = {
                    id: data['id'],
                    no_rm: data['no_rm'],
                    nama_pasien: data['nama_pasien'],
                    tempat_lahir: data['tempat_lahir'],
                    tanggal_lahir: dbDateFormat(data['tanggal_lahir']),
                    no_telp: data['no_telp'],
                    agama: data['agama'],
                    golongan_darah: data['golongan_darah'],
                    jenis_kelamin: data['jenis_kelamin'],
                    pekerjaan: data['pekerjaan'],
                    alamat: data['alamat'],
                    keterangan: data['keterangan']
                };
                //fillPasien(pasien);
            }
        }
    });
}

function fillPasien({
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
    keterangan
}) {
    $('#inputNoRM').val(no_rm);
    $('#inputNamaPasien').val(nama_pasien);
    $('#inputTempatLahir').val(tempat_lahir);
    $('#inputTanggalLahir').val(tanggal_lahir);
    $('#inputNoTelp').val(no_telp);
    $('#inputAgama').val(agama);
    $('#inputGolonganDarah').val(golongan_darah);
    $('#inputJenisKelamin').val(jenis_kelamin);
    $('#inputPekerjaan').val(pekerjaan);
    $('#inputAlamat').val(alamat);
    $('#inputKeterangan').val(keterangan);
    $('#inputIdPasien').val(id);
    console.log('pasien done');
}

//PENDAFTARAN
function bindDataPendaftaran(id_pendaftran) {
    $.ajax({
        url: BASE_URL + 'RawatJalan/getDataPendaftaranAjax',
        method: "POST",
        data: {
            id: id_pendaftran
        },
        async: true,
        dataType: 'json',
        success: function(data) {
            if (data != null) {
                let pendaftaran = {
                    id: data['id'],
                    no_registrasi: data['no_registrasi'],
                    no_rm_nama: data['no_rm'] + '-' + data['nama_pasien'], 
                    tanggal_periksa: dbDateFormat(data['tanggal_periksa']),
                    id_unit_layanan: data['id_unit_layanan'],
                    id_dokter: data['id_dokter'],
                    id_tipe_pasien: data['id_tipe_pasien'],
                    keterangan1: data['keterangan1']
                }
                let pasien = {
                    id: data['id_pasien'],
                    no_rm: data['no_rm'],
                    nama_pasien: data['nama_pasien'],
                    tempat_lahir: data['tempat_lahir'],
                    tanggal_lahir: dbDateFormat(data['tanggal_lahir']),
                    no_telp: data['no_telp'],
                    agama: data['agama'],
                    golongan_darah: data['golongan_darah'],
                    jenis_kelamin: data['jenis_kelamin'],
                    pekerjaan: data['pekerjaan'],
                    alamat: data['alamat'],
                    keterangan: data['keterangan']
                };                
                fillPendaftaran(pendaftaran);
                //fillPasien(pasien);				
                //bindDataPasien(data['id_pasien']);			
            }
        }
    });
}

function fillPendaftaran({
    id,
    no_registrasi,
    no_rm_nama,    
    no_reg_display,
    tanggal_periksa,
    id_unit_layanan,
    id_dokter,
    id_tipe_pasien,
    keterangan1,
    tanggal_pemeriksaan,
    diagnosa,        
    keterangan2,
    tanggal_penyerahan_resep,
    keterangan3
}) {
    $('#inputIdRegistrasi').val(id);
    $('#inputNoReg').val(no_registrasi);
    $('#inputNoRMNama').val(no_rm_nama);  
    $('#inputNoReg1').val(no_reg_display); 
    $('#inputNoReg2').val(no_reg_display);          
    $('#inputTanggalPeriksa').val(tanggal_periksa);
    $('#inputTipePasien').val(id_tipe_pasien);
    $('#inputKeterangan1').val(keterangan1);
    $('#inputTanggalPemeriksaan').val(tanggal_pemeriksaan);
    $('#inputDiagnosa').val(diagnosa);
    $('#inputKeterangan2').val(keterangan2);
    $('#inputTanggalPenyerahanResep').val(tanggal_penyerahan_resep);
    $('#inputKeterangan3').val(keterangan3);    

    $('#inputUnitLayanan').val(id_unit_layanan);
    $.when($('#inputUnitLayanan').trigger('change')).done(function() {
        $('#inputDokter').val(id_dokter);
    });				
}

function bindDataLayanan(id_register_pasien) {
    $.ajax({
        url: BASE_URL + 'RawatJalan/getRegisterPasienLayananAjax',
        method: "POST",
        data: {
            id: id_register_pasien
        },
        async: true,
        dataType: 'json',
        success: function(data) {
            if (data.results != null) {  
                //fillTableLayanan(data.results);  
            }
        }
    });
}

function bindDataIcd9(id_register_pasien) {
    $.ajax({
        url: BASE_URL + 'RawatJalan/getRegisterPasienIcd9Ajax',
        method: "POST",
        data: {
            id: id_register_pasien
        },
        async: true,
        dataType: 'json',
        success: function(data) {
            if (data.results != null) {  
                //fillTableIcd9(data.results);  
            }
        }
    });
}

function bindDataIcd10(id_register_pasien) {
    $.ajax({
        url: BASE_URL + 'RawatJalan/getRegisterPasienIcd10Ajax',
        method: "POST",
        data: {
            id: id_register_pasien
        },
        async: true,
        dataType: 'json',
        success: function(data) {
            if (data.results != null) {  
                //fillTableIcd10(data.results);  
            }
        }
    });
}

function bindDataObat(id_register_pasien) {
    $.ajax({
        url: BASE_URL + 'RawatJalan/getRegisterPasienObatAjax',
        method: "POST",
        data: {
            id: id_register_pasien
        },
        async: true,
        dataType: 'json',
        success: function(data) {
            if (data.results != null) {  
                //fillTableObat(data.results);  
            }
        }
    });
}

})(jQuery);

function clearTabel($table){
    if ($table.find('td[data-label="empty_row"]').length > 0)
        $table.find('tbody').empty();    
}

function fillTableLayanan(data){
    let $tableLayanan = $('#tableLayanan');
    clearTabel($tableLayanan);
    $.each(data, function(key, value) {
        let row_template = `<tr><td class="d-none" data-label="id">${value.id}</td><td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="${value.jumlah}" step="1"></td><td data-label="nama" class="text-left align-middle">${value.nama}</td><td class="d-none" data-label="harga">${value.harga}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;        
        $tableLayanan.find('tbody').append(row_template);    
    });    
    console.log('layanan done');
}

function fillTableIcd9(data){
    let $tableIcd9 = $('#tableIcd9');
    clearTabel($tableIcd9);
    $.each(data, function(key, value) {
        let row_template = `<tr><td class="d-none" data-label="id">${value.id}</td><td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="${value.jumlah}" step="1"></td><td data-label="nama" class="text-left align-middle">${value.nama}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;        
        $tableIcd9.find('tbody').append(row_template);    
    });    
    console.log('icd9 done');    
}

function fillTableIcd10(data){
    let $tableIcd10 = $('#tableIcd10');
    clearTabel($tableIcd10);
    $.each(data, function(key, value) {
        let row_template = `<tr><td class="d-none" data-label="id">${value.id}</td><td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="${value.jumlah}" step="1"></td><td data-label="nama" class="text-left align-middle">${value.nama}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;        
        $tableIcd10.find('tbody').append(row_template);    
    });    
    console.log('icd10 done');        
}

function fillTableObat(data){
    let $tableObat = $('#tableObat');
    clearTabel($tableObat);
    $.each(data, function(key, value) {
        let row_template = `<tr><td class="d-none" data-label="id">${value.id}</td><td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="${value.jumlah}" step="1"></td><td data-label="nama" class="text-left align-middle">${value.nama}</td><td class="d-none" data-label="harga">${value.harga}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;        
        $tableObat.find('tbody').append(row_template);    
    });    
    console.log('obat done');            
}

function save_pendaftaran() {
    var form = {}
    form.id_pasien = $("#inputIdPasien").val();
    form.id_registrasi = $("#inputIdRegistrasi").val();
    form.no_registrasi = 'R' + TODAY_TIME;
    form.tanggal_periksa = $("#inputTanggalPeriksa").val();
    form.id_unit_layanan = $("#inputUnitLayanan").val();
    form.id_dokter = $("#inputDokterUnitLayanan").val();
    form.id_tipe_pasien = $("#inputTipePasien").val();
    form.keterangan1 = $("#inputKeterangan1").val();

    $.ajax({
        type: "POST",
        url: BASE_URL + "RawatJalan/savePendaftaran",
        data: JSON.stringify(form),
        dataType: 'json',
        contentType: 'application/json; charset=utf-8'
    }).done(function(response) {
        if (response.status == "ok") {
            fillPendaftaranId(response.data.last_id);
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil disimpan'
            });
            $('#modal-formPasien').modal('hide');
        } else {
            console.log('gagal');
        }
    });
    return false;
}

function save_pemeriksaan() {
    let dataLayanan = fnTableToObject($('#tableLayanan'));
    let dataIcd9 = fnTableToObject($('#tableIcd9'));
    let dataIcd10 = fnTableToObject($('#tableIcd10'));
    let idRegisterPesien = $('#inputIdRegistrasi').val();
    let tanggalPemeriksaan = $('#inputTanggalPemeriksaan').val();
    let diagnosa = $('#inputDiagnosa').val(); 
    let keterangan2 = $('#inputKeterangan2').val(); 

    let data = { 
        id_register_pasien: idRegisterPesien, 
        tanggal_pemeriksaan: tanggalPemeriksaan,
        diagnosa:diagnosa,
        keterangan2: keterangan2,
        data_layanan: dataLayanan,
        data_icd9:dataIcd9,
        data_icd10:dataIcd10
    };

    $.ajax({
        type: "POST",
        url: BASE_URL + "RawatJalan/saveLayanan",
        data: JSON.stringify(data),
        dataType: 'json',
        contentType: 'application/json; charset=utf-8'
    }).done(function(response) {
        if (response.status == "ok") {
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil disimpan'
            });
        } else {
            console.log('gagal');
        }
    });
    return false;
}

function save_apotek() {
    let dataObat = fnTableToObject($('#tableObat'));
    let idRegisterPesien = $('#inputIdRegistrasi').val();
    let tanggalPenyerahanResep = $('#inputTanggalPenyerahanResep').val();
    let keterangan3 = $('#inputKeterangan3').val(); 

    let data = { 
        id_register_pasien: idRegisterPesien, 
        tanggal_penyerahan_resep: tanggalPenyerahanResep,
        keterangan3: keterangan3,
        data_obat: dataObat
    };

    $.ajax({
        type: "POST",
        url: BASE_URL + "RawatJalan/saveApotek",
        data: JSON.stringify(data),
        dataType: 'json',
        contentType: 'application/json; charset=utf-8'
    }).done(function(response) {
        if (response.status == "ok") {
            Toast.fire({
                icon: 'success',
                title: 'Data berhasil disimpan'
            });

        } else {
            console.log('gagal');
        }
    });
    return false;
}

function fillPendaftaranId(id) {
    $('#inputIdRegistrasi').val(id);
}

function dbDateFormat(dbDate) {
    date = new Date(dbDate);
    var dd = String(date.getDate()).padStart(2, '0');
    var mm = String(date.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = date.getFullYear();
    return dd + '/' + mm + '/' + yyyy;
}

function fnTableToObject($table) {
    var data = [];
    // go through cells
    for (var i = 1; i < $table[0].rows.length; i++) {
        var tableRow = $table[0].rows[i];
        var rowData = {};
        for (var j = 0; j < tableRow.cells.length; j++) {
            if (!(tableRow.cells[j].dataset.label).includes('button'))
            {
                if ($(tableRow.cells[j]).has('input').length > 0) {
                    $(tableRow.cells[j]).find('input').eq(0).val();
                    rowData[tableRow.cells[j].dataset.label] = $(tableRow.cells[j]).find('input').eq(0).val();
                }
                else {
                    rowData[tableRow.cells[j].dataset.label] = tableRow.cells[j].innerHTML;
                }
            }
        }
        data.push(rowData);
    }
    return data;
}