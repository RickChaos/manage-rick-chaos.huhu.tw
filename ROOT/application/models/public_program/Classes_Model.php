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

    public function query_max_id($table_name,$today){
        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->like('id', $today);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->first_row();
    }

    public function add_class($table_name,$data_id,$class_name,$create_name){
        $data = array('Id' => $data_id,'Subject'=>$class_name,'CreateName'=>$create_name);
        return $this->db->insert($table_name, $data);
    }
}