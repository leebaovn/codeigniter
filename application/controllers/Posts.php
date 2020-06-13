<?php
	class Posts extends CI_Controller{
		// public $this->data = array();
		public function __construct()
		{
			parent::__construct();
			$this->data['uri'] = uri_string();
		}
		
		public function index($offset = 0){	
			if(isset($_SESSION['user_id'])){
				$this->user_posts($_SESSION['user_id']);
			}
			else{
				// Cấu hình phân trang	
			$config['base_url'] = base_url() . 'posts/index/';
			$config['total_rows'] = $this->db->count_all('posts');
			$config['per_page'] = 4;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'pagination-link');

			// Tạo phân trang
			$this->pagination->initialize($config);

			$this->data['title'] = 'Bài viết mới';
			$this->data['posts'] = $this->post_model->get_posts(FALSE, $config['per_page'], $offset);
			$this->data['categories']= $this->post_model->get_categories();
			$this->load->view('templates/header',$this->data);
			$this->load->view('posts/index', $this->data);
			$this->load->view('templates/footer');
			}
		}

		public function user_posts($user_id = 1){
			$user_id = $_SESSION['user_id'];
			$this->data['title'] = 'Trang cá nhân';
			$this->data['posts'] = $this->post_model->get_posts_by_users($user_id);
			$this->data['categories'] = $this->category_model->get_categories_by_user($user_id);
			$this->load->view('templates/header', $this->data);
			$this->load->view('posts/user', $this->data);
			$this->load->view('templates/footer');
		}

		public function view($slug = NULL){
			$this->data['post'] = $this->post_model->get_posts($slug);
			$post_id = $this->data['post']['id'];
			$this->data['likes'] = $this->like_model->count_like($post_id);
			$this->data['comments'] = $this->comment_model->get_comments($post_id);
			if(empty($this->data['post'])){
				show_404();
			}
			$this->data['title'] = $this->data['post']['title'];
			$this->post_model->update_post_view($slug);
			$this->load->view('templates/header', $this->data);
			$this->load->view('posts/view', $this->data);
			$this->load->view('templates/footer');
		}

		public function create(){
			
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->data['title'] = 'Tạo bài viết mới';
			$this->data['categories'] = $this->post_model->get_categories();

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header', $this->data);
				$this->load->view('posts/create', $this->data);
				$this->load->view('templates/footer');
			} else {
				// Upload Image
				$config['upload_path'] = './assets/images/posts';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors = array('error' => $this->upload->display_errors());
					$post_image = 'default.jpg';
				} else {
					$this->data = array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}

				$this->post_model->create_post($post_image);

				$this->session->set_flashdata('post_created', 'Tạo mới bài viết thành công.');

				redirect('posts');
			}
		}

		public function delete($id){
	
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->post_model->delete_post($id);


			$this->session->set_flashdata('post_deleted', 'Bài viết của bạn đã xóa.');

			redirect('posts');
		}

		public function edit($slug){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->data['post'] = $this->post_model->get_posts($slug);

		
			if($this->session->userdata('user_id') != $this->post_model->get_posts($slug)['user_id']){
				redirect('posts');

			}

			$this->data['categories'] = $this->post_model->get_categories();

			if(empty($this->data['post'])){
				show_404();
			}

			$this->data['title'] = 'Chỉnh sửa bài viết';
			$this->load->view('templates/header', $this->data);
			$this->load->view('posts/edit', $this->data);
			$this->load->view('templates/footer');
		}

		public function update(){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->post_model->update_post();

			$this->session->set_flashdata('post_updated', 'Bài viết của bạn đã được cập nhật.');

			redirect('posts');
		}
	}