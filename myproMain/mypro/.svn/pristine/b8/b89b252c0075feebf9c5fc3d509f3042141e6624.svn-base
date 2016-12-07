<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
	
	public function  Login()
	{
		//$this->load->library('session');
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function index() 
	{
		$this->load->view('login');
	}
	
	public function checkUser($useremail,$password)
	{
		$this->load->model('Dia_User','user');
		$bool = $this->user->checkUser($useremail,$password);
	}
}


