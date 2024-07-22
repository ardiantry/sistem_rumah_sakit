<?php defined('BASEPATH') or exit('No direct script access allowed');

class RawatInap_model extends CI_Model
{
    private $dbcon;
    private $primary_key = "id";
    private $table_name = 'rawat_inap'; //nama tabel dari database
    private $view_name = 'v_rawat_inap'; //nama tabel dari database
    private $allow_search_column = array('no_registrasi', 'no_rm', 'nama_pasien'); //field yang diizin untuk searching
    private $allow_order_column = array(null, 'no_registrasi', 'no_rm', 'nama_pasien'); //field yang diizin untuk sorting;
    private $default_order_column = array('no_registrasi' => 'asc'); // default order

    function __construct()
    {
        parent::__construct();
        require_once APPPATH . 'third_party/ssp.class.php';
        $this->dbcon = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );          
    }

    public function getById($id){
        $query = $this->db->get_where($this->view_name, array('id' => $id));
        return $query->row();         
    }    

    public function getAppointmentById($id){
        $query = $this->db->get_where('v_register_pasien_booking', array('id' => $id));
        return $query->row();         
    }     

    public function getDataTable($parameter, $where)
    {
        $columns = array(
            [
                "db" => "no_registrasi",
                "dt" => "no_registrasi",
            ],
            [
                "db" => "no_rm",
                "dt" => "no_rm",
            ],
            [
                "db" => "nama_pasien",
                "dt" => "nama_pasien",
            ],
            [
                "db" => "tempat_lahir",
                "dt" => "tempat_lahir",
            ],
            [
                "db" => "tanggal_lahir",
                "dt" => "tanggal_lahir",
            ],                        
            [
                "db" => "ktp",
                "dt" => "ktp",
            ], 
            [
                "db" => "no_telp",
                "dt" => "no_telp",
            ], 
            [
                "db" => "agama",
                "dt" => "agama",
            ],         
            [
                "db" => "golongan_darah",
                "dt" => "golongan_darah",
            ],   
            [
                "db" => "alamat",
                "dt" => "alamat",
            ], 
            [
                "db" => "keterangan",
                "dt" => "keterangan",
            ],  
            [
                "db" => "jenis_kelamin",
                "dt" => "jenis_kelamin",
            ],        
            [
                "db" => "pekerjaan",
                "dt" => "pekerjaan",
            ],                                                                                                        
            [
                "db" => "tanggal_periksa",
                "dt" => "tanggal_periksa",
            ], 
            [
                "db" => "nama_unit_layanan",
                "dt" => "nama_unit_layanan",
            ], 
            [
                "db" => "nama_dokter",
                "dt" => "nama_dokter",
            ], 
            [
                "db" => "tipe_pasien",
                "dt" => "tipe_pasien",
            ],   
            [
                "db" => "keterangan1",
                "dt" => "keterangan1",
            ],  
            [
                "db" => "tanggal_pemeriksaan",
                "dt" => "tanggal_pemeriksaan",
            ], 
            [
                "db" => "jenis_pemeriksaan",
                "dt" => "jenis_pemeriksaan",
            ],     
            [
                "db" => "tanggal_kunjungan_selanjutnya",
                "dt" => "tanggal_kunjungan_selanjutnya",
            ],   
            [
                "db" => "tujuan_kunjungan_selanjutnya",
                "dt" => "tujuan_kunjungan_selanjutnya",
            ],  
            // [
            //     "db" => "jumlah_paket",
            //     "dt" => "jumlah_paket",
            // ],   
            // [
            //     "db" => "id_paket",
            //     "dt" => "id_paket",
            // ],   
            // [
            //     "db" => "paket_sisa",
            //     "dt" => "paket_sisa",
            // ], 
            // [
            //     "db" => "total_stok_opname",
            //     "dt" => "total_stok_opname",
            // ], 
            [
                "db" => "diagnosa",
                "dt" => "diagnosa",
            ],   
            [
                "db" => "keterangan2",
                "dt" => "keterangan2",
            ],  
            [
                "db" => "tanggal_penyerahan_resep",
                "dt" => "tanggal_penyerahan_resep",
            ],      
            [
                "db" => "keterangan3",
                "dt" => "keterangan3",
            ],   
            [
                "db" => "tanggal_rujukan",
                "dt" => "tanggal_rujukan",
            ],   
            [
                "db" => "tanggal_masuk",
                "dt" => "tanggal_masuk",
            ],   
            [
                "db" => "id_bed",
                "dt" => "id_bed",
            ],   
            [
                "db" => "nama_bed",
                "dt" => "nama_bed",
            ],   
            [
                "db" => "tarif",
                "dt" => "tarif",
            ],   
            [
                "db" => "id_ruangan",
                "dt" => "id_ruangan",
            ],   
            [
                "db" => "nama_ruangan",
                "dt" => "nama_ruangan",
            ],   
            [
                "db" => "id_kelas",
                "dt" => "id_kelas",
            ],   
            [
                "db" => "nama_kelas",
                "dt" => "nama_kelas",
            ],   
            [
                "db" => "id",
                "dt" => "id",
            ],   
            [
                "db" => "id_unit_layanan",
                "dt" => "id_unit_layanan",
            ],
            [
                "db" => "ihs_location_id",
                "dt" => "ihs_location_id",
            ],            
            [
                "db" => "id_dokter",
                "dt" => "id_dokter",
            ],
            [
                "db" => "practitioner_ihs_id",
                "dt" => "practitioner_ihs_id",
            ],                
            [
                "db" => "id_tipe_pasien",
                "dt" => "id_tipe_pasien",
            ],     
            [
                "db" => "id_pasien",
                "dt" => "id_pasien",
            ],  
            [
                "db" => "patient_ihs_id",
                "dt" => "patient_ihs_id",
            ],   
            [
                "db" => "no_bpjs",
                "dt" => "no_bpjs",
            ],                          
            [
                "db" => "id_reference",
                "dt" => "id_reference",
            ],  
            // [
            //     "db" => "tacc",
            //     "dt" => "tacc",
            // ],  
            // [
            //     "db" => "keluhan",
            //     "dt" => "keluhan",
            // ],  
            // [
            //     "db" => "kd_sadar",
            //     "dt" => "kd_sadar",
            // ],    
            // [
            //     "db" => "sistol",
            //     "dt" => "sistol",
            // ],   
            // [
            //     "db" => "diastole",
            //     "dt" => "diastole",
            // ],   
            // [
            //     "db" => "berat_badan",
            //     "dt" => "berat_badan",
            // ],   
            // [
            //     "db" => "tinggi_badan",
            //     "dt" => "tinggi_badan",
            // ],   
            // [
            //     "db" => "resp_rate",
            //     "dt" => "resp_rate",
            // ],    
            // [
            //     "db" => "heart_rate",
            //     "dt" => "heart_rate",
            // ],                                                                                                                                                                                                                                                                                                                                                        
        );
        $result = \SSP::complex($parameter, $this->dbcon, $this->view_name, $this->primary_key, $columns, null, $where);			
        return $result;        
    }

    public function getByIdPasien($id)
    {
        $query = $this->db->get_where($this->view_name, array('id_pasien' => $id));
        return $query->result();
    }

    public function getRekamMedikByIdPasien($id)
    {
        $query = $this->db->query("
        SELECT * FROM v_register_pasien v
        LEFT JOIN
        (
            SELECT id_register_pasien, GROUP_CONCAT(CONCAT(nama_layanan, ' : ', CAST(jumlah AS CHAR)) ORDER BY nama_layanan ASC SEPARATOR '<br />') list_layanan 
            FROM v_register_pasien_layanan GROUP BY id_register_pasien
        )l
        ON v.id = l.id_register_pasien
        LEFT JOIN
        (
            SELECT id_register_pasien, GROUP_CONCAT(CONCAT(nama_obat, ' : ', CAST(jumlah AS CHAR)) ORDER BY nama_obat ASC SEPARATOR '<br />') list_obat 
            FROM v_register_pasien_obat GROUP BY id_register_pasien
        )o
        ON v.id = o.id_register_pasien
        LEFT JOIN
        (
            SELECT id_register_pasien, GROUP_CONCAT(DISTINCT icd10_name ORDER BY icd10_name ASC SEPARATOR '<br />') list_icd 
            FROM v_register_pasien_icd10 GROUP BY id_register_pasien
        )icd10
        ON v.id = icd10.id_register_pasien        
        WHERE id_pasien = " . $id);
        return $query->result();
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

    public function approvedAppointment($data)
    {
        $sql = "UPDATE users_appointment_register SET state_index = 1 WHERE id_klinik = ? AND id_pasien = ? AND tanggal_periksa = ? AND is_deleted = 0";
        $this->db->query($sql, $data);
        return $data;
    }    

    public function deleteAppointment($id)
    {
        $this->db->where('id', $id);                    
        $this->db->where('state_index <', 1);        
        $this->db->update('users_appointment_register', array('is_deleted' => 1));         
        return $this->db->affected_rows();
    }     

    public function delete($id)
    {
        $this->db->where('id', $id);                    
        $this->db->where('state_index <', 3);        
        $this->db->update($this->table_name, array('is_deleted' => 1));         
        //$this->db->delete($this->table_name, array('id' => $id));
        return $this->db->affected_rows();
    }    

    public function cancelPaketToJurnal($id, $id_reference, $sisa_paket)
    {
		$user = $this->ion_auth->user()->row();				        		

        $this->db->query("
        INSERT INTO jurnal_header(tanggal, nama, id_reference, tipe_transaksi, id_klinik, modified_by)
        SELECT NOW() tanggal
        , CONCAT('Pembatalan Paket Layanan ', no_registrasi, ' (', nama_obat, ')') nama
        , register_pasien.id id_reference
        , 'Pembatalan Paket Layanan' tipe_transaksi
        , register_pasien.id_klinik
        , $user->id modified_by
        FROM register_pasien
        LEFT JOIN obat
        ON register_pasien.id_paket = obat.id
        WHERE register_pasien.id = $id;");

        $insertId = $this->db->insert_id();

        $queryJurnalDetail = "INSERT INTO jurnal_detail(id_jurnal_header, id_akun, arus, nilai)
        SELECT $insertId id_jurnal, id_akun, arus, jumlah FROM (
            SELECT  id id_akun, 'Debit' arus, (
            SELECT 
            (jumlah - (SELECT SUM(jumlah) FROM register_pasien_paket t WHERE t.id_reference = register_pasien_paket.id_reference AND arus='Kredit')) * harga
            FROM register_pasien_paket WHERE id_reference = $id_reference AND arus='Debit'
            ) jumlah FROM master_akun WHERE id = '211'
            UNION ALL
            SELECT  id id_akun, 'Kredit' arus, (
            SELECT 
            (jumlah - (SELECT SUM(jumlah) FROM register_pasien_paket t WHERE t.id_reference = register_pasien_paket.id_reference AND arus='Kredit')) * harga
            FROM register_pasien_paket WHERE id_reference = $id_reference AND arus='Debit'
            ) jumlah FROM master_akun WHERE id = '111'
        )t WHERE jumlah > 0";

        $this->db->query($queryJurnalDetail);

        $this->db->query("UPDATE
        register_pasien_paket AS t_target
        SET jumlah = jumlah - $sisa_paket
        WHERE id_reference = $id_reference AND arus='Debit';");

    }        

    public function saveToJurnalOld($id)
    {
        $sp = "CALL uSP_KlinikToJurnal(?)";
        $this->db->query($sp, $id);
        mysqli_next_result($this->db->conn_id);        
    }

    public function saveToJurnal($data)
    {
        $dataJurnalHeader = $data['header'];
        $dataJurnalDetail = $data['detail'];
        $diskon = $dataJurnalDetail['diskon'];
        $pajak = $dataJurnalDetail['pajak'];        
        $pendapatan_layanan = $dataJurnalDetail['pendapatan_layanan'];                
        $pendapatan_obat = $dataJurnalDetail['pendapatan_obat'];                        
        $pendapatan_tambahan = $dataJurnalDetail['pendapatan_tambahan'];                                
        $id = $dataJurnalDetail['id'];        
        $hutang = $dataJurnalDetail['hutang'];        

        $this->db->insert('jurnal_header', $dataJurnalHeader);
        $insertId = $this->db->insert_id();

        $queryJurnalDetail = "INSERT INTO jurnal_detail(id_jurnal_header, id_akun, arus, nilai)
        SELECT $insertId id_jurnal, id_akun, arus, jumlah FROM (
            SELECT  id_akun, 'Debit' arus, jumlah
            FROM rawat_inap_pembayaran f
            INNER JOIN cara_bayar c
            ON f.id_cara_bayar = c.id
            WHERE id_rawat_inap = $id
            UNION ALL
            SELECT  id id_akun, 'Debit' arus, $hutang jumlah FROM master_akun WHERE id = '211'            
            UNION ALL
            SELECT  id id_akun, 'Debit' arus, $diskon jumlah FROM master_akun WHERE id = '514'
            UNION ALL
            SELECT  id id_akun, 'Kredit' arus, $pendapatan_layanan jumlah FROM master_akun WHERE id = '411'
            UNION ALL
            SELECT  id id_akun, 'Kredit' arus, $pendapatan_obat jumlah FROM master_akun WHERE id = '412'
            UNION ALL
            SELECT  id id_akun, 'Kredit' arus, $pendapatan_tambahan jumlah FROM master_akun WHERE id = '427'
            UNION ALL
            SELECT  id id_akun, 'Kredit' arus, $pajak jumlah FROM master_akun WHERE id = '427'
            UNION ALL
            SELECT id id_akun, 'Debit' arus, (SELECT SUM(jumlah * harga_beli)
            FROM log_stok 
            WHERE id_reference = $id 
            AND tipe_transaksi = 'Rawat Inap'
            ) jumlah FROM master_akun WHERE id = '519'
            UNION ALL
            SELECT id id_akun, 'Kredit' arus, (SELECT SUM(jumlah * harga_beli)
            FROM log_stok 
            WHERE id_reference = $id 
            AND tipe_transaksi = 'Rawat Inap'
            ) jumlah FROM master_akun WHERE id = '116'
        )t WHERE jumlah > 0";

        $this->db->query($queryJurnalDetail);
    }
    
    public function saveToJurnalPaket($data)
    {
        $dataJurnalHeader = $data['header'];
        $dataJurnalDetail = $data['detail'];
        $diskon = $dataJurnalDetail['diskon'];
        $pajak = $dataJurnalDetail['pajak'];        
        $pendapatan_layanan = $dataJurnalDetail['pendapatan_layanan'];                
        $pendapatan_obat = $dataJurnalDetail['pendapatan_obat'];                        
        $hutang_paket = $dataJurnalDetail['hutang_paket'];                        
        $pendapatan_tambahan = $dataJurnalDetail['pendapatan_tambahan'];                                
        $id = $dataJurnalDetail['id'];        

        $this->db->insert('jurnal_header', $dataJurnalHeader);
        $insertId = $this->db->insert_id();

        $queryJurnalDetail = "INSERT INTO jurnal_detail(id_jurnal_header, id_akun, arus, nilai)
        SELECT $insertId id_jurnal, id_akun, arus, jumlah FROM (
            SELECT  id_akun, 'Debit' arus, jumlah
            FROM register_pasien_pembayaran f
            INNER JOIN cara_bayar c
            ON f.id_cara_bayar = c.id
            WHERE id_register_pasien = $id
            UNION ALL
            SELECT  id id_akun, 'Debit' arus, $diskon jumlah FROM master_akun WHERE id = '514'
            UNION ALL
            SELECT  id id_akun, 'Kredit' arus, $pendapatan_layanan jumlah FROM master_akun WHERE id = '411'
            UNION ALL
            SELECT  id id_akun, 'Kredit' arus, $hutang_paket jumlah FROM master_akun WHERE id = '211'            
            UNION ALL
            SELECT  id id_akun, 'Kredit' arus, $pendapatan_obat jumlah FROM master_akun WHERE id = '412'
            UNION ALL
            SELECT  id id_akun, 'Kredit' arus, $pendapatan_tambahan jumlah FROM master_akun WHERE id = '427'
            UNION ALL
            SELECT  id id_akun, 'Kredit' arus, $pajak jumlah FROM master_akun WHERE id = '427'
            UNION ALL
            SELECT id id_akun, 'Debit' arus, (SELECT SUM(jumlah * harga_beli)
            FROM log_stok 
            WHERE id_reference = $id 
            AND tipe_transaksi = 'Rawat Jalan'
            ) jumlah FROM master_akun WHERE id = '519'
            UNION ALL
            SELECT id id_akun, 'Kredit' arus, (SELECT SUM(jumlah * harga_beli)
            FROM log_stok 
            WHERE id_reference = $id 
            AND tipe_transaksi = 'Rawat Jalan'
            ) jumlah FROM master_akun WHERE id = '116'
        )t WHERE jumlah > 0";

        $this->db->query($queryJurnalDetail);
    }    

    public function saveNextPendaftaran($id)
    {
        $query1 = "INSERT INTO register_pasien(id_klinik, id_pasien, no_registrasi, tanggal_periksa, id_unit_layanan, id_dokter, id_tipe_pasien, keterangan1, tanggal_pemeriksaan, diagnosa, keterangan2, tanggal_penyerahan_resep, keterangan3, state_index, jenis_pemeriksaan, tanggal_kunjungan_selanjutnya, jumlah_paket, id_paket, id_reference, modified_by)
        SELECT
        id_klinik
        , id_pasien
        , CONCAT('R', DATE_FORMAT(tanggal_kunjungan_selanjutnya, '%Y%m%d'), TIME_FORMAT(CURRENT_TIME(), '%H%i%s')) no_registrasi
        , tanggal_kunjungan_selanjutnya tanggal_periksa
        , id_unit_layanan
        , id_dokter
        , id_tipe_pasien
        , keterangan1
        , tanggal_kunjungan_selanjutnya tanggal_pemeriksaan
        , diagnosa
        , keterangan2
        , tanggal_kunjungan_selanjutnya tanggal_penyerahan_resep
        , keterangan3
        , 0 state_index
        , jenis_pemeriksaan
        , tanggal_kunjungan_selanjutnya
        , jumlah_paket
        , id_paket
        , COALESCE(id_reference, id) id_reference
        , modified_by
        FROM register_pasien WHERE id = $id";        
        $this->db->query($query1);
        $insertId = $this->db->insert_id();

        $query2 = "INSERT INTO register_pasien_layanan(id_register_pasien, id_layanan, jumlah, harga)
        SELECT $insertId id_register_pasien
        , id_layanan
        , jumlah
        , harga 
        FROM register_pasien_layanan
        WHERE id_register_pasien = $id";        
        //$this->db->query($query2);

        $query3 = "INSERT INTO register_pasien_obat(id_register_pasien, id_obat, jumlah, harga )
        SELECT $insertId id_register_pasien
        , id_obat
        , jumlah
        , harga 
        FROM register_pasien_obat
        WHERE id_register_pasien = $id
        AND is_paket = 1";                
        $this->db->query($query3);        
    }
    
    public function getSmsDataByRegisterId($register_id)
    {
        $query = $this->db->get_where('v_register_pasien_reminder_paket_sms', array('id_register_pasien' => $register_id));
        return $query->result();        
    }      
}
