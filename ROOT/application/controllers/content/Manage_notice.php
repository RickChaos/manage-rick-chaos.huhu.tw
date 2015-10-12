<?php

/**
 * Created by PhpStorm.
 * User: frank
 */
class Manage_Notice extends CI_Controller
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
        $this->load->model('content/Manage_Notice_Model');
    }
    public function notice(){
        //刪除功能
        if($this->input->post('noticeSelect')){
            $deleteSelect=$this->input->post('noticeSelect',true);
            for($i = 0 ; $i<count($deleteSelect) ;$i++) {
                $rtndel = $this->Manage_Notice_Model->delete_NoticeData($deleteSelect[$i]);
                if($rtndel=='刪除失敗')break;
            }
            $data['rtndel']=$rtndel;
        }
        $data['NoticeData']=$this->Manage_Notice_Model->get_NoticeData();
        $this->load->view('manage_template/notice',$data);
    }
    public function notice_add(){
        if($this->input->post('title')){
            $data['check']=$this->Manage_Notice_Model->insert_NoticeData($this->input->post('title',TRUE));
            $this->load->view('manage_template/notice_add',$data);
        }else {
            $this->load->view('manage_template/notice_add');
        }
    }

}