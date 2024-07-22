<?php defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterPasienRencanaKontrol_model extends CI_Model {

    private $table_name = 'register_pasien_rencana_kontrol'; //nama tabel dari database 
    private $view_name = 'v_register_pasien_rencana_kontrol_sms'; //nama tabel dari database 

    function __construct()
	{
		parent::__construct();
    }
    public function insertBatch($data)
    {
        $this->db->insert_batch($this->table_name, $data);      
    }    
    public function deleteByRegisterId($register_id)
    {
        $this->db->delete($this->table_name, array('id_register_pasien' => $register_id));
    } 
    public function getByRegisterId($register_id)
    {
        $query = $this->db->get_where($this->table_name, array('id_register_pasien' => $register_id));
        return $query->result();        
    }
    public function getSmsDataByRegisterId($register_id)
    {
        $query = $this->db->get_where($this->view_name, array('id_register_pasien' => $register_id));
        return $query->result();        
    }             
}