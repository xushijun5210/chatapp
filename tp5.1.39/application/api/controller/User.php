<?php
namespace app\api\controller;
use think\Request;
use think\Db;
class User
{  //用户添加
    public function add(Request $request)
    {
    	 // parma 表示接收所有传过来的参数 不管是post请求还是get请求 parma都能接收到参数
    	 $salt = "test";
    	 // return json_encode($request->param());
   	     $data = [
   	          'name'=>$request->param('name'),
   	          'email'=>$request->param('email'),
   	          'sex'=>$request->param('sex'),
   	          'birthday'=>$request->param('birthday'),
   	          'phone'=>$request->param('phone'),
   	          'password'=>crypt($request->param('password'),$salt),
   	          'introduce'=>$request->param('introduce'),
   	          'imgurl'=>$request->param('imgurl'),
   	          'create_time'=>date("Y-m-d H:i:s"),
   	          'update_time'=>date("Y-m-d H:i:s"),
   	     ];
   	     if(Db::name('user')->insert($data)){
              return "成功！";
   	     }else{
              return "失败！";
   	     }
         // post表示只接收 post方式传出来的参数
        // $data1= $request->post();
        // get表示只接收get方式传出来的参数
        // $data2= $request->get();
        // table方法必须指定完整的数据表名
        // Db::table('think_user')->where('id',1)->find();
        // $password = crypt($request->param('password'));
        // Db::name('admin_user')->insert($data);
        // Db::name('user')->insert($data);
        // return json_encode($request->param());
    }
     public function update(Request $request)
    {
    	 // parma 表示接收所有传过来的参数 不管是post请求还是get请求 parma都能接收到参数
    	 // $salt = "test";
    	 $id = $request->param('id');
    	 // return json_encode($request->param());
    	 $data =$request->param();
    	 $data['update_time'] =date("Y-m-d H:i:s");
   	     // $data = [
   	     //      'name'=>$request->param('name'),
   	     //      'email'=>$request->param('email'),
   	     //      'sex'=>$request->param('sex'),
   	     //      'birthday'=>$request->param('birthday'),
   	     //      'phone'=>$request->param('phone'),
   	     //      'password'=>crypt($request->param('password'),$salt),
   	     //      'introduce'=>$request->param('introduce'),
   	     //      'imgurl'=>$request->param('imgurl'),
   	     //      'create_time'=>date("Y-m-d H:i:s"),
   	     //      'update_time'=>date("Y-m-d H:i:s"),
   	     // ];
   	     if(Db::name('user')->where('id',$id)->update($data)){
              return "成功！";
   	     }else{
              return "失败！";
   	     }
    }
    public function showlist(){
    	$data = Db::table('admin_user')->where('status',1)->select();
    	return json_encode($data);
    }
}