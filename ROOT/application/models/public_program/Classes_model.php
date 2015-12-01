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
        $this->db->like('id', $today, 'after');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->row();
    }

    public function add_class($table_name,$data_id,$class_name,$create_name){
        $data = array('Id' => $data_id,'Subject'=>$class_name,'CreateName'=>$create_name);
        return $this->db->insert($table_name, $data);
    }

    public function get_class($tablename,$id){
        $this->db->select('*');
        $this->db->from($tablename);
        $this->db->where('Id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function mdy_class($table_name,$data_id,$class_name,$update_name){
        $this->db->set('Subject',$class_name);
        $this->db->set('UpdateName',$update_name);
        $this->db->set('UpdateDate',date("Y-m-d H:i:s"));
        $this->db->where('Id', $data_id);
        return $this->db->update($table_name);
    }
    public function delete_class($table_name,$data_id){
        $this->db->where('Id', $data_id);
        return $this->db->delete($table_name);
    }
}