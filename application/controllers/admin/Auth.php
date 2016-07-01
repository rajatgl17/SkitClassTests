<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('auth_model', 'auth');
        $this->load->helper('captcha');
    }

    public function index() {
        if ($this->session->userdata('logged_in'))
            redirect(BASE_URL . 'admin');

        $random_number = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        $vals = array(
            'word' => $random_number,
            'img_path' => './captcha/',
            'img_url' => BASE_URL . 'captcha/',
            'img_width' => 140,
            'img_height' => 32,
            'expiration' => 7200
        );
        $data['captcha'] = create_captcha($vals);
        $this->session->set_userdata('captchaWord', $data['captcha']['word']);
        $data['error_message'] = $this->session->flashdata('error_message');
        $data['css'] = array();
        $data['js'] = array();
        $data['main'] = $this->load->view('main/login_view', $data, true);
        $this->load->view('templates/basic_template_view', $data);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(BASE_URL . 'admin');
    }

    public function login() {
        if ($this->session->userdata('logged_in'))
            redirect(BASE_URL . 'admin');

        $this->load->library('form_validation');
        

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('userCaptcha', 'Captcha', 'required|callback_check_captcha');

        if ($this->form_validation->run()) {
            $user['email'] = set_value('email');
            $user['password'] = set_value('password');
            $status = $this->auth->login($user);
            if (!$status) {
                $this->session->set_flashdata('error_message', 'Invalid credentials.');
            }
        }
        $this->index();
    }

    public function check_captcha($str) {
        $word = $this->session->userdata('captchaWord');
        if (strcmp(strtoupper($str), strtoupper($word)) == 0) {
            return true;
        } else {
            $this->form_validation->set_message('check_captcha', 'Please enter correct words!');
            return false;
        }
    }

}
