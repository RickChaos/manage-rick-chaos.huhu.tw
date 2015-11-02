<?php

/**
 * Created by PhpStorm.
 * User: frank
 */
class Employee_Mdy extends CI_Controller
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
        $this->load->model('content/Employee_Mdy_Model');
        $this->load->model('login/Login_Model');
    }
    public function index(){
        if($this->input->post('save')){
           $User_Name=$this->input->post('user_name',true);
           $Birthday=$this->input->post('birthday',true);
           $Address=$this->input->post('address',true);
           $Email=$this->input->post('email',true);
           $Phone=$this->input->post('phone',true);
           $data['rtnmdy']=$this->Employee_Mdy_Model->update_Employee($this->session->user_id,$User_Name,$Birthday,$Address,$Email,$Phone);
           $data['rtnmdy']=$data['rtnmdy']=='1'?'修改成功!':'修改失敗!';
        }
        $data['User_Data']=$this->Employee_Mdy_Model->get_Employee_Single($this->session->user_id);
        $this->load->view('employee/employee_mdy',$data);
    }

    public function mdy_password(){
        $password = $this->input->post('password');
        $user_info = $this->login_model->get_user_info($this->session->user_id);
        $data['User_Id']=$this->session->user_id;
        if($this->input->post('send')) {
            if (password_verify($password, $user_info->User_Password)) {
                $data['rtnmdy'] = $this->Employee_Mdy_Model->update_Employee_Password($data['User_Id'], password_hash($this->input->post('mdy_password'), PASSWORD_DEFAULT));
                if ($data['rtnmdy'] == '1')
                    $data['rtnmdy'] = "修改成功!請重新登入!";
                else
                    $data['rtnmdy'] = "修改失敗";
            } else {
                $data['rtnmdy'] = "密碼錯誤!";
            }
        }
        $this->load->view('employee/employee_mdy_password',$data);
    }

}