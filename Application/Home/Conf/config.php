<?php
return array(
	//'配置项'=>'配置值'
    'TMPL_PARSE_STRING' =>array(
        '__CSS__' => __ROOT__.'/'.'Public/Css',
        '__JS__' => __ROOT__.'/'.'Public/Js'
    ),
    'MODULE_ALLOW_LIST' =>array('Home','Admin','User'),
    'DEFAULT_MODULE'  =>  'Home',  // 默认模块
    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'albean',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'albean_',    // 数据库表前缀
);