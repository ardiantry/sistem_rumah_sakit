<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CronBirthDay extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}

    public function index(){
        $query = "SELECT no_rm, nama_pasien, tanggal_lahir
        , pasien.no_telp no_telp_pasien
        , id_klinik
        , klinik.nama_klinik
        , COALESCE(klinik.no_hp, klinik.no_telp) no_telp
        FROM pasien
        INNER JOIN klinik
        ON pasien.id_klinik = klinik.id
        WHERE DAY(tanggal_lahir) = DAY(CURDATE())
        AND MONTH(tanggal_lahir) = MONTH(CURDATE())
        AND pasien.is_deleted = 0 AND pasien.id_klinik = 1;";
        $result = $this->db->query($query);
        $list_birth_days = $result->result();
        //var_dump($list_birth_days);
        //die();
        $this->sendWA($list_birth_days);
        //die();
    }
	

	public function sendWA($list_birth_days)
	{
		ob_start();
		// setting 
		$apikey      = 'c71464ead4de21b106d04a86682f4ca9'; // api key 
		$urlendpoint = 'http://sms114.xyz/sms/api_whatsapp_send_json.php'; // url endpoint api 
		$waid = '35H085'; // whatsapp id 
		
		// create header json  
		$senddata = array(
			'apikey' => $apikey,  
			'waid' => $waid, 
			'datapacket'=>array()
		);

		
		foreach($list_birth_days as $birth_day){
			$sendingdatetime = "";
            $message = "Selamat Ulang Tahun ".$birth_day->nama_pasien.", semoga masa depan yang indah selalu bersama dengan bertambahnya usia Anda.
            Bagaimana kondisi kesehatan Anda hari ini? Bisakah Anda mengirimkan pesan balasan kepada kami ".$birth_day->nama_klinik." ke nomor Whatsapp ".$birth_day->no_telp." perihal masalah kesehatan Anda yang sekiranya bisa mengganggu Anda dalam meraih mimpi Anda di Masa Depan?
            
            Terimakasih atas perhatian dan kepercayaan yang sudah terjalin hingga saat ini.
            
            Ttd - Admin ".$birth_day->nama_klinik."
            
            _pesan ini dikirim melalui sistem, harap tidak membalas ke nomor ini";

            array_push($senddata['datapacket'],array(
				'number' => trim($birth_day->no_telp_pasien),
				'message' => urlencode(stripslashes(utf8_encode($message))),
				'sendingdatetime' => $sendingdatetime)
			);			
		}		
		
		
		$data=json_encode($senddata);
		$curlHandle = curl_init($urlendpoint);
		curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curlHandle, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data))
		);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
		curl_setopt($curlHandle, CURLOPT_CONNECTTIMEOUT, 30);
		$responjson = curl_exec($curlHandle);
		curl_close($curlHandle);		
		return $responjson;
	}	
}
