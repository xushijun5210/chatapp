<?php
namespace app\adminapi\controller;
use think\Request;
use think\Db;
use Firebase\JWT\JWT;
class Login 
{  
   //用户登录
    public function index(Request $request)
    {
       $data =$request->param();
        // dump($data);
      if(!empty($data)){
            $email = htmlspecialchars($data['email']);
            $password = htmlspecialchars($data['password']);
            $admin_user = Db::table('admin_user')->where('email',$email)->select();
            // dump($admin_user);
            if(!empty($admin_user)){
            	// dump($admin_user);
                if ($email === $admin_user[0]['email'] && $password === $admin_user[0]['password']) {
                      $msg = [
                         'status' => 1001,
                         'msg' => '登录成功',
                         'jwt' => self::createJwt($admin_user[0]['id'])
                      ];
                     return $msg;
                }else{
                	return [
                    'status' => 1002,
                    'msg' => '密码错误'
                    ];
                }
            }else{
                return [
                    'status' => 1002,
                    'msg' => '账号密码错误'
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
        $expire = $time + 14400; //过期时间
        $token = array(
            "user_id" => $userId,
            "iss" => "https://199508.com",//签发组织
            "aud" => "https://199508.com", //签发作者
            "iat" => $time,
            "nbf" => $time,
            "exp" => $expire
        );
        $jwt = JWT::encode($token, $key);
        return $jwt;
    }
    	
}