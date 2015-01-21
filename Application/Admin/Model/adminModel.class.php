<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/21
 * Time: 22:47
 */
namespace Admin\Model;

class Admin extends model {
    public $test;
    protected $_validate = array(
        array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
        array('username','require','用户名必须！'), // 在新增的时候验证name字段是否唯一
        array('password','require','密码不正确'), // 自定义函数验证密码格式
    );
    public $rules = array(
        array('verify','require','验证码必须！'), //默认情况下用正则进行验证
        array('name','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
    );
    public function checkPass($pass){
        $newPass = md5($pass);
        return $newPass;
    }
}