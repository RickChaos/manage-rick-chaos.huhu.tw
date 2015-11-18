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
        $this->load->helper('security');
        $this->load->model('content/Manage_Notice_Model');
    }
    public function notice(){
        $this->load->library('pagination');
        $data['Keyword'] = $this->input->post('keyword',TRUE);
        $data['Class_Id_Select'] = $this->input->post('classId_Select',TRUE);
        $data['Complete_Select']=$this->input->post('complete_Select',TRUE);


        //接收第幾頁
        $page = $this->input->get('page',TRUE);
        if(!$page){
            $page = '1';
        }

        //先取得總共有多少資料
        $config['total_rows'] = $this->Manage_Notice_Model->get_NoticeData_Count( $data['Class_Id_Select'],$data['Complete_Select'],$data['Keyword']);
        //該頁的網址
        $config['base_url'] = base_url().'content/notice';
        //幾筆為一頁
        $config['per_page'] =15;
        $start = $config['per_page'] * ($page-1);
        //開始撈資料
        $data['NoticeData']=$this->Manage_Notice_Model->get_NoticeData( $data['Class_Id_Select'],$data['Complete_Select'],$data['Keyword'],$config['per_page'],$start);
        $data['total_rows']=$config['total_rows'];


        //刪除功能
        if($this->input->post('delete')){
            $deleteSelect=$this->input->post('noticeSelect',true);
            for($i = 0 ; $i<count($deleteSelect) ;$i++) {
                $rtndel = $this->Manage_Notice_Model->delete_NoticeData($deleteSelect[$i]);
                if($rtndel!='1')  break;
            }
            $data['rtndel']=$rtndel!='1'?'刪除失敗!':'刪除成功!';
        }

        $data['NoticeClass']=$this->Manage_Notice_Model->get_NoticeClass();
        $this->pagination->initialize($config);
        $this->load->view('notice/notice',$data);
    }
    public function notice_add(){
        if($this->input->post('title')){
            $data['rtnadd']=$this->Manage_Notice_Model->insert_NoticeData($this->input->post('title',TRUE))!='1'?'寫入失敗!':'寫入成功!';
            $this->load->view('notice/notice_add',$data);
        }else {
            $this->load->view('notice/notice_add');
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
        $this->load->view('notice/notice_mdy', $data);

    }



    public function notice_class(){
        $data['NoticeClass']=$this->Manage_Notice_Model->get_NoticeClass();
        //刪除功能
        if($this->input->post('delete')){
            $deleteSelect=$this->input->post('classSelect',true);
            for($i = 0 ; $i<count($deleteSelect) ;$i++) {
                $data['rtndel'] = $this->Manage_Notice_Model->delete_NoticeClass($deleteSelect[$i]);
                if($data['rtndel']!='1') break;
            }
            $data['rtndel']=$data['rtndel']!='1'?'刪除失敗!':'刪除成功';
        }
        //搜尋功能
        if($this->input->post('search')){
            $data['Keyword'] = $this->input->post('keyword');
            $data['NoticeClass']=$this->Manage_Notice_Model->search_NoticeClass($data['Keyword'] );
        }

        $data['NoticeClassList']= $this->Manage_Notice_Model->get_NoticeClass();
        $this->load->view('notice/notice_class',$data);
    }
    public function notice_class_add(){
        if($this->input->post('Subject')){
            $data['rtnadd']=$this->Manage_Notice_Model->insert_NoticeClass($this->input->post('Subject',TRUE))!='1'?'寫入失敗!':'寫入成功!';
            $this->load->view('notice/notice_class_add',$data);
        }else {
            $this->load->view('notice/notice_class_add');
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
        $this->load->view('notice/notice_class_mdy', $data);

    }

}