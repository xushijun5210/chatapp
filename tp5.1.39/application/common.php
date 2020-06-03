<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
//实现邮件发送函数
//use PHPMailer\PHPMailer\PHPMailer;
function sendMail($to, $title, $content){
    require_once('../extend/PHPMailer/class.phpmailer.php');
    $mail = new PHPMailer();
    // 设置为要发邮件
    $mail->IsSMTP();
    // 是否允许发送HTML代码做为邮件的内容
    $mail->IsHTML(TRUE);
    $mail->CharSet='UTF-8';
    // 是否需要身份验证
    $mail->SMTPAuth=TRUE;
    /*  邮件服务器上的账号是什么 -> 到163注册一个账号即可 */
    // $mail->From="xu_shi_jun@163.com";//发件人邮箱
    // $mail->FromName="搜米网络科技有限公司";    //发件人
    // $mail->Host="smtp.163.com";  //发送邮件的服务协议地址
    // $mail->Username="xu_shi_jun";  // SMTP username  注意：普通邮件认证不需要加 @域名 
    // $mail->Password="xushijun5210"; // SMTP password 
    $mail->From="xu_shi_jun@163.com";//发件人邮箱
    $mail->FromName="搜米网络科技有限公司";    //发件人
    $mail->Host="smtp.163.com";  //发送邮件的服务协议地址
    $mail->Username="xu_shi_jun";  // SMTP username  注意：普通邮件认证不需要加 @域名 
    $mail->Password="GVQRKORYQAOMAJHS"; // SMTP password   
    $mail->Port = 25;   // 发邮件端口号默认25
    $mail->AddAddress($to);  // 收件人
    $mail->Subject=$title;  // 邮件标题
    $mail->Body=$content;  // 邮件内容
    return($mail->Send());
    // echo 'Message has been sent.';
}
//从二维数组$arr中把$field字段内容获得出来拼装为字符串返回
function arrayToString($arr,$field){
    $s = array();
    foreach($arr as $k => $v){
        $s[] = $v[$field];
    }
    return implode(',',$s);//array->string
}