<?php
namespace app\admin\controller;
use think\Request;
use think\Controller;
class Base extends Controller
{
	//控制器的初始化方法
    protected function initialize()
    {
        parent::initialize();
        //初始化代码initialize()
        // $this->checkToken();
    }
    /**
     * 通用响应
     * @param array $data 返回数据
     * @param int $code   错误码
     * @param string $msg  错误信息
     */
    protected function response($code=200,$msg='success',$data=[])
    {
    	$res = [
    	      'code' => $code,
    	      'msg'  => $msg,
    	      '$data'=> $data
    	];
    	// echo json_encode($res);die;
    	echo json_encode($res,JSON_UNESCAPED_UNICODE);die;
    }
     /**
     * 成功响应
     * @param array $data
     * @param int $code
     * @param string $msg
     */
    protected function ok($data,$code=200,$msg='success')
    {
         $this ->response($code,$msg,$data);
    }
    /**
     * 失败响应
     * @param array $data
     * @param int $code
     * @param string $msg
     */
     protected function fail($msg,$code=400,$data=[])
    {
         $this ->response($code,$msg,$data);
    }
}