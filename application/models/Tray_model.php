<?php 
class Tray_model extends CI_Model{
	function get_tray($outlet_id = ''){
		$this->db->select('tray.*,category.name as category,type.name as type');
		$this->db->from('tray');
		$this->db->join('category','category.id = tray.category_id');
		$this->db->join('type','type.id = category.type_id');
		$this->db->where('tray.outlet_id',$outlet_id);
		$this->db->order_by('tray.code','asc');
		return $this->db->get()->result();
	}

	function get_specific_tray($tray_id =''){
		$this->db->select('tray.*,category.name as category,type.name as type');
		$this->db->from('tray');
		$this->db->join('category','category.id = tray.category_id');
		$this->db->join('type','type.id = category.type_id');
		$this->db->where('tray.id',$tray_id);
		return $this->db->get()->row();
	}
}
