<?php

class Guest extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $data['subview'] = 'guest/index_view';
        $data['title'] = 'Test Matster Layout';
        $this->load->view('guest/main', $data);
    }
}
?>