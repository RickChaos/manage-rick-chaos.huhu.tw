<?php

/**
 * Created by PhpStorm.
 * User: 博超
 * Date: 2015/10/5
 * Time: 下午 08:58
 */
class Manage_template_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function get_NoticeData()
    {
        $query = $this->db->get('Manage_NoticeData');
        return $query->result_array();
    }
}