<?php
class Dia_Uploadfiles extends CI_Model{
	
	//验证用户登录的合法性
	public function getLst($rid)
	{
		$sql ="SELECT id,filename,size,filetype,fileext,frommod,modid,createbyid,createdatetime 
						FROM dia_uploadfiles 
						WHERE frommod='reqorg' AND modid=?";
		$query = $this->db->query($sql, $rid);
		return $query->result_array();
	}
	
	public function addUploadSave($data)
	{
		$dataAdd = array(
				'filename' => $data['file_name'] ,
				'size' => $data['size'] ,
				'filetype' => $data['file_type'],
				'frommod' =>"reqorg",//标志其为原始需求相关的文件
				'modid'=>$data['rid'],
				'createbyid' => $data['uid'],
		);
		$res = $this->db->insert('dia_uploadfiles', $dataAdd);
		return $res;
	}
	
	/*
	 * 根据ID得出文件名,下载时用
	 */
	public function getNameByID($id)
	{
		$sql = "SELECT filename FROM dia_uploadfiles 
				WHERE frommod='reqorg' AND id = ?";
		$query = $this->db->query($sql, array($id));
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			$filename = $row->filename;
		}
		else
		{
			$filename = "无名氏";
		}
		return $filename;
	}
	
	/*
	 * 删除数据库中文件记录
	 */
	public function deletefiles($chk)
	{
		//查询此模块下是否有需求提交上来，如果有，就不允许删除
		foreach ($chk as &$value) {
			//echo $value;
			$res = $this->db->delete('dia_uploadfiles', array('id' => $value));
		}
		return $res;
	}
	
}