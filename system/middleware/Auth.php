<?php namespace system\middleware;

use houdunwang\middleware\build\Middleware;

class Auth implements Middleware{
	//执行中间件
	public function run($next) {
        
	    if(!Session::get('uid')){
	        echo "中间件";
	        go('admin/entry/login');
	    }
	    
	}
}