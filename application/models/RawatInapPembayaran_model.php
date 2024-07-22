<?php defined('BASEPATH') OR exit('No direct script access allowed');

class RawatInapPembayaran_model extends CI_Model {

    private $table_name = 'rawat_inap_pembayaran'; //nama tabel dari database    
    function __construct()
	{
		parent::__construct();
    }
    public function insertBatch($data)
    {
        $this->db->insert_batch($this->table_name, $data);      
    }    

    public function getByRegisterId($register_id)
    {
        $this->db->select('*');
        $this->db->from('rawat_inap_pembayaran');
        $this->db->join('cara_bayar', 'rawat_inap_pembayaran.id_cara_bayar = cara_bayar.id');
        $this->db->where(array('id_rawat_inap' => $register_id));        
        $query = $this->db->get();
        return $query->result();        
    }         
}