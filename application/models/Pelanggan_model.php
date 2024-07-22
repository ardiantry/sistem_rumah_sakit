<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

    private $table_name = 'pelanggan'; //nama tabel dari database
    private $view_name = 'v_pelanggan'; //nama tabel dari database
    private $allow_search_column = array('no_pelanggan','nama_pelanggan'); //field yang diizin untuk searching
    private $allow_order_column = array(null, 'no_pelanggan','nama_pelanggan'); //field yang diizin untuk sorting;
    private $default_order_column = array('no_pelanggan' => 'asc'); // default order

    function __construct()
	{
		parent::__construct();
		$this->load->helper('my_datatable_helper');
    }

    public function getById($id){
        $query = $this->db->get_where($this->view_name, array('id' => $id));
        return $query->row();         
    }

    public function getDataTable($parameter, $where){
        $datatable_config = array('table_name'=>$this->view_name, 'allow_search_column'=>$this->allow_search_column, 'allow_order_column'=>$this->allow_order_column, 'default_order_column'=>$this->default_order_column, 'extend_filter' => $where);                
        $result = get_datatables($datatable_config, $parameter);
        return $result;                 
    }    

    public function save($data)
    {
        $this->db->trans_start();     
        if($data["id"] == 0){
            //get kode
            $query = $this->db->query("SELECT RIGHT(CONCAT('000000', CAST(no_pelanggan + 1 AS CHAR)), 6) kode FROM pelanggan ORDER BY no_pelanggan DESC LIMIT 1");
            $row = $query->row();
            $data["no_pelanggan"] = $row->kode ?? '000001';            
            $query->free_result();            
            unset($data["id"]);            
            $this->db->insert($this->table_name, $data);
            $data["id"] = $this->db->insert_id();
        }  
        else{
            $dataUpdate = $data;
            unset($dataUpdate["id"]); 
            $this->db->where('id',$data['id']);            
            $this->db->update($this->table_name, $data);            
        }

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
            return array('status' => false, 'message' => $this->db->error());
        else
            return array('status' => true, 'data' => $data);        
    }     
}