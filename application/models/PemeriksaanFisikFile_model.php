<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PemeriksaanFisikFile_model extends CI_Model {

    private $table_name = 'pemeriksaan_fisik_file'; //nama tabel dari database
    private $view_name = ''; //nama tabel dari database
    private $allow_search_column = array(); //field yang diizin untuk searching
    private $allow_order_column = array(); //field yang diizin untuk sorting;
    private $default_order_column = array(); // default order

    public function getAll(){
        $query = $this->db->get($this->table_name);
        return $query->result();
    }
        
}