<?php namespace app\home\controller;

use houdunwang\route\Controller;

class Views extends Controller{
    //动作
    public function index(){
        //此处书写代码...
        
    }
    
    public function tag(){
        
        $res = Db::table('user')->get();
        return view()->with('data',$res);
    }
}
