<?php
namespace app\admin\controller;
use think\captcha\Captcha;
class Login extends Base
{
	//管理员列表
    public function login()
    {
    	// $uniqid = uniqid(mt_rand(100000,999999));
    	// var_dump($uniqid);
         return view();
    }
    //添加管理员
    public function logout()
    {
        return view();
    }
    //验证码
    public function verify()
    {
    	//验证码唯一标识
    	 $uniqid = uniqid(mt_rand(100000,999999));
    	//生成验证码地址
    	$src = captcha_src($uniqid);
    	// $src =htmlspecialchars(captcha_src($uniqid));
    	// $captcha = new Captcha($config);
     //    $captcha->entry(); 
     //    $src = 'http://tp5.1.com/admin/Login/verify';
    	$res =[
    	    'src'   => $src,
    	    'uniqid'=>$uniqid
    	];
    	$this ->ok($res);
        // $captcha = new Captcha();
        // return $captcha->entry();
    }
}
