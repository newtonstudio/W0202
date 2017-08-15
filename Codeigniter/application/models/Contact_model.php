<?php
class Contact_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}

	public function record_count($where=array()) {

		$this->db->select("COUNT(*) AS total");
		$query = $this->db->get("contact", $where);
		$row = $query->row_array();
		return !empty($row['total'])?$row['total']:0;

	}

	public function fetch($start, $item_per_page, $where=array()) {
		$this->db->where($where);
		$this->db->limit($item_per_page, $start);
		$query = $this->db->get("contact");
		return $query->result_array();
	}

	public function insert($insert_array=array()){
		$this->db->insert("contact", $insert_array);
		return $this->db->insert_id();
	}

	public function delete($delete_array=array()) {
		$this->db->where($delete_array);
		$this->db->update("contact", array(
			'is_deleted' => 1,
			'modified_date' => date("Y-m-d H:i:S"),
		));
	}

	public function update($where=array(), $update_array=array()) {
		$this->db->where($where);
		$this->db->update("contact", $update_array);
	}

	public function get($where=array()) {
		$this->db->where($where);
		$query = $this->db->get("contact");
		return $query->result_array();
	}

	public function getOne($where=array()) {
		$this->db->where($where);
		$query = $this->db->get("contact");
		return $query->row_array();
	}



}
?>