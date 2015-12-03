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
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->model('public_program/Message_model');
    }

    public function index()
    {
        $this->load->library('pagination');

        $data_table = $this->input->get("data_table");
        //$class_table = $this->input->get("class_table");
        $page = $this->input->get('page',TRUE);
        if(!$page){
            $page = '1';
        }
        //先取得總共有多少資料
        $config['total_rows'] = $this->Message_model->get_classes_count($data_table,$keyword);
        //該頁的網址
        $config['base_url'] = base_url().'message/index';
        //幾筆為一頁
        $config['per_page'] = 15;
        $start = $config['per_page'] * ($page-1);
        //開始撈資料
        $query = $this->Message_model->get_classes($table_name,$keyword,$config['per_page'],$start);

        $data['classes'] = $query;
        $data['table_name'] = xss_clean($table_name);

        $data['subject'] = xss_clean($keyword);
        $this->pagination->initialize($config);
        $this->load->view('public_program/message/message', $data);

       // $this->load->view('public_program/ckeditor');
    }
}