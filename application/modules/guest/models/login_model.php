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
    function checkUser( $userInfo ){
        $user	=	$this->db->select()
        ->where('username', $userInfo['username'])
        ->where('password', $userInfo['password'])
        ->get($this->_name)
        ->row_array();
        if(count($user) >0){
            return $user;
        } else {
            return false;
        }
    }

}