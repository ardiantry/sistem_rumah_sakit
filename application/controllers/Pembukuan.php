<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pembukuan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
        $this->load->model('Akun_model');        
        $this->load->model('Jurnal_model');                				
		$this->_init();
	}

	private function _init()
	{        
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		else if((!$this->ion_auth->is_admin()) && (!$this->ion_auth->in_group(['super_admin_klinik', 'administrator_klinik'])))			
		//else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			show_error('You must be an administrator to view this page.');
		}			        

		$this->load->model('Menu_model');       		
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
		$this->load->js('assets/js/pembukuan.20211205.js'); 

    }

	public function neraca()
	{      
        $data['page_title'] = "Pembukuan";
		$data['page_menu'] = "Neraca";        
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $data['neraca'] = $this->Jurnal_model->getNeraca($id_klinik);				
		$this->load->view('pembukuan/neraca', $data);
    } 
    
	public function rugilaba()
	{      
        $data['page_title'] = "Pembukuan";
		$data['page_menu'] = "RugiLaba";        
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $data['rugilaba'] = $this->Jurnal_model->getRugiLaba($id_klinik);						
		$this->load->view('pembukuan/rugilaba', $data);
    }     
    
	public function aruskas()
	{      
        $data['page_title'] = "Pembukuan";
		$data['page_menu'] = "ArusKas";   
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $data['rugilaba'] = $this->Jurnal_model->getArusKas($id_klinik);								     
		$this->load->view('pembukuan/aruskas', $data);
    }
    
	public function jurnal()
	{      
        $data['page_title'] = "Pembukuan";
        $data['page_menu'] = "JurnalUmum";        
		$this->load->view('pembukuan/jurnal', $data);
	}    

    public function getDatatable(){
        $this->output->unset_template();		
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;	

		$columns = $this->input->post('columns');
		$order = $this->input->post('order');

		$length = intval($this->input->post('length'));
		$start = intval($this->input->post('start'));
		$draw = intval($this->input->post('draw'));

		$orderColumn = isset($order) ? " ORDER BY ".$columns['0']['data'] ." ".$order['0']['dir'] ." , id_jurnal_header DESC": " ORDER BY `tanggal` DESC, id_jurnal_header DESC";
		$limit = "";

		if ($length !== -1)
			$limit =  " LIMIT ".$length." OFFSET ".$start;

		$filterDT = "";
		$filter = "";
		if($this->input->post("tanggal_transaksi")){
			$tanggal = explode(' - ', $this->input->post("tanggal_transaksi"));    
			$from = $tanggal[0];
			$to = $tanggal[1];                                
			$filterDT .= " AND tanggal BETWEEN '$from' AND '$to'";			
			
		}
		if($this->input->post("search")["value"]){
			$s = $this->input->post("search")["value"];
			$filter .= " AND (`nama` LIKE '%$s%' ESCAPE '!'";
			$filter .= " OR `kode_akun` LIKE '%$s%' ESCAPE '!'";
			$filter .= " OR `nama_akun` LIKE '%$s%' ESCAPE '!')";						
		}
		
        $strQuery = "
		(
			SELECT 
				`h`.`created_at` AS `created_at`
				,`d`.`id_jurnal_header` AS `id_jurnal_header`
				,`h`.`tanggal` AS `tanggal`
				,`h`.`nama` AS `nama`
				,group_concat(`m`.`kode_akun` order by `d`.`id` ASC separator '<br />') AS `kode_akun`
				,group_concat(`m`.`nama_akun` order by `d`.`id` ASC separator '<br />') AS `nama_akun`
				,group_concat(if(`d`.`arus` = 'Debit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') order by `d`.`id` ASC separator '<br />') AS `debit_display`
				,group_concat(if(`d`.`arus` = 'Kredit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') order by `d`.`id` ASC separator '<br />') AS `kredit_display`
				,`h`.`id_klinik` AS `id_klinik`
				,`h`.`is_deleted` AS `is_deleted`
				,`h`.`id_reference` AS `id_reference`
				,`h`.`tipe_transaksi` AS `tipe_transaksi` 
				FROM `jurnal_header` `h` 
				INNER JOIN `jurnal_detail` `d` on `h`.`id` = `d`.`id_jurnal_header`
				INNER JOIN `master_akun` `m` on `m`.`id` = `d`.`id_akun`
				WHERE `h`.`id_klinik` = ".$id_klinik." AND `h`.`is_deleted` = 0
				".$filterDT . $filter."
				GROUP BY `d`.`id_jurnal_header`
		)
		UNION ALL 
		(
				SELECT 
				`h`.`created_at` AS `created_at`
				,`d`.`id_transaksi_header` AS `id_transaksi_header`
				,`h`.`tanggal` AS `tanggal`
				,`h`.`nama` AS `nama`
				,group_concat(`m`.`kode_akun` separator '<br />') AS `kode_akun`
				,group_concat(`m`.`nama_akun` separator '<br />') AS `nama_akun`
				,group_concat(if(`d`.`arus` = 'Debit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') separator '<br />') AS `debit_display`
				,group_concat(if(`d`.`arus` = 'Kredit',concat('Rp ',format(`d`.`nilai`,0,'de_DE'),',00'),'-') separator '<br />') AS `kredit_display`
				,`h`.`id_klinik` AS `id_klinik`
				,`h`.`is_deleted` AS `is_deleted`
				,`d`.`id_transaksi_header` AS `id_reference`,'Transkasi Lain' AS `tipe_transaksi` 
				FROM `transaksi_lain_header` `h` 
				INNER JOIN `transaksi_lain_detail` `d` on `h`.`id` = `d`.`id_transaksi_header`
				INNER JOIN `master_akun` `m` on `m`.`id` = `d`.`id_akun` 
				WHERE `h`.`id_klinik` = ".$id_klinik." AND `h`.`is_deleted` = 0
				".$filterDT . $filter."
				GROUP BY `d`.`id_transaksi_header`
		)".$orderColumn."".$limit;
	

        $strFilterCount = $this->db->query("
			SELECT COUNT(*) totalRecord FROM (
				SELECT 1
				FROM `jurnal_header` `h`
				WHERE `h`.is_deleted = 0 AND `h`.id_klinik = ".$id_klinik."".$filterDT."
				AND EXISTS(SELECT 1 FROM `jurnal_detail` `d` 
				INNER JOIN `master_akun` `m` on `m`.`id` = `d`.`id_akun`
				WHERE `h`.id = `d`.id_jurnal_header ".$filter." )
			
				UNION ALL
				
				SELECT 1
				FROM `transaksi_lain_header` `h`
				WHERE `h`.is_deleted = 0 AND `h`.id_klinik = ".$id_klinik."".$filterDT."		
				AND EXISTS(SELECT 1 FROM `transaksi_lain_detail` `d` 
				INNER JOIN `master_akun` `m` on `m`.`id` = `d`.`id_akun` 
				WHERE `h`.id = `d`.id_transaksi_header ".$filter." )					
			)t
		");	

		$query = $this->db->query($strQuery);		

        $queryCount = $this->db->query("
			SELECT COUNT(*) totalRecord FROM (
				SELECT 1
				FROM `jurnal_header` `h`
				WHERE `h`.is_deleted = 0 AND `h`.id_klinik = ".$id_klinik."			
				UNION ALL				
				SELECT 1
				FROM `transaksi_lain_header` `h`
				WHERE `h`.is_deleted = 0 AND `h`.id_klinik = ".$id_klinik."
			)t
		");		

        $record = $query->result();

		$records_filtered = $strFilterCount->row()->totalRecord;
		$records_total = $queryCount->row()->totalRecord;		

		$result = array('draw' => $draw, 'data' => $record, 'recordsFiltered' => $records_filtered, 'recordsTotal' => $records_total);			

		$querySum = $this->db->query("
			SELECT SUM(debit) debit, SUM(kredit) kredit FROM (
				(
					SELECT 
					IF(arus = 'Debit', nilai, 0) debit
					,IF(arus = 'Kredit', nilai, 0) kredit
					,`h`.`id_klinik` AS `id_klinik`
					,`h`.`is_deleted` AS `is_deleted`
					FROM `jurnal_header` `h` 
					INNER JOIN `jurnal_detail` `d`
					ON `h`.`id` = `d`.`id_jurnal_header`        
					INNER JOIN `master_akun` `m` on `m`.`id` = `d`.`id_akun`					
					WHERE `h`.`id_klinik` = ".$id_klinik." AND `h`.`is_deleted` = 0
					".$filterDT.$filter."
				)
				UNION ALL 
				(
					SELECT 
					IF(arus = 'Debit', nilai, 0) debit
					,IF(arus = 'Kredit', nilai, 0) kredit
					,`h`.`id_klinik` AS `id_klinik`
					,`h`.`is_deleted` AS `is_deleted`
					FROM `transaksi_lain_header` `h` 
					INNER JOIN `transaksi_lain_detail` `d`
					ON `h`.`id` = `d`.`id_transaksi_header` 
					INNER JOIN `master_akun` `m` on `m`.`id` = `d`.`id_akun`					       
					WHERE `h`.`id_klinik` = ".$id_klinik." AND `h`.`is_deleted` = 0
					".$filterDT.$filter."
				)
			)t
		");
		$row = $querySum->row();
		$result['total_debit'] = $row->debit; 
		$result['total_kredit'] = $row->kredit; 

		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);			
	}    	
}