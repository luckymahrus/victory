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

	}

 ?>