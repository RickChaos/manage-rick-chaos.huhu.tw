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

    public function get_NoticeData()
    {
        $query = $this->db->get('Manage_NoticeData');
        return $query->result_array();
    }

    public function get_menu($node_level, $parent)
    {
        $sql = "select * from Manage_Ap_Tree where Node_Level = ? and Parent = ?";
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