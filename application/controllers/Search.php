<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('post_model');
        $this->data['uri'] = uri_string();
    }
    
    public function index()
    {
        $keyword = $this->input->post('search');
        $this->data['posts'] = $this->post_model->search($keyword);
        $this->data['title'] = "Tìm kiếm";
        $this->data['keyword'] = $keyword;
        $this->load->view('templates/header', $this->data);
        $this->load->view('search', $this->data);
        $this->load->view('templates/footer');
        
    }
    
}

/* End of file Search.php */
