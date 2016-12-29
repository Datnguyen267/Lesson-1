<?php
class Login extends CI_Controller{

    private $b_Check = false;

    public function __construct(){
        parent::__construct();
        #Tải thư viện  và helper của Form trên CodeIgniter
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation','session'));

        #Tải model
        $this->load->model('login_model');

        //$this->load->database();
    }

    public function index(){
        $data['subview'] = 'guest/login_view';
        $data['title'] = 'Login';
        $this->load->view('guest/main', $data);
    }

    public function login(){
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        #Kiểm tra điều kiện validate
        if($this->form_validation->run() == TRUE){
            $a_UserInfo['username'] = $this->input->post('username');
            $a_UserInfo['password'] = md5($this->input->post('password'));
            $a_UserChecking = $this->mlogin->a_fCheckUser( $a_UserInfo );
            if($a_UserChecking){
                $this->session->set_userdata('user', $a_UserChecking);
                redirect(base_url('home'));

            }else{
                $this->b_Check = false;
            }
        }
        $a_Data['b_Check']= $this->b_Check;
        $this->load->view('wlogin', $a_Data);

    }

    public function logout(){
        $this->session->unset_userdata('user');	// Unset session of user
        redirect(base_url('login'));
    }

    public function success(){
        $a_UserInfo['user'] = $this->session->userdata('user');
        $this->load->view('whome', $a_UserInfo);
    }

}