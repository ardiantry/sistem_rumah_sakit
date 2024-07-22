<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RawatJalan2 extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Pasien_model');
		$this->load->model('UnitLayanan_model');		
		$this->load->model('Dokter_model');				
		$this->load->model('TipePasien_model');	
		$this->load->model('Layanan_model');							
		$this->load->model('Icd9_model');									
		$this->load->model('Icd10_model');											
		$this->load->model('Obat_model');													
		$this->_init();
	}

	private function _init()
	{
		$this->load->section('sidebar', 'template/sidebar');				
		$this->output->set_template('adminLTE');
		//$this->load->js('assets/themes/default/js/jquery-1.9.1.min.js');
		//$this->load->js('assets/themes/default/hero_files/bootstrap-transition.js');
		//$this->load->js('assets/themes/default/hero_files/bootstrap-collapse.js');
	}

	public function index()
	{		
		$data['page_title'] = "Pemeriksaan Rawat Jalan";		
		$data['wizard_index'] = 0;		
			$row = array();
			$row['id'] = "";			
			$row['no_rm'] = "";
			$row['nama_pasien'] = "";		
			$row['tempat_lahir'] = "";								
			$row['tanggal_lahir'] = "";					
			$row['agama'] = "";	
			$row['alamat'] = "";											
			$row['no_telp'] = "";
			$row['golongan_darah'] = "";
			$row['jenis_kelamin'] = "";	
			$row['pekerjaan'] = "";		
			$row['keterangan'] = "";																							
		$data['pasien'] = (object)$row;
			$row = array();
			$row['no_rm_nama'] = "";			
			$row['no_reg'] = "";						
			$row['id_unit_layanan'] = "2";
			$row['nama_unit_layanan'] = "";						
			$row['id_dokter'] = "";
			$row['nama_dokter'] = "";									
			$row['id_tipe_pasien'] = "";
			$row['keterangan1'] = "";															
		$data['pendaftaran'] = (object)$row;

		$agama_options = array(
			'Islam'				=> 'Islam',
			'Kristen Protestan'	=> 'Kristen Protestan',
			'Katolik'			=> 'Katolik',
			'Hindu'				=> 'Hindu',
			'Buddha'			=> 'Buddha',
			'Kong Hu Cu'		=> 'Kong Hu Cu',
		);

		$golongan_darah_option = array(
			'A'		=> 'A',
			'B'		=> 'B',
			'AB'	=> 'AB',
			'O'		=> 'O',
		);

		$jenis_kelamin_option = array(
			'L'		=> 'Laki-laki',
			'P'		=> 'Perempuan',
		);
		
		$pekerjaan_option = array(
			'Guru'			=> 'Guru',
			'TNI'			=> 'TNI',
			'BUMN'			=> 'BUMN',
			'Petani'		=> 'Petani',
			'Swasta'		=> 'Swasta',									
		);

		/*
		$unit_layanan_option = array(
			1	=> 'Poliklinik THT',
			2	=> 'Poliklinik Gigi',
		);
		*/

		$unit_layanan_option = $this->UnitLayanan_model->getUnitLayananByKlinik(1);		
		$dokter_unit_layanan_option = $this->Dokter_model->getDokterUnitLayananByUnitLayanan($row['id_unit_layanan']);								
		$tipe_pasien_option = $this->TipePasien_model->getTipePasienByKlinik(1);				
		$data['agama'] = $agama_options;
		$data['golongan_darah'] = $golongan_darah_option;
		$data['jenis_kelamin'] = $jenis_kelamin_option;
		$data['pekerjaan'] = $pekerjaan_option;		
		$data['unit_layanan'] = $unit_layanan_option;
		$data['dokter_unit_layanan'] = $dokter_unit_layanan_option;		
		$data['tipe_pasien'] = $tipe_pasien_option;				
		$this->load->view('rawat_jalan/WizardRawatJalan', $data);
	}

	function getPasienDatatable()
    {		
		$result = $this->Pasien_model->get_pasien_datatable($this->input->post());
        $data = array();
        foreach($result['data'] as $rows)
        {
            $data[]= array(
				'', //for button
                $rows->no_rm,
                $rows->nama_pasien,
                $rows->tempat_lahir,
				date("d/m/Y", strtotime($rows->tanggal_lahir)),
				$rows->no_telp,
				$rows->agama,
				$rows->golongan_darah,				
				$rows->jenis_kelamin_display,		
                $rows->pekerjaan,												
				$rows->alamat,
				$rows->keterangan,
				$rows->jenis_kelamin,
				$rows->id,												
				'' //for button
            );     
        }		
        $output = array(
            "draw" => $result['draw'],
            "recordsTotal" => $result['recordsTotal'],
            "recordsFiltered" => $result['recordsFiltered'],
            "data" => $data
        );
        echo json_encode($output);
        exit();		
	}

	function getDataMasterAjax()
    {
		$agama_options = array(
			'Islam', 'Kristen Protestan', 'Katolik', 'Hindu', 'Buddha', 'Kong Hu Cu',
		);

		$golongan_darah_option = array(
			'A', 'B', 'AB', 'O',
		);

		$jenis_kelamin_option = array(
			'L'		=> 'Laki-laki',
			'P'		=> 'Perempuan',
		);

		$pekerjaan_option = array(
			'Guru', 'TNI', 'BUMN', 'Petani', 'Swasta',
		);

		$unit_layanan_option = $this->UnitLayanan_model->getUnitLayananByKlinik(1);		
		$tipe_pasien_option = $this->TipePasien_model->getTipePasienByKlinik(1);				
				
		$data['agama'] = $agama_options;
		$data['golongan_darah'] = $golongan_darah_option;
		$data['jenis_kelamin'] = $jenis_kelamin_option;
		$data['pekerjaan'] = $pekerjaan_option;
		$data['unit_layanan'] = $unit_layanan_option;	
		$data['tipe_pasien'] = $tipe_pasien_option;				
        echo json_encode($data);
        exit();				
	}

	function getDataPasienAjax()
    {
		$id_pasien = $this->input->post('id',TRUE);		
		$result = $this->Pasien_model->getPasienById($id_pasien);
        echo json_encode($result);
        exit();				
	}

	function getDokterUnitLayananAjax()
    {
		$id_unit_layanan = $this->input->post('id',TRUE);
		$dokter_unit_layanan_option = $this->Dokter_model->getDokterUnitLayananByUnitLayanan($id_unit_layanan);						
		echo json_encode($dokter_unit_layanan_option);			
        exit();					
	}

	function getRegisterLayananAjax()
    {
		$id_unit_layanan = $this->input->post('id',TRUE);
		$query_string = $this->input->post('qry',TRUE);		
		$register_layanan = $this->Layanan_model->getRegisterLayananAutocomplete($id_unit_layanan, $query_string);
        $data = array();
        foreach($register_layanan as $rows)
        {
            $data[] = array(
                'id' => $rows->id_layanan,
				'text' => $rows->nama_layanan,
				'harga_layanan' => $rows->harga_layanan
			);     
        }									
		echo json_encode(array('results'=>$data));			
        exit();					
	}	

	function getIcd9Ajax()
    {
		$query_string = $this->input->post('qry',TRUE);				
		$icd9 = $this->Icd9_model->getIcd9Autocomplete($query_string);
        $data = array();
        foreach($icd9 as $rows)
        {
            $data[] = array(
                'id' => $rows->id,
				'text' => $rows->icd9_name,
				'code' => $rows->icd9_code
			);     
        }									
		echo json_encode(array('results'=>$data));			
        exit();					
	}	

	function getIcd10Ajax()
    {
		$query_string = $this->input->post('qry',TRUE);				
		$icd10 = $this->Icd10_model->getIcd10Autocomplete($query_string);
        $data = array();
        foreach($icd10 as $rows)
        {
            $data[] = array(
                'id' => $rows->id,
				'text' => $rows->icd10_name,
				'code' => $rows->icd10_code
			);     
        }									
		echo json_encode(array('results'=>$data));			
        exit();					
	}	

	function getObatAjax()
    {
		$id_klinik = "1";
		$query_string = $this->input->post('qry',TRUE);				
		$obat = $this->Obat_model->getObatAutocomplete($id_klinik, $query_string);
        $data = array();
        foreach($obat as $rows)
        {
            $data[] = array(
                'id' => $rows->id,
				'text' => $rows->nama_obat,
				'harga' => $rows->harga_jual
			);     
        }									
		echo json_encode(array('results'=>$data));			
        exit();					
	}		

	public function pendaftaran()
	{		
		$data['page_title'] = "Pemeriksaan Rawat Jalan";
		$data['wizard_index'] = 0;		
			$row = array();
			$row['no_rm'] = "000018";
			$row['nama_pasien'] = "Denis Fadillah";		
			$row['tempat_lahir'] = "Sumedang";			
			$row['tanggal_lahir'] = date("d/m/Y", strtotime("1990-06-08 05:24:13"));	
			$row['agama'] = "Islam";	
			$row['alamat'] = "Jalan Layungsari 1 No 31, Kelurahan Empang Kecamatan Bogor Selatan, Bogor";											
			$row['no_telp'] = "082122544982";
			$row['golongan_darah'] = "O";
			$row['jenis_kelamin'] = "L";	
			$row['pekerjaan'] = "TNI";		
			$row['keterangan'] = "Ini adalah keterangan pasien";			
		$data['pasien'] = (object)$row;		
		$this->load->view('rawat_jalan/WizardRawatJalan', $data);
	}

	public function pemeriksaan()
	{
		$data['page_title'] = "Pemeriksaan Rawat Jalan";
		$data['wizard_index'] = 2;		
		$this->load->view('rawat_jalan/WizardRawatJalan', $data);
	}

	public function example_2()
	{
		$this->output->set_template('simple');
		$this->load->view('ci_simplicity/example_2');
	}

	public function example_3()
	{
		$this->load->section('sidebar', 'ci_simplicity/sidebar');
		$this->load->view('ci_simplicity/example_3');
	}

	public function example_4()
	{
		$this->output->unset_template();
		$this->load->view('ci_simplicity/example_4');
	}

	public function test()
	{
		$unit_layanan = $this->UnitLayanan_model->getUnitLayananByKlinik(array('id_klinik' => 1));		
		var_dump($unit_layanan);
		die();
	}
}
