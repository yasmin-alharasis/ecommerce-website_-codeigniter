<?php
    class User extends CI_Controller
    {   

        public function __construct()
        {   
            parent::__construct();
            if($_SESSION['user_Logged'] == FALSE )
            {   
                $this->session->set_flashdata("error","Please login first to view this page");
                redirect("auth/login");
            }
        }
        public function profile()
        {   
            $this->load->view('templates/header');
            $this->load->view('profile');
            $this->load->view('templates/footer');
        }
    }


?>