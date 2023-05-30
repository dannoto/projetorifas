

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cron extends CI_Controller
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

        $this->load->model('raffles_model');
    }

    public function runRaffleAutomatico()
    {
        foreach ($this->raffles_model->getRafflesReadyToRun() as $r) {

            $raffle_id = $r->id;

            $tickets = array();

            //Pega todos os numeros do sorteio
            foreach ($this->payments_model->checkBuyedTickets($raffle_id, null) as $r) {
                array_push($tickets, array($r->ticket_number));
            }

            //conta todos os tickets comprados.
            $count_tickets = count($tickets);

            if ($count_tickets > 0) {

                //index sorteado dentro do array
                $index_sorteado = rand(0, $count_tickets - 1);

                // Ticket sorteado.
                $ticket_sorteado = $tickets[$index_sorteado][0];

                // Usuario sorteado
                $usuario_sorteado = $this->payments_model->getUserByWinTicket($raffle_id, $ticket_sorteado);

                //Update status Sorteio
                $this->raffles_model->updateRaffleStatusComplete($raffle_id);


                //Usuario data
                $user_data = $this->user_model->getUserById($usuario_sorteado);

                //Dados do Sorteio
                $raffles_data = $this->raffles_model->getRaffle($raffle_id);

                //Avisando que o sorteio começou
                foreach ($this->raffles_model->getAllUserWithTickets($raffle_id) as $c) {

                    $user_data = $this->user_model->getUserById($c->raffles_user);

                    // Enviando E-mail para todos participantes
                    $this->email_model->startRaffle($user_data, $raffles_data);
                }

                //add Winner
                if ($this->raffles_model->addWinner($raffle_id, $usuario_sorteado, $ticket_sorteado)) {


                    //Enviando e-mail para o vencedor
                    $this->email_model->winnerRaffle($user_data, $raffles_data);



                    // Cashback
                    if ($raffles_data['raffles_cashback'] == 1) {

                        foreach ($this->raffles_model->getAllUserWithTickets($raffle_id) as $c) {


                            // Retornando cashback em creditos]
                            $raffles_cashback_amount = round(($raffles_data['raffles_tickets_value'] * ($raffles_data['raffles_cashback_amount'] / 100)), 2);
                            $this->raffles_model->addCashback($c->raffles_user, $raffles_cashback_amount);
                        }

                        $response =  array('status' => 'true', 'message' => 'Sorteio concluído com sucesso. Cashback de ' . $raffles_data['raffles_cashback_amount'] . '% foi atribuído.');
                    } else {

                        $response =  array('status' => 'true', 'message' => 'Sorteio concluído com sucesso.');
                    }
                } else {

                    $response =  array('status' => 'false', 'message' => 'Ocorreu um erro ao rodar o sorteio.');
                }
            } else {

                $response =  array('status' => 'false', 'message' => 'Não existe nenhum ticket comprado neste sorteio.');
            }

            $this->raffles_model->addCronRun($raffle_id);

            print_r(json_encode($response));
        }
    }



    public function runRaffleManual()
    {

        $response = array();

        $raffle_id = htmlspecialchars($this->input->post('raffle_id'));
        // $raffle_id = 22;


        $tickets = array();

        //Pega todos os numeros do sorteio
        foreach ($this->payments_model->checkBuyedTickets($raffle_id, null) as $r) {
            array_push($tickets, array($r->ticket_number));
        }

        //conta todos os tickets comprados.
        $count_tickets = count($tickets);

        if ($count_tickets > 0) {

            //index sorteado dentro do array
            $index_sorteado = rand(0, $count_tickets - 1);

            // Ticket sorteado.
            $ticket_sorteado = $tickets[$index_sorteado][0];

            // Usuario sorteado
            $usuario_sorteado = $this->payments_model->getUserByWinTicket($raffle_id, $ticket_sorteado);

            //Update status Sorteio
            $this->raffles_model->updateRaffleStatusComplete($raffle_id);


            //Usuario data
            $user_data = $this->user_model->getUserById($usuario_sorteado);

            //Dados do Sorteio
            $raffles_data = $this->raffles_model->getRaffle($raffle_id);

            //Avisando que o sorteio começou
            foreach ($this->raffles_model->getAllUserWithTickets($raffle_id) as $c) {

                $user_data = $this->user_model->getUserById($c->raffles_user);

                // Enviando E-mail para todos participantes
                $this->email_model->startRaffle($user_data, $raffles_data);
            }

            //add Winner
            if ($this->raffles_model->addWinner($raffle_id, $usuario_sorteado, $ticket_sorteado)) {


                //Enviando e-mail para o vencedor
                $this->email_model->winnerRaffle($user_data, $raffles_data);



                // Cashback
                if ($raffles_data['raffles_cashback'] == 1) {

                    foreach ($this->raffles_model->getAllUserWithTickets($raffle_id) as $c) {


                        // Retornando cashback em creditos]
                        $raffles_cashback_amount = round(($raffles_data['raffles_tickets_value'] * ($raffles_data['raffles_cashback_amount'] / 100)), 2);
                        $this->raffles_model->addCashback($c->raffles_user, $raffles_cashback_amount);
                    }

                    $response =  array('status' => 'true', 'message' => 'Sorteio concluído com sucesso. Cashback de ' . $raffles_data['raffles_cashback_amount'] . '% foi atribuído.');
                } else {

                    $response =  array('status' => 'true', 'message' => 'Sorteio concluído com sucesso.');
                }
            } else {

                $response =  array('status' => 'false', 'message' => 'Ocorreu um erro ao rodar o sorteio.');
            }
        } else {

            $response =  array('status' => 'false', 'message' => 'Não existe nenhum ticket comprado neste sorteio.');
        }


        print_r(json_encode($response));
    }
}
