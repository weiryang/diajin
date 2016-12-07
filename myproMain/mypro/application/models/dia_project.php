<?php
class Dia_Project extends CI_Model{
	const DB_TABLE = 'dia_project';
	const DB_TABLE_PK = 'id';
	
	protected $_table = 'dia_project';	

	public $id;
	public $title;
	public $budget;
	public $current_status;
	public $city;
	public $project_detail;
	public $liveornot;
	
	function getAll()
	{
		//$sql = 'SELECT * FROM dia_project';
		//$res = $this->db->query($sql);
		//$result = $res->result();
// 		$this->db->select('*');
// 		$this->db->from('dia_project');
// 		$this->db->order_by("id","desc");
// 		$query=$this->db->get();
		$sql = "SELECT a.id,a.title,a.budget,a.city,a.createDatetime,
				CASE WHEN a.isopen = 0 THEN '不开放'
				     WHEN a.isopen = 2 THEN '开放'
				     WHEN a.isopen = 1 THEN '仅自己及指定可见' end isopen,
				createbyid,
				b.realName
				FROM dia_project a
				LEFT JOIN dia_user b ON a.createbyid = b.id
				WHERE  a.status=1 
				ORDER BY id DESC";//状态为生效并对外可见
//var_dump($sql);
 		$query = $this->db->query($sql);
 		return $query->result_array();
	}

	/*
	 * 根据用户ID得到该用户所有项目数量
	 */
	public function getCountByUID($uid)
	{
		$sql = "SELECT * FROM dia_project WHERE createbyid = ?";
		$query = $this->db->query($sql, $uid);
		$count = count($query->result_array());
		return $count;
	}
	
	
	function getAllP()
	{	
	$sql = "SELECT a.id,a.caption,a.price,
				CASE WHEN a.type = 0 THEN '新需求'
				     WHEN a.type = 1 THEN '任务'
				     WHEN a.type = 2 THEN 'bug'
				     WHEN a.type = 3 THEN '改进' end type,
				CASE WHEN a.status = 0 THEN '未生效'
				     WHEN a.status = 1 THEN '生效'
				     WHEN a.status = 2 THEN '完结' end status,
				CASE WHEN a.emerlevel = 0 THEN '不紧急'
				     WHEN a.emerlevel = 1 THEN '普通'
				     WHEN a.emerlevel = 2 THEN '紧急'
				     WHEN a.emerlevel = 3 THEN '非常紧急' end emerlevel,
				CASE WHEN a.importlevel = 0 THEN '不重要'
				     WHEN a.importlevel = 1 THEN '普通'
				     WHEN a.importlevel = 2 THEN '重要'
				     WHEN a.importlevel = 3 THEN '很重要' end importlevel,
				a.end_date,
				b.module_name,
				c.title proname
				FROM dia_request_org a,dia_module b,dia_project c
				WHERE  a.module_id=b.id AND b.project_id = c.id AND a.status=1 AND a.isopen = 2
				ORDER BY id DESC";//状态为生效并对外可见
	$query = $this->db->query($sql);
	return $query->result_array();
}
	// 我的项目列表
	public function myProLst($createdbyid)
	{
		$sql = "SELECT * FROM dia_project WHERE createByID = ? ORDER BY id DESC";
		$query = $this->db->query($sql, array($createdbyid));
		return $query->result_array();
	} 
	
	public function save($data)
	{
		//var_dump($data);
		$bool = $this->db->insert('dia_project',$data);
		return $bool;
	}
	
	public function savemyproject($data)
	{
		$dataInsert = array(
				'title' => $data['title'],
				'city' => $data['city'],
				'cellphone' => $data['cellphone'],
				'budget' => $data['budget'],
				'project_detail' => $data['project_detail'],
		);
		$id = $this->session->userdata('userid');
// 		$this->db->where('createbyid', $id);
		$this->db->where('id',$data['id']);
		$res = $this->db->update('dia_project',$dataInsert);
		return $res;
	}
	
	public function getTitleByPID($pid)
	{
		$sql = "SELECT * FROM dia_project WHERE id = ?";
		$query = $this->db->query($sql, array($pid));
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			return $row->title;
		}
		else
		{
			return "";
		}
	}
	
	
	
}


