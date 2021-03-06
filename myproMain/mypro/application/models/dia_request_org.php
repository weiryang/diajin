<?php
class Dia_Request_Org extends CI_Model{
	
	/*
	 * 根据原始需求的ID得到
	*/
	public function getReqorgNameByRID($rid)
	{
		
	}
	
	/*
	 * 得到所有原始需求
	 * 
	 * 条件：状态为生效 开放状态为开放 截止日期》=当前日期
	 */
	
	public function getAll()
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
				CASE WHEN a.payflag = 0 THEN '未付费'
				     WHEN a.importlevel = 1 THEN '已付费' end payflag,
				b.module_name,
				c.title proname
				FROM dia_request_org a,dia_module b,dia_project c
				WHERE  a.module_id=b.id AND b.project_id = c.id AND a.status=1 AND a.isopen = 2
					AND a.end_date >= NOW()
				ORDER BY id DESC
				LIMIT 100";//状态为生效并对外可见
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	
	/*
	 * 根据用户ID列出所有原始需求
	 */
	public function getAllByUID($uid)
	{
// 		$sql = "SELECT a.id,a.caption,a.price,
// 				CASE WHEN a.type = 0 THEN '新需求'
// 				     WHEN a.type = 1 THEN '任务'
// 				     WHEN a.type = 2 THEN 'bug'
// 				     WHEN a.type = 3 THEN '改进' end type,
// 				CASE WHEN a.status = 0 THEN '未生效'
// 				     WHEN a.status = 1 THEN '生效'
// 				     WHEN a.status = 2 THEN '完结' end status,
// 				CASE WHEN a.emerlevel = 0 THEN '不紧急'
// 				     WHEN a.emerlevel = 1 THEN '普通'
// 				     WHEN a.emerlevel = 2 THEN '紧急'
// 				     WHEN a.emerlevel = 3 THEN '非常紧急' end emerlevel,
// 				CASE WHEN a.importlevel = 0 THEN '不重要'
// 				     WHEN a.importlevel = 1 THEN '普通'
// 				     WHEN a.importlevel = 2 THEN '重要'
// 				     WHEN a.importlevel = 3 THEN '很重要' end importlevel,
// 				a.end_date,
// 				CASE WHEN a.payflag = 0 THEN '未付费'
// 				     WHEN a.payflag = 1 THEN '已付费' end payflag,
// 				CASE WHEN a.reqinitstatus = 0 THEN '未开始'
// 				     WHEN a.reqinitstatus = 1 THEN '进行中'
// 				     WHEN a.reqinitstatus = 2 THEN '已完结' end reqinitstatus,
// 				CASE WHEN a.designstatus = 0 THEN '未开始'
// 				     WHEN a.designstatus = 1 THEN '进行中'
// 				     WHEN a.designstatus = 2 THEN '已完结' end designstatus,
// 				CASE WHEN a.devstatus = 0 THEN '未开始'
// 				     WHEN a.devstatus = 1 THEN '进行中'
// 				     WHEN a.devstatus = 2 THEN '已完结' end devstatus,
// 				CASE WHEN a.teststatus = 0 THEN '未开始'
// 				     WHEN a.teststatus = 1 THEN '进行中'
// 				     WHEN a.teststatus = 2 THEN '已完结' end teststatus,
// 				b.module_name,
// 				a.assignto,
// 				c.title proname
// 				FROM dia_request_org a,dia_module b,dia_project c
// 				WHERE  a.module_id=b.id AND b.project_id = c.id AND a.status=1 AND a.isopen = 2 AND a.createbyid=?
// 				ORDER BY a.id DESC
// 				LIMIT 100";//状态为生效并对外可见
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
				CASE WHEN a.payflag = 0 THEN '未付费'
				     WHEN a.payflag = 1 THEN '已付费' end payflag,
				CASE WHEN a.reqinitstatus = 0 THEN '未开始'
				     WHEN a.reqinitstatus = 1 THEN '进行中'
				     WHEN a.reqinitstatus = 2 THEN '已完结' end reqinitstatus,
				CASE WHEN a.designstatus = 0 THEN '未开始'
				     WHEN a.designstatus = 1 THEN '进行中'
				     WHEN a.designstatus = 2 THEN '已完结' end designstatus,
				CASE WHEN a.devstatus = 0 THEN '未开始'
				     WHEN a.devstatus = 1 THEN '进行中'
				     WHEN a.devstatus = 2 THEN '已完结' end devstatus,
				CASE WHEN a.teststatus = 0 THEN '未开始'
				     WHEN a.teststatus = 1 THEN '进行中'
				     WHEN a.teststatus = 2 THEN '已完结' end teststatus,
				b.module_name,
				a.assignto,
				c.title proname,
				d.realName
				FROM dia_request_org a
				LEFT JOIN dia_module b ON a.module_id = b.id 
				LEFT JOIN dia_project c ON b.project_id = c.id 
				LEFT JOIN dia_user d ON a.assignto = d.id
				WHERE a.createbyid=? AND a.status = 1
				ORDER BY a.id DESC
				LIMIT 1000";//状态为生效并对外可见
		
		$query = $this->db->query($sql,$uid);
		//var_dump($uid);
		return $query->result_array();
	}
	/*
	 * 根据模块ID得到该模块下所有的原始需求列表
	 */
	
