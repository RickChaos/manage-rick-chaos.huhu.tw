<?php

/**
 * Created by IntelliJ IDEA.
 * User: Rick
 * Date: 2015/11/18
 * Time: 下午 09:55
 */
class Classes extends CI_Controller
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

    public function __construct()
    {
        parent::__construct();//server的實體路徑
        $this->load->helper('form');
        $this->load->helper('array');
        $this->load->helper('security');
        $this->load->model('public_program/Classes_model');
    }

    public function index(){
        $this->load->library('pagination');

        $table_name = $this->input->get('table_name');
        $keyword =  $this->input->get('keyword');
        //接收第幾頁
        $page = $this->input->get('page',TRUE);
        if(!$page){
            $page = '1';
        }
        //先取得總共有多少資料
        $config['total_rows'] = $this->Classes_model->get_classes_count($table_name,$keyword);
        //該頁的網址
        $config['base_url'] = base_url().'classes/index';
        //幾筆為一頁
        $config['per_page'] = 15;
        $start = $config['per_page'] * ($page-1);
        //開始撈資料
        $query = $this->Classes_model->get_classes($table_name,$keyword,$config['per_page'],$start);

        $data['classes'] = $query;
        $data['table_name'] = xss_clean($table_name);

        $data['subject'] = xss_clean($keyword);
        $this->pagination->initialize($config);
        $this->load->view('public_program/classes/classes', $data);

    }
    public function add(){
        $table_name = $this->input->get('table_name',true);
        $data['table_name'] = xss_clean($table_name);
        $this->load->view('public_program/classes/classes_add',$data);
    }
    public function add_save(){
        $table_name = $this->input->post('table_name',true);
        $class_name = $this->input->post('class_name',true);
        $data_id = $this->get_data_id($table_name);
        $data['rtn_message'] = "";
        if($this->Classes_model->add_class($table_name,$data_id,$class_name,$this->session->user_name)){
            $data['rtn_message'] = "新增成功！";
        }else{
            $data['rtn_message'] = "新增失敗！";
        }
        $data['table_name'] = xss_clean($table_name);
        $this->load->view('public_program/classes/classes_add',$data);
    }

    public function modify(){
        $this->load->view('public_program/classes/classes');
    }
    public function modify_save(){

    }

    private function get_data_id($table_name){
        $today = date("Ymd");
        $new_id= '';
        $query = $this->Classes_model->query_max_id($table_name,$today);
        if ($query->Id)
        {
            $max_id = $query->Id;
            $id_num = substr($max_id, -4, 12);
            $new_id_num = ((int)$id_num) +1 ;
            $new_id_str = sprintf("%d",$new_id_num);
            $new_id_str =str_pad($new_id_str,4,'0',STR_PAD_LEFT);
            $new_id = $today . $new_id_str;
        }else{
            $new_id = $today . '0001';
        }
        return $new_id;
    }

}