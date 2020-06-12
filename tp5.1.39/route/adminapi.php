<?php
// 注册路由到index模块的News控制器的read操作
 // Route::rule('index/:id','api/Index/index');
// Route::post('adminapi/user/user','adminapi/User/user')
//     ->allowCrossDomain();
Route::group(['method'=>'post'],function(){
     Route::group('adminapi',function(){
     	Route::rule('user/user','adminapi/User/user');
     	Route::rule('login/index','adminapi/Login/index');
     });
})->allowCrossDomain();