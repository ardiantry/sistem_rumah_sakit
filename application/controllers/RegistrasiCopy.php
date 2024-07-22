<?php defined('BASEPATH') OR exit('No direct script access allowed');

class RegistrasiCopy extends CI_Controller {
	function __construct()
	{
		parent::__construct();
        $this->load->model('RegisterPasien_model');
        $this->load->model('RegisterPasienLayanan_model');
        $this->load->model('RegisterPasienIcd9_model');
        $this->load->model('RegisterPasienIcd10_model');                        
		$this->load->model('RegisterPasienObat_model');                                        
		$this->load->model('RegisterPasienPaket_model');                                        			
		$this->load->model('RegisterPasienTambahan_model');										
		$this->load->model('RegisterPasienPembayaran_model');		
		$this->load->model('RegisterPasienRencanaKontrol_model');		
	}
	
	function getRekamMedik()
	{
		$this->output->unset_template();
        $id = $this->input->post('id', TRUE);                               		
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $where = "id_pasien = " . $id . " AND id_klinik=" . $id_klinik . " AND is_deleted=0";				
		$result = $this->RegisterPasien_model->getDataTable($this->input->post(), $where);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
	}    	

	function getDatatable()
	{
		$this->output->unset_template();
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $where = "state_index <> 3 AND id_klinik=" . $id_klinik . " AND is_deleted=0 AND state_index >=" . $this->input->post('state_index') ;						
		$result = $this->RegisterPasien_model->getDataTable($this->input->post(), $where);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
	} 	

	function getDatatableUmum()
	{
		$this->output->unset_template();
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $where = "id_klinik=" . $id_klinik . " AND is_deleted=0 AND state_index <> 3 AND state_index >=" . $this->input->post('state_index') ." AND jenis_pemeriksaan <> 'Paket Layanan' ";						        
		$result = $this->RegisterPasien_model->getDataTable($this->input->post(), $where);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
	} 	
	
	
	function getDatatablePaket()
	{
		$this->output->unset_template();
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $where = "id_klinik=" . $id_klinik . " AND is_deleted=0 AND state_index <> 3 AND state_index >=" . $this->input->post('state_index') ." AND jenis_pemeriksaan = 'Paket Layanan' ";						                
		$result = $this->RegisterPasien_model->getDataTable($this->input->post(), $where);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
	} 		
        
	function save()
	{
        $this->output->unset_template();
		if (!$this->ion_auth->logged_in())
		{
			header('Content-Type: application/json');
            $response = array('status' => false, 'error_code' => -1, 'message' => 'Sesi anda habis, silahkan login kembali.');
			echo json_encode($response);			
			die();
		}							

        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);

        $register_pasien = $this->RegisterPasien_model->getById($postData->id);
		$no_registrasi = 'R' . date("YmdHis");
		if($register_pasien != NULL){
			if($register_pasien->state_index == 3){
				header('Content-Type: application/json');
				$response = array('status' => false, 'error_code' => -2, 'message' => 'Perubahan data gagal karena transaksi sudah selesai.');
				echo json_encode($response);				
				die();
			}
			$no_registrasi = $postData->noRegistrasi;
		}

		$data = array(
			'id' => $postData->id,
			'no_registrasi' => $no_registrasi,
			'tanggal_periksa' => dateFormatDb($postData->tanggalPeriksa),
			'id_unit_layanan' => $postData->idUnitLayanan,
			'id_dokter' => $postData->idDokter,
			'id_tipe_pasien' => $postData->idTipePasien,
			'keterangan1' => $postData->keterangan1,
			'tanggal_pemeriksaan' => dateFormatDb($postData->tanggalPemeriksaan),
			'diagnosa' => $postData->diagnosa,
            'keterangan2' => $postData->keterangan2,
            'tanggal_penyerahan_resep' => dateFormatDb($postData->tanggalPenyerahanResep),
            'keterangan3' => $postData->keterangan3,                      
            'state_index' => $postData->stateIndex,
			'jenis_pemeriksaan' => $postData->jenisPemeriksaan,
			'tanggal_kunjungan_selanjutnya' => ($postData->jenisPemeriksaan == 'Umum') ? null : dateFormatDb($postData->tanggalKunjunganSelanjutnya),
			'tujuan_kunjungan_selanjutnya' => ($postData->jenisPemeriksaan == 'Umum') ? null : $postData->tujuanKunjunganSelanjutnya,
			'jumlah_paket' => ($postData->jenisPemeriksaan == 'Umum') ? null : $postData->jumlahPaket,
			'id_paket' => ($postData->jenisPemeriksaan == 'Umum') ? null : $postData->idPaket,
			'id_pasien' => $postData->pasien->id,
			'id_klinik' => $id_klinik                                  
		);

