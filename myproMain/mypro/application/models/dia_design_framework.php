<?php 
class Dia_Design_Framework extends CI_Model{

	/*
	 * 根据projectid得到所有总体设计
	 */
	public function getAll($pid)
	{
		$sql = "SELECT a.id,a.designtarget,a.devlanguage,a.devdatabase,a.description,a.codeaddress,a.price,a.status,
				c.title project_caption,a.createdatetime,b.realname
				FROM dia_design_framework a,dia_project c,dia_user b
				WHERE  a.projectid = c.id AND a.status=1 AND a.createbyid = b.id AND a.projectid = ?
				ORDER BY id DESC";//状态为生效并对外可见
		$query = $this->db->query($sql,$pid);
		//var_dump($query->result_array());
		return $query->result_array();
	} 
	
	/*
	 * 我的总体设计
	 */
	
	public function getAllByUid($uid)
	{
		$sql = "SELECT a.id,
				       a.designtarget,
				       a.devlanguage,
				       a.devdatabase,
				       a.description,
				       a.codeaddress,
				       a.price,
				       a.status,
				       c.title project_caption,
				       a.createdatetime,
				       b.realname
				FROM dia_design_framework a,
				     dia_project c,
				     dia_user b
				WHERE a.projectid = c.id
				  AND a.status=1
				  AND a.createbyid = b.id
				  AND a.createbyid = ?
				ORDER BY id DESC
				";//状态为生效并对外可见
		//$query = $this->db->query($sql);
		$query = $this->db->query($sql, array($uid));
		//var_dump($query->result_array());
		return $query->result_array();		
	}
	/*
	 * 保存新增的总体设计
	 */
	public function addSaveDesignFramework($data)
	{
// 		var_dump($data);
// 		exit();
		$dataAdd = array(
				'designtarget' => $data['designtarget'] ,
				'devlanguage' => $data['devlanguage'] ,
				'devdatabase' => $data['devdatabase'],
				'description' => $data['description'],
				'key_tech'=>$data['key_tech'],
				'env_des'=>$data['env_des'],
				'codeaddress' => $data['codeaddress'],
				'isopen' => $data['isopen'],
				'projectid'=>$data['pid'],
				'createbyid' => $data['uid'],
		);
		$res = $this->db->insert('dia_design_framework', $dataAdd);
		return $res;
	}
	
	/*
	 * 查看总体设计详情
	 */
	public function getDetailByID($id)
	{
		$sql = "SELECT a.id,a.designtarget,a.devlanguage,a.devdatabase,
				a.description,a.codeaddress,a.price,a.status,a.key_tech,a.env_des,
				c.title project_caption,a.createdatetime,b.realname
				FROM dia_design_framework a,dia_project c,dia_user b
				WHERE  a.projectid = c.id AND a.status=1 AND a.createbyid = b.id AND a.id = ?";//状态为生效并对外可见
		$sql1 = "	SELECT a.id,
					       a.designtarget,
					       a.devlanguage,
					       a.devdatabase,
					       a.description,
					       a.codeaddress,
					       a.price,
					       a.status,
					       a.key_tech,
					       a.env_des,
					       c.title project_caption,
					       a.createdatetime,
					       b.realname,
						   a.isopen
					FROM dia_design_framework a,
					     dia_project c,
					     dia_user b
					WHERE a.projectid = c.id
					  AND a.status=1
					  AND a.createbyid = b.id
					  AND a.id = ?";
		$query = $this->db->query($sql1, array($id));
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			return $row;
		}
		else
		{
			return "";
		}
	}
	
}