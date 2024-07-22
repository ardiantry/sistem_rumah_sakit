<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Afiliasi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Afiliasi_model');
		$this->_init();
    } 
    private function _init() 
	{		
		$data['menu'] = $this->Menu_model->get();	
		$this->load->section('sidebar', 'template/sidebar', $data);
		$this->output->set_template('adminLTE');
		$this->load->css('https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css');
		$this->load->css('https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css');
		// $this->load->css('https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css');
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
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js');	   		               					
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/filterizr/2.2.4/jquery.filterizr.min.js');                							
		$this->load->js('https://unpkg.com/markerjs2/markerjs2.js');	   		 
		$this->load->js('https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js');	  
		$this->load->js('https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js');	   		      														

	}
    public function Komisi() 
	{   
		$this->load->js('assets/js/afiliasi.js');
		$this->load->js('assets/js/generate_link.js');	
		$content['page_title'] = "Afiliasi";
        $content['page_menu'] = "Komisi";  
		$this->load->view('afiliasi/komisi',$content);
	}
	public function ProgramAfiliasi()
	{   
		
		$this->load->js('assets/js/afiliasi.js');
		$this->load->js('assets/js/generate_link.js');	

		$content['page_title'] 	= "Afiliasi";
        $content['page_menu'] 	= "Komisi";  
        $id_klinik 				= $this->ion_auth->user()->row()->id_klinik;
        $content['harga'] 		=  $this->Afiliasi_model->hargadefault($id_klinik); 

		$this->load->view('afiliasi/ProgramAfiliasi',$content);
	}
	public function getLayananDatatable()
	{
		$this->output->unset_template();

		$param['columns'] 	= $this->input->post('columns');
		$param['order'] 	= $this->input->post('order');
		$param['length']	= intval($this->input->post('length'));
		$param['start'] 	= intval($this->input->post('start'));
		$param['draw'] 		= intval($this->input->post('draw'));
		$id_klinik			= $this->ion_auth->user()->row()->id_klinik;
		$search 			= @$this->input->post("search")["value"]?" AND (layanan.nama_layanan LIKE  '%".@$this->input->post("search")["value"]."%' ESCAPE '!') ":'';
		$res 				= $this->Afiliasi_model->getByKlinik($param,$id_klinik,$search);

		$result 			= array('draw' => $param['draw'], 'data' => $res['data'],  'recordsTotal' => @$res['totalRecord'], 'recordsFiltered'=> @$res['totalRecord']);	
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
    } 
    public function updateLayanan()
	{
		$this->output->unset_template();
		$id_ 	=$this->input->post('id');
		$harga 	=$this->input->post('harga');
		$status =$this->input->post('status'); 
		foreach($id_ as $key_id)
		{
			
			$param['harga']	=@$harga[$key_id]?@$harga[$key_id]:0;
			$param['status']=@$status[$key_id]?'aktif':'nonaktif';
			$param['id']	=$key_id;
			$this->Afiliasi_model->updateDataafiliasi($param);
		}
		echo json_encode(array('error'=>false));
    }   
    public function getkomisiafiliasiDatatable()
	{
		$this->output->unset_template();

 
	 
		$param['columns'] 	= $this->input->post('columns');
		$param['order'] 	= $this->input->post('order');
		$param['length']	= is_numeric($this->input->post('length'))?intval($this->input->post('length')):0;
		$param['start'] 	= is_numeric($this->input->post('start'))?intval($this->input->post('start')):1;
		$param['draw'] 		= intval($this->input->post('draw'));
		$id_klinik			= $this->ion_auth->user()->row()->id_klinik;
		$search ='';
		$filterDT ='';
		//echo @$this->input->get("tanggal_transaksi");
		if($this->input->get("tanggal_transaksi")){
			$tanggal = explode(' - ', $this->input->get("tanggal_transaksi"));  

			$froma = explode('/',$tanggal[0]);
			$toa = explode('/',$tanggal[1]);  
			$from 	=$froma[2].'-'.$froma[1].'-'.$froma[0];
			$to 	=$toa[2].'-'.$toa[1].'-'.$toa[0];


			                              
			$filterDT .= " AND tb_afiliasi_pasien.tanggal BETWEEN '$from' AND '$to'";			
			
		}
		if( @$this->input->post("search")["value"])
		{
			$search 			=" AND (layanan.nama_layanan LIKE  '%".@$this->input->post("search")["value"]."%' ESCAPE '!'";
			$search 			.=" OR  tb_afiliator.first_name LIKE  '%".@$this->input->post("search")["value"]."%' ESCAPE '!'";
			$search 			.=" OR  tb_afiliator.identity LIKE  '%".@$this->input->post("search")["value"]."%' ESCAPE '!'";
			$search 			.=" OR  tb_afiliasi_pasien.nama_pasien LIKE  '%".@$this->input->post("search")["value"]."%' ESCAPE '!')"; 

		}
		
		$res 				= $this->Afiliasi_model->getKomisi($param,$id_klinik,$search,$filterDT);
		$ttl_kmisi=0;
		$ttl_ditolak=0;
		$ttl_diproses=0;


		if(@$res['data'])
		{
			$i=0;
			foreach(@$res['data'] as $ky)
			{
				if($ky->status=='proses')
				{
					$ttl_diproses +=$ky->harga; 
					$ky->status_lbl='Belum di bayarkan';
				}
				if($ky->status=='selesai')
				{
					$ttl_kmisi +=$ky->harga;
					$ky->status_lbl='Sudah di bayarkan';

				}
				if($ky->status=='batal')
				{
					$ttl_ditolak +=$ky->harga;
					$ky->status_lbl='Ditolak';

				} 

				$ky->harga_rp='Rp '.number_format($ky->harga,0,'.','.').',-';
				//$ky->harga='Rp '.number_format($ky->harga,0,'.','.').',-';
				$ky->nama_afiliator=@$ky->nama_afiliator?@$ky->nama_afiliator:'-';
				$ky->email_afiliator=@$ky->email_afiliator?@$ky->email_afiliator:'-';
				@$res['data'][$i]=$ky;

				$i++;
			}
		}
			$ttl_kmisi 				= $this->Afiliasi_model->countKomisi($search,$filterDT);
			$ttl_ditolak 			= $this->Afiliasi_model->counttolak($search,$filterDT);
			$ttl_diproses 			= $this->Afiliasi_model->countproses($search,$filterDT);

		$result 			= array(
			'draw' => $param['draw'], 
			'data' => $res['data'],  
			'recordsTotal' => @$res['totalRecord'], 
			'recordsFiltered'=> @$res['totalRecord'],
			'ttl_kmisi'=> 'Rp '.number_format(@$ttl_kmisi,0,'.','.').',-',
			'ttl_ditolak'=> 'Rp '.number_format(@$ttl_ditolak,0,'.','.').',-',
			'ttl_diproses'=> 'Rp '.number_format(@$ttl_diproses,0,'.','.').',-',



		);	
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result); 
    }  

    public function simpanstatus()
	{
		$this->output->unset_template();
		$param['status'] = $this->input->post('status');
		$param['id'] 	= $this->input->post('id_af_pas');
		$this->Afiliasi_model->updatepasienfiliasi($param);

		header('Content-Type: application/json');
		echo json_encode(array('error'=>false)); 
	}
	  public function getpasienafiliasi()
	{
		$this->output->unset_template(); 
		$data=$this->Afiliasi_model->getpasienafiliasi($this->input->get('id'));

		header('Content-Type: application/json');
		echo json_encode(array('data'=>$data)); 
	}

 
   public function simpanhargadefault()
	{
		$this->output->unset_template(); 
		$id_klinik		= $this->ion_auth->user()->row()->id_klinik;
		$harga 			= $this->input->post('harga');

		$data=$this->Afiliasi_model->simpanhargadefault($harga,	$id_klinik);

		header('Content-Type: application/json');
		echo json_encode(array('data'=>$data)); 
	}

 
    
    
   
}
