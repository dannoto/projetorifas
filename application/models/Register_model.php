<?php
class register_model extends CI_Model
{

    public function addUser($user_name, $user_surname, $user_email, $user_cpf, $user_ddd, $user_phone, $user_password, $user_ref, $user_ip, $user_affiliate, $user_pix_type, $user_pix_key)
    {

        $data = array(
            'user_name' => $user_name,
            'user_surname' => $user_surname,
            'user_email' => $user_email,
            'user_cpf' => $user_cpf,
            'user_ddd' => $user_ddd,
            'user_phone' => $user_phone,
            'user_password' => md5($user_password),
            'user_ref' => $user_ref,
            'user_ip' => $user_ip,
            'user_status' => 1,
            'user_date' => date('d-m-Y'),
            'user_time' => date('H:i:s'),
            'user_level' => 1,
            'user_token' => mt_rand(),
            'user_affiliate' => $user_affiliate,
            'user_pix_type' => $user_pix_type,
            'user_pix_key' => $user_pix_key
        );


        return $this->db->insert('users', $data);
    }
    
    public function updatePix($user_id, $user_pix_type, $user_pix_key) {
        
          $this->db->where('id', $user_id);

       
            $data = array(
             'user_pix_type' => $user_pix_type,
            'user_pix_key' => $user_pix_key
            );

        return $this->db->update('users', $data);

        
    }

    public function updateUser($user_id, $user_name, $user_surname, $user_email,  $user_ddd, $user_phone, $user_credit = null)
    {

        $this->db->where('id', $user_id);

        if ($user_credit != null) {
            $data = array(
                'user_name' => $user_name,
                'user_surname' => $user_surname,
                'user_email' => $user_email,

                'user_ddd' => $user_ddd,
                'user_phone' => $user_phone,
                'user_credit' => $user_credit,
                

            );
        } else {
            $data = array(
                'user_name' => $user_name,
                'user_surname' => $user_surname,
                'user_email' => $user_email,

                'user_ddd' => $user_ddd,
                'user_phone' => $user_phone,
           

            );
        }


        return $this->db->update('users', $data);
    }

    public function validate_document($user_cpf)
    {

        $this->db->where('user_cpf', $user_cpf);
        $data = $this->db->get('users')->row_array();

        if ($data) {
            return false;
        } else {
            return true;
        }
    }

    public function validate_cpf($cpf)
    {

        // Extrai somente os números
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }


    public function banirUser($user_id, $atual)
    {

        $this->db->where('id', $user_id);

        if ($atual == 1) {
            $data = array(
                'user_status' => 2,
            );
        } else {
            $data = array(
                'user_status' => 1,
            );
        }

        return $this->db->update('users', $data);
    }

    public function validate_banned_document($user_cpf)
    {

        $this->db->where('user_cpf', $user_cpf);
        $this->db->where('user_status', 0);
        $data = $this->db->get('users')->row_array();

        if ($data) {
            return false;
        } else {
            return true;
        }
    }

    public function validate_email($user_email)
    {

        $this->db->where('user_email', $user_email);
        $data = $this->db->get('users')->row_array();

        if ($data) {
            return false;
        } else {
            return true;
        }
    }

    public function validate_phone($user_phone)
    {

        $this->db->where('user_phone', $user_phone);
        $data =  $this->db->get('users')->row_array();

        if ($data) {
            return false;
        } else {
            return true;
        }
    }





    public function getUserIP()
    {


        //whether ip is from the share internet  
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {

            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }

    // Afiliate Link

    public function add_affiliate_link($ref, $user_ip)
    {

        $data  = array(
            'affiliate_ref' => $ref,
            'user_ip' => $user_ip,
            'affiliate_data' => date('Y-m-d H:i:s')
        );

        return $this->db->insert('affiliate_click', $data);
    }


    // Painel de Afiliação

    public function get_cadastros_ref($user_ref)
    {

        $this->db->where('user_ref', $user_ref);
        return $this->db->get('users')->result();
    }

    public function get_cliques_unicos($user_ref)
    {
        $this->db->distinct();
        $this->db->select('user_ip');
        $this->db->from('affiliate_click');
        $this->db->where('affiliate_ref', $user_ref);
        // $this->db->group_by('affiliate_ref');
        // $this->db->having('COUNT(DISTINCT user_ip) = 1');
        
        return $this->db->get()->result();
    }

    public function get_cliques_totais($user_ref)
    {
        $this->db->where('affiliate_ref', $user_ref);
        return $this->db->get('affiliate_click')->result();
    }

    public function getAffiliateComissionPending($user_id) {
        $this->db->where('comission_receiver', $user_id);
        $this->db->where('comission_status', 0);
        return $this->db->get('affiliate_comission')->result();
    }

    public function getAffiliateComissionFinished($user_id) {
        $this->db->where('comission_user', $user_id);
        return $this->db->get('affiliate_comission_history')->result();
    }

    // Rendmentos Totai
    public function getAffiliateComissionTotal($user_id) {
        $this->db->where('comission_receiver', $user_id);
        
        $data =  $this->db->get('affiliate_comission')->result();

        $total = 0 ;

        foreach ($data as $c) {
            $total = $total + $c->comission;
        } 

        return round($total, 2);
    }

    public function getAffiliateComissionTotalPending($user_id) {
        $this->db->where('comission_receiver', $user_id);
        $this->db->where('comission_status', 0);

        $data =  $this->db->get('affiliate_comission')->result();

        $total = 0 ;

        foreach ($data as $c) {
            $total = $total + $c->comission;
        } 

        return round($total, 2);
    }
    // Painel de Afiliação

    // Add Comussion

    public function getComissionSettings() {
        return $this->db->get('affiliate_setting')->row_array();
    }
    
    function getComissionCalc($comission_amount) {

        $response = array();

        $comission_settings  = $this->db->get('affiliate_setting')->row_array();

        $comission_amount = ($comission_amount * ($comission_settings['comission_porcentage'] / 100));

        $response = array('amount' => $comission_amount, 'porcentage' => $comission_settings['c_porcentage'], 'active' => $comission_settings['c_active']);

        return $response;
        

    }

    public function addComission($comission_payment_id, $comission_receiver, $comission_payer, $comission_amount ) {


        $comission = $this->getComissionCalc($comission_amount);

        $data = array(
            'comission_payment_id' => $comission_payment_id,
            'comission_amount' => $comission_amount,
            'comission_porcentage' => $comission['porcentage'],
            'comission_date' => date('Y-m-d H:i:s'),
            'comission_status' => 0,
            'comission_payer' => $comission_payer,
            'comission_receiver' => $comission_receiver,
            'comission' => $comission['amount']

        );

        if ($comission['active'] == 1) {
            return $this->db->insert('affiliate_comission', $data);
        } else {
            return true;
        }


    }
}
