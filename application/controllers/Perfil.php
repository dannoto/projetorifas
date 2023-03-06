<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {
	public function __construct() {

		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('login_model');
		$this->load->model('user_model');
		$this->load->model('email_model');

		$this->load->model('raffles_model');
		$this->load->model('payments_model');
		$this->load->model('cart_model');

		$this->user_model->Auth();

	}
	public function index()
	{
		$this->load->view('home');
	}

    public function sorteios()
	{
		$this->load->view('user/perfil/sorteios');
	}

	public function conta()
	{
		$this->load->view('user/perfil/conta');
	}

	public function creditos()
	{
		$this->load->view('user/perfil/creditos');
	}
}
