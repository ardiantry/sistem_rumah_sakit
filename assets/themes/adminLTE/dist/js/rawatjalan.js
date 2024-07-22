//Initialize variable
var $wizard = $('#wizardForm');

$(document).ready(function() {  
    //Initial
    initPromise = wz.init(wizard_index);	
    $.when(initPromise).done(function () {
        calculate();
    });	    		

    $('#tableInvoiceLayanan').find('tbody').on('blur', 'td .input-harga', function() {
        let harga = $(this).val();
        let jumlah = $(this).closest('tr').find('td[data-label="jumlah"]').html();
        let total = parseInt(jumlah) * parseInt(harga);
        $(this).closest('tr').find('td[data-label="total"]').html(total);
        calculate();        
      });	

      $('#tableInvoiceObat').find('tbody').on('blur', 'td .input-harga', function() {
        let harga = $(this).val();
        let jumlah = $(this).closest('tr').find('td[data-label="jumlah"]').html();
        let total = parseInt(jumlah) * parseInt(harga);
        $(this).closest('tr').find('td[data-label="total"]').html(total);
        calculate();        
      });	        

      $('#inputDiskon').on('blur', function() {
        calculate();
      });

      $('#inputPajak').on('blur', function() {
        calculate();
      }); 

      ofnTableOnDelete($('#tableInvoiceTambahan'));

      $('#btnTambahan').on('click', function() {
          let jumlah = $('#inputJumlahTambahan').val();
          let nama = $('#inputNamaTambahan').val();
          let harga = $('#inputHargaTambahan').val();                    
          $('#inputJumlahTambahan').val('');
          $('#inputJumlahTambahan').focus();          
          $('#inputNamaTambahan').val('');
          $('#inputHargaTambahan').val('');          
          if ($('#tableInvoiceTambahan').find('tbody tr td:eq(0)').data('label') == 'empty_row')
                $('#tableInvoiceTambahan').find('tbody').empty();          
          $('#tableInvoiceTambahan').find('tbody').append(`<tr><td class="text-center align-middle" data-label="jumlah"><input type="number" class="form-control form-control-sm text-right" value="${jumlah}" step="1"></td><td class="text-left align-middle" data-label="nama">${nama}</td><td class="text-right align-middle" data-label="harga"><input type="number" class="form-control form-control-sm text-right" value="${parseInt(harga)}" step="1"></td><td class="text-right align-middle" data-label="total">${parseInt(harga) * parseInt(jumlah)}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`);          
          calculate();
      });

      $('#tableInvoiceTambahan').find('tbody').on('blur', 'td[data-label="jumlah"] input', function() {
        let jumlah = $(this).val();
        let harga = $(this).closest('tr').find('td[data-label="harga"] input').val();
        let total = parseInt(jumlah) * parseInt(harga);
        $(this).closest('tr').find('td[data-label="total"]').html(total);
        calculate();
      });

      $('#tableInvoiceTambahan').find('tbody').on('blur', 'td[data-label="harga"] input', function() {
        let harga = $(this).val();
        let jumlah = $(this).closest('tr').find('td[data-label="jumlah"] input').val();
        let total = parseInt(jumlah) * parseInt(harga);
        $(this).closest('tr').find('td[data-label="total"]').html(total);
        calculate();
      });            

});

