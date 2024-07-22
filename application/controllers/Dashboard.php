<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model');                        		
        $this->load->model('Pengumuman_model');                        				
		$this->_init();        
    }

	private function _init()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

		$this->load->model('Menu_model');       		
		$data['menu'] = $this->Menu_model->get();	

		$this->load->section('sidebar', 'template/sidebar', $data);
		$this->output->set_template('adminLTE');
		$this->load->css('https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css');
		$this->load->css('https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css');
		$this->load->css('https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css');
        $this->load->css('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.css');
                                                                            
		//$this->load->js('https://code.jquery.com/ui/1.12.1/jquery-ui.min.js');
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
	}

	public function index()
	{		
		if ($this->ion_auth->in_group(array('admin', 'owner'))){
			redirect('/dashboard/d4', 'refresh');
		}		
		else if ($this->ion_auth->in_group('super_admin_klinik')){
			redirect('/dashboard/d1', 'refresh');
		}
		else if ($this->ion_auth->in_group('administrator_klinik')){
			redirect('/dashboard/d2', 'refresh');
		}
		else{
			redirect('/dashboard/d3', 'refresh');
		}		
	}	

	public function d1()
	{
		$user = $this->ion_auth->user()->row();		
		$klinik = $this->Klinik_model->klinik($user->id_klinik);		        
		$nama_klinik = "Administrator";
		if(isset($klinik))
			$nama_klinik = $klinik->nama_klinik;				        

		if((!$this->ion_auth->is_admin()) && (!$this->ion_auth->in_group('super_admin_klinik')))		
		{
			// redirect them to the home page because they must be an administrator to view this
			show_error('You must be an super administrator to view this page.');
		}				

        $this->load->css('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css');        
        $this->load->css('https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jqvmap.min.css');
        $this->load->css('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css');         
        $this->load->css('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');                 

        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js');
        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jquery.vmap.min.js');        		        
        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/maps/jquery.vmap.usa.js');        		                
        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js');        		                                        
        $this->load->js('assets/themes/adminLTE/plugins/sparklines/sparkline.js');        		                                                             
        $this->load->js('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js');        
		$this->load->js('assets/themes/adminLTE/dist/js/pages/d1.20220521.js');				                

        $data['page_title'] = "Dasbor Klinik/Apotek : " . $nama_klinik;
        $data['page_menu'] = "D1";                                
		$data['wizard_index'] = 0;
		$id_klinik = 1;		
		$data['Pengumuman'] = $this->Pengumuman_model->getByKlinik($id_klinik);		
		$data['TanggalDashboard'] = date("Y-m-d");
	
		$this->load->view('dashboard/index', $data);
    }

	public function d2()
	{
		$user = $this->ion_auth->user()->row();		
		$klinik = $this->Klinik_model->klinik($user->id_klinik);
		$nama_klinik = "Administrator";
		if(isset($klinik))
			$nama_klinik = $klinik->nama_klinik;				        

		if((!$this->ion_auth->is_admin()) && (!$this->ion_auth->in_group('administrator_klinik')))				
		{
			// redirect them to the home page because they must be an administrator to view this
			show_error('You must be an administrator to view this page.');
		}						
        $this->load->css('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css');        
        $this->load->css('https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jqvmap.min.css');
        $this->load->css('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css');         
        $this->load->css('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');                 

        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js');
        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jquery.vmap.min.js');        		        
        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/maps/jquery.vmap.usa.js');        		                
        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js');        		                                        
        $this->load->js('assets/themes/adminLTE/plugins/sparklines/sparkline.js');        		                                                             
        $this->load->js('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js');        
		$this->load->js('assets/themes/adminLTE/dist/js/pages/d2.20220521.js');	
                         		                                                                                     
        $data['page_title'] = "Dasbor Klinik/Apotek : " . $nama_klinik;
        $data['page_menu'] = "D2";                        
		$data['wizard_index'] = 0;
		$id_klinik = 1;
		$data['Pengumuman'] = $this->Pengumuman_model->getByKlinik($id_klinik);	
		$data['TanggalDashboard'] = date("Y-m-d");

		$this->load->view('dashboard/index2', $data);
    }

    public function d3()
	{
		$user = $this->ion_auth->user()->row();		
		$klinik = $this->Klinik_model->klinik($user->id_klinik);		        
		$nama_klinik = "Administrator";
		if(isset($klinik))
			$nama_klinik = $klinik->nama_klinik;

        $this->load->css('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css');        
        $this->load->css('https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jqvmap.min.css');
        $this->load->css('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css');         
        $this->load->css('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');                 

        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js');
        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jquery.vmap.min.js');        		        
        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/maps/jquery.vmap.usa.js');        		                
        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js');        		                                        
        $this->load->js('assets/themes/adminLTE/plugins/sparklines/sparkline.js');        		                                                             
        $this->load->js('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js');        
		$this->load->js('assets/themes/adminLTE/dist/js/pages/d3.20220521.js');		

        $data['page_title'] = "Dasbor Klinik/Apotek : " . $nama_klinik;
        $data['page_menu'] = "D3";                                
		$data['wizard_index'] = 0;
		$id_klinik = 1;
		$data['Pengumuman'] = $this->Pengumuman_model->getByKlinik($id_klinik);													
		$data['TanggalDashboard'] = date("Y-m-d");
					
		$this->load->view('dashboard/index3', $data);
	}     

	public function d4()
	{
		$user = $this->ion_auth->user()->row();		
		$listKlinik = ['ALL'=>'Semua Klinik'];
		$klinik = $this->Klinik_model->getByIdentityOwner($user->email);

		foreach($klinik as $row){
			$listKlinik[$row->id] = $row->nama_klinik;
		}								
		$data['listKlinik'] = $listKlinik;

		if((!$this->ion_auth->is_admin()) && (!$this->ion_auth->in_group('owner')))		
		{
			// redirect them to the home page because they must be an administrator to view this
			show_error('You must be an super administrator to view this page.');
		}				

        $this->load->css('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css');        
        $this->load->css('https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jqvmap.min.css');
        $this->load->css('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css');         
        $this->load->css('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');                 

        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js');
        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jquery.vmap.min.js');        		        
        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/maps/jquery.vmap.usa.js');        		                
        $this->load->js('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js');        		                                        
        $this->load->js('assets/themes/adminLTE/plugins/sparklines/sparkline.js');        		                                                             
        $this->load->js('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js');        
		$this->load->js('assets/themes/adminLTE/dist/js/pages/d4.20220521.js');				                

        $data['page_title'] = "";
        $data['page_menu'] = "D4";                                
		$data['wizard_index'] = 0;
		$id_klinik = 1;		
		$data['Pengumuman'] = $this->Pengumuman_model->getByKlinik($id_klinik);		
		$data['TanggalDashboard'] = date("Y-m-d");
	
		$this->load->view('dashboard/index4', $data);
    }	
	
    public function getMonthlyOmzet(){
		$this->output->unset_template();		
		$user = $this->ion_auth->user()->row();				
		if(! $this->ion_auth->in_group('owner'))		
		{
			$id_klinik = $user->id_klinik;				
		}
		else{
			$id_klinik = $this->input->get('id_klinik', true);				
		}		
		$dateDashboard = $this->input->get('date', true);

		$data['MonthlyOmzet'] = $this->Dashboard_model->getMonthlyOmzet($id_klinik, $dateDashboard);											
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($data);		
	}
	
    public function getYearlyOmzet(){
		$this->output->unset_template();		
		$user = $this->ion_auth->user()->row();				
		if(! $this->ion_auth->in_group('owner'))		
		{
			$id_klinik = $user->id_klinik;				
		}
		else{
			$id_klinik = $this->input->get('id_klinik', true);				
		}	
		$dateDashboard = $this->input->get('date', true);

		$data['YearlyOmzet'] = $this->Dashboard_model->getYearlyOmzet($id_klinik, $dateDashboard);											
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($data);		
	}	
	
	public function savePengumuman(){
        $this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
        $id_klinik = 1;
		$user = $this->ion_auth->user()->row();				                

        $data = array(
			'id' => $postData->id,
            'judul' => $postData->judul,
			'isi' => $postData->isi,   
			'id_klinik' => $id_klinik,
            'modified_by' => $user->id                   
		);

        $result = $this->Pengumuman_model->save($data);                
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);        
	}
	
    public function deletePengumuman(){
        $this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
        $id_klinik = 1;
		$user = $this->ion_auth->user()->row();				                
        $id = $postData->id;

        $response = array();
        $this->db->trans_start();
            $this->Pengumuman_model->delete($id, $user->id);                
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
            $response = array('status' => false, 'message' => $this->db->error());
        else
            $response = array('status' => true, 'data' => $id);        

		//add the header here
		header('Content-Type: application/json');
		echo json_encode($response);        
	}    
	
	public function getDashboardData(){
		$this->output->unset_template();
		$dateDashboard = $this->input->get('date', true);				
		$user = $this->ion_auth->user()->row();				
		if(! $this->ion_auth->in_group('owner'))		
		{
			$id_klinik = $user->id_klinik;				
		}
		else{
			$id_klinik = $this->input->get('id_klinik', true);				
		}	
		$data['TodayTransaction'] = $this->Dashboard_model->getTodayTransaction($id_klinik, $dateDashboard)->total_transaction;	
		$data['TodayVisitor'] = $this->Dashboard_model->getTodayVisitor($id_klinik, $dateDashboard)->total_visit;	
		$data['TodayOmzet'] = $this->Dashboard_model->getTodayOmzet($id_klinik, $dateDashboard)->omzet ?? 0;	
		$data['TodayOmzetDetail'] = $this->Dashboard_model->getTodayOmzetDetail($id_klinik, $dateDashboard);
		$data['TodayPasien'] = $this->Dashboard_model->getTodayPasien($id_klinik, $dateDashboard)->new_pasien;		
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($data);        							
	}

}
