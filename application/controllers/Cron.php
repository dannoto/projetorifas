

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {
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



    public function runRaffleManual() {

        $response = array();

        $raffle_id = htmlspecialchars($this->input->post('raffle_id'));
        // $raffle_id = 22;


        $tickets = array();

        //Pega todos os numeros do sorteio
        foreach ($this->payments_model->checkBuyedTickets($raffle_id, null) as $r) {
            array_push($tickets, array($r->ticket_number) );
        }
        
        //conta todos os tickets comprados.
        $count_tickets = count($tickets);

        if ($count_tickets > 0) {
                //index sorteado dentro do array
                $index_sorteado = rand(0, $count_tickets - 1 );

                // Ticket sorteado.
                $ticket_sorteado = $tickets[$index_sorteado][0];

                $usuario_sorteado = $this->payments_model->getUserByWinTicket($raffle_id, $ticket_sorteado);

                //Update status Sorteio
                $this->raffles_model->updateRaffleStatusComplete($raffle_id);

                //add Wiiner
                if ( $this->raffles_model->addWinner($raffle_id, $usuario_sorteado, $ticket_sorteado)) {

                    $response =  array('status' => 'true', 'message' => 'Sorteio concluído com sucesso.');

                    

                } else {

                    $response =  array('status' => 'false', 'message' => 'Ocorreu um erro ao rodar o sorteio.');

                }

                
        } else {

            $response =  array('status' => 'false', 'message' => 'Não existe nenhum ticket comprado neste sorteio.');

        }


       print_r(json_encode($response));

    }

}