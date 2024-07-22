<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hutang extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Menu_model');       		
		$this->load->model('Supplier_model');
		$this->load->model('CaraBayar_model');		
		$this->load->model('Obat_model');
		$this->load->model('Pemesanan_model');		
		$this->load->model('Penerimaan_model');			
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
		$this->load->js('assets/js/hutang.20211205.js');
	}

	public function index()
	{
		$data['apotek_privilege'] = $this->Menu_model->getById(3)->privilege_status;										
        $data['pembayaran_privilege'] = $this->Menu_model->getById(4)->privilege_status;		
        $data['Pembelian'] = (object)array('no_po' => 'PO' . date("Ymdhis"), 'tanggal_po' => date("d/m/Y"), 'no_pr' => 'DO' . date("Ymdhis"), 'tanggal_pr' => date("d/m/Y"),);
		$data['page_title'] = "Hutang Supplier";
        $data['page_menu'] = "PembayaranHutangSupplier";                        		
		$data['wizard_index'] = 2;
		$this->load->view('pembelian/hutang', $data);
	}

    public function print($id){
		$this->output->unset_template();				
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;							
		$data['transaksi'] = $this->Penerimaan_model->getHutangByIdFaktur($id);		
		$data['obat'] = $this->Penerimaan_model->getDetailByIdFaktur($id);			
		$data['tambahan'] = [];				
		$data['bayar'] = $this->Penerimaan_model->getCaraBayarByIdFaktur($id);						
		$data['klinik'] = $this->Klinik_model->getById($id_klinik);												
		$this->load->view('pembelian/hutang-print', $data);
	} 	

	public function getDataMasterAjax()
	{
		$this->output->unset_template();
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
		$supplier_option = $this->Supplier_model->getByKlinik($id_klinik);
		$cara_bayar_option = $this->CaraBayar_model->getCaraBayarHutangByKlinik($id_klinik);

		$data['supplier'] = $supplier_option;
		$data['cara_bayar'] = $cara_bayar_option;

		//add the header here
		header('Content-Type: application/json');
		echo json_encode($data);
	}


	public function getObatAjax()
	{
		$this->output->unset_template();
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
		$query_string = $this->input->post('qry', TRUE);
		$obat = $this->Obat_model->getObatAutocomplete($id_klinik, $query_string);
		$data = array();
		foreach ($obat as $rows) {
			$data[] = array(
				'id' => $rows->id,
				'text' => $rows->nama_obat,
                'harga_obat' => $rows->harga_beli,
				'exp_date' => date("Y-m-d")               
			);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('results' => $data));
	}


	function savePemesanan()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);        
		$user = $this->ion_auth->user()->row();				        
		$data = array(
            'id' => $postData->id,
            'no_po' => $postData->no_po,
            'tanggal_po' => dateFormatDb($postData->tanggal_po),                               
            'keterangan' => $postData->keterangan,  
            'id_supplier' => $postData->id_supplier,  
            'id_klinik' => $user->id_klinik,
			'modified_by' => $user->id            
		);       
		
		
		$result = array();

		$this->db->trans_start();
		$data = $this->Pemesanan_model->save($data);        
		
		$dataObat = array();
		foreach ($postData->dataObat as $obat) {
			$dataObat[] = array(
				'id_po' => $data['id'],
				'id_obat' => $obat->id,
				'jumlah' => $obat->jumlah
			);
		}	

		if (count($dataObat) > 0) {
			$this->Pemesanan_model->deleteByIdPo($postData->id);
			$this->Pemesanan_model->insertBatchObat($dataObat);
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
	
	function savePenerimaan()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);        
		$user = $this->ion_auth->user()->row();				        
		$data = array(
			'id' => $postData->id,
            'id_po' => $postData->id_po,			
            'no_faktur' => $postData->no_faktur,
			'tanggal_faktur' => dateFormatDb($postData->tanggal_faktur),                               			
            'lokasi' => $postData->lokasi,			
            'keterangan' => $postData->keterangan,  
            'id_supplier' => $postData->id_supplier,  
            'id_klinik' => $user->id_klinik,
			'modified_by' => $user->id            
		);       
		
		
		$result = array();

		$this->db->trans_start();
		$data = $this->Penerimaan_model->save($data);        
		
		$dataObat = array();
		foreach ($postData->dataObat as $obat) {
			$dataObat[] = array(
				'id_faktur' => $data['id'],
				'id_obat' => $obat->id,
				'jumlah' => $obat->jumlah,
				'harga_beli' => $obat->harga,
				'total' => $obat->total,				
				'expired_date' => $obat->exp_date							
			);
		}	

		if (count($dataObat) > 0) {
			$this->Penerimaan_model->deleteByIdFaktur($postData->id);
			$this->Penerimaan_model->insertBatchObat($dataObat);
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

	function getPemesananDatatable()
	{
		$this->output->unset_template();
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $where = "state_index=0 AND id_klinik=" . $id_klinik . " AND is_deleted=0";						
		$result = $this->Pemesanan_model->getDataTable($this->input->post(), $where);
		foreach($result['data'] as $key => $value){
            $result['data'][$key]->dataObat = $this->Pemesanan_model->getDetailByIdPo($result['data'][$key]->id) ?? array();      
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
	}    	

	function getPenerimaanDatatable()
	{
		$this->output->unset_template();
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $where = "state_index=0 AND id_klinik=" . $id_klinik . " AND is_deleted=0";						
		$result = $this->Penerimaan_model->getDataTable($this->input->post(), $where);
		foreach($result['data'] as $key => $value){
            $result['data'][$key]->dataObat = $this->Penerimaan_model->getDetailByIdFaktur($result['data'][$key]->id) ?? array();      
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
	} 	

	function getHutangDatatable()
	{
		$this->output->unset_template();
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $where = "id_klinik=" . $id_klinik . " AND is_deleted=0";						
		$result = $this->Penerimaan_model->getHutangDataTable($this->input->post(), $where);
		foreach($result['data'] as $key => $value){
            $result['data'][$key]->dataObat = $this->Penerimaan_model->getDetailByIdFaktur($result['data'][$key]->id) ?? array();      
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
	} 

	function savePembayaran()
	{
		$this->output->unset_template();
		$user = $this->ion_auth->user()->row();				        		
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);

		$dataTransaksi = array(
			'id' => $postData->id,			
			'state_index' => 2,
			'modified_by' => $user->id,
			'keterangan3' => $postData->keterangan            
		);

		$tanggalBayar = date("Y-m-d H:i:s");
		$namaTransaksi = "Pembayaran Hutang Supplier No Faktur : " . $postData->noFaktur;
		$totalTagihan = $postData->totalTagihan;
		$idCaraBayar = $postData->idCaraBayar;

		$dataHeader = [
			'tanggal' => $tanggalBayar, 
			'nama' => $namaTransaksi, 
			'id_reference' => $postData->id,
			'tipe_transaksi' => "Hutang Supplier",			
			'id_klinik' => $user->id_klinik, 
			'modified_by' => $user->id
		];

		$dataDetail = [
			'id' => $postData->id,
			'id_cara_bayar' => $idCaraBayar, 
			'jumlah' => $totalTagihan
		];		

		$dataJurnal = ['header' => $dataHeader, 'detail' => $dataDetail];
		
		$result = array();

		$this->db->trans_start();
			$this->Penerimaan_model->save($dataTransaksi);
			$this->Penerimaan_model->hutangToJurnal($dataJurnal);			
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$result = array('status' => 'gagal', 'data' => null);
		} else {
			$result = array('status' => 'ok', 'data' => null);
		}

		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
	}		
}
