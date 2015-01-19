/**
 * Created by lyview on 2014/10/13.
 */
define(function(require , exports ,module){
    //var artDialog = require('artDialog');
    var $ = require('jquery');
    /**
     * 弹出层
     * @param {array} config 配置
     * 				id ID
     * 				title 标题
     * 				okValue 确认按钮值
     * 				cancelValue 取消按钮值
     * 				ok 确认执行
     * 				cancel 取消执行
     * @author lyview
     **/
    var Dialog =  function (config ,ok , cancel){
        var defaults = {
            id : 'wxt-dialog' ,
            title : '提示',
            content : '系统提示',
            ok : false,
            okValue : '确定',
            cancel : false,
            cancelValue : '取消'
        };
        var callbackList = {};
        config = $.extend(defaults , config);
        // 按钮组
        if (!$.isArray(config.button)) {
            config.button = [];
        }
        // 取消按钮
        if (cancel !== undefined) {
            config.cancel = cancel;
        }

        // 确定按钮
        if (ok !== undefined) {
            config.ok = ok;
        }
        if (config.ok) {
            config.button.push({
                id: 'ok',
                value: config.okValue,
                callback :  config.ok
            });
        }
        if (config.cancel) {
            config.button.push({
                id: 'cancel',
                value: config.cancelValue,
                callback :  config.cancel
            });
        }
        //按钮
        buttonHtml = '';
        if(config.button){
            if (config.button.length != 0) {
                buttonHtml += '<div class="modal-footer modal-center">';
                $.each(config.button, function (i, item) {
                    item.id = item.id || item.value;
                    callbackList[item.id] = item.callback;
                    var className = item.id == 'cancel' ? 'btn-default' :'btn-success' ;
                    buttonHtml += '<button data-id="' + item.id + '" type="button" class="btn '+className+'">' + item.value + '</button>';
                });
                buttonHtml += '</div>';
            }
        }
        //弹出层
        var html = '<div class="modal fade bs-example-modal-sm in" tabIndex="-1" id="'+config.id+'">'
            + '<div class="modal-dialog modal-width">'
            + '<div class="modal-content  modal-vertical-centered">'
            + '<div class="modal-header ">'
            + '<button data-dismiss="modal" class="close" type="button"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'
            + '<h4 id="mySmallModalLabel" class="modal-title">'+config.title+'</h4>'
            + '</div>'
            + '<div class="modal-body modal-center">'+config.content+'</div>'
            + buttonHtml
            + '</div>'
            + '</div></div>';
        $('body').append(html);
        var targetList = $('#' + config.id);
        //modal回调
        targetList.on('hide.bs.modal' , function(e){
            setTimeout(
                function(){
                    targetList.remove();
                    callbackList = {};
                },
                500
            );
        });
        targetList.on('click' , 'button[data-id]' , function(event){
            var id = $(this).attr('data-id');
            typeof callbackList[id] == 'function' && callbackList[id]();
            targetList.modal('hide');
            event.preventDefault();
        }).modal('show');
    };

    var dialogZh = {
        title : '系统提示',
        error_title : '错误提示',
        content : '',
        ok : '确认',
        cancel : '取消'
    };
    var wxtDialog = function(){
        this.language = dialogZh;
    };
    wxtDialog.prototype = {
        //设置语言
        seti18n : function(lang){
            this.language = lang;
        },
        confirm : function(callbackFun , content , title){
            var settings = {
                id : 'wxt-confirm' ,
                title : title ? title : this.language.title,
                content : content ? content : this.language.content,
                button : [
                    {
                        id : 'ok',
                        value:  this.language.ok,
                        callback : function(){
                            (typeof callbackFun == 'function') && callbackFun();
                        }
                    },
                    {
                        id : 'cancel',
                        value : this.language.cancel,
                        callback : function(){}
                    }
                ]
            };
            Dialog(settings);
            //artDialog(settings).show();
        },
        error : function(content , title){
            var settings = {
                id : 'wxt-error' ,
                title : title ? title : this.language.error_title,
                content : content ? content : this.language.content
            }
            Dialog(settings);
            //artDialog(settings).show();
        },
        alert : function(content , title){
            var settings = {
                id : 'wxt-alert' ,
                title : title ? title : this.language.title,
                content : content ? content : this.language.content
            };
            Dialog(settings);
            //artDialog(settings).show();
        },
        //操作提示
        showTip : function(msg , timer , callBack){
            timer = timer ? timer *1000 : 3000;
            var html = $('<div class="alert alert-warning alert-dismissible f-pa" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>'+msg+'</strong></div>');
            $('.breadcrumb').before(html);
            setTimeout(
                function(){
                    html.remove();
                    typeof callBack == 'function' && callBack();
                },
                timer
            );
        }
    };
    module.exports = new wxtDialog();
});
