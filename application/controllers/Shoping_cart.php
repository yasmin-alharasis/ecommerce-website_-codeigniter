<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
    class Shoping_cart extends CI_Controller 
    {   
        function __construct(){
            parent::__construct();
            $this->load->model('Product_model');
            $this->load->model('shoping_cart_model');
            $this->load->library('session');         
        }
        
        public function index(){
            $this->load->model("shoping_cart_model");
            $data["product"] = $this->shoping_cart_model->fetch_all();
            if(isset($_SESSION['user_Logged'])) {
            $id = $_SESSION['user_id'];
            $data["item"] = $this->shoping_cart_model->fetch_all_item($id);
            }
            $this->load->view('templates/header',$data);
            $this->load->view("products/index",$data);
            $this->load->view('templates/footer');
            
        }            
        public function cart(){

            $this->load->view('templates/header');
            $this->load->model("shoping_cart_model");
            $this->load->model("product_model");
            $data["color"] =$this->product_model->fetch_color();
            $id = $_SESSION['user_id'];
            $data["item"] = $this->shoping_cart_model->fetch_all_item($id);
            $this->load->view("products/cart",$data);
            $this->load->view('templates/footer');

        }
        public function upload()
        {
            $config['upload_path'] ='./upload/';
            $config['allowed_types'] ='jpg|jpeg|gif|png';
            $this->load->library('upload',$config);

            if(!$this->upload->do_upload())
            {
                $error = array('error'=>$this->upload->display_errors());
                $this->load->view("products/create",$error);
            }
            else
            {
                
                if(isset($_POST['create']))
                {
                $this->load->model("shoping_cart_model");
                $this->shoping_cart_model->create_product();
                $this->allproduct();
                }

            }
        }
        public function create()
        {   
            if($_SESSION['user_Logged'])
            {   
                $data['color']=$this->Product_model->fetch_color();
                $data['error']='';
                $this->load->view('templates/header');
                $this->load->view("products/create",$data);
                $this->load->view('templates/footer');
            }
            else
            {
                redirect('auth/login');   
            }         
        }

        function cartTodb(){

            $this->load->library('session');
            if(isset($_POST['add_cart'])){
            
                $user_id = $_POST['user_id'];
                $product_id = $_POST['product_id'];
                $quentity = $_POST['quentity'];
                $color_id = $_POST['color_id'];
                $pname = $_POST['pname'];

                $data = array(
                    'quantity' =>$_POST['quentity'],
                );

                $d= array(
                    'user_id' => $_POST['user_id'],
                    'product_id'=>$_POST['product_id'],
                    'product_name' => $_POST['pname'],
                    'product_price' =>$_POST['price'],
                    'quantity' =>$_POST['quentity'],
                    'color_id'=>$_POST['color_id'],
                );

                $this->db->select('	quentity');
                $this->db->from('product');
                $row=$this->db->where(array( 
                    'id'=>$product_id,
                    'color_id' =>$color_id
                ));
                $query = $this->db->get();
                $result = $query->row();
                $value =  $result->quentity;
 
                if($value >= $quentity){

                    $this->db->select('quantity');
                    $this->db->from('order');
                    $row=$this->db->where(array( 
                        'user_id' => $user_id,
                        'product_id'=>$product_id,
                        'color_id' =>$color_id
                    ));
                    $query = $this->db->get();
                    $row = $query->row();
    
                    if(isset($row)){
                        $this->db->where(array(
                            'user_id' => $user_id,
                            'product_id' => $product_id
                        ));
                        $this->db->set($data);
                        $this->db->update('order',$data);
                    }
                    else{
                        $this->db->set($d);
                        $this->db->insert('order',$d);
                    }
                    redirect('Shoping_cart/index');
                }else{
                    // 'not available quantity';
                    $this->session->set_flashdata("error","This quantity is not available");
                    redirect("Shoping_cart/index");
                }

            }
        }
              
        //not use
        //ajax function to delete product from cart (view)
        function remove()
        {
            $this->load->library("cart");
            $row_id = $_POST["row_id"];
            $data = array(
                'rowid' => $row_id,
                'qty' => 0
            );
            $this->cart->update($data);
            echo $this->view();

        }
 

        function allproduct(){
            $data["product"] = $this->shoping_cart_model->fetch_all();
            $data["color"] = $this->product_model->fetch_color();
            // $data["color"] = $this->product_model->fetch_colorItem();
            $this->load->view('templates/header');
            $this->load->view('admin/index',$data);
            $this->load->view('templates/footer');
        }
        //delete from admin
        public function delete($id)
        {   
            $this->shoping_cart_model->delete_product($id);
            $this->allproduct();
        }

        //delete order from user
        public function deleteOrder($id)
        {
            $user_id = $_SESSION['user_id'];
            $product_id = $id;
            $color_id=$_POST['color_id'];
            $this->shoping_cart_model->deleteOrder($user_id,$product_id,$color_id);
            $this->cart();
        }

        public function clearAllCart($user_id){
            // print_r($id);
            $this->shoping_cart_model->clearAllCart($user_id);
            $this->cart();
        }
        
    } 