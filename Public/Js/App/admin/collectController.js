/**
 * Created by dell4 on 2014/12/3.
 */
define(function(require,exports,module){
    var $ = require('jquery');
    var common = require('common');
    var wxtDialog = require('base/wxtDialog');
    require('bootstrap');
    require('jquery_validate');
    function check(){
        var collectForm = $('#collectForm');
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
                form.submit();
            }
        });
    }

    var main = {
        check:function(){
           check();

        }
    };
    module.exports = main ;
});