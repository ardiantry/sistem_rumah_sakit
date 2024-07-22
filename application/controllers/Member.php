<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */

class Member extends CI_Controller
{
 
    function __construct()
	{
        parent::__construct();
        $this->load->model('ion_auth_model');  
        $this->load->model('Member_model');                   
    }
	public function membuatpassword()
	{      
		echo $this->ion_auth_model->hash_password('12345678');
		exit();
	}

public function registrasi()
	{   
		$data=array();
		$this->load->view('member/registrasi', $data);
	}
public function simpanRegistrasi()
	{   
		$alert=array();
		$error=true; 
		if(!@$this->input->post('first_name')){$alert['first_name']='Nama wajib di isikan';}
		if(!@$this->input->post('identity')){$alert['identity']='Email wajib di isikan';}
		if(!@$this->input->post('no_wa')){$alert['no_wa']='Nomor WA wajib di isikan';}
		if(!@$this->input->post('kantor')){$alert['kantor']='Nama Usaha wajib di isikan';}
		if(!@$this->input->post('alamat_kantor')){$alert['alamat_kantor']='Alamat Usaha wajib di isikan';}
		if(!@$this->input->post('keterangan')){$alert['keterangan']='Keterangan wajib di isikan';}
		if(!@$this->input->post('password')){$alert['password']='Password wajib di isikan';}
		if(!@$this->input->post('re_password')){$alert['re_password']='Ulang kata sandi wajib di isikan';}
		if(@$this->input->post('re_password')!=$this->input->post('password')){$alert['re_password']='Ulang kata sandi dengan benar';}
		$url        ='https://www.google.com/recaptcha/api/siteverify?secret=6LeplC8UAAAAAIYBsLpzVYUIMyvvnjAHokVt2oEj&response='.@$this->input->post('g-recaptcha-response');
		$verity     =@json_decode(@file_get_contents(@$url)); 
		if(!@$verity->success)
		{
			$alert['alert']='Pastikan Anda bukan Robot';

		} 
		$cek_email=$this->Member_model->get_email(@$this->input->post('identity'));
		if($cek_email)
		{
			$alert['identity']='Email sudah pernah terdaftar sebelumnya';
		}
		if(count($alert)<=0)
		{
				$data['first_name']		=@$this->input->post('first_name');
				$data['identity']		=@$this->input->post('identity');
				$data['no_wa']			=@$this->input->post('no_wa');
				$data['kantor']			=@$this->input->post('kantor');
				$data['alamat_kantor']	=@$this->input->post('alamat_kantor');
				$data['keterangan']		=@$this->input->post('keterangan');
				$data['password']		=$this->ion_auth_model->hash_password(@$this->input->post('re_password'));
				if(@$this->input->post('package')=='premium')
				{
					$data['type_join']		='premium';
					$data['nominal']		='723000';
				}

				$data['updated_at']		= date('Y-m-d H:i:s');
				$data['created_at']		= date('Y-m-d H:i:s');
				$save=$this->Member_model->save(@$data);
				if($save)
				{ 
					$alert['alert']='Registrasi sudah berhasil';
					$error=false; 
				}

		}
		print json_encode(array('error'=>$error, 'alert'=>$alert));
	}


}
