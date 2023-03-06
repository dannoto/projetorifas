<?php
class payments_model extends CI_Model
{

    public function addTicketBuyed($ticket_raffle, $ticket_number, $ticket_user, $ticket_date, $ticket_time, $ticket_payment_id, $ticket_payment_type)
    {

        $data = array(
            'ticket_raffle' => $ticket_raffle,
            'ticket_number' => $ticket_number,
            'ticket_user' => $ticket_user,
            'ticket_date' => $ticket_date,
            'ticket_time' => $ticket_time,
            'ticket_payment_id' => $ticket_payment_id,
            'ticket_payment_type' => $ticket_payment_type
        );

        return $this->db->insert('raffles_tickets_buyed', $data);
    }


    // Order

    public function getOrder($order_id)
    {
        $this->db->where('id', $order_id);
        return $this->db->get('order')->row_array();
    }

    public function addOrder($order_amount, $order_user, $order_type)
    {

        $data = array(
            'order_amount' => $order_amount,
            'order_user' => $order_user,
            'order_date' => date('Y-m-d'),
            'order_time' => date('H:i:s'),
            'order_type' => $order_type,
            'order_type' => 0
        );

        $this->db->insert('order', $data);

        return $this->db->insert_id();
    }

    public function addOrderRaffles($raffles_order, $raffles_id, $raffles_user)
    {


        $data = array(
            'raffles_order' => $raffles_order,
            'raffles_id' => $raffles_id,
            'raffles_user' => $raffles_user
        );

        $this->db->insert('order_raffles', $data);

        return $this->db->insert_id();
    }


    public function getOrderRaffles($order_id)
    {
        $this->db->where('raffles_order', $order_id);
        return $this->db->get('order_raffles')->result();
    }

    public function addOrderRafflesTickets($raffles_order, $raffles_id, $raffles_user, $raffles_ticket)
    {


        $data = array(
            'raffles_order' => $raffles_order,
            'raffles_id' => $raffles_id,
            'raffles_user' => $raffles_user,
            'raffles_ticket' => $raffles_ticket
        );

        return $this->db->insert('order_raffles_tickets', $data);
    }


    public function updateOrderStatus($order_id)
    {
        $this->db->where('id', $order_id);

        $data = array(
            'order_status' => 1,
        );

        return $this->db->update('order', $data);
    }
    // Order
    public function addNotification($payments_id)
    {

        $data = array(
            'notifications' => $payments_id
        );

        return $this->db->insert('gateways_notification', $data);
    }









    public function getUserPayment($user_id)
    {

        $this->db->where('payments_user', $user_id);

        return $this->db->get('payments')->result();
    }

    public function getRafflesByPayments($payment_id)
    {
        $this->db->where('payment_id', $payment_id);
        return $this->db->get('payments')->result();
    }

    public function getUserPaymentDetailTotal($payment_id)
    {

        $this->db->where('payment_id', $payment_id);
        $data =  $this->db->get('payments')->result();

        $total = 0;

        foreach ($data as $d) {
            $total = $total + $d->payments_amount;
        }

        return round($total, 2);
    }
    public function getUserPaymentDetail($payment_id)
    {

        $this->db->where('payment_id', $payment_id);
        return $this->db->get('payments')->row_array();
    }

    public function getPaymentById($payment_id)
    {


        $this->db->where('payment_id', $payment_id);
        return $this->db->get('payments')->result();
    }

    public function addOrderTicketBuyed($ticket_raffle, $ticket_number, $ticket_user, $ticket_date, $ticket_time, $ticket_payment_id, $ticket_payment_type)
    {

        $data = array(
            'ticket_raffle' => $ticket_raffle,
            'ticket_number' => $ticket_number,
            'ticket_user' => $ticket_user,
            'ticket_date' => $ticket_date,
            'ticket_time' => $ticket_time,
            'ticket_payment_id' => $ticket_payment_id,
            'ticket_payment_type' => $ticket_payment_type
        );

        return $this->db->insert('order_tickets_buyed', $data);
    }


    public function updatePaymentStatus($raffle_payment, $raffle_user, $status)
    {

        $this->db->where('id', $raffle_payment);
        $this->db->where('payments_user', $raffle_user);

        $data = array(
            'payments_status' => $status
        );

        $this->db->update('payments', $data);
    }

    public function getRaffleBuyed($raffle_id)
    {
        $this->db->where('raffles_id', $raffle_id);
        return $this->db->get('raffles_buyed')->result();
    }

    public function updateRaffleBuyedStatus($buyed_id)
    {
        $this->db->where('id', $buyed_id,);

        $data = array(
            'raffles_status' => 1,
        );


        $this->db->update('raffles_buyed', $data);
    }

    public function checkBuyedProfile($raffles_id, $raffles_user)
    {
        $this->db->order_by('id', 'desc');

        if ($raffles_id !== null) {
            $this->db->where('raffles_id', $raffles_id,);
        }

        if ($raffles_user !== null) {
            $this->db->where('raffles_user', $raffles_user,);
        }


        return $this->db->get('raffles_buyed')->result();
    }

    public function checkBuyed($raffles_id, $raffles_user)
    {
        $this->db->order_by('id', 'desc');

        if ($raffles_id !== null) {
            $this->db->where('raffles_id', $raffles_id,);
        }

        if ($raffles_user !== null) {
            $this->db->where('raffles_user', $raffles_user,);
        }


        return $this->db->get('raffles_buyed')->row_array();
    }

