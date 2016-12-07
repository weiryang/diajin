<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	var $base;
	var $css;
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function Welcome()
	{
		parent::__construct();
		$this->load->database();
		header("Content-type: text/html; charset=utf-8");
	}
	
	public function error404()
	{
		$this->load->view('admin/404');
	}
	
	public function index()
	{
		$data['title'] = "点金软件项目细化分包管理平台";
		$data['body'] = "我的内容";
		//$query = $this->db->get('dia_project');
		$data['query'] = $this->db->get('dia_project');
		$this->load->view('welcome__message',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
