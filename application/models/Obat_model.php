<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Obat_model extends CI_Model {
    private $dbcon;
    private $primary_key = "id";  
    private $table_name = 'obat'; //nama tabel dari database
    private $view_name = 'v_obat'; //nama view dari database    
    private $allow_search_column = array('nama_obat', 'nama_satuan', 'nama_jenis_obat', 'stok', 'harga_jual'); //field yang diizin untuk searching
    private $allow_order_column = array(null, 'nama_obat', 'nama_satuan', 'nama_jenis_obat', 'stok', 'harga_jual'); //field yang diizin untuk sorting;
    private $allow_search_column_racikan = array('nama_obat', 'nama_satuan', 'nama_jenis_racikan', 'harga_jual'); //field yang diizin untuk searching
    private $allow_order_column_racikan = array(null, 'nama_obat', 'nama_satuan', 'nama_jenis_racikan', 'harga_jual'); //field yang diizin untuk sorting;    
    private $default_order_column = array('nama_obat' => 'asc'); // default order

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
                "db" => "nama_obat",
                "dt" => "nama_obat",
            ),
            array(
                "db" => "harga_jual",
                "dt" => "harga_jual",
            ),
            array(
                "db" => "harga_jual_display",
                "dt" => "harga_jual_display",
            ),
            array(
                "db" => "stok",
                "dt" => "stok",
            ),
            array(
                "db" => "nama_satuan",
                "dt" => "nama_satuan",
            ),       
            array(
                "db" => "nama_jenis_obat",
                "dt" => "nama_jenis_obat",
            ),        
            array(
                "db" => "harga_beli",
                "dt" => "harga_beli",
            ),    
            array(
                "db" => "harga_paket",
                "dt" => "harga_paket",
            ), 
            array(
                "db" => "stok_min",
                "dt" => "stok_min",
            ), 
            array(
                "db" => "stok_max",
                "dt" => "stok_max",
            ),   
            array(
                "db" => "keterangan",
                "dt" => "keterangan",
            ),                       
            array(
                "db" => "id_spesifikasi",
                "dt" => "id_spesifikasi",
            ),  
            array(
                "db" => "id_satuan",
                "dt" => "id_satuan",
            ), 
            array(
                "db" => "id_jenis_obat",
                "dt" => "id_jenis_obat",
            ), 
            array(
                "db" => "id_obat_konversi",
                "dt" => "id_obat_konversi",
            ), 
            array(
                "db" => "jumlah_obat_konversi",
                "dt" => "jumlah_obat_konversi",
            ),  
            array(
                "db" => "order_paket",
                "dt" => "order_paket",
            ),                                                                                                                                                      array(
                "db" => "tipe",
                "dt" => "tipe",
            ),
            array(
                "db" => "id",
                "dt" => "id",
            ),
        );
        $result = \SSP::complex($parameter, $this->dbcon, $this->view_name, $this->primary_key, $columns, null, $where);			
        return $result;         
    }

    public function getPaketDataTable($parameter, $where){
        $datatable_config = array('table_name'=> 'v_obat_paket' , 'allow_search_column'=>$this->allow_search_column, 'allow_order_column'=>$this->allow_order_column, 'default_order_column'=>$this->default_order_column, 'extend_filter' => $where);                
        $result = get_datatables($datatable_config, $parameter);
        return $result;         
    }    

    public function getPaketByKlinik($id_klinik){
        $query = $this->db->get_where('v_obat_paket', array('id_klinik'=> $id_klinik, 'is_deleted'=> 0));
        return $query->result();
    }        
    
    public function getRacikanDataTable($parameter, $where){
        $datatable_config = array('table_name'=> $this->view_name , 'allow_search_column'=>$this->allow_search_column_racikan, 'allow_order_column'=>$this->allow_order_column_racikan, 'default_order_column'=>$this->default_order_column, 'extend_filter' => $where);                
        $result = get_datatables($datatable_config, $parameter);
        return $result;         
    }    

    public function getBahanRacikan($id_racikan){
        $query = $this->db->get_where('v_bahan_racikan', array('id_racikan'=> $id_racikan, 'is_deleted'=> 0));
        return $query->result();
    }  
    public function checkstok($id_racikan){
       

            $this->db->select('obat.stok, obat.stok_min, obat.id');
            $this->db->from('obat');
            $this->db->where('bahan_racikan.id_racikan', $id_racikan);
            $this->db->join('bahan_racikan', 'bahan_racikan.id_obat = obat.id','left');
            $query = $this->db->get();  
            return $query->result();
    }     

    public function getSpesifikasi(){
        $query = $this->db->get_where('spesifikasi', array('is_deleted'=> 0));
        return $query->result();
    }

    public function getSatuan(){
        $query = $this->db->get_where('satuan', array('is_deleted'=> 0));
        return $query->result();
    }

    public function getJenisObat(){
        $query = $this->db->get_where('jenis_obat', array('is_deleted'=> 0));
        return $query->result();
    }

    public function getJenisRacikan(){
        $query = $this->db->get_where('jenis_racikan', array('is_deleted'=> 0));
        return $query->result();
    }

    public function getObat($id_klinik, $id){
        $query = $this->db->get_where('v_obat', array('tipe'=> 'obat', 'id_klinik' => $id_klinik, 'is_deleted'=> 0, 'id<>' => $id));
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

    public function saveRacikan($data)
    {

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
        return (object)$data;        
    }

    public function insertBatchBahanRacikan($data)
    {
        $this->db->insert_batch('bahan_racikan', $data);      
    }    
    public function clearBahanRacikan($id_racikan)
    {
        $this->db->delete('bahan_racikan', array('id_racikan' => $id_racikan));        
    }     

    public function delete($id, $user_id)
    {
        $this->db->where('id', $id);                    
        $this->db->update($this->table_name, array('is_deleted' => 1, 'modified_by' => $user_id));                        
        return $this->db->affected_rows();
    }    

    public function getAllObat(){
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function getObatByKlinik($id_klinik){
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

    public function getObatAutocomplete($id_klinik, $query_string){
        $this->db->like('nama_obat', $query_string);           
        $query = $this->db->get_where($this->view_name, array('id_klinik' => $id_klinik, 'stok >' => 0));
        return $query->result();
    }    
    
    public function getObatPembelianAutocomplete($id_klinik, $query_string){
        $this->db->like('nama_obat', $query_string);           
        $query = $this->db->get_where($this->view_name, array('id_klinik' => $id_klinik, 'is_deleted'=> 0));
        return $query->result();
    }    

    public function getPaketObatAutocomplete($id_klinik, $query_string){
        $this->db->like('nama_obat', $query_string);           
        $query = $this->db->get_where('v_obat_paket', array('id_klinik' => $id_klinik, 'stok >' => 0));
        return $query->result();
    }        

    public function getByKlinik($id){
        $query = $this->db->get_where($this->table_name, array('id_klinik' => $id, 'is_deleted' => 0));
        return $query->result();         
    }    
}