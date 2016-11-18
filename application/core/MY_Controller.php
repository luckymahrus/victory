<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class MY_Controller extends CI_Controller{
		protected $is_mobile;

		function __construct(){
			parent::__construct();

			if($this->agent->is_mobile()){
				$this->is_mobile = true;
			}
			// if(!$this->session->userdata('is_logged')){
			// 	redirect('accounts');
			// }		
		}

	}

 ?>