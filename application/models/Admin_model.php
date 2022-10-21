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

    public function updateGateways($gateway_me_public, $gateway_me_secret, $gateway_pay_public , $gateway_pay_secret, $gateway_act_public ,  $gateway_act_secret )  {

        $data = array(
            'gateway_me_public' => $gateway_me_public,
            'gateway_me_secret' => $gateway_me_secret,

            'gateway_pay_public' => $gateway_pay_public,
            'gateway_pay_secret' => $gateway_pay_secret,

            'gateway_act_public' => $gateway_act_public,
            'gateway_act_secret' => $gateway_act_secret
        );

        return $this->db->update('gateways', $data);
    }
   

}
?>