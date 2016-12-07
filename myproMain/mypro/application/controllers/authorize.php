<?php
$data = array(
		array('看板 Dashboard'=>'dashboard/'),
		array('全站项目 Site Project' => '',
					'项目总览 All Project'=>'project/',
					'最新需求列表 Request'=>'dashboard/'
					),
		array('我的项目 My Project' => '',
					'项目发布 New Project' =>'project/add',
					'项目列表 Browse' => 'project/myproject',
					),
		array('我的接单 My Cases' =>'',
					'总览 Take A Look' =>'',
					'设计 My Designs' =>'',
					'开发 My Develope' =>'',
					'测试 My Tests' =>'',
					),
		array('我的管理 My Manage' =>'',
					'我的好友 My Friends' =>'',
					),
		
);

class authorize
{

	function show_authorize()
	{
		$obj = & get_instance();
		$obj->load->helper('url');
		$menu = anchor("","");
		$menu = anchor("","");
		$menu = anchor("","");
		$menu = anchor("","");
		return $menu;

	}
}
