<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>点金软件项目细化分包管理平台 Touchstone - Metro Style Admin </title>
<link rel="stylesheet" href="/resource/css/style.default.css" type="text/css" />
<link rel="stylesheet" href="/resource/css/style.shinyblue.css" type="text/css" />
<?php
	date_default_timezone_set('PRC'); 
?>

<script type="text/javascript" src="/resource/js/jquery-1.9.1.min.js')"></script>
<script type="text/javascript" src="/resource/js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="/resource/js/jquery-ui-1.10.3.min.js"></script>
<script type="text/javascript" src="/resource/js/modernizr.min.js"></script>
<script type="text/javascript" src="/resource/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/resource/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/resource/js/custom.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#login').submit(function(){
            var u = jQuery('#username').val();
            var p = jQuery('#password').val();
            if(u == '' && p == '') {
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
        <div class="logo animate0 bounceIn"><img src="/resource/images/logo.png" alt="" /></div>
        <form id="login" action="/index.php/dashboard/index/db" method="post">
            <div class="inputwrapper login-alert">
                <div class="alert alert-error">Invalid username or password</div>
            </div>
            <div class="inputwrapper animate1 bounceIn">
                <input type="text" name="username" id="username" placeholder="Enter any username" />
            </div>
            <div class="inputwrapper animate2 bounceIn">
                <input type="password" name="password" id="password" placeholder="Enter any password" />
            </div>
            <div class="inputwrapper animate3 bounceIn">
                <button name="submit">Sign In</button>
            </div>
            <div class="inputwrapper animate4 bounceIn">
                <div class="pull-right">Not a member? <a href="registration.html">Sign Up</a></div>
                <label><input type="checkbox" class="remember" name="signin" /> Keep me sign in</label>
            </div>
            
        </form>
    </div><!--loginpanelinner-->
</div><!--loginpanel-->

<div class="loginfooter">
    <p>&copy; 2014. 点金 软件项目管理后台 Touchstone Admin. All Rights Reserved.</p>
</div>

</body>
</html>
