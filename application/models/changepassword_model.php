<?php
class Mchangepassword extends CI_Model{
    private $_name = 'User';
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->database();

    }
    public function change_password(){
        $t = $this->session->userdata('user');
        $data= array(
                'password'=> md5($this->input->post('newpass')),
        );
        $this->db->where('username', $t['username']);
        $this->db->update('User', $data);
        $t2['username'] = $t['username'];
        $b = $this->a_fCheckUser($t2);
        if($b['password'] = md5($this->input->post('newpass'))){
            $this->session->set_userdata('user',$b);
            return true;
        }else{
            return false;
        }
        }
        function a_fCheckUser( $a_UserInfo ){
            $a_User	=	$this->db->select()
            ->where('username', $a_UserInfo['username'])
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