/**
 * Created by dell4 on 2014/12/3.
 */
define(function(require,exports,module){
    var $ = require('jquery');
    require('bootstrap');
    require('jquery_validate');
    require('jquery_form');
    var collectForm = $('#collectForm');
    function check(){
        var consumeModal = $('#consumeModal');
        collectForm.validate({
            rules : {
                name:{
                    required:true,
                    maxlength: 30
                },
                type:{
                    required:true
                },
                keywords:{
                    required:true,
                    maxlength: 40
                },
                url:{
                    required:true,
                    maxlength: 100
                }
            },
            messages : {
                name:{
                    required:'亲，请输入收录名称！',
                    maxlength:'亲，不能超过30汉字！'
                },
                type:{
                    required:'亲，请输入收录类型！'

                },
                keywords:{
                    required:'亲，请输入关键词/简介！',
                    maxlength:'亲，不能超过30汉字！'
                },
                url:{
                    required:'亲，请输入url地址！',
                    maxlength: '亲，不能超过100字符！'
                }
            },
            submitHandler:function(form){
                if($(form).data('is_submit') == 1){//防止重复提交
                    return false;
                }
                $(form).data('is_submit',1);
                $(form).ajaxSubmit({
                    success:function(data){
                        var data = JSON.parse(data);
                        if(data.status == 1){
                            //showModalDialog('asdadssda');
                            //$('.close').hide();
                            alert('添加成功！');
                        }else{
                            alert('添加失败！');
                            //showModalDialog('xxx');
                            //$('.close').hide();
                        }
                    }
                });
            }
        });
    }
    function bindEvent(){
        $('#listForm').on('click','.js-collect-del',function(){
            var id = $(this).data('id');
            var host = window.location.host;
            var href = $(this).data('href');
            $.ajax({
                url:host+href,
                data:{id:id},
                type:'post',
                success:function(data){
                    alert('xxx');
                },
                error:function(data){
                    alert('aaaa');
                }
            });
        });
    }



    var main = {
        check:function(){
            check();
            bindEvent();
        }
    };
    module.exports = main ;
});