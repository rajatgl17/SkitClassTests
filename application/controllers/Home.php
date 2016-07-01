<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /*switch (ENVIRONMENT) {
            case 'development':
                if (!isset($_SERVER['REMOTE_ADDR']) || $_SERVER['REMOTE_ADDR'] != "::1")
                    die('<h3>**This webpage is accessible only through college IP address.</h3>');
                break;
            case 'production':
                if (!isset($_SERVER['REMOTE_ADDR']) || $_SERVER['REMOTE_ADDR'] != "203.190.148.228")
                    die('<h3>**This webpage is accessible only through college IP address.</h3>');
                break;
        }*/

        $this->load->model('student_model', 'student');
    }

    public function index() {
        $data['available_tests'] = $this->student->get_available_tests();
        $data['form'] = $this->load->view('home_view', $data, true);
        $this->load->view('templates/student_template_view', $data);
    }

    public function test_details($test_id) {
        $data['error_message'] = $this->session->flashdata('error_message');
        $data['test_id'] = $test_id;
        $test_id = $this->encrypt->decode($test_id);
        $data['test_details'] = $this->student->get_test_details($test_id);
        $data['form'] = $this->load->view('test_details_view', $data, true);
        $this->load->view('templates/student_template_view', $data);
    }

    public function check_test($test_id) {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('rollno', 'Roll No.', 'required|trim');
        $this->form_validation->set_rules('key', 'Key', 'required|trim');

        if ($this->form_validation->run()) {
            $values['name'] = set_value('name');
            $values['rollno'] = set_value('rollno');

            $key = set_value('key');
            $test_id = $this->encrypt->decode($test_id);
            $status = $this->student->check_key($test_id, $key);

            $values['test_id'] = $test_id;

            if (!$status) {
                $this->session->set_flashdata('error_message', 'Incorrect Security Key.');
                $this->test_details($this->encrypt->encode($test_id));
            } else {
                $this->session->set_flashdata('values', json_encode($values));
                //$this->test();
                redirect(BASE_URL . 'home/test');
            }
        } else {
            $this->test_details($test_id);
        }
    }

    public function test() {
        $values = $this->session->flashdata('values');
        if (!empty($values)) {
            $data['values'] = json_decode($values);
            $this->session->set_flashdata('values', '');

            $data['test_details'] = $this->student->get_test_details($data['values']->test_id);
            $data['questions'] = $this->student->get_questions($data['values']->test_id);
            shuffle($data['questions']);

            $data['form'] = $this->load->view('test_view', $data, true);
            $this->load->view('templates/student_template_view', $data);
        } else
            $this->index();
    }

    public function test_result() {
        $data = $this->input->post();

        $marks['name'] = $this->encrypt->decode($data['name']);
        $marks['rollno'] = $this->encrypt->decode($data['rollno']);
        $marks['test_id'] = $this->encrypt->decode($data['test_id']);
        $junk = $this->student->get_test_details($marks['test_id']);

        if (empty($marks['name']) || empty($marks['rollno']) || empty($marks['test_id'])) {
            redirect(BASE_URL);
        }

        unset($data['name']);
        unset($data['rollno']);
        unset($data['test_id']);
        unset($data['0']);

        $marks['attempt'] = 0;
        $marks['right'] = 0;
        $marks['wrong'] = 0;

        foreach ($data as $key => $value) {
            $marks['attempt'] ++;
            if ($value != '') {
                $status = $this->student->check_answer($key, $value);
                if ($status)
                    $marks['right'] ++;
                else
                    $marks['wrong'] ++;
            } else {
                $marks['attempt'] --;
            }
        }
        $marks['total']=$marks['right']-(0.25*$marks['wrong']);
        if($marks['total']<0)
           $marks['total']=0;
        $marks['total']=round($marks['total']);
       
        

        $array = array(
            'fk_test_id' => $marks['test_id'],
            'name' => $marks['name'],
            'roll_no' => $marks['rollno'],
            'marks' => $marks['total'],
            'status' => 1
        );
        $status = $this->db->insert("marksheet", $array);
        if (!$status) {
            echo 'There has been some error in the server. Please retry.';
            die;
        } else {
            $data = array();
            $data = $marks;
            $data['form'] = $this->load->view('result_view', $data, true);
            $this->load->view('templates/student_template_view', $data);
        }
    }

}
