<?php
class admin_model extends CI_Model
{

    public function SendRecovery($user_email, $user_token) {

        return true;

    }

    public function getTerms() {

        return $this->db->get('terms')->row_array();

    }

    public function Auth() {
        $base =  $_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI'];
      
        if (strpos($base, "painel/login")) {

        }  else {

            if ($this->session->userdata('session_admin')) {
                if ($this->session->userdata('session_admin')['user_admin'] == 1) {
    
                } else {
                    redirect(base_url('painel/login'));
                }
            } else{
                redirect(base_url('painel/login'));
            }
        }

    }
    public function getGateways() {

        return $this->db->get('gateways')->row_array();

    }

    public function getPrivacy() {

        return $this->db->get('privacy')->row_array();

    }

    public function updateTerms($title, $content) {
       

        $data = array(
            'terms_title' => $title,
            'terms_content' => $content
        );

        return $this->db->update('terms', $data);

    }

    public function updatePrivacy($title, $content) {
        
        $data = array(
            'privacy_title' => $title,
            'privacy_content' => $content
        );

        return $this->db->update('privacy', $data);

    }

    public function getFaqs() {

        $this->db->order_by('id', 'desc');
        return $this->db->get('faq')->result();
    }

    public function deleteFaq($faq_id) {
        $this->db->where('id', $faq_id);

        return $this->db->delete('faq');
    }

    public function addFaq($faq_title, $faq_content) {

        $data = array(
            'faq_title' => $faq_title,
            'faq_content' => $faq_content
        );

        return $this->db->insert('faq', $data );
    }


    public function getPagamentos() {
        return $this->db->get('payments')->result();
    }
    // 
    public function getDepoimentos() {

        $this->db->order_by('id', 'desc');
        return $this->db->get('depoimentos')->result();
    }

    public function deleteDepoimentos($depoimento_id) {
        $this->db->where('id', $depoimento_id);

        return $this->db->delete('depoimentos');
    }

    public function addDepoimentos($depoimento_title, $depoimento_content) {

        $data = array(
            'depoimentos_title' => $depoimento_title,
            'depoimentos_content' => $depoimento_content
        );

        return $this->db->insert('depoimentos', $data );
    }
    // 

    public function getConfiguracoes() {
        return $this->db->get('configurations')->row_array();
    }

    public function updateLogo($configuracoes_logo) {
        $data = array(
            'configuracoes_logo' => $configuracoes_logo,
        );

        return $this->db->update('configurations', $data);
    }

    public function updateConfiguracoes($configuracoes_social_facebook, $configuracoes_social_twitter, $configuracoes_social_instagram, $configuracoes_contato_telefone, $configuracoes_contato_email  ) {
       

        $data = array(
            'configuracoes_social_facebook' => $configuracoes_social_facebook,
            'configuracoes_social_twitter' => $configuracoes_social_twitter,
            'configuracoes_social_instagram' => $configuracoes_social_instagram,
            'configuracoes_contato_telefone' => $configuracoes_contato_telefone,
            'configuracoes_contato_email' => $configuracoes_contato_email,
        );

        return $this->db->update('configurations', $data);
    }

    public function updateGateways($gateway_me_public, $gateway_me_secret, $gateway_pay_public , $gateway_pay_secret, $gateway_act_public ,  $gateway_act_secret, $gateway_act_list = "000" )  {

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
   

}
?>