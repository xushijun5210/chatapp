<?php
namespace app\api\controller;
use think\Request;
use think\Db;
use Firebase\JWT\JWT;
class Login 
{  
   //用户登录
    public function login(Request $request)
    {
      // header('Access-Control-Allow-Origin: *');
       $data =$request->param();
       $salt = "xushijun5210";
       // return $data;die();
        // dump($data);
      if(!empty($data)){
            $email = htmlspecialchars($data['email']);
            $password = htmlspecialchars($data['password']);
            $password = crypt($password,$salt);
            $user = Db::table('user')->where('email',$email)->select();
            // dump($admin_user);
            if(!empty($user)){
            	// dump($admin_user);
                if ($email === $user[0]['email'] && $password === $user[0]['password']) {
                      $msg = [
                         'status' => 1001,
                         'msg' => '登录成功',
                         'token' => self::createJwt($user[0]['id'])
                      ];
                     return $msg;
                }else{
                	return [
                    'status' => 1004,
                    'msg' => '密码错误'
                    ];
                }
            }else{
                return [
                    'status' => 1003,
                    'msg' => '账号不存在'
                ];
             }
      }else{
      	    return [
                'status' => 1002,
                'msg' => '请输入账号密码'
            ];
      }
    }
    public function createJwt($userId)
    {
        $key = md5('xushijun'); //jwt的签发密钥，验证token的时候需要用到
        $time = time(); //签发时间
        $expire = $time + 144000000; //过期时间
        $token = array(
            "user_id" => $userId,
            "iss" => "http://tp5.1.com",//签发组织
            "aud" => "http://tp5.1.com", //签发作者
            "iat" => $time,
            "nbf" => $time,
            "exp" => $expire
        );
        $jwt = JWT::encode($token, $key);
        return $jwt;
    }
    public function logout()
    {
      

    }
    //用户添加
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
    	
}