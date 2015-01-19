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
        var consumeform = $('#consumeform');
        var consumeModal = $('#consumeModal');
        consumeform.validate({
            rules : {
                consumetype:{
                    required:true
                },
                instruction:{
                    required:true,
                    minlength: 6
                },
                money:{
                    required:true,
                    number:true
                },
                consumetime:{
                    ct:true
                },
                consumecity:{
                    required:true
                }
            },
            messages : {
                consumetype:{
                    required:'亲，请输入类型！'
                },
                instruction:{
                    required:'亲，请详细叙述！',
                    minlength: '亲，不能少于6个字'
                },
                money:{
                    required:'亲，请输入金额！',
                    number:'亲，金额必须为数字'
                },

                consumecity:{
                    required:'亲，请输入城市！'
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
    }
    exports.curd = main;
    //module.exports = main ;
})