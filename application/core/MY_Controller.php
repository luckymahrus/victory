<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class MY_Controller extends CI_Controller{
		protected $is_mobile;
		protected $user_role;
		protected $user_id;

		
			
		

		function __construct(){
			parent::__construct();

			if($this->agent->is_mobile()){
				$this->is_mobile = true;
			}
			if(!$this->session->userdata('is_logged')){
				redirect('accounts');
			}else{
				$this->user_role = $this->session->userdata('user_role');
				$this->user_id = $this->session->userdata('user_id');
			}		
		}

	}

 ?>