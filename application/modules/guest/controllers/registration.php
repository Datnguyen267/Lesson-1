<?php
    class Registration extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('registration_model'); //Táº£i model user_model.php
        }

        public function index(){
            $data = array(

                    'title' => 'Registration',
                    'cap'=> $this->createCaptcha()

            );
//             $data = $this->createCaptcha();
            $this->session->set_userdata('captcha',$data['cap']);
            $this->template->load('guest', 'registration_view', $data);
        }

        public function registration(){
            $bday = 0; $bmonth= 0 ; $byear = 0;
            if(isset($_POST['regist'])){
                $bday = $_POST['day'];
                $bmonth = $_POST['month'];
                $byear = $_POST['year'];
            }
            $birthday = $byear."-".$bmonth."-".$bday ;
            $_POST['birthday'] = $birthday;
            $barray = array($byear, $bmonth, $bday);
            $data['birthday'] = $barray;

            $this->load->library('form_validation');
            $this->form_validation->set_rules('fullname', 'Full Name', 'required|min_length[4]|max_length[30]|callback_check_fullname');
            $this->form_validation->set_rules('username', 'User Name', 'required|min_length[4]|max_length[30]|callback_check_duplicate_name|callback_check_username');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|max_length[20]|callback_check_password');
            $this->form_validation->set_rules('repassword', 'Re-Password', 'required|matches[password]');
            $this->form_validation->set_rules('sex', 'Sex', 'callback_check_sex');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_duplicate_email');
            $this->form_validation->set_rules('captcha', 'Captcha', 'required|callback_check_captcha');
            $this->form_validation->set_rules('birthday', 'Birthday', 'callback_check_date');
            if($this->form_validation->run()){
                $userid= $this->registration_model->register();
                if($userid){
                    $this->session->set_flashdata('notice','Đăng ký thành công');
                    try {
                        $this->send_confirmation();
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }
                    $this->load->view('successful_view');
                }else{
                    $this->session->set_flashdata('notice','Đăng ký không thành công, vui lòng thử lại!');
                    $this->session->set_userdata('Birthday',$data['birthday']);
                    $data['captcha'] = $this->createCaptcha();
                    $this->session->set_userdata('captcha',$data['captcha']);
                    $this->load->view('registration_view', $data);
                    redirect('guest/registration');
                }
            }else{
                $data = array(
                        'title' => 'Registration',
                        'cap'=> $this->createCaptcha()
                );
                $this->session->set_userdata('captcha',$data['cap']);
                $this->template->load('guest', 'registration_view', $data);
            }

        }
        protected  function createCaptcha(){
            $values = array(
                    'word' => '',
                    'word_length' => 8,
                    'img_path' => '././captcha/',
                    'img_url' => base_url() .'captcha/',
                    'font_path' => base_url() . 'system/fonts/texb.ttf',
                    'img_width' => 150,
                    'img_height' => 50,
                    'expiration' => 3600
            );
            return create_captcha($values);
        }
        public function refreshCaptcha(){
            $values = array(
                    "word"      =>  "",//chá»• nÃ y cÃ¡c báº¡n cÃ³ thá»ƒ thÃªm cÃ¡c kÃ½ tá»± cá»§a cÃ¡c báº¡n cÅ©ng Ä‘Æ°á»£c vÃ­ dá»¥ nhÆ° tÃªn cá»§a báº¡n cháº³ng háº¡n he he, tÃ´i Ä‘á»ƒ trong cho nÃ³ tá»± random.
                    "img_path"  =>  "./captcha/",//Ä‘Æ°á»�ng dáº«n Ä‘á»ƒ táº¡o img captcha.
                    'img_url' => base_url() .'captcha/',
                    'font_path' => base_url() . 'system/fonts/texb.ttf',
                    "img_width" => 150,//chiá»�u dÃ i cá»§a captcha
                    "img_height"=> 30,//chiá»�u cao cá»§a captcha
                    "expiration"=> 7200 //thá»�i gian háº¿t háº¡n cá»§a captcha
            );
            $data = create_captcha($values);
            $_SESSION['captcha'] = $data['word'];
            echo $data['image'];
        }
        public  function check_fullname($str){
                $nameRegex = '/^[a-zA-Z ]+$/';
                $c = preg_match('/^[a-zA-Z ]+$/', $str);
                if($c != null){
                    return true;
                }else{
                    $this->form_validation->set_message('check_fullname', 'Fullname only contain a-Z and letters.');
                    return false;
                }
        }
        public function check_username($str){
                $nameRegex = '/^[a-zA-Z ]+$/';
                $c = preg_match('/^[a-zA-Z0-9_]+$/', $str);
                if($c != null){
                    return true;
                }else{
                    $this->form_validation->set_message('check_username', 'Username only contain a-Z 0-9 and underscope.');
                    return false;
                }
            }
            public function check_password($str){
                $nameRegex = '/^[a-zA-Z ]+$/';
                $c = preg_match('/^[a-zA-Z0-9@#$%!]+$/', $str);
                if($c != null){
                    return true;
                }else{
                    $this->form_validation->set_message('check_password', 'Password only contain a-Z 0-9 and special characters follow: @#$%!.');
                    return false;
                }
            }
            public  function check_duplicate_name($str){
             $query = $this->db->query("SELECT username FROM User");
             $n = 0;
             $array_account;
             $b = 0;
             foreach ($query->result_array() as $row){
                 $array_account[$n] = $row['username'];
                 $n++;
             }
            for($i = 0; $i< count($array_account); $i++){
                if(strcmp($str, $array_account[$i]) == 0){
                    $b++;
                }
            }
            if($b==0){
                return true;
            }else{
                $this->form_validation->set_message('check_duplicate_name', 'Please enter different Username '.$this->input->post('username').' already exists!');
                return false;
            }
        }
        public function check_duplicate_email($str){
            $query = $this->db->query("SELECT email FROM User");
            $n = 0;
            $array_email;
            $b = 0;
            foreach ($query->result_array() as $row){
                $array_email[$n] = $row['email'];
                $n++;
            }
            for($i = 0; $i< count($array_email); $i++){
                if(strcmp($str, $array_email[$i]) == 0){
                    $b++;
                }
            }
            if($b==0){
                return true;
            }else{
                $this->form_validation->set_message('check_duplicate_email', 'Please enter different Email '.$this->input->post('email').' already exists!');
                return false;
            }
        }
        public function check_captcha($str){
            $captcha = $this->session->userdata('captcha');
            if(strcmp(strtoupper($str),strtoupper($captcha['word'])) == 0){
                return true;
            }
            else{
                $this->form_validation->set_message('check_captcha', 'Please enter correct captcha!');
                return false;
            }
        }

        public function check_date($str){
            $word = explode("-", $str);
            if(checkdate($word[1], $word[2], $word[0])){
                return true;
            }
            else{
                $this->form_validation->set_message('check_date', 'Please seclect correct date!');
                return false;
            }
        }
        public function check_sex($str){
            if($str == 1 || $str == 2){
                return true;
            }
            else{
                $this->form_validation->set_message('check_sex', 'Please seclect correct value of sex. Value only 1 or 2!');
                return false;
            }
        }

        public function send_confirmation() {
            $this->load->library('email');  	//load email library
            $this->email->from('datnguyen267@gmail.com', 'My Site'); //sender's email
            $address = $_POST['email'];	//receiver's email
            $subject="Welcome to MySite!";	//subject
            $message= /*-----------email body starts-----------*/
            'Thanks for signing up,

        Your account has been created.
        Here are your login details.
        -------------------------------------------------
        Email   : ' . $_POST['email'] . '
        -------------------------------------------------

        Please click this link to activate your account:

        ' . base_url() . 'guest/login/verify?' .
                'email=' . $_POST['email'] . '&hash=' . md5($this->input->post('email')."Verifiy Code.") ;
            /*-----------email body ends-----------*/
            $this->email->to($address);
            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->send();
        }
    }
    ?>
