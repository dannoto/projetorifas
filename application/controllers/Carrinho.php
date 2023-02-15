<?php
defined('BASEPATH') or exit('No direct script access allowed');



// SDK do Mercado Pago
require './vendor/autoload.php';


class Carrinho extends CI_Controller
{
	public function __construct()
	{

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


		// TEST-706b7ac3-82e7-4160-acb1-34af8a109feb
		// TEST-4954716499435933-021512-74056596bbb48acd647eba5659de1a06-542182298

		// Adicione as credenciais
		MercadoPago\SDK::setAccessToken('TEST-4954716499435933-021512-74056596bbb48acd647eba5659de1a06-542182298');

		// Cria um objeto de preferência
		$preference = new MercadoPago\Preference();

		// Cria um item na preferência
		$item = new MercadoPago\Item();
		$item->title = 'Meu produto';
		$item->quantity = 1;
		$item->unit_price = 75.56;
		$preference->items = array($item);

		// $preference->back_urls = array(
		// 	"success" => base_url() . 'status',
		// 	"failure" => base_url() . 'status',
		// 	"pending" => base_url() . 'status',
		// );
		// $preference->notification_url = base_url('notifications');
		// $preference->external_reference = $order_id;

		// $preference->auto_return = "approved";

		$preference->save();

		print_r($preference);


		$data = array(
			'cart' => $this->cart_model->getCart($this->session->userdata('session_user')['id']),
		);

		$this->load->view('user/carrinho', $data);


		// Cria um objeto de preferência
		// $preference = new MercadoPago\Preference();

		// // Cria um item na preferência
		// $item = new MercadoPago\Item();

		// $item->title = 'COMPRAS SOCURSOEAD.COM';
		// $item->quantity = 1;
		// $item->unit_price = $order_total;
		// $preference->items = array($item);

		// $preference->back_urls = array(
		// 	"success" => base_url() . 'status',
		// 	"failure" => base_url() . 'status',
		// 	"pending" => base_url() . 'status',
		// );
		// $preference->notification_url = base_url('notifications');
		// $preference->external_reference = $order_id;

		// $preference->auto_return = "approved";

		// $preference->save();

		// if ($preference->id) {

		// 	if ($order_id) {
		// 		//Get products from cart
		// 		foreach ($this->cart_model->getCart($_COOKIE['cart_identifier']) as $c) {
		// 			//Creating order Items
		// 			if ($this->session->userdata('session_user')['usr_type'] == "COLAB") {
		// 				$this->order_model->addOrderItems($order_id, $order_status, $c->cart_course, $c->cart_quantity, $order_user, $c->cart_price);
		// 			} else {
		// 				$this->order_model->addOrderItems($order_id, $order_status, $c->cart_course, $c->cart_quantity, $order_user, $c->cart_price_company);
		// 			}
		// 		}

		// 		//Redirect to payment
		// 		// header("Location:checkout/".$order_id);

		// 		echo $preference->id;
		// 		// redirect(base_url('checkout/'.$order_id));
		// 	}
		// } else {
		// 	echo "erro";
		// }
	}


	// Actions

	public function desaplyCupom()
	{

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

	public function applyCupom()
	{

		$response = array();

		$cart_discount_code = htmlspecialchars($this->input->post('cart_discount_code'));

		$cupom = $this->cart_model->getCupomByCode($cart_discount_code);

		if ($cupom) {

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


	public function deleteCartTicket()
	{

		$cart_ticket = htmlspecialchars($this->input->post('cart_ticket'));
		$cart_user = htmlspecialchars($this->input->post('cart_user'));
		$cart_raffle = htmlspecialchars($this->input->post('cart_raffle'));

		if ($this->cart_model->deleteCartTicket($cart_ticket, $cart_user, $cart_raffle)) {

			//Update cart amount
			$ticket_value = $this->raffles_model->getRaffle($cart_raffle)['raffles_tickets_value'];
			$cart_amount = (count($this->cart_model->getCartTickets($cart_raffle, $cart_user)) * $ticket_value);

			$this->cart_model->updateCart($cart_raffle, $cart_amount, $cart_user);
		}

		//Deletando cart se amount for 0
		if ($cart_amount == 0) {
			$this->cart_model->deleteCart(null, $cart_user, $cart_raffle);
		}
	}

	public function deleteCart()
	{

		$cart_id = htmlspecialchars($this->input->post('cart_id'));
		$cart_user = htmlspecialchars($this->input->post('cart_user'));
		$cart_raffle = htmlspecialchars($this->input->post('cart_raffle'));

		if ($this->cart_model->deleteCart($cart_id, $cart_user, $cart_raffle)) {

			$this->cart_model->deleteCartTicketAll($cart_user, $cart_raffle);
		}
	}


	public function checkTotalTicketsBuyed()
	{
		$raffle_id = htmlspecialchars($this->input->post('raffle_id'));
		$raffle_user = htmlspecialchars($this->input->post('raffle_user'));

		$response = array();

		$tickets_buyed = count($this->payments_model->checkBuyedTickets($raffle_id, $raffle_user));
		$tickets_limit = $this->raffles_model->getRaffle($raffle_id)['raffles_tickets_limit'];

		// if ($tickets_buyed >= $tickets_limit) {

		// 	return false;
		// } else {

		// 	return true;
		// }


		$response = array('status' => 'true', 'message' => $tickets_buyed);
		return print_r(json_encode($response));
	}


	public function checkTotalTicketsCart()
	{

		$cart_raffle = htmlspecialchars($this->input->post('cart_raffle'));
		$cart_user = htmlspecialchars($this->input->post('cart_user'));

		$response = array();

		$tickets_buyed = count($this->payments_model->checkCartTickets($cart_raffle, $cart_user));
		$tickets_limit = $this->raffles_model->getRaffle($cart_raffle)['raffles_tickets_limit'];

		// if ($tickets_buyed >= $tickets_limit) {

		// 	return false;
		// } else {

		// 	return true;
		// }


		$response = array('status' => 'true', 'message' => $tickets_buyed);
		return print_r(json_encode($response));
	}

	public function addCartTickets()
	{

		$response = array();

		$cart_raffle = htmlspecialchars($this->input->post('cart_raffle'));
		$ticket_value = htmlspecialchars($this->input->post('ticket_value'));
		$cart_tickets = $this->input->post('cart_ticket');
		$cart_user = htmlspecialchars($this->input->post('cart_user'));
		$cart_data = date('d-m-Y');
		$cart_time = date('H:i');
		$cart_expiration = date('H:i', strtotime($cart_time . '+30 minutes'));
		$cart_status = 1;



		//Adicionando tickets do sorteio ao carrinho.
		foreach ($cart_tickets as $c) {

			if (!$this->cart_model->getCartTicket($c, $cart_raffle)) {

				$this->cart_model->addCartTicket($cart_raffle, $c, $cart_user, $cart_data, $cart_time, $cart_expiration, $cart_status);
			}
		}


		//Calculando Total do Carrinho neste Sorteio
		$cart_amount = (count($this->cart_model->getCartTickets($cart_raffle, $cart_user)) * $ticket_value);


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
