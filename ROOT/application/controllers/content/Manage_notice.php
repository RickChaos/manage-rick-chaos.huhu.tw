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
                if($rtndel!='1')  break;
            }
            $data['rtndel']=$rtndel!='1'?'刪除失敗!':'刪除成功!';
        }
        $data['NoticeData']=$this->Manage_Notice_Model->get_NoticeData();
        $this->load->view('manage_template/notice',$data);
    }
    public function notice_add(){
        if($this->input->post('title')){
            $data['rtnadd']=$this->Manage_Notice_Model->insert_NoticeData($this->input->post('title',TRUE))!='1'?'寫入失敗!':'寫入成功!';
            $this->load->view('manage_template/notice_add',$data);
        }else {
            $this->load->view('manage_template/notice_add');
        }
    }
    public function notice_mdy(){
        $MdyId = $this->input->post('MdyId', true);
        $data['NoticeClass'] = $this->Manage_Notice_Model->get_NoticeClass();
        $data['MdyId']=$MdyId;
        $data['MdyClassId']= $this->input->post('MdyClassId', true);
        $data['MdySubject'] = $this->input->post('MdySubject', true);
        $data['MdyComplete'] = $this->input->post('MdyComplete', true);
        if($this->input->post('Subject')) {
            $Class_Id=$this->input->post('Class_Id', true);
            $Subject=$this->input->post('Subject', true);
            $Complete=$this->input->post('Complete', true);
            $data['MdyClassId'] =$Class_Id;
            $data['MdySubject'] = $Subject;
            $data['MdyComplete'] =$Complete;
            $data['rtnmdy']=$this->Manage_Notice_Model->update_NoticeData($MdyId,$Class_Id,$Subject,$Complete)!='1'?'更新失敗!':'更新成功';
        }
        $this->load->view('manage_template/notice_mdy', $data);

    }



    public function notice_class(){
        //刪除功能
        if($this->input->post('classSelect')){
            $deleteSelect=$this->input->post('classSelect',true);
            for($i = 0 ; $i<count($deleteSelect) ;$i++) {
                $data['rtndel'] = $this->Manage_Notice_Model->delete_NoticeClass($deleteSelect[$i]);
                if($data['rtndel']!='1') break;
            }
            $data['rtndel']=$data['rtndel']!='1'?'刪除失敗!':'刪除成功';
        }
        $data['NoticeClass']=$this->Manage_Notice_Model->get_NoticeClass();
        $this->load->view('manage_template/notice_class',$data);
    }
    public function notice_class_add(){
        if($this->input->post('Subject')){
            $data['rtnadd']=$this->Manage_Notice_Model->insert_NoticeClass($this->input->post('Subject',TRUE))!='1'?'寫入失敗!':'寫入成功!';
            $this->load->view('manage_template/notice_class_add',$data);
        }else {
            $this->load->view('manage_template/notice_class_add');
        }
    }
    public function notice_class_mdy(){
        $data['MdyClassId']=$this->input->post('MdyClassId',true);
        $data['MdySubject']=$this->input->post('MdySubject',true);
        if($this->input->post('Class_Id')){
            $Class_Id=$this->input->post('Class_Id',true);
            $Subject=$this->input->post('Subject',true);
            $data['MdyClassId']= $Class_Id;
            $data['MdySubject']= $Subject;
            $data['rtnmdy'] = $this->Manage_Notice_Model->update_NoticeClass($Class_Id,$Subject);
        }
        $this->load->view('manage_template/notice_class_mdy', $data);

    }

}