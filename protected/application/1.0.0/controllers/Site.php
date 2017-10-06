<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->output->delete_cache();
		$this->output->enable_profiler(TRUE);
	}
	
	public function index()
	{
		$data['title'] = 'Home | ' . $this->config->item('site_title');
		$data['css_files'] = array();
		$data['js_files'] = array();

		$this->load->view('index');
	}

	public function admin()
	{
		if(!isset($_SESSION['admin'])) {
			redirect('admin/login', 'refresh');
		}
		
		$uri = $this->uri->slash_segment(1);//Slash Segment will be used if module has submodule otherwise use segment alone.
		if(null === $this->users_model->has_access($_SESSION['admin'], $uri)) {
			show_404();
		}

		$data['title'] = 'Administrator | ' . $this->config->item('site_title');
		$data['css_files'] = array();
		$data['js_files'] = array();
		$data['modules'] = $this->template_model->get_access($_SESSION['admin']);
        end($modules); // move the internal pointer to the end of the array
        //$key = key($modules);
	}
}