<?php
/**
 * Created by IntelliJ IDEA.
 * User: Acer
 * Date: 2015/11/1
 * Time: 下午 08:55
 */
class Employee_mdy_model extends CI_Model
{
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
}