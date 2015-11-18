<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ketaifeng
 * Date: 2015/10/30
 * Time: 下午 03:09
 */
class Member_menu_model extends CI_Model
{
    public function _remap($method)
    {
        $user_sessionid = $this->session->user_sessionid;
        $validate_result = $this->login_model->validate_session($user_sessionid);
        if ($validate_result){
            $this->$method();
        }
        else{
            $data["fail_type"]="time_out";
            $this->session->set_userdata('user_name', '');
            $this->session->set_userdata('user_id', '');
            $this->session->set_userdata('user_title', '');
            $this->load->view('login/login_fail',$data);
        }
    }

    public function __construct(){
        $this->load->database();
    }

    public function get_all_user($user_id,$type){
        $this->db->select('*');
        $this->db->from('Manage_Employee');
        if($type == 0){
            if($user_id != null){
                $this->db->where('User_Id',$user_id[0]);
            }
        }else if($type == 1){
            if($user_id != "全部"){
                $this->db->where('User_Name', $user_id);
            }
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_Employee_Password($user_id,$password)
    {
        $data = array('User_Password' => $password);
        $this->db->where('User_Id', $user_id);
        return $this->db->update('Manage_Employee', $data);
    }

    public function update_member($User_Id,$User_Name,$Birthday,$Address,$Email,$Phone,$Unit,$Tel){
        $data = array('User_Name' => $User_Name,'Birthday' => $Birthday,'Address'=>$Address,'Email' => $Email,'Phone' => $Phone,'Unit' => $Unit,'Tel' => $Tel);
        $this->db->where('User_Id', $User_Id);
        return $this->db->update('Manage_Employee', $data);
    }
    //搜尋功能
    public function search_member($keyword){
        $this->db->select('*');
        $this->db->from('Manage_Employee');
        if($keyword!='')
            $this->db->where('User_Id',$keyword);
        $query = $this->db->get();
        return $query->result_array();
    }
    //刪除功能
    public function del_member($deleteSelect){
        return  $this->db->delete('Manage_Employee', array('User_Id' => $deleteSelect));
    }
    //新增功能
    public function member_add($User_Id,$User_Password,$User_Name,$Birthday,$User_Title,$Unit,$Tel,$Phone,$Email,$Address){
          $data = array(
              'User_Id' => $User_Id,
              'User_Password' => $User_Password,
              'User_Name' => $User_Name,
              'User_Title' => $User_Title,
              'Tel' => $Tel,
              'Address' => $Address,
              'Email' => $Email,
              'Phone' => $Phone,
              'Birthday' => $Birthday,
              'Unit' => $Unit,
              'LoginTime' => '',
              'LoginIp' => '',
              'Modify_Pw_Date' => '',
              'SessionId' => ''
          );
        $sql = $this->db->insert('Manage_Employee', $data);

        return $this->db->simple_query($sql);
    }
    //比對重複帳號
    public function same_member_add($User_Id){
        $this->db->select('User_Id');
        $this->db->from('Manage_Employee');
        $this->db->where('User_Id',$User_Id);
        $query = $this->db->get();
        return $query->num_rows();
    }
}