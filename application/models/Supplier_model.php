<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model {

    private $table_name = 'supplier'; //nama tabel dari database

    function __construct()
	{
		parent::__construct();
    }

    public function getByKlinik($id_klinik){
        $query = $this->db->get_where($this->table_name, array('id_klinik' => $id_klinik, 'is_deleted' => 0));
        return $query->result();
    }    

    public function save($data)
    {
        $this->db->trans_start();     
        if($data["id"] == 0){
            unset($data["id"]);            
            $this->db->insert($this->table_name, $data);
            $data["id"] = $this->db->insert_id();
        }  
        else{
            $dataUpdate = $data;
            unset($dataUpdate["id"]);
            $this->db->where('id', $data['id']);            
            $this->db->update($this->table_name, $data);            
        }

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
            return array('status' => false, 'message' => $this->db->error());
        else
            return array('status' => true, 'data' => $data);        
    }         
    
    public function delete($id)
    {
        $this->db->where('id', $id);                    
        $this->db->update($this->table_name, array('is_deleted' => 1));                        
        return $this->db->affected_rows();
    }   
}