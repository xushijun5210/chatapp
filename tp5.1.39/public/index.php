<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]
namespace think;

// 加载基础文件
require __DIR__ . '/../thinkphp/base.php';

// 支持事先使用静态方法设置Request对象和Config对象
//获取域名或主机地址
// $s = $_SERVER['HTTP_HOST'];
 //引入静态资源常量
define('SET_URL',"http://".$_SERVER['HTTP_HOST']."/");
// echo SET_URL;
define('LIB_ADMIN_URL',SET_URL."static/admin/lib/");
define('STATIC_ADMIN_URL',SET_URL."static/admin/static/");
// 执行应用并响应
Container::get('app')->run()->send();
