class Practitioner {
    constructor({ id, nama_dokter }) {
        this.id = parseInt(id);
        this.nama_dokter = nama_dokter;
        this.ktp  = null;
        this.nip  = null;
        this.sip  = null;
        this.gelar_depan = null;
        this.gelar_belakang = null;
        this.dokter_ahli = null;
        this.alamat = null;
        this.no_telp = null;
        this.email = null;
        this.ihs_id = null;
        this.kdDokter = null;
        this.updateIHS = function(ihs) {
            this.ihs_id = ihs.id;
            $('#formNamaDokter').val(ihs.name);			
            $('#formIHS_ID').val(ihs.id);
            $('#formStatusIHS').val('Terdaftar');
        };
        this.render = function() {
			var self = this;
            $('#formIdDokter').val(this.id);
            $('#formNamaDokter').val(this.nama_dokter);
            $('#formKTP').val(this.ktp);
            $('#formNIP').val(this.nip);
            $('#formSIP').val(this.sip);
            $('#formDokterAhli').val(this.dokter_ahli);
            $('#formGelarDepan').val(this.gelar_depan);
            $('#formGelarBelakang').val(this.gelar_belakang);
            $('#formGelarBelakang').val(this.gelar_belakang);
            $('#formAlamat').val(this.alamat);
            $('#formNoTelp').val(this.no_telp);
            $('#formEmail').val(this.email);
            $('#formStatusIHS').val('Tidak Terdaftar');            
            $('#formKdDokter').val(this.kdDokter);      

            if(this.ihs_id){
                $('#formStatusIHS').val('Terdaftar');
            }
            else if (this.ktp) {
                $.when(fetchIhsDokter(this.ktp)).done(function(response) {
                    if(response.data.id){
                        self.updateIHS(response.data);
                    }
                });
            }			
        };
    }
}
window.practitioner = new Practitioner({ id: 0, nama_dokter: null });

$(function () {
    $('#formKTP').on('blur', function() {
            if(!$(this).val()){
                $('#formIHS_ID').val('');
                $('#formStatusIHS').val('Tidak Terdaftar');                
                return false
            }
            SpinnerOn();
            $.when(fetchIhsDokter($(this).val())).done(function(response) {                    
                if(response.data.id)
					practitioner.updateIHS(response.data);
                SpinnerOff();
        });
    });
    $('#btn-cari-dokter-bpjs').on('click', function() {
        $('#modal-formDokter').modal('toggle');        
        $('#modal-DokterBPJS').modal('toggle');
    });    
    DokterBinding();
    DokterBPJSBinding();
});

