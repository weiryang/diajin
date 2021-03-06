<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Request extends CI_Controller{
	
	public function Request()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('Dia_Request_Org','request_org');
		$this->load->model('Dia_User','user');
		$this->load->model('Dia_Request_Init','request_init');
		$this->load->model('Dia_Module','module');
		$this->load->helper('form');
		$this->load->helper('menu');
		$this->load->helper('download');
		$this->load->helper('file');
		$this->load->library('form_validation');
		header("Content-type: text/html; charset=utf-8");
	}
	
	/*
	 * 原始需求的默认页面
	 */
	public function index()
	{
		$data['title'] = '所有原始需求';
		$data['query'] = $this->request_org->getAll();
		//var_dump($data);
		$this->load->view('request/lst',$data);
	}
	
	/*
	 * 需求分派
	 */
	public function assign()
	{
		$data['title'] = '所有原始需求';
		$uid = $this->session->userdata('userid');
		//得到所有可分配的用户列表
		$data['queryoption'] = $this->user->getAll();
		$data['query'] = $this->request_org->getAllByUID($uid);
		$this->load->view('request/assign',$data);
	}
	
	/*
	 * 分派操作 
	 */
	public function assignaction()
	{
// 		var_dump($_POST);
// 		exit();
		if (isset($_POST))
		{
			if ($_POST['selectvalue'] == "")
			{
				echo "请选择一个用户进行分派！";
				exit();
			}
			if (!isset($_POST['chk']))
			{
				echo "请选择一个需求进行分派！";
				exit();
			}
			//将选中的需求分派给选中的人
			$userid = $_POST['selectvalue'];
			$chk = $_POST['chk'];
			foreach ($chk as $key=>$value)
			{
				$res = $this->request_org->assignaction($userid,$value);
			}
		}
		
		redirect('request/assign','location');
// 		$data['title'] = '所有原始需求';
// 		$uid = $this->session->userdata('userid');
// 		$data['queryoption'] = $this->user->getAll();
// 		$data['query'] = $this->request_org->getAllByUID($uid);
// 		$this->load->view('request/assign',$data);
	}
	
	
	/*
	 * 我的原始需求
	 */
	public function myreq()
	{
		$mid = $this->uri->segment(3);
		$data['query'] = $this->request_org->getLstByMID($mid);
		$data['mid'] = $mid;
		$title = $this->module->getModNameByMID($mid);
		$data['title'] = $title.'-原始需求';
		//var_dump($data);
		$this->load->view('request/myrequest',$data);
	}
	
	/*
	 * 需求分析列表
	 */
	
	public function reqinitlst()
	{
		$data['rid'] = $this->uri->segment(3); 
		$data['query'] = $this->request_init->getLstByRID($data['rid']);
//		var_dump($data);
// 		$url='http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
// 		echo dirname($url);
// 		$data['rid'] = $rid;
		$row = $this->request_org->getDetailByID($data['rid']);
		$title = $row->caption;
 		$data['title'] = $title.'-我的需求分析投标';
		//var_dump($data);
 		$this->load->view('request/myrequestinit',$data);
	}
	
	public function requestdetail()
	{
		$id = $this->uri->segment(3);
		$data['query'] = $this->request_org->getDetailByID($id);
		$data['title'] = "";
		$this->load->view('request/edit',$data);
	}
	
	public function viewdetail()
	{
		$this->load->model('Dia_Request_Org','request_org');
		$data['title'] = '原始需求详情';
		$uid = $this->session->userdata('userid');
		$mid = $this->uri->segment(3);
		$mEntity = $this->request_org->getDetailByID($mid);
		$data['rid'] = $mEntity->id;
		$data['payflag'] =  $mEntity->payflag;
		$data['caption'] = $mEntity->caption;
		$data['price'] = $mEntity->price;
		$data['detail'] = $mEntity->detail;
		$data['emerlevel'] = $mEntity->emerlevel;
		$data['importlevel'] = $mEntity->importlevel;
		$data['type'] = $mEntity->type;
		//var_dump($data);
		$this->load->view('request/viewdetail',$data);
	}
	
	/*
	 * 需求分析详细
	 */
	
	public function viewdetailinit()
	{
		$this->load->model('Dia_Request_Init','request_Init');
		$data['title'] = '需求分析详情';
		$uid = $this->session->userdata('userid');
		$reqid = $this->uri->segment(3);
		$rEntity = $this->request_init->getDetailByID($reqid);
		$data['rid'] = $rEntity->id;
		$data['caption'] = $rEntity->caption;
		$data['price'] = $rEntity->price;
		$data['description'] = $rEntity->description;
		$data['inputtext'] = $rEntity->inputtext;
		$data['outputtext'] = $rEntity->outputtext;
		$data['effectEstimate'] = $rEntity->effectEstimate;
		$data['dealprocess'] = $rEntity->dealprocess;
		//var_dump($data);
		$this->load->view('request/viewdetailinit',$data);
	}	
	
	public function add()
	{
		$this->load->model('Dia_user','users');
		$data['users'] = $this->users->getAll();
		$this->load->model('Dia_Module','module');
		$data['mid'] = $this->uri->segment(3);
		$mid = $data['mid'];
		//var_dump($pid);
		$data['title'] = '添加需求';
		$title = $this->module->getModuleByID($mid)->module_name;
		$data['title'] = $title.'-原始需求';
		//var_dump($data);
		$this->load->view('request/add',$data);
	}
	
	/*
	 * 添加需求,过程中选择项目及模块
	 */
	public function append()
	{
		//获取到项目下拉列表
		//获取到模块下拉列表 用项目刷新模块
		$this->load->model('Dia_user','users');
		$data['users'] = $this->users->getAll();
		$data['title'] = '添加原始需求';
		$uid = $this->session->userdata('userid');
		$modules = $this->module->getModulesByUid($uid);
		if(!empty($modules))
		{
			$data['modules'] = $modules;
			$this->load->view('request/append',$data);
		}
		else 
		{
			echo "请先建立项目(新建项目将自动增加一个默认模块)!";
		}
	}
	
	
	/*
	 * 保存添加需求
	 */
	public function appendsave()
	{
		$data = $this->input->post();
		
		$uid = $this->session->userdata('userid');
		$modules = $this->module->getModulesByUid($uid);
		$data['modules'] = $modules;
		$data['uid'] = $this->session->userdata('userid');
		$this->form_validation->set_rules(array(
				array(
						'field' => 'caption',
						'label' => '需求名称',
						'rules' => 'required',
				),
				array(
						'field' => 'price',
						'label' => '标价',
						'rules' => 'is_numeric|min_length[1]|max_length[4]',
				),
				array(
						'field' => 'detail',
						'label' => '需求描述',
						'rules' => 'required',
				),
		));
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">','</div>');
		$year=(substr($data['enddate'],6,4));//取得年份
		$month=(substr($data['enddate'],0,2));//取得月份
		$day=(substr($data['enddate'],3,2));//取得几号
		$time = strtotime($year.'-'.$month.'-'.$day." 23:59:59");
		$data['enddate'] = date("Y-m-d H:i:s",$time);
		if (!$this->form_validation->run())
		{
			$data['title'] = '添加原始需求';;
			$this->load->view('request/append',$data);
		}
		else
		{
			$res = $this->request_org->appendSaveReqOrg($data);
// 			//同时将此ID的原始需求插入到需求分析表中
// 			$data["request_org_id"] = $this->request_org->returnInsertID();
// 			$resInit = $this->request_init->addSaveReqInitAddReqOrg($data);
			//var_dump($data);
			if ($res) redirect('project/myproject','location');
		}
	}
	
	public function addinit()
	{

		$data['rid'] = $this->uri->segment(3);
// 		var_dump($data);
// 		exit();
		$rid = $data['rid'];
		$row = $this->request_org->getDetailByID($data['rid']);
		$data['title'] = $row->caption.'-需求分析';
		//var_dump($data);
		$this->load->view('request/addinit',$data);
	}
	
	//需求分析，添加，保存
	public function addinitsave()
	{
		$this->load->model('Dia_Request_Init','request_init');
		$data = $this->input->post();
		$data['request_org_id'] = $this->uri->segment(3);
		$data['uid'] = $this->session->userdata('userid');
		$this->form_validation->set_rules(array(
				array(
						'field' => 'caption',
						'label' => '需求名称',
						'rules' => 'required',
				),
				array(
						'field' => 'inputtext',
						'label' => '输入',
						'rules' => 'required',
				),
				array(
						'field' => 'outputtext',
						'label' => '输出',
						'rules' => 'required',
				),
				array(
						'field' => 'description',
						'label' => '需求分析描述',
						'rules' => 'required',
				),
		));
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">','</div>');

		if (!$this->form_validation->run())
		{
			$data['title'] = '添加需求分析';;
			$this->load->view('request/addinit',$data);
		}
		else
		{
			$res = $this->request_init->addSaveReqInit($data);
			//var_dump($data);
			if ($res) redirect('request/reqinitlst/'.$data['request_org_id'],'location');
		}
	}
	
	//我的原始需求，添加，保存
	public function addsave()
	{
		$this->load->model('Dia_Request_Org','request_org');
		$data = $this->input->post();
		$data['mid'] = $this->uri->segment(3);
		$data['uid'] = $this->session->userdata('userid');
		$this->form_validation->set_rules(array(
				array(
						'field' => 'caption',
						'label' => '需求名称',
						'rules' => 'required',
				),
				array(
						'field' => 'price',
						'label' => '标价',
						'rules' => 'is_numeric|min_length[2]|max_length[4]',
				),
				array(
						'field' => 'detail',
						'label' => '需求描述',
						'rules' => 'required',
				),
		));
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">','</div>');
		
		$year=(substr($data['enddate'],6,4));//取得年份
		$month=(substr($data['enddate'],0,2));//取得月份
		$day=(substr($data['enddate'],3,2));//取得几号
		$time = strtotime($year.'-'.$month.'-'.$day." 23:59:59");
		$data['enddate'] = date("Y-m-d H:i:s",$time);
		
		if (!$this->form_validation->run())
		{
			$data['title'] = '添加原始需求';;
			$this->load->view('request/add',$data);
		}
		else
		{
			$res = $this->request_org->addSaveReqOrg($data);
			//同时将此ID的原始需求插入到需求分析表中
			$data['reqorgid'] = $res;
			$resInit = $this->request_init->addSaveReqInitAddReqOrg($data);
// 			var_dump($resInit);
// 			exit();
			if ($resInit) redirect('request/myreq/'.$data['mid'],'location');
		}
	}
	
	public function editsave()
	{
		$this->load->model('Dia_Request_Org','request_org');
		$data = $this->input->post();
		$data['rid'] = $this->uri->segment(3);
		$mid = $this->request_org->getDetailByID($data['rid'])->module_id;
		$data['mid'] = $mid;
		$data['uid'] = $this->session->userdata('userid');
		//日期处理
		$year=(substr($data['enddate'],6,4));//取得年份
		$month=(substr($data['enddate'],0,2));//取得月份
		$day=(substr($data['enddate'],3,2));//取得几号
		$time = strtotime($year.'-'.$month.'-'.$day." 23:59:59");
		$data['end_date'] = date("Y-m-d H:i:s",$time);
//  		var_dump($data);
//  		exit();
		$this->form_validation->set_rules(array(
				array(
						'field' => 'title1',
						'label' => '需求名称',
						'rules' => 'required',
				),
				array(
						'field' => 'price',
						'label' => '标价',
						'rules' => 'is_numeric|min_length[1]|max_length[4]',
				),
				array(
						'field' => 'detail',
						'label' => '需求说明',
						'rules' => 'required',
				),
		));
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">','</div>');
		if (!$this->form_validation->run())
		{
			$data['title'] = '修改原始需求';;
			$this->load->view('request/edit',$data);
		}
		else
		{
			$res = $this->request_org->editSaveReqOrg($data);
			//var_dump($data);
			if ($res) redirect('request/myreq/'.$mid,'location');
		}
	}
	
	public function edit()
	{
		//$this->load->model('Dia_Request_Org','request_org');
		$this->load->model('Dia_user','users');
		$data['title'] = '我的原始需求维护';
		$uid = $this->session->userdata('userid');
		$mid = $this->uri->segment(3);
		$mEntity = $this->request_org->getDetailByID($mid);
		//日期处理
		$year=(substr($mEntity->end_date,0,4));//取得年份
		$month=(substr($mEntity->end_date,5,2));//取得月份
		$day=(substr($mEntity->end_date,8,2));//取得几号
		$enddate = $month.'/'.$day.'/'.$year;
		
		$data['rid'] = $mEntity->id;
		$data['payflag'] = $mEntity->payflag;
		$data['isopen'] = $mEntity->isopen;
		$data['caption'] = $mEntity->caption;
		$data['price'] = $mEntity->price;
		$data['detail'] = $mEntity->detail;
		$data['status'] = $mEntity->status;
		$data['emerlevel'] = $mEntity->emerlevel;
		$data['importlevel'] = $mEntity->importlevel;
		$data['type'] = $mEntity->type;
		$data['end_date'] = $enddate;
		$data['assignto'] = $mEntity->assignto;
		$data['assigntotest'] = $mEntity->assigntotest;
		$data['users'] = $this->users->getAll();
		
		//var_dump($data);
		$this->load->view('request/edit',$data);
	}

	/*
	 * 下载文件
	 */
	public function downloadfile($id)
	{
		$this->load->model('Dia_Uploadfiles','uploadfile');
		$filename = $this->uploadfile->getNameByID($id);
 		$data = file_get_contents(base_url() ."uploads/".$filename); // 读文件内容
 		$name = $filename;
 		force_download($name, $data);
	}
	
	/*
	 * 删除文件 
	 */
	public function deletefile()
	{
		$this->load->model('Dia_Uploadfiles','uploadfile');
		$data = $this->input->post();
		$id = $this->uri->segment(3);
		if ($data)
		{
			foreach ($data['chk'] as $key=>$value)
			{
				$filename = $this->uploadfile->getNameByID($value);
				//delete_files('./uploads/'.$filename);
				unlink('./uploads/'.$filename);
			}
			//var_dump(getcwd());
			$res = $this->uploadfile->deletefiles($data['chk']);
			redirect('request/uploadfiles/'.$id,'location');
		}
		else
		{
			echo "无数据删除";
		}
	}
	
	/*
	 * 按ID下载文件
	 */
	public function downloadlst()
	{
		$this->load->model('Dia_Uploadfiles','uploadfile');
		$rid = $this->uri->segment(3);
		$data['rid'] = $rid;
		$data['title'] = "需求文件下载";
		//读出数据库中已上传文件记录
		$data['query'] = $this->uploadfile->getLst($rid);
		$this->load->view('request/downloadlst', $data);
	}
	
	/*
	 * 原始需求按ID上传文件
	 */
