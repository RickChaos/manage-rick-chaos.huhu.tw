<?php

/**
 * Created by IntelliJ IDEA.
 * User: Rick
 * Date: 2015/10/15
 * Time: 下午 10:16
 */
class Maintain_menu_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function get_node_info($id){
        $sql = "select * from Manage_Ap_Tree where Id = ? ";
        $query = $this->db->query($sql, array($id));
        return $query->row();
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
    public function update_folder_node($id,$name,$sequence){
        $data = array('Name' => $name,'Sequence'=>$sequence);
        $this->db->where('Id', $id);
        return $this->db->update('Manage_Ap_Tree', $data);
    }
    public function update_function_node($id,$name,$url,$sequence){
        $data = array('Name' => $name,'Sequence'=>$sequence,'Promgram_Url'=>$url);
        $this->db->where('Id', $id);
        return $this->db->update('Manage_Ap_Tree', $data);
    }
    public function add_folder_node($parent_id,$name,$sequence,$level,$createname){
        $data = array('Parent' => $parent_id,'Node_Level'=>$level,'Type'=>'folder','Name'=>$name,'CreateName'=>$createname,'Sequence'=>$sequence);
        return $this->db->insert('Manage_Ap_Tree', $data);
    }
    public function add_function_node($parent_id,$name,$url,$sequence,$level,$createname){
        $data = array('Parent' => $parent_id,'Node_Level'=>$level,'Promgram_Url'=>$url,'Type'=>'function','Name'=>$name,'CreateName'=>$createname,'Sequence'=>$sequence);
        return $this->db->insert('Manage_Ap_Tree', $data);
    }

    public function del_node($id){
        return $this->db->delete('Manage_Ap_Tree', array('Id' => $id));
    }

}