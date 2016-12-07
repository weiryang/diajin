<?php $this->load->view('pageheader');?> 
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="project"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li>我的项目模块 Site Projects</li>
            <li class="right">
                    <a href="" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-tint"></i> Color Skins</a>
                    <ul class="dropdown-menu pull-right skin-color">
                        <li><a href="default">Default</a></li>
                        <li><a href="navyblue">Navy Blue</a></li>
                        <li><a href="palegreen">Pale Green</a></li>
                        <li><a href="red">Red</a></li>
                        <li><a href="green">Green</a></li>
                        <li><a href="brown">Brown</a></li>
                    </ul>
            </li>
        </ul>
        
        <div class="pageheader">
            <form action="results.html" method="post" class="searchbar">
                <!-- <input type="text" name="keyword" placeholder="To search type and hit enter..." />   -->
            </form>
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">
                <h5>功能总览 All Features Summary</h5>
                <h1><?=$title?></h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
                        
                <h5 class="subtitle">快捷链接　Recently Viewed Pages</h5>
       <form action="<?php echo base_url();?>modules/deleteaction/<?php echo $pid;?>" method="post">
						<a class="btn" href="<?php echo base_url();?>modules/add/<?php echo $pid;?>"><span class="icon-plus"></span>新增模块 Add</a>
                        <button class="btn" ><span class="icon-minus"></span>删除模块 Delete</button>
		<h4 class="widgettitle"><?=$title?></h4>
            	<table class="table table-bordered responsive">
                    <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                    </colgroup>
                    <thead>
                        <tr>
                        	<th class="center">选择</th>
                            <th class="center">ID</th>
                            <th class="center">模块名称</th>
                            <th class="center">内容说明</th>
                            <th class="center">日期</th>
                            <th class="center">需求</th>
                        </tr>
                    </thead>
                    <tbody>
			<?php foreach ($query as $key=>$value):?>
                        <tr>
                        	<td class="center"><input name=chk[] type=checkbox value="<?php echo $value['id'];?>"></td>
                            <td class="center"><?php echo html_escape($value['id']); ?></td>
                            <td><a href="<?=base_url()?>modules/edit/<?=$value['id']?>"><?php echo html_escape($value['module_name']); ?></a></td>
                            <td><?php echo html_escape($value['content']); ?></td>
                            <td class="center"><?php echo html_escape($value['createdatetime']); ?></td>
                            <td class="center"><a href="<?=base_url()?>request/myreq/<?=$value['id']?>">需求管理</a></td>
                        </tr>
			<?php endforeach;?>
</form>
                    </tbody>
                </table>
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
</body> 
