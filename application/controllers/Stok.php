<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('Obat_model');
        $this->load->model('Stok_model');        
		$this->load->model('Akun_model');                
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
        $this->load->css('https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css');        
        $this->load->css('https://cdn.datatables.net/rowgroup/1.1.2/css/rowGroup.dataTables.min.css');                                        
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
        $this->load->js('https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js');
        $this->load->js('https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js');
        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js');
        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js');
        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js');
        $this->load->js('https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js');
        $this->load->js('https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js');
        $this->load->js('https://cdn.datatables.net/rowgroup/1.1.2/js/dataTables.rowGroup.min.js');        
                
        $this->load->js('https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.12/js/dataTables.checkboxes.min.js');                                                
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js');
		$this->load->js('https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.0/dist/latest/bootstrap-autocomplete.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js');		
		$this->load->js('https://cdn.jsdelivr.net/npm/sweetalert2@9');	   
		$this->load->js('https://cdn.datatables.net/plug-ins/1.10.21/dataRender/datetime.js');	   		               			
        $this->load->js('assets/js/helper.20211205.js');
        $this->load->js('assets/js/stok.20211205.js');
		
    }	
	
	public function index(){
		$data['page_title'] = "Stok Opname";
		$data['page_menu'] = "StokOpname";        				
		$this->load->view('stok/stok', $data);
    }
    
    public function getDatatable(){
        $this->output->unset_template();		
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $where = "id_klinik=" . $id_klinik . " AND is_deleted=0";
		$result = $this->Stok_model->getDataTable($this->input->post(), $where);		
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);		
	}    

    public function getRingkasanDatatable(){
        $this->output->unset_template();		
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $where = "id_klinik=" . $id_klinik;
		$result = $this->Stok_model->getRingkasanDataTable($this->input->post(), $where);		
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);		
	}        

    public function getExpiredDatatable(){
        $this->output->unset_template();		
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $where = "id_klinik=" . $id_klinik . " AND is_deleted=0 AND expired_date < CURDATE()";
		$result = $this->Stok_model->getDataTable($this->input->post(), $where);		
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);		
    }    

    public function getWarningDatatable(){
        $this->output->unset_template();		
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $where = "id_klinik=" . $id_klinik . " AND is_deleted=0 AND (expired_date - INTERVAL 1 MONTH) < CURDATE() AND expired_date >= CURDATE()";
		$result = $this->Stok_model->getDataTable($this->input->post(), $where);		
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);		
    }     
        
    public function saveKoreksi(){
        $this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
        $user = $this->ion_auth->user()->row();				                        
        
        $data = array(
            'p_id' => $postData->id,
            'p_tanggal' => dateFormatDb($postData->tanggal_koreksi),
            'p_stok_opname' => $postData->stok_opname,
            'p_stok_gudang' => $postData->stok_gudang,              
            'p_id_klinik' => $user->id_klinik,                                                          
            'p_id_user' => $user->id,                
            'p_is_deleted' => 0,
            'p_remarks' => $postData->alasan                                                          
		);        

        $response = array();
        $this->Stok_model->koreksi($data);                

        $response = array('status' => true, 'data' => $data);        


		//add the header here
		header('Content-Type: application/json');
		echo json_encode($response);        
    }

    public function saveMutasi(){
        $this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
		$user = $this->ion_auth->user()->row();				                
        $stok_opname = $postData->stok_opname;
        $stok_gudang = $postData->stok_gudang;
        $jumlah = $postData->jumlah;                        
        $lokasi = $postData->lokasi;       
        $id =  $postData->id;
        $alasan = $postData->alasan;       

        $data = array(
			'id' => $id,
            'stok_opname' => ($lokasi=="opname") ? $stok_opname + $jumlah : $stok_opname - $jumlah,
            'stok_gudang' => ($lokasi=="gudang") ? $stok_gudang + $jumlah : $stok_gudang - $jumlah,       
            'modified_by' => $user->id                                              
		);
        

        $response = array();
        $this->db->trans_start();
            $this->db->query("INSERT INTO log_stok(id_reference, id_stok, id_obat, jumlah, lokasi, arus, harga_beli, harga_jual, tipe_transaksi, id_klinik, modified_by, remarks)
            SELECT id id_reference
            , id id_stok
            , id_obat
            , $jumlah jumlah
            , 'gudang' lokasi
            , IF('$lokasi'='gudang', 'Debit', 'Kredit') arus
            , harga_beli
            , NULL harga_jual
            , 'Mutasi' tipe_transaksi
            , $user->id_klinik id_klinik
            , $user->id modified_by
            , '$alasan' remarks
            FROM obat_stok
            WHERE id=$id;"); 

            $this->db->query("INSERT INTO log_stok(id_reference, id_stok, id_obat, jumlah, lokasi, arus, harga_beli, harga_jual, tipe_transaksi, id_klinik, modified_by, remarks)
            SELECT id id_reference
            , id id_stok
            , id_obat
            , $jumlah jumlah
            , 'opname' lokasi
            , IF('$lokasi'='opname', 'Debit', 'Kredit') arus
            , harga_beli
            , NULL harga_jual
            , 'Mutasi' tipe_transaksi
            , $user->id_klinik id_klinik
            , $user->id modified_by
            , '$alasan' remarks
            FROM obat_stok
            WHERE id=$id;");         
                
            $this->Stok_model->update($data);                
            
        $this->db->trans_complete();
        $this->db->trans_off();

        $response = array('status' => true, 'data' => $data);        


		//add the header here
		header('Content-Type: application/json');
		echo json_encode($response);        
    }   
    
    public function saveRetur(){
        $this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$user = $this->ion_auth->user()->row();				                

        $data = array(
            'p_id' => $postData->id,
            'p_tanggal' => dateFormatDb($postData->tanggal),
            'p_lokasi' => $postData->lokasi,
            'p_jumlah' => $postData->jumlah,              
            'p_akun' => $postData->akun,                               
            'p_id_klinik' => $user->id_klinik,                                                          
            'p_id_user' => $user->id,
            'p_remarks' => $postData->alasan                                                                                                                                
		);

        $response = array();
        $this->Stok_model->retur($data);                

        $response = array('status' => true, 'data' => $data);        

		//add the header here
		header('Content-Type: application/json');
		echo json_encode($response);        
    }   

    public function saveKonversi(){
        $this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
        $user = $this->ion_auth->user()->row();	

        $id = $postData->id;       
        $id_faktur = $postData->id_faktur;                       
        $lokasi = $postData->lokasi;
        $jumlah = $postData->jumlah;  
        $jumlah_konversi_akhir = $postData->jumlah_konversi_akhir;
        $stok_opname = $postData->stok_opname;               
        $stok_gudang = $postData->stok_gudang;               

        $id_obat = $postData->id_obat_konversi;        
        $harga_beli = $postData->harga_beli / $postData->jumlah_obat_konversi;        
        $total = $postData->jumlah_konversi_akhir * $harga_beli;
        $hari_kadaluarsa = $postData->hari_kadaluarsa;
        $tanggal_kadaluarsa=Date('y:m:d', strtotime('+'.$hari_kadaluarsa.' days'));        

        $data_stok = ['stok_gudang' => 'stok_gudang - '. $jumlah];

        $data_konversi = [
            'id_faktur' => $id_faktur, 
            'id_obat' => $id_obat, 
            'stok_opname' => $jumlah_konversi_akhir, 
            'stok_gudang' => 0, 
            'harga_beli' => $harga_beli, 
            'total' => $total, 
            'expired_date' => $tanggal_kadaluarsa, 
            'modified_by' => $user->id, 
            'remarks' => " (konversi)",
            'stok_awal' => $jumlah_konversi_akhir
        ];

       
        
        $this->db->trans_start();
            $this->db->set('stok_opname', ($lokasi=="opname") ? $stok_opname - $jumlah : $stok_opname);        
            $this->db->set('stok_gudang', ($lokasi=="gudang") ? $stok_gudang - $jumlah : $stok_gudang);        
            $this->db->where('id', $id);
            $this->db->update('obat_stok');

            $this->db->set($data_konversi);
            $this->db->insert('obat_stok');

            $insertId = $this->db->insert_id();


            $data_log_konversi_from = [
                'id_reference' => $id, 
                'id_stok' => $id, 
                'id_obat' => $id_obat, 
                'jumlah' => $jumlah, 
                'lokasi' => "opname", 
                'arus' => "Kredit", 
                'harga_beli' => $harga_beli, 
                'harga_jual' => null, 
                'tipe_transaksi' => "Konversi From",
                'id_klinik' => $user->id_klinik,
                'modified_by' => $user->id
            ];             
            
            $data_log_konversi_to = [
                'id_reference' => $id, 
                'id_stok' => $insertId, 
                'id_obat' => $id_obat, 
                'jumlah' => $jumlah_konversi_akhir, 
                'lokasi' => "opname", 
                'arus' => "Debit", 
                'harga_beli' => $harga_beli, 
                'harga_jual' => null, 
                'tipe_transaksi' => "Konversi To",
                'id_klinik' => $user->id_klinik,
                'modified_by' => $user->id
            ];            

            $this->db->set($data_log_konversi_from);
            $this->db->insert('log_stok');            

            $this->db->set($data_log_konversi_to);
            $this->db->insert('log_stok');            

            $this->db->set('stok', 'stok + '. $jumlah_konversi_akhir, false);        
            $this->db->set('harga_beli', $harga_beli);        
            $this->db->set('harga_beli_before', 'harga_beli', false);                    
            $this->db->where('id', $id_obat);
            $this->db->update('obat');            

		$this->db->trans_complete();
		$this->db->trans_off();
        
        $response = array('status' => true, 'data' => [$data_stok, $data_konversi]);        

		//add the header here
		header('Content-Type: application/json');
		echo json_encode($response);        
    }   

    public function delete(){
        $this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$user = $this->ion_auth->user()->row();				                

        $data = array(
            'p_id' => $postData->id,
            'p_tanggal' => Date('y:m:d'),
            'p_stok_opname' => 0,
            'p_stok_gudang' => 0,              
            'p_id_klinik' => $user->id_klinik,                                                          
            'p_id_user' => $user->id,                
            'p_is_deleted' => 1,
            'p_remarks' => "Kadaluarsa"                                                                      
		);        

        $response = array();
        $this->Stok_model->koreksi($data);                

        $response = array('status' => true, 'data' => $data);        

		//add the header here
		header('Content-Type: application/json');
		echo json_encode($response);    
    }       

	public function getCaraBayarAjax()
	{
		$this->output->unset_template();

		$akun_options = $this->Akun_model->getAkunRetur();		
		$data['akun'] = $akun_options;

		//add the header here
		header('Content-Type: application/json');
		echo json_encode($data);
    }	       
}