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
                <h1><?=$title?> All Users</h1>
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
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="center">选择</th>
                            <th class="center">ID</th>
                            <th class="center">登录Email</th>
                            <th class="center">口令</th>
                            <th class="center">真实姓名</th>
                            <th class="center">手机号码</th>
                            <th class="center">是否签约</th>
                            <th class="center">修改</th>
                        </tr>
                    </thead>
                    <tbody>
			<?php foreach ($query as $key=>$value):?>
                        <tr>
                        	<td class="center"><input type="checkbox" name="checkbox1" value="checkbox"></td>
                            <td><? echo html_escape($value['id']); ?></td>
                            <td><? echo html_escape($value['userEmail']); ?></td>
                            <td class="center"><? echo html_escape($value['password']); ?></td>
                            <td class="center"><? echo html_escape($value['realName']); ?></td>
                            <td class="center"><? echo html_escape($value['mobileNum']); ?></td>
                            <td class="center"><? echo html_escape($value['signWithUs']); ?></td>
                            <td class="center"><a href="<?php echo base_url();?>project/detail/<?=$value['id']?>">修改</a></td>
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
