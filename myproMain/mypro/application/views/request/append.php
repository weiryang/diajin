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
                <h1>添加原始需求 Edit Request</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
                <!-- <h5 class="subtitle">快捷链接　Recently Viewed Pages</h5>    -->
                        
<div class="widget">
            <h4 class="widgettitle"><?=$title?></h4>
            <div class="widgetcontent">

                <form class="stdform" action="<?php  echo base_url();?>request/appendsave" method="post">
						<p>
                            <label>原始需求名称</label>
                            <span class="field"><input type="text" name="caption" value="<?php echo set_value("caption");?>" class="input-xxlarge" placeholder="请输入，最多５０个汉字" /></span>
                        </p>
                        
                        
                         <p>
	                        <div class="par">
	                            <label>最后完成截止日期</label>
	                            <span class="field"><input id="datepicker" type="text" name="enddate" class="input-small" />  </span>
	                        </div> 
                        </p>
             
                        <p>
                            <label>所属模块</label>
                            <span class="field">
                            	<select name="mid" > 
                            		<?php foreach ($modules as $key=>$value):?>
	                            		<option value ="<?php echo $value['id'];  ?>"  ><?php echo html_escape($value['module_name']); ?>|<?php echo html_escape($value['proname']); ?></option>
	                            	<?php endforeach;?>
                            	</select>
                            </span>
                        </p>
                        <p>
                            <label>标价</label>
                            <span class="field"><input type="text" name="price" value="<?php echo set_value('price');?>" class="input-xxlarge" placeholder="请输入整数,并以半角输入" /><a href="http://item.taobao.com/item.htm?id=42643553095" target="_blank"> 付款 </a></span>
                        </p>
                        <p>
                            <label>状态</label>
                            <span class="field">
                            	<select name="status" > 
	                            	<option value ="0"  >不生效</option>
	                            	<option value ="1"  selected>生效</option>
                            	</select>
                            </span>
                        </p>
						<p>
                            <label>紧急度</label>
                            <span class="field">
                            	<select name="emerlevel" > 
	                            	<option value ="0">不紧急</option>
	                            	<option value ="1" selected>普通</option>
	                            	<option value ="2">紧急</option>
	                            	<option value ="3">非常紧急</option>
                            	</select>
                            </span>
                        </p>
                        
						<p>
                            <label>重要度</label>
                            <span class="field">
                            	<select name="importlevel" > 
	                            	<option value ="0">不重要</option>
	                            	<option value ="1" selected>普通</option>
	                            	<option value ="2">重要</option>
	                            	<option value ="3">非常重要</option>
                            	</select>
                            </span>
                        </p>

                        <p>
                            <label>需求种类</label>
                            <span class="field">
                            	<select name="type" > 
	                            	<option value ="0" selected>新需求</option>
	                            	<option value ="1" >任务</option>
	                            	<option value ="2">bug</option>
	                            	<option value ="3">改进</option>
                            	</select>
                            </span>
                        </p>

					    <p>
	                        <label>开放状态</label>
                            <span class="formwrapper">
                            	<input type="radio" name="isopen" checked value="2"/> 全开放（所有人可见） &nbsp; &nbsp;
                            	<input type="radio" name="isopen"  value="1"/> 半开放（自己和指定人员可见） &nbsp; &nbsp;
                            	<input type="radio" name="isopen"  value="0" /> 不开放（仅自己可见） &nbsp; &nbsp;
                            </span>
						</p>
				
                        <p>
                            <label>需求描述</label>
                            <span class="field"><textarea id="detail" name="detail" cols="500" rows="5" class="input-xxlarge" placeholder="请详细描述需求信息."><?php echo set_value('detail');?></textarea></span> 
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
