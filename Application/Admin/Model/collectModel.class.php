<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/21
 * Time: 22:47
 */
namespace Admin\Model;
use Think\Model;
class CollectModel extends Model{
//    private $time = time();
    protected $_validate = array(
        array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
        array('name','require','收录名称必须要填写！',1), // 在新增的时候验证name字段是否唯一
        array('type','require','类型必须要填写！',1), // 自定义函数验证密码格式
        array('keywords','require','关键词/简介必须要填写！',1), // 在新增的时候验证name字段是否唯一
        array('url','require','关键词/简介必须要填写！',1), // 在新增的时候验证name字段是否唯一
    );
    protected $_auto = array (
        array('date','time'),  // 新增的时候把status字段设置为1
        array('t_id','1',) , // 对password字段在新增和编辑的时候使md5函数处理
//        array('name','getName',3,'callback'), // 对name字段在新增和编辑的时候回调getName方法
//        array('update_time','time',2,'function'), // 对update_time字段在更新的时候写入当前时间戳
    );
}
