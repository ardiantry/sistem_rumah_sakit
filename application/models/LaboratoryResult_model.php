<?php defined('BASEPATH') OR exit('No direct script access allowed');

class LaboratoryResult_model extends CI_Model {

    private $table_name = 'laboratory_result'; //nama tabel dari database
    private $view_name = ''; //nama tabel dari database
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

    public function clear($id)
    {
        $this->db->delete($this->table_name, array('id_laboratory' => $id));        
    }     
}