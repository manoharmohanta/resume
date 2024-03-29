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
			$this->db->select('coupon.*,user.user_email,user.user_phone,user.first_name, user.user_name, user.last_name');
			$this->db->join('user', 'user.user_id=coupon.user_id');
			$dbResult = $this->db->get('coupon')->result_array();
			// print_r($dbResult); exit();
			$details = array(
				'page_name' => 'Coupons',
				'db_result' => $dbResult,
			);
			$this->load->view('include/a-header');
			$this->load->view('admin/coupon',$details);
			$this->load->view('include/a-footer');
		}
	}
	public function generate_coupon(){
		$user_id = strtolower($this->security->xss_clean($this->input->post('userId')));
		$coupon_id = strtolower($this->security->xss_clean($this->input->post('couponId')));
		$operation = $this->security->xss_clean($this->input->post('operation'));

		if($operation == 'add'){
			$this->db->where('user_id', $user_id);
			$this->db->where('status', 1);
			$blog = $this->db->get('coupon');
			if($blog->num_rows() >0 && empty($coupon_id)){
				$db_details = $blog->row_array();
				$result= array(
					'data' => $db_details['coupon_code'],
					'msg'=> 'This user already has a coupon code which is '.$db_details['coupon_code'],
					'status' => 0,
				);
			}else{
				$data = array(
					'coupon_code' => $this->generate_coupon_code(),
					'user_id' => ($this->session->userdata('user_id')),
					'coupon_created' => date('Y-m-d'),
				);
				$this->db->insert('coupon',$data);
				$result= array(
					'url' => base_url('admin/coupon'),
					'msg'=> 'Coupon has Generated Successfully which is '.$data['coupon_code'],
					'status' => 1,
				);
			}
		}elseif($operation == 'delete'){
			if(empty($coupon_id)){
				$result= array(
					'msg'=> 'Please try Again',
					'status' => 0,
				);
			}else{
				$this->db->where('coupon_id', $coupon_id);
				$blog = $this->db->get('coupon')->row_array();
				if($blog['status'] == 1){
					$this->db->set('status', 0);
					$this->db->where('coupon_id', $coupon_id);
					$this->db->update('coupon');
					$result= array(
						'msg'=> 'Coupon has Deleted Successfully',
						'status' => 1,
					);
				}else{
					$this->db->set('status', 1);
					$this->db->where('coupon_id', $coupon_id);
					$this->db->update('coupon');
					$result= array(
						'msg'=> 'Coupon has Retrived Successfully',
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
			$dbResult = $this->db->get('blog')->result_array();
			$details = array(
				'page_name' => 'Blogs',
				'db_result' => $dbResult,
			);
			$this->load->view('include/a-header');
			$this->load->view('admin/blog',$details);
			$this->load->view('include/a-footer');
		}
	}
	public function create_blog(){
		if($this->islogin()){
			if(empty($this->uri->segment(3))){
				$this->load->view('include/a-header');
				$this->load->view('admin/create_blog');
				$this->load->view('include/a-footer');
			}else{
				$this->db->where('blog_id', $this->uri->segment(3));
				$dbResult = $this->db->get('blog');
				if($dbResult->num_rows() > 0){
					$details = array(
						'page_name' => 'Update Blog',
						'db_result' => $dbResult->row_array(),
					);
					$this->load->view('include/a-header');
					$this->load->view('admin/create_blog', $details);
					$this->load->view('include/a-footer');
				}else{
					show_404();
				}
			}
		}
	}
	public function submit_blog(){
		if($this->islogin()){
			$blog_tilte = strtolower($this->security->xss_clean($this->input->post('blogName')));
			$blog_id = $this->security->xss_clean($this->input->post('blogId'));
			$blog_content = strip_tags($this->security->xss_clean($this->input->post('blogContent')), '<p><b><figure><table><td><tr><th><tbody><thead><span><br><ol><ul><li><blockquote>');
			$operation = $this->security->xss_clean($this->input->post('operation'));

			if($operation == 'add'){
				$this->db->where('blog_title', strtolower($blog_tilte));
				$this->db->where('status', 1);
				$blog = $this->db->get('blog');
				if($blog->num_rows() >0 && empty($blog_id)){
					$result= array(
						'msg'=> 'This Blog title already exists',
						'status' => 0,
					);
				}else{
					if(empty($blog_id)){
						$image_details = $this->upload('image'); 
						if($image_details['status'] == 0){
							$result = array(
								'msg' => $image_details['msg'],
								'status' => 0,
							);
						}else{
							if(!empty($blog_tilte)){
								$data = array(
									'blog_title' => strtolower($blog_tilte),
									'blog_content' => ($blog_content),
									'user_id' => ($this->session->userdata('user_id')),
									'blog_image' => $image_details['upload_data']['raw_name'].$image_details['upload_data']['file_ext'],
									'blog_created' => date('Y-m-d'),
								);
								$this->db->insert('blog',$data);
								$result= array(
									'url' => base_url('admin/blog'),
									'msg'=> 'Blog has Added Successfully',
									'status' => 1,
								);
							}else{
								$result= array(
									'msg'=> 'Enter Blog Title',
									'status' => 0,
								);
							}
						}						
					}else{
						if(!empty($blog_tilte)){
							$data = array(
								'blog_title' => strtolower($blog_tilte),
								'blog_content' => ($blog_content),
								'user_id' => ($this->session->userdata('user_id')),
								'blog_created' => date('Y-m-d'),
							);
							$image_details = $this->upload('image'); 
							if($image_details['status'] == 1){
								$data['blog_image'] = $image_details['upload_data']['raw_name'].$image_details['upload_data']['file_ext'];
							}
							$this->db->where('blog_id', $blog_id);
							$this->db->update('blog',$data);
							$result= array(
								'url' => base_url('admin/blog'),
								'msg'=> 'Blog has Updated Successfully',
								'status' => 1,
							);
						}else{
							$result= array(
								'msg'=> 'Enter Blog Title',
								'status' => 0,
							);
						}
					}
				}
			}elseif($operation == 'delete'){
				if(empty($blog_id)){
					$result= array(
						'msg'=> 'Please try Again',
						'status' => 0,
					);
				}else{
					$this->db->where('blog_id', $blog_id);
					$blog = $this->db->get('blog')->row_array();
					if($blog['status'] == 1){
						$this->db->set('status', 0);
						$this->db->where('blog_id', $blog_id);
						$this->db->update('blog');
						$result= array(
							'msg'=> 'Blog has Deleted Successfully',
							'status' => 1,
						);
					}else{
						$this->db->set('status', 1);
						$this->db->where('blog_id', $blog_id);
						$this->db->update('blog');
						$result= array(
							'msg'=> 'Blog has Retrived Successfully',
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

	public function profile(){
		if($this->islogin()){
			$this->db->where('user_id', $this->session->userdata('user_id'));
			$this->db->where('status', 1);
			$this->db->limit(1);
			$roles = $this->db->get('user')->row_array();

			$this->db->where('user_id', $this->session->userdata('user_id'));
			$this->db->where('status', 1);
			$education = $this->db->get('education')->result_array();

			$this->db->where('user_id', $this->session->userdata('user_id'));
			$this->db->where('status', 1);
			$skill = $this->db->get('skill')->result_array();

			$this->db->where('user_id', $this->session->userdata('user_id'));
			$this->db->where('status', 1);
			$organization = $this->db->get('organization')->result_array();

			$details = array(
				'page_name' => 'My Profile',
				'db_results' => $roles,
				'education' => $education,
				'skill' => $skill,
				'organization' => $organization,
			);
			$this->load->view('include/a-header');
			$this->load->view('admin/profile',$details);
			$this->load->view('include/a-footer');
		}
	}
	public function submit_profile(){
		if($this->islogin()){
			$first_name = strtolower($this->security->xss_clean($this->input->post('first_name')));
			$last_name = $this->security->xss_clean($this->input->post('last_name'));
			$user_phone = ($this->security->xss_clean($this->input->post('user_phone')));
			$user_gender = $this->security->xss_clean($this->input->post('user_gender'));
			$user_address_1 = $this->security->xss_clean($this->input->post('user_address_1'));
			$user_address_2 = $this->security->xss_clean($this->input->post('user_address_2'));
			$user_state = $this->security->xss_clean($this->input->post('user_state'));
			$user_city = $this->security->xss_clean($this->input->post('user_city'));
			// $skill_name = $this->security->xss_clean($this->input->post('skill_name'));
			// $skill_percentage = $this->security->xss_clean($this->input->post('skill_percentage'));
			// $university_name = $this->security->xss_clean($this->input->post('university_name'));
			// $university_location = $this->security->xss_clean($this->input->post('university_location'));
			// $degree_name = $this->security->xss_clean($this->input->post('degree_name'));
			// $university_from_date = $this->security->xss_clean($this->input->post('university_from_date'));
			// $university_to_date = $this->security->xss_clean($this->input->post('university_to_date'));
			// $organization_name = $this->security->xss_clean($this->input->post('organization_name'));
			// $organization_location = $this->security->xss_clean($this->input->post('organization_location'));
			// $organization_designation = $this->security->xss_clean($this->input->post('organization_designation'));
			// $organization_from_date = $this->security->xss_clean($this->input->post('organization_from_date'));
			// $organization_to_date = $this->security->xss_clean($this->input->post('organization_to_date'));
			$operation = $this->security->xss_clean($this->input->post('operation'));

			if($operation == 'add'){
				$user_id = $this->session->userdata('user_id');
				if(!empty($user_id)){
					if(!empty($first_name)){
						$data = array(
							'first_name' => strtolower($first_name),
							'last_name' => strtolower($last_name),
							'user_phone' => strtolower($user_phone),
							'user_gender' => strtolower($user_gender),
							'user_address_1' => strtolower($user_address_1),
							'user_address_2' => strtolower($user_address_2),
							'user_state' => strtolower($user_state),
							'user_city' => strtolower($user_city),
							'user_created' => date('Y-m-d'),
						);
						$image_details = $this->upload('profile-image');
						if($image_details['status'] == 1){
							$data['user_image'] = $image_details['upload_data']['raw_name'].$image_details['upload_data']['file_ext'];
						}else{
						}
						$this->db->where('user_id', $user_id);
						$this->db->update('user',$data);
						$result= array(
							'msg'=> 'User details Updated Successfully',
							'status' => 1,
						);
					}else{
						$result= array(
							'msg'=> 'Enter Your Details',
							'status' => 0,
						);
					}				
				}else{
					$result= array(
						'msg'=> 'Please Logout and try to login again',
						'status' => 0,
					);
				}
			}elseif($operation == 'delete'){
				if(empty($blog_id)){
					$result= array(
						'msg'=> 'Please try Again',
						'status' => 0,
					);
				}else{
					$this->db->where('blog_id', $blog_id);
					$blog = $this->db->get('blog')->row_array();
					if($blog['status'] == 1){
						$this->db->set('status', 0);
						$this->db->where('blog_id', $blog_id);
						$this->db->update('blog');
						$result= array(
							'msg'=> 'Blog has Deleted Successfully',
							'status' => 1,
						);
					}else{
						$this->db->set('status', 1);
						$this->db->where('blog_id', $blog_id);
						$this->db->update('blog');
						$result= array(
							'msg'=> 'Blog has Retrived Successfully',
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
	public function submit_education(){
		if($this->islogin()){
			$university_name = $this->security->xss_clean($this->input->post('university_name'));
			$university_location = $this->security->xss_clean($this->input->post('university_location'));
			$degree_name = $this->security->xss_clean($this->input->post('degree_name'));
			$university_from_date = $this->security->xss_clean($this->input->post('university_from_date'));
			$university_to_date = $this->security->xss_clean($this->input->post('university_to_date'));
			$id = $this->security->xss_clean($this->input->post('id'));
			// $skill_percentage = $this->security->xss_clean($this->input->post('skill_percentage'));
			// $organization_name = $this->security->xss_clean($this->input->post('organization_name'));
			// $organization_location = $this->security->xss_clean($this->input->post('organization_location'));
			// $organization_designation = $this->security->xss_clean($this->input->post('organization_designation'));
			// $organization_from_date = $this->security->xss_clean($this->input->post('organization_from_date'));
			// $organization_to_date = $this->security->xss_clean($this->input->post('organization_to_date'));
			
			$operation = $this->security->xss_clean($this->input->post('operation'));

			if($operation == 'add'){
				$user_id = $this->session->userdata('user_id');
				if(!empty($user_id)){
					if(!empty($university_name)){
						if(!empty($id)){
							$data = array(
								'university_name' => strtolower($university_name),
								'university_location' => strtolower($university_location),
								'education_from_date' => strtolower($university_from_date),
								'education_to_date' => strtolower($university_to_date),
								'user_id' => ($user_id),
								'degree_name' => strtolower($degree_name),
								// 'user_state' => strtolower($user_state),
								// 'user_city' => strtolower($user_city),
								'education_created' => date('Y-m-d'),
							);
							$this->db->where('education_id', $id);
							$this->db->update('education',$data);
							$result= array(
								'msg'=> 'Education details Updated Successfully',
								'status' => 1,
							);
						}else{
							$data = array(
								'university_name' => strtolower($university_name),
								'university_location' => strtolower($university_location),
								'education_from_date' => strtolower($university_from_date),
								'education_to_date' => strtolower($university_to_date),
								'user_id' => ($user_id),
								'degree_name' => strtolower($degree_name),
								// 'user_state' => strtolower($user_state),
								// 'user_city' => strtolower($user_city),
								'education_created' => date('Y-m-d'),
							);
							$this->db->insert('education',$data);
							$result= array(
								'msg'=> 'Education details Added Successfully',
								'status' => 1,
							);
						}
						
					}else{
						$result= array(
							'msg'=> 'Enter Your Details',
							'status' => 0,
						);
					}				
				}else{
					$result= array(
						'msg'=> 'Please Logout and try to login again',
						'status' => 0,
					);
				}
			}elseif($operation == 'delete'){
				if(empty($blog_id)){
					$result= array(
						'msg'=> 'Please try Again',
						'status' => 0,
					);
				}else{
					$this->db->where('blog_id', $blog_id);
					$blog = $this->db->get('blog')->row_array();
					if($blog['status'] == 1){
						$this->db->set('status', 0);
						$this->db->where('blog_id', $blog_id);
						$this->db->update('blog');
						$result= array(
							'msg'=> 'Blog has Deleted Successfully',
							'status' => 1,
						);
					}else{
						$this->db->set('status', 1);
						$this->db->where('blog_id', $blog_id);
						$this->db->update('blog');
						$result= array(
							'msg'=> 'Blog has Retrived Successfully',
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
	public function submit_skill(){
		if($this->islogin()){
			$skill_name = $this->security->xss_clean($this->input->post('skill_name'));
			$skill_percentage = $this->security->xss_clean($this->input->post('skill_percentage'));
			$id = $this->security->xss_clean($this->input->post('id'));
			// $organization_location = $this->security->xss_clean($this->input->post('organization_location'));
			// $organization_designation = $this->security->xss_clean($this->input->post('organization_designation'));
			// $organization_from_date = $this->security->xss_clean($this->input->post('organization_from_date'));
			// $organization_to_date = $this->security->xss_clean($this->input->post('organization_to_date'));
			
			$operation = $this->security->xss_clean($this->input->post('operation'));

			if($operation == 'add'){
				$user_id = $this->session->userdata('user_id');
				if(!empty($user_id)){
					if(!empty($skill_name)){
						if(!empty($id)){
							$data = array(
								'skill_name' => strtolower($skill_name),
								'skill_percentage' => strtolower($skill_percentage),
								'user_id' => strtolower($user_id),
								// 'user_gender' => strtolower($user_gender),
								// 'user_address_1' => strtolower($user_address_1),
								// 'user_address_2' => strtolower($user_address_2),
								// 'user_state' => strtolower($user_state),
								// 'user_city' => strtolower($user_city),
								'skill_created' => date('Y-m-d'),
							);
							$this->db->where('skill_id', $id);
							$this->db->update('skill',$data);
							$result= array(
								'msg'=> 'Skill details Updated Successfully',
								'status' => 1,
							);
						}else{
							$data = array(
								'skill_name' => strtolower($skill_name),
								'skill_percentage' => strtolower($skill_percentage),
								'user_id' => strtolower($user_id),
								// 'user_gender' => strtolower($user_gender),
								// 'user_address_1' => strtolower($user_address_1),
								// 'user_address_2' => strtolower($user_address_2),
								// 'user_state' => strtolower($user_state),
								// 'user_city' => strtolower($user_city),
								'skill_created' => date('Y-m-d'),
							);
							
							$this->db->insert('skill',$data);
							$result= array(
								'msg'=> 'Skill details Added Successfully',
								'status' => 1,
							);
						}
					}else{
						$result= array(
							'msg'=> 'Enter Your Details',
							'status' => 0,
						);
					}				
				}else{
					$result= array(
						'msg'=> 'Please Logout and try to login again',
						'status' => 0,
					);
				}
			}elseif($operation == 'delete'){
				if(empty($blog_id)){
					$result= array(
						'msg'=> 'Please try Again',
						'status' => 0,
					);
				}else{
					$this->db->where('blog_id', $blog_id);
					$blog = $this->db->get('blog')->row_array();
					if($blog['status'] == 1){
						$this->db->set('status', 0);
						$this->db->where('blog_id', $blog_id);
						$this->db->update('blog');
						$result= array(
							'msg'=> 'Blog has Deleted Successfully',
							'status' => 1,
						);
					}else{
						$this->db->set('status', 1);
						$this->db->where('blog_id', $blog_id);
						$this->db->update('blog');
						$result= array(
							'msg'=> 'Blog has Retrived Successfully',
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
	public function submit_experience(){
		if($this->islogin()){
			$organization_name = $this->security->xss_clean($this->input->post('organization_name'));
			$organization_location = $this->security->xss_clean($this->input->post('organization_location'));
			$organization_designation = $this->security->xss_clean($this->input->post('organization_designation'));
			$organization_from_date = $this->security->xss_clean($this->input->post('organization_from_date'));
			$organization_to_date = $this->security->xss_clean($this->input->post('organization_to_date'));
			$operation = $this->security->xss_clean($this->input->post('operation'));
			$id = $this->security->xss_clean($this->input->post('id'));

			if($operation == 'add'){
				$user_id = $this->session->userdata('user_id');
				if(!empty($user_id)){
					if(!empty($organization_name)){
						if(!empty($id)){
							$data = array(
								'organization_name' => strtolower($organization_name),
								'organization_location' => strtolower($organization_location),
								'organization_designation' => strtolower($organization_designation),
								'organization_from_date' => strtolower($organization_from_date),
								'organization_to_date' => strtolower($organization_to_date),
								// 'user_state' => strtolower($user_state),
								// 'user_city' => strtolower($user_city),
								'organization_created' => date('Y-m-d'),
							);
							$this->db->where('organization_id',$id);
							$this->db->update('organization',$data);
							$result= array(
								'msg'=> 'Experience details Updated Successfully',
								'status' => 1,
							);
						}else{
							$data = array(
								'organization_name' => strtolower($organization_name),
								'organization_location' => strtolower($organization_location),
								'organization_designation' => strtolower($organization_designation),
								'organization_from_date' => strtolower($organization_from_date),
								'organization_to_date' => strtolower($organization_to_date),
								'user_id' => ($user_id),
								// 'user_state' => strtolower($user_state),
								// 'user_city' => strtolower($user_city),
								'organization_created' => date('Y-m-d'),
							);
							
							$this->db->insert('organization',$data);
							$result= array(
								'msg'=> 'Experience details Updated Successfully',
								'status' => 1,
							);
						}
					}else{
						$result= array(
							'msg'=> 'Enter Your Details',
							'status' => 0,
						);
					}				
				}else{
					$result= array(
						'msg'=> 'Please Logout and try to login again',
						'status' => 0,
					);
				}
			}elseif($operation == 'delete'){
				if(empty($blog_id)){
					$result= array(
						'msg'=> 'Please try Again',
						'status' => 0,
					);
				}else{
					$this->db->where('blog_id', $blog_id);
					$blog = $this->db->get('blog')->row_array();
					if($blog['status'] == 1){
						$this->db->set('status', 0);
						$this->db->where('blog_id', $blog_id);
						$this->db->update('blog');
						$result= array(
							'msg'=> 'Experience has Deleted Successfully',
							'status' => 1,
						);
					}else{
						$this->db->set('status', 1);
						$this->db->where('blog_id', $blog_id);
						$this->db->update('blog');
						$result= array(
							'msg'=> 'Experience has Retrived Successfully',
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
	public function password_update(){
		if($this->islogin()){
			$password = $this->security->xss_clean($this->input->post('password'));
			$c_password = $this->security->xss_clean($this->input->post('c_password'));
			if($password == $c_password){
				$this->db->where('user_id', $this->session->userdata('user_id'));
				$val = $this->db->get('user')->row_array();
				if($val['user_password'] == md5($password)){
					$result = array(
						'msg' => 'Old Password cannot be used again',
						'status' => 0,
					);
				}else{
					$this->db->set('user_password',md5($password));
					$this->db->where('user_id', $this->session->userdata('user_id'));
					$this->db->update('user');
					$result = array(
						'msg' => 'Password Updated Successfully',
						'status' => 1,
					);
				}
			}else{
				$result = array(
					'msg' => 'New Password and Confirm New Password is not same',
					'status' => 0,
				);
			}
			echo json_encode($result); exit();
		}
	}

	public function delete(){
		if($this->islogin()){
			$id = $this->security->xss_clean($this->input->post('id'));
			$db = $this->security->xss_clean($this->input->post('db'));

			$this->db->where($db.'_id', $id);
			$val = $this->db->get($db)->row_array();

			if($val['status'] == 0){
				$this->db->set('status',1);
				$this->db->where($db.'_id', $id);
				$this->db->update($db);
				$result = array(
					'msg' => ucwords($db).' Details Retrived Successfully',
					'status' => 1,
				);
			}else{
				$this->db->set('status',0);
				$this->db->where($db.'_id', $id);
				$this->db->update($db);
				$result = array(
					'msg' => ucwords($db).' Details Removed Successfully',
					'status' => 1,
				);
			}
			echo json_encode($result); exit();
		}
	}
	public function get(){
		if($this->islogin()){
			$id = $this->security->xss_clean($this->input->post('id'));
			$db = $this->security->xss_clean($this->input->post('db'));

			$this->db->where($db.'_id', $id);
			$this->db->limit(1);
			$val = $this->db->get($db)->row_array();

			if(sizeof($val) > 0){
				$result = array(
					'data' => $val,
					'msg' => ucwords($db).' Details Retrived Successfully',
					'status' => 1,
				);
			}else{
				$result = array(
					'msg' => ucwords($db).' Details are Invalid',
					'status' => 1,
				);
			}
			echo json_encode($result); exit();
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

	private function upload($name, $img_width = 500, $img_height = 500){
		$config['upload_path'] = 'assets/uploads/blog/'; // path where to save the image
		$config['allowed_types'] = 'gif|jpg|jpeg|png'; // allowed file types
		$config['max_size'] = 2048; // maximum file size in kilobytes
		$config['max_width'] = 1024; // maximum image width
		$config['max_height'] = 768; // maximum image height

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($name)) {
			// handle upload error
			$result = array('msg' => $this->upload->display_errors(), 'status'=> 0);
		} else {
			// get uploaded file data
			$upload_data = $this->upload->data();

			// load image library
			$this->load->library('image_lib');

			// configure image resizing
			$config['image_library'] = 'gd2';
			$config['source_image'] = $upload_data['full_path'];
			$config['maintain_ratio'] = TRUE;
			$config['width'] = $img_width; // resized image width
			$config['height'] = $img_height; // resized image height

			$this->image_lib->initialize($config);
			$this->image_lib->resize();

			// handle successful upload
			$result = array('upload_data' => $this->upload->data(), 'status' => 1);
		}
		return $result;
	}

	private function generate_coupon_code() {
		
		$prefix = "RG";
		$characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$code = $prefix;
		for ($i = 0; $i < 4; $i++) {
			$code .= $characters[rand(0, strlen($characters) - 1)];
		}
		
		$this->db->where('status',1);
		$this->db->where('coupon_code', $code);
		$query = $this->db->get('coupon');
		
		if ($query->num_rows() > 0) {
			// Coupon code already exists, generate a different one
			return $this->generate_coupon_code();
		} else {
			// Coupon code is unique, return it
			return $code;
		}
	}
	
}
