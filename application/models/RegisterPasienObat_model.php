<?php defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterPasienObat_model extends CI_Model {

    private $table_name = 'register_pasien_obat'; //nama tabel dari database
    private $view_name = 'v_register_pasien_obat'; //nama view dari database
    private $allow_search_column = array(); //field yang diizin untuk searching
    private $allow_order_column = array(); //field yang diizin untuk sorting;
    private $default_order_column = array(); // default order

    function __construct()
	{
		parent::__construct();
    }

    public function insertBatch($data)
    {
        $this->db->insert_batch($this->table_name, $data);      
    }    
    public function deleteByRegisterId($register_id)
    {
        $this->db->delete($this->table_name, array('id_register_pasien' => $register_id));        
    } 

    public function updateStok($register_id){
        $this->db->query("UPDATE obat_stok
        INNER JOIN log_stok
        ON obat_stok.id = log_stok.id_stok
        SET obat_stok.stok_opname = obat_stok.stok_opname - log_stok.jumlah
        WHERE log_stok.id_reference = $register_id AND tipe_transaksi = 'Rawat Jalan'");        
    }

    public function logStok($id_reference, $user_id, $id_klinik){
        $this->db->query("SET @stok_cumulative := 0");
        $this->db->query("SET @previous := 0");        

        $this->db->query("INSERT INTO log_stok(id_reference, id_stok, id_obat, jumlah, lokasi, arus, harga_beli, harga_jual, tipe_transaksi, id_klinik, modified_by)
        SELECT id_register_pasien id_reference
        , id id_stok
        , id_obat
        , stok_terambil jumlah
        , 'opname' lokasi
        , 'Kredit' arus
        , harga_beli
        , harga_jual 
        , 'Rawat Jalan' tipe_transaksi
        , $id_klinik id_klinik
        , $user_id modified_by
        FROM (
            SELECT id_register_pasien
            , os.id
            , os.id_obat
            , stok_opname
            , harga_beli
            , harga harga_jual
            , @stok_cumulative := IF(@previous=os.id_obat, @stok_cumulative, 0) + stok_opname stok_cumulative
            , jumlah
            , @sisa := @stok_cumulative - jumlah sisa
            , IF(@sisa<0, 0, IF(@sisa>stok_opname, stok_opname, @sisa)) stok_after
            , stok_opname - IF(@sisa<0, 0, IF(@sisa>stok_opname, stok_opname, @sisa)) stok_terambil
            , expired_date 
            , @previous:=os.id_obat
            FROM obat_stok os
            INNER JOIN register_pasien_obat  rpo
            ON os.id_obat = rpo.id_obat
            WHERE id_register_pasien  = $id_reference
            ORDER BY os.id_obat, expired_date ASC, os.created_at ASC
        )t
        WHERE stok_terambil > 0;");   
    }    

    public function getByRegisterId($register_id)
    {
        $query = $this->db->get_where($this->view_name, array('id_register_pasien' => $register_id));
        return $query->result();        
    }     

    public function getByRegisterIdJenisPemeriksaan($register_id, $jenis_pemeriksaan)
    {
        $query = $this->db->get_where($this->view_name, array('id_register_pasien' => $register_id, 'is_paket' => ($jenis_pemeriksaan == 'Umum' ? 0 : 1)));
        return $query->result();        
    }     
}