<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller{
	public function Project()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->database();
		$this->load->library('form_validation');
		//$this->output->enable_profiler(TRUE);
	}
	
	public function index()
	{
		$this->load->model('Dia_Project');
		$data['title'] = '全站项目';
        $data['query'] = $this->db->get('dia_project');
		$this->load->view('projectview',$data);
	}
	
	public function detail()
	{
		$data['title'] = '项目详细';
		$data['id'] = $this->uri->segment(3); 
		$this->db->where('id',$this->uri->segment(3));
                $data['query'] = $this->db->get('dia_project');
		$this->load->view('projectdetail',$data);
	}
	
	public function add()
	{
		$data['title'] = '添加项目详细';
		$this->load->view('projectadd',$data);
	}
	
	public function adddo()
	{
		$this->load->model('Dia_Project');
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
			$this->load->view('projectadd',$data);
		}
		else 
		{
//			$this->db->insert('dia_project',$_POST);
			$this->Dia_Project->title = html_escape($_POST['title']);
			$this->Dia_Project->budget = (int)$_POST['budget'];
			$this->Dia_Project->city = $_POST['city'];
			$this->Dia_Project->project_detail = $_POST['project_detail'];
			$this->Dia_Project->save();
			var_dump($_POST);
			redirect('project/index/ap','location');  
			echo "success";
		}
	}
}

?>
