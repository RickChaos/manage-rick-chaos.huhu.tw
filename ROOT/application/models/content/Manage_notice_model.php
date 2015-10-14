<?php

/**
 * Created by PhpStorm.
 * User: 博超
 * Date: 2015/10/5
 * Time: 下午 08:58
 */
class Manage_notice_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function get_NoticeClass()
    {
        $query = $this->db->get('Manage_NoticeClass');
        return $query->result_array();
    }
    public function get_NoticeData()
    {
        $query = $this->db->get('Manage_NoticeData');
        return $query->result_array();
    }
    public function delete_NoticeData($getSelect){

        return $this->db->delete('Manage_NoticeData', array('Id' => $getSelect));
    }
    public function insert_NoticeData($subject)
    {   $datetime = date ("Y-m-d H:i:s");
        $sqlData = array('Id' => NULL, 'Subject' => $subject, 'PostTime' => $datetime,'Complete' => 'N');
        $sql=$this->db->insert_string('Manage_NoticeData',$sqlData);

        return $this->db->simple_query($sql);



    }
}