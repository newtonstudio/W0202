<?php
class News_model extends CI_Model {

	public $data = array();
	public function __construct(){
		$this->load->database();
	}

	public function getData(){
		
		//SELECT * FROM news
		$query = $this->db->get("news");
		//return indexed array
		return $query->result_array();

	}

	public function getOne($id=""){

		//SELECT * FROM news WHERE id = '$id'

		$this->db->where(array(
			'id' => $id,
		));
		$query = $this->db->get("news");
		//return associative array
		return $query->row_array();
		
	}

}
?>