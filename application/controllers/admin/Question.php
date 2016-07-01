<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Question extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in'))
            redirect(BASE_URL . 'admin/auth');
        $this->load->model('question_model', 'question');
    }

    public function ques_bank($test_id) {
        $test_id = $this->encrypt->decode($test_id);
        $data['ques'] = $this->question->get_questions($test_id);
        $data['test'] = $this->question->get_test_details($test_id);

        $data['css'] = array('dataTables.bootstrap.css', 'dataTables.responsive.css');
        $data['js'] = array('jquery.dataTables.min.js', 'dataTables.bootstrap.min.js', 'pages/users.js');
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('main/ques_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function add_ques($test_id) {
        $data['test_id'] = $test_id;

        $data['error_message'] = $this->session->flashdata('error_message');
        $data['success_message'] = $this->session->flashdata('success_message');
        $data['css'] = array();
        $data['js'] = array();
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('main/add_ques_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function add($test_id) {
        $test_idk = $this->encrypt->decode($test_id);

        $this->load->library('form_validation');
        $this->form_validation->set_rules('ques', 'Question', 'required|trim');
        $this->form_validation->set_rules('op1', 'Option 1', 'required|trim');
        $this->form_validation->set_rules('op2', 'Option 2', 'required|trim');
        $this->form_validation->set_rules('op3', 'Option 3', 'required|trim');
        $this->form_validation->set_rules('op4', 'Option 4', 'required|trim');

        if ($this->form_validation->run()) {
            $values['ques'] = set_value('ques');
            $values['op1'] = set_value('op1');
            $values['op2'] = set_value('op2');
            $values['op3'] = set_value('op3');
            $values['op4'] = set_value('op4');
            $values['status'] = 1;
            $values['fk_test_id'] = $test_idk;

            $status = $this->db->insert("ques_bank", $values);
            if (!$status) {
                $this->session->set_flashdata('error_message', 'There has been some error. Please retry.');
            } else {
                if ($this->input->post('redirect') == "0") {
                    $this->ques_bank($test_id);
                } else {
                    $this->session->set_flashdata('success_message', 'Question saved successfully.');
                    $this->add_ques($test_id);
                }
            }
        } else {
            $this->add_ques($test_id);
        }
    }

    public function edit() {
        $ques_id = $this->encrypt->decode($_GET['q']);
        $test_id = $this->encrypt->decode($_GET['t']);

        $data['ques_id'] = $_GET['q'];
        $data['test_id'] = $_GET['t'];

        $data['ques'] = $this->question->get_ques($ques_id, $test_id);
        $data['error_message'] = $this->session->flashdata('error_message');
        $data['css'] = array();
        $data['js'] = array();
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('main/edit_ques_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function editk($ques_id, $test_id) {
        $data['ques_id'] = $ques_id;
        $data['test_id'] = $test_id;
        
        $ques_id = $this->encrypt->decode($ques_id);
        $test_id = $this->encrypt->decode($test_id);

        $data['ques'] = $this->question->get_ques($ques_id, $test_id);
        $data['error_message'] = $this->session->flashdata('error_message');
        $data['css'] = array();
        $data['js'] = array();
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('main/edit_ques_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function editq() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('ques', 'Question', 'required|trim');
        $this->form_validation->set_rules('op1', 'Option 1', 'required|trim');
        $this->form_validation->set_rules('op2', 'Option 2', 'required|trim');
        $this->form_validation->set_rules('op3', 'Option 3', 'required|trim');
        $this->form_validation->set_rules('op4', 'Option 4', 'required|trim');
        $this->form_validation->set_rules('qid', 'qid', 'required');
        $this->form_validation->set_rules('tid', 'tid', 'required');
        $qid = $this->input->post('qid');
        $tid = $this->input->post('tid');
        
        if ($this->form_validation->run()) {
            $values['ques'] = set_value('ques');
            $values['op1'] = set_value('op1');
            $values['op2'] = set_value('op2');
            $values['op3'] = set_value('op3');
            $values['op4'] = set_value('op4');
            $qid = set_value('qid');
            $tid = set_value('tid');

            $qidk = $this->encrypt->decode($qid);
            $tidk = $this->encrypt->decode($tid);

            $this->db->where("pk_ques_id", $qidk);
            $this->db->where("fk_test_id", $tidk);
            $status = $this->db->update("ques_bank", $values);
            if (!$status) {
                $this->session->set_flashdata('error_message', 'There has been some error. Please retry.');
            } else {
                $this->ques_bank($tid);
            }
        } else {
            $this->editk($qid, $tid);
        }
    }

    public function delete() {
        $ques_id = $this->encrypt->decode($_GET['q']);
        $test_id = $this->encrypt->decode($_GET['t']);

        $update = array('status' => 0);
        $this->db->where("pk_ques_id", $ques_id);
        $this->db->update("ques_bank", $update);

        redirect(BASE_URL . 'admin/question/ques_bank/' . $this->encrypt->encode($test_id));
    }

}
