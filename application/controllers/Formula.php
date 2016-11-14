<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Formula extends CI_Controller{
		private $temp;

		function __construct(){
			parent::__construct();
			$this->load->library('user_agent');
			if ($this->agent->is_mobile())
			{
		 	  	$this->temp = 'default_mobile';
			}else{
				$this->temp = 'default';
				
			}
		}

		public function index(){
			
			$this->load->view('login');

		}

		public function home(){
			$this->template->load($this->temp,'home');
		}

	}

 ?>