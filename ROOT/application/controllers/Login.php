<?php

/**
 * Created by PhpStorm.
 * User: 禎毅
 * Date: 2015/10/6
 * Time: 下午 09:17
 */
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('phpass');
        $this->load->helper('form');
    }

    public function index()
    {
        $this->load->view('login/login_page');
    }

    public function check_user()
    {
        $userid = $this->input->post('user');
        $password = $this->input->post('password');
        if ($this->login_model->check_user($userid, $password)) {
            $user_info = $this->login_model->get_user_info($userid);
            $hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
            $session_id = $hasher->HashPassword($user_info->User_Id);

            $this->session->set_userdata('user_name', $user_info->User_Name);
            $this->session->set_userdata('user_id', $session_id);
            $this->session->set_userdata('user_Unit', $user_info->Unit);

            $this->login_model->modify_login_info($userid, $this->session->user_id, $this->input->ip_address());
            $this->load->view('manage_template/test_template');
        } else {
            $this->load->view('login/login_page');
        }

    }

}