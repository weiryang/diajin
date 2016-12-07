<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>点金软件项目细化分包管理平台</title>
<link rel="stylesheet" href="<?=base_url()?>resource/css/style.default.css" type="text/css" />
<link rel="stylesheet" href="<?=base_url()?>resource/css/style.shinyblue.css" type="text/css" />

<script type="text/javascript" src="<?=base_url()?>resource/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>resource/js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>resource/js/jquery-ui-1.10.3.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>resource/js/modernizr.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>resource/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>resource/js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?=base_url()?>resource/js/custom.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#login').submit(function(){
            var u = jQuery('#useremail').val();
            var p = jQuery('#password').val();
            if(u == '') {
                jQuery('.login-alert').fadeIn();
                return false;
            }
            if (p == ''){
                jQuery('.login-alert').fadeIn();
                return false;
            }
        });
    });
</script>
</head>

<body class="loginpage">

<div class="loginpanel">
    <div class="loginpanelinner">
        <div class="logo animate0 bounceIn"><img src="<?=base_url()?>resource/images/logo.png" alt="" /></div>
        <form id="login" action="user/checklogin" method="post">
            <div class="inputwrapper login-alert">
                <div class="alert alert-error">非法用户邮箱或口令</div>
            </div>
            <div class="inputwrapper animate1 bounceIn">
                <input type="text" name="useremail" id="useremail" placeholder="输入登录邮箱名称 Enter user's Email" />
            </div>
            <div class="inputwrapper animate2 bounceIn">
                <input type="password" name="password" id="password" placeholder="请输入口令 Enter any password" />
            </div>
            <div class="inputwrapper animate3 bounceIn">
                <button name="submit">登录 Sign In</button>
            </div>
            <div class="inputwrapper animate4 bounceIn">
                <div class="pull-right">Not a member? <a href="user/reg">Sign Up</a></div>
                <label><input type="checkbox" class="remember" name="signin" /> Keep me sign in</label>
            </div>
            
        </form>
    </div><!--loginpanelinner-->
</div><!--loginpanel-->

<div class="loginfooter">
    <p>&copy; 2014. TSIG. All Rights Reserved.</p>
</div>

</body>
</html>
