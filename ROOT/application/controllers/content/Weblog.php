<?php

/**
 * Created by PhpStorm.
 * User: frank
 */
class Weblog extends CI_Controller
{
    public function _remap($method)
    {
        $user_sessionid = $this->session->user_sessionid;
        $validate_result = $this->login_model->validate_session($user_sessionid);
        if ($validate_result){
            $this->$method();
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
        parent::__construct();//server的實體路徑
        $this->load->helper('form');
        $this->load->helper('array');
        $this->load->helper('security');
        $this->load->model('content/Weblog_Model');
    }
    public function index()
    {
        $this->load->library('pagination');

        //接收第幾頁
        $page = $this->input->get('page',TRUE);
        if(!$page){
            $page = '1';
        }

        //先取得總共有多少資料
        $config['total_rows'] = $this->Weblog_Model->get_All_Log_Count();
        //該頁的網址
        $config['base_url'] = base_url().'content/notice';
        //幾筆為一頁
        $config['per_page'] =15;
        $start = $config['per_page'] * ($page-1);
        //開始撈資料
        $data['WeblogData']=$this->Weblog_Model->get_All_Log();
        $data['total_rows']=$config['total_rows'];

        $this->pagination->initialize($config);
        $this->load->view('weblog/weblog',$data);
    }


}