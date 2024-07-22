<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class RawatInap extends MY_Controller
{
	protected $satuSehatService;

	function __construct()
	{
		parent::__construct();
		$this->load->model('Menu_model');       	
		$this->load->model('Pekerjaan_model');		
		
		$this->load->model('UnitLayanan_model');
		$this->load->model('Dokter_model');
		$this->load->model('TipePasien_model');
		$this->load->model('CaraBayar_model');		
		$this->load->model('Layanan_model');
		$this->load->model('Icd9_model');
		$this->load->model('Icd10_model');
		$this->load->model('Obat_model');
		$this->load->model('Klinik_model');					
		$this->load->model('Kelas_model');					
		$this->load->model('Ruangan_model');					
		$this->load->model('Bed_model');					

        $this->load->model('RegisterPasien_model');
        $this->load->model('RawatInap_model');
        $this->load->model('RawatInapLayanan_model');
        $this->load->model('RawatInapIcd9_model');
        $this->load->model('RawatInapIcd10_model');                        
		$this->load->model('RawatInapObat_model');                                        
		$this->load->model('RawatInapTambahan_model');										
		$this->load->model('RawatInapPembayaran_model');		
		$this->load->model('RawatInapRencanaKontrol_model');	
		$this->load->model('RawatInapObservasi_model');	
		$this->load->model('RawatInapPemeriksaanFisik_model');	
		$this->load->model('PemeriksaanFisikFile_model');					
		$this->load->model('Laboratory_model');	
		$this->load->model('Radiology_model');																					
		$this->load->model('LaboratoryType_model');							
		$this->load->model('RadiologyType_model');
		$this->_init();
	}

	private function _init()
	{		
		$data['menu'] = $this->Menu_model->get();	
		$this->load->section('sidebar', 'template/sidebar', $data);
		$this->output->set_template('adminLTE');
		$this->load->css('https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css');
		$this->load->css('https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css');
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

		$this->load->js('assets/js/helper.20211205.js');
		$this->load->js('assets/js/rawat_inap/common.js');
		$this->load->js('assets/js/rawat_inap/wizard.js');			
		$this->load->js('assets/js/rawat_inap/icd10.js');							
		$this->load->js('assets/js/rawat_inap/icd9.js');						
		$this->load->js('assets/js/rawat_inap/layanan.js');			
		$this->load->js('assets/js/rawat_inap/rencana.kontrol.js');																																									
		$this->load->js('assets/js/rawat_inap/laboratorium.js');																																									
		$this->load->js('assets/js/rawat_inap/radiologi.js');																																											
		$this->load->js('assets/js/rawat_inap/pemeriksaan.fisik.js');							
		$this->load->js('assets/js/rawat_inap/observasi.js');							
		$this->load->js('assets/js/rawat_inap/obat.js');									
		$this->load->js('assets/js/rawat_inap/patient.js');			
		$this->load->js('assets/js/rawat_inap/encounter.js');			
	}

	public function admisi()
	{		
		$user = $this->ion_auth->user()->row();		
		$data['pendaftaran_privilege'] = $this->Menu_model->getById(1)->privilege_status;				
		$data['pemeriksaan_privilege'] = $this->Menu_model->getById(2)->privilege_status;								
		$data['apotek_privilege'] = $this->Menu_model->getById(3)->privilege_status;										
		$data['pembayaran_privilege'] = $this->Menu_model->getById(4)->privilege_status;												
		$data['pemeriksaan_fisik_files'] = $this->PemeriksaanFisikFile_model->getAll();	
		$data['pekerjaan'] = $this->Pekerjaan_model->getByKlinik($user->id_klinik);				
		$data['unit_layanan'] = $this->UnitLayanan_model->getByKlinikSelect($user->id_klinik);
		$data['tipe_pasien'] = $this->TipePasien_model->getByKlinik($user->id_klinik);
		$data['cara_bayar'] = $this->CaraBayar_model->getByKlinik($user->id_klinik);
		$data['lab_type'] = $this->LaboratoryType_model->getByKlinik($user->id_klinik);
		$data['rad_type'] = $this->RadiologyType_model->getByKlinik($user->id_klinik);
		$data['kelas'] = $this->Kelas_model->getByKlinik($user->id_klinik);

		$content['page_title'] = "Pemeriksaan Rawat Inap";
        $content['page_menu'] = "RI_Admisi";                        		
		$content['wizard_index'] = 0;
		$content['step1'] = $this->load->view('rawat_inap/content/step1', $data, TRUE);		
		$content['step2'] = $this->load->view('rawat_inap/content/step2', $data, TRUE);			
		$content['step3'] = $this->load->view('rawat_inap/content/step3', $data, TRUE);	
		$content['step4'] = $this->load->view('rawat_inap/content/step4', $data, TRUE);		
		$content['modal_registrasi'] = $this->load->view('rawat_inap/content/modal-registrasi', null, TRUE);								
		$content['modal_layanan'] = $this->load->view('rawat_inap/content/modal-layanan', null, TRUE);	
		$content['modal_icd10'] = $this->load->view('rawat_inap/content/modal-icd10', null, TRUE);																																				
		$content['modal_icd9'] = $this->load->view('rawat_inap/content/modal-icd9', null, TRUE);																																				
		$content['modal_pemeriksaan_fisik'] = $this->load->view('rawat_inap/content/modal-pemeriksaan-fisik', $data['pemeriksaan_fisik_files'], TRUE);																																						
		$content['modal_obat'] = $this->load->view('rawat_inap/content/modal-obat', null, TRUE);																																						
		$content['modal_riwayat'] = $this->load->view('rawat_inap/content/modal-riwayat', null, TRUE);																																						
		$this->load->view('rawat_inap/rawat_inap', $content);		
	}	

	public function observasi() 
	{
		$user = $this->ion_auth->user()->row();		
		$data['pendaftaran_privilege'] = $this->Menu_model->getById(1)->privilege_status;				
		$data['pemeriksaan_privilege'] = $this->Menu_model->getById(2)->privilege_status;								
		$data['apotek_privilege'] = $this->Menu_model->getById(3)->privilege_status;										
		$data['pembayaran_privilege'] = $this->Menu_model->getById(4)->privilege_status;												
		$data['pemeriksaan_fisik_files'] = $this->PemeriksaanFisikFile_model->getAll();	
		$data['pekerjaan'] = $this->Pekerjaan_model->getByKlinik($user->id_klinik);				
		$data['unit_layanan'] = $this->UnitLayanan_model->getByKlinikSelect($user->id_klinik);
		$data['tipe_pasien'] = $this->TipePasien_model->getByKlinik($user->id_klinik);
		$data['cara_bayar'] = $this->CaraBayar_model->getByKlinik($user->id_klinik);
		$data['lab_type'] = $this->LaboratoryType_model->getByKlinik($user->id_klinik);
		$data['rad_type'] = $this->RadiologyType_model->getByKlinik($user->id_klinik);
		$data['kelas'] = $this->Kelas_model->getByKlinik($user->id_klinik);

		$data['page_title'] = "Pemeriksaan Rawat Inap";
        $data['page_menu'] = "RI_Observation";                        							
		$data['wizard_index'] = 1;
		$content['step1'] = $this->load->view('rawat_inap/content/step1', $data, TRUE);		
		$content['step2'] = $this->load->view('rawat_inap/content/step2', $data, TRUE);			
		$content['step3'] = $this->load->view('rawat_inap/content/step3', $data, TRUE);	
		$content['step4'] = $this->load->view('rawat_inap/content/step4', $data, TRUE);	
		$content['modal_registrasi'] = $this->load->view('rawat_inap/content/modal-registrasi', null, TRUE);								
		$content['modal_layanan'] = $this->load->view('rawat_inap/content/modal-layanan', null, TRUE);	
		$content['modal_icd10'] = $this->load->view('rawat_inap/content/modal-icd10', null, TRUE);																																				
		$content['modal_icd9'] = $this->load->view('rawat_inap/content/modal-icd9', null, TRUE);																																				
		$content['modal_pemeriksaan_fisik'] = $this->load->view('rawat_inap/content/modal-pemeriksaan-fisik', $data['pemeriksaan_fisik_files'], TRUE);																																				
		$content['modal_obat'] = $this->load->view('rawat_inap/content/modal-obat', null, TRUE);																																											
		$content['modal_riwayat'] = $this->load->view('rawat_inap/content/modal-riwayat', null, TRUE);		
		$this->load->view('rawat_inap/rawat_inap', $content);		
	}	

	public function apotek()
	{
		$user = $this->ion_auth->user()->row();		
		$data['pendaftaran_privilege'] = $this->Menu_model->getById(1)->privilege_status;				
		$data['pemeriksaan_privilege'] = $this->Menu_model->getById(2)->privilege_status;								
		$data['apotek_privilege'] = $this->Menu_model->getById(3)->privilege_status;										
		$data['pembayaran_privilege'] = $this->Menu_model->getById(4)->privilege_status;												
		$data['pemeriksaan_fisik_files'] = $this->PemeriksaanFisikFile_model->getAll();	
		$data['pekerjaan'] = $this->Pekerjaan_model->getByKlinik($user->id_klinik);				
		$data['unit_layanan'] = $this->UnitLayanan_model->getByKlinikSelect($user->id_klinik);
		$data['tipe_pasien'] = $this->TipePasien_model->getByKlinik($user->id_klinik);
		$data['cara_bayar'] = $this->CaraBayar_model->getByKlinik($user->id_klinik);
		$data['lab_type'] = $this->LaboratoryType_model->getByKlinik($user->id_klinik);
		$data['rad_type'] = $this->RadiologyType_model->getByKlinik($user->id_klinik);
		$data['kelas'] = $this->Kelas_model->getByKlinik($user->id_klinik);

		$data['page_title'] = "Pemeriksaan Rawat Inap";
        $data['page_menu'] = "RI_Apotek";                        							
		$data['wizard_index'] = 2;
		$content['step1'] = $this->load->view('rawat_inap/content/step1', $data, TRUE);		
		$content['step2'] = $this->load->view('rawat_inap/content/step2', $data, TRUE);			
		$content['step3'] = $this->load->view('rawat_inap/content/step3', $data, TRUE);	
		$content['step4'] = $this->load->view('rawat_inap/content/step4', $data, TRUE);	
		$content['modal_registrasi'] = $this->load->view('rawat_inap/content/modal-registrasi', null, TRUE);								
		$content['modal_layanan'] = $this->load->view('rawat_inap/content/modal-layanan', null, TRUE);	
		$content['modal_icd10'] = $this->load->view('rawat_inap/content/modal-icd10', null, TRUE);																																				
		$content['modal_icd9'] = $this->load->view('rawat_inap/content/modal-icd9', null, TRUE);																																				
		$content['modal_pemeriksaan_fisik'] = $this->load->view('rawat_inap/content/modal-pemeriksaan-fisik', $data['pemeriksaan_fisik_files'], TRUE);																																				
		$content['modal_obat'] = $this->load->view('rawat_inap/content/modal-obat', null, TRUE);		
		$content['modal_riwayat'] = $this->load->view('rawat_inap/content/modal-riwayat', null, TRUE);		
		$this->load->view('rawat_inap/rawat_inap', $content);		
	}		

	public function pembayaran()
	{
		$user = $this->ion_auth->user()->row();		
		$data['pendaftaran_privilege'] = $this->Menu_model->getById(1)->privilege_status;				
		$data['pemeriksaan_privilege'] = $this->Menu_model->getById(2)->privilege_status;								
		$data['apotek_privilege'] = $this->Menu_model->getById(3)->privilege_status;										
		$data['pembayaran_privilege'] = $this->Menu_model->getById(4)->privilege_status;												
		$data['pemeriksaan_fisik_files'] = $this->PemeriksaanFisikFile_model->getAll();	
		$data['pekerjaan'] = $this->Pekerjaan_model->getByKlinik($user->id_klinik);				
		$data['unit_layanan'] = $this->UnitLayanan_model->getByKlinikSelect($user->id_klinik);
		$data['tipe_pasien'] = $this->TipePasien_model->getByKlinik($user->id_klinik);
		$data['cara_bayar'] = $this->CaraBayar_model->getByKlinik($user->id_klinik);
		$data['lab_type'] = $this->LaboratoryType_model->getByKlinik($user->id_klinik);
		$data['rad_type'] = $this->RadiologyType_model->getByKlinik($user->id_klinik);
		$data['kelas'] = $this->Kelas_model->getByKlinik($user->id_klinik);

		$data['page_title'] = "Pemeriksaan Rawat Inap";
        $data['page_menu'] = "RI_Pembayaran";                        							
		$data['wizard_index'] = 3;
		$content['step1'] = $this->load->view('rawat_inap/content/step1', $data, TRUE);		
		$content['step2'] = $this->load->view('rawat_inap/content/step2', $data, TRUE);			
		$content['step3'] = $this->load->view('rawat_inap/content/step3', $data, TRUE);	
		$content['step4'] = $this->load->view('rawat_inap/content/step4', $data, TRUE);	
		$content['modal_registrasi'] = $this->load->view('rawat_inap/content/modal-registrasi', null, TRUE);								
		$content['modal_layanan'] = $this->load->view('rawat_inap/content/modal-layanan', null, TRUE);	
		$content['modal_icd10'] = $this->load->view('rawat_inap/content/modal-icd10', null, TRUE);																																				
		$content['modal_icd9'] = $this->load->view('rawat_inap/content/modal-icd9', null, TRUE);																																				
		$content['modal_pemeriksaan_fisik'] = $this->load->view('rawat_inap/content/modal-pemeriksaan-fisik', $data['pemeriksaan_fisik_files'], TRUE);																																				
		$content['modal_obat'] = $this->load->view('rawat_inap/content/modal-obat', null, TRUE);		
		$content['modal_riwayat'] = $this->load->view('rawat_inap/content/modal-riwayat', null, TRUE);			
		$this->load->view('rawat_inap/rawat_inap', $content);		
	}

	function getDatatableUmum()
	{
		$this->output->unset_template();
		$user = $this->ion_auth->user()->row();
		$state_index = $this->input->post('state_index');
        $where = "id_klinik={$user->id_klinik} AND is_deleted=0 AND (state_index BETWEEN {$state_index} AND 3)";	        
		$result = $this->RawatInap_model->getDataTable($this->input->post(), $where);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
	} 	


	public function getRegisterLayanan()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$register_pasien_layanan = $this->RawatInapLayanan_model->getByRegisterId($postData->id);
		$data = array();
		foreach ($register_pasien_layanan as $rows) {
			$data[] = array(
				'id' => $rows->id_layanan,
				'nama' => $rows->nama_layanan,				
				'harga' => $rows->harga_layanan,
				'jumlah' => $rows->jumlah,				
			);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => $data));
    }   

	public function getRegisterIcd9()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$register_pasien_icd9 = $this->RawatInapIcd9_model->getByRegisterId($postData->id);
		$data = array();
		foreach ($register_pasien_icd9 as $rows) {
			$data[] = array(
				'id' => $rows->id_icd9,
				'nama' => $rows->icd9_name,				
				'jumlah' => $rows->jumlah
			);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => $data));
    }   

	public function getRegisterIcd10()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$register_pasien_icd10 = $this->RawatInapIcd10_model->getByRegisterId($postData->id);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => $register_pasien_icd10));
	}	

	public function getRegisterPemeriksaanFisik()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$register_pasien_pemeriksaan = $this->RawatInapPemeriksaanFisik_model->getByRegisterId($postData->id);
		$data = array();
		foreach ($register_pasien_pemeriksaan as $rows) {
			$data[] = array(
				'nama_pemeriksaan'	=> $rows->nama_pemeriksaan,
				'keterangan' 		=> $rows->keterangan,
				'foto' 				=> $rows->foto,				
				'fullpath' 			=> base_url('assets/pemeriksaan_fisik/').$rows->foto,
				'is_delete'			=> '0'								
			);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => $data));
	}

	public function getRegisterLaboratory()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$register_laboratory = $this->Laboratory_model->getByRegisterId($postData->id, 'Rawat Inap');
		$data = array();
		foreach ($register_laboratory as $rows) {
			$data[] = array(
				'id' => $rows->id,
				'tanggal' => $rows->tanggal_daftar,
				'jenis_lab_id' => $rows->id_laboratory_type,
				'jenis_lab' => $rows->laboratory_type_desc,
				'harga' => $rows->tarif,
				'status' => $rows->status

			);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => $data));
	}

	public function getRegisterRadiology()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$register_radiology = $this->Radiology_model->getByRegisterId($postData->id, 'Rawat Inap');
		$data = array();
		foreach ($register_radiology as $rows) {
			$data[] = array(
				'id' => $rows->id,
				'tanggal' => $rows->tanggal_daftar,
				'jenis_rad_id' => $rows->id_radiology_type,
				'jenis_rad' => $rows->radiology_type_desc,
				'harga' => $rows->tarif,
				'status' => $rows->status

			);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => $data));
	}

	public function getRegisterRencanaKontrol()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$register_pasien_rencana_kontrol = $this->RawatInapRencanaKontrol_model->getByRegisterId($postData->id);
		$data = array();
		foreach ($register_pasien_rencana_kontrol as $rows) {
			$data[] = array(
				'tanggal' => $rows->tanggal_kontrol,
				'alasan' => $rows->alasan_kontrol
			);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => $data));
	}	

	public function getObservasi()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$observasi = $this->RawatInapObservasi_model->getByRegisterId($postData->id);
		$data = array();
		foreach ($observasi as $rows) {
			$data[] = array(
				'tanggal' => $rows->tanggal_observasi,
				'keterangan' => $rows->keterangan
			);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => $data));
	}	

	public function getRegisterObat()
	{
		$this->output->unset_template();


        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$register_pasien_obat = $this->RawatInapObat_model->getUnreleaseByRegisterId($postData->id);
		$data = array();
		foreach ($register_pasien_obat as $rows) {
			$data[] = array(
				'id' => $rows->id_obat,
				'nama' => $rows->nama_obat,				
				'harga' => $rows->harga_jual,
				'stok' => $rows->stok,
				'jumlah' => $rows->jumlah,			
				'is_release' => $rows->is_release
			);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => $data));
    }	

	public function getObatKeluar()
	{
		$this->output->unset_template();

        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$register_pasien_obat = $this->RawatInapObat_model->getReleaseByRegisterId($postData->id);
		$data = array();
		foreach ($register_pasien_obat as $rows) {
			$data[] = array(
				'id' => $rows->id_obat,
				'nama' => $rows->nama_obat,				
				'harga' => $rows->harga_jual,
				'stok' => $rows->stok,
				'jumlah' => $rows->jumlah,			
				'tanggal' => $rows->created_at
			);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => $data));
    }

	public function getSumRegisterObat()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$register_pasien_obat = $this->RawatInapObat_model->getSumByRegisterId($postData->id);
		$data = array();
		foreach ($register_pasien_obat as $rows) {
			$data[] = array(
				'id' => $rows->id_obat,
				'nama' => $rows->nama_obat,				
				'harga' => $rows->harga_jual,
				'stok' => $rows->stok,
				'jumlah' => $rows->jumlah,			
				'is_release' => $rows->is_release
			);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => $data));
    }	

	public function getRuangan()
	{
		$this->output->unset_template();
		$id_kelas = $this->input->get('id', TRUE);
		$ruangan = $this->Ruangan_model->getByKelas($id_kelas);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => $ruangan));
	}	

	public function getBed()
	{
		$this->output->unset_template();
		$id_ruangan = $this->input->get('id', TRUE);
		$bed = $this->Bed_model->getByRuangan($id_ruangan);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => $bed));
	}

    public function getLayananDatatable(){
		$this->output->unset_template();				
		$id_unit_layanan = $this->input->post('id_unit_layanan', TRUE);
		if(!$id_unit_layanan)
			$id_unit_layanan = 0;						
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $where = "id_unit_layanan = {$id_unit_layanan} AND id_klinik_layanan={$id_klinik} AND is_deleted=0";
		$result = $this->Layanan_model->getDataTable($this->input->post(), $where);		
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);			
	}  

    public function getIcd9Datatable(){
		$this->output->unset_template();				
		$result = $this->Icd9_model->getDataTable($this->input->post());		
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);		
	}  	

    public function getIcd10Datatable(){
		$this->output->unset_template();				
		$result = $this->Icd10_model->getDataTable($this->input->post());		
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);		
	}  	

    public function getObatDatatable(){
		$this->output->unset_template();				
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $where = "id_klinik={$id_klinik} AND is_deleted=0";		
		$result = $this->Obat_model->getDataTable($this->input->post(), $where);		

		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);		
	}  

	public function getRegisterLayananAjax()
	{
		$this->output->unset_template();
		$id_unit_layanan = $this->input->get('id', TRUE);
		//$id_unit_layanan = 6;
		$query_string = $this->input->get('search', TRUE);
		$register_layanan = $this->Layanan_model->getRawatInapLayananAutocomplete($id_unit_layanan, $query_string);
		$data = array();
		foreach ($register_layanan as $rows) {
			$data[] = array(
				'id' => $rows->id_layanan,
				'nama' => $rows->nama_layanan,
				'harga' => $rows->harga_layanan
			);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($data);
	}	

	public function getIcd9Ajax()
	{
		$this->output->unset_template();
		$query_string = $this->input->get('search', TRUE);
		$icd9 = $this->Icd9_model->getIcd9Autocomplete($query_string);
		$data = array();
		foreach ($icd9 as $rows) {
			$data[] = array(
				'id' => $rows->id,
				'nama' => $rows->icd9_name,				
			);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function getIcd10Ajax()
	{
		$this->output->unset_template();
		$query_string = $this->input->get('search', TRUE);
		$icd10 = $this->Icd10_model->getIcd10Autocomplete($query_string);

		//add the header here
		header('Content-Type: application/json');
		echo json_encode($icd10);
	}

	public function getObatAjax()
	{
		$this->output->unset_template();
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
		$query_string = $this->input->get('search', TRUE);
		$obat = $this->Obat_model->getObatAutocomplete($id_klinik, $query_string);				
		$data = array();
		foreach ($obat as $rows) {
			$data[] = array(
				'id' => $rows->id,
				'nama' => $rows->nama_obat,
				'harga' => $rows->harga_jual,
				'stok' => $rows->stok,				
			);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function save()
	{
        $this->output->unset_template();						
		$user = $this->ion_auth->user()->row();				        		
        $id_klinik = $user->id_klinik;
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
        $register_pasien = $this->RawatInap_model->getById($postData->id);
		$id = 0;
		$no_registrasi = 'RI' . date("YmdHis");
		$state_index = 0;
		
		if($register_pasien != NULL){
			if($register_pasien->state_index == 0){
				if($this->Bed_model->checkBooked($postData->bed->id)){
					header('Content-Type: application/json');
					$response = array('status' => false, 'error_code' => -3, 'message' => 'Bed sudah digunakan');
					echo json_encode($response);				
					die();
				}
			}
			if($register_pasien->state_index == 4){
				header('Content-Type: application/json');
				$response = array('status' => false, 'error_code' => -2, 'message' => 'Perubahan data gagal karena transaksi sudah selesai.');
				echo json_encode($response);				
				die();
			}
			$no_registrasi = $register_pasien->no_registrasi;
			$state_index = $register_pasien->state_index;
			$id = $register_pasien->id;
		}		
		$data = [];
		$dataLayanan = [];
		$dataIcd9 = [];
		$dataIcd10 = [];
		$dataRencanaKontrol = [];
		$dataObservasi = [];
		$dataLaboratory = [];
		$dataRadiology = [];
        $dataObat = [];
        $dataRincianKontrol = [];
        $dataPemeriksaanFisik = [];		
        $response = [];

		switch($postData->stateIndex){
			case 1:
				$data = 
				[
					'id' => $id,					
					'no_registrasi' => $no_registrasi,
					'tanggal_periksa' => $postData->tanggalPeriksa,
					'state_index' => (($postData->stateIndex) > $state_index) ? ($postData->stateIndex) : $state_index,					
					'id_dokter' => $postData->idDokter,
					'id_tipe_pasien' => $postData->idTipePasien,
					'id_bed' => $postData->bed->id,
					'tanggal_masuk' => $postData->tanggalMasuk,
					'keterangan1' => $postData->keterangan1,	
					'id_pasien' => $postData->pasien->id,
					'id_klinik' => $id_klinik,                                  				
					'modified_by' => $user->id
				];	
				
				$this->db->trans_start();			
				$data = $this->RawatInap_model->save($data);
				$this->db->trans_complete();									
			break;	

			case 2:
				$data = 
				[
					'id' => $postData->id,								
					'tanggal_pemeriksaan' => $postData->tanggalPemeriksaan,
					'diagnosa' => $postData->diagnosa,                     
					'keterangan2' => $postData->keterangan2,				
					'state_index' => (($postData->stateIndex) > $state_index) ? $postData->stateIndex : $state_index,					
					'modified_by' => $user->id					
				];				
				
				foreach ($postData->dataLayanan as $layanan) {
					$dataLayanan[] = array(
						'id_rawat_inap' => $postData->id,
						'id_layanan' => $layanan->id,
						'jumlah' => $layanan->jumlah,
						'harga' => $layanan->harga
					);
				}				
				
				foreach ($postData->dataIcd9 as $icd9) {
					$dataIcd9[] = array(
						'id_rawat_inap' => $postData->id,
						'id_icd9' => $icd9->id,
						'jumlah' => $icd9->jumlah
					);
				}
				
				foreach ($postData->dataIcd10 as $icd10) {
					$dataIcd10[] = array(
						'id_rawat_inap' => $postData->id,
						'id_icd10' => $icd10->id,
						'jumlah' => $icd10->jumlah
					);
				}				
				
				foreach ($postData->dataRencanaKontrol as $rencanaKontrol) {
					$dataRencanaKontrol[] = array(
						'id_rawat_inap' => $postData->id,
						'tanggal_kontrol' => $rencanaKontrol->tanggal,
						'alasan_kontrol' => $rencanaKontrol->alasan
					);
				}		
				
				foreach ($postData->dataObservasi as $observasi) {
					$dataObservasi[] = array(
						'id_rawat_inap' => $postData->id,
						'tanggal_observasi' => $observasi->tanggal,
						'keterangan' => $observasi->keterangan
					);
				}
				
				foreach ($postData->dataPemeriksaanFisik as $x => $pemeriksaanFisik) {
					if($pemeriksaanFisik->is_deleted == "1"){
						unlink('assets/pemeriksaan_fisik/' . $pemeriksaanFisik->original);
					}
					else {
						$imageName = "";						
						if($pemeriksaanFisik->original == ""){
							$file = base64_decode($pemeriksaanFisik->image);
							$imageName = $id."_".time()."_".$x.'.png';
							file_put_contents('assets/pemeriksaan_fisik/'.$imageName, $file);																
						}
						else{
							$imageName = $pemeriksaanFisik->original;
						}						
						$dataPemeriksaanFisik[] = array(
							'id_rawat_inap'	=> $postData->id,
							'nama_pemeriksaan' 		=> $pemeriksaanFisik->nama,
							'keterangan' 			=> $pemeriksaanFisik->keterangan,
							'foto' 					=> $imageName						
						);
					}
				}
				
				foreach ($postData->dataRadiology as $rad) {
					if($rad->status === "Menunggu")
					{
						$rawat_inap_rad = $this->Radiology_model->getByParam(
							array(
							'tanggal_daftar' => $rad->tanggal, 
							'id_radiology_type' => $rad->jenis_rad_id,
							'id_dokter' => $register_pasien->id_dokter,
							'id_pasien' => $register_pasien->id_pasien,
							'id_reference' => $postData->id,						
							'tipe_reference' => "Rawat Inap",						
							'state_index' => 0						
							)
						);
						if($rawat_inap_rad == NULL){
							$d = array(
								'no_registrasi'		=>	'RAD' . date("YmdHis"),
								'tanggal_daftar' => $rad->tanggal,
								'id_radiology_type' => $rad->jenis_rad_id,
								'id_dokter' => $register_pasien->id_dokter,
								'id_tipe_pasien' => $register_pasien->id_tipe_pasien,							
								'id_pasien' => $register_pasien->id_pasien,
								'tarif' => $rad->harga,
								'id_reference' => $postData->id,						
								'tipe_reference' => "Rawat Inap",						
								'state_index' => 0,						
								'status' => $rad->status,
								'modified_by' => $user->id												
							);					
							$this->Radiology_model->create($d);
							$dataRadiology[] = $d;
						}
					}
				}

				foreach ($postData->dataLaboratory as $lab) {
					if($lab->status === "Menunggu")
					{
						$rawat_inap_lab = $this->Laboratory_model->getByParam(
							array(
							'tanggal_daftar' => $lab->tanggal, 
							'id_laboratory_type' => $lab->jenis_lab_id,
							'id_dokter' => $register_pasien->id_dokter,
							'id_pasien' => $register_pasien->id_pasien,
							'id_reference' => $postData->id,						
							'tipe_reference' => "Rawat Inap",						
							'state_index' => 0						
							)
						);

						if($rawat_inap_lab == NULL){
							$d = array(
								'no_registrasi'		=>	'LAB' . date("YmdHis"),
								'tanggal_daftar' => $lab->tanggal,
								'id_laboratory_type' => $lab->jenis_lab_id,
								'id_dokter' => $register_pasien->id_dokter,
								'id_tipe_pasien' => $register_pasien->id_tipe_pasien,														
								'id_pasien' => $register_pasien->id_pasien,
								'tarif' => $lab->harga,
								'id_reference' => $postData->id,						
								'tipe_reference' => "Rawat Inap",						
								'state_index' => 0,						
								'status' => $lab->status,
								'modified_by' => $user->id												
							);							
							$this->Laboratory_model->create($d);
							$dataLaboratory[] = $d;
						}
					}
				}												
				$this->db->trans_start();			
				
				$this->RawatInapLayanan_model->deleteByRegisterId($postData->id);        
				if (count($dataLayanan) > 0) {
					$this->RawatInapLayanan_model->insertBatch($dataLayanan);
				}
				$this->RawatInapIcd9_model->deleteByRegisterId($postData->id);
				if (count($dataIcd9) > 0) {            
					$this->RawatInapIcd9_model->insertBatch($dataIcd9);
				}
				$this->RawatInapIcd10_model->deleteByRegisterId($postData->id);        
				if (count($dataIcd10) > 0) {
					$this->RawatInapIcd10_model->insertBatch($dataIcd10);
				}
				$this->RawatInapRencanaKontrol_model->deleteByRegisterId($postData->id);
				if (count($dataRencanaKontrol) > 0) {
					$this->RawatInapRencanaKontrol_model->insertBatch($dataRencanaKontrol);
				}
				$this->RawatInapObservasi_model->deleteByRegisterId($postData->id);
				if (count($dataObservasi) > 0) {
					$this->RawatInapObservasi_model->insertBatch($dataObservasi);
				}				
				$this->RawatInapPemeriksaanFisik_model->deleteByRegisterId($postData->id);
				if (count($dataPemeriksaanFisik) > 0) {
					$this->RawatInapPemeriksaanFisik_model->insertBatch($dataPemeriksaanFisik);
				}							
				$data = $this->RawatInap_model->save($data);
				
				$this->db->trans_complete();				
				
			break;			
			case 3:
				$data = 
				[
					'id' => $postData->id,				
					'tanggal_penyerahan_resep' => $postData->tanggalPenyerahanResep,
					'keterangan3' => $postData->keterangan3,                      
					'state_index' => (($postData->stateIndex) > $state_index) ? $postData->stateIndex : $state_index,					
					'modified_by' => $user->id						
				];
				
				foreach ($postData->dataObat as $obat) {
					if($obat->is_release != 1){
						$dataObat[] = array(
							'id_rawat_inap' => $postData->id,
							'id_obat' => $obat->id,
							'jumlah' => $obat->jumlah,
							'harga' => $obat->harga,
							'is_release' => 0,
							'guid' => date("YmdHis")
						);
					}
				}

				$this->db->trans_start();							
				$this->RawatInapObat_model->deleteUnreleaseByRegisterId($postData->id);
				if (count($dataObat) > 0) {
					$this->RawatInapObat_model->insertBatch($dataObat);
					if($postData->isRelease == 1){
						$this->RawatInapObat_model->logStok($postData->id, $user->id, $user->id_klinik);													
						$this->RawatInapObat_model->updateStok($postData->id);	
						$this->RawatInapObat_model->updateRelease($postData->id);											
					}
				}    				
				$data = $this->RawatInap_model->save($data);		
				
				$this->db->trans_complete();				
			break;			
		}

        if ($this->db->trans_status() === FALSE)
			$response = array('status' => false, 'message' => 'Penyimpanan data gagal, silahkan hubungi admin.');
        else
            $response = array('status' => true, 'data' => $data);        

		//add the header here
		header('Content-Type: application/json');
		echo json_encode($response);		
	}	

	function savePembayaran()
	{
		$this->output->unset_template();		
		$user = $this->ion_auth->user()->row();				        		
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);

		$id = $postData->id;		
        $register_pasien = $this->RawatInap_model->getById($id);

		if($register_pasien != NULL){
			if($register_pasien->state_index == 4){
				header('Content-Type: application/json');
				$response = array('status' => false, 'error_code' => -2, 'message' => 'Perubahan data gagal karena transaksi sudah selesai.');
				echo json_encode($response);				
				die();
			}
		}

		$order_paket = -1;
		$is_reminder = false;

		$tanggalBayar = date("Y-m-d H:i:s");
		$diskon = $postData->totalDiskon;
		$pajak = $postData->totalPajak;		
		$keterangan = $postData->keterangan;
		$persediaan = $postData->subTotal;		

		$pendapatan_paket = $hutang_paket_obat = $pendapatan_obat = $pendapatan_obat_tambahan = $pendapatan_tambahan = $pendapatan_layanan = 0;
		$dataPaket = array();
		$dataPaketObat = array();
		$dataLayanan = array();
		

		$pendapatan_layanan += $postData->invoiceKamar->jumlah * $postData->invoiceKamar->harga;			

		
		foreach ($postData->invoiceLayanan as $layanan) {
			$pendapatan_layanan += $layanan->jumlah * $layanan->harga;			
			$dataLayanan[] = array(
				'id_rawat_inap' => $postData->id,
				'id_layanan' => $layanan->id,
				'jumlah' => $layanan->jumlah,
				'harga' => $layanan->harga
			);
		}

		$dataObat = array();
		foreach ($postData->invoiceObat as $obat) {
			$pendapatan_obat += $obat->jumlah * $obat->harga;						
			$dataObat[] = array(
				'id_rawat_inap' => $postData->id,
				'id_obat' => $obat->id,
				'jumlah' => $obat->jumlah,
				'harga' => $obat->harga,
				'is_release' => $obat->is_release
			);
		}		
		
		$dataTambahan = array();
		foreach ($postData->invoiceTambahan as $tambahan) {
			$pendapatan_tambahan += $tambahan->jumlah * $tambahan->harga;									
			$dataTambahan[] = array(
				'id_rawat_inap' => $postData->id,
				'nama_tambahan' => $tambahan->nama,
				'jumlah' => $tambahan->jumlah,
				'harga' => $tambahan->harga
			);
		}		
		//penambahan lab & rad
		$dataLab = array();
		foreach ($postData->invoiceLab as $tambahan) {
			$pendapatan_layanan += $tambahan->harga;									
			$dataLab[] = array(
				'id' => $tambahan->id,
				'tarif' => $tambahan->harga
			);
		}
		$dataRad = array();		
		foreach ($postData->invoiceRad as $tambahan) {
			$pendapatan_layanan += $tambahan->harga;									
			$dataRad[] = array(
				'id' => $tambahan->id,
				'tarif' => $tambahan->harga
			);
		}				

		$dataCaraBayar = array();
		foreach ($postData->invoiceBayar as $bayar) {			
			$dataCaraBayar[] = array(
				'id_rawat_inap' => $postData->id,
				'id_cara_bayar' => $bayar->id,
				'jumlah' => ($bayar->akun == '111') ? $bayar->harga - $postData->kembalian : $bayar->harga
			);
		}		

		//ini layanan umum
		$namaTransaksi = "Pembayaran Rawat Inap " . $postData->noRegistrasi;	

		$dataDetail = [
			'id' => $id, 
			'diskon' => $diskon,
			'pajak' => $pajak,
			'pendapatan_layanan' => $pendapatan_layanan,
			'pendapatan_obat' => $pendapatan_obat,
			'pendapatan_tambahan' => $pendapatan_tambahan,	
			'hutang' => 0				
		];						

		$dataPendaftaran = [
			'id' => $id,			
			'tanggal_bayar' => $tanggalBayar,
			'subtotal' => $postData->subTotal,
			'diskon'  => $postData->diskon,
			'total_diskon' => $diskon,
			'pajak' => $postData->pajak,
			'total_pajak' => $pajak,						
			'total_tagihan' => $postData->totalTagihan,									
			'total_bayar' => $postData->totalBayar,												
			'kembalian' => $postData->kembalian,	
			'state_index' => 4,
			'modified_by' => $user->id,
			'keterangan4' => $keterangan            
		];

		$dataHeader = [
			'tanggal' => $tanggalBayar, 
			'nama' => $namaTransaksi, 
			'id_reference' => $id,
			'tipe_transaksi' => "Rawat Inap",
			'id_klinik' => $user->id_klinik, 
			'modified_by' => $user->id
		];
				


		$dataJurnal = ['header' => $dataHeader, 'detail' => $dataDetail];
		$result = array();

		$this->db->trans_start();
			if (count($dataLayanan) > 0) {
				$this->RawatInapLayanan_model->deleteByRegisterId($postData->id);
				$this->RawatInapLayanan_model->insertBatch($dataLayanan);
			}		

			if (count($dataObat) > 0) {
				foreach ($dataObat as $obat) {
					$this->RawatInapObat_model->updateHarga($obat);					
				}					
			}

			if (count($dataTambahan) > 0) {
				$this->RawatInapTambahan_model->insertBatch($dataTambahan);
			}
			
			//penambahan lab & rad
			if (count($dataLab) > 0) {
				$this->Laboratory_model->updateBatch($dataLab);
			}
			if (count($dataRad) > 0) {
				$this->Radiology_model->updateBatch($dataRad);
			}						

			if (count($dataCaraBayar) > 0) {
				$this->RawatInapPembayaran_model->insertBatch($dataCaraBayar);
			}				

			$this->RawatInap_model->save($dataPendaftaran);			
			$this->RawatInap_model->saveToJurnal($dataJurnal);	

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
            $response = array('status' => false, 'message' => 'Penyimpanan data gagal, silahkan hubungi admin.');			
		} else {
			$result = array('status' => true, 'data' => null);
		}
		//add the header here	
		header('Content-Type: application/json');
		echo json_encode($result);
	}

    public function print($id_registrasi){
		$this->output->unset_template();				
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
		$data['register'] = $this->RawatInap_model->getById($id_registrasi);	

		$data['layanan'] = $this->RawatInapLayanan_model->getByRegisterId($id_registrasi);		
		$data['obat'] = $this->RawatInapObat_model->getSumByRegisterId($id_registrasi);		

		$data['tambahan'] = $this->RawatInapTambahan_model->getByRegisterId($id_registrasi);				
		$data['lab'] = $this->Laboratory_model->getByRegisterId($id_registrasi, 'Rawat Inap');				
		$data['rad'] = $this->Radiology_model->getByRegisterId($id_registrasi, 'Rawat Inap');				

		$data['bayar'] = $this->RawatInapPembayaran_model->getByRegisterId($id_registrasi);				
		$data['klinik'] = $this->Klinik_model->getById($id_klinik);		

		$this->load->view('rawat_inap/invoice-print', $data);
	}  	
}