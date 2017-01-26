<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Buyback extends MY_Controller{

		function __construct(){
			parent::__construct();
			
		}

		/****List Penjualan****/
		public function index(){
			$data['title'] = 'Daftar Penjualan';
			if ($this->session_role == 'admin') {
				$data['outlets'] = $this->db->get('outlets')->result();
				$data['sale'] = $this->sale_model->get_sale_by_outlet(1);
			}else{
				$data['outlets'] = NULL;
				$data['sale'] = $this->sale_model->get_sale_by_outlet($this->session_outlet);	
			}
			
			$this->template->load($this->default,'sale/list_sale',$data);
		}
		/****list Penjualan END****/

		/**** SELLING START ****/
		public function new_buyback(){
			
			if($this->input->post()){
				

			}else{
				
				
				$data['title'] = 'Buyback';
				$this->template->load($this->default,'buyback/new_buyback',$data);	
			}
				
		
		}

		/**** SELLING ENDS ****/
		
		

		

	}

 