<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MX_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Auth_model');
	}

	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] 		= 'Administrator Login | ' . $this->config->item('site_title');
		$data['css_files'] 	= array();
		$data['js_files'] 	= array(
								'assets/validator/validator.min.js',
								'assets/themes/adminlte/plugins/input-mask/jquery.inputmask.js',
								'search_consumer'
							);
		$pages 				= array(
								'layout/header',
								'layout/navbar',
								'search/search_consumer',
								'layout/copyright',
								'layout/footer'
							);

		$this->form_validation->set_rules('username', 'Username', 'trim|required||regex_match[/^[-a-zA-Z0-9._]+$/]',
											array('required' => 'Please fill out this field.',
												  'regex_match' => 'Format Invalid. (E.g.: johndoe2018)'
												 )
										 );
		$this->form_validation->set_rules('password', 'Password', 'trim|required',
											array('required' => 'Please fill out this field.')
										 );
		if ($this->form_validation->run() === TRUE)
		{
			if ($admin = $this->auth_model->search_admin())
			{
				$password = $this->input->post('password');
				if(password_verify($password, $admin->password))
				{
					$this->session->admin = $admin;
					redirect('');
				}
			}
			$data['err_msg'] = "Invalid Username or Password.";
		}

		load_pages($pages, $data); // Function created by layout_helper.php to load pages dynamically
	}
}
