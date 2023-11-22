<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Painel extends CI_Controller
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

        $this->admin_model->Auth();
    }

    public function login()
    {
        // if ($this->session->userdata('session_user')['user_admin'] != 1){
        // 	redirect(base_url());
        // }

        $this->load->view('admin/login');
    }


    // Inicio Sorteios
    public function sorteios()
    {


        $data = array(
            'sorteios' => $this->admin_model->getSorteios(),
        );

        $this->load->view('admin/sorteios', $data);
    }

    public function actDeleteCupons()
    {
        $cupom_id = htmlspecialchars($this->input->post('cupom_id'));


        if ($this->admin_model->deleteCupons($cupom_id)) {
            $response =  array('status' => 'true', 'message' => 'Excluido com sucesso!');
        } else {
            $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado.');
        }

        print_r(json_encode($response));
    }

    public function actAddCupons()
    {
        $cart_discount_code = htmlspecialchars($this->input->post('cart_discount_code'));
        $cart_discount_porcentage = htmlspecialchars($this->input->post('cart_discount_porcentage'));
        $cart_discount_limit = htmlspecialchars($this->input->post('cart_discount_limit'));

        if ($this->admin_model->addCupons($cart_discount_code, $cart_discount_porcentage, $cart_discount_limit)) {
            $response =  array('status' => 'true', 'message' => 'Adicionado com sucesso!');
        } else {
            $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado.');
        }

        print_r(json_encode($response));
    }

    public function cupons()
    {


        $data = array(
            'cupons' => $this->admin_model->getCupons(),
        );

        $this->load->view('admin/cupons', $data);
    }
    public function afiliacao()
    {


        $data = array(
            'cupons' => $this->admin_model->getCupons(),
            'affiliate_settings' => $this->register_model->getComissionSettings(),
        );

        $this->load->view('admin/afiliacao', $data);
    }

    public function termos()
    {

        $this->load->view('admin/termos');
    }

    public function privacidade()
    {

        $this->load->view('admin/privacidade');
    }

    public function gateway()
    {

        $this->load->view('admin/gateway');
    }

    public function actDeleteFaq()
    {

        $faq_id =  htmlspecialchars($this->input->post('faq_id'));


        if ($this->admin_model->deleteFaq($faq_id)) {
            $response =  array('status' => 'true', 'message' => 'Excluido com sucesso!');
        } else {
            $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado.');
        }

        print_r(json_encode($response));
    }

    public function actAddFaq()
    {

        $faq_title = htmlspecialchars($this->input->post('faq_title'));
        $faq_content =  htmlspecialchars($this->input->post('faq_content'));



        if ($this->admin_model->addFaq($faq_title, $faq_content)) {
            $response =  array('status' => 'true', 'message' => 'Criado com sucesso!');
        } else {
            $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado.');
        }

        print_r(json_encode($response));
    }

    //

    public function actDeleteDepoimentos()
    {

        $depoimentos_id =  htmlspecialchars($this->input->post('depoimentos_id'));


        if ($this->admin_model->deleteDepoimentos($depoimentos_id)) {
            $response =  array('status' => 'true', 'message' => 'Excluido com sucesso!');
        } else {
            $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado.');
        }

        print_r(json_encode($response));
    }

    public function actAddDepoimentos()
    {

        $depoimentos_title = htmlspecialchars($this->input->post('depoimentos_title'));
        $depoimentos_content =  htmlspecialchars($this->input->post('depoimentos_content'));



        if ($this->admin_model->addDepoimentos($depoimentos_title, $depoimentos_content)) {
            $response =  array('status' => 'true', 'message' => 'Criado com sucesso!');
        } else {
            $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado.');
        }

        print_r(json_encode($response));
    }
    //
    public function faq()
    {



        $data = array(
            'faqs' => $this->admin_model->getFaqs(),
        );
        $this->load->view('admin/faq', $data);
    }

    public function depoimentos()
    {

        $data = array(
            'depoimentos' => $this->admin_model->getDepoimentos(),
        );

        $this->load->view('admin/depoimentos', $data);
    }


    public function updateGateways()
    {


        $response = array();

        // $raffles_user = $this->session->userdata('session_admin')['admin']; 
        $gateway_me_public = htmlspecialchars($this->input->post('gateway_me_public'));
        $gateway_me_secret = htmlspecialchars($this->input->post('gateway_me_secret'));

        $gateway_pay_public = htmlspecialchars($this->input->post('gateway_pay_public'));
        $gateway_pay_secret = htmlspecialchars($this->input->post('gateway_pay_secret'));

        $gateway_act_public = htmlspecialchars($this->input->post('gateway_act_public'));
        $gateway_act_secret = htmlspecialchars($this->input->post('gateway_act_secret'));
        $gateway_act_list = htmlspecialchars($this->input->post('gateway_act_list'));


        if ($this->admin_model->updateGateways($gateway_me_public, $gateway_me_secret, $gateway_pay_public, $gateway_pay_secret, $gateway_act_public,  $gateway_act_secret, $gateway_act_list)) {
            $response =  array('status' => 'true', 'message' => 'Atualizado com sucesso!');
        } else {
            $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado.');
        }

        print_r(json_encode($response));
    }

    public function updateLogo()
    {

        if ($_FILES) {

            $uploadPATH = './assets/img/';
            $uploadNAME = mt_rand() . basename($_FILES['configuracoes_logo']['name']);
            $uploadPATHFULL = $uploadPATH . $uploadNAME;

            if (move_uploaded_file($_FILES['configuracoes_logo']['tmp_name'], $uploadPATHFULL)) {
                $configuracoes_logo = $uploadNAME;
            } else {
                $configuracoes_logo = "";
            }
        }

        if ($this->admin_model->updateLogo($configuracoes_logo)) {
            $response =  array('status' => 'true', 'message' => 'Atualizado com sucesso!');
        } else {
            $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado.');
        }

        print_r(json_encode($response));
    }

    public function updateConfiguracoes()
    {


        $response = array();

        // $raffles_user = $this->session->userdata('session_admin')['admin']; 
        $configuracoes_social_facebook = htmlspecialchars($this->input->post('configuracoes_social_facebook'));
        $configuracoes_social_twitter = htmlspecialchars($this->input->post('configuracoes_social_twitter'));
        $configuracoes_social_instagram = htmlspecialchars($this->input->post('configuracoes_social_instagram'));

        $configuracoes_contato_telefone = htmlspecialchars($this->input->post('configuracoes_contato_telefone'));
        $configuracoes_contato_email = htmlspecialchars($this->input->post('configuracoes_contato_email'));

        $configuracoes_logo = htmlspecialchars($this->input->post('configuracoes_logo'));



        if ($this->admin_model->updateConfiguracoes($configuracoes_social_facebook, $configuracoes_social_twitter, $configuracoes_social_instagram, $configuracoes_contato_telefone, $configuracoes_contato_email,  $configuracoes_logo)) {
            $response =  array('status' => 'true', 'message' => 'Atualizado com sucesso!');
        } else {
            $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado.');
        }

        print_r(json_encode($response));
    }
    public function updateTerms()
    {


        $response = array();

        // $raffles_user = $this->session->userdata('session_admin')['admin']; 
        $terms_title = htmlspecialchars($this->input->post('terms_title'));
        $terms_content = htmlspecialchars($this->input->post('terms_content'));


        if ($this->admin_model->updateTerms($terms_title, $terms_content)) {
            $response =  array('status' => 'true', 'message' => 'Atualizado com sucesso!');
        } else {
            $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado.');
        }

        print_r(json_encode($response));
    }

    public function updatePrivacy()
    {


        $response = array();

        // $raffles_user = $this->session->userdata('session_admin')['admin']; 
        $privacy_title = htmlspecialchars($this->input->post('privacy_title'));
        $privacy_content = htmlspecialchars($this->input->post('privacy_content'));


        if ($this->admin_model->updatePrivacy($privacy_title, $privacy_content)) {
            $response =  array('status' => 'true', 'message' => 'Atualizado com sucesso!');
        } else {
            $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado.');
        }

        print_r(json_encode($response));
    }

    public function add_sorteio()
    {

        if ($_FILES) {

            $uploadPATH = './assets/img/raffles/';
            $uploadNAME = mt_rand() . basename($_FILES['raffles_image']['name']);
            $uploadPATHFULL = $uploadPATH . $uploadNAME;

            if (move_uploaded_file($_FILES['raffles_image']['tmp_name'], $uploadPATHFULL)) {
                $raffles_image = $uploadNAME;
            } else {
                $raffles_image = "";
            }
        }

        if ($_FILES) {

            $uploadPATH = './assets/img/raffles/';
            $uploadNAME = mt_rand() . basename($_FILES['raffles_image_featured']['name']);
            $uploadPATHFULL = $uploadPATH . $uploadNAME;

            if (move_uploaded_file($_FILES['raffles_image_featured']['tmp_name'], $uploadPATHFULL)) {
                $raffles_image_featured = $uploadNAME;
            } else {
                $raffles_image_featured = "";
            }
        }
        if ($this->input->post()) {

            $response = array();

            // $raffles_user = $this->session->userdata('session_admin')['admin']; 
            $raffles_user = 1;
            $raffles_title = htmlspecialchars($this->input->post('raffles_title'));
            $raffles_description = htmlspecialchars($this->input->post('raffles_description'));
            $raffles_image = $raffles_image;
    
       
            $raffles_category = htmlspecialchars($this->input->post('raffles_category'));
            $raffles_date = date('d/m/Y');
            $raffles_time = date('H:i:s');
            $raffles_status_random = 1;


            // Quantitativo
            $raffles_tickets = htmlspecialchars($this->input->post('raffles_tickets'));
            $raffles_tickets_limit = htmlspecialchars($this->input->post('raffles_tickets_limit'));

            // Precificação
            $raffles_tickets_value = str_replace(",", "", htmlspecialchars($this->input->post('raffles_tickets_value')));
            $raffles_isfree = str_replace(",", "", htmlspecialchars($this->input->post('raffles_isfree')));

            // Cashback
            $raffles_cashback = htmlspecialchars($this->input->post('raffles_cashback'));
            $raffles_cashback_amount = htmlspecialchars($this->input->post('raffles_cashback_amount'));

            // Status
            $raffles_status_publish = htmlspecialchars($this->input->post('raffles_status_publish'));
            $raffles_featured = htmlspecialchars($this->input->post('raffles_featured'));


            if ($this->raffles_model->addRaffle(
                $raffles_title, $raffles_description,
                 $raffles_image, $raffles_tickets, 
                 $raffles_tickets_limit, $raffles_tickets_value, 
                 $raffles_status_publish, $raffles_status_random,
                  $raffles_category, $raffles_date, $raffles_time, 
                  $raffles_user, $raffles_featured,
                  $raffles_isfree,
                  $raffles_cashback,
                  $raffles_cashback_amount,
                  $raffles_image_featured
                  )) {
                $response =  array('status' => 'true', 'message' => 'Sorteio criado com sucesso!');
            } else {
                $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado.');
            }

            print_r(json_encode($response));
        }
    }

    public function update_sorteio()
    {

        if ($_FILES) {

            $uploadPATH = './assets/img/raffles/';
            $uploadNAME = mt_rand() . basename($_FILES['raffles_image']['name']);
            $uploadPATHFULL = $uploadPATH . $uploadNAME;

            if (move_uploaded_file($_FILES['raffles_image']['tmp_name'], $uploadPATHFULL)) {
                $raffles_image = $uploadNAME;
            } else {
                $raffles_image = "";
            }
        }

        if ($_FILES) {

            $uploadPATH = './assets/img/raffles/';
            $uploadNAME = mt_rand() . basename($_FILES['raffles_image_featured']['name']);
            $uploadPATHFULL = $uploadPATH . $uploadNAME;

            if (move_uploaded_file($_FILES['raffles_image_featured']['tmp_name'], $uploadPATHFULL)) {
                $raffles_image_featured = $uploadNAME;
            } else {
                $raffles_image_featured = "";
            }
        }

        if ($this->input->post()) {

            $response = array();

            // $raffles_user = $this->session->userdata('session_admin')['admin']; 
            $raffles_id = htmlspecialchars($this->input->post('raffles_id'));
            $raffles_user = 1;
            $raffles_title = htmlspecialchars($this->input->post('raffles_title'));
            $raffles_description = htmlspecialchars($this->input->post('raffles_description'));
            $raffles_image = $raffles_image;
            $raffles_tickets = htmlspecialchars($this->input->post('raffles_tickets'));
            $raffles_tickets_limit = htmlspecialchars($this->input->post('raffles_tickets_limit'));
            $raffles_tickets_value = str_replace(",", "", htmlspecialchars($this->input->post('raffles_tickets_value')));
            $raffles_status_publish = htmlspecialchars($this->input->post('raffles_status_publish'));
            $raffles_status_random = 1;
            $raffles_category = htmlspecialchars($this->input->post('raffles_category'));
            $raffles_date = date('d/m/Y');
            $raffles_time = date('H:i:s');
            $raffles_featured = htmlspecialchars($this->input->post('raffles_featured'));

            $raffles_isfree = $this->input->post('raffles_isfree');

            // Cashback
            $raffles_cashback = htmlspecialchars($this->input->post('raffles_cashback'));
            $raffles_cashback_amount = htmlspecialchars($this->input->post('raffles_cashback_amount'));



            if ($this->raffles_model->updateRaffle($raffles_id, $raffles_title, $raffles_description, $raffles_image, $raffles_tickets, $raffles_tickets_limit, $raffles_tickets_value, $raffles_status_publish, $raffles_status_random, $raffles_category, $raffles_date, $raffles_time, $raffles_user,  $raffles_featured,   $raffles_isfree,  $raffles_cashback, $raffles_cashback_amount,  $raffles_image_featured)) {
                $response =  array('status' => 'true', 'message' => 'Sorteio atualizado com sucesso!');
            } else {
                $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado.');
            }

            print_r(json_encode($response));
        }
    }


    public function getUpdatePublish()
    {
        $raffles_status_publish = $this->input->post('raffles_status_publish');
        $raffles_id = $this->input->post('raffles_id');



        $raffle = $this->raffles_model->getRaffle($raffles_id);



        echo '<option ';
        if ($raffle['raffles_status_publish'] == 1) {
            echo "selected";
        }
        echo  ' value="1">Publicado</option>';
        echo '<option ';
        if ($raffle['raffles_status_publish'] == 0) {
            echo "selected";
        }
        echo  ' value="0">Rascunho</option>';
    }

    public function getUpdateCategory()
    {

        $raffles_category = $this->input->post('raffles_category');

        echo '<option value="">Escolher Categoria...</option>';

        foreach ($this->category_model->getCategories() as $c) {

            if ($raffles_category == $c->id) {
                echo '<option selected value="' . $c->id . '">' . $c->raffles_name . '</option>';
            } else {
                echo '<option value="' . $c->id . '">' . $c->raffles_name . '</option>';
            }
        }
    }

    public function sorteio_resultado($id)
    {
        $id = htmlspecialchars($id);
        $id = $this->raffles_model->getRaffle($id);

        if ($id) {

            $data = array(
                'winner' => $this->raffles_model->getRaffleWinner($id['id']),
            );
            $this->load->view('admin/sorteio_resultado', $data);
        } else {

            redirect(base_url('painel/sorteios'));
        }
    }


    public function deleteRaffle()
    {

        $response = array();

        $raffle_id = $this->input->post('raffle_id');

        $tickets_buyed = count($this->payments_model->checkBuyedTickets($raffle_id, null));

        if ($tickets_buyed > 0) {

            //Get raffles_buyed amount
            $raffles_buyers = $this->payments_model->getRaffleBuyed($raffle_id);


            foreach ($raffles_buyers as $b) {

                $raffle_user = $b->raffles_user;
                $raffle_amount = $b->raffles_amount;
                $raffle_payment = $b->raffles_payment;

                $user_credit = $this->user_model->getUserById($raffle_user)['user_credit'];
                $this->user_model->updateUserCredits($raffle_user, $raffle_amount, $user_credit);

                $this->payments_model->updateRaffleBuyedStatus($b->id, 1);

                $this->payments_model->updatePaymentStatus($raffle_payment, $b->raffles_user, '4');
            }

            if ($this->raffles_model->updateRaffleStatusCanceled($raffle_id)) {

                $response =  array('status' => 'true', 'message' => 'Sorteio foi cancelado com sucesso. Os pagamentos foram reembolsados em forma de crédito.');
            }
        } else {

            if ($this->raffles_model->updateRaffleStatusCanceled($raffle_id)) {

                $response =  array('status' => 'true', 'message' => 'Sorteio foi cancelado com sucesso.');
            }
        }

        print_r(json_encode($response));
    }

    // Fim Sorteios






    public function usuarios()
    {


        $data = array();

        $this->load->view('admin/usuarios');
    }

    public function pagamentos()
    {


        $data = array(
            'pagamentos' => $this->admin_model->getPagamentos()
        );

        $this->load->view('admin/pagamentos', $data);
    }

    public function configuracoes()
    {


        $data = array();

        $this->load->view('admin/configuracoes');
    }

    public function config_website()
    {


        $data = array();

        $this->load->view('admin/sorteios');
    }

    public function config_gateways()
    {


        $data = array();

        $this->load->view('admin/sorteios');
    }

    public function config_marketing()
    {


        $data = array();

        $this->load->view('admin/sorteios');
    }


    public function act_get_raffle() {
        $raffles_id = htmlspecialchars($this->input->post('raffles_id'));


        if ($this->raffles_model->getRaffle($raffles_id)) {

            

            $response = $this->raffles_model->getRaffle($raffles_id);
        } else {

            $response =  array('status' => 'false', 'message' => 'Nenhum sorteio encontrado');
        }

        print_r(json_encode($response));
    }













    public function auth()
    {
        if ($this->input->post()) {

            $response = array();

            $user_email = htmlspecialchars($this->input->post('user_email'));
            $user_password = htmlspecialchars($this->input->post('user_password'));

            $auth = $this->login_model->Auth($user_email, $user_password);

            if ($auth) {

                $this->session->set_userdata('session_admin', $auth);

                $response =  array('status' => 'true', 'message' => 'Logado com sucesso!');
            } else {

                $response =  array('status' => 'false', 'message' => 'Suas credenciais estão incorretas.');
            }

            print_r(json_encode($response));
        }
    }

    public function baniruser()
    {

        if ($this->input->post()) {

            $response = array();


            $user_id = htmlspecialchars($this->input->post('user_id'));
            $user_status = htmlspecialchars($this->input->post('user_status'));

            $user_data = $this->user_model->getUserById($user_id);

            if ($this->register_model->banirUser($user_id, $user_status)) {

                if ($user_status == "1") {

                    $this->email_model->banUser($user_data);
                }

                $response =  array('status' => 'true', 'message' => 'Banido com sucesso.');
            } else {
                $response =  array('status' => 'false', 'message' => 'Ocorreu um erro ao banir.');
            }

            print_r(json_encode($response));
        }
    }

    public function updateuser()
    {

        if ($this->input->post()) {

            $user_name = htmlspecialchars($this->input->post('user_name'));
            $user_surname = htmlspecialchars($this->input->post('user_surname'));
            $user_email = htmlspecialchars($this->input->post('user_email'));

            $user_ddd = htmlspecialchars($this->input->post('user_ddd'));
            $user_phone = htmlspecialchars($this->input->post('user_phone'));
            $user_id = htmlspecialchars($this->input->post('user_id'));
            $user_credit = htmlspecialchars($this->input->post('user_credit'));

            $user_email_old = $this->user_model->getUserById($user_id)['user_email'];

            // Validations
            $validate_email = $this->register_model->validate_email($user_email);


            // $user_credit = str_replace(",",".", $user_credit);




            $response = array();



            if (is_numeric($user_credit)) {

                if ($validate_email != FALSE || $user_email == $user_email_old) {

                    //Creating user
                    if ($this->register_model->updateUser($user_id, $user_name, $user_surname, $user_email,  $user_ddd, $user_phone, $user_credit)) {

                        $response =  array('status' => 'true', 'message' => 'Atualizado com sucesso');
                    } else {

                        $response =  array('status' => 'false', 'message' => 'Ocorreu um erro. Tente mais tarde.');
                    }

                } else {
                    $response =  array('status' => 'false', 'message' => 'Este e-mail já está sendo usado.');
                }
            } else {
                $response =  array('status' => 'false', 'message' => 'Insira um valor de crédito válido.');
            }




            print_r(json_encode($response));
        }
    }

    public function act_get_affiliate_detalhes() {
        $receiver = htmlspecialchars($this->input->post('receiver'));

        $user_data = $this->user_model->getUserById($receiver);

        echo '
<div class="grid place-items-end">
<button id="close-modal" onclick="closeModal()" class="bg-red-500 mt-5 px-3 py-3 text-white" >X</button>

</div>

            <h3 class="text-xs font-bold text-white mb-5 uppercase ">Detalhamento do Afiliado</h3>

            <div class="grid grid-cols-2">
                <div class="col-span-1">
                    <label for="" class="text-orange  mt-2 font-semibold">NOME DO AFILIADO</label>
                    <p class="text-white">'.$user_data['user_name'].' '.$user_data['user_surname'].'</p>
                </div>
                <div class="col-span-1">
                    <label for="" class="text-orange  mt-2 font-semibold">CPF</label>
                    <p class="text-white">'.$user_data['user_cpf'].'</p>
                </div>
                <div class="col-span-1">
                    <label for="" class="text-orange  mt-2 font-semibold">E-MAIL</label>
                    <p class="text-white">'.$user_data['user_email'].'</p>
                </div>
                <div class="col-span-1">
                    <label for="" class="text-orange  mt-2 font-semibold">NÚMERO DE CADASTROS OBTIDO</label>
                    <p class="text-white">'.count($this->admin_model->cadastrosTotaisByUser($user_data['user_affiliate'])           ).'</p>
                </div>
            </div>
            <br>
            <hr>
<br>             
<h3 class="text-xs font-bold text-white mb-5 uppercase ">Detalhamento PARA PAGAMENTO</h3>

            <div class="grid grid-cols-2">
                <div class="col-span-1">
                    <label for="" class="text-orange  mt-2 font-semibold">PIX TIPO</label>
                    <p class="text-white"> '.$user_data['user_pix_type'].'</p>
                </div>
                <div class="col-span-1">
                    <label for="" class="text-orange  mt-2 font-semibold">PIX CHAVE</label>
                    <p class="text-white">'.$user_data['user_pix_key'].'</p>
                </div>
            
            </div>
            <br>
            <hr>
            <br>

            <p class="mt-5 font-semibold text-orange ">REGISTRO DE COMISSÕES</p>

            <div class="mt-5">
                <table style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-white text-left "><small>ID DO PAGAMENTO</small></th>
                            <th class="text-white text-left "><small>NOME DO PAGADOR</small></th>
                            <th class="text-white text-left "><small>VALOR DA TRANSAÇAO </small></th>
                            <th class="text-white text-left "><small>DATA DO PAGAMENTO </small></th>
                            <th class="text-white text-left "><small>VALOR DA COMISSÃO</small></th>
                        </tr>
                    </thead>
                    <tbody>';

                    foreach ($this->admin_model->repassesPendentesById($user_data['id']) as $e) { 

                         $paador = $this->user_model->getUserById($e->comission_receiver); 

                    echo'
                    
                        <tr>
                            <td>
                                <small class="text-center text-white">#'.$e->comission_payment_id.'</small>
                            </td>
                            <td>
                                <small class="text-center text-white">'.$paador['user_name'].' '.$paador['user_surname'].'</small>
                            </td>
                            <td>
                                <small class="text-center text-white">R$ '.$e->comission_amount.'</small>
                            </td>
                            <td>
                                <small class="text-center text-white">'.$e->comission_date.'</small>
                            </td>
                            <td>
                                <small class="text-center text-white">R$ '.$e->comission.'</small>
                            </td>

                        </tr>
                        ';
                    }
                    echo '</tbody>
                </table>


            </div>
            <div>
            </div>
        
        ';

    }

    public function act_confirmar_repasse()
    {
        $receiver = htmlspecialchars($this->input->post('receiver'));

        // Pegando valor total
        $comission_amount = $this->admin_model->repassesPendentesByUser($receiver);

        // Atualiza status
        $this->admin_model->confirmaRepasseUsuario($receiver);

        // Adicionar Historico

        if ($this->admin_model->addConcluidoHistorico($receiver, $comission_amount )) {
            $response =  array('status' => 'true', 'message' => 'Repasse Concluido.');
        } else {
            $response =  array('status' => 'false', 'message' => 'Ocorreu ao concluir o repasse.');
        }

        print_r(json_encode($response));
    }

    public function act_update_affiliate_settings()
    {
        $c_active = htmlspecialchars($this->input->post('c_active'));
        $c_porcentage = htmlspecialchars($this->input->post('c_porcentage'));


        $data = array(
            'c_active' => $c_active,
            'c_porcentage' => $c_porcentage
        );


        if ($this->admin_model->updateAffiliateSetting($data)) {
            $response =  array('status' => 'true', 'message' => 'Atualizado com sucesso.');
        } else {
            $response =  array('status' => 'false', 'message' => 'Ocorreu um erro ao atualizar.');
        }

        print_r(json_encode($response));
    }
}
