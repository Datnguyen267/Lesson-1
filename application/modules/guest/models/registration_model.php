<?php
class Registration_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function register(){
        $bday= $this->input->post('bday');
        $bmonth= $this->input->post('bmonth');
        $byear= $this->input->post('byear');
        $birthday = $byear."-".$bmonth."-".$bday ;
        $data= array(
                'username'=> $this->input->post('username'),
                'password'=> md5($this->input->post('password')),
                'fullname'=> $this->input->post('fullname'),
                'sex'=> $this->input->post('sex'),
                'birthday'=>$birthday,
                'address'=> $this->input->post('address'),
                'email'=> $this->input->post('email')

        );
        $this->db->insert('User',$data);
        $userid=$this->db->insert_id();
        return $userid;
    }
}
?>