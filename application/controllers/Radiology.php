<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Radiology extends MY_Controller
{

	function __construct()
	{ //Tes Kasih Note
		parent::__construct();
		$this->load->model('Menu_model');       		
		$this->load->model('UnitLayanan_model');
		$this->load->model('TipePasien_model');
		$this->load->model('Pasien_model');									
		$this->load->model('Radiology_model');									
		$this->load->model('RadiologyType_model');									
		$this->load->model('Petugas_model');									
		$this->_init();
	}

	private function _init()
	{		
		$data['menu'] = $this->Menu_model->get();	
		$this->load->section('sidebar', 'template/sidebar', $data);
		$this->output->set_template('adminLTE');
		$this->load->css('https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css');
		$this->load->css('https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css');
		$this->load->css('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.css');
		$this->load->css('https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css');		
		$this->load->css('assets/themes/adminLTE/dist/css/wizard.css');
				
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/moment.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js');
		$this->load->js('https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js');
		$this->load->js('https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js');
		$this->load->js('https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.0/dist/latest/bootstrap-autocomplete.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js');		
		$this->load->js('https://cdn.jsdelivr.net/npm/sweetalert2@9');				
		$this->load->js('https://cdn.datatables.net/plug-ins/1.10.21/dataRender/datetime.js');	   		               					
		$this->load->js('https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js');	   		               									

		$this->load->js('assets/js/helper.20211205.js');
		//$this->load->js('assets/js/common.js');				
		$this->load->js('assets/js/radiology.js');		
	}

	

	public function admisi()
	{		
		$user = $this->ion_auth->user()->row();								
		$data['pendaftaran_privilege'] = 2;				
		$data['pemeriksaan_privilege'] = 2;								
		$data['apotek_privilege'] = 2;										
		$data['pembayaran_privilege'] = 2;						
		$data['page_title'] = "Pemeriksaan Radiology";
        $data['page_menu'] = "RAD_Admisi";                        		
		$data['wizard_index'] = 0;
		$data['unit_layanan'] = $this->UnitLayanan_model->getByKlinikSelect($user->id_klinik);
		$data['tipe_pasien'] = $this->TipePasien_model->getByKlinik($user->id_klinik);		
		$data['rad_type'] = $this->RadiologyType_model->getByKlinik($user->id_klinik);		
		$data['petugas'] = $this->Petugas_model->getByKlinik($user->id_klinik);		
		$this->load->view('radiology/radiology', $data);
	}	

	public function observasi()
	{		
		$user = $this->ion_auth->user()->row();								
		$data['pendaftaran_privilege'] = 2;				
		$data['pemeriksaan_privilege'] = 2;								
		$data['apotek_privilege'] = 2;										
		$data['pembayaran_privilege'] = 2;						
		$data['page_title'] = "Pemeriksaan Radiology";
        $data['page_menu'] = "RAD_Observation";                        		
		$data['wizard_index'] = 1;
		$data['unit_layanan'] = $this->UnitLayanan_model->getByKlinikSelect($user->id_klinik);
		$data['tipe_pasien'] = $this->TipePasien_model->getByKlinik($user->id_klinik);		
		$data['rad_type'] = $this->RadiologyType_model->getByKlinik($user->id_klinik);				
		$data['petugas'] = $this->Petugas_model->getByKlinik($user->id_klinik);		
		$this->load->view('radiology/radiology', $data);
	}	

	function getDatatableRadiology()
	{
		$this->output->unset_template();
		$user = $this->ion_auth->user()->row();
		$state_index = $this->input->post('state_index');
        $where = "id_klinik={$user->id_klinik} AND is_deleted=0 AND (state_index BETWEEN {$state_index} AND 1)";	        
		$result = $this->Radiology_model->getDataTable($this->input->post(), $where);
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
        $register_pasien = $this->Radiology_model->getById($postData->id);
		if($register_pasien != NULL){
			if($register_pasien->state_index == 2){
				header('Content-Type: application/json');
				$response = array('status' => false, 'error_code' => -2, 'message' => 'Perubahan data gagal karena transaksi sudah selesai.');
				echo json_encode($response);				
				die();
			}
			$state_index = $register_pasien->state_index;
			$id = $register_pasien->id;
		}

		$data = [];		
        $response = [];

		switch($postData->state_index){
			case 1:
				$data = 
				[
					'id' => $id,					
					'tanggal_masuk' => $postData->tanggal_masuk,
					'state_index' => 1,
					'status' => "Diproses",					
					'id_petugas' => $postData->id_petugas,					
					'modified_by' => $user->id					
				];
				$this->db->trans_start();			
				$data = $this->Radiology_model->save($data);						
				$this->db->trans_complete();					
			break;

			case 2:
				$data = 
				[
					'id' => $id,					
					'tanggal_pemeriksaan' => $postData->tanggal_pemeriksaan,
					'state_index' => 2,
					'status' => "Selesai",					
					'hasil_radiology' => $postData->expertise,					
					'modified_by' => $user->id					
				];

				$this->db->trans_start();			
				$data = $this->Radiology_model->save($data);						
				$this->db->trans_complete();					
			break;			
		}
		
		$response = array('status' => true, 'data' => $data);        
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($response);			
	}
}