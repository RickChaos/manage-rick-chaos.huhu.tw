<?php

/**
 * Created by PhpStorm.
 * User: 博超
 * Date: 2015/10/5
 * Time: 下午 08:58
 */
class Manage_template_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_todo_list()
    {   $sql = "select * from Manage_NoticeData where Class_Id = ? ";
        $query = $this->db->query($sql, array('1'));
        return $query->result_array();
    }

    public function get_completion()
    {   $sql = "select * from Manage_NoticeData where Complete = ? ";
        $query = $this->db->query($sql, array('Y'));
        return $query->result_array();
    }

    public function get_personalData()
    {
        $this->db->select('mc.Subject as Name,md.Subject,md.PostTime,md.*');
        $this->db->from('Manage_NoticeData as md');
        $this->db->join('Manage_NoticeClass as mc','md.Class_Id=mc.Class_Id');
        $this->db->where('mc.Subject !=', '-');
        $this->db->where('md.Complete', 'N');
        $this->db->order_by('Class_Id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_personal(){
        $this->db->select('*,mc.Subject as Name');
        $this->db->from('Manage_NoticeData as md');
        $this->db->join('Manage_NoticeClass as mc','md.Class_Id=mc.Class_Id');
        $this->db->where('mc.Subject !=', '-');
        $this->db->where('md.Complete', 'N');
        $this->db->order_by('mc.Class_Id', 'DESC');
        $this->db->group_by("mc.Class_Id");
        $query = $this->db->get();
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
}