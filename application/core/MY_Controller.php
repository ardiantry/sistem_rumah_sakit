<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
    public function __construct() {
      parent::__construct();
        if (!$this->ion_auth->logged_in())
        {
            if ($this->input->is_ajax_request()) {
                //exit('No direct script access allowed');
                header('Content-Type: application/json');
                $response = array('status' => false, 'error_code' => -1, 'message' => 'Sesi anda habis, silahkan login kembali.');
                echo json_encode($response);			
                die();                
             }            
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
    }

    public function setJSON($data){
		$this->output->unset_template();                
        header('Content-Type: application/json');
        echo json_encode($data);
        die();        
    }

    public function setObject($data){
		$this->output->unset_template();      
        $json = json_encode($data);
        $obj = json_decode($json);                  
        return $obj;
    }    
}