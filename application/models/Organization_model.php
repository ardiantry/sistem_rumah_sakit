<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Organization_model extends CI_Model {

    private $table_name = 'organization'; //nama tabel dari database
    function __construct()
	{
        parent::__construct();
        $this->load->model('User_model');                        				        		                
    }
    
    public function getMainOrg($id_klinik){
        if($id_klinik == 0)
            return (object)$this;
        $query = $this->db->get_where($this->table_name, ['id_klinik' => $id_klinik, 'is_main_org' => 1]);
        return $query->row();         
    }    

    public function replace($data)    
    {
        try {
            $this->db->trans_start();
            $this->db->replace($this->table_name, $data);    
            $this->db->trans_complete();
            return ['status' => TRUE, 'data' => $data];            
        } catch (Exception $e) {
            log_message('error', sprintf('%s : %s : DB transaction failed. Error no: %s, Error msg:%s, Last query: %s', __CLASS__, __FUNCTION__, $e->getCode(), $e->getMessage(), print_r($this->db->last_query(), TRUE)));            
            return ['status' => FALSE, 'message' => $e->getMessage()];            
        }  
    }    
    
    public function delete($id_klinik){
        $this->db->delete($this->table_name, array('id_klinik' => $id_klinik));
    }        
}