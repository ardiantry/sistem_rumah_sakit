<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */

class MasterData extends CI_Controller
{

	function __construct()
	{
        parent::__construct();
        $this->load->model('Agama_model');        
		$this->load->model('GolonganDarah_model');                
        $this->load->model('Pekerjaan_model');
        $this->load->model('TipePasien_model');        
		$this->load->model('CaraBayar_model');                
        $this->load->model('Akun_model');                		
        $this->load->model('UnitLayanan_model');
        $this->load->model('Dokter_model');                        
		$this->load->model('Layanan_model');               
		$this->load->model('Obat_model');               		
        $this->load->model('Supplier_model');               	
        $this->load->model('Petugas_model');               	
        $this->load->model('Kelas_model');               	
        $this->load->model('Ruangan_model');               	
        $this->load->model('Bed_model');               	
        $this->load->model('LaboratoryType_model');               	
        $this->load->model('RadiologyType_model');               	
		
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
        $this->load->css('https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.12/css/dataTables.checkboxes.css');              
                  
		$this->load->css('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.css');
		$this->load->css('assets/themes/adminLTE/dist/css/wizard.css');

		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/moment.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js');
		$this->load->js('https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js');
		$this->load->js('https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js');
        $this->load->js('https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.12/js/dataTables.checkboxes.min.js');                                                
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js');
		$this->load->js('https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.0/dist/latest/bootstrap-autocomplete.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js');		
		$this->load->js('https://cdn.jsdelivr.net/npm/sweetalert2@9');				
        $this->load->js('assets/js/helper.20211205.js');
		$this->load->js('assets/js/master.data.20211205.js'); 
		$this->load->js('assets/js/master_data/unit-layanan.js'); 		
		$this->load->js('assets/js/master_data/dokter.js'); 		
		$this->load->js('assets/js/master_data/petugas.js'); 		
		$this->load->js('assets/js/master_data/tipe-pasien.js'); 				
		$this->load->js('assets/js/master_data/kelas.js'); 				
		$this->load->js('assets/js/master_data/lab_rad.js'); 				
    }

	public function index()
	{      
		$data['page_title'] = "Master Data";
		$this->load->view('master_data/master_data', $data);
	}

	public function agama()
	{
        $data['page_title'] = "Master Data";
        $data['page_menu'] = "MasterData";        
        $data['agama'] = $this->Agama_model->get();   
        $data['secondaryMenu'] = (object)array("is_active" => "pendaftaran");    
		$this->load->view('master_data/agama', $data);
	}

	public function golongan_darah()
	{
        $data['page_title'] = "Master Data";
        $data['page_menu'] = "MasterData";                
        $data['golonganDarah'] = $this->GolonganDarah_model->get();                
        $data['secondaryMenu'] = (object)array("is_active" => "pendaftaran");             
		$this->load->view('master_data/golongan_darah', $data);
	}

	public function pekerjaan()
	{
        $data['page_title'] = "Master Data";
        $data['page_menu'] = "MasterData";                
        $data['secondaryMenu'] = (object)array("is_active" => "pendaftaran");              
		$this->load->view('master_data/pekerjaan', $data);
    }
    
	public function tipe_pasien()
	{
        $data['page_title'] = "Master Data";
        $data['page_menu'] = "MasterData";                
        $data['secondaryMenu'] =(object)array("is_active" => "pendaftaran");                   
		$this->load->view('master_data/tipe_pasien', $data);
	}    
    
	public function unit_layanan()
	{
        $data['page_title'] = "Master Data";
        $data['page_menu'] = "MasterData";                
        $data['secondaryMenu'] = (object)array("is_active" => "unit_layanan");                      
		$this->load->view('master_data/unit_layanan', $data);
    }
    
	public function dokter()
	{
        $data['page_title'] = "Master Data";
        $data['page_menu'] = "MasterData";                
        $data['secondaryMenu'] = (object)array("is_active" => "unit_layanan");                      
		$this->load->view('master_data/dokter', $data);
    }   

	public function petugas()
	{
        $data['page_title'] = "Master Data";
        $data['page_menu'] = "MasterData";                
        $data['secondaryMenu'] = (object)array("is_active" => "unit_layanan");                      
		$this->load->view('master_data/petugas', $data);
    }   
    
