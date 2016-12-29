<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    class Changeemail extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model('changeemail_model');
        }
        public  function index() {

            $t = $this->session->userdata('user');
            $uname = $t['username'];
            if($uname == null)           {
                redirect(base_url('guest/main'));
            }
            $data = array(
                    'title' => 'Change Email',
            );
            $this->template->load('member', 'change-email_view', $data);
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
                $userid = $this->changeemail_model->change_email();
                if($userid){
                    $this->send_mail($this->input->post('email'));
                    $data = array(
                            'title' => 'Change Email',
                    );
                    $this->template->load('member', 'change-email-success_view',$data);
                }else{
                    redirect('member/changeemail/change_email');


                }
            }else{
                $data = array(
                        'title' => 'Change Email',
                );
                $this->template->load('member', 'change-email_view',$data);
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

        public function send_mail() {
            $from_email = "danguyen267@gmail.com";
            $to_email = $this->input->post('email');

            //Load email library
            $this->load->library('email');

            $this->email->from($from_email, 'Tien Dat');
            $this->email->to($to_email);
            $this->email->subject('Email Test');
            $this->email->message('Testing the email class.');

            //Send mail
            if($this->email->send()){
                $this->session->set_flashdata("email_sent","Email sent successfully.");
            } else{
                    $this->session->set_flashdata("email_sent","Error in sending Email.");
            }
        }
    }
    ?>