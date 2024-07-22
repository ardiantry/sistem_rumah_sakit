<?php defined('BASEPATH') or exit('No direct script access allowed');

class Penerimaan_model extends CI_Model
{
    private $table_name = 'penerimaan'; //nama tabel dari database
    private $view_name = 'v_penerimaan'; //nama tabel dari database
    private $allow_search_column = array('no_faktur', 'tanggal_faktur', 'no_po', 'nama_supplier'); //field yang diizin untuk searching
    private $allow_order_column = array(null, 'no_faktur', 'tanggal_faktur', 'no_po', 'nama_supplier'); //field yang diizin untuk sorting;
    private $default_order_column = array('no_faktur' => 'asc'); // default order

    function __construct()
    {
        parent::__construct();
    }

    public function getById($id){
        $query = $this->db->get_where($this->view_name, array('id' => $id));
        return $query->row();         
    }

    public function getByIdFaktur($id){
        $query = $this->db->get_where($this->view_name, array('id_faktur' => $id));
        return $query->result();         
    }    

    public function getHutangByIdFaktur($id){
        $this->db->select('*');
        $this->db->from('v_penerimaan');
        $this->db->join('faktur_pembayaran', 'v_penerimaan.id = faktur_pembayaran.id_faktur');
        $this->db->join('cara_bayar', 'faktur_pembayaran.id_cara_bayar = cara_bayar.id');
        $this->db->join('master_akun', 'cara_bayar.id_akun = master_akun.id');                
        $this->db->where([
            'v_penerimaan.id' => $id, 
            'v_penerimaan.state_index' => 2,
            'master_akun.kategori' => 'KEWAJIBAN'

        ]);        

        $query = $this->db->get();
        return $query->row();                
    }    

    public function getDetailByIdFaktur($id)
    {
        $query = $this->db->get_where('v_penerimaan_detail', array('id_faktur' => $id));
        return $query->result();         
    }    

    public function getCaraBayarByIdFaktur($id)
    {
        $this->db->select('*');
        $this->db->from('faktur_pembayaran');
        $this->db->join('cara_bayar', 'faktur_pembayaran.id_cara_bayar = cara_bayar.id');
        $this->db->where(array('id_faktur' => $id));        
        $query = $this->db->get();
        return $query->result();                
    }     

    public function getDataTable($parameter, $where)
    {
        $datatable_config = array('table_name' => $this->view_name, 'allow_search_column' => $this->allow_search_column, 'allow_order_column' => $this->allow_order_column, 'default_order_column' => $this->default_order_column, 'extend_filter' => $where);
        $result = get_datatables($datatable_config, $parameter);
        return $result;
    }

