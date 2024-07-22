class Patient {
    constructor({id, nama, no_rm}) {        
        this.id = id;
        this.nama = nama;        
        this.no_rm = no_rm;
    }  
}
class InPatient {
    constructor({id, no_registrasi}) {        
        this.id = id;
        this.no_registrasi = no_registrasi;
        this.pasien = {};
        this.observations = [];            
        this.prescriptions = [];
        this.procedures = [];
        this.nutritions = [];
        this.laboratories = [];
        this.imagings = [];  
        this.exams = [];                
        this.medications = [];
        this.render = function () {
            let noRegistrasiDisplay = `${this.no_registrasi}-${this.pasien.nama}(${this.pasien.no_rm})`;
            $('#inputNoReg1').val(noRegistrasiDisplay);
            $('#inputNoReg2').val(noRegistrasiDisplay);
        }
    }
}
class Observation {
    constructor({id, tanggal, keterangan}) {        
        this.id = id;
        this.tanggal = tanggal;
        this.keterangan = keterangan;
    }
}
class Prescription {
    constructor({id, tanggal, keterangan}) {        
        this.id = id;
        this.tanggal = tanggal;
        this.keterangan = keterangan;
        this.status = 'Pending';        
    }
}
class Nutrition {
    constructor({id, tanggal, nutrition_type_id, nutrition_type_desc}) {        
        this.id = id;
        this.tanggal = tanggal;
        this.nutrition_type_id = nutrition_type_id;
        this.nutrition_type_desc = nutrition_type_desc;        
    }
}
class Laboratory {
    constructor({id, tanggal, laboratory_type_id, laboratory_type_desc}) {        
        this.id = id;
        this.tanggal = tanggal;
        this.laboratory_type_id = laboratory_type_id;
        this.laboratory_type_desc = laboratory_type_desc;   
        this.status = 'Pending';                
    }
}

class Imaging {
    constructor({id, tanggal, imaging_type_id, imaging_type_desc}) {        
        this.id = id;
        this.tanggal = tanggal;
        this.imaging_type_id = imaging_type_id;
        this.imaging_type_desc = imaging_type_desc;   
        this.status = 'Pending';                
    }
}

class Exam {
    constructor({id, nama, keterangan, original, is_deleted, image}) {        
        this.id = id;
        this.nama = nama;
        this.keterangan = keterangan;
        this.original = original;   
        this.is_deleted = is_deleted;
        this.image = image;                
    }
}

class Procedure {
    constructor({kdTindakan, nmTindakan, maxTarif, withValue}) {        
        this.kdTindakan = kdTindakan;
        this.nmTindakan = nmTindakan;
        this.maxTarif = maxTarif;
        this.withValue = withValue;
        this.jumlah = 1;        
    }
}

class Medication {
    constructor({kdObat, nmObat, harga}) {        
        this.kdObat = kdObat;
        this.nmObat = nmObat;
        this.harga = harga;
        this.jumlah = 1;        
    }
}

var patient;
var ip;
let sourceImage, targetRoot, maState, markerArea;

(function($) {
    patient = new Patient({id: 1, nama: 'Denis F', no_rm: 'RM0001'});
    ip = new InPatient({id: 1, no_registrasi: 'R0001'});    
    ip.pasien = patient;
    ip.render();

    initWizard();
    actionWizard();

    handleProcedure();
    handleObservation();
    handlePrescription();
    handleNutrition();
    handleLaboratory();
    handleImaging();    
    handleExam();        
    handleMedication();

})(jQuery);


function handleExam(){
    const $sourceImage = $('#sourceImage');
    const $targetImage = $('#targetImage');    
    sourceImage = document.getElementById("sourceImage");      
    const targetImage = document.getElementById("targetImage"); 
    const $btnSave = $('#btnSavePemeriksaanFisik');
    const $tableExam = $('#tableExam');    
    setSourceImage(sourceImage);

    const options = {
        controlsSelector: '.fltr-controls',
        gutterPixels: 0,
        filter: 'all',
        layout: 'sameWidth',
        spinner: {
          enabled: true,
        },  
    };        
    const filterizr = new Filterizr('.filtr-container', options);

    $('#btnAddExam').on('click', function() {    
        $('#modal-foto').modal('toggle');
    })

    $("#modal-foto").on("shown.bs.modal", function (e) {
        requestAnimationFrame(function () {
          // Expose this filterizr as a global for debugging
          $(".simplefilter .fltr-controls:first-child").click();
        });               
    });		    

    $(".filtr-item").on("click", function () {
        const img =  $(this).find('img');
        $sourceImage.attr("src", img.attr('src'));
        $targetImage.attr("src", img.attr('src'));				
        let inputPemeriksaanFisik = $('#inputPemeriksaanFisik');
        let inputKeteranganFisik = $('#inputKeteranganFisik');			
        inputPemeriksaanFisik.val("");
        inputKeteranganFisik.val("");
        $('#modal-foto').modal('toggle');
        $('#modal-foto-editor').modal('toggle'); 
    });     
  
    $targetImage.on("click", function () {
        showMarkerArea(targetImage);
    }); 

    $btnSave.on("click", function (e) {
        if(markerArea.isOpen){
            bootbox.alert({
              centerVertical: true,
              message: "Image editor belum disimpan!",
              size: 'small'
          });
          return false;    
        }
        const nama = $('#inputPemeriksaanFisik').val();
        const keterangan = $('#inputKeteranganFisik').val();
        const image = $('#targetImage').attr('src');   
            
        if(image.includes("http")){
          pathToDataUrl(image, function(myBase64) {
            image = myBase64; 
          });    
        }
        const exam = new Exam(
            {id: null, nama: nama, keterangan: keterangan, original: "", is_deleted: 0, image: image}
        );    

        PemeriksaanFisikRow($tableExam, exam);                    

        maState = null;
        markerArea.clear();

        $('#modal-foto-editor').modal('toggle');
    })
    handleTableDelete($tableExam, ip.exams);      
}

