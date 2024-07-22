<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Radiology_model extends CI_Model {
    private $dbcon;
    private $primary_key = "id";
    private $table_name = 'radiology'; //nama tabel dari database
    private $view_name = 'v_radiology'; //nama tabel dari database
    private $allow_search_column = array('nama_pasien'); //field yang diizin untuk searching
    private $allow_order_column = array(null, 'nama_pasien'); //field yang diizin untuk sorting;
    private $default_order_column = array('nama_pasien' => 'asc'); // default order

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

    public function getById($id){
        $query = $this->db->get_where($this->view_name, array('id' => $id));
        return $query->row();         
    }    

    public function getByParam($data)
    {
        $query = $this->db->get_where($this->view_name, $data);
        return $query->row();        
    }   

    public function getByRegisterId($register_id, $reference_type)
    {
        $query = $this->db->get_where($this->view_name, array('id_reference' => $register_id, 'tipe_reference' => $reference_type));
        return $query->result();        
    }    

    public function create($data)
    {
        $this->db->insert($this->table_name, $data);
    }     
     
    public function getDataTable($parameter, $where)
    {
        $columns = array(
            [
                "db" => "no_registrasi",
                "dt" => "no_registrasi",
            ],
            [
                "db" => "no_rm",
                "dt" => "no_rm",
            ],
            [
                "db" => "nama_pasien",
                "dt" => "nama_pasien",
            ],   
            [
                "db" => "nama_dokter",
                "dt" => "nama_dokter",
            ], 
            [
                "db" => "dokter_ahli",
                "dt" => "dokter_ahli",
            ], 
            [
                "db" => "tanggal_daftar",
                "dt" => "tanggal_daftar",
            ], 
            [
                "db" => "tanggal_masuk",
                "dt" => "tanggal_masuk",
            ],             
            [
                "db" => "tanggal_pemeriksaan",
                "dt" => "tanggal_pemeriksaan",
            ], 
            [
                "db" => "id_radiology_type",
                "dt" => "id_radiology_type",
            ],                             
            [
                "db" => "id_pasien",
                "dt" => "id_pasien",
            ],  
            [
                "db" => "id",
                "dt" => "id",
            ] ,
            [
                "db" => "id_klinik",
                "dt" => "id_klinik",
            ],
            [
                "db" => "id_unit_layanan",
                "dt" => "id_unit_layanan",
            ],
            [
                "db" => "id_dokter",
                "dt" => "id_dokter",
            ],
            [
                "db" => "id_tipe_pasien",
                "dt" => "id_tipe_pasien",
            ],            
            [
                "db" => "id_petugas",
                "dt" => "id_petugas",
            ],                        
                                                                                                                                                                                                                                                      
        );
        $result = \SSP::complex($parameter, $this->dbcon, $this->view_name, $this->primary_key, $columns, null, $where);			
        return $result;        
    }
    public function save($data)
    {
        $dataUpdate = $data;
        unset($dataUpdate["id"]);
        $this->db->where('id', $data['id']);
        $this->db->update($this->table_name, $dataUpdate);
        return $data;
    }   
    
    public function updateBatch($data)
    {
		foreach ($data as $rows) {        
            $this->db->where('id', $rows['id']);
            $this->db->update($this->table_name, $rows);        
        }    
        return $data;
    }       
}