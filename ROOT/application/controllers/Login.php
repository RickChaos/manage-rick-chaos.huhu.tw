<?php

/**
 * Created by PhpStorm.
 * User: 禎毅
 * Date: 2015/10/6
 * Time: 下午 09:17
 */
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();//server的實體路徑
		//$this->load->helper('phpass');
		$this->load->helper('form');
		$this->load->model('login/login_model');
    }

    public function index(){
        $this->load->view('login/login_page');
    }
	
	public function check_user(){
		$userid = $this->input->post('user');
		$password = $this->input->post('password');
		/*$hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
        $password = $hasher->HashPassword($password);*/
		if($this->login_model->check_user($userid,$password)){
			$this->load->view('manage_template/test_template');
		}else{
			$this->load->view('login/login_page');
		}
		
	}

}