<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    class Profile extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->helper(array('url', 'form'));
            $this->load->library('session');
            $this->load->model('mprofile');

        }
        public  function index() {
            $t = $this->session->userdata('user');
            $uname = $t['username'];
            if($uname == null)           {
                redirect(base_url());
            }
            $this->load->view('wprofile');
        }
        public function  change_profile(){
            $t = $this->session->userdata('user');
            $uname = $t['username'];
            if($uname == null){
                redirect(base_url());
            }
            $this->load->library('form_validation');
            $bday = 0; $bmonth= 0 ; $byear = 0;
            if(isset($_POST['save'])){
                $bday = $_POST['bday'];
                $bmonth = $_POST['bmonth'];
                $byear = $_POST['byear'];
            }

            $birthday = $byear."-".$bmonth."-".$bday ;
            $_POST['birthday'] = $birthday;
            $barray = array($byear, $bmonth, $bday);
            $data['birthday2'] = $barray;
            $this->form_validation->set_rules('fullname', 'Full Name', 'required|min_length[4]|max_length[30]');
            $this->form_validation->set_rules('address', 'Address', 'required|max_length[30]');
            $this->form_validation->set_rules('birthday', 'Birthday', 'callback_check_date');
            if($this->form_validation->run()){
                $userid= $this->mprofile->change_profile();
                if($userid){
                    $this->session->set_flashdata('notice','Sửa thông tin thành công');
                    redirect('profile');
                }else{
                    $this->session->set_flashdata('notice','Sửa thông tin không thành công, vui lòng thử lại');
                    $this->session->set_userdata('Birthday',$data['birthday2']);

                    $this->load->view('wcprofile', $data);

                    redirect('profile/change_profile');


                }
            }else{
                $this->session->set_userdata('Birthday',$data['birthday2']);
                $this->load->view("wcprofile", $data);
            }
        }
        public function check_date($str){
            $word = explode("-", $str);
            if(checkdate($word[1], $word[2], $word[0])){
                return true;
            }
            else{
                $this->form_validation->set_message('check_date', 'Please seclect correct date!');
                return false;
            }
        }
    }
    ?>