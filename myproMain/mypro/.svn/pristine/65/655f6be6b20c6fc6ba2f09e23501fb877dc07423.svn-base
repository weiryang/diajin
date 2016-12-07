<?php $this->load->view('pageheader');?> 

	<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="<?php echo base_url()?>dashboard"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li>My Design</li>
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
                <h1>Add Design</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
                <!-- <h5 class="subtitle">快捷链接　Recently Viewed Pages</h5>    -->
                        
<div class="widget">
            <h4 class="widgettitle"><?=$title?></h4>
            <div class="widgetcontent">

                <form class="stdform" action="<?php  echo base_url();?>wholedesign/addsave/<?php echo $pid;?>" method="post">
						<p>
                            <label>设计目标</label>
                            <span class="field"><textarea id="designtarget" name="designtarget" cols="500" rows="5" class="input-xxlarge" placeholder="请详细描述设计目标."><?php echo set_value('designtarget');?></textarea></span>
                        </p>
						<p>
                            <label>开发语言</label>
                            <span class="field"><input type="text" name="devlanguage" value="<?php echo set_value('devlanguage');?>" class="input-xxlarge" placeholder="请描述你设计开发所用的语言" /></span>
                        </p>
						<p>
                            <label>所用数据库</label>
                            <span class="field"><input type="text" name="devdatabase" value="<?php echo set_value('devdatabase');?>" class="input-xxlarge" placeholder="请描述你设计开发所用的数据库" /></span>
                        </p>
						<p>
                            <label>设计描述</label>
                            <span class="field"><textarea id="description" name="description" cols="500" rows="5" class="input-xxlarge" placeholder="请详细描述设计细节."><?php echo set_value('description');?></textarea></span>
                        </p>
						<p>
                            <label>关键技术</label>
                            <span class="field"><input type="text" name="key_tech" value="<?php echo set_value('key_tech');?>" class="input-xxlarge" placeholder="请描述你设计开发所用使用的关键技术" /></span>
                        </p>
						<p>
                            <label>开发/运行环境描述</label>
                            <span class="field"><input type="text" name="env_des" value="<?php echo set_value('env_des');?>" class="input-xxlarge" placeholder="请描述你设计开发运行所用到的环境" /></span>
                        </p>
						<p>
                            <label>框架代码地址及说明</label>
                            <span class="field"><input type="text" name="codeaddress" value="<?php echo set_value('codeaddress');?>" class="input-xxlarge" placeholder="代码地址,开发设计的框架,原型的代码或DEMO" /></span>
                        </p>
						<p>
                            <label>出价</label>
                            <span class="field"><input type="text" name="price" value="<?php echo set_value('price');?>" readonly class="input-xxlarge" placeholder="甲方出价" /></span>
                        </p>
                        
                        <p>
	                        <label>开放状态</label>
                            <span class="formwrapper">
                            	<input type="radio" name="isopen" checked value="2"/> 全开放（所有人可见） &nbsp; &nbsp;
                            	<input type="radio" name="isopen"  value="1" /> 半开放（自己和指定人员可见） &nbsp; &nbsp;
                            	<input type="radio" name="isopen"  value="0" /> 不开放（仅自己可见） &nbsp; &nbsp;
                            </span>
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
