<?php defined('BASEPATH') OR exit('No direct script access allowed');

class UnitLayanan_model extends CI_Model {

    private $table_name = 'unit_layanan'; //nama tabel dari database
    private $allow_search_column = array('nama_unit_layanan'); //field yang diizin untuk searching
    private $allow_order_column = array(null, 'nama_unit_layanan'); //field yang diizin untuk sorting;
    private $default_order_column = array('nama_unit_layanan' => 'asc'); // default order

    function __construct()
	{
        parent::__construct();
		$this->load->helper('my_datatable_helper');        
    }

    public function getById($id){
        $query = $this->db->get_where($this->table_name, array('id' => $id));
        return $query->row();
    }

    public function getByKlinikSelect($id_klinik){
        $this->db->select('id, nama_unit_layanan, ihs_location');        
        $query = $this->db->get_where($this->table_name, array('id_klinik' => $id_klinik, 'is_deleted' => 0));
        return $query->result();
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

    public function getRegisterDokterById($id){
        $query = $this->db->get_where('v_dokter_unit_layanan', array('id_unit_layanan' => $id));
        return $query->result();
    }

    public function getRegisterDokterByIdDataTable($parameter, $where){
        $datatable_config = array('table_name'=>'dokter', 'allow_search_column'=>array('nama_dokter'), 'allow_order_column'=>array(null, 'nama_dokter'), 'default_order_column'=>array('nama_dokter' => 'asc'), 'extend_filter' => $where);                
        $result = get_datatables($datatable_config, $parameter);
        return $result;         
    }    

    public function getRegisterLayananById($id){
        $query = $this->db->get_where('v_register_layanan', array('id_unit_layanan' => $id));
        return $query->result();
    }

    public function saveBatchRegisterDokter($data){
        $this->db->insert_batch('dokter_unit_layanan', $data);      
    }

    public function deleteRegisterDokter($id)
    {
        $this->db->delete('dokter_unit_layanan', array('id' => $id));        
        return $this->db->affected_rows();
    }     

    public function getRegisterLayananByIdDataTable($parameter, $where){
        $datatable_config = array('table_name'=>'layanan', 'allow_search_column'=>array('nama_layanan'), 'allow_order_column'=>array(null, 'nama_layanan'), 'default_order_column'=>array('nama_layanan' => 'asc'), 'extend_filter' => $where);                
        $result = get_datatables($datatable_config, $parameter);
        return $result;         
    }      

    public function saveBatchRegisterLayanan($data){
        $this->db->insert_batch('register_layanan', $data);      
    }

    public function deleteRegisterLayanan($id)
    {
        $this->db->delete('register_layanan', array('id' => $id));        
        return $this->db->affected_rows();
    }    

    public function getAllUnitLayanan(){
        $query = $this->db->get($this->table_name);
        return $query->result();
    }
}