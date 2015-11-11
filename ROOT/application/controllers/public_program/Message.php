<?php

/**
 * Created by IntelliJ IDEA.
 * User: Rick
 * Date: 2015/11/10
 * Time: 下午 11:13
 */
class Message extends CI_Controller
{
    public function _remap($method,$params)
    {
        $user_sessionid = $this->session->user_sessionid;
        $validate_result = $this->login_model->validate_session($user_sessionid);
        if ($validate_result){
            $this->$method($params);
        }
        else{
            $data["fail_type"]="time_out";
            $this->session->set_userdata('user_name', '');
            $this->session->set_userdata('user_id', '');
            $this->session->set_userdata('user_title', '');
            $this->load->view('login/login_fail',$data);
        }
    }
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {


        $this->load->view('public_program/ckeditor');
    }
}