function PemeriksaanFisikRow($tableExam, exam){    

    var template = Handlebars.compile('<tr><td data-label="nama">{{nama}}</td><td data-label="keterangan">{{keterangan}}</td><td data-label="foto"><img src="{{image}}" class="img-fluid"></td><td data-label="original" class="d-none">{{original}}</td><td data-label="is_delete" class="d-none">{{is_delete}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button class="btn btn-danger btn-delete" type="button"><i class="fas fa-trash"></i></button></div></td></tr>');    
    if (ip.exams.length === 0) {
        $tableExam.find('tbody').empty();
    }        
    ip.exams.push(exam);
    console.log(ip);                
    $tableExam.find('tbody').append(template(exam));    
}

function pathToDataUrl(url, callback) {
    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
        var reader = new FileReader();
        reader.onloadend = function() {
            callback(reader.result);
        }
        reader.readAsDataURL(xhr.response);
    };
    xhr.open('GET', url);
    xhr.responseType = 'blob';
    xhr.send();
  }

function setSourceImage(source) {
    sourceImage = source;
    targetRoot = source.parentElement;
}

function showMarkerArea(target) {
    markerArea = new markerjs2.MarkerArea(sourceImage);
    markerArea.availableMarkerTypes = markerArea.ALL_MARKER_TYPES;		
    // since the container div is set to position: relative it is now our positioning root
    // end we have to let marker.js know that
    markerArea.targetRoot = targetRoot;
    markerArea.addEventListener("render", (event) => {
        target.src = event.dataUrl;
        // save the state of MarkerArea
        maState = event.state;
    });
    markerArea.show();
    // if previous state is present - restore it
    if (maState) {
        markerArea.restoreState(maState);
    }
}

