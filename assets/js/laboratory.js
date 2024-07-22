class Patient {
    constructor({id, nama, no_rm}) {        
        this.id = id;
        this.nama = nama;        
        this.no_rm = no_rm;
        this.render = function () {
            let noRmNama = `${this.no_rm}-${this.nama}`; 
            $('#inputNoRMNama').val(noRmNama);
        }               
    }  
}
class LaboratoryPatient {
    constructor({id, no_registrasi, tanggal_rujukan, id_laboratory_type, id_unit_layanan, id_dokter, id_tipe_pasien, id_petugas = null, tanggal_masuk = null}) {        
        this.id = id;
        this.id_dokter = id_dokter;
        this.id_unit_layanan = id_unit_layanan;
        this.id_tipe_pasien = id_tipe_pasien;
        this.no_registrasi = no_registrasi;
        this.tanggal_rujukan = tanggal_rujukan;
        this.id_laboratory_type = id_laboratory_type;
        this.tanggal_masuk = tanggal_masuk ?? new Date();
        this.expertise = null;
        this.tanggal_pemeriksaan = new Date();
        this.id_petugas = id_petugas;
        this.state_index = 0;
        this.pasien = {};
        this.observations = [];
        this.render = function () { 
            let noRegistrasiDisplay = `${this.no_registrasi}-${this.pasien.nama}(${this.pasien.no_rm})`;
            $('#inputNoReg1').val(noRegistrasiDisplay);
            $('#inputNoReg2').val(noRegistrasiDisplay);
            $('#inputUnitLayanan').val(this.id_unit_layanan);
            $('#inputUnitLayanan').trigger('change');
            $('#inputDokterUnitLayanan').val(this.id_dokter);
            $('#inputTipePasien').val(this.id_tipe_pasien); 
            $('#dateTanggalPeriksa').datetimepicker('date', moment(this.tanggal_rujukan, 'YYYY-MM-DD HH:mm') );                        
            $('#inputJenisLab').val(this.id_laboratory_type);
            $('#inputPetugas').val(this.id_petugas);                         
            $('#dateTanggalMasuk').datetimepicker('date', moment(this.tanggal_masuk, 'YYYY-MM-DD HH:mm') );                                    
            $('#dateTanggalPemeriksaan').datetimepicker('date', moment(this.tanggal_masuk, 'YYYY-MM-DD HH:mm') );                                                
            patient.render();
        }
        this.getStep1 = function() {
            this.tanggal_masuk = moment($('#dateTanggalMasuk').datetimepicker('viewDate')).format('YYYY-MM-DD HH:mm');
            this.id_petugas = $('#inputPetugas').val();
            this.state_index = 0;
        };     
        this.getStep2 = function() {
            this.tanggal_pemeriksaan = moment($('#dateTanggalPemeriksaan').datetimepicker('viewDate')).format('YYYY-MM-DD HH:mm');            
            this.expertise = $('#inputExpertise').val();
            this.state_index = 1;            
        };             
        this.save = function () {
            let param = {};
            if(this.state_index==0){                        
                param = {
                    id: this.id,
                    id_petugas: this.id_petugas,
                    tanggal_masuk: this.tanggal_masuk,
                    state_index: 1
                } 
            } 
            else if(this.state_index==1){                        
                param = {
                    id: this.id,
                    tanggal_pemeriksaan: this.tanggal_pemeriksaan,
                    expertise: this.expertise,
                    dataObservations: this.observations,
                    state_index: 2
                } 
            }
            
            return $.ajax({
                type: "POST",
                url: BASE_URL + "Laboratory/save",
                data: JSON.stringify(param),
                dataType: 'json',
                async: true,                
                contentType: 'application/json; charset=utf-8'
            });             
        }       
    }
}
class ObservLaboratory {
    constructor({id, ref_laboratory_code, ref_laboratory_desc, result, ref_laboratory_range, uom}) {        
        this.id = id;
        this.ref_laboratory_code = ref_laboratory_code;
        this.ref_laboratory_desc = ref_laboratory_desc;
        this.result = result;
        this.ref_laboratory_range = ref_laboratory_range;
        this.uom = uom;
    }
}

