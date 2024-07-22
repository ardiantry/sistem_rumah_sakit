<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ControlPanel extends MY_Controller {

	function __construct()
	{
        parent::__construct();
		require_once APPPATH . 'libraries/SatuSehatService.php';
		$this->load->model('Owner_model');                        				        
        $this->load->model('Klinik_model');   
        $this->load->model('Organization_model'); 
         $this->load->model('Member_model');    
		//$this->load->library('SatuSehatService');									                     				        		
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
		$this->load->css('https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css');						
		$this->load->css('assets/themes/adminLTE/dist/css/wizard.css');

		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/moment.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js');
		$this->load->js('https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js');
		$this->load->js('https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js');
		//$this->load->js('https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js');
        //$this->load->js('https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js');
        $this->load->js('https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.12/js/dataTables.checkboxes.min.js');                                                
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js');
		$this->load->js('https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.0/dist/latest/bootstrap-autocomplete.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js');		
		$this->load->js('https://cdn.jsdelivr.net/npm/sweetalert2@9');	   
		$this->load->js('https://cdn.datatables.net/plug-ins/1.10.21/dataRender/datetime.js');	   		               			
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js');	   		               									
        $this->load->js('assets/js/helper.20211205.js');		
        $this->load->js('assets/js/control.panel.20221126.js');		
        $this->load->js('assets/js/new_registrar.js');		        


    }	
	
	public function index(){
		$data['page_title'] = "Control Panel";
		$data['page_menu'] = "ControlPanel";        				
		$this->load->view('control_panel/index', $data);
    }

	public function owner(){
		$data['page_title'] = "Owner";
		$data['page_menu'] = "Owner";        				
		$this->load->view('control_panel/owner', $data);
    }
    
	public function owner_detail($id){
		$data['page_title'] = "Owner";
        $data['page_menu'] = "Owner"; 
		$owner = $this->Owner_model->getById($id);		
		$owner->klinik = $this->Klinik_model->getByIdOwner($id);                				
		//var_dump($owner);die();
		//var_dump($owner ?? (object)['id'=>NULL]);die();
		$data['owner'] = $owner;
		$listTipeLayanan = $this->Klinik_model->getTipeLayanan();
		$data['listTipeLayanan'] = $listTipeLayanan;								
		$this->load->view('control_panel/owner_detail', $data);
	}
	
	public function owner_save(){
        $this->output->unset_template();		
		$id = $this->input->post('id_owner', TRUE);
		$nama_depan = $this->input->post('nama_depan', TRUE);
		$nama_belakang = $this->input->post('nama_belakang', TRUE);
		$nama_perusahaan = $this->input->post('nama_perusahaan', TRUE);
		$email = $this->input->post('email', TRUE);
		$alamat = $this->input->post('alamat', TRUE);
		$provinsi = $this->input->post('provinsi', TRUE);
		$kota = $this->input->post('kota', TRUE);										
		$kode_pos = $this->input->post('kode_pos', TRUE);										
		$no_telp = $this->input->post('no_telp', TRUE);														
		$no_fax = $this->input->post('no_fax', TRUE);																
		$keterangan = $this->input->post('keterangan', TRUE);																		

		$owner = [
			'id' => $id,
			'nama_depan' => $nama_depan,
			'nama_belakang' => $nama_belakang,
			'nama_perusahaan' => $nama_perusahaan,
			'email' => $email,
			'alamat' => $alamat,
			'provinsi' => $provinsi,
			'kota' => $kota,
			'kode_pos' => $kode_pos,
			'no_telp' => $no_telp,
			'no_fax' => $no_fax,
			'keterangan' => $keterangan
		];
		//var_dump($owner);
		//die();
		$data['owner'] = $owner;
		if (($this->ion_auth->email_check($email) === TRUE) && ($id === '0'))
		{
			$this->session->set_flashdata('error', "Email sudah terdaftar");
			$this->session->set_flashdata('owner', $data);							
			redirect('ControlPanel/owner_detail/' . $id, 'refresh');
			//$this->load->view('control_panel/owner_detail', $data);
		}
		else{
			$result = $this->Owner_model->save($owner);
			if($result['status'] === TRUE)
				$this->session->set_flashdata('success', 'Data berhasil disimpan.');
			else
				$this->session->set_flashdata('error', $result['message']);		
	

			redirect('ControlPanel/owner_detail/' . $result['data']['id'], 'refresh');
		}
	}	
	
	public function owner_delete($id){
        $this->output->unset_template();		
		$this->session->set_flashdata('success', 'Data berhasil dihapus.');
		redirect('ControlPanel/owner', 'refresh');
	}	

	public function klinik(){		
		$data['page_title'] = "Klinik";
		$data['page_menu'] = "Klinik";        				
		$this->load->view('control_panel/klinik', $data);
    }        

	public function klinik_detail($id){		
		$data['page_title'] = "Klinik";
		$data['page_menu'] = "Klinik";        				
		$listOwner = [''=>'--pilih owner--'];
		$listTipeLayanan = $this->Klinik_model->getTipeLayanan();	
		$owner = $this->Owner_model->get();

		foreach($owner as $row ){
			$listOwner[$row->id] = $row->nama_depan . " " . $row->nama_belakang;
		}						
		$klinik = $this->Klinik_model->getById($id);	
		$org = $this->Organization_model->getMainOrg($id);			
		$data['klinik'] = $klinik;
		$data['listOwner'] = $listOwner;
		$data['listTipeLayanan'] = $listTipeLayanan;						
		$data['org'] = $org ?? (object)['organization_id' => null, 'is_active' => null, 'client_id' => null, 'client_secret' => null];
		$this->load->view('control_panel/klinik_detail', $data);
	}            
	
	public function klinik_save(){
        $this->output->unset_template();		
		$id = $this->input->post('id_klinik', TRUE);				
		$id_owner = $this->input->post('nama_owner', TRUE);
		$nama_klinik = $this->input->post('nama_klinik', TRUE);
		$email = $this->input->post('email', TRUE);
		$alamat = $this->input->post('alamat', TRUE);
		$provinsi = $this->input->post('provinsi', TRUE);
		$kota = $this->input->post('kota', TRUE);										
		$kode_pos = $this->input->post('kode_pos', TRUE);										
		$no_telp = $this->input->post('no_telp', TRUE);														
		$no_fax = $this->input->post('no_fax', TRUE);		
		$tipe = $this->input->post('tipe_layanan', TRUE);				
		$keterangan = $this->input->post('keterangan', TRUE);																		
		$logo = $this->input->post('logo_filename', TRUE);																		
		
		$klinik = [
			'id' => $id,
			'id_owner' => $id_owner,			
			'nama_klinik' => $nama_klinik,
			'email' => $email,
			'alamat' => $alamat,
			'provinsi' => $provinsi,
			'kota' => $kota,
			'kode_pos' => $kode_pos,
			'no_telp' => $no_telp,
			'no_fax' => $no_fax,
			'tipe' => $tipe,			
			'keterangan' => $keterangan,
			'logo' => $logo
		];

		$data['klinik'] = $klinik;
		//var_dump($data);
		//die();
		if (($this->ion_auth->email_check($email) === TRUE) && ($id === '0'))
		{
			$this->session->set_flashdata('error', "Email sudah terdaftar");
			$this->session->set_flashdata('klinik', $data);							
			redirect('ControlPanel/klinik_detail/' . $id, 'refresh');

		}
		else{
			$result = $this->Klinik_model->save($klinik);
			if($result['status'] === TRUE)
				$this->session->set_flashdata('success', 'Data berhasil disimpan.');
			else
				$this->session->set_flashdata('error', $result['message']);		
	

			redirect('ControlPanel/klinik_detail/' . $result['data']['id'], 'refresh');
		}		
    }	

	public function klinik_org_save(){
        $this->output->unset_template();		
		$id_klinik = $this->input->post('id_klinik', TRUE);				
		$organization_id = $this->input->post('organization_id', TRUE);
		//$is_active = $this->input->post('is_active', TRUE);
		$client_id = $this->input->post('client_id', TRUE);
		$client_secret = $this->input->post('client_secret', TRUE);
		
        $configurations = [
            'client_id' => $client_id,
            'client_secret' => $client_secret,
        ];
		$satuSehatService = new SatuSehatService($configurations);		
		$response = $satuSehatService->get('Patient?identifier=https://fhir.kemkes.go.id/id/nik|3211200806900002');
		$org_ihs = json_decode($response);
		$active = 0;
		if($org_ihs->code == 200)
			$active = 1;

		$main_org = [
			'organization_id' => $organization_id,
			'organization_type' => '102',						
			'client_id' => $client_id,			
			'client_secret' => $client_secret,
			'is_active' => $active,
			'id_klinik' => $id_klinik,		
			'is_main_org'	=> 1
		];
		$data['org'] = $main_org;
		
		$result = $this->Organization_model->replace($main_org);
		//generate org
		
		if($result['status'] === TRUE)
			$this->session->set_flashdata('success', 'Data berhasil disimpan.');
		else
			$this->session->set_flashdata('error', $result['message']);	

		redirect('ControlPanel/klinik_detail/' . $id_klinik, 'refresh');
    }		

	public function klinik_delete($id){
		$this->output->unset_template();	
		$result = $this->Klinik_model->delete($id);

		if($result['status'] === TRUE)
			$this->session->set_flashdata('success', 'Data berhasil dihapus.');
		else
			$this->session->set_flashdata('error', 'Data gagal dihapus.');		

		redirect('ControlPanel/klinik', 'refresh');
	}		

	public function klinik_active($id){
        $this->output->unset_template();		
		$klinik = [
			'id' => $id,
			'tipe' => 1,
			'status' => 1,			
			'aktif_sampai' => dateFormatDb(NULL),
			'pembayaran' => 1000000,			
		];
		$result = $this->Klinik_model->active($klinik);		
		$this->session->set_flashdata('success', 'Layanan telah diaktifan.');
		redirect('ControlPanel/klinik_detail/' . $id, 'refresh');
	}			

	public function klinik_nonactive($id){
        $this->output->unset_template();		
		$klinik = [
			'id' => $id,
			'tipe' => 1,
			'status' => 0,			
			'aktif_sampai' => dateFormatDb(NULL),
			'pembayaran' => 1000000,			
		];
		$result = $this->Klinik_model->active($klinik);		
		$this->session->set_flashdata('success', 'Layanan telah dinonaktif.');
		redirect('ControlPanel/klinik_detail/' . $id, 'refresh');
	}			

	public function ihs_nonactive($id){
        $this->output->unset_template();		
		$result = $this->Organization_model->delete($id);
		$this->session->set_flashdata('success', 'Integrasi Satu Sehat telah dinonaktif.');
		redirect('ControlPanel/klinik_detail/' . $id, 'refresh');
	}			

    public function getOwnerDatatable(){
        $this->output->unset_template();		
        $where = "is_deleted=0";
		$result = $this->Owner_model->getDataTable($this->input->post(), $where);		
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);		
	}
	
    public function getKlinikDatatable(){
        $this->output->unset_template();		
        $where = "is_deleted=0";
		$result = $this->Klinik_model->getDataTable($this->input->post(), $where);		
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);		
	}	


    public function postLogo()
    {
        $this->output->unset_template();				
		$id = $this->input->post('id', TRUE);			
        $data = $_POST['image'];
     
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
     
        $data = base64_decode($data);
        $imageName = $id."_".time().'.png';
		file_put_contents('assets/img/'.$imageName, $data);			

		$klinik = [
			'id' => $id,
			'logo' => $imageName
		];	
		if($id > 0)
			$this->Klinik_model->save($klinik);     

		header('Content-Type: application/json');
		echo json_encode($imageName);		        
    }	
 public function Newregistrar()
    {
    	$data['page_title'] = "Control Panel";
		$data['page_menu'] = "New Registrar";  
        $this->load->view('control_panel/New_registrar',$data);	        
    }	

public function getNewRegistrarDatatable()
    {
    	    $this->output->unset_template();
    	    $where = "is_deleted=0";
			$result = $this->Member_model->getDataTable($this->input->post(),$where);	
			//print_r($result);
    	    header('Content-Type: application/json');
			echo json_encode($result);		    
    }

public function deletenewMember()
    {
    	$this->output->unset_template();				
		$id_delete = $this->input->post('id_delete', TRUE);	 
		$result = $this->Member_model->delete($id_delete);   		
		header('Content-Type: application/json');
		echo json_encode(array('error'=>false));		    
    }

}