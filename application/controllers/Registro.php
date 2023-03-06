<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

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

		

		$this->load->view('user/registro');
	}

	public function add_user() {
		
		if ($this->input->post() ) {

			$user_name = htmlspecialchars($this->input->post('user_name'));
			$user_surname = htmlspecialchars($this->input->post('user_surname'));
			$user_email = htmlspecialchars($this->input->post('user_email'));
			$user_cpf = htmlspecialchars($this->input->post('user_document'));
			$user_ddd = htmlspecialchars($this->input->post('user_ddd'));
			$user_phone = htmlspecialchars($this->input->post('user_phone'));
			$user_password = htmlspecialchars($this->input->post('user_password'));
			$user_ref = htmlspecialchars($this->input->post('user_ref'));
			$user_ip = $this->register_model->getUserIP();


			// Validations
			$validate_document = $this->register_model->validate_document($user_cpf);
			$validate_cpf = $this->register_model->validate_cpf($user_cpf);
			$validate_banned_document = $this->register_model->validate_banned_document($user_cpf);
			$validate_email = $this->register_model->validate_email($user_email);
			$validate_phone = $this->register_model->validate_phone($user_phone);

			

			$response = array();


			if ($validate_document && $validate_banned_document) {

				if ($validate_cpf) {

					if ($validate_email) {

						if ($validate_phone) {

							//Creating user
							if ($this->register_model->addUser($user_name, $user_surname, $user_email, $user_cpf, $user_ddd, $user_phone, $user_password, $user_ref, $user_ip)) {

								// Creating session
								$auth = $this->login_model->Auth($user_email, $user_password);

								if ($auth) {
									
									$this->session->set_userdata('session_user', $auth);

									// Enviando E-mail
									$this->email_model->welcomeUser($auth);

									// Adicionando usuario na lista do active campaign
									$list_id = $this->admin_model->getGateways()['gateway_act_list'];
									$this->email_model->addUserToList($list_id, $user_name, $user_surname, $user_email);

									$response =  array('status' => 'true', 'message' => 'Cadastrado com sucesso!');

								} else {

									$response =  array('status' => 'false', 'message' => 'Ocorreu um erro ineperado.');

								}

							} else {

								$response =  array('status' => 'false', 'message' => 'Ocorreu um erro. Tente mais tarde.');

							}

						} else {

							$response =  array('status' => 'false', 'message' => 'Este telefone já está sendo usado.');

						}

					} else {
							
						$response =  array('status' => 'false', 'message' => 'Este e-mail já está sendo usado.');

					}

				} else {
							
					$response =  array('status' => 'false', 'message' => 'Este CPF é inválido.');

				}
			} else {

				$response = array('status' => 'false', 'message' => 'Este CPF já está sendo usado. Ou foi banido.');
						
			}


			print_r(json_encode($response));

		}
	}

	public function update_user() {
		
		if ($this->input->post() ) {

			$user_name = htmlspecialchars($this->input->post('user_name'));
			$user_surname = htmlspecialchars($this->input->post('user_surname'));
			$user_email = htmlspecialchars($this->input->post('user_email'));
			
			$user_ddd = htmlspecialchars($this->input->post('user_ddd'));
			$user_phone = htmlspecialchars($this->input->post('user_phone'));
			$user_id = $this->session->userdata('session_user')['id'];
			


			// Validations
			$validate_email = $this->register_model->validate_email($user_email);
	

			

			$response = array();



				

					if ($validate_email != FALSE || $user_email == $this->session->userdata('session_user')['user_email']) {

					

							//Creating user
							if ($this->register_model->updateUser($user_id, $user_name, $user_surname, $user_email,  $user_ddd, $user_phone)) {

								$response =  array('status' => 'true', 'message' => 'Atualizado com sucesso');


							} else {

								$response =  array('status' => 'false', 'message' => 'Ocorreu um erro. Tente mais tarde.');

							}

						

					} else {
							
						$response =  array('status' => 'false', 'message' => 'Este e-mail já está sendo usado.');

					}

	

			print_r(json_encode($response));

		}
	}


}
