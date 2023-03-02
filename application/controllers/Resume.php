<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resume extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 * 
	 * Here the website code without login
	 */
	public function index(){
		$this->load->view('include/header');
		$this->load->view('website/main');
		$this->load->view('include/footer');
	}

	public function login(){
		$this->load->view('website/login');
	}

	public function register(){
		$this->load->view('website/register');
	}

	public function forgot(){
		$this->load->view('website/forgot');
	}

	public function resume_template(){
		$this->load->view('include/header');
		$this->load->view('website/resume-template');
		$this->load->view('include/footer');
	}

	public function create_resume(){
		$this->load->view('include/header');
		$this->load->view('website/create-resume');
		$this->load->view('include/footer');
	}

	public function create_statement_of_purpose(){
		$this->load->view('website/forgot');
	}

	public function blog_details(){
		$this->db->join('user', 'user.user_id=blog.user_id');
		$this->db->limit(1);
		$response['data'] = $this->db->get('blog')->row_array();
		$this->load->view('include/header');
		$this->load->view('website/blog-details',$response);
		$this->load->view('include/footer');
	}
}
