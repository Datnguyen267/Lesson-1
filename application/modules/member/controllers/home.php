<?php
class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
        #Tải thư viện  và helper của Form trên CodeIgniter
    }
    public  function index() {
        $currentUser = $this->session->userdata('user');

        if(isset($currentUser['username']) === FALSE){
            redirect(base_url('guest/main'));
        }else {
            $data = array(

                    'title' => 'Home',

            );
            $this->template->load('member', 'home_view', $data);
        }
    }
    public function logout(){
        $this->session->unset_userdata('user');
        redirect(base_url('guest/main'));
    }
}
?>