    public function getHutangDataTable($parameter, $where)
    {
        $datatable_config = array('table_name' => 'v_hutang', 'allow_search_column' => $this->allow_search_column, 'allow_order_column' => $this->allow_order_column, 'default_order_column' => $this->default_order_column, 'extend_filter' => $where);
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

    public function saveToJurnalOld($id)
    {
        $sp = "CALL uSP_FakturToJurnal(?)";
        $this->db->query($sp, $$id);
        mysqli_next_result($this->db->conn_id);
    }    

    public function saveToJurnal($data)
    {
        $dataJurnalHeader = $data['header'];
        $dataJurnalDetail = $data['detail'];
        $diskon = $dataJurnalDetail['diskon'];
        $pajak = $dataJurnalDetail['pajak'];        
        $persediaan = $dataJurnalDetail['persediaan'];        
        $id = $dataJurnalDetail['id_faktur'];        

        $this->db->insert('jurnal_header', $dataJurnalHeader);
        $insertId = $this->db->insert_id();

        $queryJurnalDetail = "INSERT INTO jurnal_detail(id_jurnal_header, id_akun, arus, nilai)
        SELECT $insertId id_jurnal, id_akun, arus, jumlah FROM (
                SELECT id_akun, 'Kredit' arus, jumlah
                FROM faktur_pembayaran f
                INNER JOIN cara_bayar c
                ON f.id_cara_bayar = c.id
                WHERE id_faktur = $id
                UNION ALL
                SELECT id id_akun, 'Kredit' arus, $diskon jumlah FROM master_akun WHERE id = '427'
                UNION ALL
                SELECT id id_akun, 'Debit' arus, $persediaan jumlah FROM master_akun WHERE id = '116'
                UNION ALL
                SELECT id id_akun, 'Debit' arus, $pajak jumlah FROM master_akun WHERE id = '5110'
        )t
        WHERE jumlah > 0";
        $this->db->query($queryJurnalDetail);
    }        

    public function insertBatchObat($data)
    {
        $this->db->insert_batch('penerimaan_detail', $data);
    }

    public function deleteByIdFaktur($id_faktur)
    {
        $this->db->delete('penerimaan_detail', array('id_faktur' => $id_faktur));
    }    

    public function insertBatchCaraBayar($data)
    {
        $this->db->insert_batch('faktur_pembayaran', $data);
    }        

    public function bayarHutang($id)
    {
        $this->db->query("UPDATE faktur_pembayaran 
        INNER JOIN cara_bayar
        ON faktur_pembayaran.id_cara_bayar = cara_bayar.id
        SET faktur_pembayaran.updated_at = CURRENT_TIMESTAMP()
        , faktur_pembayaran.is_deleted = 1
        WHERE cara_bayar.cara_bayar LIKE '%utang%' AND id_faktur =" . $id);
    } 

    public function hutangToJurnal($data)
    {
        $dataJurnalHeader = $data['header'];
        $dataJurnalDetail = $data['detail'];
        $idCaraBayar = $dataJurnalDetail['id_cara_bayar'];
        $jumlah = $dataJurnalDetail['jumlah'];
        $id = $dataJurnalDetail['id'];

		$this->db->insert('jurnal_header', $dataJurnalHeader);
        $insertId = $this->db->insert_id();		
        
		$queryJurnalDetail = "INSERT INTO jurnal_detail(id_jurnal_header, id_akun, arus, nilai)
SELECT $insertId           id_jurnal, 
       master_akun.id id_akun, 
       'Kredit'       arus, 
       $jumlah           jumlah 
FROM   cara_bayar 
       INNER JOIN master_akun 
               ON cara_bayar.id_akun = master_akun.id 
WHERE  cara_bayar.id = $idCaraBayar
UNION ALL 
SELECT $insertId id_jurnal, master_akun.id id_akun, 'Debit' arus, $jumlah jumlah
FROM faktur_pembayaran 
INNER JOIN cara_bayar
ON faktur_pembayaran.id_cara_bayar = cara_bayar.id
INNER JOIN master_akun
ON cara_bayar.id_akun = master_akun.id
WHERE id_faktur = $id
AND kategori = 'KEWAJIBAN'";

		$this->db->query($queryJurnalDetail);		
    }     

    public function logStok($id_reference){
        $this->db->query("INSERT INTO log_stok(id_reference, id_stok, id_obat, jumlah, lokasi, arus, harga_beli, harga_jual, tipe_transaksi, id_klinik, modified_by)
        SELECT obat_stok.id_faktur id_reference, obat_stok.id id_stok, id_obat, stok_awal jumlah, penerimaan.lokasi, 'Debit' arus, harga_beli, NULL harga_jual, 'Faktur' tipe_transaksi, penerimaan.id_klinik, obat_stok.modified_by
        FROM obat_stok
        INNER JOIN penerimaan
        ON obat_stok.id_faktur = penerimaan.id
        WHERE obat_stok.id_faktur = $id_reference;");
    }    

    public function updateStok($id_faktur){
        $this->db->query("INSERT INTO obat_stok(id_faktur, id_obat, stok_opname, stok_gudang, harga_beli, total, expired_date, modified_by, stok_awal)
        SELECT 
            id_faktur
            , id_obat
            , IF(lokasi = 'Opname', jumlah, 0) stok_opname
            , IF(lokasi = 'Gudang', jumlah, 0) stok_gudang	
            , harga_beli
            , total
            , expired_date
            , penerimaan.modified_by
            , jumlah
        FROM penerimaan
        INNER JOIN penerimaan_detail
        ON penerimaan.id = penerimaan_detail.id_faktur
        WHERE id_faktur=" . $id_faktur);

        $this->db->query("UPDATE obat
        INNER JOIN
        (	SELECT 
            id_faktur, id_obat, stok_opname, harga_beli,
            (SELECT SUM(stok_opname) FROM obat_stok o WHERE o.id_obat = obat_stok.id_obat) stok
            FROM penerimaan
            INNER JOIN obat_stok
            ON penerimaan.id = obat_stok.id_faktur
            WHERE id_faktur = ". $id_faktur . ") as stok_obat
        ON
        obat.id =  stok_obat.id_obat
        SET obat.stok = IF(stok_obat.stok = 0, obat.stok, stok_obat.stok), obat.harga_beli = stok_obat.harga_beli, obat.harga_beli_before = obat.harga_beli");
    }  
 
}
