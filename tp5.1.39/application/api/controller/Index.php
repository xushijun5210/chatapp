<?php
namespace app\api\controller;
use think\Request;
use think\Db;
use app\common;
// use PHPMailer\PHPMailer\PHPMailer;
class Index
{
    public function index(Request $request)
    {
    	$s = rand(100000,999999);
    	$data['yzm'] = $s;
    	$data['nh'] = "nh";
    	$data[] = $request->param();
    	// sendMail("940856291@qq.com", "发送QQ邮箱", "成功！666");
        return json_encode($data);
    }
}