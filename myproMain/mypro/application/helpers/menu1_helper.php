<?php
function outputmenu($uri)
{
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


	
	
	
	
	/*
	 * 做循环输出，根据传入的$url给第一级array加active和其本身加active的class
	 */
	//    $json_str=json_encode($tmparr);
	
	foreach($data as $key=>$value)
	{
		$i = 1;
		foreach($value as $key1=>$value1)
		{
			//如果为第一级且仅有一级
			if (count($value) == 1) 
			{
				if (strpos($value1,$uri))
				{
					echo "<li><a href=\"".base_url()."index.php/".$value1."\"><span class=\"iconfa-laptop\"></span>".$key1."</a></li>";
				}
				else
				{
					echo "<li class=\"active\"><a href=\"".base_url()."index.php/".$value1."\"><span class=\"iconfa-laptop\"></span>".$key1."</a></li>";
				}
			}
			else//如果为多级时 
			{
  				if ($i == 1)
  					echo "<li class=\"dropdown \" id=\"allsiteproject\"><a href=\"\"><span class=\"iconfa-book\"></span>".$key1."</a><ul style=\"\">";
			}
			$i++;
		}
	}
	
}
