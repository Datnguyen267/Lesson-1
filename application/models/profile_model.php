<?php
class Mprofile extends CI_Model{
    private $_name = 'User';
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->database();

    }
    public function change_profile($data){
        if(!$data){
            $data = array(
                    'fullname'=> '',
                    'sex'=> '',
                    'birthday'=>'',
                    'address'=> '',
            );
        }
        $t = $this->session->userdata('user');
        $bday= $this->input->post('bday');
        $bmonth= $this->input->post('bmonth');
        $byear= $this->input->post('byear');
        $birthday = $byear."-".$bmonth."-".$bday ;
        $_POST['birthday'] = $birthday;
        $data= array(
                'fullname'=> $this->input->post('fullname'),
                'sex'=> $this->input->post('sex'),
                'birthday'=>$this->input->post('birthday'),
                'address'=> $this->input->post('address'),
        );
        $this->db->where('username', $t['username']);
        $this->db->update('User', $data);
        $t2['username'] = $t['username'];
        $t2['password'] = $t['password'];
        $b = $this->a_fCheckUser($t2);
        if($b['fullname'] == $this->input->post('fullname') && $b['sex'] == $this->input->post('sex')  && $b['address'] == $this->input->post('address')){
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
        if($a_User){
            return $a_User;
        } else {
            return false;
        }
    }
}
?>