	public function getLstByMID($mid)
	{
// 		$this->db->select("id,title,price,type,status,emerlevel,importlevel,end_date");
// 		$this->db->from('dia_request_org');
// 		$where = "module_id".$mid;
// 		$this->db->where("module_id",$mid);
// 		$query=$this->db->get();
// 		return $query->result_array();
// 		//var_dump($query->result_array());
		
		$sql = "SELECT id,caption,price,
				CASE WHEN type=0 THEN '新需求' 
				     WHEN type=1 THEN '任务' 
				     WHEN type=2 THEN 'bug' 
				     WHEN type=3 THEN '改进' end type,
				CASE WHEN status=0 THEN '不生效'
				     WHEN status=1 THEN '生效'
				     WHEN status=2 THEN '完结' end status,
				CASE WHEN emerlevel=0 THEN '不紧急'
				     WHEN emerlevel=1 THEN '普通'
				     WHEN emerlevel=2 THEN '紧急'
				     WHEN emerlevel=3 THEN '非常紧急' end emerlevel,
				CASE WHEN importlevel=0 THEN '不重要'
				     WHEN importlevel=1 THEN '普通'
				     WHEN importlevel=2 THEN '重要'
				     WHEN importlevel-3 THEN '非常重要' end importlevel,
				CASE WHEN isopen=0 THEN '不开放'
				     WHEN isopen=1 THEN '半开放'
				     WHEN isopen=2 THEN '开放' end isopen,
				CASE WHEN payflag=0 THEN '未付款'
					 WHEN payflag=1 THEN '已付款' end payflag,
				end_date 
				FROM dia_request_org WHERE module_id = ? ORDER BY ID DESC";
		$query = $this->db->query($sql, array($mid));
		return $query->result_array();
	}
	
/*
 * 保存上传文件的信息到文件上传表中
 */
	public function saveupload()
	{
	
	}
	
	public function getDetailByID($id)
	{
		$sql = "SELECT * FROM dia_request_org WHERE id = ?";
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
	
	public function addSaveReqOrg($data)
	{
// 		var_dump($data);
// 		exit;
		$dataAdd = array(
				'caption' => $data['caption'] ,
				'detail' => $data['detail'] ,
				'price' => $data['price'],
				'createbyid' => $data['uid'],
				'module_id' => $data['mid'],
				'status' =>$data['status'],
				'emerlevel' => $data['emerlevel'],
				'isopen' => $data['isopen'],
				'importlevel' => $data['importlevel'],
				'type' => $data['type'],
				'end_date'=>$data['enddate'],
				//'assignto'=>$data['assignto'],
		);
		$res = $this->db->insert('dia_request_org', $dataAdd);
		return $this->db->insert_id();
	}
	
	/*
	 * 分配需求给用户
	 */
	public function assignaction($userid,$request_org_id)
	{
		$dataAssign = array(
				'assignto'=>$userid,
		);
		$id = $request_org_id;
		$this->db->where('id', $id);
		$res = $this->db->update('dia_request_org', $dataAssign);
		return $res;
	}
	
	
	/*
	 * 返回插入后的ID
	 */
	public function returnInsertID()
	{
		return $this->db->insert_id();
	}
	
	/*
	 * 添加的原始需求保存 
	 */
	public function appendSaveReqOrg($data)
	{
		$dataAdd = array(
				'caption' => $data['caption'] ,
				'detail' => $data['detail'] ,
				'price' => $data['price'],
				'createbyid' => $data['uid'],
				'module_id' => $data['mid'],
				'status' =>$data['status'],
				'emerlevel' => $data['emerlevel'],
				'isopen' => $data['isopen'],
				'importlevel' => $data['importlevel'],
				'type' => $data['type'],
				'assignto' =>$data['assignto'],
				'end_date'=>date($data['enddate']),
		);
		$res = $this->db->insert('dia_request_org', $dataAdd);
		return $res;
	}
	
	/*
	 * 编辑原始需求的保存
	 */
	public function editSaveReqOrg($data)
	{
		$dataEdit = array(
				'caption' => $data['title1'] ,
				'detail' => $data['detail'] ,
				'price' => $data['price'],
				'createbyid' => $data['uid'],
				'module_id' => $data['mid'],
				'emerlevel' => $data['emerlevel'],
				'status' =>$data['status'],
				'isopen' =>$data['isopen'],
				'importlevel' => $data['importlevel'],
				'type' => $data['type'],
				'end_date'=>$data['end_date'],
				'assignto'=>$data['assignto'],
				'assigntotest' =>$data['assigntotest'],
		);
		$id = $data['rid'];
		$this->db->where('id', $id);
		$res = $this->db->update('dia_request_org', $dataEdit);
		
		return $res;
	}
	
	/*
	 * 按用户名得到该用户所有原始需求的数量
	 */
	public function getCountByUID($uid)
	{
		$sql = "SELECT * FROM dia_request_org WHERE createbyid = ?";
		$query = $this->db->query($sql, $uid);
		$count = count($query->result_array());
		return $count;
	}
	
	/*
	 * 得到未开始的需求数量
	*/
	public function getNoStartReq($uid)
	{
		$sql = "SELECT * FROM dia_request_org WHERE createbyid = ?
				AND reqinitstatus = 0 ";
		$query = $this->db->query($sql, $uid);
		$count = count($query->result_array());
		return $count;
	}

	/*
	 * 得到正在进行中的需求的数量
	 */
	public function getInProgressReq($uid)
	{
		$sql = "SELECT * FROM dia_request_org WHERE createbyid = ?
				AND reqinitstatus = 1 ";
		$query = $this->db->query($sql, $uid);
		$count = count($query->result_array());
		return $count;
	}

	/*
	 * 分配给偶的所有原始需求
	 */
	public function assigntomereqorg($uid)
	{
		$sql = "SELECT * FROM dia_request_org WHERE assignto = ?
				";
		$query = $this->db->query($sql, $uid);
		$count = count($query->result_array());
		return $count;
	}
	
	
	
}