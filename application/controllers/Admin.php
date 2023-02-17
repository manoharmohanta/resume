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
			// $this->db->where('status', 1);
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
	public function get_role(){
		$role_id = $this->security->xss_clean($this->input->post('roleId'));

		$this->db->where('role_id', ($role_id));
		$this->db->where('status', 1);
		$roles = $this->db->get('role');
		if($roles->num_rows() >0){
			$result= array(
				'data' => $roles->row_array(),
				'msg'=> 'This role title already exists',
				'status' => 1,
			);
		}else{
			$result= array(
				'msg'=> 'Invalid Data Provided',
				'status' => 0,
			);
		}
		echo json_encode($result); exit();
	}
	public function submit_role(){
		if($this->islogin()){
			$role_tilte = strtolower($this->security->xss_clean($this->input->post('roleName')));
			$role_id = $this->security->xss_clean($this->input->post('roleId'));
			$operation = $this->security->xss_clean($this->input->post('operation'));

			if($operation == 'add'){
				$this->db->where('role_title', strtolower($role_tilte));
				$this->db->where('status', 1);
				$roles = $this->db->get('role');
				if($roles->num_rows() >0 && empty($role_id)){
					$result= array(
						'msg'=> 'This role title already exists',
						'status' => 0,
					);
				}else{
					if(empty($role_id)){
						$data = array(
							'role_title' => strtolower($role_tilte),
							'role_created' => date('Y-m-d'),
						);
						$this->db->insert('role',$data);
						$result= array(
							'msg'=> 'Role has Added Successfully',
							'status' => 1,
						);
					}else{
						$data = array(
							'role_title' => strtolower($role_tilte),
							'role_created' => date('Y-m-d'),
						);
						$this->db->where('role_id', $role_id);
						$this->db->update('role',$data);
						$result= array(
							'msg'=> 'Role has Updated Successfully',
							'status' => 1,
						);
					}
				}
			}elseif($operation == 'delete'){
				if(empty($role_id)){
					$result= array(
						'msg'=> 'Please try Again',
						'status' => 0,
					);
				}else{
					$this->db->where('role_id', $role_id);
					$role = $this->db->get('role')->row_array();
					if($role['status'] == 1){
						$this->db->set('status', 0);
						$this->db->where('role_id', $role_id);
						$this->db->update('role');
						$result= array(
							'msg'=> 'Role has Deleted Successfully',
							'status' => 1,
						);
					}else{
						$this->db->set('status', 1);
						$this->db->where('role_id', $role_id);
						$this->db->update('role');
						$result= array(
							'msg'=> 'Role has Retrived Successfully',
							'status' => 1,
						);
					}
				}
			}else{
				$result = array(
					'msg' => 'Please provide correct opertion code',
					'status' => 0,
				);
			}
			echo json_encode($result); exit();
		}
	}
	public function blog(){
		if($this->islogin()){
			$this->load->view('include/a-header');
			$this->load->view('admin/blog');
			$this->load->view('include/a-footer');
		}
	}
	public function create_blog(){
		if($this->islogin()){
			$this->load->view('include/a-header');
			$this->load->view('admin/create_blog');
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
