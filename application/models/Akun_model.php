<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Akun_model extends CI_Model {

    private $table_name = 'master_akun'; //nama tabel dari database

    function __construct()
	{
		parent::__construct();
    }

    public function get(){
        $this->db->select("*, CONCAT(kode_akun, ' - ', nama_akun) AS akun_display", FALSE);
        $query = $this->db->get_where($this->table_name, array('is_pilih' => 1, 'is_deleted' => 0));
        return $query->result();
    }
    
    public function getAkunBayar(){
        $this->db->select("*, CONCAT(kode_akun, ' - ', nama_akun) AS akun_display", FALSE);
        $id = array('111', '112', '113', '114', '211', '212');
        $this->db->where_in('id', $id);        
        $query = $this->db->get_where($this->table_name, array('is_pilih' => 1, 'is_deleted' => 0));
        return $query->result();
    }
    
    public function getAkunRetur(){
        $this->db->select("*, CONCAT(kode_akun, ' - ', nama_akun) AS akun_display", FALSE);
        $id = array('111', '112', '114');
        $this->db->where_in('id', $id);        
        $query = $this->db->get_where($this->table_name, array('is_pilih' => 1, 'is_deleted' => 0));
        return $query->result();
    }    
}