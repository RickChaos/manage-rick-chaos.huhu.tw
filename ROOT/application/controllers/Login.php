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
        $this->load->helper('form');
    }

    public function index()
    {
        $data['validate_message'] = "";
        $this->load->view('login/login_page', $data);
    }

    public function validate_fail($type)
    {
        $data['validate_message'] = "";
        if ($type == "time_out") {
            $data['validate_message'] = "閒置時間過久，請重新登入！";
        }
        if ($type == "login_fail") {
            $data['validate_message'] = "帳號密碼錯誤，請重新登入！";
        }
        if ($type == "login_out") {
            $data['validate_message'] = "登出完成！";
        }
        $this->load->view('login/login_page', $data);
    }

    public function check_user()
    {
        $userid = $this->input->post('user');
        $password = $this->input->post('password');
        $query_user_password = $this->login_model->get_user_password($userid);

        if (password_verify($password, $query_user_password->User_Password)) {
            $user_info = $this->login_model->get_user_info($userid);
            $session_id = password_hash($user_info->User_Id, PASSWORD_DEFAULT);

            $this->session->set_userdata('user_name', $user_info->User_Name);
            $this->session->set_userdata('user_id', $user_info->User_Id);
            $this->session->set_userdata('user_title', $user_info->User_Title);
            $this->session->set_userdata('user_sessionid', $session_id);

            $this->login_model->modify_login_info($userid, $session_id, $this->input->ip_address());
            redirect('manage_template/index');
        } else {
            $this->validate_fail("login_fail");
        }

    }

    public function logout()
    {
        $this->session->set_userdata('user_name', '');
        $this->session->set_userdata('user_id', '');
        $this->session->set_userdata('user_unit', '');
        redirect('login/fail/login_out');
    }

}