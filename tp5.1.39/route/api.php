<?php
// 注册路由到index模块的News控制器的read操作
 // Route::rule('index/:id','api/Index/index');
Route::post('index/index','api/Index/index')
    ->allowCrossDomain();
Route::group(['method'=>'post'],function(){
     Route::group('api',function(){
     	Route::rule('user/add','api/User/add');
     	Route::rule('user/updatename','api/User/updatename');
     	Route::rule('user/updatephone','api/User/updatephone');
     	Route::rule('user/updateemail','api/User/updateemail');
     	Route::rule('user/upload','api/User/upload');
     	Route::rule('user/showlist','api/User/showlist');
     });
})->allowCrossDomain();