<?php
defined('BASEPATH') or exit('No direct script access allowed');

require './vendor/autoload.php';


class Pagamentos extends CI_Controller
{
    public function __construct()
    {

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

        $this->user_model->Auth();
    }

    public function index()
    {


        $data = array(
            'pagamentos' => $this->payments_model->getUserPayment($this->session->userdata('session_user')['id']),
        );

        $this->load->view('user/pagamentos', $data);
    }

    function createPaymentConfig($order_id)
    {

        MercadoPago\SDK::setAccessToken($this->admin_model->getGateways()['gateway_me_secret']);

        // Cria um objeto de preferência
        $preference = new MercadoPago\Preference();

        // Cria um item na preferência
        $item = new MercadoPago\Item();
        $item->title = 'BetRaffle';
        $item->quantity = 1;
        $item->unit_price = $this->cart_model->getTotalCart();
        $preference->items = array($item);


        $preference->back_urls = array(
            "success" => base_url() . 'pagamentos/status',
            "failure" => base_url() . 'pagamentos/status',
            "pending" => base_url() . 'pagamentos/status',
        );
        $preference->notification_url = base_url('notifications');
        $preference->external_reference = $order_id;

        $preference->auto_return = "approved";

        $preference->save();


        return $preference->id;
    }

    function checkPayment($payment_id)
    {
        $url = "https://api.mercadopago.com/v1/payments/" . $payment_id;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Authorization: Bearer TEST-7865351743079375-072522-41d3edf94d6850dd4f65fd4c58562442-542182298",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        //for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);

        return json_decode($resp);
    }

