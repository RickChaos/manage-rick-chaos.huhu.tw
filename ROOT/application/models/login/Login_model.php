<?php

/**
 * Created by PhpStorm.
 * User: 禎毅
 * Date: 2015/10/5
 * Time: 下午 08:58
 */
class Login_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->helper('date');
    }
    public function get_user_password($userid)
    {
		$sql = "select * from Manage_Empolyee where User_Id = ? ";
		$query = $this->db->query($sql, array($userid));
		
		return $query->row();
    }
    public function get_user_info($userid){
        $sql = "select * from Manage_Empolyee where User_Id = ?";
        $query = $this->db->query($sql, array($userid));
        return $query ->row();
    }
    public function modify_login_info($userid,$user_sessionId,$user_ip){
        $datestring = '%Y-%m-%d %h:%i:%a';
        $time = time();
        $data = array('SessionId' => $user_sessionId,'LoginTime'=>mdate($datestring, $time),'LoginIp' => $user_ip);
        $this->db->where('User_Id', $userid);
        $this->db->update('Manage_Empolyee', $data);
    }
    public function validate_session($sessionid){
        $sql = "select * from Manage_Empolyee where SessionId = ?";
        $query = $this->db->query($sql, array($sessionid));

        return $query->num_rows() > 0;
    }
}