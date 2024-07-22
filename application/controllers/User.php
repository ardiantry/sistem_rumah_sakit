<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
        $this->load->model('User_model');       		

		$this->_init();
	}

	private function _init()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

		$this->load->model('Menu_model');       		
		$data['menu'] = $this->Menu_model->get();	

		$this->load->section('sidebar', 'template/sidebar', $data);		
		$this->output->set_template('adminLTE');
		$this->load->css('https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css');
		$this->load->css('https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css');
        $this->load->css('https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css');                
        $this->load->css('https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.12/css/dataTables.checkboxes.css');                                
		$this->load->css('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.css');
		$this->load->css('assets/themes/adminLTE/dist/css/wizard.css');

		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/moment.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js');
		$this->load->js('https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js');
		$this->load->js('https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js');
		$this->load->js('https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js');
        $this->load->js('https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js');
        $this->load->js('https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.12/js/dataTables.checkboxes.min.js');                                                
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js');
		$this->load->js('https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.0/dist/latest/bootstrap-autocomplete.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js');		
		$this->load->js('https://cdn.jsdelivr.net/npm/sweetalert2@9');				
		$this->load->js('assets/js/helper.20211205.js');		
		$this->load->js('assets/js/user.20211205.js');		
    }
	
	public function index()
	{      
		$group = array('admin', 'administrator_klinik', 'super_admin_klinik');
		$data['page_title'] = "Data Pengguna";
		$data['page_menu'] = "User";		
		$data['hakAkses'] = "";		

		if (!$this->ion_auth->in_group($group))
		{
			$this->load->view('errors/custom/error_403', $data);        			
		}
		else{
			if ($this->ion_auth->in_group('administrator_klinik')){
				$data['hakAkses'] = "d-none";				
			}			
			$this->load->view('user/users', $data);
		}				        
	}

	public function getUsersDatatable()
	{
		$this->output->unset_template();
		$id_klinik = $this->ion_auth->user()->row()->id_klinik;
		if ($this->ion_auth->in_group(array('admin', 'super_admin_klinik')))
		{
			$where = "name IN ('administrator_klinik', 'operator_klinik') AND id_klinik=" . $id_klinik . " AND is_deleted=0";
		}
		else{
			$where = "name = 'operator_klinik' AND id_klinik=" . $id_klinik . " AND is_deleted=0";
		}		
        $result = $this->User_model->getUserDataTable($this->input->post(), $where);
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($result);
	}

	public function checkEmail()
	{      
		$this->output->unset_template();		
		$email = $this->input->post('formEmail');
		if(!$this->ion_auth->email_check($email)){
			echo 'true';
		}
		else{
			echo 'false';
		}
	}
	
	function saveUser()
	{
		$this->output->unset_template();
		$dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);    
		if($postData->id > 0){
			$id = $postData->id;
			$data = array(
					'first_name' => $postData->first_name,
					'last_name' => $postData->last_name,
					'phone' => $postData->telepon, 	
					'email' => $postData->email,							
					'active' => $postData->is_active,
					'id_klinik' => $this->ion_auth->user()->row()->id_klinik,
					'modified_by' => $this->ion_auth->user()->row()->id          					
				   );
			if($postData->password){
				$data["password"] = $postData->password;
			};
			// pass NULL to remove user from all groups
			$this->ion_auth->remove_from_group(NULL, $id);
			// pass NULL to remove user from all groups
			$this->ion_auth->add_to_group($postData->user_group, $id);						
			$result = $this->ion_auth->update($id, $data);
		}else{
			$username = '';
			$password = $postData->password;
			$email = $postData->email;
			$additional_data = array(
						'first_name' => $postData->first_name,
						'last_name' => $postData->last_name,
						'phone' => $postData->telepon, 					
						'active' => $postData->is_active,
						'id_klinik' => $this->ion_auth->user()->row()->id_klinik,
						'modified_by' => $this->ion_auth->user()->row()->id            					
						);
			$group = array($postData->user_group);			
			

			$result = $this->ion_auth->register($username, $password, $email, $additional_data, $group);
			$this->User_model->insertRegisterPrivilege($result, ($postData->user_group == 5) ? 0 : 2);                					

		}

		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('status' => true, 'data' => $result));
	}    	
	
	function deleteUser()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
        $id = $postData->id;
        $user = $this->ion_auth->user()->row();			
        	                
		$result = $this->User_model->delete($id, $user->id);        
		//add the header here
        header('Content-Type: application/json');
        if($result > 0)
            echo json_encode(array('status' => true, 'data' => $result));
        else
            echo json_encode(array('status' => false, 'message' => 'gagal'));        
	}  	
	
	function getRegisterPrivilege(){
        $this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
		$postData = json_decode($dataClear);        
        $id = $postData->id;
        $registerPrivilege = $this->User_model->getRegisterPrivilege($id);                
		//add the header here
		header('Content-Type: application/json');
		echo json_encode(array('data' => $registerPrivilege));
	}		

	function savePrivilege()
	{
		$this->output->unset_template();
        $dataClear = $this->security->xss_clean($this->input->raw_input_stream);
        $postData = json_decode($dataClear);        
		$user = $this->ion_auth->user()->row();				        
		$menu = array();
		foreach($postData->menu as $key => $value){
			$menu[] = array(
				'id_user' => $postData->id_user,
				'id_menu' => str_replace('Status-', '', $key) ,
				'privilege_status' => $value
			);			
		}
        $registerPrivilege = $this->User_model->saveRegisterPrivilege($postData->id_user, $menu);                		
				
		//add the header here
		header('Content-Type: application/json');
		echo json_encode($registerPrivilege);
	}    	
}
