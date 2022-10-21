<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrinho extends CI_Controller {
	public function __construct() {

		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('login_model');
		$this->load->model('user_model');
		$this->load->model('email_model');
		$this->load->model('cart_model');
		$this->load->model('raffles_model');


	}
	public function index()
	{
		$data = array(
			'cart' => $this->cart_model->getCart($this->session->userdata('session_user')['id']),
			
		);
		$this->load->view('user/carrinho', $data);
	}


	// Actions

	public function desaplyCupom() {
		
		$response = array();

		$cupom_id = htmlspecialchars($this->input->post('cupom_id')); 

		if ($this->cart_model->disaplyCupom($this->session->userdata('session_user')['id'])) {

			//increase
			$this->cart_model->increaseCupom($cupom_id);

			$response = array('status' => 'true', 'message' => 'Cupom removido!');

		} else {
			$response = array('status' => 'false', 'message' => 'Ocorreu um erro inesperado.');
		}

		print_r(json_encode($response));


	}

	public function applyCupom() {

		$response = array();

		$cart_discount_code = htmlspecialchars($this->input->post('cart_discount_code')); 

		$cupom = $this->cart_model->getCupomByCode($cart_discount_code);

		if ($cupom){

			if ($cupom['cart_discount_limit'] > 0) {


				if ($this->cart_model->applyCupom($this->session->userdata('session_user')['id'], $cupom['cart_discount_porcentage'], $cupom['id'])) {

					//Decrease
					$this->cart_model->dicreaseCupom($cupom['id']);
					$response = array('status' => 'true', 'message' => 'Cupom aplicado! ');
				}



			} else {

				$response = array('status' => 'false', 'message' => 'Cupom expirado!');

			}

		} else {

			$response = array('status' => 'false', 'message' => 'Cupom inválido!');

		}

		print_r(json_encode($response));

	}


	public function deleteCartTicket() {

		$cart_ticket = htmlspecialchars($this->input->post('cart_ticket')); 
		$cart_user = htmlspecialchars($this->input->post('cart_user')) ; 
		$cart_raffle = htmlspecialchars($this->input->post('cart_raffle')); 

		if ($this->cart_model->deleteCartTicket($cart_ticket, $cart_user, $cart_raffle)){

			//Update cart amount
			$ticket_value = $this->raffles_model->getRaffle($cart_raffle)['raffles_tickets_value'];
			$cart_amount = (count($this->cart_model->getCartTickets($cart_raffle, $cart_user)) * $ticket_value );

			$this->cart_model->updateCart($cart_raffle, $cart_amount, $cart_user);

		}

		//Deletando cart se amount for 0
		if ($cart_amount == 0) {
			$this->cart_model->deleteCart(null, $cart_user, $cart_raffle);
		}

	}

	public function deleteCart() {

		$cart_id = htmlspecialchars($this->input->post('cart_id')) ; 
		$cart_user = htmlspecialchars($this->input->post('cart_user')) ; 
		$cart_raffle = htmlspecialchars($this->input->post('cart_raffle')) ;

		if ($this->cart_model->deleteCart($cart_id, $cart_user, $cart_raffle)) {

			$this->cart_model->deleteCartTicketAll($cart_user, $cart_raffle);

		}

	}

	
	public function checkTotalTicketsBuyed() {
		$raffle_id = htmlspecialchars($this->input->post('raffle_id')); 
		$raffle_user = htmlspecialchars($this->input->post('raffle_user')); 

		$response = array();

		$tickets_buyed = count($this->payments_model->checkBuyedTickets($raffle_id, $raffle_user ));
		$tickets_limit = $this->raffles_model->getRaffle($raffle_id)['raffles_tickets_limit'];
		
		// if ($tickets_buyed >= $tickets_limit) {
			
		// 	return false;
		// } else {
			
		// 	return true;
		// }
	

		$response = array('status' => 'true', 'message' => $tickets_buyed);
		return print_r(json_encode($response));
	}


	public function checkTotalTicketsCart() {

		$cart_raffle = htmlspecialchars($this->input->post('cart_raffle')); 
		$cart_user = htmlspecialchars($this->input->post('cart_user')); 

		$response = array();

		$tickets_buyed = count($this->payments_model->checkCartTickets($cart_raffle, $cart_user ) );
		$tickets_limit = $this->raffles_model->getRaffle($cart_raffle)['raffles_tickets_limit'];
		
		// if ($tickets_buyed >= $tickets_limit) {
			
		// 	return false;
		// } else {
			
		// 	return true;
		// }

		
		$response = array('status' => 'true', 'message' => $tickets_buyed);
		return print_r(json_encode($response));
		

	}

	public function addCartTickets() {

		$response = array();

		$cart_raffle = htmlspecialchars($this->input->post('cart_raffle')) ; 
		$ticket_value = htmlspecialchars($this->input->post('ticket_value'));
		$cart_tickets = $this->input->post('cart_ticket'); 
		$cart_user = htmlspecialchars($this->input->post('cart_user')); 
		$cart_data = date('d-m-Y'); 
		$cart_time = date('H:i'); 
		$cart_expiration = date('H:i', strtotime($cart_time.'+30 minutes'));
		$cart_status = 1;


	
				//Adicionando tickets do sorteio ao carrinho.
				foreach ($cart_tickets as $c) {
		
					if (!$this->cart_model->getCartTicket($c, $cart_raffle)) {
		
						$this->cart_model->addCartTicket($cart_raffle, $c, $cart_user, $cart_data, $cart_time, $cart_expiration, $cart_status);
		
					}
		
				}
		
		
				//Calculando Total do Carrinho neste Sorteio
				$cart_amount = (count($this->cart_model->getCartTickets($cart_raffle, $cart_user)) * $ticket_value );
		
				
				//Adicionando Sorteio ao Carrinho
		
				if (!$this->cart_model->getCart($cart_user, $cart_raffle)) {
		
					if ($this->cart_model->addCart($cart_raffle, $cart_amount, $cart_user, $cart_data, $cart_time, $cart_expiration, $cart_status)) {
						
						$response = array('status' => 'true', 'message' => 'Pronto! Seus tickets foram adicionados no carrinho.');
					
					}
				} else {
		
					if ($this->cart_model->updateCart($cart_raffle, $cart_amount, $cart_user)) {
						
						$response = array('status' => 'true', 'message' => 'Pronto! Seus tickets foram adicionados no carrinho.');
					
					}
		
				}

		

		
		print_r(json_encode($response));

		// print_r($cart_tickets);

	}
}
