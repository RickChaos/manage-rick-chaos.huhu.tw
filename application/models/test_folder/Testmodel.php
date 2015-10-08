<?php

/**
 * Created by PhpStorm.
 * User: 禎毅
 * Date: 2015/10/5
 * Time: 下午 08:58
 */
class Testmodel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function get_all()
    {
            $query = $this->db->get('testTable');
            return $query->result_array();
    }
}