<?php defined('BASEPATH') OR exit('No direct script access allowed');

class RawatInapPemeriksaanFisik_model extends CI_Model {

    private $table_name = 'rawat_inap_pemeriksaan_fisik'; //nama tabel dari database
    private $view_name = 'rawat_inap_pemeriksaan_fisik'; //nama tabel dari database
    private $allow_search_column = array(); //field yang diizin untuk searching
    private $allow_order_column = array(); //field yang diizin untuk sorting;
    private $default_order_column = array(); // default order

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
        $query = $this->db->get_where($this->view_name, array('id_rawat_inap' => $register_id));
        return $query->result();        
    }    
}