function DokterBinding() {
    $("#FormDokter").validate();

    var $tableDokterDT = $("#tableDokter").DataTable({
        autoWidth: false,
        processing: true,
        pageLength: 10,
        order: [
            [2, "asc"]
        ],
        ajax: function(data, callback, settings) {
            $.get(BASE_URL + 'MasterData/getDokterDataTable', function(result) {
                callback(result);
            }, "json");
        },        
        columns: [
            { "data": null },
            { "data": "nama_dokter" },
            { "data": "nip" },
            { "data": "sip" },
            { "data": "gelar_depan" },
            { "data": "gelar_belakang" },
            { "data": "dokter_ahli" },
            { "data": "alamat" },
            { "data": "no_telp" },
            { "data": "email" },
            { "data": "ktp" },
            { "data": "ihs_id" },
            { "data": "kdDokter" },
            { "data": "id" },            
            { "data": null }
        ],		
        columnDefs: [
			{
                searchable: false,
                orderable: false,
                targets: [0, -1]
            },
            {
                targets: -1,
                data: null,
                defaultContent: `<button class="btn btn-info btn-sm btn-edit"><i class="fas fa-pencil-alt"></i>Ubah</button>
        <button class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i>Hapus</button>`,
                className: "actions text-right"
            },
            {
                targets: [-2, -3, -4, -5],
                visible: false
            }
        ]
    });

    $tableDokterDT.on('order.dt search.dt', function() {
        $tableDokterDT.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    $("#tableDokter tbody").on('click', 'button.btn-edit', function() {
        let data = $tableDokterDT.row($(this).parents('tr')).data();
		const practitionerArr = {
			id: data.id,
			nama_dokter: data.nama_dokter,
		};
			
        practitioner = new Practitioner(practitionerArr);
		practitioner.ktp = data.ktp;
		practitioner.nip = data.nip;
		practitioner.sip = data.sip;
		practitioner.gelar_depan = data.gelar_depan;
		practitioner.gelar_belakang = data.gelar_belakang;
		practitioner.dokter_ahli = data.dokter_ahli;
		practitioner.alamat = data.alamat;
		practitioner.no_telp = data.no_telp;
		practitioner.email = data.email;		
		practitioner.ihs_id = data.ihs_id;		
		practitioner.kdDokter = data.kdDokter;		
		practitioner.render();			
        $('#modal-formDokter').modal('toggle');
    });

    $("#tableDokter tbody").on('click', 'button.btn-delete', function() {
        let data = $tableDokterDT.row($(this).parents('tr')).data();
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
                        url: BASE_URL + "MasterData/deleteDokter",
                        data: JSON.stringify({ id: id }),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8'
                    });

                    $.when(aDelete).done(function(response) {
                        if (response.status) {
                            $("#tableDokter").DataTable()
                                .ajax.reload();
                            Toast.fire({
                                icon: 'success',
                                title: 'Data berhasil dihapus'
                            });
                        } else
                            console.log(response.message);
                    });
                }
            }
        });
    });

    $("#btnAddDokter").on('click', function() {
		practitioner = new Practitioner({ id: 0, nama_dokter: null });
        $("#formIdDokter").val(0);
        $("#formNamaDokter").val('').focus();
        $("#formNIP").val('');
        $("#formSIP").val('');
        $("#formGelarDepan").val('');
        $("#formGelarBelakang").val('');
        $("#formDokterAhli").val('');
        $("#formAlamat").val('');
        $("#formNoTelp").val('');
        $("#formEmail").val('');
        $('#formKTP').val('');
        $('#formIHS_ID').val('');
        $('#formStatusIHS').val('');        
        $('#formKdDokter').val('');
        $('#formNmDokter').val('');		
        $('#modal-formDokter').modal('toggle');
    });

    $("#btnSaveDokter").on('click', function() {
        //event.preventDefault();
        if (!$('#FormDokter').valid())
            return false;

/*            
        let id = $("#formIdDokter").val();
        let namaDokter = $("#formNamaDokter").val();
        let nip = $("#formNIP").val();
        let sip = $("#formSIP").val();
        let gelar_depan = $("#formGelarDepan").val();
        let gelar_belakang = $("#formGelarBelakang").val();
        let dokter_ahli = $("#formDokterAhli").val();
        let alamat = $("#formAlamat").val();
        let no_telp = $("#formNoTelp").val();
        let email = $("#formEmail").val();
*/
        practitioner.nama_dokter = $("#formNamaDokter").val();
        practitioner.ktp = $("#formKTP").val();
        practitioner.nip = $("#formNIP").val();
        practitioner.sip = $("#formSIP").val();
        practitioner.gelar_depan = $("#formGelarDepan").val();
        practitioner.gelar_belakang = $("#formGelarBelakang").val();
        practitioner.dokter_ahli = $("#formDokterAhli").val();
        practitioner.alamat = $("#formAlamat").val();
        practitioner.no_telp = $("#formNoTelp").val();
        practitioner.email = $("#formEmail").val();
        practitioner.ihs_id = $("#formIHS_ID").val();
        practitioner.kdDokter = $("#formKdDokter").val();

        let aSave = $.ajax({
            type: "POST",
            url: BASE_URL + "MasterData/saveDokter",
            data: JSON.stringify(practitioner),
            dataType: 'json',
            contentType: 'application/json; charset=utf-8'
        });

        $.when(aSave).done(function(response) {
            if (response.status) {
                $("#tableDokter").DataTable()
                    .ajax.reload();
                Toast.fire({
                    icon: 'success',
                    title: 'Data berhasil disimpan'
                });
            } else
                console.log(response.message);
        });

        $('#modal-formDokter').modal('toggle');
        return false;
    });
}

function SpinnerOn() {
    console.log("spinner on");
    $(".spinner-input").show();
}

function SpinnerOff() {
    $(".spinner-input").hide();
}

async function fetchIhsDokter(ktp) {
    const ajaxFetch = $.ajax({
        type: "GET",
        async: true,
        url: BASE_URL + "satusehat/dokter/" + ktp,
        dataType: 'json',
        contentType: 'application/json; charset=utf-8'
    });
    return ajaxFetch;
}

function DokterBPJSBinding() {
    var initialLoad = true;
    var $tableDokterBPJS = $("#tableDokterBPJS").DataTable({
        autoWidth: false,
        processing: true,
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
            $.get(BASE_URL + 'pcare/dokter/0/100', function(result) {
                console.log(result.response.list);
                callback({data:result.response.list});
            }, "json");
        },
        "columns": [
            { "data": null },            
            { "data": "kdDokter" },
            { "data": "nmDokter" },
        ],
        columnDefs: [{
                targets: [1, 2],
                orderable: true
            },
            {
                targets: 0,
                data: null,
                defaultContent: '<button class="btn btn-info btn-sm mr-0 btn-pilih">Pilih</button>'
            },
        ],
    });

    $("#tableDokterBPJS tbody").on('click', 'button', function() {
        let data = $tableDokterBPJS.row($(this).parents('tr')).data();
        $('#formKdDokter').val(data.kdDokter);
        $('#formNamaDokter').val(data.nmDokter);

        $('#modal-DokterBPJS').modal('toggle');
        $('#modal-formDokter').modal('toggle');
    });    

    $('#modal-DokterBPJS').on('shown.bs.modal', function() {
        // Adjust column width and re-initialize Responsive extension

        requestAnimationFrame(() =>
            $("#tableDokterBPJS").DataTable()
            .ajax.reload()
        );            
    });    
}