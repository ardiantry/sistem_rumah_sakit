<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    private $table_name = 'users'; //nama tabel dari database
    private $view_name = 'v_users_group'; //nama tabel dari database    
    
    private $allow_search_column = array('first_name', 'last_name', 'email', 'phone', 'description', 'active'); //field yang diizin untuk searching
    private $allow_order_column = array(null, 'first_name', 'last_name', 'email', 'phone', 'description', 'active'); //field yang diizin untuk sorting;
    private $default_order_column = array('first_name' => 'asc'); // default order

    function __construct()
	{
        parent::__construct();
		$this->load->helper('my_datatable_helper');                
    }

    public function getUserDataTable($parameter, $where){
        $datatable_config = array('table_name'=>$this->view_name, 'allow_search_column'=> $this->allow_search_column, 'allow_order_column'=>$this->allow_order_column, 'default_order_column'=>$this->default_order_column, 'extend_filter' => $where);                
        $result = get_datatables($datatable_config, $parameter);
        return $result;         
    }        

    public function delete($id, $user_id)
    {
        $this->db->where('id', $id);                    
        $this->db->update($this->table_name, array('active'=> 0, 'is_deleted' => 1, 'modified_by' => $user_id));                        
        return $this->db->affected_rows();
    }

    public function getRegisterPrivilege($id){
        $query = $this->db->get_where('v_register_privilege', array('id_user' => $id));
        return $query->result();
    }    

    public function insertRegisterPrivilege($id_user, $status){
        $query = $this->db->select($id_user.' as id_user, id as id_menu, '.$status.' as privilege_status')->get('menu');
        $data = $query->result_array();
        $this->saveRegisterPrivilege($id_user, $data);
    }      

    public function saveRegisterPrivilege($id_user, $data)
    {
        $this->db->trans_start();        
            $this->db->delete('register_menu', array('id_user' => $id_user));                
            $this->db->insert_batch('register_menu', $data);              
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$result = array('status' => false, 'data' => null);
		} else {
			$result = array('status' => true, 'data' => null);
        }        
        return $result;
    }    
}