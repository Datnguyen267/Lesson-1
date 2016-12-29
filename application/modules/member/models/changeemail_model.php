<?php
class Changeemail_model extends CI_Model{
    private $_name = 'User';
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->database();

    }
    public function change_email(){
        $t = $this->session->userdata('user');
        $data= array(
                'email'=> $this->input->post('email'),
        );
        $this->db->where('username', $t['username']);
        $this->db->update('User', $data);
        $t2['username'] = $t['username'];
        $t2['password'] = $t['password'];
        $b = $this->a_fCheckUser($t2);
        if($b['email'] = $this->input->post('email')){
            $this->session->set_userdata('user',$b);
            return true;
        }else{
            return false;
        }
    }
    function a_fCheckUser( $a_UserInfo ){
        $a_User	=	$this->db->select()
        ->where('username', $a_UserInfo['username'])
        ->where('password', $a_UserInfo['password'])
        ->get($this->_name)
        ->row_array();
        if(count($a_User) >0){
            return $a_User;
        } else {
            return false;
        }
    }
}
?>