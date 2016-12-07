<?php $this->load->view('pageheader');?> 
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="project"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><?=$title?> Site Projects</li>
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
                <h1><?=$title?> Projects</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
                        
                <h5 class="subtitle">快捷链接　Recently Viewed Pages</h5>
		<a class="btn" href="<?php echo base_url();?>project/add"><span class="icon-plus"></span>新增项目 Add</a>
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
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="center">ID</th>
                            <th class="center">项目名称</th>
                            <th class="center">预算</th>
                            <th class="center">城市</th>
                            <th class="center">建立时间</th>
                            <th class="center">模块</th>
                        </tr>
                    </thead>
                    <tbody>
			<?php foreach ($query as $key=>$value):?>
                        <tr>
                            <td class="center"><?php echo $value['id'];  ?></td>
                            <td><a href="<?=base_url()?>project/mydetail/<?=$value['id']?>"><?php echo html_escape($value['title']); ?></a></td>
                            <td class="center"><?php echo html_escape($value['budget']); ?></td>
                            <td class="center"><?php echo html_escape($value['city']); ?></td>
                            <td class="center"><?php echo html_escape($value['createDatetime']); ?></td>
                            <td class="center"><a href="<?=base_url()?>modules/mymod/<?=$value['id']?>">模块及需求管理</a></td>
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
