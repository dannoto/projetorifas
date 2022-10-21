<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recuperacao extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('login_model');
		$this->load->model('user_model');
		$this->load->model('email_model');


	}

	public function index()
	{
		$this->load->view('user/recuperacao');
	}


	public function sendRecoveryEmail() {
		
		if ($this->input->post() ) {

			$response = array();

			$user_email = htmlspecialchars($this->input->post('user_email') );

			// Check Email
			if ($this->user_model->getUserByEmail($user_email)) {

				$user_data = $this->user_model->getUserByEmail($user_email);

				if ($this->email_model->sendRecovery($user_data['user_email'], $user_data['user_token'])) {

					$response = array('status' => 'true', 'message' => 'Enviamos um e-mail para você.');

				} else {
					$response = array('status' => 'false', 'message' => 'Ocorreu um erro inesperado.');

				}

			} else {

				$response = array('status' => 'false', 'message' => 'Nenhuma conta com este e-mail.');

			}

			print_r(json_encode($response));


		}
	}
   
}
