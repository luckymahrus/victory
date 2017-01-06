<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Configuration extends MY_Controller{

		function __construct(){
			parent::__construct();
			
			
			if($this->session_role != 'admin'){
				redirect('home');
			}
			$this->load->model('category_model');
			$this->load->model('tray_model');
		}

		public function color(){
			if($this->session_role != 'admin'){
				redirect('home');	
			}
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

		/****Currency start****/
		public function currency(){
			if($this->session_role != 'admin'){
				redirect('home');	
			}
			$this->load->model('currency_model');
			$data['title'] = 'Kurs';
			$data['currencies'] = $this->crud_model->get_data('currency')->result();
			$data['histories'] = $this->currency_model->get_currency_history();
			$this->template->load('default','currency/list_add_currency',$data);
		}

		public function currency_add(){
			if($this->session_role != 'admin'){
				redirect('home');	
			}
			//process the insertion
			if($this->input->post('submit')){
				$data=array(
					'name'=>$this->input->post('currency_name'),
					'value'=>$this->input->post('currency_value'),
					'last_update'=>date('Y-m-d H:i:s')
				);
				
				$this->crud_model->insert_data('currency',$data);
				$data_history = array(
					'currency_id'=>$this->db->insert_id(),
					'value'=> $this->input->post('currency_value'),
					'date' => date('Y-m-d H:i:s')
				);
				$this->crud_model->insert_data('currency_history',$data_history);
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

		public function update_currency($id){
			if($this->session_role != 'admin'){
				redirect('home');	
			}
			if($this->input->post('submit')){
				$data=array(
					'name'=>$this->input->post('update_currency_name'),
					'value'=>$this->input->post('update_currency_value'),
					'last_update'=>date('Y-m-d H:i:s')
				);
				$this->crud_model->update_data('currency',$data,array('id'=>$id));
				$data_history=array(
					'currency_id'=>$id,
					'value'=>$this->input->post('update_currency_value'),
					'date' => date('Y-m-d H:i:s')
				);
				$this->crud_model->insert_data('currency_history',$data_history);
				$this->session->set_flashdata('currency',"$.Notify({
				    caption: 'Berhasil',
				    content: 'Kurs telah ditambahkan',
				    type: 'success'
				});");
				redirect('configuration/currency');
			}
			else{
				$data['title'] = 'Update Kurs';
				$data['currency'] = $this->crud_model->get_by_condition('currency',array('id'=>$id))->row();
				$data['histories'] = $this->crud_model->get_by_condition('currency_history',array('currency_id'=>$id))->result();
				$this->template->load($this->default,'currency/update_currency',$data);
			}
		}

		public function delete_currency($id){
			if($this->session_role != 'admin'){
				redirect('home');	
			}
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
		/****Currency END****/

		/****Gold Amount (KADAR)****/
		public function gold_amount(){
			if($this->session_role != 'admin'){
				redirect('home');	
			}
			if($this->input->post()){
				$data_amount = array(
						'type'			=> $this->input->post('type'),
						'amount_limit'	=> $this->input->post('limit'),
						'original'		=> $this->input->post('original'),
						'marked_up'		=> $this->input->post('marked_up')
					);
				if($this->db->insert('gold_amount',$data_amount)){
					$this->session->set_flashdata('gold',"$.Notify({
						caption: 'Berhasil',
						content : 'Kadar telah ditambahkan',
						type: 'success'
					});");
				}else{
					$this->session->set_flashdata('gold',"$.Notify({
						caption: 'Berhasil',
						content : 'Kadar gagal ditambahkan',
						type: 'alert'
					});");
				}
				redirect('configuration/gold_amount');
			}else{
				$data['title'] = 'Kadar Emas';
				$data['gold_amount'] = $this->crud_model->get_data('gold_amount')->result();
				$this->template->load($this->default,'configuration/gold_amount',$data);	
			}
			
		}
		public function edit_gold_amount($id = ''){
			if($this->session_role != 'admin'){
				redirect('home');	
			}
			if($this->input->post()){
				$data_amount = array(
						'type'			=> $this->input->post('type'),
						'amount_limit'	=> $this->input->post('limit'),
						'original'		=> $this->input->post('original'),
						'marked_up'		=> $this->input->post('marked_up')
					);
				if($this->db->update('gold_amount',$data_amount, array('id' => $id))){
					$this->session->set_flashdata('gold',"$.Notify({
						caption: 'Berhasil',
						content : 'Kadar telah diedit',
						type: 'success'
					});");
				}else{
					$this->session->set_flashdata('gold',"$.Notify({
						caption: 'Berhasil',
						content : 'Kadar gagal diedit',
						type: 'alert'
					});");
				}
				redirect('configuration/gold_amount');
			}else{
				$data['title'] = 'Edit Kadar Emas';
				$data['gold_amount'] = $this->db->get_where('gold_amount',array('id' => $id))->row();
				$this->template->load($this->default,'configuration/edit_gold_amount',$data);	
			}
		}

		public function delete_gold_amount($id = ''){
			if($this->session_role != 'admin'){
				redirect('home');	
			}
			$this->db->delete('amount_limit',array('amount_id' => $id));
			if($this->db->delete('gold_amount',array('id'=>$id))){
				$this->session->set_flashdata('gold',"$.Notify({
					caption: 'Berhasil',
					content : 'Kadar telah dihapus',
					type: 'success'
				});");
				
			}else{
				$this->session->set_flashdata('gold',"$.Notify({
					caption: 'Gagal',
					content : 'Kadar gagal dihapus',
					type : 'alert'
				});");
				
			}
			redirect('configuration/gold_amount');
		}

		/****Gold Amount (KADAR) END****/

		/****Diamond stone type****/
		public function diamond_type(){
			if($this->session_role != 'admin'){
				redirect('home');	
			}
			if($this->input->post()){
				$data_diamond = array(
						'code'			=> $this->input->post('type'),
						'name'		=> $this->input->post('name')
					);
				if($this->db->insert('diamond_type',$data_diamond)){
					$this->session->set_flashdata('diamond',"$.Notify({
						caption: 'Berhasil',
						content : 'Tipe Berlian telah ditambahkan',
						type: 'success'
					});");
				}else{
					$this->session->set_flashdata('diamond',"$.Notify({
						caption: 'Berhasil',
						content : 'Tipe Berlian gagal ditambahkan',
						type: 'alert'
					});");
				}
				redirect('configuration/diamond_type');
			}else{
				$data['title'] = 'Tipe Berlian';
				$data['diamond_type'] = $this->crud_model->get_data('diamond_type')->result();
				$this->template->load($this->default,'configuration/diamond_type',$data);	
			}
			
		}
		public function edit_diamond_type($id = ''){
			if($this->session_role != 'admin'){
				redirect('home');	
			}
			if($this->input->post()){
				$data_diamond = array(
						'code'			=> $this->input->post('type'),
						'name'		=> $this->input->post('name')
					);
				if($this->db->update('diamond_type',$data_diamond, array('id' => $id))){
					$this->session->set_flashdata('diamond',"$.Notify({
						caption: 'Berhasil',
						content : 'Tipe Berlian telah diedit',
						type: 'success'
					});");
				}else{
					$this->session->set_flashdata('diamond',"$.Notify({
						caption: 'Berhasil',
						content : 'Tipe Berlian gagal diedit',
						type: 'alert'
					});");
				}
				redirect('configuration/diamond_type');
			}else{
				$data['title'] = 'Edit Tipe Berlian';
				$data['diamond_type'] = $this->db->get_where('diamond_type', array('id' => $id))->row();
				$this->template->load($this->default,'configuration/edit_diamond_type',$data);	
			}
		}

		public function delete_diamond_type($id = ''){
			if($this->session_role != 'admin'){
				redirect('home');	
			}
			if($this->db->delete('diamond_type',array('id'=>$id))){
				$this->session->set_flashdata('diamond',"$.Notify({
					caption: 'Berhasil',
					content : 'Tipe Berlian telah dihapus',
					type: 'success'
				});");
				
			}else{
				$this->session->set_flashdata('diamond',"$.Notify({
					caption: 'Gagal',
					content : 'Tipe Berlian gagal dihapus',
					type : 'alert'
				});");
				
			}
			redirect('configuration/diamond_type');
		}
		/****Diamond stone type END****/

		/****outlet configuration****/
		public function outlet_config(){
			if($this->session_role != 'admin'){
				redirect('home');	
			}
			if($this->input->post()){

			}else{
				$this->load->model('amount_model');
				$data['title'] = 'Konfigurasi Outlet';
				$data['outlets'] = $this->db->get('outlets')->result();
				$data['amount_limit'] = $this->amount_model->get_outlet_amount(1);
				$this->template->load($this->default,'configuration/outlet_config',$data);
			
			}
		}

		public function get_limit_by_outlet($outlet_id = ''){
			$this->load->model('amount_model');
			$data = $this->amount_model->get_outlet_amount($outlet_id);
			if($data == NULL){
				echo 'not found';
			}else{
				$data = (Object) $data;
				echo json_encode($data);	
			}
			

		}

		public function change_limit($value = '', $limit_id = ''){
			if($this->db->update('amount_limit',array('amount_limit' => $value), array('id' => $limit_id))){
				echo 'success';
			}else{
				echo 'failed';
			}
		}

		/****outlet configuration end****/

		public function sales_point(){
			$data['trays'] = $this->tray_model->get_tray($this->session_outlet);
			$data['category'] = $this->category_model->get_category('category');
		}

	}

 ?>