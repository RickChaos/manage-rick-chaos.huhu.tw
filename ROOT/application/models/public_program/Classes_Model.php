<?php

/**
 * Created by IntelliJ IDEA.
 * User: Rick
 * Date: 2015/11/18
 * Time: 下午 09:56
 */
class Classes_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_classes_count($table_name, $keyword)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        if ($keyword != null) {
            $this->db->like('Subject', $keyword);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_classes($table_name, $keyword, $num, $offset){
        $this->db->select('*');
        $this->db->from($table_name);
        if ($keyword != null) {
            $this->db->like('Subject', $keyword);
        }
        $this->db->limit($num, $offset);
        $query = $this->db->get();
        return $query->result();
    }
}