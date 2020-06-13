
<?php
	class Post_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_posts($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
				$this->db->order_by('posts.id', 'DESC');
				// $this->db->join('categories', 'categories.id = posts.category_id');
				$query = $this->db->get('posts');
				return $query->result_array();
			}

			$query = $this->db->get_where('posts', array('slug' => $slug));
			return $query->row_array();
		}
		public function get_posts_by_views($slug = FALSE, $limit =FALSE , $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
				$this->db->order_by('view', 'DESC');
				$this->db->join('users', 'users.id = posts.user_id');
				$query = $this->db->get('posts');
				return $query->result_array();
			}
			$query = $this->db->get_where('posts', array('slug' => $slug));
			return $query->row_array();
		}
		public function get_posts_by_time($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			if($slug === FALSE){
				$this->db->order_by('created_at', 'DESC');
				$query = $this->db->get('posts');
				return $query->result_array();
			}
			$query = $this->db->get_where('posts', array('slug' => $slug));
			return $query->row_array();
		}
		public function get_posts_by_users($user_id = 1,$slug = FALSE,$limit = FALSE){
			if($limit){
				$this->db->limit(4, 0);
			}
			if($slug === FALSE){
				$this->db->order_by('created_at', 'DESC');
				$query = $this->db->get_where('posts',array('user_id'=> $user_id));
				return $query->result_array();
			}
			$query = $this->db->get_where('posts', array('slug' => $slug));
			return $query->row_array();
		}
		public function create_post($post_image){
			$slug = url_title(convert_accented_characters($this->input->post('title')));

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body'),
				'category_id' => $this->input->post('category_id'),
				'user_id' => $this->session->userdata('user_id'),
				'post_image' => $post_image,
				'view' => 0
			);

			return $this->db->insert('posts', $data);
		}

		public function delete_post($id){
			$image_file_name = $this->db->select('post_image')->get_where('posts', array('id' => $id))->row()->post_image;
			$cwd = getcwd(); 
			$image_file_path = $cwd."\\assets\\images\\posts\\";
			chdir($image_file_path);
			unlink($image_file_name);
			chdir($cwd); 
			$this->db->where('id', $id);
			$this->db->delete('posts');
			return true;
		}
		public function update_post_view($slug){
			$sql = "SELECT * FROM posts WHERE slug = ?";
			$query = $this->db->query($sql, $slug);
			$res = $query->result_array();
			$view = $res[0]['view'] + 1;
			$data = array(
				'view' => $view
			);
			$this->db->where('id',$res[0]['id']);
			return $this->db->update('posts', $data);
		}
		public function update_post(){
			$slug = url_title($this->input->post('title'));

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body'),
				'category_id' => $this->input->post('category_id')
			);

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('posts', $data);
		}

		public function get_categories(){
			$this->db->order_by('name');
			$query = $this->db->get('categories');
			return $query->result_array();
		}

	
	}