    public function createPaymentOrder()
    {

        if ($this->input->post()) {

            $order_type = $this->input->post('order_type');

            $response = array();

            $order_user = $this->session->userdata('session_user')['id'];
            $carrinho = $this->cart_model->getCart($order_user);
            $order_amount = $this->cart_model->getTotalCart();

            $order_id = $this->payments_model->addOrder($order_amount, $order_user, $order_type);

            // Criando pagamento config
            $preference_id = $this->createPaymentConfig($order_id);

            //Criando intenção de pagamento - pendente
            $this->payments_model->addPayment(null, $order_id, $order_amount, 2,  $order_user, 1, null);

            //Pega o carrinho
            foreach ($carrinho as $c) {

                $order_raffle = $this->payments_model->addOrderRaffles($order_id, $c->cart_raffle, $c->cart_user);

                // Ordem dos Tickets
                foreach ($this->cart_model->getCartTickets($c->cart_raffle, $c->cart_user) as $t) {

                    $this->payments_model->addOrderRafflesTickets($order_raffle, $c->cart_raffle, $c->cart_user, $t->cart_ticket);
                }
            }

            if ($order_id) {

                $response = array('status' => 'true', 'message' => 'Ordem criada com sucesso.', 'preference_id' => $preference_id,  'order_id' => $order_id);
            } else {

                $response = array('status' => 'false', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');
            }

            return print_r(json_encode($response));
        }
    }

    public function status()
    {
        

        $payments_id =  htmlspecialchars($this->input->get('payment_id'));
        $reference_id = htmlspecialchars($this->input->get('preference_id'));
        $payment_type = htmlspecialchars($this->input->get('payment_type'));

        $data = $this->checkPayment($payments_id);
        
        // print_r($data);

        // // Pegando intenção de pagamento.
        $payment_data = $this->payments_model->getPaymentByOrder($data->external_reference);
        // echo "<br>pagamento data<br>";
        // print_r($payment_data);

        // //Pegando ordem
        $order_data = $this->payments_model->getOrder($payment_data['payments_order']);
        // echo "<br>ordem data<br>";

        // print_r($order_data);

        // //Pegando usuario
        $user_data = $this->user_model->getUserById($order_data['order_user']);
        // echo "<br>usuario data<br>";

        // print_r($user_data);

        // Atualizando pagamento
        // 1 sucesso / 2 pendente / 3 recusado / 4 estornado	

        if ($data->status == "approved") {

            $this->payments_model->updatePayment($payment_data['id'],$data->id, $data->payment_type_id,  1);

            //Limpando Carrinho
            $this->cart_model->resetCartByUser($user_data['id']);

            //Limpando carrinho ticket.
            $this->cart_model->resetCartTicketsByUser($user_data['id']);

            // Enviando E-mail
            $this->email_model->paymentApproved($user_data, $order_data);
        } else if ($data->status == "rejected") {

            $this->payments_model->updatePayment($payment_data['id'], $data->id, $data->payment_type_id,3);

            // Enviando E-mail
            $this->email_model->paymentRecused($user_data, $order_data);
        } else if ($data->status == "pending") {

            $this->payments_model->updatePayment($payment_data['id'],$data->id, $data->payment_type_id, 2);

            // Enviando E-mail
            $this->email_model->paymentPending($user_data, $order_data);
        } else if ($data->status == "cancelled") {

            $this->payments_model->updatePayment($payment_data['id'], $data->id, $data->payment_type_id , 3);

            // Enviando E-mail
            $this->email_model->paymentRecused($user_data, $order_data);
        } else if ($data->status == "in_process") {

            $this->payments_model->updatePayment($payment_data['id'], $data->id, $data->payment_type_id, 2);

            // Enviando E-mail
            $this->email_model->paymentPending($user_data, $order_data);
        }


        // Processando pagamento
        if ($order_data['order_status'] == 1) {
            // Ordem já foi processada
            // echo "Ordem já foi processada.";
            
        } else if ($order_data['order_status'] == 0) {
            //  Ordem pendente
            
            // echo "processando";

            if ($data->status == "approved") {

                $order_raffles = $this->payments_model->getOrderRaffles($order_data['id']);

                // print_r($order_raffles);

                foreach ($order_raffles as $c) {

                    // Ordem da Rifa
                    $this->payments_model->addRafflesBuyed($c->raffles_id, $payment_data['id'], $order_data['order_amount'], $c->raffles_user , date('Y-m-d'), date('H:i:s'), 1);

        
                    // Ordem dos Tickets
                    foreach ($this->cart_model->getOrderTickets($c->id) as $t) {

                        $ticket_raffle = $t->raffles_id;
                        $ticket_number = $t->raffles_ticket;
                        $ticket_user = $t->raffles_user;
                        $ticket_date = date('d-m-Y');
                        $ticket_time =  date('H:i:s');
                        $ticket_payment_id = $payment_data['id'];
                        $ticket_payment_type = 1;

                        $this->payments_model->addTicketBuyed($ticket_raffle, $ticket_number, $ticket_user, $ticket_date, $ticket_time, $ticket_payment_id, $ticket_payment_type);
                    }


                    //Atualiza porcentagem do sorteio
                    $raffles_tickets = $this->raffles_model->getRaffle($c->raffles_id)['raffles_tickets'];
                    $raffles_buyed = count($this->payments_model->checkBuyedTickets($c->raffles_id, null));

                    $this->raffles_model->updateProgress($c->raffles_id, $raffles_tickets, $raffles_buyed);
                }

                // Atualiza status da ordem 
                $this->payments_model->updateOrderStatus($order_data['id']);
            }
            
            redirect(base_url('perfil/sorteios'));
        }
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
                    $payment_id = $this->payments_model->addPayment( mt_rand(),'1', $c->cart_amount, '1', $c->cart_user, '0',  'creditos', mt_rand());
                    // $payment_id = $this->payments_model->addPayment($c->cart_raffle, $c->cart_amount, '3',$c->cart_user, 'mercadopago',  $payment_type, $payments_id, $reference_id);


                    //Adicionando RafflesBuyed
                    if (!$this->payments_model->checkBuyed($c->cart_raffle, $c->cart_user)) {

                        $this->payments_model->addRafflesBuyed($c->cart_raffle, $payment_id, $c->cart_amount, $c->cart_user, date('d-m-Y'), date('H:i'), 0);
                    } else {
                        $old_amount = $this->payments_model->checkBuyed($c->cart_raffle, $c->cart_user)['raffles_amount'];
                        $this->payments_model->updateRafflesBuyed($c->cart_raffle, $payment_id, $c->cart_amount, $old_amount, $c->cart_user);
                    }

                    foreach ($this->cart_model->getCartTickets($c->cart_raffle, $c->cart_user) as $t) {

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




                $data = array(
                    'status' => 'true',
                    'message' => 'Pagamento realizado com sucesso. <br> Aguarde o sorteio e boa sorte!'
                );

                redirect(base_url('perfil/sorteios'));
            } else {
                //SEM CREDITO
                $data = array(
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
