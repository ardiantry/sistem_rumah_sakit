<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ResepLuar extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Menu_model');       		
		$this->load->model('TransaksiObat_model');			
		$this->load->model('Klinik_model');								
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
		$this->load->css('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.css');
		$this->load->css('assets/themes/adminLTE/dist/css/wizard.css');

		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/moment.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js');
		$this->load->js('https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js');
		$this->load->js('https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js');
		$this->load->js('https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js');
		$this->load->js('https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js');
		$this->load->js('https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.0/dist/latest/bootstrap-autocomplete.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js');		
		$this->load->js('https://cdn.jsdelivr.net/npm/sweetalert2@9');				
		$this->load->js('https://cdn.datatables.net/plug-ins/1.10.21/dataRender/datetime.js');	   		               					
		$this->load->js('assets/js/helper.20211205.js');
		$this->load->js('assets/js/resep.luar.20230621-1.js');
	}

	public function index()
	{
		$data['apotek_privilege'] = $this->Menu_model->getById(3)->privilege_status;										
        $data['pembayaran_privilege'] = $this->Menu_model->getById(4)->privilege_status;		
        $data['ResepLuar'] = (object)array('no_registrasi' => 'RL' . date("Ymdhis"), 'tanggal_penyerahan_resep' => date("d/m/Y"));
		$data['page_title'] = "Apotek";
        $data['page_menu'] = "ResepLuar";                        		
		$data['wizard_index'] = 0;
		$this->load->view('resep_luar/resep_luar', $data);
	}

	public function pembayaran()
	{        
		$data['apotek_privilege'] = $this->Menu_model->getById(3)->privilege_status;	
        $data['pembayaran_privilege'] = $this->Menu_model->getById(4)->privilege_status;
        $data['ResepLuar'] = (object)array('no_registrasi' => 'RL' . date("Ymdhis"), 'tanggal_penyerahan_resep' => date("d/m/Y"));        		
		$data['page_title'] = "Apotek";
        $data['page_menu'] = "PembayaranResepLuar";                        							
		$data['wizard_index'] = 2;
		$this->load->view('resep_luar/resep_luar', $data);
	}	
	
    public function print($id){
		$this->output->unset_template();				
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;		
		$data['transaksi'] = $this->TransaksiObat_model->getById($id);		
		$data['obat'] = $this->TransaksiObat_model->getDetailByIdTransaksi($id);			
		$data['tambahan'] = $this->TransaksiObat_model->getTambahanByIdTransaksi($id);				
		$data['bayar'] = $this->TransaksiObat_model->getCaraBayarByIdTransaksi($id);						
		$data['klinik'] = $this->Klinik_model->getById($id_klinik);							
		$this->load->view('resep_luar/invoice-print', $data);
	}  	
}