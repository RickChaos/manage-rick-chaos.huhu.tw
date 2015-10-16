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

}