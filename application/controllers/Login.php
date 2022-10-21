<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {

		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('login_model');
		$this->load->model('user_model');
		$this->load->model('email_model');


	}

	public function index()
	{
		if ($this->session->userdata('session_user')){
			redirect(base_url());
		}

		$this->load->view('user/login');
	}

	public function auth() {
		if ($this->input->post() ) {

			$response = array();
			
			$user_email = htmlspecialchars($this->input->post('user_email'));
			$user_password = htmlspecialchars($this->input->post('user_password'));

			$auth = $this->login_model->Auth($user_email, $user_password);

			if ($auth) {

				$this->session->set_userdata('session_user', $auth);

				$response =  array('status' => 'true', 'message' => 'Logado com sucesso!');

			} else {

				$response =  array('status' => 'false', 'message' => 'Suas credenciais estão incorretas.');

			}

			print_r(json_encode($response));

		}
	}

	public function authAdmin() {
		if ($this->input->post() ) {

			$response = array();
			
			$user_email = htmlspecialchars($this->input->post('user_email'));
			$user_password = htmlspecialchars($this->input->post('user_password'));

			$auth = $this->login_model->Auth($user_email, $user_password);

			if ($auth == true) {
				if ( $auth['user_admin'] == 1) {

					$this->session->set_userdata('session_admin', $auth);
	
					$response =  array('status' => 'true', 'message' => 'Logado com sucesso!');
				} else {
					$response =  array('status' => 'false', 'message' => 'Voce não é um administrador.');

				}


			} else {

				$response =  array('status' => 'false', 'message' => 'Suas credenciais estão incorretas.');

			}

			print_r(json_encode($response));

		}
	}

	

}
