<?php
	defined('BASEPATH') or exit('No direct script access allowed');

	class Supplier extends MY_Controller{
		function __construct(){
			parent::__construct();
		}
		public function add_supplier(){
			if($this->input->post('add')){
	            print_r($this->input->post());
			}else{
				$data['title'] = 'Supplier';
				$data['is_mobile'] = $this->is_mobile;
				$this->template->load('default','supplier/add_supplier',$data);
			}
		}

	}

?>