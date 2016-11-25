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
			$data['title'] = 'Kurs';
			$data['is_mobile'] = $this->is_mobile;
			$data['currencies'] = $this->crud_model->get_data('currency')->result();
			$this->template->load('default','currency/list_add_currency',$data);
		}

		public function currency_add(){
			//process the insertion
			if($this->input->post('submit')){
				$data=array(
					'name'=>$this->input->post('currency_name'),
					'value'=>$this->input->post('currency_value')
				);
				
				$this->crud_model->insert_data('currency',$data);
				$this->session->set_flashdata('currency',"$.Notify({
				    caption: 'Berhasil',
				    content: 'Kurs telah ditambahkan',
				    type: 'success'
				});");
				redirect('configuration/currency');
			}
			//show the form view
			else{
				$this->currency();
			}
		}

		public function delete_currency($id){
			if($this->crud_model->delete_data('currency',array('id'=>$id))){
				$this->session->set_flashdata('currency',"$.Notify({
					caption: 'Berhasil',
					content : 'Kurs telah dihapus',
					type: 'success'
				});");
				redirect('configuration/currency');
			}else{
				$this->session->set_flashdata('currency',"$.Notify({
					caption: 'Gagal',
					content : 'Kurs gagal dihapus',
					type : 'alert'
				});");
				redirect('configuration/currency');
			}
		}

	}

 ?>