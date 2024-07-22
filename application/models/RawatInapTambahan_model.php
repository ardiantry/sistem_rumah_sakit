<?php defined('BASEPATH') OR exit('No direct script access allowed');

class RawatInapTambahan_model extends CI_Model {

    private $table_name = 'rawat_inap_tambahan'; //nama tabel dari database    
    function __construct()
	{
		parent::__construct();
    }
    public function insertBatch($data)
    {
        $this->db->insert_batch($this->table_name, $data);      
    }    

    public function getByRegisterId($register_id)
    {
        $query = $this->db->get_where($this->table_name, array('id_rawat_inap' => $register_id));
        return $query->result();        
    }         
}