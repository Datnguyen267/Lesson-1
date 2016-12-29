<?php
class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
        #Tải thư viện  và helper của Form trên CodeIgniter
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation','session'));

        $this->load->database();
    }
    public  function index() {
        $t = $this->session->userdata('user');

        if(isset($t['username']) === FALSE){
            redirect(base_url('main'));
        }else {
            $this->load->view('whome');
        }
    }
    public function logout(){
        $this->session->unset_userdata('user');
        redirect(base_url('main'));
    }
}
?>