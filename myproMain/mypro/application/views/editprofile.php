<?php $this->load->view('pageheader');?> 
 
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="dashboard.html"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="editprofile.html">个人信息</a> <span class="separator"></span></li>
            <li>编辑个人信息 Edit Profile</li>
            
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
           
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">
                <h5>个人信息 profile</h5>
                <h1>编辑个人信息 Edit Profile</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
                <div class="row-fluid">
                    	<div class="span4 profile-left">
                        
                        <div class="widgetbox profile-photo">
                            <div class="headtitle">
                                <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn dropdown-toggle">操作 Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                      <li><a href="#">更改 Change Photo</a></li>
                                      <li><a href="#">删除 Remove Photo</a></li>
                                    </ul>
                                </div>
                                <h4 class="widgettitle">照片 Profile Photo</h4>
                            </div>
                            <div class="widgetcontent">
                                <div class="profilethumb">
                                    <img src="/resource/images/profilethumb.png" alt="" class="img-polaroid" />
                                </div><!--profilethumb-->
                            </div>
                        </div>
                            
                            
                        <div class="widgetbox tags">
                                <h4 class="widgettitle">词条 Tags</h4>
                                <div class="widgetcontent">
                                    <ul class="taglist">
                                        <li><a href="">HTML5 <span class="close">&times;</span></a></li>
                                        <li><a href="">CSS <span class="close">&times;</span></a></li>
                                        <li><a href="">PHP <span class="close">&times;</span></a></li>
                                        <li><a href="">jQuery <span class="close">&times;</span></a></li>
                                        <li><a href="">Java <span class="close">&times;</span></a></li>
                                        <li><a href="">GWT <span class="close">&times;</span></a></li>
                                        <li><a href="">CodeNgniter <span class="close">&times;</span></a></li>
                                        <li><a href="">Bootstrap <span class="close">&times;</span></a></li>
                                    </ul>
                                    <a href="" style="display:block;margin-top:10px">+ Add Tag</a>
                                </div>
                        </div>
                            
                        </div><!--span4-->
                        <div class="span8">
                            <form action="<?php echo base_url();?>user/saveprofile" class="editprofileform" method="post" name='form1'>
                                
                                <div class="widgetbox login-information">
                                    <h4 class="widgettitle">注册信息 Login Information</h4>
                                    <div class="widgetcontent">
                                        <p>
                                            <label>用户Email:</label>
                                            <input type="text" name="useremail" class="input-xlarge" value="<?=$useremail?>" />
                                        </p>
                                        <p>
                                            <label>真实姓名:</label>
                                            <input type="text" name="realname" class="input-xlarge" value="<?=$realname?>" />
                                        </p>
                                        <p>
                                            <label style="padding:0">口令 Password</label>
                                            <a href="">更改口令 Change Password?</a>
                                        </p>
                                    </div>
                                </div>
                                
                                
                                <div class="widgetbox personal-information">
                                    <h4 class="widgettitle">个人信息 Personal Information</h4>
                                    <div class="widgetcontent">
                                        <p>
                                            <label>所在城市CITY:</label>
                                            <input type="text" name="location" class="input-xlarge" value="<?=$city?>" />
                                        </p>
                                        <p>
                                            <label>手机号码:</label>
                                            <input type="text" name="mobileNum" class="input-xlarge" value="<?=$mobileNum?>" />
                                        </p>
                                        <p>
                                            <label>关于 About You:</label>
                                            <textarea name="about" class="span8"><?=$about?></textarea>
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="widgetbox profile-notifications">
                                    <h4 class="widgettitle">通知 Notifications</h4>
                                    <div class="widgetcontent">
                                        <p>
                                            <input type="checkbox" name="chkMention" disabled="disabled" /> 提到偶时Email Email me when someone mentions me... <br />
                                            <input type="checkbox" name="chkFollow" disabled="disabled" /> 跟偶贴时Email Email me when someone follows me...
                                        </p>
                                    </div>
                                </div>
                                
                                <p>
                                	<button type="submit" id="growl" class="btn">更新资料 Update Profile</button> &nbsp; <a href="">停用此帐户 Deactivate your account</a>
                                </p>
                                
                            </form>
                        </div><!--span8-->
                    </div><!--row-fluid-->
                    
<?php $this->load->view('pagebottom');?> 
</html>
