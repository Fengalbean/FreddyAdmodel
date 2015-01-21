<?php
return array(
    'MODULE_ALLOW_LIST' => array('Home','Admin','User'),
    'URL_CASE_INSENSITIVE' =>true,
//    'DEFAULT_MODULE' => 'Home',  // 默认模块
    'APP_SUB_DOMAIN_DEPLOY'   =>    1, // 开启子域名配置
    'APP_SUB_DOMAIN_RULES'    =>    array(
        'admin.self.com'  => 'Admin',  // admin.domain1.com域名指向Admin模块
        'www.self.com'   => 'Home',  // test.domain2.com域名指向Test模块),
    )
);