<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Category extends MY_Controller{

		function __construct(){
			parent::__construct();
			
		}

		public function index(){

			$data['title'] = 'Category';
			$data['category_diamond'] = $this->crud_model->get_by_condition('category',array('type_id' => 2))->result();
			$data['category_gold'] = $this->crud_model->get_by_condition('category',array('type_id' => 1))->result();
			$this->template->load($this->default,'category/list_category',$data);
			

		}

	}

 ?>