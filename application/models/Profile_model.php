<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function change_password($user){
        $this->db->select("password");
        $this->db->from("teachers");
        $this->db->where("pk_teacher_id",$user['user_id']);
        $this->db->where("password", md5($user['cpassword']));
        $query = $this->db->get();
        $result = $query->row();
        
        if($result){
            $update = array('password' => md5($user['password']));
            $this->db->where("pk_teacher_id",$user['user_id']);
            return $this->db->update("teachers",$update);
        } else {
            return false;
        }
    }
}