    public function isMineTicket($raffles_id, $raffles_ticket_number, $ticket_user)
    {
        $this->db->where('ticket_raffle', $raffles_id);
        $this->db->where('ticket_user', $ticket_user);
        $this->db->where('ticket_number', $raffles_ticket_number);

        return $this->db->get('raffles_tickets_buyed')->row_array();
    }

    public function isTicketBuyed($raffles_id, $raffles_ticket_number)
    {
        $this->db->where('ticket_raffle', $raffles_id);
        $this->db->where('ticket_number', $raffles_ticket_number);

        return $this->db->get('raffles_tickets_buyed')->row_array();
    }



    public function isTicketInCart($raffles_id, $raffles_ticket_number)
    {

        $this->db->where('cart_raffle', $raffles_id);
        $this->db->where('cart_ticket', $raffles_ticket_number);

        return $this->db->get('cart_tickets')->row_array();
    }

    public function checkBuyedTickets($ticket_raffle, $ticket_user)
    {

        $this->db->order_by('id', 'desc');

        if ($ticket_raffle !== null) {
            $this->db->where('ticket_raffle', $ticket_raffle,);
        }

        if ($ticket_user !== null) {
            $this->db->where('ticket_user', $ticket_user,);
        }

        return $this->db->get('raffles_tickets_buyed')->result();
    }

    public function getUserByWinTicket($raffle_id, $ticket_sorteado)
    {

        $this->db->where('ticket_raffle', $raffle_id,);
        $this->db->where('ticket_number', $ticket_sorteado,);

        $data =  $this->db->get('raffles_tickets_buyed')->row_array();


        return $data['ticket_user'];
    }

    public function checkCartTickets($cart_raffle, $cart_user)
    {

        $this->db->order_by('id', 'desc');

        if ($cart_raffle !== null) {
            $this->db->where('cart_raffle', $cart_raffle,);
        }

        if ($cart_user !== null) {
            $this->db->where('cart_user', $cart_user,);
        }

        return $this->db->get('cart_tickets')->result();
    }

    public function updateRafflesBuyed($raffles_id, $raffles_payment, $raffles_amount, $old_amount, $raffles_user)
    {

        $raffles_amount = $raffles_amount + $old_amount;

        $this->db->where('raffles_user', $raffles_user,);
        $this->db->where('raffles_id', $raffles_id,);


        $data = array(

            'raffles_data' => date('d-m-Y'),
            'raffles_time' => date('H:i:s'),
            'raffles_payment' => $raffles_payment,
            'raffles_amount' => $raffles_amount,

        );

        return $this->db->insert('raffles_buyed', $data);
    }

    // ($c->cart_raffle, $c->cart_amount, '1',$c->cart_user, 'mercadopago',  $payment_type, $payment_id, $reference_id)



    public function addPayment($payments_id, $payments_order, $payments_amount, $payments_status,  $payments_user, $payments_proccess, $payments_type)
    {

        $data = array(
            'payments_id' => $payments_id,
            'payments_order' => $payments_order,
            'payments_amount' => $payments_amount,
            'payments_status' => $payments_status,
            'payments_user' => $payments_user,
            'payments_date' => date('d-m-Y'),
            'payments_time' => date('H:i:s'),
            'payments_proccess' => $payments_proccess,
            'payments_type' => $payments_type,
        );


        $this->db->insert('payments', $data);
        return $this->db->insert_id();
    }

    public function updatePayment($payment_id, $payment_status)
    {

        $this->db->where('payment_id', $payment_id);

        $data = array(
            'payments_status' => $payment_status
        );

        return  $this->db->update('payments', $data);
    }

    public function getPaymentByOrder($order_id)
    {

        $this->db->where('payments_order', $order_id);
        return $this->db->get('payments')->row_array();
    }



    public function addRafflesBuyed($raffles_id, $raffles_payment, $raffles_amount,  $raffles_user, $raffles_data, $raffles_time, $raffles_status)
    {

        $data = array(
            'raffles_id' => $raffles_id,
            'raffles_user' => $raffles_user,
            'raffles_data' => $raffles_data,
            'raffles_time' => $raffles_time,
            'raffles_payment' => $raffles_payment,
            'raffles_amount' => $raffles_amount,
            'raffles_status' => $raffles_status,
        );

        return $this->db->insert('raffles_buyed', $data);
    }


    public function addOrderRafflesBuyed($raffles_id, $raffles_payment, $raffles_amount,  $raffles_user, $raffles_data, $raffles_time, $raffles_status)
    {

        $data = array(
            'raffles_id' => $raffles_id,
            'raffles_user' => $raffles_user,
            'raffles_data' => date('d-m-Y'),
            'raffles_time' => date('H:i'),
            'raffles_payment' => $raffles_payment,
            'raffles_amount' => $raffles_amount,
            'raffles_status' => 0
        );

        return $this->db->insert('order_buyed', $data);
    }

    public function decreaseCredit($cart_user, $due_amount, $credit)
    {

        $new_amount = ($credit - $due_amount);

        $this->db->where('id', $cart_user);

        $data = array(
            'user_credit' => $new_amount,
        );

        return $this->db->update('users', $data);
    }


    //Wiinders

    public function checkWinner($winner_raffle, $winner_user)
    {

        $this->db->where('winner_raffle', $winner_raffle);
        $this->db->where('winner_user', $winner_user);

        return $this->db->get('raffles_winners')->row_array();
    }



}
