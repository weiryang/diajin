<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller{
	
	public function Dashboard()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('menu');
		$this->load->library('session');
		$this->load->model('Dia_Request_Org','request_org');
		$this->load->model('Dia_Request_Init','request_init');
		$this->load->model('Dia_Project','project');
		header("Content-type: text/html; charset=utf-8");    
		if (!$this->is_logged_in())
		{
			redirect('login','location');
		}
	}
	
	public function index()
	{
		if (!$this->is_logged_in())
        {	
        	redirect('login','location');
		}
		else 
		{
			/*
			 * 做基本的初始化,如将过期的原始需求状态至为未生效,即0
			 * 准备要显示的统计数据,如所有项目个数,所有原始需求个数,所有IN PROGRESS的需求,正在开发的需求,正在设计的需求,正在测试的需求,已结算完结的需求,可接单的乙方个数,可用的总体设计个数等
			 */
			//$this->request_org->initovertime();
			$projectcount = $this->project->getCountByUID($this->session->userdata('userid'));
			$reqorgcount = $this->request_org->getCountByUID($this->session->userdata('userid'));
			$nostartreq = $this->request_org->getNoStartReq($this->session->userdata('userid'));
			$inprogressreq = $this->request_org->getInProgressReq($this->session->userdata('userid'));
			//做为乙方时
			//分配给偶的所有需求分析
			$assigntoMeAllReqorg = $this->request_org->assigntomereqorg($this->session->userdata('userid'));
			//我未开始的需求分析
			$assignToMeNotStartReqorgCount = $this->request_org->assigntomereqorg($this->session->userdata('userid')); 
			//分配给我的进行中的需求分析
			$assigntomeinprogressreqorg = $this->request_org->assigntomereqorg($this->session->userdata('userid'));
			//我未开始的设计
			//$assigntomenostartdesign = $this->
			//我进行中的设计
			//$assigntomeinprogressdev =
					
			//我未开始的开发
			//$assigntomenostartdev =
			//我进行中的开发
			//$assigntomeinprogressdev =
			
			//我未开始的测试
			//$assigntomenostarttest =
			//我进行中的测试
			//$assigntomeinprogresstest =
			 			
			$data["title"] = "看板";
			$data["heading"] = "看板标题";
			$data["projectCount"] = $projectcount;
			$data["reqorgcount"] = $reqorgcount;
			$data["nostartreq"] = $nostartreq;
			$data["inprogressreq"] = $inprogressreq;
			$data["assigntoMeAllReqorg"] = $assigntoMeAllReqorg;
			
			$this->load->view('dashboard',$data);
		}
		//var_dump($useremail);
	}
}

