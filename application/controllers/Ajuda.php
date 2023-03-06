<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajuda extends CI_Controller {
	public function __construct() {

		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('login_model');
		$this->load->model('user_model');
		$this->load->model('email_model');

		$this->load->model('admin_model');

	}
	public function index()
	{

		$data = array(
            'faqs' => $this->admin_model->getFaqs(),
        );
        $this->load->view('user/ajuda', $data);
	}

}
