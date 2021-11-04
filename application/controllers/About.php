<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class about extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Banner_model');
		$this->load->model('About_model');
	}

    public function index()
	{
		$data['banner'] = $this->Banner_model->fecthAboutActive(); 
		$data['abouts'] = $this->About_model->fetchActiveAll();
		$data['nums'] = count($data['abouts']);
		
		$this->load->view('head');
		$this->load->view('aboutus',$data);
		$this->load->view('footer');

	}
}
