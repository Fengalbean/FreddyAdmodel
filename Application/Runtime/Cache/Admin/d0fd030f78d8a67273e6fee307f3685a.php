<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>

    <link rel="stylesheet" type="text/css" href="/Public/Css/Base/bootstrap/3.3.0/css/bootstrap.css">
    <!--<link rel="stylesheet" type="text/css" href="/Public/Css/Base/flatui/dist/css/flat-ui.min.css">-->
    <link rel="stylesheet" type="text/css" href="/Public/Css/App/admin/index.css">
    
    <!--<link rel="stylesheet" type="text/css" href="/Public/Css/Base/easyui/default/easyui.css">-->
    <!--<link rel="stylesheet" type="text/css" href="/Public/Css/Base/easyui/icon.css">-->
    <link rel="stylesheet" type="text/css" href="/Public/Css/Base/siderbar/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/Css/Base/siderbar/css/style.css">
    <link rel="stylesheet" type="text/css" href="/Public/Css/Base/public.css">
    <script type="text/javascript" src="/Public/Js/Lib/seajs/2.3.0/sea.js"></script>
    <script type="text/javascript" src="/Public/Js/Conf/adminConfig.js"></script>

</head>
<body>
<!--头部-->
<div class="global-fluid" style="background: #34495E">
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
                <li><a href="<?php echo U('Admin/consume/index');?>">消费管理</a></li>
                <li><a href="{}">理财管理</a></li>
            </ul>
        </li>
        <li>
            <div class="link"><i class="fa fa-mobile"></i>知识库管理<i class="fa fa-chevron-down"></i></div>
            <ul class="submenu">

                <li><a href="<?php echo U('Admin/Collect/getList');?>">javascript</a></li>
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
    
    <div class="container-fluid">
        <div class="title-tab">
            <div class="table-cont clearfix form-boder">
                <div class="main-hd-btn ">
                    <form action="<?php echo U('Home/consume/index');?>" method="get" id="search">
                        <div class="form-group col-sm-2">
                            <select name="search" id="search-type" class="form-control">
                                <option value="1" >按类型搜索</option>
                                <option value="2" selected="selected">按内容搜索</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-2">
                            <input type="text" name="key" id="key" class="form-control" value="">
                        </div>
                        <div class="col-sm-2" >
                            <button type="submit" class="btn btn-success"  id= "search-btn">搜索</button>

                        </div>
                    </form>
                    <button type="submit" id="add" data-toggle="modal" data-target="#consumeModal" class="btn btn-success ">添加</button>
                </div>
                <div class="col-lg-12 form-boder"  >
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>序号</th>
                            <th>名字</th>
                            <th>url</th>
                            <th>类型</th>
                            <th>关键词</th>
                            <th>收录时间</th>
                            <th>备注</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($getList)): $i = 0; $__LIST__ = $getList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr data-id="<?php echo ($vo["id"]); ?>" >
                                <td><?php echo ($vo["id"]); ?></td>
                                <td><?php echo ($vo["name"]); ?></td>
                                <td><?php echo ($vo["url"]); ?></td>
                                <td data-id="<?php echo ($vo["t_id"]); ?>"><?php echo ($vo["type"]); ?></td>
                                <td><?php echo ($vo["keywords"]); ?></td>
                                <td><?php echo ($vo["date"]); ?></td>
                                <td><?php echo ($vo["note"]); ?></td>
                                <td>
                                    <a href="<?php echo U('Home/consume/edit',array('id'=>$vo['id']));?>" class="btn btn-info btn-sm js-consume-edit" data-id="<?php echo ($vo["id"]); ?>">编辑</a>
                                    <a href="<?php echo U('Home/consume/del',array('id'=>$vo['id']));?>" data-id="<?php echo ($vo["id"]); ?>" class="btn btn-danger btn-sm js-consume-del">删除</a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12 form-boder">
                    <div style="width: 600px;height: 80px; margin-right: auto;margin-left: auto;">
                        <ul class="pagination">
                            <?php echo ($page); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade"  id="consumeModal" data-status="false"  role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title">添加收录</h4>
                </div>
                <form class="form-horizontal " role="form" id="collectForm" aria-autocomplete="off"  aria-multiline="true" method="post" action="<?php echo U('Admin/Collect/add');?>" style="padding-top: 10px;">

                    <div class="modal-body modal-cont">
                            <div class="form-group" style="padding:0 20px;">
                                <label for="name">收录名称：</label>
                                <input type="text" name="name" id="name" class="form-control" required="required" value="" aria-autocomplete="off">

                            </div>
                            <div class="form-group" style="padding:0 20px;">
                                <label for="keywords">关键词/简介：</label>
                                <textarea class="form-control" name="keywords" id="keywords" required="required" rows="3"></textarea>
                            </div>
                            <div class="form-group" style="padding:0 20px;">
                                <label for="url">url地址：</label>
                                <input id="url" type="text" class="form-control" required="required"  name="url" >
                            </div>
                            <div class="form-group" style="padding:0 20px;">
                                <label for="type">类型：</label>
                                <input type="text" name="type" id="type" class="form-control" value="" required="required" aria-autocomplete="off">
                            </div>

                            <div class="form-group" style="padding:0 20px;">
                                <label for="note">备注：</label>
                                <textarea class="form-control" name="note" id="note" required="required" rows="3"></textarea>
                            </div>
                    </div>
                    <div class="modal-footer" style="text-align: center;">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"  id="consume-cancel" value="取消">取  消</button>
                        <button type="submit" class="btn btn-success" id="btn-consume" >提交</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

</div>


<script type="text/javascript">
    seajs.use(['baseController.js','base/siderbar.js'], function(main,Accordion) {
        main.layout();
    });
</script>


    <script type="text/javascript">
        seajs.use('collectController.js', function(main) {
            main.check();
        });
    </script>

</body>
</html>