<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class service extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Service_model');
		$this->load->model('About_model');
	}

    public function index()
	{
		$data['service1'] = $this->Service_model->fetchType1();
		$data['service2'] = $this->Service_model->fetchType2();

		$this->load->view('head');
		$this->load->view('service/service',$data);
		$this->load->view('footer');
	}

	public function detail()
	{
		$s_id = $this->uri->segment(2);
        
        $b64 = strtr($s_id, '-_', '+/'); 
        $decoded = base64_decode($b64);
		
        if(is_numeric($decoded)){
			$data['s_descs'] = $this->Service_model->getDetails($decoded); 
			$data['s_images'] = $this->Service_model->getImages($decoded); 
			$data['num_img'] = count($data['s_images']);
			$this->load->view('head');
			$this->load->view('service/detail',$data);
			$this->load->view('footer');

		} else {
			redirect('error', 'refresh');
		}

	}
}
