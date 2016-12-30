<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model{

    /* Gán tên bảng cần xử lý*/
    private $_name = 'User';

    function __construct(){
        parent::__construct();
    }

    /**
     * Get all users in DB
     * @param null
     * @return array
     */
    public function checkUser( $userInfo ){
        $user	=	$this->db->select()
        ->where('username', $userInfo['username'])
        ->where('password', $userInfo['password'])
        ->get($this->_name)
        ->row_array();
        if(count($user) >0){
            echo 'true lần 1';
                if($this->is_verified()){
                    echo 'true lần 2';
                    return $user;
                }
        } else {
            echo 'fail';
            return false;
        }
    }

    public function verify_user($email) {
        $data = array('is_verified' => 1);
        $this->db->where('email', $email);
        $this->db->update('User', $data);
    }

    public function get_hash_value($email){
        $query = $this->db->get_where('User', array('email' => $email));
        $row= $query->row();
        return $row->hash;
    }

    public function is_verified(){
        $query = $this->db->get_where('User', array('is_verified' => 1));
        $row= $query->row();
        echo 'row'.$row;
        return $row->hash;
    }

}