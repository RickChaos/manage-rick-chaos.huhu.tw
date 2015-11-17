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
        $this->db->select('*');
        $this->db->from('Manage_NoticeClass');
        $this->db->where('Class_Id!=','1');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_NoticeData()
    {  $this->db->select('d.Id,c.Class_Id,d.Subject,c.Subject as User,d.PostTime,d.FinishTime,d.Complete');
        $this->db->from('Manage_NoticeData as d');
        $this->db->join('Manage_NoticeClass as c', 'd.Class_Id = c.Class_Id');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function delete_NoticeData($getSelect){

        return $this->db->delete('Manage_NoticeData', array('Id' => $getSelect));
    }
    public function delete_NoticeClass($getSelect){

        return $this->db->delete('Manage_NoticeClass', array('Class_Id' => $getSelect));
    }
    public function insert_NoticeData($subject)
    {   $datetime = date ("Y-m-d H:i:s");
        $sqlData = array('Id'=>NULL, 'Class_Id'=> 1, 'Subject' => $subject, 'PostTime' => $datetime,'Complete' => 'N');
        $sql=$this->db->insert_string('Manage_NoticeData',$sqlData);

        return $this->db->simple_query($sql);
    }
    public function insert_NoticeClass($subject)
    {
        $sqlData = array('Subject' => $subject);
        $sql=$this->db->insert_string('Manage_NoticeClass',$sqlData);
        return $this->db->simple_query($sql);
    }
    public function update_NoticeData($id,$class_Id,$subject,$complete)
    {   $datetime = date ("Y-m-d H:i:s");
        $data = array('Class_Id'=>$class_Id,'Subject' => $subject,'Complete' => $complete ,'FinishTime'=> $complete=='Y'?$datetime:NULL);
        $this->db->where('Id', $id);
        return $this->db->update('Manage_NoticeData', $data);

    }
    public function update_NoticeClass($class_Id,$subject)
    {
        $data = array('Subject' => $subject);
        $this->db->where('Class_Id', $class_Id);
        return $this->db->update('Manage_NoticeClass', $data);
    }

    public function search_Notice($keyword,$ncSelect,$completeSelect){
        $this->db->select('d.Id,c.Class_Id,d.Subject,c.Subject as User,d.PostTime,d.FinishTime,d.Complete');
        $this->db->from('Manage_NoticeData as d');
        $this->db->join('Manage_NoticeClass as c', 'd.Class_Id = c.Class_Id');
        $this->db->like('d.Subject',$keyword);
        if($completeSelect!='0')
            $this->db->where('d.Complete',$completeSelect);
        if($ncSelect!='0')
            $this->db->where('d.Class_Id',$ncSelect);
        $query = $this->db->get();
        return $query->result_array();


    }

    public function search_NoticeClass($keyword,$ncSelect){
        $this->db->select('*');
        $this->db->from('Manage_NoticeClass');
        if($keyword!='')
            $this->db->like('Subject',$keyword);
        if($ncSelect!='0')
            $this->db->where('Class_Id',$ncSelect);
        $query = $this->db->get();
        return $query->result_array();


    }
}