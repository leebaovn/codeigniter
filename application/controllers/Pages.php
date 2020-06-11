<?php
	class Pages extends CI_Controller{
		public function view($page = 'home'){
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}
			$data['posts'] = $this->post_model->get_posts_by_time(FALSE, 5);
			$cate = $this->category_model->get_latest_category();
			$data['category_posts'] = $this->post_model->get_posts_by_category(1);
			$data['title'] = ucfirst($page);
			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
		}
	}