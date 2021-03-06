<?php
class Dia_Request_Init extends CI_Model{

	/*
	 * 根据原始需求得到需求分析列表
	 */
	public function getLstByRID($rid)
	{
		$sql = "SELECT id,caption,inputtext,outputtext,description,effectEstimate,dealprocess
				FROM dia_request_init WHERE request_org_id = ?";
		$query = $this->db->query($sql, array($rid));
		return $query->result_array();
	}
	
	/*
	 * 添加需求分析时保存处理
	 */
	public function addSaveReqInit($data)
	{
		$dataAdd = array(
				'caption' => $data['caption'] ,
				'inputtext' => $data['inputtext'] ,
				'outputtext' => $data['outputtext'],
				'createbyid' => $data['uid'],
				'request_org_id' => $data['request_org_id'],
				'effectEstimate' => $data['effectEstimate'],
				'description' => $data['description'],
				'dealprocess' => $data['dealprocess'],
		);
		//var_dump($dataAdd);
		$res = $this->db->insert('dia_request_init', $dataAdd);
		return $res;
	}	
	
	/*
	 * 添加原始需求时自动新增一条需求分析的记录
	 */
	public function addSaveReqInitAddReqOrg($data)
	{
		$dataAdd = array(
				'createbyid' 		=> $data['uid'],
				'request_org_id' 	=> $data['reqorgid'],
				//'assignto'			=> $data['assignto'],
		);
		//var_dump($dataAdd);
		$res = $this->db->insert('dia_request_init', $dataAdd);
		return $res;
	}
	
	public function getDetailByID($id)
	{
		$sql = "SELECT * FROM dia_request_init WHERE id = ?";
		$query = $this->db->query($sql, array($id));
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