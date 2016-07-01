<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Question_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_questions($test_id){
        $this->db->select("*");
        $this->db->from("ques_bank");
        $this->db->where("fk_test_id",$test_id);
        $this->db->where("status",1);
        $this->db->order_by('pk_ques_id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_test_details($test_id){
        $this->db->select("*");
        $this->db->from("tests");
        $this->db->where("pk_test_id",$test_id);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function get_ques($ques_id,$test_id){
        $this->db->select("*");
        $this->db->from("ques_bank");
        $this->db->where("fk_test_id",$test_id);
        $this->db->where("pk_ques_id",$ques_id);
        $query = $this->db->get();
        return $query->row();
    }
}
