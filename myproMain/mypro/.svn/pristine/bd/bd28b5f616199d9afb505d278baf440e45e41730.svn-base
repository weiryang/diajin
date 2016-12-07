<?php $this->load->view('pageheader');?> 
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="project"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li>Site Projects</li>
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
		<h5>项目中所有的设计／开发／测试都要遵循总体设计的规划</h5>
		<h4 class="widgettitle"><?=$title?></h4>
		
            	<table class="table table-bordered responsive">
                    <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="center">ID</th>
                            <th class="center">设计目标</th>
                            <th class="center">开发语言描述</th>
                            <th class="center">数据库描述</th>
							<th class="center">所属项目</th>
							<th class="center">建立人</th>
							<th class="center">建立日期</th>
                        </tr>
                    </thead>
                    <tbody>
			<?php foreach ($query as $key=>$value):?>
                        <tr>
                            <td class="center"><?php echo html_escape($value['id']); ?></td>
                            <td><a href="<?php echo base_url();?>wholedesign/viewdetail/<?php echo html_escape($value['id']);?>"><?php echo html_escape($value['designtarget']); ?></a></td>
                            <td><?php echo html_escape($value['devlanguage']); ?></td>
                             <td><?php echo html_escape($value['devdatabase']); ?></td>
							<td><?php echo html_escape($value['project_caption']); ?></td>
							<td><?php echo html_escape($value['realname']); ?></td>
                            <td class="center"><?php echo html_escape($value['createdatetime']); ?></td>
                        </tr>
			<?php endforeach;?>
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
