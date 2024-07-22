<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman_model extends CI_Model {

    private $table_name = 'pengumuman'; //nama tabel dari database

    function __construct()
	{
		parent::__construct();
    }

    public function getByKlinik($id_klinik){
        $this->db->order_by('created_at DESC');
        $this->db->limit(5);        
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
      
    public function delete($id, $user_id)
    {
        $this->db->where('id', $id);                    
        $this->db->update($this->table_name, array('is_deleted' => 1, 'modified_by' => $user_id));                        
        return $this->db->affected_rows();
    }        

}