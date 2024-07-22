<?php defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiLain_model extends CI_Model
{
    private $table_name = 'transaksi_lain_header'; //nama tabel dari database
    private $view_name = 'v_transaksi_lain_concat'; //nama tabel dari database
    private $allow_search_column = array('tanggal', 'nama'); //field yang diizin untuk searching
    private $allow_order_column = array('tanggal', 'id_transaksi_header' ); //field yang diizin untuk sorting;
    private $default_order_column = array('tanggal' => 'desc', 'id_transaksi_header' => 'desc' ); // default order

    function __construct()
    {
        parent::__construct();
        $this->load->helper('my_datatable_helper');
    }

    public function getDetailByIdTransaksi($id)
    {
        $query = $this->db->get_where('v_transaksi_lain', array('id_transaksi_header' => $id));
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

    public function insertBatchTransaksi($data)
    {
        $this->db->insert_batch('transaksi_lain_detail', $data);
    }

    public function deleteByIdHeader($id_transaksi)
    {
        $this->db->delete('transaksi_lain_detail', array('id_transaksi_header' => $id_transaksi));
    }    
 
}
