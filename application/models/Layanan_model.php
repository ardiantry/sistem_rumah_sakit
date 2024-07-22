<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_model extends CI_Model {
    private $dbcon;
    private $primary_key = "id_layanan";  
    private $table_name = 'layanan'; //nama tabel dari database
    private $view_name = 'v_register_layanan'; //nama tabel dari database    
    private $allow_search_column = array('nama_layanan', 'harga_layanan'); //field yang diizin untuk searching
    private $allow_order_column = array(null, 'nama_layanan', 'harga_layanan'); //field yang diizin untuk sorting;
    private $default_order_column = array('nama_layanan' => 'asc'); // default order

    function __construct()
	{
		parent::__construct();
        require_once APPPATH . 'third_party/ssp.class.php';
        $this->dbcon = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );            
    }


    public function getDataTable($parameter, $where){
        $columns = array(
            array(
                "db" => "nama_layanan",
                "dt" => "nama_layanan",
            ),
            array(
                "db" => "harga_layanan",
                "dt" => "harga_layanan",
            ),
            array(
                "db" => "harga_layanan_display",
                "dt" => "harga_layanan_display",
            ),
            array(
                "db" => "id_layanan",
                "dt" => "id_layanan",
            ),
        );
        $result = \SSP::complex($parameter, $this->dbcon, $this->view_name, $this->primary_key, $columns, null, $where);			
        return $result;            
    }    

    public function getById($id){
        $query = $this->db->get_where($this->table_name, array('id', $id));
        return $query->row();
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

    public function getAllLayanan(){
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function getLayananByKlinik($id_klinik){
        $query = $this->db->get_where($this->table_name, $id_klinik);
        return $query->result();
    }

    public function getRegisterLayananByKlinik($id_klinik){
        $query = $this->db->get_where('v_register_layanan', $id_klinik);
        return $query->result();
    }    

    public function getRegisterLayananByUnitLayanan($id_unit_layanan){
        $query = $this->db->get_where('v_register_layanan', array('id_unit_layanan' => $id_unit_layanan));
        return $query->result();
    }

    public function getRegisterLayananAutocomplete($id_unit_layanan, $query_string){
        $this->db->like('nama_layanan', $query_string);    
        $query = $this->db->get_where('v_register_layanan', array('id_unit_layanan' => $id_unit_layanan));
        return $query->result();
    }

    public function getRawatInapLayananAutocomplete($id_unit_layanan, $query_string){
        $this->db->like('nama_layanan', $query_string);    
        $query = $this->db->get_where('v_rawat_inap_layanan', array('id_unit_layanan' => $id_unit_layanan));
        return $query->result();
    }    
}