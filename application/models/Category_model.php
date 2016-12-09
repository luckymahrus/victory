
<?php 
class Category_model extends CI_Model{
	function get_category(){
		$this->db->select('category.*,type.name as type');
		$this->db->from('category');
		$this->db->join('type','type.id = category.type_id');
		$this->db->order_by('category.type_id','asc');
		return $this->db->get()->result();
	}
}
