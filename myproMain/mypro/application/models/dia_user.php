<?php
class Dia_User extends CI_Model{
	//后台管理用，显示所有用户
	public function getAll()
	{
		$this->db->select('*');
		$this->db->from('dia_user');
		$this->db->where("status",1);
		$this->db->order_by("id","desc");
		$query=$this->db->get();
		return $query->result_array();
	}
	
	//验证用户登录的合法性
	public function checkUser($data)
	{
		$useremail = $data['useremail'];
		$password = $data['password'];
		//var_dump($data);		
		$sql = "SELECT * FROM dia_user WHERE userEmail = ? AND password = ?";
		$query = $this->db->query($sql, array($useremail,$password));
		//var_dump($query);		
 		$count = count($query->result_array());
 		return $count;
	}
	
	//根据用户邮箱得到ID
	public function getIDbyemail($useremail)
	{
		$sql = "SELECT id FROM dia_user WHERE useremail = ?";
		$query = $this->db->query($sql, array($useremail));
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			$id = $row->id;
		}
		else 
		{
			$id = 0;
		}
		return $id;
	}

	//根据用户ID返回对象
	public function getUserById($id)
	{
		$sql = "SELECT * FROM dia_user WHERE id = ?";
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
	
	//根据用户ID得到昵称
	public function getRealNamebyId($id)
	{
		$sql = "SELECT realname FROM dia_user WHERE id = ?";
		$query = $this->db->query($sql, array($id));
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			$realname = $row->realname;
		}
		else
		{
			$realname = "无名氏";
		}
		
		return $realname;
	}
	
	//注册用户
	public function register($data)
	{
		$dataInsert = array(
			'userEmail' => $data['useremail'],
			'password' => $data['password'],
			'realName' => $data['nickname'],
				'status' => 0,
		);
		$res = $this->db->insert('dia_user',$dataInsert);
		return $res;
		//var_dump(($data['useremail']));
	}
	
	//保存注册信息
	public function saveprofile($data)
	{
		$dataInsert = array(
			'userEmail' => $data['useremail'],
             'realName' => $data['realname'],
				 'city' => $data['location'],
			'mobileNum' => $data['mobileNum'],
				'about' => $data['about'],
		);
		$id = $this->session->userdata('userid');
		$this->db->where('id', $id);
		$res = $this->db->update('dia_user',$dataInsert);
		return $res;
	}
}