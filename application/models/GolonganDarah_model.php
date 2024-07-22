<?php defined('BASEPATH') OR exit('No direct script access allowed');

class GolonganDarah_model extends CI_Model {

    function __construct()
	{
		parent::__construct();
    }

    public function get(){				
		$golongan_darah = array(
			'A', 'B', 'AB', 'O',
		);
        return (object)$golongan_darah;
    }       
}