<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter_model extends CI_Model {

    private $table_name = 'dokter'; //nama tabel dari database
    private $view_name = 'v_dokter'; //nama tabel dari database    
    private $allow_search_column = array('nama_dokter'); //field yang diizin untuk searching
    private $allow_order_column = array(null, 'nama_dokter'); //field yang diizin untuk sorting;
    private $default_order_column = array('nama_dokter' => 'asc'); // default order

    function __construct()
	{
		parent::__construct();
    }

    public function getByKlinik($id_klinik){
        $query = $this->db->get_where($this->view_name, array('id_klinik' => $id_klinik, 'is_deleted' => 0));
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

    public function getAllDokter(){
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function getDokterByKlinik($id_klinik){
        $query = $this->db->get_where($this->table_name, $id_klinik);
        return $query->result();
    }

    public function getDokterUnitLayananByKlinik($id_klinik){
        $query = $this->db->get_where('v_dokter_unit_layanan', array('id_klinik_dokter' => $id_klinik));
        return $query->result();
    }    

    public function getDokterUnitLayananByUnitLayanan($id_unit_layanan){
        $this->db->select('id_dokter, nama_dokter');        
        $query = $this->db->get_where('v_dokter_unit_layanan', array('id_unit_layanan' => $id_unit_layanan));
        return $query->result();
    }        
}