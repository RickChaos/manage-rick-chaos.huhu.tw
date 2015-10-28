<?php

/**
 * Created by IntelliJ IDEA.
 * User: Rick
 * Date: 2015/10/28
 * Time: 下午 09:41
 */
class Authority_menu_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_all_user($name,$unit){
        $this->db->select('*');
        $this->db->from('Manage_Empolyee');
        if($name != null){
            $this->db->like('User_Name', $name);
        }
        if($unit != null){
            $this->db->where('Unit', $unit);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_unit(){
        $sql = "select DISTINCT unit from Manage_Empolyee ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}