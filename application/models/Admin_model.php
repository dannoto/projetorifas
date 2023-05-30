<?php
class admin_model extends CI_Model
{

    public function SendRecovery($user_email, $user_token)
    {

        return true;
    }

    public function getTerms()
    {

        return $this->db->get('terms')->row_array();
    }

    public function updateAffiliateSetting($data)
    {
        return $this->db->update('affiliate_setting', $data);
    }

    public function Auth()
    {
        $base =  $_SERVER['HTTP_HOST'] . "" . $_SERVER['REQUEST_URI'];

        if (strpos($base, "painel/login")) {
        } else {

            if ($this->session->userdata('session_admin')) {
                if ($this->session->userdata('session_admin')['user_admin'] == 1) {
                } else {
                    redirect(base_url('painel/login'));
                }
            } else {
                redirect(base_url('painel/login'));
            }
        }
    }
    public function getGateways()
    {

        return $this->db->get('gateways')->row_array();
    }

    public function getPrivacy()
    {

        return $this->db->get('privacy')->row_array();
    }

    public function updateTerms($title, $content)
    {


        $data = array(
            'terms_title' => $title,
            'terms_content' => $content
        );

        return $this->db->update('terms', $data);
    }

    public function updatePrivacy($title, $content)
    {

        $data = array(
            'privacy_title' => $title,
            'privacy_content' => $content
        );

        return $this->db->update('privacy', $data);
    }

    public function getFaqs()
    {

        $this->db->order_by('id', 'desc');
        return $this->db->get('faq')->result();
    }

    public function deleteFaq($faq_id)
    {
        $this->db->where('id', $faq_id);

        return $this->db->delete('faq');
    }

    public function addFaq($faq_title, $faq_content)
    {

        $data = array(
            'faq_title' => $faq_title,
            'faq_content' => $faq_content
        );

        return $this->db->insert('faq', $data);
    }



    public function getCupons()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('cart_discount')->result();
    }

    public function deleteCupons($cupom_id)
    {
        $this->db->where('id', $cupom_id);
        return $this->db->delete('cart_discount');
    }

    public function addCupons($cart_discount_code, $cart_discount_porcentage, $cart_discount_limit)
    {
        $data = array(
            'cart_discount_code' => $cart_discount_code,
            'cart_discount_porcentage' => $cart_discount_porcentage,
            'cart_discount_limit' => $cart_discount_limit,
            'cart_discount_status' => 1
        );

        return $this->db->insert('cart_discount', $data);
    }



    public function getSorteios()
    {

        return $this->db->get('raffles')->result();
    }

    public function getPagamentos()
    {
        return $this->db->get('payments')->result();
    }
    // 
    public function getDepoimentos()
    {

        $this->db->order_by('id', 'desc');
        return $this->db->get('depoimentos')->result();
    }

    public function deleteDepoimentos($depoimento_id)
    {
        $this->db->where('id', $depoimento_id);

        return $this->db->delete('depoimentos');
    }

    public function addDepoimentos($depoimento_title, $depoimento_content)
    {

        $data = array(
            'depoimentos_title' => $depoimento_title,
            'depoimentos_content' => $depoimento_content
        );

        return $this->db->insert('depoimentos', $data);
    }
    // 

    public function getConfiguracoes()
    {
        return $this->db->get('configurations')->row_array();
    }

    public function updateLogo($configuracoes_logo)
    {
        $data = array(
            'configuracoes_logo' => $configuracoes_logo,
        );

        return $this->db->update('configurations', $data);
    }

    public function updateConfiguracoes($configuracoes_social_facebook, $configuracoes_social_twitter, $configuracoes_social_instagram, $configuracoes_contato_telefone, $configuracoes_contato_email)
    {


        $data = array(
            'configuracoes_social_facebook' => $configuracoes_social_facebook,
            'configuracoes_social_twitter' => $configuracoes_social_twitter,
            'configuracoes_social_instagram' => $configuracoes_social_instagram,
            'configuracoes_contato_telefone' => $configuracoes_contato_telefone,
            'configuracoes_contato_email' => $configuracoes_contato_email,
        );

        return $this->db->update('configurations', $data);
    }

    public function updateGateways($gateway_me_public, $gateway_me_secret, $gateway_pay_public, $gateway_pay_secret, $gateway_act_public,  $gateway_act_secret, $gateway_act_list = "000")
    {

        $data = array(
            'gateway_me_public' => $gateway_me_public,
            'gateway_me_secret' => $gateway_me_secret,

            'gateway_pay_public' => $gateway_pay_public,
            'gateway_pay_secret' => $gateway_pay_secret,

            'gateway_act_public' => $gateway_act_public,
            'gateway_act_secret' => $gateway_act_secret,
            'gateway_act_list' => $gateway_act_list
        );

        return $this->db->update('gateways', $data);
    }


    // aFFILIAÇAO
    public function cadastrosTotais()
    {
        $this->db->where('user_ref !=', '');
        return $this->db->get('users')->result();
    }

    public function cadastrosTotaisByUser($user_affiliate)
    {
        $this->db->where('user_ref', $user_affiliate);
        return $this->db->get('users')->result();
    }

    public function cliquesTotais()
    {
        return $this->db->get('affiliate_click')->result();
    }

    public function repassesPendentes()
    {
        $this->db->distinct();
        $this->db->select('comission_receiver');
        $this->db->where('comission_status', 0);

        return  $this->db->get('affiliate_comission')->result();
    }

    public function repassesPendentesTotal()
    {
        $this->db->where('comission_status', 0);

        $data =  $this->db->get('affiliate_comission')->result();

        $total = 0;

        foreach($data as $d) {
            $total = ($total + $d->comission);
        } 

        return round($total, 2);
    }

    

    public function addConcluidoHistorico($receiver, $comission_amount) {

        $data = array(
            'comission_user' => $receiver,
            'comission_date' => date('Y-m-d H:i:s'),
            'comission_amount' => $comission_amount
        );

        return $this->db->insert('affiliate_comission_history', $data);
    }

    public function confirmaRepasseUsuario($receiver) {
        $this->db->where('comission_receiver', $receiver);

        $data = array(
            'comission_status' => 1,
        );

        return $this->db->update('affiliate_comission', $data);
    }
    
    public function repassesRealizadosTotal()
    {

        $data =  $this->db->get('affiliate_comission_history')->result();

        $total = 0;

        foreach($data as $d) {
            $total = ($total + $d->comission_amount);
        } 

        return round($total, 2);
    }

    public function repassesPendentesByUser($user_id)
    {
        $this->db->where('comission_receiver', $user_id);
        $this->db->where('comission_status', 0);

        $data =  $this->db->get('affiliate_comission')->result();

        $total = 0;

        foreach($data as $d) {
            $total = ($total + $d->comission);
        } 

        return round($total, 2);
    }

    
    public function repassesPendentesById($user_id)
    {
        $this->db->where('comission_receiver', $user_id);
        $this->db->where('comission_status', 0);

        return $this->db->get('affiliate_comission')->result();
    }

    public function repassesRealizados()
    {
        return $this->db->get('affiliate_comission_history')->result();
    }
}
