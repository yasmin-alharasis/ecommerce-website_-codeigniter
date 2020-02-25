<?php

class shoping_cart_model extends CI_Model
{
    function fetch_all()
    {
        $query = $this->db->get("product");
        return $query->result_array();
    }

    function fetch_all_item($id)
    {   
        $query = $this->db->get("order");
        $query = $this->db->get_where('order',array('user_id' => $id));
        return $query->result_array();
        // return $query->row_array();

    }

    //add product from admin
    public function create_product()
    {   
        $file_data = $this->upload->data();
        //$data['img'] = base_url().'/upload/'.$file_data['file_name'];
        $data['img'] =$file_data['file_name'];

        $data = array(
            'category_id'=> $this->input->post('category_id'),
            'pname' => $this->input->post('pname'),
            'price' => $this->input->post('price'),
            'image' => $data['img'],     
            'description' => $this->input->post('description')     
        );
        // $d = array(
        //     'product_id'=>
        //     'color_id'=>
        //     'qty'=>
        // )
        $this->db->insert('product',$data);
        
    }
    
    //when user add product to cart that will save data poduct in table order
    public function cartTodb(){
        $product_id = $this->input->post('product_id');
        $product_name = $this->input->post('product_name');
        $product_price = $this->input->post('product_price');
        $quantity = $this->input->post('quantity');

        $data = array(
            'product_id' => $product_id,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'quantity' => $quantity
        );
        return $this->db->insert('order',$data);
    }
    
    //delete product from admin
    public function delete_product($id){
        $this->db->where('id',$id);
        $this->db->delete('product');
        return true;
    }

    // public function delete_posts($id)
    //     {
    //         $this->db->where('id',$id);
    //         $this->db->delete('posts');
    //         return true;
    //     }

    public function delete_order($id)
        {
            $this->db->where('OrderId',$id);
            $this->db->delete('order');
            return true;
        }
    public function deleteOrder($user_id,$product_id){
        $this->db->where(array('user_id' => $user_id,'product_id' => $product_id));  
        $this->db->delete('order');
        return true;
    }
    public function clearAllCart($user_id){
        $this->db->where(array('user_id'=>$user_id));
        $this->db->delete('order');
        return true;
    }

}

?>
