<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Accounts extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('email') != ADMIN_ACCOUNT)
            redirect(BASE_URL . 'admin/auth');
        //$this->load->model('account_model','account');
    }

    public function account_list() {
        $this->db->select('*');
        $this->db->from('teachers');
        $this->db->where('email !=', ADMIN_ACCOUNT);
        //$this->db->where("status", 1);
        $query = $this->db->get();
        $data['accounts'] = $query->result();

        $data['css'] = array('dataTables.bootstrap.css', 'dataTables.responsive.css');
        $data['js'] = array('jquery.dataTables.min.js', 'dataTables.bootstrap.min.js', 'pages/users.js');
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('main/account_list_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function create_new() {
        $data['error_message'] = $this->session->flashdata('error_message');
        $data['css'] = array();
        $data['js'] = array();
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('main/create_new_account_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }
    
    public function add_account(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email|is_unique[teachers.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');

        if ($this->form_validation->run()) {
            $values['name'] = set_value('name');
            $values['email'] = set_value('email');
            $values['password'] = md5(set_value('password'));
            $values['status'] = 1;

            $status = $this->db->insert("teachers",$values);
            if (!$status) {
                $this->session->set_flashdata('error_message', 'There has been some error. Please retry.');
            } else {
                redirect(BASE_URL . 'admin/accounts/account_list');
            }
        } else {
            $this->create_new();
        }
    }

    public function deactivate($id) {
        $id = $this->encrypt->decode($id);
        $update = array('status' => 0);
        $this->db->where("pk_teacher_id", $id);
        $this->db->update("teachers", $update);

        redirect(BASE_URL . 'admin/accounts/account_list');
    }

    public function activate($id) {
        $id = $this->encrypt->decode($id);
        $update = array('status' => 1);
        $this->db->where("pk_teacher_id", $id);
        $this->db->update("teachers", $update);

        redirect(BASE_URL . 'admin/accounts/account_list');
    }

    public function change_password($id) {
        $data['id'] = $id;
        $id = $this->encrypt->decode($id);

        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|matches[rpassword]|min_length[6]');
        $this->form_validation->set_rules('rpassword', 'Password', 'required|trim');

        if ($this->form_validation->run()) {
            $update = array('password' => md5(set_value('password')));
            $this->db->where("pk_teacher_id", $id);
            $this->db->update("teachers", $update);
            $data['success_message'] = 'Password changed successfully';
        }
        $data['css'] = array();
        $data['js'] = array();
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('main/change_account_password_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

}
