<?php
namespace app\adminapi\controller;
use think\Request;
use think\Db;
class User extends BaseApi
{  
   //用户添加
    public function user(Request $request)
    {
        $data = $request->param();
        dump($data);
    } 	
}