function handleImaging(){
    const $tableRad = $('#tableRad');    
    $('#dateTanggalRad').datetimepicker({        
        format: 'DD/MM/YYYY HH:mm',
        sideBySide: true,
        defaultDate: new Date()        
    });      
    $('#btnAddRad').on('click', function() {
        const $control = $('#inputJenisRad');        
        const tanggal = moment($('#dateTanggalRad').datetimepicker('date')).format('YYYY-MM-DD HH:mm:ss');        
        const imaging_type_id = $control.val();
        const imaging_type_desc = $control.find("option:selected").text();
        const lab = new Imaging({id: null, tanggal: tanggal, imaging_type_id: imaging_type_id, imaging_type_desc: imaging_type_desc});

        var template = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td data-label="tanggal" class="text-left align-middle">{{tanggal}}</td><td data-label="imaging_type" class="text-left align-middle">{{imaging_type_desc}}</td><td data-label="status" class="text-left align-middle">{{status}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');
        if (ip.imagings.length === 0) {
            $tableRad.find('tbody').empty();
        }        
        ip.imagings.push(lab);
        console.log(ip);                
        $tableRad.find('tbody').append(template(lab));
        selectClear($control);
    })   
    handleTableDelete($tableRad, ip.imagings);      
}
function handleLaboratory(){
    const $tableLab = $('#tableLab');    
    $('#dateTanggalLab').datetimepicker({        
        format: 'DD/MM/YYYY HH:mm',
        sideBySide: true,
        defaultDate: new Date()        
    });      
    $('#btnAddLab').on('click', function() {
        const $control = $('#inputJenisLab');        
        const tanggal = moment($('#dateTanggalLab').datetimepicker('date')).format('YYYY-MM-DD HH:mm:ss');        
        const laboratory_type_id = $control.val();
        const laboratory_type_desc = $control.find("option:selected").text();
        const lab = new Laboratory({id: null, tanggal: tanggal, laboratory_type_id: laboratory_type_id, laboratory_type_desc: laboratory_type_desc});

        var template = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td data-label="tanggal" class="text-left align-middle">{{tanggal}}</td><td data-label="laboratory_type" class="text-left align-middle">{{laboratory_type_desc}}</td><td data-label="status" class="text-left align-middle">{{status}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');
        if (ip.laboratories.length === 0) {
            $tableLab.find('tbody').empty();
        }        
        ip.laboratories.push(lab);
        console.log(ip);                
        $tableLab.find('tbody').append(template(lab));
        selectClear($control);
    })   
    handleTableDelete($tableLab, ip.laboratories);      
}
function handleNutrition(){
    const $tableGizi = $('#tableGizi');    
    $('#dateTanggalGizi').datetimepicker({        
        format: 'DD/MM/YYYY HH:mm',
        sideBySide: true,
        defaultDate: new Date()        
    });      
    $('#btnAddGizi').on('click', function() {
        const $control = $('#inputKeteranganGizi');        
        const tanggal = moment($('#dateTanggalGizi').datetimepicker('date')).format('YYYY-MM-DD HH:mm:ss');        
        const nutrition_type_id = $control.val();
        const nutrition_type_desc = $control.find("option:selected").text();
        const nutrition = new Nutrition({id: null, tanggal: tanggal, nutrition_type_id: nutrition_type_id, nutrition_type_desc: nutrition_type_desc});

        var template = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td data-label="tanggal" class="text-left align-middle">{{tanggal}}</td><td data-label="nutrition_type" class="text-left align-middle">{{nutrition_type_desc}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');
        if (ip.nutritions.length === 0) {
            $tableGizi.find('tbody').empty();
        }        
        ip.nutritions.push(nutrition);
        console.log(ip);                
        $tableGizi.find('tbody').append(template(nutrition));
        selectClear($control);
    })   
    handleTableDelete($tableGizi, ip.nutritions);       
}

function handlePrescription(){
    const $tableResep = $('#tableResep');    
    $('#dateTanggalResep').datetimepicker({        
        format: 'DD/MM/YYYY HH:mm',
        sideBySide: true,
        defaultDate: new Date()        
    });  

    $('#btnAddResep').on('click', function() {
        const $control = $('#inputKeteranganResep');        
        const tanggal = moment($('#dateTanggalResep').datetimepicker('date')).format('YYYY-MM-DD HH:mm:ss');        
        const keterangan = $control.val();
        const prescription = new Prescription({id: null, tanggal: tanggal, keterangan: keterangan});

        var template = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td data-label="tanggal" class="text-left align-middle">{{tanggal}}</td><td data-label="keterangan" class="text-left align-middle">{{keterangan}}</td><td data-label="status" class="text-left align-middle">{{status}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');
        if (ip.prescriptions.length === 0) {
            $tableResep.find('tbody').empty();
        }        
        ip.prescriptions.push(prescription);
        console.log(ip);                
        $tableResep.find('tbody').append(template(prescription));
        autoCompleteClear($control);
    })        
    handleTableDelete($tableResep, ip.prescriptions);    
}

function handleObservation(){
    const $tableObservasi = $('#tableObservasi');    
    $('#dateTanggalObservasi').datetimepicker({        
        format: 'DD/MM/YYYY HH:mm',
        sideBySide: true,
        defaultDate: new Date()        
    });      
    $('#btnAddObservasi').on('click', function() {
        const $control = $('#inputKeteranganObservasi');
        const tanggal = moment($('#dateTanggalObservasi').datetimepicker('date')).format('YYYY-MM-DD HH:mm:ss');        
        const keterangan = $control.val();
        const observation = new Observation({id: null, tanggal: tanggal, keterangan: keterangan});

        var template = Handlebars.compile('<tr><td class="d-none" data-label="id">{{id}}</td><td data-label="tanggal" class="text-left align-middle">{{tanggal}}</td><td data-label="keterangan" class="text-left align-middle">{{keterangan}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');
        if (ip.observations.length === 0) {
            $tableObservasi.find('tbody').empty();
        }        
        ip.observations.push(observation);
        console.log(ip);                
        $tableObservasi.find('tbody').append(template(observation));
        autoCompleteClear($control);
    })
    handleTableDelete($tableObservasi, ip.observations);        
}
function handleProcedure() {
    let template = Handlebars.compile('<tr><td class="d-none" data-label="id">{{kdTindakan}}</td><td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1"></td><td data-label="nama" class="text-left align-middle">{{nmTindakan}}</td><td class="d-none" data-label="harga">{{maxTarif}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');        
    const $control = $('#inputLayanan');
    const $target = $('#tableLayanan');
    const autoComplete = {
        $control: $control,        
        field: {
            value: 'kdTindakan',
            text: 'nmTindakan'
        },        
        url: `${BASE_URL}RawatInap/get_layanan`,
        extra: {},                
    }
    setAutoComplete(autoComplete);
    setAutoCompleteSelection($control, $target, ip.procedures, Procedure, 'kdTindakan', template);
    handleTableDelete($target, ip.procedures);    
}
function handleMedication() {
    let template = Handlebars.compile('<tr><td class="d-none" data-label="id">{{kdObat}}</td><td data-label="jumlah" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1"></td><td data-label="nama" class="text-left align-middle">{{nmObat}}</td><td class="d-none" data-label="harga">{{harga}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>');        
    const $control = $('#inputMedication');
    const $target = $('#tableMedication');
    const autoComplete = {
        $control: $control,        
        field: {
            value: 'kdObat',
            text: 'nmObat'
        },        
        url: `${BASE_URL}RawatInap/get_obat`,
        extra: {},                
    }
    setAutoComplete(autoComplete);
    setAutoCompleteSelection($control, $target, ip.medications, Medication, 'kdObat', template);
    handleTableDelete($target, ip.medications);    
}
function setAutoCompleteSelection($control, $target, arr, objectType, key, template){
    $control.on('autocomplete.select', function(evt, item) {
        evt.preventDefault();
        let myObject = new(objectType)(item.data);
        if (arr.length === 0) {
            $target.find('tbody').empty();
        }          
        let index = indexItemInArray(arr, myObject, key);
        if (index == -1) {
            arr.push(myObject);
            console.log(ip);                            
            $target.find('tbody').append(template(myObject));                    
        }
        else{
            arr[index].jumlah = arr[index].jumlah + 1;            
            let input = $target.find('tbody tr').eq(index).find('.input-jumlah');
            $(input).val(parseInt($(input).val()) + 1);
            $(input).blur();            
        }
        autoCompleteClear($control);
    }); 
}
function setAutoComplete({$control, field, url, extra}){
    $control.autoComplete({
        preventEnter: true,
        resolver: 'custom',
        events: {
            search: function(search, callback) {
                // let's do a custom ajax call
                let data = Object.fromEntries(
                    // convert to array, map, and then fromEntries gives back the object
                    Object.entries(extra).map(([key, value]) => [key, value.val()])
                );
                data.search = search;
                $.getJSON(url, function (response) {
                    callback($.map(response, function(item) {
                        const auto = {value: item[field.value], text: item[field.text]}
                        const data = {data: item}
                        const result = {
                            ...auto,
                            ...data,
                          };                        
                        return result;
					}))
                }); 
            }
        }
    });
}
function handleTableDelete($target, arr) {
    $target.find('tbody').on("click", "td .btn-delete", function() {
        $tr = $(this).closest('tr');
        const index = $(this).closest('td').parent()[0].sectionRowIndex;
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
                    arr.splice(index, 1);                
                    $tr.remove();
                    if ($target.find('tbody tr').length == 0) {
                        let colspan = $target.find('thead tr th').length;
                        $target.find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
                    }
                }
            }
        });
    });
}

