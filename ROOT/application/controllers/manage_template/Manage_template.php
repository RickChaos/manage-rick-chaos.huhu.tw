<?php

/**
 * Created by PhpStorm.
 * User: frank
 */
class Manage_template extends CI_Controller
{
    public function _remap($method)
    {
        $user_sessionid = $this->session->user_id;
        $validate_result = $this->login_model->validate_session($user_sessionid);
        if ($validate_result){
            $this->$method();
        }
        else{
            $this->session->set_userdata('user_name', '');
            $this->session->set_userdata('user_id', '');
            $this->session->set_userdata('user_unit', '');
            redirect('login/fail/time_out');
        }
    }
    public function __construct()
    {
        parent::__construct();//server的實體路徑
        $this->load->model('manage_template/Manage_Template_Model');
    }

    public function index(){
        $this->load->view('manage_template/template_template');
    }
    public function left(){
        $this->load->view('manage_template/template_left');
    }
    public function top(){
        $data[user_name] = $this->session->user_name;
        $data[user_unit] = $this->session->user_unit;
        $this->load->view('manage_template/template_top',$data);
    }
    public function default_content(){
        $data['Todolist']=$this->Manage_Template_Model->get_Todo_list();
        $this->load->view('manage_template/index',$data);
    }

}