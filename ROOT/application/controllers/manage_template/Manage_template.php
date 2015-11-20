<?php

/**
 * Created by PhpStorm.
 * User: frank
 */
class Manage_template extends CI_Controller
{
    public function _remap($method)
    {
        $user_sessionid = $this->session->user_sessionid;
        $validate_result = $this->login_model->validate_session($user_sessionid);
        if ($validate_result) {
            $this->$method();
        } else {
            $data["fail_type"] = "time_out";
            $this->session->set_userdata('user_name', '');
            $this->session->set_userdata('user_id', '');
            $this->session->set_userdata('user_title', '');
            $this->load->view('login/login_fail', $data);
        }
    }

    public function __construct()
    {
        parent::__construct();//server的實體路徑
        $this->load->helper('form');
        $this->load->helper('array');
        $this->load->helper('security');
        $this->load->model('manage_template/Manage_Template_Model');
    }

    public function index()
    {
        $this->load->view('manage_template/template_template');
    }

    public function left()
    {
        $userid = $this->session->user_id;
        $query_level_one = $this->Manage_Template_Model->get_menu(1, 0,$userid);
        $menu = " <ul class=\"nav navbar-nav side-nav\">";
        for ($i = 0; $i < count($query_level_one); $i++) {
            $level_one_name = xss_clean($query_level_one[$i]['Name']);
            $level_one_id = xss_clean($query_level_one[$i]['Id']);
            $level_one_type=xss_clean($query_level_one[$i]['Type']);
            $level_one_promgram_url=xss_clean($query_level_one[$i]['Promgram_Url']);
            $menu = $menu . "<li>";
            $menu = $menu . "<a href=\"javascript:;\" data-toggle=\"collapse\" data-target=\"#demo" . $i . "\"><i class=\"fa fa-fw fa-folder\"></i> " . $level_one_name;
            if ($level_one_type == "folder") {
                if ($this->Manage_Template_Model->has_node($level_one_id)) {
                    $menu = $menu .  " <i class=\"fa fa-fw fa-caret-down\"></i></a>" ;
                    $menu = $menu . "<ul id=\"demo" . $i . "\" class=\"collapse\">";
                    $query_level_two = $this->Manage_Template_Model->get_menu(2, $level_one_id,$userid);
                    for ($j = 0; $j < count($query_level_two); $j++) {
                        $level_two_name = xss_clean($query_level_two[$j]['Name']);
                        $level_two_id = xss_clean($query_level_two[$j]['Id']);
                        $level_two_type = xss_clean($query_level_two[$j]['Type']);
                        $level_two_promgram_url = xss_clean($query_level_two[$j]['Promgram_Url']);
                        $menu = $menu . "<li>";
                        if ($level_two_type == "folder") {
                            $menu = $menu . "<a href=\"javascript:;\" data-toggle=\"collapse\" data-target=\"#demo" . $i . "_" . $j . "\"> <i class=\"fa fa-fw fa-folder\"></i> ". $level_two_name ;
                            if ($this->Manage_Template_Model->has_node($level_two_id)) {
                                $menu = $menu ." <i class=\"fa fa-fw fa-caret-down\"></i></a>";
                                $menu = $menu . "<ul id=\"demo" . $i . "_" . $j . "\" class=\"collapse\">";
                                $query_level_three = $this->Manage_Template_Model->get_menu(3, $level_two_id,$userid);
                                for ($k = 0; $k < count($query_level_three); $k++) {
                                    $level_three_name = xss_clean($query_level_three[$k]['Name']);
                                    $level_three_promgram_url = xss_clean($query_level_three[$k]['Promgram_Url']);
                                    $menu = $menu . "<a href=\"javascript:change_content('" . base_url($level_three_promgram_url) . "','".$level_three_name."')\"><i class=\"fa fa-fw fa-cog\"></i>" . $level_three_name . "</a>";
                                }
                                $menu = $menu . "</ul>";
                            }else{
                                $menu = $menu ."</a>" ;
                            }
                        } else {
                            $menu = $menu . "<a href=\"javascript:change_content('" . base_url($level_two_promgram_url) . "','".$level_two_name."')\"><i class=\"fa fa-fw fa-cog\"></i>" . $level_two_name . "</a>";
                        }

                        $menu = $menu . "</li>";
                    }
                    $menu = $menu . "</ul>";
                }else{
                    $menu = $menu .   "</a>";
                }
            }else{
                $menu = $menu . "<a href=\"javascript:change_content('" . base_url($level_one_promgram_url) . "','".$level_one_name."')\"><i class=\"fa fa-fw fa-cog\"></i>" . $level_one_name . "</a>";
            }
            $menu = $menu . "</li>";
        }
        $menu = $menu . " </ul>";
        $data["menu"] = $menu;

        if($this->input->post('node_name')){
            $this->session->set_userdata('node_name',$this->input->post('node_name'));
        }
        $this->load->view('manage_template/template_left', $data);
    }

    public function top()
    {
        $data[user_name] = $this->session->user_name;
        $data[user_title] = $this->session->user_title;
        $this->load->view('manage_template/template_top', $data);
    }

    public function default_content()
    {
        $data['Todolist'] = $this->Manage_Template_Model->get_NoticeData();
        $data['Completion'] = $this->Manage_Template_Model->get_completion();
        $data['PersonalData']= $this->Manage_Template_Model->get_personalData();
        $data['Personal']=$this->Manage_Template_Model->get_personal();
        $this->load->view('manage_template/index', $data);
    }

}