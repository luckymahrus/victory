<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Sale extends MY_Controller{

		function __construct(){
			parent::__construct();
			if($this->session_role=='admin'){
				redirect('home');
			}

		}


		/**** SELLING START ****/
		public function new_sale(){
			if($this->input->post()){
				/**kalo ada customer baru di insert**/
				$data_sale = array(
						'sale_code' => $this->input->post('sale_code'),
						'date' => date('Y-m-d'),
						'outlet_id' => $this->session_outlet,
						'sales_id' => $this->input->post('sales_id'),
						'customer_code' => $this->input->post('customer_code'),
						'qty' => count($this->input->post('product_code')),
						'total_price' => $this->input->post('total_price')
					);
				if($this->db->insert('sale',$data_sale)){
					for($i = 0; $i < count($this->input->post('product_code')); $i++){
						$data_detail = array(
								'product_code' => $this->input->post('product_code')[$i],
								'discount' => $this->input->post('discount')[$i],
								'sale_code' => $this->input->post('sale_code'),
								'selling_price' => $this->input->post('product_price')[$i],
								'total_price' => $this->input->post('product_price')[$i] - $this->input->post('discount')[$i],
							);
						/**update barang kejual**/
						$this->db->insert('sale_detail',$data_detail);
					}
					/**update count code**/
					$this->session->set_flashdata('sale',"$.Notify({
					    caption: 'Berhasil',
					    content: 'Penjualan Berhasil',
					    type: 'success'
					});");

					redirect('sale/new_sale');
				}else{
					$this->session->set_flashdata('sale',"$.Notify({
					    caption: 'Gagal',
					    content: 'Gagal transaksi',
					    type: 'alert'
					});");

					redirect('sale/new_sale');
				}

			}else{
				$outlet_code = $this->db->get_where('outlets',array('id' => $this->session_outlet))->row('code');
				$code = $this->db->get_where('code',array('code' => $outlet_code.'JU'))->row();
				if($code){
					$data['sale_code'] = $code->code.sprintf("%05d", $code->count);
					$data['hidden_code'] = $code->code;
					$data['hidden_count'] = $code->count;
				}else{
					$this->db->insert('code',array('code' => $outlet_code.'JU','count' => 1));
					$data['sale_code'] = $outlet_code.'JU'.sprintf("%05d", 1);
					$data['hidden_code'] = $outlet_code.'JU';
					$data['hidden_count'] = 1;	
				}
				$this->load->model('sales_model');
				$data['sales'] = $this->sales_model->get_outlet_sales($this->session_outlet);
				$data['title'] = 'Penjualan';
				$this->template->load($this->default,'sale/new_sale',$data);	
			}
				
		
		}

		public function get_customer($code = ''){
			$customer = $this->db->get_where('customers',array('code' => $code))->row();
			if($customer == NULL){
				echo 'not found';
			}else{
				$customer = (Object) $customer;
				echo json_encode($customer);	
			}
		}

		public function get_new_customer_code(){
			$code = $this->db->get_where('code',array('code' => 'MKM'))->row();
			if($code){
				$data['customer_code'] = $code->code.sprintf("%07d", $code->count);
				$data['hidden_customer_code'] = $code->code;
				$data['hidden_customer_count'] = $code->count;
			}else{
				$this->db->insert('code',array('code' => 'MKM','count' => 1));
				$data['customer_code'] = 'MKM'.sprintf("%07d", 1);
				$data['hidden_customer_code'] = 'MKM';
				$data['hidden_customer_count'] = 1;
			}
			$data = (Object) $data;
			echo json_encode($data);
		}

		/**** SELLING ENDS ****/
		
		

	}

 ?>