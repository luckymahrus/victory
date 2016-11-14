<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Formula extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->library('user_agent');
		}

		public function index(){
			
			$this->load->view('login');

		}

		public function home(){
			if ($this->agent->is_mobile())
			{
		 	  	echo 'mobile';
			}else{
				
				$this->template->load('navbar','home');
			}
		}

	}

 ?>