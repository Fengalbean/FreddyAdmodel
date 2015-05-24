/**
 * Created by dell4 on 2014/12/3.
 */

seajs.config({
    // Sea.js 的基础路径
    base: '/Public/Js/App/home/',
    // 别名配置
    alias: {
        'es5-safe': '/Public/Js/App/base/es5-safe.js',
        'json': '/Public/Js/App/base/json.js',
        'jquery': '/Public/Js/Lib/jquery/1.9.1/jquery-1.9.1.min.js',
        'bootstrap':'/Public/Js/Lib/bootstrap/3.3.0/bootstrap.js',
        'jqeasyui': '/Public/Js/Pulgins/jquery-easyui/jquery.easyui.min.js',
        'jqeasyuilang':'/Public/Js/Pulgins/jquery-easyui/locale/easyui-lang-zh_CN.js',
        'jquery_validate': '/Public/Js/Pulgins/jquery-validate/1.11/jquery.validate.min.js',
        'common':'/Public/Js/App/base/common.1.2.0.js'
    },

    // 路径配置
    paths: {
        'model' : '/Public/Stjs/App/agency/model/',
        'base' : '/Public/Js/App/base',
        'bootstrap' : '/Public/Js/Lib/bootstrap/3.2.0/',
        'pulgins' : '/Public/Js/Pulgins/'
    },

    // 变量配置
    vars: {
        'locale': 'zh-cn'
    },

    // 映射配置
    map: [
        ['http://example.com/js/app/', 'http://localhost/js/app/']
    ],

    // 预加载项
    preload: [
        Function.prototype.bind ? '' : 'es5-safe',
        this.JSON ? '' : 'json'
    ],

    // 调试模式
    debug: true,
    // 文件编码
    charset: 'utf-8'
});