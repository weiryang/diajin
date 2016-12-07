<?php

class Dia_Module extends CI_Model{

	public function getAll($pid)
	{
		$this->db->select('*');
		$this->db->from('dia_module');
		$where = "project_id".$pid;
		$this->db->where("project_id",$pid);
		$query=$this->db->get();
		return $query->result_array();
	} 
	
	public function getAllByPidUid($data)
	{
		$this->db->select('*');
		$this->db->from('dia_module');
		$this->db->where("project_id",$data['pid']);
		$uid = $data['uid'];
		$this->db->where("createbyid",$uid);
		//var_dump($data['pid']);		
		//var_dump($data['uid']);
 		$query=$this->db->get();
 		//var_dump($query->result_array());
 		return $query->result_array();
	}
	
	public function getModuleByID($mid)
	{
		$sql = "SELECT * FROM dia_module WHERE id = ?";
		$query = $this->db->query($sql, array($mid));
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
	
	public function getPIDByMID($mid)
	{
		$sql = "SELECT * FROM dia_module WHERE id = ?";
		$query = $this->db->query($sql, array($mid));
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			return $row->project_id;
		}
		else
		{
			return "";
		}
	}
	
	
	public function addSaveModule($data)
	{
		$dataAdd = array(
				'module_name' => $data['module_name'] ,
				'project_id' => $data['pid'] ,
				'content' => $data['content'],
				'createbyid' =>$data['uid'],
		);
		//var_dump($dataAdd);
		$res = $this->db->insert('dia_module', $dataAdd);
		//var_dump($res);
		return $res;
	}
	
	/*
	 * 随项目的增加而自动加一个模块
	 */
	public function addModuleWithPro($data)
	{
		$dataAdd = array(
				'module_name' => '项目总模块' ,
				'project_id' => $data['pid'],
				'content' => '这是一个自动加入的模块,随项目的建立自动建立',
				'createbyid' =>$data['uid'],
		);
		//var_dump($dataAdd);
		$res = $this->db->insert('dia_module', $dataAdd);
		//var_dump($res);
		return $res;
	}
	
	public function saveModuleByID($data)
	{
		$dataSave = array(
				'module_name' => $data['module_name'],
				'content' => $data['content'],
		);
		$id = $data['id'];
		$this->db->where('id', $id);
		$res = $this->db->update('dia_module',$dataSave);
		return $res;
	}
	
	public function delete($chk)
	{
		//查询此模块下是否有需求提交上来，如果有，就不允许删除
		foreach ($chk as &$value) {
			//echo $value;
			$this->db->delete('dia_module', array('id' => $value));
		}
		return $chk;
	}
	
	/*
	 * 得到该用户所有模块的所有模块
	*/
	public function getModulesByUid($uid)
	{
		$sql = "SELECT b.id,
					b.module_name,
					c.title proname
				FROM dia_module b,dia_project c
				WHERE b.project_id = c.id
					AND c.createbyid = ?";
		$query = $this->db->query($sql,$uid);
		return $query->result_array();
	}
	
	
	/*
	 * 根据模块ID得到模块名称
	*/
	public function getModNameByMID($mid)
	{
		$sql = "SELECT module_name FROM dia_module WHERE id = ?";
		$query = $this->db->query($sql, array($mid));
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			$module_name = $row->module_name;
		}
		else
		{
			$module_name = "无名氏";
		}
	
		return $module_name;
	}
}

