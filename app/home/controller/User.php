<?php namespace app\home\controller;

use houdunwang\route\Controller;

class User extends Controller{
    //动作
    public function index(){
       
        return view();
    }
    
    public function url_test(){
        
        View::with('data', '数据');
        $arr_data = array(
            "a"=>"a.ppp",
            "b"=>"b.ppp"
        );
        View::with("arr",$arr_data);
        return view('test.php');
    }
    
    public function assign(){
        
    }
    
    //url跳转
    public function show(){
        echo message('操作成功',u('add'),'success',5);
        
        //echo "user_show";
    }
    
    public function add(){
        echo "添加用户";
    }
}









