<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?=$title?></title>
<link rel="stylesheet" href="<?=base_url()?>resource/css/style.default.css" type="text/css" />
<link rel="stylesheet" href="<?=base_url()?>resource/css/style.shinyblue.css" type="text/css" />

<script type="text/javascript" src="<?=base_url()?>resource/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>resource/js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>resource/js/jquery-ui-1.10.3.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>resource/js/modernizr.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>resource/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>resource/js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?=base_url()?>resource/js/custom.js"></script>

</head>

<body class="loginpage">

<div class="regpanel">
    <div class="regpanelinner">
        <div class="pageheader">
            <div class="pageicon"><span class="iconfa-hand-down"></span></div>
            <div class="pagetitle">
                <h5>你的信息Your Information</h5>
                <h1>注册 Sign Up</h1>
            </div>
        </div>
        <div class="regcontent">
        
            
            
            <form action="<?php echo base_url();?>user/register" method="post" class="stdform">
                
                <h3 class="subtitle">登录信息 Login Information</h3>
                <p><input type="text" name="useremail" class="input-block-level" placeholder="登录用电子邮件 Email4Login" value="<?php echo set_value('useremail');?>" /></p>
                <p><input type="password" name="password" class="input-block-level" placeholder="口令 Password" /></p>
                
                <p><input type="password" name="repassword" class="input-block-level" placeholder="重新输入口令 Repassword" /></p>
                <p><input type="text" name="nickname" class="input-block-level" placeholder="昵称外号 Nickname" value="<?php echo set_value('nickname');?>" /></p>
                
                <!-- 
                <h3 class="subtitle">性别 Gender</h3>
                <p>
                    <input name=gender id=gender type="radio" value=1 checked />男 Male &nbsp;&nbsp;
                    <input name=gender id=gender type="radio" value=0 />女 Female
                </p>
                 -->
                <p><button class="btn btn-primary">注册 Register</button></p>
                <span class="help-inline"><?php echo validation_errors(); ?></span>
                
            </form>
        
        </div><!--regcontent-->
    </div><!--regpanelinner-->
</div><!--regpanel-->

<div class="regfooter">
    <p>&copy; 2014. TSIG. All Rights Reserved.</p>
</div>

</body>
</html>
