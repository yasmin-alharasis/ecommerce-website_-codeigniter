<?php
    class Posts extends CI_Controller
    {   
        function __construct(){

            parent::__construct();
            $this->load->model('shoping_cart_model');
            $this->load->library('session');

        }
        public function index()
        {   
            $data['title'] = 'Latest Posts';
            $this->load->model('shoping_cart_model');
            $data['posts'] = $this->post_model->get_posts();
           
            // if($_SESSION['user_Logged'])
            // {
            $this->load->view('templates/header');
            $this->load->view('posts/index',$data);
            $this->load->view('templates/footer');
            // }
            // else
            // {
            //     redirect('auth/login');   
            // }
        }
        
        public function view($slug = Null)
        {
            $data['post'] = $this->post_model->get_posts($slug);
            
            if(empty($data['post']))
            {
                show_404();
            }
            $data['title'] = $data['post']['title'];
            $this->load->view('templates/header');
            $this->load->view('posts/view',$data);
            $this->load->view('templates/footer');

        }


        public function create()
        {   
            
            $data['title'] = 'create post';
            if($_SESSION['user_Logged']){
                $this->form_validation->set_rules('title','Title','required');
                $this->form_validation->set_rules('body','Body','required');

                if($this->form_validation->run() === FALSE){
                    $this->load->view('templates/header');
                    $this->load->view('posts/create',$data);
                    $this->load->view('templates/footer');
                }
                else
                {
                    $this->post_model->create_post();
                    //$this->load->view('posts/success');
                    redirect('posts');
                }
            }
            else
            {
                redirect('auth/login');   
            }


        }

        public function delete($id)
        {
            $this->post_model->delete_posts($id);
            redirect('posts');

        }

        public function edit($slug)
        {
            $data['title'] = 'edit post';
            $data['post'] = $this->post_model->get_posts($slug);
            
            if(empty($data['post']))
            {
                show_404();
            }
     
            $this->load->view('templates/header');
            $this->load->view('posts/edit',$data);
            $this->load->view('templates/footer');
        }

        public function update()
        {
            $this->post_model->update_post();
            redirect('posts');

        }

    }


?>