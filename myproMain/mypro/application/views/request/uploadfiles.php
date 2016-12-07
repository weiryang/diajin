<?php $this->load->view('pageheader');?> 
	<div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="<?php echo base_url()?>dashboard"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li>上传原始需求的文件 My Request files</li>
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
                <h1><?php echo $title;?> Edit Request</h1>
            </div>
        </div><!--pageheader-->

        <div class="maincontent">
            <div class="maincontentinner">
			<h5 class="subtitle">快捷链接　Recently Viewed Pages</h5>
	    <?php //var_dump($error);?>
        <?php echo form_open_multipart('request/uploadfiles/'.$rid);?>
        	<input type="file"  class="btn"  name="userfile" size="20" />		<input type="submit" value="上传" class="btn"/> 目前只支持512K以下JPG／ＰＮＧ／ＧＩＦ图片,文件名中请不要包括中文字符
		</form>
        <?php echo form_open_multipart('request/deletefile/'.$rid);?>
		<button class="btn" ><span class="icon-minus"></span>删除文件 Delete</button>
		<h4 class="widgettitle"><?=$title?> </h4>
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
							<th class="center">选择</th>
                            <th class="center">ID</th>
                            <th class="center">文件名称</th>
                            <th class="center">大小</th>
                            <th class="center">类型</th>
                            <th class="center">上传人</th>
                            <th class="center">上传日期</th>
                         </tr>
                    </thead>
                    <tbody>
                    	<?php foreach ($query as $key=>$value):?>
                        <tr>
                        	<td class="center"><input type="checkbox" name="chk[]" value="<?php echo $value['id'];  ?>"></td>
                            <td class="center"><?php echo $value['id'];  ?></td>
                            <td><a target="_blank" href="<?php echo base_url();?>uploads/<?php echo html_escape($value['filename']); ?>"><?php echo html_escape($value['filename']); ?></td>
                            <td class="center"><a href="<?php echo base_url();?>request/downloadfile/<?php echo $value['id'];?>"><?php echo html_escape($value['size']); ?>KB</a></td>
							<td class="center"><?php echo html_escape($value['filetype']); ?></td>
							<td class="center"><?php echo html_escape($value['createbyid']); ?></td>
							<td class="center"><?php echo html_escape($value['createdatetime']); ?></td>
                        </tr>
						<?php endforeach;?>
                    </tbody>
                </table>
		</form> 
                
<?php $this->load->view('pagebottom');?> 
