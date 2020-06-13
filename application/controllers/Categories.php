<?php
	class Categories extends CI_Controller{
		
		public function __construct()
		{
			parent::__construct();
			$this->data['uri'] = uri_string();
		}
		
		public function index(){
			$this->data['title'] = 'Danh mục';
			$this->data['categories'] = $this->category_model->get_categories();
			$this->load->view('templates/header', $this->data);
			$this->load->view('categories/index', $this->data);
			$this->load->view('templates/footer');
		}

		public function create(){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}
			
			$this->data['title'] = 'Thêm danh mục';
			// $this->data['uri'] = "categories";
			$this->form_validation->set_rules('name', 'Name', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header',$this->data);
				$this->load->view('categories/create', $this->data);
				$this->load->view('templates/footer');
			} else {
				$this->category_model->create_category();
				$this->session->set_flashdata('category_created', 'Danh mục của bạn đã tạo.');
				redirect('categories');
			}
		}

		public function posts($id){
			$this->data['title'] = $this->category_model->get_category($id)->name;
			$this->data['posts'] = $this->post_model->get_posts_by_category($id);
			$this->data['categories'] = $this->post_model->get_categories();
			$this->load->view('templates/header', $this->data);
			$this->load->view('posts/index', $this->data);
			$this->load->view('templates/footer');
		}

		public function delete($id){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->category_model->delete_category($id);

			$this->session->set_flashdata('category_deleted', 'Danh mục của bạn đã bị xóa');

			redirect('categories');
		}
	}