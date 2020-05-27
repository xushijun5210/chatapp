<?php
namespace app\api\controller;
use think\Request;
use think\Db;
class User
{
    public function add(Request $request)
    {
    	 // parma 表示接收所有传过来的参数 不管是post请求还是get请求 parma都能接收到参数
   	     $data = $request->param();
         // post表示只接收 post方式传出来的参数
        // $data1= $request->post();
        // get表示只接收get方式传出来的参数
        // $data2= $request->get();
        // table方法必须指定完整的数据表名
        // Db::table('think_user')->where('id',1)->find();
        Db::name('admin_user')->insert($data);
        // Db::name('user')->insert($data);
        return json_encode($data);
    }
    public function showlist(){
    	$data = Db::table('admin_user')->where('status',1)->select();
    	return json_encode($data);
    }
}