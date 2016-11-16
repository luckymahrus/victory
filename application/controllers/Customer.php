<?php
	defined('BASEPATH') or exit('No direct script access allowed');

	class Customer extends MY_Controller{
		function __construct(){
			parent::__construct();
		}
		public function add_customer(){
			if($this->input->post('add')){
	            print_r($this->input->post());
			}else{
				$data['title'] = 'Customer';
				$data['is_mobile'] = $this->is_mobile;
				$this->template->load('default','customer/add_customer',$data);
			}
		}

		public function list_customer(){
			
			$data['title'] = 'Customer';
			$data['is_mobile'] = $this->is_mobile;
			$this->template->load('default','customer/list_customer',$data);
		
		}

	}

?>