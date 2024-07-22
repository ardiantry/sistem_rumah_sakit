<?php defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal_model extends CI_Model
{
    private $table_name = 'jurnal_header'; //nama tabel dari database sss
    private $view_name = 'v_jurnal_concat'; //nama tabel dari database
    private $allow_search_column = array('tanggal', 'nama'); //field yang diizin untuk searching
    private $allow_order_column = array('tanggal', 'created_at' ); //field yang diizin untuk sorting;
    private $default_order_column = array('tanggal' => 'desc', 'created_at' => 'desc' ); // default order

    function __construct()
    {
        parent::__construct();
    }

    public function getDetailByIdTransaksi($id)
    {
        $query = $this->db->get_where('jurnal_detail', array('id_jurnal_header' => $id));
        return $query->result();         
    }        

    public function getDataTable($parameter, $where, $is_filter)
    {
        $datatable_config = array('main_table' => $this->view_name, 'table_name' => $this->view_name, 'allow_search_column' => $this->allow_search_column, 'allow_order_column' => $this->allow_order_column, 'default_order_column' => $this->default_order_column, 'extend_filter' => $where, 'is_filter' => $is_filter);
        $result = get_datatables($datatable_config, $parameter);
        return $result;
    }

    public function getNeraca($id_klinik, $tanggal = NULL)
    {
        $stored_proc = "CALL uSP_Neraca(?)";
        $query = $this->db->query($stored_proc, $id_klinik);
        mysqli_next_result($this->db->conn_id);  
        return $query->result();                      
    }    
    
    public function getRugiLaba($id_klinik, $tanggal = NULL)
    {
        $stored_proc = "CALL uSP_RugiLaba(?)";
        $query = $this->db->query($stored_proc, $id_klinik);
        mysqli_next_result($this->db->conn_id);  
        return $query->result();                      
    }    

    public function getArusKas($id_klinik, $tanggal = NULL)
    {
        $stored_proc = "CALL uSP_ArusKas(?)";
        $query = $this->db->query($stored_proc, $id_klinik);
        mysqli_next_result($this->db->conn_id);  
        return $query->result();                      
    }      
 
}