wz = {
	init: function(wi){
		wz.initConfig();
		wz.initValidation();
		wz.bindData();
		wz.initWizard(wi);
	},
	initConfig: function(){
  		$.fn.datetimepicker.Constructor.Default.format = 'DD/MM/YYYY';
  		$.validator.setDefaults({
  			submitHandler: function() {
  				//alert("Form successful submitted!");
  			}
  		});						
	},
	initWizard: function(wizard_index){			
		//Initialize tooltips
		$('.nav-tabs > li a[title]').tooltip();			

		//Initialize wizard			
		let $step = $('.wizard .nav-tabs li');
		$step.eq(wizard_index).addClass('active').removeClass('disabled');
		$step.each(function(i, item) {
			if (i < wizard_index)
				$(item).addClass('done').removeClass('disabled');
		});
		$step.eq(wizard_index).find('a[data-toggle="tab"]').click();				
		
		//Action Wizard
		$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
			var $target = $(e.target);
			if ($target.parent().hasClass('disabled')) {
				return false;
			} else {
				var $active = $('.wizard .nav-tabs li.active');
				$active.removeClass('active');
				$target.parent().addClass('active');
			}
		});

		$(".next-step").click(function(e) {
			//$("#wizardForm").validate().settings.ignore = ":disabled,:hidden";
			$wizard.validate().settings.ignore = ":hidden";
			if (!$wizard.valid())
				return false;

			var $active = $('.wizard .nav-tabs li.active');
			let click_index = $('.wizard .nav-tabs li').index($active);
			switch (click_index) {
				case 0:
					$('#inputNoRMNama').val($('#inputNoRM').val() + " - " + $('#inputNamaPasien').val());
					if ($('#inputTanggalPeriksa').val() == '')
						$('#inputTanggalPeriksa').val(today);
					break;
				case 1:
					let noReg = 'R' + todaytime;
					$('#inputNoReg').val(noReg);
					$('#inputNoReg1').val(noReg + ' - ' + $('#inputNoRM').val() + "(" + $('#inputNamaPasien').val() + ")");
					if ($('#inputTanggalPemeriksaan').val() == '')
						$('#inputTanggalPemeriksaan').val(today);
					break;
				case 2:
					$('#inputNoReg2').val($('#inputNoReg1').val());
					if ($('#inputTanggalPenyerahanResep').val() == '')
						$('#inputTanggalPenyerahanResep').val(today);
					break;
				case 3:
					$('#NoReg').html($('#inputNoReg').val());
					$('#NoRM').html($('#inputNoRM').val());
					$('#NamaPasien').html($('#inputNamaPasien').val());	
					$('#NoTelp').html($('#inputNoTelp').val());	
					
					var $tLayanan = $('#tableLayanan');
					var $tObat = $('#tableObat');
					
					let dataLayanan = fnTableToJson($tLayanan);					
					let dataObat = fnTableToJson($tObat);			

					$('#tableInvoiceLayanan').find('tbody').empty();					
					$('#tableInvoiceObat').find('tbody').empty();
						
					$.each(dataLayanan, function(key, value) {						
						$('#tableInvoiceLayanan').find('tbody').append(`<tr><td class="d-none" data-label="id">${value.id_layanan}</td><td class="text-center align-middle" data-label="jumlah">${value.jumlah_layanan}</td><td data-label="nama">${value.nama_layanan}</td><td class="text-right align-middle" data-label="harga"><input type="number" class="form-control form-control-sm text-right" value="${parseInt(value.harga_layanan)}" step="1"></td><td class="text-right align-middle" data-label="total">${parseInt(value.harga_layanan)}</td></tr>`);						
					});
									
					$.each(dataObat, function(key, value) {			
						$('#tableInvoiceObat').find('tbody').append(`<tr><td class="d-none" data-label="id">${value.id_obat}</td><td class="text-center align-middle" data-label="jumlah">${value.jumlah_obat}</td><td data-label="nama">${value.nama_obat}</td><td class="text-right align-middle" data-label="harga"><input type="number" class="form-control form-control-sm text-right" value="${parseInt(value.harga_obat)}" step="1"></td><td class="text-right align-middle" data-label="total">${parseInt(value.harga_obat)}</td></tr>`);						
					});
					
					break;					
			}
			$active.removeClass('active');
			$active.addClass('done');
			$active.next().removeClass('disabled');
			$active.next().addClass('active');
			nextTab($active);
		});

		$(".prev-step").click(function(e) {
			var $active = $('.wizard .nav-tabs li.active');
			$active.removeClass('active');
			$active.prev().addClass('active');
			prevTab($active);
		});		
										
	},
	initValidation: function(){
		//Initialize validation
		$wizard.validate({
			errorElement: 'span',
			errorPlacement: function(error, element) {
				//error.addClass('invalid-feedback');
				//element.closest('.form-group').append(error);
			},
			highlight: function(element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			}
		});					
	},
	bindData: function(){
		$.ajax({
			url: base_url + 'RawatJalan/getDataMasterAjax',
			method: "POST",
			async: true,
			dataType: 'json',
			success: function(data) {					
				//console.log(data.unit_layanan);
				wz.bindComboAgama(data.agama);
				wz.bindComboGolonganDarah(data.golongan_darah);
				wz.bindComboJenisKelamin(data.jenis_kelamin);					
				wz.bindComboPekerjaan(data.pekerjaan);
				wz.bindComboUnitLayanan(data.unit_layanan);				
				wz.bindComboTipePasien(data.tipe_pasien);								
			}
		});	
		wz.bindTablePasien();		
		wz.bindAutoCompleteLayanan();
		wz.bindAutoCompleteIcd9();		
		wz.bindAutoCompleteIcd10();			
		wz.bindAutoCompleteObat();		
	},
	bindTablePasien: function () {
		let $table = $("#tablePasien");
		let $modalPasien = $('#modal-pasien');
			
		$table.DataTable({
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
				url: base_url + 'rawatjalan/getPasienDatatable',
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
		
		$table.find('tbody').on('click', 'button', function() {
			let data = $table.DataTable().row($(this).parents('tr')).data();
			//alert("No RM:" + data[1] + " & nama: " + data[2]);
			let id_pasien = data[13];
			let dataPasienPromise = wz.bindDataPasien(id_pasien);

			$.when(dataPasienPromise).done(function () {
				$wizard.valid();
				$modalPasien.modal('toggle');								
			});			
		});
		
		// When modal window is shown
		$modalPasien.on('shown.bs.modal', function() {
			// Adjust column width and re-initialize Responsive extension
			$table.DataTable()
				.ajax.reload()
				.columns.adjust()
				.responsive.recalc();
		});					
		
	},	
	bindDataPasien: function(id_pasien){
		$.ajax({
			url: base_url + 'RawatJalan/getDataPasienAjax',
			method: "POST",
			data: {
				id: id_pasien
			},
			async: true,
			dataType: 'json',
			success: function(data) {
				if(data != null){
					let tanggal_lahir = dbDateFormat(data['tanggal_lahir']);
					$('#inputNoRM').val(data['no_rm']);
					$('#inputNamaPasien').val(data['nama_pasien']);
					$('#inputTempatLahir').val(data['tempat_lahir']);
					$('#inputTanggalLahir').val(tanggal_lahir);
					$('#inputNoTelp').val(data['no_telp']);
					$('#inputAgama').val(data['agama']);
					$('#inputGolonganDarah').val(data['golongan_darah']);
					$('#inputJenisKelamin').val(data['jenis_kelamin']);
					$('#inputPekerjaan').val(data['pekerjaan']);
					$('#inputAlamat').val(data['alamat']);
					$('#inputKeterangan').val(data['keterangan']);
					$('#inputIdPasien').val(data['id']);	
					$wizard.valid();					
				}
				//console.log(data);
			}
		});						
	},
	bindComboAgama: function(data){
		let $comboAgama =  $('#inputAgama');			
		$.each(data, function(key, value) {
			$comboAgama.append('<option value="' + value + '">' + value + '</option>');
		});					
	},
	bindComboGolonganDarah: function(data){
		let $comboGolonganDarah =  $('#inputGolonganDarah');			
		$.each(data, function(key, value) {
			$comboGolonganDarah.append('<option value="' + value + '">' + value + '</option>');
		});					
	},
	bindComboJenisKelamin: function(data){
		let $comboJenisKelamin =  $('#inputJenisKelamin');			
		$.each(data, function(key, value) {
			$comboJenisKelamin.append('<option value="' + key + '">' + value + '</option>');
		});					
	},					
	bindComboPekerjaan: function(data){
		let $comboPekerjaan =  $('#inputPekerjaan');			
		$.each(data, function(key, value) {
			$comboPekerjaan.append('<option value="' + value + '">' + value + '</option>');
		});					
	},
	bindComboUnitLayanan: function(data){
		let $comboUnitLayanan =  $('#inputUnitLayanan');			
		let $comboDokterUnitLayanan = $('#inputDokterUnitLayanan');
			
		$.each(data, function(key, value) {
			$comboUnitLayanan.append('<option value="' + value.id + '">' + value.nama_unit_layanan + '</option>');
		});			
		
		$comboUnitLayanan.change(function() {
			var id = $(this).val();
			$.ajax({
				url: base_url + 'RawatJalan/getDokterUnitLayananAjax',
				method: "POST",
				data: {
					id: id
				},
				async: true,
				dataType: 'json',
				success: function(data) {
					$comboDokterUnitLayanan.empty();
					$.each(data, function(key, value) {
						$comboDokterUnitLayanan.append('<option value="' + value.id_dokter + '">' + value.nama_dokter + '</option>');
					});
				}
			});
			return false;
		});				
	},				
	bindComboTipePasien: function(data){
		let $comboTipePasien =  $('#inputTipePasien');			
		$.each(data, function(key, value) {
			$comboTipePasien.append('<option value="' + value.id + '">' + value.tipe_pasien + '</option>');
		});					
	},
	bindAutoCompleteLayanan: function(){
		let $unitLayanan  = $('#inputUnitLayanan');		
		let $layanan = $('#inputLayanan');
		let $tableLayanan = $('#tableLayanan');
		fnTableOnDelete($tableLayanan);				
		$layanan.autoComplete({
			preventEnter: true,
			resolver: 'custom',
			events: {
				search: function(qry, callback) {
					let id = $unitLayanan.val();
					// let's do a custom ajax call
					$.ajax({
						url: base_url + 'RawatJalan/getRegisterLayananAjax',
						method: "POST",
						data: {
							'id': id,
							'qry': qry
						},
						async: true,
						dataType: 'json'
					}).done(function(res) {
						callback(res.results)
					});
				}
			}
		});		

		$layanan.on('autocomplete.select', function(evt, item) { 
            let rowTable = `<tr><td class="d-none" data-label="id_layanan">${item.id}</td><td data-label="jumlah_layanan" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1"></td><td data-label="nama_layanan" class="text-left align-middle">${item.text}</td><td class="d-none" data-label="harga_layanan">${parseInt(item.harga_layanan)}</td><td data-label="harga_total" class="text-right align-middle input-total d-none">${parseInt(item.harga_layanan)}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;                       
            autoCompleteOnSelected($tableLayanan, item, rowTable);			
            autoCompleteClear($layanan);            
		});										
	},
	bindAutoCompleteIcd9: function(){
		let $icd9  = $('#inputIcd9');				
		let $tableIcd9 = $('#tableIcd9');
		fnTableOnDelete($tableIcd9);		
  		$icd9.autoComplete({
  			preventEnter: true,
  			resolver: 'custom',
  			events: {
  				search: function(qry, callback) {
  					// let's do a custom ajax call
  					$.ajax({
  						url: base_url + 'RawatJalan/getIcd9Ajax',
  						method: "POST",
  						data: {
  							'qry': qry
  						},
  						async: true,
  						dataType: 'json'
  					}).done(function(res) {
  						callback(res.results)
  					});
  				}
  			}
  		});

  		$icd9.on('autocomplete.select', function(evt, item) {
            let rowTable = `<tr><td class="d-none" data-label="id_icd9">${item.id}</td><td data-label="jumlah_icd9" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1"></td><td data-label="nama_icd9" class="text-left align-middle">${item.text}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;              
            autoCompleteOnSelected($tableIcd9, item, rowTable);			
            autoCompleteClear($icd9);            
  		});		
	},		
	bindAutoCompleteIcd10: function(){
		let $icd10  = $('#inputIcd10');	
		let $tableIcd10 = $('#tableIcd10');		
		fnTableOnDelete($tableIcd10);
		
  		$icd10.autoComplete({
  			preventEnter: true,
  			resolver: 'custom',
  			events: {
  				search: function(qry, callback) {
  					// let's do a custom ajax call
  					$.ajax({
  						url: base_url + 'RawatJalan/getIcd10Ajax',
  						method: "POST",
  						data: {
  							'qry': qry
  						},
  						async: true,
  						dataType: 'json'
  					}).done(function(res) {
  						callback(res.results)
  					});
  				}
  			}
  		});

  		$icd10.on('autocomplete.select', function(evt, item) {
            let rowTable = `<tr><td class="d-none" data-label="id_icd10">${item.id}</td><td data-label="jumlah_icd10" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1"></td><td data-label="nama_icd10" class="text-left align-middle">${item.text}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;              
            autoCompleteOnSelected($tableIcd10, item, rowTable);			
            autoCompleteClear($icd10); 
  		});		
	},			
	bindAutoCompleteObat: function(){
		let $obat  = $('#inputObat');	
		let $tableObat = $('#tableObat');		
		fnTableOnDelete($tableObat);
		
  		$obat.autoComplete({
			preventEnter: true,
  			resolver: 'custom',
  			events: {
  				search: function(qry, callback) {
  					// let's do a custom ajax call
  					$.ajax({
  						url: base_url + 'RawatJalan/getObatAjax',
  						method: "POST",
  						data: {
  							'qry': qry
  						},
  						async: true,
  						dataType: 'json'
  					}).done(function(res) {
  						callback(res.results)
  					});
  				}
  			}
  		});

  		$obat.on('autocomplete.select', function(evt, item) {
            let rowTable = `<tr><td class="d-none" data-label="id_obat">${item.id}</td><td data-label="jumlah_obat" class="text-center align-middle"><input type="number" class="form-control form-control-sm text-center input-jumlah" value="1" step="1"></td><td data-label="nama_obat" class="text-left align-middle">${item.text}</td><td class="d-none" data-label="harga_obat">${parseInt(item.harga_obat)}</td><td data-label="harga_total" class="text-right align-middle input-total d-none">${parseInt(item.harga_obat)}</td><td class="text-right align-middle" data-label="button-delete"><div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></a></div></td></tr>`;                                     
            autoCompleteOnSelected($tableObat, item, rowTable);			
            autoCompleteClear($obat); 						
		});

  		$tableObat.find('tbody').on('blur', 'td .input-jumlah', function() {
			let jumlah = $(this).val();
			let harga = $(this).closest('tr').find('.input-harga').html();
			let total = parseInt(jumlah) * parseInt(harga);
			$(this).closest('tr').find('.input-total').html(total);
  		});		  		
	}			
}	

function autoCompleteOnSelected($table, item, html) {
    if ($table.find('tbody tr td:eq(0)').data('label') == 'empty_row')
        $table.find('tbody').empty();

    let index_exist = -1;
    $table.find("tbody tr").each(function (index, el) {
        let id = $(el).find("td:eq(0)").html();
        if (id == item.id) {
            index_exist = index;
        }
        // break the loop once found
        return false;
    });

    if (index_exist == -1) {
        $table.find('tbody').append(html);
    }
    else {
        let input = $table.find('tbody tr').eq(index_exist).find('.input-jumlah');
        $(input).val(parseInt($(input).val()) + 1);
        $(input).blur();
    }
}

function nextTab(e) {
	$(e).next().find('a[data-toggle="tab"]').click();
}

function prevTab(e) {
	$(e).prev().find('a[data-toggle="tab"]').click();
}	

function autoCompleteClear(e){
	e.val('').focus();
	e.parent().find('.dropdown-menu .dropdown-item.active').removeClass('active');								  									  			  		
}

function fnTableOnDelete(e){
	e.find('tbody').on("click", "td .btn-delete", function() {
        $(this).closest('tr').remove();
        if(e.find('tbody tr').length == 0){
            let colspan = e.find('thead tr th').length;
            e.find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
        }				            
	});		
}	

function ofnTableOnDelete(e){
	e.find('tbody').on("click", "td .btn-delete", function() {
        $(this).closest('tr').remove();
        if(e.find('tbody tr').length == 0){
            let colspan = e.find('thead tr th').length;
            e.find('tbody').append(`<tr><td colspan="${colspan}" class="text-center" data-label="empty_row">Tidak ada data</td></tr>`);
        }
        calculate();				            
	});		
}	

function fnTableToJson(t){
	var data = [];
	
	// go through cells
	for (var i=1; i<t[0].rows.length; i++) {
		var tableRow = t[0].rows[i];
		var rowData = {};
		for (var j=0; j<tableRow.cells.length; j++) {
			if(!(tableRow.cells[j].dataset.label).includes('button'))
				if($(tableRow.cells[j]).has('input').length > 0){
					$(tableRow.cells[j]).find('input').eq(0).val();
					//console.log($(tableRow.cells[j]).find('input').eq(0).val());
					rowData[tableRow.cells[j].dataset.label] = $(tableRow.cells[j]).find('input').eq(0).val();						
				}
				else
					rowData[tableRow.cells[j].dataset.label] = tableRow.cells[j].innerHTML;
		}
		data.push(rowData);
	} 		
	return data;
	//return JSON.stringify(data, null, 2);							
}	

function dbDateFormat(dbDate){
	date = new Date(dbDate);
	var dd = String(date.getDate()).padStart(2, '0');
	var mm = String(date.getMonth() + 1).padStart(2, '0'); //January is 0!
	var yyyy = date.getFullYear();		
	return dd + '/' + mm + '/' + yyyy;   		
}

function calculate() {
    let $tableInvoiceLayanan = $('#tableInvoiceLayanan');		
    let $tableObat = $('#tableInvoiceObat');
    let $tableTambahan = $('#tableInvoiceTambahan');

    let jLayanan = fnTableToJson($tableInvoiceLayanan);
    let jObat = fnTableToJson($tableObat);    
    let jTambahan = fnTableToJson($tableTambahan);    
     
    let totalLayanan = jLayanan.map(jLayanan => jLayanan.total).reduce((total, jLayanan) => parseInt(jLayanan) + parseInt(total));
    if (typeof totalLayanan === "undefined") {
        totalLayanan = 0;
    }         

    let totalObat = jObat.map(jObat => jObat.total).reduce((total, jObat) => parseInt(jObat) + parseInt(total));        
    if (typeof totalObat === "undefined") {
        totalObat = 0;
    }     
    
    let totalTambahan = jTambahan.map(jTambahan => parseInt(jTambahan.total)).reduce((total, jTambahan) => parseInt(jTambahan) + parseInt(total));    
    if (isNaN(totalTambahan)) {
        totalTambahan = 0;
    }    

    let subTotal = totalLayanan + totalObat + totalTambahan;

    let $spanSubtotal = $('#spanSubtotal');		
    $spanSubtotal.html(subTotal);

    let $inputDiskon = $('#inputDiskon');	     		 
    let $spanDiskon = $('#spanDiskon');		
    let diskon = $inputDiskon.val();
    $spanDiskon.html(diskon);

    let $inputPajak = $('#inputPajak');		 
    let $spanPajak = $('#spanPajak');
    let pajak = Math.round(($inputPajak.val() * subTotal) / 100);	 
    $spanPajak.html(pajak);

    let $spanTotal = $('#spanTotal');
    let total = subTotal - diskon + pajak;
    $spanTotal.html(total);		

}