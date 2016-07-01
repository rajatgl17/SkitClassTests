<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Student_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_available_tests() {
        $this->db->select("t.pk_test_id as id, t.name as test, tc.name as teacher");
        $this->db->from("tests as t");
        $this->db->join("teachers as tc", "t.fk_teacher_id = tc.pk_teacher_id", "left");
        $this->db->where("t.status", 2);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_questions($test_id) {
        $this->db->select("*");
        $this->db->from("ques_bank");
        $this->db->where("fk_test_id", $test_id);
        $this->db->where("status", 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_test_details($test_id) {
        $this->db->select("*");
        $this->db->from("tests");
        $this->db->where("pk_test_id", $test_id);
        $query = $this->db->get();
        $result = $query->row();

        if ($result->status == 2)
            return $result;
        else
            redirect(BASE_URL);
    }

    public function check_key($test_id, $key) {
        $this->db->select("*");
        $this->db->from("tests");
        $this->db->where("pk_test_id", $test_id);
        $this->db->where("key", $key);
        $query = $this->db->get();
        $row = $query->num_rows();

        if ($row == 1)
            return true;
        else
            return false;
    }

    public function check_answer($ques, $ans) { 
        $ques = base64_decode($ques);
        
        $this->db->select("*");
        $this->db->from("ques_bank");
        $this->db->where("pk_ques_id", $ques);
        $this->db->where("op1", $ans);
        $query = $this->db->get();
        $row = $query->num_rows();

        if ($row == 1)
            return true;
        else
            return false;
    }

}
