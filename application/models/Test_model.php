<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Test_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function add_test($values){
        return $this->db->insert("tests",$values);
    }
    
    public function get_tests($teacher_id){
        $this->db->select('*');
        $this->db->from('tests');
        $this->db->where('fk_teacher_id',$teacher_id);
        $this->db->where("status !=", 0);
        $this->db->order_by('pk_test_id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_test_details($test_id,$teacher_id){
        $this->db->select("*");
        $this->db->from("tests");
        $this->db->where("pk_test_id",$test_id);
        $this->db->where("fk_teacher_id",$teacher_id);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function get_marks($test_id){
        $this->db->select("name,roll_no,marks");
        $this->db->from("marksheet");
        $this->db->where("fk_test_id",$test_id);
        $this->db->where("status",1);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_number_ques($test_id){
        $this->db->from("ques_bank");
        $this->db->where("fk_test_id",$test_id);
        $this->db->where("status",1);
        $query = $this->db->get();
        return $query->num_rows();
    }
}
