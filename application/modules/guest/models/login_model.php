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
//         ->where('password', $userInfo['password'])
        ->get($this->_name)
        ->row_array();
        if($user['username'] != ""){
                if($user['is_verified'] == 1){
                    return 1;
                }else{
                    return 2;
                }
        } else {
            return 0;
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


}