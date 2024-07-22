<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Pelanggan_model');
    }
    
    public function getDatatable(){
        $this->output->unset_template();		
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
        $where = "id_klinik=" . $id_klinik . " AND is_deleted=0";
		$result = $this->Pelanggan_model->getDataTable($this->input->post(), $where);		
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);		
    }
    
	public function getById()
	{        
        $this->output->unset_template();
        $response = array('status'=>false);
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
        $result = $this->Pelanggan_model->getById($postData->id);
        if($result == NULL){
            $response['status'] = false;
            $response['message'] = 'Data Tidak Ditemukan';
        }
        else{
            $response['status'] = true;
            $response['data'] = $result;            
        }
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($response);
    }    
    
	function save()
	{
        $this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);
        $id_klinik = $this->ion_auth->user()->row()->id_klinik;
		$data = array(
			'id' => $postData->id,
			'no_pelanggan' => $postData->noPelanggan,
			'nama_pelanggan' => $postData->namaPelanggan,
            'tanggal_lahir' => dateFormatDb($postData->tanggalLahir),
			'umur' => $postData->umur,
			'no_telp' => $postData->noTelp,			
			'alamat' => $postData->alamat,
			'jenis_kelamin' => $postData->jenisKelamin ?? NULL,
            'keterangan' => $postData->keterangan,
			'id_klinik' => $id_klinik            
		);
		$pelanggan_result = $this->Pelanggan_model->save($data);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($pelanggan_result);
	}    
}
