<?php
namespace app\api\controller;
use think\Request;
use think\Db;
// use think\File;
class User extends BaseApi
{  //用户添加
    public function add(Request $request)
    {
    	 // parma 表示接收所有传过来的参数 不管是post请求还是get请求 parma都能接收到参数
       header('Access-Control-Allow-Origin: *'); 
    	 $salt = "xushijun5210";
       $data = $request->param();
       $data['create_time'] =$data['update_time'] = date("Y-m-d H:i:s");
       $data['password'] = crypt($request->param('password'),$salt);
       $file = request()->file('image');
   	     if(Db::name('user')->insert($data)){
              $this ->ok($data);
   	     }else{
              $this ->fail(401);
   	     }
    }
    public function updatename(Request $request)
    {
       $id = $request->param('id');
       $name = $request->param('name');
       $user = Db::table('user')->where('id',$id)->where('status',1)->select();
       // return json_encode($user);
       $user =$user[0]; 
       $data = [
          'id'=>$id,
          'name'=>$name,
          'email'=>$user['email'],
          'phone'=>$user['phone'],
          'sex'=>$user['sex'],
          'birthday'=>$user['birthday'],
          'password'=>$user['password'],
          'introduce'=>$user['introduce'],
          'imgurl'=>$user['imgurl'],
          'create_time'=>$user['create_time'],
          'update_time'=>date("Y-m-d H:i:s"),
       ]; 
        if(Db::name('user')->where('id',$id)->update($data)){
          return "成功！";
        }else{
          return "失败！";
        }
    } 
    public function updateemail(Request $request)
    {
       $id = $request->param('id');
       $email = $request->param('email');
       $user = Db::table('user')->where('id',$id)->where('status',1)->select();
       // return json_encode($user);
       $user =$user[0]; 
       $data = [
          'id'=>$id,
          'name'=>$user['name'],
          'email'=>$email,
          'phone'=>$user['phone'],
          'sex'=>$user['sex'],
          'birthday'=>$user['birthday'],
          'password'=>$user['password'],
          'introduce'=>$user['introduce'],
          'imgurl'=>$user['imgurl'],
          'create_time'=>$user['create_time'],
          'update_time'=>date("Y-m-d H:i:s"),
       ]; 
        if(Db::name('user')->where('id',$id)->update($data)){
          return "成功！";
        }else{
          return "失败！";
        }
    } 
    public function updatephone(Request $request)
    {
       $id = $request->param('id');
       $phone = $request->param('phone');
       $user = Db::table('user')->where('id',$id)->where('status',1)->select();
       // return json_encode($user);
       $user =$user[0]; 
       $data = [
          'id'=>$id,
          'name'=>$user['name'],
          'email'=>$user['email'],
          'phone'=>$phone,
          'sex'=>$user['sex'],
          'birthday'=>$user['birthday'],
          'password'=>$user['password'],
          'introduce'=>$user['introduce'],
          'imgurl'=>$user['imgurl'],
          'create_time'=>$user['create_time'],
          'update_time'=>date("Y-m-d H:i:s"),
       ]; 
        if(Db::name('user')->where('id',$id)->update($data)){
          return "成功！";
        }else{
          return "失败！";
        }
    } 
     public function upload()
    {
          // 获取表单上传文件 例如上传了001.jpg
          $file = request()->file('image');
           $id = 15;
           $user = Db::table('user')->where('id',$id)->where('status',1)->select();
           $user =$user[0]; 
          // var_dump($file);$_SERVER['HTTP_HOST']
         // 移动到框架应用根目录/uploads/ 目录下
          $info = $file->rule('uniqid')->move( '../public/static/img/');
         if($info){
           $oldimgurl = Db::table('user')->where('id',$id)->where('status',1)->value('imgurl');
           if($oldimgurl != null){
                   $oldimgurl = '.'.$oldimgurl;
                    unlink($oldimgurl);
           }
             
             $imgurl ='/static/img/'.$info->getSaveName();
             $data = [
                  'id'=>$id,
                  'name'=>$user['name'],
                  'email'=>$user['email'],
                  'phone'=>$user['phone'],
                  'sex'=>$user['sex'],
                  'birthday'=>$user['birthday'],
                  'password'=>$user['password'],
                  'introduce'=>$user['introduce'],
                  'imgurl'=>$imgurl,
                  'create_time'=>$user['create_time'],
                  'update_time'=>date("Y-m-d H:i:s"),
            ]; 
            if(Db::name('user')->where('id',$id)->update($data)){
                    return "成功！";
            }else{
                 return "失败！";
             }
             // echo $imgpath;
             // echo $info->getFilename(); 
         }else{
             // 上传失败获取错误信息
            echo $file->getError();
         }
    } 
    public function showlist(){
      header('Access-Control-Allow-Origin: *');
    	$data = Db::table('user')->where('status',1)->select();
      $this ->ok($data);
    	 // return json_encode($data);
    }
}