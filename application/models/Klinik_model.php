<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Klinik_model extends CI_Model {

    private $table_name = 'klinik'; //nama tabel dari database
    private $view_name = 'v_klinik'; //nama tabel dari database
    private $allow_search_column = array('nama_klinik', 'email'); //field yang diizin untuk searching
    private $allow_order_column = array(null, 'nama_klinik', 'email'); //field yang diizin untuk sorting;
    private $default_order_column = array('nama_klinik' => 'asc'); // default order

    public $id = 0;
    public $id_owner = 0;    
    public $nama_klinik = null;
    public $email = null;
    public $no_telp = null;
    public $no_fax = null; 
    public $alamat = null;
    public $kota = null;
    public $provinsi = null;
    public $kode_pos = null;
    public $tipe = null;    
    public $keterangan = null;
    public $random_password = null;
    public $status = 0;
    public $logo = "logo_invoice.jpeg";

    function __construct()
	{
        parent::__construct();
        $this->load->model('User_model');                        				        		                
		$this->load->helper('my_datatable_helper');        
    }

    public function klinik($id){
        $query = $this->db->get_where($this->table_name, array('id' => $id));
        return $query->row();         
    }
    public function generate_slug_klinik($id){
    $query = $this->db->get_where($this->table_name, array('id' => $id));
    $select_klinik=$query->row();  
     
    if(@$select_klinik->slug==NULL)
    {
// print_r($select_klinik);
        $slug          =str_replace(' ','_',@$select_klinik->nama_klinik); 
        $query2        = $this->db->query('SELECT * FROM '.$this->table_name.' WHERE id!='.@$select_klinik->id.' AND nama_klinik =\''.@$select_klinik->nama_klinik.'\'');
        $kliniklainnya  =$query2->row(); 
        if($kliniklainnya)
        {
            $slug=str_replace(' ','_',@$select_klinik->nama_klinik).'_'.@$select_klinik->id;  
        }
        $this->db->trans_start();
        $this->db->where('id',@$select_klinik->id);            
        $this->db->update('klinik', array('slug'=>$slug));   
        $this->db->trans_complete();
        $query = $this->db->get_where($this->table_name, array('id' => $id));
        $select_klinik=$query->row();  

    }    
    return $select_klinik;
}
    public function getById($id){
        if($id == 0)
            return (object)$this;

        $query = $this->db->get_where($this->table_name, array('id' => $id));
        return $query->row();         
    }

    public function getByIdOwner($id){
        $query = $this->db->get_where($this->table_name, array('id_owner' => $id));
        return $query->result();         
        //return $query->get_compiled_select();
    }

    public function getByIdentityOwner($id){
        $query = $this->db->query("SELECT klinik.id, nama_klinik FROM owner
        INNER JOIN klinik
        ON owner.id = klinik.id_owner
        WHERE owner.email = '" .  $id . "' 
        AND klinik.is_deleted = 0");
        return $query->result();         
    }    

    public function getTipeLayanan(){
        $listTipeLayanan = [''=>'--pilih tipe layanan--', 1 => 'Klinik & Apotek', 2 => 'Klinik', 3 => 'Apotek'];		
        return  $listTipeLayanan;       
    }

    public function getDataTable($parameter, $where){
        $datatable_config = array('table_name'=>$this->view_name, 'allow_search_column'=>$this->allow_search_column, 'allow_order_column'=>$this->allow_order_column, 'default_order_column'=>$this->default_order_column, 'extend_filter' => $where);                
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
						'first_name' => $data["nama_klinik"],
						'last_name' => "Admin",
						'phone' => $data["no_telp"], 					
						'active' => TRUE,
						'id_klinik' => $data["id"],
						'modified_by' => $user->id            					
						);
			$group = array(3);			
			
			$result = $this->ion_auth->register($username, $password, $email, $additional_data, $group);
			$this->User_model->insertRegisterPrivilege($result, 2);                					            
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

    public function active($data)
    {
        $user = $this->ion_auth->user()->row();

        $this->db->trans_start();     
        //$klinik = $this->getById($data["id"]);

        $dataUpdate = $data;
        unset($dataUpdate["id"]); 
        unset($dataUpdate["pembayaran"]); 

        $this->db->where('id', $data['id']);            
        $this->db->update($this->table_name, $dataUpdate);            

        //$this->db->insert($this->table_name, $data);
        //$data["id"] = $this->db->insert_id();

        $this->db->where('id_klinik', $data['id']);                    
        $this->db->update('users', array('active'=> $data['status'], 'modified_by' => $user->id));                                        

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
            return array('status' => false, 'message' => $this->db->error());
        else
            return array('status' => true, 'data' => $data);        
    } 

    public function delete($id)
    {
        $user = $this->ion_auth->user()->row();
        $this->db->trans_start();             
        $this->db->where('id', $id);                    
        $this->db->update($this->table_name, array('is_deleted' => 1));                                
        
        $this->db->where('id_klinik', $id);                    
        $this->db->update('users', array('active'=> 0, 'is_deleted' => 1, 'modified_by' => $user->id));                                

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
            return array('status' => false, 'message' => $this->db->error());
        else
            return array('status' => true, 'message' => 'Hapus data berhasil');        
    }                    

}