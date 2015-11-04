<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ketaifeng
 * Date: 2015/10/30
 * Time: 下午 03:09
 */
class Member_menu_model extends CI_Model
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

    public function __construct(){
        $this->load->database();
    }

    public function get_all_user($user_id,$type){
        $this->db->select('*');
        $this->db->from('Manage_Employee');
        if($type == 0){
            if($user_id != null){
                $this->db->where('User_Id',$user_id[0]);
            }
        }else if($type == 1){
            if($user_id != "全部"){
                $this->db->where('User_Name', $user_id);
            }
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_Employee_Password($user_id,$password)
    {
        $data = array('User_Password' => $password);
        $this->db->where('User_Id', $user_id);
        return $this->db->update('Manage_Employee', $data);
    }

    public function update_member($User_Id,$User_Name,$Birthday,$Address,$Email,$Phone,$Unit,$Tel){
        $data = array('User_Name' => $User_Name,'Birthday' => $Birthday,'Address'=>$Address,'Email' => $Email,'Phone' => $Phone,'Unit' => $Unit,'Tel' => $Tel);
        $this->db->where('User_Id', $User_Id);
        return $this->db->update('Manage_Employee', $data);
    }
}