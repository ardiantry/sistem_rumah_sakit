<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan_model extends CI_Model
{
    private $table_name = 'pemesanan'; //nama tabel dari database
    private $view_name = 'v_pemesanan'; //nama tabel dari database
    private $allow_search_column = array('no_po', 'tanggal_po', 'nama_supplier'); //field yang diizin untuk searching
    private $allow_order_column = array(null, 'no_po', 'tanggal_po', 'nama_supplier'); //field yang diizin untuk sorting;
    private $default_order_column = array('no_po' => 'asc'); // default order

    function __construct()
    {
        parent::__construct();
        $this->load->helper('my_datatable_helper');
    }

    public function getDetailByIdPo($id)
    {
        $query = $this->db->get_where('v_pemesanan_detail', array('id_po' => $id));
        return $query->result();         
    }    

    public function getDataTable($parameter, $where)
    {
        $datatable_config = array('table_name' => $this->view_name, 'allow_search_column' => $this->allow_search_column, 'allow_order_column' => $this->allow_order_column, 'default_order_column' => $this->default_order_column, 'extend_filter' => $where);
        $result = get_datatables($datatable_config, $parameter);
        return $result;
    }

    public function save($data)
    {
        //$this->db->trans_start();     
        if ($data["id"] == 0) {
            //get kode
            unset($data["id"]);
            $this->db->insert($this->table_name, $data);
            $data["id"] = $this->db->insert_id();
        } else {
            $dataUpdate = $data;
            unset($dataUpdate["id"]);
            $this->db->where('id', $data['id']);
            $this->db->update($this->table_name, $data);
        }
        return $data;
    }

    public function insertBatchObat($data)
    {
        $this->db->insert_batch('pemesanan_detail', $data);
    }

    public function deleteByIdPo($id_po)
    {
        $this->db->delete('pemesanan_detail', array('id_po' => $id_po));
    }    
 
}
