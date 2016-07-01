<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in'))
            redirect(BASE_URL . 'admin/auth');
        $this->load->model('profile_model','profile');
    }

    public function index() {
        $data['css'] = array();
        $data['js'] = array();
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('main/profile_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

    public function change_password() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cpassword', 'Password', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|matches[rpassword]|min_length[6]');
        $this->form_validation->set_rules('rpassword', 'Password', 'required|trim');
        
        if ($this->form_validation->run()) {
            $user['cpassword'] = set_value('cpassword');
            $user['password'] = set_value('password');
            $user['user_id'] = $this->session->userdata('user_id'); 
            $status = $this->profile->change_password($user);
            if(!$status){
                $data['error_message'] = 'Current password entered is wrong.';
            } else{
                $data['success_message'] = 'Password changed successfully';
            }                
        }
        $data['css'] = array();
        $data['js'] = array();
        $data['header'] = $this->load->view('headers/header_view', $data, true);
        $data['sidebar'] = $this->load->view('sidebars/sidebar_view', $data, true);
        $data['main'] = $this->load->view('main/change_password_view', $data, true);
        $this->load->view('templates/main_template_view', $data);
    }

}
