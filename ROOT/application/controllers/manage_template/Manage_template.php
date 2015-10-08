<?php

/**
 * Created by PhpStorm.
 * User: frank
 */
class Manage_template extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();//server的實體路徑
    }

    public function index(){
        $this->load->view('manage_template/test_template');
    }
    public function test_left(){
        $this->load->view('manage_template/test_left');
    }
    public function test_top(){
        $this->load->view('manage_template/test_top');
    }
    public function test_index(){
        $this->load->view('manage_template/index');
    }
}