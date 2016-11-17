<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin extends MY_Controller{

		function __construct(){
			parent::__construct();
			
		}

		public function index(){
			$data['title'] = 'Home';
			$this->template->load('default','home',$data);
			

		}

	}

 ?>