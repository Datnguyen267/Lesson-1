<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Main extends CI_Controller {

        public function index() {

            $data = array(

                    'title' => 'Main',

            );

            $this->load->library('template');
            $this->template->load('guest', 'main_view', $data);
        }
    }