	public function layanan()
	{
        $data['page_title'] = "Master Data";
        $data['page_menu'] = "MasterData";                
        $data['secondaryMenu'] = (object)array("is_active" => "unit_layanan");                     
		$this->load->view('master_data/layanan', $data);
    }
    
	public function unit_layanan_detail($id)
	{
        $unitLayanan = $this->UnitLayanan_model->getById($id);
        $registerDokter = $this->UnitLayanan_model->getRegisterDokterById($id);
        $registerLayanan = $this->UnitLayanan_model->getRegisterLayananById($id);                

        $data['unit_layanan'] = $unitLayanan;
        $data['register_dokter'] = $registerDokter;
        $data['register_layanan'] = $registerLayanan;

        $data['page_title'] = "Master Data";
        $data['page_menu'] = "MasterData";                
        $data['secondaryMenu'] = (object)array("is_active" => "unit_layanan");                    
		$this->load->view('master_data/unit_layanan_detail', $data);
    }    
    
	public function laboratory()
	{
		$user = $this->ion_auth->user()->row();		
        $data['page_title'] = "Master Data";
        $data['page_menu'] = "MasterData";                
        $data['secondaryMenu'] = (object)array("is_active" => "unit_layanan");                     
		$this->load->view('master_data/laboratory', $data);
	}

	public function radiology()
	{
		$user = $this->ion_auth->user()->row();		
        $data['page_title'] = "Master Data";
        $data['page_menu'] = "MasterData";                
        $data['secondaryMenu'] = (object)array("is_active" => "unit_layanan");                     
		$this->load->view('master_data/radiology', $data);
	}	

	public function cara_bayar()
	{
        $data['page_title'] = "Master Data";
        $data['page_menu'] = "MasterData";                
        $data['secondaryMenu'] = (object)array("is_active" => "pembayaran");                     
		$this->load->view('master_data/cara_bayar', $data);
	}    
	
	public function jenis_obat()
	{
        $data['page_title'] = "Master Data";
        $data['page_menu'] = "MasterData";        
        $data['secondaryMenu'] = (object)array("is_active" => "apotek");  
		$this->load->view('master_data/jenis_obat', $data);
    } 	

	public function satuan()
	{
        $data['page_title'] = "Master Data";
        $data['page_menu'] = "MasterData";        
        $data['secondaryMenu'] = (object)array("is_active" => "apotek");  
		$this->load->view('master_data/satuan', $data);
    } 	

	public function spesifikasi()
	{
        $data['page_title'] = "Master Data";
        $data['page_menu'] = "MasterData";        
        $data['secondaryMenu'] = (object)array("is_active" => "apotek");  
		$this->load->view('master_data/spesifikasi', $data);
	} 	
	
	public function jenis_racikan()
	{
        $data['page_title'] = "Master Data";
        $data['page_menu'] = "MasterData";        
        $data['secondaryMenu'] = (object)array("is_active" => "apotek");  
		$this->load->view('master_data/jenis_racikan', $data);
    } 		

	public function supplier()
	{
        $data['page_title'] = "Master Data";
        $data['page_menu'] = "MasterData";        
        $data['secondaryMenu'] = (object)array("is_active" => "apotek");  
		$this->load->view('master_data/supplier', $data);
    } 	

	public function kelas()
	{
        $data['page_title'] = "Master Data";
        $data['page_menu'] = "MasterData";                
        $data['secondaryMenu'] = (object)array("is_active" => "rawat_inap");                     
		$this->load->view('master_data/kelas', $data);
	}   

	public function ruangan()
	{
		$user = $this->ion_auth->user()->row();		
        $data['page_title'] = "Master Data";
        $data['page_menu'] = "MasterData";                
        $data['secondaryMenu'] = (object)array("is_active" => "rawat_inap");                     
		$data['kelas'] = $this->Kelas_model->getByKlinik($user->id_klinik);
		$this->load->view('master_data/ruangan', $data);
	}  

	public function bed()
	{
		$user = $this->ion_auth->user()->row();		
        $data['page_title'] = "Master Data";
        $data['page_menu'] = "MasterData";                
        $data['secondaryMenu'] = (object)array("is_active" => "rawat_inap");                     
		$data['kelas'] = $this->Kelas_model->getByKlinik($user->id_klinik);
		$data['ruangan'] = $this->Ruangan_model->getByKlinik($user->id_klinik);
		$this->load->view('master_data/bed', $data);
	}	

