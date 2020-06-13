<?php
	class Pages extends CI_Controller{
		
		public function __construct()
		{
			parent::__construct();
			$this->data['uri'] = uri_string();
		}
		
		public function view($page = 'home'){
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}

			$this->data['title'] = ucfirst($page);
			$this->load->view('templates/header',$this->data);
			$this->load->view('pages/'.$page, $this->data);
			$this->load->view('templates/footer');
		}
	}