		$dataLayanan = array();
		$dataIcd9 = array();
		$dataIcd10 = array();
        $dataObat = array();
        $dataObatTambahan = array();
        $dataRincianKontrol = array();

		foreach ($postData->dataLayanan as $layanan) {
			$dataLayanan[] = array(
				'id_register_pasien' => $postData->id,
				'id_layanan' => $layanan->id,
				'jumlah' => $layanan->jumlah,
				'harga' => $layanan->harga
			);
        }

		foreach ($postData->dataIcd9 as $icd9) {
			$dataIcd9[] = array(
				'id_register_pasien' => $postData->id,
				'id_icd9' => $icd9->id,
				'jumlah' => $icd9->jumlah
			);
		}
		
		foreach ($postData->dataIcd10 as $icd10) {
			$dataIcd10[] = array(
				'id_register_pasien' => $postData->id,
				'id_icd10' => $icd10->id,
				'jumlah' => $icd10->jumlah
			);
        }

		foreach ($postData->dataObat as $obat) {
			$dataObat[] = array(
				'id_register_pasien' => $postData->id,
				'id_obat' => $obat->id,
				'jumlah' => $obat->jumlah,
				'harga' => $obat->harga,
				'is_paket' => ($postData->jenisPemeriksaan == 'Umum') ? 0 : 1
			);
        }

		foreach ($postData->dataObatTambahan as $obatTambahan) {
			$dataObat[] = array(
				'id_register_pasien' => $postData->id,
				'id_obat' => $obatTambahan->id,
				'jumlah' => $obatTambahan->jumlah,
				'harga' => $obatTambahan->harga,
				'is_paket' => 0
			);
		}
		
		foreach ($postData->dataRencanaKontrol as $rencanaKontrol) {
			$dataRencanaKontrol[] = array(
				'id_register_pasien' => $postData->id,
				'tanggal_kontrol' => dateFormatDb($rencanaKontrol->tanggal_kontrol),
				'alasan_kontrol' => $rencanaKontrol->alasan_kontrol
			);
		}		

        $response = array();
        $this->db->trans_start();

        $this->RegisterPasienLayanan_model->deleteByRegisterId($postData->id);        
		if (count($dataLayanan) > 0) {
			$this->RegisterPasienLayanan_model->insertBatch($dataLayanan);
		}
        $this->RegisterPasienIcd9_model->deleteByRegisterId($postData->id);
        if (count($dataIcd9) > 0) {            
			$this->RegisterPasienIcd9_model->insertBatch($dataIcd9);
        }

        $this->RegisterPasienIcd10_model->deleteByRegisterId($postData->id);        
		if (count($dataIcd10) > 0) {
			$this->RegisterPasienIcd10_model->insertBatch($dataIcd10);
        }

        $this->RegisterPasienObat_model->deleteByRegisterId($postData->id);
		if (count($dataObat) > 0) {
			$this->RegisterPasienObat_model->insertBatch($dataObat);
        }        
        
        $this->RegisterPasienRencanaKontrol_model->deleteByRegisterId($postData->id);
		if (count($dataRencanaKontrol) > 0) {
			$this->RegisterPasienRencanaKontrol_model->insertBatch($dataRencanaKontrol);
        }