	public function getLabDatatable()
	{
		$this->output->unset_template();
		$result = $this->LaboratoryType_model->getByKlinik($this->ion_auth->user()->row()->id_klinik);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('data' => $result));
    } 	

	function saveLab()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
		$data = array(
			'id' => $postData->id,
			'laboratory_type_code' => $postData->kode_lab,
			'laboratory_type_desc' => $postData->nama_lab,
			'price' => $postData->tarif,
			'id_klinik' => $this->ion_auth->user()->row()->id_klinik
        );        
		$result = $this->LaboratoryType_model->save($data);        
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
    } 	

	function deleteLab()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
		$id = $postData->id;
		$result = $this->LaboratoryType_model->delete($id);        
		//add the header here
        header('Content-Type: application/json');
        if($result > 0)
            echo json_encode(array('status' => true, 'data' => $result));
        else
            echo json_encode(array('status' => false, 'message' => 'gagal'));        
    }

	public function getRadDatatable()
	{
		$this->output->unset_template();
		$result = $this->RadiologyType_model->getByKlinik($this->ion_auth->user()->row()->id_klinik);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('data' => $result));
    } 	

	function saveRad()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
		$data = array(
			'id' => $postData->id,
			'radiology_type_code' => $postData->kode_rad,
			'radiology_type_desc' => $postData->nama_rad,
			'price' => $postData->tarif,
			'id_klinik' => $this->ion_auth->user()->row()->id_klinik
        );        
		$result = $this->RadiologyType_model->save($data);        
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
    } 	

	function deleteRad()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
		$id = $postData->id;
		$result = $this->RadiologyType_model->delete($id);        
		//add the header here
        header('Content-Type: application/json');
        if($result > 0)
            echo json_encode(array('status' => true, 'data' => $result));
        else
            echo json_encode(array('status' => false, 'message' => 'gagal'));        
    }

	public function getKelasDatatable()
	{
		$this->output->unset_template();
		$result = $this->Kelas_model->getByKlinik($this->ion_auth->user()->row()->id_klinik);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('data' => $result));
    }   

	function saveKelas()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
		$data = array(
			'id' => $postData->id,
			'nama_kelas' => $postData->nama_kelas,
			'id_klinik' => $this->ion_auth->user()->row()->id_klinik
        );        
		$result = $this->Kelas_model->save($data);        
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
    } 

	function deleteKelas()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
		$id = $postData->id;
		$result = $this->Kelas_model->delete($id);        
		//add the header here
        header('Content-Type: application/json');
        if($result > 0)
            echo json_encode(array('status' => true, 'data' => $result));
        else
            echo json_encode(array('status' => false, 'message' => 'gagal'));        
    }

	public function getRuanganDatatable()
	{
		$this->output->unset_template();
		$result = $this->Ruangan_model->getByKlinik($this->ion_auth->user()->row()->id_klinik);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('data' => $result));
    }  

	public function getRuanganByKelas()
	{
		$this->output->unset_template();
		$id = $this->input->get('id');		
		$result = $this->Ruangan_model->getByKelas($id);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('data' => $result));
    } 

	function saveRuangan()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
		$data = array(
			'id' => $postData->id,
			'nama_ruangan' => $postData->nama_ruangan,
			'id_kelas' => $postData->id_kelas
        );        
		$result = $this->Ruangan_model->save($data);        
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
    } 

	function deleteRuangan()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
		$id = $postData->id;
		$result = $this->Ruangan_model->delete($id);        
		//add the header here
        header('Content-Type: application/json');
        if($result > 0)
            echo json_encode(array('status' => true, 'data' => $result));
        else
            echo json_encode(array('status' => false, 'message' => 'gagal'));        
    }

	public function getBedDatatable()
	{
		$this->output->unset_template();
		$result = $this->Bed_model->getByKlinik($this->ion_auth->user()->row()->id_klinik);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('data' => $result));
    } 

	function saveBed()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
		$data = array(
			'id' => $postData->id,
			'nama_bed' => $postData->nama_bed,
			'tarif' => $postData->tarif,
			'id_ruangan' => $postData->id_ruangan
        );        
		$result = $this->Bed_model->save($data);        
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
    } 

	function deleteBed()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
		$id = $postData->id;
		$result = $this->Bed_model->delete($id);        
		//add the header here
        header('Content-Type: application/json');
        if($result > 0)
            echo json_encode(array('status' => true, 'data' => $result));
        else
            echo json_encode(array('status' => false, 'message' => 'gagal'));        
    }

	public function getPekerjaanDatatable()
	{
		$this->output->unset_template();
		$result = $this->Pekerjaan_model->getByKlinik($this->ion_auth->user()->row()->id_klinik);

		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('data' => $result));
	}

	function savePekerjaan()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
		$user = $this->ion_auth->user()->row();				
		$data = array(
			'id' => $postData->id,
			'pekerjaan' => $postData->pekerjaan,
			'id_klinik' => $user->id_klinik,
			'modified_by' => $user->id

        );        
		$result = $this->Pekerjaan_model->save($data);        
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
    }
    
	function deletePekerjaan()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
		$id = $postData->id;
		$user = $this->ion_auth->user()->row();		
		$result = $this->Pekerjaan_model->delete($id, $user->id);        

		//add the header here
        header('Content-Type: application/json');
        if($result > 0)
            echo json_encode(array('status' => true, 'data' => $result));
        else
            echo json_encode(array('status' => false, 'message' => 'gagal'));        
    }    
    
	public function getTipePasienDatatable()
	{
		$this->output->unset_template();
		$result = $this->TipePasien_model->getByKlinik($this->ion_auth->user()->row()->id_klinik);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('data' => $result));
    }    
    
	function saveTipePasien()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
		$data = array(
			'id' => $postData->id,
			'tipe_pasien' => $postData->tipe_pasien,
			'id_klinik' => $this->ion_auth->user()->row()->id_klinik
        );        
		$result = $this->TipePasien_model->save($data);        
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
    }    


	function deleteTipePasien()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
		$id = $postData->id;
		$result = $this->TipePasien_model->delete($id);        
		//add the header here
        header('Content-Type: application/json');
        if($result > 0)
            echo json_encode(array('status' => true, 'data' => $result));
        else
            echo json_encode(array('status' => false, 'message' => 'gagal'));        
    }

	public function getCaraBayarDatatable()
	{
		$this->output->unset_template();
		$result = $this->CaraBayar_model->getByKlinik($this->ion_auth->user()->row()->id_klinik);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('data' => $result));
    }    
    
	function saveCaraBayar()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
		$data = array(
			'id' => $postData->id,
			'cara_bayar' => $postData->cara_bayar,
			'id_akun' => $postData->id_akun,
			'id_klinik' => $this->ion_auth->user()->row()->id_klinik
        );        
		$result = $this->CaraBayar_model->save($data);        
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
    }    


	function deleteCaraBayar()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
		$id = $postData->id;
		$result = $this->CaraBayar_model->delete($id);        
		//add the header here
        header('Content-Type: application/json');
        if($result > 0)
            echo json_encode(array('status' => true, 'data' => $result));
        else
            echo json_encode(array('status' => false, 'message' => 'gagal'));        
    }    
    
	public function getUnitLayananDatatable()
	{
		$this->output->unset_template();
		$result = $this->UnitLayanan_model->getByKlinik($this->ion_auth->user()->row()->id_klinik);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('data' => $result));
    }    
    
	function saveUnitLayanan()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
		$data = array(
			'id' => $postData->id,
			'nama_unit_layanan' => $postData->nama_unit_layanan,
			'id_klinik' => $this->ion_auth->user()->row()->id_klinik
        );        
		$result = $this->UnitLayanan_model->save($data);        
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
    }    

	function updateUnitLayananIHS()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
		$data = array(
			'id' => $postData->id,
			'ihs_location' => $postData->ihs_location
        );        
		$result = $this->UnitLayanan_model->save($data);        
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
    }  	


	function deleteUnitLayanan()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
		$id = $postData->id;
		$result = $this->UnitLayanan_model->delete($id);        
		//add the header here
        header('Content-Type: application/json');
        if($result > 0)
            echo json_encode(array('status' => true, 'data' => $result));
        else
            echo json_encode(array('status' => false, 'message' => 'gagal'));        
    }    

	public function getDokterDatatable()
	{
		$this->output->unset_template();
		$result = $this->Dokter_model->getByKlinik($this->ion_auth->user()->row()->id_klinik);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('data' => $result));
    }    

	public function getPetugasDatatable()
	{
		$this->output->unset_template();
		$result = $this->Petugas_model->getByKlinik($this->ion_auth->user()->row()->id_klinik);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('data' => $result));
    }   
    
	function saveDokter()
	{
		$this->output->unset_template();
		$user = $this->ion_auth->user()->row();				        		
        $id_klinik = $user->id_klinik;
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        

		$data = array(
			'id' => $postData->id,
            'nama_dokter' => $postData->nama_dokter,
            'nip' => $postData->nip,
            'sip' => $postData->sip,
            'gelar_depan' => $postData->gelar_depan,
            'gelar_belakang' => $postData->gelar_belakang,
            'dokter_ahli' => $postData->dokter_ahli,                                                            
            'alamat' => $postData->alamat,
            'no_telp' => $postData->no_telp,
            'email' => $postData->email,  
            'ktp' => $postData->ktp,  
            'ihs_id' => ($postData->ihs_id == '') ? null : $postData->ihs_id,  
            'kdDokter' => ($postData->kdDokter == '') ? null : $postData->kdDokter,  
			'id_klinik' => $id_klinik,
			'modified_by' => $user->id		
        );        
		$result = $this->Dokter_model->save($data);        
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
    }    

	function savePetugas()
	{
		$this->output->unset_template();
		$user = $this->ion_auth->user()->row();				        		
        $id_klinik = $user->id_klinik;
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        

		$data = array(
			'id' => $postData->id,
            'nama_petugas' => $postData->nama_petugas,
            'alamat' => $postData->alamat,
            'no_telp' => $postData->no_telp,
            'email' => $postData->email,  
            'ktp' => $postData->ktp,  
			'id_klinik' => $id_klinik,
			'modified_by' => $user->id		
        );        
		$result = $this->Petugas_model->save($data);        
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
    }    

	function deletePetugas()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
		$id = $postData->id;
		$result = $this->Petugas_model->delete($id);        
		//add the header here
        header('Content-Type: application/json');
        if($result > 0)
            echo json_encode(array('status' => true, 'data' => $result));
        else
            echo json_encode(array('status' => false, 'message' => 'gagal'));        
    } 

	function deleteDokter()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
		$id = $postData->id;
		$result = $this->Dokter_model->delete($id);        
		//add the header here
        header('Content-Type: application/json');
        if($result > 0)
            echo json_encode(array('status' => true, 'data' => $result));
        else
            echo json_encode(array('status' => false, 'message' => 'gagal'));        
    } 

	public function getLayananDatatable()
	{
		$this->output->unset_template();
		$result = $this->Layanan_model->getByKlinik($this->ion_auth->user()->row()->id_klinik);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('data' => $result));
    }    
    
	function saveLayanan()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        

		$data = array(
			'id' => $postData->id,
            'nama_layanan' => $postData->nama_layanan,
            'harga_layanan' => $postData->harga_layanan,
			'id_klinik' => $this->ion_auth->user()->row()->id_klinik
        );        
		$result = $this->Layanan_model->save($data);        
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
    }    


	function deleteLayanan()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
		$id = $postData->id;
		$result = $this->Layanan_model->delete($id);        
		//add the header here
        header('Content-Type: application/json');
        if($result > 0)
            echo json_encode(array('status' => true, 'data' => $result));
        else
            echo json_encode(array('status' => false, 'message' => 'gagal'));        
    }     

	public function getRegisterDokterDatatable()
	{
        $this->output->unset_template();
		$id = $this->input->input_stream('id', TRUE);        
        $registerDokter = $this->UnitLayanan_model->getRegisterDokterById($id);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('data' => $registerDokter));
    }
    
	public function getRegisterLayananDatatable()
	{
        $this->output->unset_template();
		$id = $this->input->input_stream('id', TRUE);        
        $registerLayanan = $this->UnitLayanan_model->getRegisterLayananById($id);                
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('data' => $registerLayanan));
    }
    
	public function getIntersecRegisterDokterDatatable()
	{
        $this->output->unset_template();
        $idUnitLayanan = $this->input->post('id_unit_layanan', TRUE);                               
        $where = "id NOT IN (SELECT id_dokter FROM dokter_unit_layanan WHERE id_unit_layanan = ".$idUnitLayanan.") AND id_klinik = " . $this->ion_auth->user()->row()->id_klinik;
        $result = $this->UnitLayanan_model->getRegisterDokterByIdDataTable($this->input->post(), $where);
		header('Content-Type: application/json');
		echo json_encode($result);
    }   

	public function saveRegisterDokter()
	{
        $this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);        
        $this->UnitLayanan_model->saveBatchRegisterDokter($postData);                
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => NULL));        
    }

	function deleteRegisterDokter()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
		$id = $postData->id;
		$result = $this->UnitLayanan_model->deleteRegisterDokter($id);        
		//add the header here
        header('Content-Type: application/json');
        if($result > 0)
            echo json_encode(array('status' => true, 'data' => $result));
        else
            echo json_encode(array('status' => false, 'message' => 'gagal'));        
    }    

	public function getIntersecRegisterLayananDatatable()
	{
        $this->output->unset_template();
        $idUnitLayanan = $this->input->post('id_unit_layanan', TRUE);                               
        $where = "id NOT IN (SELECT id_layanan FROM register_layanan WHERE id_unit_layanan = ".$idUnitLayanan.") AND id_klinik = " . $this->ion_auth->user()->row()->id_klinik;
        $result = $this->UnitLayanan_model->getRegisterLayananByIdDataTable($this->input->post(), $where);
		header('Content-Type: application/json');
		echo json_encode($result);
    }       

	public function saveRegisterLayanan()
	{
        $this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);        
        $this->UnitLayanan_model->saveBatchRegisterLayanan($postData);                
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => NULL));        
    }

	function deleteRegisterLayanan()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
		$id = $postData->id;
		$result = $this->UnitLayanan_model->deleteRegisterLayanan($id);        
		//add the header here
        header('Content-Type: application/json');
        if($result > 0)
            echo json_encode(array('status' => true, 'data' => $result));
        else
            echo json_encode(array('status' => false, 'message' => 'gagal'));        
    }      

	public function getJenisObatDatatable()
	{
		$this->output->unset_template();
		$result = $this->Obat_model->getJenisObat();
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('data' => $result));
	}    
	
	public function getSatuanDatatable()
	{
		$this->output->unset_template();
		$result = $this->Obat_model->getSatuan();
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('data' => $result));
	} 	
	
	public function getSpesifikasiDatatable()
	{
		$this->output->unset_template();
		$result = $this->Obat_model->getSpesifikasi();
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('data' => $result));
	} 		
	
	public function getJenisRacikanDatatable()
	{
		$this->output->unset_template();
		$result = $this->Obat_model->getJenisRacikan();
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('data' => $result));
    } 	

	public function getSupplierDatatable()
	{
		$this->output->unset_template();
		$result = $this->Supplier_model->getByKlinik($this->ion_auth->user()->row()->id_klinik);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('data' => $result));
	} 
			
	public function saveSupplier()
	{
        $this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
		$user = $this->ion_auth->user()->row();				
		$data = array(
			'id' => $postData->id,
            'nama_supplier' => $postData->nama_supplier,
			'kode_supplier' => $postData->kode_supplier,
			'alamat' => $postData->alamat,
			'kota' => $postData->kota,						
			'contact_person' => $postData->contact_person,	
			'no_telp' => $postData->no_telp,												
			'no_fax' => $postData->no_fax,												
            'no_hp' => $postData->no_hp,																		
			'id_klinik' => $user->id_klinik,
			'modified_by' => $user->id			
        );

        $this->Supplier_model->save($data);                
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => NULL));        
	}
	
	function deleteSupplier()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
		$id = $postData->id;
		$result = $this->Supplier_model->delete($id);        
		//add the header here
        header('Content-Type: application/json');
        if($result > 0)
            echo json_encode(array('status' => true, 'data' => $result));
        else
            echo json_encode(array('status' => false, 'message' => 'gagal'));        
	}  
	
	public function getCaraBayarAjax()
	{
		$this->output->unset_template();

		$akun_options = $this->Akun_model->getAkunBayar();		
		$data['akun'] = $akun_options;

		//add the header here
		header('Content-Type: application/json');
		echo json_encode($data);
    }	
}
