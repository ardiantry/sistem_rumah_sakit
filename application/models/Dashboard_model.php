<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    function __construct()
	{
		parent::__construct();
    }


    public function getTodayTransaction($id_klinik, $date){

        if($id_klinik == 'ALL'){
            $user = $this->ion_auth->user()->row();		            
            $query = $this->db->query('SELECT SUM(total_transaction) total_transaction FROM (
                SELECT COUNT(*) total_transaction FROM register_pasien
                WHERE CAST(tanggal_bayar as DATE) = \'' .$date. '\' AND id_klinik IN (SELECT klinik.id FROM owner
INNER JOIN klinik
ON owner.id = klinik.id_owner
WHERE owner.email = \'' . $user->email . '\' 
AND klinik.is_deleted = 0)
                UNION ALL
                SELECT COUNT(*) total_transaction FROM transaksi_obat
                WHERE CAST(tanggal_bayar as DATE) = \'' .$date. '\' AND id_klinik IN (SELECT klinik.id FROM owner
                INNER JOIN klinik
                ON owner.id = klinik.id_owner
                WHERE owner.email = \'' . $user->email . '\' 
                AND klinik.is_deleted = 0)
            )t');            
        }
        else{
            $query = $this->db->query('SELECT SUM(total_transaction) total_transaction FROM (
                SELECT COUNT(*) total_transaction FROM register_pasien
                WHERE CAST(tanggal_bayar as DATE) = \'' .$date. '\' AND id_klinik= '.$id_klinik.'
                UNION ALL
                SELECT COUNT(*) total_transaction FROM transaksi_obat
                WHERE CAST(tanggal_bayar as DATE) = \'' .$date. '\' AND id_klinik= '.$id_klinik.'
            )t');
        }
        return $query->row();
    }     

    public function getTodayVisitor($id_klinik, $date){

        if($id_klinik == 'ALL'){
            $user = $this->ion_auth->user()->row();		            
            $query = $this->db->query('SELECT SUM(total_visit) total_visit FROM (
                SELECT COUNT(*) total_visit FROM register_pasien
                WHERE tanggal_periksa = \'' .$date. '\' AND id_klinik IN (SELECT klinik.id FROM owner
                INNER JOIN klinik
                ON owner.id = klinik.id_owner
                WHERE owner.email = \'' . $user->email . '\' 
                AND klinik.is_deleted = 0)
                UNION ALL
                SELECT COUNT(*) total_visit FROM transaksi_obat
                WHERE tanggal_penyerahan_resep = \'' .$date. '\' AND id_klinik IN (SELECT klinik.id FROM owner
                INNER JOIN klinik
                ON owner.id = klinik.id_owner
                WHERE owner.email = \'' . $user->email . '\' 
                AND klinik.is_deleted = 0)
            )t');
        }
        else{
            $query = $this->db->query('SELECT SUM(total_visit) total_visit FROM (
                SELECT COUNT(*) total_visit FROM register_pasien
                WHERE tanggal_periksa = \'' .$date. '\' AND id_klinik= '.$id_klinik.'
                UNION ALL
                SELECT COUNT(*) total_visit FROM transaksi_obat
                WHERE tanggal_penyerahan_resep = \'' .$date. '\' AND id_klinik= '.$id_klinik.'
            )t');
    
        }        
        return $query->row();
    }    
    
    public function getTodayOmzet($id_klinik, $date){
        if($id_klinik == 'ALL'){
            $user = $this->ion_auth->user()->row();		            
            $query = $this->db->query('SELECT SUM(total_tagihan) omzet FROM (
                SELECT SUM(total_tagihan) total_tagihan FROM register_pasien
                WHERE CAST(tanggal_bayar as DATE) = \'' .$date. '\' AND id_klinik IN (SELECT klinik.id FROM owner
                INNER JOIN klinik
                ON owner.id = klinik.id_owner
                WHERE owner.email = \'' . $user->email . '\' 
                AND klinik.is_deleted = 0)
                UNION ALL
                SELECT SUM(total_tagihan) total_tagihan FROM transaksi_obat
                WHERE CAST(tanggal_bayar as DATE) = \'' .$date. '\' AND id_klinik IN (SELECT klinik.id FROM owner
                INNER JOIN klinik
                ON owner.id = klinik.id_owner
                WHERE owner.email = \'' . $user->email . '\' 
                AND klinik.is_deleted = 0)
            )t');
        }
        else{        
            $query = $this->db->query('SELECT SUM(total_tagihan) omzet FROM (
                SELECT SUM(total_tagihan) total_tagihan FROM register_pasien
                WHERE CAST(tanggal_bayar as DATE) = \'' .$date. '\' AND id_klinik= '.$id_klinik.'
                UNION ALL
                SELECT SUM(total_tagihan) total_tagihan FROM transaksi_obat
                WHERE CAST(tanggal_bayar as DATE) = \'' .$date. '\' AND id_klinik= '.$id_klinik.'
            )t');
        }
        return $query->row();
    }     

    public function getTodayOmzetDetail($id_klinik, $date){
        if($id_klinik == 'ALL'){
            $user = $this->ion_auth->user()->row();		            
            $query = $this->db->query("SELECT t.*, CONCAT('Rp ', format(t.total_tagihan, 0, 'de_DE'), ',-') total_tagihan_display FROM (SELECT tanggal_bayar timestamp_bayar, DATE(tanggal_bayar) AS tanggal_bayar
            , TIME(tanggal_bayar) AS jam_bayar
            , no_rm
            , nama_pasien
            , IF(DATE(pasien.created_at) = DATE(register_pasien.created_at), 'Baru', 'Lama') jenis_pasien
            , no_registrasi
            , 'Klinik' jenis
            , total_tagihan
            FROM register_pasien
            INNER JOIN pasien
            ON register_pasien.id_pasien = pasien.id
            WHERE CAST(tanggal_bayar as DATE) = '" .$date. "' AND register_pasien.id_klinik IN (SELECT klinik.id FROM owner
                INNER JOIN klinik
                ON owner.id = klinik.id_owner
                WHERE owner.email = '" . $user->email . "' 
                AND klinik.is_deleted = 0)
            UNION ALL
            SELECT tanggal_bayar timestamp_bayar, DATE(tanggal_bayar) AS tanggal_bayar
            , TIME(tanggal_bayar) AS jam_bayar
            , RIGHT(CONCAT('000000', CAST(pelanggan.id AS CHAR)), 6) no_rl
            , nama_pelanggan
            , IF(DATE(pelanggan.created_at) = DATE(transaksi_obat.created_at), 'Baru', 'Lama') jenis_pasien
            , no_transaksi
            , 'Apotek' jenis
            , total_tagihan FROM transaksi_obat
            LEFT JOIN pelanggan
            ON transaksi_obat.id_pelanggan = pelanggan.id
            WHERE CAST(tanggal_bayar as DATE) = '" .$date. "' AND transaksi_obat.id_klinik IN (SELECT klinik.id FROM owner
                INNER JOIN klinik
                ON owner.id = klinik.id_owner
                WHERE owner.email = '" . $user->email . "'  
                AND klinik.is_deleted = 0))t ORDER BY timestamp_bayar DESC");        
        }
        else{
            $query = $this->db->query("SELECT t.*, CONCAT('Rp ', format(t.total_tagihan, 0, 'de_DE'), ',-') total_tagihan_display FROM (SELECT tanggal_bayar timestamp_bayar, DATE(tanggal_bayar) AS tanggal_bayar
            , TIME(tanggal_bayar) AS jam_bayar
            , no_rm
            , nama_pasien
            , IF(DATE(pasien.created_at) = DATE(register_pasien.created_at), 'Baru', 'Lama') jenis_pasien
            , no_registrasi
            , 'Klinik' jenis
            , total_tagihan
            FROM register_pasien
            INNER JOIN pasien
            ON register_pasien.id_pasien = pasien.id
            WHERE CAST(tanggal_bayar as DATE) = '" .$date. "' AND register_pasien.id_klinik= " . $id_klinik . "
            UNION ALL
            SELECT tanggal_bayar timestamp_bayar, DATE(tanggal_bayar) AS tanggal_bayar
            , TIME(tanggal_bayar) AS jam_bayar
            , RIGHT(CONCAT('000000', CAST(pelanggan.id AS CHAR)), 6) no_rl
            , nama_pelanggan
            , IF(DATE(pelanggan.created_at) = DATE(transaksi_obat.created_at), 'Baru', 'Lama') jenis_pasien
            , no_transaksi
            , 'Apotek' jenis
            , total_tagihan FROM transaksi_obat
            LEFT JOIN pelanggan
            ON transaksi_obat.id_pelanggan = pelanggan.id
            WHERE CAST(tanggal_bayar as DATE) = '" .$date. "' AND transaksi_obat.id_klinik=" . $id_klinik .")t ORDER BY timestamp_bayar DESC");
        }
        return $query->result();
    }       

    public function getTodayPasien($id_klinik, $date){
        if($id_klinik == 'ALL'){
            $user = $this->ion_auth->user()->row();		   
            $query = $this->db->query('SELECT COUNT(*) new_pasien FROM pasien
            WHERE CAST(created_at as DATE) = \'' .$date. '\' AND id_klinik IN (SELECT klinik.id FROM owner
                INNER JOIN klinik
                ON owner.id = klinik.id_owner
                WHERE owner.email = \'' . $user->email . '\' 
                AND klinik.is_deleted = 0)');

        }
        else{
            $query = $this->db->query('SELECT COUNT(*) new_pasien FROM pasien
            WHERE CAST(created_at as DATE) = \'' .$date. '\' AND id_klinik='.$id_klinik);
        }        
        return $query->row();
    }        

    public function getMonthlyOmzet($id_klinik, $date){
        if($id_klinik == 'ALL'){
            $user = $this->ion_auth->user()->row();		   
            $query = $this->db->query('SELECT id, dates, COALESCE(total_tagihan_klinik, 0) total_tagihan_klinik, COALESCE(total_tagihan_obat, 0) total_tagihan_obat FROM (
                SELECT id, DATE_ADD(\'' .$date. '\', INTERVAL - DAY(\'' .$date. '\')+ id DAY) AS dates 
                FROM helper_date
                WHERE DATE_ADD(\'' .$date. '\', INTERVAL - DAY(\'' .$date. '\')+ id DAY) <= LAST_DAY(\'' .$date. '\')
            )t
            LEFT JOIN 
            (
                SELECT CAST(tanggal_bayar as DATE) tanggal_bayar, SUM(total_tagihan) total_tagihan_klinik FROM register_pasien
                WHERE id_klinik IN (SELECT klinik.id FROM owner
                INNER JOIN klinik
                ON owner.id = klinik.id_owner
                WHERE owner.email = \'' . $user->email . '\' 
                AND klinik.is_deleted = 0)
                GROUP BY CAST(tanggal_bayar as DATE)
            )p ON p.tanggal_bayar = t.dates
            LEFT JOIN 
            (
                SELECT CAST(tanggal_bayar as DATE) tanggal_bayar, SUM(total_tagihan) total_tagihan_obat FROM transaksi_obat
                WHERE id_klinik IN (SELECT klinik.id FROM owner
                INNER JOIN klinik
                ON owner.id = klinik.id_owner
                WHERE owner.email = \'' . $user->email . '\' 
                AND klinik.is_deleted = 0)
                GROUP BY CAST(tanggal_bayar as DATE)
            )a ON a.tanggal_bayar = t.dates');            
        }
        else{
            $query = $this->db->query('SELECT id, dates, COALESCE(total_tagihan_klinik, 0) total_tagihan_klinik, COALESCE(total_tagihan_obat, 0) total_tagihan_obat FROM (
                SELECT id, DATE_ADD(\'' .$date. '\', INTERVAL - DAY(\'' .$date. '\')+ id DAY) AS dates 
                FROM helper_date
                WHERE DATE_ADD(\'' .$date. '\', INTERVAL - DAY(\'' .$date. '\')+ id DAY) <= LAST_DAY(\'' .$date. '\')
            )t
            LEFT JOIN 
            (
                SELECT CAST(tanggal_bayar as DATE) tanggal_bayar, SUM(total_tagihan) total_tagihan_klinik FROM register_pasien
                WHERE id_klinik= '.$id_klinik.'
                GROUP BY CAST(tanggal_bayar as DATE)
            )p ON p.tanggal_bayar = t.dates
            LEFT JOIN 
            (
                SELECT CAST(tanggal_bayar as DATE) tanggal_bayar, SUM(total_tagihan) total_tagihan_obat FROM transaksi_obat
                WHERE id_klinik= '.$id_klinik.'
                GROUP BY CAST(tanggal_bayar as DATE)
            )a ON a.tanggal_bayar = t.dates');
        }
        return $query->result();
    }   

    public function getYearlyOmzet($id_klinik, $date){
        if($id_klinik == 'ALL'){
            $user = $this->ion_auth->user()->row();		   
            $query = $this->db->query("SELECT id, DATE_FORMAT(CONCAT(YEAR('" .$date. "'),'-',id,'-','01'), '%b') bulan, COALESCE(total_tagihan_klinik, 0) total_tagihan_klinik, COALESCE(total_tagihan_obat, 0) total_tagihan_obat
            FROM helper_date
            LEFT JOIN 
            (
               SELECT YEAR(tanggal_bayar) tahun_bayar, MONTH(tanggal_bayar) bulan_bayar, SUM(total_tagihan) total_tagihan_klinik FROM register_pasien
               WHERE id_klinik IN (SELECT klinik.id FROM owner
                INNER JOIN klinik
                ON owner.id = klinik.id_owner
                WHERE owner.email = '" . $user->email . "'  
                AND klinik.is_deleted = 0)
               GROUP BY YEAR(tanggal_bayar), MONTH(tanggal_bayar)
            )p ON p.bulan_bayar = id AND p.tahun_bayar = YEAR('" .$date. "')
            LEFT JOIN 
            (
               SELECT YEAR(tanggal_bayar) tahun_bayar, MONTH(tanggal_bayar) bulan_bayar, SUM(total_tagihan) total_tagihan_obat FROM transaksi_obat
               WHERE id_klinik IN (SELECT klinik.id FROM owner
               INNER JOIN klinik
               ON owner.id = klinik.id_owner
               WHERE owner.email = '" . $user->email . "'  
               AND klinik.is_deleted = 0)
               GROUP BY YEAR(tanggal_bayar), MONTH(tanggal_bayar)
            )a ON a.bulan_bayar = id AND a.tahun_bayar = YEAR('" .$date. "')
            WHERE id <= 12");            
        }
        else{
            $query = $this->db->query("SELECT id, DATE_FORMAT(CONCAT(YEAR('" .$date. "'),'-',id,'-','01'), '%b') bulan, COALESCE(total_tagihan_klinik, 0) total_tagihan_klinik, COALESCE(total_tagihan_obat, 0) total_tagihan_obat
            FROM helper_date
            LEFT JOIN 
            (
               SELECT YEAR(tanggal_bayar) tahun_bayar, MONTH(tanggal_bayar) bulan_bayar, SUM(total_tagihan) total_tagihan_klinik FROM register_pasien
               WHERE id_klinik = ".$id_klinik."
               GROUP BY YEAR(tanggal_bayar), MONTH(tanggal_bayar)
            )p ON p.bulan_bayar = id AND p.tahun_bayar = YEAR('" .$date. "')
            LEFT JOIN 
            (
               SELECT YEAR(tanggal_bayar) tahun_bayar, MONTH(tanggal_bayar) bulan_bayar, SUM(total_tagihan) total_tagihan_obat FROM transaksi_obat
               WHERE id_klinik = ".$id_klinik."
               GROUP BY YEAR(tanggal_bayar), MONTH(tanggal_bayar)
            )a ON a.bulan_bayar = id AND a.tahun_bayar = YEAR('" .$date. "')
            WHERE id <= 12");
        }        

        return $query->result();
    }

}