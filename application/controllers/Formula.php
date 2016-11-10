<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Formula extends CI_Controller{

		public function index(){
			
			$this->load->view('login');

		}

		public function home(){
			$this->template->load('default','home');
		}

	}

 ?>