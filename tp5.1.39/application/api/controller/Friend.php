<?php
namespace app\api\controller;
use think\Request;
use think\Db;
class Friend extends BaseApi
{  //添加好友
    public function add(Request $request)
    {
    	 // parma 表示接收所有传过来的参数 不管是post请求还是get请求 parma都能接收到参数
       header('Access-Control-Allow-Origin: *'); 
      // $header = $this-> request->header('authorization');
      // $user_id = $this -> getUserId($header);
      // if($header == 'null'){
      //    return json_encode('拒绝访问');
      // }else{
      //    $user_id = $this -> getUserId($header);
      // }
       $data = $request->param();
       if($data['user_id'] && $data['friend_id']){
          $data['create_time'] =$data['update_time'] = date("Y-m-d H:i:s");
          if(Db::name('friends')->insert($data)){
              $this ->ok($data);
          }else{
              $this ->fail(401);
          }
       }else{
         echo ("拒绝访问");
       }
    }
    //通讯录 好友列表
    public function showlist(Request $request)
    {
       // parma 表示接收所有传过来的参数 不管是post请求还是get请求 parma都能接收到参数
      header('Access-Control-Allow-Origin: *'); 
      $header = $this-> request->header('authorization');
      // $user_id = $this -> getUserId($header);
      if($header == 'null'){
         return json_encode('拒绝访问');
      }else{
         $user_id = $this -> getUserId($header);
      }
      // $user_id = 2;
      $ads = Db::table('friends')->where('user_id','=',$user_id)->where('status',0)->column('id');
      $data = Db::table('user')->where('id','in',$ads)->where('status',1)->select();
      $this ->ok($data);
    }
     //好友信息
    public function showfriend(Request $request)
    {
       // parma 表示接收所有传过来的参数 不管是post请求还是get请求 parma都能接收到参数
      header('Access-Control-Allow-Origin: *'); 
      $header = $this-> request->header('authorization');
      // $user_id = $this -> getUserId($header);
      if($header == 'null'){
         return json_encode('拒绝访问');
      }else{
         $user_id = $this-> request->param('id');
      }
      $data = Db::table('user')->where('id','=',$user_id)->where('status',1)->select();
      $this ->ok($data);
    }
}