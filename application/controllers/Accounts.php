<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Accounts extends CI_Controller{

		public function index(){
			
			$this->load->view('login');

		}

		public function login(){
			if($this->input->post('login')){
				
			}
		}

	}

 ?>