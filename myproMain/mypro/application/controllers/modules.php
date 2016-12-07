<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modules extends CI_Controller{
	
	public function Modules()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('menu');
		header("Content-type: text/html; charset=utf-8");
		$this->load->model('Dia_Module','module');
	}

	public function index()
	{

	}
	
	public function modlst()
	{
		$this->load->model('Dia_Module','module');
		$data['title'] = '项目模块';
		$pid = $this->uri->segment(3);
		$data['query']=$this->module->getAll($pid);
		//var_dump($data);
		$this->load->view('module/modules',$data);
	}
	
	public function mymod()
	{
		$this->load->model('Dia_Module','module');
		$this->load->model('Dia_Project','project');
		$pid = $this->uri->segment(3);
		$data['title'] = $this->project->getTitleByPID($pid).' 项目模块';//加上项目名称
		$data['pid'] = $pid;
		$uid = $this->session->userdata('userid');
		$trans = array(
			'pid' => $pid,
			'uid' => $uid,
		);
		//var_dump($trans);
		$data['query']=$this->module->getAllByPidUid($trans);
		//var_dump($data);
		$this->load->view('module/mymodules',$data);
	}
	

	//我的模块，编辑，保存
	public function editsave()
	{
		$this->load->model('Dia_Module','module');
		$data = $this->input->post();
		$mid = $this->uri->segment(3);
		$data['id'] = $mid;
		//根据模块ID查出项目ID，传值用
		$mEntity = $this->module->getModuleByID($mid);
		$pid = $mEntity->project_id;
		//var_dump($data);
		$res = $this->module->saveModuleByID($data);
		if ($res) 
			redirect('modules/mymod/'.$pid,'location');
	}
	
	//我的模块，添加，保存
	public function addsave()
	{
		$this->load->model('Dia_Module','module');
		$data = $this->input->post();
		$data['pid'] = $this->uri->segment(3);
		$data['uid'] = $this->session->userdata('userid');
		$this->form_validation->set_rules(array(
				array(
						'field' => 'module_name',
						'label' => '模块名称',
						'rules' => 'required',
				),
				array(
						'field' => 'content',
						'label' => '模块说明',
						'rules' => 'required',
				),
		));		
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">','</div>');
		if (!$this->form_validation->run())
		{
			$data['title'] = '添加模块';;
			$this->load->view('module/add',$data);
		}
		else
		{
			//echo "保存模块";
			$res = $this->module->addSaveModule($data);
			if ($res) redirect('modules/mymod/'.$data['pid'],'location');
		}		
		//var_dump($data);
		//$res = $this->module->addSaveModule($data);
		// 		if ($res)
		// 			redirect('modules/mymod/'.$pid,'location');
	}
	
	public function edit($mid)
	{
		$this->load->model('Dia_Module','module');
		$data['title'] = '我的项目模块维护';
		$uid = $this->session->userdata('userid');
		$mid = $this->uri->segment(3);
		$mEntity = $this->module->getModuleByID($mid);
		$data['id'] = $mEntity->id;
		$data['module_name'] = $mEntity->module_name;
		$data['content'] = $mEntity->content;
		//var_dump($mEntity);
		$this->load->view('module/edit',$data);
	}
	
	/*
	 * 根据项目ID获取所有该项目的模块
	 */
	public function getlstbypid($pid)
	{
		
	}
	
	public function add()
	{
		$data['pid'] = $this->uri->segment(3);
		//var_dump($pid);
		$data['title'] = '添加模块';
		$this->load->view('module/add',$data);
	}

	public function deleteaction()
	{
 		$data = $this->input->post();
 		$pid = $this->uri->segment(3);
 		//var_dump($pid);
 		if ($data) 
 		{
 			//$res = $this->module->delete($data['chk']);
 			redirect('modules/mymod/'.$pid);
 		}
 		else 
 		{
 			echo "无数据删除";
 		}
 		//var_dump($res);
 		//var_dump($data['chk']);
 		//$array = $_POST['chk'];
 		//print_r($array);
 		
	}
}
