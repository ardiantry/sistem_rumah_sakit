<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		require_once APPPATH . 'libraries/SatuSehatService.php';
        $this->load->model('Organization_model');  
        $this->load->model('Pasien_model');		
        $this->load->model('RegisterPasien_model');
        $this->load->model('RegisterPasienLayanan_model');
        $this->load->model('RegisterPasienIcd9_model');
        $this->load->model('RegisterPasienIcd10_model');                        
		$this->load->model('RegisterPasienObat_model');                                        
		$this->load->model('RegisterPasienPaket_model');                                        			
		$this->load->model('RegisterPasienTambahan_model');										
		$this->load->model('RegisterPasienPembayaran_model');		
		$this->load->model('RegisterPasienRencanaKontrol_model');	
		$this->load->model('RegisterPasienBooking_model');			
		$this->load->model('RegisterPasienPemeriksaanFisik_model');	
		$this->load->model('Laboratory_model');	
		$this->load->model('Radiology_model');	
	}
	
	function getDatatableBooking()
	{
		$this->output->unset_template();
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $where = "id_klinik={$id_klinik} AND is_deleted=0 AND state_index=0";								
		$result = $this->RegisterPasienBooking_model->getDataTable($this->input->post(), $where);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
	} 	
	
	function getDatatableUmum()
	{
		$this->output->unset_template();
		$user = $this->ion_auth->user()->row();
		$state_index = $this->input->post('state_index');
        $where = "id_klinik={$user->id_klinik} AND is_deleted=0 AND (state_index BETWEEN {$state_index} AND 2) AND (jenis_pemeriksaan <> 'Paket Layanan' OR jenis_pemeriksaan IS NULL)";	        
		$result = $this->RegisterPasien_model->getDataTable($this->input->post(), $where);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
	} 	
	
	
	function getDatatablePaket()
	{
		$this->output->unset_template();
		$user = $this->ion_auth->user()->row();
		$state_index = $this->input->post('state_index');
        $where = "id_klinik={$user->id_klinik} AND is_deleted=0 AND (state_index BETWEEN {$state_index} AND 2) AND jenis_pemeriksaan = 'Paket Layanan'";	        
		$result = $this->RegisterPasien_model->getDataTable($this->input->post(), $where);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
	} 		
        
	function save()
	{
        $this->output->unset_template();						
		$user = $this->ion_auth->user()->row();				        		
        $id_klinik = $user->id_klinik;
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
        $register_pasien = $this->RegisterPasien_model->getById($postData->id);
		$id = 0;
		$no_registrasi = 'R' . date("YmdHis");
		$state_index = 0;
		
		if($register_pasien != NULL){
    		if($this->Pasien_model->checkExistsRawatInap($register_pasien->id_pasien)){
    			header('Content-Type: application/json');
    			$response = array('status' => false, 'error_code' => -3, 'message' => 'Pasien sudah terdaftar di Rawat Inap');
    			echo json_encode($response);				
    			die();
    		}		    
			if($register_pasien->state_index >= 3){
				header('Content-Type: application/json');
				$response = array('status' => false, 'error_code' => -2, 'message' => 'Perubahan data gagal karena transaksi sudah selesai.');
				echo json_encode($response);				
				die();
			}
			$no_registrasi = $register_pasien->no_registrasi;
			$state_index = $register_pasien->state_index;
			$id = $register_pasien->id;
		}		

		$data = [];
		$dataLayanan = [];
		$dataIcd9 = [];
		$dataIcd10 = [];
		$dataRencanaKontrol = [];
		$dataLaboratory = [];
		$dataRadiology = [];
        $dataObat = [];
        $dataObatTambahan = [];
        $dataRincianKontrol = [];
        $dataPemeriksaanFisik = [];		
        $response = [];

		switch($postData->stateIndex){
			case 1:
				$data = 
				[
					'id' => $id,					
					'no_registrasi' => $no_registrasi,
					'tanggal_periksa' => $postData->tanggalPeriksa,
					'state_index' => (($postData->stateIndex-1) > $state_index) ? ($postData->stateIndex-1) : $state_index,					
					'jenis_pemeriksaan' => $postData->jenisPemeriksaan,					
					'id_unit_layanan' => $postData->idUnitLayanan,
					'id_dokter' => $postData->idDokter,
					'id_tipe_pasien' => $postData->idTipePasien,
					'keterangan1' => $postData->keterangan1,	
					'keterangan2' => $postData->keterangan2,	
					'keterangan3' => $postData->keterangan3,  

					'tacc' => $postData->tacc,                      					
					'keluhan' => $postData->keluhan,                      					
					'kd_sadar' => $postData->kesadaran,                      					
					'sistol' => $postData->sistol,                      					
					'diastole' => $postData->diastole,                      					
					'berat_badan' => $postData->beratBadan,                      					
					'tinggi_badan' => $postData->tinggiBadan,                      					
					'resp_rate' => $postData->respRate,                      					
					'heart_rate' => $postData->heartRate,

					'id_pasien' => $postData->pasien->id,
					'id_klinik' => $id_klinik,                                  				
					'modified_by' => $user->id					
				];

				$dataAppointment = array(
					'id_klinik'			=> $id_klinik,
					'id_pasien' 		=> $postData->pasien->id,			
					'tanggal_periksa'	=> $postData->tanggalPeriksa,
				);			
				
				$this->db->trans_start();			
				$data = $this->RegisterPasien_model->save($data);
				$this->RegisterPasien_model->approvedAppointment($dataAppointment);							
				$this->db->trans_complete();									
			break;	

			case 2:
				$data = 
				[
					'id' => $postData->id,								
					'tanggal_pemeriksaan' => $postData->tanggalPemeriksaan,
					'diagnosa' => $postData->diagnosa,                     
					'jenis_pemeriksaan' => $postData->jenisPemeriksaan,
					'tanggal_kunjungan_selanjutnya' => ($postData->jenisPemeriksaan == 'Umum') ? null : $postData->tanggalKunjunganSelanjutnya,
					'tujuan_kunjungan_selanjutnya' => ($postData->jenisPemeriksaan == 'Umum') ? null : $postData->tujuanKunjunganSelanjutnya,					
					'keterangan2' => $postData->keterangan2,				
					'state_index' => (($postData->stateIndex-1) > $state_index) ? $postData->stateIndex-1 : $state_index,					
					'modified_by' => $user->id					
				];				
				
				foreach ($postData->dataLayanan as $layanan) {
					$dataLayanan[] = array(
						'id_register_pasien' => $postData->id,
						'id_layanan' => $layanan->id,
						'jumlah' => $layanan->jumlah,
						'harga' => $layanan->harga
					);
				}				
				
				foreach ($postData->dataIcd9 as $icd9) {
					$dataIcd9[] = array(
						'id_register_pasien' => $postData->id,
						'id_icd9' => $icd9->id,
						'jumlah' => $icd9->jumlah
					);
				}
				
				foreach ($postData->dataIcd10 as $icd10) {
					$dataIcd10[] = array(
						'id_register_pasien' => $postData->id,
						'id_icd10' => $icd10->id,
						'jumlah' => $icd10->jumlah
					);
				}				
				
				foreach ($postData->dataRencanaKontrol as $rencanaKontrol) {
					$dataRencanaKontrol[] = array(
						'id_register_pasien' => $postData->id,
						'tanggal_kontrol' => $rencanaKontrol->tanggal,
						'alasan_kontrol' => $rencanaKontrol->alasan
					);
				}			
				
				foreach ($postData->dataPemeriksaanFisik as $x => $pemeriksaanFisik) {
					if($pemeriksaanFisik->is_deleted == "1"){
						unlink('assets/pemeriksaan_fisik/' . $pemeriksaanFisik->original);
					}
					else {
						$imageName = "";						
						if($pemeriksaanFisik->original == ""){
							$file = base64_decode($pemeriksaanFisik->image);
							$imageName = $id."_".time()."_".$x.'.png';
							file_put_contents('assets/pemeriksaan_fisik/'.$imageName, $file);																
						}
						else{
							$imageName = $pemeriksaanFisik->original;
						}						
						$dataPemeriksaanFisik[] = array(
							'id_register_pasien'	=> $postData->id,
							'nama_pemeriksaan' 		=> $pemeriksaanFisik->nama,
							'keterangan' 			=> $pemeriksaanFisik->keterangan,
							'foto' 					=> $imageName						
						);
					}
				}
				
				foreach ($postData->dataRadiology as $rad) {
					if($rad->status === "Menunggu")
					{
						$rawat_inap_rad = $this->Radiology_model->getByParam(
							array(
							'tanggal_daftar' => $rad->tanggal, 
							'id_radiology_type' => $rad->jenis_rad_id,
							'id_dokter' => $register_pasien->id_dokter,
							'id_pasien' => $register_pasien->id_pasien,
							'id_reference' => $postData->id,						
							'tipe_reference' => "Rawat Jalan",						
							'state_index' => 0						
							)
						);
						if($rawat_inap_rad == NULL){
							$d = array(
								'no_registrasi'		=>	'RAD' . date("YmdHis"),
								'tanggal_daftar' => $rad->tanggal,
								'id_radiology_type' => $rad->jenis_rad_id,
								'id_dokter' => $register_pasien->id_dokter,
								'id_tipe_pasien' => $register_pasien->id_tipe_pasien,							
								'id_pasien' => $register_pasien->id_pasien,
								'tarif' => $rad->harga,
								'id_reference' => $postData->id,						
								'tipe_reference' => "Rawat Jalan",						
								'state_index' => 0,						
								'status' => $rad->status,
								'modified_by' => $user->id												
							);					
							$this->Radiology_model->create($d);
							$dataRadiology[] = $d;
						}
					}
				}

				foreach ($postData->dataLaboratory as $lab) {
					if($lab->status === "Menunggu")
					{
						$rawat_inap_lab = $this->Laboratory_model->getByParam(
							array(
							'tanggal_daftar' => $lab->tanggal, 
							'id_laboratory_type' => $lab->jenis_lab_id,
							'id_dokter' => $register_pasien->id_dokter,
							'id_pasien' => $register_pasien->id_pasien,
							'id_reference' => $postData->id,						
							'tipe_reference' => "Rawat Jalan",						
							'state_index' => 0						
							)
						);

						if($rawat_inap_lab == NULL){
							$d = array(
								'no_registrasi'		=>	'LAB' . date("YmdHis"),
								'tanggal_daftar' => $lab->tanggal,
								'id_laboratory_type' => $lab->jenis_lab_id,
								'id_dokter' => $register_pasien->id_dokter,
								'id_tipe_pasien' => $register_pasien->id_tipe_pasien,														
								'id_pasien' => $register_pasien->id_pasien,
								'tarif' => $lab->harga,
								'id_reference' => $postData->id,						
								'tipe_reference' => "Rawat Jalan",						
								'state_index' => 0,						
								'status' => $lab->status,
								'modified_by' => $user->id												
							);							
							$this->Laboratory_model->create($d);
							$dataLaboratory[] = $d;
						}
					}
				}												
				$this->db->trans_start();			
				
				$this->RegisterPasienLayanan_model->deleteByRegisterId($postData->id);        
				if (count($dataLayanan) > 0) {
					$this->RegisterPasienLayanan_model->insertBatch($dataLayanan);
				}
				$this->RegisterPasienIcd9_model->deleteByRegisterId($postData->id);
				if (count($dataIcd9) > 0) {            
					$this->RegisterPasienIcd9_model->insertBatch($dataIcd9);
				}
				$this->RegisterPasienIcd10_model->deleteByRegisterId($postData->id);        
				if (count($dataIcd10) > 0) {
					$this->RegisterPasienIcd10_model->insertBatch($dataIcd10);
				}
				$this->RegisterPasienRencanaKontrol_model->deleteByRegisterId($postData->id);
				if (count($dataRencanaKontrol) > 0) {
					$this->RegisterPasienRencanaKontrol_model->insertBatch($dataRencanaKontrol);
				}	
				$this->RegisterPasienPemeriksaanFisik_model->deleteByRegisterId($postData->id);
				if (count($dataPemeriksaanFisik) > 0) {
					$this->RegisterPasienPemeriksaanFisik_model->insertBatch($dataPemeriksaanFisik);
				}							
				$data = $this->RegisterPasien_model->save($data);
				
				$this->db->trans_complete();				
				
			break;			
			case 3:
				$data = 
				[
					'id' => $postData->id,				
					'tanggal_penyerahan_resep' => $postData->tanggalPenyerahanResep,
					'jumlah_paket' => ($postData->jenisPemeriksaan == 'Umum') ? null : $postData->jumlahPaket,
					'id_paket' => ($postData->jenisPemeriksaan == 'Umum') ? null : $postData->idPaket,					
					'keterangan3' => $postData->keterangan3,                      
					'state_index' => (($postData->stateIndex-1) > $state_index) ? $postData->stateIndex-1 : $state_index,					
					'modified_by' => $user->id						
				];
				
				foreach ($postData->dataObat as $obat) {
					$dataObat[] = array(
						'id_register_pasien' => $postData->id,
						'id_obat' => $obat->id,
						'jumlah' => $obat->jumlah,
						'harga' => $obat->harga,
						'is_paket' => ($postData->jenisPemeriksaan == 'Umum') ? 0 : 1
					);
				}

				foreach ($postData->dataObatTambahan as $obatTambahan) {
					$dataObat[] = array(
						'id_register_pasien' => $postData->id,
						'id_obat' => $obatTambahan->id,
						'jumlah' => $obatTambahan->jumlah,
						'harga' => $obatTambahan->harga,
						'is_paket' => 0
					);
				}		

				$this->db->trans_start();							
				$this->RegisterPasienObat_model->deleteByRegisterId($postData->id);
				if (count($dataObat) > 0) {
					$this->RegisterPasienObat_model->insertBatch($dataObat);
				}    				
				$data = $this->RegisterPasien_model->save($data);		
				
				$this->db->trans_complete();				
			break;			
		}

        if ($this->db->trans_status() === FALSE)
            $response = array('status' => false, 'message' => 'Penyimpanan data gagal, silahkan hubungi admin.');
        else
            $response = array('status' => true, 'data' => $data);        

		//add the header here
		header('Content-Type: application/json');
		echo json_encode($response);		
	}

	function delete()
	{
        $this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$id = $postData->id;
        
        $register_pasien = $this->RegisterPasien_model->getById($id);
		if($register_pasien != NULL){
			if($register_pasien->state_index >= 3){
				header('Content-Type: application/json');
				$response = array('status' => false, 'error_code' => -2, 'message' => 'Perubahan data gagal karena transaksi sudah selesai.');
				echo json_encode($response);				
				die();
			}
		}
		
        $response = array();		
		if($this->RegisterPasien_model->delete($id) > 0)
			$response = array('status' => true, 'data' => []);        					
		else
			$response = array('status' => false, 'message' => $this->db->error());			
			
		header('Content-Type: application/json');
		echo json_encode($response);		
	}	

	function rujuk()
	{
        $this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$id = $postData->id;
        $register_pasien = $this->RegisterPasien_model->getById($id);
		if($register_pasien != NULL){
			if($register_pasien->state_index >= 3){
				header('Content-Type: application/json');
				$response = array('status' => false, 'error_code' => -2, 'message' => 'Perubahan data gagal karena transaksi sudah selesai.');
				echo json_encode($response);				
				die();
			}
		}
		
        $response = array();		
		$r = $this->RegisterPasien_model->rujuk($id);
		if($r > 0)
			$response = array('status' => true, 'data' => []);        					
		else
			$response = array('status' => false, 'message' => $this->db->error());			
			
		header('Content-Type: application/json');
		echo json_encode($response);		
	}		

	function cancelPaket()
	{
        $this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$id = $postData->id;

        $register_pasien = $this->RegisterPasien_model->getById($id);
		if($register_pasien != NULL){
			if($register_pasien->state_index >= 3){
				header('Content-Type: application/json');
				$response = array('status' => false, 'error_code' => -2, 'message' => 'Perubahan data gagal karena transaksi sudah selesai.');
				echo json_encode($response);				
				die();
			}
		}
		
		$id_reference = $postData->id_reference;
		$paket_sisa = $postData->paket_sisa;

        $response = array();		
		if($this->RegisterPasien_model->delete($id) > 0){
			if($id_reference != NULL){
				$this->RegisterPasien_model->cancelPaketToJurnal($id, $id_reference, $paket_sisa);			
			}
			$response = array('status' => true, 'data' => []);        					
		}
		else
			$response = array('status' => false, 'message' => $this->db->error());			
			
		header('Content-Type: application/json');
		echo json_encode($response);		
	}		

	function cancelAppointment()
	{
        $this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$id = $postData->id;

        $appointment = $this->RegisterPasien_model->getAppointmentById($id);

		if($appointment != NULL){
			if($appointment->state_index == 1){
				header('Content-Type: application/json');
				$response = array('status' => false, 'error_code' => -2, 'message' => 'Perubahan data gagal karena transaksi sudah selesai.');
				echo json_encode($response);				
				die();
			}
		}
		
        $response = array();		
		if($this->RegisterPasien_model->deleteAppointment($id) > 0){
			$response = array('status' => true, 'data' => []);        					
		}
		else
			$response = array('status' => false, 'message' => $this->db->error());			
			
		header('Content-Type: application/json');
		echo json_encode($response);		
	}		
    
	public function getRegisterObat()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$register_pasien_obat = $this->RegisterPasienObat_model->getByRegisterIdJenisPemeriksaan($postData->id, $postData->jenis_pemeriksaan);
		$data = array();
		foreach ($register_pasien_obat as $rows) {
			$data[] = array(
				'id' => $rows->id_obat,
				'nama' => $rows->nama_obat,				
				'harga' => $rows->harga_jual,
				'stok' => $rows->stok,
				'jumlah' => $rows->jumlah,								
			);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => $data));
    }	

	public function getRegisterLayanan()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$register_pasien_layanan = $this->RegisterPasienLayanan_model->getByRegisterId($postData->id);
		$data = array();
		foreach ($register_pasien_layanan as $rows) {
			$data[] = array(
				'id' => $rows->id_layanan,
				'nama' => $rows->nama_layanan,				
				'harga' => $rows->harga_layanan,
				'jumlah' => $rows->jumlah,				
			);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => $data));
    }    
    

	public function getRegisterIcd9()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$register_pasien_icd9 = $this->RegisterPasienIcd9_model->getByRegisterId($postData->id);
		$data = array();
		foreach ($register_pasien_icd9 as $rows) {
			$data[] = array(
				'id' => $rows->id_icd9,
				'nama' => $rows->icd9_name,				
				'jumlah' => $rows->jumlah
			);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => $data));
    }   
     
	public function getRegisterIcd10()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$register_pasien_icd10 = $this->RegisterPasienIcd10_model->getByRegisterId($postData->id);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => $register_pasien_icd10));
	}	 
	
	public function getRegisterRencanaKontrol()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$register_pasien_rencana_kontrol = $this->RegisterPasienRencanaKontrol_model->getByRegisterId($postData->id);
		$data = array();
		foreach ($register_pasien_rencana_kontrol as $rows) {
			$data[] = array(
				'tanggal' => $rows->tanggal_kontrol,
				'alasan' => $rows->alasan_kontrol
			);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => $data));
	}	 	

	public function getRegisterLaboratory()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$register_laboratory = $this->Laboratory_model->getByRegisterId($postData->id, 'Rawat Jalan');
		$data = array();
		foreach ($register_laboratory as $rows) {
			$data[] = array(
				'id' => $rows->id,
				'tanggal' => $rows->tanggal_daftar,
				'jenis_lab_id' => $rows->id_laboratory_type,
				'jenis_lab' => $rows->laboratory_type_desc,
				'harga' => $rows->tarif,
				'status' => $rows->status

			);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => $data));
	}

	public function getRegisterRadiology()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$register_radiology = $this->Radiology_model->getByRegisterId($postData->id, 'Rawat Jalan');
		$data = array();
		foreach ($register_radiology as $rows) {
			$data[] = array(
				'id' => $rows->id,
				'tanggal' => $rows->tanggal_daftar,
				'jenis_rad_id' => $rows->id_radiology_type,
				'jenis_rad' => $rows->radiology_type_desc,
				'harga' => $rows->tarif,
				'status' => $rows->status

			);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => $data));
	}


	public function getRegisterPemeriksaanFisik()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$register_pasien_pemeriksaan = $this->RegisterPasienPemeriksaanFisik_model->getByRegisterId($postData->id);
		$data = array();
		foreach ($register_pasien_pemeriksaan as $rows) {
			$data[] = array(
				'nama_pemeriksaan'	=> $rows->nama_pemeriksaan,
				'keterangan' 		=> $rows->keterangan,
				'foto' 				=> $rows->foto,				
				'fullpath' 			=> base_url('assets/pemeriksaan_fisik/').$rows->foto,
				'is_delete'			=> '0'								
			);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => $data));
	}		

	function savePembayaran()
	{
		$this->output->unset_template();		
		$user = $this->ion_auth->user()->row();				        		
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);

		$id = $postData->id;		
        $register_pasien = $this->RegisterPasien_model->getById($id);

		if($register_pasien != NULL){
			if($register_pasien->state_index >= 3){
				header('Content-Type: application/json');
				$response = array('status' => false, 'error_code' => -2, 'message' => 'Perubahan data gagal karena transaksi sudah selesai.');
				echo json_encode($response);				
				die();
			}
		}

		$order_paket = -1;
		$is_reminder = false;

		$tanggalBayar = date("Y-m-d H:i:s");
		$diskon = $postData->totalDiskon;
		$pajak = $postData->totalPajak;		
		$keterangan = $postData->keterangan;
		$persediaan = $postData->subTotal;		

		$pendapatan_paket = $hutang_paket_obat = $pendapatan_obat = $pendapatan_obat_tambahan = $pendapatan_tambahan = $pendapatan_layanan = 0;
		$dataPaket = array();
		$dataPaketObat = array();
		$dataLayanan = array();
		
		foreach ($postData->invoiceLayanan as $layanan) {
			$pendapatan_layanan += $layanan->jumlah * $layanan->harga;			
			$dataLayanan[] = array(
				'id_register_pasien' => $postData->id,
				'id_layanan' => $layanan->id,
				'jumlah' => $layanan->jumlah,
				'harga' => $layanan->harga
			);
		}

		$dataObat = array();
		foreach ($postData->invoiceObat as $obat) {
			$pendapatan_obat += $obat->jumlah * $obat->harga;						
			$dataObat[] = array(
				'id_register_pasien' => $postData->id,
				'id_obat' => $obat->id,
				'jumlah' => $obat->jumlah,
				'harga' => ($register_pasien->jenis_pemeriksaan === 'Paket Layanan' && $register_pasien->id_reference !== null) ? 0 : $obat->harga,
				'is_paket' => ($register_pasien->jenis_pemeriksaan === 'Paket Layanan') ? 1 : 0
			);
		}		

		//$dataObatTambahan = array();
		foreach ($postData->invoiceObatTambahan as $obatTambahan) {
			$pendapatan_obat_tambahan += $obatTambahan->jumlah * $obatTambahan->harga;						
			$dataObat[] = array(
				'id_register_pasien' => $postData->id,
				'id_obat' => $obatTambahan->id,
				'jumlah' => $obatTambahan->jumlah,
				'harga' => $obatTambahan->harga,
				'is_paket' => 0			
			);
		}				

		$dataTambahan = array();
		foreach ($postData->invoiceTambahan as $tambahan) {
			$pendapatan_tambahan += $tambahan->jumlah * $tambahan->harga;									
			$dataTambahan[] = array(
				'id_register_pasien' => $postData->id,
				'nama_tambahan' => $tambahan->nama,
				'jumlah' => $tambahan->jumlah,
				'harga' => $tambahan->harga
			);
		}		
		//penambahan lab & rad
		$dataLab = array();
		foreach ($postData->invoiceLab as $tambahan) {
			$pendapatan_layanan += $tambahan->harga;									
			$dataLab[] = array(
				'id' => $tambahan->id,
				'tarif' => $tambahan->harga
			);
		}
		$dataRad = array();		
		foreach ($postData->invoiceRad as $tambahan) {
			$pendapatan_layanan += $tambahan->harga;									
			$dataRad[] = array(
				'id' => $tambahan->id,
				'tarif' => $tambahan->harga
			);
		}				

		$dataCaraBayar = array();
		foreach ($postData->invoiceBayar as $bayar) {			
			$dataCaraBayar[] = array(
				'id_register_pasien' => $postData->id,
				'id_cara_bayar' => $bayar->id,
				'jumlah' => ($bayar->akun == '111') ? $bayar->harga - $postData->kembalian : $bayar->harga
			);
		}		

		if($register_pasien->jenis_pemeriksaan === 'Paket Layanan' && $register_pasien->id_reference === null){
			//ini paket layanan pertama			
			$order_paket = 0;
			$namaTransaksi = "Pembayaran Paket Layanan " . $postData->noRegistrasi;
			foreach ($postData->invoicePaket as $paket) {
				$pendapatan_paket += $paket->jumlah * $paket->harga;						
				$dataPaket[] = array(
					'id_register_pasien' => $postData->id,
					'id_obat' => $paket->id,
					'jumlah' => $paket->jumlah,
					'harga' => $paket->harga,
					'arus' => 'Debit',
					'id_reference' => $register_pasien->id_reference ?? $postData->id													
				);
			}	
			
			foreach ($postData->invoiceObat as $paketObat) {
				$dataPaketObat[] = array(
					'id_register_pasien' => $postData->id,
					'id_obat' => $paketObat->id,
					'jumlah' => $paketObat->jumlah,
					'harga' => $paketObat->harga,
					'arus' => 'Kredit',				
					'id_reference' => $register_pasien->id_reference ?? $postData->id								
				);
			}	
			
			$hutang_paket_obat = $pendapatan_paket - $pendapatan_obat;		

			$dataDetail = [
				'id' => $id, 
				'diskon' => $diskon,
				'pajak' => $pajak,
				'pendapatan_layanan' => $pendapatan_layanan,
				'pendapatan_obat' => $pendapatan_obat + $pendapatan_obat_tambahan,
				'hutang_paket' => $hutang_paket_obat,
				'pendapatan_tambahan' => $pendapatan_tambahan,	
			];							
		}
		else if($register_pasien->id_reference !== null){
			//ini paket layanan kedua dst
			$order_paket = 1;			
			$namaTransaksi = "Pembayaran Paket Layanan " . $postData->noRegistrasi;			
			foreach ($postData->invoiceObat as $paketObat) {
				$dataPaketObat[] = array(
					'id_register_pasien' => $postData->id,
					'id_obat' => $paketObat->id,
					'jumlah' => $paketObat->jumlah,
					'harga' => $paketObat->harga,
					'arus' => 'Kredit',				
					'id_reference' => $register_pasien->id_reference ?? $postData->id								
				);
			}
			$hutang_paket_obat = $pendapatan_obat;									

			$dataDetail = [
				'id' => $id, 
				'diskon' => $diskon,
				'pajak' => $pajak,
				'pendapatan_layanan' => $pendapatan_layanan,
				'pendapatan_obat' => $pendapatan_obat + $pendapatan_obat_tambahan,
				'pendapatan_tambahan' => $pendapatan_tambahan,	
				'hutang' => $hutang_paket_obat
			];									
		}
		else{
			//ini layanan umum
			$namaTransaksi = "Pembayaran Rawat Jalan " . $postData->noRegistrasi;	

			$dataDetail = [
				'id' => $id, 
				'diskon' => $diskon,
				'pajak' => $pajak,
				'pendapatan_layanan' => $pendapatan_layanan,
				'pendapatan_obat' => $pendapatan_obat,
				'pendapatan_tambahan' => $pendapatan_tambahan,	
				'hutang' => 0				
			];						
		}

		$dataPendaftaran = [
			'id' => $id,			
			'tanggal_bayar' => $tanggalBayar,
			'subtotal' => $postData->subTotal,
			'diskon'  => $postData->diskon,
			'total_diskon' => $diskon,
			'pajak' => $postData->pajak,
			'total_pajak' => $pajak,						
			'total_tagihan' => $postData->totalTagihan,									
			'total_bayar' => $postData->totalBayar,												
			'kembalian' => $postData->kembalian,	
			'state_index' => 3,
			'modified_by' => $user->id,
			'keterangan4' => $keterangan            
		];

		$dataHeader = [
			'tanggal' => $tanggalBayar, 
			'nama' => $namaTransaksi, 
			'id_reference' => $id,
			'tipe_transaksi' => "Rawat Jalan",
			'id_klinik' => $user->id_klinik, 
			'modified_by' => $user->id
		];
				


		$dataJurnal = ['header' => $dataHeader, 'detail' => $dataDetail];
		
		$result = array();

		$this->db->trans_start();
			if (count($dataLayanan) > 0) {
				$this->RegisterPasienLayanan_model->deleteByRegisterId($postData->id);
				$this->RegisterPasienLayanan_model->insertBatch($dataLayanan);
			}		

			if($order_paket !== -1){
				if($order_paket === 0){
					if (count($dataPaket) > 0) {
						$this->RegisterPasienPaket_model->insertBatch($dataPaket);
					}			
				}				
				if (count($dataPaketObat) > 0) {
					$this->RegisterPasienPaket_model->insertBatch($dataPaketObat);
				}							
			}

			if (count($dataObat) > 0) {
				$this->RegisterPasienObat_model->deleteByRegisterId($postData->id);
				$this->RegisterPasienObat_model->insertBatch($dataObat);
				$this->RegisterPasienObat_model->logStok($postData->id, $user->id, $user->id_klinik);													
				$this->RegisterPasienObat_model->updateStok($postData->id);									
			}

			if (count($dataTambahan) > 0) {
				$this->RegisterPasienTambahan_model->insertBatch($dataTambahan);
			}
			
			//penambahan lab & rad
			if (count($dataLab) > 0) {
				$this->Laboratory_model->updateBatch($dataLab);
			}
			if (count($dataRad) > 0) {
				$this->Radiology_model->updateBatch($dataRad);
			}						

			if (count($dataCaraBayar) > 0) {
				$this->RegisterPasienPembayaran_model->insertBatch($dataCaraBayar);
			}				

			$this->RegisterPasien_model->save($dataPendaftaran);
			if($order_paket === 0)
				$this->RegisterPasien_model->saveToJurnalPaket($dataJurnal);	
			else				
				$this->RegisterPasien_model->saveToJurnal($dataJurnal);	
			
			if($order_paket !== -1){
				$paket = $this->RegisterPasienPaket_model->getByReferenceId($register_pasien->id_reference ?? $postData->id);				
				if($paket->paket_sisa > 0)
				{
					$this->RegisterPasien_model->saveNextPendaftaran($postData->id);	
					$is_reminder = true;


				}
			}

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
            $response = array('status' => false, 'message' => 'Penyimpanan data gagal, silahkan hubungi admin.');			
		} else {
			$result = array('status' => true, 'data' => null);
			$sms_reminder = $wa_reminder = $sms_rencana_kontrol = $wa_rencana_kontrol = "";

			if($is_reminder){
				$reminder_kontrol = $this->RegisterPasien_model->getSmsDataByRegisterId($postData->id);
				$sms_reminder = $this->sendSMS($reminder_kontrol);
			}						

			$rencana_kontrol = $this->RegisterPasienRencanaKontrol_model->getSmsDataByRegisterId($id);
			$sms_rencana_kontrol = $this->sendSMS($rencana_kontrol);
			$result['data'] = [
				'reminder_kontrol_sms' => $sms_reminder, 
				'reminder_kontrol_wa' => $wa_reminder, 
				'rencana_kontrol_sms' => $sms_rencana_kontrol, 
				'rencana_kontrol_wa' => $wa_rencana_kontrol
			];			
		}

		while (ob_get_level() > 0) {
			ob_end_flush();
		}
		//add the header here	
		header('Content-Type: application/json');
		echo json_encode($result);
	}	

	public function getRegisterDetail()
	{
		$this->output->unset_template();
		$id = $this->input->get('id', TRUE);		
		$register_pasien_obat = $this->RegisterPasienObat_model->getByRegisterId($id);
		$dataObat = array();
		foreach ($register_pasien_obat as $rows) {
			$dataObat[] = array(
				'id' => $rows->id_obat,
				'nama' => $rows->nama_obat,				
				'jumlah' => $rows->jumlah,
				'harga' => $rows->harga_jual
			);
		}
		$register_pasien_layanan = $this->RegisterPasienLayanan_model->getByRegisterId($id);
		$dataLayanan = array();
		foreach ($register_pasien_layanan as $rows) {
			$dataLayanan[] = array(
				'id' => $rows->id_layanan,
				'nama' => $rows->nama_layanan,				
				'jumlah' => $rows->jumlah,
				'harga' => $rows->harga_layanan
			);
		}
		$register_pasien_obat = $this->RegisterPasienObat_model->getByRegisterId($id);
		$dataObat = array();
		foreach ($register_pasien_obat as $rows) {
			$dataObat[] = array(
				'id' => $rows->id_obat,
				'nama' => $rows->nama_obat,				
				'jumlah' => $rows->jumlah,
				'harga' => $rows->harga_jual
			);
		}

		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => array('data_obat' => $dataObat, 'data_layanan' => $dataLayanan)));
    }		

	public function sendSMS($rencana_kontrols)
	{
		if(ENVIRONMENT !== 'production')
		{
			return false;
		}

		ob_start();
		// setting 
		$apikey      = 'c71464ead4de21b106d04a86682f4ca9'; // api key 
		$urlendpoint = 'http://sms114.xyz/sms/api_sms_masking_send_json.php'; // url endpoint api 
		$callbackurl = 'http://sms114.xyz/sms/api_sms_masking_balance_json.php'; // url callback get status sms 
		
		// create header json  
		$senddata = array(
			'apikey' => $apikey,  
			'callbackurl' => $callbackurl, 
			'datapacket'=>array()
		);

		foreach($rencana_kontrols as $rencana_kontrol){
			$sendingdatetime = date('Y-m-d 12:i:s', strtotime('-2 day', strtotime($rencana_kontrol->tanggal_kontrol)));
			$message = "Kpd Yth ". $rencana_kontrol->nama_pasien ." bhw jadwal kontrol Anda terkait ". $rencana_kontrol->alasan_kontrol ." jatuh pd tgl ". dateFormat($rencana_kontrol->tanggal_kontrol) ." (Hub ". $rencana_kontrol->no_telp ." ". $rencana_kontrol->nama_klinik .")";			
			array_push($senddata['datapacket'],array(
				'number' => trim($rencana_kontrol->no_telp_pasien),
				'message' => urlencode(stripslashes(utf8_encode($message))),
				'sendingdatetime' => $sendingdatetime)
			);			
		}

		$data=json_encode($senddata);
		$curlHandle = curl_init($urlendpoint);
		curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curlHandle, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data))
		);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT, 5);
		curl_setopt($curlHandle, CURLOPT_CONNECTTIMEOUT, 5);
		$responjson = curl_exec($curlHandle);
		curl_close($curlHandle);		
		return $responjson;
	}

	public function sendWA($rencana_kontrols)
	{
		if(ENVIRONMENT !== 'production')
		{
			return false;
		}
		
		ob_start();
		// setting 
		$apikey      = 'c71464ead4de21b106d04a86682f4ca9'; // api key 
		$urlendpoint = 'http://sms114.xyz/sms/api_whatsapp_send_json.php'; // url endpoint api 
		$waid = '35H085'; // whatsapp id 
		
		// create header json  
		$senddata = array(
			'apikey' => $apikey,  
			'waid' => $waid, 
			'datapacket'=>array()
		);

		
		foreach($rencana_kontrols as $rencana_kontrol){
			$sendingdatetime = date('Y-m-d 12:i:s', strtotime('-2 day', strtotime($rencana_kontrol->tanggal_kontrol)));
			$message = "Sehubungan dengan akan dilakukannya ". $rencana_kontrol->alasan_kontrol ." ke ". $rencana_kontrol->nama_unit_layanan ." terhadap saudara/saudari ". $rencana_kontrol->nama_pasien ." pada tanggal ". dateFormat($rencana_kontrol->tanggal_kontrol) ." di ". $rencana_kontrol->nama_klinik .", maka diharapkan untuk dapat melakukan pendaftaran sejak saat ini ke nomor telepon/WA ". $rencana_kontrol->no_telp ."/". $rencana_kontrol->no_hp .".
			Terimakasih atas perhatian dan kerjasamanya.
			Ttd - Admin ". $rencana_kontrol->nama_klinik .".
			_pesan ini dikirim melalui sistem, harap tidak membalas.";			
			array_push($senddata['datapacket'],array(
				'number' => trim($rencana_kontrol->no_telp_pasien),
				'message' => urlencode(stripslashes(utf8_encode($message))),
				'sendingdatetime' => $sendingdatetime)
			);			
		}		
		
		
		$data=json_encode($senddata);
		$curlHandle = curl_init($urlendpoint);
		curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curlHandle, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data))
		);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
		curl_setopt($curlHandle, CURLOPT_CONNECTTIMEOUT, 30);
		$responjson = curl_exec($curlHandle);
		curl_close($curlHandle);		
		return $responjson;
	}	

	public function sendIHS($param)
	{
		// if(ENVIRONMENT !== 'production')
		// {
		// 	return false;
		// }
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;			
		$org = $this->Organization_model->getMainOrg($id_klinik);
		if($org->organization_id == null){
			return false;
		}
		if($param->patient->ihs_id == null){
			return false;
		}
		if($param->participant->ihs_id == null){
			return false;
		}
		if($param->location->ihs_id == null){
			return false;
		}		
				

		$this->load->helper('date');		
		$this->load->helper('guidv4');		
		$encounter_guid = guidv4();
		$condition_guid = guidv4();
		
		$datestring = '%d/%m/%Y';

		$StartTime = time();
		$EndTime = time() + 60*60;		

		$tanggal = mdate($datestring, $StartTime);

		$encounter = [
			"reference" => "urn:uuid:{$encounter_guid}", 
			"display" => "Kunjungan {$param->patient->display} pada tanggal {$tanggal}" 
		];
		
		$patient = [
			"reference" => "Patient/{$param->patient->ihs_id}", 
			"display" => "{$param->patient->display}" 
		];
		$participant = [
			"reference" => "Practitioner/{$param->participant->ihs_id}", 
			"display" => "{$param->participant->display}" 
		];

		$period = [
			"start" => date(DATE_ATOM, $StartTime), 
			"end" => date(DATE_ATOM, $EndTime) 
		];

		$location = [
			"reference" => "Location/{$param->location->ihs_id}", 
			"display" => "{$param->location->display}" 
		];

		$icd10 = [
			"system" => "http://hl7.org/fhir/sid/icd-10", 
			"code" => "{$param->condition->code}", 
			"display" => "{$param->condition->display}" 
		]; 

		$condition = [
			"reference" => "urn:uuid:{$condition_guid}", 
			"display" => $icd10["display"]
		];

		$organization = [
			"reference" => "Organization/{$org->organization_id}" 
		];

		$identifier = [
			"system" => "http://sys-ids.kemkes.go.id/encounter/{$param->id}", 
			"value" => "{$param->noRegistrasi}" 
		]; 

		$ihs = [
		  "resourceType" => "Bundle", 
		  "type" => "transaction", 
		  "entry" => [
				[
				   "fullUrl" => $encounter["reference"], 
				   "resource" => [
					  "resourceType" => "Encounter", 
					  "status" => "finished", 
					  "class" => [
						 "system" => "http://terminology.hl7.org/CodeSystem/v3-ActCode", 
						 "code" => "AMB", 
						 "display" => "ambulatory" 
					  ], 
					  "subject" => $patient, 
					  "participant" => [
							   [
								  "type" => [
									 [
										"coding" => [
										   [
											  "system" => "http://terminology.hl7.org/CodeSystem/v3-ParticipationType", 
											  "code" => "ATND", 
											  "display" => "attender" 
										   ] 
										] 
									 ] 
								  ], 
								  "individual" => $participant
							   ] 
							], 
					  "period" => $period, 
					  "location" => [["location" => $location]], 
					  "diagnosis" => [
										[
											"condition" => $condition, 
											"use" => [
													"coding" => [
													[
														"system" => "http://terminology.hl7.org/CodeSystem/diagnosis-role", 
														"code" => "DD", 
														"display" => "Discharge diagnosis" 
													] 
													] 
												], 
											"rank" => 1 
										]
									], 
					  "statusHistory" => [
											[
												"status" => "arrived", 
												"period" => [
													"start" => date(DATE_ATOM, $StartTime), 
													"end" => date(DATE_ATOM, $StartTime) 
												] 
											], 
											[
												"status" => "in-progress", 
												"period" => [
													"start" => date(DATE_ATOM, $StartTime), 
													"end" => date(DATE_ATOM, $StartTime) 
												] 
											], 
											[
												"status" => "finished", 
												"period" => [
													"start" => date(DATE_ATOM, $EndTime), 
													"end" => date(DATE_ATOM, $EndTime) 
												] 
											] 
										], 
					  "serviceProvider" => $organization, 
					  "identifier" => [$identifier] 
				   ], 
				   "request" => [
						"method" => "POST", 
						"url" => "Encounter" 
					] 
				], 
				[
					"fullUrl" => $condition["reference"], 
					"resource" => [
						"resourceType" => "Condition", 
						"clinicalStatus" => [
							"coding" => [
								[
									"system" => "http://terminology.hl7.org/CodeSystem/condition-clinical", 
									"code" => "active", 
									"display" => "Active" 
								] 
							] 
						], 
						"category" => [[
							"coding" => [
								[
									"system" => "http://terminology.hl7.org/CodeSystem/condition-category", 
									"code" => "encounter-diagnosis", 
									"display" => "Encounter Diagnosis" 
								] 
							] 
						]], 
						"code" => [
							"coding" => [$icd10] 
						], 
						"subject" => $patient, 
						"encounter" => $encounter
					], 
					"request" => [
						"method" => "POST", 
						"url" => "Condition" 
					] 
				],  
			] 
	    ]; 
		
		$configurations = [
            'auth_url' => 'https://api-satusehat-dev.dto.kemkes.go.id/oauth2/v1',
            'base_url' => 'https://api-satusehat-dev.dto.kemkes.go.id/fhir-r4/v1',
            'consent_url' => 'https://api-satusehat-dev.dto.kemkes.go.id/consent/v1',
            'client_id' => $org->client_id,
            'client_secret' => $org->client_secret,
        ];

		$satuSehatService = new SatuSehatService($configurations);				
		$response = $satuSehatService->post(json_encode($ihs));
		header('Content-Type: application/json');
		//echo $response;				
		//die();
	}	
}