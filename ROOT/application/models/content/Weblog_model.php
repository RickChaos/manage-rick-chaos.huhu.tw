<?php
/**
 * Created by IntelliJ IDEA.
 * User: Acer
 * Date: 2015/11/20
 * Time: 上午 10:17
 */

class Weblog_Model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }
    public function get_All_Log(){
        $this->db->select('*');
        $this->db->from('WebLog');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_All_Log_Count(){
        $this->db->select('*');
        $this->db->from('WebLog');
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function weblog($user_name,$node_name,$action,$subject,$subject_mdy){
        if($action=="0")
            $action="新增";
        else if($action=="1")
            $action="刪除";
        else if($action=="2")
            $action="修改";

        $datetime = date ("Y-m-d H:i:s");
        $sql = array('Id'=>NULL,
            'User_Name'=> $user_name,
            'Node_Name' => $node_name,
            'Mdy_Time' => $datetime,
            'Action' => $action,
            'Subject' => $subject,
            'Subject_Mdy' => $subject_mdy
            );

        $this->db->insert('WebLog', $sql);
    }

}