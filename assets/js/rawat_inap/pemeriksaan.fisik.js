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

var sourceImage, targetRoot, maState, markerArea;

$(function () {
    $('#btnAddExam').on('click', function() {    
        $('#modal-foto').modal('toggle');
    })

    $("#modal-foto").on("shown.bs.modal", function (e) {
        console.log('test');
        requestAnimationFrame(function () {
          // Expose this filterizr as a global for debugging
          $(".simplefilter .fltr-controls:first-child").click();
        });               
    });		
    handleExam();    
});

function handleExam(){
    const $sourceImage = $('#sourceImage');
    const $targetImage = $('#targetImage');    
    sourceImage = document.getElementById("sourceImage");      
    markerArea = new markerjs2.MarkerArea(sourceImage);    
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
    $("#uploadgambarpemeriksaan").submit(function(e){
        e.preventDefault();
        const input = document.getElementById("fotopemeriksaan"); 
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $sourceImage.attr("src", e.target.result);
                $targetImage.attr("src", e.target.result);              
                let inputPemeriksaanFisik = $('#inputPemeriksaanFisik');
                let inputKeteranganFisik = $('#inputKeteranganFisik');          
                inputPemeriksaanFisik.val("");
                inputKeteranganFisik.val(""); 
                $('#modal-foto').modal('toggle');
                $('#modal-foto-editor').modal('toggle'); 
            }

            reader.readAsDataURL(input.files[0]);
        }
    });


    $targetImage.on("click", () => showMarkerArea(targetImage))
    $btnSave.on("click", (event) => selectMarker(event, $tableExam, encounter.exam, markerArea))
    $tableExam.find('tbody').on("click", "td .btn-delete", (event) => deleteListener(event, {$target:$tableExam, arr: encounter.exam}));        
}

function selectMarker(e, $tableExam, exams, markerArea) {
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
	let image = $('#targetImage').attr('src');   
		
	if(image.includes("http")){
	  pathToDataUrl(image, function(myBase64) {
		image = myBase64; 
	  });    
	}
	const exam = new Exam(
		{id: null, nama: nama, keterangan: keterangan, original: "", is_deleted: 0, image: image}
	);    

	PemeriksaanFisikRow($tableExam, exams, exam);                    

	maState = null;
	markerArea.clear();

	$('#modal-foto-editor').modal('toggle');
}

function PemeriksaanFisikRow($tableExam, exams, exam){    
    var template = Handlebars.compile('<tr><td data-label="nama">{{nama}}</td><td data-label="keterangan">{{keterangan}}</td><td data-label="foto"><img src="{{image}}" class="img-fluid"></td><td data-label="original" class="d-none">{{original}}</td><td data-label="is_delete" class="d-none">{{is_delete}}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button class="btn btn-danger btn-delete" type="button"><i class="fas fa-trash"></i></button></div></td></tr>');    
    if (exams.length === 0) {
        $tableExam.find('tbody').empty();
    }        
    exams.push(exam);
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

function fillTablePemeriksaanFisik(data) {
    let $tablePemeriksaanFisik = $('#tableExam');
    $tablePemeriksaanFisik.find('tbody').empty();
    if (data.length === 0) {
        let colspan = $tablePemeriksaanFisik.find('thead tr th').length;
        $tablePemeriksaanFisik.find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
    }
    $.each(data, function(key, value) {
        pathToDataUrl(value.fullpath, function(myBase64) {
            const exam = new Exam(
                {id: null, nama: value.nama_pemeriksaan, keterangan: value.keterangan, original: value.foto, is_deleted: value.is_delete, image: myBase64}
            );    
            PemeriksaanFisikRow($tablePemeriksaanFisik, encounter.exam, exam);              
        });
    });
}