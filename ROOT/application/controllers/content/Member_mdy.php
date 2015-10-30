<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ketaifeng
 * Date: 2015/10/29
 * Time: �U�� 04:52
 */
class Member_mdy extends CI_Controller
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

    public function __construct(){
        parent::__construct();//server實體路徑
    }

    public function member_class(){
        $this->load->view('member/member_mdy');
    }
}