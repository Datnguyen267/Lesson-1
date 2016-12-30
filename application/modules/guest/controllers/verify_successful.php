<?php
class Verify_successful extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }
    public  function index() {
            $data = array(

                    'title' => 'Verify Successful',

            );
            $this->template->load('guest', 'verify-successful_view', $data);

    }
}
?>