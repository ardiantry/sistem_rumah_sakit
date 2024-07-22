<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Afiliasi_model extends CI_Model {

    private $table_name = 'ruangan'; //nama tabel dari database
    private $view_name = ''; //nama tabel dari database
    private $allow_search_column = array(); //field yang diizin untuk searching
    private $allow_order_column = array(); //field yang diizin untuk sorting;
    private $default_order_column = array(); // default order

    function __construct()
	{
		parent::__construct();
    }

    public function getByKlinik($param,$id,$search){

      
        $limit =$param['length'] !==-1? " LIMIT ".$param['length']." OFFSET ".$param['start']:'';

        $data=$this->db->query('SELECT layanan.id, layanan.nama_layanan, tb_harga_layanan.harga, tb_harga_layanan.id as id_harga,  tb_harga_layanan.status FROM  layanan LEFT JOIN tb_harga_layanan ON layanan.id = tb_harga_layanan.id_layanan WHERE layanan.id_klinik='.$id.' '.$search.' '.$limit);

         $ttl=$this->db->query('SELECT COUNT(*) totalRecord FROM  layanan LEFT JOIN tb_harga_layanan ON layanan.id = tb_harga_layanan.id_layanan WHERE layanan.id_klinik='.$id);

         $query['totalRecord']= $ttl->row()->totalRecord;
       $query['data']=$data->result();
        return $query;      
 
    }
     public function updateDataafiliasi($param){

        $this->db->trans_start();
        $getdata = $this->db->get_where('tb_harga_layanan', array('id_layanan' => $param['id']));
        //print_r($getdata->row());
        if($getdata->row())
        {
            $this->db->where('id',@$getdata->row()->id);            
            $this->db->update('tb_harga_layanan', array('harga'=>$param['harga'],'status'=>$param['status'])); 

        }
        else
        {
             $this->db->insert('tb_harga_layanan', array('harga'=>$param['harga'],'status'=>$param['status'],'id_layanan'=>$param['id'])); 
        }  
        $this->db->trans_complete();
        return;

    }
     public function getKomisi($param,$id,$search,$getKomisi){ 
        
        $limit =$param['length'] !==-1? " LIMIT ".$param['length']." OFFSET ".$param['start']:'';
          $data=$this->db->query('SELECT 
            tb_afiliasi_pasien.*, 
            layanan.nama_layanan ,
            tb_afiliator.first_name as nama_afiliator,
            tb_afiliator.identity as email_afiliator FROM tb_afiliasi_pasien 
            LEFT JOIN layanan ON tb_afiliasi_pasien.id_layanan = layanan.id 
            LEFT JOIN tb_afiliator ON  tb_afiliasi_pasien.id_afiliasi = tb_afiliator.id
            WHERE tb_afiliasi_pasien.id_klinik='.$id.' '.$getKomisi.' '.$search.' ORDER BY tb_afiliasi_pasien.id DESC '.$limit);

        $ttl=$this->db->query('SELECT COUNT(*) totalRecord FROM tb_afiliasi_pasien  
            LEFT JOIN layanan ON tb_afiliasi_pasien.id_layanan = layanan.id 
            LEFT JOIN tb_afiliator ON  tb_afiliasi_pasien.id_afiliasi = tb_afiliator.id
            WHERE tb_afiliasi_pasien.id_klinik='.$id.' '.$getKomisi.' '.$search.' ORDER BY tb_afiliasi_pasien.id DESC');

        $query['totalRecord']= $ttl->row()->totalRecord;
        $query['data']=$data->result();
        return $query;      
 

    }
   public function   countKomisi($search,$filterDT)
   {
 $ttl=$this->db->query('SELECT SUM(tb_afiliasi_pasien.harga) as total_harga  FROM tb_afiliasi_pasien  LEFT JOIN layanan ON tb_afiliasi_pasien.id_layanan = layanan.id
    LEFT JOIN tb_afiliator ON  tb_afiliasi_pasien.id_afiliasi = tb_afiliator.id
  WHERE tb_afiliasi_pasien.status=\'selesai\' '.$filterDT.' '.$search);

        return @$ttl->row()->total_harga?@$ttl->row()->total_harga:0; 
 
 
   }

 public function counttolak($search,$filterDT)
 {
$ttl=$this->db->query('SELECT SUM(tb_afiliasi_pasien.harga) as total_harga  FROM tb_afiliasi_pasien  LEFT JOIN layanan ON tb_afiliasi_pasien.id_layanan = layanan.id 
    LEFT JOIN tb_afiliator ON  tb_afiliasi_pasien.id_afiliasi = tb_afiliator.id
    WHERE  tb_afiliasi_pasien.status=\'batal\'  '.$filterDT.' '.$search);

        return @$ttl->row()->total_harga? @$ttl->row()->total_harga:0; 
 }
 public function countproses($search,$filterDT)
 {

 $ttl=$this->db->query('SELECT SUM(tb_afiliasi_pasien.harga) as total_harga  FROM tb_afiliasi_pasien  LEFT JOIN layanan ON tb_afiliasi_pasien.id_layanan = layanan.id 
    LEFT JOIN tb_afiliator ON  tb_afiliasi_pasien.id_afiliasi = tb_afiliator.id
    WHERE   tb_afiliasi_pasien.status=\'proses\'  '.$filterDT.' '.$search);

        return @$ttl->row()->total_harga?@$ttl->row()->total_harga:0; 
 }
    public function updatepasienfiliasi($param){ 
        
       $this->db->trans_start();
        $getdata = $this->db->get_where('tb_afiliasi_pasien ', array('id' => $param['id']));
        //print_r($getdata->row());
        if($getdata->row())
        {
            $this->db->where('id',@$getdata->row()->id);            
            $this->db->update('tb_afiliasi_pasien ', array('status'=>$param['status'])); 

        }
       
        $this->db->trans_complete();
        return;

    }
     public function getpasienafiliasi($id){ 
        $query = $this->db->query('select tb_afiliasi_pasien.*,  tb_afiliator.first_name as nama_afiliasi from tb_afiliasi_pasien LEFT JOIN  tb_afiliator ON tb_afiliator.id=tb_afiliasi_pasien.id_afiliasi WHERE tb_afiliasi_pasien.id='.$id);
        return $query->row();   
    }
      public function simpanhargadefault($harga,$id_klinik)
        {
                $this->db->trans_start();
                $getdata = $this->db->get_where('tb_harga_afiliasi_default ', array('id_klinik' => $id_klinik));
                //print_r($getdata->row());
                if($getdata->row())
                {
                    $this->db->where('id',@$getdata->row()->id);            
                    $this->db->update('tb_harga_afiliasi_default ', array('harga'=>$harga)); 

                }
                else{
                     $this->db->insert('tb_harga_afiliasi_default', array('harga'=>$harga,'id_klinik'=>$id_klinik)); 
                }

                $this->db->trans_complete();
                return;
        }
        public function hargadefault($id_klinik) 
        {
             $getdata = $this->db->get_where('tb_harga_afiliasi_default ', array('id_klinik' => $id_klinik));
                 return @$getdata->row()->harga?@$getdata->row()->harga:0;  
        }
  
}