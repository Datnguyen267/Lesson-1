<?php
class Successful extends CI_Controller {
    public  function index() {
        $data = array(

                'title' => 'Successful',

        );

        $this->template->load('guest', 'successful_view', $data);
    }
}
?>