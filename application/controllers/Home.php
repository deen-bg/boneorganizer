<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Service_model');
		$this->load->model('About_model');
	}

    public function index()
	{
		$data['aboutus'] = $this->About_model->fetchActiveAll();
		$data['service1'] = $this->Service_model->fetchType1();
		$data['service2'] = $this->Service_model->fetchType2();

		$data['contactus'] = $this->About_model->fetchContactActive(); // call about is active

		$this->load->view('head');
		$this->load->view('home',$data);
		$this->load->view('footer');
	}
}
