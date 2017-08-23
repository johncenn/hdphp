<?php namespace app\home\controller;

use houdunwang\route\Controller;

class Views extends Controller{
    //动作
    public function index(){
        //此处书写代码...
        
    }
    
    public function tag(){
        
        //打印系统常量
        print_const();
        
        $res = Db::table('user')->get();
        return view()->with('data',$res);
    }
    
    
    public function cache(){
        
        //dd(View::isCache('cache'));
       //  View::isCache('article2');
        
        $user = Db::table('user')->get();
        $cache_data = array(
            "time"=>time(),
            "users"=>$user
        ); 
        
        
        //2种方法都可以
        //p($user);
       /*  View::with('cache_Data',$cache_data);
        return View::cache(5)->make(); */
        
        View::with('cache_Data',$cache_data);
        View::cache(5);//缓存5秒 ,c_data缓存名 
        return  View::make('cache');
        
        
    }
    
    
    public function csrf2(){
        
        //print_const();
        $arr = array(
            "a"=>"b"
        );
        if(IS_POST){
            
            echo json_encode($arr);
            die;
        }
        return view();
    }
    
    
}










