<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class RawatJalan extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Menu_model');       		
		$this->load->model('Agama_model');		
		$this->load->model('GolonganDarah_model');				
		$this->load->model('Pekerjaan_model');						
				
		$this->load->model('Pasien_model');
		$this->load->model('UnitLayanan_model');
		$this->load->model('Dokter_model');
		$this->load->model('TipePasien_model');
		$this->load->model('CaraBayar_model');		
		$this->load->model('Layanan_model');
		$this->load->model('Icd9_model');
		$this->load->model('Icd10_model');
		$this->load->model('Obat_model');
		$this->load->model('Pendaftaran_model');
		$this->load->model('RegisterPasien_model');		
		$this->load->model('RegisterPasienLayanan_model');
		$this->load->model('RegisterPasienIcd9_model');
		$this->load->model('RegisterPasienIcd10_model');
		$this->load->model('RegisterPasienObat_model');				
		$this->load->model('RegisterPasienTambahan_model');										
		$this->load->model('RegisterPasienPembayaran_model');		
		$this->load->model('Klinik_model');					
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
		// $this->load->css('https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css');
		$this->load->css('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.css');
		$this->load->css('https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css');		
		$this->load->css('assets/themes/adminLTE/dist/css/wizard.css');
				

		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/moment.min.js');
		//$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js');		
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js');
		
		$this->load->js('https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js');
		$this->load->js('https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js');
		// $this->load->js('https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js');
		// $this->load->js('https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js');

		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js');
		$this->load->js('https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.0/dist/latest/bootstrap-autocomplete.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js');		
		$this->load->js('https://cdn.jsdelivr.net/npm/sweetalert2@9');				
		$this->load->js('https://cdn.datatables.net/plug-ins/1.10.21/dataRender/datetime.js');	   		               					
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js');	   		               					
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/filterizr/2.2.4/jquery.filterizr.min.js');
		//$this->load->js('assets/js/jquery.filterizr.min.js');	   		               							
		$this->load->js('https://unpkg.com/markerjs2/markerjs2.js');	   		               									

		$this->load->js('https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js');	   		               													

		$this->load->js('assets/js/helper.20211205.js');
		$this->load->js('assets/js/rawat_jalan/common.js');
		$this->load->js('assets/js/rawat_jalan/wizard.js');			
		$this->load->js('assets/js/rawat_jalan/icd10.js');							
		$this->load->js('assets/js/rawat_jalan/icd9.js');						
		$this->load->js('assets/js/rawat_jalan/layanan.js');			
		$this->load->js('assets/js/rawat_jalan/rencana.kontrol.js');																																									
		$this->load->js('assets/js/rawat_jalan/laboratorium.js');																																									
		$this->load->js('assets/js/rawat_jalan/radiologi.js');																																											
		$this->load->js('assets/js/rawat_jalan/pemeriksaan.fisik.js');							
		$this->load->js('assets/js/rawat_jalan/obat.20230619.js');									
		$this->load->js('assets/js/rawat_jalan/patient.js');			
		$this->load->js('assets/js/rawat_jalan/booking.js');			
		$this->load->js('assets/js/rawat_jalan/encounter.20230619.js');		
		$this->load->js('assets/js/generate_link.js');			

		//$this->load->js('assets/js/databinding.20221117.js');
		//$this->load->js('assets/js/wizard.20221117.js');	
		//$this->load->js('assets/js/pasien.js');								
		//$this->load->js('assets/js/pendaftaran.20221126.js');										
		//$this->load->js('assets/js/rawat.jalan.20221126.js');				
		//$this->load->js('assets/js/layanan.20221126.js');																					
		//$this->load->js('assets/js/icd9.20221126.js');																	
		//$this->load->js('assets/js/icd10.20221126.js');																			
		//$this->load->js('assets/js/rencana.kontrol.20221117.js');															
	}
 
	public function index()
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
		$data['obat_paket'] = $this->Obat_model->getPaketByKlinik($user->id_klinik);
		$data['cara_bayar'] = $this->CaraBayar_model->getByKlinik($user->id_klinik);
		$data['lab_type'] = $this->LaboratoryType_model->getByKlinik($user->id_klinik);
		$data['rad_type'] = $this->RadiologyType_model->getByKlinik($user->id_klinik);

		$content['page_title'] = "Pemeriksaan Rawat Jalan";
        $content['page_menu'] = "RawatJalan";                        		
		$content['wizard_index'] = 0;
		$content['step1'] = $this->load->view('rawat_jalan/content/step1', $data, TRUE);		
		$content['step2'] = $this->load->view('rawat_jalan/content/step2', $data, TRUE);			
		$content['step3'] = $this->load->view('rawat_jalan/content/step3', $data, TRUE);	
		$content['step4'] = $this->load->view('rawat_jalan/content/step4', $data, TRUE);				
		$content['step5'] = $this->load->view('rawat_jalan/content/step5', $data, TRUE);													
		$content['modal_pasien'] = $this->load->view('rawat_jalan/content/modal-pasien', null, TRUE);				
		$content['modal_form_pasien'] = $this->load->view('rawat_jalan/content/modal-form-pasien', $data['pekerjaan'], TRUE);		
		$content['modal_registrasi'] = $this->load->view('rawat_jalan/content/modal-registrasi', null, TRUE);	
		$content['modal_layanan'] = $this->load->view('rawat_jalan/content/modal-layanan', null, TRUE);																									
		$content['modal_icd10'] = $this->load->view('rawat_jalan/content/modal-icd10', null, TRUE);																									
		$content['modal_icd9'] = $this->load->view('rawat_jalan/content/modal-icd9', null, TRUE);		
		$content['modal_pemeriksaan_fisik'] = $this->load->view('rawat_jalan/content/modal-pemeriksaan-fisik', $data['pemeriksaan_fisik_files'], TRUE);																																						
		$content['modal_obat'] = $this->load->view('rawat_jalan/content/modal-obat', null, TRUE);																																						
		$content['modal_obat_tambahan'] = $this->load->view('rawat_jalan/content/modal-obat-tambahan', null, TRUE);																																						
		$content['modal_booking'] = $this->load->view('rawat_jalan/content/modal-booking', null, TRUE);																																						
		$content['modal_riwayat'] = $this->load->view('rawat_jalan/content/modal-riwayat', null, TRUE);																																						
		$this->load->view('rawat_jalan/rawat_jalan', $content);
	}

	public function pemeriksaan()
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
		$data['obat_paket'] = $this->Obat_model->getPaketByKlinik($user->id_klinik);
		$data['cara_bayar'] = $this->CaraBayar_model->getByKlinik($user->id_klinik);
		$data['lab_type'] = $this->LaboratoryType_model->getByKlinik($user->id_klinik);
		$data['rad_type'] = $this->RadiologyType_model->getByKlinik($user->id_klinik);

		$data['page_title'] = "Pemeriksaan Rawat Jalan";
        $data['page_menu'] = "Pemeriksaan";                        							
		$data['wizard_index'] = 2;
		$content['step1'] = $this->load->view('rawat_jalan/content/step1', $data, TRUE);		
		$content['step2'] = $this->load->view('rawat_jalan/content/step2', $data, TRUE);			
		$content['step3'] = $this->load->view('rawat_jalan/content/step3', $data, TRUE);	
		$content['step4'] = $this->load->view('rawat_jalan/content/step4', $data, TRUE);	
		$content['step5'] = $this->load->view('rawat_jalan/content/step5', $data, TRUE);																	
		$content['modal_pasien'] = $this->load->view('rawat_jalan/content/modal-pasien', null, TRUE);				
		$content['modal_form_pasien'] = $this->load->view('rawat_jalan/content/modal-form-pasien', $data['pekerjaan'], TRUE);						
		$content['modal_registrasi'] = $this->load->view('rawat_jalan/content/modal-registrasi', null, TRUE);								
		$content['modal_layanan'] = $this->load->view('rawat_jalan/content/modal-layanan', null, TRUE);	
		$content['modal_icd10'] = $this->load->view('rawat_jalan/content/modal-icd10', null, TRUE);																																				
		$content['modal_icd9'] = $this->load->view('rawat_jalan/content/modal-icd9', null, TRUE);																																				
		$content['modal_pemeriksaan_fisik'] = $this->load->view('rawat_jalan/content/modal-pemeriksaan-fisik', $data['pemeriksaan_fisik_files'], TRUE);																																				
		$content['modal_obat'] = $this->load->view('rawat_jalan/content/modal-obat', null, TRUE);		
		$content['modal_obat_tambahan'] = $this->load->view('rawat_jalan/content/modal-obat-tambahan', null, TRUE);																																										
		$content['modal_booking'] = $this->load->view('rawat_jalan/content/modal-booking', null, TRUE);																																								
		$content['modal_riwayat'] = $this->load->view('rawat_jalan/content/modal-riwayat', null, TRUE);																																								
		$this->load->view('rawat_jalan/rawat_jalan', $content);
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
		$data['obat_paket'] = $this->Obat_model->getPaketByKlinik($user->id_klinik);
		$data['cara_bayar'] = $this->CaraBayar_model->getByKlinik($user->id_klinik);
		$data['lab_type'] = $this->LaboratoryType_model->getByKlinik($user->id_klinik);
		$data['rad_type'] = $this->RadiologyType_model->getByKlinik($user->id_klinik);
 
		$data['page_title'] = "Pemeriksaan Rawat Jalan";
        $data['page_menu'] = "Apotek";                        									
		$data['wizard_index'] = 3;
		$content['step1'] = $this->load->view('rawat_jalan/content/step1', $data, TRUE);		
		$content['step2'] = $this->load->view('rawat_jalan/content/step2', $data, TRUE);			
		$content['step3'] = $this->load->view('rawat_jalan/content/step3', $data, TRUE);	
		$content['step4'] = $this->load->view('rawat_jalan/content/step4', $data, TRUE);	
		$content['step5'] = $this->load->view('rawat_jalan/content/step5', $data, TRUE);																	
		$content['modal_pasien'] = $this->load->view('rawat_jalan/content/modal-pasien', null, TRUE);				
		$content['modal_form_pasien'] = $this->load->view('rawat_jalan/content/modal-form-pasien', $data['pekerjaan'], TRUE);						
		$content['modal_registrasi'] = $this->load->view('rawat_jalan/content/modal-registrasi', null, TRUE);								
		$content['modal_layanan'] = $this->load->view('rawat_jalan/content/modal-layanan', null, TRUE);	
		$content['modal_icd10'] = $this->load->view('rawat_jalan/content/modal-icd10', null, TRUE);																																				
		$content['modal_icd9'] = $this->load->view('rawat_jalan/content/modal-icd9', null, TRUE);																																				
		$content['modal_pemeriksaan_fisik'] = $this->load->view('rawat_jalan/content/modal-pemeriksaan-fisik', $data['pemeriksaan_fisik_files'], TRUE);		
		$content['modal_obat'] = $this->load->view('rawat_jalan/content/modal-obat', null, TRUE);	
		$content['modal_obat_tambahan'] = $this->load->view('rawat_jalan/content/modal-obat-tambahan', null, TRUE);		
		$content['modal_booking'] = $this->load->view('rawat_jalan/content/modal-booking', null, TRUE);		
		$content['modal_riwayat'] = $this->load->view('rawat_jalan/content/modal-riwayat', null, TRUE);																																																																																																																																																									
		$this->load->view('rawat_jalan/rawat_jalan', $content);
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
		$data['obat_paket'] = $this->Obat_model->getPaketByKlinik($user->id_klinik);
		$data['cara_bayar'] = $this->CaraBayar_model->getByKlinik($user->id_klinik);
		$data['lab_type'] = $this->LaboratoryType_model->getByKlinik($user->id_klinik);
		$data['rad_type'] = $this->RadiologyType_model->getByKlinik($user->id_klinik);
		
		$data['page_title'] = "Pemeriksaan Rawat Jalan";
        $data['page_menu'] = "Pembayaran";                        							
		$data['wizard_index'] = 4;
		$content['step1'] = $this->load->view('rawat_jalan/content/step1', $data, TRUE);		
		$content['step2'] = $this->load->view('rawat_jalan/content/step2', $data, TRUE);			
		$content['step3'] = $this->load->view('rawat_jalan/content/step3', $data, TRUE);	
		$content['step4'] = $this->load->view('rawat_jalan/content/step4', $data, TRUE);								
		$content['step5'] = $this->load->view('rawat_jalan/content/step5', $data, TRUE);								
		$content['modal_pasien'] = $this->load->view('rawat_jalan/content/modal-pasien', null, TRUE);				
		$content['modal_form_pasien'] = $this->load->view('rawat_jalan/content/modal-form-pasien', $data['pekerjaan'], TRUE);						
		$content['modal_registrasi'] = $this->load->view('rawat_jalan/content/modal-registrasi', null, TRUE);								
		$content['modal_layanan'] = $this->load->view('rawat_jalan/content/modal-layanan', null, TRUE);	
		$content['modal_icd10'] = $this->load->view('rawat_jalan/content/modal-icd10', null, TRUE);																																				
		$content['modal_icd9'] = $this->load->view('rawat_jalan/content/modal-icd9', null, TRUE);																																				
		$content['modal_pemeriksaan_fisik'] = $this->load->view('rawat_jalan/content/modal-pemeriksaan-fisik', $data['pemeriksaan_fisik_files'], TRUE);		
		$content['modal_obat'] = $this->load->view('rawat_jalan/content/modal-obat', null, TRUE);	
		$content['modal_obat_tambahan'] = $this->load->view('rawat_jalan/content/modal-obat-tambahan', null, TRUE);		
		$content['modal_booking'] = $this->load->view('rawat_jalan/content/modal-booking', null, TRUE);		
		$content['modal_riwayat'] = $this->load->view('rawat_jalan/content/modal-riwayat', null, TRUE);																																																																																																																																																									
		$this->load->view('rawat_jalan/rawat_jalan', $content);
	}	
	
	public function getDataMasterAjax()
	{
		$this->output->unset_template();
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;

		$pekerjaan = $this->Pekerjaan_model->getByKlinik($id_klinik);		
		$pekerjaan_option = array();
		foreach($pekerjaan as $value){
			$pekerjaan_option[] = array('value' => $value->id, 'text' => $value->pekerjaan);
		}


		$unit_layanan_option = $this->UnitLayanan_model->getByKlinik($id_klinik);
		$tipe_pasien_option = $this->TipePasien_model->getByKlinik($id_klinik);
		$cara_bayar_option = $this->CaraBayar_model->getByKlinik($id_klinik);
		$obat_paket = $this->Obat_model->getPaketByKlinik($id_klinik);

		$data['pekerjaan'] = $pekerjaan_option;
		$data['unit_layanan'] = $unit_layanan_option;
		$data['tipe_pasien'] = $tipe_pasien_option;
		$data['cara_bayar'] = $cara_bayar_option;
		$data['obat_paket'] = $obat_paket;		

		//add the header here
		header('Content-Type: application/json');
		echo json_encode($data);
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
        $where = "id_klinik=" . $id_klinik . " AND is_deleted=0";	
		if($this->input->post('jenis_pemeriksaan', TRUE) === 'Paket Layanan')
		{

			$result = $this->Obat_model->getPaketDataTable($this->input->post(), $where);	
		}	
		else
		{
			$result = $this->Obat_model->getDataTable($this->input->post(), $where);
			$new_data=array();
			
			$o=0;
			foreach($result['data'] as $ky)
			{
				$status_stok=0; 
				if($ky['tipe']=='racikan')
				{
					$result_obt=$this->Obat_model->checkstok($ky['id']);

					foreach($result_obt as $rck)
					{
						if(@$rck->stok<=@$rck->stok_min)
						{
							$status_stok++; 
						}
					} 

				}
				
				@$ky['status_stok_racikan']=$status_stok>0?true:false;
				$new_data[$o]=$ky;
				$o++;
			}	

			$result['data']=$new_data;
					
		}
       header('Content-Type: application/json');	
		echo json_encode($result);		
	}  


	public function getDataPasienAjax()
	{
		$this->output->unset_template();
		$id_pasien = $this->input->post('id', TRUE);
		$result = $this->Pasien_model->getPasienById($id_pasien);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
	}

	public function getDataPendaftaranAjax()
	{
		$this->output->unset_template();
		$id_registrasi = $this->input->post('id', TRUE);
		$result = $this->Pendaftaran_model->getPendaftaranById($id_registrasi);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
	}

	public function getDokterUnitLayananAjax()
	{
		$this->output->unset_template();
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
		$id_unit_layanan = $this->input->get('id', TRUE);
		if($id_unit_layanan == -1){
			$dokter_unit_layanan_option = $this->Dokter_model->getDokterUnitLayananByKlinik($id_klinik);
		}else{
			$dokter_unit_layanan_option = $this->Dokter_model->getDokterUnitLayananByUnitLayanan($id_unit_layanan);
		}

		//add the header here
		header('Content-Type: application/json');
		echo json_encode($dokter_unit_layanan_option);
	}

	public function getRegisterLayananAjax()
	{
		$this->output->unset_template();
		$id_unit_layanan = $this->input->get('id', TRUE);
		//$id_unit_layanan = 6;
		$query_string = $this->input->get('search', TRUE);
		$register_layanan = $this->Layanan_model->getRegisterLayananAutocomplete($id_unit_layanan, $query_string);
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
		// $data = [];
		// foreach ($icd10 as $rows) {
		// 	$data[] = [
		// 		'id' => $rows->id,
		// 		'nama' => $rows->icd10_name,
		// 	];
		// }
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($icd10);
	}

	public function getObatAjax()
	{
		$this->output->unset_template();
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
		$query_string = $this->input->get('search', TRUE);
		if($this->input->get('jenis_pemeriksaan', TRUE) === 'Paket Layanan')
			$obat = $this->Obat_model->getPaketObatAutocomplete($id_klinik, $query_string);			
		else
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

	public function getRegisterPasienLayananAjax()
	{
		$this->output->unset_template();
		$id_register_pasien = $this->input->post('id', TRUE);
		$register_pasien_layanan = $this->RegisterPasienLayanan_model->getByRegisterId($id_register_pasien);
		$data = array();
		foreach ($register_pasien_layanan as $rows) {
			$data[] = array(
				'id' => $rows->id_layanan,
				'nama' => $rows->nama_layanan,				
				'jumlah' => $rows->jumlah,
				'harga' => $rows->harga_layanan
			);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => 'ok', 'results' => $data));
	}

	public function getRegisterPasienIcd9Ajax()
	{
		$this->output->unset_template();
		$id_register_pasien = $this->input->post('id', TRUE);
		$register_pasien_icd9 = $this->RegisterPasienIcd9_model->getByRegisterId($id_register_pasien);
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
		echo json_encode(array('status' => 'ok', 'results' => $data));
	}
	
	public function getRegisterPasienIcd10Ajax()
	{
		$this->output->unset_template();
		$id_register_pasien = $this->input->post('id', TRUE);
		$register_pasien_icd10 = $this->RegisterPasienIcd10_model->getByRegisterId($id_register_pasien);
		$data = array();
		foreach ($register_pasien_icd10 as $rows) {
			$data[] = array(
				'id' => $rows->id_icd10,
				'nama' => $rows->icd10_name,				
				'jumlah' => $rows->jumlah
			);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => 'ok', 'results' => $data));
	}	

	public function getRegisterPasienObatAjax()
	{
		$this->output->unset_template();
		$id_register_pasien = $this->input->post('id', TRUE);
		$register_pasien_obat = $this->RegisterPasienObat_model->getByRegisterId($id_register_pasien);
		$data = array();
		foreach ($register_pasien_obat as $rows) {
			$data[] = array(
				'id' => $rows->id_obat,
				'nama' => $rows->nama_obat,				
				'jumlah' => $rows->jumlah,
				'harga' => $rows->harga_jual
			);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => 'ok', 'results' => $data));
	}	

	function savePasien()
	{
		$this->output->unset_template();
		$postData = json_decode($this->input->raw_input_stream);
		var_dump($postData);
		die();		
		$data = array(
			'p_id' => $postData->id_pasien,
			'p_no_rm' => $postData->no_rm,
			'p_nama_pasien' => $postData->nama_pasien,
			'p_tempat_lahir' => $postData->tempat_lahir,
			'p_tanggal_lahir' => dateFormatDb($postData->tanggal_lahir),
			'p_agama' => (isset($postData->agama)) ? $postData->agama : "",
			'p_alamat' => $postData->alamat,
			'p_no_telp' => $postData->no_telp,
			'p_jenis_kelamin' => (isset($postData->jenis_kelamin)) ? $postData->jenis_kelamin : "",
			'p_golongan_darah' => (isset($postData->golongan_darah)) ? $postData->golongan_darah : "",
			'p_pekerjaan' => (isset($postData->pekerjaan)) ? $postData->pekerjaan : "",
			'p_keterangan' => $postData->keterangan
		);

		$pasien_result = $this->Pasien_model->insert($data);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($pasien_result);
		//exit();					
	}

	function getRegisterPasienDatatable()
	{
		$this->output->unset_template();
		$result = $this->Pendaftaran_model->get_register_pasien_datatable($this->input->post());
		$data = array();
		foreach ($result['data'] as $rows) {
			$data[] = array(
				'', //for button
				$rows->no_registrasi,
				$rows->no_rm,
				$rows->nama_pasien,
				date("d/m/Y", strtotime($rows->tanggal_periksa)),
				$rows->nama_unit_layanan,
				$rows->nama_dokter,
				$rows->tipe_pasien,
				$rows->keterangan1,
				date("d/m/Y", strtotime($rows->tanggal_pemeriksaan)),
				$rows->diagnosa,
				$rows->keterangan2,								
				date("d/m/Y", strtotime($rows->tanggal_penyerahan_resep)),				
				$rows->keterangan3,												
				$rows->id,
				$rows->id_unit_layanan,
				$rows->id_dokter,
				$rows->id_tipe_pasien,
				$rows->id_pasien,
				'' //for button
			);
		}
		$output = array(
			"draw" => $result['draw'],
			"recordsTotal" => $result['recordsTotal'],
			"recordsFiltered" => $result['recordsFiltered'],
			"data" => $data
		);

		//add the header here
		header('Content-Type: application/json');
		echo json_encode($output);
	}

	function savePendaftaran()
	{
		$this->output->unset_template();
		$postData = json_decode($this->input->raw_input_stream);
		$data = array(
			'p_id' => $postData->id_registrasi,
			'p_no_reg' => $postData->no_registrasi,
			'p_tanggal_periksa' => dateFormatDb($postData->tanggal_periksa),
			'p_id_pasien' => $postData->id_pasien,
			'p_id_unit_layanan' => $postData->id_unit_layanan,
			'p_id_dokter' => $postData->id_dokter,
			'p_id_tipe_pasien' => $postData->id_tipe_pasien,
			'p_keterangan1' => (isset($postData->keterangan1)) ? $postData->keterangan1 : ""
		);
		$reg_result = $this->Pendaftaran_model->insert($data);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($reg_result);
	}

	function saveLayanan()
	{
		$this->output->unset_template();
		$postData = json_decode($this->input->raw_input_stream);

		$dataPendaftaran = array(
			'tanggal_pemeriksaan' => dateFormatDb($postData->tanggal_pemeriksaan),
			'diagnosa'  => $postData->diagnosa,
			'keterangan2'  => $postData->keterangan2
		);

		$dataLayanan = array();
		$dataIcd9 = array();
		$dataIcd10 = array();

		foreach ($postData->data_layanan as $layanan) {
			$dataLayanan[] = array(
				'id_register_pasien' => $postData->id_register_pasien,
				'id_layanan' => $layanan->id,
				'jumlah' => $layanan->jumlah,
				'harga' => $layanan->harga
			);
		}

		foreach ($postData->data_icd9 as $icd9) {
			$dataIcd9[] = array(
				'id_register_pasien' => $postData->id_register_pasien,
				'id_icd9' => $icd9->id,
				'jumlah' => $icd9->jumlah
			);
		}
		
		foreach ($postData->data_icd10 as $icd10) {
			$dataIcd10[] = array(
				'id_register_pasien' => $postData->id_register_pasien,
				'id_icd10' => $icd10->id,
				'jumlah' => $icd10->jumlah
			);
		}

		$result = array();

		$this->db->trans_start();
		if (count($dataLayanan) > 0) {
			$this->RegisterPasienLayanan_model->deleteByRegisterId($postData->id_register_pasien);
			$this->RegisterPasienLayanan_model->insertBatch($dataLayanan);
		}
		if (count($dataIcd9) > 0) {
			$this->RegisterPasienIcd9_model->deleteByRegisterId($postData->id_register_pasien);
			$this->RegisterPasienIcd9_model->insertBatch($dataIcd9);
		}
		if (count($dataIcd10) > 0) {
			$this->RegisterPasienIcd10_model->deleteByRegisterId($postData->id_register_pasien);
			$this->RegisterPasienIcd10_model->insertBatch($dataIcd10);
		}
		$this->Pendaftaran_model->update($postData->id_register_pasien, $dataPendaftaran);
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

	function saveApotek()
	{
		$this->output->unset_template();
		$postData = json_decode($this->input->raw_input_stream);
		$dataPendaftaran = array(
			'tanggal_pemeriksaan' => dateFormatDb($postData->tanggal_penyerahan_resep),
			'keterangan3'  => $postData->keterangan3
		);

		$dataObat = array();
		foreach ($postData->data_obat as $obat) {
			$dataObat[] = array(
				'id_register_pasien' => $postData->id_register_pasien,
				'id_obat' => $obat->id,
				'jumlah' => $obat->jumlah,
				'harga' => $obat->harga
			);
		}

		
		$result = array();

		$this->db->trans_start();
		if (count($dataObat) > 0) {
			$this->RegisterPasienObat_model->deleteByRegisterId($postData->id_register_pasien);
			$this->RegisterPasienObat_model->insertBatch($dataObat);
		}
		$this->Pendaftaran_model->update($postData->id_register_pasien, $dataPendaftaran);
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

    public function print($id_registrasi){
		$this->output->unset_template();				
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
		$data['register'] = $this->RegisterPasien_model->getById($id_registrasi);	
		//var_dump($data['register']);	
		//die();
		$data['layanan'] = $this->RegisterPasienLayanan_model->getByRegisterId($id_registrasi);		
		$data['obat'] = $this->RegisterPasienObat_model->getByRegisterIdJenisPemeriksaan($id_registrasi, $data['register']->jenis_pemeriksaan ?? 'Umum');		
		$data['obatTambahan'] = $this->RegisterPasienObat_model->getByRegisterIdJenisPemeriksaan($id_registrasi, 'Umum');	

		$data['tambahan'] = $this->RegisterPasienTambahan_model->getByRegisterId($id_registrasi);				
		$data['lab'] = $this->Laboratory_model->getByRegisterId($id_registrasi, 'Rawat Jalan');				
		$data['rad'] = $this->Radiology_model->getByRegisterId($id_registrasi, 'Rawat Jalan');				

		$data['bayar'] = $this->RegisterPasienPembayaran_model->getByRegisterId($id_registrasi);				
		$data['klinik'] = $this->Klinik_model->getById($id_klinik);		
		//var_dump($data['layanan']);
		//var_dump($data['obat']);	
		//die();
		$this->load->view('rawat_jalan/invoice-print', $data);
	}  	
}