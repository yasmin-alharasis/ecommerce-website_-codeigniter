<?php
    class product_model extends CI_Model
    {   
       public function fetch_product($id = FALSE)
       {    
           if($id == FALSE)
           {    
                $this->db->order_by('id','DESC');
                $query = $this->db->get("product");
                return $query->result_array();
           }
            $query = $this->db->get_where('product',array('id' => $id));
            return $query->row_array();
       }

       public function fetch_color()
       {
            $query = $this->db->get("product_color");
            return $query->result_array();
       }
    }

?>