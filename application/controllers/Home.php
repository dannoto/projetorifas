<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
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
	public function index()
	{
		$this->load->view('user/home');
	}

	public function getRafflesByCategory() {
		$raffles_category = $this->input->post('raffles_category');


		if ($raffles_category == "all" ) {
			$raffles = $this->raffles_model->getRaffles();

		} else if($raffles_category == "others" ) {
			$raffles = $this->raffles_model->getRafflesOthers('1','2','3');

		} else {
			$raffles = $this->raffles_model->getRafflesByCategory($raffles_category);

		}


		if (count($raffles) > 0 ) {

			foreach ($raffles as $t) {
				echo ' <a href="'.base_url() .'sorteio/'.$t->id.'">
				<div class="xl:col-span-1 col-span-1 xl:m-0 m-3 related">
					<div class="ml-5 mr-5">
					<img src="'.base_url() .'assets/img/raffles/'.$t->raffles_image.'" style="width:100%;max-width:100%;object-fit:cover;height:300px;" alt="">
					</div>
					<div class="ml-5 mr-5 p-3 bg-darkLight mb-5">
						<h1 class="text-xl text-white font-bold line-clamp-2">'.$t->raffles_title.'</h1>
						<p class="text-orange text-xl tbaset-xl font-semibold">R$ '.$t->raffles_tickets_value.'</p>
						<div class="progress mt-3 progress-square" style="height: 0.5rem; max-height: 8px !important; border-radius: 8px; background-color: rgba(255, 189, 10, 0.2)">
							<div class="progress-bar progress-square" role="progressbar" style="width: '.$t->raffles_progress.'%; background-color: #FFBD0A; max-height: 8px !important; height: 0.5rem; border-radius: 8px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<div class="entries_left mt-3 flex justify-between raffle_card_subtitle">
							<div class="">
								<small class="text-gray-400"><i class="fas text-gray-400 fa-clock mr-1"  aria-hidden="true"></i>'.$t->raffles_progress.'%</small>

							</div>
							<div class="flex">
								<small class="text-gray-400"> <i class="fas fa-ticket-alt mr-2" style="transform: rotate(-45deg); font-size: 11px;" aria-hidden="true"></i>
								';
								echo count($this->payments_model->checkBuyedTickets($t->id, null)).'/'.$t->raffles_tickets;
								
								echo ' </small>  
							</div>
						</div>
					</div>
				</div>
			</a>
			';
			}

		} else {

		}
	}
}
