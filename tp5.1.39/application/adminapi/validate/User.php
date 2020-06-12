<?php
namespace app\adminapi\validate;

use think\Validate;

class User extends Validate
{
    protected $rule = [
        'name'  =>  'require|max:25',
        'email' =>  'email',
        'password'=> 'checkpassword',
    ];
    protected $message  =   [
        'name.require' => '名称必须',
        'name.max'     => '名称最多不能超过25个字符',
        'email'        => '邮箱格式错误',    
    ];
    protected function checkpassword($value,$rule,$data=[]){
    	return $rule == $value ? true : '密码不符合';
    }
}
