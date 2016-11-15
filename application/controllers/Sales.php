<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Sales extends MY_Controller{

		function __construct(){
			parent::__construct();
				
		}

		public function add_sales(){
			if($this->input->post('add')){

			}else{
				$data['title'] = 'Sales';
				$this->template->load('default','sales/add_sales',$data);
			}
		}

	}

 ?>