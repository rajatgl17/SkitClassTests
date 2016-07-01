<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tests extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in'))
            redirect(BASE_URL . 'admin/auth');
        $this->load->model('test_model', 'test');
    }

    public function index() {
        $data['tests'] = $this->test->get_tests($this->session->userdata('user_id'));

        $data['css'] = array('dataTables.bootstrap.css', 'dataTables.responsive.css');
        $data['js'] = array('jquery.dataTables.min.js', 'dataTables.bootstrap.min.js', 'pages/users.js');
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('main/tests_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function create_new() {
        $data['error_message'] = $this->session->flashdata('error_message');
        $data['css'] = array();
        $data['js'] = array();
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('main/create_new_test_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function add_test() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'trim');
        $this->form_validation->set_rules('key', 'Key', 'required|trim');
        $this->form_validation->set_rules('number', 'Number', 'required|trim|numeric');
        $this->form_validation->set_rules('time', 'Time', 'required|trim|numeric');

        if ($this->form_validation->run()) {
            $values['name'] = set_value('name');
            $values['description'] = set_value('description');
            $values['key'] = set_value('key');
            $values['number'] = set_value('number');
            $values['time'] = set_value('time');
            $values['status'] = 1;
            $values['fk_teacher_id'] = $this->session->userdata('user_id');

            $status = $this->test->add_test($values);
            if (!$status) {
                $this->session->set_flashdata('error_message', 'There has been some error. Please retry.');
            } else {
                redirect(BASE_URL . 'admin');
            }
        } else {
            $this->create_new();
        }
    }

    public function activate($test_id) {
        $test_id = $this->encrypt->decode($test_id);
        $test_details = $this->test->get_test_details($test_id, $this->session->userdata('user_id'));
        $ques = $this->test->get_number_ques($test_id);

        if ($test_details->number <= $ques) {
            $update = array('status' => 2);
            $this->db->where("pk_test_id", $test_id);
            $this->db->where("fk_teacher_id", $this->session->userdata('user_id'));
            $this->db->update("tests", $update);
        }

        $this->index();
    }

    public function deactivate($test_id) {
        $test_id = $this->encrypt->decode($test_id);
        $update = array('status' => 1);
        $this->db->where("pk_test_id", $test_id);
        $this->db->where("fk_teacher_id", $this->session->userdata('user_id'));
        $this->db->update("tests", $update);
        $this->index();
    }

    public function delete($test_id) {
        $test_id = $this->encrypt->decode($test_id);
        $update = array('status' => 0);
        $this->db->where("pk_test_id", $test_id);
        $this->db->where("fk_teacher_id", $this->session->userdata('user_id'));
        $this->db->update("tests", $update);
        $this->index();
    }

    public function edit($test_id) {
        $test_id = $this->encrypt->decode($test_id);
        $data['test'] = $this->test->get_test_details($test_id, $this->session->userdata('user_id'));

        $data['error_message'] = $this->session->flashdata('error_message');
        $data['css'] = array();
        $data['js'] = array();
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('main/update_test_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function update($test_id) {
        $test_id = $this->encrypt->decode($test_id);

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'trim');
        $this->form_validation->set_rules('key', 'Key', 'required|trim');
        $this->form_validation->set_rules('number', 'Number', 'required|trim|numeric');
        $this->form_validation->set_rules('time', 'Time', 'required|trim|numeric');

        if ($this->form_validation->run()) {
            $values['name'] = set_value('name');
            $values['description'] = set_value('description');
            $values['key'] = set_value('key');
            $values['number'] = set_value('number');
            $values['time'] = set_value('time');
            $values['fk_teacher_id'] = $this->session->userdata('user_id');

            $this->db->where("pk_test_id", $test_id);
            $this->db->where("fk_teacher_id", $this->session->userdata('user_id'));
            $status = $this->db->update("tests", $values);
            if (!$status) {
                $this->session->set_flashdata('error_message', 'There has been some error. Please retry.');
            } else {
                redirect(BASE_URL . 'admin');
            }
        } else {
            $this->edit($test_id);
        }
    }

    public function marks($test_id) {
        $data['marks'] = $this->test->get_marks($this->encrypt->decode($test_id));
        $data['test_id'] = $test_id;
        $data['css'] = array('dataTables.bootstrap.css', 'dataTables.responsive.css');
        $data['js'] = array('jquery.dataTables.min.js', 'dataTables.bootstrap.min.js', 'pages/users.js');
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('main/marks_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function download($test_id) {
        $marks = $this->test->get_marks($this->encrypt->decode($test_id));
        header('Content-Disposition: attachment; filename=Marks.xls');
        header('Content-type: application/force-download');
        header('Content-Transfer-Encoding: binary');
        header('Pragma: public');

        echo 'Name' . "\t" . 'Roll No.' . "\t" . 'Marks' . "\n\n";
        foreach ($marks as $key => $value) {
            foreach ($value as $k => $v)
                echo $v . "\t";
            echo "\n";
        }
    }

}