// 	public function uploadfiles()
// 	{
// 		$rid = $this->uri->segment(3);
// 		$data['rid'] = $rid;
// 		$data['title'] = "原始需求文件上传";
// 		$this->load->view('request/uploadfiles',$data);
// 	}
	
	
	public function uploadfiles()
	{
		$this->load->model('Dia_Uploadfiles','uploadfile');
		$rid = $this->uri->segment(3);
		$data['rid'] = $rid;
		$data['title'] = "原始需求文件上传";
		//读出数据库中已上传文件记录
		$data['query'] = $this->uploadfile->getLst($rid);
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '512';
		$config['max_width']  = '10240';
		$config['max_height']  = '7680';
		//var_dump($config);
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			//var_dump($error);
			$this->load->view('request/uploadfiles', $data);
		}
		else
		{
			$ud = array('upload_data' => $this->upload->data());
			//$this->load->view('upload_success', $data);
			$data1['file_name'] = $ud["upload_data"]["file_name"];
			$data1['file_type'] = $ud["upload_data"]["file_type"];
			$data1['size'] = $ud["upload_data"]["file_size"];
			$data1['uid'] = 	$this->session->userdata('userid');
			$data1['rid'] = $this->uri->segment(3);
			$res = $this->uploadfile->addUploadSave($data1);
			if ($res) redirect('request/uploadfiles/'.$data1['rid'],'location');
		}
	}
	
}