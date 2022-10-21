<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vencedores extends CI_Controller {
	public function __construct() {

		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('login_model');
		$this->load->model('user_model');
		$this->load->model('email_model');


	}
	public function index()
	{
		$this->load->view('user/vencedores');
	}

}
