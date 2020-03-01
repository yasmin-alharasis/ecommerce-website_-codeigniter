<?php

class Auth extends CI_Controller
{   
    
    public function __construct(){

        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('shoping_cart_model');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->library('session');
    }
    

    public function login()
    {   
    // numeric random number for captcha
    $random_number = substr(number_format(time() * rand(),0,'',''),0,6);
    //setting up captcha config
    $vals = array(
        'word' => $random_number,
        'img_path' =>'./captcha_images/',
        'img_url' =>base_url().'captcha_images/',
        'img_width' => 140,
        'img_height' => 32,
        'expiration' =>7200
    );
    $data['captcha'] = create_captcha($vals);
    $this->session->set_userdata("captchaWord",$data['captcha']['word']);

    $this->load->view('templates/header');
    $this->load->view('login',$data);
    $this->load->view('templates/footer');
    $this->loginauth();
    
    }
    public function loginauth(){
        $this->load->library('form_validation');
        $this->load->library('session');
        if(isset($_POST['login'])){
            
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('userCaptcha','Captcha','required|callback_check_captcha');

            $userCaptcha = $this->input->post('userCaptcha');
             //if form validation true
             if($this->form_validation->run() == TRUE)
             {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $this->db->select('*');
                $this->db->from('users');
                $this->db->where(array(
                    'username' => $username,
                ));
                $query = $this->db->get();
                $row = $query->row();
                if(isset($row))
                {   
                    if (password_verify($_POST['password'],$row->password))
                    {   
                        //temprory message 
                        $this->session->set_flashdata("success","You are logged in");
                        //set session variables
                        $_SESSION['user_Logged'] = TRUE; 
                        $_SESSION['username'] =$row->username;
                        $_SESSION['user_id']=$row->user_id;
                        $_SESSION['user_type']=$row->user_type;
                        if($_SESSION['user_type']=='admin'){
                           redirect('/auth/dashboard');
                        }else{
                            redirect('/Shoping_cart/index');
                        }          
                    }else{
                    $this->session->set_flashdata("error","Password incorrect");
                    redirect('auth/login');
                    } 
                }else{
                    $this->session->set_flashdata("error","No such account exists in database");
                    redirect('auth/login');
                }
            }else{
            // numeric random number for captcha
            $random_number = substr(number_format(time() * rand(),0,'',''),0,6);
            //setting up captcha config
            $vals = array(
                'word' => $random_number,
                'img_path' =>'./captcha_images/',
                'img_url' =>base_url().'captcha_images/',
                'img_width' => 140,
                'img_height' => 32,
                'expiration' =>7200
            );
            $data['captcha'] = create_captcha($vals);
            $this->session->set_userdata("captchaWord",$data['captcha']['word']);
            $this->load->view('templates/header');
            $this->load->view('login',$data);
            $this->load->view('templates/footer');

            }
        }        
    }

    public function check_captcha($str)
    {   

        $word = $this->session->userdata("captchaWord");
        if(strcmp(strtoupper($str),strtoupper($word)) == 0){
            return true;
        }else{
            $this->form_validation->set_message('check_captcha','Please enter correct words');
            return false;
        }

    }
    public function profile()
    {   
        
    $this->load->view('templates/header');
    $this->load->view('profile');
    $this->load->view('templates/footer');

    }
    public function dashboard(){
        $this->load->view('templates/header');
        $this->load->view('dashboard');
        $this->load->view('templates/footer');
    }
    public function logout(){

        unset($_SESSION);
        session_destroy();
        redirect("auth/login","refresh");
    }
    
    public function register()
    {   
        $this->load->view('templates/header');
        $this->load->view('register');
        $this->load->view('templates/footer');
        $this->validate();
    }

    public function validate()
    {   
        
        if(isset($_POST['register'])){
            //validation role 
            
            $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]|alpha');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('password2', 'Coniform  Password', 'required|min_length[5]|matches[password]');
            $this->form_validation->set_rules('phone', 'Phone', 'required|min_length[10]|integer');
            $this->form_validation->set_message('is_unique', 'This {field} already exists ');
            $this->form_validation->set_message('integer', 'This {field} must be number ');
            $this->form_validation->set_error_delimiters();

            //if form validation true
            $options = [ 'cost' => 7, 'salt' => 'usesomesillystringforsalt' ];
            if($this->form_validation->run() == TRUE){
                $data = array(
                    'username' => $_POST['username'],
                    'user_type'=>'member',
                    'email' => $_POST['email'],
                    'password' => password_hash($_POST["password"],PASSWORD_DEFAULT),
                    'gender' => $_POST['gender'],
                    'created_date' => date('Y-m-d'),
                    'phone' => $_POST['phone'],
                );
                $this->db->insert('users',$data);
                $this->session->set_flashdata("success","Your account has been registered. You can login now");
                redirect("auth/login");
                
            }
            else{
            //if form validation false
            $this->session->set_flashdata("error",validation_errors());
            redirect("auth/register");
                  
            }    
        }
    }
}

?>
