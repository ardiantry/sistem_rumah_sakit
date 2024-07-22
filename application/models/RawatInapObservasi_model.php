<?php defined('BASEPATH') OR exit('No direct script access allowed');

class RawatInapObservasi_model extends CI_Model {

    private $table_name = 'rawat_inap_observasi'; //nama tabel dari database 
    private $view_name = 'rawat_inap_observasi'; //nama tabel dari database 

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
        $this->db->delete($this->table_name, array('id_rawat_inap' => $register_id));
    } 
    public function getByRegisterId($register_id)
    {
        $query = $this->db->get_where($this->table_name, array('id_rawat_inap' => $register_id));
        return $query->result();        
    }
    public function getSmsDataByRegisterId($register_id)
    {
        $query = $this->db->get_where($this->table_name, array('id_rawat_inap' => $register_id));
        return $query->result();        
    }             
}