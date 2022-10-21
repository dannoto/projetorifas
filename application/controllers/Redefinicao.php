<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Redefinicao extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('login_model');
		$this->load->model('user_model');
		$this->load->model('email_model');


	}

    public function index() {

    }

	public function t($user_token)
	{

        $user_data = $this->user_model->getUserByToken($user_token);

        if ($user_data) {

            $data = array(
                'user_token' => $user_token
            );
		    $this->load->view('user/redefinicao', $data);

        } else {
            redirect(base_url());
        }
	}


	public function updatePassword() {

		if ($this->input->post() ) {

			$response = array();

			$user_password = htmlspecialchars($this->input->post('user_password'));
			$user_token = htmlspecialchars($this->input->post('user_token'));

            $user_data = $this->user_model->getUserByToken($user_token);

            if ($user_data) {

                if ($this->user_model->updatePassword($user_data['id'], $user_password)) {

                        if ($this->user_model->updateToken($user_data['id'])) {

                            $response = array('status' => 'true', 'message' => 'Senha alterada com sucesso.');

                        } else {

                            $response = array('status' => 'false', 'message' => 'Ocorreu um erro inesperado.');

                        }

                } else {

					$response = array('status' => 'false', 'message' => 'Ocorreu um erro inesperado.');

                }
            } else {
                $response = array('status' => 'false', 'message' => 'Token inválido.');

            }

			print_r(json_encode($response));


		}
	}
   
}
