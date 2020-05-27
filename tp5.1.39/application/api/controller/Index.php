<?php
namespace app\api\controller;

class Index
{
    public function index($id)
    {
        return "你好！api。".$id;
    }
}