        $data = $this->RegisterPasien_model->save($data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
            //$response = array('status' => false, 'message' => $this->db->error());
            $response = array('status' => false, 'message' => 'Penyimpanan data gagal, silahkan hubungi admin.');
        else
            $response = array('status' => true, 'data' => $data);        

		//add the header here
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	function delete()
	{
        $this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$id = $postData->id;
        
        $register_pasien = $this->RegisterPasien_model->getById($id);
		if($register_pasien != NULL){
			if($register_pasien->state_index == 3){
				header('Content-Type: application/json');
				$response = array('status' => false, 'error_code' => -2, 'message' => 'Perubahan data gagal karena transaksi sudah selesai.');
				echo json_encode($response);				
				die();
			}
		}
		
        $response = array();		
		if($this->RegisterPasien_model->delete($id) > 0)
			$response = array('status' => true, 'data' => []);        					
		else
			$response = array('status' => false, 'message' => $this->db->error());			
			
		header('Content-Type: application/json');
		echo json_encode($response);		
	}	

	function cancelPaket()
	{
        $this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$id = $postData->id;

        $register_pasien = $this->RegisterPasien_model->getById($id);
		if($register_pasien != NULL){
			if($register_pasien->state_index == 3){
				header('Content-Type: application/json');
				$response = array('status' => false, 'error_code' => -2, 'message' => 'Perubahan data gagal karena transaksi sudah selesai.');
				echo json_encode($response);				
				die();
			}
		}
		
		$id_reference = $postData->id_reference;
		$paket_sisa = $postData->paket_sisa;

        $response = array();		
		if($this->RegisterPasien_model->delete($id) > 0){
			if($id_reference != NULL){
				$this->RegisterPasien_model->cancelPaketToJurnal($id, $id_reference, $paket_sisa);			
			}
			$response = array('status' => true, 'data' => []);        					
		}
		else
			$response = array('status' => false, 'message' => $this->db->error());			
			
		header('Content-Type: application/json');
		echo json_encode($response);		
	}		
    
	public function getRegisterObat()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$register_pasien_obat = $this->RegisterPasienObat_model->getByRegisterIdJenisPemeriksaan($postData->id, $postData->jenis_pemeriksaan);
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
		echo json_encode(array('status' => true, 'data' => $data));
    }	

