<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class WholeDesign extends CI_Controller{

	/*
	 * 初始化
	 */
	public function WholeDesign()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('menu');
		header("Content-type: text/html; charset=utf-8");
		$this->load->model('Dia_Design_Framework','wholedesign');
		
	}
	
	/*
	 * 根据项目ID找出所有该项目的总体设计
	 */
	public function lstbypid()
	{
		$data['pid'] = $this->uri->segment(3);
		$pid = $data['pid'];
		$data['title'] = '总体设计';
		$data['query'] = $this->wholedesign->getAll($pid);
		//var_dump($data);
		$this->load->view('wholedesign/lstbypid',$data);
	}
	
	/*
	 * 添加一个总体设计
	 */
	public function add()
	{
		$this->load->model('Dia_Project','project');
		$data['pid'] = $this->uri->segment(3);
		$pid = $data['pid'];
		//var_dump($pid);
		$title = $this->project->getTitleByPID($pid);
		$data['title'] = $title.'-添加总体设计';
		//var_dump($data);
		$this->load->view('wholedesign/add',$data);
	}
	
	/*
	 * 添加保存总体设计
	 */
	public function addsave()
	{
		$useremail = $this->session->userdata('useremail');
		//var_dump($useremail) ;
		if ($useremail == "" )
		{
			echo "未成功登录系统或登录超时，请返回!";
		}
		else
		{
			$data = $this->input->post();
			$data['pid'] = $this->uri->segment(3);
			$data['uid'] = $this->session->userdata('userid');
			$this->form_validation->set_rules(array(
					array(
							'field' => 'designtarget',
							'label' => '设计目标',
							'rules' => 'required',
					),
					array(
							'field' => 'description',
							'label' => '设计描述',
							'rules' => 'required',
					),
			));
			$this->form_validation->set_error_delimiters('<div class="alert alert-error">','</div>');
			if (!$this->form_validation->run())
			{
				$data['title'] = '添加总体设计';;
				$this->load->view('wholedesign/add',$data);
			}
			else
			{
				$res = $this->wholedesign->addSaveDesignFramework($data);
				//var_dump($data);
				if ($res) redirect('wholedesign/lstbypid/'.$data['pid'],'location');
			}
		}
	}
	
	/*
	 *总体设计详情查询 
	 */
	public function viewdetail()
	{
		$data['title'] = '原始需求详情';
		$uid = $this->session->userdata('userid');
		$id = $this->uri->segment(3);
		$mEntity = $this->wholedesign->getDetailByID($id);
		$data['id'] = $mEntity->id;
		$data['designtarget'] = $mEntity->designtarget;
		$data['devlanguage'] = $mEntity->devlanguage;
		$data['devdatabase'] = $mEntity->devdatabase;
		$data['description'] = $mEntity->description;
		$data['key_tech'] = $mEntity->key_tech;
		$data['price'] = $mEntity->price;
		$data['env_des'] = $mEntity->env_des;
		$data['isopen'] = $mEntity->isopen;
		$data['codeaddress'] = $mEntity->codeaddress;
		$data['realname'] = $mEntity->realname;
		$data['createdatetime'] = $mEntity->createdatetime;
		//var_dump($data);
		$this->load->view('wholedesign/viewdetail',$data);
	}
	
	/*
	 * 我的总体设计----
	*/
	public function mywholedesign()
	{
		$uid = $this->session->userdata('userid');
		$data['title'] = '我的总体设计';
		$data['query'] = $this->wholedesign->getAllByUid($uid);
		//var_dump($data);
		$this->load->view('wholedesign/mylst',$data);		
	}
	
}