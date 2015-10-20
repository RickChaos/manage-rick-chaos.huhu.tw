<?php

/**
 * Created by IntelliJ IDEA.
 * User: Rick
 * Date: 2015/10/15
 * Time: 下午 10:14
 */
class Maintain_menu extends CI_Controller
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
        parent::__construct();//server的實體路徑
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->model('content/Maintain_menu_model');
        $this->load->model('manage_template/Manage_Template_Model');
    }

    public function index(){
        $query_level_one = $this->Manage_Template_Model->get_menu(1, 0);
        $menu = "";
        for ($i = 0; $i < count($query_level_one); $i++) {
            $level_one_name = xss_clean($query_level_one[$i]['Name']);
            $level_one_id = xss_clean($query_level_one[$i]['Id']);
            $level_one_type = xss_clean($query_level_one[$i]['Type']);
            $menu = $menu . "<li>";
            if($level_one_type == "folder"){
                $menu = $menu . "<span class=\"badge badge-success\" onclick=\"load_folder('".$level_one_id."','modify')\"><i class=\"icon-folder-close\"></i> " . $level_one_name."</span><a href=\"#\"><i class=\"icon-plus\"></i></a>";
                $menu = $menu . "<ul>";
                if ($this->Manage_Template_Model->has_node($level_one_id)) {
                    $query_level_two = $this->Manage_Template_Model->get_menu(2, $level_one_id);
                    for ($j = 0; $j < count($query_level_two); $j++) {
                        $level_two_name = xss_clean($query_level_two[$j]['Name']);
                        $level_two_id = xss_clean($query_level_two[$j]['Id']);
                        $level_two_type = xss_clean($query_level_two[$j]['Type']);
                        $menu = $menu . "<li>";
                        if ($level_two_type == "folder") {
                            $menu = $menu . "<span class=\"badge badge-success\" onclick=\"load_folder('".$level_two_id."','modify')\"><i class=\"icon-folder-close\"></i> " . $level_two_name."</span><a href=\"#\"><i class=\"icon-plus\"></i></a>";
                            $menu = $menu . "<ul>";
                            if ($this->Manage_Template_Model->has_node($level_two_id)) {
                                $query_level_three = $this->Manage_Template_Model->get_menu(3, $level_two_id);
                                for ($k = 0; $k < count($query_level_three); $k++) {
                                    $menu = $menu . "<li>";
                                    $level_three_name = xss_clean($query_level_three[$k]['Name']);
                                    $level_three_id = xss_clean($query_level_three[$k]['Id']);
                                    $menu = $menu . "<a href=\"javascript:load_function('".$level_three_id."','modify')\" ><span><i class=\"icon-cog\"></i> ".$level_three_name."</span></a>";
                                    $menu = $menu . "</li>";
                                }
                            }
                            $menu = $menu . "</ul>";
                        }else{
                            $menu = $menu . "<a href=\"javascript:load_function('".$level_two_id."','modify')\" ><span><i class=\"icon-cog\"></i> ".$level_two_name."</span></a>";
                        }
                        $menu = $menu . "</li>";
                    }
                }
                $menu = $menu . "</ul>";
            }else{
                $menu = $menu . "<a href=\"javascript:load_function('".$level_one_id."','modify')\" ><span><i class=\"icon-cog\"></i> ".$level_one_name."</span></a>";
            }
            $menu = $menu . "</li>";
        }
        $menu = $menu . " </ul>";
        $data["menu"] = $menu;
        $this->load->view('maintain_menu/maintain_menu',$data);
    }

    public function load_function($id){
        $this->output->set_content_type('application/json');
        $query = $this->Maintain_menu_model->get_node_info($id);
        $data["Name"] = $query->Name;
        $data["Url"] = $query->Promgram_Url;
        $data["Sequence"] = $query->Sequence;
        echo json_encode($data);
    }
    public function load_folder($id){
        $this->output->set_content_type('application/json');
        $query = $this->Maintain_menu_model->get_node_info($id);
        $data["Name"] = $query->Name;
        $data["Node_Level"] = $query->Node_Level;
        $data["Sequence"] = $query->Sequence;
        echo json_encode($data);
    }

    public function modify_folder(){
        $id=$this->input->post('folder_id');
        $name=$this->input->post('folder_name');
        $sequence=$this->input->post('folder_sequence');
        $data["result"] = "";
        if($this->Maintain_menu_model->update_folder_node($id,$name,$sequence)){
            $data["result"] = "success";
        }else{
            $data["result"] = "fail";
        }
        $this->output->set_content_type('application/json');
        echo json_encode($data);
    }

    public function modify_function(){
        $id=$this->input->post('function_id');
        $name=$this->input->post('function_name');
        $url=$this->input->post('function_url');
        $sequence=$this->input->post('function_sequence');
        $data["result"] = "";
        if($this->Maintain_menu_model->update_function_node($id,$name,$url,$sequence)){
            $data["result"] = "success";
        }else{
            $data["result"] = "fail";
        }
        $this->output->set_content_type('application/json');
        echo json_encode($data);
    }
}