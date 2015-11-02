<?php
/**
 * Created by IntelliJ IDEA.
 * User: Acer
 * Date: 2015/11/1
 * Time: 下午 08:55
 */
class Employee_mdy_model extends CI_Model
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
        $this->load->database();
    }
    public function get_Employee_Single($user_id){
        $this->db->select('*');
        $this->db->from('Manage_Empolyee');
        $this->db->where('User_Id',$user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_Employee($user_id,$user_name,$birthday,$address,$email,$phone)
    {
        $data = array('User_Name' => $user_name,'Birthday' => $birthday,'Address'=>$address,'Email' => $email,'Phone' => $phone);
        $this->db->where('User_Id', $user_id);
        return $this->db->update('Manage_Empolyee', $data);
    }
    public function update_Employee_Password($user_id,$password)
    {
        $data = array('User_Password' => $password);
        $this->db->where('User_Id', $user_id);
        return $this->db->update('Manage_Empolyee', $data);
    }
}