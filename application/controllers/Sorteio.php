<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sorteio extends CI_Controller {
	public function __construct() {

		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('login_model');
		$this->load->model('user_model');
		$this->load->model('email_model');
		$this->load->model('admin_model');
		$this->load->model('category_model');
        $this->load->model('raffles_model');
        $this->load->model('payments_model');
        $this->load->model('cart_model');


	}

	public function index()
	{
		redirect(base_url());
	}

	

	public function u($raffles_id)
	{

		$raffles_id = htmlspecialchars($raffles_id);

		if (!$this->raffles_model->getRaffle($raffles_id)) {
			redirect(base_url());
		}

		$data = array(
			'raffle' => $this->raffles_model->getRaffle($raffles_id),
		);
		$this->load->view('user/sorteio', $data);
	}


	
}
