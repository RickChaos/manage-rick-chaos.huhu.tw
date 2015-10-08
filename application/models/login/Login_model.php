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
    }
    public function check_user($userid,$password)
    {
		$sql = "select * from Manage_Empolyee where User_Id = ? and User_Password = ?";
		$query = $this->db->query($sql, array($userid, $password));
		
		return $query->num_rows() > 0;
    }
}