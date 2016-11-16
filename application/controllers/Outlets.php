<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Outlets extends MY_Controller{

		function __construct(){
			parent::__construct();
				
		}

		public function add_outlet(){
			if($this->input->post('add')){

			}else{
				$data['title'] = 'Outlet';
				$this->template->load('default','outlets/add_outlet',$data);
			}
		}

		public function list_outlet(){
			
			$data['title'] = 'Outlet';
			$data['is_mobile'] = $this->is_mobile;
			$this->template->load('default','outlets/list_outlet',$data);
		
		}

	}

 ?>