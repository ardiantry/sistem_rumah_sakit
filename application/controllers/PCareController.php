<?php 

use AamDsam\Bpjs\PCare;

class PCareController extends MY_Controller {
	function __construct()
	{
        parent::__construct();
	}

    public function pcare_conf()
    {
        $config = [
                'cons_id'      => "1912",
                'secret_key'   => "1dB5F73883",
                'username'     => "timoti",
                'password'     => "Timoti-1992",
                'app_code'     => "095",
                //'base_url'     => "https://dvlp.bpjs-kesehatan.go.id:9080",
                'base_url'     => "https://apijkn-dev.bpjs-kesehatan.go.id",
                'service_name' => "pcare-rest-dev",
                'user_key' => "1393489153c568821abb4dda3f331f9d",                
        ];
        return $config;
    }

    public function kesadaran()
    {
        $bpjs = new PCare\Kesadaran($this->pcare_conf());
        return $this->setJSON($bpjs->index());        
    }  	

    public function peserta($keyword)
    {
        $bpjs = new PCare\Peserta($this->pcare_conf());
        return $this->setJSON($bpjs->keyword($keyword)->show());   
    }      

    public function pesertabyjeniskartu($jeniskartu, $keyword)
    {
        $bpjs = new PCare\Peserta($this->pcare_conf());
        return $this->setJSON($bpjs->jenisKartu($jeniskartu)->keyword($keyword)->show());   
    }        
    
    public function poli($page=0, $limit=10)
    {
        $bpjs = new PCare\Poli($this->pcare_conf());
        return $this->setJSON($bpjs->index($page, $limit));
    }     
    
    public function dokter($page=0, $limit=10)
    {
        $bpjs = new PCare\Dokter($this->pcare_conf());
        return $this->setJSON($bpjs->index($page, $limit));
    }       

    public function tindakan($keyword, $page=0, $limit=10)
    {        
        $bpjs = new PCare\Tindakan($this->pcare_conf());
        return $this->setJSON($bpjs->kodeTkp($keyword)->index($page, $limit));          
    }       
  
    public function tindakans($keyword)
    {        
        return $this->setJSON($keyword);          
    }        
}