var patient;
var labPatient;

(function($) {
    'use strict'
    var $wizard = $('.wizard')
    var $wizardForm = $('#wizardForm')
    $wizard.find('.nav-tabs > li a[title]').tooltip();

    initWizard({ $wizard, $wizardForm });
    actionWizard({ $wizard, $wizardForm });
	
    patient = new Patient({id: 0, nama: '', no_rm: ''});
    labPatient = new LaboratoryPatient({id: '', no_registrasi: '', tanggal_rujukan: null, id_laboratory_type: null, id_unit_layanan : '',id_dokter:'',id_tipe_pasien:''});    
    labPatient.pasien = patient;
    labPatient.render();
    handleObservLaboratory();
    PasienRegisterBinding();
})(jQuery);

function initWizard({ $wizard, $wizardForm }) {
    //Initialize wizard			
    var $active = $wizard.find('li.active');
    $active.removeClass('active');
    let $step = $wizard.find('.nav-tabs li');
    $step.eq(WIZARD_INDEX).addClass('active').removeClass('disabled');
    $step.each(function(i, item) {
        if (i < WIZARD_INDEX)
            $(item).addClass('done').removeClass('disabled');
    });
    $step.eq(WIZARD_INDEX).find('a[data-toggle="tab"]').click();
    $wizardForm.validate();

    $wizard.find('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        var $target = $(e.target);
        if ($target.parent().hasClass('disabled')) {
            return false;
        } else {
            $target.parent()
                .addClass('active')
                .siblings()
                .removeClass('active');
        }
    });
}

function actionWizard({ $wizard, $wizardForm }) {
    $wizardForm.find(".next-step").click(function(e) {
        $wizardForm.validate().settings.ignore = ":disabled,:hidden";
        if (!$wizardForm.valid()) return false;

        var $active = $wizard.find('li.active');
        let click_index = $wizard.find('.nav-tabs li').index($active);
        switch (click_index) {
            case 0:
                console.log("save step 1");
                labPatient.getStep1();

                $.when(labPatient.save()).done(function(response) {
                    if (response.status) {
                        console.log('done');
                    } else {
                        console.log('fail');
                    }
                });                 
                break;
            case 1:
                console.log("save step 2");
                labPatient.getStep2();                     
                $.when(labPatient.save()).done(function(response) {
                    if (response.status) {
                        console.log('done');
                        ToastEnd.fire({
                            icon: 'success',
                            title: 'Data berhasil disimpan'
                        });                        
                    } else {
                        console.log('fail');
                    }
                });
                break;
        }

        $active
            .removeClass('active')
            .addClass('done')
            .next()
            .removeClass('disabled')
            .addClass('active').find('a[data-toggle="tab"]').click();
    });

    $wizardForm.find(".prev-step").click(function(e) {
        var $active = $wizard.find('li.active');
        $active
            .removeClass('active')
            .prev().addClass('active').find('a[data-toggle="tab"]').click();
    });
}

