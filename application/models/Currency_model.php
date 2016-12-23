<?php 

	class Currency_Model extends CI_Model{

		function get_currency_history(){
			$this->db->select('currency_history.*, currency.name');
			$this->db->from('currency_history');
			$this->db->join('currency','currency_history.currency_id=currency.id');
			$this->db->order_by('currency_history.date','desc');
			return $this->db->get()->result();
		} 

	}

 ?>