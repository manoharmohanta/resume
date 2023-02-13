<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup extends CI_Controller {

	/**
	 * 
	 * Here database and setup
	 */
	
	public function __construct(){
        parent::__construct();
        $this->load->dbforge();
    }

	public function index(){
		$response = array();
		if (!$this->db->table_exists('role')){
			$response['msg'][]= 'Your Website is not updated to add roles';
			$response['status'] = 0;
		}
		if (!$this->db->table_exists('package')){
			$response['msg'][]= 'Your Website is not updated to add package';
			$response['status'] = 0;
		}
		if (!$this->db->table_exists('user')){
			$response['msg'][]= 'Your Website is not updated to add user';
			$response['status'] = 0;
		}
		if (!$this->db->table_exists('payment')){
			$response['msg'][]= 'Your Website is not updated to accept payment';
			$response['status'] = 0;
		}
		if (!$this->db->table_exists('coupon')){
			$response['msg'][]= 'Your Website is not updated to generate coupon';
			$response['status'] = 0;
		}
		if (!$this->db->table_exists('template')){
			$response['msg'][]= 'Your Website is not updated to add templates';
			$response['status'] = 0;
		}
		if (!$this->db->table_exists('resumegenie')){
			$response['msg'][]= 'Your Website is not updated to generate resumegenie';
			$response['status'] = 0;
		}
		if(empty($response['msg'])){
			$response['msg'] = 'Your Website is updated to latest version 1.0';
			$response['status'] = 1;
		}
		
		$this->load->view('setup', $response);
	}

	public function setup(){
		if (!$this->db->table_exists('role')){
			$this->role();
		}
		if (!$this->db->table_exists('package')){
			$this->package_category();
		}
		if (!$this->db->table_exists('user')){
			$this->user();
		}
		if (!$this->db->table_exists('payment')){
			$this->payment();
		}
		if (!$this->db->table_exists('coupon')){
			$this->coupon();
		}
		if (!$this->db->table_exists('template')){
			$this->template_category();
		}
		if (!$this->db->table_exists('resumegenie')){
			$this->resumegenie();
		}

		$response = array(
			'msg' => 'Your Website is updated to the latest Version 1.0',
			'status' => 1,
		);

		echo json_encode($response); exit();
	}

	private function role(){
		$fields = array(
			'role_id' => array(
					'type' => 'INT',
					'constraint' => 5,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
			),
			'role_title' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					'unique' => TRUE,
			),
			'role_created' => array(
					'type' =>'VARCHAR',
					'constraint' => '100',
					'unique' => TRUE,
			),
			'status' => array(
					'type' => 'INT',
					'null' => TRUE,
					'default' => 1,
			),
		);
		$this->dbforge->add_key('role_id', TRUE);
		$this->dbforge->add_field($fields);
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->create_table('role', FALSE, $attributes);
	}

	private function package_category(){
		$fields = array(
			'package_id' => array(
					'type' => 'INT',
					'constraint' => 5,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
			),
			'package_title' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					'unique' => TRUE,
			),
			'package_price' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique' => TRUE,
			),
			'package_description' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique' => TRUE,
			),
			'package_created' => array(
					'type' =>'VARCHAR',
					'constraint' => '100',
					'unique' => TRUE,
			),
			'status' => array(
					'type' => 'INT',
					'null' => TRUE,
					'default' => 1,
			),
		);
		$this->dbforge->add_key('package_id', TRUE);
		$this->dbforge->add_field($fields);
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->create_table('package', FALSE, $attributes);
	}

	private function user(){
		$fields = array(
			'user_id' => array(
					'type' => 'INT',
					'constraint' => 5,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
			),
			'user_name' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					'unique' => TRUE,
			),
			'role_id' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'user_package' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'user_email' => array(
					'type' =>'VARCHAR',
					'constraint' => '100',
					'unique' => TRUE,
			),
			'user_password' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique' => TRUE,
			),
			'user_dob' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique' => TRUE,
			),
			'user_gender' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique' => TRUE,
			),
			'user_education' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique' => TRUE,
			),
			'user_job' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique' => TRUE,
			),
			'user_created' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique' => TRUE,
			),
			'status' => array(
					'type' => 'INT',
					'null' => TRUE,
					'default' => 1,
			),
		);
		$this->dbforge->add_key('user_id', TRUE);
		$this->dbforge->add_field($fields);
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->create_table('user', FALSE, $attributes);
	}

	private function payment(){
		$fields = array(
			'payment_id' => array(
					'type' => 'INT',
					'constraint' => 5,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
			),
			'user_id' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					'unique' => TRUE,
			),
			'amount' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'currency' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'razorpay_payment_id' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'razorpay_order_id' => array(
					'type' =>'VARCHAR',
					'constraint' => '100',
					'unique' => TRUE,
			),
			'razorpay_signature' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique' => TRUE,
			),
			'payment_created' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique' => TRUE,
			),
			'payment_expire' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique' => TRUE,
			),
			'coupon_id' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique' => TRUE,
			),
			'status' => array(
					'type' => 'INT',
					'null' => TRUE,
					'default' => 1,
			),
		);
		$this->dbforge->add_key('payment_id', TRUE);
		$this->dbforge->add_field($fields);
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->create_table('payment', FALSE, $attributes);
	}

	private function coupon(){
		$fields = array(
			'coupon_id' => array(
					'type' => 'INT',
					'constraint' => 5,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
			),
			'user_id' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					'unique' => TRUE,
			),
			'role_id' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique' => TRUE,
			),
			'coupon_code' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique' => TRUE,
			),
			'coupon_code' => array(
					'type' =>'VARCHAR',
					'constraint' => '100',
					'unique' => TRUE,
			),
			'coupon_created' => array(
				'type' =>'VARCHAR',
				'constraint' => '100',
				'unique' => TRUE,
			),
			'status' => array(
					'type' => 'INT',
					'null' => TRUE,
					'default' => 1,
			),
		);
		$this->dbforge->add_key('coupon_id', TRUE);
		$this->dbforge->add_field($fields);
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->create_table('coupon', FALSE, $attributes);
	}

	private function template_category(){
		$fields = array(
			'template_id' => array(
					'type' => 'INT',
					'constraint' => 5,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
			),
			'user_id' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					'unique' => TRUE,
			),
			'role_id' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique' => TRUE,
			),
			'template_image' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique' => TRUE,
			),
			'template_category' => array(
					'type' =>'VARCHAR',
					'constraint' => '100',
					'unique' => TRUE,
			),
			'template_created' => array(
				'type' =>'VARCHAR',
				'constraint' => '100',
				'unique' => TRUE,
			),
			'status' => array(
					'type' => 'INT',
					'null' => TRUE,
					'default' => 1,
			),
		);
		$this->dbforge->add_key('template_id', TRUE);
		$this->dbforge->add_field($fields);
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->create_table('template', FALSE, $attributes);
	}

	private function resumegenie(){
		$fields = array(
			'resumegenie_id' => array(
					'type' => 'INT',
					'constraint' => 5,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
			),
			'user_id' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					'unique' => TRUE,
			),
			'role_id' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique' => TRUE,
			),
			'template_id' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique' => TRUE,
			),
			'template_category' => array(
					'type' =>'VARCHAR',
					'constraint' => '100',
					'unique' => TRUE,
			),
			'resumegenie_created' => array(
				'type' =>'VARCHAR',
				'constraint' => '100',
				'unique' => TRUE,
			),
			'status' => array(
					'type' => 'INT',
					'null' => TRUE,
					'default' => 1,
			),
		);
		$this->dbforge->add_key('resumegenie_id', TRUE);
		$this->dbforge->add_field($fields);
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->create_table('resumegenie', FALSE, $attributes);
	}
}
