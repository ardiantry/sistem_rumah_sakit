<?php defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiObat extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('TransaksiObat_model');       		        
		$this->load->model('Pelanggan_model');       		                
	}
            
	function getDatatable()
	{
		$this->output->unset_template();
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $where = "state_index <> 1 AND id_klinik=" . $id_klinik . " AND is_deleted=0";						
		$result = $this->TransaksiObat_model->getDataTable($this->input->post(), $where);
		foreach($result['data'] as $key => $value){
            $result['data'][$key]->pelanggan = $this->Pelanggan_model->getById($result['data'][$key]->id_pelanggan);      
            $result['data'][$key]->dataObat = $this->TransaksiObat_model->getDetailByIdTransaksi($result['data'][$key]->id);      
		}		
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
    } 	
    
	function getResepDatatable()
	{
		$this->output->unset_template();
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $where = "state_index=1 AND id_pelanggan IS NOT NULL AND id_klinik=" . $id_klinik . " AND is_deleted=0";						
		$result = $this->TransaksiObat_model->getDataTable($this->input->post(), $where);
		foreach($result['data'] as $key => $value){
            $result['data'][$key]->pelanggan = $this->Pelanggan_model->getById($result['data'][$key]->id_pelanggan);      
            $result['data'][$key]->dataObat = $this->TransaksiObat_model->getDetailByIdTransaksi($result['data'][$key]->id);      
		}				
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
	}    

	function save()
	{
        $this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
		$user = $this->ion_auth->user()->row();				                		
		$data = array(
			'id' => $postData->id,
			'no_transaksi' => $postData->noTransaksi,
            'tanggal_penyerahan_resep' => dateFormatDb($postData->tanggalPenyerahanResep),
            'keterangan' => $postData->keterangan,                      
            'state_index' => $postData->stateIndex,
			'id_pelanggan' => $postData->pelanggan->id ?? NULL,
			'id_klinik' => $user->id_klinik,
            'modified_by' => $user->id                   			                                  
		);

        $dataObat = array();
        
        $response = array();
        $this->db->trans_start();
        
        $data = $this->TransaksiObat_model->save($data);

		foreach ($postData->dataObat as $obat) {
			$dataObat[] = array(
				'id_transaksi_obat' => $data['id'],
				'id_obat' => $obat->id,
				'jumlah' => $obat->jumlah,
				'harga' => $obat->harga
			);
        }
        $this->TransaksiObat_model->deleteByIdTransaksi($data['id']);
		if (count($dataObat) > 0) {
			$this->TransaksiObat_model->insertBatchObat($dataObat);
        }        
        

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
            $response = array('status' => false, 'message' => $this->db->error());
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
		$tanggalBayar = date("Y-m-d H:i:s");
		$namaTransaksi = "Pembelian Resep Luar " . $postData->noRegistrasi;
		$diskon = $postData->totalDiskon;
		$pajak = $postData->totalPajak;		

		$pendapatan_obat = $pendapatan_tambahan = 0;

		$dataTransaksi = array(
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
			'state_index' => 1,
			'modified_by' => $user->id,
			'keterangan2' => $postData->keterangan           
		);

		$dataHeader = [
			'tanggal' => $tanggalBayar, 
			'nama' => $namaTransaksi, 
			'id_reference' => $id,
			'tipe_transaksi' => "Resep Luar",
			'id_klinik' => $user->id_klinik, 
			'modified_by' => $user->id
		];		
		
		$dataObat = array();
		foreach ($postData->invoiceObat as $obat) {
			$pendapatan_obat += $obat->jumlah * $obat->harga;									
			$dataObat[] = array(
				'id_transaksi_obat' => $postData->id,
				'id_obat' => $obat->id,
				'jumlah' => $obat->jumlah,
				'harga' => $obat->harga
			);
		}		

		$dataTambahan = array();
		foreach ($postData->invoiceTambahan as $tambahan) {
			$pendapatan_tambahan += $tambahan->jumlah * $tambahan->harga;												
			$dataTambahan[] = array(
				'id_transaksi_obat' => $postData->id,
				'nama_tambahan' => $tambahan->nama,
				'jumlah' => $tambahan->jumlah,
				'harga' => $tambahan->harga
			);
		}		

		$dataCaraBayar = array();
		foreach ($postData->invoiceBayar as $bayar) {
			$dataCaraBayar[] = array(
				'id_transaksi_obat' => $postData->id,
				'id_cara_bayar' => $bayar->id,
				'jumlah' => ($bayar->akun == '111') ? $bayar->harga - $postData->kembalian : $bayar->harga,			
				'modified_by' => $user->id            				
			);
		}			

		$dataDetail = [
			'id' => $id, 
			'diskon' => $diskon,
			'pajak' => $pajak,
			'pendapatan_obat' => $pendapatan_obat,
			'pendapatan_tambahan' => $pendapatan_tambahan,	
		];			

		$dataJurnal = ['header' => $dataHeader, 'detail' => $dataDetail];		

		
		$result = array();

		$this->db->trans_start();
			if (count($dataObat) > 0) {
				$this->TransaksiObat_model->deleteByIdTransaksi($postData->id);
				$this->TransaksiObat_model->insertBatchObat($dataObat);
				$this->TransaksiObat_model->logStok($postData->id, $user->id, $user->id_klinik);													
				$this->TransaksiObat_model->updateStok($postData->id);									
			}

			if (count($dataTambahan) > 0) {
				$this->TransaksiObat_model->insertBatchTambahan($dataTambahan);
			}		
			if (count($dataCaraBayar) > 0) {
				$this->TransaksiObat_model->insertBatchCaraBayar($dataCaraBayar);
			}				

			$this->TransaksiObat_model->save($dataTransaksi);		
			$this->TransaksiObat_model->saveToJurnal($dataJurnal);						
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
