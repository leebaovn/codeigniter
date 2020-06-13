<?php  
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Like_model extends CI_Model {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        
        public function add_like($user_id,$post_id){
            $query = $this->db->get_where('likes', array('user_id' => $user_id, 'post_id'=>$post_id));
            if($query->num_rows() > 0 ){
                return FALSE;
            }else{
                $data=array(
                    'user_id' =>$user_id,
                    'post_id' =>$post_id
                );
                return $this->db->insert("likes", $data);
            }
        }

        public function count_like($post_id){
            $query = $this->db->get_where('likes', array('post_id'=>$post_id));
            return $query->num_rows();
            
        }
    
    }
    
    /* End of file Like_model.php */
    