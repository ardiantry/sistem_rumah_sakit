<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model {

    private $table_name = 'register_pasien'; //nama tabel dari database
    private $view_name = 'v_register_pasien'; //nama tabel dari database
    private $allow_search_column = array('no_registrasi','nama_pasien'); //field yang diizin untuk searching
    private $allow_order_column = array(null, 'no_registrasi','nama_pasien'); //field yang diizin untuk sorting;
    private $default_order_column = array('no_registrasi' => 'asc'); // default order

    function __construct()
	{
		parent::__construct();
		$this->load->helper('my_datatable_helper');
    }

    public function getPendaftaranById($id){
        $query = $this->db->get_where('v_register_pasien', array('id' => $id));
        return $query->row();         
    }

    public function get_register_pasien_datatable($parameter){
        $datatable_config = array('table_name'=>$this->view_name, 'allow_search_column'=>$this->allow_search_column, 'allow_order_column'=>$this->allow_order_column, 'default_order_column'=>$this->default_order_column);                
        $result = get_datatables($datatable_config, $parameter);
        return $result;         
    }    

    public function insert($data)
    {
        $this->db->trans_start();        
        //$this->db->insert($this->table_name, $data);
        $insert_reg_stored_proc = "CALL uSP_Reg(?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $this->db->query($insert_reg_stored_proc, $data);
        mysqli_next_result($this->db->conn_id);
        $result = $query->row();        
        $this->db->trans_complete();
        $ret_arr = array();
        if ($this->db->trans_status() === FALSE)
            return array('status' => 'gagal', 'data' => null);
        else
            return array('status' => 'ok', 'data' => $result);        
    }   
    
    public function update($id, $data){
        $this->db->where('id', $id);
        $this->db->update($this->table_name, $data);        
    }
}