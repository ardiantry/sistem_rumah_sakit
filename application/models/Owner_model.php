<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Owner_model extends CI_Model {

    private $table_name = 'owner'; //nama tabel dari database
    private $view_name = 'v_owner'; //nama tabel dari database
    private $allow_search_column = array('nama_depan','nama_belakang', 'email'); //field yang diizin untuk searching
    private $allow_order_column = array(null, 'nama_depan','nama_belakang', 'email'); //field yang diizin untuk sorting;
    private $default_order_column = array('nama_depan' => 'asc'); // default order

    public $id = 0;
    public $nama_depan = null;
    public $nama_belakang = null;
    public $nama_perusahaan = null;
    public $email = null;
    public $no_telp = null;
    public $no_fax = null; 
    public $alamat = null;
    public $kota = null;
    public $provinsi = null;
    public $kode_pos = null;
    public $keterangan = null;    
    public $random_password = null;        
    public $klinik = [];

    function __construct()
	{
        parent::__construct();
        $this->load->model('User_model');                        				        		        
		$this->load->helper('my_datatable_helper');        
    }

    public function get(){
        $query = $this->db->get_where($this->table_name, array('is_deleted' => 0));
        return $query->result();         
    }    

    public function getById($id){
        if($id == 0)
            return (object)$this;

        $query = $this->db->get_where($this->table_name, array('id' => $id));
        return $query->row();         
    }

    public function getDataTable($parameter, $where){
        $datatable_config = array('table_name'=>$this->table_name, 'allow_search_column'=>$this->allow_search_column, 'allow_order_column'=>$this->allow_order_column, 'default_order_column'=>$this->default_order_column, 'extend_filter' => $where);                
        $result = get_datatables($datatable_config, $parameter);
        return $result;                 
    }    

    public function save($data)
    {
        $this->db->trans_start();     
        if($data["id"] == 0){
            //get kode
            unset($data["id"]);            
            $this->load->helper('string');
            $password = random_string('alnum', 20);		            
            $data['random_password'] = $password;            

            $this->db->insert($this->table_name, $data);
            $data["id"] = $this->db->insert_id();
            $user = $this->ion_auth->user()->row();				        
			$username = '';
            $email = $data["email"];
            
			$additional_data = array(
						'first_name' => $data["nama_depan"],
						'last_name' => $data["nama_belakang"],
						'phone' => $data["no_telp"], 					
						'active' => TRUE,
						'id_klinik' => 0,
						'modified_by' => $user->id            					
						);
			$group = array(2);			
			

			$result = $this->ion_auth->register($username, $password, $email, $additional_data, $group);
			$this->User_model->insertRegisterPrivilege($result, 0);                					            
        }  
        else{
            $dataUpdate = $data;
            unset($dataUpdate["id"]); 
            $this->db->where('id',$data['id']);            
            $this->db->update($this->table_name, $data);            
        }

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
            return array('status' => FALSE, 'message' => $this->db->error());
        else
            return array('status' => TRUE, 'data' => $data);        
    }    
}