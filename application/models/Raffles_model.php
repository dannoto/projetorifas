
<?php
class raffles_model extends CI_Model
{

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

    public function getRaffles() {
        $this->db->order_by('id','desc');
        return $this->db->get('raffles')->result();

    }

    public function getRaffle($raffles_id) {

        $this->db->where('id', $raffles_id);
        return $this->db->get('raffles')->row_array();

    }

    public function updateProgress($raffles_id, $raffles_tickets, $raffles_buyed) {

    

        $raffles_progress = round(($raffles_buyed/$raffles_tickets) * 100,0);

        $this->db->where('id', $raffles_id);

        $data = array(
            'raffles_progress' => $raffles_progress
        );
        

        return $this->db->update('raffles', $data);

    }

    public function addRaffle($raffles_title, $raffles_description, $raffles_image, $raffles_tickets, $raffles_tickets_limit, $raffles_tickets_value, $raffles_status_publish, $raffles_status_random, $raffles_category, $raffles_date, $raffles_time, $raffles_user) {

        $data = array(
            'raffles_title' => $raffles_title, 
            'raffles_description' => $raffles_description, 
            'raffles_image' => $raffles_image, 
            'raffles_tickets' => $raffles_tickets,
            'raffles_tickets_limit' => $raffles_tickets_limit, 
            'raffles_tickets_value' => $raffles_tickets_value, 
            'raffles_status_publish' => $raffles_status_publish, 
            'raffles_status_random' => $raffles_status_random, 
            'raffles_category' => $raffles_category, 
            'raffles_date' => $raffles_date, 
            'raffles_time' => $raffles_time, 
            'raffles_user' => $raffles_user
        );

        return $this->db->insert('raffles', $data);

    }

    public function updateRaffle($raffles_id, $raffles_title, $raffles_description, $raffles_image, $raffles_tickets, $raffles_tickets_limit, $raffles_tickets_value, $raffles_status_publish, $raffles_status_random, $raffles_category, $raffles_date, $raffles_time, $raffles_user) {

        $this->db->where('id', $raffles_id);

        if (strlen($raffles_image) > 0 ) {

            $data = array(
                'raffles_title' => $raffles_title, 
                'raffles_description' => $raffles_description, 
                'raffles_image' => $raffles_image, 
                'raffles_tickets' => $raffles_tickets,
                'raffles_tickets_limit' => $raffles_tickets_limit, 
                'raffles_tickets_value' => $raffles_tickets_value, 
                'raffles_status_publish' => $raffles_status_publish, 
                'raffles_category' => $raffles_category, 
                
            );

        } else {
            
            $data = array(
                'raffles_title' => $raffles_title, 
                'raffles_description' => $raffles_description, 
                'raffles_tickets' => $raffles_tickets,
                'raffles_tickets_limit' => $raffles_tickets_limit, 
                'raffles_tickets_value' => $raffles_tickets_value, 
                'raffles_status_publish' => $raffles_status_publish, 
                'raffles_category' => $raffles_category, 
                
            );
        }

        return $this->db->update('raffles', $data);

    }

    public function getRaffleWinner($id) {

        $this->db->where('winner_raffle', $id);
        return $this->db->get('raffles_winners')->row_array();

    }

    public function getRafflesOthers($cat1, $cat2, $cat3) {

        $this->db->where('raffles_category !=', $cat1);
        $this->db->where('raffles_category !=', $cat2);
        $this->db->where('raffles_category !=', $cat3);

        return $this->db->get('raffles')->result();

    }
    public function getRafflesByCategory($raffles_category) {
        $this->db->where('raffles_category', $raffles_category);
        $this->db->order_by('id','desc');
        $this->db->where('raffles_status_random','1');
       
        return $this->db->get('raffles')->result();
    }
    
    public function getRafflesFeatured() {
        $this->db->where('raffles_featured', 1);
        return $this->db->get('raffles')->result();
    }


    public function getRafflesRelated ($raffles_category) {
        $this->db->where('raffles_category', $raffles_category);
        $this->db->order_by('id','rand');
        $this->db->where('raffles_status_random','1');
        $this->db->limit(3);
        return $this->db->get('raffles')->result();
    }


    public function getRafflesRelatedRandom(){
        $this->db->order_by('id','rand');
        $this->db->where('raffles_status_random','1');
        $this->db->limit(3);
        return $this->db->get('raffles')->result();
    }



    public function updateRaffleStatusCanceled($raffle_id) {

        $this->db->where('id', $raffle_id);
        $data = array (
            'raffles_status_random' => 4,
        );

        return $this->db->update('raffles', $data);
    }

    public function updateRaffleStatusComplete($raffle_id) {

        $this->db->where('id', $raffle_id);
        $data = array (
            'raffles_status_random' => 3,
        );

        return $this->db->update('raffles', $data);
    }

    public function addWinner($raffle_id, $usuario_sorteado, $ticket_sorteado) {
        
        $data = array(
            'winner_user' => $usuario_sorteado,
            'winner_raffle' => $raffle_id,
            'winner_ticket' => $ticket_sorteado,
            'winner_date' => date('d-m-Y'),
            'winner_time' => date('H:i')
        
        );

        return $this->db->insert('raffles_winners', $data);
        
    }

    public function deleteRaffle($raffles_id) {
        $this->db->where('id', $raffles_id);
        return $this->db->delete('raffles');

    }   

    public function RafflesDiv($raffles_tickets) {
        if ($raffles_tickets <= 300) {
            return 1;
        } else if ($raffles_tickets > 300) {
            return round(ceil($raffles_tickets / 300), 0);

        } 
    }

    public function RafflesNumbers($index, $amount,$raffles_tickets, $raffles_id) {

        $start = ($index * $amount);
        $end = ($start + $amount) + 1;

        for ($t = $start+1; $t < $end and $t <= $raffles_tickets; $t++) { 
            
            if ($this->payments_model->isTicketBuyed($raffles_id, $t)) {

                if ($this->payments_model->isMineTicket($raffles_id, $t, $this->session->userdata('session_user')['id'])) {

                    echo '<div class="mine" data-n="'.$t.'" id="'.$t.'">'.$t.'</div>'; 

                } else {
                    
                    echo '<div class="selector-item-blocked" data-n="'.$t.'" id="'.$t.'">'.$t.'</div>'; 
                }

            } else if ($this->payments_model->isTicketInCart($raffles_id, $t)) {
                echo '<div class="selector-item-blocked" data-n="'.$t.'" id="'.$t.'">'.$t.'</div>'; 

            }  else {
                echo '<div class="selector-item free" data-n="'.$t.'" id="'.$t.'">'.$t.'</div>'; 
            }
        } 

    }

}
?>
