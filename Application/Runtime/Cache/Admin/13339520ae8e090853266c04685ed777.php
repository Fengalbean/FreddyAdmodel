<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>

    <link rel="stylesheet" type="text/css" href="/Public/Css/Base/bootstrap/3.3.0/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/Public/Css/App/index.css">
    
    <!--<link rel="stylesheet" type="text/css" href="/Public/Css/Base/easyui/default/easyui.css">-->
    <!--<link rel="stylesheet" type="text/css" href="/Public/Css/Base/easyui/icon.css">-->
    <link rel="stylesheet" type="text/css" href="/Public/Css/Base/siderbar/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/Css/Base/siderbar/css/style.css">
    <link rel="stylesheet" type="text/css" href="/Public/Css/Base/public.css">
    <script type="text/javascript" src="/Public/Js/Lib/seajs/2.3.0/sea.js"></script>
    <script type="text/javascript" src="/Public/Js/Conf/baseConfig.js"></script>

</head>
<body>
<!--头部-->
<div class="global-fluid">
    <div class="global-container">
        <div id="header">

        </div>
        <div id="sidebar"><div style="width: 100%;">
    <ul id="accordion" class="accordion">
        <li>
            <div class="link"><i class="fa fa-paint-brush"></i>网站管理<i class="fa fa-chevron-down"></i></div>
            <ul class="submenu">
                <li><a href="http://www.jq22.com">菜单管理</a></li>
                <li><a href="http://www.jq22.com">友情链接</a></li>
            </ul>
        </li>
        <li>
            <div class="link"><i class="fa fa-code"></i>收支管理<i class="fa fa-chevron-down"></i></div>
            <ul class="submenu">
                <li><a href="{}">收入管理</a></li>
                <li><a href="<?php echo U('Home/consume/index');?>">消费管理</a></li>
                <li><a href="{}">理财管理</a></li>
            </ul>
        </li>
        <li>
            <div class="link"><i class="fa fa-mobile"></i>分类管理<i class="fa fa-chevron-down"></i></div>
            <ul class="submenu">
                <li><a href="http://www.jq22.com">php</a></li>
                <li><a href="http://www.jq22.com">java</a></li>
                <li><a href="http://www.jq22.com">javascript</a></li>
                <li><a href="http://www.jq22.com">jQuery</a></li>
                <li><a href="http://www.jq22.com">seajs</a></li>
            </ul>
        </li>
        <li><div class="link"><i class="fa fa-globe"></i>分析图表<i class="fa fa-chevron-down"></i></div>
            <ul class="submenu">
                <li><a href="http://www.jq22.com">Echarts</a></li>
                <li><a href="http://www.jq22.com">chart</a></li>
                <li><a href="http://www.jq22.com">cavans</a></li>

            </ul>
        </li>
    </ul>
</div>
</div>
    </div>
</div>
<!--主题内容-->

<div id="content">
    <div >
        <ol class="breadcrumb" >
            <li><a href="#">网站管理</a></li>
            <li><a href="#">菜单管理</a></li>
            <li class="active">配置菜单</li>
        </ol>
    </div>
    
</div>

<script type="text/javascript">
    seajs.use(['baseController.js','base/siderbar.js'], function(main,Accordion) {
        main.layout();
    });
</script>


    <script type="text/javascript">
        seajs.use('consumeController.js', function(main) {
            main.check();
        });
    </script>

</body>
</html>