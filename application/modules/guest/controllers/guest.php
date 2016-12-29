<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class guest extends CI_Controller {

        public function index() {
            $data = array(

                    'title' => 'Title goes here',

            );

            $this->load->library('template');
            $this->template->load('guest', 'guest-view', $data);
//             $this->load->view('main_view');
        }
    }
    ?>