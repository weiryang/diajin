<?php $this->load->view('pageheader');?> 
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="project"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li>我的项目 Site Projects</li>
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
                <h1><?=$title?> All Projects</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
                <!-- <h5 class="subtitle">快捷链接　Recently Viewed Pages</h5>    -->
                        
<div class="widget">
            <h4 class="widgettitle"><?=$title?></h4>
            <div class="widgetcontent">
                <form class="stdform" action="<?php echo base_url();?>project/myprojectsave/<?php echo $id;?>" method="post">
                        <p>

<?php foreach($query->result() as $row): ?>
                            <label>项目名称</label>
                            <span class="field"><input type="text" name="title" class="input-xxlarge" value="<?=$row->title?>" placeholder="请输入项目标题，最多５０个汉字" /></span>
                        </p>
                        <p>
                            <label>所在城市</label>
                            <span class="field"><input type="text" name="city" class="input-small" value="<?=$row->city?>" placeholder="城市名称" /></span>
                            <small class="desc">这里城市的记录有助于同城接单人的Face 2 face的沟通</small>
                        </p>
                        <p>
                            <label>联系电话</label>
                            <span class="field"><input type="text" name="cellphone" value="<?=$row->cellphone?>" class="input-small"  placeholder="联系电话"   /></span>
                            <small class="desc">请输入电话或手机</small>
                        </p>                               
                        <p>
                            <label>预算</label>
                            <span class="field"><input type="text" name="budget" class="input-small" value="<?=$row->budget?>" placeholder="请输入数字"  /></span>
                            <small class="desc">这里的预算只做为项目描述，不参与任何统计和计算. 单位：元（人民币）</small>
                        </p>
 
                        <p>
                            <label>详细描述</label>
                            <span class="field"><textarea id="project_detail" name="project_detail"  cols="500" rows="5" class="input-xxlarge" placeholder="请详细描述项目的立项目的，项目的周期，项目的负责人情况，及其他相关项目信息."><?=$row->project_detail?></textarea></span> 
                        </p>
	                    <p class="stdformbutton">
                            <button class="btn alertboxbuttonxxxx">提交 Submit</button>
                            <button type="reset" class="btn">重添 Reset</button>
                            <span class="help-inline"></span>
                        </p>
<?php endforeach;?>
                </form>
            </div><!--widgetcontent-->
            </div><!--widget-->
                        
                
<?php $this->load->view('pagebottom');?> 
