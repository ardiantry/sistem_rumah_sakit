<?php defined('BASEPATH') OR exit('No direct script access allowed');

class RawatInapObat_model extends CI_Model {

    private $table_name = 'rawat_inap_obat'; //nama tabel dari database
    private $view_name = 'v_rawat_inap_obat'; //nama view dari database
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
        $this->db->delete($this->table_name, array('id_rawat_inap' => $register_id));        
    } 
    public function deleteUnreleaseByRegisterId($register_id)
    {
        $this->db->delete($this->table_name, array('id_rawat_inap' => $register_id, 'is_release' => 0));        
    } 

    public function updateStok($register_id){
        $this->db->query("UPDATE obat_stok
        INNER JOIN (   
            SELECT 
                os.id, os.id_obat, MAX(os.stok_opname) - SUM(ls.jumlah) diff
            FROM rawat_inap_obat rio
            INNER JOIN log_stok ls
            ON ls.id_reference = rio.id_rawat_inap 
            AND ls.id_obat = rio.id_obat 
            AND ls.tipe_transaksi='Rawat Inap'
            AND rio.guid = ls.remarks
            INNER JOIN obat_stok os
            ON os.id = ls.id_stok
            WHERE rio.id_rawat_inap = {$register_id} AND rio.is_release = 0
            GROUP BY os.id, os.id_obat
        )t ON obat_stok.id = t.id
        SET obat_stok.stok_opname = t.diff");        
    }

    public function logStok($id_reference, $user_id, $id_klinik){
        $this->db->query("SET @stok_cumulative := 0");
        $this->db->query("SET @previous := 0");        

        $this->db->query("INSERT INTO log_stok(id_reference, id_stok, id_obat, jumlah, lokasi, arus, harga_beli, harga_jual, tipe_transaksi, id_klinik, modified_by, remarks)
        SELECT id_register_pasien id_reference
        , id id_stok
        , id_obat
        , stok_terambil jumlah
        , 'opname' lokasi
        , 'Kredit' arus
        , harga_beli
        , harga_jual 
        , 'Rawat Inap' tipe_transaksi
        , $id_klinik id_klinik
        , $user_id modified_by
        , remarks
        FROM (
            SELECT id_rawat_inap id_register_pasien
            , os.id
            , os.id_obat
            , stok_opname
            , harga_beli
            , harga harga_jual
            , rpo.guid remarks
            , @stok_cumulative := IF(@previous=os.id_obat, @stok_cumulative, 0) + stok_opname stok_cumulative
            , jumlah
            , @sisa := @stok_cumulative - jumlah sisa
            , IF(@sisa<0, 0, IF(@sisa>stok_opname, stok_opname, @sisa)) stok_after
            , stok_opname - IF(@sisa<0, 0, IF(@sisa>stok_opname, stok_opname, @sisa)) stok_terambil
            , expired_date 
            , @previous:=os.id_obat
            FROM obat_stok os
            INNER JOIN rawat_inap_obat  rpo
            ON os.id_obat = rpo.id_obat
            WHERE id_rawat_inap  = $id_reference AND rpo.is_release = 0
            ORDER BY os.id_obat, expired_date ASC, os.created_at ASC
        )t
        WHERE stok_terambil > 0;");   
    }    

    public function updateRelease($id)
    {
        $this->db->where('id_rawat_inap', $id);                    
        $this->db->update($this->table_name, array('is_release' => 1));                        
        return $this->db->affected_rows();
    }      

    public function getByRegisterId($register_id)
    {
        $query = $this->db->get_where($this->view_name, array('id_register_pasien' => $register_id));
        return $query->result();        
    }     

    public function getSumByRegisterId($register_id)
    {
        $query = $this->db->query("SELECT id_register_pasien, id_obat, nama_obat, nama_satuan, SUM(jumlah) jumlah, SUM(harga_jual)/SUM(jumlah) harga_jual, SUM(stok) stok, 1 is_release 
FROM v_rawat_inap_obat
WHERE id_register_pasien = {$register_id}
GROUP BY id_register_pasien, id_obat, nama_obat, nama_satuan");   
        return $query->result();        
    }  

    public function getUnreleaseByRegisterId($register_id)
    {
        $query = $this->db->get_where($this->view_name, array('id_register_pasien' => $register_id, 'is_release' => 0));
        return $query->result();        
    }     
    public function getReleaseByRegisterId($register_id)
    {
        $query = $this->db->get_where($this->view_name, array('id_register_pasien' => $register_id, 'is_release' => 1));
        return $query->result();        
    }     

    public function getByRegisterIdJenisPemeriksaan($register_id, $jenis_pemeriksaan)
    {
        $query = $this->db->get_where($this->view_name, array('id_register_pasien' => $register_id, 'is_paket' => ($jenis_pemeriksaan == 'Umum' ? 0 : 1)));
        return $query->result();        
    }     

    public function updateHarga($data)
    {
        $this->db->where(array('id_rawat_inap' => $data['id_rawat_inap'], 'id_obat' => $data['id_obat']));
        $this->db->update($this->table_name, array('harga' => $data['harga']));        
    } 
}