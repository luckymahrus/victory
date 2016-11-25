<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Currency extends MY_Controller{

		function __construct(){
			parent::__construct();

			if($this->session_role != 'admin'){
				redirect('home');
			}
		}

		public function index(){
			$data['title'] = 'Currency';
			$data['is_mobile'] = $this->is_mobile;
			
			$this->template->load('default','currency/change_dollar',$data);
		}

		public function add_dollar(){
			//process the insertion
			if($this->input->post()){
				
			}
			//show the form view
			else{
				$data['title'] = 'Nilai Dollar';
				$this->template->load('default','currency/change_dollar',$data);
			}
		}		

	}

 ?>