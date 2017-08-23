<?php namespace app\admin\controller;

use houdunwang\route\Controller;

class Entry extends Controller{
    
    public function __construct(){
        
        Middleware::set('auth',['except' => ['login']]);
    }
    
    //动作
    public function index(){
        echo "主页";
    }
    
    public function login(){
        
        if(IS_POST){
            Validate::make([
                ['name','required','用户名不能为空'],
                ['password','required','密码不能为空']
            ]);
            
            //验证通过就查询
            $user = Db::table('user')->where('name',Request::post('name'))->first();
            if(empty($user)){
                message("账号不存在",'','error');
            }
            
            if( Crypt::decrypt($user['password']) != Request::post('password') ){
                message("密码错误",'','error');
            }
            
            //把用户id存入session
            Session::set('uid',$user['u_id']);
            go('entry/index');
            
        }
        return view();
        
    }
}













