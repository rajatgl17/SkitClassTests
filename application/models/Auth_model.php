<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function login($user){
        $this->db->select("*");
        $this->db->from("teachers");
        $this->db->where("email", $user['email']);
        $this->db->where("password", md5($user['password']));
        $this->db->where("status", 1);

        $query = $this->db->get();
        $result = $query->row();
        if ($result) {
            $session_details = array(
                'logged_in' => true,
                'username' => $result->name,
                'user_id' => $result->pk_teacher_id
            );
            $this->session->set_userdata($session_details);
            redirect(BASE_URL.'admin');
        } else
            return false;
    }
}
