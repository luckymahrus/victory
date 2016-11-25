<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Configuration extends MY_Controller{

		function __construct(){
			parent::__construct();
			
			if($this->session_role != 'admin'){
				redirect('home');
			}
		}

		public function color(){

			$data['title'] = 'Ubah Warna';
			$data['configuration'] = $this->crud_model->get_data('configuration')->row();
			$this->template->load($this->default,'configuration/color',$data);
			

		}

		public function change_color($color = ''){
			if($color != ''){
				$this->crud_model->update_data('configuration',array('primary_color' => '#'.$color),array('id' => 1));
				echo 'success';
			}
		}

		public function currency(){
			$data['title'] = 'Currency';
			$data['is_mobile'] = $this->is_mobile;
			
			$this->template->load('default','currency/list_add_currency',$data);
		}

		public function currency_add(){
			//process the insertion
			if($this->input->post('submit')){
				
			}
			//show the form view
			else{
				$data['title'] = 'Nilai Dollar';
				$this->template->load('default','currency/list_add_currency',$data);
			}
		}

	}

 ?>