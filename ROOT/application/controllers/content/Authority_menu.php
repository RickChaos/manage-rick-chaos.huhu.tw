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
        $this->load->helper('security');
    }

    public function index()
    {
        $this->load->library('pagination');

        $user_name=$this->input->post('user_name');
        $unit=$this->input->post('unit_select');

        //接收第幾頁
        $page = $this->input->get('page',TRUE);
        if(!$page){
            $page = '1';
        }

        //先取得總共有多少資料
        $config['total_rows'] = $this->Authority_menu_model->get_all_user_count($user_name,$unit);
        //該頁的網址
        $config['base_url'] = base_url().'authority_menu/index';
        //幾筆為一頁
        $config['per_page'] = 15;
        $start = $config['per_page'] * ($page-1);
        //開始撈資料
        $query = $this->Authority_menu_model->get_all_user($user_name,$unit,$config['per_page'],$start);

        $data['all_user'] = $query;
        $hidden_item = array(
            'query_unit'  =>  xss_clean($unit)
        );
        $data['hidden_item'] = $hidden_item;
        $data['user_name'] = xss_clean($user_name);
        $this->pagination->initialize($config);
        $this->load->view('authority_menu/authority_menu_list', $data);
    }
    public function get_unit(){
        $this->output->set_content_type('application/json');
        $query = $this->Authority_menu_model->get_unit();
        echo json_encode($query);
    }

    public function authority_setting($user_id){
        $query_level_one = $this->Authority_menu_model->get_menu(1, 0);
        $query_menu_id = $this->Authority_menu_model->get_agree_menu_id($user_id[0]);
        $menu_id = array();
        foreach ($query_menu_id as $row)
        {
            array_push($menu_id,$row->Menu_Id);
        }
        $menu = "";
        for ($i = 0; $i < count($query_level_one); $i++) {
            $level_one_name = xss_clean($query_level_one[$i]['Name']);
            $level_one_id = xss_clean($query_level_one[$i]['Id']);
            $level_one_type = xss_clean($query_level_one[$i]['Type']);
            $menu = $menu . "<li>";
            $checked="";
            if($level_one_type == "folder"){
                if(in_array($level_one_id,$menu_id)){
                    $checked = "checked";
                }else{
                    $checked="";
                }
                $menu = $menu . "<span class=\"badge badge-success\"><i class=\"icon-folder-close\"></i> " . $level_one_name."</span><input type=\"checkbox\" name=\"agree_id[]\" value=\"".$level_one_id."\" style=\"margin: 0 5px 0 5px;\" ".$checked.">";
                $menu = $menu . "<ul>";
                if ($this->Authority_menu_model->has_node($level_one_id)) {
                    $query_level_two = $this->Authority_menu_model->get_menu(2, $level_one_id);
                    for ($j = 0; $j < count($query_level_two); $j++) {
                        $level_two_name = xss_clean($query_level_two[$j]['Name']);
                        $level_two_id = xss_clean($query_level_two[$j]['Id']);
                        $level_two_type = xss_clean($query_level_two[$j]['Type']);
                        $menu = $menu . "<li>";
                        if ($level_two_type == "folder") {
                            if(in_array($level_two_id,$menu_id)){
                                $checked = "checked";
                            }else{
                                $checked="";
                            }
                            $menu = $menu . "<span class=\"badge badge-success\"><i class=\"icon-folder-close\"></i> " . $level_two_name."</span><input type=\"checkbox\" name=\"agree_id[]\" value=\"".$level_two_id."\" style=\"margin: 0 5px 0 5px;\" ".$checked." >";
                            $menu = $menu . "<ul>";
                            if ($this->Authority_menu_model->has_node($level_two_id)) {
                                $query_level_three = $this->Authority_menu_model->get_menu(3, $level_two_id);
                                for ($k = 0; $k < count($query_level_three); $k++) {
                                    $menu = $menu . "<li>";
                                    $level_three_name = xss_clean($query_level_three[$k]['Name']);
                                    $level_three_id = xss_clean($query_level_three[$k]['Id']);
                                    if(in_array($level_three_id,$menu_id)){
                                        $checked = "checked";
                                    }else{
                                        $checked="";
                                    }
                                    $menu = $menu . "<a ><span><i class=\"icon-cog\"></i> ".$level_three_name."</span></a><input type=\"checkbox\" name=\"agree_id[]\" value=\"".$level_three_id."\" style=\"margin: 0 5px 0 5px;\" ".$checked." >";
                                    $menu = $menu . "</li>";
                                }
                            }
                            $menu = $menu . "</ul>";
                        }else{
                            if(in_array($level_two_id,$menu_id)){
                                $checked = "checked";
                            }else{
                                $checked="";
                            }
                            $menu = $menu . "<a ><span><i class=\"icon-cog\"></i> ".$level_two_name."</span></a><input type=\"checkbox\" name=\"agree_id[]\" value=\"".$level_two_id."\" style=\"margin: 0 5px 0 5px;\" ".$checked." >";
                        }
                        $menu = $menu . "</li>";
                    }
                }
                $menu = $menu . "</ul>";
            }else{
                if(in_array($level_one_id,$menu_id)){
                    $checked = "checked";
                }else{
                    $checked="";
                }
                $menu = $menu . "<a ><span><i class=\"icon-cog\"></i> ".$level_one_name."</span></a><input type=\"checkbox\" name=\"agree_id[]\" value=\"".$level_one_id."\" style=\"margin: 0 5px 0 5px;\" ".$checked.">";
            }
            $menu = $menu . "</li>";
        }
        $menu = $menu . " </ul>";
        $data["menu"] = $menu;
        $hidden_item = array(
            'user_id'  =>  xss_clean($user_id[0])
        );
        $data['hidden_item'] = $hidden_item;
        $this->load->view('authority_menu/authority_menu_setting', $data);
    }

    public function authority_save(){
        $agree_ids = $this->input->post('agree_id');
        $user_id = $this->input->post('user_id');
        $this->Authority_menu_model->del_all_data($user_id);
        for ($i = 0; $i < count($agree_ids); $i++) {
            $agree_id = $agree_ids[$i];
            $this->Authority_menu_model->save_data($user_id,$agree_id,$this->session->user_name);
        }
        redirect('authority_menu/index');
    }
}