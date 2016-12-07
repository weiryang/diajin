<?php $this->load->view('pageheader');?> 

	<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="<?php echo base_url()?>dashboard"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li>修改原始需求 My Request</li>
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
                <h1>编辑需求 Edit Request</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
                <!-- <h5 class="subtitle">快捷链接　Recently Viewed Pages</h5>    -->
                        
<div class="widget">
            <h4 class="widgettitle"><?=$title?></h4>
            <div class="widgetcontent">

                <form class="stdform" action="<?php echo base_url();?>request/editsave/<?php echo $rid;?>" method="post">
						<p>
                            <label>需求名称</label>
                            <span class="field"><input type="text" name="title1" value="<?php echo $caption;?>" class="input-xxlarge" placeholder="请输入，最多５０个汉字" /></span>
                        </p>
                        
		                 <p>
	                        <div class="par">
	                            <label>最后完成截止日期</label>
	                            <span class="field"><input id="datepicker" type="text" name="enddate" class="input-small"  value="<?php echo $end_date;?>" />  </span>
	                        </div> 
                        </p>
                        
						<p>
                            <label>标价</label>
                            <span class="field"><input type="text" name="price" value="<?php echo $price;?>" class="input-xlarge" placeholder="此价格影响后续的乙方投标行为" /> <a href="http://item.taobao.com/item.htm?id=42643553095" target="_blank"> 付款 </a></span>
                            <label>付费状态</label>
                            <span class="field"><input type="checkbox" name="payflag" <?php if ($payflag == 1) echo "checked";?>readonly  disabled="true">包括本原始需求所涉及的需求分析/设计/开发/测试的所有费用，此标志在付款完成后由本站选中</span>
                            
                        </p>
                        
                        <p>
                            <label>状态</label>
                            <span class="field">
                            	<select name="status" > 
	                            	<option value ="0" <?php if ($status=='0') echo "selected";?>>不生效</option>
	                            	<option value ="1" <?php if ($status=='1') echo "selected";?>>生效</option>
                            	</select>
                            </span>
                        </p>
						<p>
                            <label>紧急度</label>
                            <span class="field">
                            	<select name="emerlevel" > 
	                            	<option value ="0" <?php if ($emerlevel=='0') echo "selected";?>>不紧急</option>
	                            	<option value ="1" <?php if ($emerlevel=='1') echo "selected";?>>普通</option>
	                            	<option value ="2" <?php if ($emerlevel=='2') echo "selected";?>>紧急</option>
	                            	<option value ="3" <?php if ($emerlevel=='3') echo "selected";?>>非常紧急</option>
                            	</select>
                            </span>
                        </p>
                        
						<p>
                            <label>重要度</label>
                            <span class="field">
                            	<select name="importlevel" > 
	                            	<option value ="0" <?php if ($importlevel=='0') echo "selected";?>>不重要</option>
	                            	<option value ="1" <?php if ($importlevel=='1') echo "selected";?>>普通</option>
	                            	<option value ="2" <?php if ($importlevel=='2') echo "selected";?>>重要</option>
	                            	<option value ="3" <?php if ($importlevel=='3') echo "selected";?>>非常重要</option>
                            	</select>
                            </span>
                        </p>

                        <p>
                            <label>需求种类</label>
                            <span class="field">
                            	<select name="type" > 
	                            	<option value ="0" <?php if ($type=='0') echo "selected";?>>新需求</option>
	                            	<option value ="1" <?php if ($type=='1') echo "selected";?>>任务</option>
	                            	<option value ="2" <?php if ($type=='2') echo "selected";?>>bug</option>
	                            	<option value ="3" <?php if ($type=='3') echo "selected";?>>改进</option>
                            	</select>
                            </span>
                        </p>       
                        <p>
	                        <label>开放状态</label>
                            <span class="formwrapper">
                            	<input type="radio" name="isopen" <?php if ($isopen=='2') echo 'checked';?> value="2"/> 开放（所有人可见） &nbsp; &nbsp;
                            	<input type="radio" name="isopen" <?php if ($isopen=='1') echo 'checked';?> value="1"/> 半开放（仅自己和指定人员可见） &nbsp; &nbsp;
                            	<input type="radio" name="isopen" <?php if ($isopen=='0') echo 'checked';?> value="0" /> 不开放（仅自己可见） &nbsp; &nbsp;
                            </span>
						</p>
                        
                        <p>
                            <label>需求描述</label>
                            <span class="field"><textarea id="detail" name="detail" cols="500" rows="5" class="input-xxlarge" placeholder="请详细描述需求信息."><?php echo $detail;?></textarea></span> 
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
