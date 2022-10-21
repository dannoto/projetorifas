<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sair extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('login_model');
		$this->load->model('user_model');
		$this->load->model('email_model');


	}
	public function index()
	{

		if ($this->session->userdata('session_admin')['user_admin'] == 1) {
			$this->session->unset_userdata('session_admin');
			redirect(base_url('painel/login'));
		} else {
			$this->session->unset_userdata('session_user');
			redirect(base_url('login'));
		}
  
    }
}