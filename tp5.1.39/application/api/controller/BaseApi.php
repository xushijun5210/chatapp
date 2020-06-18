<?php
namespace app\api\controller;
use think\Request;
use think\Controller;
use Firebase\JWT\JWT;
// use think\Db;
// use app\common;
// use PHPMailer\PHPMailer\PHPMailer;
class BaseApi extends Controller
{
	//控制器的初始化方法
    protected function initialize()
    {
        parent::initialize();
        //初始化代码initialize()
        // $this->checkToken();
    }
     /**
     * 检测Token
     * @param array $data 返回数据
     * @param int $code   错误码
     * @param string $msg  错误信息
     */
    public function checkToken(){
    	// $header = Request::instance()->header();
    	$header = $this-> request->header();
    	// dump($header);
        if ($header['authorization'] == 'null'){
            echo json_encode([
                'status' => 1002,
                'msg' => 'Token不存在,拒绝访问'
            ]);
            exit;
        }else{
            $checkJwtToken = $this->verifyJwt($header['authorization']);
            if ($checkJwtToken['status'] == 1001) {
                return true;
            }
        }
    }
    // 校验jwt权限API
     protected function verifyJwt($jwt)
    {
        $key = md5('xushijun');
        // JWT::$leeway = 3;
        try {
            $jwtAuth  = json_encode(JWT::decode($jwt, $key, array('HS256')));
            $authInfo = json_decode($jwtAuth, true);
            $msg = [];
            if (!empty($authInfo['user_id'])) {
                $msg = [
                    'status' => 1001,
                    'msg' => 'Token验证通过'
                ];
            } else {
                $msg = [
                    'status' => 1002,
                    'msg' => 'Token验证不通过,用户不存在'
                ];
            }
            return $msg;
        } catch (\Firebase\JWT\SignatureInvalidException $e) {
            echo json_encode([
                'status' => 1002,
                'msg' => 'Token无效'
            ]);
            exit;
        } catch (\Firebase\JWT\ExpiredException $e) {
            echo json_encode([
                'status' => 1003,
                'msg' => 'Token过期'
            ]);
            exit;
        } catch (Exception $e) {
            return $e;
        }
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
    	      'data'=> $data
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
     protected function fail($msg,$code=400,$data)
    {
         $this ->response($code,$msg,$data);
    }
}