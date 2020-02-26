<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
    class Product extends CI_Controller 
    {   
        function __construct(){
            parent::__construct();
            $this->load->model('shoping_cart_model');
            $this->load->model('product_model');
            $this->load->library('session');
            
        }
        public function view($id)

        {
            $data['item'] = $this->product_model->fetch_product($id);
            $data['color'] = $this->product_model->fetch_color();
    
            if(empty($data['item']))
            {
                show_404();
            }
            $this->load->view('templates/header');
            $this->load->view('products/view',$data);
            $this->load->view('templates/footer');

        }

    }
?>