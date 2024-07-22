<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CronReminder extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}

    public function index(){
        $rencana_kontrol_query = "SELECT * FROM v_register_pasien_rencana_kontrol_sms
		WHERE tanggal_kontrol = DATE_ADD(CURDATE(), INTERVAL 2 DAY)";
        $rencana_kontrol_result = $this->db->query($rencana_kontrol_query);
        $rencana_kontrol_list = $rencana_kontrol_result->result();

        $reminder_query = "SELECT * FROM v_register_pasien_reminder_paket_sms
		WHERE tanggal_kontrol = DATE_ADD(CURDATE(), INTERVAL 2 DAY)";
        $reminder_result = $this->db->query($reminder_query);
        $reminder_list = $reminder_result->result();		

        $this->sendWA($rencana_kontrol_list);
        $this->sendWA($reminder_list);
        //die();
    }

	public function sendWA($list)
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

		
		foreach($list as $rencana_kontrol){
			$sendingdatetime = "";
			$message = "Sehubungan dengan akan dilakukannya ". $rencana_kontrol->alasan_kontrol ." ke ". $rencana_kontrol->nama_unit_layanan ." terhadap saudara/saudari ". $rencana_kontrol->nama_pasien ." pada tanggal ". dateFormat($rencana_kontrol->tanggal_kontrol) ." di ". $rencana_kontrol->nama_klinik .", maka diharapkan untuk dapat melakukan pendaftaran sejak saat ini ke nomor telepon/WA ". $rencana_kontrol->no_telp ."/". $rencana_kontrol->no_hp .".
			Terimakasih atas perhatian dan kerjasamanya.
			Ttd - Admin ". $rencana_kontrol->nama_klinik .".
			_pesan ini dikirim melalui sistem, harap tidak membalas.";			
			array_push($senddata['datapacket'],array(
				'number' => trim($rencana_kontrol->no_telp_pasien),
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
