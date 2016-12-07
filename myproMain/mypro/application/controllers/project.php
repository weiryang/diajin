<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller{
	public function Project()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('menu');
		//$this->load->database();已autoload
		$this->load->library('form_validation');
		//$this->output->enable_profiler(TRUE);
		$this->load->library('session');
		header("Content-type: text/html; charset=utf-8");
		$useremail = $this->session->userdata('useremail');
		$this->load->model('Dia_Project','project');
		$this->load->model('Dia_Module','module');
		//var_dump($useremail) ;
		if ($useremail == "" )
		{
			echo "未成功登录系统或登录超时，请返回!";
			exit();
		}
	}
	
	public function index()
	{
		$data['query']=$this->project->getAll();
		$data['title'] = '全站项目';
		//$data['userid'] = $this->session->userdata('userid');
        //$data['query'] = $this->db->get('dia_project');
 		$data['useremail'] =  $this->session->userdata('useremail');
 		//var_dump($useremail) ;
		$this->load->view('project/projectall',$data);
	}
	
	
	public function detail()
	{
		$data['title'] = '项目详细';
		$data['id'] = $this->uri->segment(3); 
		$data['userid'] = $this->session->userdata('userid'); 
		$this->db->where('id',$this->uri->segment(3));
                $data['query'] = $this->db->get('dia_project');
		$this->load->view('project/projectdetail',$data);
	}

	public function myproject()
	{
		$this->load->model('Dia_Project','project');
		$this->load->model('Dia_user','user');
		$myproid = $this->session->userdata('userid');
		//var_dump($myproid);
		$data['query']=$this->project->myProLst($myproid);
		$data['title'] = '我的项目';
		$this->load->view('project/myproject',$data);
	}
	
	public function mydetail()
	{
		$data['title'] = '我的项目详细';
		$data['id'] = $this->uri->segment(3);
		$data['userid'] = $this->session->userdata('userid');
		$this->db->where('id',$this->uri->segment(3));
		$data['query'] = $this->db->get('dia_project');
// 		var_dump($data['query']->result_array());
// 		exit();
		$this->load->view('project/myprojectdetail',$data);
	}
	
	public function myprojectsave()
	{
		$this->load->model('Dia_Project','myproject');
		//获取POST过来的数据
		$data = $this->input->post();
		$data['id'] = $this->uri->segment(3);
 		if ($this->myproject->savemyproject($data))
// 			//echo "success";
 			redirect('project/myproject','location');
	}
	
	public function modules()
	{
		//$data['title'] = '项目模块列表';
		$data['id'] = $this->uri->segment(3);
		$this->db->where('id',$this->uri->segment(3));
		$data['query'] = $this->db->get('dia_project');
		$this->load->view('modules/modules',$data);
	}
		
	public function add()
	{
		$data['title'] = '添加项目详细';
		$this->load->view('project/projectadd',$data);
	}
	
	public function insert()
	{
		$_POST['budget'] = (int)$_POST['budget'];
		$_POST['title'] = html_escape($_POST['title']);
	
		//$rules('title') = "required";
		//		$rules('name') = "required";
		//	$this->validation->set_rules($rules);
		$this->form_validation->set_rules(array(
			array(
				'field' => 'title',
				'label' => '标题',
				'rules' => 'required',					
			),
			array(
				'field' => 'budget',
				'label' => '预算',
				'rules' => 'required|is_numeric',
			),
			array(
					'field' => 'city',
					'label' => '所在城市',
					'rules' => 'required',
			),
			array(
					'field' => 'project_detail',
					'label' => '项目详细描述',
					'rules' => 'required',
			),
		));
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">','</div>');
		if (!$this->form_validation->run())
		{
			//echo var_dump($_POST);
			//echo var_export($_POST);
			$data['title'] = '添加项目详细';;
			$this->load->view('project/projectadd',$data);
		}
		else 
		{
//			$this->db->insert('dia_project',$_POST);
			$data = array(
					'title'=>html_escape($_POST['title']),
					'budget'=>(int)$_POST['budget'],
					'city'=>$_POST['city'],
					'cellphone' => html_escape($_POST['cellphone']),
					'project_detail'=>$_POST['project_detail'],
					'createbyid' =>$this->session->userdata('userid'),
			);
		
			/*	
			$this->Dia_Project->title = html_escape($_POST['title']);
			$this->Dia_Project->budget = (int)$_POST['budget'];
			$this->Dia_Project->city = $_POST['city'];
			$this->Dia_Project->project_detail = $_POST['project_detail'];
			$this->Dia_Project->save();
			*/
// 			var_dump($_POST);
// 			exit();
			if ($this->project->save($data) == true) var_dump($_POST);
			$pid = mysql_insert_id();
			$data1['pid'] = $pid;
			$data1['uid'] = $this->session->userdata('userid');
			var_dump($this->module->addModuleWithPro($data1));
			redirect('project/myproject','location');  
			//echo "success";
		}
	}
}

