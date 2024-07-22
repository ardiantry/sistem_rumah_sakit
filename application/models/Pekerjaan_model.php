<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan_model extends CI_Model {

    private $table_name = 'pekerjaan'; //nama tabel dari database
    private $view_name = ''; //nama tabel dari database
    private $allow_search_column = array(); //field yang diizin untuk searching
    private $allow_order_column = array(); //field yang diizin untuk sorting;
    private $default_order_column = array(); // default order

    function __construct()
	{
		parent::__construct();
    }

    public function getById($id){
        $query = $this->db->get_where($this->view_name, array('id' => $id));
        return $query->row();         
    }

    public function getByKlinik($id){
        $query = $this->db->get_where($this->table_name, array('id_klinik' => $id, 'is_deleted' => 0));
        return $query->result();         
    }

    public function save($data)
    {
        $this->db->trans_start();     
        if($data["id"] == 0){
            unset($data["id"]);            
            $data["modified_by"] = $this->ion_auth->user()->row()->id;
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
        //$this->db->delete($this->table_name, array('id' => $id));  
        $this->db->where('id', $id);                    
        $this->db->update($this->table_name, array('is_deleted' => 1, 'modified_by' => $user_id));                
        return $this->db->affected_rows();
    }    
        
}