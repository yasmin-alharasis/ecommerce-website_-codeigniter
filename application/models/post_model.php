<?php
    class post_model extends CI_Model
    {   
        
        public function __constract()
        {
            $this->load->database();
           
        }
        
        public function get_posts($slug = FALSE)
        {
            if($slug === FALSE)
            {
                $this->db->order_by('id','DESC');
                $query = $this->db->get('posts');
                return $query->result_array();
            }
            $query = $this->db->get_where('posts',array('slug' => $slug));
            return $query->row_array();
           
            
        }

        public function create_post()
        {
            $slug = url_title($this->input->post('title'));

            $data = array(
                'title'=> $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body')
            );
            return $this->db->insert('posts',$data);
        }

        public function delete_posts($id)
        {
            $this->db->where('id',$id);
            $this->db->delete('posts');
            return true;
        }

        public function update_post(){
            $id = $this->input->post('id');
            $this->db->where('id',$id);
            $slug = url_title($this->input->post('title'));
            $data = array(
                'title'=> $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body')
            );
            return $this->db->update('posts',$data);

        }
      
    }


?>