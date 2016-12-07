<?php $this->load->view('pageheader');?> 
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="project"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><?=$title?> Site Requests</li>
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
                <h1><?=$title?> Requests</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
                        
                <h5 class="subtitle">快捷链接　Recently Viewed Pages</h5>
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
                        <col class="con0" />
                    </colgroup>
                    <thead>
                        <tr>
                             <th class="center">ID</th>
                            <th class="center">需求名称</th>
                            <th class="center">价格</th>
							<th class="center">付费情况</th>
                            <th class="center">紧急度</th>
                            <th class="center">重要度</th>
                            <th class="center">截止日期</th>
                            <th class="center">相关文件</th>
                         </tr>
                    </thead>
                    <tbody>
			<?php foreach ($query as $key=>$value):?>
                        <tr>
                             <td class="center"><?php echo $value['id'];  ?></td>
                            <td><a href="<?=base_url()?>request/viewdetail/<?=$value['id']?>"><?php echo html_escape($value['caption']); ?></a></td>
                            <td class="center"><?php echo html_escape($value['price']); ?></td>
							<td class="center"><?php echo html_escape($value['payflag']); ?></td>
                            <td class="center"><?php echo html_escape($value['emerlevel']); ?></td>
							<td class="center"><?php echo html_escape($value['importlevel']); ?></td>
							<td class="center"><?php echo date('Y/m/d', strtotime($value['end_date'])); ?></td>
				            <td class="center"><a href="request/downloadlst/<?php echo $value['id']; ?>">查看</a></td>
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
                        
                
<?php $this->load->view('pagebottom');?> 
