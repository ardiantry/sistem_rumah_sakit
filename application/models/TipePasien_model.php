<?php defined('BASEPATH') OR exit('No direct script access allowed');

class TipePasien_model extends CI_Model {

    private $table_name = 'tipe_pasien'; //nama tabel dari database
    private $allow_search_column = array('tipe_pasien'); //field yang diizin untuk searching
    private $allow_order_column = array(null, 'tipe_pasien'); //field yang diizin untuk sorting;
    private $default_order_column = array('tipe_pasien' => 'asc'); // default order

    function __construct()
	{
		parent::__construct();
		//$this->load->helper('MY_datatable');
    }

    public function getAllTipePasien(){
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function getByKlinik($id_klinik){
        $query = $this->db->get_where($this->table_name, "(id_klinik = {$id_klinik} OR id_klinik IS NULL) AND is_deleted = 0");
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