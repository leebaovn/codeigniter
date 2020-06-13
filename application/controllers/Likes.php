<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Likes extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        // $this->load->model("like_model");
    }
    
    public function create($post_id)
    {
        
        if($this->session->userdata("user_id")){
            $user_id = $this->session->userdata("user_id");
            $slug = $this->input->post('slug');
            if($this->like_model->add_like($user_id,$post_id) === FALSE){
                $this->session->set_flashdata('liked', 'Bạn đã thích bài viết này rồi.');
            }
            redirect('posts/'.$slug,'refresh');
            
        }
    }

}

/* End of file Like.php */
