<?php
class Successful extends CI_Controller {
    public  function index() {
        echo $this->input->post('fullname');
        $this->load->view('wsuccessful');
    }
}
?>