<?php
class Dia_Project extends CI_Model{
	public $DB_TABLE = 'dia_project';
	public $DB_TABLE_PK = 'id';
	
	protected $_table = 'dia_project';	

	public $id;
	public $title;
	public $budget;
	public $current_status;
	public $city;
	public $project_detail;
	public $liveornot;
	
	function get_list()
	{
		$this->db->select('*');
		$this->db->from('dia_project');
		$query=$this->db->get();
		return $query->result_array();
	}
	
}

?>
