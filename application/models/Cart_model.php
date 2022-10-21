<?php
class cart_model extends CI_Model
{
    
    public function __construct() {

		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('login_model');
		$this->load->model('user_model');
		$this->load->model('email_model');
		$this->load->model('cart_model');
		$this->load->model('raffles_model');

	}

    public function getCartFromCupom($cart_user) {

        $this->db->where('cart_user', $cart_user);

        return $this->db->get('cart')->row_array();
    }

    public function getCart($cart_user, $cart_raffle = null) {

        $this->db->where('cart_user', $cart_user);
        
        if ($cart_raffle !== null) {
            $this->db->where('cart_raffle', $cart_raffle);
        }

        return $this->db->get('cart')->result();
    }

    public function getCartItem($user_id, $cart_item) {
        
        $this->db->where('id', $cart_item);
        $this->db->where('cart_user', $user_id);
        return $this->db->get('cart')->row_array();

    }

    public function addCart($cart_raffle, $cart_amount, $cart_user, $cart_data, $cart_time, $cart_expiration, $cart_status) {

        $data = array(
            'cart_raffle' => $cart_raffle,
            'cart_amount' => $cart_amount,
            'cart_user' => $cart_user,
            'cart_data' => $cart_data,
            'cart_time' => $cart_time,
            'cart_expiration' => $cart_expiration,
            'cart_status' => $cart_status,
        );
       
        return $this->db->insert('cart', $data);

    }

    public function updateCart($cart_raffle, $cart_amount, $cart_user) {

        $this->db->where('cart_raffle', $cart_raffle);
        $this->db->where('cart_user', $cart_user);

        $data = array(
            'cart_amount' => $cart_amount,
        );
       
        return $this->db->update('cart', $data);

    }


    public function deleteCart($cart_id, $cart_user, $cart_raffle) {
        if ($cart_id !== null) {
            $this->db->where('id', $cart_id);    
        }
        $this->db->where('cart_user', $cart_user);    
        $this->db->where('cart_raffle', $cart_raffle);    

        return $this->db->delete('cart');
    }


    public function resetCartByUser($cart_user) {
        $this->db->where('cart_user', $cart_user);    
        return $this->db->delete('cart');
    }

    public function resetCartTicketsByUser($cart_user) {
        $this->db->where('cart_user', $cart_user);    
        return $this->db->delete('cart_tickets');
    }
   

    // Tickets
    public function addCartTicket($cart_raffle, $cart_ticket, $cart_user, $cart_data, $cart_time, $cart_expiration, $cart_status) {

        $data = array(
            'cart_raffle' => $cart_raffle,
            'cart_ticket' => $cart_ticket,
            'cart_user' => $cart_user,
            'cart_data' => $cart_data,
            'cart_time' => $cart_time,
            'cart_expiration' => $cart_expiration,
            'cart_status' => $cart_status,
        );
       
        return $this->db->insert('cart_tickets', $data);
    }

    public function getCartTickets($cart_raffle, $cart_user) {

        $this->db->where('cart_user', $cart_user);
        $this->db->where('cart_raffle', $cart_raffle);
        return $this->db->get('cart_tickets')->result();
    }

    public function getCartTicket($cart_ticket,$cart_raffle) {
        
        $this->db->where('cart_ticket', $cart_ticket);
        $this->db->where('cart_raffle', $cart_raffle);
        return $this->db->get('cart_tickets')->row_array();

    }

    public function deleteCartTicket($cart_ticket, $cart_user, $cart_raffle) {

        $this->db->where('id', $cart_ticket); 
        $this->db->where('cart_user', $cart_user);    
        $this->db->where('cart_raffle', $cart_raffle);    

        return $this->db->delete('cart_tickets');
    }

    //Quando deleta um carrinho e todo os ticket associados.
    public function deleteCartTicketAll($cart_user, $cart_raffle) {

        $this->db->where('cart_user', $cart_user);    
        $this->db->where('cart_raffle', $cart_raffle);    

        return $this->db->delete('cart_tickets');

    }




    public function getTotalCart() {

		
		$total = 0;

		foreach($this->cart_model->getCart($this->session->userdata('session_user')['id']) as $c) {

			if ($c->cart_discount > 0) {

				$total_discount = ( $c->cart_amount * ($c->cart_discount/100));
				$discount = ($c->cart_amount - $total_discount);
				$total = ($total + $discount); 

			} else {

				$total =  ($total + $c->cart_amount); 

            }
		}

		return round($total,2);

	}





    //Cupom
    public function getCupomById($cart_cupom_id) {

        $this->db->where('id', $cart_cupom_id);
        return $this->db->get('cart_discount')->row_array();

    }

    public function getCupomByCode($cart_discount_code) {

        $this->db->where('cart_discount_code', $cart_discount_code);
        return $this->db->get('cart_discount')->row_array();

    }

    public function applyCupom($cart_user, $cart_discount_procentage, $cart_discount_id) {

        $this->db->where('cart_user', $cart_user);

        $data = array(
            'cart_discount' => $cart_discount_procentage,
            'cart_discount_id' => $cart_discount_id,
        );

        return $this->db->update('cart', $data);

    }

    public function disaplyCupom($cart_user) {

        $this->db->where('cart_user', $cart_user);

        $data = array(
            'cart_discount' => 0,
            'cart_discount_id' => 0,
        );

        return $this->db->update('cart', $data);

    }

    public function increaseCupom($cupom_id) {

        $this->db->where('id', $cupom_id);
        
        $this->db->set('cart_discount_limit', 'cart_discount_limit'."+1", FALSE);

        return $this->db->update('cart_discount');

    }

    public function dicreaseCupom($cupom_id) {

        $this->db->where('id', $cupom_id);
        
        $this->db->set('cart_discount_limit', 'cart_discount_limit'."-1", FALSE);

        return $this->db->update('cart_discount');

    }



}
?>