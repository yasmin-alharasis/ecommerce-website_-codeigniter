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
        
        // public function index($id){

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
        
        function add()
        {   
            
            // $this->load->library("cart");
            // $data = array(
            //     "id" => $_POST["product_id"],
            //     "name" => $_POST["product_name"],
            //     "qty" =>$_POST["quantity"],
            //     "price" => $_POST["product_price"],
            // );
            // $this->cart->insert($data);
            // echo $this->view();

        }

        function cartTodb(){

            $this->load->library('session');
            if(isset($_POST['add_cart'])){
            
                $user_id = $_POST['user_id'];
                $product_id = $_POST['product_id'];
                $quentity = $_POST['quentity'];

                $data = array(
                    'quantity' =>$_POST['quentity'],
                );

                $d= array(
                    'user_id' => $_POST['user_id'],
                    'product_id'=>$_POST['product_id'],
                    'product_name' => $_POST['pname'],
                    'product_price' =>$_POST['price'],
                    'quantity' =>$_POST['quentity'],
                );

                $this->db->select('quantity');
                $this->db->from('order');
                $row=$this->db->where(array( 
                    'user_id' => $user_id,
                    'product_id'=>$product_id,
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
                }else{
                    $this->db->set($d);
                    $this->db->insert('order',$d);
                }
                redirect('Shoping_cart/index'); 
                //$this->allproduct();
            }


        }
        //yet not working
        // function deleteFromdb($id){
        //     $this->load->library('session');
        //     if(isset($_POST['removeItem'])){
        //         $user_id = $_POST['user_id'];
        //         // $product_id = $_POST['product_id'];
        //         $product_id = $id;

        //         $data = array(
        //             'quantity' =>'0',
        //             'deleted_at' =>date("Y-m-d"),
        //         );

        //         $this->db->select('quantity','deleted_at');
        //         $this->db->from('order');
        //         $row=$this->db->where(array( 
        //             'user_id' => $user_id,
        //             'product_id'=>$product_id
        //         ));

        //         $query = $this->db->get();
        //         $row = $query->row();
        //         //$row = $this->db->insert('order',$data);
        //         if(isset($row)){
        //             $this->db->where(array(
        //                 'user_id' => $user_id,
        //                 'product_id' => $product_id
        //             ));
        //             $this->db->set($data);
        //             $this->db->update('order',$data);
        //         }
        //         alert('deleted');
        //     }
        // }

 
        
        function load()
        {     
            echo $this->view();
        }

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
        //ajax function to remove all item in cart
        function clear()
        {
            $this->load->library("cart");
            $this->cart->destroy();
            echo $this->view();
        }

        //ajax funtion to show cart details in view page
        function view()
        {
        //     $this->load->library("cart");
        //     $output = '';
        //     $output .= '
        //     <br/>
        //     <h3 align="center">Shopping Cart</h3><br/>
        //     <div class="table-responsive">
        //         <div align="right">
        //             <button type="button" id="clear_cart" class="btn btn-warning">
        //             Clear Cart
        //             </button>
        //         </div>
        //         <br/>
        //         <table class="table tabel-bordered">
        //             <tr>
        //                 <th width="40%">Name</th>
        //                 <th width="15%">Quantity</th>
        //                 <th width="15%">Price</th>
        //                 <th width="15%">Total</th>
        //                 <th width="15%">Action</th>
        //             </tr>
    
        //     ';
        //     $count = 0;
        //     foreach ($this->cart->contents() as $items)
        //     {
        //         $count++;
        //         // $var = "{$item['name']}"
        //         $output .= '
        //         <tr>
        //             <td>'.$items["name"].'</td>
        //             <td>'.$items["qty"].'</td>
        //             <td>'.$items["price"].'</td>
        //             <td>'.$items["subtotal"].'</td>
        //             <td><button type="button" name="remove" class="btn btn-danger btn-xs remove_inventory" id="'.$items["rowid"].'">Remove</button></td>
        //         </tr>
        //         ';
        //     }
        //     $output .='
        //         <tr>
        //             <td colspan="4" align="right">Total</td>
        //             <td>'.$this->cart->total().'</td>
        //          </tr>
        //          </table>
        //          </div>
                 
        //     ';
        //     if($count == 0)
        //     {
        //         $output = '<h3 align="center">Cart is Empty</h3>';
        //     }

            
        //     return $output;
        }

        function allproduct(){
            $data["product"] = $this->shoping_cart_model->fetch_all();
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
            $this->shoping_cart_model->deleteOrder($user_id,$product_id);
            $this->cart();
        }

        public function clearAllCart($user_id){
            // print_r($id);
            $this->shoping_cart_model->clearAllCart($user_id);
            $this->cart();
        }
        
    } 