<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	 * Here the website code with login
	 */
	public function index(){
		if($this->islogin()){
			$this->load->view('include/a-header');
			$this->load->view('admin/main');
			$this->load->view('include/a-footer');
		}
	}
	public function lor(){
		if($this->islogin()){
			$this->load->view('include/a-header');
			$this->load->view('admin/blank');
			$this->load->view('include/a-footer');
		}
	}
	public function resume(){
		if($this->islogin()){
			$this->load->view('include/a-header');
			$this->load->view('admin/blank');
			$this->load->view('include/a-footer');
		}
	}
	public function sop(){
		if($this->islogin()){
			$this->load->view('include/a-header');
			$this->load->view('admin/blank');
			$this->load->view('include/a-footer');
		}
	}
	public function payments(){
		if($this->islogin()){
			$this->load->view('include/a-header');
			$this->load->view('admin/blank');
			$this->load->view('include/a-footer');
		}
	}
	public function course_finder(){
		if($this->islogin()){
			$this->load->view('include/a-header');
			$this->load->view('admin/blank');
			$this->load->view('include/a-footer');
		}
	}
	public function coupon(){
		if($this->islogin()){
			$this->load->view('include/a-header');
			$this->load->view('admin/blank');
			$this->load->view('include/a-footer');
		}
	}
	public function package(){
		if($this->islogin()){
			$this->load->view('include/a-header');
			$this->load->view('admin/blank');
			$this->load->view('include/a-footer');
		}
	}
	public function user_payment(){
		if($this->islogin()){
			$this->load->view('include/a-header');
			$this->load->view('admin/blank');
			$this->load->view('include/a-footer');
		}
	}
	public function template(){
		if($this->islogin()){
			$this->load->view('include/a-header');
			$this->load->view('admin/blank');
			$this->load->view('include/a-footer');
		}
	}
	public function role(){
		if($this->islogin()){
			$this->db->where('status', 1);
			$roles = $this->db->get('role')->result_array();
			$details = array(
				'page_name' => 'Roles',
				'roles' => $roles,
			);
			$this->load->view('include/a-header');
			$this->load->view('admin/roles', $details);
			$this->load->view('include/a-footer');
		}
	}
	public function blog(){
		if($this->islogin()){
			$this->load->view('include/a-header');
			$this->load->view('admin/blank');
			$this->load->view('include/a-footer');
		}
	}
	public function profile(){
		if($this->islogin()){
			$this->load->view('include/a-header');
			$this->load->view('admin/blank');
			$this->load->view('include/a-footer');
		}
	}

	//My functions
    function my_simple_crypt( $string, $action = 'e' ) {
		// you may change these values to your own
		$secret_key = 'my_simple_secret_key';
		$secret_iv = 'my_simple_secret_iv';
	 
		$output = false;
		$encrypt_method = "AES-256-CBC";
		$key = hash( 'sha256', $secret_key );
		$iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
	 
		if( $action == 'e' ) {
			$output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
		}
		else if( $action == 'd' ){
			$output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
		}
	 
		return $output;
	}

    private function islogin(){
        if(!empty($this->session->userdata('user_id'))){
            return true;
        }else{
            header('Location: '.base_url().'api/logout');
        }
    }

    private function isHTML($string){
		return ($string != strip_tags($string));
	}
	
}
