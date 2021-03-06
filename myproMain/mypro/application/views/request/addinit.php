<?php $this->load->view('pageheader');?> 

	<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="<?php echo base_url()?>dashboard"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li>添加原始需求 My Request</li>
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
                <h1>添加需求分析 Analyse Request</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
                <!-- <h5 class="subtitle">快捷链接　Recently Viewed Pages</h5>    -->
                        
<div class="widget">
            <h4 class="widgettitle"><?=$title?></h4>
            <div class="widgetcontent">

                <form class="stdform" action="<?php  echo base_url();?>request/addinitsave/<?php echo $this->uri->segment(3);?>" method="post">
						<p>
                            <label>需求分析标题</label>
                            <span class="field"><input type="text" name="caption" value="<?php echo set_value("caption");?>" class="input-xxlarge" placeholder="请输入，最多５０个汉字" /></span>
                        </p>
						<p>
                            <label>输入</label>
                            <span class="field"><input type="text" name="inputtext" value="<?php echo set_value('inputtext');?>" class="input-xxlarge" placeholder="输入" /></span>
                        </p>
						<p>
                            <label>输出</label>
                            <span class="field"><input type="text" name="outputtext" value="<?php echo set_value('outputtext');?>" class="input-xxlarge" placeholder="输出" /></span>
                        </p>
                         <p>
                            <label>对原有系统影响</label>
                            <span class="field"><textarea id="effectEstimate" name="effectEstimate" cols="500" rows="5" class="input-xxlarge" placeholder="请描述此需求对原有系统的影响，功能及数据上的"><?php echo set_value('effectEstimate');?></textarea></span> 
                        </p>                      
                        <p>
                            <label>需求分析描述</label>
                            <span class="field"><textarea id="description" name="description" cols="500" rows="5" class="input-xxlarge" placeholder="请详细描述需求分析."><?php echo set_value('description');?></textarea></span> 
                        </p>
                        <p>
                            <label>处理流程</label>
                            <span class="field"><textarea id="dealprocess" name="dealprocess" cols="500" rows="5" class="input-xxlarge" placeholder="请详细描述处理流程."><?php echo set_value('dealprocess');?></textarea></span> 
                        </p>
                        
                        <p class="stdformbutton">
                            <button class="btn alertboxbuttonxxxx">提交 Submit</button>
                            <button type="reset" class="btn">重添 Reset</button>
							<span class="help-inline"><?php echo validation_errors(); ?></span>
                        </p>
				</form>
            </div><!--widgetcontent-->
            </div><!--widget-->
      
                
<?php $this->load->view('pagebottom');?> 
