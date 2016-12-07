<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller{
	public function User()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('menu');
		$this->load->library('form_validation');
		//$this->output->enable_profiler(TRUE);
		$this->load->model('Dia_User','user');
		$this->load->library('session');
		header("Content-type: text/html; charset=utf-8");
	}
	
	public function index()
	{
		$data['query']=$this->user->getAll();
		$data['title'] = '全站用户';
		$this->load->view('admin/userlist',$data);
	}
	
	/*
	 * 分配给我的原始需求/需求分析/设计/测试
	 */

	public function assigntome()
	{
		echo "xxxxxxxxxx";
	}
	//检查登录的合法性
	public function checklogin()
	{
 		//清除用户的session
		$this->session->unset_userdata('useremail');
		$this->session->unset_userdata('userid');
		$this->session->unset_userdata('realname');
		
		//date_default_timezone_set('PRC');
		$this->load->model('Dia_User','user');
		$data = $this->input->post();
		//var_dump($data);
		$count = $this->user->checkUser($data);
		//var_dump($count);
		if ($count == 0) 
		{
			echo "用户名和密码错，请重新登录！";
			redirect('welcome/error404','location');
		}
		else 
		{
			//将用户邮箱及ID记到Session中备用
			//根据用户邮箱取到ID
			$id = $this->user->getIDbyemail($data['useremail']);
			$realname = $this->user->getRealNamebyId($id);
			if ($id != 0)
			{
				$this->session->set_userdata('userid', $id);
				$this->session->set_userdata('useremail', $data['useremail']);
				$this->session->set_userdata('realname',$realname);
				//echo "登录成功";
				//var_dump($this->session->all_userdata());
				//$this->load->view('dashboard');
				redirect('dashboard','location');
			}
			else 
			{
				echo "用户名和密码错，请重新登录！";
				//redirect('admin/404.php','location');
			}
			//var_dump($this->session->all_userdata());
		}
	}
	
	//登出
	public function logout()
	{
		//清除所有session
		$this->session->unset_userdata('userid');
		$this->session->unset_userdata('useremail');
		$this->session->unset_userdata('realname');
		//$this->load->view('login');
		redirect("login",'location');
	}
	
	//编辑profile
	public function editprofile()
	{
		$this->load->model('Dia_User','user');
		$row = $this->user->getUserById($this->session->userdata("userid"));
		$data['title'] = "编辑个人资料";
		$data['id'] = $row->id;
		$data['useremail'] = $row->userEmail;
		$data['realname'] = $row->realName;
		$data['city'] = $row->city;
		$data['mobileNum'] = $row->mobileNum;
		$data['about'] = $row->about;
		//var_dump($data);
		$this->load->view('editprofile',$data);
	}
	
	//跳转到注册页面
	public function reg()
	{
		$data['title'] = '点金项目细化分包管理平台 注册页面';
		header("Content-type: text/html; charset=utf-8");
		$this->load->view('registration',$data);
	}
	
	//注册操作
	public function register()
	{
		$this->load->model('Dia_User','user');
		//获取POST过来的数据
		$data = $this->input->post();
		//var_dump($data);
		//数据校验合法性
		$this->form_validation->set_rules(array(
				array(
						'field' => 'useremail',
						'label' => '用户登录Email',
						'rules' => 'callback_username_check|required|valid_email|xss_clean|callback_same_check',
				),
				array(
						'field' => 'password',
						'label' => '口令',
						'rules' => 'required',
				),
				array(
						'field' => 'repassword',
						'label' => '重复口令',
						'rules' => 'required',
				),
				array(
						'field' => 'nickname',
						'label' => '昵称',
						'rules' => 'required',
				),
		));
		//$this->form_validation->set_rules('useremail', '用户Email', 'callback_username_check');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">','</div>');
		if (!$this->form_validation->run())
		{
			$data['title'] = "用户注册";
			$this->load->view('registration',$data);
			//redirect(base_url()."index.php/user/reg");
		}
		else 
		{
			if ($data['password'] != $data['repassword'])
			{
				echo "<script language='javascript'>alert(\" 口令不一致！ \")</script>";
				$data['title'] = "用户注册";
				$this->load->view('registration',$data);
			}
			else 
			{	
				//传数据给Model，返回结果
				if ($this->user->register($data))
					echo "<script language='javascript'>alert(\" 注册成功！ \")</script>";
				echo "<script language=\"javascript\" type=\"text/javascript\"> window.location.href=\""
						.base_url(). 
						"login\";</script>";
			}
		}
	}
	
	public function callback_same_check($str)
	{
			return TRUE;
	}
	public function username_check($str)
	{
		if ($str == 'test')
		{
			$this->form_validation->set_message('username_check', '%s 此用户已存在!');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	
	
	
	//保存注册信息
	public function saveprofile()
	{
		$this->load->model('Dia_User','user');
		//获取POST过来的数据
		$data = $this->input->post();
 		if ($this->user->saveprofile($data))
 			redirect('dashboard','location');
	}
	
	
}