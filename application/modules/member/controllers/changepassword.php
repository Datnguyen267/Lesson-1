<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    class Changepassword extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model('changepassword_model');

        }
        public  function index() {
            $t = $this->session->userdata('user');
            $uname = $t['username'];
            if($uname == null)           {
                redirect(base_url('guest/main'));
            }
            $data = array(

                    'title' => 'Change Password',

            );
            $this->template->load('member', 'change-password_view', $data);
        }
        public function  change_password(){
            $t = $this->session->userdata('user');
            $uname = $t['username'];
            if($uname == null)           {
                redirect(base_url('guest/main'));
            }
            $this->load->library('form_validation');
            $this->form_validation->set_rules('oldpass', 'Old password', 'callback_check_passowrd');
            $this->form_validation->set_rules('password', 'New password', 'required|matches[renewpass]|callback_check_newpass');
            $this->form_validation->set_rules('renewpass', 'Confirm new password', 'required');

            if($this->form_validation->run()){
                $userid = $this->changepassword_model->change_password();
                if($userid){
                    $this->session->set_flashdata('notice','Sửa thông tin thành công');
                    $data = array(

                            'title' => 'Change Password',

                    );
                    $this->template->load('member', 'change-password-success_view', $data);
                }else{
                    $this->session->set_flashdata('notice','Sửa thông tin không thành công, vui lòng thử lại');
                    redirect('member/changepassword/change_password');


                }
            }else{
                $data = array(

                        'title' => 'Change Password',

                );
                $this->template->load('member', 'change-password_view', $data);
            }
        }
        public  function check_passowrd(){
            $t = $this->session->userdata('user');
            $inputoldpass = md5($this->input->post('oldpass'));
            $oldpass = $t['password'];

            if(strcmp($inputoldpass, $oldpass) == 0){
                return true;
            }
            else{
                $this->form_validation->set_message('check_passowrd', 'Please seclect correct password!');
                return false;
            }
        }
        public function check_newpass(){
            $t = $this->session->userdata('user');
            $inputnewpass = md5($this->input->post('newpass'));
            $oldpass = $t['password'];

            if(strcmp($inputnewpass, $oldpass)){
                return true;
            }
            else{
                $this->form_validation->set_message('check_newpass', 'New password must different old password !');
                return false;
            }
        }
    }
    ?>