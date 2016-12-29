<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    class Changeemail extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->helper(array('url', 'form'));
            $this->load->library(array('form_validation','session'));
            $this->load->model('mchangeemail');
        }
        public  function index() {
            $t = $this->session->userdata('user');
            $uname = $t['username'];
            if($uname == null)           {
                redirect(base_url());
            }
            $this->load->view('wchange-email');
        }
        public function  change_email(){
            $t = $this->session->userdata('user');
            $uname = $t['username'];
            if($uname == null)           {
                redirect(base_url());
            }
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_duplicate_email');
            if($this->form_validation->run()){
                $userid = $this->mchangeemail->change_email();
                if($userid){
                    $this->session->set_flashdata('notice','Sửa thông tin thành công');
                    $this->load->view('wchange-email-success');
                }else{
                    $this->session->set_flashdata('notice','Sửa thông tin không thành công, vui lòng thử lại');
                    redirect('changeemail/change_email');


                }
            }else{
                $this->load->view("wchange-email");
            }
        }
        function check_duplicate_email($str){
            $query = $this->db->query("SELECT email FROM User");
            $n = 0;
            $array_email;
            $b = 0;
            foreach ($query->result_array() as $row){
                $array_email[$n] = $row['email'];
                $n++;
            }
            for($i = 0; $i< count($array_email); $i++){
                if(strcmp($str, $array_email[$i]) == 0){
                    $b++;
                }
            }
            if($b==0){
                return true;
            }else{
                $this->form_validation->set_message('check_duplicate_email', 'Please enter different Email '.$this->input->post('email').' already exists!');
                return false;
            }
        }
    }
    ?>