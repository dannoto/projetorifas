<?php
class user_model extends CI_Model
{

    public function getUserByEmail($user_email) {

        $this->db->where('user_email', $user_email);
        return $this->db->get('users')->row_array();

    }

    public function getUserByToken($user_token) {
        $this->db->where('user_token', $user_token);
        return $this->db->get('users')->row_array();
    }
    public function getUsers(){
        return $this->db->get('users')->result();
    }

    public function getUserById($user_id) {
        $this->db->where('id', $user_id);
        return $this->db->get('users')->row_array();
    }

    public function updateUserCredits($raffle_user, $raffle_amount, $user_credits) {

        $this->db->where('id', $raffle_user);

        $data = array(
            'user_credit' => ($raffle_amount + $user_credits),
        );

        return $this->db->update('users', $data);
    }

    public function updatePassword($user_id, $password) {
        $this->db->where('id', $user_id);

        $data = array (
            'user_password' => md5($password),
        );
        return $this->db->update('users', $data);
    }

    public function updateToken($user_id) {
        $this->db->where('id', $user_id);

        $data = array (
            'user_token' => mt_rand(),
        );
        return $this->db->update('users', $data);
    }

 
}
?>