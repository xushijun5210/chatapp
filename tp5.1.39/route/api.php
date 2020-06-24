<?php
// 注册路由到index模块的News控制器的read操作
 // Route::rule('index/:id','api/Index/index');
Route::post('index/index','api/Index/index')
    ->allowCrossDomain();
Route::group(['method'=>'post'],function(){
     Route::group('api',function(){
     	Route::rule('user/add','api/User/add');//用户注册
     	Route::rule('user/updatename','api/User/updatename');//修改昵称
     	Route::rule('user/updatephone','api/User/updatephone');//修改手机号
     	Route::rule('user/updateemail','api/User/updateemail');//修改邮箱
     	Route::rule('user/upload','api/User/upload');//头像上传
     	Route::rule('user/me','api/User/me');//个人信息
     });
     Route::group('api/login',function(){
     	Route::rule('login','api/Login/login');//用户登录
     	Route::rule('logout','api/Login/logout');//用户退出
     });
     Route::group('api/friend',function(){
     	Route::rule('add','api/Friend/add');//添加好友
     	Route::rule('showlist','api/Friend/showlist');//好友列表显示
     	Route::rule('showfriend','api/Friend/showfriend');//好友列表显示
     });
})->allowCrossDomain();