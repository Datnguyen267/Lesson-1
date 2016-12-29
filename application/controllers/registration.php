<?php
    class Registration extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('registration_model'); //Tải model user_model.php
        }

        public function index(){
            $val = array(
                    "word"      =>  "",//chổ này các bạn có thể thêm các ký tự của các bạn cũng được ví dụ như tên của bạn chẳng hạn he he, tôi để trong cho nó tự random.
                    "img_path"  =>  "./captcha/",//đường dẫn để tạo img captcha.
                    'img_url' => base_url() .'captcha/',
                    'font_path' => base_url() . 'system/fonts/texb.ttf',
                    "img_width" => 150,//chiều dài của captcha
                    "img_height"=> 30,//chiều cao của captcha
                    "expiration"=> 7200 //thời gian hết hạn của captcha
            );
            $data['captcha'] = create_captcha($val);
            $bday = 0; $bmonth= 0 ; $byear = 0;
            if(isset($_POST['regist'])){
                $bday = $_POST['bday'];
                $bmonth = $_POST['bmonth'];
                $byear = $_POST['byear'];
            }

            $birthday = $byear."-".$bmonth."-".$bday ;
            $_POST['birthday'] = $birthday;
            $barray = array($byear, $bmonth, $bday);
            $data['birthday'] = $barray;

            $this->load->library('form_validation');
            $this->form_validation->set_rules('fullname', 'Full Name', 'required|min_length[4]|max_length[30]|callback_check_fullname');
            $this->form_validation->set_rules('username', 'User Name', 'required|min_length[4]|max_length[30]|callback_check_duplicate_name|callback_check_username');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|max_length[20]|callback_check_password|matches[repassword]');
            $this->form_validation->set_rules('repassword', 'Re-Password', 'required');
            $this->form_validation->set_rules('sex', 'Sex', 'callback_check_sex');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_duplicate_email');
            $this->form_validation->set_rules('captcha', 'Captcha', 'required|callback_check_captcha');
//             $this->form_validation->set_rules('birthday', 'Birthday', 'callback_check_date');

            if($this->form_validation->run()){
                $userid= $this->registration_model->register();
                if($userid){
                    $this->session->set_flashdata('notice','Đăng ký thành công');
                    try {
                        $this->sendd_mail($this->input->post('email'));
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }
                    $this->load->view('successful_view');
                }else{
                    $this->session->set_flashdata('notice','Đăng ký không thành công, vui lòng thử lại');
                    $this->session->set_userdata('Birthday',$data['birthday']);
                    $this->session->set_userdata('captchaWord',$data['captcha']['word']);
                    $this->load->view('registration_view', $data);



                    redirect('registration');


                }
            }else{
                $this->session->set_userdata('Birthday',$data['birthday']);
                $this->session->set_userdata('captchaWord',$data['captcha']['word']);
                $this->load->view("registration_view", $data);
            }

        }
        public function ajax_captcha_refresh(){
            $values = array(
                    "word"      =>  "",//chổ này các bạn có thể thêm các ký tự của các bạn cũng được ví dụ như tên của bạn chẳng hạn he he, tôi để trong cho nó tự random.
                    "img_path"  =>  "./captcha/",//đường dẫn để tạo img captcha.
                    'img_url' => base_url() .'captcha/',
                    'font_path' => base_url() . 'system/fonts/texb.ttf',
                    "img_width" => 150,//chiều dài của captcha
                    "img_height"=> 30,//chiều cao của captcha
                    "expiration"=> 7200 //thời gian hết hạn của captcha
            );
            $data = create_captcha($values);
            $_SESSION['captchaWord'] = $data['word'];
            echo $data['image'];
        }
        public function check_fullname($str){
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
                $c = preg_match('/^[a-zA-Z_]+$/', $str);
                if($c != null){
                    return true;
                }else{
                    $this->form_validation->set_message('check_username', 'Fullname only contain a-Z 0-9 and underscope.');
                    return false;
                }
            }
            public function check_password($str){
                $nameRegex = '/^[a-zA-Z ]+$/';
                $c = preg_match('/^[a-zA-Z@#$%!]+$/', $str);
                if($c != null){
                    return true;
                }else{
                    $this->form_validation->set_message('check_password', 'Fullname only contain a-Z 0-9 and special characters follow: @#$%!.');
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
            $word = $this->session->userdata('captchaWord');
            if(strcmp(strtoupper($str),strtoupper($word)) == 0){
                return true;
            }
            else{
                $this->form_validation->set_message('check_captcha', 'Please enter correct captcha!');
                return false;
            }
        }

        public function check_date($str){
//             var_dump($str);
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

        /**
         * Send mail
         * @param string $str
         * @return array  */
        public function sendd_mail($str){
            $resuft = array(
                    'status' 	=> true,
                    'messeger'	=> ''
            );
//             $this->load->library('email');
//             // Cấu hình
//             $config['protocol']     = 'smtp';
//             $config['smtp_host']    = 'ssl://smtp.googlemail.com'; //neu sử dụng gmail
//             $config['smtp_user']    = 'datnguyen267@gmail.com';
//             $config['smtp_pass']    = '01674053970';
//             $config['smtp_port']    = '465';
//             $this->email->initialize($config);
if($error){
    throw new Exception('dsadsa dasd sad asd sad');
}

             $config = Array(
                     'protocol' => 'smtp',
                     'smtp_host' => 'ssl://smtp.googlemail.com',
                     'smtp_port' => 465,
                     'smtp_user' => 'datnguyen267@gmail.com',
                     'smtp_pass' => '01674053970',
                     'mailtype'  => 'html',
                     'charset'   => 'utf-8'
                     );
             $this->load->library('email', $config);
             $this->email->set_newline("\r\n");

            //cau hinh email va ten nguoi gui
            $this->email->from('datnguyen267@gmail.com', 'Nguyễn Tiến Đạt');
            //cau hinh nguoi nhan
            $this->email->to($str);


           // $this->email->to('tien_dat@lampart-vn.com');

            $this->email->subject('Email xác nhận đăng ký thành công.');
            $this->email->message('Chào bạn, bạn đã đang ký thành công tài khoản Lesson1. Vui lòng click vào link bên dưới để hoàn thành việc đăng ký.');

            //dinh kem file
            //$this->email->attach('/path/to/photo1.jpg');
            //thuc hien gui
            if ( ! $this->email->send())
            {
                // Generate error
                echo $this->email->print_debugger();
            }else{
                echo 'Gửi email thành công';
            }
        }
    }
    ?>
