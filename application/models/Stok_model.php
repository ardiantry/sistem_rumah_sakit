<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_model extends CI_Model {

    private $table_name = 'obat_stok'; //nama tabel dari database
    private $view_name = 'v_obat_stok'; //nama view dari database    
    private $allow_search_column = array('nama_obat'); //field yang diizin untuk searching
    private $allow_order_column = array(null, 'nama_obat','expired_date'); //field yang diizin untuk sorting;
    private $default_order_column = array('nama_obat' => 'asc', 'stok_kosong' => 'desc', 'expired_date' => 'asc'); // default order

    function __construct()
	{
		parent::__construct();
		$this->load->helper('my_datatable_helper');
    }

    public function getDataTable($parameter, $where){
        $datatable_config = array('table_name'=> $this->view_name , 'allow_search_column'=>$this->allow_search_column, 'allow_order_column'=>$this->allow_order_column, 'default_order_column'=>$this->default_order_column, 'extend_filter' => $where);    

     $result = get_datatables($datatable_config, $parameter);
       // print_r($datatable_config);
        return $result;         
    }

    public function getRingkasanDataTable($parameter, $where){
        $datatable_config = array('table_name'=> 'v_obat_stok_ringkasan' , 'allow_search_column'=> $this->allow_search_column, 'allow_order_column'=>$this->allow_order_column, 'default_order_column'=>array('nama_obat' => 'asc'), 'extend_filter' => $where);                
        $result = get_datatables($datatable_config, $parameter);
        return $result;         
    }    
    

    public function update($data)
    {
        $dataUpdate = $data;
        unset($dataUpdate["id"]);
        $this->db->where('id', $data['id']);            
        $this->db->update($this->table_name, $data);            
    }     

    public function koreksi($data)
    {
        $sp = "CALL uSP_KoreksiToJurnal(?, ?, ?, ?, ?, ?, ?, ?)";
        $this->db->query($sp, $data);
        mysqli_next_result($this->db->conn_id);        
    }    
    
    public function retur($data)
    {
        $sp = "CALL uSP_ReturToJurnal(?, ?, ?, ?, ?, ?, ?, ?)";
        $this->db->query($sp, $data);
        mysqli_next_result($this->db->conn_id);        
    }    

    public function delete($id, $user_id)
    {
        $this->db->where('id', $id);                    
        $this->db->update($this->table_name, array('is_deleted' => 1, 'modified_by' => $user_id));                        
        return $this->db->affected_rows();
    }            
}