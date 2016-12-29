<?php
class testMail extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
    }

    public function index() {

        $this->load->helper('form');
        $this->load->view('testmail_view');
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
        if($this->email->send())
            $this->session->set_flashdata("email_sent","Email sent successfully.");
            else
                $this->session->set_flashdata("email_sent","Error in sending Email.");
                $this->load->view('testmail_view');
    }
}
?>