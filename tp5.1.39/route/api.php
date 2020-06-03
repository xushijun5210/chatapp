<?php
// 注册路由到index模块的News控制器的read操作
 // Route::rule('index/:id','api/Index/index');
Route::post('index/index','api/Index/index')
    ->allowCrossDomain();
Route::post('user/add','api/User/add')
    ->allowCrossDomain();
Route::post('user/update','api/User/update')
    ->allowCrossDomain();
Route::post('user/showlist','api/User/showlist')
    ->allowCrossDomain();