<?php defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiLain extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        $this->load->model('Akun_model');        
        $this->load->model('TransaksiLain_model');                
		$this->_init();
	}
	
	private function _init()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
        }		
        
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
        $this->load->js('https://cdn.datatables.net/plug-ins/1.10.21/dataRender/datetime.js');	   		               			        
        $this->load->js('assets/js/helper.20211205.js');
		$this->load->js('assets/js/transaksi.lain.20211205.js'); 
    }	
	
	public function index(){
		$data['page_title'] = "Transaksi Lain";
		$data['page_menu'] = "TransaksiLain";        				
		$this->load->view('transaksi_lain/index', $data);
    }

    public function getDatatable(){
        $this->output->unset_template();		
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $where = "id_klinik=" . $id_klinik . " AND is_deleted=0";
        $result = $this->TransaksiLain_model->getDataTable($this->input->post(), $where);		
		foreach($result['data'] as $key => $value){
            $result['data'][$key]->transaksi = $this->TransaksiLain_model->getDetailByIdTransaksi($result['data'][$key]->id_transaksi_header);      
		}

		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);		
	}    

	public function getDataMasterAjax()
	{
		$this->output->unset_template();

		$akun_options = $this->Akun_model->get();		
		$data['akun'] = $akun_options;

		//add the header here
		header('Content-Type: application/json');
		echo json_encode($data);
    }
    
	function save()
	{
        $this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);
		$user = $this->ion_auth->user()->row();				        		
        $id_klinik = $user->id_klinik;
		$data = array(
			'id' => $postData->id,
			'tanggal' => dateFormatDb($postData->tanggal),
			'nama' => $postData->nama,
			'id_klinik' => $id_klinik,            			
			'modified_by' => $user->id					
        );
        
        $result = array();

		$this->db->trans_start();
		$data = $this->TransaksiLain_model->save($data);        		
        $dataTransaksi = array();
		foreach ($postData->transaksi as $transaksi) {
			$dataTransaksi[] = array(
				'id_transaksi_header' => $data['id'],
				'id_akun' => $transaksi->id,
				'arus' => $transaksi->arus,
				'nilai' => clearRupiah($transaksi->nilai)
			);
        }        

		if (count($dataTransaksi) > 0) {
			$this->TransaksiLain_model->deleteByIdHeader($data['id']);
			$this->TransaksiLain_model->insertBatchTransaksi($dataTransaksi);
		}		

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$result = array('status' => false, 'message' => 'gagal');
		} else {
			$result = array('status' => true, 'data' => $data);
		}

		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
    } 
    
	function delete()
	{
        $this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);
		$user = $this->ion_auth->user()->row();				        		
		$data = array(
            'id' => $postData->id,
            'is_deleted' => 1,
			'modified_by' => $user->id					
        );
        
        $result = array();

		$this->db->trans_start();
    		$data = $this->TransaksiLain_model->save($data);        		
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$result = array('status' => false, 'message' => 'gagal');
		} else {
			$result = array('status' => true, 'data' => $data);
		}

		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
    }     
        
}