<?php
class login_model extends CI_Model
{

    public function Auth($user_email, $user_password) {

        $this->db->where('user_email', $user_email);
        $this->db->where('user_password', md5($user_password));

        return $this->db->get('users')->row_array();

    }

}
?>