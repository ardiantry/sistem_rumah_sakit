<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Pasien_model');
        $this->load->model('RegisterPasien_model');		
		$this->_init();
	}
	
	private function _init()
	{	
		$data['menu'] = $this->Menu_model->get();	
		$this->load->section('sidebar', 'template/sidebar', $data);		

		$this->output->set_template('adminLTE');
		$this->load->css('https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css');
		$this->load->css('https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css');
        $this->load->css('https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css');                
        $this->load->css('https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.12/css/dataTables.checkboxes.css');                                
		$this->load->css('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.css');
		$this->load->css('https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css');				
		$this->load->css('assets/themes/adminLTE/dist/css/wizard.css');

		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/moment.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js');
		$this->load->js('https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js');
		$this->load->js('https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js');
		$this->load->js('https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js');
        $this->load->js('https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js');
        $this->load->js('https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.12/js/dataTables.checkboxes.min.js');                                                
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js');
		$this->load->js('https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.0/dist/latest/bootstrap-autocomplete.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js');		
		$this->load->js('https://cdn.jsdelivr.net/npm/sweetalert2@9');	   
		$this->load->js('https://cdn.datatables.net/plug-ins/1.10.21/dataRender/datetime.js');	   		               			
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js');	   		               							
        $this->load->js('assets/js/helper.20211205.js');
		$this->load->js('assets/js/rekam.medik.20221126.js'); 
		
    }	
	
	public function rekam_medik(){
		$data['page_title'] = "Rekam Medik";
		$data['page_menu'] = "RekamMedik";        				
		$this->load->view('pasien/rekam_medik', $data);
	}

	public function rekam_medik_detail($id){
		$data['page_title'] = "Rekam Medik";
		$data['page_menu'] = "RekamMedik";        
        $data['pasien'] = $this->Pasien_model->getById($id);				
		$this->load->view('pasien/rekam_medik_detail', $data);
	}	

	public function print($id){
		$this->output->unset_template();			
		$id_klinik = $this->ion_auth->user()->row()->id_klinik;
		$data['klinik']	=$this->Klinik_model->klinik($id_klinik);
		print_r($data);
		exit();
		$data['pasien'] = $this->Pasien_model->getById($id);		
		$data['rekam_medik'] = $this->RegisterPasien_model->getRekamMedikByIdPasien($id);			
					
		$this->load->view('pasien/rekam_medik-print', $data);
	}		
	
	public function getById()
	{
        //$this->output->enable_profiler(TRUE);					    
        $this->output->unset_template();
        $response = array('status'=>false);
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
        $result = $this->Pasien_model->getById($postData->id);
        if($result == NULL){
            $response['status'] = false;
            $response['message'] = 'Data Tidak Ditemukan';
        }
        else{
            $response['status'] = true;
            $response['data'] = $result;            
        }
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($response);
    }	

	function getRiwayatDatatable()
	{
		$this->output->unset_template();
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
		$id = $this->input->post('id_pasien');
        $where = "id_pasien={$id}";						
		$result = $this->Pasien_model->getRiwayatDataTable($this->input->post(), $where);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
	} 		

    public function getDatatable(){
        $this->output->unset_template();		
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $where = "id_klinik={$id_klinik} AND is_deleted=0";
		$result = $this->Pasien_model->getDataTable($this->input->post(), $where);		
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);		
	}
	public function getDataTable1()
	{        
        $this->output->unset_template();
		$result = $this->Pasien_model->getDataTable($this->input->post());
		$data = array();
		foreach ($result['data'] as $rows) {
			$data[] = array(
				'btn-pilih' => '',
				"no_rm" =>  $rows->no_rm,
				"nama_pasien" => $rows->nama_pasien,
				"tempat_lahir" => $rows->tempat_lahir,
				"tanggal_lahir" => date("d/m/Y", strtotime($rows->tanggal_lahir)),
				"no_telp" => $rows->no_telp,
				"agama" => $rows->agama,
				"golongan_darah" => $rows->golongan_darah,
				"jenis_kelamin_display" => $rows->jenis_kelamin_display,
				"pekerjaan_display" => $rows->pekerjaan_display,
				"alamat" => $rows->alamat,
				"keterangan" => $rows->keterangan,
				"jenis_kelamin" => $rows->jenis_kelamin,
				"pekerjaan" => $rows->pekerjaan,				
				"id" => $rows->id,
				'btn-expand' => '',				
			);
		}
		$output = array(
			"draw" => $result['draw'],
			"recordsTotal" => $result['recordsTotal'],
			"recordsFiltered" => $result['recordsFiltered'],
			"data" => $data
		);

		//add the header here
		header('Content-Type: application/json');
		echo json_encode($output);
    }
    
	function save()
	{
        $this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
		$data = array(
			'id' => $postData->id,
			'no_rm' => $postData->no_rm,
			'nama_pasien' => $postData->nama_pasien,
			'tempat_lahir' => $postData->tempat_lahir,
			'tanggal_lahir' => $postData->tanggal_lahir,
			'agama' => (isset($postData->agama)) ? $postData->agama : NULL,
			'alamat' => $postData->alamat,
			'no_telp' => $postData->no_telp,
			'jenis_kelamin' => (isset($postData->jenis_kelamin)) ? $postData->jenis_kelamin : NULL,
			'golongan_darah' => (isset($postData->golongan_darah)) ? $postData->golongan_darah : NULL,
			'pekerjaan' => (isset($postData->pekerjaan)) ? $postData->pekerjaan : NULL,
			'keterangan' => $postData->keterangan,
			'ktp' => $postData->ktp,
			'ihs_id' => $postData->ihs_id,						
			'no_bpjs' => $postData->no_bpjs,						
			'id_klinik' => $id_klinik            			
		);
		$pasien_result = $this->Pasien_model->save($data);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($pasien_result);
	}  
	
	function delete()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
        $id = $postData->id;
        $user = $this->ion_auth->user()->row();			
        	                
		$result = $this->Pasien_model->delete($id, $user->id);        
		//add the header here
        header('Content-Type: application/json');
        echo json_encode($result);
	}  
	
	function getNoRM(){
		$this->output->unset_template();		
		$id_klinik = $this->ion_auth->user()->row()->id_klinik;
		$query = $this->db->query("SELECT RIGHT(CONCAT('000000', CAST(no_rm + 1 AS CHAR)), 6) kode FROM pasien WHERE id_klinik = $id_klinik ORDER BY no_rm DESC LIMIT 1");
		$row = $query->row();
		$kode = "000001"; 
		if (isset($row))
		{
			$kode = $row->kode;		
		}		
        header('Content-Type: application/json');
        echo json_encode($kode);		

	}

	public function checkNoRM()
	{      
		$this->output->unset_template();		
		$id_klinik = $this->ion_auth->user()->row()->id_klinik;		
		$noRM = $this->input->post('no_rm');		
		$query = $this->db->query("SELECT 1 kode FROM pasien WHERE no_rm = '$noRM' AND id_klinik = $id_klinik AND 1=1 LIMIT 1");
		$row = $query->row();
		if (isset($row))
		{
			echo 'false';
		}		
		else{
			echo 'true';
		}
	}

	function setToAppointment()
	{
        $this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;

		$data = array(
			'id' => $postData->id,
			'id_pasien' => $postData->id_pasien			
		);

		$pasien_result = $this->Pasien_model->setToAppointment($data);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($data);
	}  	

}