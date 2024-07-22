<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */

class Apotek extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
        $this->load->model('Obat_model');                        
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
		$this->load->js('assets/js/helper.20211205.js');
		$this->load->js('assets/js/apotek.20211205.js'); 
		 
    }
    
	public function index()
	{      
		$data['page_title'] = "Master Obat";
		$this->load->view('master_data/master_data', $data);
	}

	public function master_obat()
	{
		$data['apotek_privilege'] = $this->Menu_model->getById(3)->privilege_status;		
        $data['page_title'] = "Master Data";
        $data['page_menu'] = "MasterData";        
        $data['secondaryMenu'] = (object)array("is_active" => "apotek");  
		$this->load->view('apotek/master_obat', $data);
    }

	public function master_racikan()
	{
		$data['apotek_privilege'] = $this->Menu_model->getById(3)->privilege_status;				
        $data['page_title'] = "Master Data";
        $data['page_menu'] = "MasterData";        
        $data['secondaryMenu'] = (object)array("is_active" => "apotek");  
		$this->load->view('apotek/master_racikan', $data);
    }    
	 	
	public function getDataMaster()
	{
		$this->output->unset_template();
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;		
		$spesifikasi = $this->Obat_model->getSpesifikasi();		
		$spesifikasi_options = array();
		foreach($spesifikasi as $value){
			$spesifikasi_options[] = array('value' => $value->id, 'text' => $value->nama_spesifikasi);
        }
        
		$satuan = $this->Obat_model->getSatuan();		
		$satuan_options = array();
		foreach($satuan as $value){
			$satuan_options[] = array('value' => $value->id, 'text' => $value->nama_satuan);
        }

		$jenis_obat = $this->Obat_model->getJenisObat();		
		$jenis_obat_options = array();
		foreach($jenis_obat as $value){
			$jenis_obat_options[] = array('value' => $value->id, 'text' => $value->nama_jenis_obat);
        }        

		$jenis_racikan = $this->Obat_model->getJenisRacikan();		
		$jenis_racikan_options = array();
		foreach($jenis_racikan as $value){
			$jenis_racikan_options[] = array('value' => $value->id, 'text' => $value->nama_jenis_racikan);
		}
		
		$obat = $this->Obat_model->getObat($id_klinik, 0);		
		$obat_options = array();
		foreach($obat as $value){
			$obat_options[] = array('value' => $value->id, 'text' => $value->nama_obat, 'satuan' => $value->nama_satuan);
        }		

		$data['spesifikasi'] = $spesifikasi_options;                
		$data['satuan'] = $satuan_options;
        $data['jenis_obat'] = $jenis_obat_options;
        $data['jenis_racikan'] = $jenis_racikan_options;
		$data['obat'] = $obat_options;
		
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($data);
	}    

	public function getObatDatatable()
	{
		$this->output->unset_template();
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $where = "tipe='obat' AND id_klinik=" . $id_klinik . " AND is_deleted=0";
        $result = $this->Obat_model->getDataTable($this->input->post(), $where);

		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
    }    

	public function getObatRacikanDatatable()
	{
		$this->output->unset_template();
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $where = "tipe='racikan' AND id_klinik=" . $id_klinik . " AND is_deleted=0";
        $result = $this->Obat_model->getRacikanDataTable($this->input->post(), $where);

		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
    }     

	public function getBahanRacikan()
	{
        $this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
        $id_racikan = $postData->id_racikan;
        $result = $this->Obat_model->getBahanRacikan($id_racikan);

		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => $result));
    } 

	function saveObat()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);        
		$user = $this->ion_auth->user()->row();				        
		$data = array(
            'id' => $postData->id,
            'nama_obat' => $postData->nama_obat,
            'harga_beli' => $postData->harga_beli,
            'harga_jual' => $postData->harga_jual,   
            'harga_paket' => $postData->harga_paket,   			
            'stok_min' => $postData->stok_min,   
            'stok_max' => $postData->stok_max,                                    
            'keterangan' => $postData->keterangan,  
            'id_spesifikasi' => $postData->spesifikasi,  
            'id_satuan' => $postData->satuan,  
            'id_jenis_obat' => $postData->jenis_obat,                                                                        
			'tipe' => "obat",
			'id_obat_konversi' => ($postData->id_obat_konversi == '') ? NULL : $postData->id_obat_konversi,                                                                        
            'jumlah_obat_konversi' => $postData->jumlah_obat_konversi,                                                                        						
            'order_paket' => $postData->order_paket,                                                                        						
            'id_klinik' => $user->id_klinik,
			'modified_by' => $user->id            
        );        
		$result = $this->Obat_model->save($data);        
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
    }    

	function saveObatRacikan()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);        
		$user = $this->ion_auth->user()->row();				        
		$data = array(
            'id' => $postData->id,
            'nama_obat' => $postData->nama_obat,
            'harga_beli' => $postData->harga_beli,
            'harga_jual' => $postData->harga_jual,   
            'keterangan' => $postData->keterangan,  
            'id_spesifikasi' => $postData->spesifikasi,  
            'id_satuan' => $postData->satuan,  
            'id_jenis_racikan' => $postData->jenis_racikan,                                                                        
            'tipe' => "racikan",
            'id_klinik' => $user->id_klinik,
			'modified_by' => $user->id            
        );        

		$dataBahanRacikan = array();
		$result = array();

        $this->db->trans_start();
        $obat = $this->Obat_model->saveRacikan($data);

		foreach ($postData->bahan_racikan as $bahan) {
			$dataBahanRacikan[] = array(
				'id_racikan' => $obat->id,
				'id_obat' => $bahan->id,
				'jumlah' => $bahan->jumlah,
                'harga' => $bahan->harga,
                'modified_by' => $user->id                            
			);
        }        
        $this->Obat_model->clearBahanRacikan($obat->id);                
		if (count($dataBahanRacikan) > 0) {
			$this->Obat_model->insertBatchBahanRacikan($dataBahanRacikan);
        }        
                
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$result = array('status' => false, 'data' => null, 'message' => 'gagal');
		} else {
			$result = array('status' => true, 'data' => null);
        }
                        
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
    }   

	function deleteObat()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
        $id = $postData->id;
        $user = $this->ion_auth->user()->row();			
        	                
		$result = $this->Obat_model->delete($id, $user->id);        
		//add the header here
        header('Content-Type: application/json');
        if($result > 0)
            echo json_encode(array('status' => true, 'data' => $result));
        else
            echo json_encode(array('status' => false, 'message' => 'gagal'));        
	} 
	
	function getObat($id)
	{
		$this->output->unset_template();
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;			
		$obat = $this->Obat_model->getObat($id_klinik, $id);		
		
		//add the header here
        header('Content-Type: application/json');
        echo json_encode(array('status' => true, 'data' => $obat));
    } 	

}
