<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagamentos extends CI_Controller {
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

	public function paypal()
	{
		if ($this->session->userdata('session_admin')){
			redirect(base_url());
		}

		$this->load->view('user/login');
	}

    public function mercadopago()
	{
		if ($this->session->userdata('session_admin')){
			redirect(base_url());
		}

		$this->load->view('user/login');
	}

    public function credito()
	{

       if ($this->input->post()) {

            $cart_user = $this->session->userdata('session_user')['id'];
            
            if ($this->user_model->getUserById($cart_user)['user_credit'] >= $this->cart_model->getTotalCart()) {

                $carrinho = $this->cart_model->getCart($cart_user);

                

                //Pegando carrinho e adicionando tickets como comprados
                foreach ($carrinho as $c) {

                    //Criando pagamentos
                    $payment_id = $this->payments_model->addPayment($c->cart_raffle, $c->cart_amount, '1',$c->cart_user, 'creditos',  1);

                    //Adicionando RafflesBuyed
                    if (!$this->payments_model->checkBuyed($c->cart_raffle, $c->cart_user)) {
                        
                        $this->payments_model->addRafflesBuyed($c->cart_raffle, $payment_id, $c->cart_amount, $c->cart_user, date('d-m-Y'), date('H:i'), 0);
                    } else {
                        $old_amount = $this->payments_model->checkBuyed($c->cart_raffle, $c->cart_user)['raffles_amount'];
                        $this->payments_model->updateRafflesBuyed($c->cart_raffle,$payment_id, $c->cart_amount, $old_amount, $c->cart_user);

                    }
                    
                    foreach($this->cart_model->getCartTickets($c->cart_raffle, $c->cart_user) as $t) {

                        $ticket_raffle = $t->cart_raffle;
                        $ticket_number = $t->cart_ticket;
                        $ticket_user = $t->cart_user;
                        $ticket_date = date('d-m-Y');
                        $ticket_time =  date('H:i:s');
                        $ticket_payment_id = mt_rand();
                        $ticket_payment_type = 'credits';

                        $this->payments_model->addTicketBuyed($ticket_raffle, $ticket_number, $ticket_user, $ticket_date, $ticket_time, $ticket_payment_id, $ticket_payment_type);

                    }


                     //Atualiza porcentagem do sorteio
                     $raffles_tickets = $this->raffles_model->getRaffle($c->cart_raffle)['raffles_tickets'];
                     $raffles_buyed = count($this->payments_model->checkBuyedTickets($c->cart_raffle, null));

                     $this->raffles_model->updateProgress($c->cart_raffle, $raffles_tickets, $raffles_buyed);

                }

                //Subtrair créditos
                $this->payments_model->decreaseCredit($cart_user, $this->cart_model->getTotalCart(), $this->user_model->getUserById($cart_user)['user_credit']);

                //Limpando Carrinho

                $this->cart_model->resetCartByUser($cart_user);

                //Limpando carrinho ticket.
                $this->cart_model->resetCartTicketsByUser($cart_user);

               


                $data = array (
                    'status' => 'true',
                    'message' => 'Pagamento realizado com sucesso. <br> Aguarde o sorteio e boa sorte!'
                );

                redirect(base_url('perfil/sorteios'));


            } else {
                //SEM CREDITO
                $data = array (
                    'status' => 'false',
                    'message' => 'Você não possui créditos suficientes.<br>Faça o pagamento por outro método.'
                );

                $this->load->view('pagamento/status/failed', $data);

            }


       } else {

            redirect(base_url('carrinho'));

       }


	}

}