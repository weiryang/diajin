<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" href="/images/icons/favicon.ico">
<link rel="Bookmark" href="images/icons/favicon.ico">
<head>
	<meta charset="utf-8">
	<title><?=$title?></title>
	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>欢迎您来到 点金 软件项目细化分包管理平台 <a href="index.php/login">login</a></h1>
	<div id="body">
		<p>欢迎大家来到这里，我是Will.Yang，在做这个“点金项目细化分包管理平台”，此平台设计/筹划到现在已经有很长一段时间了， 为了能更快速的将其实现，希望有时间的你可以参与进来。
</p>

		<p>本平台专门针对软件项目（产品）开发过程中遇到的需求不好管理，流程不易控制，任务分派跟踪不明确等问题而构建。
有任何问题请和偶联系，ＱＱ：１７８７３６８４５ 杨先生
</p>
		<p>详细的说明请使用svn，checkout出如下地址：</p>
		<code>svn://735.biz.tm/pms</code>
		<p><a href="/resource/downloadfiles/TortoiseSVN-1.8.3.24901-x64-svn-1.8.4.256226226.msi">TortoiseSVN win 64位客户端下载</a></p>
		<p><a href="/resource/downloadfiles/TortoiseSVN-1.8.5.25224-win32-svn-1.8.8.1393314829.msi">TortoiseSVN win 32位客户端下载</a></p>
		<p><a href="/resource/downloadfiles/">相关PDF教程、视频教程等</a></p>
		<p></p>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>
<?//=$title?>
<?php foreach ($query->result() as $row):?>
<h3><?//=$row->id?></h3>
<p><?//=$row->title?></p>
<?php endforeach;?>
</body>
</html>
