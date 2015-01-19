<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>

    <link rel="stylesheet" type="text/css" href="/Public/Css/Base/bootstrap/3.3.0/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/Public/Css/Base/easyui/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="/Public/Css/Base/easyui/icon.css">
    <link rel="stylesheet" type="text/css" href="/Public/Css/Base/siderbar/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/Css/Base/siderbar/css/style.css">
    <link rel="stylesheet" type="text/css" href="/Public/Css/Base/public.css">
    <script type="text/javascript" src="/Public/Js/Lib/seajs/2.3.0/sea.js"></script>
    <script type="text/javascript" src="/Public/Js/Conf/baseConfig.js"></script>
</head>
<body>
<div class="container-fluid" style="background: #dcdcdc;">
    <div id="cc" style="width:100%;min-height:850px;">
        <!--头部-->
        <div data-options="region:'north'" style="height:80px;background: #808080;">
           <center><h3>欢迎登陆后台</h3></center>
        </div>

        <!--左侧导航-->
        <div data-options="region:'west'" style="width:250px;">
            <div>
                <div style="width: 100%;">
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

        <!--主题内容-->

        <div data-options="region:'center'" >
            <div class="container-fluid">
                <div>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Library</a></li>
                        <li class="active">Data</li>
                    </ol>
                </div>
                <div>
                    
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
                                <th>类型</th>
                                <th>具体情况</th>
                                <th>金额</th>
                                <th>时间</th>
                                <th>城市</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr data-id="<?php echo ($vo["id"]); ?>" >
                                    <td><?php echo ($vo["id"]); ?></td>
                                    <td>
                                        <?php switch($albean_bill["type"]): case "2": ?>收入<?php break;?>
                                            <?php default: ?>消费<?php endswitch;?>
                                    </td>
                                    <td><?php echo ($vo["instruction"]); ?></td>
                                    <td><?php echo ($vo["money"]); ?></td>
                                    <td><?php echo ($vo["date"]); ?></td>
                                    <td><?php echo ($vo["city"]); ?></td>
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
                    <h4 class="modal-title">添加页面</h4>
                </div>
                <div class="modal-body modal-cont">
                    <form class="form-horizontal " role="form" id="consumeform" aria-autocomplete="off"  aria-multiline="true" method="post" action="<?php echo U('Home/consume/add');?>" style="padding-top: 10px;">
                        <div class="form-group" style="padding:0 20px;">
                            <label for="consumetype">类型：</label>
                            <input type="text" name="consumetype" id="consumetype" class="form-control" value="" aria-autocomplete="off">

                        </div>
                        <div class="form-group" style="padding:0 20px;">
                            <label for="instruction">具体说明：</label>
                            <textarea class="form-control" name="instruction" id="instruction" rows="5"></textarea>
                        </div>
                        <div class="form-group" style="padding:0 20px;">
                            <label for="money">金额：</label>
                            <input type="text" name="money" id="money" class="form-control" value="" aria-autocomplete="off">
                        </div>
                        <div class="form-group" style="padding:0 20px;">
                            <label for="consumetime">时间：</label>
                            <input id="consumetime" type="text" class="easyui-datebox" required="required"  name="consumetime" style="width: 250px;">
                        </div>
                        <div class="form-group" style="padding:0 20px;">
                            <label for="consumecity">城市：</label>
                            <input type="text" name="consumecity" id="consumecity" class="form-control" value="" aria-autocomplete="off">
                        </div>

                </div>
                <div class="modal-footer" style="text-align: center;">
                    <button type="button" class="btn btn-default" data-dismiss="modal"  id="consume-cancel" value="取消">取  消</button>
                    <button type="submit" class="btn btn-success" id="btn-consume" >提交</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


                </div>
            </div>
        </div>

        <!--底部-->
        <div data-options="region:'south'" style="height:50px;background: #808080;"></div>
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