<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ketaifeng
 * Date: 2015/10/29
 * Time: �U�� 04:52
 */
class Member_mdy extends CI_Controller
{
    public function _remap($method,$params)
    {
        $user_sessionid = $this->session->user_sessionid;
        $validate_result = $this->login_model->validate_session($user_sessionid);
        if ($validate_result){
            $this->$method($params);
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
        parent::__construct();//server實體路徑
        $this->load->model('content/Member_menu_model');
        $this->load->helper('form');
        $this->load->helper('security');
    }

    public function member_class(){
        $user_name = $this->session->user_name;
        $query = $this->Member_menu_model->get_all_user(null,0);
        //$data['user_name'] = xss_clean($user_name);
        $data['all_user'] = $query;
        $this->load->view('member/member_mdy',$data);
    }

    public function member_search(){
        //搜尋功能
        if($this->input->post('search',true)){
            $data['Keyword'] = $this->input->post('keyword',true);
            $query = $this->Member_menu_model->search_member($data['Keyword']);
            $data['all_user'] = $query;
        }
        //刪除功能
        if($this->input->post('delete',true)) {
            $deleteSelect=$this->input->post('userSelect',true);
            for($i = 0; $i<count($deleteSelect) ;$i++){
                $data['response'] = $this->Member_menu_model->del_member($deleteSelect[$i]);
                if($data['response']!='1') break;
            }
            $data['response'] = $data['response']!='1'?'刪除失敗':'刪除成功';
            $query = $this->Member_menu_model->get_all_user(null,0);
            $data['all_user'] = $query;
        }
        /*
        $user_name = $this->input->post('User_Name_Select');
        $query = $this->Member_menu_model->get_all_user($user_name,1);
        $data['all_user'] = $query; */
        $this->load->view('member/member_mdy',$data);
    }

    public function member_password_mdy($user_id){
        $data['user_id'] = xss_clean($user_id);
        $this->load->view('member/member_password_mdy',$data);
    }

    public function member_password_save(){
        //$password = $this->input->post('password');
        $user_info = $this->login_model->get_user_info($this->input->post('user_id',true));
        $data['user_id'] = xss_clean($this->input->post('user_id',true));
        if($this->input->post('send',true)){
            $data['response'] = $this->Member_menu_model->update_Employee_Password($data['user_id'], password_hash($this->input->post('mdy_password'), PASSWORD_DEFAULT));
            if ($data['response'] == '1')
                $data['response'] = "修改成功";
            else
                $data['response'] = "修改失敗";
        }
        $this->load->view('member/member_password_mdy',$data);
    }

    public function member_all_mdy($user_id){
        $user_name = $this->session->user_name;
        $data['all_user'] = $this->Member_menu_model->get_all_user($user_id,0);
        $data['user_name'] = xss_clean($user_name);
        $data['user_id'] = xss_clean($user_id);
        $this->load->view('member/member_all_mdy',$data);
    }

    public function member_all_save(){
        if($this->input->post('save',true)){
            $User_Id=$this->input->post('user_id',true);
            $User_Name=$this->input->post('user_name',true);
            $Birthday=$this->input->post('birthday',true);
            $Address=$this->input->post('address',true);
            $Email=$this->input->post('email',true);
            $Phone=$this->input->post('phone',true);
            $Unit = $this->input->post('unit',true);
            $Tel = $this->input->post('tel',true);
            $data['response']=$this->Member_menu_model->update_member($User_Id,$User_Name,$Birthday,$Address,$Email,$Phone,$Unit,$Tel);
            $data['response']=$data['response']=='1'?"修改成功":"修改失敗";
            $data['user_id'] = xss_clean($User_Id);
            $query = $this->Member_menu_model->get_all_user(null,0);
            $data['user_name'] = xss_clean($User_Name);
            $data['all_user'] = $query;
            $this->load->view('member/member_mdy',$data);
        }
    }

    public function member_add(){
        $this->load->view('member/member_add');
    }

    public function member_add_save(){
        if($this->input->post('save',true)){
            $User_Id=$this->input->post('user_id',true);
            $User_Password=$this->input->post('user_password',true);
            $User_Name=$this->input->post('user_name',true);
            $Birthday=$this->input->post('birthday',true);
            $User_Title=$this->input->post('user_title',true);
            $Unit = $this->input->post('unit',true);
            $Tel = $this->input->post('tel',true);
            $Phone=$this->input->post('phone',true);
            $Email=$this->input->post('email',true);
            $Address=$this->input->post('address',true);
            //password_hash($User_Password, PASSWORD_DEFAULT)
            $data['samemember'] = $this->Member_menu_model->same_member_add($User_Id);
            if ($data['samemember'] == 0) {
                $data['response'] = $this->Member_menu_model->member_add($User_Id, password_hash($User_Password, PASSWORD_DEFAULT), $User_Name, $Birthday, $User_Title, $Unit, $Tel, $Phone, $Email, $Address);
                $query = $this->Member_menu_model->get_all_user(null, 0);
                $data['all_user'] = $query;
                $this->load->view('member/member_mdy', $data);
            } else {
                $data['response'] = "帳號重複";
                $this->load->view('member/member_add', $data);
            }
        }
    }
}