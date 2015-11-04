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
    public function get_all_user_count($name,$unit){
        $this->db->select('*');
        $this->db->from('Manage_Employee');
        if($name != null){
            $this->db->like('User_Name', $name);
        }
        if($unit != null){
            $this->db->where('Unit', $unit);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function get_all_user($name,$unit,$num, $offset){
        $this->db->select('*');
        $this->db->from('Manage_Employee');
        if($name != null){
            $this->db->like('User_Name', $name);
        }
        if($unit != null){
            $this->db->where('Unit', $unit);
        }
        $this->db->limit($num, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_unit(){
        $sql = "select DISTINCT unit from Manage_Employee ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_menu($node_level, $parent)
    {
        $sql = "select * from Manage_Ap_Tree where Node_Level = ? and Parent = ? order by Sequence";
        $query = $this->db->query($sql, array($node_level, $parent));
        return $query->result_array();
    }
    public function has_node($node_id)
    {
        $sql = "select * from Manage_Ap_Tree where Parent = ?";
        $query = $this->db->query($sql, array($node_id));
        return $query->num_rows() > 0;
    }
    public function del_all_data($user_id){
        $this->db->where('User_Id', $user_id);
        $this->db->delete('Manage_Authority_Menu');
    }
    public function save_data($user_id,$agree_id,$authority_name){
        $this->db->set('User_Id', $user_id);
        $this->db->set('Menu_Id', $agree_id);
        $this->db->set('Authority_Name', $authority_name);
        $this->db->insert('Manage_Authority_Menu');
    }
    public function get_agree_menu_id($user_id){
        $this->db->select('*');
        $this->db->from('Manage_Authority_Menu');
        if($user_id != null){
            $this->db->where('User_Id', $user_id);
        }
        $query = $this->db->get();
        return $query->result();
    }
}