<?php defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiObat_model extends CI_Model
{
    private $table_name = 'transaksi_obat'; //nama tabel dari database
    private $view_name = 'v_transaksi_obat'; //nama tabel dari database
    private $allow_search_column = array('no_transaksi', 'nama_pelanggan'); //field yang diizin untuk searching
    private $allow_order_column = array(null, 'no_transaksi', 'nama_pelanggan'); //field yang diizin untuk sorting;
    private $default_order_column = array('no_transaksi' => 'asc'); // default order

    function __construct()
    {
        parent::__construct();
    }

    public function getById($id){
        $query = $this->db->get_where($this->view_name, array('id' => $id));
        return $query->row();         
    }

    public function getDetailByIdTransaksi($id)
    {
        $query = $this->db->get_where('v_transaksi_obat_detail', array('id_transaksi_obat' => $id));
        return $query->result();         
    }    

    public function getTambahanByIdTransaksi($id)
    {
        $query = $this->db->get_where('transaksi_obat_tambahan', array('id_transaksi_obat' => $id));
        return $query->result();        
    }         

    public function getCaraBayarByIdTransaksi($id)
    {
        $this->db->select('*');
        $this->db->from('transaksi_obat_pembayaran');
        $this->db->join('cara_bayar', 'transaksi_obat_pembayaran.id_cara_bayar = cara_bayar.id');
        $this->db->where(array('id_transaksi_obat' => $id));        
        $query = $this->db->get();
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

    public function saveToJurnalOld($id_transaksi){
        $sp = "CALL uSP_ApotekToJurnal(?)";
        $this->db->query($sp, $id_transaksi);
        mysqli_next_result($this->db->conn_id);                
    }

    public function saveToJurnal($data){
        $dataJurnalHeader = $data['header'];
        $dataJurnalDetail = $data['detail'];
        $diskon = $dataJurnalDetail['diskon'];
        $pajak = $dataJurnalDetail['pajak'];        
        $pendapatan_obat = $dataJurnalDetail['pendapatan_obat'];                        
        $pendapatan_tambahan = $dataJurnalDetail['pendapatan_tambahan'];                                
        $id = $dataJurnalDetail['id'];        

        $this->db->insert('jurnal_header', $dataJurnalHeader);
        $insertId = $this->db->insert_id();

        $queryJurnalDetail = "INSERT INTO jurnal_detail(id_jurnal_header, id_akun, arus, nilai)
        SELECT $insertId id_jurnal, id_akun, arus, jumlah FROM (
   SELECT id_akun, 'Debit' arus, jumlah
   FROM transaksi_obat_pembayaran f
   INNER JOIN cara_bayar c
   ON f.id_cara_bayar = c.id
   WHERE id_transaksi_obat = $id
   UNION ALL
   SELECT id id_akun, 'Debit' arus, $diskon jumlah FROM master_akun WHERE id = '514'
   UNION ALL
   SELECT id id_akun, 'Kredit' arus, $pendapatan_obat jumlah FROM master_akun WHERE id = '412'
   UNION ALL
   SELECT id id_akun, 'Kredit' arus, $pendapatan_tambahan jumlah FROM master_akun WHERE id = '427'
   UNION ALL
   SELECT id id_akun, 'Kredit' arus, $pajak jumlah FROM master_akun WHERE id = '427'
   UNION ALL
    SELECT id id_akun, 'Debit' arus, (SELECT SUM(jumlah * harga_beli)
    FROM log_stok 
    WHERE id_reference = $id 
    AND tipe_transaksi = 'Resep Luar'
    ) jumlah FROM master_akun WHERE id = '519'
    UNION ALL
    SELECT id id_akun, 'Kredit' arus, (SELECT SUM(jumlah * harga_beli)
    FROM log_stok 
    WHERE id_reference = $id 
    AND tipe_transaksi = 'Resep Luar'
    ) jumlah FROM master_akun WHERE id = '116'
)t WHERE jumlah > 0";
        $this->db->query($queryJurnalDetail);
    }    

    public function insertBatchObat($data)
    {
        $this->db->insert_batch('transaksi_obat_detail', $data);
    }

    public function insertBatchTambahan($data)
    {
        $this->db->insert_batch('transaksi_obat_tambahan', $data);
    }

    public function insertBatchCaraBayar($data)
    {
        $this->db->insert_batch('transaksi_obat_pembayaran', $data);
    }    

    public function deleteByIdTransaksi($id_transaksi)
    {
        $this->db->delete('transaksi_obat_detail', array('id_transaksi_obat' => $id_transaksi));
    }

    public function updateStok($register_id){
        $this->db->query("UPDATE obat_stok
        INNER JOIN log_stok
        ON obat_stok.id = log_stok.id_stok
        SET obat_stok.stok_opname = obat_stok.stok_opname - log_stok.jumlah
        WHERE log_stok.id_reference = $register_id AND tipe_transaksi = 'Resep Luar'");        
    }    
    
    public function logStok($id_reference, $user_id, $id_klinik){
        $this->db->query("SET @stok_cumulative := 0");
        $this->db->query("SET @previous := 0");        

        $this->db->query("INSERT INTO log_stok(id_reference, id_stok, id_obat, jumlah, lokasi, arus, harga_beli, harga_jual, tipe_transaksi, id_klinik, modified_by)
        SELECT id_transaksi_obat id_reference
        , id id_stok
        , id_obat
        , stok_terambil jumlah
        , 'opname' lokasi
        , 'Kredit' arus
        , harga_beli
        , harga_jual 
        , 'Resep Luar' tipe_transaksi
        , $id_klinik id_klinik
        , $user_id modified_by
        FROM (
            SELECT id_transaksi_obat
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
            INNER JOIN transaksi_obat_detail  rpo
            ON os.id_obat = rpo.id_obat
            WHERE id_transaksi_obat  = $id_reference
            ORDER BY os.id_obat, expired_date ASC, os.created_at ASC
        )t
        WHERE stok_terambil > 0;");   
    }        
}
