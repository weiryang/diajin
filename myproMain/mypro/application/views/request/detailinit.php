<?php $this->load->view('pageheader');?> 

	<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="<?php echo base_url()?>dashboard"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li>原始需求 Init Request</li>
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
                            <span class="field"><input type="text" name="title1" readonly value="<?php echo $caption;?>" class="input-xxlarge" placeholder="请输入，最多５０个汉字" /></span>
                        </p>
						<p>
                            <label>标价</label>
                            <span class="field"><input type="text" name="price" readonly value="<?php echo $price;?>" class="input-xxlarge" placeholder="此价格影响后续的乙方投标行为" /></span>
                        </p>
						<p>
                            <label>状态</label>
                            <span class="field">
                            	<select name="status" readonly > 
	                            	<option value ="0" <?php if ($status=='0') echo "selected";?>>不生效</option>
	                            	<option value ="1" <?php if ($status=='1') echo "selected";?>>生效</option>
	                            	<option value ="2" <?php if ($status=='2') echo "selected";?>>完结</option>
                            	</select>
                            </span>
                        </p>
						<p>
                            <label>紧急度</label>
                            <span class="field">
                            	<select name="emerlevel" readonly > 
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
                            	<select name="importlevel" readonly > 
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
                            	<select name="type" readonly> 
	                            	<option value ="0" selected>新需求</option>
	                            	<option value ="1" >任务</option>
	                            	<option value ="2">bug</option>
	                            	<option value ="3">改进</option>
                            	</select>
                            </span>
                        </p>                        
                        <p>
                            <label>需求描述</label>
                            <span class="field"><textarea id="detail" readonly name="detail" cols="500" rows="5" class="input-xxlarge" placeholder="请详细描述需求信息."><?php echo $detail;?></textarea></span> 
                        </p>
                        <p class="stdformbutton">
                        </p>
				</form>
            </div><!--widgetcontent-->
            </div><!--widget-->
      
                
<?php $this->load->view('pagebottom');?> 