function autoCompleteClear($e) {
    $e.val('').focus();
    $e.parent().find('.dropdown-menu .dropdown-item.active').removeClass('active');
}
function selectClear($e) {
    $e.val('').focus();
}

function initWizard() {
    //Initialize wizard			
    var $active = $(".wizard").find('li.active');
    $active.removeClass('active');
    let $step = $('.wizard .nav-tabs li');
    $step.eq(WIZARD_INDEX).addClass('active').removeClass('disabled');

    $step.each(function(i, item) {
        if (i < WIZARD_INDEX)
            $(item).addClass('done').removeClass('disabled');
    });

    $step.eq(WIZARD_INDEX).find('a[data-toggle="tab"]').click();
}

function actionWizard() {
    $('.nav-tabs > li a[title]').tooltip();
    $("#WizardForm").validate();

    //Action Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
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

    $(".next-step").click(function(e) {
        var $wizard = $('#wizardForm');
        $wizard.validate().settings.ignore = ":disabled,:hidden";
        //check validation
        //if (!$wizard.valid()) return false;
        var $active = $(".wizard").find('li.active');
        $active
            .removeClass('active')
            .addClass('done')
            .next()
            .removeClass('disabled')
            .addClass('active').find('a[data-toggle="tab"]').click();
    });

    $(".prev-step").click(function(e) {
        var $active = $(".wizard").find('li.active');
        $active
            .removeClass('active')
            .prev().addClass('active').find('a[data-toggle="tab"]').click();
    });
}

function indexItemInArray(array, item, key) {
    for (var i = 0; i < array.length; i++) {
        // This if statement depends on the format of your array
        if (array[i][key] == item[key]) {
            return i;   // Found it
        }
    }
    return -1;   // Not found
}