function handleObservLaboratory(){
    const $tableObservLaboratory = $('#tableObservLaboratory');          
    $('#btnAddObservLaboratory').on('click', function() {
        const $control = $('#inputObservLaboratory');        
        const ref_laboratory_id = $control.val();
        let observation = $control.find("option:selected").data('observation');
        observation.id = null;

        const lab = new ObservLaboratory(observation);

        var template = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td data-label="ref_laboratory_desc" class="text-left align-middle">{{ref_laboratory_desc}}</td><td data-label="result" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="{{result}}" step="1"></td><td data-label="ref_laboratory_range" class="text-center align-middle">{{ref_laboratory_range}}</td><td data-label="uom" class="text-center align-middle">{{uom}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');
        if (labPatient.observations.length === 0) {
            $tableObservLaboratory.find('tbody').empty();
        }        
        labPatient.observations.push(lab);
        //save to db
        $tableObservLaboratory.find('tbody').append(template(lab));
        selectClear($control);
    })   

    $("#tableObservLaboratory").on('blur', '.input-jumlah', function() {
        const index_exist = $(this).closest('td').parent()[0].sectionRowIndex;
        const jumlah = parseInt($(this).val());
        labPatient.observations[index_exist].result = jumlah;
    });     
}

function selectClear($e) {
    $e.val('').focus();
}

function PasienRegisterBinding() {
    
    var initialLoadPasienLaboratory = true;	
    var $tablePasienLaboratoryDT = $("#tablePasienLaboratory").DataTable({ 
        autoWidth: false,
        processing: true,
        serverSide: true,
        pageLength: 10,
        order: [
            [1, "asc"]
        ],
        ajax: function (data, callback, settings) {
            if (initialLoadPasienLaboratory) {
                initialLoadPasienLaboratory = false;
                callback({data: []}); // don't fire ajax, just return empty set
                return;
            }
			data.state_index = GetStateIndex();		 			
            $.post(BASE_URL + 'Laboratory/getDatatableLaboratory', data, function(result) {
                callback(result);                
              }, "json");            
        }, 	 		
        
        "columns": [
            { "data": null },
            { "data": "no_registrasi" }, 
            { "data": 'nama_pasien' },
            { "data": "no_rm" }, 
            { "data": "nama_dokter" },
            { "data": "dokter_ahli" },
            { "data": "tanggal_daftar" , "render": $.fn.dataTable.render.moment("YYYY-MM-DD HH:mm:ss","DD/MM/YYYY HH:mm")},
            { "data": "tanggal_masuk" , "render": $.fn.dataTable.render.moment("YYYY-MM-DD HH:mm:ss","DD/MM/YYYY HH:mm")},
            { "data": "tanggal_pemeriksaan" , "render": $.fn.dataTable.render.moment("YYYY-MM-DD HH:mm:ss","DD/MM/YYYY HH:mm")},            
            { "data": "id_unit_layanan" } ,
            { "data": "id_dokter" } ,
            { "data": "id_tipe_pasien" } , 
            { "data": "id_pasien" } ,
            { "data": "id_petugas" } ,            
            { "data": "id" } 

        ],
        columnDefs: [{
                targets: [1, 2],
                orderable: true
            }, 
            {
                targets: [-1,-2,-3,-4,-5,-6,-7,-8],
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

    $("#tablePasienLaboratory tbody").on('click', 'button.btn-pilih', function() {

        let data = $tablePasienLaboratoryDT.row($(this).parents('tr')).data();
        let id = data.id;
        let id_pasien = data.id_pasien;

        patient = new Patient({id: id_pasien, nama: data.nama_pasien, no_rm: data.no_rm});
        labPatient = new LaboratoryPatient({
            id:id,
            no_registrasi: data.no_registrasi,
            tanggal_rujukan: data.tanggal_daftar,
            id_laboratory_type: data.id_laboratory_type,
            id_unit_layanan: data.id_unit_layanan,
            id_dokter: data.id_dokter,
            id_tipe_pasien: data.id_tipe_pasien,
            id_petugas: data.id_petugas,
            tanggal_masuk: data.tanggal_masuk,
        });
        labPatient.pasien = patient;
        labPatient.render();
		$('#modal-registrasi').modal('toggle');       
    });

    $('#modal-registrasi').on('shown.bs.modal', function() {
        // Adjust column width and re-initialize Responsive extension
        requestAnimationFrame(() =>
            $("#tablePasienLaboratory").DataTable()
            .ajax.reload(null, false)
        );
    });	      

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
                if (labPatient.id_dokter) {
                    if ($("#inputDokterUnitLayanan option[value='" + labPatient.id_dokter + "']").length > 0) {
                        $('#inputDokterUnitLayanan').val(labPatient.id_dokter);
                    }
                }
            }
        });
    }
    $('#inputUnitLayanan').on('change', onSelectedIndexChanged);
}

function GetStateIndex(){
    var $active = $(".wizard").find('li.active');
    const click_index = $('.wizard .nav-tabs li').index($active);    
    return click_index;
}