<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CaraBayar_model extends CI_Model {

    private $table_name = 'cara_bayar'; //nama tabel dari database
    private $allow_search_column = array('cara_bayar'); //field yang diizin untuk searching
    private $allow_order_column = array(null, 'cara_bayar'); //field yang diizin untuk sorting;
    private $default_order_column = array('cara_bayar' => 'asc'); // default order

    function __construct()
	{
		parent::__construct();
    }

    public function getByKlinik($id_klinik){
        $query = $this->db->query("SELECT cara_bayar.*, kode_akun, nama_akun, REPLACE(cara_bayar.cara_bayar, ' ', '_') cara_bayar_column FROM cara_bayar
        LEFT JOIN master_akun
        ON cara_bayar.id_akun = master_akun.id
        WHERE cara_bayar.is_deleted = 0 AND cara_bayar.id_klinik = " . $id_klinik);
        //$query = $this->db->get_where($this->table_name, array('id_klinik' => $id_klinik, 'is_deleted' => 0));
        return $query->result();
    }    

    public function getCaraBayarHutangByKlinik($id_klinik){
        $query = $this->db->query("SELECT cara_bayar.*, kode_akun, nama_akun FROM cara_bayar
        LEFT JOIN master_akun
        ON cara_bayar.id_akun = master_akun.id
        WHERE master_akun.id IN ('111', '112') AND cara_bayar.is_deleted = 0 AND cara_bayar.id_klinik = " . $id_klinik);
        //$query = $this->db->get_where($this->table_name, array('id_klinik' => $id_klinik, 'is_deleted' => 0));
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