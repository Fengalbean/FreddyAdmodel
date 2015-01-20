<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/Public/Css/Base/bootstrap/3.3.0/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/Public/Css/Base/flatui/dist/css/flat-ui.min.css">
    <script type="text/javascript" src="/Public/Js/Lib/seajs/2.3.0/sea.js"></script>
    <script type="text/javascript" src="/Public/Js/Conf/baseConfig.js"></script>
</head>
<body style="background: #808080">
<div class="container-fluid" >
    <!--<div class="login-screen">-->
    <!--<div class="login-icon">-->
    <!--<img src="img/login/icon.png" alt="Welcome to Mail App" />-->
    <!--<h4>Welcome to <small>Mail App</small></h4>-->
    <!--</div>-->

    <div id="login-form" class="login-form" style="width: 420px;height: 300px;">
        <div class="form-group">
            <input type="text" class="form-control login-field" value="" placeholder="Enter your name" id="login-name" />
            <label class="login-field-icon fui-user" for="login-name"></label>
        </div>

        <div class="form-group">
            <input type="password" class="form-control login-field" value="" placeholder="Password" id="login-pass" />
            <label class="login-field-icon fui-lock" for="login-pass"></label>
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block" href="#">Log in</button>
        <a class="login-link" href="#">Lost your password?</a>
    </div>

    <!--</div>-->
</div>
<script type="text/javascript">
    seajs.use(['loginController.js'], function(main) {
        main.login();
    });
</script>
</body>
</html>