<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Agama_model extends CI_Model {

    function __construct()
	{
		parent::__construct();
    }

    public function get(){				
		$agama = array(
			'Islam', 'Kristen ', 'Katholik', 'Hindu', 'Budha', 'Kong Hu Cu', '-'
		);
        return (object)$agama;
    }       
}