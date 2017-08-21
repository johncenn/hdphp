<?php namespace app\home\controller;

use houdunwang\route\Controller;

class Configs extends Controller{
    //动作
    public function index(){
       echo "aa";
        //检测配置是否存在
        //$res = Config::get('app');
       //$res = Config::has('app.debug');

       //获取配置项时，如果配置项不存在返回第二个参数的值。
       //$res = Config::get('web','houdunwang.com');
       
       //获取配置文件使用 get 方法完成，参数为 ”配置文件名.配置项"的形式。
       //$res = Config::get('view.path');
       
       //也可以使用 all 方法获取所有配置，例如：
       //$res = Config::all();
       
       //排除批定字段
       $res = Config::getExtName('database',['write','read']);
       dd($res);
    }
}
