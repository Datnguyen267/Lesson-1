<?php
class Login extends CI_Controller{

    private $b_Check = false;

    public function __construct(){
        parent::__construct();

        $this->load->model('login_model');

    }

    public function index(){
        $data = array(

                'title' => 'Login',

        );
        $this->template->load('guest', 'login_view', $data);
    }

    public function login(){
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run()){
            $userInfo['username'] = $this->input->post('username');
            $userInfo['password'] = md5($this->input->post('password'));
            $checkResult = $this->login_model->checkUser( $userInfo );
            if($checkResult){
                $this->session->set_userdata('user', $checkResult);
                redirect(base_url('/member/home'));
            }else{
                $this->b_Check = false;
            }
        }
        $data = array(

                'title' => 'Login',
                'b_Check' => $this->b_Check
        );
        $this->template->load('guest', 'login_view', $data);

    }

    public function logout(){
        $this->session->unset_userdata('user');	// Unset session of user
        redirect(base_url('/guest/login'));
    }

    public function success(){
        $userInfo['user'] = $this->session->userdata('user');
        $this->load->view('home_view', $userInfo);
    }

}