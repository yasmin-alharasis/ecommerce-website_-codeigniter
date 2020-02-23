<?php
    class Pages extends CI_Controller
    {
        public function view($page = 'home'){
            $data['title'] = ucfirst($page);
            $this->load->view('templates/header');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/footer');
        }
    }


?>