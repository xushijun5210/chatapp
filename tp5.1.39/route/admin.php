<?php
Route::group('admin',function(){
    Route::rule('login/login','admin/Login/login');
    Route::rule('login/logout','admin/Login/logout');
    Route::rule('login/verify','admin/Login/verify');
});