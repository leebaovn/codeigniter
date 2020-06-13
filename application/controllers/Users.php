<?php
	class Users extends CI_Controller{
		
		public function __construct()
		{
			parent::__construct();
			$this->data['uri'] = uri_string();
		}
		
		
		public function register(){
			$this->data['title'] = 'Đăng ký';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header',$this->data);
				$this->load->view('users/register', $this->data);
				$this->load->view('templates/footer');
			} else {
				// Mã hóa pw
				$enc_password = md5($this->input->post('password'));

				$this->user_model->register($enc_password);

				$this->session->set_flashdata('user_registered', 'Bạn đã đăng ký thành công và có thể đăng nhập.');

				redirect('users/login');
			}
		}

	
		public function login(){
			$this->data['title'] = 'Đăng nhập';
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header', $this->data);
				$this->load->view('users/login', $this->data);
				$this->load->view('templates/footer');
			} else {
				
				// Get username
				$username = $this->input->post('username');
				// Get and encrypt the password
				$password = md5($this->input->post('password'));

				// Login user
				$user_id = $this->user_model->login($username, $password);

				if($user_id){
					// Create session
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);

					// Set message
					$this->session->set_flashdata('user_loggedin', 'Đăng nhập thành công.');

					redirect('posts');
				} else {
					// Set message
					$this->session->set_flashdata('login_failed', 'Đăng nhập thất bại.');

					redirect('users/login');
				}		
			}
		}

		// Log user out
		public function logout(){
			// Unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			// Set message
			$this->session->set_flashdata('user_loggedout', 'Bạn đã đăng xuất.');

			redirect('users/login');
		}

		// Check if username exists
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'Tài khoản này đã tồn tại. Vui lòng chọn một tài khoản khác.');
			if($this->user_model->check_username_exists($username)){
				return true;
			} else {
				return false;
			}
		}

		// Check if email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'Email này đã tồn tại. Vui lòng đăng ký với email khác.');
			if($this->user_model->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}
	}