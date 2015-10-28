<?php

/**
 * Created by IntelliJ IDEA.
 * User: Rick
 * Date: 2015/10/26
 * Time: 下午 09:40
 */
class Authority_menu extends CI_Controller
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

    public function __construct()
    {
        parent::__construct();
        $this->load->model('content/Authority_menu_model');
        $this->load->helper('form');
    }

    public function index()
    {
        $user_name=$this->input->post('user_name');
        $unit=$this->input->post('unit_select');
        $query = $this->Authority_menu_model->get_all_user($user_name,$unit);
        $data['validate_message'] = "";
        $data['all_user'] = $query;
        $hidden_item = array(
            'query_unit'  =>  $unit
        );
        $data['hidden_item'] = $hidden_item;
        $data['user_name'] = $user_name;
        $this->load->view('authority_menu/authority_menu_list', $data);
    }
    public function get_unit(){
        $this->output->set_content_type('application/json');
        $query = $this->Authority_menu_model->get_unit();
        echo json_encode($query);
    }
}