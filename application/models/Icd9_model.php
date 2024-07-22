<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Icd9_model extends CI_Model {

    private $table_name = 'icd9'; //nama tabel dari database
    private $allow_search_column = array('icd9_code', 'icd9_name'); //field yang diizin untuk searching
    private $allow_order_column = array(null, 'icd9_code', 'icd9_name'); //field yang diizin untuk sorting;
    private $default_order_column = array('icd9_name' => 'asc'); // default order

    function __construct()
	{
		parent::__construct();
    }

    public function getDataTable($parameter, $where = NULL){
        $datatable_config = array('table_name'=> $this->table_name , 'allow_search_column'=>$this->allow_search_column, 'allow_order_column'=>$this->allow_order_column, 'default_order_column'=>$this->default_order_column, 'extend_filter' => $where);                
        $result = get_datatables($datatable_config, $parameter);
        return $result;         
    }    

    public function getAllIcd9(){
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function getIcd9Autocomplete($query_string){
        $this->db->like('icd9_name', $query_string);    
        $query = $this->db->get($this->table_name);
        return $query->result();
    }    
}