	public function getRegisterLayanan()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$register_pasien_layanan = $this->RegisterPasienLayanan_model->getByRegisterId($postData->id);
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
		echo json_encode(array('status' => true, 'data' => $data));
    }    
    

	public function getRegisterIcd9()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$register_pasien_icd9 = $this->RegisterPasienIcd9_model->getByRegisterId($postData->id);
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
		$register_pasien_icd10 = $this->RegisterPasienIcd10_model->getByRegisterId($postData->id);
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
		echo json_encode(array('status' => true, 'data' => $data));
	}	 
	
	public function getRegisterRencanaKontrol()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$register_pasien_rencana_kontrol = $this->RegisterPasienRencanaKontrol_model->getByRegisterId($postData->id);
		$data = array();
		foreach ($register_pasien_rencana_kontrol as $rows) {
			$data[] = array(
				'tanggal_kontrol' => $rows->tanggal_kontrol,
				'alasan_kontrol' => $rows->alasan_kontrol
			);
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => $data));
	}	 	

	function savePembayaran()
	{
		$this->output->unset_template();

		if (!$this->ion_auth->logged_in())
		{
			header('Content-Type: application/json');
            $response = array('status' => false, 'error_code' => -1, 'message' => 'Sesi anda habis, silahkan login kembali.');
			echo json_encode($response);			
			die();
		}

		$user = $this->ion_auth->user()->row();				        		
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);

		$id = $postData->id;		
        $register_pasien = $this->RegisterPasien_model->getById($id);

		if($register_pasien != NULL){
			if($register_pasien->state_index == 3){
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

		$pendapatan_paket = $hutang_paket_obat = $pendapatan_obat = $pendapatan_obat_tambahan =$pendapatan_tambahan = $pendapatan_layanan = 0;
		$dataPaket = array();
		$dataPaketObat = array();

		$dataLayanan = array();
		foreach ($postData->invoiceLayanan as $layanan) {
			$pendapatan_layanan += $layanan->jumlah * $layanan->harga;			
			$dataLayanan[] = array(
				'id_register_pasien' => $postData->id,
				'id_layanan' => $layanan->id,
				'jumlah' => $layanan->jumlah,
				'harga' => $layanan->harga
			);
		}

		$dataObat = array();
		foreach ($postData->invoiceObat as $obat) {
			$pendapatan_obat += $obat->jumlah * $obat->harga;						
			$dataObat[] = array(
				'id_register_pasien' => $postData->id,
				'id_obat' => $obat->id,
				'jumlah' => $obat->jumlah,
				'harga' => ($register_pasien->jenis_pemeriksaan === 'Paket Layanan' && $register_pasien->id_reference !== null) ? 0 : $obat->harga,
				'is_paket' => ($register_pasien->jenis_pemeriksaan === 'Paket Layanan') ? 1 : 0
			);
		}		

		//$dataObatTambahan = array();
		foreach ($postData->invoiceObatTambahan as $obatTambahan) {
			$pendapatan_obat_tambahan += $obatTambahan->jumlah * $obatTambahan->harga;						
			$dataObat[] = array(
				'id_register_pasien' => $postData->id,
				'id_obat' => $obatTambahan->id,
				'jumlah' => $obatTambahan->jumlah,
				'harga' => $obatTambahan->harga,
				'is_paket' => 0			
			);
		}				

		$dataTambahan = array();
		foreach ($postData->invoiceTambahan as $tambahan) {
			$pendapatan_tambahan += $tambahan->jumlah * $tambahan->harga;									
			$dataTambahan[] = array(
				'id_register_pasien' => $postData->id,
				'nama_tambahan' => $tambahan->nama,
				'jumlah' => $tambahan->jumlah,
				'harga' => $tambahan->harga
			);
		}		

		$dataCaraBayar = array();
		foreach ($postData->invoiceBayar as $bayar) {
			
			$dataCaraBayar[] = array(
				'id_register_pasien' => $postData->id,
				'id_cara_bayar' => $bayar->id,
				'jumlah' => ($bayar->akun == '111') ? $bayar->harga - $postData->kembalian : $bayar->harga
			);
		}		

		if($register_pasien->jenis_pemeriksaan === 'Paket Layanan' && $register_pasien->id_reference === null){
			//ini paket layanan pertama			
			$order_paket = 0;
			$namaTransaksi = "Pembayaran Paket Layanan " . $postData->noRegistrasi;
			foreach ($postData->invoicePaket as $paket) {
				$pendapatan_paket += $paket->jumlah * $paket->harga;						
				$dataPaket[] = array(
					'id_register_pasien' => $postData->id,
					'id_obat' => $paket->id,
					'jumlah' => $paket->jumlah,
					'harga' => $paket->harga,
					'arus' => 'Debit',
					'id_reference' => $register_pasien->id_reference ?? $postData->id													
				);
			}	
			
			foreach ($postData->invoiceObat as $paketObat) {
				$dataPaketObat[] = array(
					'id_register_pasien' => $postData->id,
					'id_obat' => $paketObat->id,
					'jumlah' => $paketObat->jumlah,
					'harga' => $paketObat->harga,
					'arus' => 'Kredit',				
					'id_reference' => $register_pasien->id_reference ?? $postData->id								
				);
			}	
			
			$hutang_paket_obat = $pendapatan_paket - $pendapatan_obat;		

			$dataDetail = [
				'id' => $id, 
				'diskon' => $diskon,
				'pajak' => $pajak,
				'pendapatan_layanan' => $pendapatan_layanan,
				'pendapatan_obat' => $pendapatan_obat + $pendapatan_obat_tambahan,
				'hutang_paket' => $hutang_paket_obat,
				'pendapatan_tambahan' => $pendapatan_tambahan,	
			];							
		}
		else if($register_pasien->id_reference !== null){
			//ini paket layanan kedua dst
			$order_paket = 1;			
			$namaTransaksi = "Pembayaran Paket Layanan " . $postData->noRegistrasi;			
			foreach ($postData->invoiceObat as $paketObat) {
				$dataPaketObat[] = array(
					'id_register_pasien' => $postData->id,
					'id_obat' => $paketObat->id,
					'jumlah' => $paketObat->jumlah,
					'harga' => $paketObat->harga,
					'arus' => 'Kredit',				
					'id_reference' => $register_pasien->id_reference ?? $postData->id								
				);
			}
			$hutang_paket_obat = $pendapatan_obat;									

			$dataDetail = [
				'id' => $id, 
				'diskon' => $diskon,
				'pajak' => $pajak,
				'pendapatan_layanan' => $pendapatan_layanan,
				'pendapatan_obat' => $pendapatan_obat + $pendapatan_obat_tambahan,
				'pendapatan_tambahan' => $pendapatan_tambahan,	
				'hutang' => $hutang_paket_obat
			];									
		}
		else{
			//ini layanan umum
			$namaTransaksi = "Pembayaran Rawat Jalan " . $postData->noRegistrasi;	

			$dataDetail = [
				'id' => $id, 
				'diskon' => $diskon,
				'pajak' => $pajak,
				'pendapatan_layanan' => $pendapatan_layanan,
				'pendapatan_obat' => $pendapatan_obat,
				'pendapatan_tambahan' => $pendapatan_tambahan,	
				'hutang' => 0				
			];						
		}

		//$result = array('status' => true, 'data' => $postData, 'register_pasien' => $register_pasien);		
		//header('Content-Type: application/json');
		//echo json_encode($result);		
		//die();

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
			'state_index' => 3,
			'modified_by' => $user->id,
			'keterangan4' => $keterangan            
		];

		$dataHeader = [
			'tanggal' => $tanggalBayar, 
			'nama' => $namaTransaksi, 
			'id_reference' => $id,
			'tipe_transaksi' => "Rawat Jalan",
			'id_klinik' => $user->id_klinik, 
			'modified_by' => $user->id
		];
				


		$dataJurnal = ['header' => $dataHeader, 'detail' => $dataDetail];

		$result = array();

		$this->db->trans_start();
			if (count($dataLayanan) > 0) {
				$this->RegisterPasienLayanan_model->deleteByRegisterId($postData->id);
				$this->RegisterPasienLayanan_model->insertBatch($dataLayanan);
			}		

			if($order_paket !== -1){
				if($order_paket === 0){
					if (count($dataPaket) > 0) {
						//$this->RegisterPasienPaket_model->deleteByRegisterId($postData->id);
						$this->RegisterPasienPaket_model->insertBatch($dataPaket);
					}			
				}				
				if (count($dataPaketObat) > 0) {
					//$this->RegisterPasienPaket_model->deleteByRegisterId($postData->id);
					$this->RegisterPasienPaket_model->insertBatch($dataPaketObat);
				}							
			}

			if (count($dataObat) > 0) {
				$this->RegisterPasienObat_model->deleteByRegisterId($postData->id);
				$this->RegisterPasienObat_model->insertBatch($dataObat);
				$this->RegisterPasienObat_model->logStok($postData->id, $user->id, $user->id_klinik);													
				$this->RegisterPasienObat_model->updateStok($postData->id);									
			}

			if (count($dataTambahan) > 0) {
				$this->RegisterPasienTambahan_model->insertBatch($dataTambahan);
			}		

			if (count($dataCaraBayar) > 0) {
				$this->RegisterPasienPembayaran_model->insertBatch($dataCaraBayar);
			}				

			$this->RegisterPasien_model->save($dataPendaftaran);
			if($order_paket === 0)
				$this->RegisterPasien_model->saveToJurnalPaket($dataJurnal);	
			else				
				$this->RegisterPasien_model->saveToJurnal($dataJurnal);	
			
			if($order_paket !== -1){
				$paket = $this->RegisterPasienPaket_model->getByReferenceId($register_pasien->id_reference ?? $postData->id);				
				if($paket->paket_sisa > 0)
				{
					$this->RegisterPasien_model->saveNextPendaftaran($postData->id);	
					$is_reminder = true;


				}
			}

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
            $response = array('status' => false, 'message' => 'Penyimpanan data gagal, silahkan hubungi admin.');			
		} else {
			$result = array('status' => true, 'data' => null);
			$sms_reminder = $wa_reminder = $sms_rencana_kontrol = $wa_rencana_kontrol = "";

			if($is_reminder){
				$reminder_kontrol = $this->RegisterPasien_model->getSmsDataByRegisterId($postData->id);
				$sms_reminder = $this->sendSMS($reminder_kontrol);
				//$wa_reminder = $this->sendWA($reminder_kontrol);
			}						

			$rencana_kontrol = $this->RegisterPasienRencanaKontrol_model->getSmsDataByRegisterId($id);
			$sms_rencana_kontrol = $this->sendSMS($rencana_kontrol);
			//$wa_rencana_kontrol = $this->sendWA($rencana_kontrol);
			$result['data'] = [
				'reminder_kontrol_sms' => $sms_reminder, 
				'reminder_kontrol_wa' => $wa_reminder, 
				'rencana_kontrol_sms' => $sms_rencana_kontrol, 
				'rencana_kontrol_wa' => $wa_rencana_kontrol
			];			
		}
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
	}	

	public function getRegisterDetail()
	{
		$this->output->unset_template();
		$id = $this->input->get('id', TRUE);		
		$register_pasien_obat = $this->RegisterPasienObat_model->getByRegisterId($id);
		$dataObat = array();
		foreach ($register_pasien_obat as $rows) {
			$dataObat[] = array(
				'id' => $rows->id_obat,
				'nama' => $rows->nama_obat,				
				'jumlah' => $rows->jumlah,
				'harga' => $rows->harga_jual
			);
		}
		$register_pasien_layanan = $this->RegisterPasienLayanan_model->getByRegisterId($id);
		$dataLayanan = array();
		foreach ($register_pasien_layanan as $rows) {
			$dataLayanan[] = array(
				'id' => $rows->id_layanan,
				'nama' => $rows->nama_layanan,				
				'jumlah' => $rows->jumlah,
				'harga' => $rows->harga_layanan
			);
		}
		$register_pasien_obat = $this->RegisterPasienObat_model->getByRegisterId($id);
		$dataObat = array();
		foreach ($register_pasien_obat as $rows) {
			$dataObat[] = array(
				'id' => $rows->id_obat,
				'nama' => $rows->nama_obat,				
				'jumlah' => $rows->jumlah,
				'harga' => $rows->harga_jual
			);
		}

		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => array('data_obat' => $dataObat, 'data_layanan' => $dataLayanan)));
    }		

	public function sendSMS($rencana_kontrols)
	{
		ob_start();
		// setting 
		$apikey      = 'c71464ead4de21b106d04a86682f4ca9'; // api key 
		$urlendpoint = 'http://sms114.xyz/sms/api_sms_masking_send_json.php'; // url endpoint api 
		$callbackurl = 'http://sms114.xyz/sms/api_sms_masking_balance_json.php'; // url callback get status sms 
		
		// create header json  
		$senddata = array(
			'apikey' => $apikey,  
			'callbackurl' => $callbackurl, 
			'datapacket'=>array()
		);

		foreach($rencana_kontrols as $rencana_kontrol){
			$sendingdatetime = date('Y-m-d 12:i:s', strtotime('-2 day', strtotime($rencana_kontrol->tanggal_kontrol)));
			$message = "Kpd Yth ". $rencana_kontrol->nama_pasien ." bhw jadwal kontrol Anda terkait ". $rencana_kontrol->alasan_kontrol ." jatuh pd tgl ". dateFormat($rencana_kontrol->tanggal_kontrol) ." (Hub ". $rencana_kontrol->no_telp ." ". $rencana_kontrol->nama_klinik .")";			
			array_push($senddata['datapacket'],array(
				'number' => trim($rencana_kontrol->no_telp_pasien),
				'message' => urlencode(stripslashes(utf8_encode($message))),
				'sendingdatetime' => $sendingdatetime)
			);			
		}

		$data=json_encode($senddata);
		$curlHandle = curl_init($urlendpoint);
		curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curlHandle, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data))
		);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT, 5);
		curl_setopt($curlHandle, CURLOPT_CONNECTTIMEOUT, 5);
		$responjson = curl_exec($curlHandle);
		curl_close($curlHandle);		
		return $responjson;
	}

	public function sendWA($rencana_kontrols)
	{
		ob_start();
		// setting 
		$apikey      = 'c71464ead4de21b106d04a86682f4ca9'; // api key 
		$urlendpoint = 'http://sms114.xyz/sms/api_whatsapp_send_json.php'; // url endpoint api 
		$waid = '35H085'; // whatsapp id 
		
		// create header json  
		$senddata = array(
			'apikey' => $apikey,  
			'waid' => $waid, 
			'datapacket'=>array()
		);

		
		foreach($rencana_kontrols as $rencana_kontrol){
			$sendingdatetime = date('Y-m-d 12:i:s', strtotime('-2 day', strtotime($rencana_kontrol->tanggal_kontrol)));
			$message = "Sehubungan dengan akan dilakukannya ". $rencana_kontrol->alasan_kontrol ." ke ". $rencana_kontrol->nama_unit_layanan ." terhadap saudara/saudari ". $rencana_kontrol->nama_pasien ." pada tanggal ". dateFormat($rencana_kontrol->tanggal_kontrol) ." di ". $rencana_kontrol->nama_klinik .", maka diharapkan untuk dapat melakukan pendaftaran sejak saat ini ke nomor telepon/WA ". $rencana_kontrol->no_telp ."/". $rencana_kontrol->no_hp .".
			Terimakasih atas perhatian dan kerjasamanya.
			Ttd - Admin ". $rencana_kontrol->nama_klinik .".
			_pesan ini dikirim melalui sistem, harap tidak membalas.";			
			array_push($senddata['datapacket'],array(
				'number' => trim($rencana_kontrol->no_telp_pasien),
				'message' => urlencode(stripslashes(utf8_encode($message))),
				'sendingdatetime' => $sendingdatetime)
			);			
		}		
		
		
		$data=json_encode($senddata);
		$curlHandle = curl_init($urlendpoint);
		curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curlHandle, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data))
		);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
		curl_setopt($curlHandle, CURLOPT_CONNECTTIMEOUT, 30);
		$responjson = curl_exec($curlHandle);
		curl_close($curlHandle);		
		return $responjson;
	}	
}
