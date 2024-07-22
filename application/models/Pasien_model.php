<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_model extends CI_Model {

    private $dbcon;
    private $primary_key = "id";    
    private $table_name = 'pasien'; //nama tabel dari database
    private $view_name = 'v_pasien'; //nama tabel dari database
    private $allow_search_column = array('no_rm','nama_pasien'); //field yang diizin untuk searching
    private $allow_order_column = array(null, 'no_rm','nama_pasien'); //field yang diizin untuk sorting;
    private $default_order_column = array('no_rm' => 'asc'); // default order

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

    public function getRiwayatDataTable($parameter, $where){
        $columns = array(
            array(
                "db" => "id",
                "dt" => "id",
            ),
            array(
                "db" => "tanggal_pemeriksaan",
                "dt" => "tanggal_pemeriksaan",
            ),
            array(
                "db" => "dokter",
                "dt" => "dokter",
            ),
            array(
                "db" => "diagnosa",
                "dt" => "diagnosa",
            ),    
            array(
                "db" => "icd9",
                "dt" => "icd9",
            ),    
            array(
                "db" => "icd10",
                "dt" => "icd10",
            ),                
            array(
                "db" => "layanan",
                "dt" => "layanan",
            ), 
            array(
                "db" => "keterangan2",
                "dt" => "keterangan2",
            ),  
            array(
                "db" => "obat",
                "dt" => "obat",
            ),        
            array(
                "db" => "keterangan3",
                "dt" => "keterangan3",
            ),                                                 
            array(
                "db" => "rencana_kontrol",
                "dt" => "rencana_kontrol",
            ),     
            array(
                "db" => "fisik",
                "dt" => "fisik",
            ),     
        );        
        $result = \SSP::complex($parameter, $this->dbcon, "v_riwayat_pasien", $this->primary_key, $columns, null, $where);			
        return $result;             
    }      

    public function getDataTable($parameter, $where){
        $columns = array(
            array(
                "db" => "nama_pasien",
                "dt" => "nama_pasien",
            ),
            array(
                "db" => "no_rm",
                "dt" => "no_rm",
            ),
            array(
                "db" => "tempat_lahir",
                "dt" => "tempat_lahir",
            ),
            array(
                "db" => "tanggal_lahir",
                "dt" => "tanggal_lahir",
            ),
            array(
                "db" => "no_telp",
                "dt" => "no_telp",
            ),
            array(
                "db" => "agama",
                "dt" => "agama",
            ),  
            array(
                "db" => "golongan_darah",
                "dt" => "golongan_darah",
            ),  
            array(
                "db" => "jenis_kelamin_display",
                "dt" => "jenis_kelamin_display",
            ),            
            array(
                "db" => "pekerjaan_display",
                "dt" => "pekerjaan_display",
            ),                            
            array(
                "db" => "alamat",
                "dt" => "alamat",
            ),                            
            array(
                "db" => "keterangan",
                "dt" => "keterangan",
            ),   
            array(
                "db" => "jenis_kelamin",
                "dt" => "jenis_kelamin",
            ),                            
            array(
                "db" => "pekerjaan",
                "dt" => "pekerjaan",
            ),    
            array(
                "db" => "ktp",
                "dt" => "ktp",
            ),              
            array(
                "db" => "ihs_id",
                "dt" => "ihs_id",
            ),     
            array(
                "db" => "no_bpjs",
                "dt" => "no_bpjs",
            ),                         
            array(
                "db" => "id",
                "dt" => "id",
            ),   
        );
        $result = \SSP::complex($parameter, $this->dbcon, $this->view_name, $this->primary_key, $columns, null, $where);			
        return $result;            
    }    

    public function getPasienById($id){
        $query = $this->db->get_where('v_pasien', array('id' => $id));
        return $query->row();         
    }
    
    public function save($data)
    {
        $this->db->trans_start();     
        if($data["id"] == 0){          
            unset($data["id"]);            
            $this->db->insert($this->table_name, $data);
            $data["id"] = $this->db->insert_id();
        }  
        else{
            $dataUpdate = $data;
            unset($dataUpdate["id"]); 
            $this->db->where('id', $data['id']);            
            $this->db->update($this->table_name, $data);            
        }

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
            return array('status' => false, 'message' => $this->db->error());
        else
            return array('status' => true, 'data' => $data);        
    } 

    public function insert($data)
    {
        $this->db->trans_start();        
        //$this->db->insert($this->table_name, $data);
        $insert_pasein_stored_proc = "CALL uSP_Pasien(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $this->db->query($insert_pasein_stored_proc, $data);
        mysqli_next_result($this->db->conn_id);
        $result = $query->row();        
        $this->db->trans_complete();
        $ret_arr = array();
        if ($this->db->trans_status() === FALSE)
            return array('status' => 'gagal', 'data' => null);
        else
            return array('status' => 'ok', 'data' => $result);        
    }    

    public function delete($id, $user_id)
    {

        $this->db->trans_begin();
        $this->db->where('id', $id);                    
        $this->db->update($this->table_name, array('no_rm'=> NULL, 'is_deleted' => 1, 'modified_by' => $user_id));                        
        $result =  $this->db->affected_rows();
        $this->db->where('id_pasien', $id);                    
        $this->db->update('register_pasien', array('is_deleted' => 1, 'modified_by' => $user_id));                        
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
            return array('status' => false, 'message' => $this->db->error());
        else
            return array('status' => true, 'data' => $result);                
    }    

    public function setToAppointment($data)
    {
        $this->db->trans_start();     

            $dataUpdate = $data;
            unset($dataUpdate["id"]); 
            $this->db->where('id', $data['id']);            
            $this->db->update("users_appointment_register", $data);                    

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
            return array('status' => false, 'message' => $this->db->error());
        else
            return array('status' => true, 'data' => $data);        
    }     

    public function checkExistsRawatInap($id_pasien)
    {
        $sql = "SELECT 1 FROM rawat_inap ri WHERE id_pasien=? AND state_index < 4";
        $query = $this->db->query($sql, array($id_pasien));
        if($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }
}