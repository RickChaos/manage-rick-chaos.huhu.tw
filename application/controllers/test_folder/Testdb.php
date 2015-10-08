<?php

/**
 * Created by PhpStorm.
 * User: 禎毅
 * Date: 2015/10/5
 * Time: 下午 08:54
 */
class Testdb extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login/login_model'); //server的實體路徑
        $this->load->helper('phpass');
    }

    public function index()
    {
        $data['test'] = $this->testmodel->get_all();
        $this->load->view('test_folder/index', $data);
        $this->load->library('PasswordHash');
    }

    public function hashpassword($password){
        $hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
        $data['password']  = $hasher->HashPassword($password);
        $this->load->view('test_folder/password_hash', $data);
    }

}