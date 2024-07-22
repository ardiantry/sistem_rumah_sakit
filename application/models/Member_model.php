<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model {

    private $table_name = 'new_member'; //nama tabel dari database
    private $view_name = 'new_member'; //nama tabel dari database
    private $allow_search_column = array(); //field yang diizin untuk searching
    private $allow_order_column = array(NULL,'first_name','kantor','type_join','alamat_kantor','no_wa','created_at'); //field yang diizin untuk sorting;
    private $default_order_column = array(); // default order

    function __construct()
	{
		parent::__construct();
    }

    public function getById($id){
        $query = $this->db->get_where($this->table_name, array('id' => $id));
        return $query->row();         
    } 


    public function save($data)
    {
        $this->db->trans_start();      
        if(!@$data["id"]){
           // unset($data["id"]);            
            $this->db->insert($this->table_name, $data);
            $data["id"] = $this->db->insert_id();
            if(@$data["type_join"]=='premium')
            {
                $data_billing=array('id_member'=>@$data["id"],'nominal'=>@$data["nominal"]);
                 $this->db->insert('billing_member', $data_billing);
            }    $this->db->insert_id();
        }  
        else{
            $dataUpdate = $data;
            unset($dataUpdate["id"]);
            $this->db->where('id', $data['id']);            
            $this->db->update($this->table_name, $data);            
        }

      return  $this->db->trans_complete();
            
    }  
    public function get_email($email)
    {
       $query = $this->db->get_where('users', array('email' => $email));
        $users=$query->row();   

       if(!$users)
       {
            $query = $this->db->get_where($this->table_name, array('identity' => $email));
            $users=$query->row();

       }
       return  $users; 
    } 
     public function getDataTable($parameter, $where){
        $datatable_config = array('table_name'=>$this->view_name, 'allow_search_column'=>$this->allow_search_column, 'allow_order_column'=>$this->allow_order_column, 'default_order_column'=>$this->default_order_column, 'extend_filter' => $where);                
        $result = get_datatables($datatable_config, $parameter);
        return $result;          
    }
    public function delete($id)
    { 

        $this->db->trans_start();             
        $this->db->where('id', $id);                    
        $this->db->update($this->table_name, array('is_deleted' => 1, 'updated_at' => date('Y-m-d h:i:s')));                                
        return $this->db->trans_complete();
    }  
}