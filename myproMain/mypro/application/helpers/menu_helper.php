<?php

function checkstr($beinclude,$uri){
	$tmparray = explode($uri,$beinclude);
	if(count($tmparray)>1){
		return true;
	} else{
		return false;
	}
}

function outputmenu($uri,$useremail)
{
	$data = array(
					'1' =>array('name'=>'看板 Dashboard','icon'=>'iconfa-laptop','url'=>'dashboard'),
					'2' =>array('name'=>'全站项目 Whole projects','icon'=>'iconfa-book','url'=>''),
					'3' =>array('name'=>'我的项目 Site Project','icon'=>'iconfa-pencil"','url' =>''),
					'4'=>array('name'=>'我的接单 All Undertake','icon'=>'iconfa-briefcase','url' => ''),
					'5'=>array('name'=>'我的管理 Request','icon'=>'iconfa-user','url'=>''),
					'6'=>array('name'=>'站内服务 Services','icon'=>'iconfa-th-list','url'=>''),
					'7'=>array('name'=>'需知及帮助 Help','icon'=>'iconfa-envelope','url'=>''),
					'8'=>array('name'=>'Admin 管理入口','icon'=>'iconfa-wrench','url'=>''),
					);
	
	$menulst = array(
					'1'=>array(array('name'=>'','icon'=>'','url'=>''),),
					'2'=>array(
									array('name'=>'项目总览 All Projects','icon'=>'','url'=>'project',
											'link'=>array('project/detail','modules/modlst','wholedesign/lstbypid','wholedesign/add')),//link为打开页面中的链接
									array('name'=>'最新需求 Top100 Request','icon'=>'','url'=>'request',
											'link'=>array('request/viewdetail','request/reqinitlst','request/downloadlst')),
					),
					'3'=>array(
									array('name'=>'项目维护 Browse','icon'=>'','url'=>'project/myproject',
											'link'=>array('project/mydetail','modules/mymod','request/myreq','request/add','request/edit','project/add','request/uploadfiles','modules/edit')),
									array('name'=>'需求分配 Assgin Request','icon'=>'','url'=>'request/assign',
											'link'=>array('','')),
									array('name'=>'添加原始需求 Append Request','icon' => '','url'=>'request/append','link'=>array('request/appendsave')),
					),
					'4'=>array(
							array('name'=>'我的总体设计 Design Platform','icon'=>'','url'=>'wholedesign/mywholedesign','link'=>array()),
							array('name'=>'分派给我的需求 Analyse Request','icon'=>'','url'=>'','link'=>array()),
					),
					'5'=>array(
							array('name'=>'我的钱包 My Wallet','icon'=>'','url'=>'','link'=>array()),
							array('name'=>'我的好友 My Friends','icon'=>'','url'=>'','link'=>array()),
							array('name'=>'我的消息 My Messages','icon'=>'','url'=>'','link'=>array()),
							array('name'=>'我的培训 My Training','icon'=>'','url'=>'','link'=>array()),
							array('name'=>'我的关注 My favorites','icon'=>'','url'=>'','link'=>array()),
					),
							array('name'=>'在线公共聊天室 BBB Chat','icon'=>'','url'=>'','link'=>array()),
					'6'=>array(
							array('name'=>'在线公共培训室 BBB Training','icon'=>'','url'=>'','link'=>array()),
							array('name'=>'站内公告 Notices','icon'=>'','url'=>'','link'=>array()),
							array('name'=>'站内事件 Events','icon'=>'','url'=>'','link'=>array()),
							array('name'=>'SVN申请 Get SVN','icon'=>'','url'=>'','link'=>array()),
							array('name'=>'意见反馈 Advices','icon'=>'','url'=>'','link'=>array()),
							array('name'=>'锁屏 Lock Screen','icon'=>'','url'=>'','link'=>array()),
					),	
					
					'7'=>array(
							array('name'=>'流程需知 Our Procedures','icon'=>'','url'=>'','link'=>array()),
							array('name'=>'本站免责声明 Disclaimer','icon'=>'','url'=>'','link'=>array()),
							array('name'=>'发包方需知 Release Notices','icon'=>'','url'=>'','link'=>array()),
							array('name'=>'接包方需知 Services Notices','icon'=>'','url'=>'','link'=>array()),
					),
					
					'8'=>array(
							array('name'=>'项目维护 Maintenance','icon'=>'','url'=>'','link'=>array()),
							array('name'=>'发包方合同管理 Contracts','icon'=>'','url'=>'','link'=>array()),
							array('name'=>'接包方合同管理 Contracts','icon'=>'','url'=>'','link'=>array()),
							array('name'=>'站内公告发布 Release Notics','icon'=>'','url'=>'','link'=>array()),
							array('name'=>'站内消息发布 Messages','icon'=>'','url'=>'','link'=>array()),
							array('name'=>'所有用户管理 Users','icon'=>'','url'=>'','link'=>array()),
							
					),
	
	);
	foreach ($data as $key => $row)
	{
 		if ($useremail != 'admin' AND $key == '8' )
 			break;//如果用户名不为admin并且循环至第8个主导航链接时直接退出

		//当一级菜单项下有子菜单项时
		if ($row['url'] == "")
		{
			//做一次循环，如果二级菜单的链接被点击，就打在一级菜单上active和display标志
			$flag1 = 0;
			foreach ($menulst[$key] as $i=>$val)
			{
				//当二级菜单项中的ＵＲＬ和当前点击的一致时
				if (strcmp($val['url'],$uri) == 0) 
				{
					$flag1 = 1;
					break;
				}
 			}
 			
 			//再做一次循环，如果二级链接的页面中的链接被点击，即和ＵＲＩ相同时，做标记
 			$flag2 = 0;
 			foreach ($menulst[$key] as $i=>$val)
 			{
				$arrlength=count($val['link']);
	 			for($x = 0; $x < $arrlength; $x++)
	 			{
	 				//echo stripos($uri,$val['link'][$x])."<br/>";
	 				if (stripos($uri,$val['link'][$x]) !== false)
		 			{
			 			$flag2 = 1;
			 			break;
		 			}
	 			}
 			}
			
			
			if ($flag1 == 1 || $flag2 == 1)
			{
				echo "<li class=\"dropdown active\"><a href=\"\"><span class=\"".$row['icon']."\"></span>".$row['name']."</a>";
				echo "<ul style=\"display: block\">";		
			}
			else 
			{
				echo "<li class=\"dropdown\"><a href=\"\"><span class=\"".$row['icon']."\"></span>".$row['name']."</a>";
				echo "<ul>";
			}

			foreach ($menulst[$key] as $i=>$val)
			{
				//如果二级页面中链接包含在URI中，就将其二级链接中加Active
				$flag3 = 0;
				$arrlength = count($val['link']);
				for($x = 0; $x < $arrlength; $x++)
				{
					//echo stripos($uri,$val['link'][$x])."<br/>";
					if (stripos($uri,$val['link'][$x]) !== false)
					{
						$flag3 = 1;
						break;
					}
				}
				
				if (strcmp($val['url'],$uri) == 0 || $flag3 == 1 )
				{
					echo "<li class='active'><a href=\"".base_url().$val['url']."\">".$val['name']."</a></li>";
				}
				else 
				{
/*    					//如果传值中包含点击的二级页面链接时
					$arrlength=count($val['link']);
					$flag3 = 0;
					for($x = 0;$x < $arrlength; $x++) 
					{
 						if (strpos($val['link'][$x],$uri) == 0 )
						{
							//echo "<li class='active'><a href=\"".base_url()."index.php/".$val['url']."\">".$val['name']."</a></li>";
							$flag3 = 1;
							//echo "val:".$val['link'][$x]."<br/>";
							//echo "uri:".$uri."<br/>";
							break;
						}							
					} */
					//if ($flag3 == 0) 
 					echo "<li><a href=\"".base_url().$val['url']."\">".$val['name']."</a></li>";
				}
			}
			echo "</ul></li>";
		}
		else
		{
			//当有且仅有一级菜单项时，比对链接和传值	
			if (strcmp($row['url'],$uri) == 0)
			{
				echo "<li class=\"active\"><a href=\"".base_url().$row['url']."\"><span class=\"".$row['icon']."\"></span>".$row['name']."</a></li>";
			}
			else 
			{
				echo "<li><a href=\"".base_url().$row['url']."\"><span class=\"".$row['icon']."\"></span>".$row['name']."</a></li>";
			}
		}
		//echo "<br/>".$row['url']."<br/>";

	}//foreachEnd	
	
	
	
	
	/*
	 * 做循环输出，根据传入的$url给第一级array加active和其本身加active的class
	 */
	//    $json_str=json_encode($tmparr);
	
// 	foreach($data as $key=>$value)
// 	{
// 		$i = 1;
// 		foreach($value as $key1=>$value1)
// 		{
// 			//如果为第一级且仅有一级
// 			if (count($value) == 1) 
// 			{
// 				if (strpos($value1,$uri))
// 				{
// 					echo "<li><a href=\"".base_url()."index.php/".$value1."\"><span class=\"iconfa-laptop\"></span>".$key1."</a></li>";
// 				}
// 				else
// 				{
// 					echo "<li class=\"active\"><a href=\"".base_url()."index.php/".$value1."\"><span class=\"iconfa-laptop\"></span>".$key1."</a></li>";
// 				}
// 			}
// 			else//如果为多级时 
// 			{
//   				if ($i == 1)
//   					echo "<li class=\"dropdown \" id=\"allsiteproject\"><a href=\"\"><span class=\"iconfa-book\"></span>".$key1."</a><ul style=\"\">";
// 			}
// 			$i++;
// 		}
// 	}
	
}
